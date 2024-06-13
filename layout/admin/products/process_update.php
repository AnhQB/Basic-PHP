<?php 
	$id=$_POST['id'];
	$name=$_POST['name'];
	$image_new=$_FILES['image_new']; //khi ảnh dược đẩy lên thì nó được lưu trong thư mục tạm thời 'temp'
	$image_old=$_POST['image_old'];		//nên chúng ta phải chuyển ảnh này vào trong server của ta

	if($image_new['size']>0){
		$folder='photos/'; //thư mục sẽ lưu ảnh vào


		$file_extension=explode('.', $image_new['name'])[1];
		//vd: file cũ có tên là a.png
		//thì sau khi explode cắt ra bằng dấu '.'
		//thì có 2 string là "a" và "png"
		//vị trí thứ 0 là a, 1 là png(lấy đuôi ảnh)

		//đặt tên file mới: mili giây hiện tại+ đuôi file ảnh
		$file_name = time() . "." . $file_extension;
		$path_file = $folder . $file_name; 

		//die($path_file);
		//lưu file với dường dẫn folder/name_file

		move_uploaded_file($image_new["tmp_name"], $path_file);
		//chuyển từ 	thư mục tạm thời tmp ---> path_file
	}else{
		$file_name="$image_old";
	}

	$price=$_POST['price'];
	$description=$_POST['description'];
	$manufacturer_id=$_POST['manufacturer_id'];

	

	require '../connect.php';
	$sql="update products
	set 
	name='$name',
	image='$file_name',
	price='$price',
	description='$description',
	manufacturer_id='$manufacturer_id'
	where
	id='$id'
	";

	mysqli_query($connect,$sql);
	$error=mysqli_error($connect);

	mysqli_close($connect);

	header("location:index.php?success=Sửa thành công");

