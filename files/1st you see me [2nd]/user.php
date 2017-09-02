<!DOCTYPE html>
<html>
<head>
<?php require_once 'Application/header.php'; 
@session_start();
if($_SESSION['status'] != "member"){
	?>
		<script type="text/javascript">
			window.alert("กรุณาเข้าสู่ระบบก่อนครับ")
			window.location.href = "index.php";
		</script>
	<?php
	exit();
}
?>
</head>
<body>
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<?php echo head(); ?>
		<?php require_once 'Application/navbar.php'; ?>
		</div>
		<?php
		if($_GET['create_topic'] == 'true'){
		?>
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-file-text"></i>&nbsp;สร้างโพสต์
				</div>
				<div class="panel-body">
					<input class="form-control" id="post_name" placeholder="กรุณาเขียนหัวเรื่อง" type="text" style="margin-bottom: 10px;">
					<select class="form-control" id="post_type" style="margin-bottom: 10px;">
						<option>เลือกหมวดหมู่</option>
						<?php
						$Select_Type = $pdo->prepare("SELECT * FROM type");
						$Select_Type->execute();
						while($Fetch_Type = $Select_Type->fetch(PDO::FETCH_ASSOC)){
						?>
						<option><?php echo $Fetch_Type['type_name'];?></option>
						<?php
						}
						?>
					</select>
					<div id="summernote">เขียนข้อความที่นี่เลยครับ</div>
				</div>
				<div class="panel-footer">
					<button id="post_submit" class="btn btn-block btn-primary">สร้างโพสต์</button>
				</div>
			</div>
		</div>
		<?php
		}else if($_GET['logout'] == 'true'){
		@session_destroy();
		?>
			<script type="text/javascript">
				window.alert("ออกจากระบบแล้วครับ");
				window.location.href = "index.php";
			</script>
		<?php
		exit();
		}else if(isset($_GET['type_post'])){
				$Select_Type = "SELECT * FROM type WHERE ID = :ID";
				$Query_Type = $pdo->prepare($Select_Type);
				$Query_Type->execute(Array(
					":ID" => $_GET['type_post']
				));
				$Fetch_Type = $Query_Type->fetch(PDO::FETCH_ASSOC);
			?>
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-user"></i>&nbsp;ข้อมูลส่วนตัว
				</div>
				<div class="panel-body" style="font-size: 20px;">
					ชื่อผู้ใช้งาน : <?php echo $_SESSION['username']; ?><br>
					จำนวนโพสต์ : 
				</div>
			</div>
		</div>
			<div class="col-sm-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-fw fa-users"></i>&nbsp;โพสต์ของหมวดหมู่ <?php echo $Fetch_Type['type_name'] ?>
					</div>
					<div class="panel-body">
						<table class="table" style="font-size: 20px;">
							<thead>
								<th>ID</th>
								<th>หัวเรื่อง</th>
								<th>หมวดหมู่</th>
							</thead>
							<tbody>
							<?php
							$i = 0;
							$Select_Post = $pdo->prepare("SELECT * FROM post WHERE post_type = :type_name ORDER BY ID DESC");
							$Select_Post->execute(Array(
								":type_name" => $Fetch_Type['type_name']
							));
							while($Fetch_Post = $Select_Post->fetch(PDO::FETCH_ASSOC)){
								$i++;
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><a href="user.php?post_id=<?php echo $Fetch_Post['ID'];?>"><?php echo $Fetch_Post['post_name'];?></a></td>
									<td><?php echo $Fetch_Post['post_type'];?></td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php 
		}else if(isset($_GET['post_id'])){
				$Select_Post = "SELECT * FROM post WHERE ID = :ID";
				$Query_Post = $pdo->prepare($Select_Post);
				$Query_Post->execute(Array(
					":ID" => $_GET['post_id']
				));
				$Fetch_Post = $Query_Post->fetch(PDO::FETCH_ASSOC);
			?>
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-user"></i>&nbsp;ข้อมูลส่วนตัว
				</div>
				<div class="panel-body" style="font-size: 20px;">
					ชื่อผู้ใช้งาน : <?php echo $_SESSION['username']; ?><br>
					จำนวนโพสต์ : 
				</div>
			</div>
		</div>
			<div class="col-sm-8">

			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-file-text"></i>&nbsp;โพสต์ <?php echo $Fetch_Post['post_name'] ?> วันที่ <?php echo $Fetch_Post['post_date']; ?>
				</div>
				<div class="panel-body">
					<?php echo $Fetch_Post['post_description'] ?>
				</div>
			</div>
			</div>

			<?php
			exit(); 
		}else if($_GET['create_type'] == 'true'){
		?>
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-list"></i>&nbsp;สร้างหมวดหมู่
				</div>
				<div class="panel-body">
					<input class="form-control" id="type_name" placeholder="กรุณาเขียนเรื่องหมวดหมู่" type="text" style="margin-bottom: 10px;">
				</div>
				<div class="panel-footer">
					<button id="type_submit" class="btn btn-block btn-primary">สร้าง</button>
				</div>
			</div>
		</div>
		<?php
		}else{
		?>
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-user"></i>&nbsp;ข้อมูลส่วนตัว
				</div>
				<div class="panel-body" style="font-size: 20px;">
					ชื่อผู้ใช้งาน : <?php echo $_SESSION['username']; ?><br>
					จำนวนโพสต์ : 
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-file-text"></i>&nbsp;โพสต์ต่างๆ
				</div>
				<div class="panel-body">
				
						<table class="table" style="font-size: 20px;">
							<thead>
								<th>ID</th>
								<th>หัวเรื่อง</th>
								<th>หมวดหมู่</th>
							</thead>
							<tbody>
							<?php
							$i = 0;
							$Select_Post = $pdo->prepare("SELECT * FROM post ORDER BY ID DESC");
							$Select_Post->execute();
							while($Fetch_Post = $Select_Post->fetch(PDO::FETCH_ASSOC)){
								$i++;
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><a href="user.php?post_id=<?php echo $Fetch_Post['ID'];?>"><?php echo $Fetch_Post['post_name'];?></a></td>
									<td><?php echo $Fetch_Post['post_type'];?></td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					
				</div>
			</div>
		</div>
		<?php
		}
		?>
	</div>	
</div>
<script type="text/javascript">

$('#summernote').summernote({
  height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});
$(document).ready(function() {
	$("#post_submit").click(function(){
		let post_name = $("#post_name").val();
		let post_description = $('#summernote').summernote('code');
		let post_type = $('#post_type').val();
		$.ajax({
			type: "POST",
			url: "Application/insert_post.php",
			data: "post_name="+post_name+"&post_description="+post_description+"&post_type="+post_type,
			success: function(response){
				if(response == 'true'){
					window.alert("สร้างโพสต์แล้วครับ")
					window.location.href = "user.php"
				}else{
					window.alert("เกิดข้อผิดพลาด กรุณาลองใหม่")
					window.location.href = "user.php"
				}
			}
		})
	});
	$("#type_submit").click(function(){
		let type_name = $("#type_name").val();
		$.ajax({
			type: "POST",
			url: "Application/insert_type.php",
			data: "type_name="+type_name,
			success: function(response){
				if(response == 'true'){
					window.alert("สร้างหมวดหมู่แล้วครับ")
					window.location.href = "user.php"
				}else{
					window.alert("เกิดข้อผิดพลาด กรุณาลองใหม่")
					window.location.href = "user.php"
				}
			}
		})
	});
});
</script>
</body>
</html>