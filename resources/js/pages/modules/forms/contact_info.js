

$("#edit-contact").submit(function (event) {
	event.preventDefault();
	var file_data = $('#photo').prop('files')[0];   
    var form_data = new FormData(this);                  
    form_data.append('photo', file_data);
	$.ajax({
		type : 'POST', 
		url	 : $(this).prop('action'),
		data : form_data, 
		dataType : 'json',
		cache: false,
        contentType: false,
        processData: false,
		success:function(data){                    
			window.location.href = base_url + 'module/census_report/'+ data.report_id +'/view?msg=updateSuccess';
		}
	});

});

function reviewed_complete(report_id) {

	$.ajax({
		type : 'POST', 
		url	 : base_url + 'module/forms_update/reviewed_complete',
		data : {report_id: report_id}, 
		dataType : 'json',
		success:function(data){
			if (data) {
				window.location.href = base_url + 'module/census_report/'+ report_id +'/view?msg=updateSuccess';
			} else {
				window.location.href = base_url + 'module/census_report/'+ report_id +'/view';
				
			}                
			
		}
	});


};

$('#delete_btn').on('click', function(e){
	e.preventDefault();
	$('#dialog').NitroDialog({
		action: "open",
		backdrop: true,
		message: '<h4 class="bold m-b-15"><i class="i i-warning text-warning m-r-10"></i>Confirm</h4><p>Are you sure you want to delete this report? This action cannot be undone.</p>',
		buttons: [
			{
				label: 'Proceed',
				class: "btn btn-primary m-r-15",
				action: function () {
							$.ajax({
								type : 'POST', 
								url	 : base_url + 'module/forms_update/delete',
								data : {report_id: $('#delete_btn').val()}, 
								dataType : 'json',
								success:function(data){
									console.log(data.data);
									if (data.data) {
										//window.reload.href = base_url + 'module/census_affiliate';
										var newUrl = base_url + 'module/census_affiliate';

										// Reload the page with the new URL
										window.location = newUrl;
									} else {
										
										
									}                
									
								}
							});
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
