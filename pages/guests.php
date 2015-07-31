<?php
require_once '../utils/HttpUtils.php';
require_once('smarty.php');
require_once('../classes/Persist.php');

$persist = Persist::getInstance();

$smarty->assign("loc", 'guests');
$smarty->assign("title", 'מוזמנים');


$guests = $persist->getGuests($projectId);
$groups = $persist->getGroups($projectId);

$statisticsMap = $persist->getStatisticsMap($projectId);

$sides = $persist->getSides($projectId);
$smarty->assign("guests", $guests);
$smarty->assign("groups", $groups);
$smarty->assign("sides", $sides);
$smarty->assign("statisticsMap", $statisticsMap);
$smarty->display('tmpl_guests.tpl');
