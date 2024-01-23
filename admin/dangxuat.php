<?php
      session_start();
      // // 1. load file cấu hình csdl 
      include("config/connection.php");
      // //2. lấy ra dữ liệu tin tức mới nhất                                   
        if(isset($_SESSION['da_dang_nhap']) && $_SESSION['da_dang_nhap']!= NULL){
            unset($_SESSION['da_dang_nhap']); //Hàm unset() sẽ loại bỏ một hoặc nhiều biến được truyền vào
            echo  " 
            <script type = 'text/javascript'>
              window.alert(' Bạn đăng xuất thành công!');
              window.location.href='dangnhap.php';
            </script>
            ";
        }
      ;?> 
<?php
      session_start();                           
       unset($_SESSION['da_dang_nhap']); 
      echo  " 
            <script type = 'text/javascript'>
              window.alert(' Bạn đăng xuất thành công!');
              window.location.href='dangnhap.php';
            </script>
            ";
 ;?>

    