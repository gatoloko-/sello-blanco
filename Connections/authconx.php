<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_authconx = "localhost";
$database_authconx = "sello-blanco";
$username_authconx = "root";
$password_authconx = "";
$authconx = mysql_pconnect($hostname_authconx, $username_authconx, $password_authconx) or trigger_error(mysql_error(),E_USER_ERROR); 
?>