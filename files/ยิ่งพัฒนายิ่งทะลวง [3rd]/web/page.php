<?php
session_start();
$conn = mysqli_connect("localhost","ddallo","InfraredEyes","ddallo");
//page
$per_page = 10;
$sql = "SELECT * FROM feed";
$result = mysqli_query($conn,$sql);
$number_of_result = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_result/$per_page);
if (!isset($_GET['page'])) {
	$page = 1;
} else {

	$page = $_GET['page'];
}
$this_page_first_result = ($page-1)*$result_per_page;

$sort = "";

if (isset($_POST['sorts'])) {
	$sort = $_POST['sort'];
}

switch ($sort) {
	case 'az':
		$id = "id";
		$st = "ASC";
		break;
	case 'za':
		$id = "id";
		$st = "DESC";
		break;
	
	default:
		$id = "id";
		$st = "ASC";
		break;
}




$sql = "SELECT * FROM feed LIMIT ".$this_page_first_result.",".$per_page." ORDER BY ".$id.",".$st;
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($result)) {
	echo $row['feed'];
	for ($page=1; $page <= $number_of_pages; $page++) { 
		echo '<a href="index.php?page='.$page.'">'.$page.'</a>';
	}
}


?>