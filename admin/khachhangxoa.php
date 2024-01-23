<?php 
session_start();

if(!isset($_SESSION['dangnhap_home'])) {
    echo "
    <script type='text/javascript'>
    window.alert('Bạn không được phép truy cập');
    window.location.href='dangnhap.php';
    </script>
    ";
}
;?>

<?php
            // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
    include("config/connection.php");

                // 2. Viết câu lệnh truy vấn để thêm mới dữ liệu vào bảng TIN TỨC trong CSDL
    $maKH= $_GET["maKH"];

    $sql = "
    DELETE FROM tbl_khachhang WHERE maKH=$maKH
    
    ";

                
    if($con -> query($sql)===True){
     echo "
                <script type='text/javascript'>
                    window.alert('Xóa người dùng thành công');
                    window.location.href='khachhang.php';
                </script>
            ";
        
      }
      else{
        echo "
                <script type='text/javascript'>
                    window.alert('Khách hàng đang có đơn hàng, không thể xóa');
                    window.location.href='khachhang.php';
                </script>
            ";
      }
   
;?>



