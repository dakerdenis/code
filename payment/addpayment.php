<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $desc_police = $_POST['desc_police'];
  $amount = $_POST['amount'];
  $currency = $_POST['currency'];
  $rrn = $_POST['rrn'];

  $timestamp = $_POST['timestamp'];
  $currentYear = substr($timestamp, 0, 4);
  $currentMonth = substr($timestamp, 4, 2);
  $currentDay = substr($timestamp, 6, 2);

 // $url = "https://insure.a-group.az/insureazsvctest/policypaymentssvc.asmx";

  $url = "https://insure.a-group.az/insureazsvc/policypaymentssvc.asmx";

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  $headers = array("Content-Type: text/xml", );
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

  $randomNumber = rand(1000000, 9999999);

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
  die();

}