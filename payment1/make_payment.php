<?php
$price = isset($_POST['price']) ? htmlspecialchars($_POST['price']) * 100 : null;
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
$number = isset($_POST['number']) ? htmlspecialchars($_POST['number']) : null;

if (!$price || !$name || !$number) {
    header('Location: https://a-group.az/payment/');
    exit();
}

if ($price > 1000000) {
    header('Location: https://a-group.az/payment/');
    exit();
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$merchant_handler = 'https://api.pay.yigim.az';
$merchant = 'AGR0001';
$secret = 'EA4AF0E5366E98982B518C00F3350D28';
$type = 'JSON';
$currency = '944';
$language = 'az';
$reference = rand(0, 9999).generateRandomString();
$template = 'TPL0001';
$biller = 'BLR0001';
$description = 'Xidmətlər üçün ödəniş';
$callback = 'https://a-group.az/payment/callback.php';
$extra = "name=$name;number=$number";

$signature = base64_encode(pack('H*', hash('md5', $reference.$price.$currency.$biller.$description.$template.$language.$callback.$extra.$secret)));

$query = [
    'reference' => $reference,
    'amount' => $price,
    'currency' => $currency,
    'biller' => $biller,
    'description' => $description,
    'template' => $template,
    'language' => $language,
    'callback' => $callback,
    'extra' => $extra
];

$ch = curl_init($merchant_handler.'/payment/create?'.http_build_query($query));
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


if (!isset($data->url)) {
    header('Location: https://a-group.az/payment?method=failure');
    exit();
}

$mysqli = new mysqli("localhost","payment", "fesf4512ff", "payments");

if ($mysqli->connect_errno) {
    echo "Error 3";
    exit();
}

$price = $price/100;
$sql = "INSERT INTO `payments` (`name`, `number`, `price`, `ref`, `status`) VALUES ('$name', '$number', '$price', '$reference', 'pending')";

if ($mysqli->query($sql) === TRUE) {

} else {
    echo "Error: 4";
}

$mysqli->close();

header('Location: '.$data->url);

die();
