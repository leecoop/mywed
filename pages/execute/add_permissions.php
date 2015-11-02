<?php
$email = $requestParams['email'];

if ($sessionParams['isProjectMaster']) {
    try {
        $user = $persist->getUserByEmail($email);
        if ($user) {
            $persist->createUser2ProjectRelation($user->oid, $projectId, false);
        } else {
             $persist->addPendingProjectRelation($email, $projectId, false);
        }
    } catch (Exception $e) {
        $error = true;
    }
} else {
    $error = true;
}


include 'utils/SendResponse.php';
