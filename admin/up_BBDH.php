<?php 
session_start();
include("config/connection.php"); 
$manv=$_GET["manv"];
$mahdb=$_GET["mahdb"];
 $a=(isset($_SESSION['s']))?$_SESSION['s']: 1;
 $sql="INSERT INTO `tbl_doihang`(`maNVDH`, `maHDB`, `ngaylap`) VALUES ('$manv','$mahdb',CURRENT_DATE)";
 if($con->query($sql))
{
    $id_order=mysqli_insert_id($con); 
    foreach($a as $key => $value)
    {
       $sl=$value['sl'];
       $id=$value['id'];
//  mysqli_query($con,"UPDATE `tbl_sanpham` SET `soluong`=`soluong` + $sl WHERE maSP=$id; ");
    mysqli_query($con,"INSERT INTO `tbl_chitietdh`(`maBBDH`, `maSP`, `soluongdoi`) VALUES ($id_order,$id,$sl)");
    // -- INSERT INTO `tbl_chitietpnk`(`maPNK`, `maSP`, `soluong`) VALUES ($id_order,$id,$sl);";
    // (SELECT maBBDH from tbl_doihang where maHDB=$mahdb)
}}
 unset($_SESSION['s']);
 header('location:BBDH.php');
print_r($a);
?>