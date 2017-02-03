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

//What to do?
//--> take the post variables 
// by
// sub_id
// 
// 1)ask title
// 2)Query other sub_ids with same abbv
// 3)ask alternate subids via looping the results
// 4)attach by as hidden
// 5)submit these results to a page that will :Insert the Quiz_id etc along with the sub_id entry/ies

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
                Create Quiz
                <small></small>
                </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Quizzes</li>
                </ol>
              </section>
            
            <!-- Main content -->
            <section class="content">
              <!-- START CUSTOM TABS -->
              <div class="row">
                <div class="col-md-8">
                            <!-- general form elements disabled -->
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Quiz Details</h3>
                                </div><!-- /.box-header -->
                           		<form role="form">
                                <div class="box-body">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Quiz Title</label>
                                            <input type="text" class="form-control" placeholder="Enter ..."/>
                                        </div>
                                        <br/>
                                        <!-- checkbox -->
                                        <div class="form-group">
                                         <label>Quiz For</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"/>
                                                    SE CMPN B : DDB
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"/>
                                                    Checkbox 2
                                                </label>
                                            </div>
                                        </div>
                                   
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary btn-lg">Next</button>
                                </div> 
                                </form>
                            </div><!-- /.box -->
                        </div> <!-- /.row -->
              <!-- END CUSTOM TABS -->
            </section><!-- /.content -->
          </aside><!-- /.right-side --> 
          </div>
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
       
    </body>
</html>