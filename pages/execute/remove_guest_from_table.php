<?php
require_once '../../utils/HttpUtils.php';

header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

function decodeParams($param)
{
//    return mysql_real_escape_string(stripslashes(strip_tags(urldecode(trim($param)))));
    return $param;
}


    require_once('../../classes/Persist.php');
    $persist = Persist::getInstance();

    $guestOid = $requestParams['guestOid'];

    require_once('smarty.php');

    $error = false;
    try {

        $persist->updateGuestTable($guestOid,0);

    } catch (Exception $e) {
        $error = true;

    }

    $smarty->assign("error", $error);

    $smarty->display('common/response.tpl');



?>