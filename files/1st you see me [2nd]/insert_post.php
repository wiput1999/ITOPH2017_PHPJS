<?php
if(isset($_POST)){
	@session_start();
	require_once '../System/config.php';
	$Insert_Post = "INSERT INTO `post` (`ID`, `post_name`, `post_description`, `post_type`, `owner`) VALUES (:ID, :pn, :pd, :pt, :ow);";
	$Query_Post = $pdo->prepare($Insert_Post);
	$Query_Post->execute(Array(
		":ID" => NULL,
		":pn" => $_POST['post_name'],
		":pd" => $_POST['post_description'],
		":pt" => $_POST['post_type'],
		":ow" => $_SESSION['username']
	));
	exit('true');
}
?>