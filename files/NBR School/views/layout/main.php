<div class="layout">
   <div class="layout-box">
      <div class="layout-highlight">
         <?php if(isset($_SESSION['id'])): ?>
            <a href="?" class="main">
               NBRschool
               <a href="?page=profile" id="mainimg">
                  <img src="<?php echo $_SESSION['avatar'] ?>"/>
               </a>
               Blog
            </a>
         <?php else: ?>
            <a href="?">NBRschool<i class="fa fa-rocket" aria-hidden="true"></i>Blog</a>
         <?php endif ?>
      </div>
   </div>
   <div class="layout-box" style="margin-top:60px; text-align:left;">
      <ul class="main">
         <?php
            $count = mysqli_query($conn, "select count(id) as total from blog");
            $count = mysqli_fetch_assoc($query);
            $count = $count['total'];

            #ดึงข้อมูลทั้งหมด
            $query = mysqli_query($conn, "select * from blog order by date desc");
            for($i=0; $i<$count/3; $i++){
               for($x=0; $x<3; $x++){
                  if($result = mysqli_fetch_assoc($query)){
                     echo "
                     <a href='?page=read&read=$result[id]'>
                     <li>
                     <div><img src='$result[image]'/></div>
                     <div>$result[topic]</div>
                     </li>
                     </a>
                     ";
                  }
               }
            }
          ?>
          <?php $query = mysqli_query($conn, "select*from blog"); ?>
          <?php while($result = mysqli_fetch_assoc($query)): ?>
          <?php endwhile ?>
      </ul>
   </div>
</div>
