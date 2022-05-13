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

    $data = http_request("http://localhost/dbpegadaian/api/admin/api_admin_tampil.php");
    $data = json_decode($data, TRUE); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tampil Data Admin</title>
        <link rel="stylesheet" href="http://localhost/dbpegadaian/readapi/layout/css/gaya.css">
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
    <br><br><br><br><br><br>

    <div class="container-fluid">
      <div class="container">
      <table class="table table-striped" style="width:100%">
        <tr class="text-center bg-success text-light">
          <th>ID</th>
          <th>Nama </th>
          <th>Username</th>
          <th>Email</th>
          <th>Password</th>
          <th>Aksi</th>
        </tr>
        <?php foreach ($data as $data) { ?>
        <tr class="table-success">
          <td class="text-center">
            <?= $data["id"] ?>
          </td>
          <td>
            <?= $data["nama"] ?>
          </td>
          <td>
            <?= $data["username"] ?>
          </td>
          <td>
            <?= $data["email"] ?>
          </td>
          <td>
            <?= $data["password"] ?>
          </td>        
          <td colspan="2" class="text-center"> 
            <a href="http://localhost/dbpegadaian/readapi/admin/edit_admin.php?id=<?= $data['id'] ?>">Edit</a> 
            <a href="http://localhost/dbpegadaian/api/admin/api_admin_hapus.php?id=<?= $data['id'] ?>">Hapus</a> 
          </td>
        </tr>
        <?php } ?>
      </table>
      </div>
    </div>
  </body>
</html>