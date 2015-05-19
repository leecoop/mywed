<?php
session_start();
if(!session_is_registered('myusername')){
	header("Location: ../index.php");
	exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>דוחות</title>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
</head>

<script type="text/javascript">

function confirm(){
	prom=prompt(': נא להזין סיסמא','');
	if(prom == '123'){
		return true;
	}
	if(prom!=null)
		alert("סיסמא שגויה");
	return false;
	
}

function makeExcel(type){
	
		if(confirm()){
		document.getElementById("response").innerHTML="";	
		var campus = document.getElementById("campus").value;
		document.getElementById("response").innerHTML="<img src='../style/ajax-loader-blue.gif' />";
		window.location = "report_exe.php?campus="+campus+"&type="+type;
		document.getElementById("response").innerHTML="<span class='ajax_respons_msg'> קובץ מוכן</span>"
		}
	
}

function downloadImages(){
	if(confirm()){
			var campus = document.getElementById("campus").value;
			window.open("../utils/downloadImages.php?campus="+campus+"&type=all",'Download','width=400,height=200');
		}
}

</script>

<body bgcolor="#F8F8F8">

<div id="main">
    <div id="header">
      <div id="logo">
       
      </div>
      <div id="menubar">
      	<ul id="menu">
          <li><a href="/Logout.php">יציאה</a></li>
          <li><a href="management.php">ניהול מערכת</a></li>
          <li class="selected"><a href="reports.php">דוחות</a></li>
          <li><a href="printing.php">בית דפוס</a></li>
          <li><a href="add_new_user.php">סטודנט חדש</a></li>
          <li ><a href="email.php">שליחת מייל</a></li>
          <li><a href="search.php">חיפוש</a></li>
          <li><a href="/pages/invited.php">ראשי</a></li>
        </ul>
        
      </div>
    </div>
 

 
 <div id="site_content_small">
 <div class="box_title"><div class="title_text">דוחות</div></div> 
    <div style="float:right; padding-right:40px;padding-left:30px;padding-top:30px" >
    
     
        
    <p><input class="registerBtn" style="width:200px" name="issued_students_card" type='submit' value='דוח כרטיסי סטודנט מנופקים'  onclick="makeExcel('issued_students_card')"/></p>
<!--    <p><input class="registerBtn" style="width:200px" name="education_scholarship" type='submit' value='דוח מלגת משרד החינוך' onclick="makeExcel('education_scholarship')"  /></p>
--> <p><input class="registerBtn" style="width:200px" name="welfare" type='submit' value='דוח משלמי סל רווחה'  onclick="makeExcel('welfare')" /></p>
    <p><input class="registerBtn" style="width:200px" name="phones" type='submit' value='דוח פלאפונים' onclick="makeExcel('phones')"  /></p>
    <p><input class="registerBtn" style="width:200px" name="emails" type='submit' value='דוח מיילים' onclick="makeExcel('emails')" /></p>
    <p><input class="registerBtn" style="width:200px" name="get_gift" type='submit' value='דוח מקבלי מתנה' onclick="makeExcel('getGift')" /></p>
    <p><input class="registerBtn" style="width:200px" name="subscribe_gym_theater" type='submit' value='דוח ח"כ/תיאטרון' onclick="makeExcel('subscribeGymTheater')" /></p>


   <!-- <p><input class="registerBtn" style="width:200px" name="emails" type='submit' value='דו"ח סטודנטים ללא דואר מאומת' onclick="makeExcel('unverified_emails')" /></p>-->
<!--    <p><input class="registerBtn" style="width:200px" name="all_images" type='submit' value='הורד את כל התמונות' onclick="downloadImages()" /></p>
-->
    
      
    </div>
	
    <div style="float:left; padding-left:10px;padding-top:30px" >
    
        <p> 
                
                <select id="campus" name="campus" class="widthRegister" style="width:190px; height:25px">
                  <option value="הכל" <?php if($campus==NULL || $campus=='הכל' ) echo "selected='selected'"; ?>>הכל</option>
                  <option value="אשדוד" <?php if($campus=='אשדוד' ) echo "selected='selected'"; ?>>אשדוד</option>
                  <option value="באר שבע" <?php if($campus=='באר שבע' ) echo "selected='selected'"; ?>>באר שבע</option>
                </select>
                : קמפוס
        </p>
    
      	<div id="response"></div>
    </div>
</div>



</div>
</div>


</body>
</html>
