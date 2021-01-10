$(function () {
	$( "#reset-pwd-form" ).validate({
		rules: {
			new_password: {
				required: true,
				minlength : 6
			},
			confirm_pwd: {
				minlength : 6,
				equalTo: "#new_password"
			}
		},
		errorElement: "div",
		errorPlacement: function(error, element) {
			error.insertAfter( element.parent() ).addClass('invalid-feedback');
			$(element).addClass('is-invalid');
		},
		highlight: function(element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass(validClass);
			//$(element).next().addClass('invalid-feedback').removeClass(validClass);
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass(validClass);
			//$(element).next().removeClass('invalid-feedback').addClass(validClass);
		},
		submitHandler: function(form) { 
			$('#error-message').fadeOut();
			var postUrl = $(form).prop('action');
			$.ajax({
				type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url	 : postUrl, // the url where we want to POST
				data : {password : $('#password').val(), new_password : $('#new_password').val()}, // our data object
				dataType : 'json'
			}).done(function(data) {
				if(data.success) {
					form.reset();
				}
				var toastConfig = {
					timeout: 5000,
					position: 'top',
					actionText: 'OK',
					message: data.message,
					//actionHandler: someCallbackFunction
				};
				setTimeout(function(){
					$('#snackbar').NitroToast(toastConfig);
				}, 2000);
			});
		}
	});
});
