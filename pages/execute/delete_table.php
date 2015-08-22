<?php
$tableOid = $requestParams['tableOid'];

try {
    $persist->deleteTable($tableOid, $projectId);
} catch (Exception $e) {
    $error = true;
}

$smarty->assign("error", $error);
$smarty->display('common/response.tpl');
