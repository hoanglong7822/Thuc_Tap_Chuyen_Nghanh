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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Đăng Ký Tài Khoản Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
    <?php
        // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
        include("../db/connect.php");

        // 2. Viết câu lệnh truy vấn để thêm mới dữ liệu vào bảng TIN TỨC trong CSDL  
        if(isset($_POST['submit'])){     
            $admin_name= $_POST['txtTenNguoiDung'];
            $email= $_POST['txtEmail'];
            $password=$_POST['txtmk'];
            $chuc_vu=$_POST['txtchucvu'];
           
                $sql =  "INSERT INTO tbl_admin (adten,ademail,adpass,chuc_vu) 
                VALUES ('$admin_name','$email','$password', '$chuc_vu');";

                if($con -> query($sql)===True){
                     echo "
                            <script type='text/javascript'>
                                window.alert('Bạn đã thêm quản trị viên thành công');
                                window.location.href='adminthemmoi.php';
                            </script>
                        ";
                 }
                else
                {
                     echo "
                            <script type='text/javascript'>
                                window.alert('Lỗi khi thêm quản trị viên');
                                window.location.href='admin.php';
                            </script>
                        ";
                }
           
            
        }
         
;?>
 
    </body>
</html>