

$("#edit-prg-frm").submit(function (event) {
	event.preventDefault();
	var $form = $(this);
	console.log("success12");
	console.log($($form).prop('action'));
	$.ajax({
		type : 'POST', 
		url	 : $($form).prop('action'),
		data : $($form).serialize(), 
		dataType : 'json',
		success:function(data){               
			window.location.href = 'viewprogram?msg=updateSuccess';
		}
	});

});