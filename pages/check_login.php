<?php
require_once '../utils/HeaderJson.php';
require_once('smarty.php');
require_once '../utils/GetRequestParams.php';
require_once('../classes/Persist.php');

$persist = Persist::getInstance();

$error = true;

$email = $requestParams['email'];
$password = $requestParams['password'];


$user = $persist->getUser($email, md5($password));

if ($user) {
    session_start();
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['userId'] = $user->user_id;
    $_SESSION['projectId'] = $user->project_id;
    $_SESSION['date'] = $user->date;
    $error = false;
}

$smarty->assign("error", $error);
$smarty->assign("errorMsg", "User not registered");

$smarty->display('common/response.tpl');






