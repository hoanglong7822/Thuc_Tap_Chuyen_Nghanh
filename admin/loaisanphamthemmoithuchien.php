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
include ("config/connection.php");
// if(isset($_POST['sbm'])){ 
  $tentheloai=$_POST["tentheloai"];
  
  $sql_select = "SELECT maloai FROM tbl_loaisanpham where tenloai='$tentheloai'";
  
    $result_select = $con -> query($sql_select);
    if($result_select->num_rows>0){
      echo "
                <script type='text/javascript'>
                    window.alert('Trùng tên loại sản phẩm khi thêm');
                    window.location.href='loaisanphamthemmoi.php';
                </script>
            ";
    }
    else{

  $sql = "INSERT INTO tbl_loaisanpham (tenloai) VALUES ('$tentheloai')";
  
  if($con -> query($sql)===True){
         echo "
                <script type='text/javascript'>
                    window.alert('Bạn đã thêm mới loại sản phẩm thành công');
                    window.location.href='loaisanpham.php';
                </script>
            ";
     }
    else
    {
         echo "
                <script type='text/javascript'>
                    window.alert('Lỗi khi thêm');
                    window.location.href='loaisanphamthemmoi.php';
                </script>
            ";
    }

    }
 

?>