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


include 'utils/SendResponse.php';
