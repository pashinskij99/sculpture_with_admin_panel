<?php
require_once 'connect.php';

$checkbox = $_POST['all'];

$allBase = mysqli_query($connect, "SELECT `id`, `title`, `value`, `checked` FROM `variables` WHERE 1");

while($row = mysqli_fetch_array($allBase)){
    $id=$row['id'];
    $title=$row['title'];
    $value=$row['value'];
    $checked=$row['checked'];
    mysqli_query($connect, "UPDATE `variables` SET `checked`=0, `value`=0 WHERE 1");
}

$stateChacked = 'checked';

foreach ($checkbox as $key => $value) {
    echo $key, $value, "<br>";
    $keyToStr = strval($key);
    mysqli_query($connect, "UPDATE `variables` SET `checked`=1 WHERE `id`=$value");
}

echo print_r( $checkbox );




