<?php

$data = $_GET;

if (empty($data)) {
    die();
}

$mysqli = new mysqli("localhost","payment","fesf4512ff","payments");

if ($mysqli->connect_errno) {
    echo "Error 5";
    exit();
}

$reference = htmlspecialchars($data['reference']);
$ref = $mysqli->query("SELECT * FROM payments WHERE `ref` = '$reference'")->fetch_assoc();

if ($ref) {
    $merchant_handler = 'https://api.pay.yigim.az';
    $merchant = 'AGR0001';
    $secret = 'EA4AF0E5366E98982B518C00F3350D28';
    $type = 'JSON';
    $signature = base64_encode(pack('H*', hash('md5', $reference.$secret)));

    $query = [
        'reference' => $reference,
    ];

    $ch = curl_init($merchant_handler.'/payment/status?'.http_build_query($query));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Merchant: '.$merchant,
        'X-Signature: '.$signature,
        'X-Type: '.$type,
    ));

    $data = curl_exec($ch);
    if(curl_error($ch)) {
        echo curl_error($ch);
    }
    curl_close($ch);

    $data = json_decode($data);

    var_dump($data);

    $statuses = [
        'S0' => 'Newly created transaction, waiting for card data input',
        'S1' => "Pre-authorized DMS transaction (call 'charge' or 'cancel' within 30 days)",
        'S2' => "Transaction is in progress",
        'S3' => "Unknown error",
        'S4' => "Reversed transaction (cancelled)",
        'S5' => "Refunded transaction",
        'S7' => "System malfunction",
        '00' => "Approved",
        '01' => "Decline, refer to issuer",
        '02' => "Decline, expired card",
        '03' => "Decline, invalid amount",
        '04' => "Decline, inactive card",
        '05' => "Decline, insufficient funds",
        '06' => "Decline, suspected fraud",
        '07' => "Decline, exceeds withdrawal limit",
        '08' => "Format error",
        '09' => "Issuer timeout (merchant should call 'cancel' transaction by themself)",
    ];

    $status = in_array($data->status, ['S1', 'S4', 'S5', '00'])  ? 'approved' : 'failed';
    $message = $statuses[$data->status];


    $mysqli->query("UPDATE payments SET `status` = '$status', `message` = '$message' WHERE `ref` = '$reference'");
}

die();
