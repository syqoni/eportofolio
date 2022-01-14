<?php
	session_start();
	error_reporting(0);
	
	//$con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
	
	$server="localhost";
	$username="id15532618_root";
	$password="Sakura2020.21";
	$db="id15532618_eporto";

	$con=mysqli_connect($server,$username,$password,$db);

	if(mysqli_connect_errno()){
		header('location:admin_index.php');
	}
?>