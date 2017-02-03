<?php require_once('../Connections/greenassign.php'); 

 
 //fetch_class.php  

$insertSQL = sprintf("SELECT * FROM activeclass where class_insti_id = '".$_POST["instituteId"]."' ORDER BY class_readablename");

mysql_select_db($database_greenassign, $greenassign);
$result = mysql_query($insertSQL, $greenassign) or die(mysql_error());
  
 //$connect = mysqli_connect("localhost", "root", "", "dynamic");  
 $output = '<option value="">Select Class</option> ';  
 //$sql = "SELECT * FROM tbl_class where institute_id = '".$_POST["instituteId"]."' ORDER BY class_name";  
 //$result = mysqli_query($connect, $sql);  
while($row = mysql_fetch_assoc($result))  
 {  
      $output .= '<option value="'.$row["class_id"].'">'.$row["class_readablename"].'</option>';  
 }  
 echo $output;  
 ?> 