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

    $guestOid = decodeParams($_POST['guestOid']);
    $name = decodeParams($_POST['name']);
    $lastName = decodeParams($_POST['lastName']);
    $amount = decodeParams($_POST['amount']);
    $tableOid = decodeParams($_POST['tableOid']);

    require_once('smarty.php');

    $error = false;
    try {

        $persist->updateGuestTable($guestOid,$tableOid);

    } catch (Exception $e) {
        $error = true;

    }

    $guest = new stdClass();
    $guest->oid = $guestOid;
    $guest->name = $name;
    $guest->last_name = $lastName;
    $guest->amount = $amount;

    $table = new stdClass();
    $table->oid = $tableOid;

    $smarty->assign("guest", $guest);
    $smarty->assign("table", (array)$table);

    $smarty->assign("data", $smarty->fetch('seatingArrangement/guest_in_table.tpl'));
    $smarty->clearassign('guest');

    $smarty->assign("error", $error);

    $smarty->display('common/response.tpl');


}
?>