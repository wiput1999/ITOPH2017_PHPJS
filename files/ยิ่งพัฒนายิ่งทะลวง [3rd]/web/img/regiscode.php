<?php
session_start();
/*if (!empty($_SESSION['uid'])) {
	header('Location: index.php');
}*/
$conn = mysqli_connect("localhost","ddallo","InfraredEyes","ddallo");
if (isset($_POST['submit'])) {
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$email = $_POST['email'];
	

$sql = "INSERT INTO user (user,password,email)
	VALUES ('$username','$password','$email')";
	if ($conn->query($sql) === TRUE) {
		echo "yess";
		$_SESSION['uid'] = $username;
		$_SESSION['pwd'] = $password;
		$_SESSION['email'] = $email;
	} else {
		echo "no";
	}
}
//upload
/*
	$target_dir = "img/";
	$target_file = $target_dir.basename($_FILES["file"]["name"]);
	$uploadok = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if (isset($POST['submit'])) {
		$check = getimagesize($_FILES["file"]["tmp_name"]);
		if ($check !== false) {
			echo "File is an image -".$check["mime"].".";
			$uploadok = 1;
		}else{
			echo "file not image.";
			$uploadok = 0;
		}
	}
	if (file_exists($target_file)) {
		$uploadok = 0;
		echo "no";
	}
	if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
		echo "jpg,jpeg,png,gif only.";
		$uploadok = 0;
	}
	if ($_FILES["file"]["size"] > 500000) {
		echo "too large";
		$uploadok = 0;
	}
	if ($uploadok == 1) {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			echo "The file".basename($_FILES["file"]["name"]."uploaded.");
			//rename($_FILES["file"]["name"], $username);

		}
	}else{
		echo "image error";
	}*/

?>