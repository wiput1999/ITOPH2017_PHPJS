<!DOCTYPE html>
<html>
<head>
<?php require_once 'Application/header.php'; ?>
</head>
<body>
<br><br><br>
<div class="container">
	<div class="row">
	<div class="col-sm-12">
	<?php require_once 'Application/navbar.php'; ?>
	</div>
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-sign-in"></i>&nbsp;เข้าสู่ระบบ
				</div>
				<div class="panel-body">
					<input type="text" id="log_username" placeholder="กรุณากรอก Username" class="form-control">
					<input type="password" id="log_password" placeholder="กรุณากรอก Password" class="form-control" style="margin-top:10px;">
				</div>
				<div class="panel-footer">
					<button id="log_submit" class="btn btn-block btn-primary">ตกลง</button>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-users"></i>&nbsp;สมัครสมาชิก
				</div>
				<div class="panel-body">
					<input type="text" id="reg_username" placeholder="กรุณากรอก Username" class="form-control">
					<input type="password" id="reg_password" placeholder="กรุณากรอก Password" class="form-control" style="margin-top:10px;">
					<input type="password" id="reg_conpassword" placeholder="กรุณากรอก Password ยืนยัน" class="form-control" style="margin-top:10px;">
				</div>
				<div class="panel-footer">
					<button id="reg_submit" class="btn btn-block btn-primary">ตกลง</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#log_submit").click(function(){
			let username = $("#log_username").val();
			let password = $("#log_password").val();
			$.ajax({
				type: "POST",
				url: "Application/check_login.php",
				data: "username="+username+"&password="+password,
				success: function(response){
					if(response == 'true'){
						window.alert("เข้าสู่ระบบแล้วครับ ยินดีต้อนรับคุณ "+username)
						window.location.href = "user.php"
					}else{
						window.alert("Username หรือ Password ผิดครับ")
						window.location.href = "index.php"
					}
				}
			})
		})
	})
	$(document).ready(function(){
		$("#reg_submit").click(function(){
			let username = $("#reg_username").val();
			let password = $("#reg_password").val();
			let conpassword = $("#reg_conpassword").val();
			$.ajax({
				type: "POST",
				url: "Application/insert_member.php",
				data: "username="+username+"&password="+password+"&conpassword="+conpassword,
				success: function(response){
					if(response == 'true'){
						window.alert("สมัครสมาชิกแล้วครับ")
						window.location.href = "index.php"
					}else if(response == 'user_already'){
						window.alert("Username นี้มีผู้ใช้งานแล้วครับ")
						window.location.href = "index.php"
					}else if(response == 'wrong_pass'){
						window.alert("รหัสผ่านไม่ตรงกันครับ")
						window.location.href = "index.php"
					}else{
						window.alert("เกิดข้อผิดพลาด กรุณาลองใหม่ภายหลัง")
						window.location.href = "index.php"
					}
				}
			})
		})
	})
</script>
</body>
</html>