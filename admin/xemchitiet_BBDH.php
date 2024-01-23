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
                <h1 class="mt-4">Chi tiết phiếu đổi hàng</h1>
                <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li> -->
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header" >
							
							<i class="fas fa-home"></i><a style="color:black;text-decoration:none" href="index.php"><b>Trang chủ</b></a> ||<i class="fas fa-table me-1"></i> Phiếu đổi hàng
							<a href="BBDH.php" class="btn btn-primary" style="margin-left:500px"><b>Phiếu đổi hàng </b></a>							
							<a href="doihang.php" class="btn btn-primary" style="margin-left:20px"><b>Yêu cầu đổi hàng </b></a>
                            </div>
        <div class="col-md-12">
<?php
	//tồn tại khi ấn xem đơn hàng
	$maBBDH = $_GET['maBBDH']; //lấy lại mã hàng từ bên liệt kê đơn hàng muốn xem
	$sql_chitiet1 = mysqli_query($con,"SELECT * FROM tbl_doihang as a,tbl_chitietdh as b, tbl_nhanvien as c, tbl_hoadonban as d, tbl_sanpham as e
	WHERE a.maBBDH=b.maBBDH AND a.maHDB=d.MaHDB AND a.maNVDH=c.maNV AND b.maSP=e.maSP AND a.maBBDH='$maBBDH'"); //select theo cùng mã hàng// SELECT tbl_donhang.maBBDH, tensanpham, tbl_donhang.soluong, giasale, ngaythang FROM tbl_donhang,tbl_sanpham 
	// WHERE tbl_donhang.idsanpham=tbl_sanpham.idsanpham AND tbl_donhang.maBBDH='$maBBDH'"); //select theo cùng mã hàng
	
	$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_doihang as a,tbl_chitietdh as b, tbl_nhanvien as c, tbl_hoadonban as d, tbl_sanpham as e
	WHERE a.maBBDH=b.maBBDH AND a.maHDB=d.MaHDB AND a.maNVDH=c.maNV AND b.maSP=e.maSP AND a.maBBDH='$maBBDH'"); //select theo cùng mã hàng// SELECT tbl_donhang.maBBDH, tensanpham, tbl_donhang.soluong, giasale, ngaythang FROM tbl_donhang,tbl_sanpham 


	// $sql_chitiet1 = mysqli_query($con,"SELECT * FROM tbl_doihang as a,tbl_doihang as b, tbl_nhanvien as c, tbl_khachhang as d, tbl_sanpham as e
	// WHERE a.maBBDH=b.maBBDH AND a.maKH=d.MaKH AND a.maNV=c.maNV AND b.maSP=e.maSP AND a.maBBDH='$maBBDH'");

	//sql tính tổng
	//$sql_total=mysqli_query($con, "SELECT sum(a.soluongxuat*b.dongia) as total FROM tbl_doihang as a join tbl_sanpham as b on a.maSP=b.maSP WHERE a.maBBDH=$maBBDH");		

	//lấy ra mã MV, tenNV, kh cho phiếu
	$sql_NV_KH=mysqli_query($con, "SELECT * FROM tbl_doihang as a join tbl_nhanvien as b join tbl_khachhang as c join tbl_hoadonban as d
									on a.maNVDH=b.maNV and d.maKH=c.maKH and a.maHDB=d.maHDB
									WHERE a.maBBDH=$maBBDH");

?>
				<?php 
					$row_NV_KH = mysqli_fetch_array($sql_NV_KH);
					$row_phieu1= mysqli_fetch_array($sql_chitiet1);	 
				?> 
			
		<div class="card-body" >
					<h4 style="text-align:center"><b>PHIẾU ĐỔI HÀNG</b></h4>
				
					<table style="width:100%">
						<tr>
							<td><b> Nhân viên lập phiếu:</b> <?php echo $row_NV_KH['tenNV'] ?> </td>
							<td ><p style="color:white">......................................................</p><td>	
							<td style="padding-right:0"> <b>Ngày lập phiếu: </b> <?php echo $row_phieu1['ngaylap'] ?>  </td>
						</tr>
						<tr>
							<td><b>Khách hàng:</b>  <?php echo $row_NV_KH['tenKH'] ?> <td>	
						</tr>
						<tr>
							<td> <b>Mã hóa đơn bán: </b> <?php echo $row_phieu1['maHDB'] ?> </td>
						</tr>
						<!-- <tr>
							<td> <b>Lý do đổi hàng: </b> <?php echo $row_phieu1['lydo'] ?> </td>
						</tr> -->
					</table >
				
<br>
			<form action="" method="POST">
				<table class="table table-bordered " >
					<tr style="background:lightblue">
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
						<td style="text-align: center"><?php echo $row_phieu['soluongdoi']; ?></td>
						<!-- <td style="text-align: center"><?php //echo $row_phieu['dongia']; ?></td> -->
						<td style="text-align: center"><?php echo $row_phieu['DVT']; ?></td>
						<!-- tính tổng tiền của từng sp -->
						<!-- <td style="text-align: right"><?php //echo number_format($row_phieu['soluongxuat']*$row_phieu['dongia']).'VND'; ?></td> -->
						<!-- <td><?php //echo $row_phieu['ngaylap'] ?></td> -->
						<!-- lấy mã hàng khi chọn xử lý 0 or 1 -->
						<!-- <input type="hidden" name="maBBDH_xuly" value="<?php //echo $row_phieu['maBBDH'] ?>"> -->
					</tr>
						
<?php
} 
?> 

<!-- <?php // $row_total=mysqli_fetch_array($sql_total)	?>
					<tr>
						<td colspan="6" style="padding-left: 30px"> <b>Tổng tiền </b></td>
						<td style="text-align: right"><?php //echo number_format($row_total['total'] ) ?>VND</td>
					</tr>
					 -->
				</table>
				
				<a class="btn btn-success" style="margin-left:950px;color:white" href="inBBDH.php?maBBDH=<?php echo $row_phieu1['maBBDH'] ?>">
				<i class="fas fa-print"></i> In phiếu </a>
		</div>
			</form>
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