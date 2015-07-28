<?php
require_once '../../utils/HttpUtils.php';

header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$title = $requestParams['title'];
$capacity = $requestParams['capacity'];
$tableOid = $requestParams['tableOid'];

require_once('../../classes/Persist.php');
$persist = Persist::getInstance();

try {
    if ($tableOid == "0") {
        $tableOid = $persist->addTable($title, $capacity, $projectId);
    } else {
        $persist->editTable($tableOid, $title, $capacity, $projectId);
    }
} catch (Exception $e) {
    $error = true;

}

require_once('smarty.php');

$table = new stdClass();
$table->oid = $tableOid;
$table->title = $title;
$table->capacity = $capacity;

$smarty->assign("table", (array)$table);


$smarty->assign("data", $smarty->fetch('seatingArrangement/table.tpl'));
$smarty->assign("error", "false");

$smarty->display('common/response.tpl');
?>