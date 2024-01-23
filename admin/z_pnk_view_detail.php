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
                <h1 class="mt-4">Chi tiết phiếu nhập kho</h1>
                <ol class="breadcrumb mb-4">
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header" >
							<i class="fas fa-table me-1"></i>
							<a style="text-decoration:none; color:black"href="z_pnk_detail.php"><b>Phiếu nhập kho</b></a> 
                            </div>
        <div class="col-md-12">
		<div class="card-body" >
					<h4 style="text-align:center"><b>CHI TIẾT NHẬP KHO</b></h4> <br>
                    <?php
                     $maPNK= $_GET['maPNK']; 
	$sql_nv = mysqli_query($con,"SELECT * FROM tbl_phieunhapkho as a INNER join tbl_nhanvien as b on a.maNV=b.maNV WHERE a.maPNK=$maPNK;"); 
    $row = mysqli_fetch_array($sql_nv);
                    ?>
                    <table style="width:100%">
						<tr>
							<td><b> Nhân viên bán hàng:</b> <?php echo 'long'; ?> </td>
							<td ><p style="color:white">......................................................</p><td>	
							<td style="padding-right:0"> <b>Ngày lập phiếu: </b> <?php echo $row['ngaylap'] ?>  </td>
						</tr>
						<tr>
							<td><b>Mã phiếu nhập kho:</b>  <?php echo $row['maPNK'] ?> <td>	
							
						</tr>
					</table >
			<form action="" method="POST">
				<table class="table table-bordered " >
                                                <tr style="background: lightblue">
                                                    <th style="text-align: center">Thứ tự</th>
                                                    <th style="text-align: center">Mã hàng</th>
                                                    <th style="text-align: center">Tên sản phẩm</th>
                                                    <th style="text-align: center">Số lượng</th>
                                                    <th style="text-align: center">DVT</th>
                                                </tr>
					
                            <?php
                                        $i = 0;
                                        $maPNK= $_GET['maPNK']; 
                                        $sql = "SELECT b.maSP,b.tenSP,a.soluong,b.dongia FROM `tbl_chitietpnk` as a INNER JOIN tbl_sanpham as b ON a.maSP=b.maSP WHERE a.maPNK=$maPNK;   
                                                                             ";                  
                                        $san_pham = $con -> query($sql);
                                        $i=0;
                                        while ($row_phieu = $san_pham ->fetch_assoc()) {
                                        $i++;
                            ?> 
                                                <tr>
                                                    <td colspan="" style="text-align: center"><?php echo $i; ?></td>
                                                    <td style="text-align: center"><?php echo $row_phieu['maSP']; ?></td>
                                                    <td style="text-align: center"><?php echo $row_phieu['tenSP']; ?></td>
                                                    <td style="text-align: center"><?php echo $row_phieu['soluong']; ?></td>
                                                    <td style="text-align: center"><?php echo $row_phieu['dongia']; ?></td>				
                                                </tr>
                            <?php
                            } 
                            ?> 

					
				</table>
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
</body>
</html> 