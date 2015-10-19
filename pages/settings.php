<?php
$smarty->assign("loc",'settings');
$smarty->assign("title",'הגדרות');

if ($sessionParams['isProjectMaster']) {
    $shearedPermissions = $persist->getProjectShearedPermissions($sessionParams['userId'], $projectId);
    $smarty->assign("shearedPermissions", $shearedPermissions);
}
$smarty->assign("userName", $sessionParams['userName']);

$smarty->display('tmpl_settings.tpl');
