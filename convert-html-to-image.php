<?php

	require __DIR__ . '/vendor/autoload.php';

	use mikehaertl\wkhtmlto\Image;

	$templateStyleSheetPath = 'D:\xampp\htdocs\xactx\summit\templates\css\page-size-business-card.css';
	$templateHTMLPath = 'D:\xampp\htdocs\xactx\summit\templates\html\layout-b-max.html';

	$imageOptions = array(
	    'width' 	=> '360',
	    'height'	=> '216',
	);

	$image = new Image($templateHTMLPath);

	$image->setOptions($imageOptions);

	if (!$image->send()) {

    	$error = $image->getError();

    	echo $error;
    
	}