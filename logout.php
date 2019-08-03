<?php 
include_once 'resource/session.php';
session_start();
session_destroy();
header('location: index.php')
?>
