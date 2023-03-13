$(function() {
var tab_stat = $('#tab_stat').val();
if(tab_stat==0)
$('#nav-sync-tab').click();
});

$("#edit-servicearea").submit(function (event) {
	$('#update_msg').hide();
	event.preventDefault();
	var count, i, sum;
	count = $('.servicearea').attr('id');
	for(i=1; i <= count; i++){
		sum = 0;
		$('#table'+i+' .input-check-100').each(function(){
			var percent = this.value.replaceAll(',','');
			percent = (percent == '') ? 0 : percent;
			sum += parseFloat(percent);
		});

		if(sum != 100) {
			$('#percent-error'+i).removeClass('d-none');
			$('html, body').animate({scrollTop: $('#percent-error'+i).offset().top}, 500);
			return;
		} else {
			$('#percent-error'+i).addClass('d-none');
		}
	}
	var $form = $(this);
	var parent_census = $('#hid_parent_census').val();
	$.ajax({
		type : 'POST', 
		url	 : $($form).prop('action'),
		data : $($form).serialize(), 
		dataType : 'json',
		success:function(data){                    
			window.location.href = base_url + 'module/census_report/'+ parent_census +'/serviceareas?msg=updateSuccess';
		}
	});

});

function removeServiceArea(areaId){
	$.ajax({
		type : 'POST', 
		url	 : base_url + 'module/forms_update/service_area/delete',
		data : {'areaId':areaId}, 
		dataType : 'json',
		success:function(data){
			console.log("success");
			$('#row' + areaId + '').remove();
			$('#' + areaId).remove();
		}
	});	
}

function tabstatus_change(elem,parent_census,status) {
	
	var table_name = $(elem).attr("id");
	
	$.ajax({
		type : 'POST', 
		url	 : base_url + 'module/forms_update/tab_status_change',
		data : {report_id: parent_census, table_name:table_name, field_tab_status:status}, 
		dataType : 'json',
		success:function(data){
			if (data) {
				window.location.href = base_url + 'module/census_report/'+ parent_census +'/serviceareas?tab_message=updateSuccess';
			} else {
				window.location.href = base_url + 'module/census_report/'+ parent_census +'/serviceareas';
				
			}                
			
		}
	});


};