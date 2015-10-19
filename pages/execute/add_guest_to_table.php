<?php
$guestOid = $requestParams['guestOid'];
$tableOid = $requestParams['tableOid'];


try {

    $persist->updateGuestTable($guestOid, $tableOid, $projectId);

} catch (Exception $e) {
    $error = true;

}



include 'utils/SendResponse.php';



?>