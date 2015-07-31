<?php
require_once '../../utils/HttpUtils.php';
require_once('../../classes/Persist.php');
$persist = Persist::getInstance();


$guestOid = $requestParams['guestOid'];
$newStatus = $requestParams['newStatus'];


$persist->updateInvitationSent($guestOid, $newStatus, $projectId);
