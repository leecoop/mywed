<?php
require_once '../../utils/HttpUtils.php';
require_once('../../classes/Persist.php');
$guestOid = $requestParams['guestOid'];
$persist = Persist::getInstance();

echo $persist->deleteGuest($guestOid, $projectId);
