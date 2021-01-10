$(function () {
	$( "#filter-form" ).submit(function(e){
		e.preventDefault();
		getAffiliates($(this).prop('action'))
	});

	$(document).on("click", "#page-links a", function(e){
		e.preventDefault();
		getAffiliates($(this).prop('href'));
	});

	$('#select-page-items').change(function(){
		$( "#filter-form" ).submit();
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
	
	function getAffiliates(url) {
		$('#page-items').val($('#select-page-items').val());
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {
			$('#accordionUsers').html(Mustache.render($('#template-affiliate').html(), { affiliates : data.affiliates }));
			if(data.pagination)
				$('#page-links').html(data.pagination);
			else {
				$('#page-links').html(Mustache.render($('#template-empty-page').html(), { }));
			}
			$('[data-type="selector"]').SumoSelect();
	
			if(data.affiliates.length != 0) {
				$(data.affiliates).each(function(i, item){
					$('#region'+item.affiliate_id)[0].sumo.selectItem(item.region_id);
					$('#state'+item.affiliate_id)[0].sumo.selectItem(parseInt(item.stateid));
					if(item.affiliate_status == "1"){
						$('#status-label'+item.affiliate_id).addClass('checked');
						$('#status'+item.affiliate_id).attr('checked','checked');
					}
					$(item.users).each(function(j, user){
						if(user.is_board_chair == "1"){
							$('#board_chair'+item.affiliate_id)[0].sumo.selectItem(parseInt(user.user_id));
						}
						if(user.is_adm_uploader == "1"){
							$('#adm_uploader'+item.affiliate_id)[0].sumo.selectItem(parseInt(user.user_id));
						}
					});
				});
				revalidateForms();
			}
		});
	}
});
