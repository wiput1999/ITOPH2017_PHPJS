<?php

include_once("config.php");
include_once("post_inc.php");

function isUsernameUsed($usr)
{
	global $pdo;
	$stmt = $pdo->prepare("SELECT uid FROM account WHERE username=?");
	$stmt->execute([$usr]);
	$fetched = $stmt->fetch();
	return !!($fetched["uid"]);
}

function setInfo($usr, $pwd, $dis, $email)
{
	$info = [
		"username" => $usr,
		"password" => $pwd,
		"displayname" => $dis,
		"email" => $email
	];
	return $info;
}

function addAccount($info)
{
	global $pdo;
	$stmt = $pdo->prepare("INSERT INTO account VALUES (NULL, ?, ?, 1)");
	$stmt->execute([$info["username"], hash('sha256',$info["password"])]);

	$uidStmt = $pdo->prepare("SELECT uid FROM account WHERE username=?");
	$uidStmt->execute([$info["username"]]);
	$fetched = $uidStmt->fetch();

	$infoStmt = $pdo->prepare("INSERT INTO account_info VALUES (?,?,?)");
	$infoStmt->execute([ $fetched["uid"], $info["username"], $info["password"]]);
	return $fetched["uid"];
}

function deleteAccount($uid)
{
	global $pdo;
	$stmt = $pdo->prepare("UPDATE account SET account_type=2 WHERE uid=?");
	$stmt->execute([$uid]);

	deleteAllPostOf($uid);

	$resetAi = $pdo->prepare("ALTER TABLE AUTO_INCREMENT=1");
	$resetAi->execute();
}

function editAccount($uid, $col, $new)
{
	global $pdo;
	$fSql = "UPDATE account SET " . $col . "=?";
	$bSql = " WHERE uid=?";
	$sql = $fSql . $bSql;
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$new, $uid]);
}

function editAccountInfo($uid, $col, $new)
{
	global $pdo;
	$fSql = "UPDATE account SET " . $col . "=?";
	$bSql = " WHERE uid=?";
	$sql = $fSql . $bSql;
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$new, $uid]);
}

?>