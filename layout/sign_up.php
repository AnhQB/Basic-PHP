<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
		if(isset($_GET['error'])){
	?>
		<p style="color: red;"><?php echo $_GET['error'] ?></p>
	<?php }  ?>

	<?php 
		if(isset($_GET['success'])){
	?>
		<p style="color: blue;"><?php echo $_GET['success'] ?></p>
	<?php }  ?>
	
	<form method="post" action="process_signup.php">
		<h1>Form dang ky</h1>
		Tên
		<input type="text" name="name"><br>
		Email
		<input type="email" name="email"><br>
		Password
		<input type="Password" name="password"><br>
		<button>Dang ky</button>
	</form>
</body>
</html>