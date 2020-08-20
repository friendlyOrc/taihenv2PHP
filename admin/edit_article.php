<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> / Article</li>
        <li class=""> / Sửa Article</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Sửa Article</h1> 
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

            $cate_list_sql = mysqli_query($connect, "SELECT * FROM ar_cat WHERE ar_ID = ".$_GET['id']);

            $cate_list = [];
            $i = 0;
            while($row = mysqli_fetch_array($cate_list_sql)){
                $cate_list[$i] = $row['cat_ID'];
                $i++;
            }
            if(isset($_POST['sbm'])){
                $name = $_POST['name'];
                $des = $_POST['des'];	
                $stt = $_POST['stt'];
                $cate = $_POST['cate'];

                $pic = $_FILES['pic']['name'];
                $tmp_path = $_FILES['pic']['tmp_name'];

                if($name && $des && $cate){
                    $sql_danh_sach = "select * from article where ar_name = '$name';";
                    $data_sql = mysqli_query($connect, $sql_danh_sach);

                    if(mysqli_num_rows($data_sql) == 0 || $name == $cur_ar['ar_name']){
                        if($pic){
                            delete_files('images/article/'.$cur_ar['ar_pic']);
                            if(!move_uploaded_file($tmp_path, 'images/article/'.$pic)){
                                die('Failed to upload...');
                            }
                            if(!mysqli_query($connect, "UPDATE article SET ar_pic = '$pic' WHERE ar_ID = ".$cur_ar['ar_ID'])){
                                die('Fail to update pic');
                            }
                        }
                        if($name != $cur_ar['ar_name']){
                            if(!mysqli_query($connect, "UPDATE article SET ar_name = '$name' WHERE ar_ID = ".$cur_ar['ar_ID'])){
                                die('Fail to update name');
                            }
                        }
                        if($des != $cur_ar['ar_des']){
                            if(!mysqli_query($connect, "UPDATE article SET ar_Des = '$des' WHERE ar_ID = ".$cur_ar['ar_ID'])){
                                die('Fail to update des');
                            }
                        }
                        if($stt != $cur_ar['ar_stt']){
                            if(!mysqli_query($connect, "UPDATE article SET ar_stt = '$stt' WHERE ar_ID = ".$cur_ar['ar_ID'])){
                                die('Fail to update stt');
                            }
                        }
                        if(!mysqli_query($connect, "DELETE FROM ar_cat WHERE ar_ID = ".$cur_ar['ar_ID'])){
                            die('Fail to dql cat');
                        }
                        foreach($cate as $cat_ID){
                            if(!mysqli_query($connect, "INSERT INTO ar_cat(ar_ID, cat_ID) VALUES (".$cur_ar['ar_ID'].", $cat_ID)")){
                                die('Fail to update cat');
                            }
                        }                            
                        $cur_ar = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM article WHERE ar_ID = ".$_GET['id']));
                        $error = '<div class="alert alert-danger">Sửa article thành công!</div>';
                        echo $error;
                    }else{
                        $error = '<div class="alert alert-danger">Article đã tồn tại!</div>';
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
                    <label>Tên truyện</label>
                    <input class="form-control" placeholder="Tên truyện" name="name" type="text" autofocus value="<?php echo $cur_ar['ar_name']?>">
                </div>
                <div class="form-group">
                    <label>Ảnh bìa</label>
                    <input class="form-control-file" name="pic" type="file" id="input-file" onchange="handleFiles(this.files)" value="<?php echo $cur_ar['ar_pic']?>">
                </div>
                
                <div class="form-group">
                    <label>Mô tả</label>
                    <input class="form-control" placeholder="Mô tả" name="des" type="text" value="<?php echo $cur_ar['ar_des']?>">
                </div>
                <div class="form-group">
                    <label>Loại</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stt" id="stt1" value="1" <?php if($cur_ar['ar_stt'] == 1) echo 'checked'?>> 
                        <label class="form-check-label" for="gridRadios1">
                            One shot
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stt" id="stt2" value="0" <?php if($cur_ar['ar_stt'] == 0) echo 'checked'?>>
                        <label class="form-check-label" for="gridRadios2">
                            Nhiều tập
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control selectpicker" multiple data-live-search="true" name="cate[]">
                    <?php while($row = mysqli_fetch_array($_DATA['category'])){ ?>
                            <option value="<?php echo $row['cat_ID']?>" <?php if($cate_list){ if(in_array($row['cat_ID'], $cate_list)) echo ' selected';}?>> <?php echo $row['cat_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success" name="sbm"><i class="fas fa-check"></i> Save</button>
            </fieldset>
        </form>
    </div>
    <div class="col-sm-6">
        <img src="images/article/<?php echo $cur_ar['ar_pic']?>" id="preview-images"/>
    </div>
    
      
</div>
<style>
    img#preview-images {
        width: 100%;
    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $('select').selectpicker();

    function handleFiles(files){
        let reader = new FileReader();
        reader.onload = function(event) {
            $('#preview-images')
                    .attr('src', event.target.result);
        }
        reader.readAsDataURL(files[0]);
    }

</script>