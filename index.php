<?php
//error_reporting(0);
$requestUri = $_SERVER["REQUEST_URI"];
require_once('utils/CommonMethods.php');
$CommonMethods = new CommonMethods();

$CommonMethods->clearURI($requestUri);
if (!isLegalRequest($requestUri)) {
    handleIllegalRequest();
} else {
    include 'utils/CommonIncludes.php';
    if ($dbConnectionError) {
        if ($isAjaxRequest) {
            include 'pages/execute/response.php';
        } else {
            handleIllegalRequest();
        }
    } else {
        if ($CommonMethods->needSession($requestUri)) {
            if (!$CommonMethods->hasSession()) {
                include 'pages/login.php';
            } else {
                if (!isset($_SESSION['projectId']) && $requestUri != "execute/create_project") {
                    include 'pages/create_project.php';
                } else {
                    include 'pages/' . $requestUri . '.php';
                }
            }
        } else {
            include 'pages/' . $requestUri . '.php';
        }
    }
}


function isLegalRequest($requestUri)
{
    return file_exists('pages/' . $requestUri . '.php');
}

function handleIllegalRequest()
{
    //todo: redirect to error 404
    header('HTTP/1.0 404 Not Found');
    die;
}


?>