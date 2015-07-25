<?php
require_once '../../utils/HttpUtils.php';
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$tableOid = $requestParams['tableOid'];

require_once('../../classes/Persist.php');
require_once('smarty.php');

$error = false;

try {
    $persist = Persist::getInstance();
} catch (Exception $e) {
    $error = true;
}

$persist->deleteTable($tableOid);

$smarty->assign("error", $error);

$smarty->display('common/response.tpl');
