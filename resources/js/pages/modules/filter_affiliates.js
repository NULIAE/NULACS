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
	
	function getAffiliates(url) {
		$('#page-items').val($('#select-page-items').val());
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {
			$('#accordionUsers').html(Mustache.render($('#template-affiliate').html(), { 
				affiliates : data.affiliates,
				"update_url": function () {
					return base_url + "module/affiliate/edit/" + this.affiliate_id;
				},
			}));
			if(data.pagination)
				$('#page-links').html(data.pagination);
			else {
				$('#page-links').html(Mustache.render($('#template-empty-page').html(), { }));
			}
			$('[data-type="selector"]').SumoSelect();
	
			if(data.affiliates.length != 0) {
				$(data.affiliates).each(function(i, item){
					$('#region'+item.affiliate_id)[0].sumo.selectItem(item.region_id);
					$('#compliance_dues'+item.affiliate_id)[0].sumo.selectItem(item.compliance_dues);
					$('#ul_census'+item.affiliate_id)[0].sumo.selectItem(item.ul_census);
					if(item.affiliate_status == "1"){
						$('#status-label'+item.affiliate_id).addClass('checked');
						$('#status'+item.affiliate_id).attr('checked','checked');
					}
					$(item.users).each(function(j, user){
						if(user.is_board_chair == "1"){
							$('#board_chair'+item.affiliate_id).val(user.prifix+user.first_name+' '+user.last_name);
						}
					});
				});
			}
		});
	}
});
