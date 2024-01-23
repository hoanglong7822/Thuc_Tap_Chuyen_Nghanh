<?php
session_start();
if(!isset($_SESSION['dangnhap_home']))
{
    echo "
                <script type='text/javascript'>
                    window.alert('Không có quyền truy cập');
                    window.location.href='dangnhap.php';
                </script>
            ";
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Thêm quản trị viên</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="adminthemmoixuly.php" enctype="multipart/form-data">                                            
                                            <div class="form-floating mb-3 ">
                                                        <input class="form-control" id="txtTenNguoiDung" name = "txtTenNguoiDung" type="text" placeholder="Điền họ tên của bạn" />
                                                        <label for="txtTenNguoiDung">Họ và Tên</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtEmail" name= "txtEmail" type="email" placeholder="name@example.com" />
                                                <label for="txtEmail">Email</label>
                                            </div>
                                             <div class="form-floating mb-3">
                                                <input class="form-control" id="txtmk" name= "txtmk" type="password" placeholder="Nhập vào mật khẩu của bạn" />
                                                <label for="txtmk">Mật khẩu</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtchucvu" name= "txtchucvu" type="text" placeholder="Nhập vào chức vụ của bạn"/>
                                                <label for="txtchucvu">Chức vụ</label>
                                            </div>
                                            <div class="mt-4 mb-0" >
                                                <button class="btn btn-primary" type="submit" name="submit">Thêm quản trị viên
                                                </button>                                               
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </main>
                <?php //include("layout/footer.php"); ?>
            </div>
        </div>
       <?php include("adminFooter.php"); ?>
    </body>
</html>