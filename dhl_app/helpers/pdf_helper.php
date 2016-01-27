<?php

function prep_pdf($orientation = 'portrait')
{
	$CI = & get_instance();
	$CI->cezpdf->selectFont(FCPATH . 'dhl_asset/fonts/Courier.afm');
	$all = $CI->cezpdf->openObject();
	$CI->cezpdf->saveState();
	$CI->cezpdf->setStrokeColor(0,0,0,1);
	if($orientation == 'portrait') {
		$CI->cezpdf->ezSetMargins(50,50,50,50);
		$CI->cezpdf->ezStartPageNumbers(500,28,8,'','{PAGENUM}',1);
		$CI->cezpdf->line(20,40,578,40);
		$CI->cezpdf->addText(50,32,8,'Printed on ' . date('d-m-Y h:i:s a'));
		$CI->cezpdf->addText(50,22,8,'Shipment Details - http://www.smartdhl.net');
	}
	else {
		$CI->cezpdf->ezSetMargins(50,50,50,50);
		$CI->cezpdf->ezStartPageNumbers(780,28,8,'','{PAGENUM}',1);
		$CI->cezpdf->line(20,40,800,40);
		$CI->cezpdf->addText(50,32,8,'Printed on ' . date('d-m-Y h:i:s a'));
		$CI->cezpdf->addText(50,22,8,'Shipment Details - http://www.smartdhl.net');
	}
	$CI->cezpdf->restoreState();
	$CI->cezpdf->closeObject();
	$CI->cezpdf->addObject($all,'all');
}

?>