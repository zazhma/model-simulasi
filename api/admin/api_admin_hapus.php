<?php
    require_once('C:/xampp/htdocs/dbpegadaian/config/koneksi.php');

    if (isset($_GET['id'])) {
    $no  = $_GET['id'];
    $sql = $conn->prepare("DELETE FROM users WHERE id=?");
    $sql->bind_param('i', $id);
    $sql->execute();
    if ($sql) {
        echo json_encode(array('RESPONSE' => 'SUCCESS'));
        header("location:http://localhost/dbpegadaian/readapi/admin/tampil_admin.php");
    } else {
        echo json_encode(array('RESPONSE' => 'FAILED'));
    }
    } else {
    echo "GAGAL";
}
