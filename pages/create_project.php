<?php
$smarty->assign("loc",'create_project');
$smarty->assign("title", 'יצירת ארוע חדש');
$smarty->display('create_project.tpl');
$smarty->assign("userEmail", $sessionParams['email']);
