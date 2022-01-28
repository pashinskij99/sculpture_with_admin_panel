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
    $sqlSelectTypeGenerate = "SELECT * FROM `selecttypegenerate` WHERE 1";
    $sqlSelectTexture = "SELECT * FROM `selecttexture` WHERE 1";
    $sqlSelectBackground = "SELECT * FROM `selectbackground` WHERE 1";
    $sqlInputTime = "SELECT * FROM `inputtime` WHERE 1";
    $sqlInputSize = "SELECT * FROM `inputsize` WHERE 1";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sqlSelectTypeGenerate);
    $result3 = mysqli_query($conn, $sqlSelectTexture);
    $result4 = mysqli_query($conn, $sqlSelectBackground);
    $result5 = mysqli_query($conn, $sqlInputTime);
    $result6 = mysqli_query($conn, $sqlInputSize);

    if(mysqli_num_rows($result) > 0) {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    }
    if(mysqli_num_rows($result2) > 0) {
        $out2 = array();
        while ($row = mysqli_fetch_assoc($result2)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out2);
    }
//    if(mysqli_num_rows($result3) > 0) {
//        $out = array();
//        while ($row = mysqli_fetch_assoc($result3)) {
//            $out[$row["id"]] = $row;
//        }
//        echo json_encode($out);
//    }
//    if(mysqli_num_rows($result4) > 0) {
//        $out = array();
//        while ($row = mysqli_fetch_assoc($result4)) {
//            $out[$row["id"]] = $row;
//        }
//        echo json_encode($out);
//    }
//    if(mysqli_num_rows($result5) > 0) {
//        $out = array();
//        while ($row = mysqli_fetch_assoc($result5)) {
//            $out[$row["id"]] = $row;
//        }
//        echo json_encode($out);
//    }
//    if(mysqli_num_rows($result6) > 0) {
//        $out = array();
//        while ($row = mysqli_fetch_assoc($result6)) {
//            $out[$row["id"]] = $row;
//        }
//        echo json_encode($out);
//    }
    mysqli_close($conn);
}
