<?php
  include("config/connection.php");
  $maBBDH=$_GET['maBBDH'];
  $sql_chuaxyly = "  UPDATE `tbl_doihang` SET `tinhtrangdh`='Chưa xử lý' WHERE maBBDH=$maBBDH";
   if($con -> query($sql_chuaxyly)===True){
     echo "
                <script type='text/javascript'>
                    window.alert('Kho chưa sẵn sàng để xuất hàng');
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