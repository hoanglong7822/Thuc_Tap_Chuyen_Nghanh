<?php
session_start();

if(isset($_POST))
{
    if(!isset($_SESSION['s'][$_POST['ma']]))
    {
      $_SESSION['s'][$_POST['ma']]=[];
    }
    $item=
[
    'ma'=>$_POST['ma'],
    'ten'=>$_POST['ten'],
    'soluong'=>$_POST['soluong'],
];
//$cart=(isset($_SESSION['cart']))?$_SESSION['cart']: [];


    $_SESSION['s'][$_POST['ma']]=$item;
    foreach($_SESSION['a'][$_POST['ma']] as $key=>$value)
                       {
                       echo $value;
                        }
}
echo"<pre>";
var_dump($item);
echo"<pre>";
var_dump($_SESSION['s']);
?>