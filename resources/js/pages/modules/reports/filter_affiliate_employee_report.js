$(function () {
	
	
		$(document).on("click", "#submit", function(e){
			e.preventDefault();
      getSummary(base_url+'module/census_reports/affiliate_employee_report/filter');
s		});
	
	function getSummary(url) {
		
    
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {

      $("#employee_history").html(data);

		});
	}
});
