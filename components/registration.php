<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registracija</title>
	<link rel="stylesheet" href="../assets/css/auth.css">
</head>

<body>
	<form class="form" action="../handlers/register_query.php" method="POST">
		<input type="text" class="login-input" name="username" required />
		<input type="text" class="login-input" name="email" required />
		<input type="password" class="login-input" name="password" required />
		<button class="login-button" name="register">Registruotis</button>
		<p class="link"><a href="./login.php">Prisijungti</a></p>
	</form>
</body>

</html>