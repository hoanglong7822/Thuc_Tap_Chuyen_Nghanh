<?php 
session_start();
include("config/connection.php"); 
$maBBDH=$_GET["maBBDH"];


$sql= "SELECT email from tbl_doihang as a join tbl_hoadonban as b on a.maHDB=b.maHDB join tbl_khachhang as c on b.maKH=c.maKH where a.maBBDH=$maBBDH";
$sql_dh=$con-> query($sql);
$a=0;
while($row_dh=$sql_dh ->fetch_assoc()){
    $a++;
    $email= $row_dh['email'];}
// }
//  header('location:xemchitietdonhang_xacnhan.php?maPXH=<');
echo "
<script type='text/javascript'>
window.alert('Mail đã được gửi tới khách hàng!');
                    window.location.href='xemchitietBBDH_xacnhan.php?maBBDH=$maBBDH';
                </script>;"

?>
<?php    $_SESSION['mail']=$mail;
if($a>=1){
    require('../mail/send.php');
    $tieude="THÔNG BÁO VẬN CHUYỂN ĐƠN HÀNG";
    $noidung ="<h3>ĐƠN HÀNG CỦA BẠN ĐÃ ĐƯỢC VẬN CHUYỂN </h3>
    <i> Vui lòng để ý điện thoại, nhân viên của chúng tôi sẽ liên lạc với bạn để giao hàng </i>
    <p><span>TBHP </span> luôn sẵn sàng nhận phản hồi từ khách hàng</p>";
    
// $emailKH_KH=$email;
$emailKH=$email;
$mail= new mailer();
$mail->mailKH($tieude, $noidung, $emailKH);
}

?>