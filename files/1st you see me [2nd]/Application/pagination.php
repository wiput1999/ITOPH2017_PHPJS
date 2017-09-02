<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$host = "";
$user = "";
$pass = "";
$dbname = "";
$pdo = new PDO("mysql:dbname=$dbname;host=$host, $user,$pass");
$strSQL = "SELECT * FROM customer";
$objQuery = $pdo->prepare(strSQL);
$objQuery->execute();
$Num_Rows = $objQuery->rowCount();

$Per_Page = 10;

$Page = $_GET["Page"];
if (!$_GET["Page"]) 
{
	$Page=1;
}
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if ($Num_Rows <= $Per_Page) 
{
	$Num_Pages = 1;
}
else if (($Num_Rows % $Per_Page)==0) 
{
	$Num_Pages = ($Num_Rows/$Per_Page);
}
else
{
	$Num_Pages = ($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .="order by CustomerID ASC LIMIT $Page_Start , $Per_Page";
$objQuery = $pdo->prepare($strSQL);
$objQuery->execute();

?>
<table width="600" border="1">
<tr>
	<th width="91"><div align="center">CustomerID</div></th>
	<th width="98"><div align="center">CustomerID</div></th>
	<th width="198"><div align="center">CustomerID</div></th>

		</tr>
<?php
	while ($objResult = $objQuery->fetch(PDO::FETCH_ASSOC)) 
	{
?>
		<tr>
		<td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
		<td><?php echo $objResult["name"];?></td>
		<td><?php echo $objResult["email"];?></td>
		</tr>
<?php
	}
?>
</table>
<br>
Total<?php echo $Num_Rows;?>Record :<?php echo $Num_Pages;?>Page:

<?php
if ($Prev_Page) 
{
 	echo "<a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><<Back</a>";
 } 
for ($i=1; $i <=$Num_Pages ; $i++) { 
	if ($i!=$Page) {
		echo "[<a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a>]";
	}
	else
	{
		 
 	echo "<b> $i </b>";
 
	}


 	}
 	if($Page!=$Num_Pages)
 	{
 		echo "<a href='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a>";
 	}

 ?>
 
</body>
</html>