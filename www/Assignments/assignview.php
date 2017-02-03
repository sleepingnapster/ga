<?php require_once('../Connections/greenassign.php'); ?>
<?php use foundationphp\UploadFile;
require '../src/foundationphp/UploadFileassignview.php';
if(!isset($_SESSION))
{
	session_start();
}
if (!isset($_SESSION['subm_maxfiles'])) {
	$_SESSION['subm_maxfiles'] = 1;
	$_SESSION['postmax'] = UploadFile::convertToBytes(ini_get('post_max_size'));
	$_SESSION['displaymax'] = UploadFile::convertFromBytes($_SESSION['postmax']);
}
$max=1024*1024*7;
?>
<?php
if(!(isset($_GET['assignid'])&&isset($_GET['subid']))){header('Location: ../');
exit;}
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

$colname_rsAssign = "-1";
if (isset($_GET['assignid'])) {
  $colname_rsAssign = $_GET['assignid'];
}

mysql_select_db($database_greenassign, $greenassign);
$query_rsAssign = sprintf("SELECT * FROM assign WHERE assign_id = %s", GetSQLValueString($colname_rsAssign, "int"));
$rsAssign = mysql_query($query_rsAssign, $greenassign) or die(mysql_error());
$row_rsAssign = mysql_fetch_assoc($rsAssign);
$totalRows_rsAssign = mysql_num_rows($rsAssign);

$colname_RsSubdetails = "-1";
if (isset($_GET['subid'])) {
  $colname_RsSubdetails = $_GET['subid'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsSubdetails = sprintf("SELECT * FROM sub WHERE sub_id = %s", GetSQLValueString($colname_RsSubdetails, "int"));
$RsSubdetails = mysql_query($query_RsSubdetails, $greenassign) or die(mysql_error());
$row_RsSubdetails = mysql_fetch_assoc($RsSubdetails);
$totalRows_RsSubdetails = mysql_num_rows($RsSubdetails);



$class=-1;
if (!isset($_SESSION)) {
  session_start();
}
if(isset($_GET['class'])){		$class=$_GET['class'];	}
							elseif(isset($_SESSION['class'])){	$class=$_SESSION['class'];}
							elseif(isset($_COOKIE['class'])){	$class=$_SESSION['class'];}
							if($class!=-1){}
?>

<?php
//color associative array
$color['Rejected'] = "orange";
$color[''] = "red";
$color['Accepted'] = "aqua-gradient";
$color['Submitted'] = "green";
$color['Late Submission'] = "yellow";
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
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="file:///C|/wamp/www/OneDrive/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

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
                    <h1><?php echo $row_RsSubdetails['sub_abbv']; ?> : <?php echo $row_RsSubdetails['sub_name']; ?>
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="http://greenassign.com/"><i class="fa fa-home"></i></a></li>
                        <li class="inactive">Assigns</li>
                        <li class="inactive"><a href="index.php?subid=<?php echo $_GET['subid']; ?>"><?php echo $row_RsSubdetails['sub_abbv']; ?></a></li>
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
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                <?php echo $row_rsAssign['a_txt']; ?>
             <!-- <textarea disabled id="editor1" name="editor1" rows="10" cols="80"><?php //echo $row_rsAssign['a_txt']; ?></textarea> -->
                                </div>
                                <div class="box-footer">
                                 <label>Submission Date: &nbsp;&nbsp;&nbsp;</label><big>
                                 
                                 <?php $datei=date_create($row_rsAssign['a_subdate']);
echo date_format($datei,"l  d M, Y "); 
$nowww=date_create();
$date2=date_create($row_rsAssign['a_subdate']);
$diff=date_diff($nowww,$date2);
if($nowww <= $date2)echo $diff->format(" (%a days left)");?></big>
                                </div>
                            </div><!-- /.box -->
                            </div>
                            </div>
                            <div class='row'>
                            <div class="col-md-6">
                           <?php if (isset($_SESSION['GA_rollno'])&(isset($_SESSION['email']))){ 
                                        
mysql_select_db($database_greenassign, $greenassign);
$query_RsAlreadySubmitted = sprintf("SELECT * FROM submissions WHERE subm_ass_id = %s AND subm_email = %s", GetSQLValueString($_GET['assignid'], "int"),GetSQLValueString($_SESSION['email'], "text"));
$RsAlreadySubmitted = mysql_query($query_RsAlreadySubmitted, $greenassign) or die(mysql_error());
$row_RsAlreadySubmitted = mysql_fetch_assoc($RsAlreadySubmitted);
$totalRows_RsAlreadySubmitted = mysql_num_rows($RsAlreadySubmitted);
if($totalRows_RsAlreadySubmitted>0){ ?>
	<div id="submission" class="box bg-gray">
    
    
    <div class='box-header'>
    <h3 class='box-title'>My Submission</h3>
    </div>
        
    
    
                        <div  class="box-body">
                        
                           	<div class="">
                            <label>Comments:</label> &nbsp;&nbsp;<?php echo $row_RsAlreadySubmitted['subm_comment']; ?> <p></p>
                            <label style="display:inline">Submitted File:</label> &nbsp;&nbsp;
                            <a href="../submfiles/SFIT/<?php echo $_GET['subid']; ?>/<?php echo $row_RsAlreadySubmitted['subm_file'];?>" download><button class="btn"><span class="glyphicon glyphicon-floppy-save"></span> Download </button></a>
                            
                            <a target="_blank" href="https://docs.google.com/viewer?url=http://greenassign.com/submfiles/SFIT/<?php echo $_GET['subid']; ?>/<?php echo $row_RsAlreadySubmitted['subm_file'];?>"><button class="btn"><span class="glyphicon glyphicon-new-window"></span> View </button></a>
                            <p></p>
                            		<label>Status:</label> &nbsp;&nbsp;<p style="display:inline-block" class="badge bg-<?php echo $color[$row_RsAlreadySubmitted['subm_status']];?>"><?php echo $row_RsAlreadySubmitted['subm_status']; ?></p><p></p>
                                   
                            		<label style="display:inline">Feedback: &nbsp;&nbsp; </label><p style="display:inline-block;font-weight:600""><?php if(isset($row_RsAlreadySubmitted['subm_feedback']))echo $row_RsAlreadySubmitted['subm_feedback']; else echo '-'; ?></p><p></p>
                          			<label style="display:inline">Marks: &nbsp;&nbsp; </label><p  style="display:inline; font-weight:600"><big><?php if(isset($row_RsAlreadySubmitted['subm_marks']))echo $row_RsAlreadySubmitted['subm_marks']; else echo '-'; ?>/<?php echo $row_rsAssign['a_marks']; ?></big></p><p></p>
                                    <button id="replacefile" class="btn btn-primary">Replace File</button> 
                          	</div>
                        </div>
                    </div>
               <!-- replacement form -->
               <div id="replacesubmission" style="display:none" class="box bg-gray">
<form action="assignsubmission.php" method="POST" name="form" style="display:inline" enctype="multipart/form-data">
	<div class="box-body">
		<div class="form-group">
                <label>Comments</label>
                <textarea class="form-control" name="comment" rows="3" placeholder="Enter ..."><?php
                if($totalRows_RsAlreadySubmitted>0)echo $row_RsAlreadySubmitted['subm_comment']; ?></textarea>
                <input type="hidden" name="MAX_FILE_SIZE" value="7340032">
                <label for="filename">Submit Assign File:</label>
                <input type="file" class="btn" name="filename" id="filename"  
data-maxfiles="<?php echo $_SESSION['subm_maxfiles'];?>"
data-postmax="<?php echo $_SESSION['postmax'];?>"
data-displaymax="<?php echo $_SESSION['displaymax'];?>">
                <input type="hidden" name="ass_id" value="<?php echo $_GET['assignid']; ?>">
                <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                <input type="hidden" name="subid" value="<?php echo $_GET['subid']; ?>">
                <input type="hidden" name="type" value="replacetype">
		</div><!-- /.form group -->
	</div><!-- /.box-body -->
               
               <button type="submit" name="upload" class="btn btn-primary">Upload File</button>
                &nbsp;&nbsp;          
              </form>   
              <button id="cancel" class="btn btn-primary">Cancel</button>
                                </div>     
               
	
	<?php } else {?>
<div class="box bg-gray">
 <div class='box-header'>
    <h3 class='box-title'>My Submission</h3>
    </div>
<form action="assignsubmission.php" method="POST" name="form" enctype="multipart/form-data">
	<div class="box-body">
		<div class="form-group">
			
                
                <label>Comments</label>
                <textarea class="form-control" name="comment" rows="3" placeholder="Enter ..."><?php
                if($totalRows_RsAlreadySubmitted>0){echo $row_RsAlreadySubmitted['subm_comment'];} ?></textarea>
                

                
                <input type="hidden" name="MAX_FILE_SIZE" value="7340032">
                <label for="filename">Submit Assign File:</label>
                <input type="file" class="btn btn-primary" name="filename" id="filename"  
data-maxfiles="<?php echo $_SESSION['subm_maxfiles'];?>"
data-postmax="<?php echo $_SESSION['postmax'];?>"
data-displaymax="<?php echo $_SESSION['displaymax'];?>">
                <input type="hidden" name="ass_id" value="<?php echo $_GET['assignid']; ?>">
                <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                <input type="hidden" name="subid" value="<?php echo $_GET['subid']; ?>">
                <input type="hidden" name="type" value="freshtype">
		</div><!-- /.form group -->
	</div><!-- /.box-body -->
                <div class="box-footer bg-gray">
                <input type="submit" class="btn btn-primary" name="upload" value="Upload File">
      		</div>
</form>
                        </div> 
                        <?php } ?>
               <?php } ?>
                    </div>
                    </div>
                    
                    
                    
                            <?php if (isset($row_rsAssign['a_file'])){ ?>
                            <div class='row'>
                              <div class="form-group col-xs-12 col-md-12 col-lg-12" style="height:1000px; width:100%">       
                        <iframe frameborder="5" style="overflow:hidden;height:100%;width:100%" height="100%" src="http://docs.google.com/gview?url=http://greenassign.com/AssignFiles/<?php echo $row_rsAssign['a_file']; ?>&embedded=true"></iframe>
                                   
                               </div><!-- /.form group --> 
                             </div>
                            <?php } ?>
                            
                    
                    
                    
                    
                    
                    
                    
                    </div>
                    <br>
                     
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

		<!-- js file validation -->
        <script src="../js/checkmultiple.js"></script>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        
         <!-- CK Editor -->
        <script src="../js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        
    <script type="text/javascript">
            $(function() {
				
				//show form
				$("#replacefile").click(function(){
					$("#submission").hide('fast');
					$("#replacesubmission").show('fast');
				});
				//hide form
				$("#cancel").click(function(){
					$("#replacesubmission").hide('fast');
					$("#submission").show('fast');
				}); 
				<?php
if(isset($_GET['feedback'])){ ?>
				alert("<?php echo $_GET['feedback']; ?>");
				<?php } ?>
				
            });
        </script>
    </body>
</html>
<?php
mysql_free_result($rsAssign);

mysql_free_result($RsSubdetails);
?>