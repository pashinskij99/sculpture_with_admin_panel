<?php

require_once 'connect.php';

function connect () {
    $conn = mysqli_connect('localhost', 'root', '', 'sculpture');
    if(!$conn) {
        die("Connection failed" . mysqli_connect_error());
    }
    return $conn;
}

function init () {
    $conn = connect();
    $sql = "SELECT * FROM `variables` WHERE 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}
