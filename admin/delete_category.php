<?php
	include_once('config/connection.php');
	$id = $_GET['id'];
	$sql = "delete from category where cat_ID = '$id'";
	$ex = mysqli_query($connect, $sql);
	header('location: admin.php?page=category');
?>