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
    $maNV= $_GET["maNV"];

    $sql = "
    DELETE FROM tbl_nhanvien WHERE maNV=$maNV
    
    ";

                
    if($con -> query($sql)===True){
     echo "
                <script type='text/javascript'>
                    window.alert('Xóa người dùng thành công');
                    window.location.href='nhanvien.php';
                </script>
            ";
        
      }
      else{
        echo "
                <script type='text/javascript'>
                    window.alert('Nhân viên đang xử lý đơn hàng, không thể xóa');
                    window.location.href='nhanvien.php';
                </script>
            ";
      }
   
;?>



