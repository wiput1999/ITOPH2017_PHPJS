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
			<?php echo head(); ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-sign-in"></i>&nbsp;เข้าสู่ระบบแอดมิน
				</div>
				<div class="panel-body">
					<input type="text" id="log_username" placeholder="กรุณากรอก Username" class="form-control">
					<input type="password" id="log_password" placeholder="กรุณากรอก Password" class="form-control" style="margin-top:10px;">
				</div>
				<div class="panel-footer">
					<button id="log_submit" class="btn btn-block btn-primary">ตกลง</button>
					<a href="index.php" class="btn btn-block btn-warning">ย้อนกลับ</a>
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
				url: "Application/check_admin.php",
				data: "username="+username+"&password="+password,
				success: function(response){
					if(response == 'true'){
						window.alert("เข้าสู่ระบบแอดมินแล้วครับ ยินดีต้อนรับคุณ "+username)
						window.location.href = "admin.php"
					}else{
						window.alert("Username หรือ Password ผิดครับ")
						window.location.href = "backend.php"
					}
				}
			})
		})
	})
</script>
</body>
</html>