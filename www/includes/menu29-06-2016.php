<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Connections/greenassign.php'); ?>
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
//not used or needed
$class_id_for_rsSubs = "-1";
if(!isset($_SESSION))
{
	session_start();
	}
?>
 <!-- Sidebar user panel -->
        

                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="
                        	<?php	if(isset($_SESSION['gimageurl']))echo $_SESSION['gimageurl'];
									else echo "http://".$_SERVER['HTTP_HOST']."/img/avatar2.png";
							?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php if(isset($_SESSION['GA_name']))echo ucfirst($_SESSION['GA_name']) ;else echo "Guest"; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    
                    
                    
<ul class="sidebar-menu">
                    	 <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bullhorn"></i>
                                <span>News</span>
                                <i class="fa fa-angle-left pull-right"></i>
                           	</a>
                                
                                <?php
                                
							if(isset($_SESSION['GA_usertype'])&&($_SESSION['GA_usertype']=="teacher")&&(isset($_SESSION['GA_ut_id']))){//teacher links
								?>
                            <ul class="treeview-menu">
							<li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/CollegeNews.php"><i class="fa fa-angle-double-right"></i> College News</a></li>
							<li class="treeview active">
                            <a href="#">
                                <span>Class News</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<?php 
							for($i=0;$i<$_SESSION['MM_Subcount'];$i++){ 

?><li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/ClassNews/?classcode=<?php echo $i; ?>">
<i class="fa fa-angle-double-right"></i><?php echo $_SESSION['MM_Subids'][$i]['subabbv']." ".$_SESSION['MM_Subids'][$i]['subclass']; ?></a></li>
                          <?php    }
							
							?>
                            <li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/pages/SelectClass.php?page=ClassNews"><i class="fa fa-angle-double-right"></i>Other Class News</a></li>
                            </ul>
                        </li>
                     
                        
                                
                                
                                
                                
							<?php }else{
								
                                ?>
                                
                          
                            <ul class="treeview-menu">
		<li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/CollegeNews.php"><i class="fa fa-angle-double-right"></i> College News</a></li>
        <li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/ClassNews/"><i class="fa fa-angle-double-right"></i> Class News</a></li>
                            
                            <?php }?>
                            </ul>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clipboard"></i>
                                <span>Assignments</span>
                                
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
							
							
							<?php
							
							
							//check if teacher
							//if teacher: query all subids from sub table 
							//point to editable version of assignedit.php
							//else check for class in get/session/cookie
							//query subs of class
							//else provide link to selectclass.php?base.php
							$class=-1;
							if(isset($_SESSION['GA_usertype'])&&($_SESSION['GA_usertype']=="teacher")&&(isset($_SESSION['GA_ut_id']))){//teacher links
							
							
							
//temp fix..later will change to VIEW ONLY page and create an edit link-button there 

for($i=0;$i<$_SESSION['MM_Subcount'];$i++){ 

?><li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/Assignments/assignsedit.php?subid=<?php echo $i; ?>">
<i class="fa fa-angle-double-right"></i><?php echo $_SESSION['MM_Subids'][$i]['subabbv']." ".$_SESSION['MM_Subids'][$i]['subclass']; ?></a></li>
                          <?php    } ?>
						  <li>
                            <a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/Calendar/">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                            </a>
                        </li>
							<?php
							
							}
							else{//check for class
								if(isset($_SESSION['class_id'])){	$class_id_for_rsSubs=$_SESSION['class_id'];}
							else {if(isset($_COOKIE['class_id'])){	
							//if cookie clas_id is set then all other cookies are set(acc to SelectClass.php)
							$class_id_for_rsSubs=$_COOKIE['class_id'];$_SESSION['class']=$_COOKIE['class_id'];
							$_SESSION['class_readablename']=$_COOKIE['class_readablename'];
							$_SESSION['class_compactname']=$_COOKIE['class_compactname'];
							$_SESSION['GA_insti_id']=$_COOKIE['GA_insti_id'];
							$_SESSION['GA_institute']=$_COOKIE['GA_institute'];
							$_SESSION['GA_insti_fullname']=$_COOKIE['GA_insti_fullname'];
							
							}}
							if($class_id_for_rsSubs!=-1){
								
								
								
								
							mysql_select_db($database_greenassign, $greenassign);
$query_rsSubs = sprintf("SELECT sub_id, sub_abbv, sub_class_id  FROM sub WHERE sub_class_id = %s ORDER BY sub_id ASC", GetSQLValueString($class_id_for_rsSubs, "text"));
$rsSubs = mysql_query($query_rsSubs, $greenassign) or die(mysql_error());
$row_rsSubs = mysql_fetch_assoc($rsSubs);
$totalRows_rsSubs = mysql_num_rows($rsSubs);

do { ?>


<li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/Assignments/?subid=<?php echo $row_rsSubs["sub_id"];?>"><i class="fa fa-angle-double-right"></i><?php echo $row_rsSubs["sub_abbv"];?></a></li>
                               
                         <?php     } while ($row_rsSubs = mysql_fetch_assoc($rsSubs));?>
						 <li>
                            <a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/Calendar/">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                            </a>
                        </li>
						<?php	}else{
								?><li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/pages/SelectClass.php?page=CollegeNews"><i class="fa fa-angle-double-right"></i><?php echo "Select Class";?></a></li><?php
								}
							}
   							   ?>
							
							
							
							
							
							
							
							
                            </ul>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Resources<?php if(isset($_SESSION['class_readablename']))echo " (".$_SESSION['class_readablename'].")"; ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a target="_blank" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/pages/TT.php"><i class="fa fa-angle-double-right"></i> TimeTable</a></li>
                                <li><a target="_blank" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/pages/Syllabus.php"><i class="fa fa-angle-double-right"></i> Syllabus</a></li>
                                <li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/PPTs/"><i class="fa fa-angle-double-right"></i> Lecture PPTs</a></li>
                                <li><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/Books/"><i class="fa fa-angle-double-right"></i> E Books</a></li>
<!--<li><a href=""><i class="fa fa-angle-double-right"></i> <i class="fa fa-video-camera"></i> Video Tutorials</a></li> -->
      <li><a href=""><i class="fa fa-angle-double-right"></i> Question Papers</a></li>
      <li><a href="   <?php echo "http://".$_SERVER['HTTP_HOST']; ?>/ClassMembers/"><i class="fa fa-angle-double-right"></i> Class Members</a></li>
   
                                <!-- <li><a href=""><i class="fa fa-angle-double-right"></i> Paper Solutions</a></li> -->
                            </ul>
                        </li>
                  <?php /*       <li>
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
							<a href="<?php echo $_SERVER['HTTP_HOST']; ?>/pages/Login.php">
                                <i class=""></i> <span>Login</span>
                            </a>
                       </li>
					 */?>	
                     	<li>
							<a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/pages/SelectClass.php">
                                <i class=""></i> <span><?php if(isset($_SESSION['class_id'])){echo "Change Selected Class";}else {echo "Select Class";} ?></span>
                            </a>
                        </li>
</ul>


