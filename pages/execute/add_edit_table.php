<?php

header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

function decodeParams($param)
{
//    return mysql_real_escape_string(stripslashes(strip_tags(urldecode(trim($param)))));
    return $param;
}


//session_start();
//if (!session_is_registered('myusername')) {
//    header("Location: ../index.php");
//    exit();
//}
$title = decodeParams($_POST['title']);
$capacity = decodeParams($_POST['capacity']);
$tableOid = decodeParams($_POST['tableOid']);

require_once('../../classes/Persist.php');
$persist = Persist::getInstance();

try {
    if ($tableOid == "0") {
        $tableOid = $persist->addTable($title, $capacity,0);
    } else {
        $persist->editTable($tableOid, $title, $capacity);
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