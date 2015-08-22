<?php
$guestOid = $requestParams['guestOid'];
$arrivalApproved = $requestParams['arrivalApproved'];

try {
    $persist->updateArrivalApproved($guestOid, $arrivalApproved, $projectId);
} catch (Exception $e) {
    $error = true;
}

$smarty->assign("error", $error);
$smarty->display('common/response.tpl');