<?php
  $post_id = $_GET['id'];
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
      <button type="button" onclick="window.history.back()" name="button" class="btn btn-default">กลับ</button>
    </div>
    <br>
    <br>
    <div class="row" id="#cont">
      <?php
        include_once 'connect.php';
        $sql = "SELECT * FROM $db_table[1] WHERE id = '$post_id'";
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
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-xs-12">
                <img src="usr_img/<?php echo $record['img'] ?>" alt="<?php echo $record['title'] ?>" title="<?php echo $record['title'] ?>" class="img-rounded img-responsive">
              </div>
              <div class="col-md-9 col-sm-8">
                <h1><?php echo $record['title'] ?> <small class="label label-default"><?php echo $catg ?></small></h1>
                <p><?php echo $record['detail'] ?></p>
                <footer>โดย <?php echo $record['usr_id'] ?> (<?php echo $record['date'] ?>)</footer>
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
