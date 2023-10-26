<html><head>
<title>1 request</title>
<link rel="stylesheet" href="/ow/ow.css" type="text/css">
<link rel="stylesheet" href="./style.css">
</head><body bgcolor="#f0f0f0" text="#000000" leftMargin=0 topMargin=0 marginheight=0 marginwidth=0>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="maintxt">

        <center><table border="0" cellpadding="5" cellspacing="5" width="590">
                <div class="">
                <div class="spinner">
    <div class="lds-roller">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div>Loading...</div>
</div>
                </div>
              <form id="payment_form" ACTION="https://mpi.3dsecure.az/cgi-bin/cgi_link" METHOD="POST">

<?php
$payment_amount = $_POST['payment_amount'];
$secondPoliceNumber = $_POST['secondPoliceNumber'];
$payment_email = $_POST['payment_email'];
error_reporting(E_ALL);
ini_set("display_errors", 1);




$randomBytes = random_bytes(32); // Generate 32 random bytes
$randomHex = bin2hex($randomBytes); // Convert random bytes to hexadecimal
// Getting required fields

// These fields can change in every request
//$db_row['AMOUNT'] = $_POST["AMOUNT"];
//!-----------------------------------------------------------
$db_row['AMOUNT'] = $payment_amount;
$db_row['CURRENCY'] = 'AZN';
$db_row['TERMINAL'] = '73004327'; // That is your personal ID in payment system
$db_row['TRTYPE'] = '1'; // That is the type of operation, 1 - Authorization and checkout, 0 - Authorization  block amount       
$db_row['TIMESTAMP'] = date("YmdHis");
$db_row['NONCE'] = uniqid();
$db_row['MERCH_URL'] = 'https://a-group.az/payments/'; //Home url of merchant or domain
//!-----------------------------------------------------------
//$db_row['ORDER'] = '332523';
$db_row['ORDER'] = gmdate("YmdHis");
$db_row['DESC'] = $secondPoliceNumber;
$db_row['MERCH_NAME'] = 'A-Qroup'; // Name of merchant
$db_row['EMAIL'] = $payment_email; // email can be static or dynamic but must be
$db_row['COUNTRY'] = 'AZ';
$db_row['MERCH_GMT'] = '+4';
$db_row['BACKREF'] = 'https://a-group.az/payments/callback.php';
///?-------------------------------------
 $db_row['ADDENDUM'] = 'AD';
 $db_row['AD.ECOM_PAY_DTLS'] = $secondPoliceNumber;
 ///?-------------------------------------
// $db_row['P_SIGN'] = '';
//$db_row['MAC'] = '';
//These fields are generated automaticaly every request
$oper_time = date("YmdHis"); // Date and time UTC
$nonce = substr(md5(rand()), 0, 16); // Random data

foreach ($db_row as $key => $value) {
        echo "<tr><td>$key" . " = " . "$value</td></tr>\n";
        #echo "<input name=\"$key\" value=\"$value\" type=\"hidden\">";
}
// Creating form hidden fields
//!----------------------------------------------------
echo "  <input name=\"AMOUNT\" value=\"{$db_row['AMOUNT']}\" type=\"hidden\">
        <input name=\"CURRENCY\" value=\"{$db_row['CURRENCY']}\" type=\"hidden\">
        <input name=\"TERMINAL\" value=\"{$db_row['TERMINAL']}\" type=\"hidden\">
        <input name=\"TRTYPE\" value=\"{$db_row['TRTYPE']}\" type=\"hidden\">  
        <input name=\"TIMESTAMP\" value=\"{$oper_time}\" type=\"hidden\">
        <input name=\"NONCE\" value=\"{$nonce}\" type=\"hidden\">
        <input name=\"MERCH_URL\" value=\"{$db_row['MERCH_URL']}\" type=\"hidden\"> 

        <input name=\"ORDER\" value=\"{$db_row['ORDER']}\" type=\"hidden\">
        <input name=\"DESC\" value=\"{$db_row['DESC']}\" type=\"hidden\">
        <input name=\"MERCH_NAME\" value=\"{$db_row['MERCH_NAME']}\" type=\"hidden\">
        <input name=\"EMAIL\" value=\"{$db_row['EMAIL']}\" type=\"hidden\">  
        <input name=\"COUNTRY\" value=\"{$db_row['COUNTRY']}\" type=\"hidden\"> 
        <input name=\"MERCH_GMT\" value=\"{$db_row['MERCH_GMT']}\" type=\"hidden\"> 
        <input name=\"BACKREF\" value=\"{$db_row['BACKREF']}\" type=\"hidden\">
        ///?-------------------------------------
        <input name=\"ADDENDUM\" value=\"{$db_row['ADDENDUM']}\" type=\"hidden\">
        <input name=\"AD.ECOM_PAY_DTLS\" value=\"{$db_row['AD.ECOM_PAY_DTLS']}\" type=\"hidden\">
        ///?-------------------------------------
        ";

// Making P_SIGN (MAC)  -         Checksum of request
//! Privat % Public Keys
//$privateKey = file_get_contents('https://a-group.az/payment_test/keys/merchant_private_key.pem'); // here should be your privet key directory
//$publicKey = file_get_contents('https://a-group.az/payment_test/keys/merchant_public_key.pem'); // here should be your public key directory

$privateKey = file_get_contents(__DIR__ . '/../../keys/merchant_private_key.pem');  // here should be your privet key directory
$publicKey = file_get_contents(__DIR__ . '/../../keys/merchant_public_key.pem'); 

if (!$privateKey) {
        echo "Error: " . openssl_error_string();
    }

$to_sign = strlen($db_row['AMOUNT']) . $db_row['AMOUNT']
        . strlen($db_row['CURRENCY']) . $db_row['CURRENCY']
        . strlen($db_row['TERMINAL']) . $db_row['TERMINAL']
        . strlen($db_row['TRTYPE']) . $db_row['TRTYPE']
        . strlen($oper_time) . $oper_time
        . strlen($nonce) . $nonce
        . strlen($db_row['MERCH_URL']) . $db_row['MERCH_URL'];

$db_row['MAC'] = $to_sign;

$P_SIGN = '';
openssl_sign($to_sign, $P_SIGN, $privateKey, OPENSSL_ALGO_SHA256);

$ok = openssl_verify($to_sign, $P_SIGN, $publicKey, OPENSSL_ALGO_SHA256);
$db_row['P_SIGN'] = bin2hex($P_SIGN);

echo "<input name=\"P_SIGN\" value=\"{$db_row['P_SIGN']}\" type=\"hidden\">";
// ----------------------------------------------------
stream_context_set_default([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);
    
?>
                          
        <table border="0" cellpadding="5" cellspacing="5" width="590" align="center">
                    <input alt="Submit" type="submit">
        </tbody></table>
</form>	

<script>
 window.onload = function(){
         document.getElementById('payment_form').submit();
 }
</script>
</table>
<br><center><hr WIDTH="100%"></center></body>
</html>