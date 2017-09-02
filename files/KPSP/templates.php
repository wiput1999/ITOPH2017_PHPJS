<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Article & Comment</title>
</style>
   @import "global.css";
</style>
<script src="js/jquery-2.1.1.min.js"></script>
<script>
$(function() {

});
</script>
</head>
<body>
<?php include "header-nav.php"; ?>

<div id="container">
<?php
$page_title = "หัวข้อเพจ";
include "breadcrumbs.php";
?>
<article>
    <br><br><br><br><br>
</article>
<?php include "aside.php";>
<?php include "footer.php";>
</div>
</body>
</html>

<aside>
<from id="member" action="login.php" method="post">
<?php
if(isset($_SESSION['admin'])) {
?>
   <b>สมาชิกเข้าสู่ระบบ</b><br>
   &raquo; <a href="new-article.php">เพิ่มบทความใหม่</a><br>
   &raquo; <a href="#">รายการแจ้งลบ</a><br>
   &raquo; <a href="logout.php">ออกจากระบบ</a>
<?php
}
else if(isset($_SESSION['member'])) {
  //กรณีที่เป็นสมาชิกและเข้าสู่ระบบแล้ว...
}
else {
?>
   <b>สมาชิกเข้าสู่ระบบแล้ว</b><br>
   <input type="text" name="login" size="18" placeholder="login">
     <a href="new-member.php">สมัครสมาชิก</a><br>
   <input type="password" name="pswd" size="18" placeholder="Password">
     <a href="#">ลืมรหัสผ่าน</a><br>
  
}
