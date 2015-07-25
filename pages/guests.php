<?php
require_once '../utils/HttpUtils.php';

require_once('smarty.php');
require_once('../classes/Persist.php');
$smarty->assign("loc", 'guests');
$smarty->assign("title", 'מוזמנים');
$type_side = 0;

$persist = Persist::getInstance();

$guests = $persist->getGuests();
$count = $guests->rowCount();
$groups = $persist->getGroups();

$statisticsMap = $persist->getStatisticsMap();

$sides = $persist->getSides();
$smarty->assign("guests", $guests);
$smarty->assign("count", $count);
$smarty->assign("type_side", $type_side);
$smarty->assign("groups", $groups);
$smarty->assign("sides", $sides);
$smarty->assign("statisticsMap", $statisticsMap);
$smarty->display('tmpl_guests.tpl');
