<?php
$smarty->assign("loc", 'guests');
$smarty->assign("title", 'מוזמנים');


$guests = $persist->getGuests($projectId);
$groups = $persist->getGroups($projectId);
$tables = $persist->getTables($projectId);
$groupsWithGuests = $persist->getGroupsBySides(null, $projectId,'guests', "false");
$sides = $persist->getSides($projectId);

$statisticsMap = $persist->getStatisticsMap($projectId);

$smarty->assign("guests", $guests);
$smarty->assign("groups", $groups);
$smarty->assign("sides", $sides);
$smarty->assign("tables", $tables);
$smarty->assign("groupsWithGuests", $groupsWithGuests);
$smarty->assign("userName", $sessionParams['userName']);

$smarty->assign("statisticsMap", $statisticsMap);
$smarty->display('tmpl_guests.tpl');
