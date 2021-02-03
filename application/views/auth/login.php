<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<main class="loginPage">
	<div class="container">
		<div class="wrap-login100">
			<div class="row nul-border-section">
				<div class="col-md-12 d-flex align-items-center Left-sec">
					<div class="row no-gutters my-auto w-100 t-c">
						<div class="col-lg-20 mx-auto">
							<h1 class="welcome mb-2">Welcome</h1>
							<h3 class="nulH3">National Urban League</h3>
							<p>The National Urban League is a historic civil rights organization dedicated to 
								economic empowerment in order to elevate the standard of living in historically 
								underserved urban communities.</p>
						</div>
					</div>
				</div>
				<div class="col-md-12 d-flex Right-sec p-0">
					<div class="fxt-content">
						<div><img src="<?php echo base_url('/resources/images/login/logo.png');?>" class="img-fluid" alt="Logo"></div>

						<form class="validate-form" id="loginForm" method="post" action="<?php echo base_url('/authenticate'); ?>">
						<p style="text-align:center;font-size:20px;">Affiliate Compliance System</p>
							<span class="Sign-in">Sign in</span>
		
							<!-- Show error message -->
							<?php if ($this->session->flashdata('error') !== NULL){
								echo '<div class="alert alert-danger my-4" role="alert">'.$this->session->flashdata('error').'</div>';
							} ?>
							<div class="mb-3">
								<div class="nul-form mb-2">
									<i class="i i-user-name"></i>
									<input type="email" name="email" id="email" data-control="material" placeholder="Email ID" required autofocus />
								</div>
							</div>
							<div class="mb-3">
								<div class="nul-form mb-2">
									<i class="i i-password"></i>
									<input type="password" name="password" id="password" data-control="material" placeholder="Password" required />
								</div>
							</div>
							<!-- csrf token -->
							<input type="hidden" name="<?=$csrf_name;?>" value="<?=$csrf_hash;?>" />

							<div class="forgot-password p-t-5 p-b-20">
								<a href="#" id="f-pass">Forgot password</a>
							</div>

							<div class="container-login100-form-btn">
								<button class="btn login-form-btn" type="submit">sign in</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Forgot password popup -->
	<div class="popup popupPass" id="popupPass" data-modal="popupPass">
	<div class="popHeader popHead">
		<span data-get-text="true">forgot password</span>
	</div>
	<div class="popContent popC">
		<form class="validate-form" id="reset-form" method="post" action="<?php echo base_url('/send-token'); ?>">
		
		<div id="error-message" class="alert alert-danger p-1" style="display:none" role="alert"></div>
	
		<div class="mb-2">
			<label class="label-input100" for="reset-email">User ID / Email ID</label>
			<input class="input100 form-control" id="reset-email" type="email" name="email" placeholder="(e.g.yourmail@domain.com)" required />
		</div>

		<div class="mb-2">
			<label class="label-input100" for="selectnul">Affiliate Location Name</label>
			<select class="input100 form-control" name="selectnul" id="selectnul" required>
				<option value="">Select Location Name</option>
				<?php foreach ($affiliate_locations as $location): ?>
					<option value="<?php echo $location; ?>"><?php echo $location; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="d-flex justify-content-around mt-3">
			<a href="#" id="resetButton" class="getPass">get password</a>
			<a href="javascript:;" class="getPass cancel" data-hide="popupName">cancel</a>
		</div>

		<div class="have-account">
			<p>Have an account? <a href="">Sign in</a></p>
		</div>

		</form>
	</div>
	</div>

</main>
