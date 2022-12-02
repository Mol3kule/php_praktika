<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prisijungimas</title>
	<link rel="stylesheet" href="../assets/css/auth.css">
</head>

<body>
	<form class="form" action="./components/login_query.php" method="POST">
		<input type="text" class="login-input" name="username" placeholder="Slapyvardis"/>
		<input type="password" class="login-input" name="password" placeholder="Slaptažodis"/>
		<button class="login-button" name="login">Prisijungti</button>
		<p class="link"><a href="./registration.php">Registruotis</a></p>
	</form>
</body>

</html>