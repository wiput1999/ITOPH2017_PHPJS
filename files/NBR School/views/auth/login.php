<?php
if (isset($_POST['email'])){
   $email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$query = mysqli_real_escape_string($conn,"select password from user where email = '$email'");
if($auth = mysqli_fetch_assoc($query)){
   if(password_verify($password, $auth['password'])){
 $_SESSION['id'] = $auth['id'];
  $_SESSION['email'] = $auth['email'];
   $_SESSION['name'] = $auth['name'];
    $_SESSION['password'] = $auth['password'];
     $_SESSION['avatar'] = $auth['avatar'];
      $_SESSION['date'] = $auth['date'];
      header('refresh:0; ?page=login');
 }else{
         echo "<script>alert('อีเมล์หรือรหัสผ่านไม่ถูกต้อง')</script>";
         header('refresh:0;?page=login');
     }
 }else {
         echo "<script>alert('ไม่พบผู้ใช้นี้ในระบบ')</script>";
     }
  }
 ?>
 <div class="layout"style="padding:0 30% 0 30%;">
     <div class="layout-box">
         <div class="layout-highlight">
             <a href="?">blog<i class="fa fa-rocket" aria-hidden="true"></i>Space</a>
         </div>

     </div>
     <div class="layout-box">
         <form method="post" action="">
         <div class="layout-header">
             Sign Up
         </div>
         <div class="layout-content">
             <input type="email" name="email" required placeholder=" You email"/>
         </div>
         <input type="password" name="password" required placeholder=" You Password"/>
     </div>
     <div class="layout-footer">
         <input type="submit" name="" value="Sign In">
        </div>
        </form>
    </div>
 </div>
