<?php
require_once '../utils/HttpUtils.php';

    require_once('smarty.php');
    require_once('../classes/Persist.php');
    $smarty->assign("loc", 'search');
    $smarty->assign("title", 'חיפוש');

    $search_value = $requestParams['search_value'];

    $persist = Persist::getInstance();

    $groups = $persist->getGroups();
    $sides = $persist->getSides();
    $guests = $persist->search($search_value);

    $smarty->assign("guests", $guests);
    $smarty->assign("groups", $groups);
    $smarty->assign("sides", $sides);

    $smarty->display('tmpl_search.tpl');
