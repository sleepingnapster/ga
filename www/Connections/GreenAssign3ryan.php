<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_GreenAssign3 = "localhost";
$database_GreenAssign3 = "greenassign";
$username_GreenAssign3 = "root";
$password_GreenAssign3 = "";
$GreenAssign3 = mysql_pconnect($hostname_GreenAssign3, $username_GreenAssign3, $password_GreenAssign3) or trigger_error(mysql_error(),E_USER_ERROR); 
?>