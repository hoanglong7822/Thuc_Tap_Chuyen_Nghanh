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
                <h1 class="mt-4">Chi tiết phiếu xuất hàng</h1>
                <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li> -->
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header" >
							
							<i class="fas fa-home"></i><a href="index.php">Trang chủ</a> || <i class="fas fa-table me-1"></i>Phiếu xuất hàng
							<a href="xuathang.php" class="btn btn-primary" style="margin-left:610px"><b> Phiếu xuất hàng </b></a>
                            </div>
        <div class="col-md-12">
<?php
//tồn tại khi ấn xem đơn hàng
$maPXH = $_GET['maPXH']; //lấy lại mã hàng từ bên liệt kê đơn hàng muốn xem
// $sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_phieuxuathang as a,tbl_chitietpxh as b, tbl_nhanvien as c, tbl_hoadonban as d, tbl_sanpham as e
// WHERE a.maPXH=b.maPXH AND a.maHDB=d.maHDB AND a.maNV=c.maNV AND b.maSP=e.maSP AND a.maPXH='$maPXH'"); //select theo cùng mã hàng// SELECT tbl_donhang.maPXH, tensanpham, tbl_donhang.soluong, giasale, ngaythang FROM tbl_donhang,tbl_sanpham 

$sql_chitiet = mysqli_query($con,"SELECT * from tbl_phieuxuathang as a join tbl_chitietpxh as b join tbl_sanpham as c on a.maPXH=b.maPXH and b.maSP=c.maSP WHERE a.maPXH='$maPXH'");

$sql_chitiet1 = mysqli_query($con,"SELECT * FROM tbl_phieuxuathang as a, tbl_chitietpxh as b, tbl_hoadonban as c, tbl_chitiethdb as d 
WHERE a.maPXH=b.maPXH and a.maHDB=c.maHDB and a.maHDB=d.maHDB AND a.maPXH='$maPXH'");

//sql tính tổng
$sql_total=mysqli_query($con, "SELECT sum(a.soluongxuat*b.dongia) as total FROM tbl_chitietpxh as a join tbl_sanpham as b on a.maSP=b.maSP WHERE a.maPXH=$maPXH");		

//lấy ra mã MV, tenNV, kh cho phiếu
$sql_NV_KH=mysqli_query($con, "SELECT a.maNV as nvxuat, d.maNV as nvban, d.maKH  
								FROM tbl_phieuxuathang as a join tbl_nhanvien as b join tbl_khachhang as c join tbl_hoadonban as d 
								WHERE a.maNV=b.maNV and d.maKH=c.maKH and b.maNV=d.maNV
								and a.maPXH=$maPXH");

?>
				<?php 
					$row_NV_KH = mysqli_fetch_array($sql_NV_KH);
					$row_phieu1= mysqli_fetch_array($sql_chitiet1);	 
				?> 
			
		<div class="card-body" >
					<h4 style="text-align:center"><b>PHIẾU XUẤT HÀNG</b></h4>
				
					<!-- <table style="width:100%">
						<tr>
							<td><b> Nhân viên lập phiếu:</b> <?php echo $row_NV_KH['tenNV'] ?> </td>
							<td ><p style="color:white">......................................................</p><td>	
							<td style="padding-right:0"> <b>Ngày lập phiếu: </b> <?php echo $row_phieu1['ngaylap'] ?>  </td>
						</tr>
						<tr>
							<td><b>Khách hàng:</b>  <?php echo $row_NV_KH['tenKH'] ?> <td>	
							
						</tr>
					</table > -->
				
<br>
			<form action="" method="POST">
				<table class="table table-bordered " >
					<tr>
						<th style="text-align: center">Thứ tự</th>
						<th style="text-align: center">Mã hàng</th>
						<th style="text-align: center">Tên sản phẩm</th>
						<th style="text-align: center">Số lượng</th>
						<!-- <th style="text-align: center">Giá</th> -->
						<th style="text-align: center">DVT</th>
						<!-- <th style="text-align: center">Thành tiền</th> -->
						<!-- <th>Ngày đặt</th> -->
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
						<td style="text-align: center"><?php echo $row_phieu['soluongxuat']; ?></td>
						<!-- <td style="text-align: center"><?php echo $row_phieu['dongia']; ?></td> -->
						<td style="text-align: center"><?php echo $row_phieu['DVT']; ?></td>
						<!-- tính tổng tiền của từng sp -->
						<!-- <td style="text-align: right"><?php echo number_format($row_phieu['soluongxuat']*$row_phieu['dongia']).'VND'; ?></td> -->
						<!-- <td><?php //echo $row_phieu['ngaylap'] ?></td> -->
						<!-- lấy mã hàng khi chọn xử lý 0 or 1 -->
						<!-- <input type="hidden" name="maPXH_xuly" value="<?php //echo $row_phieu['maPXH'] ?>"> -->
					</tr>
<?php
} 
?> 

<?php $row_total=mysqli_fetch_array($sql_total)	?>
					<!-- <tr>
						<td colspan="4" style="padding-left: 30px"> <b>Tổng tiền </b></td>
						<td style="text-align: right"><?php echo $row_total['total']  ?>VND</td>
					</tr> -->
					
				</table>
				<br>
				<a class="btn btn-danger" style="margin-left:100px;color:white" onclick="return tuchoi ('<?php echo $row_phieu1['maPXH'] ?>')" href="PXH_tuchoi.php?maPXH=<?php echo $row_phieu1['maPXH']; ?>"><b>Từ chối</b> </a>
				<a class="btn btn-warning" style="margin-left:120px;color:white" onclick="return chuaxuly  ('<?php echo $row_phieu1['maPXH'] ?>')" href="PXH_chuaxuly.php?maPXH=<?php echo $row_phieu1['maPXH']; ?>"> <b>Chưa xử lý </b></a>
				<a class="btn btn-success" style="margin-left:120px;color:white" onclick="return xuly ('<?php echo $row_phieu1['maPXH'] ?>')" href="PXH_xuly.php?maPXH=<?php echo $row_phieu1['maPXH']; ?>"><b> Lập phiếu xuất kho</b> </a>
				<a class="btn btn-success" style="margin-left:120px;color:white" onclick="return tbao ('<?php echo $row_phieu1['maPXH'] ?>')" href="PXH_tbaokhach.php?maPXH=<?php echo $row_phieu1['maPXH']; ?>"> <b>Thông báo KH</b> </a>
				
			
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
		return confirm('Bạn muốn lập phiếu xuất hàng cho phiếu mã ' + name + "?");	
		}
		function tbao(name){
			return confirm('Mail thông báo tới khách hàng sẽ được gửi bây giờ ?');
		}
		</script>
</body>
</html> 