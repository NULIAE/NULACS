
$(function(){
	
	var sortTable = $('#table11').DataTable({"bPaginate": false});
	$('#table11').parent('div').removeAttr('class').addClass('col-24');
	$('#table11_length').parent('div').hide();
	$('#table11_filter').parent('div').hide();
	$('#table11_info').parent('div').removeAttr('class').addClass('col-12');
	$('#table11_paginate').parent('div').removeAttr('class').addClass('col-12');

	$('.chartBody2').scrollTop($('.chartBody2')[0].scrollHeight);
	var activeTab = window.localStorage.getItem('activeTab');
	if(activeTab){
	   $('#selected a[href="'+activeTab+'"]').trigger('click');
	}
		var $btnYear = $('#btn-year-pick');
		var $btnMonth = $('#btn-month-pick');
	
		$('#yearpicker').datetimepicker({
			widgetParent: $btnYear,
			format: 'YYYY',
			viewMode: 'years',
			icons: {
				previous: 'i i-keyboard_arrow_left',
				next: 'i i-keyboard_arrow_right',
			},
			widgetPositioning:{
				horizontal: 'right'
			}
		}).on('dp.hide', function(e) {
			$('#yearpicker').val(e.date.format('YYYY'));
		});
	
		$('#monthpicker').datetimepicker({
			widgetParent: $btnMonth,
			format: 'M',
			viewMode: 'months',
			icons: {
				previous: 'i i-keyboard_arrow_left',
				next: 'i i-keyboard_arrow_right',
			},
			widgetPositioning:{
				horizontal: 'right'
			}
		}).on('dp.hide', function(e) {
			$('#monthpicker').val(e.date.format('M'));
			$('#yearpicker').val(e.date.format('YYYY'));
		});
	
		$btnYear.click(function () {
			$('#yearpicker').data('DateTimePicker').toggle();
		});
	
		$btnMonth.click(function () {
			$('#monthpicker').data('DateTimePicker').toggle();
		});
		$('#btn-filter-date').on('click', function(e){
			e.preventDefault();
			$('#filter-date').submit();
		});
		$("#filterbyyear").change(function(){
			var year = $(this).val();
			sortTable.column(2).search(year).draw();
		});
	$(".btn2").click(function(){
		var searchVal = $(".input").val();
		sortTable.search(searchVal).draw();
		if(searchVal == ""){
			$(".input").toggleClass("active").focus;
			$(this).toggleClass("animate");
		}
	});
	
	$(document).on("click", ".btnSort", function(e){
		e.preventDefault();
		$(this).siblings('a.active').removeClass('active');
		$(this).addClass('active');
		//getAffiliates($(this).prop('href'), {});
		sortTable.draw();
	});

	function getAffiliates(url, data){
		$.ajax({
			url	 : url,
			data : data,
			dataType : 'json'
		}).done(function(data) {
			$("#table-body").html(Mustache.render($("#template").html(), { 
				affiliates : data.affiliates, 
				"currentQuarter": function () {
					quarterName = '';
					if(this.compliance_status){
						if(this.compliance_status.quarter == 1)
							quarterName = 'JAN - MAR';
						else if(this.compliance_status.quarter == 2)
							quarterName = 'APR - JUN';
						else if(this.compliance_status.quarter == 3)
							quarterName = 'JUL - SEP';
						else
							quarterName = 'OCT - DEC';
					}
					return quarterName;
				},
				"currentYear": function () {
					return (this.compliance_status) ? this.compliance_status.year : '';
				},
				"statusName": function () {
					return (this.compliance_status) ? this.compliance_status.status_name : 'Indeterminate';
				},
				"statusIcon": function () {
					return (this.compliance_status) ? this.compliance_status.icon : '<i class="i i-Indeterminate inter"></i>';
				},
				"lastLogin": function () {
					if(this.last_login)
						return  moment(this.last_login, "YYYY-MM-DD hh:mm:ss").format("MM-DD-YYYY | HH:mm");
					else
						return null;
				},
				"link": function () {
					return base_url + 'module/affiliate/status/details/' + this.affiliate_id;
				} 
			}));
			$('[data-rel="tooltip"]').tooltip();
		});
	}

	$.fn.dataTable.ext.search.push(
		function( settings, data, dataIndex ) {
			var status = $("a.btnSort").siblings(".active").data("status");
			var content = sortTable.cell(dataIndex, 3).data().toString();
			console.log(content);
			if(status){
				return content.includes(status);
			} else {
				return true;
			}
		}
	);
});

function openTab(val) {

	if ($("#" + val).hasClass("ActivTab")) {
	} else {
  
	  $('a[data-toggle="tab"]').on('click', function(e) {
		  window.localStorage.setItem('activeTab', $(e.target).attr('href'));
	  });
  
	if(val == 'monthly'){
	  $(".year").hide();
	  $(".month").show();
	}
	if(val == 'quarterly'){
	  $(".month").hide();
	  $(".year").show();
	}
	if(val == 'yearly'){
	  $(".month").hide();
	  $(".year").show();
	}
  }
  }
  