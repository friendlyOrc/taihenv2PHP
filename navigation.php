<div class="nav__wrapper block--active">
    <?php
        if(!isset($_GET['page'])){
    ?>
        <div class="container-fluid nav nav--bordered">
    <?php
        }else{
    ?>
        <div class="container-fluid nav">
    <?php
        }
    ?>
    
    <div class="row d-flex justify-content-between">    
        <div class="col-4">
            <a href="index.php" class="nav__logo">taihen</a>
        </div>
        <div class="col-4">
            <ul class="nav__menu">
                <?php
                    if(isset($_GET['tag']) && $_GET['tag'] == 'all'){
                ?>
                    <li class="nav__menu__item nav--active"><a href="article_list.php?tag=all">Danh sách</a></li>
                <?php
                    }else{
                ?>
                    <li class="nav__menu__item"><a href="article_list.php?tag=all">Danh sách</a></li>
                <?php
                    }
                ?>
                <li class="nav__menu__item" id="cate">
                    Thể loại
                </li>

                <?php
                    if(isset($_GET['tag']) && $_GET['tag'] == 'complete'){
                ?>
                    <li class="nav__menu__item nav--active"><a href="article_list.php?tag=complete">Hoàn tất</a></li>
                <?php
                    }else{
                ?>
                    <li class="nav__menu__item"><a href="article_list.php?tag=complete">Hoàn tất</a></li>
                <?php
                    }
                ?>
                <?php
                    if(isset($_GET['tag']) && $_GET['tag'] == 'hot'){
                ?>
                    <li class="nav__menu__item nav--active"><a href="article_list.php?tag=hot">HOT</a></li>
                <?php
                    }else{
                ?>
                    <li class="nav__menu__item"><a href="article_list.php?tag=hot">HOT</a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <div class="col-3" style="text-align: right; padding: 0 !important;">
            <form action="search.php" method="POST" class="nav__search d-flex justify-content-between">
                <input type="text" class="nav__search__input" placeholder="Tìm kiếm" name="search">
                <button class="nav__search__button" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <div class="nav__search__right">
                <button class="" onclick="openSearchFull()"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="nav__hambutton">
            <button class="nav__hambutton__button"><i class="fas fa-bars"></i></button>
        </div>
        
    </div>

    </div>
    <div class="nav__search__mobile block--disable">
        <form action="search.php" method="POST" class="nav__search__mobile__form d-flex justify-content-between">
            <input type="text" class="nav__search__mobile__input" placeholder="Tìm kiếm" name="search">
            <button class="nav__search__mobile__button" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="container-fluid category cate--disable">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="category__list">
                        <?php
                            $num = count($_DATA['category']);
                            $each = round($num/8);
                            
                            for($j = 0; $j < 8; $j++){?>
                                <ul class="category__list__col">
                                    <?php for($i = $each*$j; $i < $num - $each*(8 - $j - 1); $i++){
                                        $cat = $_DATA['category'][$i];
                                        ?>
                                        <li class="category__list__col__item" title=""><a href="article_list.php?tag=<?php echo $cat['cat_ID'];?>"><?php echo $cat['cat_name'];?></a></li>
                                    <?php }?>
                                </ul>
                        <?php }?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="nav__mobile__wrapper">
    <div class="container-fluid nav__mobil">
        <div class="row d-flex justify-content-between">
            
            <div class="nav__hambutton__left">
                <button class="nav__hambutton__button" onclick="openNavFull()"><i class="fas fa-bars"></i></button>
            </div>
            
            <div class="nav__logo">
                <a href="/" class="">taihen</a>
            </div>

            <div class="nav__search__right">
                <button class="" onclick="openSearchFull()"><i class="fas fa-search"></i></button>
            </div>
            
        </div>

    </div>
    <div class="nav__search__mobile block--disable">
        <form action="search.php" method="POST" class="nav__search__mobile__form d-flex justify-content-between">
            <input type="text" class="nav__search__mobile__input" placeholder="Tìm kiếm" name="search">
            <button class="nav__search__mobile__button" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>

<div class="container-fluid nav--full" id="full">
    <div class="nav--full__bg">

    </div>
    <div class="row d-flex justify-content-between">
        <div class="col-12">
            <ul class="nav--full__menu">
                <li class="nav--full__menu__item">
                    <a href="article_list.php?tag=all">Danh sách</a>
                </li>
                <li class="nav--full__menu__item" id="cate__mobile">
                    Thể loại
                </li>
                <li class="nav--full__menu__item">
                    <a href="article_list.php?tag=complete">Hoàn tất</a>
                </li>
                <li class="nav--full__menu__item">
                    <a href="article_list.php?tag=hot">HOT</a>
                </li>
                <li class="nav--full__menu__item">
                    <button onclick="openNavFull()"><i class="fas fa-arrow-left"></i></button>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid categoryfull cate--disable">
        <div class="container">
            <div class="row">
                <div class="col" style="padding: 0 !important;">
                    <i class="fas fa-arrow-left" id="cate__backbtn"></i>
                    <div class="categoryfull__list">
                        <?php $mRow = round($num/3);
                            for($j = 0; $j < 3; $j++){?>

                            <ul class="categoryfull__list__col">
                                <?php for($i = $mRow*$j; $i < $num - $mRow*(3 - $j - 1); $i++){
                                    $cat = $_DATA['category'][$i];
                                    ?>
                                    <li class="categoryfull__list__col__item" title="<?php echo $cat['cat_name'];?>"><a href="article_list?cat_ID=<?php echo $cat['cat_ID'];?>"><?php echo $cat['cat_name'];?></a></li>
                                <?php }?>
                            </ul>
                        <?php }?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>