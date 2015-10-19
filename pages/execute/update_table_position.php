<?php
$tableId = $requestParams['tableId'];
$top = $requestParams['top'];
$left = $requestParams['left'];


try {
    $persist->updateTablePosition($tableId, $top, $left, $projectId);
} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';