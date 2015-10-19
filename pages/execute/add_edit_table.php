<?php

$title = $requestParams['title'];
$capacity = $requestParams['capacity'];
$tableOid = $requestParams['tableOid'];
$isNew = $tableOid == "0";

$newTopPosition = $requestParams['newTopPosition'];
$newLeftPosition = $requestParams['newLeftPosition'];

try {
    if ($isNew) {
        $tableOid = $persist->addTable($title, $capacity, $projectId, $newTopPosition, $newLeftPosition);
    } else {
        $persist->editTable($tableOid, $title, $capacity, $projectId);
    }
} catch (Exception $e) {
    $error = true;

}


if (!$error && $isNew) {
    $table = new stdClass();
    $table->oid = $tableOid;
    $table->title = $title;
    $table->capacity = $capacity;
    $table->top_position = $newTopPosition;
    $table->left_position = $newLeftPosition;

    $smarty->assign("table", (array)$table);


    $smarty->assign("data", $smarty->fetch('seatingArrangement/table.tpl'));
}
include 'utils/SendResponse.php';

?>