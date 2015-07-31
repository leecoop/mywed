<?php
require_once '../../utils/HttpUtils.php';
require_once('smarty.php');
require_once('../../classes/Persist.php');

$persist = Persist::getInstance();

$sidesIds = $requestParams['sidesIds'];
$groupsIds = $requestParams['groupsIds'];
$loc = $requestParams['loc'];



if ($loc == "guests")
    $guests = $persist->getGuestsWithFilter($sidesIds, $groupsIds, $projectId);
if ($loc == "invitations")
    $guests = $persist->getInvitationNotSentGuestsWithFilter($sidesIds, $groupsIds, $projectId);
if ($loc == "rsvps")
    $guests = $persist->getArrivalNotApprovedGuestsWithFilter($sidesIds, $groupsIds, $projectId);
//    if($loc == "seating_arrangement")
//        $guests = $persist->getGuestGroupedByGroupWithFilter($sidesIds, $groupsIds);

$groups = $persist->getGroups($projectId);
$sides = $persist->getSides();

$smarty->assign("loc", $loc);
$smarty->assign("guests", $guests);
$smarty->assign("count", $guests->rowCount());
$smarty->assign("groups", $groups);
$smarty->assign("sides", $sides);
$smarty->display('guests_content.tpl');




