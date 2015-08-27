<?php

session_start();
$error = false;
$sessionParams = array();
foreach ($_SESSION as $key => $value) {
    $sessionParams[$key] = strip_tags($value);
}

if(isset($_SESSION['projectId'])) {
    $projectId = $sessionParams['projectId'];
}

$isAjaxRequest = $CommonMethods->isAjaxRequest();
if ($isAjaxRequest) {
    require_once 'HeaderJson.php';
}

require_once 'GetRequestParams.php';
require_once('smarty.php');
require_once('classes/Persist.php');
$dbConnectionError = false;
try {
    $persist = Persist::getInstance();
} catch (Exception $e) {
    $dbConnectionError = true;

}
$smarty->assign("isLoggedIn", isset($_SESSION['isLoggedIn']));
$smarty->assign("dbConnectionError", $dbConnectionError);
