<?php
    include_once('get_data.php');
    $kw = "";
    if(isset($_POST['search'])){
        $kw = $_POST['search'];
    }
    if(!isset($connect)){
        include_once('admin/config/connection.php');
    }
    if(!isset($_DATA['all'])){
        $_DATA['all'] = Array();
        $raw = mysqli_query($connect, "SELECT * FROM article WHERE ar_name LIKE '%".$kw."%';");
        while($row = mysqli_fetch_array($raw)){
            $_DATA['all'][] = $row;
        }
    }
    
    $numRows = count($_DATA['all']);
    $page = 0;
    if(isset($_GET['page'])){
        $page = (int)$_GET['page'];
    }
    $numPerPage = 5;
    $last = ceil($numRows/$numPerPage);
    $start = $page * $numPerPage;
    
    $_DATA['rs'] = Array();
    for($i = $start, $j = 0; $j < $numPerPage && $i < count($_DATA['all']); $i++, $j++){
        $_DATA['rs'][$j] = $_DATA['all'][$i];
    }

    $current = $page;
    $lastPage = $last;
    $pre =  $page - 1;
    if($page <= 0){
        $pre = 0;
    }
    $next = $page + 1;
    if($next >= $last) $next = $last - 1;
    $lastItem = $page + 4;
    if (($page + 4 ) >= $last){
        $lastItem = $last;
    }
    
    foreach($_DATA['rs'] as $ar){
        $raw1 = mysqli_query($connect, 'SELECT * FROM ar_cat INNER JOIN category ON category.cat_ID = ar_cat.cat_ID WHERE ar_cat.ar_ID = '.$ar['ar_ID']);
        $_DATA['rs_cate'][$ar['ar_ID']] = mysqli_fetch_array($raw1);
        $_DATA['rs_chapters'][$ar['ar_ID']] = mysqli_fetch_array(mysqli_query($connect, 'SELECT * from chapter WHERE chapter.ar_ID = '.$ar['ar_ID'].' ORDER BY chapter.chap_ID DESC'));
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Kết quả tìm kiếm: <?php echo $kw;?></title>
        <?php include_once('head.php');?>
    </head>
    <body>
        <!-- NAV  -->
        <?php include_once('navigation.php');?>
        
        <!-- ARTICLE LIST  -->
        <div class="container-fluid arlist__main">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="arlist">
                            <h2 class="arlist__title">Kết quả tìm kiếm: <?php echo $kw;?></h2>
                            <?php for($i = 0; $i < 5; $i++){?>
                                <div class="arlist__row">
                                    <?php 
                                    $limit = count($_DATA['rs']);
                                    if($limit > 5*$i + 5){
                                        $limit = 5*$i + 5;
                                    }
                                    for($j = 5*$i; $j < $limit; $j++){?>
                                        <a href="article.php?<?php echo $_DATA['rs'][$j]['ar_ID'];?>" class="arlist__row__item">
                                            <div class="arlist__row__item__img">
                                                <img src="public/images/article/<?php echo $_DATA['rs'][$j]['ar_pic'];?>" alt="" >
                                            </div>
                                            
                                            <div class="arlist__row__item__inf">
                                                <h3 class="arlist__row__item__inf__title">
                                                <?php 
                                                  if(strlen($_DATA['rs'][$j]['ar_name']) > 25){
                                                      echo substr($_DATA['rs'][$j]['ar_name'], 0, 25);?>...
                                                <?php
                                                    }else{
                                                      echo $_DATA['rs'][$j]['ar_name'];     
                                                    }
                                                  ?>  
                                                </h3>
                                                <h3 class="arlist__row__item__inf__chap badge badge-pill badge-success"><?php echo $_DATA['rs_chapters'][$_DATA['rs'][$j]['ar_ID']]['chap_name']; ?></h3>
                                                <!-- <p class="arlist__row__item__inf__time">2020</p> -->
                                            </div>
                                        </a>
                                    <?php }?>
                                </div>
                            <?php }?>

                            
                            <div class="pagination">
                                <a href="search.php?page=0"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>  First</a>
                                <a href="search.php?page=<?php echo $pre?>"><i class="fas fa-chevron-left"></i>  Prev</a>
        
                                <?php 
                                for($i = ($current - 3 > 0)? $current - 3: 0; $i < $lastItem; $i++) {?>
                                    <?php if($current === $i){?>
                                        <a href="search.php?page=<?php echo $i?>" class="pagination--active"><?php echo $i + 1?></a>
                                    <?php } else {?>
                                        <a href="search.php?page=<?php echo $i?>"><?php echo $i + 1?></a>
                                    <?php }?>
                                <?php }?>
        
                                <a href="search.php?page=<?php echo $next?>">Next  <i class="fas fa-chevron-right"></i></a>
                                <a href="search.php?page=<?php echo $lastPage - 1?>">Last  <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>



                        <div class="arlist__mobile">
                            <h2 class="arlist__mobile__title">Kết quả tìm kiếm: <%= search%></h2>
                            <% for(let i = 0; i < 5; i++){%>
                                <div class="arlist__mobile__row">
                                    <% for(let j = 5*i; j < ((articles.length > (5*i + 5))? 5*i + 5 : articles.length); j++){%>
                                        <a href="/article/<%= articles[j].ar_ID%>" class="arlist__mobile__row__item">
                                            <div class="arlist__mobile__row__item__img">
                                                <img src="/images/article/<%= articles[j].ar_pic%>" alt="" >
                                            </div>
                                            
                                            <div class="arlist__mobile__row__item__inf">
                                                <h3 class="arlist__mobile__row__item__inf__title">
                                                    <% if(articles[j].ar_name.length > 25){%>
                                                        <%= articles[j].ar_name.substring(0, 25)%>...
                                                    <%}else{%>
                                                        <%= articles[j].ar_name%>      
                                                    <%}%>  
                                                </h3>
                                                <h3 class="arlist__mobile__row__item__inf__chap badge badge-pill badge-success"><%= chapters[j][0].chap_name%>  </h3>
                                                <!-- <p class="arlist__mobile__row__item__inf__time">2020</p> -->
                                            </div>
                                        </a>
                                    <%}%>
                                </div>
                            <%}%>

                            
                            <div class="pagination">
                                <a href="/search/<%= search%>?page=0"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>  First</a>
                                <a href="/search/<%= search%>?page=<%= pagination.previous%>"><i class="fas fa-chevron-left"></i>  Prev</a>
        
                                <% for(let i = (pagination.current - 3 > 0)?pagination.current - 3: 0; i < pagination.lastItem; i++) {%>
                                    <%if(pagination.current === i){%>
                                        <a href="/search/<%= search%>?page=<%= i%>" class="pagination--active"><%= i + 1%></a>
                                    <%} else {%>
                                        <a href="/search/<%= search%>?page=<%= i%>"><%= i + 1%></a>
                                    <%}%>
                                <%}%>
        
                                <a href="/search/<%= search%>?page=<%= pagination.next%>">Next  <i class="fas fa-chevron-right"></i></a>
                                <a href="/search/<%= search%>?page=<%= pagination.lastPage - 1%>">Last  <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER  -->
            <?php include_once('footer.php');?>
        </div>


        
        
        <?php include_once('main_js.php');?>
    </body>
</html>