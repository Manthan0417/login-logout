<?php
include "config.php";
// include "config.php";
if(!empty($_SESSION['id'])){
	header("location:index.php");
}

if(isset($_POST['submit'])){
	$usernameemail = $_POST['usernameemail'];
	$password = $_POST['password'];

	$result = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail' ");

	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0 ){

		if($password == $row['password']){
			$_SESSION['login'] = true;
			$_SESSION['id'] = $row['id'];
			header("location:index.php");


		}else{
			echo
		"<script> alert('wrong password'); </script>";
		}

	}else{
		echo
		"<script> alert('user not registered'); </script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Login</h2>
<form class="" action="" method="post" autocomplete="off">
	<label for="usernameemail">UserName or E-mail:</label>
	<input type="text" name="usernameemail" id="usernameemail" required=""><br>
	<label for="password">Password:</label>
	<input type="password" name="password" id="password" required=""><br>

	<button type="submit" name="submit">Login</button>

</form>
<br>
<a href="registration.php">Registration</a>
</body>
</html>