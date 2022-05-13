<?php
//menyertakan file program koneksi.php pada register
require('../config/koneksi.php');
//inisialisasi session
session_start();
 
$error = '';
$validate = '';
//mengecek apakah form registrasi di submit atau tidak
if( isset($_POST['submit']) ){
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($conn, $username);
        $nama     = stripslashes($_POST['nama']);
        $nama     = mysqli_real_escape_string($conn, $nama);
        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $repass   = stripslashes($_POST['repass']);
        $repass   = mysqli_real_escape_string($conn, $repass);
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($nama)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))){
            //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
            if($password == $repass){
                //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
                if( cek_nama($nama,$conn) == 0 ){
                    //hashing password sebelum disimpan didatabase
                    $pass  = password_hash($password, PASSWORD_DEFAULT);
                    //insert data ke database
                    $query = "INSERT INTO users (username,nama,email, password ) VALUES ('$username','$nama','$email','$pass')";
                    $result   = mysqli_query($conn, $query);
                    //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                    if ($result) {
                        $_SESSION['username'] = $username;
                        
                        header('Location: login.php');
                     
                    //jika gagal maka akan menampilkan pesan error
                    } else {
                        $error =  'Register User Gagal !!';
                    }
                }else{
                        $error =  'Username sudah terdaftar !!';
                }
            }else{
                $validate = 'Password tidak sama !!';
            }
             
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
    } 
    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($username,$conn){
        $nama = mysqli_real_escape_string($conn, $username);
        $query = "SELECT * FROM users WHERE username = '$nama'";
        if( $result = mysqli_query($conn, $query) ) return mysqli_num_rows($result);
    }
?>

<!doctype html>
<html lang="en">
    <head>
    <link rel="icon" type="img/png" sizes="16x16" href="http://localhost/dbpegadaian/readapi/layout/css/gambar//logo-pegadaian.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="http://localhost/dbpegadaian/readapi/layout/css/gaya.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sign Up</title>
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
	    <form class="form-container p-5" action="register.php" method="POST">
		    <div>
		        <h2 class="text-light text-center"><b>SIGN UP</b></h2>
		    </div>
		    <hr class="bg-light">
            <?php if($error != ''){ ?>
            <div class="alert alert-danger" role="alert"><?= $error; ?></div>
            <?php } ?>
		    <div class="form-group">
			    <label for="">Name</label>
			    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="🖋 Enter Name">
		    </div>
		    <div class="form-group">
			    <label for="">Email</label>
			    <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="📧 Enter Email">
		    </div>
            <div class="form-group">
			    <label for="">Username</label>
			    <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="👤 Enter Username">
		    </div>
		    <div class="form-group">
			    <label for="">Password</label>
			    <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="🔐Enter Password">
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
            <div class="form-group">
			    <label for="">Confirm Password</label>
			    <input type="password" class="form-control" name="repass" id="repass" aria-describedby="helpId" placeholder="🔐 Enter Confirm Password">
                <?php if($validate != '') {?>
                    <p class="text-danger"><?= $validate; ?></p>
                <?php }?>
		    </div>
            <br>
            <button type="submit" name="submit" class="btn btn-outline-light btn-lg btn-block">Sign Up</button>
            <br>
		    <div>
			    <p class="text-light">Already have an account? <a href="login.php" class="badge badge-light">Login</a></p>
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