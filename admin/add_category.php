<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> / Category</li>
        <li class=""> / Thêm Category</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Thêm Category</h1> 
    </div>
</div>
<div class="row add_user">
    <div class="col-6">
        <?php
            if(!isset($connect)){
                include_once('config/connection.php');
            }
            if(isset($_POST['sbm'])){
                $name = $_POST['cat_name'];
                $des = $_POST['cat_des'];	

                if($name && $des){
                    $sql_danh_sach = "select * from category where cat_name = '$name';";
                    $data_sql = mysqli_query($connect, $sql_danh_sach);

                    if(mysqli_num_rows($data_sql) == 0){
                        $cat = mysqli_fetch_array(mysqli_query($connect, 'SELECT * FROM category ORDER BY cat_ID DESC LIMIT 1'));
                        $ID = $cat['cat_ID'] + 1;

                        if(mysqli_query($connect, "INSERT INTO category(cat_ID, cat_name, cat_des) VALUES ($ID, '$name', '$des')")){
                            
                            $_DATA['categpry'] = mysqli_query($connect, "SELECT * FROM category");
                            
                            $error = '<div class="alert alert-danger">Thêm category thành công!</div>';
                            echo $error;
                        }else {
                            echo 'ERROR';
                        }
                    }else{
                        $error = '<div class="alert alert-danger">Category đã tồn tại!</div>';
                        echo $error;
                    }
                }else{
                    $error = '<div class="alert alert-danger">Không được để trống thông tin!</div>';
                        echo $error;
                }
            }
        ?>
        <form role="form" method="POST">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="Tên category" name="cat_name" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Mô tả" name="cat_des" type="text" value="">
                </div>
                <button type="submit" class="btn btn-success" name="sbm">Thêm category</button>
            </fieldset>
        </form>
    </div>
    
      
</div>