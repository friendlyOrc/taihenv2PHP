<?php
	include_once('config/connection.php');
	$id = $_GET['id'];
	$sql = "delete from account where accID = '$id'";
	$ex = mysqli_query($connect, $sql);
	header('location: admin.php?page=user');
?>