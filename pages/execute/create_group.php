<?php
$name = $requestParams['groupName'];
try {
    $persist->createGroup($name, $projectId);
} catch (Exception $e) {
    $error = true;
}


include 'utils/SendResponse.php';
