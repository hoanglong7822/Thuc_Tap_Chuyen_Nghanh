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
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tech Store | Quản trị hệ thống</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
            $thang=$_POST['month'];
             $year=$_POST['year'];
        ?>
        <!-- nav-->
        <?php include("layout/nav.php"); ?>
        <div id="layoutSidenav">
            <!-- layoutSidenav_nav-->
            <?php   include("layout/aside.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Thống kê đơn hàng tháng <?php echo $thang.' năm ' .$year;?> </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>||
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <a href="export_BCDH.php?thang=<?php echo $thang;?>&nam=<?php echo $year;?>">
                                    <button class="btn btn-primary" type="submit" name="sbm">Xuất file Excel
                                                </button>
                                </a>
                              
                                                
                                        
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Mã khách đặt hàng</th>
                                            <th>Thời gian đặt</th>
                                            <th>Tổng sản phẩm</th>
                                            <th>Tổng tiền</th>
                                          
                                            <th>Xem chi tiết</th>
                                            
                                            <th>Trạng thái xử lý</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã hóa đơn</th>
                                            <th>Mã khách đặt hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Tổng sản phẩm</th>
                                            <th>Tổng tiền</th>
                                           
                                            <th>Xem chi tiết</th>
                                            
                                            <th>Trạng thái xử lý</th>
                                            <th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
                                        include("config/connection.php");
 
                                        // 2. Viết câu lệnh truy vấn để lấy ra dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
                                        $sql = "SELECT a.iddonhang,idkhachhang,ngaythang,sum(tbl_chitiethd.soluong) as 'tongsanpham', sum(thanhtien) as 'tongtien',tinhtrang FROM `tbl_donhang` as a inner join tbl_chitiethd ON a.iddonhang=tbl_chitiethd.idhoadon
                                                WHERE month(ngaythang)=$thang AND year(ngaythang)=$year
                                                GROUP BY a.iddonhang ";
                                        // 3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                        $donhang = $con -> query($sql);

                                        // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy
                                        $i=0;
                                            while ($row = $donhang ->fetch_assoc()) {
                                            $i++;
                                        ;?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row["iddonhang"];?></td>
                                            <td><?php echo $row["idkhachhang"];?></td>
                                            <td><?php echo $row["ngaythang"];?></td>
                                            <td><?php echo $row["tongsanpham"];?></td>
                                            <td><?php echo $row["tongtien"];?></td>
                                          
                                            <!-- <td><a href="donhangxemchitiet.php?idhoadon=<?php// echo $row["iddonhang"];?>">Xem chi tiết</a></td> -->
                                           <td><a href="?quanly=xemdonhang&mahang=<?php echo $row['mahang'] ?>" >Xem </a></td>
                                             <td>
                                                <select name="select-status" class="select-status" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                                    <option value="donhang_sua_trang_thai.php?idhoadon=<?php echo $row['iddonhang'] ?>&tinhtrang=0" <?php if($row["tinhtrang"]==0) echo "selected"; ?>>Chưa giao hàng</option>
                                                    <option value="donhang_sua_trang_thai.php?idhoadon=<?php echo $row['iddonhang'] ?>&tinhtrang=1" <?php if($row["tinhtrang"]==1) echo "selected"; ?>>Đang giao hàng</option>
                                                    <option value="donhang_sua_trang_thai.php?idhoadon=<?php echo $row['iddonhang'] ?>&tinhtrang=2" <?php if($row["tinhtrang"]==2) echo "selected"; ?>>Giao hàng thành công</option>
                                                </select>
                                            </td>
                                            
                                        </tr>
                                        
                                    <?php
                                        }
                                    ;?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include("layout/footer.php"); ?>
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

