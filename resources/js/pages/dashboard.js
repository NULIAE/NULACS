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
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: ['60-100','40-60','20-40', '0-20'],
		datasets: [{
			label: '# of Votes',
			data: [60, 40, 10, 10],
			backgroundColor: [
				'rgba(96, 199, 110, 100)',
				'rgba(234, 232, 112, 100)',
				'rgba(78, 184, 247, 100)',
				'rgba(240, 89, 77, 100)',
			],
			borderColor: [
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)'
			],
		}]
	},
	options: {
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero: true
				}
			}],
			xAxes: [{
				gridLines: {
					color: "rgba(0, 0, 0, 0)",
				}
			}]
		}
	}
});

var ctx = document.getElementById('myChart2').getContext('2d');

Chart.defaults.global.legend.labels.boxWidth = 50;
Chart.defaults.global.legend.labels.generatelabels = true;

var myChart = new Chart(ctx, {
	type: 'doughnut',
	data: {
		labels:['Complaint - Stable 60 ','Probation-Unstable 10 ','Non-Complaint - Watchlist 20 ', 'Crisis List - Merger - Disaffiliation 10 '],
		datasets: [{
			label: '# of Votes',
			data: [60, 40, 10, 10],
			backgroundColor: [
				'rgba(96, 199, 110, 100)',
				'rgba(78, 184, 247, 100)',
				'rgba(234, 232, 112, 100)',
				'rgba(240, 89, 77, 100)',
			],
			borderWidth: 8,
		}],
	},
	options: {
		legend: {
		position: "bottom",
		align: "start",
		labels: {
			render: 'value',
			fontSize: 17,
			fontWeight: 500,
			scales: {
				yAxes: [{
					ticks: {
					display: false
					},
					gridLines: {
					color: "rgba(0, 0, 0, 0)",
					}
				}]
			},
			boxWidth: 30,
			boxHeight: 30,
		}
		},        
		plugins:{
		tooltip: true,
		}
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
  