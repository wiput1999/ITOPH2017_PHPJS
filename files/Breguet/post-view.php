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

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['post_id'])) {
  $colname_Recordset1 = $_GET['post_id'];
}
mysql_select_db($database_ddsa, $ddsa);
$query_Recordset1 = sprintf("SELECT * FROM post WHERE post_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $ddsa) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
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
</script>
</head>

<body>
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
    <td width="1152" align="center" valign="middle" bgcolor="#FFFFFF"><p>&nbsp;</p>
      <table width="926" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="154" align="center" bgcolor="#CCCCCC"><strong>หัวข้อ</strong></td>
          <td width="211" align="center" bgcolor="#CCCCCC"><strong>รายละเอียด</strong></td>
          <td width="192" align="center" bgcolor="#CCCCCC"><strong>ผู้เขียน</strong></td>
          <td width="176" align="center" bgcolor="#CCCCCC"><strong>หมวดหมู่</strong></td>
          <td width="177" align="center" bgcolor="#CCCCCC"><strong>วันที่</strong></td>
        </tr>
        <?php do { ?>
          <tr>
            <td align="center"><?php echo $row_Recordset1['post_t']; ?></td>
            <td align="center"><?php echo $row_Recordset1['post_c']; ?></td>
            <td align="center"><?php echo $row_Recordset1['post_user']; ?></td>
            <td align="center"><?php echo $row_Recordset1['post_g']; ?></td>
            <td align="center"><?php echo $row_Recordset1['post_date']; ?></td>
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table>
<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <td width="384">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
