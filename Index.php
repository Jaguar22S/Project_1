<!DOCTYPE html>
<html>
<head>
	<title>Login or Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>Login or Register</h2>
	<form method="post">
		<input type="submit" name="login" value="Login">
		<input type="submit" name="register" value="Register">
		<input type="submit" name="loginasadmin" value="Login as admin">
	</form>

	<?php
		// handle form submission
		if (isset($_POST['login'])) {
			header("Location: login.php");
			exit;
		} elseif (isset($_POST['register'])) {
			header("Location: register.php");
			exit;}
			elseif (isset($_POST['loginasadmin'])) {
			header("Location: loginasadmin.php");
		}
	?>
</body>
</html>
