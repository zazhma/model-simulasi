<?php
    require_once('C:\xampp\htdocs\dbpegadaian\config\koneksi.php');
    $myArray = array();
    if ($result = mysqli_query($conn, "SELECT * FROM users ORDER BY id ASC")) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
    mysqli_close($conn);
    echo json_encode($myArray);
    }
?>