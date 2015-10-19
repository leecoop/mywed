<?php
$smarty->assign("loc",'create_project');
$smarty->assign("title", 'יצירת ארוע חדש');
$smarty->assign("userName", $sessionParams['userName']);
$smarty->display('create_project.tpl');
