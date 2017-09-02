<?php
if(isset($_POST)){
	@session_start();
	require_once '../System/config.php';
	$Insert_Post = "UPDATE `post` SET `post_name` = :pn, `post_description` = :pd, `post_type` = :pt WHERE `ID` = :ID; ";
	$Query_Post = $pdo->prepare($Insert_Post);
	$Query_Post->execute(Array(
		":pn" => $_POST['post_name'],
		":pd" => $_POST['post_description'],
		":pt" => $_POST['post_type'],
		":ID" => $_POST['post_id']
	));
	exit('true');
}
?>