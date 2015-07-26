<?php

session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    $_SESSION['name'] = 'Leon';
    exit();
}

$sessionParams = array();
foreach ($_SESSION as $key => $value) {
    $sessionParams[$key] = strip_tags($value);
}


$requestParams = array();
foreach ($_REQUEST as $key => $value) {
    $requestParams[$key] = strip_tags($value);
}

?>