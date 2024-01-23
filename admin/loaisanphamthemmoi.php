<?php 
    // // Mục đích: kiểm tra xem bạn có quyền truy cập trang này hay không thông qua biến $_SESSION['da_dang_nhap'] = 1 --> được phép truy cập; và ngược lại.
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Thêm loại sản phẩm</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="loaisanphamthemmoithuchien.php" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="category_name" type="text" placeholder="Tên loại Sản Phẩm" name="tentheloai" />
                                                <label for="tentheloai">Tên Loại Sản Phẩm</label>
                                            </div>
                                                                                      
                                            <div class="mt-4 mb-0">                                           
                                                <input type="hidden" name="category_id" >
                                                <button class="btn btn-primary" type="submit" name="sbm">Thêm
                                                </button>
                                              
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

