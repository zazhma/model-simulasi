<?php 
 
 session_start();
  
 if (!isset($_SESSION['username'])) {
     header("Location: welcome.php");
 }
  
?>  
<?php
    function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

    $data = http_request("http://localhost/dbpegadaian/api/api_tampil.php");
    $data = json_decode($data, TRUE); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Customer</title>
    <link rel="stylesheet" href="layout/css/gaya.css"> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="img/png" href="http://localhost/dbpegadaian/readapi/layout/css/gambar/logo-pegadaian.png">
  </head>

  <body>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#"><img class="img img-responsive" src="http://localhost/dbpegadaian/readapi/layout/css/gambar/pegadaian-logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="http://localhost/dbpegadaian/pages/welcome.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold" href="http://localhost/dbpegadaian/readapi/tampil.php">Customer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold" href="http://localhost/dbpegadaian/readapi/cetak.php">Cetak Laporan Antrian</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold" href="http://localhost/dbpegadaian/readapi/admin/tampil_admin.php">Admin</a>
            </li>
          </ul>
          <b>🙎‍♂️<?php echo "Selamat Datang, " . $_SESSION['username'] ."!"; ?></b>
            <a class="nav-link font-weight-bold" href="http://localhost/dbpegadaian/pages/logout.php">↻Logout</a>
        </div>
      </nav>
    </div>

    <br><br>
    <br><br>
    <br><br>

    <div class="container">
      <h4>
        <a href="../readapi/tampil.php" class="badge badge-success">Kembali</a>
      </h4>
    </div>
    <div class="container w-100 transp text-light rounded">
	    <form class="form-container p-5" action="http://localhost/dbpegadaian/api/api_tambah.php" method="POST" id="form">
		    <div>
		        <h3 class="text-light text-center"><b>Tambah Data Customer</b></h3>
		    </div>
		    <hr class="bg-light">
		    <div class="form-group">
			    <label for="">NIK</label>
			    <input type="text" class="form-control" name="nik" id="nik" aria-describedby="helpId" placeholder="NIK">
		    </div>
		    <div class="form-group">
			    <label for="">Nama Lengkap</label>
			    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Nama Lengkap">
		    </div>
        <div class="form-group">
			    <label for="">Nomor HP</label>
			    <input type="text" class="form-control" name="no_tlp" id="no_tlp" aria-describedby="helpId" placeholder="08XX XXXX XXXX">
		    </div>
        <div class="form-group">
			    <label for="">Keterangan</label>
			    <input type="text" class="form-control" name="keterangan" id="keterangan" aria-describedby="helpId" placeholder="Keterangan yang lengkap">
		    </div>
        <div class="form-group">
			    <label for="">Jam Perkiraan</label>
			    <input type="text" class="form-control" name="jam_perkiraan" id="jam_perkiraan" aria-describedby="helpId" placeholder="YYYY/MM/DD 00.00">
		    </div>
        <br>
        <button type="submit" name="submit" class="btn btn-outline-light btn-lg btn-block">Simpan</button>
	    </form>
	  </div>
    <br>
  </body>
</html>