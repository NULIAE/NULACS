$(function() {
    console.log( "ready!" );
	var tab_stat = $('#tab_stat').val();
	if(tab_stat==0)
	$('#nav-sync-tab').click();
});
$("#edit-expenditure").submit(function (event) {
	event.preventDefault();
	var $form = $(this);
	var parent_census = $('#hid_parent_census').val();
	$.ajax({
		type : 'POST', 
		url	 : $($form).prop('action'),
		data : $($form).serialize(), 
		dataType : 'json',
		success:function(data){                    
			window.location.href = base_url + 'module/census_report/'+ parent_census +'/expenditure?msg=updateSuccess';
		}
	});

});

$('.input-value-calc').keyup(function(){
	var sum = 0;
	var value = $(this).val().replaceAll(',','');
	console.log(value);
	if(isNaN(value)){
		$(this).val("");
	}
	$('.input-value-calc').each(function(){
		if(this.value != "")
			sum += parseFloat(this.value.replaceAll(',',''));
	});
	$('#edit-field-total-expenditures').val(numberWithCommas(sum));
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
				window.location.href = base_url + 'module/census_report/'+ parent_census +'/expenditure?tab_message=updateSuccess';
			} else {
				window.location.href = base_url + 'module/census_report/'+ parent_census +'/expenditure';
				
			}                
			
		}
	});


};
