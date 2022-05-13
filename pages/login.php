<?php
//menyertakan file program koneksi.php pada register
require('../config/koneksi.php');
//inisialisasi session
session_start();
 
$error = '';
$validate = '';
 
//mengecek apakah sesssion username tersedia atau tidak jika tersedia maka akan diredirect ke halaman index

 
//mengecek apakah form disubmit atau tidak
if( isset($_POST['submit']) ){
         
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($conn, $username);
         // menghilangkan backshlases
        $password = stripslashes($_POST['password']);
         //cara sederhana mengamankan dari sql injection
        $password = mysqli_real_escape_string($conn, $password);
        
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($username)) && !empty(trim($password))){
            //select data berdasarkan username dari database
            $query      = "SELECT * FROM users WHERE username = '$username'";
            $result     = mysqli_query($conn, $query);
            $rows       = mysqli_num_rows($result);
            if ($rows != 0) {
                $hash   = mysqli_fetch_assoc($result)['password'];
                if(password_verify($password, $hash)){
                    $_SESSION['username'] = $username;
                
                    header('Location: welcome.php');
                }                     
            //jika gagal maka akan menampilkan pesan error
            } else {
                $error =  'Data yang dimasukkan Salah !!';
            }     
        }else {
            $error =  'Data tidak boleh kosong !!';
        }	
    } 
?>

<!doctype html>
<html lang="en">
    <head>
    <link rel="icon" type="img/png" sizes="16x16" href="http://localhost/dbpegadaian/readapi/layout/css/gambar/logo-pegadaian.png">
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="http://localhost/dbpegadaian/readapi/layout/css/gaya.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sign In</title>
    </head>
    
    <body class="body">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#"><img class="img img-responsive" src="http://localhost/dbpegadaian/readapi/layout/css/gambar/pegadaian-logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold" href="http://localhost/dbpegadaian/pages/login.php">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="http://localhost/dbpegadaian/pages/register.php">Register</a>
                </li>
            </div>
            </nav>
    </div>

	<br><br>
	<br><br>
	<br><br>

	<div class="container w-50 transp text-light rounded">
	    <form class="form-container p-5" action="login.php" method="POST">
		    <div>
		    <h2 class="text-light text-center"><b>LOGIN</b></h2>
		    </div>
		    <hr class="bg-light input-group">
		    <?php if($error != ''){ ?>
                <div class="alert alert-danger" role="alert"><?= $error; ?></div>
            <?php } ?>
		<div class="form-group">
			<label for="username">Username</label>
			<input class="form-control" type="text" name="username" id="username" placeholder="👤 Enter Username" aria-describedby="HelpId">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="🔐 Enter Password"> 
            <input type="checkbox" onclick="myFunction()">Show Password

                    <script>
                    function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                    }
                    </script>

	  			<?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
		</div>
		<button class="btn btn-outline-light btn-lg btn-block" type="submit" name="submit">Login</button>
        <br>
		<div>
			<p class="text-light">Don't have an account? <a href="register.php" class="badge badge-light">Sign up</a></p>
		</div>
	</form>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>