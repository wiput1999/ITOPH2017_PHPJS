<?php

	$user_reg=$_POST['user_reg'];
	$pass_reg=$_POST['pass_reg'];
	$repass=$_POST['repass'];
	$email_reg=$_POST['email_reg'];
	$date_reg=date("Y-m-d");

	if($pass_reg!=$repass or $user_reg=="" or $pass_reg=="" or $repass=="" or $email_reg=="")
	{
		header("Location: register.html");
		exit();
	}

	include "connect.php";
	$sql="SELECT * FROM tb_member WHERE username='$user_reg'";
	$result=mysqli_query($c,$dbname);
	$num=mysqli_num_rows($result);

	if($num)
	{
		echo "Username นี้ถูกใช้ไปแล้ว";
		exit();
	}

	$sql="INSERT INTO tb_member VALUES('','$user_reg','$pass_reg','$email_reg')";
	$result=mysqli_query($c,$dbname);
	if($result)
	{
		echo "สมัครสมาชิกสำเร็จ สามารถเข้าสู่ระบบได้";
		exit();
	}


?>
