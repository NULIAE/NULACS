$(function () {
	
	
		$(document).on("click", "#submit", function(e){
			e.preventDefault();
      getSummary(base_url+'module/census_reports/affiliate_people_history/filter/');
		});
	
	function getSummary(url) {
		
    
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {

      $("#people_history").html(data);

		});
	}
});
