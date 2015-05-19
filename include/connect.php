<?php
//	include('config.php');
	// Connect to server and select databse.
//	$con=mysql_connect("$host", "$username", "$password")or die("cannot connect");
//$con=mysql_connect("localhost", "b3_15690100", "q1w2e3")or die("cannot connect");

//	
//	mysql_set_charset('utf8',$con);
//	
//	mysql_select_db("$db_name")or die("cannot select DB");
//	mysql_query("SET NAMES 'UTF8'");
//	
	
//	mysql_select_db("$db_name") or die('Database connection not possible.');
//mysql_select_db("b3_15690100_wedding") or die('Database connection not possible.');


//	mysql_query("Select Names utf8");
//	mysql_query("Set Character Set utf8");
$dsn = 'mysql:host=localhost;dbname=b3_15690100_wedding';
$login = 'b3_15690100';
$passwd = 'q1w2e3';

$db = new PDO($dsn, $login, $passwd, array(
	PDO::ATTR_PERSISTENT => true));

$db->prepare("SET NAMES 'UTF8'")->execute();
$db->prepare("Set Character Set utf8")->execute();


?>
