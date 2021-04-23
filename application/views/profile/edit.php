<main class="user-add user">
	<div class="container">
		<div class="Wrapper">
			<div class="row justify-content-end date">
                <div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
			</div>

			<!-- <div class="document-mdata mb-5">
				<div class="mnHead">
					<h3><?php echo $user['organization'].' - '.$user['city'].', '.$user['stateabbreviation']; ?></h3>
				</div>
			</div> -->

			<div class="row headOuter">
                <div class="head">
                    <h3>Edit Profile</h3>
                </div>
            </div>

			<div class="row nul-settings">
				<div class="row align-items-end justify-content-end w-100 mb-4 mx-0">
					<!-- <div class="col-lg-5 col-md-5 col-sm-24 t-r p-0">
						<a href="</?php echo base_url('user/profile/change_password'); ?>" class="btn btn-dark btn-rounded min w-100px mr-2">CHANGE PASSWORD</a>
					</div> -->
				</div>

				<form class="w-100" id="profile-form" method="post" action="<?php echo base_url('user/profile/update/'); ?>">
					<div class="row mb-3">
						<div class="col-lg-24 col-md-24 col-sm-24 mb-3">
							<label for="affiliate_id">Affiliate</label>
							<select name="affiliate_id" id="affiliate_id" data-placeholder="Affiliates" data-type="selector" required >
								<?php if($this->session->role_id==1): ?>
								<option value="">Choose Affiliate</option>
								<?php endif; ?>
								<?php foreach($affiliates as $affiliate): ?>
										<?php if($this->session->role_id != 1 && $affiliate['affiliate_id'] != $this->session->affiliate_id) continue; ?>
									<option value="<?php echo $affiliate['affiliate_id']; ?>" <?php if($affiliate['affiliate_id'] == $user['affiliate_id']) echo "selected"; ?>>
										<?php echo $affiliate['organization'].' - '.$affiliate['city'].','.$affiliate['state']; ?>
									</option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
                    <div class="settingWrap">
						<div class="row w-100 mb-3">
							<div class="col-lg-6 col-md-12 form-group">
								<div>
									<label>User ID</label>
									<input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>" placeholder="userid@nul.org" disabled />
								</div>
							</div>
							<div class="col-lg-6 col-md-12 form-group">
								<div>
									<label>User Prefix</label>
									<select name="prifix" class="form-control" data-placeholder="User Prefix" data-type="selector" required>
										<option value="">Select prifix</option>
										<option value="Dr." <?php if($user['prifix'] == 'Dr.') echo "selected"; ?>>Dr</option>
										<option value="Mr." <?php if($user['prifix'] == 'Mr.') echo "selected"; ?>>Mr</option>
										<option value="Mrs."<?php if($user['prifix'] == 'Mrs.') echo "selected"; ?>>Mrs</option>
										<option value="Ms."<?php if($user['prifix'] == 'Ms.') echo "selected"; ?>>Ms</option>
									</select>
								</div>
							</div>
							
							<div class="col-lg-6 col-md-12 form-group">
								<div>
									<label>First Name</label>
									<input type="text" name="first_name" class="form-control" value="<?php echo $user['first_name']; ?>" placeholder="Type your First Name" required />
								</div>
							</div>
							
							<div class="col-lg-6 col-md-12 form-group">
								<div>
									<label>Last Name</label>
									<input type="text" name="last_name" class="form-control" value="<?php echo $user['last_name']; ?>" placeholder="Type your Last Name" required />
								</div>
							</div>
						</div>

                        <div class="row w-100 mb-3">
							<div class="col-lg-6 col-md-12 form-group">
								<div>
								<label>Role</label>
									<?php if($role_id == 2):?>
										<input type="text" name="role_id" class="form-control" value="<?php echo $user['role_description']; ?>" disabled />
									<?php else: ?>
										<select name="role_id" class="form-control" data-placeholder="User Prefix" data-type="selector" required>
											<option value="">Select role</option>
											<?php foreach($roles as $role): ?>
												<?php if($this->session->role_id != 1 && $role['role_id'] == 1) continue; ?>
												<option value="<?php echo $role['role_id']; ?>" <?php if($role['role_id'] == $user['role_id']) echo "selected"; ?>>
													<?php echo $role['role_description']; ?>
												</option>
											<?php endforeach; ?>
										</select>
									<?php endif; ?>
								</div>
							</div>

							<div class="col-lg-6 col-md-12 form-group">
								<div>
									<label>Title</label>
									<input type="text" name="user_title" class="form-control" value="<?php echo $user['user_title']; ?>" placeholder="Enter your title" required />
								</div>
							</div>

							<div class="col-lg-6 col-md-12 form-group">
								<div>
									<label>Email Address</label>
									<input type="email" name="user_email_address_1" class="form-control" value="<?php echo $user['user_email_address_1']; ?>" placeholder="mail@nul.org" required />
								</div>
							</div>
							<div class="col-lg-6 col-md-12 form-group">
								<div>
									<label>Phone</label>
									<input type="text" name="user_phone" class="form-control" value="<?php echo $user['user_phone']; ?>" placeholder="000-000-0000" />
								</div>
							</div>
							
                        </div>
                    </div>

                	<div class="row w-100 my-5">

                        <div class="col-lg-6 col-md-12 form-group">
							<div>
								<label>Is ADM Uploader?</label>
								<div>
									<label class="checkbox switch bool <?php if($role_id != '1') echo "disabled"; ?> <?php if($user['is_adm_uploader']) echo "checked"; ?>">
									<input type="checkbox" name="is_adm_uploader" value="1" <?php if($user['is_adm_uploader']) echo "checked"; ?> <?php if($role_id != '1') echo "disabled"; ?> />
									</label>
								</div>
							</div>
						</div>
						<?php if($this->session->role_id==1): ?>
                        <div class="col-lg-6 col-md-12 form-group d-none">
							<div>
								<label>Is user super administrator?</label>
								<div>
									<label class="checkbox switch bool <?php if($role_id != '1') echo "disabled"; ?> <?php if($user['isuser_super_administrator']) echo "checked"; ?>">
									<input type="checkbox" name="isuser_super_administrator" value="1" <?php if($user['isuser_super_administrator']) echo "checked"; ?> <?php if($role_id != '1') echo "disabled"; ?> />
									</label>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="col-lg-6 col-md-12 form-group">
							<label for="pu-1">Is user active?</label>
							<div>
								<label class="checkbox switch bool <?php if($role_id != '1') echo "disabled"; ?> <?php if($user['user_status']) echo "checked"; ?>" for="pu-2">
								<input type="checkbox" id="pu-2" name="user_status" value="1" <?php if($user['user_status']) echo "checked"; ?> <?php if($role_id != '1') echo "disabled"; ?>>
								</label>
							</div>
						</div>
                	</div>

					<div class="foot">
						<button class="btn btn-dark btn-rounded min w-100px mr-2" type="submit">UPDATE</button>
						<a class="btn btn-primary btn-rounded min w-100px" onclick="window.history.back();">CANCEL</a>
					</div>
					<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
					<input type="hidden" id="redirect" name="redirect" value="<?php echo ($this->session->user_id != $user['user_id']) ? 1 : 0; ?>">
                </form>
			</div>
		</div>
	</div>
</main>
