<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;
        
        require 'Exception.php';
        require 'PHPMailer.php';
        require 'SMTP.php';

$reversal_trtype = $_POST['TRTYPE']; // That is the type of operation, 22 - Reversal  

$order_payment = $_POST['ORDER'];
$amount = $_POST['AMOUNT'];
$currency = $_POST['CURRENCY'];
$int_ref = $_POST['INT_REF']; // Internal reference number
$timestamp = $_POST['TIMESTAMP'];
$terminal = $_POST['TERMINAL'];
$approval = $_POST['APPROVAL'];
$nonce = $_POST['NONCE'];
$rrn = $_POST['RRN'];
$masked_card = $_POST['MASKED_CARD'];
$desc_police = $_POST['DESC'];
$action_t = $_POST['ACTION'];

$req_dump = print_r($_POST, TRUE);
$fp = fopen('resp.txt', 'a');
fwrite($fp, $req_dump);
fclose($fp);

$to_sign = strlen($amount).$amount
.strlen($terminal).$terminal
.($approval ? strlen($approval).$approval : '-')
.($rrn ? strlen($rrn).$rrn : '-')
.($int_ref ? strlen($int_ref).$int_ref : '-');

$publicKey = file_get_contents(__DIR__ . '/../../keys/merchant_public_key.pem'); 

$ok = openssl_verify($to_sign, hex2bin($_POST['P_SIGN']), $publicKey, OPENSSL_ALGO_SHA256);

if (!$ok) {
  $req_dump = print_r(['result' => 'ne ok'], TRUE);
  $fp = fopen('resp.txt', 'a');
  fwrite($fp, $req_dump);
  fclose($fp);
} else {

}



$currentYear = substr($timestamp, 0, 4);
$currentMonth = substr($timestamp, 4, 2);
$currentDay = substr($timestamp, 6, 2);
//$url = "https://insure.a-group.az/insureazsvctest/policypaymentssvc.asmx";
$url = "https://insure.a-group.az/insureazsvc/policypaymentssvc.asmx";


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array("Content-Type: text/xml", );
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$randomNumber = rand(1000000, 9999999);
if ($action_t == 0) {
  $data = <<<DATA
   <?xml version="1.0" encoding="utf-8"?>
   <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
     <soap:Body>
       <AddPayment xmlns="http://tempuri.org/">
         <policyNumber>$desc_police</policyNumber>
         <paymentAmount>$amount</paymentAmount>
         <paymentCurrencyID>1</paymentCurrencyID>
         <paymentDateYear>$currentYear</paymentDateYear>
         <paymentDateMonth>$currentMonth</paymentDateMonth>
         <paymentDateDay>$currentDay</paymentDateDay>
         <receiptNumber>$rrn</receiptNumber>
         <userName>AQWeb</userName>
         <password>@QWeb</password>
       </AddPayment>
     </soap:Body>
   </soap:Envelope>
   DATA;


  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

  $resp = curl_exec($curl);
  if (curl_errno($curl)) {
    $error_msg = curl_error($curl);
  }
  curl_close($curl);


  if (isset($error_msg)) {
    $message = $error_msg;
    $_SESSION['error_message'] = $message;
  }
  echo json_encode($resp);


        switch($currency) {
          case 840:
            $currency = 'USD';
            break;
          case 944:
            $currency = 'AZN';
            break;
          case 978:
            $currency = 'EUR';
            break;
          case 643:
            $currency = 'RUB';
            break;
          case 949:
              $currency = 'TRY';
              break;
        }

       // $url = "https://insure.a-group.az/insureazsvctest/policypaymentssvc.asmx";
        $url = "https://insure.a-group.az/insureazsvc/policypaymentssvc.asmx";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      
        $headers = array("Content-Type: text/xml",);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      
        $data = <<<DATA
        <?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <GetPolicyInfo2 xmlns="http://tempuri.org/">
              <policyNumber>${desc_police}</policyNumber>
              <userName>AQWeb</userName>
              <password>@QWeb</password>
            </GetPolicyInfo2>
          </soap:Body>
        </soap:Envelope>
        DATA;
      
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      
            $resp = curl_exec($curl);
            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
            }
            curl_close($curl);
      
      
            if (isset($error_msg)) {
                $message = $error_msg;
                $_SESSION['error_message'] = $message;
            }
            $xml = simplexml_load_string($resp);
            $data = $xml->xpath("//soap:Body/*")[0];
            $info = $data->children();
            $name = (string)simplexml_load_string((string)$info->GetPolicyInfo2Result)->Table->INSURER_CUSTOMER;

            $connection = mysqli_connect('localhost', 'root', '', 'payments_azericard');
            if (!$connection) {
              $req_dump = print_r(['error' => "Connection failed: " . mysqli_connect_error()], TRUE);
              $fp = fopen('resp.txt', 'a');
              fwrite($fp, $req_dump);
              fclose($fp);
            
              die("Connection failed: " . mysqli_connect_error());
            }
            $query = "INSERT INTO `payment` (`desc_police`,`username`,`order_payment` ,`action_t`, `amount`, `currency`,`rrn`,`int_ref`,`timestamp`,`nonce`,`masked_card`) 
                      VALUES ('$desc_police','$name','$order_payment','$action_t' ,  '$amount', '$currency','$rrn','$int_ref','$timestamp','$nonce','$masked_card');";
            $addnew__user = mysqli_query($connection, $query);





$to = $_POST['EMAIL']; 
        $from = 'noreply@a-group.az';
    
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        // Create email headers
        $headers .= 'From: '.$from ."\r\n".
        'Reply-To: '.$from ."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
        // Subject
        $subject = 'Ödəniş qəbzi';

        $message = '<!doctype html><html><head><meta charset="UTF-8"></head><body>';
        $message .= "Hörmətli $name, ödənişiniz qəbul olundu. <br/>
        Şəhadətnamə nömrəsi: $desc_police <br/>
        Tarix: $currentYear-$currentMonth-$currentDay <br/>
        Məbləğ: $amount $currency <br/>
        RRN: $rrn <br/>
        <br/><br/>
        Daima yanınızdayiq, Sizin sığorta şirkətiniz!";
        $message .= '</body></html>';

    
        // Sending email
        // mail($to, $subject, $message, $headers);
        //////********* */
        // $result = mail($to, $subject, $message, $headers);

        // if(!$result){
        //         echo "<h1>ERROR</h1>";
        // }


        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP(); // Use SMTP protocol
        $mail->Host = 'smtp.office365.com'; // Specify  SMTP server
        $mail->SMTPAuth = true; // Auth. SMTP
        $mail->Username = 'noreply@a-group.az'; // Mail who send by PHPMailer
        $mail->Password = 'kctlmcosqklanpxS1'; // your pass mail box
        $mail->SMTPSecure = 'tls'; // Accept SSL
        $mail->Port = 587; // port of your out server
        // $mail->SMTPDebug  = 4; 
        $mail->setFrom($from, 'A-Qroup Sığorta Şirkəti'); // Mail to send at
        $mail->addAddress($to); // Add sender
        $mail->addReplyTo($from); // Adress to reply
        $mail->isHTML(true); // use HTML message
        $mail->Subject = $subject;
        $mail->Body = $message;

        // SEND
        if( !$mail->send() ){
        }
        else{
                
        }


}
?>


              