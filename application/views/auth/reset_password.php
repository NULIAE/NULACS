<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<main class="Meta-data changePass">
	<div class="container">
		<div class="Wrapper">
			<div class="row nul-settings passwordChange">
				<div class="settingWrap">
		
					<div class="Passwordhead">
						Reset password
					</div>

					<div class="passwordBody">
						<div id="success-message" class="alert alert-success p-3" style="display:none" role="alert">
							<h4 class="alert-heading">Reset Password</h4>
							<p>Password changed successfully. Please log in using the new password.</p>
							<a href="<?php echo base_url('/login'); ?>" class="btn btn-success"> Sign In </a>
						</div>
						<form class="validate-form" id="reset-pwd-form" method="post" action="<?php echo base_url("/reset-password/update"); ?>">
							<div id="error-message" class="alert alert-danger p-1" style="display:none" role="alert"></div>
							<span class="Sign-in">New Password </span>

							<div class="nul-form mb-2">
								<div>
									<input type="password" name="password" id="password" data-control="material" placeholder="Type your new password" required />
								</div>
							</div>

							<span class="Sign-in">Confirm Password </span>
							<div class="nul-form mb-2">
								<div>
									<input type="password" name="confirm_pwd" id="confirm_pwd"  data-control="material" placeholder="Confirm your New Password" required />
								</div>
							</div>

							<div class="passwordfoot">
								<button class="btn btn-dark btn-rounded min w-100px mr-2">RESET PASSWORD</button>
								<a href="<?php echo base_url('/login'); ?>" class="btn btn-primary btn-rounded min w-100px">SIGN IN</a>
							</div>
							<!-- Reset password token -->
							<input type="hidden" id="reset_token" name="reset_token" value="<?php echo $token;?>" />
						</form>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>

</main>
