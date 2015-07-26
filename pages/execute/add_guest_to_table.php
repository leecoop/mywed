<?php
require_once '../../utils/HttpUtils.php';

header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

require_once('../../classes/Persist.php');
require_once('smarty.php');

$error = false;
$persist = null;


try {
    $persist = Persist::getInstance();
} catch (PDOException $e) {
    $error = true;
}

if (!$error) {
    $guestOid = $requestParams['guestOid'];
    $name = $requestParams['name'];
    $amount = $requestParams['amount'];
    $tableOid = $requestParams['tableOid'];


//    $error = false;
    try {

        $persist->updateGuestTable($guestOid, $tableOid);

    } catch (Exception $e) {
        $error = true;

    }

    if (!$error) {
        $guest = new stdClass();
        $guest->oid = $guestOid;
        $guest->name = $name;
        $guest->amount = $amount;

        $table = new stdClass();
        $table->oid = $tableOid;

        $smarty->assign("guest", $guest);
        $smarty->assign("table", (array)$table);

        $smarty->assign("data", $smarty->fetch('seatingArrangement/guest_in_table.tpl'));
        $smarty->clearassign('guest');
    }
}

$smarty->assign("error", $error);

$smarty->display('common/response.tpl');



?>