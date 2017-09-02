<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ddsa = "localhost";
$database_ddsa = "nalyst";
$username_ddsa = "nalyst";
$password_ddsa = "JusteenBieber";
$ddsa = mysql_pconnect($hostname_ddsa, $username_ddsa, $password_ddsa) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query('Set Names UTF8');
?>