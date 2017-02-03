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




if(!isset($_SESSION))
{
	session_start();
	}
	
if (!(((isset($_SESSION['GA_rollno'])&(isset($_SESSION['email']))))||(isset($_SESSION['GA_usertype'])&&($_SESSION['GA_usertype']=="teacher")&&(isset($_SESSION['GA_ut_id']))))){header("Location: ../index.php"); 
  exit;}
	
	
	
$colname_RsUserDetails = "-1";
if (isset($_GET['email'])) {
  $colname_RsUserDetails = $_GET['email'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsUserDetails = sprintf("SELECT * \n"
    . "FROM (\n"
    . "SELECT * \n"
    . "FROM `user` \n"
    . "WHERE email = %s \n"
    . ") AS Usr1\n"
    . "JOIN `user_teacher` \n"
    . "ON `Usr1`.`email` = `user_teacher`.`ut_email` ", GetSQLValueString($colname_RsUserDetails, "text"));
$RsUserDetails = mysql_query($query_RsUserDetails, $greenassign) or die(mysql_error());
$row_RsUserDetails = mysql_fetch_assoc($RsUserDetails);
$totalRows_RsUserDetails = mysql_num_rows($RsUserDetails);

mysql_select_db($database_greenassign, $greenassign);
$query_rsLoginSubs = sprintf("SELECT  `class` . * ,  `sub` . * 
FROM class
INNER JOIN sub
INNER JOIN subteacher ON  `class`.`class_id` =  `sub`.`sub_class_id` 
AND  `subteacher`.`subid` =  `sub`.`sub_id`
WHERE `subteacher`.`tid` = %s 
			ORDER BY `sub`.`sub_id` ASC", GetSQLValueString($row_RsUserDetails['ut_id'], "int"));
			
				$rsLoginSubs = mysql_query($query_rsLoginSubs, $greenassign) or die(mysql_error());
				$row_rsLoginSubs = mysql_fetch_assoc($rsLoginSubs);
				$totalRows_rsLoginSubs = mysql_num_rows($rsLoginSubs);

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
            
            <section class="content-header">
                    <h1>Profile Page
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../"><i class="fa fa-home"></i></a></li>
                        <li class="inactive"><a href="../ClassMembers/">Class Members of <?php echo $row_RsUserDetails['class_readablename']; ?></a></li>
                        <li class="active"><?php echo $row_RsUserDetails['ut_displayname']; ?></li>
                    </ol>
                </section>
            
            
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
                                        <img class="img-responsive" src="<?php echo rtrim($row_RsUserDetails['ut_imageurl'],"50")."259"; ?>" alt=""> 
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
                                    <h2 class="m-0 c-white"><?php echo $row_RsUserDetails['ut_displayname']; ?></h2>
                                </div>
                            </div>
                            
                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Contact</h2>
                                <ul>
                                    <li><i class="fa fa-envelope"></i> <?php echo $row_RsUserDetails['email']; ?></li>
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
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="glyphicon glyphicon-user"></i> Basic Information</h2>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Full Name</dt>
                                            <dd><?php echo $row_RsUserDetails['ut_displayname']; ?></dd>
                                        </dl>
                                        
                                        <dl class="dl-horizontal">
                                            <dt>Subjects taught:</dt>
                                            <dd><?php echo $row_rsLoginSubs['ut_displayname']; ?></dd>
                                        </dl>
                                        <?php
                                        $i=0;
									  do { 
									  ?>
									   <dl class="dl-horizontal">
                                            <dt>Subject <?php echo $i+1; ?></dt>
                                            <dd><?php echo $row_rsLoginSubs['sub_abbv']." : ".$row_rsLoginSubs['sub_name']."	(".$row_rsLoginSubs['class_readablename'].")"; ?></dd>
                                        </dl>
                                        <?php
										
										$i=$i+1;//while ($row_rsAssigns = mysql_fetch_assoc($rsAssigns));
									  } while ($row_rsLoginSubs = mysql_fetch_assoc($rsLoginSubs)); 
									  
		  
			  mysql_free_result($rsLoginSubs);
                                        row_rsLoginSubs
                                        
                                        
                                        
                                        
                                        
                                        
                                     ?>   
                                        
                                        
                                    </div>
                                </div>
                            </div>
                    
                            
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="glyphicon glyphicon-stats"></i> About me</h2>
                                    
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <?php echo $row_RsUserDetails['aboutme0']; ?>
                                    </div>
                                </div>
                            </div>
                       
                        
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="glyphicon glyphicon-phone-alt"></i> Private Information (OPTIONAL)</h2>
                                    
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
