$(function () {
	var p = document.getElementById('password').value;
	$.validator.addMethod("pwcheck", function(p) {
		return /[ !#$%&@_-]/.test(p);
	  });
	  $.validator.addMethod("checkdigit", function(p) {
		return /[0-9]/.test(p);
	  });
	$( "#reset-pwd-form" ).validate({
		rules: {
			password: {
				required: true,
				minlength : 8,
				checkdigit: true,
				pwcheck: true,
			},
			confirm_pwd: {
				minlength : 8,
				equalTo: "#password"
			}
		},
		messages: {
			password: {
			  pwcheck: "Your password must contain a special character !#$%&@_- ",
			  checkdigit: "Your password must contain at least one digit"
			 
			}
		  },
		errorElement: "div",
		errorPlacement: function(error, element) {
			error.insertAfter( element.parent() ).addClass('invalid-feedback');
			//$(element).addClass('is-invalid');
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
				data : {password : $('#password').val(), token : $('#reset_token').val()}, // our data object
				dataType : 'json'
			}).done(function(data) {
				if ( ! data.success ) {
					$('#error-message').html(data.message).fadeIn();
				} else {
					$(form).fadeOut();
					$('#success-message').fadeIn();
				}
			});
		}
	});
});
