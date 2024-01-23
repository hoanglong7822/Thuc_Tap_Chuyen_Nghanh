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
    $maNCC= $_GET["maNCC"];

    $sql = "
    DELETE FROM tbl_nhacungcap WHERE maNCC=$maNCC
    
    ";

                
    if($con -> query($sql)===True){
     echo "
                <script type='text/javascript'>
                    window.alert('Xóa nhà cung cấp thành công');
                    window.location.href='nhacungcap.php';
                </script>
            ";
        
      }
      else{
        echo "
                <script type='text/javascript'>
                    window.alert('Nhà cung cấp đang có đơn hàng với công ty mình, không thể xóa');
                    window.location.href='nhacungcap.php';
                </script>
            ";
      }
   
;?>



