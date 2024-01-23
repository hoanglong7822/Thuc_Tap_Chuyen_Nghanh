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
    include("../db/connect.php");
    $admin_id=$_GET['id'];
    $sql_delete = "DELETE FROM tbl_admin WHERE idadmin=$admin_id";
     if($con -> query($sql_delete)===True){
         echo "
                <script type='text/javascript'>
                    window.alert('Xóa thành công');
                    window.location.href='admin.php';
                </script>
            ";
        
      }
      else{
        echo "
                <script type='text/javascript'>
                    window.alert('Lỗi khi xóa');
                    window.location.href='admin.php';
                </script>
            ";
      }
    
?>