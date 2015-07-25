<?php
require_once '../../utils/HttpUtils.php';

    require_once('../../classes/Persist.php');
//    include_once "../../include/connect.php";
    $guestOid = $requestParams['guestOid'];
    $newStatus = $requestParams['newStatus'];

    $persist = Persist::getInstance();

    $persist->updateInvitationSent($guestOid,$newStatus);
