<?php
if(isset($_POST)){
	@session_start();
	require_once '../System/config.php';
	$date = date('Y-m-d');
	$Insert_Post = "INSERT INTO `post` (`ID`, `post_name`, `post_description`, `post_type`, `post_date`, `owner`) VALUES (:ID, :pn, :pdes, :pt, :pd, :ow);";
	$Query_Post = $pdo->prepare($Insert_Post);
	$Query_Post->execute(Array(
		":ID" => NULL,
		":pn" => $_POST['post_name'],
		":pdes" => $_POST['post_description'],
		":pt" => $_POST['post_type'],
		":pd" => $date,
		":ow" => $_SESSION['username']
	));
	exit('true');
}
?>