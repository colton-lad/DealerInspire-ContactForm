$(function() {
	/**
	 * Setup masking for phone number field.
	 */
	$('#phone').mask('999-999-9999', {autoclear: false}).on('blur, keyup', function() {
		if ($(this).val().replace(/[_-]/g, '').length === 0) {
			$(this).val('');
		}
	});

	/**
	 * JQuery validation rules for the form.
	 */
	$('#contact-form').validate({
		rules: {
			first_name: {
				required: true,
				minlength: 2,
				maxlength: 80
			},
			last_name: {
				required: true,
				minlength: 2,
				maxlength: 80
			},
			email: {
				required: true,
				email: true
			},
			phone: {
				required: false,
				phoneUS: true
			},
			comment: {
				required: true,
				minlength: 2
			}
		},
		message: {
			first_name: {
				required: 'Please enter a first name.',
				minlength: 'First name must be at least 2 characters in length.',
				maxlength: 'First name must not exceed 80 characters in length.'
			},
			last_name: {
				required: 'Please enter a last name.',
				minlength: 'Lasst name must be at least 2 characters in length.',
				maxlength: 'Last name must not exceed 80 characters in length.'
			},
			email: 'Please enter a valid email address.',
			phone: 'Please enter a valid phone number.',
			comment: {
				required: 'Please enter a comment.',
				minlength: 'Your comment must be at least 10 characters in length.'
			}
		}
	});

	/**
	 * Refactored how the click event of the submit button will be handled.
	 */
	$('body').on('click', '#submit', function(event) {
		event.preventDefault();
		if ($('#contact-form').valid()) {
			$(this).prop('disabled', true);

			var target = $('#contact').find('p.bg-primary');
			var that = this;
			$.ajax({
				url: '/page/process_contact_form',
				method: 'post',
				data: $('#contact-form').serialize(),
				success: function(data) {
					var json = $.parseJSON(data);

					$('.alert').remove();
					if (1 == json.error) {					
						$('#contact-smiley-container').prepend('<div class="alert alert-danger"><p class="text-left"><strong>Errors:</strong></p><ul class="text-left">' + json.message + '</ul></div>');
						$(that).prop('disabled', false);
						//setTimeout(function() {$('.alert').fadeOut()}, 7000);
					} else {
						$('#contact-form').hide();
						$('#contact-smiley-container').prepend('<div class="alert alert-success"><p class="text-left"><strong>Success:</strong> ' + json.message + '</p></div>');
					}
				},
				error: function() {
					$('.alert').remove();
					$('#contact-smiley-container').prepend('<div class="alert alert-warning"><p class="text-left">An <strong>internal issue</strong> has occurred, please try again.  If the issue persist, please contact us via another method.</p></div>');
					$(that).prop('disabled', false);
				} 
			});
		}
	});
});

/**
 * Change to US format to convert from masking
 */
/*$.validator.addMethod('phoneUSCustom', function(phone_number, element) {
	phone_number = phone_number.replace(/\s+/g, '').replace('(', '').replace(')', '-').replace(' ', '-');
	console.log(phone_number);
	console.log('string length: ' + phone_number.length);
	return this.optional( element ) || phone_number.length > 9 &&
		phone_number.match( /^(\+?1-?)?(\([2-9]([02-9]\d|1[02-9])\)|[2-9]([02-9]\d|1[02-9]))-?[2-9]([02-9]\d|1[02-9])-?\d{4}$/ );
}, 'Please specify a valid phone number');*/