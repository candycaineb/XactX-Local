<?php
	
	function loadSettings() {

		$settingsFilename = "settings.json";

		$settings = json_decode(file_get_contents($settingsFilename));
		return $settings;

	}

	function generatePreviewFilename() {

		$characterPool = [
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
			'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
			'0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
		];

		$filename = "";

		while(strlen($filename) < 10) {

			$filename .= $characterPool[rand(0, 61)];

			if(strlen($filename) == 10) {

				$filename .= ".html";

				if(file_exists('previews/' . $filename)) {

					$filename = "";

				}

			}

		}

		return $filename;

	}

	function lookupBranchInfo($branch) {

		$branchInfo = new \stdClass();
		$branchInfo->street = "362 Main Street";
		$branchInfo->lineTwo = "";
		$branchInfo->city = "Salinas";
		$branchInfo->state = "CA";
		$branchInfo->zip = "93901";
		$branchInfo->nmls = "1224889";

		return $branchInfo;

	}

	function personalizeTemplateFromRequest($templateMarkup, $request, $isPreview = false) {

		//Load the project's settings
		$settings = loadSettings();

		//Establish the template base URL
		$templateBaseUrl = $settings->baseURL . 'templates/';

		$fields = new \stdClass();

		$phoneNumbers = [];
		$licenses = [];
		$branchInfo = null;

		$fields->simple = [
			"person_photo_url",
			"person_name",
			"person_job_title",
			"person_nmls_id_number",
			"person_email_address",
			"person_url"
		];

		$fields->complex = [
			"phone_number_1_type",
			"phone_number_1_number",
			"phone_number_1_extension",
			"phone_number_2_type",
			"phone_number_2_number",
			"phone_number_2_extension",
			"phone_number_3_type",
			"phone_number_3_number",
			"phone_number_3_extension",
			"branch_location",
			"license_1_type",
			"license_1_number",
			"license_2_type",
			"license_2_number",
			"license_3_type",
			"license_3_number",
			"license_4_type",
			"license_5_type",
			"license_5_number"
		];


		//If this is for a preview, add some embedded transform styles to scale the preview
		if($isPreview) {

			$scaleFactor = $request['scale_factor'] ?? 1;

			$transformStyleTag = "
				<style>
					body.template {
						transform:scale(1.7);
						transform-origin:left top;
					}
				</style>
			";
			$templateMarkup = str_replace('<!-- Transform Style Tag -->', $transformStyleTag, $templateMarkup);

		}

		//Update the template base URL throughout the markup
		$templateMarkup = str_replace('../', $templateBaseUrl, $templateMarkup);

		//Handle the simple fields
		foreach($fields->simple as $field) {

			if(! isset($request[$field])) {

				continue;

			}

			if($field == 'person_photo_url') {

				if(! strlen($request[$field]))

				$request[$field] = $templateBaseUrl . 'images/layout-b-max-left-side-silhouette.png';

			}

			$templateMarkup = str_replace('{{' . $field . '}}', $request[$field], $templateMarkup);

		}

		//Handle the complex fields
		foreach($fields->complex as $field) {

			if(! isset($request[$field])) {

				continue;

			}

			switch($field) {

				case "branch_location":

					$branchInfo = lookupBranchInfo($request[$field]);

					break;

				default:
					
					if(stripos($field, 'phone') !== false) {

						if(stripos($field, '_type') !== false) {

							if(strlen($request[$field])) {

								$phoneNumberNumberFieldName = str_replace('_type', '_number', $field);
								$phoneNumberExtensionFieldName = str_replace('_type', '_extension', $field);

								$phoneNumber = new \stdClass();
								$phoneNumber->type = $request[$field];
								$phoneNumber->number = $request[$phoneNumberNumberFieldName];
								$phoneNumber->extension = $request[$phoneNumberExtensionFieldName];

								$phoneNumbers[] = $phoneNumber;

							}

						}

					}
					elseif(stripos($field, 'license') !== false) {

						if(stripos($field, '_type') !== false) {

							if(strlen($request[$field])) {

								$licenseNumberFieldName = str_replace('_type', '_number', $field);

								$license = new \stdClass();
								$license->type = $request[$field];
								$license->number = $request[$licenseNumberFieldName];

								$licenses[] = $license;

							}

						}

					}
					
					break;

			}

		}

		//Inject the Phone Info
		$phoneContent = '';

		if(count($phoneNumbers)) {

			$phoneContent .= '<ul class="contact-numbers">';

			foreach($phoneNumbers as $phoneNumber) {

				$phoneContent .= '<li><span class="number-label">' . $phoneNumber->type . '</span> <span class="number">' . $phoneNumber->number;

				if(strlen($phoneNumber->extension)) {

					$phoneContent .= ' ext. ' . $phoneNumber->extension;

				}

				$phoneContent .= '</span></li>';

			}

			$phoneContent .= '</ul>';

		}

		$templateMarkup = str_replace('{{phone_info}}', $phoneContent, $templateMarkup);

		//Inject the Branch Info
		if($branchInfo) {

			$branchInfo->streetAddress = $branchInfo->street;

			if(strlen($branchInfo->lineTwo)) {

				$branchInfo->streetAddress .= ' ' . $branchInfo->lineTwo;

			}

			$templateMarkup = str_replace('{{branch_address}}', $branchInfo->streetAddress, $templateMarkup);
			$templateMarkup = str_replace('{{branch_city}}', $branchInfo->city, $templateMarkup);
			$templateMarkup = str_replace('{{branch_state}}', $branchInfo->state, $templateMarkup);
			$templateMarkup = str_replace('{{branch_zip}}', $branchInfo->zip, $templateMarkup);

		}

		//Inject the License Info
		
		$licenseInfo = [];

		foreach($licenses as $license) {

			$licenseString = '';

			$licenseString .= $license->type . " " . $license->number;

			$licenseInfo[] = $licenseString;

		}

		$licenseInfoContent = ' | Illinois Residential Mortgage Licensee | Georgia Residential Mortgage Licensee |{{branch_nmls}} RM.0000000 | AZ Lic# 0925837 | GA Lic# 39456 | Summit Funding, Inc. NMLS ID# 3199 | www.nmlsconsumeraccess.org';

		$branchNMLS = ( $branchInfo ? ' Branch NMLS ID# ' . $branchInfo->nmls . ' |' : '' );

		$licenseInfoContent = str_replace('{{branch_nmls}}', $branchNMLS, $licenseInfoContent);

		$licenseInfoContent = implode(' | ', $licenseInfo) . $licenseInfoContent;

		$templateMarkup = str_replace('{{license_info}}', $licenseInfoContent, $templateMarkup);


		return $templateMarkup;

	}