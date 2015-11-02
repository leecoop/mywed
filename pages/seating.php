<?php
$smarty->assign("loc", 'seating');
$smarty->assign("title", 'הושבה');


$guests = $persist->getGuestsWithFilters($projectId, array("deleted"=>"0", "arrived"=>"0"));
$tables = $persist->getTablesWithExpectedSeatsTaken($projectId);
$tablesMap = $persist->getTablesMap($projectId);
$tableSeatsTakenAmount = $persist->getTableSeatsTakenAmount($projectId);

$smarty->assign("guests", $guests);

$smarty->assign("tables", $tables);
$smarty->assign("tablesMap", $tablesMap);
$smarty->assign("tableSeatsTakenAmount", $tableSeatsTakenAmount);
$smarty->assign("userName", $sessionParams['userName']);

$smarty->display('tmpl_seating.tpl');