<main class="user-add">
	<div class="container">
		<div class="Wrapper">
			<div class="row justify-content-end date">
                <div class="col t-r"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
            </div>
			<div class="row headOuter">
				<div class="head">
					<h3>New User</h3>
				</div>
			</div>
			<div class="row nul-settings">

				<form class="w-100" id="add-form" method="post" action="<?php echo base_url('module/user/insert'); ?>">
					<div class="row mb-3">
						<div class="col-lg-24 col-md-24 col-sm-24 ">
							<select name="affiliate_id" data-placeholder="Affiliate" data-type="selector" required >
								<?php if($this->session->role_id==1): ?>
								<option value="">Choose Affiliate</option>
								<?php endif; ?>
								<?php foreach($affiliates as $affiliate): ?>
									<?php if($this->session->role_id != 1 && $affiliate['affiliate_id'] != $this->session->affiliate_id) continue; ?>
									<option value="<?php echo $affiliate['affiliate_id']; ?>">
										<?php echo $affiliate['organization'].' - '.$affiliate['city'].','.$affiliate['state']; ?>
									</option>
								<?php endforeach;?>
							</select>
						</div>
					</div>

                    <div class="settingWrap">
						<div class="row w-100 mb-3">
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>User ID</label>
									<input type="email" name="name" class="form-control" placeholder="userid@nul.org" value="" required />
								</div>
							</div>
						
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>User Prefix</label>
									<select name="prifix" class="form-control" data-placeholder="User Prefix" data-type="selector" required>
										<option value="">Select prifix</option>
										<option value="Dr.">Dr</option>
										<option value="Mr.">Mr</option>
										<option value="Mrs.">Mrs</option>
										<option value="Ms.">Ms</option>
									</select>
								</div>
							</div>
							
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>First Name</label>
									<input type="text" name="first_name" class="form-control" placeholder="Type your First Name" value="" required />
								</div>
							</div>
							
						</div>

                        <div class="row w-100 mb-3">
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Last Name</label>
									<input type="text" name="last_name" class="form-control" placeholder="Type your Last Name" value="" required />
								</div>
							</div>
						
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Title</label>
									<input type="text" name="user_title" class="form-control" placeholder="Enter your title" value="" required />
								</div>
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Email Address</label>
									<input type="email" name="user_email_address_1" class="form-control" placeholder="mail@nul.org" value="" required />
								</div>
							</div>
                                
                        </div>

						<div class="row w-100 mb-3">
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Role</label>
									<select name="role_id" class="form-control" data-placeholder="Role" data-type="selector" required>
										<option value="">Select role</option>
										<?php foreach($roles as $role): ?>
											<?php if($this->session->role_id != 1 && $role['role_id'] == 1) continue; ?>
											<option value="<?php echo $role['role_id']; ?>">
												<?php echo $role['role_description']; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Phone</label>
									<input type="text" name="user_phone" class="form-control" placeholder="000-000-0000" value="" required />
								</div>
							</div>
						</div>
                    </div>

                	<div class="row w-100 my-3">

						<div class="col-lg-8 col-md-8 form-group">
							<label>Active</label>
							<div>
								<label class="checkbox switch bool" for="pu-2"><span class="sr-only">Active</span>
								<input type="checkbox" id="pu-2" name="user_status" value="1" />
								</label>
							</div>
						</div>

						<div class="col-lg-8 col-md-8 form-group">
							<label>Census User</label>
							<div>
								<label class="checkbox switch bool" for="pu-3"><span class="sr-only">Census User</span>
									<input type="checkbox" id="pu-3" name="is_census" value="1" />
								</label>
							</div>
						</div>

						<div class="col-lg-8 col-md-8 form-group">
							<label>ACS User</label>
							<div>
								<label class="checkbox switch bool" for="pu-4"><span class="sr-only">ACS User</span>
									<input type="checkbox" id="pu-4" name="is_acs" value="1" />
								</label>
							</div>
						</div>

						<!-- <div class="col-lg-8 col-md-8 form-group">
							<div>
								<label>Is ADM Uploader?</label>
								<div>
									<label class="checkbox switch bool" for="switch-adm"><span class="sr-only">Is ADM Uploader?</span>
									<input type="checkbox" name="is_adm_uploader" id="switch-adm" value="1" />
									</label>
								</div>
							</div>
						</div> -->
						<?php if($this->session->role_id==1): ?>
						<div class="col-lg-8 col-md-8 form-group d-none">
							<div>
								<label>Is user super administrator?</label>
								<div>
									<label class="checkbox switch bool" for="switch-user"><span class="sr-only">Is user super administrator?</span>
									<input type="checkbox" name="isuser_super_administrator" id="switch-user" value="1" />
									</label>
								</div>
							</div>
						</div>
						<?php endif; ?>
                	</div>

					<div class="foot">
						<button class="btn btn-dark btn-rounded min w-100px mr-2" type="submit">Save</button>
						<a class="btn btn-primary btn-rounded min w-100px" onclick="window.history.back();">CANCEL</a>
					</div>

            	</form>

			</div>
		</div>
	</div>
</main>
