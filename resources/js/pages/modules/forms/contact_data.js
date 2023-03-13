$(function() {
    console.log( "ready!" );
	var tab_stat = $('#tab_stat').val();
	if(tab_stat==0)
	$('#nav-sync-tab').click();
});
$("#edit-contact-data").submit(function (event) {
	event.preventDefault();
	var $form = $(this);
	var parent_census = $('#hid_parent_census').val();
	$.ajax({
		type : 'POST', 
		url	 : $($form).prop('action'),
		data : $($form).serialize(), 
		dataType : 'json',
		success:function(data){                    
			window.location.href = base_url + 'module/census_report/'+ parent_census +'/contact_data?msg=updateSuccess';
		}
	});

});

$('.input-direct-male').keyup(function(){
	var sum = 0;
	
	if(isNaN($(this).val().replaceAll(',',''))){
		$(this).val("");
	}
	$('.input-direct-male').each(function(){
		if(this.value != "")
			sum += parseInt(this.value.replaceAll(',',''));
	});
	$('#field_direct_total_male').val(numberWithCommas(sum));
});

$('.input-direct-female').keyup(function(){
	var sum = 0;
	
	if(isNaN($(this).val().replaceAll(',',''))){
		$(this).val("");
	}
	$('.input-direct-female').each(function(){
		if(this.value != "")
			sum += parseInt(this.value.replaceAll(',',''));
	});
	$('#field_direct_total_female').val(numberWithCommas(sum));
});

$('.input-public-male').keyup(function(){
	var sum = 0;
	
	if(isNaN($(this).val().replaceAll(',',''))){
		$(this).val("");
	}
	$('.input-public-male').each(function(){
		if(this.value != "")
			sum += parseInt(this.value.replaceAll(',',''));
	});
	$('#field_public_total_male').val(numberWithCommas(sum));
});

$('.input-public-female').keyup(function(){
	var sum = 0;
	
	if(isNaN($(this).val().replaceAll(',',''))){
		$(this).val("");
	}
	$('.input-public-female').each(function(){
		if(this.value != "")
			sum += parseInt(this.value.replaceAll(',',''));
	});
	$('#field_public_total_female').val(numberWithCommas(sum));
});

function tabstatus_change(elem,parent_census,status) {
	
	var table_name = $(elem).attr("id");
	
	$.ajax({
		type : 'POST', 
		url	 : base_url + 'module/forms_update/tab_status_change',
		data : {report_id: parent_census, table_name:table_name, field_tab_status:status}, 
		dataType : 'json',
		success:function(data){
			if (data) {
				window.location.href = base_url + 'module/census_report/'+ parent_census +'/contact_data?tab_message=updateSuccess';
			} else {
				window.location.href = base_url + 'module/census_report/'+ parent_census +'/contact_data';
				
			}                
			
		}
	});


};
