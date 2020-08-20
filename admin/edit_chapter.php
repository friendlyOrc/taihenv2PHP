<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> / Article</li>
        <li class=""> / Edit Chapter</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Thêm Chapter</h1> 
    </div>
</div>
<div class="row add_user">
    <div class="col-6">
        <?php
            if(!isset($connect)){
                include_once('config/connection.php');
            }
            include_once('tool.php');
            $cur_ar = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM article WHERE ar_ID = ".$_GET['id']));

            $cur_chap = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM chapter WHERE chap_ID = ".$_GET['chap']." and ar_ID = ".$_GET['id']));

            if(isset($_POST['sbm'])){
                $name = $_POST['name'];

                if($name){
                    $sql_danh_sach = "select * from chapter where chap_name = '$name' and ar_id = ".$cur_ar['ar_ID'].";";
                    $data_sql = mysqli_query($connect, $sql_danh_sach);

                    if(mysqli_num_rows($data_sql) == 0 || $name == $cur_chap['chap_name']){
                        if(!mysqli_query($connect, "UPDATE chapter SET chap_name = '$name'  WHERE chap_ID = ".$cur_chap['chap_ID']." and ar_ID = ".$cur_ar['ar_ID'])){
                            die('Update fail');
                        }
                        
                        $cur_chap = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM chapter WHERE chap_ID = ".$_GET['chap']." and ar_ID = ".$_GET['id']));
                        $error = '<div class="alert alert-success">Update chapter thành công!</div>';
                        echo $error;
                    }else{
                        $error = '<div class="alert alert-danger">Chapter đã tồn tại!</div>';
                        echo $error;
                    }
                }else{
                    $error = '<div class="alert alert-danger">Không được để trống thông tin!</div>';
                    echo $error;
                }
            }
        ?>
        <form method="POST" role="form" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label>Tên chap</label>
                    <input class="form-control" placeholder="Tên chap" name="name" type="text" autofocus value="<?php echo $cur_chap['chap_name']?>">
                </div>
                <button type="submit" class="btn btn-success" name="sbm"><i class="fas fa-check"></i> Save</button>
            </fieldset>
        </form>
    </div>
</div>


