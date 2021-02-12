$(function () {
	$(document).on("click", ".page-link", function(e){
		e.preventDefault();
		getAffiliates($(this).prop('href'));
	});

	$('.pagination').removeClass('justify-content-end').addClass('justify-content-center');

	openTab($("#input-interval").val());
	
	function getAffiliates(url) {
		//$('#page-items').val($('#select-page-items').val());
		$.ajax({
			url	 : url,
			data : $( "#filter-form" ).serialize(),
			dataType : 'json'
		}).done(function(data) {
			var template = "#template-" + data.status;
			var tableBody = "#" + data.status + "-table-body";
			var pagination = "#" + data.status + "-pagination";
			$(tableBody).html(Mustache.render($(template).html(), { 
				affiliates : data.affiliates,
				"document_status_list": function(){
					var list_content = "";
					var i,j,check,currentDocument, item;
					for(i=0; i < data.documents.length; i++) {
						check = false;
						currentDocument = data.documents[i]
						//$.each(this.document_status, function (key, docStatus) {
						for(j=0; j < this.document_status.length; j++) {
							item = this.document_status[j];
							if(currentDocument.document_id === item.document_id){
								list_content += '<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="'+item.status_name+'">'+item.icon+'</div></td>';
								check = true;
								break;
							}
						}
						if(!check){
							list_content += '<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Submission Pending"><i class="i i-document-status d-status"></i></div></td>';
						}
					}
					return list_content;
				},
				"key_status": function(){
					if(this.key_indicator.length){
						if(this.key_indicator[0].status == 0){
							return '<div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Review Pending"><i class="i i-review-pending r-pending"></i></div>';
						} else {
							return '<div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Approved"><i class="i i-approved apprvd"></i></div>';
						}
					} else {
						return '<div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Submission Pending"><i class="i i-document-status d-status"></i></div>';
					}
				},
				"compliance_status": function(){
					if(data.status == "monthly"){
					if(this.monthly_compliance_status==null){
							return '<div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Indeterminate"><i class="i i-Indeterminate inter"></i></div>';
					} else {
						    return '<div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="'+this.monthly_compliance_status.status_name+'">'+this.monthly_compliance_status.icon+'</div>';
					}
				}
				},
				"compliance_status_quarterly_": function(){
					if(data.status == "quarterly"){
					if(this.quarterly_compliance_status==null){
						console.log(this.quarterly_compliance_status);
							return '<div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Indeterminate"><i class="i i-Indeterminate inter"></i></div>';
					} else {
						    return '<div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="'+this.quarterly_compliance_status.status_name+'">'+this.quarterly_compliance_status.icon+'</div>';
					}
				}
				},
				"compliance_status_yearly_": function(){
					if(data.status == "yearly"){
					if(this.yearly_compliance_status==null){
						console.log(this.yearly_compliance_status);
							return '<div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Indeterminate"><i class="i i-Indeterminate inter"></i></div>';
					} else {
						    return '<div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="'+this.yearly_compliance_status.status_name+'">'+this.yearly_compliance_status.icon+'</div>';
					}
				}
				},
				"currentDate": function () {
					if(data.status == "monthly")
						return Intl.DateTimeFormat('en', { month: 'short' }).format(data.month).toUpperCase()+ "-" + data.year;
					else if(data.status == "quarterly")
						return "Q" + data.quarter + "-" + data.year;
					else
						return data.year;
			  	}
			}));
			
			if(data.pagination)
				$(pagination).html(data.pagination);
			else {
				$(pagination).html(Mustache.render($('#template-empty-page').html(), { }));
			}
			$('.pagination').removeClass('justify-content-end').addClass('justify-content-center');
			$('[data-rel="tooltip"]').tooltip();
		});
	}
});
function openTab(val) {
	$('#tab-inner a[href="#' + val + '"]').tab('show');
	if(val == 'nav-y1'){
		$("#div-month-select select").removeAttr('disabled');
		$("#div-month-select").show();
		$("#div-quarter-select").hide();
		$("#div-quarter-select select").attr('disabled', 'disabled');
	} else if(val == 'nav-y2'){
		$("#div-month-select").hide();
		$("#div-month-select select").attr('disabled', 'disabled');
		$("#div-quarter-select select").removeAttr('disabled');
		$("#div-quarter-select").show();
	} else {
		$("#div-month-select").hide();
		$("#div-quarter-select").hide();
		$("#div-month-select select").attr('disabled', 'disabled');
		$("#div-quarter-select select").attr('disabled', 'disabled');
	}
	$("#input-interval").val(val);
  }
