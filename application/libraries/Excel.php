<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//local path

require_once(APPPATH.'third_party/Classes/PHPExcel.php');

//$root = $_SERVER['DOCUMENT_ROOT'];
//require_once ($root."/bharatvivaha/web/application/third_party/Classes/PHPExcel.php");

//server path
//require_once ($_SERVER['DOCUMENT_ROOT']."/matrimony/application/third_party/Classes/PHPExcel.php");

class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}


?>
