<?php
	session_start();
	include('include/connect.php');
	
	// username and password sent from form 
	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword'];
	
	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$mypassword = md5($mypassword);
	
	if($myusername == 'admin' && $mypassword == '8001c494cd95a330b81f77fb6fb802e0'){
		session_register("myusername");
		session_register("mypassword");
		$_SESSION['admin_campus']='הכל';
		$_SESSION['admin_degree']=2;
		echo "true";
	}
	else{
		
		$sql="SELECT * FROM admin WHERE username='$myusername' and password='$mypassword' and active='1'";
		$result=mysql_query($sql);
		
		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);
		// If result matched $myusername and $mypassword, table row must be 1 row
		
		if($count==1){
			// Register $myusername, $mypassword and redirect to file "invited.php"
			$row = mysql_fetch_array($result);
//			session_register("myusername");
//			session_register("mypassword");
			//echo $row['campus'];
//			$_SESSION['admin_campus']=$row['campus'];
//			$_SESSION['admin_degree']=$row['degree'];
//			$_SESSION['password']=$_POST['mypassword'];
			echo "true";
		}
		else {
			echo "שם משתמש או סיסמא שגויים";
		}
		mysql_close($con);
	}
?>

