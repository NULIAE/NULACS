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
        ]
    });
	$('#table11').parent('div').removeAttr('class').addClass('col-24');
	$('#table11_length').parent('div').hide();
	$('#table11_filter').parent('div').hide();
	$('#table11_info').parent('div').removeAttr('class').addClass('col-12');
	$('#table11_paginate').parent('div').removeAttr('class').addClass('col-12');
	
    $('#ind-table').DataTable({
        "columnDefs": [
            { "sType": "numeric-comma", targets: [1, 4, 5, 6, 10] }
        ]
    });
    $('#ind-table').parent('div').removeAttr('class').addClass('col-24');
	$('#ind-table_length').parent('div').hide();
	$('#ind-table_filter').parent('div').hide();
	$('#ind-table_info').parent('div').removeAttr('class').addClass('col-12');
	$('#ind-table_paginate').parent('div').removeAttr('class').addClass('col-12');
});