<?php
    require_once('C:\xampp\htdocs\dbpegadaian\config\koneksi.php');
    if (isset($_POST['id'])) {
    $id          = $_POST['id'];
    $nama        = $_POST['nama'];
    $username    = $_POST['username'];
    $email    = $_POST['email'];
    $password    = $_POST['password'];
    $sql = $conn->prepare("UPDATE users SET nama=?, username=?, email=?, password=? WHERE id=?");
    $sql->bind_param('sssss', $nama, $username, $email, $password, $id);
    $sql->execute();
    if ($sql) {
    }
        echo json_encode(array('RESPONSE' => 'SUCCESS'));
        header("location:http://localhost/dbpegadaian/readapi/admin/tampil_admin.php");
        echo json_encode(array('RESPONSE' => 'FAILED'));
    } else {
        echo "GAGAL";
    }