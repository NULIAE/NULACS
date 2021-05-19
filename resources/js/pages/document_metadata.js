$(function () {
	var i = 1;
	function add_dynamic_input(value) {
		i++;
		if(i <= 5){
			$('#dynamic_fields').append('<span class="appending" id="row'+i+'">'+
				'<div class="col-lg-8 col-md-12 form-group nulselect">'+
				'<select data-placeholder="data type" name="data-type['+i+'] "class="data-type" data-type="selector" data-class="CaptionCont" required>'+
					'<option value="">Data type</option>'+
					'<option value="number"' +(value.datatype == "number" ? 'selected' : '')+'>Number</option>'+
					'<option value="text"' +(value.datatype == "text" ? 'selected' : '')+'>Text</option>'+
				'</select>'+
				'</div>'+
				'<input type="text" name="metadata['+i+']" class="col-20 form-control meta-data-value" placeholder="Meta Data" value="'+value.metadata+'" required>'+
				'<button name="remove" id="'+i+'" class="btn btn_remove" type="button"><i class="i i-minus"></i></button>'+
			'</span>');
			$('[data-type="selector"]').SumoSelect();
		} else {
			$('#add').attr('disabled', 'true');
			i = 5;
		}
	}

	function remove_all_dynamic_input() {
		$('.appending').remove();
		i = 0;
	}

	$('#add').click(function(){
		add_dynamic_input({datatype:"",metadata:""});
	});

	$(document).on('click','.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#dialog').NitroDialog({
			action: "open",
			backdrop: true,
			message: '<h4 class="bold m-b-15"><i class="i i-warning text-warning m-r-10"></i>Confirm</h4><p>Do you want to remove this metadata field?</p>',
			buttons: [
				{
					label: 'Proceed',
					class: "btn btn-primary mr-1",
					action: function () {
						
						$("#row"+button_id+"").remove();
						$('#add').removeAttr('disabled');
						i--;
            			$('#dialog').NitroDialog({ action: "close" });
					}
				},
				{
					label: 'Cancel',
					class: "btn btn-secondary",
					action: function () {
						$('#dialog').NitroDialog({ action: "close" });
					}
				}
			]
		});
	});

	$('#select-document-type').change(function(){
		$('#select-document').children('option:not(:first)').remove();
		remove_all_dynamic_input();
		if($(this).val() == ""){
			$('#select-document')[0].sumo.reload();
			$(".SumoSelect").addClass("nulSelector");
			return false;
		}
		$.ajax({
			type : 'GET',
			url	 : 'get-documents/' + $(this).val(),
			dataType : 'json'
		}).done(function(data) {
			$(data).each(function(i, item){
				$('#select-document')
					.append($("<option></option>")
					.attr("value",item.document_id)
					.text(item.document_name)); 
			});
			$('#select-document')[0].sumo.reload();
			$(".SumoSelect").addClass("nulSelector");
			$('#select-document')[0].sumo.selectItem($('#selected-document').val());
			$('#selected-document').val("");
		});
	});

	$('#select-document').change(function(){
		remove_all_dynamic_input();
		if(!$(this).val())
			return false;
		$.ajax({
			type : 'GET',
			url	 : 'get-document-metadata/' + $(this).val(),
			dataType : 'json'
		}).done(function(data) {
			if(data.success) {
				var metadata = JSON.parse(data.metadata);
		   		$(metadata).each(function(i, item){
					add_dynamic_input(item);
				});
			}
		});
	});

	$('#document-metadata-form').validate({
		rules: {
            "metadata[]": "required"
        },
		errorElement: "div",
		errorPlacement: function(error, element) {
			error.insertAfter( element.parent() ).addClass('invalid-feedback');
			//$(element).addClass('is-invalid');
		},
		highlight: function(element, errorClass, validClass) {
			$(element).addClass('is-invalid').removeClass(validClass);
			//$(element).next().addClass('invalid-feedback').removeClass(validClass);
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('is-invalid').addClass(validClass);
			//$(element).next().removeClass('invalid-feedback').addClass(validClass);
		},
		submitHandler: function(form) {
			var val = [], meta = [] , values=[];
			
			$(".meta-data-value").map(function(){
				return val.push($(this).val());	
			}).get();
			
		 	$(".data-type").map(function(){
				return meta.push($(this).val());
			}).get();

			for (var i = 0; i < val.length; i++) {
				values.push({metadata:val[i], datatype: meta[i]});
			}

			$.ajax({
				type : 'POST',
				url	 : $(form).prop('action'),
				data : {document_type_id : $('#select-document-type').val(),document_id : $('#select-document').val(),metadata : JSON.stringify(values)},
				dataType : 'json'
			}).done(function(data) {
				if(data.success){		
					showDialogBox('success', data.message);
				} else {
					showDialogBox('error', data.message);
				}
			});
		}
	});

});
function show_metadata(document_type_id, document_id) {
	if($('#select-document-type').val() == document_type_id){
		$('#select-document')[0].sumo.selectItem(document_id.toString());
	} else {
		$('#selected-document').val(document_id);
		$('#select-document-type')[0].sumo.selectItem(document_type_id.toString());
	}
}
