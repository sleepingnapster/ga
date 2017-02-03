<?php require_once('../Connections/greenassign.php'); ?>
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

if (isset($_POST['userid'])) {
  $loginUsername=$_POST['userid'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "base.php?loginsuccess=1";
  $MM_redirectLoginFailed = "base.php?loginsuccess=0";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_greenassign, $greenassign);
  
  $LoginRS__query=sprintf("SELECT t_id, t_title, t_fname, t_lname, t_email, t_password FROM teacher WHERE t_email=%s AND t_password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $greenassign) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	
	
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$row_rsLogin = mysql_fetch_assoc($LoginRS);
    $_SESSION['MM_tid'] = $row_rsLogin['t_id'];
    $_SESSION['MM_ttitle'] = $row_rsLogin['t_title'];
    $_SESSION['MM_tfname'] = $row_rsLogin['t_fname'];
    $_SESSION['MM_tlname'] = $row_rsLogin['t_lname'];



	$colname_rsLoginSubs = "-1";
	if (isset($row_rsLogin['t_id'])) {
	  $colname_rsLoginSubs = $row_rsLogin['t_id'];
	}
	mysql_select_db($database_greenassign, $greenassign);
	$query_rsLoginSubs = sprintf("SELECT * 
FROM (

SELECT * 
FROM sub s
JOIN subteacher st ON st.subid = s.sub_id
)sb
WHERE sb.tid = %s
ORDER BY sb.sub_id ASC", GetSQLValueString($colname_rsLoginSubs, "int"));
	$rsLoginSubs = mysql_query($query_rsLoginSubs, $greenassign) or die(mysql_error());
	$row_rsLoginSubs = mysql_fetch_assoc($rsLoginSubs);
	$totalRows_rsLoginSubs = mysql_num_rows($rsLoginSubs);
	
	
//enter the subs in the session array as well as the subs count
$i=0;
	  do { 
		$_SESSION['MM_Subids'][$i]=array('subid' => $row_rsLoginSubs['sub_id'],'subabbv' => $row_rsLoginSubs['sub_abbv'], 'subname' => $row_rsLoginSubs['sub_name'], 'subclass' => $row_rsLoginSubs['sub_class']);
	$i=$i+1;//while ($row_rsAssigns = mysql_fetch_assoc($rsAssigns));
  } while ($row_rsLoginSubs = mysql_fetch_assoc($rsLoginSubs)); 
  mysql_free_result($rsLoginSubs);
	$_SESSION['MM_Subcount']=$i;
    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess."?count=".$i );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>GreenAssign | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form ACTION="<?php echo $loginFormAction; ?>" method="POST" name="loginform">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="userid" id="userid" class="form-control" placeholder="Email ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                    
                    <p>Forgot password? call:9594462290</p>
                    
                    <a href="examples/register.html" class="text-center">Register a new Teacher</a>
                </div>
            </form>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>