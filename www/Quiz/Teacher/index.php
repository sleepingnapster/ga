<?php require_once('../../Connections/greenassign.php'); ?>
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


//check if teacher
//check for verified teacher..if not teacher go to greenassign.com
if(!(isset($_SESSION['GA_usertype'])&&($_SESSION['GA_usertype']=="teacher")&&(isset($_SESSION['GA_ut_id'])))){//teacher links
header("Location: http://greenassign.com"); }


//all Quizzes of "_by" AND all sub quizzes in one go

$SubidString="-6,";
for($i=0;$i<$_SESSION['MM_Subcount'];$i++){$SubidString.=$_SESSION['MM_Subids'][$i]['subid'].",";} 
$SubidString.="-8";

mysql_select_db($database_greenassign, $greenassign);
$query_rsAllQuizzes = "SELECT * FROM `quiz_tests` WHERE `test_by`='".$_SESSION['email']."' OR test_subid IN (".$SubidString.") ";
$rsAllQuizzes = mysql_query($query_rsAllQuizzes, $greenassign) or die(mysql_error());
$row_rsAllQuizzes = mysql_fetch_assoc($rsAllQuizzes);
$totalRows_rsAllQuizzes = mysql_num_rows($rsAllQuizzes);



//pull custom quizzes by email(_by) and no sub_id
mysql_select_db($database_greenassign, $greenassign);
$query_rsTeacherCustomQuizzes = "SELECT * FROM `quiz_tests` WHERE `test_by`='".$_SESSION['email']."' AND `test_subid` IS NULL";
$rsTeacherCustomQuizzes = mysql_query($query_rsTeacherCustomQuizzes, $greenassign) or die(mysql_error());
$row_rsTeacherCustomQuizzes = mysql_fetch_assoc($rsTeacherCustomQuizzes);
$totalRows_rsTeacherCustomQuizzes = mysql_num_rows($rsTeacherCustomQuizzes);



//pull all sub quizzes


mysql_select_db($database_greenassign, $greenassign);
$query_rsSubQuizzes = "SELECT * FROM quiz_tests WHERE test_subid IN (".$SubidString.") ORDER BY test_id";
$rsSubQuizzes = mysql_query($query_rsSubQuizzes, $greenassign) or die(mysql_error());
$row_rsSubQuizzes = mysql_fetch_assoc($rsSubQuizzes);
$totalRows_rsSubQuizzes = mysql_num_rows($rsSubQuizzes);


//Links to create a Quiz




// Obtain a list of columns

//Sort for matching latter
foreach ($_SESSION['MM_Subids'] as $key => $row) {
    $Letteri[$key]  = $row[$key];
    $subidOfi[$key] = $row['subid'];
}
// Sort the data with volume descending, edition ascending
// Add $data as the last parameter, to sort by the common key
array_multisort($subidOfi, SORT_ASC, $Letteri, SORT_ASC, $_SESSION['MM_Subids']);



/*
for($i=0;$i<$_SESSION['MM_Subcount'];$i++){ 
 $i;
$_SESSION['MM_Subids'][$i]['subabbv']." ".
$_SESSION['MM_Subids'][$i]['subclass']." ".
$_SESSION['MM_Subids'][$i]['subid']."<br>";
} 
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GreenAssign</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include '../../includes/header.php';?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
          <!-- Left side column. contains the logo and sidebar --> 
          <aside class="left-side sidebar-offcanvas"> <!-- sidebar: style can be found in sidebar.less --> 
            <section class="sidebar">
         		 <?php include '../../includes/menu.php';?>
            </section>
            <!-- /.sidebar --> </aside>
  <!-- Right side column. Contains the navbar and content of the page -->
          <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Quizzes
                <small>Tests for all subjects</small>
                </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Quizzes</li>
                </ol>
              </section>
            
            <!-- Main content -->
            <section class="content">
              <!-- START CUSTOM TABS -->
              <h2 class="page-header"></h2>
              <div class="row">
                <div class="col-md-12">
                
                
                
                
                
                
                
                
                  <!-- Custom Tabs -->
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1" data-toggle="tab"> All Quizzes</a></li>
                      <li><a href="#tab_2" data-toggle="tab">My Personal Quizzes</a></li>
                      
                      
                      <?php for($i=0;$i<$_SESSION['MM_Subcount'];$i++){ // loop 1 start?>
                      
                      
                      <li><a href="#<?php echo $_SESSION['MM_Subids'][$i]['subid']; ?>" data-toggle="tab"> <?php echo 
$_SESSION['MM_Subids'][$i]['subclass'].": ".$_SESSION['MM_Subids'][$i]['subabbv']; ?> </a></li>
                      <?php } //loop 1 end ?>
                      
                      
                      
                      
                      <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                      </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <td>Sr no</td>
                                <td>Quiz Title</td>
                                <!-- // <abbr title="Computer Networks">CN</abbr>-->
                                <td>Statistics</td>
                                <td>Reports</td><!-- // seperate page with reason -->
                              </tr>
                              </thead>
                            <tbody>
                              <?php $i=1;
										do { ?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $row_rsAllQuizzes['test_title']; ?></td>
                                  <td>Stats</td>
                                  <td>idk</td>
                                </tr>
                                <?php } while ($row_rsAllQuizzes = mysql_fetch_assoc($rsAllQuizzes)); ?>
                            </tbody>
                          </table>
                          
                        </div><!-- /.box-body -->
                      </div><!-- /.tab-pane -->
                      
                      
                      
                      
                      
                      <div class="tab-pane" id="tab_2">
                        <div class="box-body table-responsive">
                          <table id="example2" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <td>Sr no</td>
                                <td>Quiz Title</td>
                                <!-- // <abbr title="Computer Networks">CN</abbr>-->
                                <td>Download</td>
                                <td>Report</td><!-- // seperate page with reason -->
                              </tr>
                              </thead>
                            <tbody>
                              <?php $i=1;
															do { ?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $row_rsTeacherCustomQuizzes['test_title']; ?></td>
                                  <td>fghfgh</td>
                                  <td>fghghfghfgh</td>
                                </tr>
                                <?php } while ($row_rsTeacherCustomQuizzes = mysql_fetch_assoc($rsTeacherCustomQuizzes)); ?>
                            </tbody>
                          </table>
                          
                        </div><!-- /.box-body -->
                        <form action="cq1.php" method="post">
                        <input type="text" name="by" value="<?php echo $_SESSION['email']; ?>" HIDDEN>
                        <input type="text" name="type" value="personal" HIDDEN>
                        <p><input type="submit" name="Submit" class="btn btn-primary btn-group-lg" value="Create Quiz"></p>
                        </form>
                      
                      </div>
                      
                      
                      <?php 
									 	
										
							
			

for($i=0;$i<$_SESSION['MM_Subcount'];$i++)
{ ?>
<div class="tab-pane" id="<?php echo $_SESSION['MM_Subids'][$i]['subid']; ?>">
                        <div class="box-header">
                        <!--   <h3 class="box-title"></h3>-->
                          </div><!-- /.box-header -->
                          
                          
                        <div class="box-body table-responsive">
                          <table id="example<?php echo $i+3;?>" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <td>Sr no</td>
                                <td>Quiz Title</td>
                                <td>Download</td>
                                <td>Report</td><!-- // seperate page with reason -->
                               </tr>
                            </thead>
                          	<tbody>
    
    <?php
    while(($row_rsSubQuizzes)&&($row_rsSubQuizzes['test_subid']==$_SESSION['MM_Subids'][$i]['subid']))
    {$SrCount=1;
    ?>       
                                <tr>
                                  <td><?php echo $SrCount; ?></td>
                                  <td><?php echo $row_rsSubQuizzes['test_title']; ?></td>
                                  <td>hdgjj</td>
                                  <td>serrte</td>
                                </tr>
	<?php 
								$row_rsSubQuizzes = mysql_fetch_assoc($rsSubQuizzes);
	}//end of while
		
	
	?>

                            </tbody>
                          </table>
                        </div><!-- /.box-body -->
                        <form action="cq1.php" method="post">
                        <input type="text" name="subid" value="<?php echo $i; ?>" HIDDEN>
                        <input type="text" name="by" value="<?php echo $_SESSION['email']; ?>" HIDDEN>
                        <input type="text" name="type" value="sub" HIDDEN>
                       		<p><input type="submit" name="Submit" class="btn btn-primary btn-group-lg"  value="Create Quiz for <?php echo $_SESSION['MM_Subids'][$i]['subabbv']; ?>"></p>
                            </form>
                      </div><!-- /.tab-content -->
<?php 
} //loop 3 end 
?>
                      
                      
                      
                      
                      
                      
                      
                    
                  </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->
              </div> <!-- /.row -->
              <!-- END CUSTOM TABS -->
              
            </section><!-- /.content -->
          </aside><!-- /.right-side --> </div>
        <!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
				$("#example2").dataTable();
				$("#example3").dataTable({ "bPaginate": false, "bInfo": false });
				$("#example4").dataTable({ "bPaginate": false, "bInfo": false });
				$("#example5").dataTable({ "bPaginate": false, "bInfo": false });
				$("#example6").dataTable({ "bPaginate": false, "bInfo": false });
				$("#example7").dataTable({ "bPaginate": false, "bInfo": false });
				$("#example8").dataTable({ "bPaginate": false, "bInfo": false });
				$("#example9").dataTable({ "bPaginate": false, "bInfo": false });
				$("#example10").dataTable({ "bPaginate": false, "bInfo": false });
				$("#example11").dataTable({ "bPaginate": false, "bInfo": false });
                $('#example12').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
    </body>
</html>
<?php
mysql_free_result($rsTeacherCustomQuizzes);

mysql_free_result($rsSubQuizzes);

mysql_free_result($rsAllQuizzes);

mysql_free_result($rsSubs);

mysql_free_result($RsCustomTests);

mysql_free_result($rsClassSubids);
mysql_free_result($rsSubidEbooks);
mysql_free_result($rsAllEbooks);
?>
