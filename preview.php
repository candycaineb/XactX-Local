<?php
	
	//Include the functions.php where all our function definitions reside
	require_once('functions.php');

	//$templateHTMLPath = '/var/www/html/summit/templates/html/layout-b-max.html';
	//$templateHTMLPath = 'templates/html/layout-b-max.html';
	$templateHTMLPath = 'templates/html/layout-a-max.html';

	//If the request contained an existing filename, reuse that rather than generating a new one
	if(isset($_REQUEST['preview_filename'])) {

		if(strlen($_REQUEST['preview_filename'])) {

			$possibleExistingPreviewFilePath = 'previews/' . $_REQUEST['preview_filename'];

			if(file_exists($possibleExistingPreviewFilePath)) {

				$existingPreviewFilename = $_REQUEST['preview_filename'];

			}

		}

	}

	$previewFilename = $existingPreviewFilename ?? generatePreviewFilename();

	//Read the template
	$templateMarkup = file_get_contents($templateHTMLPath);

	//Update the template with the data from the request
	$modifiedTemplateMarkup = personalizeTemplateFromRequest($templateMarkup, $_REQUEST, true);

	//Save the modified template to a static HTML file
	$previewFilePath = 'previews/' . $previewFilename;
	file_put_contents($previewFilePath, $modifiedTemplateMarkup);

	//Return a JSON response
	$response = new \stdclass();
	$response->previewFilename = $previewFilename;
	echo json_encode($response);