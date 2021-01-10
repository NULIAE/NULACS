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
		}
	});

	//Forgot password popup
	$('#f-pass').on('click', function () {
		popup.open('#popupPass', 400, 300, { // 540 + 40
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
		invalidHandler: function(event, validator) {
			// 'this' refers to the form
			var errors = validator.numberOfInvalids();
			if (errors) {
				var height = 300 + (errors * 20);
				$('#popupPass').height(height);
			}
		},
		submitHandler: function(form) { 
			$('#popupPass').height(300);
			$.ajax({
				type : 'POST',
				url	 : $(form).prop('action'),
				data : {email : $('#reset-email').val(), location : $('#selectnul').val()},
				dataType : 'json'
			}).done(function(data) {
				var toastConfig = {
					timeout: 5000,
					position: 'top',
					actionText: 'OK',
					message: data.message,
					//actionHandler: someCallbackFunction
				};
				if ( data.success ) {
					form.reset();
					popup.close('#popupPass');
				}
				setTimeout(function(){
					$('#snackbar').NitroToast(toastConfig);
				}, 2000);

			});
		}
	});
});
