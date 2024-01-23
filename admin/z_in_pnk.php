<?php
include('../tfpdf/tfpdf.php');
include("config/connection.php");


$pdf = new tFPDF();
$pdf->AddPage("0");
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World!');
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',16);


$maPNK = $_GET['maPNK']; //lấy lại mã hàng từ bên liệt kê đơn hàng muốn xem
		// $sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_phieuxuathang as a,tbl_chitietpxh as b, tbl_nhanvien as c, tbl_khachhang as d, tbl_sanpham as e
		// WHERE a.maPXH=b.maPXH AND a.maKH=d.MaKH AND a.maNV=c.maNV AND b.maSP=e.maSP AND a.maPXH='$maPXH'"); 
$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_chitietpnk as a inner join tbl_sanpham as b on a.maSP=b.maSP where a.maPNK=$maPNK;");
//$sql_total=mysqli_query($con, "SELECT sum(a.soluongxuat*b.dongia) as total FROM tbl_chitietpxh as a join tbl_sanpham as b on a.maSP=b.maSP WHERE a.maPXH=$maPXH");
$pdf->Write(15,'PHIẾU NHẬP KHO'); 
    // $pdf->Write(20,''); 
    // $pdf->Write(21,''); 
    // $pdf->Write(12,'CT: CÔNG TY TNHH ĐẦU TƯ VÀ CÔNG NGHỆ TBHP');
    $pdf->Ln(25);
    $width_cell=array(230);
    $pdf->SetFillColor(255,255,255); 
    $pdf->Cell($width_cell[0],10,'Tên công ty: CÔNG TY TNHH ĐẦU TƯ VÀ CÔNG NGHỆ TBHP',1,0,'L',true);
    $pdf->Ln();
// while($row_phieu = mysqli_fetch_array($sql_chitiet)){
//     $width_cell=array(50,220);
//     $pdf->SetFillColor(193,229,252); 
//     $pdf->Cell($width_cell[0],10,'Tên khách hàng',1,0,'C',true);
//     $pdf->Cell($width_cell[1],10,$row_phieu['tenKH'],1,1,'C',$fill);
//     $fill = false;}

    

    

    $pdf->Ln();

	$width_cell=array(15,35,80,30,40,30);
    $pdf->SetFillColor(193,229,252); 
	$pdf->Cell($width_cell[0],10,'STT',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
    $pdf->Cell($width_cell[5],10,'DVT',1,0,'C',true);
	//$pdf->Cell($width_cell[6],10,'Thành tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
	
    $pdf->Ln();
	while($row_phieu = mysqli_fetch_array($sql_chitiet)){
		$i++;
        // $pdf->SetFillColor(235,236,236); 
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row_phieu['maSP'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row_phieu['tenSP'],1,0,'C',$fill);
    
	$pdf->Cell($width_cell[3],10,$row_phieu['soluong'],1,0,'C',$fill);
    $pdf->Cell($width_cell[4],10,number_format($row_phieu['dongia']),1,0,'C',$fill);
    $pdf->Cell($width_cell[5],10,$row_phieu['DVT'],1,0,'C',$fill);
	
	//$pdf->Cell($width_cell[6],10,number_format($row_phieu['soluongxuat']*$row_phieu['dongia']),1,1,'R',$fill);
	// $fill = !$fill;
    $fill=false;
	}
    $width_cell=array(190,40);
	
 //   $pdf->Cell($width_cell[0],10,'Tổng tiền',1,0,'L',true);
//	$row_total=mysqli_fetch_array($sql_total);
		// $pdf->Cell($width_cell[1],10,'Tổng tiền',1,1,'C',true); 
//		$pdf->Cell($width_cell[1],10,number_format($row_total['total']),1,1,'R',$fill);

    // $pdf->Ln(10);
	// $pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại website của chúng tôi.');
	


    $pdf->Output();
?>