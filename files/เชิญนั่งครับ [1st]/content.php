<?php
  include_once 'connect.php';
    $sql = "SELECT * FROM $db_table[1] order by id desc limit 5";
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
   <div class="text-center"><a href="content_full.php" class="btn btn-success">ดูเพิ่มเติม</a></div>
   <?php
?>
