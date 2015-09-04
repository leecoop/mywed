<?php

$guestId = $requestParams['guestId'];
$newStatus = $requestParams['newStatus'];


try {
    $persist->updateInvitationSent($guestId, $newStatus, $projectId);
} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';
