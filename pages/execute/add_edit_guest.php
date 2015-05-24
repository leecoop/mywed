<?php

header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

function decodeParams($param)
{
//    return mysql_real_escape_string(stripslashes(strip_tags(urldecode(trim($param)))));
    return $param;
}


//session_start();
//if (!session_is_registered('myusername')) {
//    header("Location: ../index.php");
//    exit();
//}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../../classes/Persist.php');
    $persist = Persist::getInstance();

    $name = decodeParams($_POST['name']);
    $last_name = decodeParams($_POST['lastName']);
    $phone = "";
//    if ($persist->hasText($_POST['phone'])) {
//        $phone = decodeParams($_POST['phone']);
//    }
    $amount = decodeParams($_POST['amount']);
    $group = decodeParams($_POST['group']);
    $side = decodeParams($_POST['side']);
    $guestOid = decodeParams($_POST['guestOid']);
    $now_date = date('Y-m-d');

    require_once('smarty.php');

    $error = false;
    try {
        if ($guestOid == "0") {
            $guestOid = $persist->addGuest($name, $last_name, $phone, $amount, $now_date, $group, $side);
        } else {
            $persist->editGuest($guestOid, $name, $last_name, $phone, $amount, $group, $side);
        }
    } catch (Exception $e) {
        $error = true;

    }
    $guest = new stdClass();
    $guest->oid = $guestOid;
    $guest->name = $name;
    $guest->last_name = $last_name;
    $guest->phone = $phone;
    $guest->amount = $amount;
    $guest->group_id = $group;
    $guest->side_id = $side;
    $guest->invitation_sent = 0;
    $guest->arrival_approved = 0;

    $groups = $persist->getGroups();
    $sides = $persist->getSides();

    $smarty->assign("loc", 'guests');

    $smarty->assign("groups", $groups);
    $smarty->assign("sides", $sides);

    $smarty->assign("guest", (array)$guest);
    $smarty->assign("data", $smarty->fetch('guest_content.tpl'));
    $smarty->assign("error", $error);

    $smarty->display('common/response.tpl');


}
?>