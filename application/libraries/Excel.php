<?php
// if (!defined('BASEPATH')) exit('No direct script access allowed');
// // require 'vendor/autoload.php';
// // require_once('src/PhpSpreadsheet/Spreadsheet.php');
// use src\PhpSpreadsheet\Spreadsheet as Spreadsheet;

// // use PhpOffice\PhpSpreadsheet\Helper\Sample;
// class Excel extends Spreadsheet{

// 	public function __construct()
// 	{
// 		parent::__construct();
// 	}
// }
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once APPPATH."/third_party/PHPExcel/Classes/PHPExcel.php"; 
 
class Excel extends PHPExcel { 
    public function __construct() { 
        parent::__construct(); 
    } 
}


?>