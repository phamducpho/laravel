<?php
	$server=$_SERVER['SERVER_NAME'];
	$user='root';
	$pass='';
	$db='dacn';
	$con=mysqli_connect($server,$user,$pass,$db) or die("connect fail");
	mysqli_query($con,"SET NAMES 'utf8'");
?>