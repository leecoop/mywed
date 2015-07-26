<?php

require_once '../utils/GetRequestParams.php';
require_once('../classes/Persist.php');


$email = $requestParams['email'];
$password = $requestParams['password'];


$persist = Persist::getInstance();
$user = $persist->getUser($email, md5($password));
if ($user) {
    session_start();
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['userId'] = $user->user_id;
    $_SESSION['projectId'] = $user->project_id;
    $_SESSION['date'] = $user->date;

    header("Location: index.php");
} else {
    header("Location: login.php");
}







