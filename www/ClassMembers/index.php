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

$colname_RsBatch1Students = "-1";
if (isset($_SESSION['class_id'])) {
  $colname_RsBatch1Students = $_SESSION['class_id'];
}
else{header("Location: ../pages/SelectClass.php?page=ClassMembers");exit;}
mysql_select_db($database_greenassign, $greenassign);
$query_RsBatch1Students = sprintf("SELECT * FROM user_student WHERE us_class_id = %s AND us_batch = 1 ORDER BY us_rollno ASC", GetSQLValueString($colname_RsBatch1Students, "int"));
$RsBatch1Students = mysql_query($query_RsBatch1Students, $greenassign) or die(mysql_error());
$row_RsBatch1Students = mysql_fetch_assoc($RsBatch1Students);
$totalRows_RsBatch1Students = mysql_num_rows($RsBatch1Students);

$colname_RsBatch2Students = "-1";
if (isset($_SESSION['class_id'])) {
  $colname_RsBatch2Students = $_SESSION['class_id'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsBatch2Students = sprintf("SELECT * FROM user_student WHERE us_class_id = %s AND us_batch = 2 ORDER BY us_rollno ASC", GetSQLValueString($colname_RsBatch2Students, "int"));
$RsBatch2Students = mysql_query($query_RsBatch2Students, $greenassign) or die(mysql_error());
$row_RsBatch2Students = mysql_fetch_assoc($RsBatch2Students);
$totalRows_RsBatch2Students = mysql_num_rows($RsBatch2Students);


$colname_RsBatch3Students = "-1";
if (isset($_SESSION['class_id'])) {
  $colname_RsBatch3Students = $_SESSION['class_id'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsBatch3Students = sprintf("SELECT * FROM user_student WHERE us_class_id = %s AND us_batch = 3 ORDER BY us_rollno ASC", GetSQLValueString($colname_RsBatch3Students, "int"));
$RsBatch3Students = mysql_query($query_RsBatch3Students, $greenassign) or die(mysql_error());
$row_RsBatch3Students = mysql_fetch_assoc($RsBatch3Students);
$totalRows_RsBatch3Students = mysql_num_rows($RsBatch3Students);


$colname_RsBatch4Students = "-1";
if (isset($_SESSION['class_id'])) {
  $colname_RsBatch4Students = $_SESSION['class_id'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsBatch4Students = sprintf("SELECT * FROM user_student WHERE us_class_id = %s AND us_batch = 4 ORDER BY us_rollno ASC", GetSQLValueString($colname_RsBatch4Students, "int"));
$RsBatch4Students = mysql_query($query_RsBatch4Students, $greenassign) or die(mysql_error());
$row_RsBatch4Students = mysql_fetch_assoc($RsBatch4Students);
$totalRows_RsBatch4Students = mysql_num_rows($RsBatch4Students);

mysql_select_db($database_greenassign, $greenassign);
$query_RsClassTeachers = "SELECT * FROM `user_teacher` JOIN `subteacher` ON ut_id = tid JOIN `sub` ON subid = sub_id WHERE sub_class_id = 15 ORDER BY sub_id";
$RsClassTeachers = mysql_query($query_RsClassTeachers, $greenassign) or die(mysql_error());
$row_RsClassTeachers = mysql_fetch_assoc($RsClassTeachers);
$totalRows_RsClassTeachers = mysql_num_rows($RsClassTeachers);



?>
<!DOCTYPE html>
<html>
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
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        
        
        
        
		<!-- BEGIN STYLESHEETS -->
				<link href="MaterialLists_files/css" rel="stylesheet" type="text/css">
			<link type="text/css" rel="stylesheet" href="MaterialLists_files/bootstrap.css">

			<link type="text/css" rel="stylesheet" href="MaterialLists_files/materialadmin.css">

			<link type="text/css" rel="stylesheet" href="MaterialLists_files/font-awesome.min.css">

			<link type="text/css" rel="stylesheet" href="MaterialLists_files/material-design-iconic-font.min.css">

	
		<link type="text/css" rel="stylesheet" href="MaterialLists_files/jquery-ui-theme.css">

		<link type="text/css" rel="stylesheet" href="MaterialLists_files/nestable.css">

		<!-- END STYLESHEETS -->


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
	<script type="text/javascript" src="http://www.codecovers.eu/assets/js/modules/materialadmin/libs/utils/html5shiv.js?1422823601"></script>
	<script type="text/javascript" src="http://www.codecovers.eu/assets/js/modules/materialadmin/libs/utils/respond.min.js?1422823601"></script>
    <![endif]-->
	<style type="text/css"></style><style type="text/css"></style><script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script><style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
.en-markup-crop-options {
    top: 18px !important;
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
        
        
        
        
        
        
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
         <?php include '../includes/header.php';?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
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
					*/?>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    
                    <?php include '../includes/menu.php';?>
                    
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><i class="fa fa-list-alt"></i>
                        &nbsp;&nbsp;Class Members
                    </h1>
                </section>
                <!-- Main content -->
                <div id="content">
	<!-- BEGIN LIST SAMPLES -->
	<section>
		<div class="section-body contain-lg">
			<div class="row">
            <div class="col-lg-12">
			  <h2 align="center" class="text-primary">TE CMPN B</h2>
			  </div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="card">
                    	<div align="center" class="card-head">
							<header>Batch 1</header>
							<div class="tools">
								<a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
								
							</div>
						</div>
						<div class="card-body no-padding">
							<ul class="list">
								<?php do { ?>
							    <li class="tile">
								    
								    <a class="tile-content ink-reaction" href="../Profile/ViewProfile.php?email=<?php echo $row_RsBatch1Students['email']; ?>">
								      <div class="tile-icon">
								        <img src="<?php if (isset($row_RsBatch1Students['us_imageurl']))echo $row_RsBatch1Students['us_imageurl'];else echo "http://greenassign.com/img/avatar2.png"; ?>" alt="No Pic">
							        </div>
								      <div class="tile-text">
								        <?php echo $row_RsBatch1Students['us_displayname']; ?>
								        <small><?php echo $row_RsBatch1Students['us_rollno']; ?></small>
							        </div>
								      
							      </a>
								    <a class="btn btn-flat btn-danger ink-reaction"><?php //echo $row_RsBatch1Students['email']; ?>
							        <i class="fa fa-envelope"></i>
								      
							        </a>
						        </li>
								  <li class="divider-inset"></li>
								  <?php } while ($row_RsBatch1Students = mysql_fetch_assoc($RsBatch1Students)); ?>
						  </ul>
						</div><!--end .card-body -->
					</div><!--end .card -->
					
			  </div><div class="col-xs-12 col-sm-6 col-md-3">
					<div class="card">
                    	<div align="center" class="card-head">
							<header>Batch 2</header>
							<div class="tools">
								<a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
								
							</div>
						</div>
						<div class="card-body no-padding">
							<ul class="list">
								<?php do { ?>
							    <li class="tile">
								    
								    <a class="tile-content ink-reaction" href="../Profile/ViewProfile.php?email=<?php echo $row_RsBatch2Students['email']; ?>">
								      <div class="tile-icon">
								        <img src="<?php if (isset($row_RsBatch2Students['us_imageurl']))echo $row_RsBatch2Students['us_imageurl'];else echo "http://greenassign.com/img/avatar2.png"; ?>" alt="No Pic">
							        </div>
								      <div class="tile-text">
								        <?php echo $row_RsBatch2Students['us_displayname']; ?>
								        <small><?php echo $row_RsBatch2Students['us_rollno']; ?></small>
							        </div>
								      
							      </a>
								    <a class="btn btn-flat btn-danger ink-reaction"><?php //echo $row_RsBatch2Students['email']; ?>
							        <i class="fa fa-envelope"></i>
								      
							        </a>
						        </li>
								  <li class="divider-inset"></li>
								  <?php } while ($row_RsBatch2Students = mysql_fetch_assoc($RsBatch2Students)); ?>
						  </ul>
						</div><!--end .card-body -->
					</div><!--end .card -->
					
				</div><div class="col-xs-12 col-sm-6 col-md-3">
					<div class="card">
                    	<div align="center" class="card-head">
							<header>Batch 3</header>
							<div class="tools">
								<a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
							</div>
						</div>
						<div class="card-body no-padding">
							<ul class="list">
								<?php do { ?>
							    <li class="tile">
								    
								    <a class="tile-content ink-reaction" href="../Profile/ViewProfile.php?email=<?php echo $row_RsBatch3Students['email']; ?>">
								      <div class="tile-icon">
								        <img src="<?php if (isset($row_RsBatch3Students['us_imageurl']))echo $row_RsBatch3Students['us_imageurl'];else echo "http://greenassign.com/img/avatar2.png"; ?>" alt="No Pic">
							        </div>
								      <div class="tile-text">
								        <?php echo $row_RsBatch3Students['us_displayname']; ?>
								        <small><?php echo $row_RsBatch3Students['us_rollno']; ?></small>
							        </div>
							      </a>
								    <a class="btn btn-flat btn-danger ink-reaction"><?php //echo $row_RsBatch3Students['email']; ?>
							        <i class="fa fa-envelope"></i>
								      
							        </a>
						        </li>
								  <li class="divider-inset"></li>
								  <?php } while ($row_RsBatch3Students = mysql_fetch_assoc($RsBatch3Students)); ?>
                                
						  </ul>
						</div><!--end .card-body -->
					</div><!--end .card -->
				</div><!--end .col -->
                <div class="col-xs-12 col-sm-6 col-md-3">
					<div class="card">
                    	<div align="center" class="card-head">
							<header>Batch 4</header>
							<div class="tools">
								<a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
								
							</div>
						</div>
						<div class="card-body no-padding">
							<ul class="list">
								<?php do { ?>
							    <li class="tile">
								    
								    <a class="tile-content ink-reaction" href="../Profile/ViewProfile.php?email=<?php echo $row_RsBatch4Students['email']; ?>">
								      <div class="tile-icon">
								        <img src="<?php if (isset($row_RsBatch4Students['us_imageurl']))echo $row_RsBatch4Students['us_imageurl'];else echo "http://greenassign.com/img/avatar2.png"; ?>" alt="No Pic">
							        </div>
								      <div class="tile-text">
								        <?php echo $row_RsBatch4Students['us_displayname']; ?>
								        <small><?php echo $row_RsBatch4Students['us_rollno']; ?></small>
							        </div>
								      
							      </a>
								    <a class="btn btn-flat btn-danger ink-reaction">
							        <i class="fa fa-envelope"></i>
								      
							        </a>
						        </li>
								  <li class="divider-inset"></li>
								  <?php } while ($row_RsBatch4Students = mysql_fetch_assoc($RsBatch4Students)); ?>
                                
						  </ul>
						</div><!--end .card-body -->
					</div><!--end .card -->
				</div>
			</div><!--end .row -->
			<!-- END TILE ACTIONS -->

			<hr class="ruler-xxl">
			<div class="row">
              	<div class="col-md-12">
					<div class="card">
                    	<div align="center" class="card-head">
							<header>Teachers</header>
							<div class="tools">
								<a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
								
							</div>
						</div>
						<div class="card-body no-padding">
							<ul class="list">
								
								
                                
                                
							    <?php do { ?>
						        <li class="tile">
							        
							        <a class="tile-content ink-reaction" href="../Profile/ViewTeacherProfile.php?email=<?php echo $row_RsClassTeachers['ut_email']; ?>">
							          <div class="tile-icon">
							            <img src="<?php if (isset($row_RsClassTeachers['ut_imageurl']))echo $row_RsClassTeachers['ut_imageurl'];else echo "http://greenassign.com/img/avatar2.png"; ?>" alt="No Pic">
							            </div>
							          <div class="tile-text">
							            <?php echo $row_RsClassTeachers['ut_displayname']." (".$row_RsClassTeachers['sub_abbv'].")"; ?>
							            <small><?php echo $row_RsClassTeachers['ut_email']; ?></small>
							            </div>
							          
							          </a>
							        <a class="btn btn-flat btn-danger ink-reaction"><?php //echo $row_RsBatch1Students['email']; ?>
						            <i class="fa fa-envelope"></i>
							          
						            </a>
							        </li>
							      <li class="divider-inset"></li>
							      <?php } while ($row_RsClassTeachers = mysql_fetch_assoc($RsClassTeachers)); ?>
								 
                                 
                                 
                                 
                                 
                                 
				          </ul>
						</div><!--end .card-body -->
					</div><!--end .card -->
					
			  </div>
           	</div><!--end .row -->
			<!-- BEGIN SORTABLE -->
			<!--end .row -->
			<!-- END SORTABLE -->
			<!-- BEGIN TODO -->
			<!--end .row -->
			<!-- END TODO -->
			<!-- BEGIN NESTABLE LISTS -->
			<!--end .row -->
			<!-- END NESTABLE LISTS -->
		</div><!--end .section-body -->
	</section>
		</div>
                <!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes <script src="js/AdminLTE/demo.js" type="text/javascript"></script>-->
        
       
        
<script src="MaterialLists_files/63d0445130d69b2868a8d28c93309746.js"></script>
<script src="MaterialLists_files/Demo.js"></script>
        
    </body>
</html>
<?php
mysql_free_result($RsBatch1Students);

mysql_free_result($RsBatch2Students);
mysql_free_result($RsBatch3Students);
mysql_free_result($RsBatch4Students);

mysql_free_result($RsClassTeachers);
?>
