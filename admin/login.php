<!DOCTYPE html>
<html>
	
	<title>Login</title>
	<?php
		include_once('head.php');
	?>

<body>
	
	<div class="row justify-content-center">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<img src="images/Taihen.png">
				<div class="panel-heading">Administrator</div>
				<div class="panel-body">
					<?php
						if(!isset($connect)){
							include_once('config/connection.php');
						}
						if(isset($_SESSION['account'])){
							header('location: admin.php');
						}
						if(isset($_POST['sbm'])){
							$account = $_POST['mail'];
							$pass = $_POST['pass'];	

							if($account && $pass){
								$sql_danh_sach = "select * from account where email = '$account' and password = '$pass';";
								$data_sql = mysqli_query($connect, $sql_danh_sach);
		
								if(mysqli_fetch_array($data_sql)){
									$_SESSION['account'] = $account;
									$_SESSION['pass'] = $pass;
									header('location: index.php');
								}else{
									$error = '<div class="alert alert-danger">Thông tin đăng nhập không hợp lệ !</div>';
									echo $error;
								}
							}else{
								$error = '<div class="alert alert-danger">Không được để trống thông tin !</div>';
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
							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div> -->
							<button type="submit" class="btn btn-primary" name="sbm">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
    </div><!-- /.row -->	
    
	<?php
		include_once('js.php');
	?>
</body>

</html>
