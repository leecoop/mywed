<?php
$guestOid = $requestParams['guestOid'];

try {
    $persist->updateGuestTable($guestOid, 0, $projectId);
} catch (Exception $e) {
    $error = true;

}

include 'utils/SendResponse.php';



?>