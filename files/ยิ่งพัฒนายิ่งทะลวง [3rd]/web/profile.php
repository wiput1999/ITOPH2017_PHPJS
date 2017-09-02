<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="dist/summernote.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="dist/summernote.js"></script>
	<title></title>
	<style type="text/css">
@font-face {
	font-family: eng;
	src:url(fonts/eng.ttf);
}
body {
	font-family: eng;
	background-attachment: fixed;
	background-size: cover;
}
.hold-register {
	text-align: left;
	width: 29%;
	background-color: white;
	padding: 1vw 2vw;
	font-size: 0.8vw;
	box-shadow: 0vw 0vw 2vw 0.2vw rgba(0,0,0,0.6);
	transition-duration:2s;
	margin-top: 15vw;
}
.hold-register:hover {
	box-shadow: 0vw 0vw 2vw 0.4vw rgba(0,0,0,0.8);
}
legend {
	font-size: 0.9vw;
}
input {
	font-size: 0.8vw;
}
.sub-body {
	text-align: left;
	background-color: rgba(255,255,255,0.98);
	width: 60%;
	margin-top: 8vw;
	height: auto;
	padding-bottom: 5vw;
		box-shadow: 0vw 0.5vw 1vw 0.1vw rgba(0,0,0,0.4);
}
.fixed-title {
	text-align: center;
	font-size: 1.3vw;
	background-color: rgba(0,0,0,0.3);
	width: 100%;
	color: rgba(255,255,255,0.8);
}
.sub-body img {
	width: 13vw;
	height: 13vw;
	border-radius: 30vw;
	margin-top: -6vw;
	box-shadow: 0vw 0vw 2vw 1vw rgba(0,0,0,0.1);
}
.form-hold {
	width: 60%;
	margin-left: 11vw;

}
.user-pagination {
	margin-top: 5vw;
	color: white;
	font-size: 2vw;
}
.light {
	font-size: 1.5vw;
}
.recent-post {
	padding-top: 1vw;
	text-align: left;
	background-color: rgba(255,255,255,0.98);
	width: 60%;
	margin-top: 2vw;
	height: auto;
	padding-bottom: 5vw;
	box-shadow: 0vw 0.5vw 1vw 0.1vw rgba(0,0,0,0.4);
}
.post-summer {
	margin-left: 13.7vw;
}
.postbut {

	font-size: 1vw;
	box-shadow: 0vw 0.1vw 1vw 0.01vw rgba(0,0,0,0.2);	
}
.text-page {
	background-color: white;
	margin-top: 1vw;
margin-bottom: 1vw;
	margin-left: 2.5vw;
	margin-right: 2.5vw;
}
.data-pagi {
	margin-top: 2vw;
	padding: 1vw 2vw;
	width: 60%;
	margin-left: 20%;
	margin-right: 20%;
	background-color: white;
	box-shadow: 0vw 0.1vw 1vw 0.05vw rgba(0,0,0,0.3);	
}
</style>
</head>
<body background="img/probg.jpg">
<div class="fixed-title"><light>User Interface</light></div>
<center>
<div class="sub-body"><center><img src="img/procen.png"></center>

<div class="form-hold">
	<form role="form" action="" method="POST"> <fieldset><legend>Edit Profile</legend>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Accept only *jpeg *png and *gif</p>
  </div>
  <button type="submit" class="btn btn-default" class="right">Submit</button></fieldset>
</form>
</div>
</div>
<div class="user-pagination"><strong>Your Recently Post</strong><br><light class"light"> Scroll Down and Start Journey</light></div>
<div class="recent-post"><div class="data-pagi">
<?php
session_start();
$conn = mysqli_connect("localhost","ddallo","InfraredEyes","ddallo");
//page
$result_per_page = 1;
$per_page = 10;
$sql = "SELECT * FROM feed";
$result = mysqli_query($conn,$sql);
$number_of_result = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_result/$per_page);
if (!isset($_GET['page'])) {
	$page = 1;
} else {

	$page = $_GET['page'];
}
$this_page_first_result = ($page-1)*$result_per_page;

$sort = "";

if (isset($_POST['sorts'])) {
	$sort = $_POST['sort'];
}

switch ($sort) {
	case 'az':
		$id = "id";
		$st = "ASC";
		break;
	case 'za':
		$id = "id";
		$st = "DESC";
		break;
	
	default:
		$id = "id";
		$st = "ASC";
		break;
}




$sql = "SELECT * FROM feed LIMIT ".$this_page_first_result.",".$per_page;
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($result)) {
	echo '<div class="pro-top"><img src="img/procen.png" style="width:1.9vw; height:1.9vw; border-radius: 30vw;""> '.$_SESSION['email'].'</div>
	<div class="text-page">'.$row['feed'].'</div>
	<div class="date-time">Posted on : ' . $row['date'].'</div><br>';
;
	}



?>
	

</div></div>
</center>
</body>
</html>
