<?php
  include("config/connection.php");
  $maBBDH=$_GET['maBBDH'];
  $sql_tuchoi = "  UPDATE `tbl_doihang` SET `tinhtrangdh`='Từ chối' WHERE maBBDH=$maBBDH";
   if($con -> query($sql_tuchoi)===True){
     echo "
                <script type='text/javascript'>
                    window.alert('Đã thực hiện từ chối');
                    window.location.href='doihang.php';
                </script>
            ";
        
      }
      else{
        echo "
                <script type='text/javascript'>
                    window.alert('Lỗi thực hiện');
                    window.location.href='doihang.php';
                </script>
            ";
      }
  
?>