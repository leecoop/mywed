<?php
require_once "utils/security/PasswordLock.php";
use ParagonIE\PasswordLock\PasswordLock;


$email = $requestParams['email'];
$password = $requestParams['password'];

$user = $persist->getUserByEmail($email);
if ($user) {
    $error = true;
    $smarty->assign("errorMsg", "כתובת דואר כבר תפוסה");
} else {
    $encryptedPassword = PasswordLock::encrypt($password);
    $userId = $persist->registerUser($email, $encryptedPassword);

    $_SESSION['isLoggedIn'] = true;
    $_SESSION['userId'] = $userId;
    $_SESSION['userName'] = explode('@', $email)[0];

    $redirectLink = 'create-project';

    $pendingProject = $persist->getPendingProjectRelation($email);
    if($pendingProject){
        $persist->createUser2ProjectRelation($userId, $pendingProject->project_id, false);
        $persist->updatePendingProjectRelationDeleteStatus($pendingProject->oid, true);
        $project = $persist->getUserProjects($userId);

        $_SESSION['projectId'] = $project->project_id;
        $_SESSION['isProjectMaster'] = $project->is_master;
        $_SESSION['date'] = $project->date;
        $redirectLink = 'index';

    }
    $smarty->assign("redirectLink", $redirectLink);

}

include 'utils/SendResponse.php';


