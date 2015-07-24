<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once('smarty.php');
    require_once('../classes/Persist.php');
    $smarty->assign("loc", 'search');
    $smarty->assign("title", 'חיפוש');

    $search_value = $_GET['search_value'];

    $persist = Persist::getInstance();

    $groups = $persist->getGroups();
    $sides = $persist->getSides();
    $statisticsMap = $persist->getStatisticsMap();
    $guests = $persist->search($search_value);

    $smarty->assign("guests", $guests);
    $smarty->assign("groups", $groups);
    $smarty->assign("sides", $sides);
    $smarty->assign("statisticsMap", $statisticsMap);

    $smarty->display('tmpl_search.tpl');
}