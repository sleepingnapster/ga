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
      $theValue = ($theValue != "") ? $theDefinedValue :  $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_rsSubs = "-1";
if (isset($_GET['class'])) {
  $colname_rsSubs = $_GET['class'];
}

 echo'
<ul class="sidebar-menu">
                    	 <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clipboard"></i>
                                <span>News</span>
                                
                                <i class="fa fa-angle-left pull-right"></i>
                                <small class="badge pull-right bg-orange">3</small>
                            </a>
                            <ul class="treeview-menu">
							<li><a href="UI/general.html"><i class="fa fa-angle-double-right"></i> College News</a></li>
                                <li><a href="UI/general.html"><i class="fa fa-angle-double-right"></i> Class Related</a></li>
                            </ul>
                        </li>
						<li>
                            <a href="../index.html">
                                <i class="fa fa-video-camera"></i> <span>Video Tutorials</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Resources</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a target="new" href="../pages/TT.php"><i class="fa fa-angle-double-right"></i> TimeTable</a></li>
                                <li><a target="new" href="../pages/Syllabus.php"><i class="fa fa-angle-double-right"></i> Syllabus</a></li>
                                <li><a href="UI/buttons.html"><i class="fa fa-angle-double-right"></i> Lecture PPTs</a></li>
                                <li><a href="UI/sliders.html"><i class="fa fa-angle-double-right"></i> E Books</a></li>
                                <li><a href="UI/timeline.html"><i class="fa fa-angle-double-right"></i> <i class="fa fa-video-camera"></i> Video Tutorials</a></li>
                                <li><a href="UI/timeline.html"><i class="fa fa-angle-double-right"></i> Question Papers</a></li>
                                <li><a href="UI/timeline.html"><i class="fa fa-angle-double-right"></i> Paper Solutions</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clipboard"></i>
                                <span>Assignments</span>
                                
                                <i class="fa fa-angle-left pull-right"></i>
                                <small class="badge pull-right bg-lime">3</small>
                            </a>
                            <ul class="treeview-menu">';
							
							//check if teacher
							//if teacher: query all subids from sub table 
							//point to editable version of assignedit.php
							//else check for class in get/session/cookie
							//query subs of class
							//else provide link to selectclass.php?base.php
							$class=-1;
							if(!isset($_SESSION))
							{
								session_start();
								}
							if(isset($_SESSION['MM_Username'])){//teacher links
							
							
							
							mysql_select_db($database_greenassign, $greenassign);
							$colname_rsTeacher = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsTeacher = $_SESSION['MM_Username'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_rsTeacher = sprintf("SELECT t_id, t_title, t_fname, t_lname, t_verified FROM teacher WHERE t_email = %s", GetSQLValueString($colname_rsTeacher, "text"));
$rsTeacher = mysql_query($query_rsTeacher, $greenassign) or die(mysql_error());
$row_rsTeacher = mysql_fetch_assoc($rsTeacher);
$totalRows_rsTeacher = mysql_num_rows($rsTeacher);
							
$query_rsSubs = sprintf("SELECT sub_id, sub_abbv, sub_class FROM sub WHERE sub_by_tid = %s ORDER BY sub_id ASC", GetSQLValueString($row_rsTeacher['t_id'], "text"));
$rsSubs = mysql_query($query_rsSubs, $greenassign) or die(mysql_error());
$row_rsSubs = mysql_fetch_assoc($rsSubs);
$totalRows_rsSubs = mysql_num_rows($rsSubs);
do { echo   '<li><a href="../pages/assignsedit.php?subid='.$row_rsSubs["sub_id"].'"><i class="fa fa-angle-double-right"></i>'.$row_rsSubs["sub_abbv"].' '.$row_rsSubs["sub_class"].'</a></li>';
                              } while ($row_rsSubs = mysql_fetch_assoc($rsSubs));
							}
							else{
								if(isset($_GET['class'])){		$colname_rsSubs=$_GET['class'];	}
							elseif(isset($_SESSION['class'])){	$colname_rsSubs=$_SESSION['class'];}
							elseif(isset($_COOKIE['class'])){	$colname_rsSubs=$_SESSION['class'];}
							if($colname_rsSubs!=-1){
							mysql_select_db($database_greenassign, $greenassign);
$query_rsSubs = sprintf("SELECT sub_id, sub_abbv, sub_class FROM sub WHERE sub_class = %s ORDER BY sub_id ASC", GetSQLValueString($colname_rsSubs, "text"));
$rsSubs = mysql_query($query_rsSubs, $greenassign) or die(mysql_error());
$row_rsSubs = mysql_fetch_assoc($rsSubs);
$totalRows_rsSubs = mysql_num_rows($rsSubs);


do { echo   '<li><a href="../pages/assigns.php?subid='.$row_rsSubs["sub_id"].'"><i class="fa fa-angle-double-right"></i>'.$row_rsSubs["sub_abbv"].'</a></li>';
                               
                              } while ($row_rsSubs = mysql_fetch_assoc($rsSubs));
							
							}else{
								header("Location: SelectClass.php?page=base.php");
								exit;
								}
							}
      
							
							
							
							
							
							
							
							
							
							echo '</ul>
                        </li>
                         <li>
                            <a href="calendar.html">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                                <small class="badge pull-right bg-blue">3</small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Dates</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="UI/general.html"><i class="fa fa-angle-double-right"></i>Assignments</a></li>
                                <li><a href="UI/icons.html"><i class="fa fa-angle-double-right"></i> Class Tests</a></li>
                                <li><a href="UI/buttons.html"><i class="fa fa-angle-double-right"></i> Exam Dates</a></li>
                                <li><a href="UI/sliders.html"><i class="fa fa-angle-double-right"></i> Events</a></li>
                                
                                <li><a href="UI/timeline.html"><i class="fa fa-angle-double-right"></i> Holidays</a></li>
                                <li><a href="UI/timeline.html"><i class="fa fa-angle-double-right"></i> Others</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../index.html">
                                <i class="fa fa-picture-o"></i> <span>Galery</span>
                            </a>
                        </li>
						<li>
                            <a href="calendar.html">
                                <i class="fa fa-envelope"></i> <span>Messages</span>
                                <small class="badge pull-right bg-yellow">3</small>
                            </a>
                        </li>
						<li>
							<a href="../pages/logout.php">
                                <i class=""></i> <span>Logout</span>
                            </a>
                        </li>
						<li>
							<a target="_blank" href="../pages/SelectClass.php">
                                <i class=""></i> <span>Select Class</span>
                            </a>
                        </li><li>
							<a target="_blank" href="../pages/Login.php">
                                <i class=""></i> <span>Login</span>
                            </a>
                        </li>';

//mysql_free_result($rsTeacher);
?>
