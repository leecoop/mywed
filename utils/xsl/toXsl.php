<?php
function toXsl($rs = null, $translats = null, $file_name = 'output', $worksheet_name = 'Worksheet')
{
    if ($rs == null)
        return false;

    require_once 'Classes/PHPExcel.php';
    require_once 'Classes/PHPExcel/IOFactory.php';

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getProperties()->setCreator('Matthew Casperson')
        ->setLastModifiedBy('Matthew Casperson')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.');

    $objPHPExcel->setActiveSheetIndex(0)->setTitle($worksheet_name)->setRightToLeft(true);

    $col = 0;
    $row = 1;

    //Set the header styling
    $headerStyle = array(
        'font' => array(
            'bold' => true,
        ),
        'borders' => array(
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_DOUBLE,
            ),
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ));
    $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray($headerStyle);


    foreach ($rs as $guest) {
        if ($row == 1) {
            //print the headers
            foreach ($guest as $key => $value) {
                if (is_array($translats) && array_key_exists($key, $translats)) {
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $translats[$key]);
                    $col++;
                }
            }
            $row++;
        }
        $col = 0;
        foreach ($guest as $key => $value) {
            if (is_array($translats) && array_key_exists($key, $translats)) {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
                $col++;
            }
        }
        $row++;
    }


    $filename = $file_name . '.xlsx';

    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=$filename");
    header("Content-Transfer-Encoding: binary");


    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');

}

?>