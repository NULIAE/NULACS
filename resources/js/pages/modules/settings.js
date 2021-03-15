$(function () {
	$('form').each(function(){
		$(this).validate({
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
				$('#message-box').fadeOut();
				$.ajax({
					type : 'POST', 
					url	 : $(form).prop('action'), 
					data : $(form).serialize(), 
					dataType : 'json'
				}).done(function(data) {
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
				});
			}
		});
	});
});
