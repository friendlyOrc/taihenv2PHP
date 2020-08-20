<?php 
    session_start();
	include_once('config/connection.php');
	if(isset($_SESSION['account']) && isset($_SESISON['pass'])){
		include_once('admin.php');
	}else include_once('login.php');
?>