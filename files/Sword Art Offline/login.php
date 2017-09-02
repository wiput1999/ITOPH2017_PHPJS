<?php
session_start();
if(isset($POST['submit'])){
  include_once 'pdo.php'

  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
} else{
  $sql = "SELECT * FROM username WHERE user_uid=?";

}
?>
