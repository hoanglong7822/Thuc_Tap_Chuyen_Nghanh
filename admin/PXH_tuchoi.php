<?php
  include("config/connection.php");
  $maBBDH=$_GET['maPXH'];
  // require('../mail1/send1.php');
  $sql_tuchoi = "  UPDATE `tbl_phieuxuathang` SET `tinhtrang`='Từ chối' WHERE maPXH=$maBBDH";
   if($con -> query($sql_tuchoi)===True){
     echo "
                <script type='text/javascript'>
                    window.alert('Đã thực hiện từ chối');
                    window.location.href='xuathang.php';
                </script>
            "; }
      else{
        echo "
                <script type='text/javascript'>
                    window.alert('Lỗi thực hiện');
                    window.location.href='xuathang.php';
                </script>
            ";
      }
  
?>