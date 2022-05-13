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
    $data = json_decode($data, TRUE); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tampil Data Customer</title>
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
              <a class="nav-link font-weight-bold" href="../pages/welcome.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold" href="../readapi/tampil.php">Customer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold" href="../readapi/cetak.php">Cetak Laporan Antrian</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold" href="../readapi/admin/tampil_admin.php">Admin</a>
            </li>
          </ul>
          <b>🙎‍♂️<?php echo "Selamat Datang, " . $_SESSION['username'] ."!"; ?></b>
            <a class="nav-link font-weight-bold" href="http://localhost/dbpegadaian/pages/logout.php">↻Logout</a>
        </div>
      </nav>
    </div>
    <br><br><br><br><br><br>

    <div class="container-fluid">
        <div class="container">
            <h4>
                <a href="../readapi/tambah.php" class="badge badge-success">Tambah Data</a>
            </h4>
        </div>
        <br>
        <div class="container">
        <table class="table table-striped" style="width:100%">
            <tr class="text-center bg-success text-light">
                <th>ANTRIAN</th>
                <th>NIK</th>
                <th>NAMA</th>
                <th>NO HP</th>
                <th>KETERANGAN</th>
                <th>JAM PERKIRAAN</th>
                <th>AKSI</th>
            </tr>
            <?php foreach ($data as $data) { ?>
            <tr class="table-success">
                <td class="text-center">
                    <?= $data["no_antrian"] ?>
                </td>
                <td>
                    <?= $data["nik"] ?>
                </td>
                <td>
                    <?= $data["nama"] ?>
                </td>
                <td>
                    <?= $data["no_tlp"] ?>
                </td>
                <td>
                    <?= $data["keterangan"] ?>
                </td>
                <td class="text-center">
                    <?= $data["jam_perkiraan"] ?>
                </td>
                               
                <td colspan="2" class="text-center"> 
                    <a href="../api/api_hapus.php?no_antrian=<?= $data['no_antrian'] ?>">Hapus</a>
                </td>
            </tr>
            <?php } ?>
            </table>
        </div>       
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>