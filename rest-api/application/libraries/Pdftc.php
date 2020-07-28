<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdftc extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
	//Page header
	public function Header() {
		 // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = 'img/sertifikat.jpg';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$today = date("F j, Y, g:i a"); 
		$this->Cell(0, 10, 'Transkip ini dihasilkan oleh SIAD (Sistem Informasi Ahmad Dahlan), dicetak pada '.$today, 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
	
}

?>