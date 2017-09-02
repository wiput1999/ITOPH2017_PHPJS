<?php 

include_once("config.php");
include_once("account_inc.php");

function deleteAllOf($uid)
{
	global $pdo;
	$stmt = $pdo->prepare("UPDATE posts SET status=0 WHERE uid=?");
	$stmt->execute([$uid]);
}

 ?>