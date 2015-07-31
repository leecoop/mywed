<?php
require_once '../utils/HttpUtils.php';
require_once('smarty.php');
require_once('../classes/Persist.php');

$smarty->assign("loc",'invitations');
$smarty->assign("title",'חלוקת הזמנות');

$persist = Persist::getInstance();

$guests = $persist->getInvitationNotSentGuests($projectId);
//$count = $guests->rowCount();
$groups = $persist->getGroups($projectId);

$statisticsMap = $persist->getStatisticsMap($projectId);

$sides = $persist->getSides();
$smarty->assign("guests",$guests);
//$smarty->assign("count",$count);
$smarty->assign("groups",$groups);
$smarty->assign("sides",$sides);
$smarty->assign("statisticsMap",$statisticsMap);
$smarty->display('tmpl_invitations.tpl');
