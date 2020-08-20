<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> / Article</li>
        <li class=""> / Thêm Chapter</li>
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
            $ar_ID = $_GET['id'];

            if(isset($_POST['sbm'])){
                $name = $_POST['name'];

                $pics = $_FILES['pics']['name'];
                $tmp_paths = $_FILES['pics']['tmp_name'];

                if($name && $pics[0]){
                    $sql_danh_sach = "select * from chapter where chap_name = '$name' and ar_ID = $ar_ID;";
                    $data_sql = mysqli_query($connect, $sql_danh_sach);

                    if(mysqli_num_rows($data_sql) == 0){
                        $ID = 1;
                        if($chap_raw = mysqli_query($connect, "SELECT * FROM chapter WHERE ar_ID = $ar_ID ORDER BY chap_ID DESC LIMIT 1")){
                            $chap = mysqli_fetch_array($chap_raw);
                            $ID = $chap['chap_ID'] + 1;
                        };
                        // echo $ID;

                        $page = count($pics);
                        // echo $page;
                        if(mysqli_query($connect, "INSERT INTO chapter (chap_ID, ar_ID, chap_name, chap_page, chap_date) VALUES ($ID, $ar_ID, '$name', $page, utc_date())")){
                            
                            if (!mkdir('images/chapter/'.$ar_ID.'/'.$ID, 0777)) {
                                die('Failed to create folders...');
                            }
                            for($i = 0; $i < $page; $i++){
                                if(!move_uploaded_file($tmp_paths[$i], 'images/chapter/'.$ar_ID.'/'.$ID.'/'.$pics[$i])){
                                    die('Failed to upload...');
                                }
                            }
                            $cur_ar = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM article WHERE ar_ID = $ar_ID"));

                            $chap_num = $cur_ar['ar_chap_num'] + 1;

                            if(!mysqli_query($connect, "UPDATE article SET ar_chap_num = $chap_num WHERE ar_ID = $ar_ID")){
                                die('Fail to update chap num');
                            }
                            
                            if(!mysqli_query($connect, "UPDATE article SET ar_date = utc_date() WHERE ar_ID = $ar_ID")){
                                die('Fail to update article date');
                            }

                            $_DATA['article'] = mysqli_query($connect, "SELECT * FROM category");
                            $error = '<div class="alert alert-danger">Thêm chapter thành công!</div>';
                            echo $error;
                        }else {
                            echo 'ERROR';
                        }
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
                    <input class="form-control" placeholder="Tên chap" name="name" type="text" autofocus>
                </div>
                <div class="form-group">
                    <label for="example-input-file">Load pages</label>
                    <input type="file" name="pics[]" multiple id="input-many-files" class="form-control-file border">
                </div>
                <button type="submit" class="btn btn-success" name="sbm">Thêm chapter</button>
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


