<?php
require_once './database.php';
$db = new Database();
$db->Open();
 
if(ISSET($_POST['register'])){
	if($_POST['username'] != "" || $_POST['email'] != "" || $_POST['password'] != ""){
		try {
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$db->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$result = $db->connection->prepare("INSERT INTO `users` SET `username` = '$username', `email` = '$email', `password` = '$password'")->execute();
			header('location: ../components/login.php');
			$_SESSION['message']=array("text" => "User successfully created.", "alert"=>"info");
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	} else {
		echo "<script>alert('Please fill up the required field!')</script>
			<script>window.location = '../components/registration.php'</script>";
	}
	$db->Close();
}
?> 