<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require"PHPMailer/src/EXception.php";
require'PHPMailer/src/PHPMailer.php';
require'PHPMailer/src/SMTP.php';

class mailer{
    public function dathangmail($tieude, $noidung){
//Create an instance; passing `true` enables exceptions
$mail1 = new PHPMailer(true);
$mail1->CharSet='UTF-8';
try {
                      //Enable verbose debug output
    $mail1->isSMTP();                                            //Send using SMTP
    $mail1->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail1->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail1->Username   = 'vthlong2k2@gmail.com';                     //SMTP username
    $mail1->Password   = 'cequndlkaaqjubbf';                               //SMTP password
    $mail1->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail1->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail1->setFrom('from@example.com',  'TBHP');
   $mail1->addAddress('trangnguyen.bav@gmail.com'); 
    // $mail1->addAddress('23A4040037@bav.edu.vn');     //Add a recipient
    

    //Content
    $mail1->isHTML(true);                                  //Set email format to HTML
    $mail1->Subject = $tieude;
    $mail1->Body    = $noidung;
    // $mail1->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail1->send();
    echo 'Message đã được gửi';
} catch (Exception $e) {
    echo "Không gửi được: {$mail1->ErrorInfo}";
}
}
}
?>