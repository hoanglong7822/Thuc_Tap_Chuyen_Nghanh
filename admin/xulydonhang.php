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
;?>
<?php
	include('../db/connect.php');
?>
<?php 
// if(isset($_POST['capnhatdonhang'])){  //tồn tại khi ấn cập nhật đơn hàng
// 	$xuly = $_POST['xuly'];   //lấy lại tình trạng xử lý 
// 	$maPXH = $_POST['maPXH_xuly'];  // lấy lại mã hàng vừa cập nhật
// 	$sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET tinhtrang='$xuly' WHERE maPXH='$maPXH'"); //cập nhật lại tình trạng của mã hàng vừa ấn cập nhật  NHƯNG NGÀY ĐẶT TỰ ĐỘNG THAY ĐỔI LUÔN
// 	$sql_update_giaodich = mysqli_query($con,"UPDATE tbl_giaodich SET tinhtrangdon='$xuly' WHERE magiaodich='$maPXH'");  //bảng giao dịch tạo ra để admin xem ls giao dịch của kh
// }
?>
<?php
	// if(isset($_GET['xoadonhang'])){  //tồn tại khi ấn xoá đơn hàng
	// 	$maPXH = $_GET['xoadonhang'];  //lấy lại mã đơn hàng vừa ấn xoá
	// 	$sql_delete = mysqli_query($con,"DELETE FROM tbl_donhang WHERE maPXH='$maPXH'"); //kết nối và xoá trong bảng đơn hàng nhưng bảng khách hàng và giao dịch vẫn còn dữ liệu
	// 	header('Location:xulydonhang.php');
	// } 
	// if(isset($_GET['xacnhanhuy'])&& isset($_GET['maPXH'])){
	// 	$huydon = $_GET['xacnhanhuy'];
	// 	$magiaodich = $_GET['maPXH'];
	// }else{
	// 	$huydon = '';
	// 	$magiaodich = '';
	// }
	// $sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET huydon='$huydon' WHERE maPXH='$magiaodich'");
	// $sql_update_giaodich = mysqli_query($con,"UPDATE tbl_giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");
?>
<?php 
// if(isset($_POST['capnhatdonhang'])){  //tồn tại khi ấn cập nhật đơn hàng
// 	$tinhtrang = $_POST['tinhtrang'];   //lấy lại tình trạng xử lý 
// 	$maPXH = $_POST['maPXH'];  // lấy lại mã hàng vừa cập nhật
// 	$sql_update_phieu = mysqli_query($con,"UPDATE tbl_phieuxuathang  SET tinhtrang='$tinhtrang' WHERE maPXH='$maPXH'"); //cập nhật lại tình trạng của mã hàng vừa ấn cập nhật  NHƯNG NGÀY ĐẶT TỰ ĐỘNG THAY ĐỔI LUÔN
// 	$sql_update_chitiet = mysqli_query($con,"UPDATE tbl_chitietpxh SET tinhtrang='$tinhtrang' WHERE maPXH='$maPXH'");  //bảng giao dịch tạo ra để admin xem ls giao dịch của kh
// }
?>
<?php
	if(isset($_GET['xoadonhang'])){  //tồn tại khi ấn xoá đơn hàng
		$maphieu = $_GET['xoadonhang'];  //lấy lại mã đơn hàng vừa ấn xoá
		$sql_delete = mysqli_query($con,"DELETE FROM tbl_donhang WHERE maPXH='$maPXH'"); //kết nối và xoá trong bảng đơn hàng nhưng bảng khách hàng và giao dịch vẫn còn dữ liệu
		header('Location:xulydonhang.php');
	} 
	if(isset($_GET['xacnhanhuy'])&& isset($_GET['maPXH'])){
		$huydon = $_GET['xacnhanhuy'];
		$magiaodich = $_GET['maPXH'];
	}else{
		$huydon = '';
		$magiaodich = '';
	}
	// $sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET huydon='$huydon' WHERE maPXH='$magiaodich'");
	// $sql_update_giaodich = mysqli_query($con,"UPDATE tbl_giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Eleven Silver | Quản trị hệ thống</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
	<body class="sb-nav-fixed">
	<?php
	include("layout/nav.php");
	?>
    <div id="layoutSidenav">
    <?php   include("layout/aside.php"); ?>
    <div id="layoutSidenav_content">
    <main>
		<div class="row">
            <div class="container-fluid px-4">
                <h1 class="mt-4" style="text-align:center">PHIẾU XUẤT HÀNG</h1></br>
						<div class="card mb-4">
							<div class="card-header" >
								<i class="fas fa-home"></i><a style="text-decoration:none; color:black" href="index.php"><b>Trang chủ</b></a> || 
								<i class="fas fa-table me-1"></i> Danh sách phiếu xuất hàng
	</div>
				<?php
				$sql_select1 = mysqli_query($con,"SELECT * FROM tbl_phieuxuathang as a join tbl_chitietpxh as b join tbl_nhanvien as c 
				join tbl_khachhang as d join tbl_hoadonban as e on a.maPXH=b.maPXH and a.maHDB=e.maHDB and e.maNV=c.maNV and e.maKH=d.maKH 
				WHERE a.tinhtrang = 'Từ chối' or a.tinhtrang='Đã xử lý' or a.tinhtrang='Chưa xử lý' GROUP BY a.maPXH ASC "); 

				?> 
				<div class="card-body" >
				<table id="datatablesSimple">
				<thead>
					<tr>
						<th>STT</th>
						<th>Mã phiếu</th>
						<!-- <th>Nhân viên </th> -->
						<th>Tên khách hàng</th>
						<th>Tình trạng đơn hàng</th>
						<th>Ngày đặt</th>
						<th>Quản lý</th>
					</tr>
				</thead>
					<?php
					$i = 0;
					while($row_phieu = mysqli_fetch_array($sql_select1)){  //chạy lần lượt theo mã  hàng
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						<!-- lấy ra mã hàng -->
						<td><?php echo $row_phieu['maPXH']; ?></td> 
						
						<!-- <td><?php echo $row_phieu['tenNV']; ?></td>  -->
							<!-- lấy ra tên khách, ngày đặt, ghi chú -->
						<td><?php echo $row_phieu['tenKH']; ?></td> 
							
						<td>
							<?php
							if($row_phieu['tinhtrang']=="Chưa xử lý"){ //kiểm tra tình trạng đơn hàng từ csdl xong hiển thị lên
								echo 'Chưa xử lý'; //=0 là chưa xl
							}elseif ($row_phieu['tinhtrang']=="Từ chối"){
								echo 'Bị từ chối';
							}elseif ($row_phieu['tinhtrang']=="Đã xử lý"){
								echo 'Đã xử lý'; 
							}
						?>
						</td><td><?php echo $row_phieu['ngaylap'] ?></td>

					
						
						<!-- lấy mã hàng muốn xoá/ muốn xem chi tiết -->
						<td>
						 <a class="btn btn-primary"  href="xemchitietdonhang.php?maPXH=<?php echo $row_phieu['maPXH'] ?>">Xem chi tiết </a>
						</td>
					</tr>
					 <?php
					} 
					?> 
					<script>
    function Del(name){
        return confirm('Bạn có chắc chắn muốn xóa đơn hàng của ' + name + "?");
    }
</script>
				</table>
			</div>
		
		<!-- Xem chi tiết -->
		<?php
			if(isset($_GET['quanly'])=='xemchitiet'){  //tồn tại khi ấn xem đơn hàng
				$maPXH = $_GET['maPXH']; //lấy lại mã hàng từ bên liệt kê đơn hàng muốn xem
				// $sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_phieuxuathang as a,tbl_chitietpxh as b, tbl_nhanvien as c, tbl_khachhang as d, tbl_sanpham as e
				// WHERE a.maPXH=b.maPXH AND a.maKH=d.MaKH AND a.maNV=c.maNV AND b.maSP=e.maSP AND a.maPXH='$maPXH'"); //select theo cùng mã hàng// SELECT tbl_donhang.maPXH, tensanpham, tbl_donhang.soluong, giasale, ngaythang FROM tbl_donhang,tbl_sanpham 
				$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_phieuxuathang as a join tbl_chitietpxh as b join tbl_sanpham as c 
				join tbl_hoadonban as d on a.maPXH=b.maPXH and b.maSP=c.maSP and a.maHDB=d.maHDB where a.maPXH='$maPXH'"); 
				
				
				//select theo cùng mã hàng// SELECT tbl_donhang.maPXH, tensanpham, tbl_donhang.soluong, giasale, ngaythang FROM tbl_donhang,tbl_sanpham 

				// WHERE tbl_donhang.idsanpham=tbl_sanpham.idsanpham AND tbl_donhang.maPXH='$maPXH'"); //select theo cùng mã hàng
		?>
				
				<!-- <div class="col-md-10"> -->
				<div class="card-body">
				<!-- <h4>Xem chi tiết đơn hàng</h4> -->
			<form action="" method="POST">
			
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã hàng</th>
						<th>Tên sản phẩm</th>
						<th>Số lượng</th>
						<th>Giá</th>
						<th>DVT</th>
						<th>Thành tiền</th>
						<!-- <th>Ngày đặt</th> -->
					</tr>
					
				<?php
					$i = 0;
					while($row_phieu = mysqli_fetch_array($sql_chitiet)){ //chuyển thành mảng, lần lượt i
						$i++;
				?> 
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_phieu['maPXH']; ?></td>
						<td><?php echo $row_phieu['tenSP']; ?></td>
						<td><?php echo $row_phieu['soluongxuat']; ?></td>
						<td><?php echo $row_phieu['dongia']; ?></td>
						<td><?php echo $row_phieu['DVT']; ?></td>
						<!-- tính tổng tiền của từng sp -->
						<td><?php echo number_format($row_phieu['soluongxuat']*$row_phieu['dongia']).'vnđ'; ?></td>
						<!-- <td><?php echo $row_phieu['ngaylap'] ?></td> -->
						
						<!-- lấy mã hàng khi chọn xử lý 0 or 1 -->
						<!-- <input type="hidden" name="maPXH_xuly" value="<?php echo $row_phieu['maPXH'] ?>"> -->

					</tr>
					
					<a href="indonhang.php?maPXH=<?php echo $row_phieu['maPXH'] ?>">In phiếu </a>
					
					 <?php
					} 
					?> 
					
					<tr>
						<th colspan="6">Tổng tiền</th>
						<th></th>
					</tr>
				</table>

				<!-- <a href="indonhang.php?maPXH=<?php echo $row_phieu['maPXH'] ?>">In phiếu </a>
				<a href="?quanly=xemchitiet&maPXH=<?php echo $row_phieu['maPXH'] ?>">Xem chi tiết </a> -->
					<!-- cập nhật tình trạng -->
				<!-- <br><h4>Cập nhật tình trạng đơn hàng</h4>
				<select class="form-control" name="xuly">  
				<option value="0">Chưa xử lý</option>
  					<option value="1">Đang xử lý </option>
					<option value="2">Đã xử lý </option>
			
				</select><br>

				<input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
			</form>
				</div>

			<?php
			}
			?> 
			

		
			 
			</div>
                    </div>
                </main>
                <?php //include("layout/footer.php"); ?>
            </div>
        </div>
       <?php include("adminFooter.php"); ?>
    </body>
</html>