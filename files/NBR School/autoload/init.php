<?php

   require_once 'autoload/database.php';
   session_start();
   foreach (glob('config/*.php')as $phpname){
      require_once $phpname;
      }
      foreach (glob('public/css/*.css') as $cssname){
         echo "<link rel='stylesheet' href='$cssname'/>";
      }
      foreach(glob('public/js/*.js') as $jsname){
         echo "<script src='$jsname'></script>";
      }
 ?>
