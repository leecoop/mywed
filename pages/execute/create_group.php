<?php
$name = $requestParams['groupName'];
try {
    $persist->createGroup($name, $projectId);
} catch (Exception $e) {
    $error = true;
}

$smarty->assign("error", $error);
$smarty->display('common/response.tpl');
