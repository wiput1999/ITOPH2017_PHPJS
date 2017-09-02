<?php
  $host = "localhost";
  $user = "undwai";
  $pw = "PahMaiDaiAraiLoei";
  $dbname = "undwai";
  $c = mysqli_connect($host,$user,$pw);

  if (!$c)
  {
    echo "ไม่สามารถติดต่อฐานขอมูลได้";
  }

?>
