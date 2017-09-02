<nav class="navbar navbar-default navbar-fixed-top" style="font-size: 20px;">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
	<a class="navbar-brand" href="#" style="font-size: 20px;">จัดการระบบ</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
			<?php 
			if(!$_GET){
				?>
				<li class="active"><a href="admin.php" class="hover">หน้าหลัก</a></li>
				<?php
			}else{
				?>
				<li><a href="admin.php" class="hover">หน้าหลัก</a></li>
				<?php
			}				
			?>
			<?php 
			if($_GET['create_topic'] == 'true'){
				?>
				<li class="active"><a href="admin.php?create_topic=true" class="hover">สร้างโพสต์</a></li>
				<?php
			}else{
				?>
				<li><a href="admin.php?create_topic=true" class="hover">สร้างโพสต์</a></li>
				<?php
			}				
			?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="admin.php?logout=true" class="hover">ออกจากระบบ</a></li>
			</ul>
		</div>
	</div>
</nav>