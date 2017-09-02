<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html" charset="tis-620">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dist/summernote.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jq.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/sumjq.js"></script>
	<title></title>
	<style type="text/css">
@keyframes opaq {
  from {
  	opacity: 0;
  }
  to {
  	opacity: 1;
  }
}
@font-face {
	font-family: eng;
	src:url(fonts/eng.ttf);
}
nav {
	background-color: rgba(0,0,0,0.3);
	box-shadow: 0vw 0.5vw 1vw 0.1vw rgba(0,0,0,0.4);
}
body {	
	animation: opaq 1.5s forwards;
	animation-delay: 0s;
	opacity: 0;
	font-family: eng;
	margin: 0;
	padding: 0;
	background-attachment: fixed;
	background-size: cover;
}
.navigateee {

	background-color: rgba(0,0,0,1) !important;
}
a {
	font-size: 1vw;
	color: white;
}
.text-timeline {
	font-size: 6vw;
	margin-top: 10vw;
	color: white;
}
sub {
	font-size: 2vw;
}
.hold-posting {
	width: 65%;
	height: 100vw;
	background-color: rgba(255,255,255,0.9);
	text-align: left;
	margin-top: 13.9vw;
	box-shadow: 0vw 0.5vw 2vw 2vw rgba(0,0,0,0.4);

}
table {
	width: 100%;

}
.left {

	width: 80%;
	padding-left: 5vw;

}
.right {
	width: 20%;
	margin: 0;
	padding: 0;

}
#summernote {
	margin-left: 20vw;
}
.sort {
	margin-left: 1vw;
	width: 100%;
	margin-left: 2vw!important;
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
<body background="img/bg.jpg"><div class="navigatee">
<nav class"navbar navbar-default navbar-fixed-top">
	<div class="navbar-header">
		<a href="index.html" class="navbar-brand">Justiny Websities</a>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-right">
		<?php
		if (isset($_SESSION['email'])) {
			echo '<li><a href="cata.php" target="_BLANK"><span class"glyphicon glyphicon-log-in"></span>Catagory</a>
			</li>
			<li>
				<span class"glyphicon glyphicon-log-in"></span><a href="profile.php" target="_BLANK">Profile</a>
			</li>
			<li>
				<span class"glyphicon glyphicon-log-in"></span><a href="logout.php" target="_BLANK">Logout</a>
			</li>';
		} else {
			echo '
			<li>
				<span class"glyphicon glyphicon-log-in"></span><a href="login.php" target="_BLANK">Login</a>
			</li>
			<li>
				<span class"glyphicon glyphicon-log-in"></span><a href="resiter.php" target="_BLANK">Sign in</a>
			</li>
			';	}	
		
		
		?>
			
		</ul>
	</div>
</nav></div>

<center><div class="text-timeline"><strong>Join Us</strong><br>And Start Explore<br><sub class"sub-text">Scroll Down to Explore</sub></div></center>
<center><div class="hold-posting .col-xs-7 .col-md-offset-3" >
	<div class="Sort" style="margin-left:2vw ;
								padding-top:1vw;">Sorting: 
<form class="Sort-bullet">
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
    Sorting A-Z 
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
    Sorting Z-A
  </label><br><br>
  <button name="submit">Sort!</button>
</div>
</form>

	</div><br>


<div class="post-summer">
<form method="POST" action="post.php"><fieldset><legend ><strong>Something to Share? </strong></legend>
<textarea id="summernote" name="feed"></textarea><button class="postbut" name="submit-post"><span class"glyphicon glyphicon-th-list"></span> Post!!</button></fieldset></form>
</div>


<div class="data-pagi">
<?php

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
	echo $row['feed'];
	for ($page=1; $page <= $number_of_pages; $page++) { 
		echo '<div class="pro-top"><img src="img/procen.png" style="width:1.9vw; height:1.9vw; border-radius: 30vw;""> '.$row['user'].'</div>
	<div class="text-page">'.$row['feed'].'</div>
	<div class="date-time">Posted on : ' . $row['date'].'</div><br>';
	}
}
?>









</div></center>










<script type="text/javascript">
$(document).ready(function() {
  $('#summernote').summernote({
  	toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ], height:300, width:700
  });
});
</script>
</body>
</html>