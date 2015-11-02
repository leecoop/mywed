<?php
$searchValue = $requestParams['searchValue'];
try {
    $groups = $persist->getGroups($projectId);
    $sides = $persist->getSides();
    $guests = $persist->search($searchValue, $projectId);
    $smarty->assign("loc", "search");
    $smarty->assign("guests", $guests);
    $smarty->assign("groups", $groups);
    $smarty->assign("sides", $sides);
    $smarty->assign("data", $smarty->fetch('guest/guests_content.tpl'));

} catch (Exception $e) {
    $error = true;
}

include 'utils/SendResponse.php';

