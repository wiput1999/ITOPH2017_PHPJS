<?php
session_start();
$conn = mysqli_connect("localhost","ddallo","InfraredEyes","ddallo");
if (isset($_POST['submit-post'])) {
	$feed = $_POST['feed'];
	$user = $_SESSION['uid'];
	/*$cat = $_POST['cat'];*/
	/*$name = $_POST['text'];*/
/*,'$user','$cat','$text'*/
/*,user,cat,text*/
$sql = "INSERT INTO feed (user,feed)
	VALUES ('$user','$feed')";
	if ($conn->query($sql) === TRUE) {
		header('Location: index.php?succs');
		echo "yess";
	} else {
		echo "no";
	}
}


?>