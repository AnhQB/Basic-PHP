<?php 
if(empty($_POST['id'])){
	header("location:index.php?error=Phải truyền mã để sửa");
	exit;
}

$id=$_POST['id'];
if(empty($_POST['name']) || empty($_POST['address']) ||empty($_POST['phone']) ||empty($_POST['image'])){
	header("location:form_update.php?id=$id&error=Phải điển đẩy đủ bru");
	exit;
}

$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$image=$_POST['image'];

require '../connect.php';
$sql="update manufacturers set 
name='$name',
address='$address',
phone='$phone',
image='$image' where id='$id'
";

mysqli_query($connect,$sql);

//xét lỗi câu truy vấn
$error=mysqli_error($connect);
mysqli_close($connect);

if(empty($error)){
	header('location:index.php?success=Sửa thành công');
}else{
	header("location:form_update.php?id=$id&error=Lỗi truy vấn");
}


