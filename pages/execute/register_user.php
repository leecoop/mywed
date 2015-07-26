<?php
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

require_once '../../utils/GetRequestParams.php';
require_once('../../classes/Persist.php');
require_once('smarty.php');


$persist = Persist::getInstance();


$groomName = $requestParams['groomName'];
$brideName = $requestParams['brideName'];
$date = $requestParams['date'];
$email = $requestParams['email'];
$password = $requestParams['password'];
$userId = $persist->registerUser($email, md5($password));

$projectId = $persist->createProject($userId, $groomName, $brideName, $date);

session_start();
$_SESSION['isLoggedIn'] = true;
$_SESSION['userId'] = $userId;
$_SESSION['projectId'] = $projectId;
$_SESSION['date'] = $date;


$smarty->assign("error", false);
$smarty->display('common/response.tpl');


