<?php
$currentPassword = $requestParams['currentPassword'];
$newPassword = $requestParams['newPassword'];

try {
    $persist->changePassword($sessionParams['userId'], md5($currentPassword), md5($newPassword));
} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';
