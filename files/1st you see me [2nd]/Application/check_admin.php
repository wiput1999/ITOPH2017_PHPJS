<?php
if(isset($_POST)){
require_once '../System/config.php';
$status = "admin";
$Select_Auth = "SELECT * FROM member WHERE username = :user AND password = :pass AND status = :status";
$Query_Auth = $pdo->prepare($Select_Auth);
$Query_Auth->execute(Array(
	":user" => $_POST['username'],
	":pass" => md5($_POST['password']),
	":status" => $status
));
$Num_Auth = $Query_Auth->rowCount();
$Fetch_Auth = $Query_Auth->fetch(PDO::FETCH_ASSOC);
if($Num_Auth == '1'){
@session_start();
$_SESSION['username'] = $Fetch_Auth['username'];
$_SESSION['status'] = $Fetch_Auth['status'];
$_SESSION['ID'] = $Fetch_Auth['ID'];
exit('true');
}else{
exit('false');
}
}
?>