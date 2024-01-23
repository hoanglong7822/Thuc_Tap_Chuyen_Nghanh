<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
$name=$_POST['id'];
include("../admin/config/connection.php");
$sql_category="SELECT * FROM tbl_nhacungcap where maNCC=$name";
$result_category=$con->query($sql_category);
$row_category=$result_category->fetch_assoc();
$email=$row_category['email'];
$title=$_POST['title'];
$ghichu=$_POST['ghichu'];
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
   $mail->addAddress($email); 
    // $mail->addAddress('23A4040037@bav.edu.vn');     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $title;
    $mail->Body    = $ghichu;
    $mail->send();
    echo 'Message has been sent';
    echo "
                <script>
                window.alert('Gửi thành công');
                window.location.href = '../admin/z_pnh_detail.php';
                </script>
            ";
} catch (Exception $e) {
    echo "Không gửi được: {$mail->ErrorInfo}";
}