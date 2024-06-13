<?php 
	
	$name=$_POST['name'];
	$image=$_FILES['image']; //khi ảnh dược đẩy lên thì nó được lưu trong thư mục tạm thời 'temp'
							//nên chúng ta phải chuyển ảnh này vào trong server của ta
	$price=$_POST['price'];
	$description=$_POST['description'];
	$manufacturer_id=$_POST['manufacturer_id'];

	$folder='photos/'; //thư mục sẽ lưu ảnh vào

	
	$file_extension=explode('.', $image['name'])[1];
	//vd: file cũ có tên là a.png
	//thì sau khi explode cắt ra bằng dấu '.'
	//thì có 2 string là "a" và "png"
	//vị trí thứ 0 là a, 1 là png(lấy đuôi ảnh)

	//đặt tên file mới: mili giây hiện tại+ đuôi file ảnh
	$file_name = time() . "." . $file_extension;
	$path_file = $folder . $file_name; 

	//die($path_file);
	//lưu file với dường dẫn folder/name_file

	move_uploaded_file($image["tmp_name"], $path_file);
		//chuyển từ 	thư mục tạm thời tmp ---> path_file

	require '../connect.php';
	$sql="insert into products(name,image,price,description,manufacturer_id)
		values('$name','$file_name','$price','$description','$manufacturer_id')";

	mysqli_query($connect,$sql);
	$error=mysqli_error($connect);

	mysqli_close($connect);

	header("location:index.php?success=Thêm thành công");

