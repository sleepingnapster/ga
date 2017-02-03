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

$currentPage = $_SERVER["PHP_SELF"];
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

//teacher verified menu links..give 'classcode' in the url for each classnews link and i get the respective class //details from the teacher's session.
if(isset($_GET['classcode'])){
	$_SESSION['class_id']=$_SESSION['MM_Subids'][$_GET['classcode']]['classid'];
	$_SESSION['class_compactname']=$_SESSION['MM_Subids'][$_GET['classcode']]['subclasscompact'];
	$_SESSION['class_readablename']=$_SESSION['MM_Subids'][$_GET['classcode']]['subclass'];}

//i hav never yet used this code...
//if(isset($_GET['class'])){$_SESSION['class']=$_GET['class'];}

//u either hav class or get out
if(!(isset($_SESSION['class_id'])&&(isset($_SESSION['class_readablename'])))){header("Location: ../pages/SelectClass.php");exit;}

$maxRows_rsNews = 6;
$pageNum_rsNews = 0;
if (isset($_GET['pageNum_rsNews'])) {
  $pageNum_rsNews = $_GET['pageNum_rsNews'];}
$startRow_rsNews = $pageNum_rsNews * $maxRows_rsNews;

mysql_select_db($database_greenassign, $greenassign);
//also fetching reported news
$query_rsNews = "SELECT cn_id, cn_title, cn_img, cn_img0, cn_img1, cn_img2, cn_img3, cn_img4, cn_imgcount, cn_summary, cn_content, cn_by_email, cn_by, cn_by_usertype, cn_uploaddate FROM classnews WHERE cn_class_id='".$_SESSION['class_id']."' ORDER BY cn_uploadtimestamp DESC";
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

$queryString_rsNews = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsNews") == false && 
        stristr($param, "totalRows_rsNews") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsNews = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsNews = sprintf("&totalRows_rsNews=%d%s", $totalRows_rsNews, $queryString_rsNews);
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
                    
                    <?php include '../includes/menu.php';?>
                    
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><i class="fa fa-bullhorn"></i>
                        &nbsp;&nbsp;<?php echo $_SESSION['class_readablename']; ?> News
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo $_SESSION['class_readablename']; ?> News</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                
                
                <?php if((isset($_SESSION['GA_name']))&&(isset($_SESSION['email']))){ ?>
                <div class="col-xs-12 col-sm-12 col-md-11 col-lg-9">
                      <div class="box box-solid" align="center">
                        <div class="box-footer clearfix" align="center">
                                    <div class="center-block" align="center">
                                       <!-- Show if not last page-->
<a href="ClassNewsUpload.php"><button class="btn btn-primary">Post News to Class <?php echo $_SESSION['class_readablename']; ?></button>
                                      </a>
                                        
                                    </div>
                                </div><!-- box-footer -->
                        </div>
            	</div>
                <?php } ?>
                
                
                    <?php do { ?>
                      <div class="col-xs-12 col-sm-12 col-md-11 col-lg-9">
                        <div class="box box-solid">
                          <div class="box-header">
                            <h3 class="box-title"><?php echo $row_rsNews['cn_title']; ?></h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body" align="center">
                          
                          <?php if($row_rsNews['cn_imgcount']==1){?>
							  <img src="ClassNewsImages/<?php echo $row_rsNews['cn_img0']; ?>" alt="First slide">
                              <?php }else{ ?>
                          
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <?php for($ii=1;$ii<$row_rsNews['cn_imgcount'];$ii++){?>
                               	<li data-target="#carousel-example-generic" data-slide-to=<?php echo $ii; ?> class></li>
                              	<?php } ?>
                              </ol>
                              <?php if(isset($row_rsNews['cn_img'])){?>
                              
                              <div class="carousel-inner">
                              <?php for($ii=0;$ii<$row_rsNews['cn_imgcount'];$ii++){
								  $str="cn_img".$ii;
								  ?>
                                <div class="item<?php if($ii==0)echo " active"?>"> <img src="ClassNewsImages/<?php echo $row_rsNews[$str]; ?>" alt="Slide <?php echo $ii+1; ?>">
                                  <div class="carousel-caption">Slide <?php echo $ii+1; ?></div>
                                </div>
                                <?php } ?>
                              </div>
							  
							  <?php } ?>
                              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
                            <!-- /carousel -->
                            
                            <?php } ?>
                            
                            
                            <br />
                            <!-- Default box -->
                            <div class="box collapsed-box">
                              <div class="box-header">
                                <h4 class="box-title"><?php echo $row_rsNews['cn_summary']; ?></h4>
                                <div class="box-tools pull-right">
                                  <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
                                </div>
                              </div>
                              <div class="box-body" align="justify" style="display: none;">
                                <h4><pre><?php echo $row_rsNews['cn_content']; ?></pre></h4>
                                <blockquote class="pull-left"> <small>Posted on <?php echo $row_rsNews['cn_uploaddate']; ?></small> </blockquote>
                                </h4>
                                <blockquote class="pull-right">                                
                                <small>by <a href="../Profile/View<?php if($row_rsNews['cn_by_usertype']=='teacher'){echo "Teacher";}?>Profile.php?email=<?php echo $row_rsNews['cn_by_email']; ?>"><?php echo $row_rsNews['cn_by']; ?></a></small>
                                </blockquote>
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
                      
                      
                       <div class="col-xs-12 col-sm-12 col-md-11 col-lg-9">
                      <div class="box box-solid" align="center">
                        <div class="box-footer clearfix" align="center">
                                    <div class="center-block" align="center">
                                      <!-- Show if not first page-->
<a href="<?php printf("%s?pageNum_rsNews=%d%s", $currentPage, 0, $queryString_rsNews); ?>"><button class="btn btn-primary<?php if (!($pageNum_rsNews > 0))echo " disabled"; ?>"><i class="fa fa-fw fa-fast-backward"></i>First</button></a>
  
                                     <!-- Show if not first page-->
<a href="<?php printf("%s?pageNum_rsNews=%d%s", $currentPage, max(0, $pageNum_rsNews - 1), $queryString_rsNews); ?>">
                                          <button class="btn btn-primary<?php if (!($pageNum_rsNews > 0))echo " disabled"; ?>"><i class="fa fa-fw fa-backward"></i>Previous</button>
                                      </a>
                                        <!-- Show if not last page-->
<a href="<?php printf("%s?pageNum_rsNews=%d%s", $currentPage, min($totalPages_rsNews, $pageNum_rsNews + 1), $queryString_rsNews); ?>">
                                          <button class="btn btn-primary<?php if (!($pageNum_rsNews < $totalPages_rsNews))echo " disabled"; ?>">Next<i class="fa fa-fw fa-forward"></i></button>
                                      </a>
                                      
                                       <!-- Show if not last page-->
<a href="<?php printf("%s?pageNum_rsNews=%d%s", $currentPage, $totalPages_rsNews, $queryString_rsNews); ?>">
                                          <button class="btn btn-primary<?php if (!($pageNum_rsNews < $totalPages_rsNews))echo " disabled"; ?>">Last<i class="fa fa-fw fa-fast-forward"></i></button>
                                      </a>
                                        
                                    </div>
                                </div><!-- box-footer -->
                        </div>
                        </div>
                        
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>-->
        
    </body>
</html>
<?php
mysql_free_result($rsNews);
?>
