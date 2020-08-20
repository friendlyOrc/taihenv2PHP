<!DOCTYPE html>
<html>
<title>Admin</title>
	<?php
		session_start();
		include_once('head.php');
	?>

<body>
    <?php
        if(!isset($_SESSION['account'])){
            die("ERROR");
        }
        if(!isset($_DATA['articles'])){
            include_once('get_data.php');
        }
    ?>
    <nav class="navbar navbar-fixed-top bg-dark" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><span>Taihen</span>Administration</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                                
            </div>
        </nav>
	<div class="row">
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <ul class="nav menu">
                <li <?php if(!isset($_GET['page'])) echo 'class="active"';?>>
                    <a href="index.php">
                        <svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> 
                        Dashboard
                    </a>
                </li>
                <li <?php if(isset($_GET['page']) && $_GET['page'] == 'random_pic') echo 'class="active"';?>>
                    <a href="admin.php?page=random_pic"><svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>
                        Quản lý Random Pic
                    </a>
                </li>
                <li <?php if(isset($_GET['page']) && $_GET['page'] == 'user') echo 'class="active"';?>>
                    <a href="admin.php?page=user"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
                        Quản lý thành viên
                    </a>
                </li>
                <li <?php if(isset($_GET['page']) && $_GET['page'] == 'category') echo 'class="active"';?>>
                    <a href="admin.php?page=category"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>
                        Quản lý category
                    </a>
                </li>
                <li <?php if(isset($_GET['page']) && $_GET['page'] == 'articles') echo 'class="active"';?>>
                    <a href="admin.php?page=articles"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>
                        Quản lý article
                    </a>
                </li>
                <li <?php if(isset($_GET['page']) && $_GET['page'] == 'chapter') echo 'class="active"';?>>
                    <a href="admin.php?page=articles"><svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                        Quản lý Chapter
                    </a>
                </li>
                <li <?php if(isset($_GET['page']) && $_GET['page'] == 'comment') echo 'class="active"';?>>
                    <a href="admin.php?page=comment"><svg class="glyph stroked empty message"><use xlink:href="#stroked-empty-message"/></svg>
                        Quản lý Comment
                    </a>
                </li>
                <!-- <li><a href="ads.html"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý quảng cáo</a></li>
                <li><a href="setting.html"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li> -->
            </ul>
        </div>
            
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
            <?php
                // include & require
                // include_once & require_once
                if(isset($_GET['page'])){
                    switch ($_GET['page']) {
                        case "admin":
                            include_once('sub_admin.php');
                            break;
                        case "articles":
                            include_once('articles.php');
                            break;
                        case "random_pic":
                            include_once('random_pic.php');
                            break;
                        case "user":
                            include_once('user.php');
                            break;
                        case "category":
                            include_once('category.php');
                            break;
                        case "chapter":
                            include_once('chapter.php');
                            break;
                        case "comment":
                            include_once('comment.php');
                            break;
                        case "add_article":
                            include_once('add_article.php');
                            break;
                        case "add_random_pic":
                            include_once('add_random_pic.php');
                            break;
                        case "add_category":
                            include_once('add_category.php');
                            break;
                        case "add_product":
                            include_once('add_article.php');
                            break;
                        case "add_user":
                            include_once('add_user.php');
                            break;
                        case "add_chapter":
                            include_once('add_chapter.php');
                            break;
                        case "edit_category":
                            include_once('edit_category.php');
                            break;
                        case "edit_article":
                            include_once('edit_article.php');
                            break;
                        case "edit_user":
                            include_once('edit_user.php');
                            break;
                        case "edit_chapter":
                            include_once('edit_chapter.php');
                            break;
                        case "login":
                            include_once('login.php');
                            break;
                        default:
                            break;
                    }
                }
                else{

                    include_once("sub_admin.php");
                }
            ?>
        </div>	<!--/.main-->
    </div>	
	

    <?php
		include_once('js.php');
	?>
</body>

</html>
