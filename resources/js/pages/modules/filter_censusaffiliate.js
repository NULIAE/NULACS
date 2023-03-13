$(function () {
	
	
		getAffiliates(base_url+'module/census_affiliate/filter/');
	
		$('#submitbtn').click(function(e) {
			e.preventDefault();
			getAffiliates(base_url+'module/census_affiliate/filter/');
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
				//console.log("Nooo")
				//$(".nodata").css("display", "block");
				//$(".nodata").css("text-align", "center");
				$('#page-links').html(data.pagination);
			}


			
			

		});
	}
});

$(document).ready(function() {
	$('#exportbtn').click(function() {
		$('#filter-form').attr('action', (base_url+'module/census_report/censusexport/'));
	  });
});
