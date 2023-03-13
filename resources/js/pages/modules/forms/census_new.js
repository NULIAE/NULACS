$("#new_report").submit(function (event) {
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
      window.location.href = base_url + 'module/census_report/'+ data.reportid +'/view';
		}
	});

});
