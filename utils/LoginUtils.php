<?php


class LoginUtils {

    private $persist;

    function __construct($persist)
    {
        $this->persist = $persist;
    }


    public function setSessionParams($user){
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['userId'] = $user->oid;
        $_SESSION['userName'] = explode('@', $user->email)[0];
        $project = $this->persist->getUserProjects($user->oid);

        if ($project) {
            $_SESSION['projectId'] = $project->project_id;
            $_SESSION['isProjectMaster'] = $project->is_master;
            $_SESSION['date'] = $project->date;

        }

    }

}