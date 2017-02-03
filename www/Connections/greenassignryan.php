<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_greenassign = "localhost";
$database_greenassign = "greenassign";
$username_greenassign = "root";
$password_greenassign = "";
$greenassign = mysql_pconnect($hostname_greenassign, $username_greenassign, $password_greenassign) or trigger_error(mysql_error(),E_USER_ERROR); 
?>