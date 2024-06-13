<style type="text/css">
	.tung_san_pham{
		width: 33%;
		border: 1px solid black;
		height: 200px;
		float: left;
		text-align: center;
	}
	.image{
		height: 100px;
	}
</style>

<?php 
	require 'admin/connect.php';
	$sql="select *from products";
	$result=mysqli_query($connect,$sql);

?>
<div id="giua">
	<?php foreach ($result as $each): ?>
		<div class="tung_san_pham">
			<img class="image" src="admin/products/photos/<?php echo $each['image'] ?>" alt="">
			<h1>
				<?php echo $each['name'] ?>
			</h1>
			<p><?php echo $each['price'] ?>$</p>

			<a href="product.php?id=<?php echo $each['id'] ?>">
				Xem them >>
			</a>
		</div>
	<?php endforeach ?>
</div>