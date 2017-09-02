<nav class="navbar navbar-default navbar-fixed-top" style="font-size: 20px;">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
	<a class="navbar-brand" href="#" style="font-size: 20px;">ระบบเว็บบอร์ด</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
			<?php 
			if($_SESSION['status'] == 'member'){
			if(!$_GET){
				?>
				<li class="active"><a href="user.php" class="hover">หน้าหลัก</a></li>
				<?php
			}else{
				?>
				<li><a href="user.php" class="hover">หน้าหลัก</a></li>
				<?php
			}
			}else{
			if(!$_GET){
				?>
				<li class="active"><a href="index.php" class="hover">หน้าหลัก</a></li>
				<?php
			}else{
				?>
				<li><a href="index.php" class="hover">หน้าหลัก</a></li>
				<?php
			}				
			}

				?>
			<?php 
			if($_SESSION['status'] == 'member'){
			if($_GET['create_topic'] == 'true'){
				?>
				<li class="active"><a href="user.php?create_topic=true" class="hover">สร้างโพสต์</a></li>
				<?php
			}else{
				?>
				<li><a href="user.php?create_topic=true" class="hover">สร้างโพสต์</a></li>
				<?php
			}
			}else{

			}
			?>
			<?php 
			if($_SESSION['status'] == 'member'){
			if($_GET['create_type'] == 'true'){
				?>
				<li class="active"><a href="user.php?create_type=true" class="hover">สร้างหมวดหมู่</a></li>
				<?php
			}else{
				?>
				<li><a href="user.php?create_type=true" class="hover">สร้างหมวดหมู่</a></li>
				<?php
			}
			}else{

			}
			?>
			<?php 
			if($_SESSION['status'] == 'member'){
			if(isset($_GET['type_topic_id'])){
				?>
				<li class="dropdown active">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="" class="hover">ประเภทโพสต์<span class="caret"></span></a>
					<ul class="dropdown-menu">
					<?php
						$Select_Type = $pdo->prepare("SELECT * FROM type");
						$Select_Type->execute();
						while($Fetch_Type = $Select_Type->fetch(PDO::FETCH_ASSOC)){
						?>
						<li><a href="user.php?type_post=<?php echo $Fetch_Type['ID']?>" class="hover"><?php echo $Fetch_Type['type_name'];?></a></li>
						<?php
						}
						?>
					</ul>
				</li>				<?php
			}else{
				?>
				<li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="" class="hover">ประเภทโพสต์<span class="caret"></span></a>
					<ul class="dropdown-menu">
					<?php
						$Select_Type = $pdo->prepare("SELECT * FROM type");
						$Select_Type->execute();
						while($Fetch_Type = $Select_Type->fetch(PDO::FETCH_ASSOC)){
						?>
						<li><a href="user.php?type_post=<?php echo $Fetch_Type['ID']?>" class="hover"><?php echo $Fetch_Type['type_name'];?></a></li>
						<?php
						}
						?>
					</ul>
				</li>
				<?php
			}
			}else{
			if(isset($_GET['type_topic_id'])){
				?>
				<li class="dropdown active">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="" class="hover">ประเภทโพสต์<span class="caret"></span></a>
					<ul class="dropdown-menu">
					<?php
						$Select_Type = $pdo->prepare("SELECT * FROM type");
						$Select_Type->execute();
						while($Fetch_Type = $Select_Type->fetch(PDO::FETCH_ASSOC)){
						?>
						<li><a href="index.php?type_post=<?php echo $Fetch_Type['ID']?>" class="hover"><?php echo $Fetch_Type['type_name'];?></a></li>
						<?php
						}
						?>
					</ul>
				</li>				<?php
			}else{
				?>
				<li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown" href="" class="hover">ประเภทโพสต์<span class="caret"></span></a>
					<ul class="dropdown-menu">
					<?php
						$Select_Type = $pdo->prepare("SELECT * FROM type");
						$Select_Type->execute();
						while($Fetch_Type = $Select_Type->fetch(PDO::FETCH_ASSOC)){
						?>
						<li><a href="index.php?type_post=<?php echo $Fetch_Type['ID']?>" class="hover"><?php echo $Fetch_Type['type_name'];?></a></li>
						<?php
						}
						?>
					</ul>
				</li>
				<?php
			}				
			}
			?>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<?php
			if($_SESSION['status'] == 'member'){
			?>
				<li><a href="user.php?logout=true" class="hover">ออกจากระบบ</a></li>
			<?php
			}else{
			?>
				<li><a href="index.php?register=true" class="hover">สมัครสมาชิก</a></li>
			<?php
			}
			?>
			</ul>
		</div>
	</div>
</nav>