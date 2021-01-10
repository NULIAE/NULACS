$(function () {

	$(document).on("click", ".page-link", function(e){
		e.preventDefault();
		getAffiliates($(this).prop('href'));
	});

	$('.pagination').removeClass('justify-content-end').addClass('justify-content-center');
	
	function getAffiliates(url) {
		//$('#page-items').val($('#select-page-items').val());
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {
			var template = "#template-" + data.status;
			var tableBody = "#" + data.status + "-table-body";
			var pagination = "#" + data.status + "-pagination";
			$(tableBody).html(Mustache.render($(template).html(), { 
				affiliates : data.affiliates, 
				"currentMonth": function () {
					return Intl.DateTimeFormat('en', { month: 'short' }).format(data.month).toUpperCase()+ "-" + data.year;
			  	}
			}));
			
			if(data.pagination)
				$(pagination).html(data.pagination);
			else {
				$(pagination).html(Mustache.render($('#template-empty-page').html(), { }));
			}
			$('.pagination').removeClass('justify-content-end').addClass('justify-content-center');
		});
	}
});
