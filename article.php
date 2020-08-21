<!DOCTYPE html>
<html>
    <head>
        <title><%= title%></title>
        <% include head%> 
    </head>
    <body>
        <!-- NAV  -->
        <% include navigation%>
        
        <div class="downbtn">
            <div class="downbtn__inner block--active">
              <span></span>
              <span></span>
              <span></span>
            </div>
        </div>

        <!-- ARTICLE   -->
        <div class="container-fluid ar__wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="article">
                            <div class="article__img">
                                <img src="/images/article/<%= sess.articles[index].ar_pic%>" alt="">
                            </div>
                            <div class="article__inf">
                                <p>Thông tin truyện</p>
                                <span><i class="fas fa-star"></i>  <i class="fas fa-star"></i>  <i class="fas fa-star"></i>  <i class="fas fa-star"></i>  <i class="fas fa-star"></i></span>
                                <p class="article__inf__title"><%= sess.articles[index].ar_name%></p>
                                <div class="article__inf__catelist">
                                    <%for(var j = 0; j < sess.cate[index].length; j++) {%>
                                        <a href="/article_list/<%= sess.cate[index][j].cat_ID%>" class="article__inf__catelist__cate" title="<%= sess.cate[index][j].cat_des%>"><%= sess.cate[index][j].cat_name%></a>
                                    <%}%>
                                </div>
                                <p class="">Ngày cập nhật: 
                                    <% let arr = sess.articles[index].ar_date.split('-')%>
                                    <%= arr[2] + "-" + arr[1] + "-" + arr[0]%>
                                </p>
                                <p>Số chap: <%= sess.articles[index].ar_chap_num%></p>
                                <p>Tình trạng: 
                                    <% if(sess.articles[index].ar_stt === 1){%>
                                        Hoàn thành
                                    <%}else{%>
                                        Chưa hoàn thành
                                    <%}%>
                                </p>
                                <p>
                                    <%= sess.articles[index].ar_des%>
                                </p>
                                <a href="/chapter/<%= sess.articles[index].ar_ID%>-1" class="article__inf__btn"><span>ĐỌC NGAY</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CHAP LIST  -->
        <div class="container-fluid chaplist__wrapper" id="chaplist">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="chaplist">
                            <h3 class="chaplist__title">Danh sách chap</h3>
                            <% for(let i = 0; i < 2; i++){%>
                                <div class="chaplist__row">
                                    <% for(let j = 5*i; j < ((chapPerPage.length > (5*i + 5))? (5*i + 5) : chapPerPage.length); j++){%>
                                        <a href="/chapter/<%= sess.articles[index].ar_ID%>-<%= chapPerPage[j].chap_ID%>" class="chaplist__row__item">
                                            <div class="chaplist__row__item__img">
                                                <img src="/images/chapter/<%= sess.articles[index].ar_ID%>/<%= chapPerPage[j].chap_ID%>/0.jpg" alt="" >
                                            </div>
                                            
                                            <div class="chaplist__row__item__inf">
                                                <!-- <h3 class="chaplist__row__item__inf__title"><%= chapPerPage[j].chap%></h3> -->
                                                <h3 class="chaplist__row__item__inf__chap badge badge-pill badge-success"><%= chapPerPage[j].chap_name%></h3>
                                                <!-- <p class="chaplist__row__item__inf__time">2020</p> -->
                                            </div>
                                        </a>
                                    <%}%>
                                </div>
                            <%}%>

                        </div>

                        <div class="chaplist__pagination">
                            <a href="/article/<%= sess.articles[index].ar_ID%>?page=<%= pagination.previous%>"><i class="fas fa-arrow-left"></i> </a>
                            <a href="#">Chap <%= chapPerPage[0].chap_ID%> - <%= chapPerPage[chapPerPage.length - 1].chap_ID%></a>
                            <a href="/article/<%= sess.articles[index].ar_ID%>?page=<%= pagination.next%>"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ARTICLE MOBILE  -->
        <div class="container-fluid ar__wrapper__mobile">

                        <div class="article__mobile">
                            <div class="article__mobile__img">
                                <img src="/images/article/<%= sess.articles[index].ar_pic%>" alt="">
                            </div>
                            <div class="article__mobile__inf">
                                
                                <p class="article__mobile__inf__title"><%= sess.articles[index].ar_name%></p>
                                
                                <p><i class="fas fa-star"></i>  <i class="fas fa-star"></i>  <i class="fas fa-star"></i>  <i class="fas fa-star"></i>  <i class="fas fa-star"></i></p>

                                <div class="article__mobile__inf__catelist">
                                    <%for(var j = 0; j < sess.cate[index].length; j++) {%>
                                        <a href="/article_list/<%= sess.cate[index][j].cat_ID%>" class="article__mobile__inf__catelist__cate" title="<%= sess.cate[index][j].cat_des%>"><%= sess.cate[index][j].cat_name%></a>
                                    <%}%>
                                </div>
                                <p class="">Ngày cập nhật: 
                                    <%= arr[2] + "-" + arr[1] + "-" + arr[0]%>
                                </p>
                                <p>Số chap: <%= sess.articles[index].ar_chap_num%></p>
                                <p>Tình trạng: 
                                    <% if(sess.articles[index].ar_stt === 1){%>
                                        Hoàn thành
                                    <%}else{%>
                                        Chưa hoàn thành
                                    <%}%>
                                </p>
                                <p>
                                    <% if(sess.articles[index].ar_des.length > 300){%>
                                        <%= sess.articles[index].ar_des.substring(0, 300)%>... 
                                        <!-- <a href="" onclick="">Xem thêm</a> -->
                                      <%}else{%>
                                        <%= sess.articles[index].ar_des%>      
                                      <%}%>   
                                </p>
                                <a href="/chapter/<%= sess.articles[index].ar_ID%>-1" class="article__mobile__inf__btn"><span>ĐỌC NGAY</span></a>
                            </div>
                        </div>
            </div>

        <!-- CHAPLIST MOBILE  -->
        <div class="container-fluid chaplist__wrapper__mobile" id="chaplist__mobile">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="chaplist__mobile">
                            <h3 class="chaplist__mobile__title">Danh sách chap</h3>
                            <% for(let i = 0; i < 2; i++){%>
                                <div class="chaplist__mobile__row">
                                    <% for(let j = 5*i; j < ((chapPerPage.length > (5*i + 5))? (5*i + 5) : chapPerPage.length); j++){%>
                                        <a href="/chapter/<%= sess.articles[index].ar_ID%>-<%= chapPerPage[j].chap_ID%>" class="chaplist__mobile__row__item">
                                            <div class="chaplist__mobile__row__item__img">
                                                <img src="/images/chapter/<%= sess.articles[index].ar_ID%>/<%= chapPerPage[j].chap_ID%>/0.jpg" alt="" >
                                            </div>
                                            
                                            <div class="chaplist__mobile__row__item__inf">
                                                <!-- <h3 class="chaplist__row__item__inf__title"><%= chapPerPage[j].chap%></h3> -->
                                                <h3 class="chaplist__mobile__row__item__inf__chap badge badge-pill badge-success"><%= chapPerPage[j].chap_name%></h3>
                                                <!-- <p class="chaplist__row__item__inf__time">2020</p> -->
                                            </div>
                                        </a>
                                    <%}%>
                                </div>
                            <%}%>

                        </div>

                        <div class="chaplist__mobile__pagination">
                            <a href="/article/<%= sess.articles[index].ar_ID%>?page=<%= pagination.previous%>"><i class="fas fa-arrow-left"></i> </a>
                            <a href="#">Chap <%= chapPerPage[0].chap_ID%> - <%= chapPerPage[chapPerPage.length - 1].chap_ID%></a>
                            <a href="/article/<%= sess.articles[index].ar_ID%>?page=<%= pagination.next%>"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="container-fluid cmt_footer__wrapper">
            <!-- COMMENT  -->
            <% include comment_section%>

            <!-- FOOTER  -->
            <% include footer%>
        </div>
        
        
        
        <%include main_js%>
    </body>
</html>