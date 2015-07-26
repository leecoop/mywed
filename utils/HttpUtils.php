<?php

session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}

$sessionParams = array();
foreach ($_SESSION as $key => $value) {
    $sessionParams[$key] = strip_tags($value);
}


require_once("GetRequestParams.php");


?>