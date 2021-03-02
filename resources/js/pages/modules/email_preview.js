$(function () {

    $( '#checkall' ).click( function () {
        $( 'input[type="checkbox"]' ).prop('checked', this.checked)
    });

    $(".usercheckbox").change(function(){
        if ($('.usercheckbox:checked').length == $('.usercheckbox').length) {
            $( '#checkall' ).prop('checked', this.checked)
        }else{
            $( '#checkall' ).prop('checked', false)
        }
    });
	
});
