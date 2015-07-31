<?php
require_once '../utils/HttpUtils.php';
require_once('smarty.php');
require_once('../classes/Persist.php');

$smarty->assign("loc", 'dashboard');
$smarty->assign("title",'ראשי');

$persist = Persist::getInstance();

$statisticsMap = $persist->getStatisticsMap($projectId);

$smarty->assign("date", $sessionParams['date']);
$smarty->assign("statisticsMap", $statisticsMap);
$smarty->display('index.tpl');
