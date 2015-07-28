<?php
require_once '../utils/HttpUtils.php';

require_once('smarty.php');
require_once('../classes/Persist.php');
$smarty->assign("loc",'rsvps');
$smarty->assign("title",'חלוקת הזמנות');
$type_side = 0;

$persist = Persist::getInstance();

$guests = $persist->getArrivalNotApprovedGuests($projectId);
//$count = $guests->rowCount();
$groups = $persist->getGroups($projectId);
$sides = $persist->getSides();
$statisticsMap = $persist->getStatisticsMap($projectId);

$smarty->assign("guests",$guests);
//$smarty->assign("count",$count);
$smarty->assign("groups",$groups);
$smarty->assign("sides",$sides);
$smarty->assign("statisticsMap",$statisticsMap);
$smarty->display('tmpl_rsvps.tpl');
