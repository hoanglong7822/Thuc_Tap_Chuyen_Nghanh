
<?php
session_start();
include("config/connection.php"); 

$action=(isset($_GET['action']))?$_GET['action']:'add';
$sl=(isset($_GET['sl']))?$_GET['sl']:1;

if(isset($_GET['maSP']))
{
    $id=$_GET['maSP'];
}
//else echo"ko có";
$query=mysqli_query($con,"select * from tbl_sanpham where maSP = $id ");
if($query)
{
    $product= mysqli_fetch_assoc($query);
}
$item=
[
    'id'=>$product['maSP'],
    'name'=>$product['tenSP'],
    'sl'=>$sl
];
if($action=='update')
{
    $_SESSION['a'][$id]['sl']=$sl;
}
    if(isset($_SESSION['a'][$id]))

        {
            $_SESSION['a'][$id]['sl'] = $sl;
        }
        else
        {
            $_SESSION['a'][$id]=$item;
        }
// if($action= 'delete')
// {
//     unset($_SESSION['a'][$id]);
// }
header('location:z_pnh.php');
echo"<pre>";
print_r($_SESSION['a']);
?>