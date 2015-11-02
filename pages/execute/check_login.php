<?php
require_once "utils/security/PasswordLock.php";
use ParagonIE\PasswordLock\PasswordLock;

require_once "utils/security/RememberMe.php";
require_once "utils/LoginUtils.php";

$email = $requestParams['email'];
$password = $requestParams['password'];
$remember = $CommonMethods->toBoolean($requestParams['remember']);

try {

    $user = $persist->getUserByEmail($email);

    if ($user && PasswordLock::decryptAndVerify($password, $user->password)) {

        $loginUtils = new LoginUtils($persist);
        $loginUtils->setSessionParams($user);

        if ($remember) {
            $rememberMe = new RememberMe($persist, $user);
            $rememberMe->setup();
        }

    } else {
        $error = true;
        $smarty->assign("errorMsg", "שם המשתמש או סיסמה שגויים");
    }


} catch (Exception $e) {
    $error = true;
    $smarty->assign("errorMsg", "שגיאה כללית, אנא נסה מאוחר יותר");
}


include 'utils/SendResponse.php';






