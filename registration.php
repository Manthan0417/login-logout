<?php
include "config.php";
if(!empty($_SESSION['id'])){
	header("location:index.php");
}



if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$conformpassword = $_POST['conformpassword'];
	$duplicate = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$username' OR email ='$email'");

	if(mysqli_num_rows($duplicate) > 0 ){
		echo
		"<script> alert('username or email has already taken'); </script>";
	}else{
		if($password == $conformpassword){
			$query = "INSERT INTO tb_user VALUES ('', '$name','$username','$email','$password')";
			mysqli_query($conn,$query);
			echo
		"<script> alert('registration successful'); </script>";
		}else{
			echo
		"<script> alert('password does match'); </script>";
		}


	}

}



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>registration</h2>
<form class="" action="" method="post" autocomplete="off">
	<label for="name">Name:</label>
	<input type="text" name="name" id="name" required=""><br>
	<label for="username">UserName:</label>
	<input type="text" name="username" id="username" required=""><br>
	<label for="email">E-mail:</label>
	<input type="email" name="email" id="email" required=""><br>
	<label for="password">Password:</label>
	<input type="password" name="password" id="password" required=""><br>
	<label for="conformpassword">Conform Password:</label>
	<input type="password" name="conformpassword" id="conformpassword" required=""><br>
	<button type="submit" name="submit">Register</button>
</form>
<br>
<a href="login.php">Login</a>
</body>
</html>