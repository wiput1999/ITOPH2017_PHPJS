<?php require_once('Connections/ddsa.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user'])) {
  $loginUsername=$_POST['user'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index-d.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_ddsa, $ddsa);
  
  $LoginRS__query=sprintf("SELECT login_user, login_pass, login_type FROM login WHERE login_user=%s AND login_pass=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $ddsa) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_Usertype'] = mysql_result($LoginRS,0,2);		      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #CCC;
	background-repeat: no-repeat;
	background-attachment:fixed;
}
</style>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onload="MM_preloadImages('index/1.1.png','index/c2.png','index/p2.png')">
<table height="1080" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="384" align="left" valign="top"><form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
      <table width="300" height="100" bgcolor="#00CCFF" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td><table width="276" border="0"  cellspacing="1" cellpadding="1">
            <tr>
              <td align="right">ชื่อผู้ใช้</td>
              <td><label for="user2"></label>
                <input name="user" type="text" id="user2" maxlength="15" /></td>
            </tr>
            <tr>
              <td align="right">รหัสผ่าน</td>
              <td><label for="pass"></label>
                <input name="pass" type="password" id="pass" maxlength="15" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="d" id="d" value="ล็อกอิน" />
                <a href="register.php">สมัครสมาชิก</a></td>
            </tr>
          </table></td>
        </tr>
    </table>
    </form></td>
    <td width="1152" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
      <table width="200" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td><img src="index/ba.png" width="760" height="177" /></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="809" border="0" cellspacing="10" cellpadding="10">
      <tr>
        <td width="231" align="center"><img src="index/oph-10.jpeg" width="150" height="200"/> </td>
        <td width="508"><a href="home1.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','index/1.1.png',1)"><img src="index/1.png" width="508" height="119" id="Image2" /></a></td>
      </tr>
      <tr>
        <td align="center"><img src="index/oph-15.jpg" width="150" height="200" /></td>
        <td><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','index/c2.png',1)"><img src="index/c.png" width="508" height="119" id="Image3" /></a></td>
      </tr>
      <tr>
        <td align="center"><img src="index/oph-20.jpg" width="150" height="200" /></td>
        <td><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','index/p2.png',1)"><img src="index/p.png" width="508" height="119" id="Image4" /></a></td>
      </tr>
    </table>
    <p>&nbsp;</p></td>
    <td width="384">&nbsp;</td>
  </tr>
</table>
</body>
</html>