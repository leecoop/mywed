<?php
require_once '../../utils/HttpUtils.php';
require_once '../../utils/HeaderJson.php';
require_once('../../classes/Persist.php');

$persist = Persist::getInstance();

$guestOid = $requestParams['guestOid'];

require_once('smarty.php');

$error = false;
try {

    $persist->updateGuestTable($guestOid, 0, $projectId);

} catch (Exception $e) {
    $error = true;

}

$smarty->assign("error", $error);

$smarty->display('common/response.tpl');



?>