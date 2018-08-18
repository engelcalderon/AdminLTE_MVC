<?php
// date_default_timezone_set('America/Costa_Rica');
// ini_set('display_errors', 1);
// ini_set('log_erros',1);
// ini_set('error_log', 'error_log-JT');

require_once  'vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

            try {

                ob_start();
          
                require_once 'views/dashboard/pages/invoice-print.php';
          
                $html=ob_get_clean();
          
                ob_end_clean();
          
                $mipdf=new HTML2PDF('P','A4','es','true','UTF-8');
          
                $mipdf->writeHTML($html);
          
                $mipdf->Output('PdfGeneradoPHP.pdf');
          
              } catch (Html2PdfException $e) {
          
                // $html2pdf->clean();
                $formatter = new ExceptionFormatter($e);
          
                echo $formatter->getHtmlMessage();
              }

?>