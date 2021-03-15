$(function () {
	$( "#add-form" ).validate({
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
			$('#message-box').fadeOut();
			$.ajax({
				type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url	 : $(form).prop('action'), // the url where we want to POST
				data : $(form).serialize(), // our data object
				dataType : 'json'
			}).done(function(data) {
				if ( ! data.success ) {
					var toastConfig = {
						timeout: 60*60*1000,
						position: 'top',
						actionText: 'OK',
						message: data.message,
						//actionHandler: someCallbackFunction
					};
					setTimeout(function(){
						$('#snackbar').NitroToast(toastConfig);
					}, 2000);
				} else {
					window.location.href = base_url + "module/affiliate";
				}
			});
		}
	});
});
