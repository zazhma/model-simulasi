<?php
    require_once('../config/koneksi.php');
    if (isset($_POST['nik']) && isset($_POST['nama']) && isset($_POST['no_tlp']) && isset($_POST['keterangan']) && isset($_POST['jam_perkiraan'])) {
    $nik    = $_POST['nik'];
    $nama    = $_POST['nama'];
    $no_tlp  = $_POST['no_tlp'];
    $keterangan    = $_POST['keterangan'];
    $jam_perkiraan    = $_POST['jam_perkiraan'];
    $sql = $conn->prepare("INSERT INTO customer (nik, nama, no_tlp, keterangan, jam_perkiraan) VALUES (?, ?, ?, ?, ?)");

    $sql->bind_param('sssss', $nik, $nama, $no_tlp, $keterangan, $jam_perkiraan);
    $sql->execute();
    if ($sql) {
    echo json_encode(array('RESPONSE' => 'FAILED'));
    //echo json_encode(array('RESPONSE' => 'SUCCESS'));
    header("location:../readapi/tampil.php");
        }
    } 
    else {
    echo "GAGAL";
    }
 ?>