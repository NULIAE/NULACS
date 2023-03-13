

$("#program-add").submit(function (event) {
	$('#update_msg').hide();
	event.preventDefault();
	var $form = $(this);
	var parent_census = $('#hid_parent_census').val();
	$.ajax({
		type : 'POST', 
		url	 : $($form).prop('action'),
		data : $($form).serialize(), 
		dataType : 'json',
		success:function(data){     
      console.log(data);
			window.location.href = base_url + data.url;
		}
	});

});

// function removeServiceArea(areaId){
// 	$.ajax({
// 		type : 'POST', 
// 		url	 : base_url + 'module/forms_update/service_area/delete',
// 		data : {'areaId':areaId}, 
// 		dataType : 'json',
// 		success:function(data){
// 			console.log("success");
// 			$('#row' + areaId + '').remove();
// 			$('#' + areaId).remove();
// 		}
// 	});	
// }