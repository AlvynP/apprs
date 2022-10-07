<?php 
session_start();

require 'functions.php';


if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	if( $key === hash('sha256', $row['username']) ) { $_SESSION['login'] = true; }
}



if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}



if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

	if( mysqli_num_rows($result) === 1 ) {

		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			$_SESSION["login"] = true;



					if( isset($_POST['remember']) ) {
						setcookie('id', $row['id'], time()+30);
						setcookie('key', hash('sha256', $row['username']), time()+30);
					}



			header("Location: datapasien");
			exit;
		}
	}

	$error = true;

}

 ?>
<!DOCTYPE html>
<html>
<html lang="en" id="home">
<head>


<meta charset="utf-8" />
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/css/output.css">
    <link rel="stylesheet" href="logincss/style.css">
</head>
<body class="bg-dark">



	<div class="flex flex-wrap justify-center">
          <div class="mb-5 p-4 md:w-1/3 ">
            <div class="rounded-md shadow-md overflow-hidden">
              <img class="lg:mx-auto" src="public/doc/ap.png" alt="Alvyn Papalia" width="200" />
            </div>
          </div>
	</div>

<section class="">
	<div class="container pt-5 text-slate-200 text-base">

	

	<div class="w-full px-4 lg:w-2/3 lg:mx-auto">
	<div class="wrap pt-3">
		<div class="typing">
			<h1 class="text-center text-3xl">Alvyn Papalia</h1>
		</div>
	</div>
			<p class="text-center">Homeless | Content Creator</p>
			<h3 class="text-center font-bold text-2xl">Login</h3>

<div class="">
	
	<div class="">


				<?php if( isset($error) ) : ?>
					<p style="color: red; font-style: italic">username / password salah</p>
					<p style="font-style: italic"><strong class="color">silahkan masukan kembali username / password anda. atau <a href="registrasi.php" style="color: black;">Registrasi</a> terlebih dahulu!</strong></p>
				<?php endif; ?>

				<form action="" method="post">
				  <div class="mb-3 form-group">
				    <label for="username" class="text-base font-bold text-primary">Username</label>
				    <input type="text" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" id="username" name="username" autofocus placeholder="Email" required autocomplete="off">
				  </div>
				  <div class="mb-3 form-group ">
				    <label for="password" class="text-base font-bold text-primary">Password</label>
				    <input type="password" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" id="password" name="password" placeholder="Password" required autocomplete="off">
				  </div>

				  <div class="checkbox">
				    <label class="form-label">
				      <input type="checkbox" name="remember" id="remember"> Remember Me
				    </label>
				  </div>
				  <!-- <button type="submit" class="d-grid gap-2 btn btn-primary" name="login">Submit</button> -->

				  <div class="d-grid gap-2 pt-2">
					<button class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500" type="submit" name="login">Login</button>
				</div>
				</form>


	</div>			
		
	</div>

	</div>
	</div>
</section>

<div class="">
	
</div>

<script src="js/jquery-3.6.1.min.js"></script>

<script src="js/bootstrap.min.js"></script>

	

</body>
</html>