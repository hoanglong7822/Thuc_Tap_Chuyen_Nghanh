<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require"PHPMailer/src/EXception.php";
require'PHPMailer/src/PHPMailer.php';
require'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'vthlong2k2@gmail.com';                     //SMTP username
    $mail->Password   = 'cequndlkaaqjubbf';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com',  'TBHP');
   $mail->addAddress('trangnguyen.bav@gmail.com'); 
    // $mail->addAddress('23A4040037@bav.edu.vn');     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "DELIVERY CONFIRMATION NOTICE";
    $mail->Body    = "<p>Quý khách vui lòng để ý điện thoại.</p>
                      <p>Đơn hàng của quý khách đã được vận chuyển lúc này</p>
                      <p> </p>
                      <p> Chúc quý khách có một ngày vui vẻ! </p>
                      </p><i> Chúng tôi luôn sẵn sàng nhận phản hồi từ khách hàng.";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Không gửi được: {$mail->ErrorInfo}";
}