<?php

$guestId = $requestParams['guestId'];
$newStatus = $requestParams['newStatus'];


try {
    $persist->updateInvitationSent($guestId, $newStatus, $projectId);
} catch (Exception $e) {
    $error = true;
}

$smarty->assign("error", $error);
$smarty->display('common/response.tpl');