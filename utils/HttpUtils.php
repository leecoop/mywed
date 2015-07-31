<?php

session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['projectId'])) {
    header("Location: create_project.php");
    exit();
}

$sessionParams = array();
foreach ($_SESSION as $key => $value) {
    $sessionParams[$key] = strip_tags($value);
}

$projectId = $sessionParams['projectId'];


require_once("GetRequestParams.php");


?>