$(document).ready(function() {

	//File Upload Feature
	$(function () {

	    $('.file-input').fileupload({

	        dataType: 'json',
	        singleFileUploads: true,

	        add: function(e, data) {

	        	data.submit();

	        },

	        done: function (e, data) {

	        	var form = $(this).closest('form');
	        	var uploadFileURLField = $(form).find('input[name="person_photo_url"]');
	        	var uploadedFile = data.result.files[ data.result.files.length - 1 ];
	        	var filenameElement = $(this).closest('.file').find('.file-name');

	        	$(uploadFileURLField).val(uploadedFile.url);
	        	$(filenameElement).text(uploadedFile.name).show();

	        	$('#generate-preview-button').trigger('click');
	        	
	        }

	    });

	});

	//Update Live Preview
	$('#generate-preview-button').click(function(event) {

		event.preventDefault();

		var viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
		var form = $(this).closest('form');
		var previewFilenameInput = $(form).find('input[name="preview_filename"]');
		var scaleFactorInput = $(form).find('input[name="scale_factor"]');

		if(viewportWidth > 1439) {

			var scaleFactor = 2.5;
			var previewIframeScaleClass = 'large';

		}
		else if(viewportWidth > 767) {

			var scaleFactor = 2;
			var previewIframeScaleClass = 'medium';

		}
		else {

			var scaleFactor = 1.5;
			var previewIframeScaleClass = 'small';

		}

		$(scaleFactorInput).val(scaleFactor);

		$.post("preview.php", $('#customization-form').serialize())
			.done(function(responseData) {
				//alert(responseData);
		  		var response = JSON.parse(responseData);
			
		  		//Save the generated filename
		  		$(previewFilenameInput).val(response.previewFilename);

		  		//Remove the placeholder image
		  		$('.preview-placeholder-image').remove();

		  		//Update the iframe
		  		var iframeSrc = 'previews/' + response.previewFilename + '?ts=' + Date.now();
		  		$('#preview-iframe').removeClass().addClass(previewIframeScaleClass);
		  		$('#preview-iframe').attr('src', iframeSrc);

		});

	});

	//Trigger Live Preview From Form Field Changes
	var formFields = $('#customization-form').find('select, input[type="text"], input[type="email"]');
	$(formFields).change(function() {

		$('#generate-preview-button').trigger('click');

	});

	//Make Live Preview Follow You As You Scroll
	//$(window).scroll(function() {

	//	$('.preview-wrapper').css('top', $(this).scrollTop());

	//});

	//Generate PDF
	$('#generate-pdf-button').click(function(event) {

		event.preventDefault();

		var form = $(this).closest('form');
		var previewFilenameInput = $(form).find('input[name="preview_filename"]');
		var previewFilename = $(previewFilenameInput).val();
		var downloadLinkWrapperElement = $(form).find('.pdf-download-link-wrapper');

		$.post("convert-html-to-pdf.php", {template_filename: previewFilename})

			.done(function(responseData) {

		  		var response = JSON.parse(responseData);

		  		if(response.success) {

		  			var downloadURL = 'pdfs/' + response.filename + '?ts=' + Date.now();
		  			var downloadLinkMarkup = '<a href="' + downloadURL + '" target="_blank">Download PDF</a>';

		  			$(downloadLinkWrapperElement).empty().html(downloadLinkMarkup);

		  		}
		  		else {

		  			alert(response.errorMessage);

		  		}
		  		

		});

	});

});