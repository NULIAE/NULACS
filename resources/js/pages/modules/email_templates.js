$(function () {
	$('.sign-in-btn').click(function(e){
		e.preventDefault();
		var formElement = $(this).closest('form')[0];
		$(formElement).submit();
	});

	$('form').each(function(){
		$(this).validate({
			rules: {
				name: {required: true},
				content: {required: true}
			},
			errorElement: "div",
			errorPlacement: function(error, element) {
				error.insertAfter( element.parent().parent() ).addClass('invalid-feedback');
				$(element).removeClass('error').addClass('is-invalid');
			},
			submitHandler: function(form) { 
				var nameElement = $("input[name='name']",form);
				var subjectElement = $("input[name='subject']",form);
				var typeElement = $("select[name='type']",form);
				var textareaElement = $("textarea[name='content']",form);
				if(textareaElement.val() == ""){
					textareaElement.parent().append("<div class='error'>This field is required</div>");
					return false;
				}
				var postURL = $(form).prop('action');
				var id = postURL.substring(postURL.lastIndexOf('/') + 1);

				$.ajax({
					type : 'POST',
					url	 : postURL,
					data : {name: nameElement.val(), 'content': CKEDITOR.instances[ 'content'+id ].getData(), 'subject': subjectElement.val(), 'type': typeElement.val()},
					dataType : 'json'
				}).done(function(data) {
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

	//deal with copying the ckeditor text into the actual textarea
	CKEDITOR.on('instanceReady', function () {
		$.each(CKEDITOR.instances, function (instance) {
			CKEDITOR.instances[instance].document.on("keyup", CK_jQ);
			CKEDITOR.instances[instance].document.on("paste", CK_jQ);
			CKEDITOR.instances[instance].document.on("keypress", CK_jQ);
			CKEDITOR.instances[instance].document.on("blur", CK_jQ);
			CKEDITOR.instances[instance].document.on("change", CK_jQ);
		});
	});

	function CK_jQ() {
		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
	}
	
});
