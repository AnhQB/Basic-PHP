<?php 
session_start();
//session_destroy(); //dùng để đăng xuất bay hết tất cả mọi thứ, nhưng không phù hợp với giỏ hàng 
//c2: loại bỏ những thứ cần bỏ 
unset($_SESSION['id']);
unset($_SESSION['name']);

header("location:index.php");