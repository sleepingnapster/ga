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
$hostname_GreenAssign3 = "greenassign0.ck0a0mw9m6jc.ap-southeast-1.rds.amazonaws.com";
$database_GreenAssign3 = "greenass_gadb";
$username_GreenAssign3 = "greenass_ryan1";
$password_GreenAssign3 = "Stre@m09";
$GreenAssign3 = mysql_pconnect($hostname_GreenAssign3, $username_GreenAssign3, $password_GreenAssign3) or trigger_error(mysql_error(),E_USER_ERROR); 

echo $GreenAssign3;
?>