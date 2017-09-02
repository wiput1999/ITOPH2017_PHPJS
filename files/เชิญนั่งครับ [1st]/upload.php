<?php
  include_once 'connect.php';
  if(isset($_POST['post'])){
    $title = $_POST['title'];
    $catg_id = $_POST['catg_id'];
    $detail = $_POST['detail'];
    $usr_id = $_POST['usr_id'];
    date_default_timezone_set("Asia/Bangkok");
    $token = date("Ymdhms");
    $stu_img = $_FILES['imgUpload']['tmp_name'];
    $stu_imgName = $_FILES['imgUpload']['name'];
    $stu_imgType = $_FILES['imgUpload']['type'];
    $stu_imgSize = $_FILES['imgUpload']['size'];
    if($stu_imgName!=""){# User update proflmg
      $stu_imgSplit = explode(".",$stu_imgName);
      $stu_imgExtens =
      $stu_imgSplit[count($stu_imgSplit)-1];
      $stu_imgNwnme = substr(md5($token),0,5)."-".$std_nick.".".$stu_imgExtens;
    }

    if($stmt = $connect->prepare("INSERT INTO $db_table[1](usr_id,title,img,catg_id,detail) values(?,?,?,?,?)")){
      $stmt->bind_param("sssss",$usr_id,$title,$stu_imgNwnme,$catg_id,$detail);
      if(!$stmt->execute()){
        $stmt->close();
        mysqli_close($connect);
        ?>
        <script>
          alert("Error!");
          // window.history.back();
        </script>
        <?php
        exit();
      }
      $stmt->close();
    }
    copy($stu_img,"usr_img/".$stu_imgNwnme);
    mysqli_close($connect);
    ?>
    <script>
      alert("โพสต์สำเร็จ!");
      location.href="index.php";
    </script>
    <?php
    exit();

  }else if(isset($_POST['edit'])){

  }

?>
