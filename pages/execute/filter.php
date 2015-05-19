<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('smarty.php');

    require_once('../../classes/Persist.php');
    $sidesIds = $_POST['sidesIds'];
    $groupsIds = $_POST['groupsIds'];
    $loc = $_POST['loc'];

    $persist = Persist::getInstance();


    if($loc == "guests")
        $guests = $persist->getGuestsWithFilter($sidesIds, $groupsIds);
    if($loc == "invitations")
        $guests = $persist->getInvitationNotSentGuestsWithFilter($sidesIds, $groupsIds);
    if($loc == "rsvps")
        $guests = $persist->getArrivalNotApprovedGuestsWithFilter($sidesIds, $groupsIds);
//    if($loc == "seating_arrangement")
//        $guests = $persist->getGuestGroupedByGroupWithFilter($sidesIds, $groupsIds);

    $groups = $persist->getGroups();
    $sides = $persist->getSides();

    $smarty->assign("loc", $loc);
    $smarty->assign("guests", $guests);
    $smarty->assign("count", $guests->rowCount());
    $smarty->assign("groups", $groups);
    $smarty->assign("sides", $sides);
    $smarty->display('guests_content.tpl');




}