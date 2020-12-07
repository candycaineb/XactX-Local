<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Business Card Prototype</title>
		<!--
		<base href="http://ec2-3-23-59-38.us-east-2.compute.amazonaws.com/summit/">
		-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">

		<link rel="stylesheet" href="css/styles.css">

		<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    	<!-- Jquery UI Widget -->
    	<script src="js/upload/vendor/jquery.ui.widget.js"></script>
		<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	    <script src="js/upload/jquery.iframe-transport.js"></script>
	    <!-- The basic File Upload plugin -->
	    <script src="js/upload/jquery.fileupload.js"></script>

	    <script src="js/customization-form.js"></script>

	</head>

	<body>

		<section class="section">

			<div class="container">

				<h1 class="title">Business Card Prototype</h1>

				<p class="subtitle">Use the form below to start customizing your business card.</p>
			</div>

		</section>

		<section class="section">

			<div class="container">

				<form id="customization-form" class="has-upload" action="" method="POST">

					<input id="scale_factor" type="hidden" name="scale_factor" value="" />
					<input id="preview_filename" type="hidden" name="preview_filename" value="" />

					<div class="columns">
  					
  						<div class="column">
  							
  							<div class="field">

								<label class="label" for="person_photo">Photo</label>

								<div class="file">

									<label class="file-label">

										<input id="person_photo" class="file-input" type="file" name="files[]" data-url="uploads/index.php">
										<input id="person_photo_url" type="hidden" name="person_photo_url" value="" />

										<span class="file-cta">

											<span class="file-icon">
												<i class="fas fa-upload"></i>
											</span>

											<span class="file-label">
												Choose a file...
											</span>

										</span>

									</label>

									<span class="file-name"></span>

								</div>

							</div>

							<div class="field">

								<label class="label" for="person_name">Full Name</label>

								<div class="control">

									<input name="person_name" id="person_name" class="input" value="" type="text" placeholder="James Trickington">

								</div>

							</div>

							<div class="field">

								<label class="label" for="person_job_title">Job Title</label>

								<div class="select">

									<select name="person_job_title" id="person_job_title">
										<option value="">Select Your Job Title</option>
										<option value="Approval Specialist">Approval Specialist</option>
										<option value="Branch Manager">Branch Manager</option>
										<option value="Branch Manager / Loan Consultant">Branch Manager / Loan Consultant</option>
										<option value="Branch Manager / Loan Officer">Branch Manager / Loan Officer</option>
										<option value="Branch Manager / Mortgage Consultant">Branch Manager / Mortgage Consultant</option>
										<option value="Branch Manager / Senior Loan Consultant">Branch Manager / Senior Loan Consultant</option>
										<option value="Branch Manager / Senior Loan Officer">Branch Manager / Senior Loan Officer</option>
										<option value="Branch Manager / Senior Mortgage Consultant">Branch Manager / Senior Mortgage Consultant</option>
										<option value="Branch Manager / Sr. Loan Consultant">Branch Manager / Sr. Loan Consultant</option>
										<option value="Branch Manager / Sr. Loan Officer">Branch Manager / Sr. Loan Officer</option>
										<option value="Branch Manager / Sr. Mortgage Consultant">Branch Manager / Sr. Mortgage Consultant</option>
										<option value="Director of Business Development">Director of Business Development</option>
										<option value="Doc Drawer">Doc Drawer</option>
										<option value="Executive Vice President">Executive Vice President</option>
										<option value="Funder">Funder</option>
										<option value="Greetings Partner">Greetings Partner</option>
										<option value="Loan Assistant">Loan Assistant</option>
										<option value="Loan Consultant">Loan Consultant</option>
										<option value="Loan Coordinator">Loan Coordinator</option>
										<option value="Loan Manager">Loan Manager</option>
										<option value="Loan Officer">Loan Officer</option>
										<option value="Loan Partner I">Loan Partner I</option>
										<option value="Loan Partner II">Loan Partner II</option>
										<option value="Loan Partner/Client Relations">Loan Partner/Client Relations</option>
										<option value="Mortgage Consultant">Mortgage Consultant</option>
										<option value="Office Manager">Office Manager</option>
										<option value="Operations Manager">Operations Manager</option>
										<option value="Sales Coordinator">Sales Coordinator</option>
										<option value="Sales Manager">Sales Manager</option>
										<option value="Sales Manager/ Sr. Loan Consultant">Sales Manager/ Sr. Loan Consultant</option>
										<option value="Senior Loan Consultant">Senior Loan Consultant</option>
										<option value="Senior Loan Officer">Senior Loan Officer</option>
										<option value="Senior Loan Partner I">Senior Loan Partner I</option>
										<option value="Senior Mortgage Consultant">Senior Mortgage Consultant</option>
										<option value="Sr. Loan Consultant">Sr. Loan Consultant</option>
										<option value="Sr. Loan Officer">Sr. Loan Officer</option>
										<option value="Sr. Mortgage Consultant">Sr. Mortgage Consultant</option>
										<option value="Team Captain">Team Captain</option>
									</select>

								</div>

							</div>

							<div class="field">

								<label class="label" for="person_nmls_id_number">NMLS ID Number</label>

								<div class="control">

									<input name="person_nmls_id_number" id="person_nmls_id_number" class="input" value="" type="text" placeholder="1234567">

								</div>

							</div>

							<div class="field">

								<label class="label" for="phone_number_1_type">Phone Number 1 Type</label>

								<div class="select">

									<select name="phone_number_1_type" id="phone_number_1_type">
										<option value="">None</option>
										<option value="Office">Office</option>
										<option value="Direct">Direct</option>
										<option value="Cell">Cell</option>
										<option value="Fax">Fax</option>
										<option value="Toll-Free">Toll-Free</option>
										<option value="Main">Main</option>
									</select>

								</div>

							</div>

							<div class="field">

								<label class="label" for="phone_number_1_number">Phone Number 1</label>

								<div class="control">

									<input name="phone_number_1_number" id="phone_number_1_number" class="input" value="" type="text" placeholder="(555) 123-4567">

								</div>

							</div>

							<div class="field">

								<label class="label" for="phone_number_1_extension">Phone Number 1 Extension</label>

								<div class="control">

									<input name="phone_number_1_extension" id="phone_number_1_extension" class="input" value="" type="text" placeholder="123">

								</div>

							</div>

							<div class="field">

								<label class="label" for="phone_number_2_type">Phone Number 2 Type</label>

								<div class="select">

									<select name="phone_number_2_type" id="phone_number_2_type">
										<option value="">None</option>
										<option value="Office">Office</option>
										<option value="Direct">Direct</option>
										<option value="Cell">Cell</option>
										<option value="Fax">Fax</option>
										<option value="Toll-Free">Toll-Free</option>
										<option value="Main">Main</option>
									</select>

								</div>

							</div>

							<div class="field">

								<label class="label" for="phone_number_2_number">Phone Number 2</label>

								<div class="control">

									<input name="phone_number_2_number" id="phone_number_2_number" class="input" value="" type="text" placeholder="(555) 123-4567">

								</div>

							</div>

							<div class="field">

								<label class="label" for="phone_number_2_extension">Phone Number 2 Extension</label>

								<div class="control">

									<input name="phone_number_2_extension" id="phone_number_2_extension" class="input" value="" type="text" placeholder="123">

								</div>

							</div>

							<div class="field">

								<label class="label" for="phone_number_3_type">Phone Number 3 Type</label>

								<div class="select">

									<select name="phone_number_3_type" id="phone_number_3_type">
										<option value="">None</option>
										<option value="Office">Office</option>
										<option value="Direct">Direct</option>
										<option value="Cell">Cell</option>
										<option value="Fax">Fax</option>
										<option value="Toll-Free">Toll-Free</option>
										<option value="Main">Main</option>
									</select>

								</div>

							</div>

							<div class="field">

								<label class="label" for="phone_number_3_number">Phone Number 3</label>

								<div class="control">

									<input name="phone_number_3_number" id="phone_number_3_number" class="input" value="" type="text" placeholder="(555) 123-4567">

								</div>

							</div>

							<div class="field">

								<label class="label" for="phone_number_3_extension">Phone Number 3 Extension</label>

								<div class="control">

									<input name="phone_number_3_extension" id="phone_number_3_extension" class="input" value="" type="text" placeholder="123">

								</div>

							</div>

							<div class="field">

								<label class="label" for="person_email_address">Email Address</label>

								<div class="control">

									<input name="person_email_address" id="person_email_address" class="input" value="" type="email" placeholder="james.trickington@summitfunding.net">

								</div>


							</div>

							<div class="field">

								<label class="label" for="person_url">URL</label>

								<div class="control">

									<input name="person_url" id="person_url" class="input" value="" type="text" placeholder="www.summitfunding.net/jtrickington">

								</div>

							</div>

  							<div class="field">

								<label class="label" for="branch_location">Branch Location</label>

								<div class="select">

									<select name="branch_location" id="branch_location">
										<option value="">Select Your Branch</option>
										<option value="Baker City, OR">Baker City, OR</option>
										<option value="Baton Rouge, LA">Baton Rouge, LA</option>
										<option value="Bend, OR">Bend, OR</option>
										<option value="Bloomfield Hills, MI">Bloomfield Hills, MI</option>
										<option value="Brentwood, CA">Brentwood, CA</option>
										<option value="Brentwood, TN">Brentwood, TN</option>
										<option value="Campbell, CA">Campbell, CA</option>
										<option value="Carmel, CA">Carmel, CA</option>
										<option value="Centralia, WA">Centralia, WA</option>
										<option value="Chattanooga, TN">Chattanooga, TN</option>
										<option value="Chicago, IL">Chicago, IL</option>
										<option value="Chico, CA - Main St.">Chico, CA - Main St.</option>
										<option value="Chico, CA">Chico, CA</option>
										<option value="Cincinnati, OH">Cincinnati, OH</option>
										<option value="Cincinnati, OH">Cincinnati, OH</option>
										<option value="Cookeville, TN">Cookeville, TN</option>
										<option value="Cornelius, NC">Cornelius, NC</option>
										<option value="Corporate">Corporate</option>
										<option value="Covington, LA">Covington, LA</option>
										<option value="Dallas, TX">Dallas, TX</option>
										<option value="Davis, CA">Davis, CA</option>
										<option value="Elk Grove, CA">Elk Grove, CA</option>
										<option value="Eugene, OR">Eugene, OR</option>
										<option value="Eureka, CA">Eureka, CA</option>
										<option value="Green Bay, WI">Green Bay, WI</option>
										<option value="Green Valley, AZ">Green Valley, AZ</option>
										<option value="Hendersonville, TN">Hendersonville, TN</option>
										<option value="Honolulu, HI">Honolulu, HI</option>
										<option value="Kennewick, WA">Kennewick, WA</option>
										<option value="Lake Oswego, OR">Lake Oswego, OR</option>
										<option value="Lewiston, ID">Lewiston, ID</option>
										<option value="Livermore, CA">Livermore, CA</option>
										<option value="Lodi, CA">Lodi, CA</option>
										<option value="Manteca, CA">Manteca, CA</option>
										<option value="Manzanita, OR">Manzanita, OR</option>
										<option value="Medford, OR">Medford, OR</option>
										<option value="Meredian, ID">Meredian, ID</option>
										<option value="Modesto, CA">Modesto, CA</option>
										<option value="Moscow, ID">Moscow, ID</option>
										<option value="Mount Airy, MD">Mount Airy, MD</option>
										<option value="Murfreesboro, TN">Murfreesboro, TN</option>
										<option value="Newport Beach, CA">Newport Beach, CA</option>
										<option value="Oak Harbor, WA">Oak Harbor, WA</option>
										<option value="Petaluma, CA">Petaluma, CA</option>
										<option value="Pinole, CA">Pinole, CA</option>
										<option value="Plano, TX">Plano, TX</option>
										<option value="Pocatello, ID">Pocatello, ID</option>
										<option value="Portland, OR">Portland, OR</option>
										<option value="Portland, OR">Portland, OR</option>
										<option value="Princeville, HI">Princeville, HI</option>
										<option value="Quincy, CA">Quincy, CA</option>
										<option value="Redding, CA">Redding, CA</option>
										<option value="Reno, NV">Reno, NV</option>
										<option value="Richmond, CA">Richmond, CA</option>
										<option value="Richmond, CA">Richmond, CA</option>
										<option value="Rockwall, TX">Rockwall, TX</option>
										<option value="Roseville, CA - Blue Oaks">Roseville, CA - Blue Oaks</option>
										<option value="Roseville, CA">Roseville, CA</option>
										<option value="Roswell, GA">Roswell, GA</option>
										<option value="Sacramento, CA">Sacramento, CA</option>
										<option value="Salida, CA">Salida, CA</option>
										<option value="Santa Rosa, CA">Santa Rosa, CA</option>
										<option value="San Diego, CA">San Diego, CA</option>
										<option value="Scottsdale, AZ">Scottsdale, AZ</option>
										<option value="Sparks, NV">Sparks, NV</option>
										<option value="Stockton, CA">Stockton, CA</option>
										<option value="Susanville, CA">Susanville, CA</option>
										<option value="Tempe, AZ">Tempe, AZ</option>
										<option value="Timonium, MD">Timonium, MD</option>
										<option value="Tucson, AZ">Tucson, AZ</option>
										<option value="Tucson, AZ">Tucson, AZ</option>
										<option value="Tucson, AZ">Tucson, AZ</option>
										<option value="Tucson, AZ">Tucson, AZ</option>
										<option value="Tulsa, OK">Tulsa, OK</option>
										<option value="Vacaville, CA">Vacaville, CA</option>
										<option value="Walnut Creek, CA">Walnut Creek, CA</option>
										<option value="White Rock Lake, TX">White Rock Lake, TX</option>
									</select>

								</div>

							</div>

							<div class="field">

								<label class="label" for="license_1_type">License 1 Type</label>

								<div class="select">

									<select name="license_1_type" id="license_1_type">
										<option value="">None</option>
										<option value="CA DRE ID Number">CA DRE ID Number</option>
										<option value="DORA ID Number">DORA ID Number</option>
										<option value="AZ MLO Number">AZ MLO Number</option>
										<option value="GA Numbe">GA Number</option>
										<option value="Ohio">Ohio</option>
									</select>

								</div>

							</div>

							<div class="field">

								<label class="label" for="license_1_number">License 1 Number</label>

								<div class="control">

									<input name="license_1_number" id="license_1_number" class="input" value="" type="text" placeholder="1234567">

								</div>

							</div>

							<div class="field">

								<label class="label" for="license_2_type">License 2 Type</label>

								<div class="select">

									<select name="license_2_type" id="license_2_type">
										<option value="">None</option>
										<option value="CA DRE ID Number">CA DRE ID Number</option>
										<option value="DORA ID Number">DORA ID Number</option>
										<option value="AZ MLO Number">AZ MLO Number</option>
										<option value="GA Numbe">GA Number</option>
										<option value="Ohio">Ohio</option>
									</select>

								</div>

							</div>

							<div class="field">

								<label class="label" for="license_2_number">License 2 Number</label>

								<div class="control">

									<input name="license_2_number" id="license_2_number" class="input" value="" type="text" placeholder="1234567">

								</div>

							</div>

							<div class="field">

								<label class="label" for="license_3_type">License 3 Type</label>

								<div class="select">

									<select name="license_3_type" id="license_3_type">
										<option value="">None</option>
										<option value="CA DRE ID Number">CA DRE ID Number</option>
										<option value="DORA ID Number">DORA ID Number</option>
										<option value="AZ MLO Number">AZ MLO Number</option>
										<option value="GA Numbe">GA Number</option>
										<option value="Ohio">Ohio</option>
									</select>

								</div>

							</div>

							<div class="field">

								<label class="label" for="license_3_number">License 3 Number</label>

								<div class="control">

									<input name="license_3_number" id="license_3_number" class="input" value="" type="text" placeholder="1234567">

								</div>

							</div>

							<div class="field">

								<label class="label" for="license_4_type">License 4 Type</label>

								<div class="select">

									<select name="license_4_type" id="license_4_type">
										<option value="">None</option>
										<option value="CA DRE ID Number">CA DRE ID Number</option>
										<option value="DORA ID Number">DORA ID Number</option>
										<option value="AZ MLO Number">AZ MLO Number</option>
										<option value="GA Numbe">GA Number</option>
										<option value="Ohio">Ohio</option>
									</select>

								</div>

							</div>

							<div class="field">

								<label class="label" for="license_4_number">License 4 Number</label>

								<div class="control">

									<input name="license_4_number" id="license_4_number" class="input" value="" type="text" placeholder="1234567">

								</div>

							</div>

							<div class="field">

								<label class="label" for="license_5_type">License 5 Type</label>

								<div class="select">

									<select name="license_5_type" id="license_5_type">
										<option value="">None</option>
										<option value="CA DRE ID Number">CA DRE ID Number</option>
										<option value="DORA ID Number">DORA ID Number</option>
										<option value="AZ MLO Number">AZ MLO Number</option>
										<option value="GA Numbe">GA Number</option>
										<option value="Ohio">Ohio</option>
									</select>

								</div>

							</div>

							<div class="field">

								<label class="label" for="license_5_number">License 5 Number</label>

								<div class="control">

									<input name="license_5_number" id="license_5_number" class="input" value="" type="text" placeholder="1234567">

								</div>

							</div>

  						</div>

  						<div class="column preview-column">

  							<div class="preview-wrapper">

  								<img src="images/preview-placeholder.png" alt="Live preview placeholder image" border="0" class="preview-placeholder-image" />

	  							<iframe src="" id="preview-iframe"></iframe>

	  							<div class="field is-grouped">

									<div class="control">

										<button class="button is-info" id="generate-preview-button">Update Preview</button>

									</div>

									<div class="control">

										<button class="button is-success" id="generate-pdf-button">Generate PDF</button>

									</div>

								</div>

								<div class="pdf-download-link-wrapper"></div>	

							</div>

  						</div>

  					</div>

				</form>

			</div>

		</section>

	</body>

</html>