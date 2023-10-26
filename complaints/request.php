<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pincode = $_POST['pincode'];
    $complaintNumber = $_POST['complaintNumber'];

    $url = "https://insure.a-group.az/InsureAzSvc/GeneralComplaintSvc.asmx";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array("Content-Type: text/xml",);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = <<<DATA
    <?xml version="1.0" encoding="utf-8"?>
    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-
    instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Body>
    <GetComplaintStatus xmlns="http://tempuri.org/">
    <pinCode>${pincode}</pinCode>
    <complaintNumber>${complaintNumber}</complaintNumber>
    <userName>AQWeb</userName>
    <password>@QWeb</password>
    </GetComplaintStatus>
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
        }
        echo json_encode($resp);
        die();
}