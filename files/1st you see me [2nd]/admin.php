<!DOCTYPE html>
<html>
<head>
<?php require_once 'Application/header.php'; 
@session_start();
if($_SESSION['status'] != "admin"){
	?>
		<script type="text/javascript">
			window.alert("กรุณาเข้าสู่ระบบก่อนครับ")
			window.location.href = "backend.php";
		</script>
	<?php
	exit();
}
if(isset($_POST['manage_submit']))
{
$update = "UPDATE `type` SET `type_name` = :tp WHERE `ID` = :ID; ";
$query = $pdo->prepare($update);
$query->execute(Array(
	":tp" => $_POST['type_name'],
	":ID" => $_POST['type_id']
));
?>
<script type="text/javascript">
	window.alert("แก้ไขแล้วครับ")
	window.location.href = "admin.php";
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
		<?php require_once 'Application/backend_navbar.php'; ?>
		</div>
		<?php
		if(isset($_GET['manage_id'])){
		$Select_Post = "SELECT * FROM post WHERE ID = :ID";
		$Query_Post = $pdo->prepare($Select_Post);
		$Query_Post->execute(Array(
			":ID" => $_GET['manage_id']
		));
		$Fetch_Post = $Query_Post->fetch(PDO::FETCH_ASSOC);
		?>
		<div class="col-sm-12">
		<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-file-text"></i>&nbsp;แก้ไขโพสต์ <?php echo $Fetch_Post['post_name'] ?>
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
					<div id="summernote"><?php echo $Fetch_Post['post_description'] ?></div>
				</div>
				<div class="panel-footer">
					<input id="post_id" type="hidden" value="<?php echo $Fetch_Post['ID'];?>">
					<button id="post_submit" class="btn btn-block btn-primary">แก้ไขโพสต์</button>
				</div>
			</div>	
		<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-trash"></i>&nbsp;ลบโพสต์ <?php echo $Fetch_Post['post_name'] ?>
				</div>
				<div class="panel-body">
					<a href="admin.php?delete_post_id=<?php echo $Fetch_Post['ID']?>" class="btn btn-block btn-danger">ลบโพสต์</a>
				</div>
			</div>			
		</div>
		<?php
		}else if($_GET['logout'] == 'true'){
		@session_destroy();
		?>
		<script type="text/javascript">
			window.alert("ออกจากระบบแล้วครับ");
			window.location.href = "backend.php"
		</script>
		<?php
		exit();
		}else if(isset($_GET['delete_post_id'])){
		$Delete_Post = "DELETE FROM `post` WHERE `ID` = :ID";
		$Query_Post = $pdo->prepare($Delete_Post);
		$Query_Post->execute(Array(
			":ID" => $_GET["delete_post_id"]
		));
		?>
		<script type="text/javascript">
			window.alert("ลบโพสต์แล้วครับ");
			window.location.href = "admin.php"
		</script>
		<?php
		exit();
		}else if($_GET['create_topic'] == 'true'){
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
					<button id="post_submit_create" class="btn btn-block btn-primary">สร้างโพสต์</button>
				</div>
			</div>
		</div>
		<?php
		}else if(isset($_GET['manage_type_id'])){
			$Select_Type = "SELECT * FROM type WHERE ID = :ID";
			$Query_Type = $pdo->prepare($Select_Type);
			$Query_Type->execute(Array(
				":ID" => $_GET['manage_type_id']
			));
			$Fetch_Type = $Query_Type->fetch(PDO::FETCH_ASSOC);
		?>
		<div class="col-sm-12">
		<form action="admin.php" method="post">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-file-text"></i>&nbsp;แก้ไขหมวดหมู่ <?php echo $Fetch_Type['type_name'] ?>
				</div>
				<div class="panel-body">
					<input class="form-control" name="type_name" placeholder="กรุณาแก้ชื่อหมวดหมู่" type="text">
				</div>
				<div class="panel-footer">
				<input type="hidden" name="type_id" value="<?php echo $Fetch_Type['ID'] ?>">
					<input type="submit" name="manage_submit" class="btn btn-block btn-primary" value="แก้ไข">
				</div>
			</div>
		</form>
		</div>
		<?php
		}else if($_GET['manage_type'] == 'true'){
		?>
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-file-text"></i>&nbsp;แก้ไขหมวดหมู่
				</div>
				<div class="panel-body">
					<table class="table" style="font-size: 20px;">
							<thead>
								<th>ID</th>
								<th>หมวดหมู่</th>
								<th>ชื่อผู้สร้าง</th>
								<th>ตัวเลือก</th>
							</thead>
							<tbody>
							<?php
							$i = 0;
							$Select_Type = $pdo->prepare("SELECT * FROM type ORDER BY ID DESC");
							$Select_Type->execute();
							while($Fetch_Type = $Select_Type->fetch(PDO::FETCH_ASSOC)){
								$i++;
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $Fetch_Type['type_name'];?></td>
									<td><?php echo $Fetch_Type['owner'];?></td>
									<td><a href="admin.php?manage_type_id=<?php echo $Fetch_Type['ID']?>" class="hover">จัดการหมวดหมู่</a></td>
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
		}else{
		?>
		<div class="col-sm-4">
			<div class="panel panel-success">
				<div class="panel-heading">
					<i class="fa fa-fw fa-user"></i>&nbsp;จำนวนสมาชิก
				</div>
				<div class="panel-body" style="font-size: 20px;">
					<?php
					$Select_Auth = $pdo->prepare("SELECT * FROM member");
					$Select_Auth->execute();
					$Num_Auth = $Select_Auth->rowCount();
					?>
					จำนวน <?php echo $Num_Auth; ?> คน
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<i class="fa fa-fw fa-user"></i>&nbsp;จำนวนโพสต์					
				</div>
				<div class="panel-body" style="font-size: 20px;">
					<?php
					$Select_Auth = $pdo->prepare("SELECT * FROM post");
					$Select_Auth->execute();
					$Num_Auth = $Select_Auth->rowCount();
					?>
					จำนวน <?php echo $Num_Auth; ?> โพสต์
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<i class="fa fa-fw fa-user"></i>&nbsp;จำนวนหมวดหมู่										
				</div>
				<div class="panel-body" style="font-size: 20px;">
					<?php
					$Select_Auth = $pdo->prepare("SELECT * FROM type");
					$Select_Auth->execute();
					$Num_Auth = $Select_Auth->rowCount();
					?>
					จำนวน <?php echo $Num_Auth; ?> หมวดหมู่
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-fw fa-file-text"></i>&nbsp;โพสต์ทั้งหมด										
				</div>
				<div class="panel-body" style="font-size: 20px;">
					<table class="table" style="font-size: 20px;">
							<thead>
								<th>ID</th>
								<th>หัวเรื่อง</th>
								<th>หมวดหมู่</th>
								<th>ชื่อผูเ้โพสต์</th>
								<th>ตัวเลือก</th>
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
									<td><?php echo $Fetch_Post['post_name'];?></td>
									<td><?php echo $Fetch_Post['post_type'];?></td>
									<td><?php echo $Fetch_Post['owner'];?></td>
									<td><a href="admin.php?manage_id=<?php echo $Fetch_Post['ID']?>" class="hover">จัดการโพสต์</a></td>
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
		let post_id = $('#post_id').val();
		$.ajax({
			type: "POST",
			url: "Application/update_post.php",
			data: "post_id="+post_id+"&post_name="+post_name+"&post_description="+post_description+"&post_type="+post_type,
			success: function(response){
				if(response == 'true'){
					window.alert("แก้ไขโพสต์แล้วครับ")
					window.location.href = "admin.php"
				}else{
					window.alert("เกิดข้อผิดพลาด กรุณาลองใหม่")
					window.location.href = "admin.php"
				}
			}
		})
	});
	$("#post_submit_create").click(function(){
		let post_name = $("#post_name").val();
		let post_description = $('#summernote').summernote('code');
		let post_type = $('#post_type').val();
		let post_id = $('#post_id').val();
		$.ajax({
			type: "POST",
			url: "Application/insert_post.php",
			data: "post_id="+post_id+"&post_name="+post_name+"&post_description="+post_description+"&post_type="+post_type,
			success: function(response){
				if(response == 'true'){
					window.alert("เพิ่มโพสต์แล้วครับ")
					window.location.href = "admin.php"
				}else{
					window.alert("เกิดข้อผิดพลาด กรุณาลองใหม่")
					window.location.href = "admin.php"
				}
			}
		})
	});
});
</script>
</body>
</html>