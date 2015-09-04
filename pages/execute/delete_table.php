<?php
$tableOid = $requestParams['tableOid'];

try {
    $persist->deleteTable($tableOid, $projectId);
} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';
