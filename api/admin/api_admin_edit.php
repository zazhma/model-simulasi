<?php
    require_once('C:/xampp/htdocs/dbpegadaian/config/koneksi.php');
    if (isset($_GET['id'])) {
    $SQL = $conn->prepare("SELECT * FROM users WHERE id=? ORDER BY id ASC");
    $id = $_GET['id'];
    $SQL->bind_param("i", $id);
    $SQL->execute();

    $myArray = array();
    $hasil = $SQL->get_result();
    
    while ($users = $hasil->fetch_array(MYSQLI_ASSOC)) {
        $myArray = $users;
    }
    echo json_encode($myArray);
    } else {
    echo "data tidak ditemukan";
}
   