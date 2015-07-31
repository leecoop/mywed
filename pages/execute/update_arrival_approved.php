<?php
require_once '../../utils/HttpUtils.php';
require_once('../../classes/Persist.php');

$persist = Persist::getInstance();

$guestOid = $requestParams['guestOid'];
$arrivalApproved = $requestParams['arrivalApproved'];

$persist->updateArrivalApproved($guestOid, $arrivalApproved, $projectId);
