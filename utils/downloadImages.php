<?php
session_start();
if(!session_is_registered('myusername')){
	header("Location: ../index.php");
	exit();
}
require_once'../include/connect.php';

	$type = $_GET['type'];
	if(type != NULL){

	if($type == "printing"){
	//	$sql="select image from users where active='1' and checked='1' and welfare='1'";
	    $sql="select image from users where active='1' and checked='1'";
		$printing = $_GET['printing'];
		$date = $_GET['send_to_print_date'];
		if($printing!=null){
			$sql .= " and send_to_print='$printing'";
    	}
		if($date!=null && $date!='NONE'){
		 $sql .= " and send_to_print_date='$date'";
		}
		
	}
	
	if($type == "all"){
		$sql="select image from users where active='1' and checked='1'";
	}
	
	$campus = $_GET['campus'];
	if($campus!=null && $campus!='הכל'){
		$sql .= " and campus='$campus'";
	
	}
	
	$result = mysql_query($sql);
	
	$zip = new ZipArchive();
 	if($zip->open("images.zip",ZIPARCHIVE::CREATE)===TRUE){
   	while($row = mysql_fetch_array($result)){
		if(file_exists("../images/".$row['image']))
    		$zip->addFile("../images/".$row['image']);
			
	}
   $zip->close();
	
	$file = "images.zip";
	header ("Content-Type: application/octet-stream");
	header ("Accept-Ranges: bytes");
	header ("Content-Length: ".filesize($file));
	header ("Content-Disposition: attachment; filename=".$file);  
	readfile($file);
	unlink($file);
	
 }
	
	
	
	}

mysql_close($con);
?>