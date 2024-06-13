<?php 
	$ma=$_GET['ma'];

	require 'connect.php';

	$sql="delete from tin_tuc where ma=$ma";

	mysqli_query($ket_noi,$sql);
	mysqli_close($ket_noi);
