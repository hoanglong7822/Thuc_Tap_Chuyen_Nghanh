<?php
include('../tfpdf/tfpdf.php');
include("config/connection.php");


$pdf = new tFPDF();
$pdf->AddPage("0");
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World!');
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',12);


$maPNH = $_GET['maPNH']; 
$sql= mysqli_query($con,"SELECT *,a.soluong as sl,a.soluong*b.dongia as tt FROM tbl_chitietpnh as a inner join tbl_sanpham as b on a.maSP=b.maSP where a.maPNH=$maPNH;");
class PDF extends tFPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}
}

$pdf->Cell(270,10,'CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM',5,100,'C');
$pdf->Ln(1);
$pdf->Cell(275,10,'Độc lập - tự do - hạnh phúc',5,100,'C');
$pdf->Ln(0);
$pdf->Cell(270,10,'_ _ _ _ _ _',5,100,'C');
$pdf->Ln(1);
$pdf->Cell(490,10,'Hà Nội, ngày    tháng    năm 2023',5,100,'C');
$pdf->Ln(1);
$pdf->Cell(270,10,'HỢP ĐỒNG MUA THIẾT BỊ',5,100,'C'); 
$pdf->Write(15,'Căn cứ: Bộ luật dân sự 2015'); 
$pdf->Ln(6);
$pdf->Write(15,'Bên A: Ông.......................(Bên bán)'); 
$pdf->Ln(6);
$pdf->Write(15,'CMND số:...................Cấp tại............Ngày cấp.................'); 
$pdf->Ln(6);
$pdf->Write(15,'Mã số thuế.................SĐT.........................................'); 
$pdf->Ln(6);
$pdf->Write(15,'Địa chỉ................................................................'); 
$pdf->Ln(10);
$pdf->Write(15,'Bên B: Ông........................(Bên mua)');
$pdf->Ln(6);
$pdf->Write(15,'CMND số:...................Cấp tại............Ngày cấp.................'); 
$pdf->Ln(6);
$pdf->Write(15,'Mã số thuế.................SĐT.........................................'); 
$pdf->Ln(6);
$pdf->Write(15,'Địa chỉ................................................................'); 
$pdf->Ln(6);
$pdf->Write(15,'Cùng thỏa thuận kí kết hợp đồng số.....ngày.....tháng.....năm.....để mua bán trang thiết bị'); 
$pdf->Ln(10);
$pdf->Write(15,'ĐIỀU 1. NỘI DUNG CỦA HỢP ĐỒNG');
$pdf->Ln(6);
$pdf->Write(15,'1. Đối tượng của hợp đồng: Trang thiết bị');
$pdf->Ln(6);
$pdf->Write(15,'2. Địa điểm giao: 12 Chùa Bộc, Đống Đa, Hà Nội');
$pdf->Ln(10);
$pdf->Write(15,'ĐIỀU 2: THỜI HẠN THỰC HIỆN HỢP ĐỒNG');
$pdf->Ln(6);
$pdf->Write(15,'Hợp đồng được thực hiện từ ngày...tháng...năm đến ngày...tháng...năm... kể từ ngày kí kết hợp đồng');
$pdf->Ln(10);
$pdf->Write(15,'ĐIỀU 3: THỰC HIỆN HỢP ĐỒNG');



    // $pdf->Ln(25);
    // $width_cell=array(270);
    // $pdf->SetFillColor(255,255,255); 
    // $pdf->Cell($width_cell[0],10,' CÔNG TY TNHH ĐẦU TƯ VÀ CÔNG NGHỆ TBHP',10,0,'C',true);
    // $pdf->Ln();
    $pdf->Ln(25);

	$width_cell=array(15,20,50,30,40,30,35,30);
	$pdf->SetFillColor(192,192,192); 
	$pdf->Cell($width_cell[0],10,'STT',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã sp',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Đơn vị tính',1,0,'C',true); 
	$pdf->Cell($width_cell[6],10,'Thành tiền',1,1,'C',true); 
	$fill=false;
	$i = 0;
	while($row = mysqli_fetch_array($sql)){
		$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['maSP'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['tenSP'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['sl'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['dongia']),1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,$row['DVT'],1,0,'C',$fill);
	$pdf->Cell($width_cell[6],10,number_format($row['tt']),1,1,'C',$fill);
	$fill = !$fill;

	}
	$sql_total=mysqli_query($con, "SELECT sum(a.soluong*b.dongia) as total FROM tbl_chitietpnh as a join tbl_sanpham as b on a.maSP=b.maSP WHERE a.maPNH=$maPNH");

    $width_cell=array(185,35);
    $pdf->Cell($width_cell[0],10,'Tổng tiền',1,0,'L',true);
	$row_total=mysqli_fetch_array($sql_total);
	$pdf->Cell($width_cell[1],10,number_format($row_total['total']),1,1,'R',$fill);
	$pdf->Ln(10);
    $pdf->Cell(100,10,'ĐẠI DIỆN BÊN A                                                                                                               ĐẠI DIỆN BÊN B',5,100,'L');
    $pdf->Cell(100,10,'    Ký tên                                                                                                                                 Ký tên',5,100,'L');

    $pdf->Output();
?>