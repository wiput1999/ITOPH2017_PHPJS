<?php
if(isset($_POST['submit'])){
  include_once 'pdo.php';

  $first= mysqli_real_escape_string($conn, $_POST['first']);
  $username= mysqli_real_escape_string($conn, $_POST['username']);
  $email= mysqli_real_escape_string($conn, $_POST['email']);
  $password= mysqli_real_escape_string($conn, $_POST['password']);
  $conpassword= mysqli_real_escape_string($conn, $_POST['conpassword']);

if(empty($first)||empty($username)||empty($email)||empty($password)||empty($conpassword)){
  header("location: signup.php?signup=empty");
} else{
  if($password != $conpassword){
    header("Location: ../signup.php?password_doesn't_match");
  }else{
     if (!preg_match("/^[a-zA-Z]*$/",$first)){
 header("Location: ../signup.php?Invalid_first_name");
}else{
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
 header("Location: ../signup.php?Invalid_email");
  }else{
    $sql = "SELECT * FROM users WHERE user_uid='$username'";
    $result = mysqli_query ($conn, $sql);
    $resultCheck = mysqli_fetch_row($result);
    if ($resultCheck> 0){
       header("Location: ../signup.php?user_already_taken");
    }else{
      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
      $sql ="INSERT INTO Name(first, username, email, password) VALUES ('$first',''$username','$email','$hashedPwd');";
      mysqli_query($conn, $sql);
      header("Location: ../signup.php?sucess");
    }
  }
}
}
}
}
 ?>
 <html>
 <head>
   <style>
   body{
     margin: 0;
     padding: 0;
     background-image: url(oph-1.jpg);
     width: 100%;
     height: 100%;
     background-attachment: fixed;
     background-size:cover;
     
   }
</style>
 </head>
 <body>
   <form action="signup.php" method="POST">
      <input type="text" name="first" placeholder="first name"></input>
      <input type="text" name="username" placeholder="username"></input>
      <input type="text" name="email" placeholder="email"></input>
      <input type="password" name="password" placeholder="password"></input>
      <input type="password" name="conpassword" placeholder="confirmpassword"></input>
     <button type="submit" name="submit">submit</button>
   </form>
 </body>
 </html>
