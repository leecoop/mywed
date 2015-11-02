<?php
require_once "utils/security/RememberMe.php";
require_once "utils/security/PasswordLock.php";
use ParagonIE\PasswordLock\PasswordLock;

$currentPassword = $requestParams['currentPassword'];
$newPassword = $requestParams['newPassword'];

try {

    $user = $persist->getUserByOid($sessionParams['userId']);
    if(PasswordLock::decryptAndVerify($currentPassword, $user->password)){
        $newEncryptedPassword = PasswordLock::encrypt($newPassword);
        $persist->changePassword($sessionParams['userId'], $newEncryptedPassword);

        $rememberMe = new RememberMe($persist);
        $rememberMe->killCookie();

    }else{
        $error = true;
        $smarty->assign("errorMsg", "הסיסמה הנוכחית שגויה");
    }

} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';
