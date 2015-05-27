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
        $dsn = 'mysql:host=localhost;dbname=b3_15690100_wedding';
        $login = 'b3_15690100';
        $passwd = 'q1w2e3';

        $this->db = new PDO($dsn, $login, $passwd, array(
            PDO::ATTR_PERSISTENT => true));
        $this->db->prepare("SET NAMES 'UTF8'")->execute();
        $this->db->prepare("Set Character Set utf8")->execute();

    }

    public function hasText($element)
    {
        return isset($element) && !empty($element);
    }

    public function getGuests()
    {
        $sql = "Select * From guests where deleted=false ORDER BY oid desc";

        $res = $this->db->prepare($sql);
        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);

        return $res;
    }

    public function getGuestsWithFilter($sidesIds, $groupsIds)
    {
        $sql = "Select * From guests where deleted=false";
        $sql = $this->appendFilter($sql, $sidesIds, $groupsIds);
        $sql .= " ORDER BY oid desc";

        $res = $this->db->prepare($sql);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);

        return $res;
    }

    public function addGuest($name, $last_name, $phone, $amount, $now_date, $group_id, $side_id, $invitationSent, $arrivalApproved)
    {
//        try {
        $sql = "INSERT INTO guests(name,last_name,phone,amount,add_date,group_id,side_id,invitation_sent,arrival_approved) VALUES('$name','$last_name','$phone','$amount','$now_date','$group_id', '$side_id','$invitationSent', '$arrivalApproved')";
        $res = $this->db->prepare($sql);
        $res->execute();
//        } catch (Exception $e) {
//            return $e;
//        }

        return $this->db->lastInsertId();
    }

    public function editGuest($guestOid, $name, $lastName, $phone, $amount, $groupOid, $sideOid, $invitationSent, $arrivalApproved)
    {
//        try {
        $sql = "UPDATE guests set name='$name',last_name='$lastName',phone='$phone',amount='$amount',group_id='$groupOid',side_id='$sideOid',invitation_sent='$invitationSent',arrival_approved='$arrivalApproved' where oid='$guestOid'";
        $res = $this->db->prepare($sql);
        $res->execute();
//        } catch (Exception $e) {
//            return $e;
//        }

        //return true;
    }

    public function deleteGuest($guestOid)
    {
        try {
            $sql = "UPDATE guests set deleted=true where oid='$guestOid'";
            $res = $this->db->prepare($sql);
            $res->execute();
        } catch (Exception $e) {
            return $e;
        }

        return $guestOid;
    }

    public function search($text)
    {
        $sql = "Select * From guests where deleted=false and name like :text or last_name like :text";
        $res = $this->db->prepare($sql);

        $res->execute(array(':text' => '%' . $text . '%'));
        $res->setFetchMode(PDO::FETCH_LAZY);
        return $res;
    }

    public function createGroup($name)
    {
        try {
            $sql = "INSERT INTO groups(title) VALUES('$name')";
            $res = $this->db->prepare($sql);
            $res->execute();
        } catch (Exception $e) {
            echo $e;
            return $e;
        }

        return $this->db->lastInsertId();
    }

    public function getGroups()
    {
        $sql = "Select * From groups";

        $sql .= " ORDER BY oid";


        $res = $this->db->prepare($sql);
        $res->execute();
//        $res->setFetchMode(PDO::FETCH_LAZY);

        $arr = $res->fetchAll(PDO::FETCH_CLASS);
        return $this->toMap($arr);
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


    public function getGuestGroupedByGroup()
    {

        $sql = "Select * From guests where deleted=false";

        $sql .= " ORDER BY oid desc";

        $res = $this->db->prepare($sql);
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

    public function getGuestGroupedByGroupWithFilter($sidesIds, $groupsIds)
    {

        //TODO: get from getGuests()

        $sql = "Select * From guests where deleted=false";
        $sql = $this->appendFilter($sql, $sidesIds, $groupsIds);

        $sql .= " ORDER BY oid desc";

        $res = $this->db->prepare($sql);
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

    public function updateInvitationSent($guestOid, $newStatus)
    {
        try {
            $sql = "UPDATE guests set invitation_sent=:newStatus where oid=:guestOid";
            $res = $this->db->prepare($sql);
            $res->bindParam(':newStatus', $newStatus, PDO::PARAM_INT);
            $res->bindParam(':guestOid', $guestOid, PDO::PARAM_INT);

            $res->execute();
        } catch (Exception $e) {
            return $e;
        }

        return true;
    }


    public function updateArrivalApproved($guestOid, $arrivalApproved)
    {
        try {
            $sql = "UPDATE guests set arrival_approved=:arrivalApproved where oid=:guestOid";
            $res = $this->db->prepare($sql);
            $res->bindParam(':arrivalApproved', $arrivalApproved, PDO::PARAM_INT);
            $res->bindParam(':guestOid', $guestOid, PDO::PARAM_INT);

            $res->execute();
        } catch (Exception $e) {
            return $e;
        }

        return true;
    }


    public function getStatisticsMap()
    {
        $map = array();
        $sql = "select count(*) as total from guests where deleted=false and invitation_sent=0";
        $res = $this->db->prepare($sql);
        $res->execute();
        $res = $res->fetch(PDO::FETCH_OBJ);
        $map["invitationNotSent"] = $res->total;

        $sql = "select count(*) as total from guests where deleted=false and invitation_sent=1 && arrival_approved=0";
        $res = $this->db->prepare($sql);
        $res->execute();
        $res = $res->fetch(PDO::FETCH_OBJ);
        $map["arrivalNotApproved"] = $res->total;

        $sql = "select count(*) as total from guests where deleted=false and invitation_sent=1 && arrival_approved=1 && has_table=0";
        $res = $this->db->prepare($sql);
        $res->execute();
        $res = $res->fetch(PDO::FETCH_OBJ);
        $map["notHasTable"] = $res->total;

        return $map;

    }

    public function getInvitationNotSentGuests()
    {
        $sql = "Select * From guests where deleted=false and invitation_sent=0 ORDER BY oid desc";
        $res = $this->db->prepare($sql);
        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);
        return $res;
    }


    public function getInvitationNotSentGuestsWithFilter($sidesIds, $groupsIds)
    {
        $sql = "Select * From guests where deleted=false and invitation_sent=0";
        $sql = $this->appendFilter($sql, $sidesIds, $groupsIds);


        $sql .= " ORDER BY oid desc";
        $res = $this->db->prepare($sql);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);

        return $res;
    }


    public function getArrivalNotApprovedGuests()
    {
        $sql = "Select * From guests where deleted=false and invitation_sent=1 and arrival_approved=0 ORDER BY oid desc";
        $res = $this->db->prepare($sql);
        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);
        return $res;
    }

    public function getArrivalNotApprovedGuestsWithFilter($sidesIds, $groupsIds)
    {
        $sql = "Select * From guests where deleted=false and invitation_sent=1 and arrival_approved=0";
        $sql = $this->appendFilter($sql, $sidesIds, $groupsIds);
        $sql .= " ORDER BY oid desc";
        $res = $this->db->prepare($sql);

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

    public function getGuestForReport($sidesIds, $groupsIds, $loc)
    {
        $sql = "Select name,last_name,phone,amount,g.title as group_title, s.title as side_title From guests o INNER JOIN groups g on o.group_id=g.oid INNER join sides s on s.oid=o.side_id where deleted=false";
        $sql = $this->appendFilter($sql, $sidesIds, $groupsIds);
        $sql = $this->filterByLocation($sql, $loc);
        $sql .= " ORDER BY o.oid desc";

        $res = $this->db->prepare($sql);

        $res->execute();
        $res->setFetchMode(PDO::FETCH_LAZY);

        return $res;
    }
}