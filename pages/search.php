<?php

$smarty->assign("loc", 'search');
$smarty->assign("title", 'חיפוש');
$search_value = $requestParams['q'];


$groups = $persist->getGroups($projectId);
$sides = $persist->getSides();
$guests = $persist->search($search_value, $projectId);
$tables = $persist->getTables($projectId);

$smarty->assign("guests", $guests);
$smarty->assign("groups", $groups);
$smarty->assign("sides", $sides);
$smarty->assign("tables", $tables);
$smarty->assign("userEmail", $sessionParams['email']);

$smarty->display('tmpl_search.tpl');
