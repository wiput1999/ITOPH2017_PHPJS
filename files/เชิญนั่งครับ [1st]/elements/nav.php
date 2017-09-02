<?php
  error_reporting(0);
  session_start();
  $sess_id = $_SESSION['sess_id'];
  $sess_usr = $_SESSION['sess_usr'];
  $sess_rank = $_SESSION['sess_rank'];
?>
<nav class="navbar navbar-default navbar-fixed top">
  <div class="container-fluid">
    <div class="navbar-header"><a href="index.php" class="navbar-brand">Justinbook</a></div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <?php
        if($sess_id != session_id() or $sess_usr=="" or $sess_rank==""){
          $login_stat = 0;
          ?>
          <li><a href="login.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Login</a></li>
          <?php
        }else{
          $login_stat = 1;
          ?>
          <li><a href="user.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $sess_usr ?></a></li>
          <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
          <li><a href="logout.php">Logout</a></li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
<?php ?>
