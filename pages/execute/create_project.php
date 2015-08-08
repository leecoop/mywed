<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}
require_once '../../utils/HeaderJson.php';
require_once '../../utils/GetRequestParams.php';
require_once('../../classes/Persist.php');
require_once('smarty.php');

$persist = Persist::getInstance();

$maleName = $requestParams['maleName'];
$femaleName = $requestParams['femaleName'];
$date = $requestParams['date'];

$projectId = $persist->createProject($maleName, $femaleName, $date);
$persist->createUser2ProjectRelation($_SESSION['userId'], $projectId);
$persist->createGroup("משפחה $maleName",$projectId);
$persist->createGroup("משפחה $femaleName",$projectId);
$persist->createGroup("חברים של $maleName",$projectId);
$persist->createGroup("חברים של $femaleName",$projectId);
$persist->createGroup("חברים משותפים",$projectId);
$persist->createGroup("חברים לעבוד של $maleName",$projectId);
$persist->createGroup("חברים לעבוד של $femaleName",$projectId);
$persist->createGroup("חברים של משפחת החתן ",$projectId);
$persist->createGroup("חברים של משפחת הכלה ",$projectId);


$_SESSION['projectId'] = $projectId;
$_SESSION['date'] = $date;


$smarty->assign("error", false);
$smarty->display('common/response.tpl');


