<?php
try {
    $statMap = $persist->getStatisticsMap($projectId);
    $smarty->assign("statMap", $statMap);
} catch (Exception $e) {
    $error = true;
}

$smarty->assign("error", $error);

$smarty->display('common/statistics_response.tpl');
