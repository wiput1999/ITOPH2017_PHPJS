<?php
  $db_host = "localhost";
  $db_usr = "galeep";
  $db_pwd = "PrawnSushi";
  $db_name = "galeep";
  $db_table = array("member","post","catg");

  $connect = mysqli_connect($db_host,$db_usr,$db_pwd,$db_name);
  if(!$connect){
    echo "Error: Cannot connect";
    exit();
  }

  mysqli_query($connect,"SET character_set_results=utf8");
  mysqli_query($connect,"SET character_set_client=utf8");
  mysqli_query($connect,"SET character_set_connection=utf8");
?>
