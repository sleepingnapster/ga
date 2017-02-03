<?php require_once('Connections/greenassign.php'); 
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

$maxRows_rsNews = 10;
$pageNum_rsNews = 0;
if (isset($_GET['pageNum_rsNews'])) {
  $pageNum_rsNews = $_GET['pageNum_rsNews'];
}
$startRow_rsNews = $pageNum_rsNews * $maxRows_rsNews;

mysql_select_db($database_greenassign, $greenassign);
$query_rsNews = "SELECT news_id, news_title, news_img, news_img0, news_img1, news_img2, news_img3, news_img4, news_imgcount, news_summary, news_content, news_by, news_email, news_date FROM news ORDER BY news_uploadtimestamp DESC";
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
if(!isset($_SESSION))
{
	session_start();
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GreenAssign</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
         <?php include 'includes/header.php';?>
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
                    
                    <?php include 'includes/menu.php';?>
                    
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
                        <li><a href="http://greenassign.com/"><i class="fa fa-home"></i></a></li>
                        <li class="active">SFIT News</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                
                
               <?php if(isset($_SESSION['GA_usertype'])&&($_SESSION['GA_usertype']=="teacher")&&(isset($_SESSION['GA_ut_id']))){ ?>
                <div class="col-xs-12 col-sm-12 col-md-11 col-lg-7">
                      <div class="box box-solid" align="center">
                        <div class="box-footer clearfix" align="center">
                                    <div class="center-block" align="center">
                                       <!-- Show if not last page-->
<a href="CollegeNews/CollegeNewsUpload.php"><button class="btn btn-primary">Post News to <?php echo strtoupper($_SESSION['GA_institute']); ?></button>
                                      </a>
                                        
                                    </div>
                                </div><!-- box-footer -->
                        </div>
                        </div>
                <?php } ?>
                
                
                <?php $icarrol=0; ?>
                
                    <?php do { $icarrol++; ?>
                      <div class="col-xs-12 col-sm-12 col-md-11 col-lg-7">
                        <div class="box box-solid" >
                          <div class="box-header">
                            <h3 class="box-title"><?php echo $row_rsNews['news_title']; ?></h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body" align="center">
                          
                           <?php if($row_rsNews['news_imgcount']==1){?>
							  <img src="CollegeNews/NewsImages/<?php echo $row_rsNews['news_img0']; ?>" alt="First slide">
                              <?php }else{ ?>
                          
                            <div id="carousel-example-generic<?php echo $icarrol; ?>" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic<?php echo $icarrol; ?>" data-slide-to="0" class="active"></li>
                                <?php for($ii=1;$ii<$row_rsNews['news_imgcount'];$ii++){?>
                               <li data-target="#carousel-example-generic<?php echo $icarrol; ?>" data-slide-to=<?php echo $ii; ?> class></li>
                              	<?php } ?>
                              </ol>
							  <?php if(isset($row_rsNews['news_img'])){?>
                              <div class="carousel-inner">
                               <?php for($ii=0;$ii<$row_rsNews['news_imgcount'];$ii++){
								  $str="news_img".$ii;
								  ?>
<div class="item<?php if($ii==0)echo " active"?>"> <img src="CollegeNews/NewsImages/<?php echo $row_rsNews[$str]; ?>" alt="Slide <?php echo $ii+1; ?>">
                                  <div class="carousel-caption"></div>
                                </div>
                                <?php } ?>
                              </div>
							  
							  <?php } ?>
                              <a class="left carousel-control" href="#carousel-example-generic<?php echo $icarrol; ?>" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic<?php echo $icarrol; ?>" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
                            <!-- /carousel -->
                            <?php } ?>
                            <br />
                            
                            <!-- Default box -->
                            <div class="box collapsed-box">
                                  <div class="box-header">
                                    <h4 class="box-title"><?php echo $row_rsNews['news_summary']; ?></h4>
                                    <div class="box-tools pull-right">
                                      <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
                                    </div>
                                  </div>
                                  <div class="box-body" style="display: none;">
                                    <h4><pre><?php echo $row_rsNews['news_content']; ?></pre></h4>
                                    <blockquote class="pull-left"> <small>Posted on <?php echo $row_rsNews['news_date']; ?></small> </blockquote>
                                    </h4>
                                    <blockquote class="pull-right"> <small>by <a href="Profile/ViewTeacherProfile.php?email=<?php echo $row_rsNews['news_email']; ?>"><?php echo $row_rsNews['news_by']; ?></a></small> </blockquote>
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
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes <script src="js/AdminLTE/demo.js" type="text/javascript"></script>-->
        
    </body>
</html>
<?php 
mysql_free_result($rsNews);
?>