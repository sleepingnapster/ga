<?php require_once('../Connections/greenassign.php'); 
//fetch_class.php
$selectSQL = sprintf("SELECT * FROM activebatch where batch_class_id = '".$_POST["classId"]."' ORDER BY batch_number");
mysql_select_db($database_greenassign, $greenassign);
$result = mysql_query($selectSQL, $greenassign) or die(mysql_error());
 //$connect = mysqli_connect("localhost", "root", "", "dynamic");  
 $output = '';  
 //$sql = "SELECT * FROM tbl_class where institute_id = '".$_POST["instituteId"]."' ORDER BY class_name";  
 //$result = mysqli_query($connect, $sql);    
 while($row = mysql_fetch_assoc($result))  
 {  
      $output .= '<option value="'.$row["batch_id"].'">'.$row["batch_number"].'</option>';  
 }  
 echo $output;  
?> 