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

//    include_once "../../include/connect.php";
    $name = decodeParams($_POST['name']);
    $last_name = decodeParams($_POST['lastName']);
    $phone ="";
//    if ($persist->hasText($_POST['phone'])) {
//        $phone = decodeParams($_POST['phone']);
//    }
    $amount = decodeParams($_POST['amount']);
    $group = decodeParams($_POST['group']);
    $side = decodeParams($_POST['side']);
    $guestOid = decodeParams($_POST['guestOid']);
    $now_date = date('Y-m-d');


    if ($guestOid == "0") {
        require_once('smarty.php');

        $newGuestOid = $persist->addGuest($name, $last_name, $phone, $amount, $now_date, $group, $side);
        $guest = new stdClass();
        $guest->oid = $newGuestOid;
        $guest->name = $name;
        $guest->last_name = $last_name;
        $guest->phone = $phone;
        $guest->amount = $amount;
        $guest->group_id = $group;
        $guest->side_id = $side;
        $guest->invitation_sent=0;
        $guest->arrival_approved=0;

        $groups = $persist->getGroups();
        $sides = $persist->getSides();


//        $smarty->left_delimiter = '<%';
//        $smarty->right_delimiter = '%>';

        $smarty->assign("loc",'guests');

        $smarty->assign("groups",$groups);
        $smarty->assign("sides",$sides);

        $smarty->assign("guest",(array)$guest);
        $smarty->assign("data",$smarty->fetch('guest_content.tpl'));
        $smarty->assign("error",'false');
//        $smarty->display('guest_content.tpl');


        $smarty->display('common/response.tpl');
        //return $guest;


    } else {
        echo $persist->editGuest($guestOid, $name, $last_name, $phone, $amount, $group, $side);
    }
}
?>