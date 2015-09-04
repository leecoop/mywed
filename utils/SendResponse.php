<?php
if (!$error && $CommonMethods->toBoolean($requestParams['refreshStats'])) {
    try {
        $statMap = $persist->getStatisticsMap($projectId);
        $smarty->assign("statMap", $statMap);
    } catch (Exception $e) {
    }
}

$smarty->assign("error", $error);
$smarty->display('common/response.tpl');