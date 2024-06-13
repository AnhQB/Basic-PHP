<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang chủ</title>
</head>
<body>
<h1>Đây là trang chủ</h1>
<?php 
require 'connect.php';

//phần tìm kiếm 1
	$tim_kiem='';
	
	//nêu có biến tìm kiếm trên thanh đia chỉ thì lấy giá trị về
	if(isset($_GET['tim_kiem'])){
		$tim_kiem=$_GET['tim_kiem'];
		
	}
//phần phân trang
	$trang=1;
	if(isset($_GET['trang'])){
		$trang=$_GET['trang'];
	}

	$sql_so_tin_tuc= "select count(*) from tin_tuc where tieu_de like '%$tim_kiem%'" ;
	$mang_so_tin_tuc=mysqli_query($ket_noi,$sql_so_tin_tuc);
	$ket_qua_so_tin_tuc=mysqli_fetch_array($mang_so_tin_tuc);
	$so_tin_tuc=$ket_qua_so_tin_tuc['count(*)'];

	$so_tin_tuc_tren_1_trang=1;

	$so_trang= ceil($so_tin_tuc/$so_tin_tuc_tren_1_trang);

	//die($so_trang); //in ra và dừng tại dòng này

	$bo_qua=$so_tin_tuc_tren_1_trang*($trang-1);

//phần tìm kiếm 2
	

	//câu truy vấn
	$sql="select * from tin_tuc
	where tieu_de like '%$tim_kiem%'

	limit $so_tin_tuc_tren_1_trang offset $bo_qua;
	";
	//giới hạn số bài tin tức trong 1 trang và ko in ra số bài của trang trước


	$ket_qua= mysqli_query($ket_noi,$sql);//chạy câu truy vấn


?>

<a href="form_insert.php">Thêm bài viết</a>

<table border="1px solid black">
	<caption>
		<form>
			<input type="search" name="tim_kiem" value="<?php echo $tim_kiem ?>">
		</form>
	</caption>

	<tr>
		<th>Mã</th>
		<th>Tiêu đề</th>
		<th>Ảnh</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<!-- duyệt mảng  -->

	<?php foreach ($ket_qua as $tung_bai): ?>
		<tr>
			<td><?php echo $tung_bai['ma'] ?></td>
			<!-- tạo thẻ a để khi ấn vào từng tiêu đề sẽ hiển thị bài đăng đấy
				kèm theo mã bài báo để thực hiện câu truy vấn
			 -->
			<td><a href="show.php?ma=<?php echo $tung_bai['ma'] ?>">
				<?php echo $tung_bai['tieu_de'] ?></a>
			</td>

			<td><img src="<?php echo $tung_bai['anh'] ?>" height='100'></td>
			<td>
				<a href="form_update.php?ma=<?php echo $tung_bai['ma'] ?>">
				Sửa
				</a>
			</td>
			<td>
				<a href="delete.php?ma=<?php echo $tung_bai['ma'] ?>">
					Xóa
				</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>

<!-- in ra các trang  -->
<?php for($i=1; $i<=$so_trang; $i++){ ?>
	<a href="?trang=<?php echo $i?>
	&tim_kiem=<?php echo $tim_kiem?> 
	">

		<?php echo $i ?>
	</a>
<?php } ?>

<?php mysqli_close($ket_noi) ?>
</body>
</html>