<?php
include('../tfpdf/tfpdf.php');
include("config/connection.php");


$pdf = new tFPDF();
$pdf->AddPage("0");
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World!');
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',16);


$maBBDH = $_GET['maBBDH']; //lấy lại mã hàng từ bên liệt kê đơn hàng muốn xem
	// $sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_doihang as 
	// a,tbl_chitietdh as b, tbl_nhanvien as c, 
	// tbl_hoadonban as d, tbl_sanpham as e
	// WHERE a.maBBDH=b.maBBDH AND a.maHDB=d.MaHDB 
	// AND a.maNVDH=c.maNV AND b.maSP=e.maSP AND a.maBBDH='$maBBDH'");
	
	$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_doihang as a join tbl_chitietdh as b join tbl_hoadonban as c join tbl_sanpham as d 
	on  a.maBBDH=b.maBBDH and b.maSP=d.maSP and a.maHDB=c.maHDB WHERE a.maBBDH=$maBBDH");

	$sql_chitiet1 = mysqli_query($con,"SELECT * FROM tbl_doihang as a, tbl_hoadonban as d, tbl_khachhang as e
	WHERE a.maHDB=d.maHDB and  d.maKH=e.maKH AND a.maBBDH='$maBBDH'");
	
	$sql_chitiet2 = mysqli_query($con,"SELECT * FROM tbl_doihang as a,tbl_chitietdh as b, tbl_nhanvien as c, tbl_hoadonban as d, tbl_sanpham as e
	WHERE a.maBBDH=b.maBBDH AND a.maHDB=d.MaHDB AND a.maNVDH=c.maNV AND b.maSP=e.maSP AND a.maBBDH='$maBBDH'");

	$sql_total=mysqli_query($con, "SELECT sum(a.soluongdoi*dongia) as total FROM tbl_chitietdh as a join tbl_sanpham as b on a.maSP=b.maSP WHERE a.maBBDH=$maBBDH");
	
	$pdf->Write(15,'BIÊN BẢN ĐỔI HÀNG'); 

    $pdf->Ln(25);
    $width_cell=array(50,220);
    $pdf->SetFillColor(255,255,255); 
    $pdf->Cell($width_cell[0],10,'Tên công ty ',1,0,'L',true);
	$pdf->Cell($width_cell[1],10,'CÔNG TY TNHH ĐẦU TƯ VÀ CÔNG NGHỆ TBHP',1,0,'L',true);
    $pdf->Ln();

	$width_cell=array(50,220);
    $pdf->SetFillColor(255,255,255); 
$row1=mysqli_fetch_array($sql_chitiet1);
$pdf->Cell($width_cell[0],10, 'Tên khách hàng ',1,0,'L',true);
    $pdf->Cell($width_cell[1],10, $row1['tenKH'],1,0,'L',true);
    $pdf->Ln();

    


	$width_cell=array(15,35,80,30,40,30,40);
    $pdf->SetFillColor(193,229,252); 
	$pdf->Cell($width_cell[0],10,'STT',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
    $pdf->Cell($width_cell[5],10,'DVT',1,0,'C',true);
	$pdf->Cell($width_cell[6],10,'Thành tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
	while($row_phieu = mysqli_fetch_array($sql_chitiet)){
		$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row_phieu['maSP'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row_phieu['tenSP'],1,0,'C',$fill);
    
	$pdf->Cell($width_cell[3],10,$row_phieu['soluongdoi'],1,0,'C',$fill);
    $pdf->Cell($width_cell[4],10,number_format($row_phieu['dongia']),1,0,'C',$fill);
    $pdf->Cell($width_cell[5],10,$row_phieu['DVT'],1,0,'C',$fill);
	
	$pdf->Cell($width_cell[6],10,number_format($row_phieu['soluongdoi']*$row_phieu['dongia']),1,1,'R',$fill);
	// $fill = !$fill;
    $fill=false;
	}
    $width_cell=array(230,40);
	
    $pdf->Cell($width_cell[0],10,'Tổng tiền',1,0,'L',true);
	$row_total=mysqli_fetch_array($sql_total);
	$pdf->Cell($width_cell[1],10,number_format($row_total['total']),1,1,'R',$fill);


	


    $pdf->Output();
?>