<?php 
    // Mục đích: kiểm tra xem bạn có quyền truy cập trang này hay không thông qua biến $_SESSION['da_dang_nhap'] = 1 --> được phép truy cập; và ngược lại.
    session_start();

    if(!isset($_SESSION['dangnhap_home'])) {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không được phép truy cập');
                window.location.href='dangnhap.php';
            </script>
        ";
    }
?>
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
<?php
    include('../db/connect.php');
?>

<div class="row">
            <div class="container-fluid px-4" >
                <h3 class="mt-4">Chi tiết phiếu đổi hàng</h3>
                <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li> -->
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header" >
                           
                            <i class="fas fa-home"></i><a href="index.php">Trang chủ</a> ||  <i class="fas fa-table me-1"></i> Biên bản đôi hàng
                            <a href="BBDH.php" class="btn btn-primary" style="margin-left:500px"><b> Phiếu đổi hàng </b></a>
                            <a href="doihang.php" class="btn btn-primary" style="margin-left:20px"><b> Phiếu đổi hàng </b></a>
                            </div>
        <div class="col-md-12">
<?php
//tồn tại khi ấn xem đơn hàng
$maBBDH = $_GET['maBBDH']; //lấy lại mã hàng từ bên liệt kê đơn hàng muốn xem
$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_doihang as a,tbl_chitietdh as b, tbl_nhanvien as c, tbl_hoadonban as d, tbl_sanpham as e
 WHERE a.maBBDH=b.maBBDH AND a.maHDB=d.maHDB AND a.maNVDH=c.maNV AND b.maSP=e.maSP AND a.maBBDH='$maBBDH'"); //select theo cùng mã hàng// SELECT tbl_donhang.maBBDH, tensanpham, tbl_donhang.soluong, giasale, ngaythang FROM tbl_donhang,tbl_sanpham 

$sql_chitiet = mysqli_query($con,"SELECT * from tbl_doihang as a join tbl_chitietdh as b join tbl_sanpham as c on a.maBBDH=b.maBBDH and b.maSP=c.maSP WHERE a.maBBDH=$maBBDH");

$sql_chitiet1 = mysqli_query($con,"SELECT * FROM tbl_doihang as a, tbl_chitietdh as b, tbl_hoadonban as c, tbl_chitiethdb as d 
 WHERE a.maBBDH=b.maBBDH and a.maHDB=c.maHDB and a.maHDB=d.maHDB AND a.maBBDH='$maBBDH'");

// //sql tính tổng
$sql_total=mysqli_query($con, "SELECT sum(a.soluongdoi*b.dongia) as total FROM tbl_chitietdh as a join tbl_sanpham as b on a.maSP=b.maSP WHERE a.maBBDH=$maBBDH");      

// //lấy ra mã MV, tenNV, kh cho phiếu
$sql_NV_KH=mysqli_query($con, "SELECT a.maNVDH as nvxuat, d.maNV as nvban, d.maKH  
                                FROM tbl_doihang as a join tbl_nhanvien as b join tbl_khachhang as c join tbl_hoadonban as d 
                                WHERE a.maNVDH=b.maNV and d.maKH=c.maKH and b.maNV=d.maNV
                                and a.maBBDH=$maBBDH");
// $sql11= "SELECT * from tbl_doihang as a join tbl_hoadonban as b on a.maHDB=b.maHDB join tbl_khachhang as c on b.maKH=c.maKH join tbl_nhanvien as d on a.maNVDH=d.maNV where a.maBBDH=$maBBDH";


?>
                <?php 
                    $row_NV_KH = mysqli_fetch_array($sql_NV_KH);
                    $row_phieu1= mysqli_fetch_array($sql_chitiet1);  
                    // $row_sql11 = mysqli_fetch_array($sql11);
                ?> 
            
        <div class="card-body" >
                    <h4 style="text-align:center"><b>BIÊN BẢN ĐỔI HÀNG</b></h4>
                
                    <!-- <table style="width:100%">
                        <tr>
                            <td><b> Nhân viên lập phiếu:</b> <?php// echo $row_NV_KH['tenNV'] ?> </td>
                            <td ><p style="color:white">......................................................</p><td>  
                            <td style="padding-right:0"> <b>Ngày lập phiếu: </b> <?php //echo $row_phieu1['ngaylap'] ?>  </td>
                        </tr>
                        <tr>
                            <td><b>Khách hàng:</b>  <?php //echo $row_sql11['tenKH'] ?> <td>  
                            
                        </tr>
                    </table > -->
                    <!-- <b> Nhân viên lập phiếu:</b> <?php echo $row_sql11['tenNV'] ?> 
                    <b>Ngày lập phiếu: </b> <?php echo $row_phieu1['ngaylap'] ?>   -->
<br>
            <form action="" method="POST">
                <table class="table table-bordered " >
                    <tr>
                        <th style="text-align: center">Thứ tự</th>
                        <th style="text-align: center">Mã hàng</th>
                        <th style="text-align: center">Tên sản phẩm</th>
                        <th style="text-align: center">Số lượng đổi</th>
                        <th style="text-align: center">DVT</th>
                    </tr>
                    
<?php
    $i = 0;
    while($row_phieu = mysqli_fetch_array($sql_chitiet)){ //chuyển thành mảng, lần lượt i
        $i++;
?> 
                    <tr>
                        <td colspan="" style="text-align: center"><?php echo $i; ?></td>
                        <td style="text-align: center"><?php echo $row_phieu['maSP']; ?></td>
                        <td style="text-align: center"><?php echo $row_phieu['tenSP']; ?></td>
                        <td style="text-align: center"><?php echo $row_phieu['soluongdoi']; ?></td>
                        <!-- <td style="text-align: center"><?php echo $row_phieu['dongia']; ?></td> -->
                        <td style="text-align: center"><?php echo $row_phieu['DVT']; ?></td>
                        <!-- <td style="text-align: right"><?php echo number_format($row_phieu['soluongxuat']*$row_phieu['dongia']).'VND'; ?></td> -->
                    </tr>
<?php
} 
?> 

<?php $row_total=mysqli_fetch_array($sql_total) ?>
                    <!-- <tr>
                        <td colspan="4" style="padding-left: 30px"> <b>Tổng tiền </b></td>
                        <td style="text-align: right"><?php echo $row_total['total']  ?>VND</td>
                    </tr> -->
                    
                </table>
                <br>
                <a class="btn btn-danger"  style="margin-left:100px;color:white" onclick="return tuchoi ('<?php echo $row_phieu1['maBBDH'] ?>')" href="BBDH_tuchoi.php?maBBDH=<?php echo $row_phieu1['maBBDH']; ?>"><b>Từ chối </b></a>
                <a class="btn btn-warning" style="margin-left:180px;color:white" onclick="return chuaxuly ('<?php echo $row_phieu1['maBBDH'] ?>')" href="BBDH_chuaxuly.php?maBBDH=<?php echo $row_phieu1['maBBDH']; ?>"> <b>Chưa xử lý </b></a>
                <a class="btn btn-success" style="margin-left:180px;color:white" onclick="return xuly ('<?php echo $row_phieu1['maBBDH'] ?>')" href="BBDH_xuly.php?maBBDH=<?php echo $row_phieu1['maBBDH']; ?>"> <b>Lập phiếu đổi kho  </b> </a>
				<a class="btn btn-success" style="margin-left:120px;color:white" onclick="return tbao ('<?php echo $row_phieu1['maBBDH'] ?>')" href="BBDH_tbaokhach.php?maBBDH=<?php echo $row_phieu1['maBBDH']; ?>"> <b>Thông báo KH </b></a>
                
            
</p><br>
</div>
</form>
</div>
</div>

</div>
</div>
</main>
</div>
</div>
<?php include("adminFooter.php"); ?>
        <script>
        function tuchoi(name){
        return confirm('Bạn muốn từ chối xuất kho với mã phiếu ' + name + "?");
        }</script>
        <script>
        function chuaxuly (name){
        return confirm('Kho chưa sẵn sàng xử lý mã phiếu ' + name + "?");
        }</script>
        <script>
        function xuly(name){
         return confirm('Bạn muốn lập phiếu xuất hàng cho phiếu mã ' + name + "?" );
        }
        </script> 
</body>
</html> 
