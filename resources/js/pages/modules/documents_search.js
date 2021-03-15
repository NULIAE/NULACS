$(function () {

	var toastConfig = {
		timeout: 60*60*1000,
		position: 'top',
		actionText: 'OK',
		message: ''
	};

	$('.datepick').datetimepicker({
        format: 'DD-MM-YYYY',
        icons: {
          previous: 'i i-keyboard_arrow_left',
          next: 'i i-keyboard_arrow_right',
        }
    }).on('dp.hide', function (e) {
		$(this).val(e.date.format('MM-DD-YYYY'));
	});

    $('#yearpicker').datetimepicker({
		format: 'YYYY',
		viewMode: 'years',
		icons: {
			previous: 'i i-keyboard_arrow_left',
			next: 'i i-keyboard_arrow_right',
		}
	}).on('dp.hide', function (e) {
		$('#yearpicker').val(e.date.format('YYYY'));
	});

	$('#monthpicker').datetimepicker({
		format: 'M',
		viewMode: 'months',
		icons: {
			previous: 'i i-keyboard_arrow_left',
			next: 'i i-keyboard_arrow_right',
		}
	}).on('dp.hide', function (e) {
		$('#monthpicker').val(e.date.format('M'));
	});

	$('#doctype').change(function(){
		$('#document').children('option').remove();
		if($(this).val() == ""){
			$('#document')[0].sumo.reload();
			$('#monthpicker').val("").attr("disabled", "disabled");
			$('#quarter').val("").attr("disabled", "disabled");
			return false;
		}else if($(this).val() == "1"){
			$('#monthpicker').removeAttr("disabled");
			$('#quarter').val("").attr("disabled", "disabled");
		}else if($(this).val() == "2"){
			$('#quarter').removeAttr("disabled");
			$('#monthpicker').val("").attr("disabled", "disabled");
		} else {
			$('#monthpicker').val("").attr("disabled", "disabled");
			$('#quarter').val("").attr("disabled", "disabled");
		}

		$.ajax({
			type : 'GET',
			url	 : base_url + 'document/get-documents/' + $(this).val(),
			dataType : 'json'
		}).done(function(data) {
			$(data).each(function(i, item){
				$('#document')
					.append($("<option></option>")
					.attr("value",item.document_id)
					.text(item.document_name)); 
			});
			$('#document')[0].sumo.reload();
			$('#document')[0].sumo.selectAll();
		});
	});

	$( "#filter-form" ).submit(function(e){
		e.preventDefault();
		getDocumentsList($(this).prop('action'))
	});

	$(document).on("click", "#page-links a", function(e){
		e.preventDefault();
		getDocumentsList($(this).prop('href'));
	});

	$('#select-page-items').change(function(){
		$( "#filter-form" ).submit();
	});
	
	function getDocumentsList(url){

		if($('#doctype').val() == ""){
			toastConfig.message = "Please select a document type.";
			$('#snackbar').NitroToast(toastConfig);
			return;
		}
		if($('#document').val() == ""){
			toastConfig.message = "Please select a document.";
			$('#snackbar').NitroToast(toastConfig);
			return;
		}
		
		var inputData = {
			doctype: $('#doctype').val(),
			document: $('#document').val(),
			docstatus: $('#docstatus').val(),
			affiliate: $('#affiliate').val(),
			metadata: $('#metadata').val(),
			month: $('#monthpicker').val(),
			quarter: $('#quarter').val(),
			year:$('#yearpicker').val(),
			page_items:$('#select-page-items').val()
		};
		$('#e_doctype').val($('#doctype').val());
		$('#e_document').val($('#document').val());
		$('#e_docstatus').val($('#docstatus').val());
		$('#e_affiliate').val($('#affiliate').val());
		$('#e_metadata').val($('#metadata').val());
		$('#e_monthpicker').val($('#monthpicker').val());
		$('#e_quarter').val($('#quarter').val());
		$('#e_yearpicker').val($('#yearpicker').val());
		$('#e_select-page-items').val($('#select-page-items').val());


		
		$.ajax({
			url	 : url,
			data : inputData,
			dataType : 'json'
		}).done(function(data) {
			$("#documents-list").html(Mustache.render($("#template-document-list").html(), { 
				documents : data.documents, 
				"documentPath": function () {
					return base_url + this.file_path;
			  	}
			}));
			
			if(data.pagination)
				$("#page-links").html(data.pagination);
			else {
				$("#page-links").html(Mustache.render($('#template-empty-page').html(), { }));
			}
			$('.pagination').removeClass('justify-content-end').addClass('justify-content-center');
		});
	}
});
