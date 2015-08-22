<?php
$smarty->assign("loc", 'dashboard');
$smarty->assign("title",'ראשי');


$statisticsMap = $persist->getStatisticsMap($projectId);

$smarty->assign("date", $sessionParams['date']);
$smarty->assign("statisticsMap", $statisticsMap);
$smarty->display('index.tpl');
