<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
/*
$hostname_GreenAssign3 = "localhost";
$database_GreenAssign3 = "greenassign";
$username_GreenAssign3 = "root";
$password_GreenAssign3 = "";
*/
//$hostname_GreenAssign3 = "rdsgainsta0.ck0a0mw9m6jc.ap-southeast-1.rds.amazonaws.com:3306";
//$hostname_GreenAssign3 = "rdsgainsta1.crlehbkoagz2.ap-south-1.rds.amazonaws.com:3306";
if($_SERVER['SERVER_NAME']=='localhost'){$hostname_GreenAssign3 = "localhost";}
else {$hostname_GreenAssign3 = "rdsgainsta1.crlehbkoagz2.ap-south-1.rds.amazonaws.com:3306";}
$database_GreenAssign3 = "greenass_gadb";
$username_GreenAssign3 = "admin0";
$password_GreenAssign3 = "Stream09r";
$GreenAssign3 = mysql_pconnect($hostname_GreenAssign3, $username_GreenAssign3, $password_GreenAssign3) or trigger_error(mysql_error(),E_USER_ERROR); 
?>