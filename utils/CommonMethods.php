<?php
require_once "utils/security/RememberMe.php";
require_once "utils/LoginUtils.php";

class CommonMethods
{
    public static function isAjaxRequest()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

    }

    public static function  hasSession()
    {
        return isset($_SESSION['isLoggedIn']);
    }


    public static function needSession($requestUri)
    {
        $PAGES_WITHOUT_SESSION = array('login', 'execute/check_login', 'register', 'execute/register_user','logout');
        return !in_array($requestUri, $PAGES_WITHOUT_SESSION);
    }

    public static function clearURI(&$requestUri)
    {
        $isValidUri = preg_match("/(\/execute\/)?[a-zA-Z-_]+/", $requestUri, $requestUri);
        if ($isValidUri === 1) {
            $requestUri = str_ireplace("-", "_", $requestUri[0]);
            $requestUri = ltrim($requestUri, "/");

        } else {
            $requestUri = "index";
        }

    }

    function toBoolean($str)
    {
        return filter_var($str, FILTER_VALIDATE_BOOLEAN);

    }

    public static function checkRememberMe($persist)
    {
        $rememberMe = new RememberMe($persist);
        $userId = $rememberMe->verify();
        if(!$userId){
            return false;
        }

        $user = $persist->getUserByOid($userId);

        $loginUtils = new LoginUtils($persist);
        $loginUtils->setSessionParams($user);

        return true;


    }

}
