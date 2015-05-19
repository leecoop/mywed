<?php


session_start();
if(!session_is_registered('myusername')){
	header("Location: ../../index.php");
	exit();
}

require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
require_once '../../include/connect.php';

$file_name = '../../'.$_POST['file_path'];
$action = $_POST['action'];

header('Content-Type: text/html; charset=utf-8');

$objReader = PHPExcel_IOFactory::createReaderForFile($file_name);
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load($file_name);

$active_sheet = $objPHPExcel -> getActiveSheet();

$array_data = $active_sheet -> toArray();
unset($array_data[0]);

$id_number_idx = array_search('ת.ז',$array_data[1]);
$name_idx = array_search('שם',$array_data[1]);

//Delete the titles row
unset($array_data[1]);
//mysql_query("TRUNCATE TABLE reports");

$all_id_numbers="";
//run through each row
foreach($array_data as $row_n=>$row){
    //$full_name = mysql_real_escape_string($row[$name_idx]);
    $id_number = mysql_real_escape_string($row[$id_number_idx]);
	if(strlen($id_number)==8){
		$id_number = "0".$id_number;
	}
	if(strlen($id_number)==9){
		$all_id_numbers.=$id_number.",";
	}
  
}
$all_id_numbers=substr($all_id_numbers,0,-1);

mysql_query("Update users Set welfare='$action' Where id_number in (".$all_id_numbers.")");

echo mysql_affected_rows();

unlink($file_name);

mysql_close($con);
?>