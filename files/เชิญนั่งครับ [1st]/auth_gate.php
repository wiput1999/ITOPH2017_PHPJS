<?php
  include_once 'connect.php';
  if(isset($_POST['login'])){
    $usr = $_POST['usr'];
    $pwd = md5($_POST['pwd']);
    if($stmt = $connect->prepare("SELECT * FROM $db_table[0] WHERE usr=? AND pwd=?")){
      $stmt->bind_param("ss",$usr,$pwd);
      if(!$stmt->execute()){
        $stmt->close();
        mysqli_close($connect);
        ?>
        <script>
          alert("Error!");
          window.history.back();
        </script>
        <?php
        exit();
      }
      $stmt->store_result();
      $num = $stmt->num_rows;
      $stmt->close();
    }
    if($num==1){
      if($stmt = $connect->prepare("SELECT rank FROM $db_table[0] WHERE usr=?")){
        $stmt->bind_param("s",$usr);
        if(!$stmt->execute()){
          $stmt->close();
          mysqli_close($connect);
          ?>
          <script>
            alert("Error!");
            window.history.back();
          </script>
          <?php
          exit();
        }
        $stmt->bind_result($rank);

        $stmt->fetch();
        $stmt->close();
        session_start();
        $_SESSION['sess_id']=session_id();
        $_SESSION['sess_usr']=$usr;
        $_SESSION['sess_rank']=$rank;
        mysqli_close($connect);
        header("location: index.php");
        exit();
      }
    }else{
      mysqli_close($connect);
      ?>
      <script>
        alert("Cannot Login!");
        location.href="login.php";
      </script>
      <?php
      exit();
    }
  }else if(isset($_POST['register'])){
    $usr = $_POST['usr'];
    $pwd = md5($_POST['pwd']);
    $email = $_POST['email'];
    if($stmt = $connect->prepare("INSERT INTO $db_table[0] values('',?,?,?,2)")){
      $stmt->bind_param("sss",$usr,$pwd,$email);
      if(!$stmt->execute()){
        $stmt->close();
        mysqli_close($connect);
        ?>
        <script>
          alert("Error!");
          window.history.back();
        </script>
        <?php
        exit();
      }
      $stmt->close();
    }
    mysqli_close($connect);
    ?>
    <script>
      alert("Register Complete!");
      location.href="login.php";
    </script>
    <?php
    exit();
  }
?>
