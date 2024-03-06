<?php
include "config.php";

if(!empty($_SESSION['id'])){
	$id = $_SESSION['id'];
	$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
}else{
	header("location:login.php");
}




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Welcome <?php echo $row['name'];   ?></h1>
<a href="logout.php">LogOut</a>
</body>
</html>