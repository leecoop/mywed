<?php

$smarty->assign("loc",'rsvps');
$smarty->assign("title",'חלוקת הזמנות');

$guests = $persist->getArrivalNotApprovedGuests($projectId);
$groups = $persist->getGroups($projectId);
$sides = $persist->getSides();
$tables = $persist->getTables($projectId);
$groupsWithGuests = $persist->getGroupsBySides(null, $projectId, 'rsvps', "false");

$statisticsMap = $persist->getStatisticsMap($projectId);

$smarty->assign("guests",$guests);
$smarty->assign("groups",$groups);
$smarty->assign("sides",$sides);
$smarty->assign("tables", $tables);
$smarty->assign("statisticsMap",$statisticsMap);
$smarty->assign("groupsWithGuests", $groupsWithGuests);
$smarty->assign("userName", $sessionParams['userName']);

$smarty->display('tmpl_rsvps.tpl');
