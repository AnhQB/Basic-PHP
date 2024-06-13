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
		$manufacturers=mysqli_query($connect,$sql);
	?>

	<?php 
		$id=$_GET['id'];
		$sql="select *from products where id=$id";
		$result=mysqli_query($connect,$sql);
		$each=mysqli_fetch_array($result);
	?>

	<!-- enctype: dùng để mã hóa file truyền vào  -->
	<form method="post" action="process_update.php" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
		Tên
		<input type="text" name="name" value="<?php echo $each['name'] ?>">
		<br>
		Đổi ảnh
		<!-- //khi ảnh dược đẩy lên thì nó được lưu trong thư mục tạm thời 'temp'
			nên chúng ta phải chuyển ảnh này vào trong server của ta -->
		<input type="file" name="image_new">
		<br>
		<!-- truyền lên ảnh cũ -->
		Hoặc giữ ảnh cũ
		<img src="photos/<?php echo $each['image'] ?>" height='100'>
		<!-- và truyền thêm ảnh cũ lên dạng hidden -->
		<input type="hidden" name="image_old" value="<?php echo $each['image'] ?>">

		<br>
		Giá
		<input type="number" name="price" value="<?php echo $each['price'] ?>">
		<br>
		Mô tả
		<textarea name="description"><?php echo $each['description'] ?></textarea>
		<br>	
		Nhà sản xuất
		<select name="manufacturer_id">
			<?php foreach ($manufacturers as $manufacturer): ?>
				<option value="<?php echo $manufacturer['id'] ?>"
					<?php if($each['manufacturer_id']==$manufacturer['id']) {?>
						selected 
					<?php } ?>
				>
				<!-- chọn manufacturer của san phẩm -->

					<?php echo $manufacturer['name'] ?>
				</option>
			<?php endforeach ?>
		</select>	
		<br>
		<button>Sửa</button>
	</form>
</body>
</html>