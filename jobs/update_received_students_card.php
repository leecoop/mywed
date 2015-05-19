<?php
session_start();
if(!session_is_registered('myusername')){
	header("Location: ../index.php");
		exit();
}
include_once "../include/connect.php";

$send_date = $_GET["date"];

$result_get_all_users_sended_to_print_by_date = mysql_query("SELECT id_number FROM `users` where send_to_print_date='$send_date'");
$all_id_numbers="";
$count=0;
while($row = mysql_fetch_array($result_get_all_users_sended_to_print_by_date)){
	$count++;
	$all_id_numbers.="('".$row['id_number']."')," ;
}
$all_id_numbers=substr($all_id_numbers,0,-1);
	
mysql_query("INSERT INTO `received_students_card` (`id`) VALUES $all_id_numbers;");	

echo "Updated ".$count. " Users"; 

mysql_close($con);	

?>