<?php
   if(isset($_GET['page']) && !empty($_GET['page'])){
      if(isset($_SESSION['id'])){
         switch ($_GET['page']) {
            case '404':
               require_once ('views/404.php');
               break;
               #auth
               case 'logout':
                  require_once ('views/auth/logout.php');
                  break;
                  case 'profile':
                     require_once ('views/auth/profile.php');
                     break;
                     case 'editavatar':
                        require_once ('views/auth/editavatar.php');
                        break;
                        case 'changepassword':
                           require_once ('views/auth/changepassword.php');
                           break;
                           case 'editprofile':
                              require_once ('views/auth/editprofile.php');
                              break;
                              #blog
                              case 'myblog':
                                 require_once ('views/blog/myblog.php');
                                 break;
                                 case 'writeblog':
                                    require_once ('views/blog/writeblog.php');
                                    break;
                                    case 'read':
                                       require_once ('views/blog/read.php');
                                       break;
                                       default:
                                       header('location:?page=404');
                                       break;
         }
      }else{
         #swicth = เข้าเงื่อนไขให้ตรงกับค่าที่เราตั้ง
         switch ($_GET['page']) {
            #auth
            case '404':
               require_once ('views/404.php');
               break;
               case 'login':
                  require_once ('views/auth/login.php');
                  break;
                  case 'register':
                     require_once ('views/auth/register.php');
                     break;
                     case 'myblog':
                        header ('location:?page=login');
                        break;
                        case 'writeblog':
                           header ('loacation:?page=login');
                           break;
                           case 'read':
                              require_once ('views/blog/read.php');
                              break;
                              default:
                              header('location=?page=404');
               break;
         }
      }
   }else {
         require_once ('views/layout/main.php');
   }


 ?>
