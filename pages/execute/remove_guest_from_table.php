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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../../classes/Persist.php');
    $persist = Persist::getInstance();

    $guestOid = decodeParams($_POST['guestOid']);

    require_once('smarty.php');

    $error = false;
    try {

        $persist->updateGuestTable($guestOid,0);

    } catch (Exception $e) {
        $error = true;

    }

    $smarty->assign("error", $error);

    $smarty->display('common/response.tpl');


}
?>