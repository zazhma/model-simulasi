<?php
    require_once('../config/koneksi.php');

    if (isset($_GET['no_antrian'])) {
    $no_antrian  = $_GET['no_antrian'];
    $sql = $conn->prepare("DELETE FROM customer WHERE no_antrian=?");
    $sql->bind_param('i', $no_antrian);
    $sql->execute();
    if ($sql) {
        echo json_encode(array('RESPONSE' => 'SUCCESS'));
        header("location:../readapi/tampil.php");
    } else {
        echo json_encode(array('RESPONSE' => 'FAILED'));
    }
    } else {
    echo "GAGAL";
}
