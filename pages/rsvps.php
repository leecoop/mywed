<?php

$smarty->assign("loc",'rsvps');
$smarty->assign("title",'חלוקת הזמנות');

$guests = $persist->getArrivalNotApprovedGuests($projectId);
$groups = $persist->getGroups($projectId);
$sides = $persist->getSides();
$statisticsMap = $persist->getStatisticsMap($projectId);

$smarty->assign("guests",$guests);
$smarty->assign("groups",$groups);
$smarty->assign("sides",$sides);
$smarty->assign("statisticsMap",$statisticsMap);
$smarty->display('tmpl_rsvps.tpl');
