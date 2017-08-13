<?php

namespace vendor\gamantha\pao\project\controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Reader\Xls;
/*error_reporting(E_ALL);
set_time_limit(0);
date_default_timezone_set('Europe/London');
*/
class FilereaderController extends \yii\web\Controller
{
    public function actionIndex()
    {

	//	    	require 'vendor/autoload.php';


		/*$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');

		$writer = new Xlsx($spreadsheet);
		$writer->save('hello world.xlsx');
		*/

        $inputFileName = './uploads/scan/9.xlsx';
        echo 'Loading file ', pathinfo($inputFileName, PATHINFO_BASENAME), ' using IOFactory to identify the format<br />';
        $spreadsheet = IOFactory::load($inputFileName);
        echo '<hr />';
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        var_dump($sheetData);


//echo 'sasa';

        //return $this->render('index');
    }

}
