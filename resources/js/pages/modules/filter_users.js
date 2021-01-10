$(function () {

	$( "#filter-form" ).submit(function(e){
		e.preventDefault();
		getUsers($(this).prop('action'));
	});

	$(document).on("click", "#page-links a", function(e){
		e.preventDefault();
		getUsers($(this).prop('href'));
	});

	$('#select-page-items').change(function(){
		$( "#filter-form" ).submit();
	});

	$(".btn-filter").click(function(){
		$(".filter").slideToggle("slow");
	});
	
	$( "#search-btn").click();

	function revalidateForms(){
		$('form.update-form').each(function(){
			$(this).validate({
				errorElement: "div",
				errorPlacement: function(error, element) {
					error.appendTo( element.parent() ).addClass('invalid-feedback');
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
					$.ajax({
						type : 'POST',
						url	 : $(form).prop('action'), 
						data : $(form).serialize(),
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
	}
	
	function getUsers(url) {
		$('#page-items').val($('#select-page-items').val());
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {
			$('#accordionUsers').html(Mustache.render($('#template-user').html(), { users : data.users }));
			if(data.pagination)
				$('#page-links').html(data.pagination);
			else {
				$('#page-links').html(Mustache.render($('#template-empty-page').html(), { }));
			}
			$('[data-type="selector"]').SumoSelect();
			if(data.users.length != 0) {
				$(data.users).each(function(i, item){
					$('#prifix'+item.user_id)[0].sumo.selectItem(item.prifix);
					$('#role'+item.user_id)[0].sumo.selectItem(item.role_id);
					$('#affiliate'+item.user_id)[0].sumo.selectItem(item.affiliate_id);
					if(item.user_status == "1"){
						$('#status-label'+item.user_id).addClass('checked');
						$('#status'+item.user_id).attr('checked','checked');
					}
				});
				revalidateForms();
			}
		});
	}
});
