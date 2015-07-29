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
$persist->createGroup("ללא",$projectId);
$persist->createGroup("משפחה $groomName",$projectId);
$persist->createGroup("משפחה $brideName",$projectId);
$persist->createGroup("חברים של $groomName",$projectId);
$persist->createGroup("חברים של $brideName",$projectId);
$persist->createGroup("חברים משותפים",$projectId);
$persist->createGroup("חברים לעבוד של $groomName",$projectId);
$persist->createGroup("חברים לעבוד של $brideName",$projectId);
$persist->createGroup("חברים של משפחת החתן ",$projectId);
$persist->createGroup("חברים של משפחת הכלה ",$projectId);




session_start();
$_SESSION['isLoggedIn'] = true;
$_SESSION['userId'] = $userId;
$_SESSION['projectId'] = $projectId;
$_SESSION['date'] = $date;


$smarty->assign("error", false);
$smarty->display('common/response.tpl');


