<?php
/**
 * Created by PhpStorm.
 * User: Leon
 * Date: 1/1/2015
 * Time: 4:03 PM
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once('../../classes/Persist.php');
//    include_once "../../include/connect.php";
	$guestOid = $_POST['guestOid'];
	$persist = Persist::getInstance();

	echo $persist->deleteGuest($guestOid);
}