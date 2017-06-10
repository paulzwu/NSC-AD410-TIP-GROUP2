<?php

require '../vendor/autoload.php';

use \Core\View;
use \SimpleExcel\SimpleExcel;
use \Dompdf\Dompdf;


$export_format = $_GET["format"];

if ($export_format == 'pdf') {
    exportPDF();
} else if ($export_format == 'csv') {
    exportCSV();
} else {
    echo "Invalid Eco type";
}

 function exportCSV()
    {
        $excel = new SimpleExcel('HTML');
        $excel->parser->loadFile($_SERVER['DOCUMENT_ROOT']. '/public/Views/Reports/report.html'); // Load HTML file from server
        $excel->convertTo('CSV'); // Save into a directory in running server
        $excel->writer->saveFile('Report');
    }

function exportPDF()
{
    $dompdf = new Dompdf();
    $html = file_get_contents($_SERVER['DOCUMENT_ROOT']. '/public/Views/Reports/report.html');
    $dompdf->loadHtml($html); // Load HTML file from server
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();
}

?>