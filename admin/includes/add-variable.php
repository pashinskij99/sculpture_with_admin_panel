<?php

require_once "connect.php";


$title = $_POST['title'];
$value = $_POST['value'];
$checked = $_POST['checked'];

mysqli_query($connect, "INSERT INTO `variables` (`id`, `title`, `value`, `checked`) VALUES (NULL, '$title', '$value', '$checked' )");

header('Location: /sculpture(pash)/admin/content.php');




