<?php
if(isset($_POST)){
require_once '../System/config.php';
$Select_Auth = "SELECT * FROM member WHERE username = :user";
$Query_Auth = $pdo->prepare($Select_Auth);
$Query_Auth->execute(Array(
	":user" => $_POST['username']
));
$Num_Auth = $Query_Auth->rowCount();
if($Num_Auth >= '1'){
exit('user_already');
}else if($_POST['password'] != $_POST['conpassword']){
exit('wrong_pass');
}else{
$Insert_Mem = "INSERT INTO `member` (`ID`, `username`, `password`) VALUES (:ID, :user, :pass);";
$Query_Mem = $pdo->prepare($Insert_Mem);
$Query_Mem->execute(Array(
	":ID" => NULL,
	":user" => $_POST['username'],
	":pass" => md5($_POST['password'])
));
exit('true');
}
}
?>