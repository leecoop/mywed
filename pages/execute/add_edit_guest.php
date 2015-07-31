<?php
require_once '../../utils/HttpUtils.php';
require_once '../../utils/HeaderJson.php';
require_once('../../classes/Persist.php');
require_once('smarty.php');

$persist = Persist::getInstance();


$name = $requestParams['name'];
$phone = "";
//    if ($persist->hasText($_POST['phone'])) {
//        $phone = $requestParams['phone']);
//    }
$amount = $requestParams['amount'];
$group = $requestParams['group'];
$side = $requestParams['side'];
$guestOid = $requestParams['guestOid'];
$invitationSent = $requestParams['invitationSent'];
$arrivalApproved = $requestParams['arrivalApproved'];
$loc = $requestParams['loc'];
$now_date = date('Y-m-d');


$error = false;
try {
    if ($guestOid == "0") {
        $guestOid = $persist->addGuest($name, $phone, $amount, $now_date, $group, $side, $invitationSent, $arrivalApproved, $projectId);
    } else {
        $persist->editGuest($guestOid, $name, $phone, $amount, $group, $side, $invitationSent, $arrivalApproved, $projectId);
    }
} catch (Exception $e) {
    $error = true;

}
$guest = new stdClass();
$guest->oid = $guestOid;
$guest->name = $name;
$guest->phone = $phone;
$guest->amount = $amount;
$guest->group_id = $group;
$guest->side_id = $side;
$guest->invitation_sent = $invitationSent;
$guest->arrival_approved = $arrivalApproved;

$groups = $persist->getGroups($projectId);
$sides = $persist->getSides();

$smarty->assign("loc", $loc);

$smarty->assign("groups", $groups);
$smarty->assign("sides", $sides);

$smarty->assign("guest", (array)$guest);
$smarty->assign("data", $smarty->fetch('guest_content.tpl'));
$smarty->assign("error", $error);

$smarty->display('common/response.tpl');



?>