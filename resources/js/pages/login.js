$(function () {
	//Login form validation
	$('#loginForm').validate({
		errorElement: "div",
		errorPlacement: function(error, element) {
			error.insertAfter( element.parent().parent() ).addClass('invalid-feedback');
			$(element).removeClass('error').addClass('is-invalid');
		},
		highlight: function(element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
		submitHandler: function(form) {
			$('#login-error-box').hide();
			$('.login-form-btn').html('signing in..').attr('disabled', 'disabled');
			$.ajax({
				type : 'POST',
				url	 : $(form).prop('action'),
				data : $(form).serialize(),
				dataType : 'json'
			}).done(function(data) {
				if ( data.success ) {
					window.location = base_url + $('#return_url').val();
				} else {
					$('#login-error-box').html(data.error).show();
					$('.login-form-btn').html('sign in').removeAttr('disabled');
				}
			});
		}
	});

	//Forgot password popup
	$('#f-pass').on('click', function () {
		popup.open('#popupPass', 400, 250, { // 540 + 40
		  units: 'px',
		  block: true,
		  animateIn: 'fadeIn',
		  animateOut: 'fadeOut'
		  // (matched.browser !== 'edge' && matched.browser !== 'msie') ? CONFIG.embedVideo : CONFIG.ieEmbedVideo
		});
	  });

	//Reset password form validation and Ajax submit
	$('#resetButton').click(function(){
		$('#reset-form').submit();
	});
	//Reset form validation	
	$('#reset-form').validate({
		errorElement: "div",
		errorPlacement: function(error, element) {
			error.insertAfter( element ).addClass('invalid-feedback');
			$(element).addClass('is-invalid');
		},
		highlight: function(element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass(validClass);
			$(element).next().addClass('invalid-feedback').removeClass(validClass);
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass(validClass);
			$(element).next().removeClass('invalid-feedback').addClass(validClass);
		},
		submitHandler: function(form) {
			$.ajax({
				type : 'POST',
				url	 : $(form).prop('action'),
				data : {email : $('#reset-email').val(), location : $('#selectnul').val()},
				dataType : 'json'
			}).done(function(data) {
				if ( data.success ) {
					form.reset();
					popup.close('#popupPass');
					showDialogBox('success', data.message);
				} else {
					showDialogBox('error', data.message);
				}
			});
		}
	});
});
