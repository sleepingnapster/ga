<?php require_once('../Connections/greenassign.php'); ?>
<?php if(!((isset($_GET['subid']))&&(isset($_GET['assignid'])))){header('Location: ../');
exit;}
/*Secure teachers from accessing other teachers assign submissions
if(!((isset($_SESSION['MM_Subids'][$_GET['subid']]['subid']))&&($_SESSION['MM_Subids'][$_GET['subid']]['subid']===$_GET['subid']))){header('Location: ../');
exit;}
*/
?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "acceptform")) {
  $updateSQL = sprintf("UPDATE submissions SET subm_marks=%s, subm_feedback=%s, subm_status=%s WHERE subm_id=%s",
                       GetSQLValueString($_POST['marks'], "int"),
                       GetSQLValueString($_POST['feedback'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['submid'], "int"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($updateSQL, $greenassign) or die(mysql_error());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "rejectform")) {
  $updateSQL = sprintf("UPDATE submissions SET subm_feedback=%s, subm_status=%s WHERE subm_id=%s",
                       GetSQLValueString($_POST['feedback'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['submid'], "int"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($updateSQL, $greenassign) or die(mysql_error());
}

$colname_RsAssignDetails = "-1";
if (isset($_GET['assignid'])) {
  $colname_RsAssignDetails = $_GET['assignid'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsAssignDetails = sprintf("SELECT assign.* , sub.sub_class_id FROM assign JOIN sub ON (assign.a_sub_id=sub.sub_id) WHERE assign_id = %s", GetSQLValueString($colname_RsAssignDetails, "int"));
$RsAssignDetails = mysql_query($query_RsAssignDetails, $greenassign) or die(mysql_error());
$row_RsAssignDetails = mysql_fetch_assoc($RsAssignDetails);
$totalRows_RsAssignDetails = mysql_num_rows($RsAssignDetails);

$strWhereBatch = "";
if (isset($_GET['batch'])) {
	if(($_GET['batch']>=1)&&($_GET['batch']<=4)){
		$strWhereBatch = "AND user_student.us_batch=".$_GET['batch'];
		}
	}


mysql_select_db($database_greenassign, $greenassign);
$query_RsStudentSubmissions = "SELECT * FROM ( SELECT * FROM submissions WHERE subm_ass_id = ".$_GET['assignid']." ) AS subms RIGHT OUTER JOIN user_student ON ( subms.subm_email = user_student.email ) WHERE user_student.us_class_id=".$row_RsAssignDetails['sub_class_id']." ".$strWhereBatch;
$RsStudentSubmissions = mysql_query($query_RsStudentSubmissions, $greenassign) or die(mysql_error());
$row_RsStudentSubmissions = mysql_fetch_assoc($RsStudentSubmissions);
$totalRows_RsStudentSubmissions = mysql_num_rows($RsStudentSubmissions);


//for the iframe doc and comment etc
$colname_RsSelectedSubmission = "-1";
if (isset($_GET['fl'])) {
  $colname_RsSelectedSubmission = $_GET['fl'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsSelectedSubmission = sprintf("SELECT * FROM submissions JOIN user_student ON (submissions.subm_email = user_student.email) WHERE subm_id = %s", GetSQLValueString($colname_RsSelectedSubmission, "int"));
$RsSelectedSubmission = mysql_query($query_RsSelectedSubmission, $greenassign) or die(mysql_error());
$row_RsSelectedSubmission = mysql_fetch_assoc($RsSelectedSubmission);
$totalRows_RsSelectedSubmission = mysql_num_rows($RsSelectedSubmission);

//for statistics
$colname_RsAssignStats = "-1";
if (isset($_GET['assignid'])) {
  $colname_RsAssignStats = $_GET['assignid'];
}

mysql_select_db($database_greenassign, $greenassign);
$query_RsAssignStats = sprintf("SELECT subm_status, COUNT( subm_id ) FROM  `submissions` JOIN user_student ON (submissions.subm_email = user_student.email) WHERE subm_ass_id =%s ".$strWhereBatch."  GROUP BY subm_status ", GetSQLValueString($colname_RsAssignStats, "int"));
$RsAssignStats = mysql_query($query_RsAssignStats, $greenassign) or die(mysql_error());
 ?>
 
<?php
//color associative array
$color['Rejected'] = "orange";
$color[''] = "red";
$color['Accepted'] = "aqua-gradient";
$color['Submitted'] = "green";
$color['Late'] = "yellow";
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
        <!-- DATA TABLES -->
        <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Morris charts -->
        <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
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
                    <!-- Sidebar user panel -->
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   
                    <?php include '../includes/menu.php';?>
                    
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Submissions
                        <small><?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." : ".$_SESSION['MM_Subids'][$_GET['subid']]['subname'];?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-clipboard"></i> Assignments </a></li>
                        <li><a href="../Assignments/assignsedit.php?subid=<?php echo $_GET['subid']; ?>"><?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." (".$_SESSION['MM_Subids'][$_GET['subid']]['subclass'].")"; ?></a></li>
                        <li><a href="../Assignments/assignteacherview.php?assignid=<?php echo $_GET['assignid']; ?>&subid=<?php echo $_GET['subid']; ?>"><?php echo $row_RsAssignDetails['a_type']; ?> <?php echo $row_RsAssignDetails['a_no']; ?></a></li>
                        <li class="active">Submissions</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                        	<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"><small>Student List of</small> <?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." (".$_SESSION['MM_Subids'][$_GET['subid']]['subclass'].")"; ?></h3><div class="box-title">Batch :</div><div class="box-title">
<a href="?assignid=<?php echo $_GET['assignid']; ?>&subid=<?php echo $_GET['subid']; ?>" class="btn 
<?php if(!(isset($_GET['batch'])))echo "btn-success"; else echo "btn-default"; ?>">All</a> 
<a href="?assignid=<?php echo $_GET['assignid']; ?>&subid=<?php echo $_GET['subid']; ?>&batch=1" class="btn 
<?php if((isset($_GET['batch']))&&($_GET['batch']==1))echo "btn-success"; else echo "btn-default"; ?>">1</a> 
<a href="?assignid=<?php echo $_GET['assignid']; ?>&subid=<?php echo $_GET['subid']; ?>&batch=2" class="btn 
<?php if((isset($_GET['batch']))&&($_GET['batch']==2))echo "btn-success"; else echo "btn-default"; ?>">2</a>
<a href="?assignid=<?php echo $_GET['assignid']; ?>&subid=<?php echo $_GET['subid']; ?>&batch=3" class="btn 
<?php if((isset($_GET['batch']))&&($_GET['batch']==3))echo "btn-success"; else echo "btn-default"; ?>">3</a> 
<a href="?assignid=<?php echo $_GET['assignid']; ?>&subid=<?php echo $_GET['subid']; ?>&batch=4" class="btn 
<?php if((isset($_GET['batch']))&&($_GET['batch']==4))echo "btn-success"; else echo "btn-default"; ?>">4</a></div>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Roll</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                          <?php do { ?>
  <tr>
    <td><?php echo $row_RsStudentSubmissions['us_rollno']; ?></td>
    <td><?php echo $row_RsStudentSubmissions['us_displayname']; ?></td>
    <td>
    <?php if(isset($row_RsStudentSubmissions['subm_id'])) {?>
    <a href="index.php?assignid=<?php echo $_GET['assignid'];?>&subid=<?php echo $_GET['subid'];?><?php echo "&fl=".$row_RsStudentSubmissions['subm_id']; ?><?php if(isset($_GET['batch'])){echo "&batch=".$_GET['batch'];} ?>" class="badge bg-<?php echo $color[$row_RsStudentSubmissions['subm_status']];?>"><?php echo $row_RsStudentSubmissions['subm_status'];?><span class="glyphicon glyphicon-paperclip"></span> </a>
    <?php }else { ?>
    	<p class="badge bg-<?php echo $color[''];?>"><?php echo "Pending"; ?></p>
    <?php } ?>
    
    </td>
  </tr>
  <?php } while ($row_RsStudentSubmissions = mysql_fetch_assoc($RsStudentSubmissions)); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        	<div class="col-lg-9 col-sm-9" style="margin:0px;padding:0px;" >
                       <?php //when no selected submission dont show bellow stuff 
					   if (isset($_GET['fl'])){ ?>   
                            <div class="box" style="height:1000px;">
                            <div class="box-header">
                                    <h3 class="box-title"><?php echo $row_RsAssignDetails['a_type']; ?> <?php echo $row_RsAssignDetails['a_no']; ?> : <?php echo $row_RsAssignDetails['a_title']; ?></h3>
                                </div>
                                    
                        
                        <?php if (!(($row_RsSelectedSubmission['subm_status']=='Accepted')||($row_RsSelectedSubmission['subm_status']=='Rejected'))) { ?>
                        <div id="notchecked" class="box">
                        <div class="box-body">
                        
<form method="POST" action="<?php echo $editFormAction; ?>" name="acceptform" style="display:inline">
<div class="">
        <label>Feedback</label>
        <textarea class="form-control input-lg"  name="feedback" id="f1" rows="3" placeholder="Feedback ..."></textarea>		
</div><!-- /.box-body -->
<div class="box-footer">
</div>
<div class="col-xs-2">
<input type="text" name="marks" class="form-control input-lg" placeholder="Marks">
<input type="hidden" name="status" value="Accepted" >
<input type="hidden" name="submid" value="<?php echo $row_RsSelectedSubmission['subm_id']; ?>" >
</div>
<button type="submit" name="accept" class="btn btn-success btn-lg">Accept Submission</button> &nbsp;&nbsp;OR&nbsp;&nbsp; 
<input type="hidden" name="MM_update" value="acceptform">
</form>


<form method="POST" action="<?php echo $editFormAction; ?>" name="rejectform" style="display:inline" >
<input type="text" name="feedback" id="f2" HIDDEN/>
<input type="hidden" name="status" value="Rejected" >
<input type="hidden" name="submid" value="<?php echo $row_RsSelectedSubmission['subm_id']; ?>" >
<button type="submit" name="reject" class="btn btn-danger btn-lg">Reject Submission</button>
<input type="hidden" name="MM_update" value="rejectform"> 
</form>
                            </div>
                    </div>
                    <?php } else { ?>
                    
                    
                    <div id="checked" class="box">
                        <div  class="box-body">
                        
                           	<div class="">
                            		<div class="row invoice-info">
                        <div class="col-sm-2 invoice-col">
                               <label>Status: </label> 
<p style="display:inline-block" class="badge bg-<?php echo $color[$row_RsSelectedSubmission['subm_status']];?>"> <?php echo $row_RsSelectedSubmission['subm_status'];?></p><br>
                        </div><!-- /.col -->
                        
                        <div class="col-sm-1 invoice-col">
                            <label style="display:inline">Marks: &nbsp;&nbsp; &nbsp;&nbsp; </label><p  style="display:inline; font-weight:600"><big><?php if(isset($row_RsSelectedSubmission['subm_marks']))echo $row_RsSelectedSubmission['subm_marks']; else echo '-'; ?>/<?php echo $row_RsAssignDetails['a_marks']; ?></big></p><p></p>
                        </div><!-- /.col -->
                        
                        <div class="col-sm-3 invoice-col">
                                <strong>Feedback: </strong><br><big><p style="display:inline-block"><?php echo $row_RsSelectedSubmission['subm_feedback']; ?></p></big>
                        </div><!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                                <strong>Student Comment: </strong><br><big><p style="display:inline-block"><?php echo $row_RsSelectedSubmission['subm_comment']; ?></p></big>
                        </div>
                        <div class="col-sm-3 invoice-col">
                        	-by <br>
                            <strong><?php echo $row_RsSelectedSubmission['us_displayname']; ?></strong><br>
                            <b>Roll no:</b> <?php echo $row_RsSelectedSubmission['us_rollno']; ?> &nbsp;&nbsp;  <b>Batch:</b> <?php echo $row_RsSelectedSubmission['us_batch']; ?><br>
                        </div><!-- /.col -->
                    </div>
                                    <button type="submit" id="makechanges" class="btn btn-primary">Make Changes</button> 
                          	</div>
                            
                        </div>
                    </div>
                    
                    <div id="notchecked" class="box" style="display:none">
                        <div class="box-body">
                        	<form method="POST" action="<?php echo $editFormAction; ?>" name="acceptform" style="display:inline">
                           	<div class="">
                                    <label>Feedback</label>
                                    <textarea class="form-control input-lg"  name="feedback" id="f1" rows="3" placeholder="Feedback ..."><?php echo $row_RsSelectedSubmission['subm_feedback']; ?></textarea>	
<input type="hidden" name="submid" value="<?php echo $row_RsSelectedSubmission['subm_id']; ?>" >
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                            </div>
                            <div class="col-xs-2">
<input type="hidden" name="status" value="Accepted" >
                            <input type="text" name="marks" class="form-control input-lg" value="<?php echo $row_RsSelectedSubmission['subm_marks']; ?>" placeholder="Marks">
                            </div>
                            <button type="submit" name="accept" class="btn btn-success btn-lg">Accept Submission</button>
                            <input type="hidden" name="MM_update" value="acceptform">
                             &nbsp;&nbsp;OR&nbsp;&nbsp; 
                             </form>
                            <form method="POST" action="<?php echo $editFormAction; ?>" name="rejectform" style="display:inline" >
<input type="hidden" name="status" value="Rejected" >
<input type="hidden" name="submid" value="<?php echo $row_RsSelectedSubmission['subm_id']; ?>" >
                            <input type="text" name="feedback" id="f2" HIDDEN/>
                            <button type="submit" name="reject" class="btn btn-danger btn-lg">Reject Submission</button> 
                            <input type="hidden" name="MM_update" value="rejectform">   
                            </form> &nbsp;&nbsp;<button id="cancel" class="btn btn-plain btn-lg">Cancel</button> 
                            </div>
                    </div>
                    
                    <?php } ?>
 
                                
                        <iframe frameborder="5" style="overflow:hidden;height:100%;width:100%" height="100%" src="http://docs.google.com/gview?url=http://greenassign.com/submfiles/SFIT/<?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subid']; ?>/<?php echo $row_RsSelectedSubmission['subm_file']; ?>&embedded=true"></iframe>
                        
                         
                        </div>
                       <?php } //when no selected submission dont show above stuff  ?>
                        <!-- DONUT CHART -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Statistics of <?php echo $row_RsAssignDetails['a_type']; ?> <?php echo $row_RsAssignDetails['a_no']; ?> : <?php echo $row_RsAssignDetails['a_title']; ?></h3>
                                </div>
                                <div class="box-body chart-responsive">
                                <div class="col-lg-2 col-xs-4">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3 id="totalturnedin">
                                        0
                                    </h3>
                                    <p>
                                        Turned In
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-4">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3 id="totalnotturnedin">
                                        0
                                    </h3>
                                    <p>
                                        Not Turned In
                                    </p>
                                </div>
                                <div class="icon">
                                   <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                                    <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

					</div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>-->
        
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": false
                });
				
				 //DONUT CHART
				 <?php 	
				 	$str1="";
					$totalsubmissions=0;
					$color2['Rejected'] = "#FF9900";
					$color2['Pending'] = "#FF3300";
					$color2['Accepted'] = "#14D1FF";
					$color2['Submitted'] = "#00FF00";
					$color2['Late'] = "#00b600";
					
 					?>
                var donut = new Morris.Donut({
                    element: 'sales-chart',
                    resize: true,
                    data: [  
					 <?php while ($row_RsAssignStats = mysql_fetch_assoc($RsAssignStats)) { ?>
					<?php $str1.= "'".$color2[$row_RsAssignStats['subm_status']]."',";?>
{label: "<?php echo $row_RsAssignStats['subm_status']; ?>", value: <?php $totalsubmissions +=$row_RsAssignStats['COUNT( subm_id )']; echo $row_RsAssignStats['COUNT( subm_id )']; ?>},

 <?php } ?>
 <?php $pendingsubmissions=$totalRows_RsStudentSubmissions-$totalsubmissions;?>
						{label: "Pending", value: <?php echo $pendingsubmissions; ?>}
                    ],
					colors: [<?php echo $str1; ?>'#FF3300'],
                    hideHover: 'auto'
                });
				//Total turned in and not turned in
				$("#totalturnedin").text("<?php echo $totalsubmissions; ?>");
				$("#totalnotturnedin").text("<?php echo $pendingsubmissions; ?>");
				//Feedback copy
				$("#f1").keyup(function() {                  // When the email is changed
					$('#f2').val(this.value);                  // copy it over to the mail
				});
				//show form
				$("#makechanges").click(function(){
					$("#checked").hide('slow');
					$("#notchecked").show('slow');
				});
				//hide form
				$("#cancel").click(function(){
					$("#notchecked").hide('slow');
					$("#checked").show('slow');
				});
            });
        </script>
        <script language="JavaScript">
<!--
function autoResize(id){
    var newheight;
   

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
    }

    document.getElementById(id).height= (newheight) + "px";
}
//-->
</script>
    </body>
</html>
<?php
mysql_free_result($RsAssignDetails);

mysql_free_result($RsStudentSubmissions);

mysql_free_result($RsSelectedSubmission);

mysql_free_result($RsAssignStats);
?>
