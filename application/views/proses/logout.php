<?php
	include("../config/connect_db.php");
	session_start();	

	$_SESSION['login'] = null;
	header('location: http://localhost/WebGIS/index.php');
exit;
?>