<?php 
    session_start();

    if(!isset($_SESSION['dangnhap_home'])) {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không được phép truy cập');
                window.location.href='dangnhap.php';
            </script>
        ";
       
        $pasword= $_SESSION['password'];
        $admin_id = $_SESSION['admin_id'];
    }
;?>

<!DOCTYPE html>
<html lang="en">
    <?php include("adminHeader.php"); ?>
    <body class="sb-nav-fixed">
       <!-- nav-->
        <?php include("layout/nav.php"); ?>
        <div id="layoutSidenav">
            <!-- layoutSidenav_nav-->
            <?php   include("layout/aside.php"); ?>
            <div id="layoutSidenav_content">         
            <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Đổi mật khẩu</h3></div>
                                    <div class="card-body">
                                        <form method="POST"  enctype="multipart/form-data">                                            
                                            <div class="form-floating mb-3 ">
                                                        <input class="form-control" id="txtTenNguoiDung" name = "txtTenNguoiDung" type="text" placeholder="Điền họ tên của bạn" value="<?php echo $_SESSION['ten_nguoi_dung']; ?>" readonly/>
                                                        <label for="txtTenNguoiDung">Họ và Tên</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtEmail" name= "txtEmail" type="email" value="<?php echo $_SESSION['email_nguoi_dung']?>" readonly />
                                                <label for="txtEmail">Email</label>
                                            </div>
    
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="txtPassword" name = "txtPassword_old" type="password" placeholder="Nhập mật khẩu cũ" />
                                                <label for="txtPassword_old">Mật khẩu cũ</label>
                                            </div>
                                            <br>
                                            <div class="row mb-3 ">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="txtPassword_new" name = "txtPassword_new" type="password" placeholder="New password" />
                                                        <label for="txtPassword_new">Mật khẩu mới</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="re_txtPassword_new" type="password" placeholder="Confirm password" name="re_txtPassword_new" />
                                                        <label for="re_txtPassword_new">Nhập lại mật khẩu mới</label>
                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="mt-4 mb-0" >
                                                <button class="btn btn-primary" type="submit" name="sbm">Đổi mật khẩu
                                                </button>                                               
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </main>
                <?php include("layout/footer.php"); ?>
            </div>
        </div>
       <?php include("adminFooter.php"); ?>
    </body>
</html>

<?php
include("../db/connect.php");
$email= $_SESSION['email_nguoi_dung'];
if(isset($_POST['sbm'])){

  $txtPassword_old=$_POST["txtPassword_old"];
  $txtPassword_new=$_POST["txtPassword_new"];
  $re_txtPassword_new=$_POST["re_txtPassword_new"];
  if( $re_txtPassword_new!=$txtPassword_new){
      echo "
            <script type='text/javascript'>
                window.alert('Mật khẩu nhập lại chưa trùng khớp');
                window.location.href='admindoimatkhau.php';
            </script>
    ";

  }
  else{
    
      $sql= "SELECT * FROM tbl_admin where email='$email' and password='$txtPassword_old'";
      
      $result=$con -> query($sql);
      if($result->num_rows<=0){
        echo "
                <script type='text/javascript'>
                    window.alert('Mật khẩu cũ không chính xác');
                    window.location.href='admindoimatkhau.php';
                </script>
    ";

      }
      else{
         $sql_update = "UPDATE tbl_admin SET password='$txtPassword_new' WHERE email='$email'";
          if($con -> query($sql_update)===True){
          
            echo "
                <script type='text/javascript'>
                    window.alert('Đổi mật khẩu thành công');
                    window.location.href='index.php';
                </script>
    ";
         }
         else{
            echo "
                <script type='text/javascript'>
                    window.alert('Lỗi khi đổi mật khẩu');
                    window.location.href='admindoimatkhau.php';
                </script>
    ";
            }
      }
      
  }
}
