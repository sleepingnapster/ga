<?php require_once('../Connections/greenassign.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
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

mysql_select_db($database_greenassign, $greenassign);
//$query_RsAllSubmStatus = "SELECT us_rollno, a_type, a_no, us_id, us_u_id, email, us_imageurl, us_displayname, us_class_id, us_batch, subm_id, subm_ass_id, subm_email, subm_marks, subm_status, assign_id, a_sub_id, a_marks FROM  `user_student`  JOIN  `submissions`  JOIN  `assign`  WHERE email = subm_email AND subm_ass_id = assign_id AND a_sub_id =".$_SESSION['MM_Subids'][$_GET['subid']]['subid']." AND us_class_id=".$_SESSION['MM_Subids'][$_GET['subid']]['classid']." ORDER BY us_rollno, a_type, a_no";
$query_RsAllSubmStatus = "
SELECT * 
FROM (

SELECT us_rollno, us_id, us_u_id, email, us_imageurl, us_displayname, us_class_id, us_batch
FROM  `user_student` 
WHERE us_class_id =".$_SESSION['MM_Subids'][$_GET['subid']]['classid']."
) AS Usr
LEFT OUTER JOIN (

SELECT subm_id, subm_ass_id, subm_email, subm_marks, subm_status, a_type, a_no, assign_id, a_sub_id, a_marks
FROM  `submissions` 
JOIN (

SELECT a_type, a_no, assign_id, a_sub_id, a_marks
FROM  `assign` 
WHERE a_sub_id =".$_SESSION['MM_Subids'][$_GET['subid']]['subid']."
) AS Ass ON subm_ass_id = assign_id
) AS SubmAss ON email = subm_email
ORDER BY us_rollno, a_type, a_no
";

$RsAllSubmStatus = mysql_query($query_RsAllSubmStatus, $greenassign) or die(mysql_error());
$row_RsAllSubmStatus = mysql_fetch_assoc($RsAllSubmStatus);
$totalRows_RsAllSubmStatus = mysql_num_rows($RsAllSubmStatus);

mysql_select_db($database_greenassign, $greenassign);
$query_RsMaxRollno = "SELECT MAX( us_rollno )  FROM user_student WHERE us_class_id =".$_SESSION['MM_Subids'][$_GET['subid']]['classid'];
$RsMaxRollno = mysql_query($query_RsMaxRollno, $greenassign) or die(mysql_error());
$row_RsMaxRollno = mysql_fetch_assoc($RsMaxRollno);
$totalRows_RsMaxRollno = mysql_num_rows($RsMaxRollno);
$Maxrollno=$row_RsMaxRollno['MAX( us_rollno )'];

$colname_rsAssigns = "-1";
if (isset($_GET['subid'])) {
  $colname_rsAssigns = $_SESSION['MM_Subids'][$_GET['subid']]['subid'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_rsAssigns = sprintf("SELECT assign_id, a_sub_id, a_batch, a_type, a_no, a_part, a_title, a_startdate, a_subdate FROM assign WHERE a_sub_id = %s ORDER BY a_type, a_no", GetSQLValueString($colname_rsAssigns, "int"));
$rsAssigns = mysql_query($query_rsAssigns, $greenassign) or die(mysql_error());
//$row_rsAssigns = mysql_fetch_assoc($rsAssigns);
$totalRows_rsAssigns = mysql_num_rows($rsAssigns);

//color associative array
$color['Rejected'] = "orange";
$color[''] = "red";
$color['Accepted'] = "aqua-gradient";
$color['Submitted'] = "green";
$color['Late Submission'] = "yellow";


$assignletter['Assignment'] = "A";
$assignletter['Experiment'] = "E";
$assignletter['Exp'] = "E";
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
                        All Submissions
                        <small><?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." : ".$_SESSION['MM_Subids'][$_GET['subid']]['subname'];?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-clipboard"></i> Assignments </a></li>
                        <li><a href="../Assignments/assignsedit.php?subid=<?php echo $_GET['subid']; ?>"><?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." (".$_SESSION['MM_Subids'][$_GET['subid']]['subclass'].")"; ?></a></li>
                        <li class="active">All Submissions</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." : ".$_SESSION['MM_Subids'][$_GET['subid']]['subname'];?></h3>
                                    
                                    
                                    
                                    <?php 
									$assigns = array();
									
									?>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                
                                
                                
                                    
                                          <?php $asscount=0; ?>
                                          <?php while ($row_rsAssigns = mysql_fetch_assoc($rsAssigns)) { 
                      $assigns[$asscount]=$assignletter[$row_rsAssigns['a_type']].$row_rsAssigns['a_no'];$asscount++;} ?>
                                          
                                            
                                    
                                    
                                    
                                   
                                    
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th>Roll nos.</th>
                                                <th>Name</th>
                                                <?php for($i=0;$i<count($assigns);$i++)
                                                		{echo "<th>".$assigns[$i]."</th>";}
												?>
                                                <th>Total</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                       <?php for($i=1;$i<=$Maxrollno;$i++) {?>
                                       
                                            <tr>
                                              <td><?php echo $i; ?></td>
                                              	
                                                  <?php //match rollnos in Column to recordset rollnos
												  if($i==$row_RsAllSubmStatus['us_rollno']){ 
												  		$Total=0; $assigntotal=0; ?>
                                                     <td><?php echo "<a href=''>".$row_RsAllSubmStatus['us_displayname']."</a>"; ?></td>
                                                    <?php   if(isset($row_RsAllSubmStatus['a_type'])){
												 for($j=0;$j<count($assigns);$j++){  ?>
                                                  <?php if(strcmp($assigns[$j],$assignletter[$row_RsAllSubmStatus['a_type']].$row_RsAllSubmStatus['a_no']))
												  			{echo "<td><p class='badge bg-red'>Pending</p></td>";}
															 else {
																echo "<td>";
																if(strcmp($row_RsAllSubmStatus['subm_status'],'Accepted'))
																{
																?>
<a href="../Submissions/?assignid=<?php echo $row_RsAllSubmStatus['assign_id']; ?>&amp;subid=<?php echo $_GET['subid']; ?>&amp;fl=<?php echo $row_RsAllSubmStatus['subm_id']; ?>" class="badge bg-<?php echo $color[$row_RsAllSubmStatus['subm_status']]; ?>"><?php echo $row_RsAllSubmStatus['subm_status']; ?><span class="glyphicon glyphicon-paperclip"></span> </a>
																<?php
																}
																else { $Total+=$row_RsAllSubmStatus['a_marks']; $assigntotal+=$row_RsAllSubmStatus['subm_marks'];?> 
																<a href="../Submissions/?assignid=<?php echo $row_RsAllSubmStatus['assign_id']; ?>&amp;subid=<?php echo $_GET['subid']; ?>&amp;fl=<?php echo $row_RsAllSubmStatus['subm_id']; ?>" class="badge bg-<?php echo $color[$row_RsAllSubmStatus['subm_status']]; ?>"><big><?php echo $row_RsAllSubmStatus['subm_marks']." ";if($row_RsAllSubmStatus['a_marks']!=10)echo "/".$row_RsAllSubmStatus['a_marks']; ?></big> <span class="glyphicon glyphicon-paperclip"></span> </a>
																<?php
                                                                }
																echo "</td>";
																$row_RsAllSubmStatus = mysql_fetch_assoc($RsAllSubmStatus);
																}
															?>
                                                  <?php  }?>
                                                  <td><?php echo "<big>".$assigntotal."/".$Total."</big>"; ?></td>
                                                  <?php }
												  else {for($h=0;$h<count($assigns);$h++) echo "<td><p class='badge bg-red'>2Pending</p></td>";
												  					echo "<td><big>".$assigntotal."/".$Total."</big></td>";
																  $row_RsAllSubmStatus = mysql_fetch_assoc($RsAllSubmStatus);
																  } 
												  
												  
												  }
												  
												  else  {for($k=0;$k<=count($assigns);$k++) echo "<td>-</td>";echo "<td><big>0/0</big></td>";}?>
                                                  
                                                  
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                    
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
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
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>-->
        
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": false,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": true
                });
            });
        </script>

    </body>
</html>
<?php
mysql_free_result($RsAllSubmStatus);

mysql_free_result($RsMaxRollno);

mysql_free_result($rsAssigns);
?>
