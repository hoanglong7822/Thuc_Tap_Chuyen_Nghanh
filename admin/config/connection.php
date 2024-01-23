<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="n36_TTCN";
	$con = new mysqli($host,$user,$pass,$db);
	if($con->connect_error)
	{
		die ("Lỗi".$con->connect_error);
	}

?>