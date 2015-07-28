<?php
require_once '../utils/HttpUtils.php';

require_once('smarty.php');
require_once('../classes/Persist.php');
$smarty->assign("loc", 'dashboard');
//$smarty->assign("title", 'מוזמנים');
//$type_side = 0;
//
//if (isset($_GET["type_side"]))
//    $type_side = $_GET["type_side"];
//
//
$persist = Persist::getInstance();
//
//$guests = $persist->getGuests();
//$count = $guests->rowCount();
//$groups = $persist->getGroups();
//
$statisticsMap = $persist->getStatisticsMap($projectId);
//
//$sides = $persist->getSides();
//$smarty->assign("guests", $guests);
//$smarty->assign("count", $count);
//$smarty->assign("type_side", $type_side);
//$smarty->assign("groups", $groups);
//$smarty->assign("sides", $sides);

$smarty->assign("date", $sessionParams['date']);
$smarty->assign("statisticsMap", $statisticsMap);
$smarty->display('index.tpl');
