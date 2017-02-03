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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "aboutme")) {
  $updateSQL = sprintf("UPDATE `hostrabb_greenassign`.`user` SET aboutme0=%s WHERE `user`.`email`=%s",
                       GetSQLValueString($_POST['aboutme0'], "text"),
                       GetSQLValueString($_POST['email0'], "text"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($updateSQL, $greenassign) or die(mysql_error());

  $updateGoTo = "../Profile";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "contactdetails")) {
  $updateSQL = sprintf("UPDATE `hostrabb_greenassign`.`user` SET facebook0=%s, instagram0=%s, twitter0=%s, location0=%s, phone0=%s WHERE `user`.`email`=%s",
                       GetSQLValueString($_POST['facebook0'], "text"),
                       GetSQLValueString($_POST['instagram0'], "text"),
                       GetSQLValueString($_POST['twitter0'], "text"),
                       GetSQLValueString($_POST['location0'], "text"),
                       GetSQLValueString($_POST['phone0'], "double"),
                       GetSQLValueString($_POST['email0'], "text"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($updateSQL, $greenassign) or die(mysql_error());

  $updateGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if(!isset($_SESSION))
{
	session_start();
	}
	
if (!(((isset($_SESSION['GA_rollno'])&(isset($_SESSION['email']))))||(isset($_SESSION['GA_usertype'])&&($_SESSION['GA_usertype']=="teacher")&&(isset($_SESSION['GA_ut_id']))))){header("Location: ../index.php"); 
  exit;}
	
	
	
$colname_RsUserDetails = "-1";
if (isset($_SESSION['email'])) {
  $colname_RsUserDetails = $_SESSION['email'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsUserDetails = sprintf("SELECT * FROM `user` WHERE email = %s", GetSQLValueString($colname_RsUserDetails, "text"));
$RsUserDetails = mysql_query($query_RsUserDetails, $greenassign) or die(mysql_error());
$row_RsUserDetails = mysql_fetch_assoc($RsUserDetails);
$totalRows_RsUserDetails = mysql_num_rows($RsUserDetails);

?>
<!DOCTYPE html>
<html style="overflow: hidden;">
    <head>
        <meta charset="UTF-8">
        <title>GreenAssign</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTEProfile.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        
        <!-- profiletheme-->
        
        
        <!-- Vendor CSS -->
        <link href="http://byrushan.com/projects/ma/v1-3-1/vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="http://byrushan.com/projects/ma/v1-3-1/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="http://byrushan.com/projects/ma/v1-3-1/vendors/material-icons/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="http://byrushan.com/projects/ma/v1-3-1/vendors/socicon/socicon.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="http://byrushan.com/projects/ma/v1-3-1/css/app.min.1.css" rel="stylesheet">
        <link href="http://byrushan.com/projects/ma/v1-3-1/css/app.min.2.css" rel="stylesheet">
    <style type="text/css"></style><script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script><style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
.en-markup-crop-options {
    //top: 18px !important;
    left: 50% !important;
    margin-left: -100px !important;
    width: 200px !important;
    border: 2px rgba(255,255,255,.38) solid !important;
    border-radius: 4px !important;
}

.en-markup-crop-options div div:first-of-type {
    margin-left: 0px !important;
}
</style>
        	
         <!-- /profiletheme-->
         
         
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
       <?php include '../includes/header.php';?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less --><!-- sidebar: style can be found in sidebar.less --><section class="sidebar">
                	<?php /*
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
					*/?><?php /*
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
					*/?>
                    <!-- sidebar menu: : style can be found in sidebar.less --><?php include '../includes/menu.php';?>
                    
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page --><!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
   				<section id="main">
              <section id="content">
                <div class="container">
                    
                    <div class="block-header">
                        <!--<h2>Malinda Hollaway <small>Web/UI Developer, Dubai, United Arab Emirates</small></h2>-->
                        <!--
                        <ul class="actions m-t-20 hidden-xs">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="md md-more-vert"></i>
                                </a>
                    
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Privacy Settings</a>
                                    </li>
                                    <li>
                                        <a href="">Account Settings</a>
                                    </li>
                                    <li>
                                        <a href="">Other Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        -->
                    </div>
                    
                    <div class="card" id="profile-main">
                        <div class="pm-overview c-overflow" tabindex="4" style="overflow: hidden; outline: none;">
                            <div class="pmo-pic">
                                <div class="p-relative">
                                    <a href="">
                                        <img class="img-responsive" src="<?php echo rtrim($_SESSION['gimageurl'],"50")."259"; ?>" alt=""> 
                                    </a>
                                    
                                    <div class="dropdown pmop-message">
                                        <a data-toggle="dropdown" href="" class="btn bgm-white btn-float z-depth-1 waves-effect waves-button waves-float">
                                            <i class="glyphicon glyphicon-comment"></i>
                                        </a>
                                        
                                        <div class="dropdown-menu">
                                            <textarea placeholder="Write something..."></textarea>
                                            
                                            <button class="btn bgm-green btn-icon waves-effect waves-button waves-float"><i class="glyphicon glyphicon-send"></i></button>
                                        </div>
                                    </div>
                                    
                                    <a href="" class="pmop-edit">
                                        <i class="glyphicon glyphicon-camera"></i> <span class="hidden-xs">Update Profile Picture</span>
                                    </a>
                                </div>
                                
                                
                                <div class="pmo-stat">
                                    <h2 class="m-0 c-white"><?php echo $_SESSION['GA_name']; ?></h2>
                                </div>
                            </div>
                            
                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Contact</h2>
                                
                                <ul>
                                    <li><i class="fa fa-envelope"></i> <?php echo $_SESSION['email']; ?></li>
  <?php if(isset($row_RsUserDetails['phone0'])){ ?> <li><i class="fa fa-phone"></i> <?php echo $row_RsUserDetails['phone0']; ?></li> <?php } ?>
 <?php if(isset($row_RsUserDetails['facebook0'])){ ?> <li><a href="https://www.<?php echo $row_RsUserDetails['facebook0']; ?>"><i class="fa fa-facebook"></i> <?php echo $row_RsUserDetails['facebook0']; ?></a></li><?php } ?>
 <?php if(isset($row_RsUserDetails['instagram0'])){ ?> <li><a href="https://<?php echo $row_RsUserDetails['instagram0']; ?>"><i class="fa fa-instagram"></i> <?php echo $row_RsUserDetails['instagram0']; ?></a></li><?php } ?>
 <?php if(isset($row_RsUserDetails['twitter0'])){ ?> <li><i class="fa fa-twitter"></i> <?php echo $row_RsUserDetails['twitter0']; ?></li><?php } ?>
 <?php if(isset($row_RsUserDetails['location0'])){ ?> <li>
                                        <i class="fa fa-map-marker"></i>
                                        <address class="m-b-0">
                                            <?php echo $row_RsUserDetails['location0']; ?>
                                        </address>
                                    </li><?php } ?>
                                </ul>
                            </div>	
                            <!--
                            <div class="pmo-block pmo-items hidden-xs">
                                <h2>Connections</h2>
                                
                                <div class="pmob-body">
                                    <div class="row">
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/1.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/2.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/3.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/4.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/5.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/6.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/7.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/8.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/1.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/2.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/3.jpg" alt="">
                                        </a>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="./MaterialAdmin_files/4.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        	-->
                        </div>
                        
                        <div class="pm-body clearfix">
                            <ul class="tab-nav tn-justified" tabindex="1" style="overflow: hidden; outline: none;">
    <li class="active waves-effect"><a href="./MaterialAdmin_files/MaterialAdmin.html">About</a></li>
   <!-- <li class="waves-effect"><a href="http://byrushan.com/projects/ma/v1-3-1/profile-timeline.html">Timeline</a></li>
    <li class="waves-effect"><a href="http://byrushan.com/projects/ma/v1-3-1/profile-timeline.html">Timeline2</a></li>
    <li class="waves-effect"><a href="http://byrushan.com/projects/ma/v1-3-1/profile-photos.html">Photos</a></li>
    <li class="waves-effect"><a href="http://byrushan.com/projects/ma/v1-3-1/profile-connections.html">Connections</a></li> -->
                            </ul>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <?php if (isset($_SESSION['GA_rollno'])&(isset($_SESSION['email']))){ ?>
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="glyphicon glyphicon-user"></i> Basic Information</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Correction Request</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Full Name</dt>
                                            <dd><?php echo $_SESSION['GA_name']; ?></dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt>Roll no. & Batch</dt>
                                            <dd><?php echo $_SESSION['GA_rollno']; ?> - Batch <?php echo $_SESSION['GA_batch'];// $_SESSION['GA_institute'] ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Class</dt>
                                            <dd><?php echo $_SESSION['class_readablename']; ?></dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt>Pid</dt>
                                            <dd><?php echo $_SESSION['GA_pid']; ?></dd>
                                        </dl>
                                    </div>
                                    
                                    <div class="pmbb-edit">
                                        <form action="../mailer/mailercorrectionrequest.php" method="post">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Full Name</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="name0" class="form-control" placeholder="eg. <?php echo $_SESSION['GA_name']; ?>">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Roll no. & Batch</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="rollno0" class="form-control" placeholder="eg. <?php echo $_SESSION['GA_rollno']; ?> - Batch <?php $_SESSION['GA_batch']; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                          <dl class="dl-horizontal">
                                            <dt class="p-t-10">Class</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="class0" class="form-control" placeholder="eg. <?php echo $_SESSION['class_readablename']; // $_SESSION['GA_institute'] ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Pid</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="pid0" class="form-control" placeholder="eg. <?php echo $_SESSION['GA_pid']; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <div class="m-t-30">
                                        <input type="text" name="email0" value="<?php echo $_SESSION['email'].' - '.$row_RsUserDetails['phone0']; ?>" hidden>
                                            <button type="submit" class="btn btn-primary btn-sm waves-effect waves-button waves-float waves-effect waves-button waves-float">Send Correction Request</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm waves-effect waves-button waves-float">Cancel</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                            
                            
                            
                            
                            
        
               <?php if(isset($_SESSION['GA_usertype'])&&($_SESSION['GA_usertype']=="teacher")&&(isset($_SESSION['GA_ut_id']))){ ?>                    
                            
                            
             <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="glyphicon glyphicon-user"></i> Basic Information</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Correction Request</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Full Name</dt>
                                            <dd><?php echo $_SESSION['GA_name']; ?></dd>
                                        </dl>
      <?php for($i=0;$i<$_SESSION['MM_Subcount'];$i++){ ?>                                   


     <dl class="dl-horizontal">
       <dt>Subject <?php echo $i+1; ?></dt>
        <dd><?php echo $_SESSION['MM_Subids'][$i]['subname']." (".$_SESSION['MM_Subids'][$i]['subabbv'].") ".$_SESSION['MM_Subids'][$i]['subclass']; ?></dd>
</dl>
      <?php  } ?>               
                                    </div>
                                    
                                    <div class="pmbb-edit">
                                        <form action="../mailer/mailercorrectionrequest2.php" method="post">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Full Name</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="name0" class="form-control" placeholder="eg. <?php echo $_SESSION['GA_name']; ?>">
                                            </div>
                                        </dd>
                                    </dl>
                                        
                                        
                                        
                                        
                            <?php for($i=0;$i<$_SESSION['MM_Subcount'];$i++){ ?>


    <dl class="dl-horizontal">
        <dt class="p-t-10">Subject <?php echo $i+1; ?></dt>
        <dd>
            <div class="fg-line">
                <input type="text" name="subject<?php echo $i; ?>" class="form-control" placeholder="eg. <?php echo $_SESSION['MM_Subids'][$i]['subname']." (".$_SESSION['MM_Subids'][$i]['subabbv'].") ".$_SESSION['MM_Subids'][$i]['subclass']; ?>">
        </div>
    </dd>
</dl>
                     <?php  } ?>
                     
                                       
                             <dl class="dl-horizontal">
                                    <dt class="p-t-10">Comments </dt>
                                    <dd>
                                        <div class="fg-line">
                                            <textarea name="comments0" class="form-control" rows="5" placeholder="Summary..."><?php for($i=0;$i<$_SESSION['MM_Subcount'];$i++){ ?>Subject<?php echo $i." ".$_SESSION['MM_Subids'][$i]['subname']." (".$_SESSION['MM_Subids'][$i]['subabbv'].") ".$_SESSION['MM_Subids'][$i]['subclass']."\n";
											} ?>
											</textarea>
                                        </div>
                                	</dd>
							</dl>    
                                        
                                        
                                        
                                        <div class="m-t-30">
                                        <input type="text" name="email0" value="<?php echo $_SESSION['email'].' - '.$row_RsUserDetails['phone0']; ?>" hidden>
                                            <button type="submit" class="btn btn-primary btn-sm waves-effect waves-button waves-float waves-effect waves-button waves-float">Send Correction Request</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm waves-effect waves-button waves-float">Cancel</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>               
                       
                       
                       
           		<?php } ?> 
                       
                       
                       
                            
                            
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="glyphicon glyphicon-stats"></i> About me</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Edit</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <?php echo $row_RsUserDetails['aboutme0']; ?>
                                    </div>
                                    
                                    <div class="pmbb-edit"><form action="<?php echo $editFormAction; ?>" name="aboutme0" method="POST">
                                        <div class="fg-line">
                                            <textarea name="aboutme0" class="form-control" rows="5" placeholder="Summary..."><?php echo $row_RsUserDetails['aboutme0']; ?></textarea>
                                        </div>
                                        <div class="m-t-10">
                                        <input type="email" name="email0" value="<?php echo $_SESSION['email'];?>" hidden>                                            <button type="submit" class="btn btn-primary btn-sm waves-effect waves-button waves-float">Save</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm waves-effect waves-button waves-float">Cancel</button>
                                        </div>
                                        <input type="hidden" name="MM_update" value="aboutme">
                                    </form>
                                    </div>
                                </div>
                            </div>
                       
                        
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="glyphicon glyphicon-phone-alt"></i> Private Information (OPTIONAL)</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Edit</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Mobile Phone</dt>
                                            <dd><?php echo $row_RsUserDetails['phone0']; ?></dd>
                                        </dl>
<?php if(isset($row_RsUserDetails['facebook0'])){ ?><dl class="dl-horizontal">
                                            <dt>Facebook</dt>
                                            <dd><?php echo $row_RsUserDetails['facebook0']; ?></dd>
                                        </dl><?php } ?>
<?php if(isset($row_RsUserDetails['instagram0'])){ ?><dl class="dl-horizontal">
                                            <dt>Instagram</dt>
                                            <dd><?php echo $row_RsUserDetails['instagram0']; ?></dd>
                                        </dl><?php } ?>
<?php if(isset($row_RsUserDetails['twitter0'])){ ?><dl class="dl-horizontal">
                                            <dt>Twitter</dt>
                                            <dd><?php echo $row_RsUserDetails['twitter0']; ?></dd>
                                        </dl><?php } ?>
<?php if(isset($row_RsUserDetails['location0'])){ ?><dl class="dl-horizontal">
                                            <dt>Closest Station</dt>
                                            <dd><?php echo $row_RsUserDetails['location0']; ?></dd>
                                        </dl><?php } ?>
                                    </div>
                                    
                                    <div class="pmbb-edit">
                                   	  <form action="<?php echo $editFormAction; ?>" name="contactdetails" method="POST">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Mobile Phone</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input name="phone0" type="text" class="form-control" placeholder="9876543210" value="<?php echo $row_RsUserDetails['phone0']; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Facebook</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input name="facebook0" type="text" placeholder="facebook.com/ryan.augustine.10" class="form-control" value="<?php echo $row_RsUserDetails['facebook0']; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Instagram</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input name="instagram0" type="text" placeholder="instagram.com/augustineryan"  class="form-control" value="<?php echo $row_RsUserDetails['instagram0']; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Twitter</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input name="twitter0" type="text" placeholder="@dan.b" class="form-control" value="<?php echo $row_RsUserDetails['twitter0']; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Closest Station</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input name="location0" type="text" placeholder="Vasai" class="form-control" value="<?php echo $row_RsUserDetails['location0']; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        
                                        <div class="m-t-30">
                                         <input type="email" name="email0" value="<?php echo $_SESSION['email'];?>" hidden>
                                            <button type="submit" class="btn btn-primary btn-sm waves-effect waves-button waves-float">Save</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm waves-effect waves-button waves-float">Cancel</button>
                                        </div>
                                        <input type="hidden" name="MM_update" value="contactdetails">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
                
              
                
    		</aside><!-- /.right-side --></div><!-- ./wrapper -->






        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes <script src="js/AdminLTE/demo.js" type="text/javascript"></script>-->
        
		
        <!-- Javascript Libraries 
        <script src="MaterialAdmin_files/0jquery-2.1.1.min.js"></script>
        <script src="MaterialAdmin_files/0bootstrap.min.js"></script>-->
        
        <script src="MaterialAdmin_files/0moment.min.js"></script>
        <script src="MaterialAdmin_files/0jquery.nicescroll.min.js"></script>
        <script src="MaterialAdmin_files/0waves.min.js"></script>
        <script src="MaterialAdmin_files/0bootstrap-growl.min.js"></script>
        <script src="MaterialAdmin_files/0sweet-alert.min.js"></script>
        <script src="MaterialAdmin_files/0bootstrap-datetimepicker.min.js"></script>
        
        <script src="MaterialAdmin_files/0functions.js"></script>
    <!--     <script src="MaterialAdmin_files/0demo.js"></script>-->
    

    </body>
</html>
<?php
mysql_free_result($RsUserDetails);
?>
