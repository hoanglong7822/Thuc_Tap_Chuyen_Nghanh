<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="nhom36_tbhp";
	$con=new mysqli($host,$user,$pass,$db); 
	mysqli_set_charset($con, 'UTF8');
	if($con->connect_error)
	{
		echo "Failled to connect to db.".mysqli_connect_error();
	}


?>