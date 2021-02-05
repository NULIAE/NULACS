$(function () {
	$(document).on("click", ".page-link", function(e){
		e.preventDefault();
		getAffiliates($(this).prop('href'));
	});

	$('.pagination').removeClass('justify-content-end').addClass('justify-content-center');

	openTab($("#input-interval").val());
	
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
				"currentDate": function () {
					if(data.status == "monthly")
						return Intl.DateTimeFormat('en', { month: 'short' }).format(data.month).toUpperCase()+ "-" + data.year;
					else if(data.status == "quarterly")
						return "Q" + data.quarter + "-" + data.year;
					else
						return data.year;
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
function openTab(val) {
	$('#tab-inner a[href="#' + val + '"]').tab('show');
	if(val == 'nav-y1'){
		$("#div-month-select select").removeAttr('disabled');
		$("#div-month-select").show();
		$("#div-quarter-select").hide();
		$("#div-quarter-select select").attr('disabled', 'disabled');
	} else if(val == 'nav-y2'){
		$("#div-month-select").hide();
		$("#div-month-select select").attr('disabled', 'disabled');
		$("#div-quarter-select select").removeAttr('disabled');
		$("#div-quarter-select").show();
	} else {
		$("#div-month-select").hide();
		$("#div-quarter-select").hide();
		$("#div-month-select select").attr('disabled', 'disabled');
		$("#div-quarter-select select").attr('disabled', 'disabled');
	}
	$("#input-interval").val(val);
  }
