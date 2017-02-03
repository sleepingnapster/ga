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

$maxRows_rsNews = 5;
$pageNum_rsNews = 0;
if (isset($_GET['pageNum_rsNews'])) {
  $pageNum_rsNews = $_GET['pageNum_rsNews'];
}
$startRow_rsNews = $pageNum_rsNews * $maxRows_rsNews;

if(!(isset($_SESSION['GA_institute']) && isset($_SESSION['class']))){header("Location: ../");}

mysql_select_db($database_greenassign, $greenassign);
$query_rsNews = "SELECT cn_id, cn_title, cn_img, cn_summary, cn_content, cn_by, cn_uploaddate FROM classnews WHERE cn_collegeid='".$_SESSION['GA_institute']."' AND cn_class='".$_SESSION['class']."' ORDER BY cn_uploaddate DESC";
$query_limit_rsNews = sprintf("%s LIMIT %d, %d", $query_rsNews, $startRow_rsNews, $maxRows_rsNews);
$rsNews = mysql_query($query_limit_rsNews, $greenassign) or die(mysql_error());
$row_rsNews = mysql_fetch_assoc($rsNews);

if (isset($_GET['totalRows_rsNews'])) {
  $totalRows_rsNews = $_GET['totalRows_rsNews'];
} else {
  $all_rsNews = mysql_query($query_rsNews);
  $totalRows_rsNews = mysql_num_rows($all_rsNews);
}
$totalPages_rsNews = ceil($totalRows_rsNews/$maxRows_rsNews)-1;
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
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
         <?php include '../includes/header.php';?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                	
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                    <?php include '../includes/menu.php';?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><i class="fa fa-bullhorn"></i>
                        &nbsp;&nbsp;SFIT News
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">SFIT News</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php do { ?>
                      <div class="col-xs-7">
                        <div class="box box-solid" >
                          <div class="box-header">
                            <h3 class="box-title"><?php echo $row_rsNews['cn_title']; ?></h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body" align="center">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                              </ol>
                              <?php if(isset($row_rsNews['cn_img'])){?><div class="carousel-inner">
                                <div class="item active"> <img src="ClassNewsImages/<?php echo $row_rsNews['cn_img']; ?>" alt="First slide">
                                  <div class="carousel-caption"> First Slide </div>
                                </div>
                                <div class="item"> <img src="ClassNewsImages/<?php echo $row_rsNews['cn_img']; ?>" alt="Second slide">
                                  <div class="carousel-caption"> Second Slide </div>
                                </div>
                                <div class="item"> <img src="ClassNewsImages/<?php echo $row_rsNews['cn_img']; ?>" alt="Third slide">
                                  <div class="carousel-caption"> Third Slide </div>
                                </div>
                              </div><?php } ?>
                              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
                            <!-- /carousel -->
                            <br />
                            <!-- Default box -->
                            <div class="box collapsed-box">
                              <div class="box-header">
                                <h4 class="box-title"><?php echo $row_rsNews['cn_summary']; ?></h4>
                                <div class="box-tools pull-right">
                                  <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
                                </div>
                              </div>
                              <div class="box-body" style="display: none;">
                                <h4><?php echo $row_rsNews['cn_content']; ?></h4>
                                <blockquote class="pull-left"> <small>Posted on <?php echo $row_rsNews['cn_uploaddate']; ?></small> </blockquote>
                                </h4>
                                <blockquote class="pull-right"> <small>by <?php echo $row_rsNews['cn_by']; ?></small> </blockquote>
                                <br />
                                <br />
                              </div>
                              <!-- /.box-body -->
                            </div>
                          </div>
                          <!-- /.box -->
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <?php } while ($row_rsNews = mysql_fetch_assoc($rsNews)); ?> 
                        
                        
                        
                        
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
    </body>
</html>
<?php
mysql_free_result($rsNews);
?>
