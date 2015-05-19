<?php 
$dir_handle = @opendir("../images") or die(""); 
$count=0;   
   while ($file = readdir($dir_handle)){
   	if (preg_match('/temp-.*/', $file, $matches)){
   		 unlink("../images/".$file);
		 $count++;
  	}
  }
  echo "done, deleted " .$count. " files";
  closedir($dir_handle);
?>