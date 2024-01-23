<?php 
session_start();
include("config/connection.php"); 
$maBBDH=$_GET["maBBDH"];
require('../mail/send.php');
$sql = "  SELECT *, (a.soluong-b.soluongdoi) as update_sl FROM tbl_sanpham AS a INNER JOIN tbl_chitietdh AS b 
              on a.maSP=b.maSP where b.maBBDH=$maBBDH";

  $sql1 = $con ->query($sql);

      while($row=$sql1 ->fetch_assoc()){
    $id=$row['maSP'];
    $sl=$row['update_sl'];
    // mysqli_query($con,"UPDATE tbl_sanpham SET `soluong`= $sl WHERE maSP=$id");
    mysqli_query($con, "UPDATE `tbl_doihang` SET `tinhtrangdh`='Đã xử lý' WHERE maBBDH=$maBBDH");
}
echo "
<script type='text/javascript'>
window.alert('Phiếu đổi hàng được tạo thành công'); 

window.location.href='xemchitiet_BBDH.php?maBBDH= $maBBDH';
</script>;"

?>
<!-- // header('location:doihang.php'); -->
<!-- $sql_count=" SELECT a.maSP from tbl_sanpham a JOIN tbl_chitietpxh b on a.maSP=b.maSP JOIN tbl_phieuxuathang c on b.maPXH=c.maPXH 
WHERE (a.soluong<20) AND (b.soluong>20) 
  AND (CURRENT_DATE()-c.ngaylap<30)"; -->


  
  <!-- // if($sql1_count>=1){
   
    // $tieude = "GỢI Ý NHẬP HÀNG - TIN NHẮN TỪ HỆ THỐNG";
    // $noidung = "<h2>Cảm ơn quý khách đã đặt hàng.</h2> 
    // <p> Quý khách chọn thanh toán qua ngân hàng vui lòng chuyển khoản qua số tài khoản sau: 1014419739 - Vietcombank - Nguyễn Thị Hoài Thương</p>
    // <p>Quý khách chọn thanh toán qua Momo vui lòng chuyển khoản qua số điện thoại: 0395923642</p>
    // <p>Quý khách chọn thanh toán qua VNpay vui lòng liên hệ với của hàng để lấy mã QR</p>
  
    // <p>Kiểm tra thông tin đơn hàng trên website Eleven Silver</p>
    
    // <p>Chúc bạn một ngày vui vẻ!</p>";
    
    // // $maildathang=['trangnguyen.bav@fmail.com'];
    // $mail =new mailer();
    // $mail->dathangmail($tieude, $noidung, $maildathang);
  // }  -->
  



   