<?php
	include_once('config/connection.php');
	include_once('tool.php');
	$id = $_GET['id'];
	$sql = "delete from pic where pic_ID = '$id'";
	$ex = mysqli_query($connect, $sql);
	delete_files('images/pic/'.$id.'.jpg');

	header('location: admin.php?page=random_pic');
?>