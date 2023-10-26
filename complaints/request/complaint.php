<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $lastname = $_POST['lastname'];
        $fincod = $_POST['fincode'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $content = $_POST['content'];
    
        $to = 'dakershteyn@a-group.az, complaints@a-group.az';
        //$to = 'dakershteyn@a-group.az';
        $from = 'complaints@a-group.az';
    
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    
        // Create email headers
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
        // Subject
        $subject = 'Şikayət (sayt üzərində)';
    
        $fio = $name . " " . $surname . " " . $lastname;
        $phone = preg_replace('~[^0-9]+~','',$phone);
        // Compose a simple HTML email message
        $message = '<!doctype html><html><head><meta charset="UTF-8"></head><body>';
        $message .= '<h1 style="color:black !important;">Şikayət sayt vasitəsilə göndərilib:</h1>';
        $message .= '<h4 style="color:black !important;"> ASA: ' . $fio . '</h4>';
        $message .= '<h4 style="color:black !important;"> Nömrə: +' . $phone . '</h4>';
        $message .= '<h4 style="color:black !important;"> Fin Code: ' . $fincod . '</h4>';
        $message .= '<h4 style="color:black !important;"> E-mail: ' . $email . '</h4>';
        $message .= '<p style="color:black !important;"> Messaj: ' . $content . '</p>';
        $message .= '</body></html>';
    
        // Sending email
        // mail($to, $subject, $message, $headers);
        //////********* */
        // $result = mail($to, $subject, $message, $headers);

        // if(!$result){
        //         echo "<h1>ERROR</h1>";
        // }


        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP(); // Use SMTP protocol
        $mail->Host = 'smtp.gmail.com'; // Specify  SMTP server
        $mail->SMTPAuth = true; // Auth. SMTP
        $mail->Username = 'Agroup.sigorta.asc@gmail.com'; // Mail who send by PHPMailer
        $mail->Password = 'kctlmcosqklanpxs'; // your pass mail box
        $mail->SMTPSecure = 'ssl'; // Accept SSL
        $mail->Port = 465; // port of your out server
        $mail->setFrom($from); // Mail to send at
        // Add multiple recipients
$recipients = explode(',', $to);
foreach ($recipients as $recipient) {
    $mail->addAddress(trim($recipient));
}
        $mail->addAddress($to); // Add sender
        $mail->addReplyTo($from); // Adress to reply
        $mail->isHTML(true); // use HTML message
        $mail->Subject = $subject;
        $mail->Body = $message;

        // SEND
        if( !$mail->send() ){
            echo 'error';
            exit;
        }
        else{
                echo  $to ." ".  $subject ." ".  $message ." ".  $headers;
                $data['status'] = 1;
                $data['message'] = 'success';
            
                echo json_encode($data);
                session_start();
                $_SESSION['success_msg'] = " Ugurla göndərdi ! ";
        
                header("Location: https://a-group.az/complaints/index.php");
        }
?>