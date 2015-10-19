<?php

$smarty->assign("loc",'invitations');
$smarty->assign("title",'חלוקת הזמנות');

$guests = $persist->getInvitationNotSentGuests($projectId);

$groups = $persist->getGroups($projectId);
$tables = $persist->getTables($projectId);
$groupsWithGuests = $persist->getGroupsBySides(null, $projectId, 'invitations', "false");

$statisticsMap = $persist->getStatisticsMap($projectId);

$sides = $persist->getSides();
$smarty->assign("guests",$guests);
$smarty->assign("groups",$groups);
$smarty->assign("sides",$sides);
$smarty->assign("tables", $tables);
$smarty->assign("statisticsMap",$statisticsMap);
$smarty->assign("groupsWithGuests", $groupsWithGuests);
$smarty->assign("userName", $sessionParams['userName']);

$smarty->display('tmpl_invitations.tpl');
