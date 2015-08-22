<?php

$guestOid = $requestParams['guestOid'];
$newStatus = $requestParams['newStatus'];


try {
    $persist->updateInvitationSent($guestOid, $newStatus, $projectId);
} catch (Exception $e) {
    $error = true;
}

$smarty->assign("error", $error);
$smarty->display('common/response.tpl');