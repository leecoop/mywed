<?php

//include_once "../include/connect.php";
class Persist
{
    private static $instance = NULL;
    private $db = null;


    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function __construct()
    {
//
//        try {
//            $dsn = 'mysql:host=sql208.byethost3.com;dbname=b3_15690100_wedding';
//        $dsn = 'mysql:host=localhost;dbname=b3_15690100_wedding';


        $dsn = 'mysql:host=localhost;dbname=plusonec_plusone';
        $login = 'plusonec_db';
        $passwd = 'kVwWQE84';

//        $dsn = 'mysql:host=localhost;dbname=b3_15690100_wedding';
//        $login = 'b3_15690100';
//        $passwd = 'q1w2e3';

        $this->db = new PDO($dsn, $login, $passwd, array(
            PDO::ATTR_PERSISTENT => true));
        $this->db->prepare("SET NAMES 'UTF8'")->execute();
        $this->db->prepare("Set Character Set utf8")->execute();
//        } catch (Exception $e) {
//            throw new PDOException("Blas");
////            die('Could not connect Database. Error:' . $e->getMessage());
//        }

    }

    function __destruct()
    {
        $this->db = null;
    }

    public function hasText($element)
    {
        return isset($element) && count($element)>0 && $element != "";
    }

    public function getGuests($projectId)
    {
        try {
            $sql = "Select * From guests where project_id=:projectId and deleted=false ORDER BY oid desc";

            $res = $this->db->prepare($sql);
            $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

            $res->execute();
            $res->setFetchMode(PDO::FETCH_LAZY);

            return $res;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getGuestsWithFilter($sidesIds, $groupsIds, $projectId)
    {
        $sql = "Select * From guests where project_id=:projectId and deleted=false";
        $sql = $this->appendFilter($sql, $sidesIds, $groupsIds);
        $sql .= " ORDER BY oid desc";

        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);

        return $res;
    }

    public function addGuest($name, $phone, $amount, $nowDate, $groupId, $sideId, $invitationSent, $arrivalApproved, $projectId, $gift)
    {
//        try {
        $sql = "INSERT INTO guests(name, phone, amount, add_date, group_id, side_id, invitation_sent, arrival_approved, project_id, gift) VALUES(:name, :phone, :amount, :nowDate, :groupId, :sideId, :invitationSent, :arrivalApproved, :projectId, :gift)";
        $res = $this->db->prepare($sql);
        $res->bindParam(':name', $name, PDO::PARAM_STR);
        $res->bindParam(':phone', $phone, PDO::PARAM_STR);
        $res->bindParam(':amount', $amount, PDO::PARAM_INT);
        $res->bindParam(':nowDate', $nowDate, PDO::PARAM_STR);
        $res->bindParam(':groupId', $groupId, PDO::PARAM_INT);
        $res->bindParam(':sideId', $sideId, PDO::PARAM_INT);
        $res->bindParam(':invitationSent', $invitationSent, PDO::PARAM_BOOL);
        $res->bindParam(':arrivalApproved', $arrivalApproved, PDO::PARAM_BOOL);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
        $res->bindParam(':gift', $gift, PDO::PARAM_STR);

        $res->execute();
//        } catch (Exception $e) {
//            return $e;
//        }

        return $this->db->lastInsertId();
    }

    public function editGuest($guestId, $name, $phone, $amount, $groupId, $sideId, $invitationSent, $arrivalApproved, $projectId, $gift)
    {
//        try {
        $sql = "UPDATE guests set name=:name, phone=:phone, amount=:amount, group_id=:groupId, side_id=:sideId, invitation_sent=:invitationSent, arrival_approved=:arrivalApproved, gift=:gift where oid=:guestId and project_id=:projectId";
        $res = $this->db->prepare($sql);

        $res->bindParam(':guestId', $guestId, PDO::PARAM_INT);
        $res->bindParam(':name', $name, PDO::PARAM_STR);
        $res->bindParam(':phone', $phone, PDO::PARAM_STR);
        $res->bindParam(':amount', $amount, PDO::PARAM_INT);
        $res->bindParam(':groupId', $groupId, PDO::PARAM_INT);
        $res->bindParam(':sideId', $sideId, PDO::PARAM_INT);
        $res->bindParam(':invitationSent', $invitationSent, PDO::PARAM_BOOL);
        $res->bindParam(':arrivalApproved', $arrivalApproved, PDO::PARAM_BOOL);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
        $res->bindParam(':gift', $gift, PDO::PARAM_STR);

        $res->execute();
//        } catch (Exception $e) {
//            return $e;
//        }

        //return true;
    }

    public function deleteGuest($guestId, $projectId)
    {
        try {
            $sql = "UPDATE guests set deleted=true where oid=:guestId and project_id=:projectId";
            $res = $this->db->prepare($sql);
            $res->bindParam(':guestId', $guestId, PDO::PARAM_INT);
            $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

            $res->execute();
        } catch (Exception $e) {
            return $e;
        }

        return $guestId;
    }

    public function search($text, $projectId)
    {
        $sql = "Select * From guests where project_id='$projectId' and deleted=false and name like :text";
        $res = $this->db->prepare($sql);
//        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute(array(':text' => '%' . $text . '%'));
        $res->setFetchMode(PDO::FETCH_LAZY);
        return $res;
    }

    public function createGroup($title, $projectId)
    {

        $sql = "INSERT INTO groups(title,project_id) VALUES(:title,:projectId)";
        $res = $this->db->prepare($sql);
        $res->bindParam(':title', $title, PDO::PARAM_STR);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
        $res->execute();
        return $this->db->lastInsertId();
    }

    public function getGroups($projectId)
    {
        $sql = "Select * From groups where oid=0 or project_id=:projectId";
        $sql .= " ORDER BY oid";

        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
//        $res->setFetchMode(PDO::FETCH_LAZY);

        $arr = $res->fetchAll(PDO::FETCH_CLASS);
        return $this->toMap($arr);
    }

    public function getTables($projectId)
    {
        $sql = "Select * From tables where project_id=:projectId and deleted=false ORDER BY oid asc";

        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);

        return $res;
    }


    public function getSides()
    {
        $sql = "Select * From sides";

        $sql .= " ORDER BY oid";


        $res = $this->db->prepare($sql);
        $res->execute();
//        $res->setFetchMode(PDO::FETCH_LAZY);

        $arr = $res->fetchAll(PDO::FETCH_CLASS);
        return $this->toMap($arr);
    }

    public function toMap($objArray)
    {
        $result = array();
//        $result[0] = "ללא";
        foreach ($objArray as $key => $value) {
            $result[$value->oid] = $value->title;
        }
        return $result;
    }


    public function getGuestGroupedByGroup($projectId, &$groupToAmount)
    {

        $sql = "Select * From guests where project_id=:projectId and deleted=false and arrival_approved=1";

        $sql .= " ORDER BY oid desc";

        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
        $guests = $res->fetchAll(PDO::FETCH_CLASS);
        //

        $guestsByGroupMap = array();
        $groupToAmount = array();
        foreach ($guests as $key => $value) {
            if (!isset($guestsByGroupMap[$value->group_id])) {
                $guestsArray = array();
                $groupToAmount[$value->group_id] = 0;
            } else {

                $guestsArray = $guestsByGroupMap[$value->group_id];
            }
            array_push($guestsArray, $value);
            $guestsByGroupMap[$value->group_id] = $guestsArray;
            if ($value->table_id == 0) {
                $groupToAmount[$value->group_id] = $groupToAmount[$value->group_id] + $value->amount;
            }

        }
        return $guestsByGroupMap;
    }

    public function getGuestGroupedByGroupWithFilter($sidesIds, $groupsIds, $projectId)
    {

        //TODO: get from getGuests()

        $sql = "Select * From guests where project_id=:projectId and deleted=false";
        $sql = $this->appendFilter($sql, $sidesIds, $groupsIds);

        $sql .= " ORDER BY oid desc";
        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);


        $res->execute();
        $guests = $res->fetchAll(PDO::FETCH_CLASS);
        //

        $guestsByGroupMap = array();
        foreach ($guests as $key => $value) {
            if (!isset($guestsByGroupMap[$value->group_id])) {
                $guestsArray = array();
            } else {

                $guestsArray = $guestsByGroupMap[$value->group_id];
            }
            array_push($guestsArray, $value);
            $guestsByGroupMap[$value->group_id] = $guestsArray;

        }
        return $guestsByGroupMap;
    }

    public function updateInvitationSent($guestOid, $newStatus, $projectId)
    {
        try {
            $sql = "UPDATE guests set invitation_sent=:newStatus where oid=:guestOid and project_id=:projectId";
            $res = $this->db->prepare($sql);
            $res->bindParam(':newStatus', $newStatus, PDO::PARAM_INT);
            $res->bindParam(':guestOid', $guestOid, PDO::PARAM_INT);
            $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

            $res->execute();
        } catch (Exception $e) {
            return $e;
        }

        return true;
    }


    public function updateArrivalApproved($guestOid, $arrivalApproved, $projectId, $amount)
    {
        try {
            $sql = "UPDATE guests set arrival_approved=:arrivalApproved, amount=:amount where oid=:guestOid and project_id=:projectId";
            $res = $this->db->prepare($sql);
            $res->bindParam(':arrivalApproved', $arrivalApproved, PDO::PARAM_INT);
            $res->bindParam(':guestOid', $guestOid, PDO::PARAM_INT);
            $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
            $res->bindParam(':amount', $amount, PDO::PARAM_INT);

            $res->execute();
        } catch (Exception $e) {
            return $e;
        }

        return true;
    }


    public function getStatisticsMap($projectId)
    {
        $totalGuests = 0;
        $invitationSent = 0;
        $arrivalApproved = 0;
        $hasTable = 0;

        $map = array();
        $allGuest = $this->getGuests($projectId);
        foreach ($allGuest as $key => $guest) {
            $guestsAmount = $guest->amount;
            $totalGuests += $guestsAmount;
            if ($guest->invitation_sent == 1) {
                $invitationSent += $guestsAmount;
            }
            if ($guest->arrival_approved == 1) {
                $arrivalApproved += $guestsAmount;
            }
            if ($guest->table_id > 0) {
                $hasTable += $guestsAmount;
            }
        }


        $map["totalGuests"] = $totalGuests;
        $map["totalGuestsInPercent"] = $totalGuests;
        $map["invitationSent"] = $invitationSent;
        $map["invitationSentInPercent"] = $this->calcPercent($invitationSent, $totalGuests);
        $map["arrivalApproved"] = $arrivalApproved;
        $map["arrivalApprovedInPercent"] = $this->calcPercent($arrivalApproved, $totalGuests);
        $map["hasTable"] = $hasTable;
        $map["hasTableInPercent"] = $this->calcPercent($hasTable, $totalGuests);

        return $map;

    }

    public function calcPercent($val, $total)
    {
        if ($total == 0) {
            return 0;
        }
        return number_format(($val / $total) * 100);
    }

    public function getInvitationNotSentGuests($projectId)
    {
        $sql = "Select * From guests where project_id=:projectId and deleted=false and invitation_sent=0 ORDER BY oid desc";
        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);
        return $res;
    }


    public function getInvitationNotSentGuestsWithFilter($sidesIds, $groupsIds, $projectId)
    {
        $sql = "Select * From guests where project_id=:projectId and deleted=false and invitation_sent=0";
        $sql = $this->appendFilter($sql, $sidesIds, $groupsIds);
        $sql .= " ORDER BY oid desc";

        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);

        return $res;
    }


    public function getArrivalNotApprovedGuests($projectId)
    {
        $sql = "Select * From guests where project_id=:projectId and deleted=false and invitation_sent=1 and arrival_approved=0 ORDER BY oid desc";
        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);
        return $res;
    }

    public function getArrivalNotApprovedGuestsWithFilter($sidesIds, $groupsIds, $projectId)
    {
        $sql = "Select * From guests where project_id=:projectId and deleted=false and invitation_sent=1 and arrival_approved=0";
        $sql = $this->appendFilter($sql, $sidesIds, $groupsIds);
        $sql .= " ORDER BY oid desc";
        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);

        return $res;
    }


    public function appendFilter($query, $sidesIds, $groupsIds)
    {
        if ($this->hasText($sidesIds)) {
            $query .= " and side_id in ($sidesIds)";
        }

        if ($this->hasText($groupsIds)) {
            $query .= " and group_id in ($groupsIds)";
        }

        return $query;
    }

    public function filterByLocation($query, $loc)
    {
        if ($loc == "invitations")
            $query .= " and invitation_sent=0";
        if ($loc == "rsvps")
            $query .= " and invitation_sent=1 and arrival_approved=0";
        return $query;
    }

    public function getGuestForReport($sidesIds, $groupsIds, $loc, $projectId)
    {
        $sql = "Select o.name, o.phone, o.amount, g.title as group_title, s.title as side_title, o.invitation_sent as invitation_sent, o.arrival_approved as arrival_approved ,t.title as table_title, o.gift From guests o INNER JOIN groups g on o.group_id=g.oid INNER join sides s on s.oid=o.side_id left join tables t on t.oid=o.table_id where o.project_id=:projectId and o.deleted=false";
        $sql = $this->appendFilter($sql, $sidesIds, $groupsIds);
        $sql = $this->filterByLocation($sql, $loc);
        $sql .= " ORDER BY o.oid desc";

        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);

        return $res;
    }


    public function addTable($title, $capacity, $projectId)
    {
        $sql = "INSERT INTO tables(title,capacity,project_id) VALUES(:title,:capacity,:projectId)";
        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
        $res->bindParam(':title', $title, PDO::PARAM_STR);
        $res->bindParam(':capacity', $capacity, PDO::PARAM_INT);

        $res->execute();
        return $this->db->lastInsertId();
    }

    public function editTable($tableId, $title, $capacity, $projectId)
    {
        try {
            $sql = "UPDATE tables set title=:title, capacity=:capacity where project_id=:projectId and oid=:tableId";
            $res = $this->db->prepare($sql);
            $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
            $res->bindParam(':title', $title, PDO::PARAM_STR);
            $res->bindParam(':capacity', $capacity, PDO::PARAM_INT);
            $res->bindParam(':tableId', $tableId, PDO::PARAM_INT);

            $res->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public function updateGuestTable($guestId, $tableId, $projectId)
    {
//        try {
        $sql = "UPDATE guests set table_id=:tableId where project_id=:projectId and oid=:guestId";
        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
        $res->bindParam(':guestId', $guestId, PDO::PARAM_INT);
        $res->bindParam(':tableId', $tableId, PDO::PARAM_INT);

        $res->execute();
//        } catch (PDOException $e) {
//            echo 'Error: ' . $e->getMessage();
//        }

    }

    public function getGuestGroupedByTable($projectId)
    {

        $sql = "Select * From guests where project_id=:projectId and deleted=false and table_id>0";
        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
        $guests = $res->fetchAll(PDO::FETCH_CLASS);
        //

        $guestsByTableMap = array();
        foreach ($guests as $key => $value) {
            if (!isset($guestsByTableMap[$value->table_id])) {
                $guestsArray = array();
            } else {

                $guestsArray = $guestsByTableMap[$value->table_id];
            }
            array_push($guestsArray, $value);
            $guestsByTableMap[$value->table_id] = $guestsArray;

        }
        return $guestsByTableMap;
    }

    public function deleteTable($tableOid, $projectId)
    {
        try {
            $sql = "UPDATE tables set deleted=true where project_id=:projectId and  oid=:tableOid";
            $res = $this->db->prepare($sql);
            $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
            $res->bindParam(':tableOid', $tableOid, PDO::PARAM_INT);

            $res->execute();

            $sql = "UPDATE guests set table_id=0 where project_id=:projectId and table_id=:tableOid";
            $res = $this->db->prepare($sql);
            $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
            $res->bindParam(':tableOid', $tableOid, PDO::PARAM_INT);

            $res->execute();


        } catch (Exception $e) {
            return $e;
        }

    }


    public function getUser($email, $password)
    {
        $sql = "Select u.oid as user_id From users u where u.email='$email' and u.password='$password'";
        $stmt = $this->db->query($sql);
        $obj = $stmt->fetch(PDO::FETCH_OBJ);

        return $obj;
    }

    public function getUserByEmail($email)
    {
        $sql = "Select u.oid as user_id, u.password as password From users u where u.email='$email'";
        $stmt = $this->db->query($sql);
        $obj = $stmt->fetch(PDO::FETCH_OBJ);

        return $obj;
    }

    public function getUserProjects($userId)
    {
        $sql = "SELECT p.oid as project_id, p.date as date, up.is_master as is_master FROM users_projects up inner join projects p on up.project_id = p.oid where up.user_id='$userId'";
        $stmt = $this->db->query($sql);
        $obj = $stmt->fetch(PDO::FETCH_OBJ);
        return $obj;
    }

    public function registerUser($email, $password)
    {

        $sql = "INSERT INTO users(email,password) VALUES(:email,:password)";
        $res = $this->db->prepare($sql);
        $res->bindParam(':email', $email, PDO::PARAM_STR);
        $res->bindParam(':password', $password, PDO::PARAM_STR);

        $res->execute();

        return $this->db->lastInsertId();
    }

    public function createProject($maleName, $femaleName, $date)
    {
//        try {
        $sql = "INSERT INTO projects(male_name, female_name, date) VALUES(:maleName,:femaleName,:date)";
        $res = $this->db->prepare($sql);
        $res->bindParam(':maleName', $maleName, PDO::PARAM_STR);
        $res->bindParam(':femaleName', $femaleName, PDO::PARAM_STR);
        $res->bindParam(':date', $date, PDO::PARAM_STR);

        $res->execute();
//        } catch (Exception $e) {
//            return $e;
//        }

        return $this->db->lastInsertId();
    }


    public function createUser2ProjectRelation($userId, $projectId, $isMaster)
    {
//        try {
        $sql = "INSERT INTO users_projects(user_id, project_id, is_master) VALUES(:userId,:projectId,:isMaster)";
        $res = $this->db->prepare($sql);
        $res->bindParam(':userId', $userId, PDO::PARAM_INT);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
        $res->bindParam(':isMaster', $isMaster, PDO::PARAM_BOOL);

        $res->execute();
//        } catch (Exception $e) {
//            return $e;
//        }

    }


    public function changePassword($userId, $currentPassword, $newPassword)
    {
        $sql = "update users set password=:newPassword where oid=:userId and password=:currentPassword";
        $res = $this->db->prepare($sql);
        $res->bindParam(':userId', $userId, PDO::PARAM_INT);
        $res->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
        $res->bindParam(':currentPassword', $currentPassword, PDO::PARAM_STR);

        $res->execute();
    }


    public function getProjectShearedPermissions($userId,$projectId)
    {
        $sql = "SELECT up.oid as permissionOid, up.active as active, up.is_master as isMater, u.email as userEmail FROM users_projects up inner join users u on u.oid=up.user_id where user_id!=:userId and up.project_id=:projectId ";

        $sql .= " ORDER BY up.oid desc";

        $res = $this->db->prepare($sql);
        $res->bindParam(':userId', $userId, PDO::PARAM_INT);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);

        return $res;
    }

    public function getGroupsBySides($sidesIds, $projectId, $loc)
    {
        $sql = "Select DISTINCT o.group_id from guests o where o.project_id=:projectId and o.deleted=false";
        $sql = $this->appendFilter($sql, $sidesIds, null);
        $sql = $this->filterByLocation($sql, $loc);

        $res = $this->db->prepare($sql);
        $res->bindParam(':projectId', $projectId, PDO::PARAM_INT);
        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);
        $result = array();
        foreach ($res as $key => $value) {
            array_push($result, $value->group_id);
        }
        return $result;

    }

}