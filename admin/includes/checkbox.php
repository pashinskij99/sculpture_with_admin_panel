<?php
require_once 'connect.php';

if(isset($_POST['all']))
{
    $checkbox = $_POST['all'];
}
if(isset($_POST["typeGenerate"]))
{
    $typesGenerate = $_POST["typeGenerate"];
}
if(isset($_POST["background"]))
{
    $background = $_POST["background"];
}
if(isset($_POST["texture"]))
{
    $texture = $_POST["texture"];
}
if(isset($_POST["size"]))
{
    $size = $_POST["size"];
}
if(isset($_POST["time"]))
{
    $time = $_POST["time"];
}

$allBase = mysqli_query($connect, "SELECT `id`, `title`, `value`, `checked` FROM `variables` WHERE 1");

while($row = mysqli_fetch_array($allBase)){
    $id=$row['id'];
    $title=$row['title'];
    $value=$row['value'];
    $checked=$row['checked'];
    mysqli_query($connect, "UPDATE `variables` SET `checked`=0, `value`=0 WHERE 1");
}
if(isset($checkbox)) {
    foreach ($checkbox as $key => $value) {
        $keyToStr = strval($key);
        mysqli_query($connect, "UPDATE `variables` SET `checked`=1 WHERE `id`=$value");
    }
    header('Location: /sculpture(pash)/admin/content.php');
} else {
    mysqli_query($connect, "UPDATE `variables` SET `checked`=0 WHERE 1");
    header('Location: /sculpture(pash)/admin/content.php');
}

if(isset($typesGenerate)) {
    foreach ($typesGenerate as $key => $value) {
        if($value === 'default') {
            mysqli_query($connect, "UPDATE `selecttypegenerate` SET `type`='default' WHERE 1");
        } else if ($value === 'time') {
            mysqli_query($connect, "UPDATE `selecttypegenerate` SET `type`='time' WHERE 1");
        }
    }
}
if(isset($background)) {
    foreach ($background as $key => $value) {
        if($value === 'Room I') {
            mysqli_query($connect, "UPDATE `selectbackground` SET `background`='Room I' WHERE 1");
        } else if ($value === 'Room II') {
            mysqli_query($connect, "UPDATE `selectbackground` SET `background`='Room II' WHERE 1");
        } else if ($value === 'Room III') {
            mysqli_query($connect, "UPDATE `selectbackground` SET `background`='Room III' WHERE 1");
        }
    }
}
if(isset($texture)) {
    foreach ($texture as $key => $value) {
        if($value === 'plastic') {
            mysqli_query($connect, "UPDATE `selecttexture` SET `texture`='plastic' WHERE 1");
        } else if ($value === 'metal') {
            mysqli_query($connect, "UPDATE `selecttexture` SET `texture`='metal' WHERE 1");
        }
    }
}
if(isset($size)) {
    mysqli_query($connect, "UPDATE `inputsize` SET `size`=$size WHERE 1");
}
if(isset($time)) {
    mysqli_query($connect, "UPDATE `inputtime` SET `time`=$time WHERE 1");
}

