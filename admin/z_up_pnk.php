<?php 
session_start();
include("config/connection.php"); 
 $a=(isset($_SESSION['s']))?$_SESSION['s']: 1;
 $sql="INSERT INTO `tbl_phieunhapkho`(`maNV`, `ngaylap`) VALUES (1,CURRENT_DATE)";
 if($con->query($sql))
{
    $id_order=mysqli_insert_id($con); 
    foreach($a as $key => $value)
    {
       $sl=$value['sl'];
       $id=$value['id'];
 mysqli_query($con,"UPDATE `tbl_sanpham` SET `soluong`=`soluong` + $sl WHERE maSP=$id; ");
    mysqli_query($con,"INSERT INTO `tbl_chitietpnk`(`maPNK`, `maSP`, `soluong`) VALUES ($id_order,$id,$sl);");
  
}}
 unset($_SESSION['s']);
 header('location:z_pnk.php');
print_r($a);
?>