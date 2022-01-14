<?php

require_once "connect.php";

$title = $_POST['title'];
$value = $_POST['value'];

mysqli_query($connect, "INSERT INTO `variables` (`id`, `title`, `value`) VALUES (NULL, '$title', '$value')");

header('Location: /sculpture(pash)/admin/content.php');




