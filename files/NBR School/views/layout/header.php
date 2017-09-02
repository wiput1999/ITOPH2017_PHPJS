<div class="header" id="pc">
   <ul>
      <a href="?"><li>NBRschool<i class="fa fa-rocket" aria-hidden="true"></i>Blog //</li></a>
      <a href="?page=myblog"><li>Myblog</li></a>
      <a href="?page=write"></li>Writeblog</li></a>
   </ul>
   <ul>
      <?php if(!isset($_SESSION['id'])): ?>
         <a href="?page=register"><li>Sing Up</li></a>
         <a href="?page=login"><li>Sing in</li></a>
      <?php else: ?>
         <a href="?page=logout"><li>Logout<i class="fa fa-power-off" aria-hidden="true" style="color:red;"></i></li></a>
         <a href="?page=profile"><li>Profile</li></a>
      <?php endif; ?>
   </ul>
</div>

<div class="header" id="mb">
   <ul>
      <a href="?"><li>NBRschool<i class="fa fa-rocket" aria-hidden="true"></i>Blog //</li></a>
   </ul>
   <ul>
      <li class="header-burger">
         <i class="fa fa-list-ul" aria-hidden="true"></i>
         <ul>
            <a href="?page=myblog"><li>Myblog</li></a>
            <a href="?page=write"></li>Writeblog</li></a>
            <?php if(!isset($_SESSION['id'])): ?>
               <a href="?page=register"><li>Sing Up</li></a>
               <a href="?page=login"><li>Sing in</li></a>
            <?php else: ?>
               <a href="?page=logout"><li>Logout<i class="fa fa-power-off" aria-hidden="true" style="color:red;"></i></li></a>
               <a href="?page=profile"><li>Profile</li></a>
            <?php endif; ?>
         </ul>
      </li>
   </ul>
</div>
