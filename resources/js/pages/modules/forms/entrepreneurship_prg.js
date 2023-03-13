$(function() {
    console.log( "ready!" );
	var tab_stat = $('#tab_stat').val();
	if(tab_stat==0)
	$('#nav-sync-tab').click();
});
$("#edit-entrepreneurship-prg").submit(function (event) {
	event.preventDefault();
	var $form = $(this);
	var parent_census = $('#hid_parent_census').val();
	$.ajax({
		type : 'POST', 
		url	 : $($form).prop('action'),
		data : $($form).serialize(), 
		dataType : 'json',
		success:function(data){                    
			window.location.href = base_url + 'module/census_report/'+ parent_census +'/entrepreneurship_program?msg=updateSuccess';
		}
	});

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
				window.location.href = base_url + 'module/census_report/'+ parent_census +'/entrepreneurship_program?tab_message=updateSuccess';
			} else {
				window.location.href = base_url + 'module/census_report/'+ parent_census +'/entrepreneurship_program';
				
			}                
			
		}
	});


};

function removeBuisinessType(entrepreneurship_id){

	$('#row' + entrepreneurship_id + '').remove();
	$('#' + entrepreneurship_id).remove();
}
