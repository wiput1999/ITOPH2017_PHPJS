<?php 
$valid_formats = array(".png,.jpeg,");
$path = "pic_upload/"
function findexts($filename){
	$filename = strtolower($filename);
	$exts = preg_split("[/\\.]",$filename);
	$n = count($exts)-1;
	$exts = $exts[$n];
	return $exts; 
}
if (isset($POST['upload_submit'])) {
	foreach ($_FILES['files']['name'] as $f => $name) {
		if ($_FILES['files']['error'][$f] == 0) {
			if (! in_array(pathinfo($name,PATHINFO_EXTENTION), $valid_formats)) {
				?>
				<script type="text/javascript">
					alert("กรุณาอัพโหลดไฟล์รูป")
				</script>
				<?php
			}else{
				$time = date("h-i-sa");
				$ext = findexts($name);
				$ran = rand();
				$ran2 = $ran.".";
				$filename = $ran2.$time.".".$ext;
				if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$filename)) {
					$Query_File = $pdo->prepare($insert_File);
					$Query_File->execute(Array(
						"ID" => NULL,
						"title" => $_POST['title'],
						"file_name" => $filename,
						"owner" => $_SESSION['username']
						));
						?>
						<script type="text/javascript">
							alert("อัพรูปโหลดแล้ว")
						</script>
						<?php
				}
			}
		}
	}
}
?>