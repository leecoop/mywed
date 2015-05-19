<?php
/**
 * Created by PhpStorm.
 * User: Leon
 * Date: 31/12/2014
 * Time: 12:50 AM
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('smarty.php');

    require_once('../../classes/Persist.php');
    $search_value = $_POST['search_value'];

    $persist = Persist::getInstance();

    $guests = $persist->search($search_value);
    $groups = $persist->getGroups();
    $sides = $persist->getSides();

    $smarty->assign("loc",'search');
    $smarty->assign("guests",$guests);
    $smarty->assign("count",$guests->rowCount());
    $smarty->assign("groups",$groups);
    $smarty->assign("sides",$sides);
    $smarty->display('guests_content.tpl');

}