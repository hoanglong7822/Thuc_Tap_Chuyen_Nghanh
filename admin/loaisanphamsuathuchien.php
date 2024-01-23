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

// if(isset($_POST['sbm'])){ 
    $idtheloai=$_POST["idtheloai"];
    $tentheloai=$_POST["tentheloai"];
    
    

    $sql_update = "UPDATE tbl_loaisanpham SET tenloai='$tentheloai' WHERE maloai=$idtheloai";
    
    if($con -> query($sql_update)===True){
         echo "
                <script type='text/javascript'>
                    window.alert('Bạn đã sửa loại sản phẩm thành công');
                    window.location.href='loaisanpham.php';
                </script>
            ";
     }
    else
    {
        echo "
                <script type='text/javascript'>
                    window.alert('Lỗi khi sửa');
                    window.location.href='loaisanphamsua.php';
                </script>
            ";
    }

    
//  }

?>