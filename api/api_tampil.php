<?php
    require_once('../config/koneksi.php');
    $myArray = array();
    if ($result = mysqli_query($conn, "SELECT * FROM customer ORDER BY no_antrian ASC")) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
    mysqli_close($conn);
    echo json_encode($myArray);
    }
?>