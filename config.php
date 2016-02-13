<?php
$db_host = 'localhost';
$db_username = 'hostel';
$db_password = 'password';
$db_name = 'hostel';
mysql_connect($db_host, $db_username, $db_password) or die(mysql_error());
mysql_select_db($db_name);
 ?>
