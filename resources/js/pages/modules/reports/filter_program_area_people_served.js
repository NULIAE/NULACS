$(function () {
	
	
		$(document).on("click", "#submit", function(e){
			e.preventDefault();
      getSummary(base_url+'module/census_reports/program_area_people_served/filter');
s		});
	
	function getSummary(url) {
		
    
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {

      $("#people_served").html(data);

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
