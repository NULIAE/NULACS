$(function () {
	let searchParams = new URLSearchParams(window.location.search);
	var yr = searchParams.get('year');
	if ( searchParams != '' ) {
		setTimeout(function () {
			$( "#submit" ). trigger( "click" ); 
		}, 1000);
	}
	
		$(document).on("click", "#submit", function(e){
			e.preventDefault();
      getSummary(base_url+'module/census_reports/affiliate_program_area_query/filter');
		});
	
	function getSummary(url) {
		
    
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {

      $("#program_area_query").html(data);

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
