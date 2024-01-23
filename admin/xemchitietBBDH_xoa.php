
<?php
    include("config/connection.php");
    $maBBDH=$_GET['maBBDH'];
    $sql_delete = "DELETE FROM tbl_doihang WHERE maBBDH=$maBBDH";
    // $sql_delete1 = "DELETE FROM tbl_chitietdh WHERE maBBDH=$maBBDH";

     if($con -> query($sql_delete)===True
    //  $con1 -> query($sql_delete1)===True
     ){
        mysqli_query($con,"DELETE FROM tbl_chitietdh WHERE maBBDH=$maBBDH");
         echo "
                <script type='text/javascript'>
                    window.alert('Xóa thành công');
                    window.location.href='BBDH.php';
                </script>
            ";
        
      }
      else{
        echo "
                <script type='text/javascript'>
                    window.alert('Lỗi khi xóa');
                    window.location.href='BBDH.php';
                </script>
            ";
      }
    //   window.location.href='sanpham.php';
?>