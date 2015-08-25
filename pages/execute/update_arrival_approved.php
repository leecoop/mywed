<?php
$guestId = $requestParams['guestId'];
$arrivalApproved = $requestParams['arrivalApproved'];
$amount = $requestParams['amount'];

try {
    $persist->updateArrivalApproved($guestId, $arrivalApproved, $projectId, $amount);
} catch (Exception $e) {
    $error = true;
}

$smarty->assign("error", $error);
$smarty->display('common/response.tpl');