<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> / User</li>
        <li class=""> / Thêm User</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Thêm User</h1> 
    </div>
</div>
<div class="row add_user">
    <div class="col-6">
        <?php
            if(!isset($connect)){
                include_once('config/connection.php');
            }
            if(isset($_POST['sbm'])){
                $account = $_POST['mail'];
                $pass = $_POST['pass'];	
                $repass = $_POST['repass']; 

                if($account && $pass && $repass){
                    $sql_danh_sach = "select * from account where email = '$account';";
                    $data_sql = mysqli_query($connect, $sql_danh_sach);

                    if(mysqli_num_rows($data_sql) == 0){
                        if($pass == $repass){
                            $acc = mysqli_fetch_array(mysqli_query($connect, 'SELECT * FROM account ORDER BY accID DESC LIMIT 1'));
                            $ID = $acc['accID'] + 1;
                            if(mysqli_query($connect, "INSERT INTO account (accID, email, password) VALUES ($ID, '$account', '$pass')")){
                                
                                $_DATA['user'] = mysqli_query($connect, "SELECT * FROM account");
                                
                                $error = '<div class="alert alert-danger">Thêm user thành công!</div>';
                                echo $error;
                            }else {
                                echo 'ERROR';
                            }
                            
                        }else{
                            $error = '<div class="alert alert-danger">Mật khẩu không khớp!</div>';
                            echo $error;
                        }
                    }else{
                        $error = '<div class="alert alert-danger">Tài khoản đã tồn tại!</div>';
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
                    <input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Xác nhận mật khẩu" name="repass" type="password" value="">
                </div>
                <button type="submit" class="btn btn-success" name="sbm">Thêm user</button>
            </fieldset>
        </form>
    </div>
    
      
</div>