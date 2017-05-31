<?php
namespace App\Controllers\Admin;

use \Core\View;
use SimpleExcel\SimpleExcel;
use Dompdf\Dompdf;


class Export extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        // Make sure an admin user is logged in for example
        // return false;
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $excel = new SimpleExcel('HTML');
        $excel->parser->loadFile($_SERVER['DOCUMENT_ROOT']. '/App/Views/Reports/report.html'); // Load HTML file from server
        $excel->convertTo('XML'); // Save into a directory in running server
        $excel->writer->saveFile('Report');
	}

    public function pdfAction()
    {
        $dompdf = new Dompdf();
        $html = file_get_contents($_SERVER['DOCUMENT_ROOT']. '/App/Views/Reports/report.html');
        $dompdf->loadHtml($html); // Load HTML file from server
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}

?>