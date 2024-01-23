<?php 
    // Mục đích: kiểm tra xem bạn có quyền truy cập trang này hay không thông qua biến $_SESSION['da_dang_nhap'] = 1 --> được phép truy cập; và ngược lại.
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
        <?php include("adminHeader.php"); ?>

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
        selector: '#sanpham_chitiet'
        });

        tinymce.init({
        selector: '#sanpham_mota'
        });
        </script>
    </head>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Thêm sản phẩm</h3></div>
                                        <div class="card-body">
                                            <form method="GET" action="sanphamthemmoithuchien.php" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="tensanpham" placeholder="Tên sản phẩm" />
                                                <label for="tensanpham">Tên sản phẩm</label>
                                            </div>
                                            <!-- <div class="form-floating mb-3">
                                                <textarea class="form-control" id="sanpham_chitiet" name="sanpham_chitiet" placeholder="Chi tiết sản phẩm"></textarea>
                                                <label for="sanpham_chitiet">Chi tiết sản phẩm</label>
                                            </div>   -->
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="sanpham_mota" name="mota" placeholder="Mô tả sản phẩm"></textarea>
                                                <label for="mota">Mô tả sản phẩm</label>
                                            </div> 
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="dongia" placeholder="Nhập giá sản phẩm" />
                                                <label for="dongia">Đơn giá sản phẩm</label>
                                            </div> 
                                        
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="soluong" placeholder="Nhập số lượng sản phẩm" />
                                                <label for="soluong">Số lượng</label>
                                            </div> 

                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="DVT" name="DVT" placeholder="Đơn vị tính"></textarea>
                                                <label for="mota">DVT</label>
                                            </div> 
                                            <!-- <div class="form-floating mb-3">
                                                <b>Loại sản phẩm:  </b> <br>
                                               <select name="sanpham_active">
                                                        <option value="0">0</option>
                                                        <option value="1" selected="">1</option>                                                   
                                                </select>  
                                                
                                            </div>  -->
                                            <div class="form-floating mb-3">
                                            <?php
                                                    include("config/connection.php");
                                                    $sql_category="SELECT * FROM tbl_loaisanpham";
                                                    $result_category=$con->query($sql_category);
                                                            
                                            ?> 

                                             <div class="form-floating mb-3">
                                                <b style="margin-right: 70px">Loại sản phẩm:  </b>
                                               <select name="idtheloai">
                                                    <?php while ($row_category=$result_category->fetch_assoc()) {?>
                                                        <option value="<?php echo $row_category['maloai'];?>">

                                                            <?php echo $row_category['tenloai']; ?>
                                                            
                                                        </option>
                                                    <?php } ?>
                                                </select>  
                                                </div>
                                                <div>
                                             
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                            <?php
                                                    include("config/connection.php");
                                                    $sql_category="SELECT * FROM tbl_nhacungcap";
                                                    $result_category=$con->query($sql_category);
                                                            
                                            ?> 

                                             <div class="form-floating mb-3">
                                                <b style="margin-right: 70px">Nhà cung cấp:  </b>
                                               <select name="idnhacungcap">
                                                    <?php while ($row_category=$result_category->fetch_assoc()) {?>
                                                        <option value="<?php echo $row_category['maNCC'];?>">

                                                            <?php echo $row_category['tenNCC']; ?>
                                                            
                                                        </option>
                                                    <?php } ?>
                                                </select>  
                                                </div>
                                                <div>
                                             
                                            </div>
                                                                                  
                                            
                                            <div class="mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="sbm">Thêm sản phẩm
                                                </button>
                                                <button class="btn btn-danger" type="reset" >Làm mới
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

