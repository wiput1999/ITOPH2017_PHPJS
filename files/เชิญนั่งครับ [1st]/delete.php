<?php
include_once 'connect.php';
  $topic = $_GET['id'];
  $sql = "DELETE FROM $db_table[1] where id = '$topic'";
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
  mysqli_close($connect);
  ?>
  <script>
    alert("ลบสำเร็จ!");
    window.history.back();
  </script>
  <?php
  exit();
?>
