<?php
$maleName = $requestParams['maleName'];
$femaleName = $requestParams['femaleName'];
$date = $requestParams['date'];

try {
    $projectId = $persist->createProject($maleName, $femaleName, $date);
    $persist->createUser2ProjectRelation($_SESSION['userId'], $projectId, true);
    $persist->createGroup("משפחה $maleName", $projectId);
    $persist->createGroup("משפחה $femaleName", $projectId);
    $persist->createGroup("חברים של $maleName", $projectId);
    $persist->createGroup("חברים של $femaleName", $projectId);
    $persist->createGroup("חברים משותפים", $projectId);
    $persist->createGroup("חברים לעבודה של $maleName", $projectId);
    $persist->createGroup("חברים לעבודה של $femaleName", $projectId);
    $persist->createGroup("חברים של משפחת החתן ", $projectId);
    $persist->createGroup("חברים של משפחת הכלה ", $projectId);


    $_SESSION['projectId'] = $projectId;
    $_SESSION['isProjectMaster'] = true;
    $_SESSION['date'] = $date;
} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';


