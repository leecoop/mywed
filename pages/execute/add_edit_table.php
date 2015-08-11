<?php
require_once '../../utils/HttpUtils.php';
require_once '../../utils/HeaderJson.php';
require_once('../../classes/Persist.php');
require_once('smarty.php');

$persist = Persist::getInstance();


$title = $requestParams['title'];
$capacity = $requestParams['capacity'];
$tableOid = $requestParams['tableOid'];


try {
    if ($tableOid == "0") {
        $tableOid = $persist->addTable($title, $capacity, $projectId);
    } else {
        $persist->editTable($tableOid, $title, $capacity, $projectId);
    }
} catch (Exception $e) {
    $error = true;

}


$table = new stdClass();
$table->oid = $tableOid;
$table->title = $title;
$table->capacity = $capacity;

$smarty->assign("table", (array)$table);


$smarty->assign("data", $smarty->fetch('seatingArrangement/table.tpl'));
$smarty->assign("error", "false");

$smarty->display('common/response.tpl');
?>