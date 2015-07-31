<?php
require_once '../../utils/HttpUtils.php';
require_once '../../utils/HeaderJson.php';
require_once('../../classes/Persist.php');
require_once('smarty.php');


$tableOid = $requestParams['tableOid'];


$error = false;

try {
    $persist = Persist::getInstance();
} catch (Exception $e) {
    $error = true;
}

$persist->deleteTable($tableOid, $projectId);

$smarty->assign("error", $error);

$smarty->display('common/response.tpl');
