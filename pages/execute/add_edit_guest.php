<?php
$name = $requestParams['name'];
$phone = $requestParams['phone'];
$amount = $requestParams['amount'];
$gift = $requestParams['gift'];
$group = $requestParams['group'];
$side = $requestParams['side'];
$table = $requestParams['table'];
$guestOid = $requestParams['guestOid'];
$invitationSent = $requestParams['invitationSent'];
$arrivalApproved = $requestParams['arrivalApproved'];
$loc = $requestParams['loc'];
$now_date = date('Y-m-d');


try {
    if ($guestOid == "0") {
        $guestOid = $persist->addGuest($name, $phone, $amount, $now_date, $group, $side, $invitationSent, $arrivalApproved, $projectId, $gift);
    } else {
        $persist->editGuest($guestOid, $name, $phone, $amount, $group, $side, $invitationSent, $arrivalApproved, $projectId, $gift, $table);
    }
} catch (Exception $e) {
    $error = true;

}
if (!$error) {
    $guest = new stdClass();
    $guest->oid = $guestOid;
    $guest->name = $name;
    $guest->phone = $phone;
    $guest->amount = $amount;
    $guest->group_id = $group;
    $guest->side_id = $side;
    $guest->invitation_sent = $invitationSent;
    $guest->arrival_approved = $arrivalApproved;
    $guest->gift = $gift;
    $guest->table_id = $table;

    $groups = $persist->getGroups($projectId);
    $sides = $persist->getSides();

    $smarty->assign("loc", $loc);

    $smarty->assign("groups", $groups);
    $smarty->assign("sides", $sides);

    $smarty->assign("guest", (array)$guest);
    $smarty->assign("data", $smarty->fetch('guest/guest_content.tpl'));
}
include 'utils/SendResponse.php';



?>