<?php

$connect = mysqli_connect("localhost","spusti","AlpacaDonuts","spusti");
if(mysqli_connect_errno())
{
	echo"ERROR: ".mysqli_connect_error();
}
mysqli_set_charset($connect,"utf8");

$mysqli = new mysqli("localhost", "spusti","AlpacaDonuts","spusti");


function scookie($name,$value)
{
	return setcookie($name, $value, time()+3600*12);
}
function dcookie($name)
{
	return setcookie($name, "", time()-3600);
}

require "style.php";

if(@empty($_COOKIE[usrname]))
{
	if(@isset($_GET[msg]))
	{
		echo "
		<center>
		<div class='alert'>
			$_GET[msg]
		</div>
		"	;	
	}
	print "
		<center>
		<div class='formlogin'>
			<a style='font-size:40px;color:black;'>ลงชื่อเข้าใช้งาน</a><br><br>
			<form action='?a=login' method='post'>
			
				ชื่อผู้ใช้งาน :<br>
				<input type='username' name='usrname' class='ipt' required autofocus><br><br>
				รหัสผ่าน :<br>
				<input type='password' name='usrpass' class='ipt' required autofocus><br>
				<input type='submit' name='sunmitlogin' class='sub' value='เข้าใช้งาน'><br>
				<a style='color:gray;font-size:20px;text-decoration:none;' href='?a=regis'>ยังไม่มีบัญชีใช่หรือไม่?</a>
			</form>
		</div>
		
		
	";
	if(@$_GET[a] == "regis")
	{
		print "
		<div class='box-regis'>
			
			<div class='formlogin' >
			<div style='background:red;font-size:20px;float:right;padding:20px;color:white;border-radius:0.25em;cursor:pointer;' onclick=\"window.location='?'\">X</div>
			<a style='font-size:28px;color:black'>ยังไม่มีบัญชีผู้ใช้งาน</a><br>
			สมัครสมาชิกที่นี่<br><br>
			<form action='?a=regis' method='post'>
				ชื่อผู้ใช้งานที่ต้องการ :<br>
				<input type='username' name='usrname_r' class='ipt' required autofocus><br><br>
				รหัสผ่าน :<br>
				<input type='password' name='usrpass_r' class='ipt' required autofocus><br>
				<input type='submit' name='sunmitregis' class='sub' value='ลงทะเบียน'>
			</form>
		</div>
		</div>
		";
	}
	
	if(@$_POST[sunmitregis])
	{
		$sql = "INSERT INTO `member` (`usrname`, `ussrpass`) VALUES ('".$_POST[usrname_r]."','".$_POST[usrpass_r]."') ";
		$mysqli->query($sql);
		header("location: ?msg=ลงทะเบียนสำเร็จ");
	}
	
	if(@$_POST[sunmitlogin])
	{
		$sql = "SELECT * FROM `member` WHERE usrname = '".$_POST[usrname]."' ";
		$result = $mysqli->query($sql);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if($_POST[usrname] != $row[usrname])
		{
			header("location: ?msg=ชื่อผู้ใช้ไม่ถูกต้อง");
		}
		else
		{
			if($_POST[usrpass] == $row[ussrpass])
			{
				scookie("usrname",$_POST[usrname]);
				header("location: ?");
			}
			else
			{
				header("location: ?msg=รหัสผ่านไม่ถูกต้อง");
			}
		}
	}
	
}
else
{	
	print "
		<center>
		<div style='width:800px;padding:20px;font-size:18px;background:white;border:0.01em solid lightgray;border-radius:0.25em 0.25em 0 0;text-align:right;'>
			ยินดีต้อนรับครับ คุณ $_COOKIE[usrname] | <a href='?a=logout'>ออกจากระบบ</a>
		</div>
		<div style='width:800px;padding:10px;font-size:18px;background:white;border:0.01em solid lightgray;border-radius:0 0 0.25em 0.25em;text-align:left;'>
			<a href='?'>หน้าหลัก</a> | <a href='?a=newpost'>สร้างโพสต์ใหม่</a> 
		</div>
		<br>
		
		<div style='width:800px;padding:20px;font-size:18px;background:white;border:0.01em solid lightgray;border-radius:0.25em 0.25em 0 0;border-radius:0.25em;'>
	";
		$sql = "SELECT * FROM `post` WHERE 1";
		$result = $mysqli->query($sql);
		$row = $result->fetch_array(MYSQLI_ASSOC);

		print "
			<div style='width:100%;padding:10px;text-align:left;' onclick=\"window.location='?viewpost=$row[id]'\">
				<a style='font-size:24px' >$row[header]</a><br>
				<a style='font-size:16px' >โพสต์โดย $row[usrown]</a>
			</div>
		";

		
	print "
		</div>
	";
	
	if(@$_GET[a] == "viewpost")
	{
		$sql = "SELECT * FROM `post` WHERE id = '".$_GET[viewpost]."' ";
		$result = $mysqli->query($sql);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		print "
		<div class='box-regis'>
			
			<div style='width:800px;blackground:white;border-radius:0.25em;' >
			<div style='background:red;font-size:20px;float:right;padding:20px;color:white;border-radius:0.25em;cursor:pointer;' onclick=\"window.location='?'\">X</div>
			
			<a style='font-size:24px' >$row[header]</a><br>
			<a style='font-size:16px;color:gray;' >โพสต์โดย $row[usrown]</a>
			<a style='font-size:16px' >$row[detail]</a>
			
			</div>
		</div>
		";
		
	}
	
	if(@$_GET[a] == "newpost")
	{
		print"
			<div class='box-regis'>
			
			<div style='width:800px;blackground:white;border-radius:0.25em;' >
			<div style='background:red;font-size:20px;float:right;padding:20px;color:white;border-radius:0.25em;cursor:pointer;' onclick=\"window.location='?'\">X</div>
			
			<form action='?a=newpost&s=insert' method='post'>
				<input type='text' name='header' style='width:100%;height:50px;font-size:20px;' placeholder='หัวข้อใหม่'>
				<textarea  name='detail' style='width:100%;height:400px;font-size:18px;' placeholder='ข้อความเนื้อหา...'></textarea>
				<input type='submit' class='sub' name='post' value='โพสต์เลยยยย'>
			</form>
			
			</div>
		</div>
		";
		
		if(@$_GET[s]=="insert")
		{
			$sql = "INSERT INTO `post`(`id`, `header`, `detail`, `usrown`, `date`) VALUES ('".date("dhis")."','".$_POST[header]."','".$_POST[detail]."','".$_COOKIE[usrname]."','".date("dhis")."') ";
			$mysqli->query($sql);
			header("location: ?");
		}
	}
	
	if(@$_GET[a] == "logout")
	{
		dcookie("usrname");
		header("location: ?");
	}
}

