<?php

$guestOid = $requestParams['guestOid'];
$delete =  $CommonMethods->toBoolean($requestParams['delete']);

try {
    $persist->deleteGuest($guestOid, $delete, $projectId);
} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';
