<?php 
    // Mục đích: kiểm tra xem bạn có quyền truy cập trang này hay không thông qua biến $_SESSION['da_dang_nhap'] = 1 --> được phép truy cập; và ngược lại.
    session_start();
    ob_start();
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
    include("config/connection.php");
    $idtheloai=$_GET['maloai'];
    $sql_delete = "DELETE FROM tbl_loaisanpham WHERE maloai=$idtheloai";
     if($con -> query($sql_delete)===True){
         echo "
                <script type='text/javascript'>
                    window.alert('Xóa thành công');
                    window.location.href='loaisanpham.php';
                </script>
            ";
        
      }
      else{
        echo "
                <script type='text/javascript'>
                    window.alert('Loại sản phẩm này hiện tại vẫn còn sản phẩm, không thể xóa!');
                    window.location.href='loaisanpham.php';
                </script>
            ";
      }
    
?>