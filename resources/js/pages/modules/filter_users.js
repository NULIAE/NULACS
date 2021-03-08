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
	
	$( "#export-btn").click(function(){
		var export_url = base_url + 'module/user/export?' + $( "#filter-form" ).serialize();
		window.location = export_url;
	});

	$("#region").on("change", function(){
		$('#affiliate').children('option:not(:first)').remove();
		$.ajax({
			url	 : base_url + 'module/affiliate/filter/?page_items=1000&region='+$(this).val(),
			dataType : 'json'
		}).done(function(data) {

			if(data.affiliates.length != 0) {
				$(data.affiliates).each(function(i, item){
					$('#affiliate')
					.append($("<option></option>")
					.attr("value",item.affiliate_id)
					.text(item.city+","+item.state));
				});
			}
			$('#affiliate')[0].sumo.reload();
		});
	});

	
	function getUsers(url) {
		$('#page-items').val($('#select-page-items').val());
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {
			$('#accordionUsers').html(Mustache.render($('#template-user').html(), { 
				users : data.users,
				"update_url": function () {
					return base_url + "user/edit-profile/" + this.user_id;
				},
			}));
			if(data.pagination)
				$('#page-links').html(data.pagination);
			else {
				$('#page-links').html(Mustache.render($('#template-empty-page').html(), { }));
			}
			
			if(data.users.length != 0) {
				$(data.users).each(function(i, item){
					if(item.user_status == "1"){
						$('#status-label'+item.user_id).addClass('checked');
						$('#status'+item.user_id).attr('checked','checked');
					}
					if(item.is_adm_uploader == "1"){
						$('#isadm-label'+item.user_id).addClass('checked');
						$('#isadm'+item.user_id).attr('checked','checked');
					}
					if(item.isuser_super_administrator == "1"){
						$('#issuper-label'+item.user_id).addClass('checked');
						$('#issuper'+item.user_id).attr('checked','checked');
					}
				});
			}
		});
	}
});
