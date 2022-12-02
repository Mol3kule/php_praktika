<?php
session_start();

require_once 'database.php';
require_once '../classes/user.php';

if (isset($_POST['login'])) {
	if ($_POST['username'] != "" || $_POST['password'] != "") {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = $connection->prepare("SELECT * FROM `users` WHERE `username`=? AND `password`= ? ");
		$query->execute(array($username, $password));
		$row = $query->rowCount();
		$fetch = $query->fetch();
		if ($row > 0) {
			$_SESSION['user'] = $fetch['id'];
			$User->$UId = $fetch['id'];
			$User->$Username = $username;
			$User->$Password = $password;

			print_r($User);
			header("location: ../index.php");
		} else {
			echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = '../components/login.php'</script>
				";
		}
	} else {
		echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = '../components/login.php'</script>
			";
	}
}