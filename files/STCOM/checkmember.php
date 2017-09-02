<?
$user_login=$_POST[user_login];
$pass_login=$_POST[pass_login];

if ($user_login==="" or $pass_login=="");
{
	echo "กรุณากรอกข้อมูลให้ครบ";
    exit();
	
	}
	include connect.php;
	$sql="select * from tb_member where username='$user_login and password='$pass_login'";
	$result=mysql_num_row($result);
	mysql_close();
	
	if ($num<=0)
	{ echo "Username หรือ Passwordไม่ถูกต้องค่ะ";
		
		
		}

else {
	session_start();
	$_session[sess_userid]=session_id();
	$_session[sess_username]=$user_login;
	header("Location: main.php");
	
	}
?>