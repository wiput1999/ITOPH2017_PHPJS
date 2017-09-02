<?php 

error_reporting(0);
session_start();
include_once("inc/config.php");

function isError()
{
	return ($_SESSION["error"] == true);
}

function isDuplicate()
{
	return ($_SESSION["duplicate"] == true);
}

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
	<h1 style="text-align:center;">Register</h1>
	<div class="jumbotron container" style="height:30vh;">
		<form action="register_process.php" method="post" id="registr_form">
			<div class="container">
				<div class="col-md-6">
					Username:<input type="text" name="username" placeholder="Username" id="usr" class="form-control">
				</div>
				<div class="col-md-6">
					Password:<input type="password" name="password" placeholder="Password" id="pwd" class="form-control">
				</div>
				<div class="col-md-6" style="position:relative; top:1vh;">
					Display name:<input type="text" name="displayname" placeholder="Displayname" id="dis" class="form-control">
				</div>
				<div class="col-md-6" style="position:relative; top:1vh;">
					Email:<input type="email" name="email" placeholder="Email" id="email" class="form-control">
				</div>
			<input type="submit" class="btn btn-success" value="Join JUSTIN" id="register_submit" style="position:relative; left:25vw; top:5vh; width:150px; height: 50px;">
			</div>
		</form>
	</div>
	<script>
 	var incomplete = false;
 	var duplicate = false;
 	<?php

 	if(isError())
 	{
 		$elem_arr = ["usr", "pwd", "dis", "email"];
 		echo "var incomplete = [" . implode(",",$_SESSION["error_info"]) . "];";
 	}
 	if(isDuplicate())
 	{
 		echo "var duplicate=true;";
 	}
 	session_unset();

 	?>

 	if(incomplete)
 	{
 		var elem_arr = ["usr", "pwd", "dis", "email"];
 		for(var i=0;i<incomplete.length;i++)
 		{
 			if(incomplete[i] === 1)
 			{
 				document.getElementById(elem_arr[i]).style.borderColor = 'red';
 			}
 		}
 	}
 	if(duplicate)
 	{
 		document.getElementById("usr").style.borderColor = 'red';
 		alert('Username used');
 	}
 	</script>
</body>
</html>