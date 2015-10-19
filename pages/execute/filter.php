<?php
$sidesIds = $requestParams['sidesIds'];
$groupsIds = $requestParams['groupsIds'];
$loc = $requestParams['loc'];
$showDeleted = $requestParams['showDeleted'];

try {
    if ($loc == "guests") {
        $guests = $persist->getGuestsWithFilter($sidesIds, $groupsIds, $projectId, $showDeleted);
    }
    if ($loc == "invitations") {
        $guests = $persist->getInvitationNotSentGuestsWithFilter($sidesIds, $groupsIds, $projectId, $showDeleted);
    }
    if ($loc == "rsvps") {
        $guests = $persist->getArrivalNotApprovedGuestsWithFilter($sidesIds, $groupsIds, $projectId, $showDeleted);
    }
//    if($loc == "seating_arrangement")
//        $guests = $persist->getGuestGroupedByGroupWithFilter($sidesIds, $groupsIds);
    $groupsBySides = $persist->getGroupsBySides($sidesIds, $projectId, $loc, $showDeleted);

    $groups = $persist->getGroups($projectId);
    $sides = $persist->getSides();

    $smarty->assign("loc", $loc);
    $smarty->assign("guests", $guests);
    $smarty->assign("groups", $groups);
    $smarty->assign("sides", $sides);
    $smarty->assign("groupSet", $groupsBySides);
    $smarty->assign("data", $smarty->fetch('guest/guests_content.tpl'));

} catch (Exception $e) {
    $error = true;
}


include 'utils/SendResponse.php';






