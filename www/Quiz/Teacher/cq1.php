<?php require_once('../../Connections/greenassign.php'); ?>
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


//check if teacher
//check for verified teacher..if not teacher go to greenassign.com
if(!(isset($_SESSION['GA_usertype'])&&($_SESSION['GA_usertype']=="teacher")&&(isset($_SESSION['GA_ut_id'])))){//teacher links
header("Location: http://greenassign.com"); }
if(!((isset($_POST['by']))&& ($_POST['by']==$_SESSION['email'])))
{
header("Location: http://greenassign.com");
}

echo $_POST['type'];
if($_POST['type']=='sub')
{//show all similar subjects

mysql_select_db($database_greenassign, $greenassign);
$query_rsSimilarSubjects = "SELECT *  FROM `sub` 
JOIN  `class` ON ( class_id = sub_class_id ) 
WHERE `sub`.`sub_abbv` = '".$_SESSION['MM_Subids'][$_POST['subid']]['subabbv']."'";
$rsSimilarSubjects = mysql_query($query_rsSimilarSubjects, $greenassign) or die(mysql_error());
$row_rsSimilarSubjects = mysql_fetch_assoc($rsSimilarSubjects);
$totalRows_rsSimilarSubjects = mysql_num_rows($rsSimilarSubjects);
} 
else{//show all class ids of institute

}
//What to do?
//--> take the post variables 
// by
// sub_id
// 
// 1)ask title
// 2)Query other sub_ids with same abbv
// 3)ask alternate subids via looping the results
// 4)attach by as hidden
// 5)submit these results to a page that will :Insert the Quiz_id etc along with the sub_id entry/ies

/*
for($i=0;$i<$_SESSION['MM_Subcount'];$i++){ 
 $i;
$_SESSION['MM_Subids'][$i]['subabbv']." ".
$_SESSION['MM_Subids'][$i]['subclass']." ".
$_SESSION['MM_Subids'][$i]['subid']."<br>";
} 
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GreenAssign</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../../SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    <script src="../../SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
    <?php include '../../includes/header.php';?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less --><!-- sidebar: style can be found in sidebar.less --><!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar"></section>
            <!-- /.sidebar -->
            <!-- /.sidebar -->
          </aside>
  <!-- Right side column. Contains the navbar and content of the page --><!-- Right side column. Contains the navbar and content of the page --><!-- Right side column. Contains the navbar and content of the page -->
          <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Create Quiz
                <small></small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Quizzes</li>
              </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
              <!-- START CUSTOM TABS -->
              <div class="row">
              <div class="col-md-8">
                <!-- general form elements disabled -->
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">Quiz Details</h3>
                  </div><!-- /.box-header -->
                  <form action="cq3.php" method="post">
                    <div class="box-body">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Quiz Title</label>
                        <input name="title" type="text" class="form-control" placeholder="Enter ..." required/>
                        <input name="by" type="text" value="<?php echo $_SESSION['email']; ?>" HIDDEN/>
                        <input name="type" type="text" value="<?php echo $_POST['type']; ?>" HIDDEN/>
                      </div>
                      <br/>
                      <!-- checkbox -->
                      <div class="form-group">
                        <label>Quiz For</label>
                        
                        <?php if($_POST['type']=='sub'){ ?>
                        
                        <span id="sprysubcheckbox">
                        <?php do { ?>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="subcheckbox[]" id="subcheckbox" value="<?php echo $row_rsSimilarSubjects['sub_id']; ?>" 
                            <?php if($row_rsSimilarSubjects['sub_id']==$_SESSION['MM_Subids'][$_POST['subid']]['subid'])echo "checked"; ?>/>
                            <?php echo $row_rsSimilarSubjects['sub_abbv']." - ".$row_rsSimilarSubjects['sub_name']." : ".$row_rsSimilarSubjects['class_readablename'];?> 
               			  </label>
                     	</div>
                        
                        
                        
                        
                        
                       <?php } while ($row_rsSimilarSubjects = mysql_fetch_assoc($rsSimilarSubjects)); ?>
                         <span class="checkboxMinSelectionsMsg">Minimum 1 selection</span></span>
                       <?php } 
					   else { ?>
                       <div >
                       <span id="spryclasscheckbox">
                <table width="707" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <th width="176" scope="col"><label>CMPN</label></th>
    <th width="157" scope="col">IT</th>
    <th width="178" scope="col">EXTC</th>
    <th width="170" scope="col">FE</th>
  </tr>
  <tr>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="4"> BE CMPN A</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="8"> BE IT A</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="5"> BE EXTC A</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="28"> FE A</td>
  </tr> 
  <tr>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="7"> BE CMPN B</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="9"> BE IT B</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="6"> BE EXTC B</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="29"> FE B</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="14"> TE CMPN A</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="20"> TE IT A</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="12"> TE EXTC A</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="30"> FE C</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="15"> TE CMPN B</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="21"> TE IT B</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="13"> TE EXTC B</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="31"> FE D</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="24"> SE CMPN A</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="26"> SE IT A</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="22"> SE EXTC A</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="32"> FE E</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="25"> SE CMPN B</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="27"> SE IT B</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="23"> SE EXTC B</td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox" value="33"> FE F</td>
	</tr>
    <tr>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td><input type="checkbox" name="classcheckbox[]" id="classcheckbox"value="34"> FE G</td>
    </tr>
    <tr>
    <td colspan="4">
    <hr>
    </td>
    </tr>
</table>
                
                
                <span class="checkboxMinSelectionsMsg">Minimum 1 selection</span></span>                       </div>
                       
                       <?php } ?> 
                          
                      </div>
                      
                    </div><!-- /.box-body -->
                    
                    <div class="box-footer">
                      <a href="index.php" class="btn btn-primary btn-lg"> BACK </a>
                      <button type="submit" class="btn btn-primary btn-lg"> NEXT </button>
                    </div> 
                  </form>
                </div><!-- /.box -->
              </div> <!-- /.row -->
              <!-- END CUSTOM TABS -->
            </section><!-- /.content -->
          </aside><!-- /.right-side -->
        </div>
    <!-- ./wrapper -->

        <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
    <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
    <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
    <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
    <script type="text/javascript">
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprysubcheckbox", {isRequired:false, minSelections:1});
var sprycheckbox2 = new Spry.Widget.ValidationCheckbox("spryclasscheckbox", {isRequired:false, minSelections:1});
    </script>
    </body>
</html>
<?php
if($_POST['type']=='sub')mysql_free_result($rsSimilarSubjects);
?>
