<?php 
require_once('../Connections/greenassign.php'); 
require_once '../src/foundationphp/UploadFile3.php';
use foundationphp\UploadFile;
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['maxfiles'])) {
	$_SESSION['maxfiles'] = 1;
	$_SESSION['postmax'] = UploadFile::convertToBytes(ini_get('post_max_size'));
	$_SESSION['displaymax'] = UploadFile::convertFromBytes($_SESSION['postmax']);
}
$max =1024*1024*7;
$result = array();
$feedback="";

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

if (((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form"))&&($_FILES['filename']["size"]>0)) {
	

if (isset($_POST['upload'])) {

	$destination = '../AssignFiles/';
	try {
		$upload = new UploadFile($destination);
		//$upload->allowAllTypes();
		$upload->upload();
		$result = $upload->getMessages();
		$finalName0=$upload->getFinalName();
	} catch (Exception $e) {
		$result[] = $e->getMessage();
	}
}
if ($result) { foreach ($result as $message) {$feedback.= $message." ";}}
		
$error = error_get_last();
		
		if (isset($finalName0)) {
			  
			  $insertSQL = sprintf("INSERT INTO assign (a_sub_id, a_batch, a_type, a_no, a_title, a_txt, a_file, a_startdate, a_subdate) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
			   GetSQLValueString($_POST['subid'], "int"),
			   GetSQLValueString($_POST['batch'], "text"),
			   GetSQLValueString($_POST['assigntype'], "text"),
			   GetSQLValueString($_POST['assignnumber'], "int"),
			   GetSQLValueString($_POST['title'], "text"),
			   GetSQLValueString($_POST['editor1'], "text"),
			   GetSQLValueString($finalName0, "text"),
			   GetSQLValueString(date('Y-m-d'), "text"),
			   GetSQLValueString(date_format(date_create_from_format('D M j Y',$_POST['subdate']), 'Y-m-d'), "text"));

			  mysql_select_db($database_greenassign, $greenassign);
			  $Result1 = mysql_query($insertSQL, $greenassign) or die(mysql_error());
			
			  $insertGoTo = "assignsedit.php?".$GET['subid'];
			  if (isset($_SERVER['QUERY_STRING'])) {
				$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
				$insertGoTo .= $_SERVER['QUERY_STRING'];
			  }
			  header(sprintf("Location: %s", $insertGoTo));exit;
		}  
		//Assign creation failed
		else { //$error.= "Unknown Error";//error
		}
  
}
if (((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form"))&&($_FILES['filename']["size"]==0)) {
  $insertSQL = sprintf("INSERT INTO assign (a_sub_id, a_batch, a_type, a_no, a_title, a_txt, a_startdate, a_subdate) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['subid'], "int"),
                       GetSQLValueString($_POST['batch'], "text"),
                       GetSQLValueString($_POST['assigntype'], "text"),
                       GetSQLValueString($_POST['assignnumber'], "int"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['editor1'], "text"),
                       GetSQLValueString(date('Y-m-d'), "text"),
					   GetSQLValueString(date_format(date_create_from_format('D M j Y',$_POST['subdate']), 'Y-m-d'), "text"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($insertSQL, $greenassign) or die(mysql_error());

  $insertGoTo = "assignsedit.php?".$GET['subid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));exit;
}

$class=-1;
if(isset($_GET['class'])){	
							$class=$_GET['class'];	}
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
        <link rel="stylesheet" href="../css/pikaday.css"  type="text/css">
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
    <body class="skin-blue" <?php if($result || $error) echo 'onload="myFunction()"'; ?>>

<script>
function myFunction() {
    alert("<?php 	if ($error) {
						echo "Error: ".$error['message']; 
						}
    				if ($result){
						foreach ($result as $message) {
						echo "Error: ".$message;
					}}
			?>");
}
</script>
    
    
    
    
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
                       <li><a href="#"><i class="fa fa-clipboard"></i> Assignments</a></li>
                        <li><a href="../Assignments/assignsedit.php?subid=<?php echo $_GET['subid']; ?>"><?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subabbv']." (".$_SESSION['MM_Subids'][$_GET['subid']]['subclass'].")"; ?></a></li>
                        <li class="active">Create Assignment</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <form method="POST" action="<?php echo $editFormAction; ?>" name="form" role="form" enctype="multipart/form-data">
                           	<!-- text input -->
                            <div class="form-group col-xs-2">
                                <label>Assign no.</label>
                                <input type="text" name="assignnumber" id="assignnumber" class="form-control" placeholder="Assign no."/>
                           	</div>
                            <div class="form-group col-xs-5">
                                <label>Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title..."/>
                           	</div>
                            <div class="form-group col-xs-2">
                                            <label>Batch</label>
                                            <select name="batch" id="batch" class="form-control">
                                                <option>All</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                            <!-- radio -->
                                        <div class="form-group">
                                        <label>Type</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="assigntype" id="assignment" value="Assignment" checked>
                                                   Assignment
                                                </label> &nbsp;&nbsp;&nbsp;<label>
                                                    <input type="radio" name="assigntype" id="experiment" value="Exp">
                                                    Experiment
                                         </label>        <!-- &nbsp;&nbsp;&nbsp;<label>
                                                    <input type="radio" name="assigntype" id="homework" value="Home Work"/>
                                                    Home Work
                                                </label> -->
                                        </div>
                                        
                        	
                            <div class='row'>
                        <div class='col-md-12'>
                            <div class='box box-info'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Assign: </h3>
                                    <!-- tools box -->
                                    
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                        <textarea id="editor1" name="editor1" rows="18" cols="80">
                                            
                                            
                                        </textarea>
                                </div>
                            </div><!-- /.box -->
                            </div>
                            
                            <div class='col-md-12'>
                             <div class='box box-info'>
                             <div class='box-header'>
                                    <h3 class='box-title'>Select File: </h3>
                                    <!-- tools box -->
                                    
                                </div><!-- /.box-header -->
                                   <div class='box-body pad'>
                        
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max;?>">
<label for="filename"></label>
<input type="file" name="filename" id="filename" 
data-maxfiles="<?php echo $_SESSION['maxfiles'];?>"
data-postmax="<?php echo $_SESSION['postmax'];?>"
data-displaymax="<?php echo $_SESSION['displaymax'];?>">

<ul>
  <!--    <li>Up to <?php echo $_SESSION['maxfiles'];?> files can be uploaded simultaneously.</li> -->
    <li>Each file should be no more than <?php echo UploadFile::convertFromBytes($max);?>.</li>
    <li>Combined total should not exceed <?php echo $_SESSION ['displaymax'];?>.</li>
</ul>
<p>
 </div>
                             </div><!-- /.box -->
                            </div>
                            
                            
                            </div>
                            <div class="col-md-6">
                                <div class="box-body">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group col-xs-6">
                                       <label for="datepicker">Submission Date:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datepicker" name="subdate" required>
                                            <script src="../js/pikaday.js"></script>
                                            <script>
                                            var picker = new Pikaday(
                                            {
                                                field: document.getElementById('datepicker'),
                                                firstDay: 1,
                                                minDate: new Date('2000-01-01'),
                                                maxDate: new Date('2020-12-31'),
                                                yearRange: [2000,2020]
                                            });
                                            </script>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                </div><!-- /.box-body -->
                            </div>
                            </div>
                            <br>
                      <button type="submit" name="upload" value="Upload File" class="btn btn-primary"> Save </button>
                      <input type="hidden" name="class" value="<?php echo $class;?>" />
                      <input type="hidden" name="subid" value="<?php echo $_SESSION['MM_Subids'][$_GET['subid']]['subid'];?>" />
                      <input type="hidden" name="MM_insert" value="form">
                  </form>
<script src="../js/checkmultiple.js"></script>
                    
                    
                </section><!-- /.content -->
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
        <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
         <!-- InputMask -->
        
    </body>
</html>