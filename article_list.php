<!DOCTYPE html>
<html>
    <head>
        <title><%= title%></title>
        <%include head%>
    </head>
    <body>
        <!-- NAV  -->
        <%include navigation%>
        
        <!-- ARTICLE LIST  -->
        <div class="container-fluid arlist__main">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="arlist">
                            <h2 class="arlist__title"><%= cur_tag[0].cat_name%></h2>
                            <% for(let i = 0; i < 5; i++){%>
                                <div class="arlist__row">
                                    <% for(let j = 5*i; j < ((articles.length > (5*i + 5))? 5*i + 5 : articles.length); j++){%>
                                        <a href="/article/<%= articles[j].ar_ID%>" class="arlist__row__item">
                                            <div class="arlist__row__item__img">
                                                <img src="/images/article/<%= articles[j].ar_pic%>" alt="" >
                                            </div>
                                            
                                            <div class="arlist__row__item__inf">
                                                <h3 class="arlist__row__item__inf__title">
                                                    <% if(articles[j].ar_name.length > 25){%>
                                                        <%= articles[j].ar_name.substring(0, 25)%>...
                                                    <%}else{%>
                                                        <%= articles[j].ar_name%>      
                                                    <%}%>  
                                                </h3>
                                                <h3 class="arlist__row__item__inf__chap badge badge-pill badge-success"><%= chapters[j][0].chap_name%>  </h3>
                                                <!-- <p class="arlist__row__item__inf__time">2020</p> -->
                                            </div>
                                        </a>
                                    <%}%>
                                </div>
                            <%}%>


                            <div class="pagination">
                                <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=0"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>  First</a>
                                <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=<%= pagination.previous%>"><i class="fas fa-chevron-left"></i>  Prev</a>
                                <% for(let i = (pagination.current - 3 > 0)?pagination.current - 3: 0; i < pagination.lastItem; i++) {%>
                                    <%if(pagination.current === i){%>
                                        <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=<%= i%>" class="pagination--active"><%= i + 1%></a>
                                    <%} else {%>
                                        <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=<%= i%>"><%= i + 1%></a>
                                    <%}%>
                                <%}%>
                                <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=<%= pagination.next%>">Next  <i class="fas fa-chevron-right"></i></a>
                                <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=<%= pagination.lastPage - 1%>">Last  <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>

                        <!-- MOBILE VERSION  -->
                        <div class="arlist__mobile">
                            <h2 class="arlist__mobile__title"><%= cur_tag[0].cat_name%></h2>
                            <%let arrow = Math.round(articles.length/2); %>
                            <% for(let i = 0; i < arrow; i++){%>
                                <div class="arlist__mobile__row">
                                    <% for(let j = 2*i; j < ((articles.length > (2*i + 2))? 2*i + 2 : articles.length); j++){%>
                                        <a href="/article/<%= articles[j].ar_ID%>" class="arlist__mobile__row__item">
                                            <div class="arlist__mobile__row__item__img">
                                                <img src="/images/article/<%= articles[j].ar_pic%>" alt="" >
                                            </div>
                                            
                                            <div class="arlist__mobile__row__item__inf">
                                                <h3 class="arlist__mobile__row__item__inf__title">
                                                    <% if(articles[j].ar_name.length > 35){%>
                                                        <%= articles[j].ar_name.substring(0, 35)%>...
                                                    <%}else{%>
                                                        <%= articles[j].ar_name%>      
                                                    <%}%>  
                                                </h3>
                                                <h3 class="arlist__mobile__row__item__inf__chap badge badge-pill badge-success"><%= chapters[j][0].chap_name%>  </h3>
                                                <!-- <p class="arlist__row__item__inf__time">2020</p> -->
                                            </div>
                                        </a>
                                    <%}%>
                                </div>
                            <%}%>


                            <div class="pagination">
                                <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=0"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>  First</a>
                                <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=<%= pagination.previous%>"><i class="fas fa-chevron-left"></i>  Prev</a>
                                <% for(let i = (pagination.current - 3 > 0)?pagination.current - 3: 0; i < pagination.lastItem; i++) {%>
                                    <%if(pagination.current === i){%>
                                        <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=<%= i%>" class="pagination--active"><%= i + 1%></a>
                                    <%} else {%>
                                        <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=<%= i%>"><%= i + 1%></a>
                                    <%}%>
                                <%}%>
                                <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=<%= pagination.next%>">Next  <i class="fas fa-chevron-right"></i></a>
                                <a href="/article_list/<%= cur_tag[0].cat_ID%>?page=<%= pagination.lastPage - 1%>">Last  <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER  -->
            <%include footer%>
        </div>
        
        
        
        
        <%include main_js%>
    </body>
</html>