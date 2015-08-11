<?php
require_once '../../utils/HeaderJson.php';
require_once '../../utils/GetRequestParams.php';
require_once('../../classes/Persist.php');
require_once('smarty.php');


$persist = Persist::getInstance();

$email = $requestParams['email'];
$password = $requestParams['password'];
$project = false;
$user = $persist->getUserByEmail($email);
//if pass == 12345 --> user created by addPermission section
if ($user && $user->password == '12345') {
    $userId = $user->user_id;
    $persist->changePassword($userId, md5($password));
    $project = $persist->getUserProjects($userId);
} else {
    $userId = $persist->registerUser($email, md5($password));
}


session_start();
$_SESSION['isLoggedIn'] = true;
$_SESSION['userId'] = $userId;

$redirectLink ='create_project.php';

if ($project) {
    $_SESSION['projectId'] = $project->project_id;
    $_SESSION['date'] = $project->date;
    $redirectLink ='index.php';

}

$smarty->assign("error", false);
$smarty->assign("redirectLink", $redirectLink);
$smarty->display('common/response.tpl');


