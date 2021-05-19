
   $(function() {
    page.loader(true);
	$('[data-toggle="popover"]').popover();
 
})



  $(document).ready(function() {
   

        $("#wpContent-x2 , #wpContent-x3 , #wpContent-x4 , #wpContent-x5 , #wpContent-x6 , #wpContent-x7 , #wpContent-x8 ").hide();

        $("#qs-1").click(function() {
                $("#wpContent-x1").show();
                $("#wpContent-x2 , #wpContent-x3 , #wpContent-x4 , #wpContent-x5 , #wpContent-x6 , #wpContent-x7 , #wpContent-x8").hide();
            });
        $("#qs-2").click(function() {
                $("#wpContent-x2").show();
                $("#wpContent-x1 , #wpContent-x3 , #wpContent-x4 , #wpContent-x5 , #wpContent-x6 , #wpContent-x7 , #wpContent-x8").hide();
            });

        $("#qs-3").click(function() {
                $("#wpContent-x3").show();
                $("#wpContent-x1 , #wpContent-x2 , #wpContent-x4 , #wpContent-x5 , #wpContent-x6 , #wpContent-x7 , #wpContent-x8").hide();
            });

        $("#qs-4").click(function() {
                $("#wpContent-x4").show();
                $("#wpContent-x1 , #wpContent-x2 , #wpContent-x3 , #wpContent-x5 , #wpContent-x6 , #wpContent-x7 , #wpContent-x8").hide();
            });

        $("#qs-5").click(function() {
                $("#wpContent-x5").show();
                $("#wpContent-x1 , #wpContent-x2 , #wpContent-x3 , #wpContent-x4 , #wpContent-x6 , #wpContent-x7 , #wpContent-x8").hide();
            });

        $("#qs-6").click(function() {
                $("#wpContent-x6").show();
                $("#wpContent-x1 , #wpContent-x2 , #wpContent-x3 , #wpContent-x4 , #wpContent-x5 , #wpContent-x7 , #wpContent-x8").hide();
            });

        $("#qs-7").click(function() {
                $("#wpContent-x7").show();
                $("#wpContent-x1 , #wpContent-x2 , #wpContent-x3 , #wpContent-x4 , #wpContent-x5 , #wpContent-x6 , #wpContent-x8").hide();
            });
        $("#qs-8").click(function() {
                $("#wpContent-x8").show();
                $("#wpContent-x1 , #wpContent-x2 , #wpContent-x3 , #wpContent-x4 , #wpContent-x5 , #wpContent-x6 , #wpContent-x7").hide();
            });



            $("#saveContinue-x1").click(function() {
                $("#wpContent-x2").show();
                $("#wpContent-x1 , #wpContent-x3, #wpContent-x4, #wpContent-x5, #wpContent-x6, #wpContent-x7, #wpContent-x8 ").hide();
                $("#qs-2").addClass('active');
                $(" #qs-1 , #qs-3 , #qs-4 , #qs-5 , #qs-6, #qs-7, #qs-8").removeClass('active');
            });

            $("#saveContinue-x2").click(function() {
                $("#wpContent-x3").show();
                $("#wpContent-x1 , #wpContent-x2, #wpContent-x4, #wpContent-x5, #wpContent-x6, #wpContent-x7, #wpContent-x8 ").hide();
                $("#qs-3").addClass('active');
                $(" #qs-1 , #qs-2 , #qs-4 , #qs-5 , #qs-6, #qs-7, #qs-8").removeClass('active');
            });

            $("#saveContinue-x3").click(function() {
                $("#wpContent-x4").show();
                $("#wpContent-x1 , #wpContent-x2, #wpContent-x3, #wpContent-x5, #wpContent-x6, #wpContent-x7, #wpContent-x8 ").hide();
                $("#qs-4").addClass('active');
                $(" #qs-1 , #qs-2 , #qs-3 , #qs-5 , #qs-6, #qs-7, #qs-8").removeClass('active');
            });

            $("#saveContinue-x4").click(function() {
                $("#wpContent-x5").show();
                $("#wpContent-x1 , #wpContent-x2, #wpContent-x3, #wpContent-x4, #wpContent-x6, #wpContent-x7, #wpContent-x8 ").hide();
                $("#qs-5").addClass('active');
                $(" #qs-1 , #qs-2 , #qs-3 , #qs-4 , #qs-6, #qs-7, #qs-8").removeClass('active');
            });

            $("#saveContinue-x5").click(function() {
                $("#wpContent-x6").show();
                $("#wpContent-x1 , #wpContent-x2, #wpContent-x3, #wpContent-x4, #wpContent-x5, #wpContent-x7, #wpContent-x8 ").hide();
                $("#qs-6").addClass('active');
                $(" #qs-1 , #qs-2 , #qs-3 , #qs-4 , #qs-5, #qs-7, #qs-8").removeClass('active');
            });

            $("#saveContinue-x6").click(function() {
                $("#wpContent-x7").show();
                $("#wpContent-x1 , #wpContent-x2, #wpContent-x3, #wpContent-x4, #wpContent-x5, #wpContent-x6, #wpContent-x8 ").hide();
                $("#qs-7").addClass('active');
                $(" #qs-1 , #qs-2 , #qs-3 , #qs-4 , #qs-5, #qs-6, #qs-8").removeClass('active');
            });

            $("#saveContinue-x7").click(function() {
                $("#wpContent-x8").show();
                $("#wpContent-x1 , #wpContent-x2, #wpContent-x3, #wpContent-x4, #wpContent-x5, #wpContent-x6, #wpContent-x7 ").hide();
                $("#qs-8").addClass('active');
                $(" #qs-1 , #qs-2 , #qs-3 , #qs-4 , #qs-5, #qs-6, #qs-7").removeClass('active');
            });


            
            $("#wpContent2 , #wpContent3 , #wpContent4 , #wpContent5 , #wpContent6").hide();
            $("#msgBoxtoggle , #msg22 , #msg33 , #msg44 , #msg55 , #msg66 , #msg77").hide();

            $("#os-1").click(function() {
                $("#wpContent1").show();
                $("#wpContent2 , #wpContent3 , #wpContent4 , #wpContent5 , #wpContent6").hide();
            });

            $("#os-2").click(function() {
                $("#wpContent2").show();
                $("#wpContent1 , #wpContent3 , #wpContent4 , #wpContent5 , #wpContent6").hide();
            });

            $("#os-3").click(function() {
                $("#wpContent3").show();
                $("#wpContent1 , #wpContent2 , #wpContent4 , #wpContent5 , #wpContent6").hide();
            });

            $("#os-4").click(function() {
                $("#wpContent4").show();
                $("#wpContent1 , #wpContent2 , #wpContent3 , #wpContent5 , #wpContent6").hide();
            });

            $("#os-5").click(function() {
                $("#wpContent5").show();
                $("#wpContent1 , #wpContent2 , #wpContent3 , #wpContent4 , #wpContent6").hide();
            });

            $("#os-6").click(function() {
                $("#wpContent6").show();
                $("#wpContent1 , #wpContent2 , #wpContent3 , #wpContent4 , #wpContent5").hide();
            });

        // implementation of mission

        $("#wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-5 , #wpContent-dt-6 , #wpContent-dt-7 , #wpContent-dt-8").hide();

            $("#dt-1").click(function() {
                $("#wpContent-dt-1").show();
                $("#wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-5 , #wpContent-dt-6 , #wpContent-dt-7 , #wpContent-dt-8").hide();
            });

            $("#dt-2").click(function() {
                $("#wpContent-dt-2").show();
                $("#wpContent-dt-1 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-5 , #wpContent-dt-6 , #wpContent-dt-7 , #wpContent-dt-8").hide();
            });

            $("#dt-3").click(function() {
                $("#wpContent-dt-3").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-4 , #wpContent-dt-5 , #wpContent-dt-6 , #wpContent-dt-7 , #wpContent-dt-8").hide();
            });

            $("#dt-4").click(function() {
                $("#wpContent-dt-4").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-5 , #wpContent-dt-6 , #wpContent-dt-7 , #wpContent-dt-8").hide();
            });

            $("#dt-5").click(function() {
                $("#wpContent-dt-5").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-6 , #wpContent-dt-7 , #wpContent-dt-8").hide();
            });

            $("#dt-6").click(function() {
                $("#wpContent-dt-6").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-5 , #wpContent-dt-7 , #wpContent-dt-8").hide();
            });

            $("#dt-7").click(function() {
                $("#wpContent-dt-7").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-5 , #wpContent-dt-6 , #wpContent-dt-8").hide();
            });

            $("#dt-8").click(function() {
                $("#wpContent-dt-8").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-5 , #wpContent-dt-6 , #wpContent-dt-7").hide();
            });


            $("#saveContinue-s1").click(function() {
                $("#wpContent-dt-2").show();
                $("#wpContent-dt-1 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-5 , #wpContent-dt-6, #wpContent-dt-7 , #wpContent-dt-8").hide();
                $("#dt-2").addClass('active');
                $("#dt-1 , #dt-3 , #dt-4 , #dt-5 , #dt-6 , #dt-7 , #dt-8").removeClass('active');
            });

            $("#saveContinue-s2").click(function() {
                $("#wpContent-dt-3").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-4 , #wpContent-dt-5 , #wpContent-dt-6, #wpContent-dt-7 , #wpContent-dt-8").hide();
                $("#dt-3").addClass('active');
                $("#dt-1 , #dt-2 , #dt-4 , #dt-5 , #dt-6 , #dt-7 , #dt-8").removeClass('active');
            });

            $("#saveContinue-s3").click(function() {
                $("#wpContent-dt-4").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-5 , #wpContent-dt-6, #wpContent-dt-7 , #wpContent-dt-8").hide();
                $("#dt-4").addClass('active');
                $("#dt-1 , #dt-2 , #dt-3 , #dt-5 , #dt-6 , #dt-7 , #dt-8").removeClass('active');
            });

            $("#saveContinue-s4").click(function() {
                $("#wpContent-dt-5").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-6, #wpContent-dt-7 , #wpContent-dt-8").hide();
                $("#dt-5").addClass('active');
                $("#dt-1 , #dt-2 , #dt-3 , #dt-4 , #dt-6 , #dt-7 , #dt-8").removeClass('active');
            });

            $("#saveContinue-s5").click(function() {
                $("#wpContent-dt-6").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-5, #wpContent-dt-7 , #wpContent-dt-8").hide();
                $("#dt-6").addClass('active');
                $("#dt-1 , #dt-2 , #dt-3 , #dt-4 , #dt-5 , #dt-7 , #dt-8").removeClass('active');
            });

            $("#saveContinue-s6").click(function() {
                $("#wpContent-dt-7").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-5, #wpContent-dt-6 , #wpContent-dt-8").hide();
                $("#dt-7").addClass('active');
                $("#dt-1 , #dt-2 , #dt-3 , #dt-4 , #dt-5 , #dt-6 , #dt-8").removeClass('active');
            });

            $("#saveContinue-s7").click(function() {
                $("#wpContent-dt-8").show();
                $("#wpContent-dt-1 , #wpContent-dt-2 , #wpContent-dt-3 , #wpContent-dt-4 , #wpContent-dt-5, #wpContent-dt-6 , #wpContent-dt-7").hide();
                $("#dt-8").addClass('active');
                $("#dt-1 , #dt-2 , #dt-3 , #dt-4 , #dt-5 , #dt-6 , #dt-7").removeClass('active');
            });


        // msg click slideToggle function

            $("#msg").click(function() {
                $("#msgBoxtoggle").slideToggle();
            });

            $("#msg2").click(function() {
                $("#msg22").slideToggle();
            });

            $("#msg3").click(function() {
                $("#msg33").slideToggle();
            });

            $("#msg4").click(function() {
                $("#msg44").slideToggle();
            });

            $("#msg5").click(function() {
                $("#msg55").slideToggle();
            });

            $("#msg6").click(function() {
                $("#msg66").slideToggle();
            });

            $("#msg7").click(function() {
                $("#msg77").slideToggle();
            });

            // save and continue btn click function

            $("#saveContinue").click(function() {
                $("#wpContent2").show();
                $("#wpContent1 , #wpContent3 , #wpContent4 , #wpContent5 , #wpContent6").hide();
                $("#os-2").addClass('active');
                $(" #os-1 , #os-3 , #os-4 , #os-5 , #os-6").removeClass('active');
            });

            $("#saveContinue2").click(function() {
                $("#wpContent3").show();
                $("#wpContent1 , #wpContent2 , #wpContent4 , #wpContent5 , #wpContent6").hide();
                $("#os-3").addClass('active');
                $(" #os-1 , #os-2 , #os-4 , #os-5 , #os-6").removeClass('active');
            });

            $("#saveContinue3").click(function() {
                $("#wpContent4").show();
                $("#wpContent1 , #wpContent2 , #wpContent3 , #wpContent5 , #wpContent6").hide();
                $("#os-4").addClass('active');
                $(" #os-1 , #os-2 , #os-3 , #os-5 , #os-6").removeClass('active');
            });

            $("#saveContinue4").click(function() {
                $("#wpContent5").show();
                $("#wpContent1 , #wpContent2 , #wpContent3 , #wpContent4 , #wpContent6").hide();
                $("#os-5").addClass('active');
                $(" #os-1 , #os-2 , #os-3 , #os-4 , #os-6").removeClass('active');
            });

            $("#saveContinue5").click(function() {
                $("#wpContent6").show();
                $("#wpContent1 , #wpContent2 , #wpContent3 , #wpContent4 , #wpContent5").hide();
                $("#os-6").addClass('active');
                $(" #os-1 , #os-2 , #os-3 , #os-4 , #os-5").removeClass('active');
            });

        });
    
    $(function () {


        var activeTab = window.localStorage.getItem('activeTab');
	if(activeTab){
	   $('#selected a[href="'+activeTab+'"]').trigger('click');
	}


        $('input[type="checkbox"]').bind('change', function (v) {
            if($(this).is(':checked')) {
                $('#'+$(this).parent().attr("for")).val("yes");
            } else {
                $('#'+$(this).parent().attr("for")).val("no");
            }
        });


        // $('[id]').each(function(){
        //     var ids = $('[id="'+this.id+'"]');
        //     if(ids.length>1 && ids[0]==this)
        //       console.warn('Multiple IDs #'+this.id);
        //   });
        var selfAssessmentId = {
            "selfAssessmentId":$('#self_assessment_id').val(),
            "userId":$('#user_id').val(),
            "affiliateId":$('#affiliate_id').val(),
        }

          $.ajax({
            type : 'POST',
            url	 : base_url+'module/assessment/criteria-answers-view',
            data: selfAssessmentId,
            dataType : 'json'
        }).done(function(data) {
           
            // var qustionId =  JSON.parse(data);
        //    console.log(data);
            
            $.each(data, function(j, items) {
                var answer = JSON.parse(items['answers']);
                // console.log(answer);
                var answer = JSON.parse(items['answers']);
             
                $.each(answer, function(i, item) {
                    
                    if(answer[i] == 'yes' ){
                        $('.'+i).addClass('checked');
                    }
    
                    $('#'+i).val(item);

                    if(i.includes('comment') & item != "")
                        $('#'+i).closest('.collapse').siblings('.card-header').find('i').css('color', 'green');

                 });
                
             });
       
            


        });

        var selfAssessmentData = {
            "selfAssessmentId":$('#self_assessment_id').val(),
            "userId":$('#user_id').val(),
            "affiliateId":$('#affiliate_id').val(),
        }

        $.ajax({
            type : 'POST',
            url	 : base_url+'module/assessment/rating',
            data: selfAssessmentData,
            dataType : 'json'
        }).done(function(data) {
            $.each(data, function(i, items) {
          
                var total_rating_criteria_one = total_rating_criteria_two =total_rating_criteria_three = 0;

                $.each(items, function(j, name) {
                    var c1s1=  (name['count'] > 0) ? (name['val'] / name['count']) : 0;
                    if (j.indexOf('c1_') > -1){
                        total_rating_criteria_one +=  +(c1s1.toFixed(1));
                    }
                    if (j.indexOf('c2_') > -1){
                        total_rating_criteria_two +=  +(c1s1.toFixed(1));
                    }
                    if (j.indexOf('c3_') > -1){
                        total_rating_criteria_three +=  +(c1s1.toFixed(1));
                    }

                    $("#"+j).parent().find('.star').removeClass('active');

                    if(c1s1 >= 5){
                        $("span ."+j+"_five").addClass("active");
                    }else if(c1s1 >= 4){
                        $("span ."+j+"_four").addClass("active");
                    }else if(c1s1 >= 3){
                        $("span ."+j+"_three").addClass("active");
                    }else if(c1s1 >= 2){
                        $("span ."+j+"_two").addClass("active");
                    }else if(c1s1 >= 1){
                        $("span ."+j+"_one").addClass("active");
                    }
                    $("#"+j).text( c1s1.toFixed(1));
                });

        if(total_rating_criteria_one){
            $("#total_rating_c1").text( (total_rating_criteria_one/6).toFixed(1));
            t_c1 = (total_rating_criteria_one/6).toFixed(1);
            if(t_c1 >= 5){ $("span .c1_five").addClass("active");
                }else if(t_c1 >= 4){ $("span .c1_four").addClass("active");
                }else if(t_c1 >= 3){ $("span .c1_three").addClass("active");
                }else if(t_c1 >= 2){ $("span .c1_two").addClass("active");
                }else if(t_c1 >= 1){ $("span .c1_one").addClass("active");
             }
            
        }

        if(total_rating_criteria_two){
            $("#total_rating_c2").text( (total_rating_criteria_two/8).toFixed(1));
            t_c2 = (total_rating_criteria_two/8).toFixed(1);
            if(t_c2 >= 5){ $("span .c2_five").addClass("active");
                }else if(t_c2 >= 4){ $("span .c2_four").addClass("active");
                }else if(t_c2 >= 3){ $("span .c2_three").addClass("active");
                }else if(t_c2 >= 2){ $("span .c2_two").addClass("active");
                }else if(t_c2 >= 1){ $("span .c2_one").addClass("active");
             }
            
        }

        if(total_rating_criteria_three){
            $("#total_rating_c3").text( (total_rating_criteria_three/8).toFixed(1));
            t_c3 = (total_rating_criteria_three/8).toFixed(1);
            if(t_c3 >= 5){ $("span .c3_five").addClass("active");
                }else if(t_c3 >= 4){ $("span .c3_four").addClass("active");
                }else if(t_c3 >= 3){ $("span .c3_three").addClass("active");
                }else if(t_c3 >= 2){ $("span .c3_two").addClass("active");
                }else if(t_c3 >= 1){ $("span .c3_one").addClass("active");
             }
            
        }


  

        
    });
        });

        

      $('.yearpick').datetimepicker({
        format: 'YYYY',
        icons: {
            previous: 'i i-keyboard_arrow_left',
            next: 'i i-keyboard_arrow_right',
        }
      });

      $('.datepick').datetimepicker({
        format: 'YYYY-MM-DD',
        icons: {
            previous: 'i i-keyboard_arrow_left',
            next: 'i i-keyboard_arrow_right',
        }
      });


      $(".search a").click(function () {
        $(this).parent(".search").toggleClass("collapsed");
      });

      setTimeout(function () {
        page.loader(false);
      }, 1000);
    });

  
  
  // icon click event active class adding dynamically
  
      $(".colCenter a").click(function() {
          $(this).addClass('active').parent().siblings().find('a').removeClass('active');
      });
      
function open_ref_link(inner_tab){
    var aid = $('#affiliate_id').val();
    window.open(base_url+"module/affiliate/status/details/"+aid+"?tab=2&interval=nav-z"+inner_tab,'_blank');
}

function checkrating(rating){
   
var val  = parseFloat(rating.value);

if(!/^(\d+(?:\.\d+)?)+$/.test(val)){
    $('#'+rating.id).val("");
    showDialogBox('error', 'Rating should be a number!');
}else{
    if(val > 5){ 
        $('#'+rating.id).val("");
        showDialogBox('error', 'Rating should be  5 or below 5!');
    } else {
        $('#'+rating.id).val(val);
    }
}


}

function c_one_s_one()
{
 

    var criteriaOneStandardOne = {
                 "selfAssessmentId":$('#self_assessment_id').val(),
                 "userId":$('#user_id').val(),
                 "affiliateId":$('#affiliate_id').val(),
                 "criteriaId":$('#criteriaOneStandardOneId').val(),
                 "c1_s1_1_1_comment_1":$('#c1_s1_1_1_comment_1').val(),
                 "c1_s1_1_1_checkbox_1":$('#c1_s1_1_1_checkbox_1').val(),
                 "c1_s1_1_1_checkbox_2":$('#c1_s1_1_1_checkbox_2').val(),
                 "c1_s1_1_1_checkbox_3":$('#c1_s1_1_1_checkbox_3').val(),
                 "c1_s1_1_1_checkbox_4":$('#c1_s1_1_1_checkbox_4').val(),
                 "c1_s1_1_1_checkbox_5":$('#c1_s1_1_1_checkbox_5').val(),
                 "c1_s1_1_1_checkbox_6":$('#c1_s1_1_1_checkbox_6').val(),
                 "c1_s1_1_1_checkbox_7":$('#c1_s1_1_1_checkbox_7').val(),
                 "c1_s1_1_1_val_1":$('#c1_s1_1_1_val_1').val(),
                 "c1_s1_1_1_val_2":$('#c1_s1_1_1_val_2').val(),
                 "c1_s1_1_1_val_3":$('#c1_s1_1_1_val_3').val(),
                 "c1_s1_1_1_val_4":$('#c1_s1_1_1_val_4').val(),
                 "c1_s1_1_1_rating_1":$('#c1_s1_1_1_rating_1').val(),
                 "c1_s1_1_2_comment_1":$('#c1_s1_1_2_comment_1').val(),
                 "c1_s1_1_2_checkbox_1":$('#c1_s1_1_2_checkbox_1').val(),
                 "c1_s1_1_2_date_1":$('#c1_s1_1_2_date_1').val(),
                 "c1_s1_1_2_date_2":$('#c1_s1_1_2_date_2').val(),
                 "c1_s1_1_2_rating_1":$('#c1_s1_1_2_rating_1').val(),
                 "c1_s1_1_3_comment_1":$('#c1_s1_1_3_comment_1').val(),
                 "c1_s1_1_3_checkbox_1":$('#c1_s1_1_3_checkbox_1').val(),
                 "c1_s1_1_3_rating_1":$('#c1_s1_1_3_rating_1').val(),
                 "c1_s1_1_4_comment_1":$('#c1_s1_1_4_comment_1').val(),
                 "c1_s1_1_4_checkbox_1":$('#c1_s1_1_4_checkbox_1').val(),
                 "c1_s1_1_4_rating_1":$('#c1_s1_1_4_rating_1').val(),
                 "c1_s1_1_5_comment_1":$('#c1_s1_1_5_comment_1').val(),
                 "c1_s1_1_5_checkbox_1":$('#c1_s1_1_5_checkbox_1').val(),
                 "c1_s1_1_5_date_1":$('#c1_s1_1_5_date_1').val(),
                 "c1_s1_1_5_rating_1":$('#c1_s1_1_5_rating_1').val(),
                 "c1_s1_1_6_comment_1":$('#c1_s1_1_6_comment_1').val(),
                 "c1_s1_1_6_checkbox_1":$('#c1_s1_1_6_checkbox_1').val(),
                 "c1_s1_1_6_rating_1":$('#c1_s1_1_6_rating_1').val(),
                 "c1_s1_1_7_comment_1":$('#c1_s1_1_7_comment_1').val(),
                 "c1_s1_1_7_checkbox_1":$('#c1_s1_1_7_checkbox_1').val(),
                 "c1_s1_1_7_date_1":$('#c1_s1_1_7_date_1').val(),
                 "c1_s1_1_7_rating_1":$('#c1_s1_1_7_rating_1').val(),
            }
			// $('#message-box').fadeOut();
			$.ajax({
				type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
               
                data : criteriaOneStandardOne, // our data object
				dataType : 'json'
			}).done(function(data) {
                update_rating();
                savebtn(false);
			});

}



function c_one_s_two()
{
 
 var criteriaOneStandardTwo = {
                "selfAssessmentId":$('#self_assessment_id').val(),
                "userId":$('#user_id').val(),
                "affiliateId":$('#affiliate_id').val(),
                 "criteriaId":$('#criteriaOneStandardTwoId').val(),
                 "c1_s2_2_1_comment_1":$('#c1_s2_2_1_comment_1').val(),
                 "c1_s2_2_1_rating_1":$('#c1_s2_2_1_rating_1').val(),
                 "c1_s2_2_2_comment_1":$('#c1_s2_2_2_comment_1').val(),
                 "c1_s2_2_2_rating_1":$('#c1_s2_2_2_rating_1').val(),

        
            }
			// $('#message-box').fadeOut();
			$.ajax({
				type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
               
                data : criteriaOneStandardTwo, // our data object
				dataType : 'json'
			}).done(function(data) {
                 update_rating();
                 savebtn(false);
			});

}

function c_one_s_three()
{
 
 var criteriaOneStandardThree = {
                "selfAssessmentId":$('#self_assessment_id').val(),
                "userId":$('#user_id').val(),
                "affiliateId":$('#affiliate_id').val(),
                 "criteriaId":$('#criteriaOneStandardThreeId').val(),
                 "c1_s3_3_1_comment_1":$('#c1_s3_3_1_comment_1').val(),
                 "c1_s3_3_1_checkbox_1":$('#c1_s3_3_1_checkbox_1').val(),
                 "c1_s3_3_1_date_1":$('#c1_s3_3_1_date_1').val(),
                 "c1_s3_3_1_date_2":$('#c1_s3_3_1_date_2').val(),
                 "c1_s3_3_1_rating_1":$('#c1_s3_3_1_rating_1').val(),
                 "c1_s3_3_2_comment_1":$('#c1_s3_3_2_comment_1').val(),
                 "c1_s3_3_2_checkbox_1":$('#c1_s3_3_2_checkbox_1').val(),
                 "c1_s3_3_2_val_1":$('#c1_s3_3_2_val_1').val(),
                 "c1_s3_3_2_rating_1":$('#c1_s3_3_2_rating_1').val(),
                 "c1_s3_3_3_comment_1":$('#c1_s3_3_3_comment_1').val(),
                 "c1_s3_3_3_checkbox_1":$('#c1_s3_3_3_checkbox_1').val(),
                 "c1_s3_3_3_val_1":$('#c1_s3_3_3_val_1').val(),
                 "c1_s3_3_3_rating_1":$('#c1_s3_3_3_rating_1').val(),
                 "c1_s3_3_4_comment_1":$('#c1_s3_3_4_comment_1').val(),
                 "c1_s3_3_4_checkbox_1":$('#c1_s3_3_4_checkbox_1').val(),
                 "c1_s3_3_4_val_1":$('#c1_s3_3_4_val_1').val(),
                 "c1_s3_3_4_rating_1":$('#c1_s3_3_4_rating_1').val(),
                 "c1_s3_3_5_comment_1":$('#c1_s3_3_5_comment_1').val(),
                 "c1_s3_3_5_check_1":$('#c1_s3_3_5_check_1').val(),
                 "c1_s3_3_5_val_1":$('#c1_s3_3_5_val_1').val(),
                 "c1_s3_3_5_rating_1":$('#c1_s3_3_5_rating_1').val(),
                 "c1_s3_3_6_comment_1":$('#c1_s3_3_6_comment_1').val(),
                 "c1_s3_3_6_checkbox_1":$('#c1_s3_3_6_checkbox_1').val(),
                 "c1_s3_3_6_val_1":$('#c1_s3_3_6_val_1').val(),
                 "c1_s3_3_6_rating_1":$('#c1_s3_3_6_rating_1').val(),
                 "c1_s3_3_7_comment_1":$('#c1_s3_3_7_comment_1').val(),
                 "c1_s3_3_7_checkbox_1":$('#c1_s3_3_7_checkbox_1').val(),
                 "c1_s3_3_7_val_1":$('#c1_s3_3_7_val_1').val(),
                 "c1_s3_3_7_val_2":$('#c1_s3_3_7_val_2').val(),
                 "c1_s3_3_7_rating_1":$('#c1_s3_3_7_rating_1').val(),
                 "c1_s3_3_8_comment_1":$('#c1_s3_3_8_comment_1').val(),
                 "c1_s3_3_8_checkbox_1":$('#c1_s3_3_8_checkbox_1').val(),
                 "c1_s3_3_8_val_1":$('#c1_s3_3_8_val_1').val(),
                 "c1_s3_3_8_date_1":$('#c1_s3_3_8_date_1').val(),
                 "c1_s3_3_8_rating_1":$('#c1_s3_3_8_rating_1').val(),
                 "c1_s3_3_9_comment_1":$('#c1_s3_3_9_comment_1').val(),
                 "c1_s3_3_9_checkbox_1":$('#c1_s3_3_9_checkbox_1').val(),
                 "c1_s3_3_9_rating_1":$('#c1_s3_3_9_rating_1').val(),
                 "c1_s3_3_10_comment_1":$('#c1_s3_3_10_comment_1').val(),
                 "c1_s3_3_10_checkbox_1":$('#c1_s3_3_10_checkbox_1').val(),
                 "c1_s3_3_10_val_1":$('#c1_s3_3_10_val_1').val(),
                 "c1_s3_3_10_rating_1":$('#c1_s3_3_10_rating_1').val(),
                 "c1_s3_3_11_comment_1":$('#c1_s3_3_11_comment_1').val(),
                 "c1_s3_3_11_val_1":$('#c1_s3_3_11_val_1').val(),
                 "c1_s3_3_11_val_2":$('#c1_s3_3_11_val_2').val(),
                 "c1_s3_3_11_rating_1":$('#c1_s3_3_11_rating_1').val(),
                 "c1_s3_3_12_comment_1":$('#c1_s3_3_12_comment_1').val(),
                 "c1_s3_3_12_val_1":$('#c1_s3_3_12_val_1').val(),
                 "c1_s3_3_12_date_1":$('#c1_s3_3_12_date_1').val(),
                 "c1_s3_3_12_rating_1":$('#c1_s3_3_12_rating_1').val(),
                 "c1_s3_3_13_comment_1":$('#c1_s3_3_13_comment_1').val(),
                 "c1_s3_3_13_checkbox_1":$('#c1_s3_3_13_checkbox_1').val(),
                 "c1_s3_3_13_val_1":$('#c1_s3_3_13_val_1').val(),
                 "c1_s3_3_13_val_2":$('#c1_s3_3_13_val_2').val(),
                 "c1_s3_3_13_rating_1":$('#c1_s3_3_13_rating_1').val(),
                 "c1_s3_3_14_comment_1":$('#c1_s3_3_14_comment_1').val(),
                 "c1_s3_3_14_checkbox_1":$('#c1_s3_3_14_checkbox_1').val(),
                 "c1_s3_3_14_val_1":$('#c1_s3_3_14_val_1').val(),
                 "c1_s3_3_14_val_2":$('#c1_s3_3_14_val_2').val(),
                 "c1_s3_3_14_val_3":$('#c1_s3_3_14_val_3').val(),
                 "c1_s3_3_14_val_4":$('#c1_s3_3_14_val_4').val(),
                 "c1_s3_3_14_val_5":$('#c1_s3_3_14_val_5').val(),
                 "c1_s3_3_14_val_6":$('#c1_s3_3_14_val_6').val(),
                 "c1_s3_3_14_val_7":$('#c1_s3_3_14_val_7').val(),
                 "c1_s3_3_14_val_8":$('#c1_s3_3_14_val_8').val(),
                 "c1_s3_3_14_val_9":$('#c1_s3_3_14_val_9').val(),
                 "c1_s3_3_14_val_10":$('#c1_s3_3_14_val_10').val(),
                 "c1_s3_3_14_val_11":$('#c1_s3_3_14_val_11').val(),
                 "c1_s3_3_14_val_12":$('#c1_s3_3_14_val_12').val(),
                 "c1_s3_3_14_val_13":$('#c1_s3_3_14_val_13').val(),
                 "c1_s3_3_14_val_14":$('#c1_s3_3_14_val_14').val(),
                 "c1_s3_3_14_val_15":$('#c1_s3_3_14_val_15').val(),
                 "c1_s3_3_14_val_16":$('#c1_s3_3_14_val_16').val(),
                 "c1_s3_3_14_date_1":$('#c1_s3_3_14_date_1').val(),
                 "c1_s3_3_14_val_17":$('#c1_s3_3_14_val_17').val(),
                 "c1_s3_3_14_date_2":$('#c1_s3_3_14_date_2').val(),
                 "c1_s3_3_14_val_18":$('#c1_s3_3_14_val_18').val(),
                 "c1_s3_3_14_date_3":$('#c1_s3_3_14_date_3').val(),
                 "c1_s3_3_14_val_19":$('#c1_s3_3_14_val_19').val(),
                 "c1_s3_3_14_date_4":$('#c1_s3_3_14_date_4').val(),
                 "c1_s3_3_14_date_5":$('#c1_s3_3_14_date_5').val(),
                 "c1_s3_3_14_rating_1":$('#c1_s3_3_14_rating_1').val(),
                 "c1_s3_3_15_comment_1":$('#c1_s3_3_15_comment_1').val(),
                 "c1_s3_3_15_checkbox_1":$('#c1_s3_3_15_checkbox_1').val(),
                 "c1_s3_3_15_rating_1":$('#c1_s3_3_15_rating_1').val(),
                 "c1_s3_3_16_comment_1":$('#c1_s3_3_16_comment_1').val(),
                 "c1_s3_3_16_checkbox_1":$('#c1_s3_3_16_checkbox_1').val(),
                 "c1_s3_3_16_rating_1":$('#c1_s3_3_16_rating_1').val(),

            }
			// $('#message-box').fadeOut();
			$.ajax({
				type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
               
                data : criteriaOneStandardThree, // our data object
				dataType : 'json'
			}).done(function(data) {
                 update_rating();
                 savebtn(false);
			});

}

function c_one_s_four(){
 
 var criteriaOneStandardfour = { 
                 "selfAssessmentId":$('#self_assessment_id').val(),
                 "userId":$('#user_id').val(),
                "affiliateId":$('#affiliate_id').val(),
                 "criteriaId":$('#criteriaOneStandardFourId').val(),
                 "c1_s4_4_1_comment_1":$('#c1_s4_4_1_comment_1').val(),
                 "c1_s4_4_1_checkbox_1":$('#c1_s4_4_1_checkbox_1').val(),
                 "c1_s4_4_1_rating_1":$('#c1_s4_4_1_rating_1').val(),
                 "c1_s4_4_2_comment_1":$('#c1_s4_4_2_comment_1').val(),
                 "c1_s4_4_2_checkbox_1":$('#c1_s4_4_2_checkbox_1').val(),
                 "c1_s4_4_2_rating_1":$('#c1_s4_4_2_rating_1').val(),
                 "c1_s4_4_3_comment_1":$('#c1_s4_4_3_comment_1').val(),
                 "c1_s4_4_3_checkbox_1":$('#c1_s4_4_3_checkbox_1').val(),
                 "c1_s4_4_3_rating_1":$('#c1_s4_4_3_rating_1').val(),
                 "c1_s4_4_4_comment_1":$('#c1_s4_4_4_comment_1').val(),
                 "c1_s4_4_4_checkbox_1":$('#c1_s4_4_4_checkbox_1').val(),
                 "c1_s4_4_4_rating_1":$('#c1_s4_4_4_rating_1').val(),
                 "c1_s4_4_5_comment_1":$('#c1_s4_4_5_comment_1').val(),
                 "c1_s4_4_5_checkbox_1":$('#c1_s4_4_5_checkbox_1').val(),
                 "c1_s4_4_5_val_1":$('#c1_s4_4_5_val_1').val(),
                 "c1_s4_4_5_rating_1":$('#c1_s4_4_5_rating_1').val(),
                 "c1_s4_4_6_comment_1":$('#c1_s4_4_6_comment_1').val(),
                 "c1_s4_4_6_checkbox_1":$('#c1_s4_4_6_checkbox_1').val(),
                 "c1_s4_4_6_val_1":$('#c1_s4_4_6_val_1').val(),
                 "c1_s4_4_6_val_2":$('#c1_s4_4_6_val_2').val(), 
                 "c1_s4_4_6_rating_1":$('#c1_s4_4_6_rating_1').val(),        

            }
			// $('#message-box').fadeOut();
			$.ajax({
				type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
               
                data : criteriaOneStandardfour, // our data object
				dataType : 'json'
			}).done(function(data) {
                 update_rating();
                 savebtn(false);
			});

}

function c_one_s_five(){
 
    var criteriaOneStandardFive = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaOneStandardFiveId').val(),
                    "c1_s5_5_1_comment_1":$('#c1_s5_5_1_comment_1').val(),
                    "c1_s5_5_1_checkbox_1":$('#c1_s5_5_1_checkbox_1').val(),
                    "c1_s5_5_1_date_1":$('#c1_s5_5_1_date_1').val(),
                    "c1_s5_5_1_rating_1":$('#c1_s5_5_1_rating_1').val(),
                    "c1_s5_5_2_comment_1":$('#c1_s5_5_2_comment_1').val(),
                    "c1_s5_5_2_checkbox_1":$('#c1_s5_5_2_checkbox_1').val(),
                    "c1_s5_5_2_rating_1":$('#c1_s5_5_2_rating_1').val(),
                    "c1_s5_5_3_comment_1":$('#c1_s5_5_3_comment_1').val(),
                    "c1_s5_5_3_checkbox_1":$('#c1_s5_5_3_checkbox_1').val(),
                    "c1_s5_5_3_rating_1":$('#c1_s5_5_3_rating_1').val(),
                    "c1_s5_5_4_comment_1":$('#c1_s5_5_4_comment_1').val(),
                    "c1_s5_5_4_checkbox_1":$('#c1_s5_5_4_checkbox_1').val(),
                    "c1_s5_5_4_val_1":$('#c1_s5_5_4_val_1').val(),
                    "c1_s5_5_4_rating_1":$('#c1_s5_5_4_rating_1').val(),
                    "c1_s5_5_5_comment_1":$('#c1_s5_5_5_comment_1').val(),
                    "c1_s5_5_5_checkbox_1":$('#c1_s5_5_5_checkbox_1').val(),
                    "c1_s5_5_5_val_1":$('#c1_s5_5_5_val_1').val(),
                    "c1_s5_5_5_rating_1":$('#c1_s5_5_5_rating_1').val(),
                    "c1_s5_5_6_comment_1":$('#c1_s5_5_6_comment_1').val(),
                    "c1_s5_5_6_checkbox_1":$('#c1_s5_5_6_checkbox_1').val(),
                    "c1_s5_5_6_val_1":$('#c1_s5_5_6_val_1').val(),
                    "c1_s5_5_6_rating_1":$('#c1_s5_5_6_rating_1').val(),
                    "c1_s5_5_7_comment_1":$('#c1_s5_5_7_comment_1').val(),
                    "c1_s5_5_7_checkbox_1":$('#c1_s5_5_7_checkbox_1').val(),
                    "c1_s5_5_7_val_1":$('#c1_s5_5_7_val_1').val(),
                    "c1_s5_5_7_rating_1":$('#c1_s5_5_7_rating_1').val(),
                    "c1_s5_5_8_comment_1":$('#c1_s5_5_8_comment_1').val(),
                    "c1_s5_5_8_checkbox_1":$('#c1_s5_5_8_checkbox_1').val(),
                    "c1_s5_5_8_val_1":$('#c1_s5_5_8_val_1').val(),
                    "c1_s5_5_8_rating_1":$('#c1_s5_5_8_rating_1').val(),
                    "c1_s5_5_9_comment_1":$('#c1_s5_5_9_comment_1').val(),
                    "c1_s5_5_9_checkbox_1":$('#c1_s5_5_9_checkbox_1').val(),
                    "c1_s5_5_9_rating_1":$('#c1_s5_5_9_rating_1').val(),
                    "c1_s5_5_10_comment_1":$('#c1_s5_5_10_comment_1').val(),
                    "c1_s5_5_10_checkbox_1":$('#c1_s5_5_10_checkbox_1').val(),
                    "c1_s5_5_10_val_1":$('#c1_s5_5_10_val_1').val(),
                    "c1_s5_5_10_rating_1":$('#c1_s5_5_10_rating_1').val(),
                    "c1_s5_5_11_comment_1":$('#c1_s5_5_11_comment_1').val(),
                    "c1_s5_5_11_checkbox_1":$('#c1_s5_5_11_checkbox_1').val(),
                    "c1_s5_5_11_rating_1":$('#c1_s5_5_11_rating_1').val(),                           
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaOneStandardFive, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }
  
 function c_one_s_six(){
 
    var criteriaOneStandardSix = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaOneStandardSixId').val(),
                    "c1_s6_6_1_comment_1":$('#c1_s6_6_1_comment_1').val(),
                    "c1_s6_6_1_rating_1":$('#c1_s6_6_1_rating_1').val(),

                                             
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaOneStandardSix, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);

                $(".tab-pane").removeClass("active in");
                    $("#nav-x2").addClass("active in");
                    $('a[href="#nav-x2"]').tab('show');
               });
   
 }

 function c_two_s_one(){
 
    var criteriaTwoStandardOne = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaTwoStandardOneId').val(),
                    "c2_s1_1_1_date_1":$('#c2_s1_1_1_date_1').val(),
                    "c2_s1_1_1_date_2":$('#c2_s1_1_1_date_2').val(),
                    "c2_s1_1_1_comment_1":$('#c2_s1_1_1_comment_1').val(),
                    "c2_s1_1_1_val_1":$('#c2_s1_1_1_val_1').val(),
                    "c2_s1_1_1_rating_1":$('#c2_s1_1_1_rating_1').val(),
                    "c2_s1_1_2_comment_1":$('#c2_s1_1_2_comment_1').val(),
                    "c2_s1_1_2_checkbox_1":$('#c2_s1_1_2_checkbox_1').val(),
                    "c2_s1_1_2_val_1":$('#c2_s1_1_2_val_1').val(),
                    "c2_s1_1_2_val_2":$('#c2_s1_1_2_val_2').val(),
                    "c2_s1_1_2_val_3":$('#c2_s1_1_2_val_3').val(),
                    "c2_s1_1_2_val_4":$('#c2_s1_1_2_val_4').val(),
                    "c2_s1_1_2_val_5":$('#c2_s1_1_2_val_5').val(),
                    "c2_s1_1_2_val_6":$('#c2_s1_1_2_val_6').val(),
                    "c2_s1_1_2_val_7":$('#c2_s1_1_2_val_7').val(),
                    "c2_s1_1_2_val_8":$('#c2_s1_1_2_val_8').val(),
                    "c2_s1_1_2_rating_1":$('#c2_s1_1_2_rating_1').val(),
                    "c2_s1_1_3_comment_1":$('#c2_s1_1_3_comment_1').val(),
                    "c2_s1_1_3_checkbox_1":$('#c2_s1_1_3_checkbox_1').val(),
                    "c2_s1_1_3_val_1":$('#c2_s1_1_3_val_1').val(),
                    "c2_s1_1_3_val_2":$('#c2_s1_1_3_val_2').val(),
                    "c2_s1_1_3_val_3":$('#c2_s1_1_3_val_3').val(),
                    "c2_s1_1_3_val_4":$('#c2_s1_1_3_val_4').val(),
                    "c2_s1_1_3_rating_1":$('#c2_s1_1_3_rating_1').val(),
                    "c2_s1_1_4_comment_1":$('#c2_s1_1_4_comment_1').val(),
                    "c2_s1_1_4_checkbox_1":$('#c2_s1_1_4_checkbox_1').val(),
                    "c2_s1_1_4_rating_1":$('#c2_s1_1_4_rating_1').val(),
                    "c2_s1_1_5_comment_1":$('#c2_s1_1_5_comment_1').val(),
                    "c2_s1_1_5_checkbox_1":$('#c2_s1_1_5_checkbox_1').val(),
                    "c2_s1_1_5_rating_1":$('#c2_s1_1_5_rating_1').val(),
                    "c2_s1_1_6_comment_1":$('#c2_s1_1_6_comment_1').val(),
                    "c2_s1_1_6_checkbox_1":$('#c2_s1_1_6_checkbox_1').val(),
                    "c2_s1_1_6_rating_1":$('#c2_s1_1_6_rating_1').val(),
                    "c2_s1_1_7_comment_1":$('#c2_s1_1_7_comment_1').val(),
                    "c2_s1_1_7_checkbox_1":$('#c2_s1_1_7_checkbox_1').val(),
                    "c2_s1_1_7_rating_1":$('#c2_s1_1_7_rating_1').val(),                               
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaTwoStandardOne, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_two_s_two(){
 
    var criteriaTwoStandardTwo = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaTwoStandardTwoId').val(),
                    "c2_s2_2_1_comment_1":$('#c2_s2_2_1_comment_1').val(),
                    "c2_s2_2_1_rating_1":$('#c2_s2_2_1_rating_1').val(),
                    "c2_s2_2_2_comment_1":$('#c2_s2_2_2_comment_1').val(),
                    "c2_s2_2_2_checkbox_1":$('#c2_s2_2_2_checkbox_1').val(),
                    "c2_s2_2_2_val_1":$('#c2_s2_2_2_val_1').val(),
                    "c2_s2_2_2_val_2":$('#c2_s2_2_2_val_2').val(),
                    "c2_s2_2_2_val_3":$('#c2_s2_2_2_val_3').val(),
                    "c2_s2_2_2_val_4":$('#c2_s2_2_2_val_4').val(),
                    "c2_s2_2_2_val_5":$('#c2_s2_2_2_val_5').val(),
                    "c2_s2_2_2_val_6":$('#c2_s2_2_2_val_6').val(),
                    "c2_s2_2_2_val_7":$('#c2_s2_2_2_val_7').val(),
                    "c2_s2_2_2_val_8":$('#c2_s2_2_2_val_8').val(),
                    "c2_s2_2_2_val_9":$('#c2_s2_2_2_val_9').val(),
                    "c2_s2_2_2_val_10":$('#c2_s2_2_2_val_10').val(),
                    "c2_s2_2_2_val_11":$('#c2_s2_2_2_val_11').val(),
                    "c2_s2_2_2_val_12":$('#c2_s2_2_2_val_12').val(),
                    "c2_s2_2_2_rating_1":$('#c2_s2_2_2_rating_1').val(),
                    "c2_s2_2_3_comment_1":$('#c2_s2_2_3_comment_1').val(),
                    "c2_s2_2_3_checkbox_1":$('#c2_s2_2_3_checkbox_1').val(),
                    "c2_s2_2_3_val_1":$('#c2_s2_2_3_val_1').val(),
                    "c2_s2_2_3_val_2":$('#c2_s2_2_3_val_2').val(),
                    "c2_s2_2_3_val_3":$('#c2_s2_2_3_val_3').val(),
                    "c2_s2_2_3_val_4":$('#c2_s2_2_3_val_4').val(),
                    "c2_s2_2_3_val_5":$('#c2_s2_2_3_val_5').val(),
                    "c2_s2_2_3_val_6":$('#c2_s2_2_3_val_6').val(),
                    "c2_s2_2_3_rating_1":$('#c2_s2_2_3_rating_1').val(),
                    "c2_s2_2_4_comment_1":$('#c2_s2_2_4_comment_1').val(),
                    "c2_s2_2_4_checkbox_1":$('#c2_s2_2_4_checkbox_1').val(),
                    "c2_s2_2_4_val_1":$('#c2_s2_2_4_val_1').val(),
                    "c2_s2_2_4_val_2":$('#c2_s2_2_4_val_2').val(),
                    "c2_s2_2_4_val_3":$('#c2_s2_2_4_val_3').val(),
                    "c2_s2_2_4_val_4":$('#c2_s2_2_4_val_4').val(),
                    "c2_s2_2_4_val_5":$('#c2_s2_2_4_val_5').val(),
                    "c2_s2_2_4_val_6":$('#c2_s2_2_4_val_6').val(),
                    "c2_s2_2_4_rating_1":$('#c2_s2_2_4_rating_1').val(),
                    "c2_s2_2_5_comment_1":$('#c2_s2_2_5_comment_1').val(),
                    "c2_s2_2_5_checkbox_1":$('#c2_s2_2_5_checkbox_1').val(),
                    "c2_s2_2_5_rating_1":$('#c2_s2_2_5_rating_1').val(),
                    "c2_s2_2_6_comment_1":$('#c2_s2_2_6_comment_1').val(),
                    "c2_s2_2_6_checkbox_1":$('#c2_s2_2_6_checkbox_1').val(),
                    "c2_s2_2_6_val_1":$('#c2_s2_2_6_val_1').val(),
                    "c2_s2_2_6_val_2":$('#c2_s2_2_6_val_2').val(),
                    "c2_s2_2_6_val_3":$('#c2_s2_2_6_val_3').val(),
                    "c2_s2_2_6_val_4":$('#c2_s2_2_6_val_4').val(),
                    "c2_s2_2_6_val_5":$('#c2_s2_2_6_val_5').val(),
                    "c2_s2_2_6_val_6":$('#c2_s2_2_6_val_6').val(),
                    "c2_s2_2_6_rating_1":$('#c2_s2_2_6_rating_1').val(),
                                                    
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaTwoStandardTwo, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_two_s_three(){
 
    var criteriaTwoStandardThree = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaTwoStandardThreeId').val(),
                    "c2_s3_3_1_comment_1":$('#c2_s3_3_1_comment_1').val(),
                    "c2_s3_3_1_date_1":$('#c2_s3_3_1_date_1').val(),
                    "c2_s3_3_1_rating_1":$('#c2_s3_3_1_rating_1').val(),
                    "c2_s3_3_2_comment_1":$('#c2_s3_3_2_comment_1').val(),
                    "c2_s3_3_2_checkbox_1":$('#c2_s3_3_2_checkbox_1').val(),
                    "c2_s3_3_2_date_1":$('#c2_s3_3_2_date_1').val(),
                    "c2_s3_3_2_rating_1":$('#c2_s3_3_2_rating_1').val(),
                    "c2_s3_3_3_comment_1":$('#c2_s3_3_3_comment_1').val(),
                    "c2_s3_3_3_checkbox_1":$('#c2_s3_3_3_checkbox_1').val(),
                    "c2_s3_3_3_rating_1":$('#c2_s3_3_3_rating_1').val(),
                    "c2_s3_3_4_comment_1":$('#c2_s3_3_4_comment_1').val(),
                    "c2_s3_3_4_checkbox_1":$('#c2_s3_3_4_checkbox_1').val(),
                    "c2_s3_3_4_val_1":$('#c2_s3_3_4_val_1').val(),
                    "c2_s3_3_4_rating_1":$('#c2_s3_3_4_rating_1').val(),
                    "c2_s3_3_5_comment_1":$('#c2_s3_3_5_comment_1').val(),
                    "c2_s3_3_5_checkbox_1":$('#c2_s3_3_5_checkbox_1').val(),
                    "c2_s3_3_5_val_1":$('#c2_s3_3_5_val_1').val(),
                    "c2_s3_3_5_checkbox_2":$('#c2_s3_3_5_checkbox_2').val(),
                    "c2_s3_3_5_rating_1":$('#c2_s3_3_5_rating_1').val(),
                    "c2_s3_3_6_comment_1":$('#c2_s3_3_6_comment_1').val(),
                    "c2_s3_3_6_checkbox_1":$('#c2_s3_3_6_checkbox_1').val(),
                    "c2_s3_3_6_rating_1":$('#c2_s3_3_6_rating_1').val(),
                    "c2_s3_3_7_comment_1":$('#c2_s3_3_7_comment_1').val(),
                    "c2_s3_3_7_checkbox_1":$('#c2_s3_3_7_checkbox_1').val(),
                    "c2_s3_3_7_val_1":$('#c2_s3_3_7_val_1').val(),
                    "c2_s3_3_7_rating_1":$('#c2_s3_3_7_rating_1').val(),
                    "c2_s3_3_8_comment_1":$('#c2_s3_3_8_comment_1').val(),
                    "c2_s3_3_8_checkbox_1":$('#c2_s3_3_8_checkbox_1').val(),
                    "c2_s3_3_8_val_1":$('#c2_s3_3_8_val_1').val(),
                    "c2_s3_3_8_val_2":$('#c2_s3_3_8_val_2').val(),
                    "c2_s3_3_8_val_3":$('#c2_s3_3_8_val_3').val(),
                    "c2_s3_3_8_val_4":$('#c2_s3_3_8_val_4').val(),
                    "c2_s3_3_8_val_5":$('#c2_s3_3_8_val_5').val(),
                    "c2_s3_3_8_val_6":$('#c2_s3_3_8_val_6').val(),
                    "c2_s3_3_8_val_7":$('#c2_s3_3_8_val_7').val(),
                    "c2_s3_3_8_val_8":$('#c2_s3_3_8_val_8').val(),
                    "c2_s3_3_8_val_9":$('#c2_s3_3_8_val_9').val(),
                    "c2_s3_3_8_rating_1":$('#c2_s3_3_8_rating_1').val(),
                    "c2_s3_3_9_comment_1":$('#c2_s3_3_9_comment_1').val(),
                    "c2_s3_3_9_checkbox_1":$('#c2_s3_3_9_checkbox_1').val(),
                    "c2_s3_3_9_val_1":$('#c2_s3_3_9_val_1').val(),
                    "c2_s3_3_9_val_2":$('#c2_s3_3_9_val_2').val(),
                    "c2_s3_3_9_val_3":$('#c2_s3_3_9_val_3').val(),
                    "c2_s3_3_9_val_4":$('#c2_s3_3_9_val_4').val(),
                    "c2_s3_3_9_val_5":$('#c2_s3_3_9_val_5').val(),
                    "c2_s3_3_9_val_6":$('#c2_s3_3_9_val_6').val(),
                    "c2_s3_3_9_rating_1":$('#c2_s3_3_9_rating_1').val(),
                    "c2_s3_3_10_comment_1":$('#c2_s3_3_10_comment_1').val(),
                    "c2_s3_3_10_checkbox_1":$('#c2_s3_3_10_checkbox_1').val(),
                    "c2_s3_3_10_val_1":$('#c2_s3_3_10_val_1').val(),
                    "c2_s3_3_10_val_2":$('#c2_s3_3_10_val_2').val(),
                    "c2_s3_3_10_val_3":$('#c2_s3_3_10_val_3').val(),
                    "c2_s3_3_10_val_4":$('#c2_s3_3_10_val_4').val(),
                    "c2_s3_3_10_val_5":$('#c2_s3_3_10_val_5').val(),
                    "c2_s3_3_10_val_6":$('#c2_s3_3_10_val_6').val(),
                    "c2_s3_3_10_val_7":$('#c2_s3_3_10_val_7').val(),
                    "c2_s3_3_10_val_8":$('#c2_s3_3_10_val_8').val(),
                    "c2_s3_3_10_val_9":$('#c2_s3_3_10_val_9').val(),
                    "c2_s3_3_10_val_10":$('#c2_s3_3_10_val_10').val(),
                    "c2_s3_3_10_val_11":$('#c2_s3_3_10_val_11').val(),
                    "c2_s3_3_10_val_12":$('#c2_s3_3_10_val_12').val(),
                    "c2_s3_3_10_rating_1":$('#c2_s3_3_10_rating_1').val(),
                    "c2_s3_3_11_comment_1":$('#c2_s3_3_11_comment_1').val(),
                    "c2_s3_3_11_checkbox_1":$('#c2_s3_3_11_checkbox_1').val(),
                    "c2_s3_3_11_val_1":$('#c2_s3_3_11_val_1').val(),
                    "c2_s3_3_11_val_2":$('#c2_s3_3_11_val_2').val(),
                    "c2_s3_3_11_val_3":$('#c2_s3_3_11_val_3').val(),
                    "c2_s3_3_11_val_4":$('#c2_s3_3_11_val_4').val(),
                    "c2_s3_3_11_val_5":$('#c2_s3_3_11_val_5').val(),
                    "c2_s3_3_11_val_6":$('#c2_s3_3_11_val_6').val(),
                    "c2_s3_3_11_val_7":$('#c2_s3_3_11_val_7').val(),
                    "c2_s3_3_11_val_8":$('#c2_s3_3_11_val_8').val(),
                    "c2_s3_3_11_val_9":$('#c2_s3_3_11_val_9').val(),
                    "c2_s3_3_11_val_10":$('#c2_s3_3_11_val_10').val(),
                    "c2_s3_3_11_val_11":$('#c2_s3_3_11_val_11').val(),
                    "c2_s3_3_11_val_12":$('#c2_s3_3_11_val_12').val(),
                    "c2_s3_3_11_rating_1":$('#c2_s3_3_11_rating_1').val(),
                    "c2_s3_3_12_comment_1":$('#c2_s3_3_12_comment_1').val(),
                    "c2_s3_3_12_checkbox_1":$('#c2_s3_3_12_checkbox_1').val(),
                    "c2_s3_3_12_val_1":$('#c2_s3_3_12_val_1').val(),
                    "c2_s3_3_12_val_2":$('#c2_s3_3_12_val_2').val(),
                    "c2_s3_3_12_val_3":$('#c2_s3_3_12_val_3').val(),
                    "c2_s3_3_12_val_4":$('#c2_s3_3_12_val_4').val(),
                    "c2_s3_3_12_val_5":$('#c2_s3_3_12_val_5').val(),
                    "c2_s3_3_12_val_6":$('#c2_s3_3_12_val_6').val(),
                    "c2_s3_3_12_val_7":$('#c2_s3_3_12_val_7').val(),
                    "c2_s3_3_12_val_8":$('#c2_s3_3_12_val_8').val(),
                    "c2_s3_3_12_val_9":$('#c2_s3_3_12_val_9').val(),
                    "c2_s3_3_12_val_10":$('#c2_s3_3_12_val_10').val(),
                    "c2_s3_3_12_val_11":$('#c2_s3_3_12_val_11').val(),
                    "c2_s3_3_12_val_12":$('#c2_s3_3_12_val_12').val(),
                    "c2_s3_3_12_rating_1":$('#c2_s3_3_12_rating_1').val(),
                    "c2_s3_3_13_comment_1":$('#c2_s3_3_13_comment_1').val(),
                    "c2_s3_3_13_checkbox_1":$('#c2_s3_3_13_checkbox_1').val(),
                    "c2_s3_3_13_val_1":$('#c2_s3_3_13_val_1').val(),
                    "c2_s3_3_13_rating_1":$('#c2_s3_3_13_rating_1').val(),
                    "c2_s3_3_14_comment_1":$('#c2_s3_3_14_comment_1').val(),
                    "c2_s3_3_14_checkbox_1":$('#c2_s3_3_14_checkbox_1').val(),
                    "c2_s3_3_14_val_1":$('#c2_s3_3_14_val_1').val(),
                    "c2_s3_3_14_rating_1":$('#c2_s3_3_14_rating_1').val(),
                    "c2_s3_3_15_comment_1":$('#c2_s3_3_15_comment_1').val(),
                    "c2_s3_3_15_checkbox_1":$('#c2_s3_3_15_checkbox_1').val(),
                    "c2_s3_3_15_rating_1":$('#c2_s3_3_15_rating_1').val(),
                    "c2_s3_3_16_comment_1":$('#c2_s3_3_16_comment_1').val(),
                    "c2_s3_3_16_checkbox_1":$('#c2_s3_3_16_checkbox_1').val(),
                    "c2_s3_3_16_rating_1":$('#c2_s3_3_16_rating_1').val(),
                    "c2_s3_3_17_comment_1":$('#c2_s3_3_17_comment_1').val(),
                    "c2_s3_3_17_checkbox_1":$('#c2_s3_3_17_checkbox_1').val(),
                    "c2_s3_3_17_val_1":$('#c2_s3_3_17_val_1').val(),
                    "c2_s3_3_17_rating_1":$('#c2_s3_3_17_rating_1').val(),
                    "c2_s3_3_18_comment_1":$('#c2_s3_3_18_comment_1').val(),
                    "c2_s3_3_18_checkbox_1":$('#c2_s3_3_18_checkbox_1').val(),
                    "c2_s3_3_18_rating_1":$('#c2_s3_3_18_rating_1').val(),
                  
                                                    
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaTwoStandardThree, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_two_s_four(){
 
    var criteriaTwoStandardFour = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaTwoStandardFourId').val(),
                    "c2_s4_4_1_comment_1":$('#c2_s4_4_1_comment_1').val(),
                    "c2_s4_4_1_checkbox_1":$('#c2_s4_4_1_checkbox_1').val(),
                    "c2_s4_4_1_val_1":$('#c2_s4_4_1_val_1').val(),
                    "c2_s4_4_1_rating_1":$('#c2_s4_4_1_rating_1').val(),
                    "c2_s4_4_2_comment_1":$('#c2_s4_4_2_comment_1').val(),
                    "c2_s4_4_2_checkbox_1":$('#c2_s4_4_2_checkbox_1').val(),
                    "c2_s4_4_2_rating_1":$('#c2_s4_4_2_rating_1').val(),
                    "c2_s4_4_3_comment_1":$('#c2_s4_4_3_comment_1').val(),
                    "c2_s4_4_3_checkbox_1":$('#c2_s4_4_3_checkbox_1').val(),
                    "c2_s4_4_3_rating_1":$('#c2_s4_4_3_rating_1').val(),
                    "c2_s4_4_4_comment_1":$('#c2_s4_4_4_comment_1').val(),
                    "c2_s4_4_4_checkbox_1":$('#c2_s4_4_4_checkbox_1').val(),
                    "c2_s4_4_4_rating_1":$('#c2_s4_4_4_rating_1').val(),
                    "c2_s4_4_5_comment_1":$('#c2_s4_4_5_comment_1').val(),
                    "c2_s4_4_5_checkbox_1":$('#c2_s4_4_5_checkbox_1').val(),
                    "c2_s4_4_5_date_1":$('#c2_s4_4_5_date_1').val(),
                    "c2_s4_4_5_rating_1":$('#c2_s4_4_5_rating_1').val(),
                    "c2_s4_4_6_comment_1":$('#c2_s4_4_6_comment_1').val(),
                    "c2_s4_4_6_checkbox_1":$('#c2_s4_4_6_checkbox_1').val(),
                    "c2_s4_4_6_val_1":$('#c2_s4_4_6_val_1').val(),
                    "c2_s4_4_6_val_2":$('#c2_s4_4_6_val_2').val(),
                    "c2_s4_4_6_rating_1":$('#c2_s4_4_6_rating_1').val(),
                    "c2_s4_4_7_val_1":$('#c2_s4_4_7_val_1').val(),
                    "c2_s4_4_7_comment_1":$('#c2_s4_4_7_comment_1').val(),
                    "c2_s4_4_7_checkbox_1":$('#c2_s4_4_7_checkbox_1').val(),
                    "c2_s4_4_7_rating_1":$('#c2_s4_4_7_rating_1').val(),
                    "c2_s4_4_8_comment_1":$('#c2_s4_4_8_comment_1').val(),
                    "c2_s4_4_8_checkbox_1":$('#c2_s4_4_8_checkbox_1').val(),
                    "c2_s4_4_8_rating_1":$('#c2_s4_4_8_rating_1').val(),
                    "c2_s4_4_9_comment_1":$('#c2_s4_4_9_comment_1').val(),
                    "c2_s4_4_9_checkbox_1":$('#c2_s4_4_9_checkbox_1').val(),
                    "c2_s4_4_9_rating_1":$('#c2_s4_4_9_rating_1').val(),
                    "c2_s4_4_10_comment_1":$('#c2_s4_4_10_comment_1').val(),
                    "c2_s4_4_10_checkbox_1":$('#c2_s4_4_10_checkbox_1').val(),
                    "c2_s4_4_10_val_1":$('#c2_s4_4_10_val_1').val(),
                    "c2_s4_4_10_val_2":$('#c2_s4_4_10_val_2').val(),
                    "c2_s4_4_10_val_3":$('#c2_s4_4_10_val_3').val(),
                    "c2_s4_4_10_val_4":$('#c2_s4_4_10_val_4').val(),
                    "c2_s4_4_10_rating_1":$('#c2_s4_4_10_rating_1').val(),
                    "c2_s4_4_11_comment_1":$('#c2_s4_4_11_comment_1').val(),
                    "c2_s4_4_11_checkbox_1":$('#c2_s4_4_11_checkbox_1').val(),
                    "c2_s4_4_11_rating_1":$('#c2_s4_4_11_rating_1').val(),
                    "c2_s4_4_12_comment_1":$('#c2_s4_4_12_comment_1').val(),
                    "c2_s4_4_12_checkbox_1":$('#c2_s4_4_12_checkbox_1').val(),
                    "c2_s4_4_12_rating_1":$('#c2_s4_4_12_rating_1').val(),
                    "c2_s4_4_13_comment_1":$('#c2_s4_4_13_comment_1').val(),
                    "c2_s4_4_13_checkbox_1":$('#c2_s4_4_13_checkbox_1').val(),
                    "c2_s4_4_13_rating_1":$('#c2_s4_4_13_rating_1').val(),
                    "c2_s4_4_14_comment_1":$('#c2_s4_4_14_comment_1').val(),
                    "c2_s4_4_14_checkbox_1":$('#c2_s4_4_14_checkbox_1').val(),
                    "c2_s4_4_14_val_1":$('#c2_s4_4_14_val_1').val(),
                    "c2_s4_4_14_rating_1":$('#c2_s4_4_14_rating_1').val(),
                    "c2_s4_4_15_comment_1":$('#c2_s4_4_15_comment_1').val(),
                    "c2_s4_4_15_checkbox_1":$('#c2_s4_4_15_checkbox_1').val(),
                    "c2_s4_4_15_val_1":$('#c2_s4_4_15_val_1').val(),
                    "c2_s4_4_15_val_2":$('#c2_s4_4_15_val_2').val(),
                    "c2_s4_4_15_val_3":$('#c2_s4_4_15_val_3').val(),
                    "c2_s4_4_15_val_4":$('#c2_s4_4_15_val_4').val(),
                    "c2_s4_4_15_val_5":$('#c2_s4_4_15_val_5').val(),
                    "c2_s4_4_15_val_6":$('#c2_s4_4_15_val_6').val(),
                    "c2_s4_4_15_val_7":$('#c2_s4_4_15_val_7').val(),
                    "c2_s4_4_15_val_8":$('#c2_s4_4_15_val_8').val(),
                    "c2_s4_4_15_val_9":$('#c2_s4_4_15_val_9').val(),
                    "c2_s4_4_15_val_10":$('#c2_s4_4_15_val_10').val(),
                    "c2_s4_4_15_val_11":$('#c2_s4_4_15_val_11').val(),
                    "c2_s4_4_15_val_12":$('#c2_s4_4_15_val_12').val(),
                    "c2_s4_4_15_rating_1":$('#c2_s4_4_15_rating_1').val(),
                    "c2_s4_4_16_comment_1":$('#c2_s4_4_16_comment_1').val(),
                    "c2_s4_4_16_checkbox_1":$('#c2_s4_4_16_checkbox_1').val(),
                    "c2_s4_4_16_val_1":$('#c2_s4_4_16_val_1').val(),
                    "c2_s4_4_16_val_2":$('#c2_s4_4_16_val_2').val(),
                    "c2_s4_4_16_val_3":$('#c2_s4_4_16_val_3').val(),
                    "c2_s4_4_16_rating_1":$('#c2_s4_4_16_rating_1').val(),
                    "c2_s4_4_17_comment_1":$('#c2_s4_4_17_comment_1').val(),
                    "c2_s4_4_17_checkbox_1":$('#c2_s4_4_17_checkbox_1').val(),
                    "c2_s4_4_17_val_1":$('#c2_s4_4_17_val_1').val(),
                    "c2_s4_4_17_rating_1":$('#c2_s4_4_17_rating_1').val(),
                    "c2_s4_4_18_comment_1":$('#c2_s4_4_18_comment_1').val(),
                    "c2_s4_4_18_checkbox_1":$('#c2_s4_4_18_checkbox_1').val(),
                    "c2_s4_4_18_rating_1":$('#c2_s4_4_18_rating_1').val(),
                    "c2_s4_4_19_comment_1":$('#c2_s4_4_19_comment_1').val(),
                    "c2_s4_4_19_checkbox_1":$('#c2_s4_4_19_checkbox_1').val(),
                    "c2_s4_4_19_date_1":$('#c2_s4_4_19_date_1').val(),
                    "c2_s4_4_19_rating_1":$('#c2_s4_4_19_rating_1').val(),
                    "c2_s4_4_20_comment_1":$('#c2_s4_4_20_comment_1').val(),
                    "c2_s4_4_20_checkbox_1":$('#c2_s4_4_20_checkbox_1').val(),
                    "c2_s4_4_20_rating_1":$('#c2_s4_4_20_rating_1').val(),
                                                      
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaTwoStandardFour, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_two_s_five(){
 
    var criteriaTwoStandardFive = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaTwoStandardFiveId').val(),
                    "c2_s5_5_1_comment_1":$('#c2_s5_5_1_comment_1').val(),
                    "c2_s5_5_1_checkbox_1":$('#c2_s5_5_1_checkbox_1').val(),
                    "c2_s5_5_1_rating_1":$('#c2_s5_5_1_rating_1').val(),
                    "c2_s5_5_2_comment_1":$('#c2_s5_5_2_comment_1').val(),
                    "c2_s5_5_2_checkbox_1":$('#c2_s5_5_2_checkbox_1').val(),
                    "c2_s5_5_2_rating_1":$('#c2_s5_5_2_rating_1').val(),
                    "c2_s5_5_3_comment_1":$('#c2_s5_5_3_comment_1').val(),
                    "c2_s5_5_3_checkbox_1":$('#c2_s5_5_3_checkbox_1').val(),
                    "c2_s5_5_3_rating_1":$('#c2_s5_5_3_rating_1').val(),
                    "c2_s5_5_4_comment_1":$('#c2_s5_5_4_comment_1').val(),
                    "c2_s5_5_4_checkbox_1":$('#c2_s5_5_4_checkbox_1').val(),
                    "c2_s5_5_4_rating_1":$('#c2_s5_5_4_rating_1').val(),
                    "c2_s5_5_5_comment_1":$('#c2_s5_5_5_comment_1').val(),
                    "c2_s5_5_5_checkbox_1":$('#c2_s5_5_5_checkbox_1').val(),
                    "c2_s5_5_5_rating_1":$('#c2_s5_5_5_rating_1').val(),
                    "c2_s5_5_6_comment_1":$('#c2_s5_5_6_comment_1').val(),
                    "c2_s5_5_6_checkbox_1":$('#c2_s5_5_6_checkbox_1').val(),
                    "c2_s5_5_6_rating_1":$('#c2_s5_5_6_rating_1').val(),
                    "c2_s5_5_7_comment_1":$('#c2_s5_5_7_comment_1').val(),
                    "c2_s5_5_7_checkbox_1":$('#c2_s5_5_7_checkbox_1').val(),
                    "c2_s5_5_7_rating_1":$('#c2_s5_5_7_rating_1').val(),
                    "c2_s5_5_8_comment_1":$('#c2_s5_5_8_comment_1').val(),
                    "c2_s5_5_8_checkbox_1":$('#c2_s5_5_8_checkbox_1').val(),
                    "c2_s5_5_8_rating_1":$('#c2_s5_5_8_rating_1').val(),                                        
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaTwoStandardFive, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }


 function c_two_s_six(){
 
    var criteriaTwoStandardSix = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaTwoStandardSixId').val(),
                    "c2_s6_6_1_comment_1":$('#c2_s6_6_1_comment_1').val(),
                    "c2_s6_6_1_checkbox_1":$('#c2_s6_6_1_checkbox_1').val(),
                    "c2_s6_6_1_val_1":$('#c2_s6_6_1_val_1').val(),
                    "c2_s6_6_1_rating_1":$('#c2_s6_6_1_rating_1').val(),
                    "c2_s6_6_2_comment_1":$('#c2_s6_6_2_comment_1').val(),
                    "c2_s6_6_2_checkbox_1":$('#c2_s6_6_2_checkbox_1').val(),
                    "c2_s6_6_2_val_1":$('#c2_s6_6_2_val_1').val(),
                    "c2_s6_6_2_val_2":$('#c2_s6_6_2_val_2').val(),
                    "c2_s6_6_2_rating_1":$('#c2_s6_6_2_rating_1').val(),                                                       
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaTwoStandardSix, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_two_s_seven(){
 
    var criteriaTwoStandardSeven = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaTwoStandardSevenId').val(),
                    "c2_s7_7_1_comment_1":$('#c2_s7_7_1_comment_1').val(),
                    "c2_s7_7_1_checkbox_1":$('#c2_s7_7_1_checkbox_1').val(),
                    "c2_s7_7_1_date_1":$('#c2_s7_7_1_date_1').val(),
                    "c2_s7_7_1_rating_1":$('#c2_s7_7_1_rating_1').val(),
                    "c2_s7_7_2_comment_1":$('#c2_s7_7_2_comment_1').val(),
                    "c2_s7_7_2_checkbox_1":$('#c2_s7_7_2_checkbox_1').val(),
                    "c2_s7_7_2_rating_1":$('#c2_s7_7_2_rating_1').val(),
                    "c2_s7_7_3_comment_1":$('#c2_s7_7_3_comment_1').val(),
                    "c2_s7_7_3_checkbox_1":$('#c2_s7_7_3_checkbox_1').val(),
                    "c2_s7_7_3_date_1":$('#c2_s7_7_3_date_1').val(),
                    "c2_s7_7_3_rating_1":$('#c2_s7_7_3_rating_1').val(),
                    "c2_s7_7_4_comment_1":$('#c2_s7_7_4_comment_1').val(),
                    "c2_s7_7_4_checkbox_1":$('#c2_s7_7_4_checkbox_1').val(),
                    "c2_s7_7_4_val_1":$('#c2_s7_7_4_val_1').val(),
                    "c2_s7_7_4_rating_1":$('#c2_s7_7_4_rating_1').val(),
                                                                    
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaTwoStandardSeven, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_two_s_eight(){
 
    var criteriaTwoStandardEight = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaTwoStandardEightId').val(),
                    "c2_s8_8_1_comment_1":$('#c2_s8_8_1_comment_1').val(),
                    "c2_s8_8_1_checkbox_1":$('#c2_s8_8_1_checkbox_1').val(),
                    "c2_s8_8_1_checkbox_2":$('#c2_s8_8_1_checkbox_2').val(),
                    "c2_s8_8_1_checkbox_3":$('#c2_s8_8_1_checkbox_3').val(),
                    "c2_s8_8_1_rating_1":$('#c2_s8_8_1_rating_1').val(),
                    "c2_s8_8_2_comment_1":$('#c2_s8_8_2_comment_1').val(),
                    "c2_s8_8_2_rating_1":$('#c2_s8_8_2_rating_1').val(), 
                    "c2_s8_8_3_comment_1":$('#c2_s8_8_3_comment_1').val(),  
                    "c2_s8_8_3_rating_1":$('#c2_s8_8_3_rating_1').val(),                   


                                                                    
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaTwoStandardEight, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);

                $(".tab-pane").removeClass("active in");
                $("#nav-x2").addClass("active in");
                $('a[href="#nav-x3"]').tab('show');
               });
   
 }

 function c_three_s_one(){
 
    var criteriaThreeStandardOne = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaThreeStandardOneId').val(),
                    "c3_s1_1_1_comment_1":$('#c3_s1_1_1_comment_1').val(),
                    "c3_s1_1_1_checkbox_1":$('#c3_s1_1_1_checkbox_1').val(),
                    "c3_s1_1_1_rating_1":$('#c3_s1_1_1_rating_1').val(),
                    "c3_s1_1_2_comment_1":$('#c3_s1_1_2_comment_1').val(),
                    "c3_s1_1_2_checkbox_1":$('#c3_s1_1_2_checkbox_1').val(),
                    "c3_s1_1_2_rating_1":$('#c3_s1_1_2_rating_1').val(),
                    "c3_s1_1_3_comment_1":$('#c3_s1_1_3_comment_1').val(),
                    "c3_s1_1_3_checkbox_1":$('#c3_s1_1_3_checkbox_1').val(),
                    "c3_s1_1_3_rating_1":$('#c3_s1_1_3_rating_1').val(),
                    "c3_s1_1_4_comment_1":$('#c3_s1_1_4_comment_1').val(),
                    "c3_s1_1_4_checkbox_1":$('#c3_s1_1_4_checkbox_1').val(),
                    "c3_s1_1_4_rating_1":$('#c3_s1_1_4_rating_1').val(),
                    "c3_s1_1_5_comment_1":$('#c3_s1_1_5_comment_1').val(),
                    "c3_s1_1_5_checkbox_1":$('#c3_s1_1_5_checkbox_1').val(),
                    "c3_s1_1_5_rating_1":$('#c3_s1_1_5_rating_1').val(),
                    "c3_s1_1_6_comment_1":$('#c3_s1_1_6_comment_1').val(),
                    "c3_s1_1_6_checkbox_1":$('#c3_s1_1_6_checkbox_1').val(),
                    "c3_s1_1_6_rating_1":$('#c3_s1_1_6_rating_1').val(),
                    "c3_s1_1_7_comment_1":$('#c3_s1_1_7_comment_1').val(),
                    "c3_s1_1_7_checkbox_1":$('#c3_s1_1_7_checkbox_1').val(),
                    "c3_s1_1_7_rating_1":$('#c3_s1_1_7_rating_1').val(),
                                                         
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaThreeStandardOne, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_three_s_two(){
 
    var criteriaThreeStandardTwo = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaThreeStandardTwoId').val(),
                    "c3_s2_2_1_comment_1":$('#c3_s2_2_1_comment_1').val(),
                    "c3_s2_2_1_checkbox_1":$('#c3_s2_2_1_checkbox_1').val(),
                    "c3_s2_2_1_rating_1":$('#c3_s2_2_1_rating_1').val(),
                    "c3_s2_2_2_comment_1":$('#c3_s2_2_2_comment_1').val(),
                    "c3_s2_2_2_checkbox_1":$('#c3_s2_2_2_checkbox_1').val(),
                    "c3_s2_2_2_rating_1":$('#c3_s2_2_2_rating_1').val(),
                    "c3_s2_2_3_comment_1":$('#c3_s2_2_3_comment_1').val(),
                    "c3_s2_2_3_checkbox_1":$('#c3_s2_2_3_checkbox_1').val(),
                    "c3_s2_2_3_rating_1":$('#c3_s2_2_3_rating_1').val(),
                   
                                                             
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaThreeStandardTwo, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }


 function c_three_s_three(){
 
    var criteriaThreeStandardThree = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaThreeStandardThreeId').val(),
                    "c3_s3_3_1_comment_1":$('#c3_s3_3_1_comment_1').val(),
                    "c3_s3_3_1_checkbox_1":$('#c3_s3_3_1_checkbox_1').val(),
                    "c3_s3_3_1_rating_1":$('#c3_s3_3_1_rating_1').val(),
                    "c3_s3_3_2_comment_1":$('#c3_s3_3_2_comment_1').val(),
                    "c3_s3_3_2_checkbox_1":$('#c3_s3_3_2_checkbox_1').val(),
                    "c3_s3_3_2_rating_1":$('#c3_s3_3_2_rating_1').val(),
                    "c3_s3_3_3_comment_1":$('#c3_s3_3_3_comment_1').val(),
                    "c3_s3_3_3_checkbox_1":$('#c3_s3_3_3_checkbox_1').val(),
                    "c3_s3_3_3_rating_1":$('#c3_s3_3_3_rating_1').val(),
                                                 
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaThreeStandardThree, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_three_s_four(){
 
    var criteriaThreeStandardFour = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaThreeStandardFourId').val(),
                    "c3_s4_4_1_comment_1":$('#c3_s4_4_1_comment_1').val(),
                    "c3_s4_4_1_checkbox_1":$('#c3_s4_4_1_checkbox_1').val(),
                    "c3_s4_4_1_rating_1":$('#c3_s4_4_1_rating_1').val(),
                    "c3_s4_4_2_comment_1":$('#c3_s4_4_2_comment_1').val(),
                    "c3_s4_4_2_checkbox_1":$('#c3_s4_4_2_checkbox_1').val(),
                    "c3_s4_4_2_rating_1":$('#c3_s4_4_2_rating_1').val(),
                    "c3_s4_4_3_comment_1":$('#c3_s4_4_3_comment_1').val(),
                    "c3_s4_4_3_checkbox_1":$('#c3_s4_4_3_checkbox_1').val(),
                    "c3_s4_4_3_rating_1":$('#c3_s4_4_3_rating_1').val(),
                    "c3_s4_4_4_comment_1":$('#c3_s4_4_4_comment_1').val(),
                    "c3_s4_4_4_checkbox_1":$('#c3_s4_4_4_checkbox_1').val(),
                    "c3_s4_4_4_rating_1":$('#c3_s4_4_4_rating_1').val(),
                    "c3_s4_4_5_comment_1":$('#c3_s4_4_5_comment_1').val(),
                    "c3_s4_4_5_checkbox_1":$('#c3_s4_4_5_checkbox_1').val(),
                    "c3_s4_4_5_rating_1":$('#c3_s4_4_5_rating_1').val(),
                    "c3_s4_4_6_comment_1":$('#c3_s4_4_6_comment_1').val(),
                    "c3_s4_4_6_checkbox_1":$('#c3_s4_4_6_checkbox_1').val(),
                    "c3_s4_4_6_rating_1":$('#c3_s4_4_6_rating_1').val(),
                    "c3_s4_4_7_comment_1":$('#c3_s4_4_7_comment_1').val(),
                    "c3_s4_4_7_checkbox_1":$('#c3_s4_4_7_checkbox_1').val(),
                    "c3_s4_4_7_rating_1":$('#c3_s4_4_7_rating_1').val(),
                                                                   
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaThreeStandardFour, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_three_s_five(){
 
    var criteriaThreeStandardFive = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaThreeStandardFiveId').val(),
                    "c3_s5_5_1_comment_1":$('#c3_s5_5_1_comment_1').val(),
                    "c3_s5_5_1_checkbox_1":$('#c3_s5_5_1_checkbox_1').val(),
                    "c3_s5_5_1_rating_1":$('#c3_s5_5_1_rating_1').val(),
                    "c3_s5_5_2_comment_1":$('#c3_s5_5_2_comment_1').val(),
                    "c3_s5_5_2_checkbox_1":$('#c3_s5_5_2_checkbox_1').val(),
                    "c3_s5_5_2_rating_1":$('#c3_s5_5_2_rating_1').val(),
                    "c3_s5_5_3_comment_1":$('#c3_s5_5_3_comment_1').val(),
                    "c3_s5_5_3_checkbox_1":$('#c3_s5_5_3_checkbox_1').val(),
                    "c3_s5_5_3_val_1":$('#c3_s5_5_3_val_1').val(),
                    "c3_s5_5_3_rating_1":$('#c3_s5_5_3_rating_1').val(),
                    "c3_s5_5_4_comment_1":$('#c3_s5_5_4_comment_1').val(),
                    "c3_s5_5_4_checkbox_1":$('#c3_s5_5_4_checkbox_1').val(),
                    "c3_s5_5_4_rating_1":$('#c3_s5_5_4_rating_1').val(),
                    "c3_s5_5_5_comment_1":$('#c3_s5_5_5_comment_1').val(),
                    "c3_s5_5_5_checkbox_1":$('#c3_s5_5_5_checkbox_1').val(),
                    "c3_s5_5_5_rating_1":$('#c3_s5_5_5_rating_1').val(),
                    "c3_s5_5_6_comment_1":$('#c3_s5_5_6_comment_1').val(),
                    "c3_s5_5_6_checkbox_1":$('#c3_s5_5_6_checkbox_1').val(),
                    "c3_s5_5_6_rating_1":$('#c3_s5_5_6_rating_1').val(),
                                                       
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaThreeStandardFive, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_three_s_six(){
 
    var criteriaThreeStandardSix = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaThreeStandardSixId').val(),
                    "c3_s6_6_1_comment_1":$('#c3_s6_6_1_comment_1').val(),
                    "c3_s6_6_1_checkbox_1":$('#c3_s6_6_1_checkbox_1').val(),
                    "c3_s6_6_1_rating_1":$('#c3_s6_6_1_rating_1').val(),
                    "c3_s6_6_2_comment_1":$('#c3_s6_6_2_comment_1').val(),
                    "c3_s6_6_2_checkbox_1":$('#c3_s6_6_2_checkbox_1').val(),
                    "c3_s6_6_2_rating_1":$('#c3_s6_6_2_rating_1').val(),
                    "c3_s6_6_3_comment_1":$('#c3_s6_6_3_comment_1').val(),
                    "c3_s6_6_3_checkbox_1":$('#c3_s6_6_3_checkbox_1').val(),
                    "c3_s6_6_3_rating_1":$('#c3_s6_6_3_rating_1').val(),
                    "c3_s6_6_4_comment_1":$('#c3_s6_6_4_comment_1').val(),
                    "c3_s6_6_4_checkbox_1":$('#c3_s6_6_4_checkbox_1').val(),
                    "c3_s6_6_4_rating_1":$('#c3_s6_6_4_rating_1').val(),
                                                       
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaThreeStandardSix, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_three_s_seven(){
 
    var criteriaThreeStandardSeven = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaThreeStandardSevenId').val(),
                    "c3_s7_7_1_comment_1":$('#c3_s7_7_1_comment_1').val(),
                    "c3_s7_7_1_checkbox_1":$('#c3_s7_7_1_checkbox_1').val(),
                    "c3_s7_7_1_rating_1":$('#c3_s7_7_1_rating_1').val(),
                    "c3_s7_7_2_comment_1":$('#c3_s7_7_2_comment_1').val(),
                    "c3_s7_7_2_checkbox_1":$('#c3_s7_7_2_checkbox_1').val(),
                    "c3_s7_7_2_rating_1":$('#c3_s7_7_2_rating_1').val(),                                           
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaThreeStandardSeven, // our data object
                   dataType : 'json'
               }).done(function(data) {
                    update_rating();
                    savebtn(false);
               });
   
 }

 function c_three_s_eight(){
     var sid = $('#self_assessment_id').val();
     var aid = $('#affiliate_id').val();

 
    var criteriaThreeStandardEight = {
                    "selfAssessmentId":$('#self_assessment_id').val(),
                    "userId":$('#user_id').val(),
                    "affiliateId":$('#affiliate_id').val(),
                    "criteriaId":$('#criteriaThreeStandardEightId').val(),
                    "c3_s8_8_1_comment_1":$('#c3_s8_8_1_comment_1').val(),
                    "c3_s8_8_1_checkbox_1":$('#c3_s8_8_1_checkbox_1').val(),
                    "c3_s8_8_1_rating_1":$('#c3_s8_8_1_rating_1').val(),
                    "c3_s8_8_2_comment_1":$('#c3_s8_8_2_comment_1').val(),
                    "c3_s8_8_2_checkbox_1":$('#c3_s8_8_2_checkbox_1').val(),
                    "c3_s8_8_2_rating_1":$('#c3_s8_8_2_rating_1').val(),
                    "c3_s8_8_3_comment_1":$('#c3_s8_8_3_comment_1').val(),
                    "c3_s8_8_3_checkbox_1":$('#c3_s8_8_3_checkbox_1').val(),
                    "c3_s8_8_3_rating_1":$('#c3_s8_8_3_rating_1').val(),
                                                             
               }
               // $('#message-box').fadeOut();
               $.ajax({
                   type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                   url	 : base_url+'module/assessment/criteria-answers', // the url where we want to POST
                  
                   data : criteriaThreeStandardEight, // our data object
                   dataType : 'json'
               }).done(function(data) {

                    var dataId = {
                        "selfAssessmentId":$('#self_assessment_id').val(),
                        "userId":$('#user_id').val(),
                        "affiliateId":$('#affiliate_id').val(),                                              
                   }

                    $.ajax({
                        type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url	 : base_url+'module/assessment/form-data', // the url where we want to POST
                       
                        data : dataId, // our data object
                        dataType : 'json'
                    }).done(function(data) {
                       
                    });

                    update_rating();
                   	window.location.href = base_url + "module/assessment/assessment-summary?sid="+sid+"&aid="+aid;
               });
   
 }



$(function() {
    var url_string = window.location.href; //window.location.href
    var url = new URL(url_string);
    var tid = url.searchParams.get("tid");
    var stid = url.searchParams.get("stid");
  
if(tid && stid){
    $(".tab-pane").removeClass("active in");
    $("#" + tid).addClass("active in");
    $('a[href="#'+ tid +'"]').tab('show');
    $("#"+stid).click(); 
} 


})


function update_rating(){

    var selfAssessmentData = {
        "selfAssessmentId":$('#self_assessment_id').val(),
        "userId":$('#user_id').val(),
        "affiliateId":$('#affiliate_id').val(),
    }

$.ajax({
    type : 'POST',
    url	 : base_url+'module/assessment/rating',
    data: selfAssessmentData,
    dataType : 'json'
}).done(function(data) {
    $.each(data, function(i, items) {
        var total_rating_criteria_one = total_rating_criteria_two =total_rating_criteria_three = 0;

        $.each(items, function(j, name) {
       
            var c1s1=  (name['count'] > 0) ? (name['val'] / name['count']) : 0;

            if (j.indexOf('c1_') > -1){
                total_rating_criteria_one +=  +(c1s1.toFixed(1));
            }
            if (j.indexOf('c2_') > -1){
                total_rating_criteria_two +=  +(c1s1.toFixed(1));
            }
            if (j.indexOf('c3_') > -1){
                total_rating_criteria_three +=  +(c1s1.toFixed(1));
            }

            $("#"+j).parent().find('.star').removeClass('active');

        if(c1s1 >= 5){

        $("span ."+j+"_five").addClass("active");

        }else if(c1s1 >= 4){

        $("span ."+j+"_four").addClass("active");

        }else if(c1s1 >= 3){

        $("span ."+j+"_three").addClass("active");

        }else if(c1s1 >= 2){

        $("span ."+j+"_two").addClass("active");

        }else if(c1s1 >= 1){

        $("span ."+j+"_one").addClass("active");

        }
            $("#"+j).text( c1s1.toFixed(1));

        });

        if(total_rating_criteria_one){
            $("#total_rating_c1").text( (total_rating_criteria_one/6).toFixed(1));
            t_c1 = (total_rating_criteria_one/6).toFixed(1);
            $("#total_rating_c1").parent().find('.star').removeClass('active');
            if(t_c1 >= 5){ $("span .c1_five").addClass("active");
                }else if(t_c1 >= 4){ $("span .c1_four").addClass("active");
                }else if(t_c1 >= 3){ $("span .c1_three").addClass("active");
                }else if(t_c1 >= 2){ $("span .c1_two").addClass("active");
                }else if(t_c1 >= 1){ $("span .c1_one").addClass("active");
            }
            
        }

        if(total_rating_criteria_two){
            $("#total_rating_c2").text( (total_rating_criteria_two/8).toFixed(1));
            t_c2 = (total_rating_criteria_two/8).toFixed(1);
            $("#total_rating_c2").parent().find('.star').removeClass('active');
            if(t_c2 >= 5){ $("span .c2_five").addClass("active");
                }else if(t_c2 >= 4){ $("span .c2_four").addClass("active");
                }else if(t_c2 >= 3){ $("span .c2_three").addClass("active");
                }else if(t_c2 >= 2){ $("span .c2_two").addClass("active");
                }else if(t_c2 >= 1){ $("span .c2_one").addClass("active");
            }
            
        }

        if(total_rating_criteria_three){
            $("#total_rating_c3").text( (total_rating_criteria_three/8).toFixed(1));
            t_c3 = (total_rating_criteria_three/8).toFixed(1);
            $("#total_rating_c3").parent().find('.star').removeClass('active');
            if(t_c3 >= 5){ $("span .c3_five").addClass("active");
                }else if(t_c3 >= 4){ $("span .c3_four").addClass("active");
                }else if(t_c3 >= 3){ $("span .c3_three").addClass("active");
                }else if(t_c3 >= 2){ $("span .c3_two").addClass("active");
                }else if(t_c3 >= 1){ $("span .c3_one").addClass("active");
            }
            
        }


        });
        });
}

function savebtn(showDialog = true){
    $('input[id*="comment"]').each(function(){
        if($(this).val() != ""){
            $('#'+$(this).attr('id')).closest('.collapse').siblings('.card-header').find('i').css('color', 'green');
        }
    });
    if(showDialog){
        showDialogBox('success', 'You have successfully saved the answers.');
    }
}

$(function() {
    var role_id=  $('#role_id_def').val();
    if(role_id == 3 || role_id == 2){
        $('input[type="text"]').prop('readonly', true);
    }

})