<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> / User</li>
        <li class=""> / Edit User</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Edit User</h1> 
    </div>
</div>
<div class="row add_user">
    <div class="col-6">
        <?php
            if(!isset($connect)){
                include_once('config/connection.php');
            }
            $cur_acc = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM account WHERE accID = ".$_GET['id']));
            if(isset($_POST['sbm'])){
                $account = $_POST['mail'];
                $pass = $_POST['pass'];	
                $repass = $_POST['repass']; 

                if($account && $pass && $repass){
                    $sql_danh_sach = "select * from account where email = '$account';";
                    $data_sql = mysqli_query($connect, $sql_danh_sach);

                    if(mysqli_num_rows($data_sql) == 0 || $account == $cur_acc['email']){
                        if($pass == $repass){
                            if(mysqli_query($connect, "UPDATE account SET email = '$account', password = '$pass' WHERE accID = ".$cur_acc['accID'])){
                                
                                $_DATA['user'] = mysqli_query($connect, "SELECT * FROM account");
                                $cur_acc = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM account WHERE accID = ".$_GET['id']));
                                
                                $error = '<div class="alert alert-danger">Cập nhật user thành công!</div>';
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
                    <input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus value="<?php echo $cur_acc['email']?>">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="<?php echo $cur_acc['password']?>">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Xác nhận mật khẩu" name="repass" type="password" value="<?php echo $cur_acc['password']?>">
                </div>
                <button type="submit" class="btn btn-success" name="sbm"><i class="fas fa-check"></i> Save</button>
            </fieldset>
        </form>
    </div>
    
      
</div>