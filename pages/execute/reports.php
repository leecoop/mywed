<?php
require_once '../../utils/HttpUtils.php';


require_once('smarty.php');

require_once('../../classes/Persist.php');
require_once '../../utils/xsl/toXsl.php';
$sidesIds = $requestParams['sidesIds'];
$groupsIds = $requestParams['groupsIds'];
$loc = $requestParams['loc'];

$persist = Persist::getInstance();

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
    'side_title' => "צד"
);
//    var_dump($translates);

toXsl($guests, $translates, $file_name, $file_name);

