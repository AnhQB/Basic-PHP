<?php 
	
	$tieu_de=$_POST['tieu_de'];
	$noi_dung=$_POST['noi_dung'];
	$anh=$_POST['anh'];
	$ma=$_POST['ma'];

	//chèn thêm file kết nối chứa câu lệnh kết nối
	//**khai báo biến gì trong file này thì dòng lệnh dưới vẫn dùng được biến đó 
	//include 'connect.php'; //nếu file ko tồn tại thì code ở dưới vẫn chạy

	require 'connect.php'; //... thì code ở dưới ko chạy

	//require_once 'connect.php';   //chỉ chèn file một lần nếu lần sau có require 'connect.php' thì sẽ không chèn

	$sql="update tin_tuc
	set
	tieu_de='$tieu_de',
	noi_dung='$noi_dung',
	anh='$anh' where ma='$ma'";

	mysqli_query($ket_noi,$sql);
	mysqli_close($ket_noi);


