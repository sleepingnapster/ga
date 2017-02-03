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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
  $updateSQL = sprintf("UPDATE assign SET  a_batch=%s, a_type=%s, a_no=%s, a_title=%s, a_txt=%s, a_subdate=%s WHERE assign_id=%s",
                       
					   GetSQLValueString($_POST['batch'], "text"),
                       GetSQLValueString($_POST['assigntype'], "text"),
                       GetSQLValueString($_POST['assignnumber'], "int"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['editor1'], "text"),
	GetSQLValueString(date_format(date_create_from_format('D M j Y',$_POST['subdate']), 'Y-m-d'), "text"),
                       GetSQLValueString($_POST['assignid'], "int"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($updateSQL, $greenassign) or die(mysql_error());

  $updateGoTo = "assignsedit.php?subid=".$_GET['subid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsAssign = "-1";
if (isset($_GET['assignid'])) {
  $colname_rsAssign = $_GET['assignid'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_rsAssign = sprintf("SELECT * FROM assign WHERE assign_id = %s", GetSQLValueString($colname_rsAssign, "int"));
$rsAssign = mysql_query($query_rsAssign, $greenassign) or die(mysql_error());
$row_rsAssign = mysql_fetch_assoc($rsAssign);
$totalRows_rsAssign = mysql_num_rows($rsAssign);

$class=-1;
if (!isset($_SESSION)) {
  session_start();
}
if(isset($_GET['class'])){		$class=$_GET['class'];	}
							elseif(isset($_SESSION['class'])){	$class=$_SESSION['class'];}
							elseif(isset($_COOKIE['class'])){	$class=$_SESSION['class'];}
							if($class!=-1){}
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
       	<!-- Date Picker style -->
        <link rel="stylesheet" href="../css/pikaday.css"  type="text/css">
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

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
                        <small><?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." : ".$_SESSION['MM_Subids'][$_GET['subid']]['subname']; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="http://greenassign.com/"><i class="fa fa-home"></i></a></li>
                        <li><a href="#"><i class="fa fa-clipboard"></i> Assignments</a></li>
                        <li><a href="../Assignments/assignsedit.php?subid=<?php echo $_GET['subid']; ?>"><?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." (".$_SESSION['MM_Subids'][$_GET['subid']]['subclass'].")"; ?></a></li>
                        <li class="active"><?php echo  $row_rsAssign['a_type']." ".$row_rsAssign['a_no']; ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                                        <div class="form-group">
                                            
                            <div class='row'>
                        <div class='col-md-12'>
                            <div class='box box-info'>
                                <div class='box-header'>
                                <h3 class='box-title'> <?php echo  $row_rsAssign['a_type']." ".$row_rsAssign['a_no']." : Batch ".$row_rsAssign['a_batch'].": ". $row_rsAssign['a_title']; ?></h3>
                                    <!-- tools box -->
                                    
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                <?php echo $row_rsAssign['a_txt']; ?>
             <!-- <textarea disabled id="editor1" name="editor1" rows="10" cols="80"><?php //echo $row_rsAssign['a_txt']; ?></textarea> -->
                                </div>
                            </div><!-- /.box -->
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-body">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group col-xs-6">
                                        <label>Submission Date:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $row_rsAssign['a_subdate']; ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        </div><!-- /.input group -->
                                        
                                   
                                    
                                  </div ><!-- /.form group --> 
                                  
                                 
                                  
                                  
                                  
                                </div><!-- /.box-body -->
                            </div>
                            
                            
                            <?php if (isset($row_rsAssign['a_file'])){ ?>
                              <div class="form-group col-xs-12 col-md-12 col-lg-12" style="height:1000px; width:100%">       
                        <iframe frameborder="5" style="overflow:hidden;height:100%;width:100%" height="100%" src="http://docs.google.com/gview?url=http://greenassign.com/AssignFiles/<?php echo $row_rsAssign['a_file']; ?>&embedded=true"></iframe>
                                   
                               </div><!-- /.form group --> 
                            
                            <?php } ?>
                            
                            
                            </div>
                            <br>
                 <a href="assignupdate.php?assignid=<?php echo $_GET['assignid']; ?>&subid=<?php echo $_GET['subid']; ?>" class="btn btn-primary" style="width:100px">Edit</a>
                 <a href="../Submissions/?assignid=<?php echo $_GET['assignid']; ?>&subid=<?php echo $_GET['subid']; ?>" class="btn btn-info" style="width:100px">Check</a>
                </section>
                <!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
         <!-- CK Editor -->
        <script src="../js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
         <!-- Bootstrap WYSIHTML5 -->
        <script src="../../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
         
    </body>
</html>
<?php
mysql_free_result($rsAssign);
?>