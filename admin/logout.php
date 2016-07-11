<?php
session_start()	;
error_reporting(1);

session_destroy();
header('location: login.php');
?>
