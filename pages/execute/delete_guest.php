<?php

$guestOid = $requestParams['guestOid'];

try {
    $persist->deleteGuest($guestOid, $projectId);
} catch (Exception $e) {
    $error = true;
}
$smarty->assign("error", $error);
$smarty->display('common/response.tpl');