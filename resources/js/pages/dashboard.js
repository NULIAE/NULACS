$(function(){
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
	
	$(".btn2").click(function(){
		var searchVal = $(".input").val();
		if(searchVal == ""){
			$(".input").toggleClass("active").focus;
			$(this).toggleClass("animate");
		} else {
			var formUrl = $("#search-form").prop('action');
			getAffiliates(formUrl, {search:searchVal});
		}
	});
	
	$(document).on("click", ".btnSort", function(e){
		e.preventDefault();
		$(this).siblings('a.active').removeClass('active');
		$(this).addClass('active');
		getAffiliates($(this).prop('href'), {});
	});

	function getAffiliates(url, data){
		$.ajax({
			url	 : url,
			data : data,
			dataType : 'json'
		}).done(function(data) {
			$("#table-body").html(Mustache.render($("#template").html(), { 
				affiliates : data.affiliates, 
				"currentMonth": function () {
					return Intl.DateTimeFormat('en', { month: 'short' }).format(data.month).toUpperCase();
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
});

function openTab(val) {

	if ($("#" + val).hasClass("ActivTab")) {
	} else {
  
	  $('a[data-toggle="tab"]').on('click', function(e) {
		  window.localStorage.setItem('activeTab', $(e.target).attr('href'));
	  });
  
	if(val == 'monthly'){
	  $(".year").show();
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
  