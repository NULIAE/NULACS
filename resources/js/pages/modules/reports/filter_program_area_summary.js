$(function () {
	
	
	$(document).on("click", "#submit", function(e){
		e.preventDefault();
  getSummary(base_url+'module/census_reports/program_area_summary/filter');
	});

function getSummary(url) {
	

	$.ajax({
		url	 : url,
		data : $( "#filter-form" ).serialize(),
		dataType : 'json'
	}).done(function(data) {

  $("#area_summary").html(data);

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

$(document).ready(function() {
$('#year').change(function() {
if ($('#year option:selected').val() == '') {
  $('#year_value').val('1');
} else {
  $('#year_value').val('0');
}
});
});



