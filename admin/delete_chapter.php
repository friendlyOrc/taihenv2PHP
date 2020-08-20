<?php
    include_once('config/connection.php');
    include_once('tool.php');
    $ar_ID = $_GET['id'];
    $chap_ID = $_GET['chap'];

    $cur_ar = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM article WHERE ar_ID = $ar_ID"));

    $chap_num = $cur_ar['ar_chap_num'] - 1;

    if(!mysqli_query($connect, "UPDATE article SET ar_chap_num = $chap_num WHERE ar_ID = $ar_ID")){
        die('Fail to update chap num');
    }

    delete_files('images/chapter/'.$ar_ID.'/'.$chap_ID);  

    mysqli_query($connect, "delete from chapter where ar_ID = $ar_ID and chap_ID = $chap_ID");

 
	header('location: admin.php?page=chapter&id='.$ar_ID);
?>