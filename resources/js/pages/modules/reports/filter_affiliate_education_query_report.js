$(function () {
	
	
		$(document).on("click", "#submit", function(e){
			e.preventDefault();
      getSummary(base_url+'module/census_reports/affiliate_education_query_report/filter');
s		});
	
	function getSummary(url) {
		
    
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {

      $("#aff_edu_qry_report").html(data);

		});
	}
});

$(document).ready(function() {
	$('#table11').DataTable({
	paging: false,
	searching: false,
	info: false
	});
});