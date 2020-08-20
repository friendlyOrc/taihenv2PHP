<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> / Category</li>
        <li class=""> / Edit Category</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Edit Category</h1> 
    </div>
</div>
<div class="row add_user">
    <div class="col-6">
        <?php
            if(!isset($connect)){
                include_once('config/connection.php');
            }
            $cur_cat = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM category WHERE cat_ID = ".$_GET['id']));
            if(isset($_POST['sbm'])){
                $name = $_POST['cat_name'];
                $des = $_POST['cat_des'];	

                if($name && $des){
                    $sql_danh_sach = "select * from category where cat_name = '$name';";
                    $data_sql = mysqli_query($connect, $sql_danh_sach);

                    if(mysqli_num_rows($data_sql) == 0 || $name == $cur_cat['cat_name']){
                        if(mysqli_query($connect, "UPDATE category SET cat_name = '$name', cat_des = '$des' WHERE cat_ID = ".$cur_cat['cat_ID'])){
                            $cur_cat = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM category WHERE cat_ID = ".$_GET['id']));
                            
                            $_DATA['account'] = mysqli_query($connect, "SELECT * FROM account");
                            
                            $error = '<div class="alert alert-danger">Cập nhật category thành công!</div>';
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
                    <input class="form-control" placeholder="Tên category" name="cat_name" type="text" autofocus value="<?php echo $cur_cat['cat_name']?>">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Mô tả" name="cat_des" type="text" value="<?php echo $cur_cat['cat_des']?>">
                </div>
                <button type="submit" class="btn btn-success" name="sbm"><i class="fas fa-check"></i> Save</button>
            </fieldset>
        </form>
    </div>
    
      
</div>