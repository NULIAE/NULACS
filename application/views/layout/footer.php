<footer class="footer t-c nul-footer">
    <div class="container-fluid">
        <div class="row align-items-center">
				<div class="col-lg-16 col-md-12 col-16 offset-md-4 footContent">This is a private website and its content is copyright of National Urban League - &copy; NUL <?php echo date('Y'); ?>. All rights reserved.</div>
          <div class="col-lg-4 col-md-12 col-8 footimg"><img src="<?php echo base_url('/resources/images/login/ThoughtFocus-Logo-2.png');?>" class="f-img" alt="footer logo"></div>
        </div>
    </div>
  </footer>

  <div id="snackbar" class="snackbar nmToast">
    <div class="snackbar-text"></div>
    <button class="snackbar-action" type="button">OK</button>
  </div>

  <div class="dialog" id="dialog" data-control="dialog">
    <div class="dialog-message"></div>
    <div class="dialog-footer t-r"></div>
  </div>

  <script crossorigin="anonymous"
    src="https://polyfill.io/v3/polyfill.min.js?features=default%2CArray.prototype.find%2CIntersectionObserver"></script>
  <script src="<?php echo base_url('/resources/js/vendor/jquery-3.3.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/vendor/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/vendor/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/vendor/jquery.validate.min.js'); ?>"></script>
  <!-- <script src="./js/vendor/owl.carousel.min.js"></script> -->
  <!-- <script src="./js/vendor/bootstrap-datetimepicker.js"></script> -->
  <script src="<?php echo base_url('/resources/js/vendor/sumoselect.min.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/plugins.js'); ?>"></script>
  <script src="<?php echo base_url('/resources/js/main.js'); ?>"></script>

  
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
    // page.loader(true);
    $(function () {
      setTimeout(function () {
        page.loader(false);
	  }, 1000);

      // $("form").submit(function (event) {
      //   if (
      //     $.trim($("input#userID").val()) !== "" &&
      //     $.trim($("input#password").val()) !== ""
      //   ) {
      //     return;
      //   }
      //   loader(true);
      //   setTimeout(function () {
      //     loader(false);
      //     $('#dialog').NitroDialog({
      //       action: "open",
      //       backdrop: true,
      //       message: '<h4 class="bold m-b-15"><i class="i i-warning text-warning m-r-10"></i>Sign In</h4><p>Please enter valid credentials</p>',
      //       buttons: [
      //         {
      //           label: 'OK',
      //           class: "btn-info btn-link",
      //           action: function () {
      //             $('#dialog').NitroDialog({ action: "close" });
      //           }
      //         }
      //       ]
      //     });
      //   }, 1000);
      //   event.preventDefault();
      // });
    });
  </script>
  <!-- Manipulate Graphs here -->
  <script>
    // page.loader(true);
    $(function () {
      setTimeout(function () {
        page.loader(false);
      }, 1000);

      $('.yearpick').datetimepicker({
        format: 'YYYY',
        icons: {
            previous: 'i i-keyboard_arrow_left',
            next: 'i i-keyboard_arrow_right',
        }
      });

    });
    
  </script>
</body>

</html>
