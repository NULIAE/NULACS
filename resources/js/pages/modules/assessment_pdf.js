
   $(function() {
	$('[data-toggle="popover"]').popover()
})






 
    
    page.loader(true);
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
                // console.log(answer);
                var answer = JSON.parse(items['answers']);
             
                $.each(answer, function(i, item) {
                    
                    if(answer[i] == 'yes' ){
                        $('.'+i).addClass('checked');
                    }
                    var email = $("#"+i); //using class instead of input:text
                    var html ="<span id="+i+">"+item+"</span>"
                    email.after( html );
                   
                    // $('#'+i).val(item);
                    // $('#'+i).append("<span id="+i+">"+item+"</span>");
                    // $('#'+i).text(item);
                 });
                
             });
       
            


        });

        var selfAssessmentData = {
            "selfAssessmentId":$('#self_assessment_id').val(),
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
               

                    if (j.indexOf('c1_') > -1){
                        total_rating_criteria_one +=  +((name['val'] / name['count']).toFixed(1));
                   }
                    if (j.indexOf('c2_') > -1){
                        total_rating_criteria_two +=  +((name['val'] / name['count']).toFixed(1));
                    }
                    if (j.indexOf('c3_') > -1){
                        total_rating_criteria_three +=  +((name['val'] / name['count']).toFixed(1));
                    }

                    // console.log(name['val']+'--'+j+'----'+name['count']);


               
          var c1s1=  (name['val'] / name['count']);

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
    // console.log( c1s1.toFixed(1));
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
      





$(function() {

    $("#nav-x3").addClass("active in");
    $('a[href="#nav-x3"]').tab('show');
    $("#nav-x2").addClass("active in");
    $('a[href="#nav-x2"]').tab('show');
    $("#nav-x1").addClass("active in");
    $('a[href="#nav-x1"]').tab('show');
  
         
})


jQuery(document).ready(function() {
    setTimeout(function() {
        var pdf = new jsPDF('p', 'pt', 'a3');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#customers')[0];
    
        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
     
    var specialElementHandlers = {
        '#diffoutput': function(element, renderer){
            return true;
        }
    };
    var options = {
        pagesplit: true
    };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
        source, // HTML string or DOM elem ref.
        margins.left, // x coord
        margins.top, { // y coord
            'width': margins.width, // max width of content on PDF
            'elementHandlers': specialElementHandlers
        },
    
        function (dispose) {
            pdf.text(0, 10, 'Non-utf-8-string' );
            // dispose: object with X, Y of the last line add to the PDF 
            //          this allow the insertion of new lines after html
            pdf.save('Assessment.pdf');
        }, margins);
        
        setTimeout(function() {
            // window.close();
        }, 1000);
    }, 1000);
   
});



function demoFromHTML() {

}

