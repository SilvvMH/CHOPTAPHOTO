<?php
    $date = date("Ymd");
    $idfacture = 1233234;
    require_once dirname(__FILE__).'/html2pdf/vendor/autoload.php';

    use Spipu\Html2Pdf\Html2Pdf;
    use Spipu\Html2Pdf\Exception\Html2PdfException;
    use Spipu\Html2Pdf\Exception\ExceptionFormatter;

    ob_start(); // DEBUT D'ECRITURE

    include("facture-base.php");
 
    $content = ob_get_clean(); // FIN D'ECRITURE
    
    try
    {
        $pdf = new Html2Pdf('P', 'A4', 'fr'); // PARAMETRE DU PDF
        //$html2pdf->setModeDebug(); // DEBUG
        $pdf->setDefaultFont('Arial'); // POLICE D'ECRITURE
        
        $pdf->writeHTML($content); // TRANSCRIPTION DE L'4'HTML en PDF
        
        $pdf->Output("facture-$date-$idfacture.pdf"); /// SORTIE DU PDF
    }
    catch(Html2Pdf_exception $e) {
        $html2pdf->clean();

        $formatter = new ExceptionFormatter($e);
        echo $formatter->getHtmlMessage();
    }
