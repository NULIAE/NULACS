jQuery.extend( jQuery.fn.dataTableExt.oSort, {
	"numeric-comma-pre": function ( a ) {
		var x = (a == "-") ? 0 : a.replace( /,|\$|<[^>]+>/g, "" );
        if((/\((.*)\)/).test(x)){
            x = "-"+x.replace(/\(|\)/g, "");
        }
		return parseFloat( x );
	},

	"numeric-comma-asc": function ( a, b ) {
		return ((a < b) ? -1 : ((a > b) ? 1 : 0));
	},

	"numeric-comma-desc": function ( a, b ) {
		return ((a < b) ? 1 : ((a > b) ? -1 : 0));
	}
} );

$(function(){
	var sortTable = $('#table11').DataTable({
        "columnDefs": [
            { "sType": "numeric-comma", targets: [1, 4, 5, 6, 10] }
        ],
		"bPaginate": false,
		"bInfo" : false,

    });
	$('#table11').parent('div').removeAttr('class').addClass('col-24');
	$('#table11_length').parent('div').hide();
	$('#table11_filter').parent('div').hide();
	$('#table11_info').parent('div').removeAttr('class').addClass('col-12');
	$('#table11_paginate').parent('div').removeAttr('class').addClass('col-12');
	
    $('#ind-table').DataTable({
        "columnDefs": [
            { "sType": "numeric-comma", targets: [1, 4, 5, 6, 10] }
        ],
		"bPaginate": false,
		"bInfo" : false
    });
    $('#ind-table').parent('div').removeAttr('class').addClass('col-24');
	$('#ind-table_length').parent('div').hide();
	$('#ind-table_filter').parent('div').hide();
	$('#ind-table_info').parent('div').removeAttr('class').addClass('col-12');
	$('#ind-table_paginate').parent('div').removeAttr('class').addClass('col-12');
});
$(function(){
	var sortTable = $('#table112').DataTable({
        "columnDefs": [
            { "sType": "numeric-comma", targets: [1, 4, 5, 6, 10] }
        ],
		"bPaginate": false,
		"bInfo" : false,
		
    });
	$('#table112').parent('div').removeAttr('class').addClass('col-24');
		$('#table112_length').parent('div').hide();
		$('#table112_filter').parent('div').hide();
		$('#table112_info').parent('div').removeAttr('class').addClass('col-12');
		$('#table112_paginate').parent('div').removeAttr('class').addClass('col-12');
		$('#ind-table1').DataTable({
			"columnDefs": [
				{ "sType": "numeric-comma", targets: [1, 4, 5, 6, 10] }
			],
			"bPaginate": false,
			"bInfo" : false
		});
		$('#ind-table1').parent('div').removeAttr('class').addClass('col-24');
		$('#ind-table1_length').parent('div').hide();
		$('#ind-table1_filter').parent('div').hide();
		$('#ind-table1_info').parent('div').removeAttr('class').addClass('col-12');
		$('#ind-table1_paginate').parent('div').removeAttr('class').addClass('col-12');
});

$(document).ready(function() {

	$('#ind-table2').DataTable({
		"bPaginate": false,
		"bInfo" : false,
		"searching": false, 
    });
    $('#ind-table2').parent('div').removeAttr('class').addClass('col-24');
	
	$('#ind-table3').DataTable({
		"bPaginate": false,
		"bInfo" : false,
		"searching": false, 
    });
    $('#ind-table3').parent('div').removeAttr('class').addClass('col-24');
	$('#serachbutton').click(function(e){
		//e.preventDefault();
		
	//console.log($('#affiliateserach').val());
	if($('#affiliateserach').val() == ''){
		alert('Please Select Affiliate');
		return false;

	}
	return true;
	$(this).parent('form').submit();
		});
	$('#serachbuttonmonthly').click(function(e){
		//e.preventDefault();
		
	   //console.log($('#affiliateserach_monthly').val());
	   if($('#affiliateserach_monthly').val() == ''){
		  alert('Please Select Affiliate');
		  return false;
	
	   }
	   return true;
	  $(this).parent('form').submit();
		});
} );

