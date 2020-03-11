<?php

// Composer's auto-loading functionality
require "vendor/autoload.php";

use Dompdf\Dompdf;
// $html = require 'index.php';


//this will be something like: http://www.yourapp.com/templates/log.php
$fileUrl = "index.php";

//get file content after the script is server-side interpreted
$fileContent = file_get_contents( $fileUrl ) ;


$dompdf = new DOMPDF();

//load stored html string
$dompdf->loadhtml($fileContent, 'UTF-8');

// $dompdf->loadHtml($html, 'UTF-8');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');

$dompdf->set_option('defaultMediaType', 'all');
$dompdf->set_option('isFontSubsettingEnabled', true);


$dompdf->render();
$dompdf->stream("sample.pdf");