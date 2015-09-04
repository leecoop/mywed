<?php

$guestOid = $requestParams['guestOid'];

try {
    $persist->deleteGuest($guestOid, $projectId);
} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';
