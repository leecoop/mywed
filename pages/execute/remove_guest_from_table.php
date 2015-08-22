<?php
$guestOid = $requestParams['guestOid'];

try {
    $persist->updateGuestTable($guestOid, 0, $projectId);
} catch (Exception $e) {
    $error = true;

}

$smarty->assign("error", $error);

$smarty->display('common/response.tpl');



?>