<?php 
	$email=addslashes($_POST['email']); //add thêm dấu / vào trước ký tự đặc biệt
	$name=$_POST['name'];
	$pass=$_POST['password'];

	require 'admin/connect.php';
	$sql="select count(*) from customers where email='$email'";
	$result=mysqli_query($connect,$sql);
	$number_row=mysqli_fetch_array($result)['count(*)'];
	if($number_row==1){
		header("location:sign_up.php?error=Trùng email");
		exit;
	}
	$sql="insert into customers(name,email,password) values('$name','$email','$pass')";
	mysqli_query($connect,$sql);

	$sql="select id from customers where email='$email'";
	$result=mysqli_query($connect,$sql);
	$id=mysqli_fetch_array($result)['id'];
	session_start();
	$_SESSION['id']=id;
	$_SESSION['name']=name;


	mysqli_close($connect);
	header("location:sign_in.php?success=Đăng ký thành công rồi!");