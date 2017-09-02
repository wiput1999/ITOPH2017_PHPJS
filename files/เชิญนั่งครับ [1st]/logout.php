<?php
  session_start();
  unset($_SESSION['sess_id']);
  unset($_SESSION['sess_usr']);
  unset($_SESSION['sess_rank']);
  session_destroy();
  mysqli_close($connect);
  ?>
  <script>
    // alert("Register Complete!");
    location.href="index.php";
  </script>
  <?php
  exit();
?>
