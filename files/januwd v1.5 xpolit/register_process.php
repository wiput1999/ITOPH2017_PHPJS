<?php

session_start();
include_once("inc/config.php");
include_once("inc/account_inc.php");

$post_arr = ["username", "password", "displayname", "email"];
$error_info = [0,0,0,0];
for($i=0;$i<4;$i++)
{
	if(empty($_POST[$post_arr[$i]]))
	{
		$error_info[$i] = 1;
	}
}
for($j=0;$j<4;$j++)
{
	if($error_info[$j] === 1)
	{
		$_SESSION["error"] = true;
		$_SESSION["error_info"] = $error_info;
		if(isUsernameUsed($_POST["username"]))
		{
			$_SESSION["duplicate"] = true;
		}
		die("<script>window.location.href= 'register.php';</script>");
	}
}
addAccount( setInfo($_POST["username"],$_POST["password"],$_POST["displayname"],$_POST["email"]) );
echo "<script>window.location.href= 'register_success.php';</script>";

?>