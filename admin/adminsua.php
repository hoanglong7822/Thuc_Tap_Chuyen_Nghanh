<?php
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
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Eleven Silver | Admin | Cập nhật quản trị viên</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include("layout/nav.php");
        ?>
            <?php
                $id=$_GET["id"];
                $sql1="SELECT * FROM tbl_admin where idadmin='".$id."'";
                $kq1 = mysqli_query($con, $sql1);
                $row1 = mysqli_fetch_array($kq1);
            ;?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Cập nhật quản trị viên</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="adminsuaxuly.php" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txthoten" type="text" placeholder="Họ tên" name="txthoten" value ="<?php echo $row1["adten"];?>"/>
                                                <label for="txthoten">Họ tên</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input  class="form-control" id="txtchucvu" type="text" placeholder="Chức vụ" name="txtchucvu" value ="<?php echo $row1["chuc_vu"];?>"/>
                                                <label for="txtchucvu">Chức vụ</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtemail" type="email" placeholder="name@example.com" name="txtemail" value ="<?php echo $row1["ademail"];?>"/>
                                                <label for="txtemail">Email</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <input type="hidden" name="txtid" value ="<?php echo $row1["idadmin"];?>">
                                                <input type="submit" name="btnSubmit" value="Cập nhập">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Banking Academy</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>