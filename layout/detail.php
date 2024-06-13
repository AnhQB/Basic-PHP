<style type="text/css">
</style>

<?php 
	$id=$_GET['id'];
	require 'admin/connect.php';
	$sql="select *from products where id=$id";
	$result=mysqli_query($connect,$sql);
	$each =mysqli_fetch_array($result);

?>
<div id="giua">
	
	
	<img height="250" src="admin/products/photos/<?php echo $each['image'] ?>" alt="">
	<h1>
		<?php echo $each['name'] ?>
	</h1>
	<p><?php echo $each['price'] ?>$</p>
	<p><?php echo $each['description'] ?></p>

	
</div>