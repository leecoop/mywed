<?php
require_once '../utils/HttpUtils.php';

require_once('smarty.php');
require_once('../classes/Persist.php');
$smarty->assign("loc",'seating_arrangement');
$smarty->assign("title",'סידור ישיבה');
$type_side = 0;

$persist = Persist::getInstance();

//$guests = $persist->getArrivalNotApprovedGuests();
//$count = $guests->rowCount();
$groups = $persist->getGroups();
$tables = $persist->getTables(0);
$sides = $persist->getSides();
$guestGroupedByGroup = $persist->getGuestGroupedByGroup();
$guestGroupedByTable = $persist->getGuestGroupedByTable();
//var_dump($guestGroupedByGroup);
$statisticsMap = $persist->getStatisticsMap();

//$smarty->assign("guests",$guests);
//$smarty->assign("count",$count);
$smarty->assign("tables",$tables);
$smarty->assign("tablesCount",$tables->rowCount());

$smarty->assign("groups",$groups);
$smarty->assign("sides",$sides);
$smarty->assign("statisticsMap",$statisticsMap);
$smarty->assign("guestGroupedByGroup",$guestGroupedByGroup);
$smarty->assign("guestGroupedByTable",$guestGroupedByTable);
$smarty->display('tmpl_seating_arrangement.tpl');