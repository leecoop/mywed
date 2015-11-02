<?php

$guestId = $requestParams['guestId'];
$amount = $requestParams['amount'];


try {
    $persist->updateArrivedStatus($guestId, $amount, 1, $projectId);
} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';
