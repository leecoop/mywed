<?php
$smarty->assign("loc", 'guests');
$smarty->assign("title", 'מוזמנים');


$guests = $persist->getGuests($projectId);
$groups = $persist->getGroups($projectId);
$tables = $persist->getTables($projectId);

$statisticsMap = $persist->getStatisticsMap($projectId);

$sides = $persist->getSides($projectId);
$smarty->assign("guests", $guests);
$smarty->assign("groups", $groups);
$smarty->assign("sides", $sides);
$smarty->assign("tables", $tables);
$smarty->assign("statisticsMap", $statisticsMap);
$smarty->display('tmpl_guests.tpl');
