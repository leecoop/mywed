<?php

require_once('smarty.php');
require_once('../classes/Persist.php');
$smarty->assign("loc",'seating_arrangement');
$smarty->assign("title",'סידור ישיבה');
$type_side = 0;

$persist = Persist::getInstance();

//$guests = $persist->getArrivalNotApprovedGuests();
//$count = $guests->rowCount();
$groups = $persist->getGroups();
$sides = $persist->getSides();
$guestGroupedByGroup = $persist->getGuestGroupedByGroup();
//var_dump($guestGroupedByGroup);
$statisticsMap = $persist->getStatisticsMap();

//$smarty->assign("guests",$guests);
//$smarty->assign("count",$count);
$smarty->assign("groups",$groups);
$smarty->assign("sides",$sides);
$smarty->assign("statisticsMap",$statisticsMap);
$smarty->assign("guestGroupedByGroup",$guestGroupedByGroup);
$smarty->display('tmpl_seating_arrangement.tpl');