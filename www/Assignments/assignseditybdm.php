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

$colname_rsAssigns = "-1";
if (isset($_GET['subid'])) {
  $colname_rsAssigns = $_SESSION['MM_Subids'][$_GET['subid']]['subid'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_rsAssigns = sprintf("SELECT assign_id, a_sub_id, a_batch, a_type, a_no, a_part, a_title, a_startdate, a_subdate FROM assign WHERE a_sub_id = %s ORDER BY a_type ASC", GetSQLValueString($colname_rsAssigns, "int"));
$rsAssigns = mysql_query($query_rsAssigns, $greenassign) or die(mysql_error());
//$row_rsAssigns = mysql_fetch_assoc($rsAssigns);
$totalRows_rsAssigns = mysql_num_rows($rsAssigns);
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
                        Assignments
                        <small>Assignments | Experiments | HomeWork</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-clipboard"></i> Assignments</li>
                        <li class="active"><?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." (".$_SESSION['MM_Subids'][$_GET['subid']]['subclass'].")"; ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." : ".$_SESSION['MM_Subids'][$_GET['subid']]['subname'];?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th>Assign Type</th>
                                                <th>Assign no.</th>
                                                <th>Batch no.</th>
                                                <th>Title</th>
                                                <th>Upload Date</th>
                                                <th>Dew on</th>
                                                <th>Check</th>
                                                <th>Delete</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                          <?php while ($row_rsAssigns = mysql_fetch_assoc($rsAssigns)) { ?>
                                            <tr>
                                              <td><?php echo $row_rsAssigns['a_type']; ?></td>
                                              <td><?php echo $row_rsAssigns['a_no']; ?></td>
 <td><?php if($row_rsAssigns['a_batch']=='All')echo $row_rsAssigns['a_batch'];else echo "Batch".$row_rsAssigns['a_batch'];?></td>
 <td><a href="../Assignments/assignteacherview.php?assignid=<?php echo $row_rsAssigns['assign_id']."&subid=".$_GET['subid']; ?>"><?php echo $row_rsAssigns['a_title']; ?></a></td>
                        <td><?php if($xxs=strtotime($row_rsAssigns['a_startdate'])){ 
						echo date('D d M',$xxs); }?></td>
						<td><?php if($xxd=strtotime($row_rsAssigns['a_subdate'])){
							echo date('D d M',$xxd);}?></td>
                            <td><a class="badge bg-blue" href="../Submissions/?assignid=<?php echo $row_rsAssigns['assign_id']; ?>&subid=<?php echo $_GET['subid']; ?>">  Check </a></td>
                            <td><a class="badge bg-red" href="../Assignments/assigndelete.php?assignid=<?php echo $row_rsAssigns['assign_id']; ?>&subid=<?php echo $_GET['subid']; ?>">  Delete </a></td>
                                            </tr>
                           <?php }  ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                                <a href="../Assignments/assigninsert.php?subid=<?php echo $_GET['subid'];?>" class="btn btn-primary">Create New Assign</a>
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
mysql_free_result($rsAssigns);
?>
