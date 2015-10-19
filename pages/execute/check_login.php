<?php
$email = $requestParams['email'];
$password = $requestParams['password'];


try {
    $user = $persist->getUser($email, md5($password));

    if ($user) {
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['userId'] = $user->user_id;
        $_SESSION['email'] = $email;
        $project = $persist->getUserProjects($user->user_id);

        if ($project) {
            $_SESSION['projectId'] = $project->project_id;
            $_SESSION['isProjectMaster'] = $project->is_master;
            $_SESSION['date'] = $project->date;
        }

    }else{
        $error = true;
        $smarty->assign("errorMsg", "שם המשתמש או סיסמה שגויים");
    }

} catch (Exception $e) {
    $error = true;
    $smarty->assign("errorMsg", "שגיאה כללית, אנא נסה מאוחר יותר");
}


include 'utils/SendResponse.php';






