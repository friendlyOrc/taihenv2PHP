<!DOCTYPE html>
<html>
    <head>
      <title>Taihen</title>
      <?php 
        include_once('head.php')
      ?>
    </head>
    <body>
        <?php
          if(!isset($_DATA['articles'])){
            include_once('get_data.php');
          }
        ?>
    
        <!-- NAV  -->
        
        <div class="social__left">
            <ul class="social__left__iconlist">
                <li class="social__left__icon"><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li class="social__left__icon"><a href=""><i class="fab fa-instagram"></i></a></li>
                <li class="social__left__icon"><a href=""><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
        <div class="social__right">
        </div>

        <?php include_once('navigation.php')?>
        
        
        <div class="downbtn">
          <div class="downbtn__inner block--active">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="downbtn2">
          <div class="downbtn2__inner block--active">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>

        <!-- WEEKLY CHOICE  -->

        <div id="weeklytab" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container-fluid weekly wl__1">
                        <div class="container">
                            <div class="row">
                                <div class="col" >
                                    <h2 class="weekly__title">Weekly's choice</h2>
                                    
                                    <div class="weekly__slider__wrapper">
                                        <div class="weekly__slider">
                                          <?php
                                          for($i = 0; $i < 2; $i++){?>
                                            <div class="weekly__slider__item">
                                                <div class="weekly__slider__item__img">
                                                    <a href="article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_ID']; ?>" title="<?php echo $_DATA['hot_articles'][$i]['ar_name']; ?>"><img src="public/images/article/<?php echo $_DATA['hot_articles'][$i]['ar_pic'];?>" alt="" ></a>
                                                </div>
                                                
                                                <div class="weekly__slider__item__inf">
                                                  <table class="weekly__slider__item__inf__tbl">
                                                    <tr class="weekly__slider__item__inf__tbl__title">
                                                      <td>
                                                        <a href="article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_ID']; ?>" title="article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_name']; ?>">
                                                          <h4 class="weekly__slider__item__inf__title">
                                                            <?php if(strlen($_DATA['hot_articles'][$i]['ar_name']) > 34){?>
                                                              <?php echo substr($_DATA['hot_articles'][$i]['ar_name'], 0, 34);?>...
                                                            <?php }else{?>
                                                              <?php echo $_DATA['hot_articles'][$i]['ar_name'];?>      
                                                            <?php }?>  
                                                            <br>
                                                              
                                                          </h4>
                                                        </a>
                                                      </td>
                                                    </tr>
                                                    <tr class="weekly__slider__item__inf__tbl__hot">
                                                      <td>
                                                        <div class="weekly__slider__item__inf__badge">
                                                          HOT
                                                        </div>
                                                      </td>
                                                    </tr>
                                                    <tr class="weekly__slider__item__inf__tbl__des"> 
                                                      <td>
                                                        <p class="weekly__slider__item__inf__des">
                                                        <?php if(strlen($_DATA['hot_articles'][$i]['ar_des']) > 150){?>
                                                              <?php echo substr($_DATA['hot_articles'][$i]['ar_des'], 0, 150);?>...
                                                            <?php }else{?>
                                                              <?php echo $_DATA['hot_articles'][$i]['ar_des'];?>      
                                                            <?php }?>   
                                                        </p>
                                                      </td>
                                                    </tr>
                                                    <tr class="weekly__slider__item__inf__tbl__btn" style="position: relative;">
                                                      <td>
                                                        <a href="chapter.php?article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_ID']; ?>&chap_ID=1" class="weekly__slider__item__inf__btn"><span>ĐỌC NGAY</span></a>
                                                      </td>
                                                      
                                                    </tr>
                                                  </table>
                                                    
                                                </div>
                                            </div>
                                          <?php }?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container-fluid weekly wl__2">
                        <div class="container">
                            <div class="row">
                                <div class="col" >
                                  <h2 class="weekly__title">Weekly's choice</h2>
                                  
                                  <div class="weekly__slider__wrapper">
                                    <div class="weekly__slider">
                                    <?php
                                          for($i = 2; $i < 4; $i++){?>
                                            <div class="weekly__slider__item">
                                                <div class="weekly__slider__item__img">
                                                    <a href="article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_ID']; ?>" title="<?php echo $_DATA['hot_articles'][$i]['ar_name']; ?>"><img src="public/images/article/<?php echo $_DATA['hot_articles'][$i]['ar_pic'];?>" alt="" ></a>
                                                </div>
                                                
                                                <div class="weekly__slider__item__inf">
                                                  <table class="weekly__slider__item__inf__tbl">
                                                    <tr class="weekly__slider__item__inf__tbl__title">
                                                      <td>
                                                        <a href="article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_ID']; ?>" title="article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_name']; ?>">
                                                          <h4 class="weekly__slider__item__inf__title">
                                                            <?php if(strlen($_DATA['hot_articles'][$i]['ar_name']) > 34){?>
                                                              <?php echo substr($_DATA['hot_articles'][$i]['ar_name'], 0, 34);?>...
                                                            <?php }else{?>
                                                              <?php echo $_DATA['hot_articles'][$i]['ar_name'];?>      
                                                            <?php }?>  
                                                            <br>
                                                              
                                                          </h4>
                                                        </a>
                                                      </td>
                                                    </tr>
                                                    <tr class="weekly__slider__item__inf__tbl__hot">
                                                      <td>
                                                        <div class="weekly__slider__item__inf__badge">
                                                          HOT
                                                        </div>
                                                      </td>
                                                    </tr>
                                                    <tr class="weekly__slider__item__inf__tbl__des"> 
                                                      <td>
                                                        <p class="weekly__slider__item__inf__des">
                                                        <?php if(strlen($_DATA['hot_articles'][$i]['ar_des']) > 150){?>
                                                              <?php echo substr($_DATA['hot_articles'][$i]['ar_des'], 0, 150);?>...
                                                            <?php }else{?>
                                                              <?php echo $_DATA['hot_articles'][$i]['ar_des'];?>      
                                                            <?php }?>   
                                                        </p>
                                                      </td>
                                                    </tr>
                                                    <tr class="weekly__slider__item__inf__tbl__btn" style="position: relative;">
                                                      <td>
                                                        <a href="chapter.php?article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_ID']; ?>&chap_ID=1" class="weekly__slider__item__inf__btn"><span>ĐỌC NGAY</span></a>
                                                      </td>
                                                      
                                                    </tr>
                                                  </table>
                                                    
                                                </div>
                                            </div>
                                          <?php }?>
                                    </div>
                                  </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container-fluid weekly wl__3">
                        <div class="container">
                            <div class="row">
                                <div class="col" >
                                  <h2 class="weekly__title">Weekly's choice</h2>
                                    
                                  <div class="weekly__slider__wrapper">
                                      <div class="weekly__slider">
                                      <?php
                                          for($i = 4; $i < 6; $i++){?>
                                            <div class="weekly__slider__item">
                                                <div class="weekly__slider__item__img">
                                                    <a href="article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_ID']; ?>" title="<?php echo $_DATA['hot_articles'][$i]['ar_name']; ?>"><img src="public/images/article/<?php echo $_DATA['hot_articles'][$i]['ar_pic'];?>" alt="" ></a>
                                                </div>
                                                
                                                <div class="weekly__slider__item__inf">
                                                  <table class="weekly__slider__item__inf__tbl">
                                                    <tr class="weekly__slider__item__inf__tbl__title">
                                                      <td>
                                                        <a href="article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_ID']; ?>" title="article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_name']; ?>">
                                                          <h4 class="weekly__slider__item__inf__title">
                                                            <?php if(strlen($_DATA['hot_articles'][$i]['ar_name']) > 34){?>
                                                              <?php echo substr($_DATA['hot_articles'][$i]['ar_name'], 0, 34);?>...
                                                            <?php }else{?>
                                                              <?php echo $_DATA['hot_articles'][$i]['ar_name'];?>      
                                                            <?php }?>  
                                                            <br>
                                                              
                                                          </h4>
                                                        </a>
                                                      </td>
                                                    </tr>
                                                    <tr class="weekly__slider__item__inf__tbl__hot">
                                                      <td>
                                                        <div class="weekly__slider__item__inf__badge">
                                                          HOT
                                                        </div>
                                                      </td>
                                                    </tr>
                                                    <tr class="weekly__slider__item__inf__tbl__des"> 
                                                      <td>
                                                        <p class="weekly__slider__item__inf__des">
                                                        <?php if(strlen($_DATA['hot_articles'][$i]['ar_des']) > 150){?>
                                                              <?php echo substr($_DATA['hot_articles'][$i]['ar_des'], 0, 150);?>...
                                                            <?php }else{?>
                                                              <?php echo $_DATA['hot_articles'][$i]['ar_des'];?>      
                                                            <?php }?>   
                                                        </p>
                                                      </td>
                                                    </tr>
                                                    <tr class="weekly__slider__item__inf__tbl__btn" style="position: relative;">
                                                      <td>
                                                        <a href="chapter.php?article.php?ar_ID=<?php echo $_DATA['hot_articles'][$i]['ar_ID']; ?>&chap_ID=1" class="weekly__slider__item__inf__btn"><span>ĐỌC NGAY</span></a>
                                                      </td>
                                                      
                                                    </tr>
                                                  </table>
                                                    
                                                </div>
                                            </div>
                                          <?php }?>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#weeklytab" role="button" data-slide="prev">
                <span class="" aria-hidden="true"><i class="fas fa-chevron-left"></i> <i class="fas fa-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#weeklytab" role="button" data-slide="next">
                <span class="" aria-hidden="true"><i class="fas fa-chevron-right"></i> <i class="fas fa-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="carousel__mobile">
          <div id="owl-wl" class="owl-carousel carousel__mobile__item owl-theme">
            <div class="carousel__mobile__item__img cmwl1">
              <!-- <img src="/images/rs/wlbg1.png" alt=""> -->
            </div>
            <div class="carousel__mobile__item__img cmwl2">
              <!-- <img src="/images/rs/wlbg2.png" alt=""> -->
            </div>
            <div class="carousel__mobile__item__img cmwl3">
              <!-- <img src="/images/rs/wlbg3.png" alt=""> -->
            </div>
          </div>

          <div class="carousel__mobile__item__inf">
              <div class="carousel__mobile__item__inf__title">
                  <a href="article.php?ar_ID=<?php echo $_DATA['hot_articles'][0]['ar_ID']; ?>" title="<?php echo $_DATA['hot_articles'][$i]['ar_name']; ?>">
                    <h4 class="carousel__mobile__item__inf__title">
                    <?php if(strlen($_DATA['hot_articles'][0]['ar_name']) > 34){?>
                          <?php echo substr($_DATA['hot_articles'][$i]['ar_name'], 0, 34);?>...
                        <?php }else{?>
                          <?php echo $_DATA['hot_articles'][0]['ar_name'];?>      
                        <?php }?>  
                      <br>
                        
                    </h4>
                  </a>
              </div>
              <div class="carousel__mobile__item__inf__badge">
                HOT
              </div>
              <a href="chapter.php?ar_ID=<?php echo $_DATA['hot_articles'][0]['ar_ID']; ?>&chap_ID=1" class="carousel__mobile__item__inf__btn"><span>ĐỌC NGAY</span></a>
          </div>

          <div class="carousel__mobile__subtitle">
            <div class="carousel__mobile__subtitle__line">

            </div>
            <div class="carousel__mobile__subtitle__text"><span>Best of the week</span></div>
          </div>

          <div id="owl__bow" class="owl-carousel BOW">
            <?php foreach($_DATA['hot_articles'] as $ar){?>
              <div class="BOW__item">
                <a href="article.php?ar_ID=<?php echo $ar['ar_ID']; ?>" title="<?php echo $ar['ar_name']; ?>"><img src="public/images/article/<?php echo $ar['ar_pic']; ?>" alt="" ></a>
              </div>
            <?php }?>
          </div>
        </div>

        <div class="top__new__wrapper">
          <div class="topview__mobile" id="topviewmobile">
            <h6>TOP View:</h6>
              <div id="topviewtab2">
                <div id="owl__topview__mobile" class="owl-carousel topview__slider">
                  <?php 
                    $limit = 12;
                    if(count($_DATA['top_articles']) < 12){
                      $limit = count($_DATA['top_articles']);
                    }
                    for($i = 0; $i < $limit; $i++){?>
                      <a href="article.php?ar_ID=<?php echo $_DATA['top_articles'][$i]['ar_ID']; ?>" class="topview__slider__item">
                          <div class="topview__slider__item__img">
                              <img src="public/images/article/<?php echo $_DATA['top_articles'][$i]['ar_pic']; ?>" alt="" >
                          </div>
                          
                          <div class="topview__slider__item__inf">
                              <h3 class="topview__slider__item__inf__title">
                              <?php 
                                if(strlen($_DATA['top_articles'][$i]['ar_name']) > 10){
                                    echo substr($_DATA['top_articles'][$i]['ar_name'], 0, 10);?>...
                              <?php
                                  }else{
                                    echo $_DATA['top_articles'][$i]['ar_name'];     
                                  }
                                ?>      
                              </h3>
                              <p class="topview__slider__item__inf__time">
                                <?php 
                                  $datetime = new DateTime($_DATA['top_articles'][$i]['ar_date']);

                                  $date = $datetime->format('d-m-Y');
                                  // list($month, $day, $year) = explode('[/.-]', $_DATA['top_articles'][$i]['ar_date']);
                                  echo $date;  
                                ?>
                              </p>
                          </div>
                      </a>
                    <?php }?>
                </div>
            </div>
          </div>
          
          <div class="container-fluid newar__mobile">
            <div class="container">
                <div class="row">
                    <div class="col" >
                        <h2 class="newar__mobile__title">New Releases</h2>
                        
                        <div class="newar__mobile__slider__wrapper">
                          <?php for($j = 0; $j < 3; $j++){?>
                            <div class="newar__mobile__slider">
                              <?php for($i = $j*2; $i < $j*2 + 2; $i++){?>
                                    <div class="newar__mobile__slider__item">
                                        <div class="newar__mobile__slider__item__img">
                                            <a href="article.php?ar_ID=<?php echo $_DATA['articles'][$i]['ar_ID']; ?>" title="<?php echo $_DATA['articles'][$i]['ar_name']; ?>"><img src="public/images/article/<?php echo $_DATA['articles'][$i]['ar_pic']; ?>" alt=""></a>
                                            <span class="newar__mobile__slider__item__img__chap"><?php echo $_DATA['chapters'][(int)$_DATA['articles'][$i]['ar_ID']]['chap_name']; ?></span>
                                        </div>
                                        
                                        <div class="newar__mobile__slider__item__inf">
                                            <a href="article.php?ar_ID=<?php echo $_DATA['articles'][$i]['ar_ID']; ?>" title="<?php echo $_DATA['articles'][$i]['ar_name']; ?>">
                                                <h4 class="newar__mobile__slider__item__inf__title" style="white-space: 2;">
                                                <?php 
                                                  if(strlen($_DATA['articles'][$i]['ar_name']) > 19){
                                                      echo substr($_DATA['articles'][$i]['ar_name'], 0, 19);?>...
                                                <?php
                                                    }else{
                                                      echo $_DATA['articles'][$i]['ar_name'];     
                                                    }
                                                  ?>    
                                                </h4>
                                                
                                                <p class="newar__mobile__slider__item__inf__time">
                                                <?php 
                                                  $datetime = new DateTime($_DATA['articles'][$i]['ar_date']);

                                                  $date = $datetime->format('d-m-Y');
                                                  // list($month, $day, $year) = explode('[/.-]', $_DATA['top_articles'][$i]['ar_date']);
                                                  echo $date;  
                                                ?>
                                                </p>
                                              </a>
                                            
                                        </div>
                                    </div>
                              <?php }?>
                            </div>
                          <?php }?>
                          <div class="newar__mobile__morebtn">
                            <a href="/article_list/0"><span>XEM THÊM</span></a>
                          </div>
                        </div>
                        
                    </div>
                </div>
            </div>
          </div>
          
          <?php include_once('footer.php');?>
        </div>
        

        <div class="container-fluid ind__main">
            <!-- TOP VIEW  -->
            <div class="container-fluid topview" id="topview">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 class="topview__title">TOP view</h2>
                            <div id="topviewtab" class="carousel slide" data-ride="carousel">
                                        <div id="owl__one"class="owl-carousel topview__slider">
                                          <%for(let i = 0; i < ((sess.top_articles.length >= 12)? 12 : sess.top_articles.length); i++){%>
                                            <a href="/article/<%= sess.top_articles[i].ar_ID%>" class="topview__slider__item">
                                                <div class="topview__slider__item__img">
                                                    <img src="/images/article/<%= sess.top_articles[i].ar_pic%>" alt="" >
                                                </div>
                                                
                                                <div class="topview__slider__item__inf">
                                                    <h3 class="topview__slider__item__inf__title">
                                                      <% if(sess.top_articles[i].ar_name.length > 18){%>
                                                        <%= sess.top_articles[i].ar_name.substring(0, 18)%>...
                                                      <%}else{%>
                                                        <%= sess.top_articles[i].ar_name%>      
                                                      <%}%>     
                                                    </h3>
                                                    <p class="topview__slider__item__inf__time">
                                                      <% let arr = sess.top_articles[i].ar_date.split('-')%>
                                                      <%= arr[2] + "-" + arr[1] + "-" + arr[0]%>
                                                      </p>
                                                </div>
                                            </a>
                                            <%}%>
                                </div>
                    
                                <a class="tv-prev carousel-control-prev">
                                    <span class=""><i class="fas fa-chevron-left"></i></span>
                                </a>
                                <a class="tv-next carousel-control-next">
                                    <span class=""><i class="fas fa-chevron-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            

            <!-- NEW ARTICLE  -->
            <div class="container-fluid newar">
                    <div class="container">
                        <div class="row">
                            <div class="col" >
                                <h2 class="newar__title">New Releases</h2>
                                
                                <div class="newar__slider__wrapper">
                                  <%for(let j = 0; j < 3; j++){%>
                                    <div class="newar__slider">
                                      <%for(let i = j*2; i < j*2 + 2; i++){%>
                                            <div class="newar__slider__item">
                                                <div class="newar__slider__item__img">
                                                    <a href="/article/<%= sess.articles[i].ar_ID%>" title="<%= sess.articles[i].ar_name%>"><img src="/images/article/<%= sess.articles[i].ar_pic%>" alt=""></a>
                                                </div>
                                                
                                                <div class="newar__slider__item__inf">
                                                  <table class="newar__slider__item__inf__tbl">
                                                    <tr class="newar__slider__item__inf__tbl__title">
                                                      <td>
                                                        <a href="/article/<%= sess.articles[i].ar_ID%>" title="<%= sess.articles[i].ar_name%>">
                                                          <h4 class="newar__slider__item__inf__title">
                                                            <% if(sess.articles[i].ar_name.length > 33){%>
                                                              <%= sess.articles[i].ar_name.substring(0, 33)%>...
                                                            <%}else{%>
                                                              <%= sess.articles[i].ar_name%>      
                                                            <%}%> 
                                                          </h4>
                                                          
                                                        </a>
                                                      </td>
                                                    </tr>
                                                    <tr class="newar__slider__item__inf__tbl__chap">
                                                      <td>
                                                        <span class="newar__slider__item__inf__chap"><%= sess.chapters[i][0].chap_name%></span>
                                                      </td>
                                                    </tr>
                                                    <tr class="newar__slider__item__inf__tbl__des">
                                                      <td>
                                                        <p class="newar__slider__item__inf__des">
                                                          <% if(sess.articles[i].ar_des.length > 120){%>
                                                            <%= sess.articles[i].ar_des.substring(0, 120)%>...
                                                          <%}else{%>
                                                            <%= sess.articles[i].ar_des%>      
                                                          <%}%>  
                                                        </p>
                                                      </td>
                                                    </tr>
                                                    <tr class="newar__slider__item__inf__tbl__btn">
                                                      <td>
                                                        <a href="/article/<%= sess.articles[i].ar_ID%>" class="newar__slider__item__inf__btn"><span>ĐỌC NGAY</span></a>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                </div>
                                            </div>
                                      <%}%>
                                    </div>
                                  <%}%>
                                  <div class="newar__morebtn">
                                    <a href="/article_list/0"><span>XEM THÊM</span></a>
                                  </div>
                                    
                                </div>

                                
                            </div>
                        </div>
                    </div>
            </div>

            <!-- FOOTER  -->
            <?php include_once('footer') ?>
        </div>


        
        
        <span class="lastft"></span>
        <?php include_once('main_js.php') ?>
    </body>
</html>