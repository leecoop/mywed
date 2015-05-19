<?php

require_once('smarty.php');
require_once('../classes/Persist.php');
$smarty->assign("loc",'search');
$smarty->assign("title",'חיפוש');

$persist = Persist::getInstance();

$groups = $persist->getGroups();
$sides = $persist->getSides();
$statisticsMap = $persist->getStatisticsMap();

$smarty->assign("groups",$groups);
$smarty->assign("sides",$sides);
$smarty->assign("statisticsMap",$statisticsMap);

$smarty->display('tmpl_search.tpl');