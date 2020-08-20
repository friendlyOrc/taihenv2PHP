<?php
	$connect = mysqli_connect('localhost', 'root', '', 'taihen');
	if($connect) mysqli_query($connect, "set names 'utf8'");
	else echo "DB ERROR";
?>