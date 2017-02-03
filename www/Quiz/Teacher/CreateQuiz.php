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





//query quiz via id

$colname_RsQuizDetails = "-1";
if (isset($_GET['q'])) {
  $colname_RsQuizDetails = $_GET['q'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsQuizDetails = sprintf("SELECT * FROM quiz_tests WHERE test_id = %s", GetSQLValueString($colname_RsQuizDetails, "int"));
$RsQuizDetails = mysql_query($query_RsQuizDetails, $greenassign) or die(mysql_error());
$row_RsQuizDetails = mysql_fetch_assoc($RsQuizDetails);
$totalRows_RsQuizDetails = mysql_num_rows($RsQuizDetails);



//check if SESSION['email']=test_by
if(!($row_RsQuizDetails['test_by']==$_SESSION['email']))
{
header("Location: http://greenassign.com?error=NotMine2Edit");
}

//check if editable
if(!($row_RsQuizDetails['test_editable']>0))
{
header("Location: http://greenassign.com?error=NotEditable");
}
//redirect with error or continue







//query Questions via Quiz_id

$colname_RsQuestion = "-1";
if (isset($_GET['q'])) {
  $colname_RsQuestion = $_GET['q'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsQuestion = sprintf("SELECT * FROM quiz_test_questions WHERE test_id_fk = %s", GetSQLValueString($colname_RsQuestion, "int"));
$RsQuestion = mysql_query($query_RsQuestion, $greenassign) or die(mysql_error());
//$row_RsQuestion = mysql_fetch_assoc($RsQuestion);
//$totalRows_RsQuestion = mysql_num_rows($RsQuestion);





//Make a string of all Question_ids
$Question_idsStr="-1";
while ($row_RsQuestion = mysql_fetch_assoc($RsQuestion)) 
{$Question_idsStr.=" ,".$row_RsQuestion['question_id'];}
//testing...echo $Question_idsStr;

//query all options with Question_ids via that string ORDER BY Quiz_id
mysql_select_db($database_greenassign, $greenassign);
$query_RsOptions = sprintf("SELECT * FROM quiz_options WHERE test_id_fk IN ($Question_idsStr) ORDER BY test_id_fk ASC");
$RsOptions = mysql_query($query_RsOptions, $greenassign) or die(mysql_error());
$row_RsOptions = mysql_fetch_assoc($RsOptions);
$totalRows_RsOptions = mysql_num_rows($RsOptions);
//testing...echo $row_RsOptions['option_text'];



//yet to test <down>
$class=-1;
		if(isset($_SESSION['GA_usertype'])&&($_SESSION['GA_usertype']=="teacher")&&(isset($_SESSION['GA_ut_id']))){ //teacher links
		
		
		
//temp fix.. later will change to VIEW ONLY page and create an edit link-button there 
	
for($i=0;$i<$_SESSION['MM_Subcount'];$i++){ 
	//echo $i; 
 	$_SESSION['MM_Subids'][$i]['subabbv'];
 	$_SESSION['MM_Subids'][$i]['subclass']; 
 } 	
}

//yet to test ^^

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
         <!-- iCheck for checkboxes and radio inputs -->
        <link href="../../css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="../../css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
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
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
<!-- sidebar: style can be found in sidebar.less --><section class="sidebar">
                   
                    <?php include '../../includes/menu.php';?>
                    
                </section>
                <!-- /.sidebar --><!-- /.sidebar --></aside>

            <!-- Right side column. Contains the navbar and content of the page --><!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Create Quiz
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="../QuizList.php"> Quiz</a></li>
                        <li class="active">Create Quiz</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- START CUSTOM TABS -->
                    <h2 align="center" class="page-header">Test Title: <?php echo $row_RsQuizDetails['test_title']; ?></h2>
                    <div class="row">
                        <div class="col-xs-7 col-sm-5 col-md-4">
                        	<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"> Add a Question</h3>
                                </div>
                                <div class="box-body">
                                    <a class="btn bg-blue-gradient btn-block btn-social btn-bitbucket">
                                        <i class="fa fa-dot-circle-o"></i> Add Question with Single Right Answer
                                    </a>
                                    <a class="btn bg-blue-gradient btn-block btn-social btn-dropbox">
                                        <i class="fa fa-check-square-o"></i> Add Question with Multiple Right Answers
                                    </a>
                                    <a class="btn bg-blue-gradient btn-block btn-social btn-facebook">
                                        <i class="fa fa-quote-left"></i> Single Word Answer
                                    </a>
                                    <br />
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"> </h3>
                                </div>
                                <div class="box-body">
                                    <a class="btn bg-light-blue btn-block btn-social btn-bitbucket">
                                        <i class="fa fa-cog"></i> Quiz Settings
                                    </a>
                                    <br />
                                </div>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-5 col-sm-7 col-md-8">
                        <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">1. Which is my car?</h3>
                                </div>
                                <div class="box-body">
                                    <!-- radio -->
                                  <div class="form-group">
                                        <label>
                                            <input type="radio" name="r2" class="minimal-green" checked/>
                                            A6 2.0
                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="r2" class="minimal-green"/>
                                            A4 3.5
                                        </label>
                                    </div>
                                    
                                 


                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                </div>
                          </div>
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">3. What is the color of Duke 390?</h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>
                                            <input type="radio" name="r3" class="flat-green" checked/>
                                            Black
                                        </label>
                                          <br>
                                        <label>
                                            <input type="radio" name="r3" class="flat-green"/>
                                            White
                                        </label>
                                          <br>
                                        <label>
                                            <input type="radio" name="r3" class="flat-green" disabled/>
                                            Invisible
                                        </label>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    Hint: Don't be hesitant.
                                </div>
                            </div>
                		</div>            	
                    </div> <!-- /.row -->
                    <!-- END CUSTOM TABS -->
                    
                </section><!-- /.content -->
    </aside><!-- /.right-side --></div><!-- ./wrapper -->


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
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
				
				 //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-green, input[type="radio"].minimal-green').iCheck({
                    checkboxClass: 'icheckbox_minimal-green',
                    radioClass: 'iradio_minimal-green'
                });
                //Flat green color scheme for iCheck
                $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

            });
        </script>
    </body>
</html>
<?php
mysql_free_result($RsQuizDetails);

mysql_free_result($RsOptions);

mysql_free_result($RsQuestion);
?>
