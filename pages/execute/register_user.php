<?php
require_once '../../utils/HeaderJson.php';
require_once '../../utils/GetRequestParams.php';
require_once('../../classes/Persist.php');
require_once('smarty.php');


$persist = Persist::getInstance();

$email = $requestParams['email'];
$password = $requestParams['password'];
$userId = $persist->registerUser($email, md5($password));

session_start();
$_SESSION['isLoggedIn'] = true;
$_SESSION['userId'] = $userId;

$smarty->assign("error", false);
$smarty->display('common/response.tpl');


