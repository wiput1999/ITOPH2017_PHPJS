<?php

include_once("inc/config.php");
include_once("inc/account_inc.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="\res\bs\css\bootstrap.min.css">
	<script src="\res\bs\js\bootstrap.min.js"></script>

</head>
<body>
	<div class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="home.html" class="navbar-brand">FC Justin</a>
			</div>
				<ul class="nav navbar-nav">
					<li><a href="home.html">Home</a></li>					
					<li><a href="#">Post Management</a></li>
					<li><a href="#">Account</a></li>
					<li style="position:relative; left: 75vw;" class="active"><a href="login.html">Login</a></li>
				</ul>
			</div>
		</div>	
		<div class="container" style="background-color:white;">
		<h1 style="left: 100vw; text-align:center; ">Login</h1>
		</div>
	<div class="container jumbotron" style="width:40vw; height:30vh;">
		<form action="login_process.php" method="post">
 			<div style="position:relative;">Username<input type="text" name="usr" class="form-control" class="form-control"></div>
 			<div style="position:relative; top:1vh;">Password<input type="password" name="pwd" class="form-control" class="form-control"></div>
 			<div><p style="font-size:14px; position:relative; top:2vh; " ><a href="register.html">Not Registered? Create An Account</a></p></div>
 			<input type="submit" class="btn btn-success " style="width: 100px; position:relative; top:3vh; left:16.5vw;">
 		</form>
	</div>
</body>
</html>