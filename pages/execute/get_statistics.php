<?php
require_once '../../utils/HttpUtils.php';

header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

require_once('smarty.php');
require_once('../../classes/Persist.php');
$persist = Persist::getInstance();


$error = false;

try {
    $statMap = $persist->getStatisticsMap($projectId);
} catch (Exception $e) {
    $error = true;
}

$smarty->assign("error", $error);
$smarty->assign("statMap", $statMap);

$smarty->display('common/statistics_response.tpl');
