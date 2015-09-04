<?php
$guestOid = $requestParams['guestOid'];
$name = $requestParams['name'];
$amount = $requestParams['amount'];
$tableOid = $requestParams['tableOid'];


try {

    $persist->updateGuestTable($guestOid, $tableOid, $projectId);

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

include 'utils/SendResponse.php';



?>