<?php

$email = $requestParams['email'];
$password = $requestParams['password'];
$project = false;
$user = $persist->getUserByEmail($email);
//if pass == 12345 --> user created by addPermission section
if ($user && $user->password == '12345') {
    $userId = $user->user_id;
    $persist->changePassword($userId, '12345', md5($password));
    $project = $persist->getUserProjects($userId);
} else {
    $userId = $persist->registerUser($email, md5($password));
}


$_SESSION['isLoggedIn'] = true;
$_SESSION['userId'] = $userId;

$redirectLink = 'create-project';

if ($project) {
    $_SESSION['projectId'] = $project->project_id;
    $_SESSION['isProjectMaster'] = $project->is_master;
    $_SESSION['date'] = $project->date;
    $redirectLink = 'index.php';

}

$smarty->assign("redirectLink", $redirectLink);
include 'utils/SendResponse.php';


