<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TBHP| Admin </title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

    <body class="primary">
    <div class="container mt-5" style="background:white" >
    
  <div class="row">
    <div class="col-sm-7">
        <img src="../ha2.jpg" width=770px height=505px>
    </div>
    <div class="col-sm-5">
    <div class="card shadow-lg border-0 rounded-lg" style="">
    <center> <img style="margin: 10px 0 10px 0"src="../logo.png" alt="LOGO" width=55%> </center>
         <div class="card-header" style="background:white"><h4 class="text-center font-weight-light my-4" style="font-size:25px; background:white">Đăng nhập</h4></div>
        <div class="card-body">
            <form method="POST" action="dangnhapkiemtra.php">
                <div class="form-floating mb-3">
                    <input class="form-control" id="txttendangnhap" type="text" placeholder="Tên đăng nhập" name="txttendangnhap"  />
                    <label for="ten_dang_nhap">Tên đăng nhập</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="matkhau" type="password" placeholder="Password" name="matkhau" />
                    <label for="matkhau">Mật khẩu</label>
               </div>
                <div class="form-check mb-3">
                    <button type="button" class="float-right text-decoration-none" style="color: #0D6EFD; border: none; outline:none; background-color: white" onclick="if (txtpassword.type == 'text') txtpassword.type = 'password'; else txtpassword.type = 'text';">Hiện mật khẩu</button>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <input type="submit" value="Đăng nhập">
                </div>
            </form>
        </div>
        </div>
    </div>
   
</div>
</div> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>