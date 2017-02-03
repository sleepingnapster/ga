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


//if user changes hidden email field trying to hack
if((isset($_POST["email"])) && ($_POST["email"] != $_SESSION["email"])){header(sprintf("Location: www.greenassign.com"));exit;}


//if 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}









//userstaffform
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "userstaffform")) {
	
	
	include_once('../Connections/greenassign.php');
	
	
	
	
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











//userstudentform
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "userstudentform")) {
	include_once('../Connections/greenassign.php');
 /* $insertSQL = sprintf("INSERT INTO user_student (email, us_imageurl, us_u_id, us_displayname, us_class_id, us_rollno, us_pid, us_batch) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_SESSION["gimageurl"], "text"),
                       GetSQLValueString($_POST['u_id'], "int"),
                       GetSQLValueString($_POST['studentname'], "text"),
                       GetSQLValueString($_POST['class'], "text"),
                       GetSQLValueString($_POST['rollno'], "int"),
                       GetSQLValueString($_POST['pid'], "int"),
                       GetSQLValueString($_POST['batch'], "int"));
	*/				   
					   
	  $insertSQL = sprintf("INSERT INTO user_student (us_email, us_imageurl, us_u_id, us_displayname, us_pid) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_SESSION["gimageurl"], "text"),
                       GetSQLValueString($_POST['u_id'], "int"),
                       GetSQLValueString($_POST['studentname'], "text"),
                       GetSQLValueString($_POST['pid'], "int"));					   
					   
					   
					   
   /*
   *user_student*
                       GetSQLValueString($_POST['batch'], "int")
                       GetSQLValueString($_POST['rollno'], "int")
   	
us_id
us_u_id
us_email
us_imageurl
us_displayname
us_pid
   
   
   
   //now query the latest us_id
		then insrt using that us_id ..batch,us_id,roll number  
		mysql_insert_id() 
		 
 *activestudentbatch*  
					   
studentbatch_id
studentbatch_batch
studentbatch_student
studentbatch_rollnumber
studentbatch_des


*/





  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($insertSQL, $greenassign) or die(mysql_error());
  
  
  
 $insertSQL2 = sprintf("INSERT INTO activestudentbatch (studentbatch_batch, studentbatch_student, studentbatch_rollnumber) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['batch'], "int"),
                       GetSQLValueString(mysql_insert_id(), "int"),
                       GetSQLValueString($_POST['rollno'], "int"));
  
  
  mysql_select_db($database_greenassign, $greenassign);
  $Result2 = mysql_query($insertSQL2, $greenassign) or die(mysql_error());
  
  
  
  
  
  $updateSQL = sprintf("UPDATE user SET custom=%s, type=%s WHERE email=%s",
                       GetSQLValueString("1", "int"),
                       GetSQLValueString("student", "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result3  = mysql_query($updateSQL, $greenassign) or die(mysql_error());
  
  
  
	//make student user logged in
	/*
		$_SESSION['GA_loggedin'] = 1;
		$_SESSION['GA_name']	=$_POST['studentname'];
		
		$_SESSION['GA_pid'] 	= $_POST['pid'];
		$_SESSION['GA_rollno'] 	= $_POST['rollno'];
		$_SESSION['class_id']	=$_POST['class'];
*/


		
		$_SESSION['GA_usertype']="student";
		$colname_RsStudent = $_POST['email'];
		//$_SESSION['displayName']=$request->get('displayName');
		
		mysql_select_db($database_greenassign, $greenassign);
	/*	$query_RsStudent = sprintf("SELECT * FROM user_student \n"
    . "JOIN class\n"
    . "ON us_class_id = class_id\n"
    . "\n"
    . "JOIN institute\n"
    . "ON class_insti_id = insti_id\n"
    . "\n"
    . "WHERE email = %s LIMIT 0, 30 ;", GetSQLValueString($colname_RsStudent, "text"));
	*/
	
		$query_RsStudent = sprintf("SELECT * FROM (SELECT * FROM user_student WHERE us_email = %s ) 
									AS us
									JOIN activestudentbatch
									ON us.us_id = studentbatch_student
									JOIN activebatch
									on studentbatch_batch = batch_id
									JOIN activeclass
									ON batch_class_id = class_id
									JOIN institute
									ON class_insti_id = insti_id
		;", GetSQLValueString($colname_RsStudent, "text"));



		$RsStudent = mysql_query($query_RsStudent, $greenassign) or die(mysql_error());
		$row_RsStudent = mysql_fetch_assoc($RsStudent);
		$totalRows_RsStudent = mysql_num_rows($RsStudent);
		
		
		
		
		$_SESSION['GA_loggedin'] = 1;
		$_SESSION['GA_u_id'] 	= $row_RsStudent['u_id'];
		$_SESSION['GA_us_id'] 	= $row_RsStudent['us_id'];
		$_SESSION['GA_pid'] 	= $row_RsStudent['us_pid'];
		$_SESSION['GA_name'] 	= $row_RsStudent['us_displayname'];
		$_SESSION['GA_rollno'] 	= $row_RsStudent['studentbatch_rollnumber'];
		$_SESSION['GA_batch_id'] 	= $row_RsStudent['batch_id'];
		$_SESSION['GA_batch_number'] = $row_RsStudent['batch_number'];
		
		$_SESSION['GA_class_id'] = $row_RsStudent['class_id'];
		$_SESSION['GA_class_readablename'] = $row_RsStudent['class_readablename'];
		$_SESSION['GA_class_compactname'] = $row_RsStudent['class_compactname'];
		
		$_SESSION['class_id'] = $row_RsStudent['class_id'];
		$_SESSION['class_readablename'] = $row_RsStudent['class_readablename'];
		$_SESSION['class_compactname'] = $row_RsStudent['class_compactname'];
		$_SESSION['GA_insti_id'] = $row_RsStudent['insti_id'];
		$_SESSION['GA_institute'] = $row_RsStudent['insti_abv'];
		//$_SESSION['GA_institute_name']=$row_RsStudent['insti_fullname'];
		$_SESSION['GA_timestate'] = 'active';
		
	
/*					
echo $totalRows_RsStudent; 
echo " <br> ".$row_RsStudent['us_id'];
echo " <br> ".$row_RsStudent['us_u_id'];
echo " <br> ".$row_RsStudent['us_email'];
echo " <br> ".$row_RsStudent['us_imageurl'];
echo " <br> ".$row_RsStudent['us_displayname'];
echo " <br> ".$row_RsStudent['us_pid'];
echo " <br> ".$row_RsStudent['studentbatch_id'];
echo " <br> ".$row_RsStudent['studentbatch_batch'];
echo " <br> ".$row_RsStudent['studentbatch_student'];
echo " <br> ".$row_RsStudent['studentbatch_rollnumber'];
echo " <br> ".$row_RsStudent['studentbatch_des'];
echo " <br> ".$row_RsStudent['batch_id'];
echo " <br> ".$row_RsStudent['batch_class_id'];
echo " <br> ".$row_RsStudent['batch_number'];
echo " <br> ".$row_RsStudent['batch_des'];
echo " <br> ".$row_RsStudent['class_id'];
echo " <br> ".$row_RsStudent['class_insti_id'];
echo " <br> ".$row_RsStudent['class_timestate'];
echo " <br> ".$row_RsStudent['class_compactname'];
echo " <br> ".$row_RsStudent['class_capacity'];
echo " <br> ".$row_RsStudent['class_readablename'];
echo " <br> ".$row_RsStudent['insti_id'];
echo " <br> ".$row_RsStudent['insti_abv'];
echo " <br> ".$row_RsStudent['insti_fullname'];
echo " <br> ".$row_RsStudent['insti_logo'];
echo " <br> ".$row_RsStudent['insti_about'];

*/

	
  $insertGoTo = "../CollegeNews.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  exit;
}


 function load_institute()  
 {  
 
 	include_once('../Connections/greenassign.php'); 
 	$insertSQL = sprintf("SELECT * FROM institute ORDER BY insti_fullname");
	mysql_select_db($database_greenassign, $greenassign);
	$result = mysql_query($insertSQL, $greenassign) or die(mysql_error());
 
 
 
      //$connect = mysqli_connect("localhost", "root", "", "dynamic");  
      $output = '';  
      //$sql = "SELECT * FROM institute ORDER BY institute_name";  
      //$result = mysqli_query($connect, $sql); 
	   
      while($row = mysql_fetch_assoc($result))  
      {  
           $output .= '<option value="'.$row["insti_id"].'">'.$row["insti_fullname"].'</option>';  
      }  
      return $output;  
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>  
    
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
                                    <label>Select User Type</label>
                                    <select class="form-control" id="usertype">
                                         <option value="" id="null"></option>
                                          <option value="userstudent">Student</option>
                                          <option value="userstaff">Staff</option>
                                          <option value="userparent">Parent</option>
                                      </select>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <!-- userstudent -->
                                    <div id="userstudent" style="display:none">
                                    
                                	<form action="<?php echo $editFormAction; ?>" method="POST" name="userstudentform" role="form">
                                    
                                    
                                    
                                    <div class="form-group">
                                    	<br>
                                  		<label>Select Your Institute</label>
                            			<select class="form-control"  name="institute" id="institute">  
                                     		<option value="">Select institute</option>  
                                            <?php $nouseoffunction = load_institute(); echo $nouseoffunction; ?>  
                             			</select>
                              		</div>
                                       
                                	<div class="form-group">  
                                    	<br>     
                                       	<label>Select Your Class</label>
                                       	<span id="spryselect1">
                                       	<select class="form-control" name="class" id="class">
                                       	</select> 
                                       	<span class="selectRequiredMsg">Please select an item.</span></span> 
                                   	</div>  
                             		
                                    
                                    <div class="form-group">
                                    	<br>
                                   		<label>Select batch</label>
                                        <span id="spryselect2">
                                   		<select class="form-control" name="batch" id="batch" required>
                                     	</select>
                                        <span class="selectRequiredMsg">Please select an item.</span></span>                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                    <br>
                                    	<label>Confirm Your Display Name</label>
                                        <span id="sprytextfield1">
         									<input type="text" class="form-control" name="studentname" value="<?php echo $_SESSION["GA_name"]; ?>" required/>
 										<span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded 120 characters.</span></span>
                                  	</div>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                           				<label>Roll Number</label>
                                      	<span id="sprytextfield2">
                                      	<input name="rollno" type="text" class="form-control" placeholder="Example : 73" required/>
                                      	<span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded 3 characters.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
                                  	</div>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label>Pid Number</label>
                                      <span id="sprytextfield3">
                                      <input type="text" name="pid" class="form-control" placeholder="Example : 122251" required/>
                                      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMaxCharsMsg">Exceeded 9 characters.</span></span></div>
                                        <input type="text" value="1" name="institute" hidden/>
                                     	<input type="text" value="userstudent" name="usertype" hidden/>
                                        <input type="text" value="<?php echo $_SESSION['GA_u_id']; ?>" name="u_id" hidden/>
                                        
                                     	<input type="text" value="<?php echo $_SESSION["email"]; ?>" name="email" hidden/>
                                        
                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                        <input type="hidden" name="MM_insert" value="userstudentform">
                                	</form>
                                    </div><!-- end of userstudent -->
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <!-- userstaff -->
                                    <div id="userstaff" style="display:none">
                                    
                                	<form method="POST" action="<?php echo $editFormAction; ?>" name="userstaffform" role="form">
                                    
                                    
                                    	
                                        <div class="form-group">
                                            <br>
                                            <label>Select Your Institute</label>
                                            <select class="form-control"  name="institute" id="institute">  
                                                <option value="">Select institute</option>  
                                                <?php echo $nouseoffunction; ?>  
                                            </select>
                                        </div>
                                    
                                    
                                    
                                        <div class="form-group"><br>
                                            <label>Confirm Your Display Name</label>
                                            <span id="sprystaffname">
                                            <input type="text" class="form-control" name="staffname" value="<?php echo $_SESSION["GA_name"]; ?>"/>
                                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded 120 characters.</span></span>
                              			</div>
                                        
                                        
                                    	<div class="form-group">
                                            <label>Teacher id (if any)</label>
                                            <span id="sprytextfield5">
                                            <input type="text" name="teacherid" class="form-control"/>
                                      		<span class="textfieldMaxCharsMsg">Exceeded 9 characters.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
                                      	</div>
                                    
                                    
                                    	<div class="form-group">
                                            <br>
                                            <label>Short description of your role in the institute</label>
                                            <span id="sprystaffdesc">
                                            <textarea class="form-control" name="description" rows="7" placeholder="Example: 
                                                I am a Lecturer. 
                                                Subjects I Teach...
                                                TE CMPN B : OS
                                                TE CMPN A : OS
                                                SE CMPN A : M4">
                                       		</textarea>
                                			<span class="textareaRequiredMsg">A value is required.</span></span>
                                		</div>
                                        
                                        
                                        
                                        
                             			<input type="text" value="1" name="institute" hidden/>
                                     	<input type="text" value="userstaff" name="usertype" hidden/>
                                      	<input type="text" value="<?php echo $_SESSION['GA_u_id']; ?>" name="u_id" hidden/>
                                      	<input type="text" value="<?php echo $_SESSION["email"]; ?>" name="email" hidden/>
                                        
                                     <button type="submit" class="btn btn-primary">Sign Up</button>
                                     <input type="hidden" name="MM_insert" value="userstaffform">
                                    </form>
                                    </div><!-- end of userstaff -->
                                   
                                    
                                    
                                    
                                    
                                    








                                    
                                    
                                    <!-- userparent -->
                                    <div id="userparent" style="display:none">
                                    
                                	<form method="POST" action="<?php echo $editFormAction; ?>" name="userparentform" role="form">
                                    
                                    
                                    	
                                        <div class="form-group">
                                            <br>
                                            <label>Select Your Child's Institute</label>
                                            <select class="form-control"  name="institute" id="institute">  
                                                <option value="">Select institute</option>  
                                                <?php echo $nouseoffunction; ?>  
                                            </select>
                                        </div>
                                    
                                    	<div class="form-group">
                                    		<label>Select Your Child's P-id Number</label>
                                       		<span id="sprytextfield3">
                                       		<input type="text" name="pid" class="form-control" placeholder="Example : 122251"/>
                                     		<span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMaxCharsMsg">Exceeded 9 characters.</span></span>
                                   		</div>
                                    
                                    
                                        <div class="form-group"><br>
                                            <label>Confirm Your Display Name</label>
                                            <span id="sprystaffname">
                                            <input type="text" class="form-control" name="staffname" value="<?php echo $_SESSION["GA_name"]; ?>"/>
                                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded 120 characters.</span></span>
                              			</div>
                                        
                                        
                                    
                                    
                                    
                             			
                                     	<input type="text" value="userparent" name="usertype" hidden/>
                                      	<input type="text" value="<?php echo $_SESSION['GA_u_id']; ?>" name="u_id" hidden/>
                                      	<input type="text" value="<?php echo $_SESSION["email"]; ?>" name="email" hidden/>
                                        
                                     <button type="submit" class="btn btn-primary">Sign Up</button>
                                     <input type="hidden" name="MM_insert" value="userparentform">
                                    </form>
                                    </div><!-- end of userparent -->
                                   
                                    




                               
                                    
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        </div >
                        
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        
        
          
           
      </body>  
 </html>  
 
 
 <script>  
 $(document).ready(function(){  
 
 
  $('#class').change(function(){  
           var class_id = $(this).val();  
           $.ajax({  
                url:"fetch_batch.php",  
                method:"POST",  
                data:{classId:class_id},  
                dataType:"text",  
                success:function(data)  
                {  
                     $('#batch').html(data);  
                }  
           });  
      });
	  
      $('#institute').change(function(){  
           var institute_id = $(this).val();  
           $.ajax({  
                url:"fetch_class.php",  
                method:"POST",  
                data:{instituteId:institute_id},  
                dataType:"text",  
                success:function(data)  
                {  
                     $('#class').html(data);
					 $('#batch').html("");  
                }  
           });  
      }); 
	  
	  

	$("#usertype").change(function(){
	switch ($("#usertype option:selected").val()) { 
    case 'userstudent': 
		$("#userstudent").show();
		$("#userstaff").hide();
		$("#userparent").hide();
        break;
    case 'userstaff':
        $("#userstudent").hide();
		$("#userparent").hide();
		$("#userstaff").show();
		break;
    case 'userparent':
        $("#userstudent").hide();
		$("#userstaff").hide();
		$("#userparent").show();
		break;
    default:
        $("#userstudent").hide();
		$("#userstaff").hide();
		$("#userparent").hide();
		//alert("Please Select an option");
}
	  });
	 
 
 });  
 </script>