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
                            </a>
                            <ul class="treeview-menu">
							<li><a href=""><i class="fa fa-angle-double-right"></i> College News</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Class Related</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Resources</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a target="_blank" href="http://ryan2.waltado.com/pages/TT.php"><i class="fa fa-angle-double-right"></i> TimeTable</a></li>
                                <li><a target="_blank" href="http://ryan2.waltado.com/pages/Syllabus.php"><i class="fa fa-angle-double-right"></i> Syllabus</a></li>
                                <li><a href="http://ryan2.waltado.com/pages/resources/LecturePPTs.php"><i class="fa fa-angle-double-right"></i> Lecture PPTs</a></li>
                                <li><a href="http://ryan2.waltado.com/pages/resources/eBooks.php"><i class="fa fa-angle-double-right"></i> E Books</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> <i class="fa fa-video-camera"></i> Video Tutorials</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Question Papers</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Paper Solutions</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clipboard"></i>
                                <span>Assignments</span>
                                
                                <i class="fa fa-angle-left pull-right"></i>
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
							
							
							
					

for($i=0;$i<$_SESSION['MM_Subcount'];$i++) { echo   '<li><a href="http://ryan2.waltado.com/pages/assignsedit.php?subid='.$i.'"><i class="fa fa-angle-double-right"></i>'.$_SESSION['MM_Subids'][$i]['subabbv'].' '.$_SESSION['MM_Subids'][$i]['subclass'].'</a></li>';
                              } 
							
							
							
							
							
							
							
							
							
							
							}
							else{//check for class
								if(isset($_GET['class'])){		$colname_rsSubs=$_GET['class'];	$_SESSION['class']=$_GET['class'];}
							elseif(isset($_SESSION['class'])){	$colname_rsSubs=$_SESSION['class'];}
							else {if(isset($_COOKIE['class'])){	$colname_rsSubs=$_COOKIE['class'];$_SESSION['class']=$_COOKIE['class'];}}
							if($colname_rsSubs!=-1){
								
								
								
								
							mysql_select_db($database_greenassign, $greenassign);
$query_rsSubs = sprintf("SELECT sub_id, sub_abbv, sub_class FROM sub WHERE sub_class = %s ORDER BY sub_id ASC", GetSQLValueString($colname_rsSubs, "text"));
$rsSubs = mysql_query($query_rsSubs, $greenassign) or die(mysql_error());
$row_rsSubs = mysql_fetch_assoc($rsSubs);
$totalRows_rsSubs = mysql_num_rows($rsSubs);


do { echo   '<li><a href="http://ryan2.waltado.com/pages/assigns.php?subid='.$row_rsSubs["sub_id"].'"><i class="fa fa-angle-double-right"></i>'.$row_rsSubs["sub_abbv"].'</a></li>';
                               
                              } while ($row_rsSubs = mysql_fetch_assoc($rsSubs));
							}else{
								echo '<li><a href="http://ryan2.waltado.com/pages/SelectClass.php?page=base.php"><i class="fa fa-angle-double-right"></i>Select Class</a></li>';
								}
							}
      
							
							
							
							
							
							
							
							
							
							echo '</ul>
                        </li>
                         <li>
                            <a href="">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                            </a>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-smile-o"></i>
                                <span>tp</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href=""><i class="fa fa-picture-o"></i> <span>Galery</span></a></li>
                                <li><a href=""><i class="fa fa-comments"></i> <span>Chats</span></a></li>
                                <li><a href=""><i class="fa fa-heart"></i> <span>Confessions</span></a></li>
                            </ul>
                        </li>
						<li>
							<a href="http://ryan2.waltado.com/pages/Login.php">
                                <i class=""></i> <span>Login</span>
                            </a>
                        </li>
						<li>
							<a href="http://ryan2.waltado.com/pages/logout.php">
                                <i class=""></i> <span>Logout</span>
                            </a>
                        </li>
						<li>
							<a href="http://ryan2.waltado.com/pages/SelectClass.php?page=base.php">
                                <i class=""></i> <span>Select Class</span>
                            </a>
                        </li>';

//
?>
