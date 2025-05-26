<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
	public function create($html,$filename)
    {
        $options = new Options();
        
        $options->setDpi(300);
        
        $options->set('defaultFont', 'Open Sans');
        
        $options->setIsFontSubsettingEnabled(true);

	    $dompdf = new Dompdf(array('enable_remote' => true));

	    $dompdf->loadHtml($html);
	    
	    $dompdf->set_paper('A4', 'portrait');

	    $dompdf->render();
	    
	   // $dompdf->stream($filename.'.pdf',array("Attachment" => TRUE));
	   
	    $dompdf->stream($filename.'.pdf');
  }
}