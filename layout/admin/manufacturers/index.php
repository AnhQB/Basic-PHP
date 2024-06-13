<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	
	Đây là khu vực quản lý nhà sản xuất
	<br>
	<a href="form_insert.php">Thêm</a>
	<br>
	<?php 
		require '../menu.php';
	?>
	<?php 
		require '../connect.php';
		$sql="select *from manufacturers";
		$result=mysqli_query($connect,$sql);
		// đếm số bản ghi sau khi truy vấn câu sql
		$rows=mysqli_num_rows($result);
	?>

	<?php if($rows>=1) {?>

	<table border="1", width="100%">
		<tr>
			<th>Mã</th>
			<th>Tên</th>
			<th>Địa chỉ</th>
			<th>Điện thoại</th>
			<th>Ảnh</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		<?php foreach ($result as $each): ?>
			<tr>
				<td><?php echo $each['id'] ?></td>
				<td><?php echo $each['name'] ?></td>
				<td><?php echo $each['address'] ?></td>
				<td><?php echo $each['phone'] ?></td>
				<td><img height="100"> src="<?php echo $each['image'] ?>"></td>
				<td><a href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a></td>
				<td><a href="delete.php?id=<?php echo $each['id'] ?>">Xóa</a></td>
			</tr>
		<?php endforeach ?>
	</table>
	<?php } else{?>
		<h2 style="color: red;">Chưa có dữ liệu</h2>
	<?php } ?>
</body>
</html>