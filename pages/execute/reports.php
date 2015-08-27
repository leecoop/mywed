<?php
require_once 'utils/xsl/toXsl.php';


$sidesIds = $requestParams['sidesIds'];
$groupsIds = $requestParams['groupsIds'];
$loc = $requestParams['loc'];


$guests = $persist->getGuestForReport($sidesIds, $groupsIds, $loc, $projectId);
//if ($loc == "guests")
//    $guests = $persist->getGuestsWithFilter($sidesIds, $groupsIds);
//if ($loc == "invitations")
//    $guests = $persist->getInvitationNotSentGuestsWithFilter($sidesIds, $groupsIds);
//if ($loc == "rsvps")
//    $guests = $persist->getArrivalNotApprovedGuestsWithFilter($sidesIds, $groupsIds);
//    if($loc == "seating_arrangement")
//        $guests = $persist->getGuestGroupedByGroupWithFilter($sidesIds, $groupsIds);


$file_name = "report_" . $loc;

$translates = array(
    'name' => 'שם',
//    'last_name' => 'שם משפחה',
    'phone' => "פלאפון",
    'amount' => "כמות",
    'group_title' => "קבוצה",
    'side_title' => "צד",
    'table_title' => "שולחן",
    'invitation_sent' => "נשלחה הזמנה",
    'arrival_approved' => "אישרו הגעה",
    'gift' => "מתנה"

);
//    var_dump($translates);

toXsl($guests, $translates, $file_name, $file_name);

