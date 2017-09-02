<?php
if (isset($_POST['email'])) {
    if ($_POST['password'] != $_POST['confirm_password']) {
        echo "<script>alert('กรุณายืนยันรหัสผ่านให้ถูกต้อง')</script>";
        header('refresh:0;?page=register');
    }
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $password = password_hash(mysqli_real_escape_string($conn,$_POST['password']),PASSWORD_DEFAULT);
    $avtar = "storage/auth/avatar.png";
    $query = mysqli_query($conn,"select* from users where email = '$email'");
    if (mysqli_fetch_assoc($query)) {
        echo "<script>alert('ไม่สามารถแสดงใช้อีเมลนี้ได้')</script>";
        header('refresh:0; ?page=register');
    }else {
        mysqli_query($conn, "insert into users (email,name password,avatar) values('$email','$name','$password','$avatar')")or
        die(mysqli_error($conn));
        echo "<script>alert('สมัครมาชิกเสร็จสิ้น')</script>";
        header('refresh:0;?page=login');
    }
}
 ?>
 <div class="layout" style="padding: 0 30% 0 30%;">
     <div class="layout-box">
         <div class="layout-hightlight">
             <a href="?">blog<i class="fa fa-rocket" aria-hidden="true"></i>space</a>
         </div>
     </div>
     <div class="layout-box">
         <from method="post" action="">
             <div class="layout-header">
                 sig Up
             </div>
        <div class="layout-content">
            <input type="email" name="email" required placeholder="You email"/><br/>
            <input type="text" name="name" required placeholder="You name"/><br/>
        <hr/>
        <input type="password" name="password" required placeholder="You password"/><br/>
        <input type="password" name="confirm_password" required placeholder="confirm_password"/><br/>
        </div>
        <div class="layout-footer">
            <input type="submit" value="sign Up">
        </div>
     </from>
     </div>
 </div>
