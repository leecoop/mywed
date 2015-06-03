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

    require_once('../../classes/Persist.php');
    $persist = Persist::getInstance();

    require_once('smarty.php');

    $smarty->assign("data", $smarty->fetch('seatingArrangement/table.tpl'));
    $smarty->assign("error", "false");

    $smarty->display('common/response.tpl');
?>