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
          <h1>จัดการผู้ใช้ <?php echo $sess_usr ?></h1>
        </div>
      </div>
    </div>
    <div class="row">
      โพสต์เมื่อไม่นานมานี้ <a href="write.php" class="btn btn-success pull-right">เขียนโพสใหม่</a>
    </div>
    <br>
    <div class="row" id="#cont">
      <?php
        include_once 'connect.php';
        $sql = "SELECT * FROM $db_table[1] where usr_id = '$sess_usr' order by id desc";
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
                  <a class="btn btn-danger pull-right" href="delete.php?id=<?php echo $record['id'] ?>">ลบโพสต์</a>
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
