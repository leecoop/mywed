<?php

require_once('../classes/Persist.php');


$email = strip_tags($_REQUEST['email']);
$password = strip_tags($_REQUEST['password']);


$persist = Persist::getInstance();
$user = $persist->getUser($email, md5($password));
if ($user->rowCount() > 0) {
    session_start();
    $_SESSION['isLoggedIn'] = true;
    header("Location: index.php");
} else {
    header("Location: login.php");
}







