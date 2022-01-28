<?php
$action = $_POST['action'];

require_once "toJQuery.php";
switch ($action) {
    case 'init' :
        init();
        break;
}


