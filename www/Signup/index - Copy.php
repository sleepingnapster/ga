<?php require_once('../Connections/greenassign.php'); ?>
<?php require_once('../Connections/GreenAssign3.php'); ?>
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
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "sfitstaffform")) {
  $insertSQL = sprintf("INSERT INTO user_teacher (ut_u_id, ut_insti_id, ut_email, ut_imageurl, ut_displayname, ut_description) VALUES (%s, %s, %s, %s, %s, %s)",
  					   GetSQLValueString($_SESSION['GA_u_id'], "int"),
					   GetSQLValueString($_POST['institute'], "int"),
                       GetSQLValueString($_SESSION["email"], "text"),
                       GetSQLValueString($_SESSION["gimageurl"], "text"),
                       GetSQLValueString($_POST['staffname'], "text"),
                       GetSQLValueString($_POST['description'], "text"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($insertSQL, $greenassign) or die(mysql_error());
  
$updateSQL1 = sprintf("UPDATE user SET custom=%s, type=%s WHERE email=%s",
                       GetSQLValueString("1", "int"),
                       GetSQLValueString("teacher", "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result3 = mysql_query($updateSQL1, $greenassign) or die(mysql_error());
	  
	$_SESSION['GA_loggedin'] = true;
	$_SESSION['GA_name'] = $_POST['staffname'];
	$_SESSION['MM_UserGroup'] = "";
	$_SESSION['MM_Username'] = $_POST['staffname'];
	if($_POST['institute']==1){$_SESSION['GA_institute'] = "SFIT";} else{$_SESSION['GA_institute'] = " ";}
	$_SESSION['GA_insti_id'] = $_POST['institute'];
	$_SESSION['GA_usertype']="teacher";
	
  

  $insertGoTo = "../CollegeNews.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "sfitstudentform")) {
  $insertSQL = sprintf("INSERT INTO user_student (email, us_imageurl, us_u_id, us_displayname, us_class_id, us_rollno, us_pid, us_batch) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_SESSION["gimageurl"], "text"),
                       GetSQLValueString($_POST['u_id'], "int"),
                       GetSQLValueString($_POST['studentname'], "text"),
                       GetSQLValueString($_POST['class'], "text"),
                       GetSQLValueString($_POST['rollno'], "int"),
                       GetSQLValueString($_POST['pid'], "int"),
                       GetSQLValueString($_POST['batch'], "int"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($insertSQL, $greenassign) or die(mysql_error());
  
  $updateSQL = sprintf("UPDATE user SET custom=%s, type=%s WHERE email=%s",
                       GetSQLValueString("1", "int"),
                       GetSQLValueString("student", "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result2 = mysql_query($updateSQL, $greenassign) or die(mysql_error());
  
	//make student user logged in
	/*
		$_SESSION['GA_loggedin'] = 1;
		$_SESSION['GA_name']	=$_POST['studentname'];
		
		$_SESSION['GA_pid'] 	= $_POST['pid'];
		$_SESSION['GA_rollno'] 	= $_POST['rollno'];
		$_SESSION['class_id']	=$_POST['class'];
*/
		$_SESSION['GA_usertype']="student";
		$colname_RsStudent = $_SESSION['email'];
		//$_SESSION['displayName']=$request->get('displayName');
		
		mysql_select_db($database_GreenAssign3, $GreenAssign3);
		$query_RsStudent = sprintf("SELECT * FROM user_student \n"
    . "JOIN class\n"
    . "ON us_class_id = class_id\n"
    . "\n"
    . "JOIN institute\n"
    . "ON class_insti_id = insti_id\n"
    . "\n"
    . "WHERE email = %s LIMIT 0, 30 ;", GetSQLValueString($colname_RsStudent, "text"));
		$RsStudent = mysql_query($query_RsStudent, $GreenAssign3) or die(mysql_error());
		$row_RsStudent = mysql_fetch_assoc($RsStudent);
		$totalRows_RsStudent = mysql_num_rows($RsStudent);
		
		$_SESSION['GA_loggedin'] = 1;
		$_SESSION['GA_pid'] = $row_RsStudent['us_pid'];
		$_SESSION['GA_rollno'] = $row_RsStudent['us_rollno'];
		$_SESSION['GA_name'] = $row_RsStudent['us_displayname'];
		$_SESSION['class_id']=$row_RsStudent['us_class_id'];
		$_SESSION['class_readablename']=$row_RsStudent['class_readablename'];
		$_SESSION['class_compactname']=$row_RsStudent['class_compactname'];
		$_SESSION['GA_batch']=$row_RsStudent['us_batch'];
		$_SESSION['GA_insti_id']=$row_RsStudent['class_insti_id'];
		$_SESSION['GA_institute']=$row_RsStudent['insti_abv'];
						






	
  $insertGoTo = "../CollegeNews.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
        <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
        <link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
        <link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    <script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                GreenAssign
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                
                <div class="navbar-right">
                    
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                	
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                    
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Sign Up
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> Home</li>
                        <li class="active">SignUp</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					<div class="col-md-6">
                       	<!-- general form elements disabled -->
                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">General Elements</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                    <div class="form-group">
                                    <br>
                                    <label>Select Your Institute</label>
                                    <select class="form-control" id="institute">
                                         <option value="" id="null"></option>
                                        <optgroup label="Colleges">
                                          <option  value="1">SFIT : St. Francis Institute of Technology</option>
                                          <option  value="2">SPP : Sardar Patel Polytechnic</option>
                                        </optgroup>   
                                        <optgroup label="Schools">
                                          <option value="3">SVPV : Sardar Vallabhbhai Patel Vidyalaya</option>
                                        </optgroup>
                                      </select>
                                    </div>
                                    
                                    <!--sfit -->
                              <div id='sfit' style="display:none">
                                    <div class="form-group">
                                    <br>
                                    <label>Select User Type</label>
                                    <select class="form-control" id="sfittype">
                                         <option value="" id="null"></option>
                                          <option value="sfitstudent">Student</option>
                                          <option value="sfitstaff">Staff</option>
                                      </select>
                                    </div>
                                    
                                    <!-- sfitstudent -->
                                    <div id="sfitstudent" style="display:none">
                                    
                                	<form action="<?php echo $editFormAction; ?>" method="POST" name="sfitstudentform" role="form">
                                    <div class="form-group"><br>
                                        <label>Confirm Your Display Name</label>
                                        <span id="sprytextfield1">
         <input type="text" class="form-control" name="studentname" value="<?php echo $_SESSION["GA_name"]; ?>"/>
 <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded 120 characters.</span></span></div>
                                    <div class="form-group">
                                    
                                    <label>Select Your Class</label>
                                    <span id="spryselect1">
                                    <select name="class" class="form-control">
                                      <option></option>
                                      <optgroup label="FE">
                                        <option value="28">FE A</option>
                                        <option value="29">FE B</option>
                                        <option value="30">FE C</option>
                                        <option value="31">FE D</option>
                                        <option value="32">FE E</option>
                                        <option value="33">FE F</option>
                                        <option value="34">FE G</option>
                                      </optgroup>
                                      <optgroup label="IT">
                                        <option value="26">SE IT A</option>
                                        <option value="27">SE IT B</option>
                                        <option value="20">TE IT A</option>
                                        <option value="21">TE IT B</option>
                                        <option value="8">BE IT A</option>
                                        <option value="9">BE IT B</option>
                                      </optgroup>
                                      <optgroup label="CMPN">
                                        <option value="24">SE CMPN A</option>
                                        <option value="25">SE CMPN B</option>
                                        <option value="14">TE CMPN A</option>
                                        <option value="15">TE CMPN B</option>
                                        <option value="4">BE CMPN A</option>
                                        <option value="7">BE CMPN B</option>
                                      </optgroup>
                                      <optgroup label="EXTC">
                                        <option value="22">SE EXTC A</option>
                                        <option value="23">SE EXTC B</option>
                                        <option value="12">TE EXTC A</option>
                                        <option value="13">TE EXTC B</option>
                                        <option value="5">BE EXTC A</option>
                                        <option value="6">BE EXTC B</option>
                                      </optgroup>
                                    </select>
                                    <span class="selectRequiredMsg">Please select an item.</span></span></div>
                                    <div class="form-group">
                                        <label>Roll Number</label>
                                      <span id="sprytextfield2">
                                      <input name="rollno" type="text" class="form-control" placeholder="Example : 73"/>
                                      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded 3 characters.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div>
                                    <div class="form-group">
                                    <label>Select Batch</label>
                                    <span id="spryselect2">
                                    <select name="batch" class="form-control">
                                        <option></option>
                                        <option value="1">Batch 1</option>
                                        <option value="2">Batch 2</option>
                                        <option value="3">Batch 3</option>
                                        <option value="4">Batch 4</option>
                                    </select>
                                    <span class="selectRequiredMsg">Please select an item.</span></span></div>
                                    
                                    <div class="form-group">
                                        <label>Pid Number</label>
                                      <span id="sprytextfield3">
                                      <input type="text" name="pid" class="form-control" placeholder="Example : 122251"/>
                                      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMaxCharsMsg">Exceeded 9 characters.</span></span></div>
                                        <input type="text" value="1" name="institute" hidden/>
                                     	<input type="text" value="sfitstudent" name="usertype" hidden/>
                                        <input type="text" value="<?php echo $_SESSION['GA_u_id']; ?>" name="u_id" hidden/>
                                        
                                     	<input type="text" value="<?php echo $_SESSION["email"]; ?>" name="email" hidden/>
                                        
                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                        <input type="hidden" name="MM_insert" value="sfitstudentform">
                                	</form>
                                    </div><!-- end of sfitstudent -->
                                    
                                    
                                    
                                    
                                    
                                    <!-- sfitstaff -->
                                    <div id="sfitstaff" style="display:none">
                                    
                                	<form method="POST" action="<?php echo $editFormAction; ?>" name="sfitstaffform" role="form">
                                    <div class="form-group"><br>
                                        <label>Confirm Your Display Name</label>
                                        <span id="sprystaffname">
                                        <input type="text" class="form-control" name="staffname" value="<?php echo $_SESSION["GA_name"]; ?>"/>
                                        <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded 120 characters.</span></span></div>
                                    <div class="form-group">
                                    
                                        <label>Teacher id (if any)</label>
                                        <span id="sprytextfield5">
                                        <input type="text" name="teacherid" class="form-control"/>
                                      <span class="textfieldMaxCharsMsg">Exceeded 9 characters.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div>
                                    <div class="form-group">
                                    <br>
                                    <label>Short description of your role in the institute</label>
                                    <span id="sprystaffdesc">
                                    <textarea class="form-control" name="description" rows="7" placeholder="Example: 
I am a Lecturer. 
Subjects I Teach...
TE CMPN B : OS
TE CMPN A : OS
SE CMPN A : M4"></textarea>
                            <span class="textareaRequiredMsg">A value is required.</span></span></div>
                             <input type="text" value="1" name="institute" hidden/>
                             <input type="text" value="sfitstaff" name="usertype" hidden/>
                             <input type="text" value="<?php echo $_SESSION['GA_u_id']; ?>" name="u_id" hidden/>
                             <input type="text" value="<?php echo $_SESSION["email"]; ?>" name="email" hidden/>
                                     <button type="submit" class="btn btn-primary">Sign Up</button>
                                     <input type="hidden" name="MM_insert" value="sfitstaffform">
                                    </form>
                                    </div><!-- end of sfitstaff -->
                                    </div><!-- end of sfit -->
                                    
                                    
                                    <div id="svpv" style="display:none">
                                    
                                    <p>Coming soon</p>
                                    
                                    </div><!-- end of svpv -->
                                    
                                    
                                    

                                </form>
                               
                                    
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        </div >
                        
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script>
 
$(document).ready(function(){

	$("#sfittype").change(function(){
	switch ($("#sfittype option:selected").val()) { 
    case 'sfitstudent': 
		$("#sfitstudent").show();
		$("#sfitstaff").hide();
        break;
    case 'sfitstaff':
        $("#sfitstudent").hide();
		$("#sfitstaff").show();
		break;
    default:
        $("#sfitstudent").hide();
		$("#sfitstaff").hide();
		alert("Transfer Thai Gayo");
}
	  });
	
	$("#institute").change(function(){
	switch ($("#institute option:selected").val()) { 
    case '1': 
		$("#sfit").show();
		$("#svpv").hide();
        break;
    case '3': 
        $("#sfit").hide();
		$("#svpv").show();
		break;
    default:
        $("#sfit").hide();
		$("#svpv").hide();
}
	  });
		 
});

</script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {maxChars:120});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {maxChars:3});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {maxChars:9});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprystaffname", "none", {maxChars:120});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer", {maxChars:9, isRequired:false});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprystaffdesc");
    </script>
    </body>
</html>