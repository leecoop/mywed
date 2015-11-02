<?php
$smarty->assign("loc", 'seating_arrangement');
$smarty->assign("title", 'סידור ישיבה');
$showAll = false;
if (isset($requestParams['showAll'])) {
    $showAll = $CommonMethods->toBoolean($requestParams['showAll']);
}


$groups = $persist->getGroups($projectId);
$tables = $persist->getTables($projectId);
$sides = $persist->getSides();
$guestGroupedByGroup = $persist->getGuestGroupedByGroup($projectId, $groupToAmount, $showAll);
$guestGroupedByTable = $persist->getGuestGroupedByTable($projectId, $showAll);
$statisticsMap = $persist->getStatisticsMap($projectId);


$smarty->assign("tables", $tables);
$smarty->assign("tablesCount", $tables->rowCount());

$smarty->assign("groups", $groups);
$smarty->assign("sides", $sides);
$smarty->assign("statisticsMap", $statisticsMap);
$smarty->assign("guestGroupedByGroup", $guestGroupedByGroup);
$smarty->assign("guestGroupedByTable", $guestGroupedByTable);
$smarty->assign("groupToAmount", $groupToAmount);
$smarty->assign("userName", $sessionParams['userName']);
$smarty->assign("showAll", $showAll);

$smarty->display('tmpl_seating_arrangement.tpl');