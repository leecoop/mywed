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
    $project = $persist->getUserProjects($user->user_id);

    if ($project) {
        $_SESSION['projectId'] = $project->project_id;
        $_SESSION['date'] = $project->date;
    }
    $error = false;
}

$smarty->assign("error", $error);
$smarty->assign("errorMsg", "שם המשתמש או סיסמה שגויים");

$smarty->display('common/response.tpl');






