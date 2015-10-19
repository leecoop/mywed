<?php
$smarty->assign("loc",'seating_arrangement');
$smarty->assign("title",'סידור ישיבה');

$groups = $persist->getGroups($projectId);
$tables = $persist->getTables($projectId);
$sides = $persist->getSides();
$guestGroupedByGroup = $persist->getGuestGroupedByGroup($projectId,$groupToAmount);
$guestGroupedByTable = $persist->getGuestGroupedByTable($projectId);
$statisticsMap = $persist->getStatisticsMap($projectId);


$smarty->assign("tables",$tables);
$smarty->assign("tablesCount",$tables->rowCount());

$smarty->assign("groups",$groups);
$smarty->assign("sides",$sides);
$smarty->assign("statisticsMap",$statisticsMap);
$smarty->assign("guestGroupedByGroup",$guestGroupedByGroup);
$smarty->assign("guestGroupedByTable",$guestGroupedByTable);
$smarty->assign("groupToAmount",$groupToAmount);
$smarty->assign("userEmail", $sessionParams['email']);

$smarty->display('tmpl_seating_arrangement.tpl');