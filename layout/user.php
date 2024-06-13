<?php 
	session_start(); 
	if(empty($_SESSION['id'])){
		header("location:sign_in.php?error:Dang nhap di cu");
		exit;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	Đây là trang người dùng, Hello babe 
	<?php echo $_SESSION['name'] ?>
	<a href="sign_out.php">Đăng xuất</a>
</body>
</html>