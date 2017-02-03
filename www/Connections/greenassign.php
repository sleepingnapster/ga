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
//$hostname_greenassign = "rdsgainsta0.ck0a0mw9m6jc.ap-southeast-1.rds.amazonaws.com:3306";
if($_SERVER['SERVER_NAME']=='localhost'){$hostname_greenassign = "localhost";}
else {$hostname_greenassign = "rdsgainsta1.crlehbkoagz2.ap-south-1.rds.amazonaws.com:3306";}
$database_greenassign = "greenass_gadb";
$username_greenassign = "admin0";
$password_greenassign = "Stream09r";
$greenassign = mysql_pconnect($hostname_greenassign, $username_greenassign, $password_greenassign) or trigger_error(mysql_error(),E_USER_ERROR);
?>