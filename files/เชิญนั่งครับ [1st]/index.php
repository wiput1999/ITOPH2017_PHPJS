<?php
  if(isset($_GET['catg_id'])){
    $catg_id = $_GET['catg_id'];
  }else{
    $catg_id = "A";
  }
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <?php include_once 'elements/head.html'; ?>
  <title>Justinbook</title>
</head>
<body>
  <?php include_once 'elements/nav.php'; ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-header">
          <h1>Justinbook <small>เราจะทำตามสัญญา ขอเวลาอีกไม่นาน</small></h1>
        </div>
      </div>
    </div>
    <div class="row">
      โพสต์เมื่อไม่นานมานี้ <?php if($login_stat == 1){ echo '<a href="write.php" class="btn btn-success pull-right">เขียนโพสใหม่</a>'; }?>
    </div>
    <br>
    <div class="row">
      <div class="col-md-2 col-sm-4 col-xs-6"><a class="btn btn-default btn-block" href="content_full.php?id=1">ดราม่า</a></div>
      <div class="col-md-2 col-sm-4 col-xs-6"><a class="btn btn-default btn-block" href="content_full.php?id=2">ตลก</a></div>
      <div class="col-md-2 col-sm-4 col-xs-6"><a class="btn btn-default btn-block" href="content_full.php?id=3">ท่องเที่ยว</a></div>
      <div class="col-md-2 col-sm-4 col-xs-6"><a class="btn btn-default btn-block" href="content_full.php?id=4">ข่าว</a></div>
      <div class="col-md-2 col-sm-4 col-xs-6"><a class="btn btn-default btn-block" href="content_full.php?id=5">เพลง</a></div>
      <div class="col-md-2 col-sm-4 col-xs-6"><a class="btn btn-default btn-block" href="content_full.php?id=6">อื่นๆ</a></div>
    </div>
    <br>
    <div class="row" id="#cont">
      <?php include_once 'content.php'; ?>
    </div>
  </div>
  <?php include_once 'elements/footer.html'; ?>
</body>
</html>
