<?php 
error_reporting(E_ALL ^ E_NOTICE);

include_once "../include/connect.php";
function sendVerificationMail($to, $content){
	    $headers = "From: SCE Aguda <message@sceaguda.co.il>\r\n"."MIME-Version: 1.0\n"."Content-type: text/html; charset=\"UTF-8\"\r\n";
		$success = mail($to, "Email Verification",  "
		<div style=\"direction:rtl; text-align:right;\">הרישום הסתיים בהצלחה <br> על מנת לאמת את כתובת הדואר שלך יש ללחוץ על הלינק הבא  <br> \rhttp://www.sceaguda.co.il/mailVerification.php?code=".$content."\r\r</div>" 
		, $headers);
		return $success;
}


$sql = "Select id,name,email,verification_code From users where active=0 and verification_send_counter<5";

$result = mysql_query($sql);
$count=mysql_num_rows($result);
$all_ids="";
$i=0;
echo "send verification email job START-->";
if($count>0)
{
	
	while($row = mysql_fetch_array($result)){
		$i++;
		echo "[".$row['email']."]-->";
		sendVerificationMail($row['email'],$row['verification_code']);
		$all_ids .=$row['id'].",";
		 
		 if($i%100==0){ 
		 	sleep(70);
		 }
	}
	$all_ids=substr($all_ids,0,-1);
	mysql_query("update users set verification_send_counter=verification_send_counter+1 where id in(".$all_ids.")");
	
	
	 
}
mysql_close($con);
echo "complete sending emails : ".$count;
echo "-->send verification email job END-->";
?>