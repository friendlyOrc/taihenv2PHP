<?php
    include_once('config/connection.php');
    include_once('tool.php');
    $id = $_GET['id'];

    $ar = mysqli_fetch_array(mysqli_query($connect, "select * from article where ar_ID = $id"));
    delete_files('images/article/'.$ar['ar_pic']);   
    delete_files('images/chapter/'.$ar['ar_ID']);  

    mysqli_query($connect, "delete from chapter where ar_ID = $id");
    mysqli_query($connect, "delete from ar_cat where ar_ID = $id");
    mysqli_query($connect, "delete from count_view where ar_ID = $id");
    mysqli_query($connect, "delete from article where ar_ID = $id");

 
	header('location: admin.php?page=articles');
?>