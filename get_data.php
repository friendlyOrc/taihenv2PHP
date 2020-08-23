<?php
    if(!isset($connect)){
        include_once('admin/config/connection.php');
    }
    $_DATA['articles'] = Array();
    $raw = mysqli_query($connect, 'SELECT * FROM article ORDER BY article.ar_ID DESC');
    while($row = mysqli_fetch_array($raw)){
        $_DATA['articles'][] = $row;
    }

    foreach($_DATA['articles'] as $ar){
        $raw1 = mysqli_query($connect, 'SELECT * FROM ar_cat INNER JOIN category ON category.cat_ID = ar_cat.cat_ID WHERE ar_cat.ar_ID = '.$ar['ar_ID']);
        $_DATA['cate'][$ar['ar_ID']] = mysqli_fetch_array($raw1);
        $_DATA['chapters'][$ar['ar_ID']] = mysqli_query($connect, 'SELECT * from chapter WHERE chapter.ar_ID = '.$ar['ar_ID'].' ORDER BY chapter.chap_ID DESC');
    }
    
    $_DATA['category'] = Array();
    $raw = mysqli_query($connect, "SELECT * FROM category");
    while($row = mysqli_fetch_array($raw)){
        $_DATA['category'][] = $row;
    }
    $_DATA['user'] = Array();
    $raw = mysqli_query($connect, "SELECT * FROM account");
    while($row = mysqli_fetch_array($raw)){
        $_DATA['user'][] = $row;
    }
    $_DATA['view'] = Array();
    $raw = mysqli_query($connect, "SELECT * FROM count_view");
    while($row = mysqli_fetch_array($raw)){
        $_DATA['view'][] = $row;
    }
    $_DATA['random_pic'] = Array();
    $raw = mysqli_query($connect, "SELECT * FROM pic");
    while($row = mysqli_fetch_array($raw)){
        $_DATA['random_pic'][] = $row;
    }
    // $_DATA['comment'] = Array();
    // $raw = mysqli_query($connect, 'SELECT * FROM comment INNER JOIN article ON comment.ar_ID = article.ar_ID');
    // while($row = mysqli_fetch_array($raw)){
    //     $_DATA['comment'][] = $row;
    // }
    $_DATA['hot_articles'] = Array();
    $raw = mysqli_query($connect, 'SELECT * FROM article ORDER BY article.ar_view DESC LIMIT 6');
    while($row = mysqli_fetch_array($raw)){
        $_DATA['hot_articles'][] = $row;
    }
    $_DATA['hot_chapter'] = Array();
    foreach($_DATA['hot_articles'] as $ar){
        $query3 = "SELECT * from chapter WHERE chapter.ar_ID = ".$ar['ar_ID']." ORDER BY chapter.chap_ID DESC LIMIT 1";
        $_DATA['hot_chapter'][] =  mysqli_fetch_array(mysqli_query($connect, $query3));
    }

    $_DATA['top_articles'] = Array();
    $raw = mysqli_query($connect, "SELECT count_view.ar_ID, article.ar_name, article.ar_date, article.ar_pic, COUNT(count_view.ar_ID) as num FROM count_view INNER JOIN article ON count_view.ar_ID = article.ar_ID GROUP BY count_view.ar_ID ORDER BY num DESC LIMIT 12;");
    while($row = mysqli_fetch_array($raw)){
        $_DATA['top_articles'][] = $row;
    }
    $_DATA['top_chapter'] = Array();
    foreach($_DATA['top_articles'] as $ar){
        $query3 = "SELECT * from chapter WHERE chapter.ar_ID = ".$ar['ar_ID']." ORDER BY chapter.chap_ID DESC LIMIT 1";
        $_DATA['top_chapter'][] =  mysqli_fetch_array(mysqli_query($connect, $query3));
    }

?>