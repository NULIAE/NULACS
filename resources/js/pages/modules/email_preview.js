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
	
    $(".remindBox").on("click", function() {
        var btnElement = $(this);
        if ($('.usercheckbox:checked').length == 0){
            $('#message-box').html("No users selected from the User List. Please select the target audience from the list.").toggleClass("d-none");
            return;
        }
        $('#message-box').addClass("d-none");
        btnElement.html('<i class="i i-monthly-reminder"></i>sending... please wait...').attr("disabled", "disabled");

        var users = $(".usercheckbox:checked").map(function(){return $(this).val()}).get();

        var inputData = {
            "template": $('input[name="template"]').val(),
            "month" : $('select[name="month"]').val(),
            "year" : $('select[name="year"]').val(),
            "users": users
        };
        
        $.ajax({
            type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url	 : base_url + 'module/notification/emails/send_reminder', // the url where we want to POST
            data : inputData, // our data object
            dataType : 'json'
        }).done(function(data) {
            var toastConfig = {
                timeout: 60*60*1000,
                position: 'top',
                actionText: 'OK',
                message: data.message,
                //actionHandler: someCallbackFunction
            };

            $('#snackbar').NitroToast(toastConfig);

            btnElement.html('<i class="i i-monthly-reminder"></i>send reminder').removeAttr("disabled");
        });
    });
});
