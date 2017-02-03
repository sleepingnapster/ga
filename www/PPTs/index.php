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

$colname_rsClassSubids = "-1";
if (isset($_SESSION['class_id'])) {
  $colname_rsClassSubids = $_SESSION['class_id'];
}
else{header("Location: ../pages/SelectClass.php?page=PPTs");exit;}
mysql_select_db($database_greenassign, $greenassign);
$query_rsClassSubids = sprintf("SELECT sub_id, sub_name, sub_abbv FROM sub WHERE sub_class_id = %s ORDER BY sub_id ASC", GetSQLValueString($colname_rsClassSubids, "text"));
$rsClassSubids = mysql_query($query_rsClassSubids, $greenassign) or die(mysql_error());
//$row_rsClassSubids = mysql_fetch_assoc($rsClassSubids);
$totalRows_rsClassSubids = mysql_num_rows($rsClassSubids);

$colname_rsAllEbooks = "-1";
if (isset($_SESSION['class_id'])) {
  $colname_rsAllEbooks = $_SESSION['class_id'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_rsAllEbooks = sprintf("SELECT lec_id, lec_filename, lec_clean, lec_verified, lec_uploadedby, lec_subid FROM lectureppts INNER JOIN sub ON sub.sub_id = lectureppts.lec_subid
INNER JOIN class ON sub.sub_class_id = class.class_id
 WHERE class.class_id = %s AND (lectureppts.lec_clean OR lectureppts.lec_verified = 1)", GetSQLValueString($colname_rsAllEbooks, "text"));
$rsAllEbooks = mysql_query($query_rsAllEbooks, $greenassign) or die(mysql_error());
//$row_rsAllEbooks = mysql_fetch_assoc($rsAllEbooks);
$totalRows_rsAllEbooks = mysql_num_rows($rsAllEbooks);
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
        <!-- DATA TABLES -->
        <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

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
                    
                    <!-- search form -->
                    <!-- /.search form -->
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
                    <h1>
                        Lecture PPTs
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Blank page</li>
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
                                    <li class="active"><a href="#tab_1" data-toggle="tab"> All </a></li>
                                    <?php while ($row_rsClassSubids = mysql_fetch_assoc($rsClassSubids)) { // loop 1 start?>
                      <li><a href="#<?php echo $row_rsClassSubids['sub_id']; ?>" data-toggle="tab"> <?php echo $row_rsClassSubids['sub_abbv']; ?> </a></li>
                                    <?php }//loop 1 end ?>
                                  
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                               		  <div class="box-body table-responsive">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Sr no</th>
                                                        <th>File Name</th>
                                                        <th>Uploaded by</th>
                                                        <th>View</th>
                                                        <th>Download</th>
                                                        <th>Report</th><!-- // seperate page with reason -->
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while($row_rsAllEbooks = mysql_fetch_assoc($rsAllEbooks)) { ?>
                                                            <tr>
                                                              <td><?php echo $row_rsAllEbooks['lec_id']; ?></td>
                                                              <td><?php echo $row_rsAllEbooks['lec_filename']; ?></td>
                                                              <td><?php echo $row_rsAllEbooks['lec_uploadedby']; ?></td>
                                                              <td>View</td>
              <td><a href="LecturePPTs/<?php echo $row_rsAllEbooks['lec_filename']; ?>" download>Download</a></td>
                                                        	  <td>Report</td>
                                                            </tr>
                                                            <?php } ?>
                                                </tbody>
                                            </table>
                                            
                                        </div><!-- /.box-body -->
                                	</div><!-- /.tab-pane -->
                                    
                                    
                                    
                                     <?php 
									 	
										$rsClassSubids = mysql_query($query_rsClassSubids, $greenassign) or die(mysql_error());
										//$row_rsClassSubids = mysql_fetch_assoc($rsClassSubids);
									 	 while ($row_rsClassSubids = mysql_fetch_assoc($rsClassSubids)) { //loop 3 start
                                     
                                     
$colname_rsSubid = "-1";
if (isset($row_rsClassSubids['sub_id'])) {
  $colname_rsSubid = $row_rsClassSubids['sub_id'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_rsSubidEbooks = sprintf("SELECT lec_id, lec_filename, lec_clean, lec_verified, lec_uploadedby FROM lectureppts WHERE lec_subid = %s ORDER BY lec_id ASC", GetSQLValueString($colname_rsSubid, "text"));
$rsSubidEbooks = mysql_query($query_rsSubidEbooks, $greenassign) or die(mysql_error());
//$row_rsSubidEbooks = mysql_fetch_assoc($rsSubidEbooks);
$totalRows_rsSubidEbooks = mysql_num_rows($rsSubidEbooks);
                                     ?>
                                     
                                     
                                    <div class="tab-pane" id="<?php echo $row_rsClassSubids['sub_id']; ?>">
                                      		<div class="box-header">
                                   			<h3 class="box-title"></h3>
                                		</div><!-- /.box-header -->
                                		<div class="box-body table-responsive">
                                            <table id="example1" class="table table-bordered table-striped">
                                               <thead>
                                                    <tr>
                                                        <td>Sr no</td>
                                                        <td>File Name</td>
                                                        <td>Uploaded by</td>
                                                        <td>Download</td>
                                                        <td>Report</td><!-- // seperate page with reason -->
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1;while ($row_rsSubidEbooks = mysql_fetch_assoc($rsSubidEbooks)) { ?>
                                                            <tr>
                                                              <td><?php echo $i++; ?></td>
                                                              <td><?php echo $row_rsSubidEbooks['lec_filename']; ?></td>
                                                              <td><?php echo $row_rsSubidEbooks['lec_uploadedby']; ?></td>
<td><a href="LecturePPTs/<?php echo $row_rsSubidEbooks['lec_filename']; ?>" download>Download</a></td>
                                                              <td>Report</td>
                                                            </tr>
                                                            <?php } ?>
                                                </tbody>
                                            </table>
                                        </div><!-- /.box-body -->
                                        <form action="LecturePPTsUpload.php" method="POST" name="form" enctype="multipart/form-data">
<p>
<input type="hidden" name="MAX_FILE_SIZE" value="7340032">
<label for="filename">Upload File:</label>
<input type="file" class="btn btn-primary" name="filename" id="filename">
<input type="hidden" name="subid" value="<?php echo $row_rsClassSubids['sub_id']; ?>">
</p>
<p><input type="submit" class="btn btn-primary" name="upload" value="Upload File"></p>
</form>
                                
                                  </div><!-- /.tab-pane -->
                                     
                                      <?php } //loop 3 end ?>
                                    
                                    
                                    <!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div><!-- /.col -->
                    </div> <!-- /.row -->
                    <!-- END CUSTOM TABS -->
                    
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
            });
        </script>
    </body>
</html>
<?php
mysql_free_result($rsClassSubids);
mysql_free_result($rsSubidEbooks);
mysql_free_result($rsAllEbooks);
?>
