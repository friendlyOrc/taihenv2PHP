<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> / Random pic</li>
        <li class=""> / Thêm pic</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Thêm pic</h1> 
    </div>
</div>
<div class="row add_user">
    <div class="col-6">
        <?php
            if(!isset($connect)){
                include_once('config/connection.php');
            }

            if(isset($_POST['sbm'])){

                $pics = $_FILES['pics']['name'];

                if($pics[0]){
                    
                    $tmp_paths = $_FILES['pics']['tmp_name'];
                    $ID = 1;
                    if($pic_raw = mysqli_query($connect, "SELECT * FROM pic  ORDER BY pic_ID DESC LIMIT 1")){
                        $pic = mysqli_fetch_array($pic_raw);
                        $ID = $pic['pic_ID'] + 1;
                    };
                    // echo $ID;

                    $page = count($pics);

                    
                    for($i = 0; $i < $page; $i++){
                        if(!move_uploaded_file($tmp_paths[$i], 'images/pic/'.$ID.'.jpg')){
                            die('Failed to upload...');
                        }
                        
                        if(mysqli_query($connect, "INSERT INTO pic (pic_ID, pic_name) VALUES ($ID, '$ID.jpg')")){
                            $ID++;
                        }else {
                            echo 'ERROR';
                        }
                    }
                    $_DATA['article'] = mysqli_query($connect, "SELECT * FROM category");
                    $error = '<div class="alert alert-danger">Thêm pic thành công!</div>';
                    echo $error;
                      
                }else{
                    $error = '<div class="alert alert-danger">Không được để trống thông tin!</div>';
                    echo $error;
                }
            }
        ?>
        <form method="POST" role="form" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label for="example-input-file">Load pics</label>
                    <input type="file" name="pics[]" multiple id="input-many-files" class="form-control-file border">
                </div>
                <button type="submit" class="btn btn-success" name="sbm">Thêm picture</button>
            </fieldset>
        </form>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="preview-images"></div>
        </div>
    </div>
      
</div>
<style>
    div.preview-images>img {
        width: 30%;
    }
</style>


