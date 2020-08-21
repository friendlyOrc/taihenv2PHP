<?php
    if(!isset($connect)){
        include_once('admin/config/connection.php');
    }
    $_DATA['articles'] = mysqli_query($connect, 'SELECT * FROM article ORDER BY article.ar_ID DESC');
    while($row = mysqli_fetch_array($_DATA['articles'])){
        $_DATA['cate'][$row['ar_ID']] = mysqli_query($connect, 'SELECT * FROM ar_cat INNER JOIN category ON category.cat_ID = ar_cat.cat_ID WHERE ar_cat.ar_ID = '.$row['ar_ID']);
        $_DATA['chapters'][$row['ar_ID']] = mysqli_query($connect, 'SELECT * from chapter WHERE chapter.ar_ID = '.$row['ar_ID'].' ORDER BY chapter.chap_ID DESC');
    }
    $_DATA['articles'] = mysqli_query($connect, 'SELECT * FROM article ORDER BY article.ar_ID DESC');
    
    $_DATA['category'] = mysqli_query($connect, "SELECT * FROM category");
    $_DATA['user'] = mysqli_query($connect, "SELECT * FROM account");
    $_DATA['view'] = mysqli_query($connect, "SELECT * FROM count_view");
    $_DATA['random_pic'] = mysqli_query($connect, "SELECT * FROM pic");
    $_DATA['comment'] = mysqli_query($connect, 'SELECT * FROM comment INNER JOIN article ON comment.ar_ID = article.ar_ID');

    // sess.articles = await query('SELECT * FROM article ORDER BY article.ar_ID DESC');
    // sess.cate = [];
    // sess.chapters = [];
    // for(let i = 0; i < sess.articles.length; i++){
    //   let query2 = "SELECT * FROM ar_cat INNER JOIN category ON category.cat_ID = ar_cat.cat_ID WHERE ar_cat.ar_ID = ? ";
    //   sess.cate[i] = await query(query2, sess.articles[i].ar_ID);
    //   let query3 = "SELECT * from chapter WHERE chapter.ar_ID = ? ORDER BY chapter.chap_ID DESC";
    //   sess.chapters[i] = await query(query3, sess.articles[i].ar_ID) || [];
    // }
    // sess.category = await query("SELECT * FROM category");
    // sess.account = await query("SELECT * FROM account");
    // sess.view = await query("SELECT * FROM count_view");


    // $ar_data = mysqli_query($connect, 'SELECT * FROM article ORDER BY article.ar_ID DESC');
    // $i = 0;
    // while($row = mysqli_fetch_array($ar_data)){
    //     $_SESSION['articles'][$i] = $row;
    //     $i++;
    // }
    // $cate_data = mysqli_query($connect, 'SELECT * FROM category');
    // $i = 0;
    // while($row = mysqli_fetch_array($cate_data)){
    //     $_SESSION['category'][$i] = $row;
    //     $i++;
    // }
    // $acc_data = mysqli_query($connect,"SELECT * FROM account");
    // $i = 0;
    // while($row = mysqli_fetch_array($acc_data)){
    //     $_SESSION['account'][$i] = $row;
    //     $i++;
    // }
    // $view_data = mysqli_query($connect, "SELECT * FROM count_view");
    // $i = 0;
    // while($row = mysqli_fetch_array($view_data)){
    //     $_SESSION['view'][$i] = $row;
    //     $i++;
    // }
    // $_data = mysqli_query($connect,);
    // $i = 0;
    // while($row = mysqli_fetch_array($_data)){
    //     $_SESSION[''][$i] = $row;
    //     $i++;
    // }
?>