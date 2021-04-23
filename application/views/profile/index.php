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
                    <h3>User Profile</h3>
                </div>
            </div>

			<div class="row nul-settings">
				<div class="row align-items-end justify-content-end w-100 mb-4 mx-0">
					<div class="col-lg-5 col-md-5 col-sm-24 t-r p-0">
						<a href="<?php echo base_url('user/profile/change_password'); ?>" class="btn btn-dark btn-rounded min w-100px mr-2">CHANGE PASSWORD</a>
					</div>
				</div>

				<form class="w-100" id="profile-form" method="post" action="<?php echo base_url('user/profile/update/'); ?>">
					<div class="row mb-3">
						<div class="col-lg-24 col-md-24 col-sm-24 mb-3">
							<label for="affiliate_id">Affiliate</label>
							<select name="affiliate_id" id="affiliate_id" data-placeholder="Affiliates" data-type="selector" disabled >
								<?php if($this->session->role_id==1): ?>
								<option value="">Choose Affiliate</option>
								<?php endif; ?>
								<?php foreach($affiliates as $affiliate): ?>
										<?php if($this->session->role_id != 1 && $affiliate['affiliate_id'] != $this->session->affiliate_id) continue; ?>
									<option value="<?php echo $affiliate['affiliate_id']; ?>" <?php if($affiliate['affiliate_id'] == $this->session->affiliate_id) echo "selected"; ?>>
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
									<label for="input-name">User ID</label>
									<input type="text" name="name" id="input-name" class="form-control" value="<?php echo $user['name']; ?>" placeholder="userid@nul.org" disabled />
								</div>
							</div>
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label for="full-name">Name</label>
									<input type="text" name="name" id="full-name" class="form-control" value="<?php echo $user['prifix'].' '.$user['first_name'].' '.$user['last_name']; ?>" disabled />
								</div>
							</div>
							
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label for="role">Role</label>
									<input type="text" name="role_id" id="role" class="form-control" value="<?php echo $user['role_description']; ?>" disabled />
								</div>
							</div>
						</div>

                        <div class="row w-100 mb-3">
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label for="user-title">Title</label>
									<input type="text" name="user_title" id="user-title" class="form-control" value="<?php echo $user['user_title']; ?>" placeholder="Enter your title" disabled />
								</div>
							</div>
							
							<div class="col-lg-8 col-md-8 form-group">
								<label for="user-email">Email</label>
								<input type="email" name="user_email" id="user-email" class="form-control" value="<?php echo $user['user_email_address_1']; ?>" placeholder="mail@nul.org" disabled />
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label for="user-phone">Phone</label>
									<input type="text" name="user_phone" id="user-phone" class="form-control" value="<?php echo $user['user_phone']; ?>" disabled />
								</div>
							</div>
                        </div>
                    </div>

                	<div class="row w-100 my-5">
						<div class="col-lg-8 col-md-8 form-group">
							<div>
								<label>Is ADM Uploader?</label>
								<div>
									<label class="checkbox switch bool disabled <?php if($user['is_adm_uploader']) echo "checked"; ?>" for="switch-adm"><span class="sr-only">Is ADM Uploader?</span>
									<input type="checkbox" name="is_adm_uploader" id="switch-adm" value="1" disabled />
									</label>
								</div>
							</div>
						</div>
						<?php if($this->session->role_id==1): ?>
						<div class="col-lg-8 col-md-8 form-group d-none">
							<div>
								<label>Is user super administrator?</label>
								<div>
									<label class="checkbox switch bool disabled <?php if($user['isuser_super_administrator']) echo "checked"; ?>" for="switch-user"><span class="sr-only">Is user super administrator?</span>
									<input type="checkbox" name="isuser_super_administrator" id="switch-user" value="1" disabled />
									</label>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="col-lg-8 col-md-8 form-group">
							<label>Is user active?</label>
							<div>
								<label class="checkbox switch bool disabled <?php if($user['user_status']) echo "checked"; ?>" for="pu-2"><span class="sr-only">Is user active?</span>
								<input type="checkbox" id="pu-2" name="user_status" value="1" disabled>
								</label>
							</div>
						</div>
                	</div>

					<div class="foot">
						<a class="btn btn-dark btn-rounded min w-100px mr-2" href="<?php echo base_url('/user/edit-profile/').$this->session->user_id; ?>">EDIT</a>
						<a class="btn btn-primary btn-rounded min w-100px" onclick="window.history.back();">CANCEL</a>
					</div>
                </form>
			</div>
		</div>
	</div>
</main>
