<?php 
include_once "../include/connect.php";
$dir_handle = @opendir("../images") or die(""); 
$count=0;   
   while ($file = readdir($dir_handle)){
	if(is_dir($file)==false){ 
		$sql=("select id from users where image like '$file' limit 1");
		$result=mysql_query($sql);
		$found=mysql_num_rows($result);
		if($found==0){
			unlink("../images/".$file);
			$count++;
		}
	}
	
  }
  echo "done, deleted " .$count. " files";
  closedir($dir_handle);
 mysql_close($con); 
?>