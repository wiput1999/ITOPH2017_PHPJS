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
          <h1>โพสต์</small></h1>
        </div>
      </div>
    </div>
    <div class="row">
      <button type="button" onclick="window.history.back()" name="button" class="btn btn-default">กลับ</button><?php if($login_stat == 1){ echo '<a href="write.php" class="btn btn-success pull-right">เขียนโพสใหม่</a>'; }?>
    </div>
    <div c
    <br>
    <br>
    <div class="row" id="#cont">
      <?php
        include_once 'connect.php';
        $catg_id = isset($_GET['id'])?$_GET['id']:0;
        if($catg_id==0){
          $sql = "SELECT * FROM $db_table[1] order by id desc";
        }else{
          $sql = "SELECT * FROM $db_table[1] where catg_id = '$catg_id' order by id desc";

        }
        $c = mysqli_query($connect,$sql);
        if(!$c){
          mysqli_close($connect);
          ?>
          <script>
            alert("Error!");
            // window.history.back();
          </script>
          <?php
          exit();
        }
        while($record = mysqli_fetch_array($c,MYSQLI_ASSOC)){
          switch ($record['catg_id']) {
            case 1:
              $catg = "ดราม่า";
              break;
            case 2:
              $catg = "ตลก";
              break;
            case 3:
              $catg = "ท่องเที่ยว";
              break;
            case 4:
              $catg = "ข่าว";
              break;
            case 5:
              $catg = "เพลง";
              break;
            case 6:
              $catg = "อื่นๆ";
              break;
          }
          ?>
          <div class="panel panel-default clickable" onclick="location.href='readpost.php?id=<?php echo $record['id'] ?>'">
            <div class="panel-body">
              <div class="col-md-3 col-sm-4">
                <img src="usr_img/<?php echo $record['img'] ?>" alt="<?php echo $record['title'] ?>" title="<?php echo $record['title'] ?>" class="img-rounded img-responsive">
              </div>
              <div class="col-md-9 col-sm-8">
                <blockquote>
                  <p><?php echo $record['title'] ?> <span class="label label-default"><?php echo $catg ?></span></p>
                  <footer>โดย <?php echo $record['usr_id'] ?> (<?php echo $record['date'] ?>)</footer>
                </blockquote>
              </div>
            </div>
          </div>
          <?php
        }
      ?>
    </div>
  </div>
  <?php include_once 'elements/footer.html'; ?>
</body>
</html>
