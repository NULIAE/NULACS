$(function() {
	var tab_stat = $('#tab_stat').val();
	if(tab_stat==0)
	$('#nav-sync-tab').click();
});
$("#edit-revenue").submit(function (event) {
	event.preventDefault();
	var $form = $(this);
	var parent_census = $('#hid_parent_census').val();
	$.ajax({
		type : 'POST', 
		url	 : $($form).prop('action'),
		data : $($form).serialize(), 
		dataType : 'json',
		success:function(data){                    
			window.location.href = base_url + 'module/census_report/'+ parent_census +'/revenue?msg=updateSuccess';
		}
	});

});

function removeVentureType(venture_id){

	alert("Warning: this Venture will actually be deleted when you press ok ") ;
	$.ajax({
		type : 'POST', 
		url	 : base_url + 'module/forms_update/revenue/venture_type_delete',
		data : {'venture_id':venture_id}, 
		dataType : 'json',
		success:function(data){
			console.log("success");
			$('#row' + venture_id + '').remove();
			$('#' + venture_id).remove();
			location.reload();
		}
	});	
}


$(function() {
	$('.edit-field-revenue-input').on('input', function() {
		var total = calcwithcomma('.edit-field-revenue-input');
		var grand_other = Number(total) + Number($('.otherTottal').val());
	  	$('.total_output').val(grand_other);
	});
  });
  
  function calc(ob) {
	var total = 0;
	$(ob).each(function(i, el) {
	  var num = parseFloat($(this).val()) || 0;
	  total += num;
	});
 	
	return total;
  }
  
  function calcwithcomma(ob) {
	var total = 0;
	$(ob).each(function(i, el) {
			let abc = $(this).val().split(",");
			var def = abc.join('');
	  var num = parseFloat(def) || 0;
	  total += num;
	});
 	
	return total;
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
				window.location.href = base_url + 'module/census_report/'+ parent_census +'/revenue?tab_message=updateSuccess';
			} else {
				window.location.href = base_url + 'module/census_report/'+ parent_census +'/revenue';
				
			}                
			
		}
	});

};
