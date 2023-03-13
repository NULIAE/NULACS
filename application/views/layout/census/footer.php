<footer class="footer t-c nul-footer">
    <div class="container-fluid">
        <div class="row align-items-center">
				<div class="col-lg-16 col-md-12 col-16 offset-md-4 footContent">This is a private website and its content is copyright of National Urban League - &copy; NUL <?php echo date('Y'); ?>. All rights reserved.</div>
          <div class="col-lg-4 col-md-12 col-8 footimg"><img src="<?php echo base_url('/resources/images/login/ThoughtFocus-Logo-2.png');?>" class="f-img" alt="footer logo"></div>
        </div>
    </div>
  </footer>

  <div class="popup popupName" id="popupName" data-modal="popupName">
    <div class="popHeader">
      <span data-get-text="true">PopHeader</span>
      <a href="javascript:;" class="close" data-hide="popupName">×</a>
    </div>
    <div class="popContent">
      Popup
    </div>
    <div class="popFooter">PopFooter</div>
  </div>

  <div id="snackbar" class="snackbar nmToast">
    <div class="snackbar-text"></div>
    <button class="snackbar-action" type="button"></button>
  </div>

  <div class="dialog" id="dialog" data-control="dialog">
    <div class="dialog-message"></div>
    <div class="dialog-footer t-r"></div>
  </div>

  <script crossorigin="anonymous"
    src="https://polyfill.io/v3/polyfill.min.js?features=default%2CArray.prototype.find%2CIntersectionObserver"></script>
  <script src="<?php echo base_url('/resources/js/census/vendor/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/census/vendor/jquery-ui.min.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/census/vendor/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/census/vendor/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/census/vendor/owl.carousel.min.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/census/config.js'); ?>" data-nocache="true"></script>
  <script src="<?php echo base_url('/resources/js/census/plugins.min.js'); ?>"></script>
  <link href="<?php echo base_url('/resources/css/select2.min.css'); ?>" rel="stylesheet" />
  <script src="<?php echo base_url('/resources/js/vendor/select2.min.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/census/main.min.js'); ?>" data-nocache="true"></script>

  <!-- Logout Popup-->
  <script src="<?php echo base_url('/resources/js/census/main.js'); ?>"></script>

  <script>
    var base_url = "<?php echo base_url('/') ?>";
</script>
	<!-- Adding dynamic javascript files -->
	<?php if ( ! empty($js) ): ?>
		<?php foreach ($js as $path): ?>
			<?php if (filter_var($path, FILTER_VALIDATE_URL)): ?>
				<script src="<?php echo $path; ?>"></script>
			<?php else: ?>
				<script src="<?php echo base_url("/resources/js/$path"); ?>"></script>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>


  <script>
    page.loader(true);
    $(function () {
      setTimeout(function () {
        page.loader(false);
      }, 1000);
    });


    $("#cancel").click(function() { 
		$('#nav-sync').removeClass('active');
		$('#nav-sync').removeClass('show');
    $('#nav-view').show();
		// $('#nav-view').addClass('active');
		$('#nav-view').addClass('show'); 
	  });

    $("#cancel1").click(function() { 
		$('#nav-sync').removeClass('active');
		$('#nav-sync').removeClass('show');
    $('#nav-view').show();
		// $('#nav-view').addClass('active');
		$('#nav-view').addClass('show'); 
	  });
	  $("#nav-sync-tab").click(function() { 
      
      $('#nav-view').hide();
		// $('#nav-view').removeClass('active');
		// $('#nav-view').removeClass('show'); 
		$('#nav-sync').addClass('active');
		$('#nav-sync').addClass('show'); 
	  });

    var str=window.location.href;
    var last = str.substring(str.lastIndexOf("/") + 1, str.length);
    last = last.split('?')[0];

    //To set Census report as active tab in reports
    if (str.indexOf("census_report") > -1) {
      $('.censusadmin').removeClass('active');
      $('.censusreport').addClass('active');
    }


    if((last=='community') || (last=='other_programs')  || (last=='workforce') || (last=='housing') || (last=='health_quality') || (last=='entrepreneurship_program') || (last=='serviceareas')  || (last=='affiliateindex') || (last=='employees') || (last=='revenue') || (last=='expenditure') || (last=='education_program')  || (last=='emergency_relief') || (last=='contact_data') || (last=='civic') || (last=='empowerment') || (last=='volunteer') || (last=='covid') || (last=='view') ){
      $('.navbar-nav li a').removeClass('active');
	    $('.censusadmin').addClass('active');
      $('#'+last).addClass('active');

      if(last=='revenue'){
        //addVenturetype();
        $("#no_data_added").show();
      }
      if(last=='serviceareas'){
       // addServicearea();
       $("#no_data_added").show();

      }
      if(last=='entrepreneurship_program'){
        <?php //if(isset($type_of_business)){ ?>
         //var type_of_business = <?php //echo json_encode($type_of_business); ?>;
         <?php //} ?>
        //addBusinesstype(type_of_business);
        $("#no_data_added").show();

      }
      
    }



    //edit button hide on click
    
    $("#nav-sync-tab").click(function(){
      $("#nav-sync-tab").hide();
      $(".select2").select2({tags:true});
    });
    $("#cancel").click(function(){
      $("#nav-sync-tab").show();
      $("#nav-sync-tab").removeClass('active'); // to remove active class in button black highlight icon
    });

    $("#cancel1").click(function(){
      $("#nav-sync-tab").show();
      $("#nav-sync-tab").removeClass('active');
      $(".markbtn").show();
      $(".markbtn").removeClass('active'); // to remove active class in button black highlight icon
    });
     //edit button hide on click end
    $(document).ready(function() {
      $('.tblpcpr1,.tblpcpr2,.tblpcpr3').DataTable({
        paging: false,
        searching: false,
        info: false
      });
    });


  </script>
</body>

</html>