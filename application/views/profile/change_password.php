<main class="Meta-data changePass">
	<div class="container">
		<div class="Wrapper">
			<div class="row justify-content-end date">
                <div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
            </div>

            <div class="row document-mdata">
                <div class="head">
                    <h3><?php echo $user['organization'].' - '.$user['city'].', '.$user['stateabbreviation']; ?></h3>
                </div>
			</div>
			
			<div class="row nul-settings passwordChange">
				<div class="settingWrap">
		
					<div class="Passwordhead">
						change password
					</div>

					<div class="passwordBody">
						<form class="validate-form" id="reset-pwd-form" method="post" action="<?php echo base_url("/user/password/update"); ?>">

							<span class="Sign-in">Current Password </span>

							<div class="nul-form mb-2">
								<div>
									<input type="password" name="password" id="password" data-control="material" placeholder="Type your current password" required />
								</div>
							</div>

							<span class="Sign-in">New Password </span>
							<div class="nul-form mb-2">
								<div>
									<input type="password" name="new_password" id="new_password" data-control="material" placeholder="Type new password" required />
								</div>
							</div>

							<span class="Sign-in">Confirm Password </span>
							<div class="nul-form mb-2">
								<div>
									<input type="password" name="confirm_pwd" id="confirm_pwd"  data-control="material" placeholder="Confirm password" required />
								</div>
							</div>

							<div class="passwordfoot">
								<button class="btn btn-dark btn-rounded min w-100px mr-2">RESET PASSWORD</button>
								<a class="btn btn-primary btn-rounded min w-100px" onclick="window.history.back();">CANCEL</a>
							</div>

						</form>
					</div>
					
				</div>
			</div>

		</div>

	</div>

</main>
