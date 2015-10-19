<?php
$name = $requestParams['groupName'];
try {
   $newOid = $persist->createGroup($name, $projectId);
   $smarty->assign("data",$newOid);

} catch (Exception $e) {
    $error = true;
}


include 'utils/SendResponse.php';
