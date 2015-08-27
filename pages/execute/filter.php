<?php
$sidesIds = $requestParams['sidesIds'];
$groupsIds = $requestParams['groupsIds'];
$loc = $requestParams['loc'];

$guests = null;
$groups = null;
$sides = null;

try {
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
} catch (Exception $e) {
    $error = true;
}

if (!$error) {
    $smarty->assign("loc", $loc);
    $smarty->assign("guests", $guests);
    $smarty->assign("count", $guests->rowCount());
    $smarty->assign("groups", $groups);
    $smarty->assign("sides", $sides);
    $smarty->assign("data", $smarty->fetch('guest/guests_content.tpl'));
}


$smarty->assign("error", $error);

$smarty->display('common/response.tpl');






