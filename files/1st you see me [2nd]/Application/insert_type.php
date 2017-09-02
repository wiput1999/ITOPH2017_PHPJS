<?php
if(isset($_POST)){
	@session_start();
	require_once '../System/config.php';
	$Insert_type = "INSERT INTO `type` (`ID`, `type_name`, `owner`) VALUES (:ID, :tn, :ow);";
	$Query_Post = $pdo->prepare($Insert_type);
	$Query_Post->execute(Array(
		":ID" => NULL,
		":tn" => $_POST['type_name'],
		":ow" => $_SESSION['username']
	));
	exit('true');
}
?>