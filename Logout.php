<?php
session_start();
require_once('dbConfig.php');
$_SESSION=[];
session_unset();
session_destroy();
header('location:index.php');
?>