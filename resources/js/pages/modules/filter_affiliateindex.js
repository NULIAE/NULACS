$(function () {
	
	
		getAffiliates(base_url+'module/affiliateindex/filter');
	
		$( "#filter-form" ).submit(function(e){
			e.preventDefault();
			getAffiliates(base_url+'module/affiliateindex/filter');
		});
	
		$(document).on("click", ".page-item a", function(e){
			e.preventDefault();
			getAffiliates($(this).prop('href'));
		});

	// $('#select-page-items').change(function(){
	// 	$( "#filter-form" ).submit();
	// });

	// $( "#search-btn").click();
	
	function getAffiliates(url) {
		//alert(url)
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {

			$("#table-body").html(Mustache.render($("#template").html(), { 
				affiliates : data.report_list, 
				
				
			}));
			if(data.pagination)
				$('#page-links').html(data.pagination);
			else {
				$('#page-links').html(data.pagination);
			}


			
			

		});
	}
	$('.censusadmin').removeClass('active');
    $('.censusreport').addClass('active');
});
