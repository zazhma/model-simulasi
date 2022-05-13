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
        <title>Cetak Data Customer</title>
        <link rel="stylesheet" href="layout/css/gaya.css"> 
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="img/png" href="http://localhost/dbpegadaian/readapi/layout/css/gambar/logo-pegadaian.png">
    </head>

    <body>
		<?php 
		include '../config/test.php';
		?>
    <div class="container-fluid">
    <h3 class="text-center">Data Laporan Antrian Via WhatsApp Pegadaian Bukit Bestari</h3>
    <br>
    <table border="1" style="width: 100%" >
			<tr class="text-center">
                <th>No Antrian</th>
                <th>Nama</th>
                <th>NO HP</th>
                <th>KETERANGAN</th>
                <th>JAM PERKIRAAN</th>
			</tr>
			<?php 
			$no = 1;
			$sql = mysqli_query($koneksi,"select * from customer");
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td class="text-center"><?php echo $data['no_antrian']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['no_tlp']; ?></td>
				<td><?php echo $data['keterangan']; ?></td>
				<td class="text-center"><?php echo $data['jam_perkiraan']; ?></td>
			</tr>
			<?php 
			}
			?>
		</table>
    </div>
		
 
		<script>
			window.print();
		</script>
	</body>
</html>