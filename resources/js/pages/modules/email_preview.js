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
            if(data.success){		
                showDialogBox('success', data.message);
            } else {
                showDialogBox('error', data.message);
            }

            btnElement.html('<i class="i i-monthly-reminder"></i>send reminder').removeAttr("disabled");
        });
    });

    $("#btn-send-testmail").on("click", function() {
        var btnElement = $(this);
        
        btnElement.html('SENDING...').attr("disabled", "disabled");

        var inputData = {
            "template": $('input[name="template"]').val(),
            "month" : $('select[name="month"]').val(),
            "year" : $('select[name="year"]').val()
        };

        console.log(inputData);
        
        $.ajax({
            type : 'POST',
            url	 : base_url + 'module/notification/emails/send_testmail',
            data : inputData,
            dataType : 'json'
        }).done(function(data) {
            if(data.success){		
                showDialogBox('success', data.message);
            } else {
                showDialogBox('error', data.message);
            }

            btnElement.html('TEST MAIL').removeAttr("disabled");
        });
    });
});
