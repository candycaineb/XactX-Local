<?php

	require __DIR__ . '/vendor/autoload.php';

	//Include the functions.php where all our function definitions reside
	require_once('functions.php');

	use mikehaertl\wkhtmlto\Pdf;

	$templateStyleSheetPath = '/var/www/html/summit/templates/css/page-size-business-card.css';
	$templateFilename = ( isset($_REQUEST['template_filename']) ? $_REQUEST['template_filename'] : '' );
	$templateHTMLPath = '/var/www/html/summit/previews/' . $templateFilename;
	$pdfFilename = str_replace('.html', '.pdf', $templateFilename);

	$pdfOptions = array(
		'binary' => '/usr/bin/wkhtmltopdf',
	    'ignoreWarnings' => true,
	    'commandOptions' => array(
	        'procEnv' => array(
	            // Check the output of 'locale -a' on your system to find supported languages
	            'LANG' => 'en_US.utf-8',
	        ),
	    ),
	    'dpi' => 300,
	    'no-outline',         // Make Chrome not complain
	    'page-width' 	=> '3.75in',
	    'page-height'	=> '2.25in',
	    'margin-top'    => 0,
	    'margin-right'  => 0,
	    'margin-bottom' => 0,
	    'margin-left'   => 0,
	    'disable-smart-shrinking',
    	'user-style-sheet' => $templateStyleSheetPath,
	);

	$pageOptions = array(
		'encoding' => 'UTF-8'
	);

	// You can pass a filename, a HTML string, an URL or an options array to the constructor
	$pdf = new Pdf($pdfOptions);

	$pdf->addPage(
		$templateHTMLPath,
		$pageOptions
	);

	// On some systems you may have to set the path to the wkhtmltopdf executable
	// $pdf->binary = 'C:\...';

	$response = new \stdClass();

	if (!$pdf->saveAs('pdfs/' . $pdfFilename)) {

	    $error = $pdf->getError();
	    // ... handle error here
	    
	    $response->success = false;
		$response->errorMessage = $error;
		$response->filename = null;
		//$response->raw = null;
	     
	}

	$response->success = true;
	$response->errorMessage = null;
	$response->filename = $pdfFilename;
	//$response->raw = $pdf;

	$responseJSON = json_encode($response);
	echo $responseJSON;