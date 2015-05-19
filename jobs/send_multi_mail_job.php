<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once "../utils/mailer.php";
include_once "../include/connect.php";
$sql = "Select * From pending_emails where deleted=0 limit 50";

$result = mysql_query($sql);
$count=mysql_num_rows($result);

if($count>0)
{
	
	
	// Create an i nstance of the mshell_mail class.
	$all_ids="";	
	while($row = mysql_fetch_array($result))
	{
		$from = 'SCE Aguda <'.$row["from"].'>';
		$Mail = new Mailer();
		$Mail->clear_bodytext(); 
		$Mail->set_header("From", $from);
		
		$to = $row["to"];
		//$message =$message_header.iconv("UTF-8","Windows-1255",$row["message"]).$message_footer;
    	$message =urldecode($row["message"]);
		$subject ='=?UTF-8?B?'.base64_encode($row["subject"]).'?=' ;
		//$subject = iconv("UTF-8","Windows-1255",$row["subject"]);
		// You can modify predefined headers or set new ones
		
		// Send an html message.
		$Mail->clear_htmltext();
		$Mail->htmltext($message);
		
		// You may attach as many files as you want.
		if($row["files"]){
			$files = explode(',',$row["files"]);
			foreach($files as $file){
				$Mail->attachfile($file);	
			}
			
		}

		// Send the message
		 $Mail->sendmail($to, $subject);
		 $all_ids.=$row['id'].",";
		
		// sleep(5);
			
	}
	$all_ids=substr($all_ids,0,-1);
	mysql_query("delete from pending_emails where id in (".$all_ids.")");
}
echo "done";
mysql_close($con);
?>