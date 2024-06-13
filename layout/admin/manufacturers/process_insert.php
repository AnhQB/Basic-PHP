<?php
if(empty($_POST['name'])){
	header('location:form_insert.php');
}
$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$image=$_POST['image'];

require '../connect.php';
$sql = "insert into manufacturers(name,address,phone,image)
values
('$name','$address','$phone','$image')
";
mysqli_query($connect,$sql);
mysqli_close($connect);

header("location:index.php?success=Thêm thành công");
