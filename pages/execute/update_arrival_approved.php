<?php
require_once '../../utils/HttpUtils.php';

/**
 * Created by PhpStorm.
 * User: Leon
 * Date: 1/1/2015
 * Time: 4:03 PM
 */
    require_once('../../classes/Persist.php');
//    include_once "../../include/connect.php";
    $guestOid = $requestParams['guestOid'];
    $arrivalApproved = $requestParams['arrivalApproved'];

    $persist = Persist::getInstance();

    $persist->updateArrivalApproved($guestOid,$arrivalApproved);
