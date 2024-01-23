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
<?php include("adminHeader.php"); ?>
<body class="sb-nav-fixed">
    <!-- nav-->
    <?php include("layout/nav.php"); ?>
    <div id="layoutSidenav">
        <!-- layoutSidenav_nav-->
        <?php   include("layout/aside.php"); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4" style="text-align:center">GỢI Ý NHẬP HÀNG</h2></br>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                    </ol> -->
                    <div class="card mb-4">
                        <div class="card-header">      <i class="fas fa-home"> </i>  <a style="text-decoration: none;color:black" href="index.php"><b>Trang chủ</b></a>
                            <i class="fas fa-table me-1"></i>
                            Danh sách gợi ý sản phẩm 
                            <i style="margin-left: 800px"> </i>
                            
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>                                           
                                        <th>Số lượng tồn</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>                                           
                                        <th>Số lượng tồn</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                        // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
                                include("config/connection.php");


                                        // 2. Viết câu lệnh truy vấn để lấy ra dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)

                                $sql="
                                SELECT a.maSP, a.tensp as tenSPP, a.soluong, sum(b.soluongxuat) as tongxuat from tbl_sanpham a join tbl_chitietpxh b on a.masp=b.masp join tbl_phieuxuathang c on b.maPXH=c.maPXH 
                                where (a.soluong<20) AND (CURRENT_DATE()-c.ngaylap<30) group by a.masp HAVING SUM(b.soluongxuat)>20
                                ";

                                $result=$con->query($sql);

                                $i=1;
                                while ($row=$result->fetch_assoc()) {?>
                                    <tr>
                                        <th scope="row"><?php echo $i++;?></th> 
                                        <td><?php echo $row['maSP']; ?></td>
                                        <td><?php echo $row['tenSPP']; ?></td>
                                        <td><?php echo $row['soluong']; ?></td>
                                        <td><a  style="color: white" class="btn btn-primary"  href="z_pnh.php?maSP=<?php echo $row['maSP']; ?>">Chọn</a></td>

                                        <!-- <td><a  style="color: white" class="btn btn-primary"  href="z.pnh.php?maSP=<?php //echo $row['maSP']; ?>">Chọn</a></td> -->
                                       <!--  <td>
                                            <a onclick=" return Del('<?php echo $row['tenloai']; ?>')" href="loaisanphamxoa.php?maloai=<?php echo $row['maloai']; ?>">Xóa</a>
                                        </td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php //include("layout/footer.php"); ?>
    </div>
</div>
<?php include("adminFooter.php"); ?>
<script>
    function Del(name){
        return confirm('Bạn có chắc chắn muốn xóa loại sản phẩm: ' + name + "?");
    }
</script>
</body>
</html>

