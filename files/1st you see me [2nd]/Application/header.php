<title>[ ระบบโพสต์ ]</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="System/dist/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="System/dist/font-awesome.min.css">
<script type="text/javascript" src="System/dist/jquery.min.js"></script>
<script type="text/javascript" src="System/dist/bootstrap.min.js"></script>
<link href="System/dist/summernote.css" rel="stylesheet">
<script src="System/dist/summernote.js"></script>
<?php
require_once 'System/config.php';
function footer(){
?>
<hr>
<span style="font-size: 20px;">โรงเรียนวิสุทธรังษ๊|<a href="backend.php" class="hover">จัดการระบบ</a></span>
<?php
}
function head(){
?>
<h1 class="header">เว็บบอร์ด</h1><hr>
<?php
}
?>
<style type="text/css">
	@font-face{
		font-family: fonts;
		src: url("System/fonts/upcib.ttf");
	}
	body{
		font-family: fonts;
		background: #C9D6FF;
		background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);
		background: linear-gradient(to right, #E2E2E2, #C9D6FF);
	}
	.panel{
		border-radius: 0px;
	}
	.panel-heading{
		font-size: 20px;
	}
	.form-control{
		border-radius: 0px;
		font-size: 20px;
	}
	.btn{
		transition: 0.3s;
		font-size: 20px;
		border-radius: 0px;
	}
	.header{
		color: #333;
		transition: 0.3s;
		font-family: fonts;
		font-size: 48px;
	}
	.header:hover{
		color: #000;
		font-family: fonts;

	}
	.hover{
		color: #555;
		transition: 0.3s;
		font-family: fonts;
		text-decoration: none;
	}
	.hover:hover{
		color: #000;
		font-family: fonts;
		text-decoration: none;
	}
	.navbar{
		border-radius: 0px;
	}
</style>