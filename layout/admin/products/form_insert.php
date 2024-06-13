<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php require '../menu.php';
		require '../connect.php';
		$sql="select * from manufacturers";
		$result=mysqli_query($connect,$sql);

	?>

	<!-- enctype: dùng để mã hóa file truyền vào  -->
	<form method="post" action="process_insert.php" enctype="multipart/form-data">
		Tên
		<input type="text" name="name">
		<br>
		Ảnh
		<!-- //khi ảnh dược đẩy lên thì nó được lưu trong thư mục tạm thời 'temp'
			nên chúng ta phải chuyển ảnh này vào trong server của ta -->
		<input type="file" name="image">
		<br>
		Giá
		<input type="number" name="price">
		<br>
		Mô tả
		<textarea name="description"></textarea>
		<br>	
		Nhà sản xuất
		<select name="manufacturer_id">
			<?php foreach ($result as $each): ?>
				<option value="<?php echo $each['id'] ?>">
					<?php echo $each['name'] ?>
				</option>
			<?php endforeach ?>
		</select>	
		<br>
		<button>Thêm</button>
	</form>
</body>
</html>