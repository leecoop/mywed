<?php
$email = $requestParams['email'];

if ($sessionParams['isProjectMaster']) {
    try {
        $user = $persist->getUserByEmail($email);
        if ($user) {
            $userId = $user->user_id;
        } else {
            $userId = $persist->registerUser($email, '12345');
        }
        $persist->createUser2ProjectRelation($userId, $projectId, false);
    } catch (Exception $e) {
        $error = true;
    }
} else {
    $error = true;
}


if (!$error) {
    $smarty->assign("message", "הפעולה בוצעה בהצלחה");
    $smarty->assign("data", $smarty->fetch('common/alerts/success.tpl'));

} else {
    $smarty->assign("message", "הפעולה נכשלה");
    $smarty->assign("data", $smarty->fetch('common/alerts/error.tpl'));

}

$smarty->clearassign('message');

$smarty->assign("error", $error);
$smarty->display('common/response.tpl');