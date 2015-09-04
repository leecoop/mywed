<?php
$guestId = $requestParams['guestId'];
$arrivalApproved = $requestParams['arrivalApproved'];
$amount = $requestParams['amount'];

try {
    $persist->updateArrivalApproved($guestId, $arrivalApproved, $projectId, $amount);
} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';
