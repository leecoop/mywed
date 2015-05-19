<?php
session_start();
if(!session_is_registered('myusername')){
	header("Location: ../../admin.php");
	exit();
}
include('../../include/connect.php');
require_once 'toXsl.php';




if($_SERVER['REQUEST_METHOD'] =='POST')
{
	
	if(isset($_POST["issued_students_card"])){
		
		$sql="select name,last_name,id_number from users where active='1' and get_student_card='1'";
		
		$campus = $_POST['campus'];
		if($campus!=null && $campus!='הכל'){
			$sql .= " and campus='$campus' and";
		}	

		$result = mysql_query($sql);
		$translates = array(
    		'name' => 'שם'
		);

		toXsl($result,$translates,'report_issued_students_card', 'report_issued_students_card');		
	}

}

?>
