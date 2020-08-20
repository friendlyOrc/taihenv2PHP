<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> / Article</li>
        <li class=""> / Thêm Article</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Thêm Article</h1> 
    </div>
</div>
<div class="row add_user">
    <div class="col-6">
        <?php
            if(!isset($connect)){
                include_once('config/connection.php');
            }
            if(isset($_POST['sbm'])){
                $name = $_POST['name'];
                $des = $_POST['des'];	
                $stt = $_POST['stt'];
                $cate = $_POST['cate'];

                $pic = $_FILES['pic']['name'];
                $tmp_path = $_FILES['pic']['tmp_name'];

                if($name && $des && $cate && $pic[0]){
                    $sql_danh_sach = "select * from article where ar_name = '$name';";
                    $data_sql = mysqli_query($connect, $sql_danh_sach);

                    if(mysqli_num_rows($data_sql) == 0){
                        $ar = mysqli_fetch_array(mysqli_query($connect, 'SELECT * FROM article ORDER BY ar_ID DESC LIMIT 1'));
                        $ID = $ar['ar_ID'] + 1;

                        if(mysqli_query($connect, "INSERT INTO article (ar_ID, ar_name, ar_des, ar_pic, ar_chap_num, ar_view, ar_date, ar_stt) VALUES ($ID, '$name', '$des', '$pic', 0, 0, utc_date(), $stt)")){
                            foreach($cate as $cat_ID){
                                mysqli_query($connect, "INSERT INTO ar_cat(ar_ID, cat_ID) VALUES ($ID, $cat_ID)");
                            }
                            $_DATA['article'] = mysqli_query($connect, "SELECT * FROM category");
                            if(!move_uploaded_file($tmp_path, 'images/article/'.$pic)){
                                die('Failed to upload...');
                            }
                            if (!mkdir('images/chapter/'.$ID, 0777)) {
                                die('Failed to create folders...');
                            }
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
        <form method="POST" role="form" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label>Tên truyện</label>
                    <input class="form-control" placeholder="Tên truyện" name="name" type="text" autofocus>
                </div>
                <div class="form-group">
                    <label>Ảnh bìa</label>
                    <input class="form-control-file" name="pic" type="file" id="input-file" onchange="handleFiles(this.files)">
                </div>
                
                <div class="form-group">
                    <label>Mô tả</label>
                    <input class="form-control" placeholder="Mô tả" name="des" type="text" value="">
                </div>
                <div class="form-group">
                    <label>Loại</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stt" id="stt1" value="1" checked>
                        <label class="form-check-label" for="gridRadios1">
                            One shot
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="stt" id="stt2" value="0">
                        <label class="form-check-label" for="gridRadios2">
                            Nhiều tập
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select require class="form-control selectpicker" multiple data-live-search="true" name="cate[]">
                        <?php while($row = mysqli_fetch_array($_DATA['category'])){ ?>
                            <option value="<?php echo $row['cat_ID']?>"> <?php echo $row['cat_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success" name="sbm">Thêm Article</button>
            </fieldset>
        </form>
    </div>
    <div class="col-sm-6">
        <img src="#" id="preview-images"/>
    </div>
    
      
</div>
<style>
    img#preview-images {
        width: 100%;
    }
</style>

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