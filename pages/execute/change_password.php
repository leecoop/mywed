<?php
$currentPassword = $requestParams['currentPassword'];
$newPassword = $requestParams['newPassword'];

try {
    $persist->changePassword($sessionParams['userId'], md5($currentPassword), md5($newPassword));
} catch (Exception $e) {
    $error = true;
}
$smarty->assign("error", $error);
$smarty->display('common/response.tpl');