<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";

 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true); 
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'vthlong2k2@gmail.com';                 // SMTP username
    $mail->Password = 'tynaffhfvudeuuap';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('vthlong2k2@gmail.com', 'Mailer');
    $mail->addAddress('vthl2k2@gmail.com', 'Hoàng Long');     // Add a recipient
              // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@gmail.com');
    $mail->addBCC('bcc@example.com');
 
    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Chào Hoàng Long';
    $mail->Body    = 'New content testmail';
  //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>