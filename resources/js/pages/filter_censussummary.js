$(function () {
	
	$(document).on("click", "#submit", function(e){
		e.preventDefault();
		getSummary(base_url+'module/censussummary/filter/');
	});

	$(document).on("click", "#export", function(e){
		e.preventDefault();
		var params = $( "#filter-form" ).serialize();
		var url = base_url+'module/censussummary/export/';
		document.location.href = base_url+'module/censussummary/export?'+params;
	
	});

	function getSummary(url) {
  
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {

      	$("#censussummary").html(data);

		});
	}
	$('.censusadmin').removeClass('active');
    $('.censusreport').addClass('active');
});
