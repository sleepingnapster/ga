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
//temp fix "1" : only fetching the classid nothing like custom page
if(isset($_POST['classid']))	
	{
		
//u got this!
mysql_select_db($database_greenassign, $greenassign);
$query_rsClassNInsti = "SELECT  `class` . * ,  `institute` . *  FROM class INNER JOIN institute ON  `class`.`class_insti_id` =  `institute`.`insti_id` WHERE  `class`.`class_id` = '".$_POST['classid']."'";
$rsClassNInsti = mysql_query($query_rsClassNInsti, $greenassign) or die(mysql_error());
$row_rsClassNInsti = mysql_fetch_assoc($rsClassNInsti);
$totalRows_rsClassNInsti = mysql_num_rows($rsClassNInsti);

		
$_SESSION['class_id']=$row_rsClassNInsti['class_id'];
$_SESSION['class_readablename']=$row_rsClassNInsti['class_readablename'];
$_SESSION['class_compactname']=$row_rsClassNInsti['class_compactname'];
$_SESSION['GA_insti_id']=$row_rsClassNInsti['insti_id'];
$_SESSION['GA_institute']=$row_rsClassNInsti['insti_abv'];
$_SESSION['GA_insti_fullname']=$row_rsClassNInsti['insti_fullname'];
		
		if(isset($_POST['saveclass']))
		{
			setcookie("class_id", $row_rsClassNInsti['class_id'], time()+60*24*3600);
			setcookie("class_readablename", $row_rsClassNInsti['class_readablename'], time()+60*24*3600);
			setcookie("class_compactname", $row_rsClassNInsti['class_compactname'], time()+60*24*3600);
			setcookie("GA_insti_id", $row_rsClassNInsti['insti_id'], time()+60*24*3600);
			setcookie("GA_institute", $row_rsClassNInsti['insti_abv'], time()+60*24*3600);
			setcookie("GA_insti_fullname", $row_rsClassNInsti['insti_fullname'], time()+60*24*3600);
			
		}
		//temp fix 1
		/*
		if(isset($_POST['institute']))
		{
			$_SESSION['GA_institute']=$_POST['institute'];
		}*/
		if(isset($_POST['page']))
		{
			switch ($_POST['page']) {
    case "ClassNews":
			header('Location: ../ClassNews/');
			exit;
        break;
    case "TimeTable":
			header('Location: TT.php');
			exit;
        break;
    case "Syllabus":
			header('Location: Syllabus.php');
			exit;
        break;
			
    case "LecturePPTs":
			header('Location: ../PPTs/');
			exit;
        break;
    case "Books":
			header('Location: ../Books/');
			exit;
        break;
    case "Assignments":
			header('Location: Assignments/assigns.php');
			exit;
        break;
    case "QuestionPapers":
			header('Location: ../QuestionPapers/');
			exit;
        break;
    case "PaperSolution":
			header('Location: ../PaperSolution/');
			exit;
        break;
    case "ClassMembers":
			header('Location: ../ClassMembers/');
			exit;
        break;
    case "VideoTutorials":
			header('Location: ../VideoTutorials/');
			exit;
        break;
    default:
			header('Location: ../CollegeNews.php');
			exit;
			}
			
		}else{header('Location: ../CollegeNews.php');
			exit;}
	}
	
	//GET form object 
	//set the session
	//set the cookie if checkbox is set
	//redirect back to earlier page
	/*
	if(isset($_SESSION['class'])){
		//use it
	} else {
		if(isset($_COOKIE['class'])){
			$_SESSION['class']=$_COOKIE['class']
			//use it
			}else{
				//redirect to ask class
				
				}
	}*/
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
                    <form action="#" method="GET" class="sidebar-form">
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
                        Select Class
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Blank page</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container">
		
		
                <form action="SelectClass.php" method="POST">
             
			   <?php /* 
        			 <div class="row">
                    <div class="form-group col-xs-6">
                        <label>Select College</label>
                        <select name="institute" class="form-control">
                            <option value="sfit">SFIT : St. Francis Institute of Technology</option>
                            <option>SVPV</option>
                        </select>
                    </div>
                    </div> */ ?>
                     <div class="row">
                <table width="707" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <th width="176" scope="col"><label>CMPN</label></th>
    <th width="157" scope="col">IT</th>
    <th width="178" scope="col">EXTC</th>
    <th width="170" scope="col">FE</th>
  </tr>
  <tr>
    <td><input type="radio" name="classid" value="4"> BE CMPN A</td>
    <td><input type="radio" name="classid" value="8"> BE IT A</td>
    <td><input type="radio" name="classid" value="5"> BE EXTC A</td>
    <td><input type="radio" name="classid" value="28"> FE A</td>
  </tr> 
  <tr>
    <td><input type="radio" name="classid" value="7"> BE CMPN B</td>
    <td><input type="radio" name="classid" value="9"> BE IT B</td>
    <td><input type="radio" name="classid" value="6"> BE EXTC B</td>
    <td><input type="radio" name="classid" value="29"> FE B</td>
    </tr>
  <tr>
    <td><input type="radio" name="classid" value="14"> TE CMPN A</td>
    <td><input type="radio" name="classid" value="20"> TE IT A</td>
    <td><input type="radio" name="classid" value="12"> TE EXTC A</td>
    <td><input type="radio" name="classid" value="30"> FE C</td>
    </tr>
  <tr>
    <td><input type="radio" name="classid" value="15"> TE CMPN B</td>
    <td><input type="radio" name="classid" value="21"> TE IT B</td>
    <td><input type="radio" name="classid" value="13"> TE EXTC B</td>
    <td><input type="radio" name="classid" value="31"> FE D</td>
    </tr>
  <tr>
    <td><input type="radio" name="classid" value="24"> SE CMPN A</td>
    <td><input type="radio" name="classid" value="26"> SE IT A</td>
    <td><input type="radio" name="classid" value="22"> SE EXTC A</td>
    <td><input type="radio" name="classid" value="32"> FE E</td>
    </tr>
  <tr>
    <td><input type="radio" name="classid" value="25"> SE CMPN B</td>
    <td><input type="radio" name="classid" value="27"> SE IT B</td>
    <td><input type="radio" name="classid" value="23"> SE EXTC B</td>
    <td><input type="radio" name="classid" value="33"> FE F</td>
    </tr>
    <tr>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td><input type="radio" name="classid" value="34"> FE G</td>
    </tr>
    <tr>
    <td colspan="4">
    <hr>
    </td>
    </tr>
  <tr>
    <td><br></td>
    <td><br></td>
   <td colspan="2"><input id="saveclass" type="checkbox" name="saveclass" value="saveclass"/>
		<label for="saveclass">Remember my class on this device</label>
	</td>
  </tr>
  <tr>
    <td>&nbsp;<input hidden="true" value="<?php if(isset($_GET['page'])){echo $_GET['page'];}else {echo "Potato";}?>" name="page" id="page" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="submit" type="submit" value="submit"></td>
  </tr>
</table>
</div>
				</form>
				
	
</div>  
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
       
    </body>
</html>