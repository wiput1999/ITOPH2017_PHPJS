<?php
session_start();
if (!empty($_SESSION['uid'])) {
	header('Location: index.php');
}
$conn = mysqli_connect("localhost","ddallo","InfraredEyes","ddallo");
if (isset($_POST['submit'])) {
	$password = $_POST['pass'];
	$email = $_POST['email'];
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = $_POST['pass'];
		$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$_SESSION['uid'] = $username;
			$_SESSION['pwd'] = $password;
			$_SESSION['email'] = $email;
			header('Location: index.php?succ');
		}
	}
}


?>