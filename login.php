<?php
	@ob_start();
	session_start();
	if(isset($_POST['proses'])){
		require 'config.php';
			
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);

		$sql = 'select member.*, login.user, login.pass
				from member inner join login on member.id_member = login.id_member
				where user =? and pass = md5(?)';
		$row = $config->prepare($sql);
		$row -> execute(array($user,$pass));
		$hasil = $row -> fetch();
		$jum = $row -> rowCount();
		
		if($jum > 0){
			$_SESSION['admin'] = $hasil;
			echo '<script>alert("Login Sukses");window.location="index.php"</script>';
		}
		elseif ($user == "" || $pass == "") {
			echo '<script>alert("Username dan password tidak boleh kosong");history.go(-1);</script>';
		}
		elseif ($user != $hasil['user']) {
			echo '<script>alert("Username salah");history.go(-1);</script>';
		}
		elseif ($pass != $hasil['pass']) {
			echo '<script>alert("Password salah");history.go(-1);</script>';
		}
		else{
			echo '<script>alert("Login Gagal");history.go(-1);</script>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<center>

<body style="background: #518DB9;">
    <div class="container mt-4">

        <!-- Outer Row -->
		<img src="assets/img/AH.png" width="300px" height="83px" alt="" class="mt-5">
        <div class="row justify-content-center">
			
            <div class="col-md-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
						<div class="p-5">
							<div class="text-center">
								<h4 class="h4 text-gray-900 mb-4"><b>Login</b></h4>
							</div>
							<form class="form-login" method="POST">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" name="user"
										placeholder="User ID" autofocus>
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-control-user" name="pass"
										placeholder="Password">
								</div>
								<button class="btn btn-primary btn-block" name="proses" type="submit"><i
										class="fa fa-lock"></i>
									SIGN IN</button>
								
							</form>
							<hr>
							<div class="text-center">
								<a class="small" href="forgot-password.html">Forgot Password?</a>
								<a class="small" href="register.html">Create an Account!</a>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>

		<div class="row justify-content-center">
            <div class="col-md-5">
				<p class="text-white">&#169 2022 Al-Hanif - All Rights Reserved</p>
			</div>
		</div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="sb-admin/js/sb-admin-2.min.js"></script>
</body>
</html>