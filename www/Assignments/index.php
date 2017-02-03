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


//color associative array
$color['Rejected'] = "orange";
$color[''] = "red";
$color['Accepted'] = "aqua-gradient";
$color['Submitted'] = "green";
$color['Late Submission'] = "yellow";
$color['Late'] = "yellow";

 if(!isset($_SESSION))
{
	session_start();
	}
$colname_rsAssigns = "-1";
if (isset($_GET['subid'])) {
  $colname_rsAssigns = $_GET['subid'];
}
mysql_select_db($database_greenassign, $greenassign);
/*
$query_rsAssigns = sprintf("SELECT assign_id, a_sub_id, a_type, a_no, a_batch, a_title, a_startdate, a_subdate FROM assign  JOIN submissions ON (subm_ass_id = assign_id) WHERE a_sub_id = %s AND subm_email = ORDER BY a_type ASC",

"SELECT assign_id, a_sub_id, a_type, a_no, a_batch, a_title, a_startdate, a_subdate, subms.subm_marks, subms.subm_status 
FROM assign
LEFT OUTER JOIN (

SELECT * 
FROM greenassign.submissions
WHERE subm_email = %s
) AS subms ON ( assign_id = subms.subm_ass_id ) 
WHERE a_sub_id = %s
ORDER BY a_type ASC",
 GetSQLValueString($_SESSION['email'], "text"),
 GetSQLValueString($colname_rsAssigns, "int"));
 
 
$query_rsAssigns = sprintf("SELECT assign_id, a_sub_id, a_type, a_no, a_batch, a_title, a_startdate, a_subdate FROM assign WHERE a_sub_id = %s ORDER BY a_type ASC", GetSQLValueString($colname_rsAssigns, "int"));*/
 
if(isset($_SESSION['email'])){
$query_rsAssigns = sprintf("SELECT assign_id, a_sub_id, a_type, a_no, a_batch, a_title, a_startdate, a_subdate, subm_marks, subm_status 
FROM assign
LEFT OUTER JOIN (
SELECT * 
FROM submissions
WHERE subm_email = %s
) AS subms ON ( assign_id = subms.subm_ass_id ) 
WHERE a_sub_id = %s
ORDER BY a_type DESC, a_no ASC", GetSQLValueString($_SESSION['email'], "text"), GetSQLValueString($colname_rsAssigns, "int"));
}
else {
$query_rsAssigns = sprintf("SELECT assign_id, a_sub_id, a_type, a_no, a_batch, a_title, a_startdate, a_subdate FROM assign WHERE a_sub_id = %s ORDER BY a_type ASC", GetSQLValueString($colname_rsAssigns, "int"));
	}
$rsAssigns = mysql_query($query_rsAssigns, $greenassign) or die(mysql_error());
//$row_rsAssigns = mysql_fetch_assoc($rsAssigns);
$totalRows_rsAssigns = mysql_num_rows($rsAssigns);

$colname_rs_subdetails = "-1";
if (isset($_GET['subid'])) {
  $colname_rs_subdetails = $_GET['subid'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_rs_subdetails = sprintf("SELECT * FROM sub WHERE sub_id = %s", GetSQLValueString($colname_rs_subdetails, "int"));
$rs_subdetails = mysql_query($query_rs_subdetails, $greenassign) or die(mysql_error());
$row_rs_subdetails = mysql_fetch_assoc($rs_subdetails);
$totalRows_rs_subdetails = mysql_num_rows($rs_subdetails);



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
                <!-- sidebar: style can be found in sidebar.less --><!-- sidebar: style can be found in sidebar.less --><section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less --><!-- sidebar menu: : style can be found in sidebar.less -->
                   
                    <?php include '../includes/menu.php';?>
                    
                </section>
                <!-- /.sidebar --><!-- /.sidebar --></aside>

            <!-- Right side column. Contains the navbar and content of the page --><!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Assigns
                      <small>Assignments | Experiments | HomeWork</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-clipboard"></i> Home</a></li>
                        <li><a href="#">Assignments</a></li>
                        <li class="active"><?php echo $row_rs_subdetails['sub_abbv']; ?> </li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                        	<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $row_rs_subdetails['sub_abbv']; ?> : <?php echo $row_rs_subdetails['sub_name']; ?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th>Assign Type</th>
                                                <th>No.</th>
                                                <th>Batch</th>
                                                <th>Title</th>
        <?php if(isset($_SESSION['email'])){ ?>	<th>Status</th> <?php } ?>
                                                <th>Due on</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php while ($row_rsAssigns = mysql_fetch_assoc($rsAssigns)) { ?>
                                            <tr>
                                              <td><?php echo $row_rsAssigns['a_type']; ?></td>
                                              <td><?php echo $row_rsAssigns['a_no']; ?></td>
                                              <td><?php if($row_rsAssigns['a_batch']=='All')echo $row_rsAssigns['a_batch'];else echo "Batch".$row_rsAssigns['a_batch']; ?></td>
 <td><a href="assignview.php?subid=<?php echo $_GET['subid']; ?>&assignid=<?php echo $row_rsAssigns['assign_id']; ?>"><?php echo $row_rsAssigns['a_title']; ?></a></td>
    <?php if(isset($_SESSION['email'])){ ?>	 
  <td align="center">
  <?php if($row_rsAssigns['subm_status']=='Accepted')echo "<big><b>".$row_rsAssigns['subm_marks']."</b></big>"; elseif ($row_rsAssigns['subm_status']=='') echo "<p class='badge bg-red'>Pending</p>"; else echo "<p class='badge bg-".$color[$row_rsAssigns['subm_status']]."'>".$row_rsAssigns['subm_status']."</p>"; ?>
  </td>
  <?php } ?>
           <td><?php $datei=date_create($row_rsAssigns['a_subdate']);
echo "<div style='display:none'>".$row_rsAssigns['a_subdate']."</div>".date_format($datei,"d M,Y D"); ?>
                                              <?php
$nowww=date_create();
$date2=date_create($row_rsAssigns['a_subdate']);
$diff=date_diff($nowww,$date2);
if($nowww <= $date2)echo $diff->format(" (%a days left)");
?>
                           			  </td>
                                            </tr>
                                            <?php }  ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side --></div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
       
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

mysql_free_result($rs_subdetails);
?>