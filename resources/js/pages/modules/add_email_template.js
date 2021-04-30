$(function () {

    $('form').validate({
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

            $.ajax({
                type : 'POST',
                url	 : $(form).prop('action'),
                data : {name: nameElement.val(), 'content': CKEDITOR.instances[ 'content' ].getData(), 'subject': subjectElement.val(), 'type': typeElement.val()},
                dataType : 'json'
            }).done(function(data) {
                if ( ! data.success ) {
					showDialogBox('error', data.message);
				} else {
					window.location.href = base_url + "module/notification/emails";
				}
            }); 
        }
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
