<?php
   if(isset($_FILES['blogimg']['tmp_name'])){
      if(getimagesize($_FILES['blogimg']['tmp_name'])){
         $blogimg_name = $_FILES['blogimg']['tmp_name'];
         $blogimg_name = substr($blogimg_name, strrpos($blogimg_name,'.')+1);
         $blogimg_name = date('Y-m-d-s').".".$blogimg_name;
         $blogimg_dir = "storage/blog/".$blogimg_name;

         if(move_uploaded_file($_FILES['blogimg']['tmp_name'], $blogimg_dir)){
            $topic = mysql_real_escape_string($conn, $_POST['topic']);
            $content = mysqli_real_escape_string($conn, $_POST['content']);
            $catalog = mysql_escape_string($conn, $_POST['catalog']);

            mysqli_query($conn, "insert into blog(topic,content,catalog,own,image) values ('$topic','$content','$catalog','$_SESSION[id]','$blogimg_dir')");
            header('refresh:0; ?page=myblog');
         }else {
            echo "<script>alert('ผิดพลาดกรุณาลองภาพอื่น')</script>";
            header('refresh:0; ?page=writeblog');
         }
      }
   }
 ?>
 <div class="layout" style="padding:0 20% 0 20%;">
    <div class="layout-box">
      <div class="layout-highlight">
         <a href="?"><li>NBRschool<i class="fa fa-rocket" aria-hidden="true"></i>Blog //</li></a>
      </div>
    </div>
    <div class="layout-box">
      <form method="post" anctype="multipart/form-data">
         <div class="layout-header">
            WriteBlog
         </div>
         <div class="content">
            <input type="text" name="topic" required placeholder="Your Topic"/><br/>
            <textarea name="content" style="width:80%;" required placeholder="Your content..."></textarea><br/>
            <input type="file" name="blogimg" required class="upload"/>
         </div>
         <div class="layout-footer">
            <input type="submit" value="Post!!">
         </div>
      </form>
    </div>
 </div>
