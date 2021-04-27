<main class="user-add"> 
	<div class="container">
		<div class="Wrapper">
			<div class="row justify-content-end date">
                <div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
            </div>
			<div class="row headOuter">
				<div class="head userHead">
					<h3>ADD AFFILIATE</h3>
				</div>
			</div>
			<div class="row nul-settings">

				<form class="w-100" id="add-form" method="post" action="<?php echo base_url('module/affiliate/insert'); ?>">
					<div class="settingWrap">

						<div class="row w-100 mb-3">
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Name</label>
									<input type="text" class="form-control" name="organization" placeholder="Urban League of Madison County, Inc." required />
								</div>
							</div>
						
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Region ID</label>
									<select name="region_id" data-placeholder="East" data-type="selector" required>
										<option value="">Select Region</option>
										<?php foreach($regions as $region): ?>
											<option value="<?php echo $region['region_id'];?>"><?php echo $region['name'];?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Year ending date?</label>
									<input type="text" class="form-control" name="year_end"  placeholder="YYYY-MM-DD" required />
								</div>
							</div>
								
						</div>

						<div class="row w-100 mb-3">
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>City</label>
									<input type="text" class="form-control" name="city"  placeholder="City" required />
								</div>
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>State</label>
									<select name="state" data-placeholder="State" data-type="selector" required>
										<option value="">Select State</option>
										<?php foreach($states as $state): ?>
											<option value="<?php echo $state['stateid'];?>"><?php echo $state['state'];?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Phone</label>
									<input type="text" class="form-control" name="phone" placeholder="000-000-0000" required />
								</div>
							</div>

						</div>

						<div class="row w-100 mb-3">

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Frequency of Board Meeting</label>
									<input type="text" class="form-control" name="board_meeting_frequency" placeholder="Frequency of Board Meeting" required />
								</div>
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Email</label>
									<input type="email" class="form-control" name="email" placeholder="y.bailey@nvul.org" required />
								</div>
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Term Expiration</label>
									<input type="text" class="form-control" placeholder="Term Expiration" value=""  />
								</div>
							</div>

						</div>

						<div class="row w-100 mb-3">
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Board Chair</label>
									<input type="text" class="form-control" name="board_chair" placeholder="Board Chair" value="" />
								</div>
							</div>
							<div class="col-lg-8 col-md-8 form-group">
								<div>
									<label>Compliance Dues</label>
									<select name="compliance_dues" id="compliance_dues" data-placeholder="Compliance Dues" data-type="selector" required>
										<option value="1">Yes</option>
										<option value="0">No</option>
									</select>
								</div>
							</div>

							<div class="col-lg-8 col-md-8 form-group">
								<label>Active</label>
								<div>
									<label class="checkbox switch bool" for="affiliate_status">
									<input type="checkbox" id="affiliate_status" name="affiliate_status" value="1" />
									</label>
								</div>
							</div>
						</div>

					</div>


					<div class="foot fend">
						<button class="btn btn-dark btn-rounded min w-100px mr-2" type="submit">SAVE</button>
					</div>
            	</form>
			</div>
		</div>
	</div>
</main>
