<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
	require 'connect.php'; 

	$ma=$_GET['ma'];
	$sql="select *from tin_tuc where ma=$ma";
	$ket_qua=mysqli_query($ket_noi,$sql);
	$bai_tin_tuc=mysqli_fetch_array($ket_qua);
?>

<form method="post" action="process_update.php">
	<!-- thêm mã dưới dạng ẩn để thực hiện câu truy vấn trong file process_update -->
	<input type="hidden" name="ma" value="<?php echo $ma ?>">
	Tiêu đề
	<input type="text" name="tieu_de" value="<?php echo $bai_tin_tuc['tieu_de'] ?>">
	<br>
	Nội dung
	<textarea name="noi_dung"> <?php echo $bai_tin_tuc['noi_dung'] ?></textarea>
	<br>
	Link ảnh
	<input type="text" name="anh" value="<?php echo $bai_tin_tuc['anh'] ?>">
	<br>
	<button>Sửa</button>
</form>
<?php mysqli_close($ket_noi); ?>
</body>
</html>