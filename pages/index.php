<?php
$smarty->assign("loc", 'dashboard');
$smarty->assign("title",'ראשי');


$statisticsMap = $persist->getStatisticsMap($projectId);

$smarty->assign("date", $sessionParams['date']);
$smarty->assign("statisticsMap", $statisticsMap);
$smarty->assign("hasNotifications", ($statisticsMap["totalGuests"] == $statisticsMap["invitationSent"] && $statisticsMap["invitationSent"] == $statisticsMap["arrivalApproved"]  && $statisticsMap["arrivalApproved"] == $statisticsMap["hasTable"])? false : true);
$smarty->assign("isProjectMaster", $sessionParams['isProjectMaster']);

$smarty->display('index.tpl');
