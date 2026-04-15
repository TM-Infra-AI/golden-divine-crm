<?php

/* include autoloader */
require_once 'dompdf/autoload.inc.php';

/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */

$dompdf = new Dompdf(array('enable_remote' => true));


$dompdf->loadHtml(file_get_contents('index.html'));

$dompdf->setPaper(file_get_contents(0,0,850,1600), 'landscape');
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
$dompdf->stream();
?>