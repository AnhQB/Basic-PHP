<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<?php 
		if(empty($_GET['id'])){
			header('location:index.php?error:Phải truyền mã để sửa');
		}

		$id=$_GET['id'];
		require '../connect.php';
		$sql="select *from manufacturers where id='$id'";
		$result=mysqli_query($connect,$sql);
		$each=mysqli_fetch_array($result);


	?>
	<?php if(isset($_GET['error'])){?>
		<span style="color:red;"><?php echo $_GET['error'] ?></span>
	<?php } ?>

	<form action="process_update.php" method="post">
		<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
		Tên
		<input type="text" name="name" value="<?php echo $each['name']?>">
		<br>
		Địa chỉ
		<textarea name="address"><?php echo $each['address']?></textarea>
		<br>
		Điện thoại
		<input type="text" name="phone" value="<?php echo $each['phone'] ?>">
		<br>
		Ảnh
		<input type="text" name="image" value="<?php echo $each['image'] ?>">
		<br>
		<button>Sửa</button>
	</form>
</body>
</html>