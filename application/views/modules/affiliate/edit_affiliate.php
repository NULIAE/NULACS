<main class="user-add user">
	<div class="container">
		<div class="Wrapper">
			<div class="row justify-content-end date">
                <div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
            </div>

			<div class="row headOuter">
				<div class="head userHead">
					<h3><?php echo $affiliate['organization'].' - '.$affiliate['city'].', '.$affiliate['stateabbreviation']; ?></h3>
				</div>
			</div>
			<div class="row nul-settings">

				<form class="w-100" id="edit-form" method="post" action="<?php echo base_url('module/affiliate/update'); ?>">
					<div class="settingWrap">

						<div class="row w-100 mb-3">
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Name</label>
									<input type="text" class="form-control" name="organization" value="<?php echo $affiliate['organization']; ?>" />
								</div>
							</div>
						
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Region ID</label>
									<select name="region_id" data-placeholder="East" data-type="selector" required>
										<option value="">Select Region</option>
										<?php foreach($regions as $region): ?>
											<option value="<?php echo $region['region_id'];?>" <?php if($affiliate['region_id']==$region['region_id']) echo "selected"; ?>><?php echo $region['name'];?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Year ending date?</label>
									<input type="text" class="form-control" name="year_end" value="<?php echo $affiliate['year_end']; ?>" placeholder="YYYY-MM-DD" required />
								</div>
							</div>
								
						</div>

						<div class="row w-100 mb-3">
							
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>City</label>
									<input type="text" class="form-control" name="city" value="<?php echo $affiliate['city']; ?>" placeholder="City" required />
								</div>
							</div>
							
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>State</label>
									<select name="state" data-placeholder="State" data-type="selector" required>
										<option value="">Select State</option>
										<?php foreach($states as $state): ?>
											<option value="<?php echo $state['stateid'];?>" <?php if($affiliate['stateid']==$state['stateid']) echo "selected"; ?>><?php echo $state['state'];?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Phone</label>
									<input type="text" class="form-control" name="phone" value="<?php echo $affiliate['phone']; ?>" placeholder="000-000-0000" required />
								</div>
							</div>
						</div>

						<div class="row w-100 mb-3">
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Frequency of Board Meeting</label>
									<input type="text" class="form-control" name="board_meeting_frequency" value="<?php echo $affiliate['board_meeting_frequency']; ?>" placeholder="Frequency of Board Meeting" required />
								</div>
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Compliance Dues</label>
									<select name="compliance_dues" id="compliance_dues" data-placeholder="Compliance Dues" data-type="selector" <?php echo ($this->session->role_id == 1)? "required" : "disabled"; ?>>
										<option value="1" <?php if($affiliate['compliance_dues']=="1") echo "selected"; ?>>Yes</option>
										<option value="0" <?php if($affiliate['compliance_dues']=="0") echo "selected"; ?>>No</option>
									</select>
								</div>
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>UL Census</label>
									<select name="ul_census" id="ul_census" data-placeholder="UL Census" data-type="selector" <?php echo ($this->session->role_id == 1)? "required" : "disabled"; ?>>
										<option value="1" <?php if($affiliate['ul_census']=="1") echo "selected"; ?>>Completed</option>
										<option value="0" <?php if($affiliate['ul_census']=="0") echo "selected"; ?>>Not Completed</option>
									</select>
								</div>
							</div>

						</div>
					</div>

					<div class="row w-100 my-5">
						<div class="col-lg-8 col-md-8 form-group">
							<div>
								<label>Board Chair</label>
								<select name="board_chair" id="board_chair{{affiliate_id}}" data-placeholder="State" data-type="selector">
									<option value="">Select User</option>
									<?php foreach($users as $user): ?>
										<option value="<?php echo $user['user_id']; ?>" <?php if($user['is_board_chair'] == "1") echo "selected"; ?>><?php echo $user['prifix'].$user['first_name']." ".$user['last_name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>
						<div class="col-lg-8 col-md-8 form-group">
							<div>
								<label>Email</label>
								<input type="email" class="form-control" name="email" value="<?php echo $affiliate['email']; ?>" placeholder="y.bailey@nvul.org" required />
							</div>
						</div>

						<div class="col-lg-8 col-md-8 form-group">
							<div>
								<label>Term Expiration</label>
								<input type="text" class="form-control" placeholder="Term Expiration" value=""  />
							</div>
						</div>
					</div>
					<?php if($this->session->role_id == 1): ?>
					<div class="settingWrap">
						<div class="row w-100 mb-3">
							
							<div class="col-lg-8 col-md-8 form-group">
								<label>Current Compliance Status</label>
								<input type="text" class="form-control" placeholder="Current Compliance Status" value="Complaint" disabled />
							</div>

							<div class="col-lg-8 col-md-8 form-group d-none">
								<label class="label">Report Available</label>
								<div>
								<label class="checkbox switch bool" for="report-label{{affiliate_id}}">
									<input id="report-label{{affiliate_id}}" type="checkbox" />
								</label>
								</div>
							</div>
							
							<div class="col-lg-8 col-md-8 form-group">
								<label>Active</label>
								<div>
									<label class="checkbox switch bool <?php if($affiliate['affiliate_status'] == "1") echo "checked"; ?>" for="affiliate_status">
									<input type="checkbox" id="affiliate_status" name="affiliate_status" value="1" <?php if($affiliate['affiliate_status'] == "1") echo "checked"; ?> />
									</label>
								</div>
							</div>

						</div>
					</div>
					<?php endif; ?>

					<div class="foot fend">
						<button class="btn btn-dark btn-rounded min w-100px mr-2" type="submit">SAVE</button>
						<a class="btn btn-primary btn-rounded min w-100px" onclick="window.history.back();">CANCEL</a>
					</div>
					<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
            	</form>
			</div>
		</div>
	</div>
</main>
