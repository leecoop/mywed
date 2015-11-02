<?php

require_once "utils/security/RememberMe.php";

// remove all session variables
session_unset();
// destroy the session
session_destroy();

$rememberMe = new RememberMe($persist);
$rememberMe->killCookie();

header("Location: login");
exit();
?>
