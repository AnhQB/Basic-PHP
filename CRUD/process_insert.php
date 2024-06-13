<?php

$tieu_de= $_POST['tieu_de'];
$noi_dung= $_POST['noi_dung'];
$anh= $_POST['anh'];

// // hàm kết nối với DB 'máy chủ', 'tài khoản', 'mật khẩu', 'DB'
// $ket_noi= mysqli_connect('localhost','root','12345','learn_crud');
// //dùng để hiểu dữ liệu nhập vào là unicode
// mysqli_set_charset($ket_noi,'utf8');

require 'connect.php'; 
//câu truy vấn DB
$sql="insert into tin_tuc(tieu_de, noi_dung,anh)
values('$tieu_de','$noi_dung','$anh')";


//die($sql); //vừa là echo(in ra câu chuỗi) và dừng ngày tại dòng đấy

//chạy câu truy vấn trên
mysqli_query($ket_noi, $sql);

//in ra lỗi nếu có
$loi=mysqli_error($ket_noi);
echo "$loi";

//đóng kết nối
mysqli_close($ket_noi);