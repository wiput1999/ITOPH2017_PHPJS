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
</style>
</head>
<body background="img/regbg.jpg">
<center>
<div class="hold-register">
<form method="POST" action="logincode.php"><fieldset><legend>Login</legend>
  <div class="form-group">
    <label for="exampleInputEmail1" >Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
  </div>
 
  <button type="submit" class="btn btn-default" name="submit">Submit</button></fieldset>
</form></div></center>
</body>
</html>