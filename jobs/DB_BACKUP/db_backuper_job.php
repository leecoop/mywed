<?
$db = $_GET["db"];
/*************** Modify database settings ***************/
switch ($db)
{
	case 'main':
		$Host = "mysql3.wishosting.net";
		$UserName = "sceagud_sceadmin";
		$Password = "admin2012sce";
		$Database = "sceagud_mainDB";
		$email = "leecoop@gmail.com";
		$website = "SCE Aguda DB";
	break;
    
	default:
		$db='';
	break;
}

if($db)
{
	function zip($file_name, $fileList)
	{
		// create object
		$zip = new ZipArchive();
		
		// open archive 
		if ($zip->open($file_name, ZIPARCHIVE::CREATE) !== TRUE) {
			die ("Could not open archive");
		}
		
		// add files
		foreach ($fileList as $f) {
			$zip->addFile($f) or die ("ERROR: Could not add file: $f");   
		}
			
		// close and save archive
		$zip->close();
	}
	
	$conn = mysql_connect('mysql3.wishosting.net','sceagud_sceadmin','admin2012sce') or die("ERROR: cannot connect to MySQL server.");
    mysql_select_db('sceagud_mainDB',$conn);
    mysql_query("Select Names utf8");
    mysql_query("Set Character Set utf8");
    
	//cheak for some days
	$time_max = time()-(59*59*24*1);
	$rs = mysql_query("Select id From database_backups Where unix_timestamp(date_created)>'$time_max' And db_name='$Database' Order By id Desc Limit 1");
	if(!mysql_num_rows($rs))
	{
		/*************** Do not modify below this line ***************/
		
		$connection = mysql_connect("$Host","$UserName","$Password");
		mysql_select_db($Database, $connection);
		mysql_query("Select Names utf8");
        mysql_query("Set Character Set utf8");
		$sql = 'SHOW TABLES FROM '.$Database;
		$result = mysql_query($sql);
		$contents = "-- Database: ".$Database."\n-- Created: ".date('M j, Y')." at ".date('h:i A')."\n\n";
		while ($tables = mysql_fetch_array($result)) {
			$TableList[] = $tables[0];
		}
		
		
		foreach ($TableList as $table) {
			$contents .= "-- --------------------------------------------------------\n\n";
			$contents .= "--\n";
			$contents .= "-- Table structure for table `$table`\n";
			$contents .= "--\n\n";
			$row = mysql_fetch_assoc(mysql_query('SHOW CREATE TABLE '.$table));
			$contents .= str_replace("CREATE TABLE","CREATE TABLE IF NOT EXISTS",$row["Create Table"]).";\n\n";
			
			//Get columns name+type
			$rs = mysql_query("SHOW COLUMNS FROM $table");
			$i = 1;
			$num_cols = mysql_num_rows($rs);
			$columns='';
			while($row = mysql_fetch_array($rs))
			{
				$columns .= "`".$row["Field"]."`";
				$columns .= ($i<$num_cols)? ', ':'';
				++$i;
			}	
			
			$sql = 'SELECT * FROM '.$table;
			$rs = mysql_query($sql);
			
			$x = 1;
			$num_rows = mysql_num_rows($rs);
			if($num_rows)
			{
				$contents .= "--\n";
				$contents .= "-- Dumping data for table `$table`\n";
				$contents .= "--\n\n";
				
				$contents .= "INSERT INTO `".$table."` ($columns) VALUES ";
				
				while ($row = mysql_fetch_array($rs)) 
				{
					$contents .= "(";
					for($i=0;$i<$num_cols;$i++)
					{
						$contents .= "'".mysql_real_escape_string($row[$i])."'";
						$contents .= ($i<($num_cols-1))? ', ':'';
					}
					$contents .= ")";
					$contents .= ($x<$num_rows)? ",\n":';';
					$x++;
				}
				$contents .= "\n\n";
			}
		}
		
		mysql_close($connection);
		
		$file = $Database.'_'.date('Y-m-d').'.sql';
		$handle = fopen($file,'w');
		fwrite($handle,$contents);
		fclose($handle);
		
		//Add record of the db files
		mysql_query("Insert Into database_backups (file_name, db_name) Values ('$file','$Database')",$conn);
		
		//Get Zip And Mail the Every Saterday
		//set the day to send email report of all the weekly data beckup
		
		if(date("w")==6 && $email)
		{
			//Cheak filesize
			$file_size = filesize($file)/(1024*1024); //Mb
			$sql = ($file_size>2)? "Select file_name From database_backups Where db_name='$Database' Order By id Desc Limit 1":"Select file_name From database_backups Where unix_timestamp(date_created) > '$time_max' And db_name='$Database'";
			
			$time_max = time()-(60*60*24*8);
			$rs = mysql_query($sql,$conn);
			if(mysql_num_rows($rs))
			{
				while($row = mysql_fetch_array($rs))
				{
					$files_array[] = $row["file_name"];
				}
				
				//Zip the last week files
				$zip_name = "sql_backup_".date('d_m_Y').'.zip';
				zip($zip_name, $files_array);
				
				//Send Zipped File to mail
				$subject = 'MySQL backup - '.$Database.' [' . $website . ']';
				$boundary   = md5(uniqid(time()));
				$body = "\nDate: ".date("d/m/Y")."\n";
				$body .= "Database Name: $Database\n";
				$body .= 'Database backup file:'. $zip_name;
				
				$headers  = 'From: '.$website . "\n";
				$headers .= 'MIME-Version: 1.0' . "\n";
				$headers .= 'Content-type: multipart/mixed; boundary="' . $boundary . '";' . "\n";
				$headers .= 'This is a multi-part message in MIME format. ';
				$headers .= 'If you are reading this, then your e-mail client probably doesn\'t support MIME.' . "\n";
				$headers .= '--' . $boundary . "\n";
				
				$headers .= 'Content-Type: text/plain; charset="iso-8859-1"' . "\n";
				$headers .= 'Content-Transfer-Encoding: 7bit' . "\n";
				$headers .= $body . "\n";
				$headers .= '--' . $boundary . "\n";
				
				$headers .= 'Content-Disposition: attachment;' . "\n";
				$headers .= 'Content-Type: Application/Octet-Stream; name="' . $zip_name . "\"\n";
				$headers .= 'Content-Transfer-Encoding: base64' . "\n\n";
				$headers .= chunk_split(base64_encode(implode('', file($zip_name)))) . "\n";
				$headers .= '--' . $boundary . '--' . "\n";
				
				mail($email, $subject, $body, $headers);
				unlink($zip_name);
			}
		}	
		
		//Delete older databases for 4 weeks  sec*min*hours*days*2
		$time_max = time()-(60*60*24*7*4);
	
		$rs = mysql_query("Select file_name From database_backups Where unix_timestamp(date_created) < '$time_max'",$conn);
		while($row = mysql_fetch_array($rs))
		{
			unlink(getcwd().'/'.$row["file_name"]);
		}
		mysql_query("Delete From database_backups Where unix_timestamp(date_created) < '$time_max'",$conn);
		mysql_close ($conn);
		echo 'Done';
	}
	else
	{
		echo 'Not Done';
	}
}
?> 