<?php
require_once '../../utils/HttpUtils.php';

require_once('../../classes/Persist.php');
$guestOid = $requestParams['guestOid'];
$arrivalApproved = $requestParams['arrivalApproved'];

$persist = Persist::getInstance();

$persist->updateArrivalApproved($guestOid, $arrivalApproved, $projectId);
