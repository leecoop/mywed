<?php
require_once '../../utils/HeaderJson.php';
require_once '../../utils/HttpUtils.php';
require_once('../../classes/Persist.php');
require_once('smarty.php');

$persist = Persist::getInstance();
$error = false;
$email = $requestParams['email'];

$user = $persist->getUserByEmail($email);
if ($user) {
    $userId = $user->user_id;
} else {
    $userId = $persist->registerUser($email, '12345');
}

$persist->createUser2ProjectRelation($userId, $projectId);

if(!$error){
    $smarty->assign("message", "הפעולה בוצעה בהצלחה");
    $smarty->assign("data", $smarty->fetch('common/alerts/success.tpl'));

}else{
    $smarty->assign("message", "הפעולה נכשלה");
    $smarty->assign("data", $smarty->fetch('common/alerts/error.tpl'));

}

$smarty->clearassign('message');

$smarty->assign("error", $error);
$smarty->display('common/response.tpl');