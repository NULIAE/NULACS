<main>
	<div class="mainWrap">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="sideBar">
						<?= $left_tabs; ?>
					</div>
				</div>
				<div class="col-md-18">
					<div class="card formCard">
						<div class="h3 tittleS "><?= $tab_title; ?></div>
						<div class="h5 Subtittle text-primary"><b>Contact Data (Direct, Indirect & Public)</b></div>
						<?php if ($this->session->role_id != 1) {
							if ($statuses['contact_data']['status'] != "Submitted" && $statuses['contact_data']['status'] != "Reviewed Complete") { ?>
								<nav class="innerTab">
									<div class="nav nav-pills" id="nav-tab" role="tablist">
										<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
									</div>
									<?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="contact_data" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
									<?php } ?>
									<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="contact_data" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
										</div>
									<?php } ?>
								</nav>
							<?php }
						} elseif ($this->session->role_id == 1) { ?>
							<nav class="innerTab">
								<div class="nav nav-pills" id="nav-tab" role="tablist">
									<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
								</div>
								<?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="contact_data" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="contact_data" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
									</div>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="contact_data" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="contact_data" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
							</nav>
						<?php }
						if (isset($_GET['msg'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Emergency Relief data has been updated.</div>
						<?php } ?>
						<?php if (isset($_GET['tab_message'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
						<?php } ?>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
								<form id="edit-contact-data" method="post" action="<?php echo base_url('module/forms_update/contact_data/update'); ?>">
									<div class="full_form">
									<div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
										<?php if ($this->session->role_id == 1) { ?><div class="row align-items-end">
												<div class="col-md-12">
													<div class="form-group">
														<label for="edit-title" class="form-label">Title <span>*</span></label>
														<input type="text" class="form-control" id="edit-title" value="Contact Data (Direct, Indirect & Public)" required readonly>
													</div>
												</div>
											</div><?php } ?>
										<div class="col-24">
											<div class="tabilCard NulCard EmployeeCard">
												<div class="contact-table table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th colspan="4">A.Direct Contact ( counseling, day care, intensive education programs and legal services )</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td colspan="4"> Direct Contact: These clients generally recieve the extensive and/or long term services in small groups or one-om-one. Examples include counseling, day care,intensive education programs and legal services.Intake records or other reliable methods of collecting information on these clients are often maintained for the purpos4 of program assessment. Because detailes client records are usually maintained in these progar,affiliates should provide complete demographic information on these clients. </td>
															</tr>
															<tr class="interTitle">
																<th></th>
																<th></th>
																<th>Males</th>
																<th>Female</th>
															</tr>
															<tr>
																<td>White</td>
																<td></td>
																<td>
																	<input type="text" class="input-direct-male" value="<?= $content['report_data'][0]['field_direct_white_male']; ?>" id="male" name="field_direct_white_male">
																</td>
																<td>
																	<input type="text" class="input-direct-female" value="<?= $content['report_data'][0]['field_direct_white_female']; ?>" id="female" name="field_direct_white_female">
																</td>
															</tr>
															<tr>
																<td>Hispanic/Latino</td>
																<td></td>
																<td>
																	<input type="text" class="input-direct-male" value="<?= $content['report_data'][0]['field_direct_hispanic_male']; ?>" id="male" name="field_direct_hispanic_male">
																</td>
																<td>
																	<input type="text" class="input-direct-female" value="<?= $content['report_data'][0]['field_direct_hispanic_female']; ?>" id="female" name="field_direct_hispanic_female">
																</td>
															</tr>
															<tr>
																<td>Asian American</td>
																<td></td>
																<td>
																	<input type="text" class="input-direct-male" value="<?= $content['report_data'][0]['field_direct_asian_am_male']; ?>" id="male" name="field_direct_asian_am_male">
																</td>
																<td>
																	<input type="text" class="input-direct-female" value="<?= $content['report_data'][0]['field_direct_asian_am_female']; ?>" id="female" name="field_direct_asian_am_female">
																</td>
															</tr>
															<tr>
																<td>Native American</td>
																<td></td>
																<td>
																	<input type="text" class="input-direct-male" value="<?= $content['report_data'][0]['field_direct_native_am_male']; ?>" id="male" name="field_direct_native_am_male">
																</td>
																<td>
																	<input type="text" class="input-direct-female" value="<?= $content['report_data'][0]['field_direct_native_am_female']; ?>" id="female" name="field_direct_native_am_female">
																</td>
															</tr>
															<tr>
																<td>African American</td>
																<td></td>
																<td>
																	<input type="text" class="input-direct-male" value="<?= $content['report_data'][0]['field_direct_african_am_male']; ?>" id="male" name="field_direct_african_am_male">
																</td>
																<td>
																	<input type="text" class="input-direct-female" value="<?= $content['report_data'][0]['field_direct_african_am_female']; ?>" id="female" name="field_direct_african_am_female">
																</td>
															</tr>
															<tr>
																<td>Other</td>
																<td></td>
																<td>
																	<input type="text" class="input-direct-male" value="<?= $content['report_data'][0]['field_direct_other_male']; ?>" id="male" name="field_direct_other_male">
																</td>
																<td>
																	<input type="text" class="input-direct-female" value="<?= $content['report_data'][0]['field_direct_other_female']; ?>" id="female" name="field_direct_other_female">
																</td>
															</tr>
															<tr>
																<td>Total</td>
																<td></td>
																<td>
																	<input type="text" value="<?= $content['report_data'][0]['field_direct_total_male']; ?>" id="field_direct_total_male" name="field_direct_total_male">
																</td>
																<td>
																	<input type="text" value="<?= $content['report_data'][0]['field_direct_total_female']; ?>" id="field_direct_total_female" name="field_direct_total_female">
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<br>
											<div class="tabilCard NulCard EmployeeCard">
												<div class="contact-table table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th colspan="4">B. Public Contact ( ie, workshops, presentations and training sessions )</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td colspan="4"> Public Contact: These clients generally recieve the one-time or infrequent services from the affiliate,and the services are often provided in agroup setting. Examples include workshops, group presentation and training sessions.Detailed records on each client are typically not maintained, although a basic count of the total number of participants and a good estimate of client demographics should be available. Because detailed client information is often difficult to collect, affiliates are expected to estimate the demographic characteristic of clients served by thses programs. </td>
															</tr>
															<tr class="interTitle ">
																<th></th>
																<th>Males</th>
																<th>Female</th>
															</tr>
															<tr>
																<td>White</td>
																<td>
																	<input type="text" class="input-public-male" value="<?= $content['report_data'][0]['field_public_white_male']; ?>" id="male" name="field_public_white_male">
																</td>
																<td>
																	<input type="text" class="input-public-female" value="<?= $content['report_data'][0]['field_public_white_female']; ?>" id="female" name="field_public_white_female">
																</td>
															</tr>
															<tr>
																<td>Hispanic/Latino</td>
																<td>
																	<input type="text" class="input-public-male" value="<?= $content['report_data'][0]['field_public_hispanic_male']; ?>" id="male" name="field_public_hispanic_male">
																</td>
																<td>
																	<input type="text" class="input-public-female" value="<?= $content['report_data'][0]['field_public_hispanic_female']; ?>" id="female" name="field_public_hispanic_female">
																</td>
															</tr>
															<tr>
																<td>Asian American</td>
																<td>
																	<input type="text" class="input-public-male" value="<?= $content['report_data'][0]['field_public_asian_am_male']; ?>" id="male" name="field_public_asian_am_male">
																</td>
																<td>
																	<input type="text" class="input-public-female" value="<?= $content['report_data'][0]['field_public_asian_am_female']; ?>" id="female" name="field_public_asian_am_female">
																</td>
															</tr>
															<tr>
																<td>Native American</td>
																<td>
																	<input type="text" class="input-public-male" value="<?= $content['report_data'][0]['field_public_native_am_male']; ?>" id="male" name="field_public_native_am_male">
																</td>
																<td>
																	<input type="text" class="input-public-female" value="<?= $content['report_data'][0]['field_public_native_am_female']; ?>" id="female" name="field_public_native_am_female">
																</td>
															</tr>
															<tr>
																<td>African American</td>
																<td>
																	<input type="text" class="input-public-male" value="<?= $content['report_data'][0]['field_public_african_am_male']; ?>" id="male" name="field_public_african_am_male">
																</td>
																<td>
																	<input type="text" class="input-public-female" value="<?= $content['report_data'][0]['field_public_african_am_female']; ?>" id="female" name="field_public_african_am_female">
																</td>
															</tr>
															<tr>
																<td>Other</td>
																<td>
																	<input type="text" class="input-public-male" value="<?= $content['report_data'][0]['field_public_other_male']; ?>" id="male" name="field_public_other_male">
																</td>
																<td>
																	<input type="text" class="input-public-female" value="<?= $content['report_data'][0]['field_public_other_female']; ?>" id="female" name="field_public_other_female">
																</td>
															</tr>
															<tr>
																<td>Total</td>
																<td>
																	<input type="text" value="<?= $content['report_data'][0]['field_public_total_male']; ?>" id="field_public_total_male" name="field_public_total_male">
																</td>
																<td>
																	<input type="text" value="<?= $content['report_data'][0]['field_public_total_female']; ?>" id="field_public_total_female" name="field_public_total_female">
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<br>
											<div class="tabilCard NulCard EmployeeCard">
												<div class="contact-table table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th colspan="2">C. Indirect Contact ( ie, telephone hotlines, telephone referral services and literature distribution )</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td colspan="2"> Indirect Contact: These clients generally recieve through phone contact or literature distribution. Examples include telephone hot lines, telephone referral services and literature distribution. Demographic informationon these clients is typically difficult to collect. Because of the difficulty involved in collecting demographic information on clients served in these programs, affiliate should provide the total number of clients served through this type of services. </td>
															</tr>
															<tr class="d-flex justify-content-between ">
																<td>Number Served</td>
																<td>
																	<input type="text" value="<?= $content['report_data'][0]['field_indirect_contact_served']; ?>" id="female" name="field_indirect_contact_served">
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<br>
										</div>
										<div class="row g-4 align-items-end">
											<div class="col-md-12" <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) { ?>style="display: none;" <?php } ?>>
												<div class="form-group">
													<label for="field_tab_status" class="form-label">Tab Status *</label>
													<select class="form-select" id="Status" name="field_tab_status">
														<!-- <option value="">- None -</option> -->
														<?php
														if ($this->session->role_id == '1') {
															foreach ($census_tab_statuses as $option) {
																if ($content['report_data'][0]['field_tab_status'] == 0) { ?>
																	<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
																		<?= $option['status']; ?>
																	</option>
																<?php } else { ?>
																	<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['report_data'][0]['field_tab_status']) { ?>selected="selected" <?php } ?>>
																		<?= $option['status']; ?>
																	</option>
																<?php
																} ?>
																<?php
															}
														} elseif ($this->session->role_id == '2' || $this->session->role_id == '3') {
															foreach ($census_tab_statuses as $option) {
																if ($option['status_id'] != '122' && $option['status_id'] != '123' && $option['status_id'] != '124') {
																	if ($content['report_data'][0]['field_tab_status'] == 0) { ?>
																		<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
																			<?= $option['status']; ?>
																		</option>
																	<?php } else { ?>
																		<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['report_data'][0]['field_tab_status']) { ?>selected="selected" <?php } ?>>
																			<?= $option['status']; ?>
																		</option>
														<?php
																	}
																}
															}
														} ?>
													</select>
												</div>
											</div>
											<?php if ($this->session->role_id == 1) { ?>
												<div class="col-md-12">
													<div class="form-group">
														<label for="field_parent_census" class="form-label">Parent census *</label>
														<select class="form-select" aria-label="field_parent_census" id="field_parent_census" name="field_parent_census">
															<option value="">- None -</option>
															<?php foreach ($parent_census as $parent) { ?>
																<option value="<?= $parent['report_id']; ?>" <?php if ($parent['report_id'] == $report_id) { ?>selected="selected" <?php } ?>>
																	<?= $parent['organization'] . " " . $parent['field_year'] . " census"; ?>
																</option>
															<?php } ?>
														</select>
													</div>
												</div>
											<?php 
											// } elseif (
											// 	$this->session->role_id == 2 && $statuses['serviceareas']['status'] == 'Completed' && $statuses['community']['status'] == 'Completed' && $statuses['employees']['status'] == 'Completed'
											// 	&& $statuses['revenue']['status'] == 'Completed' && $statuses['expenditure']['status'] == 'Completed' && $statuses['education_program']['status'] == 'Completed' && $statuses['entrepreneurship_program']['status'] == 'Completed'
											// 	&& $statuses['health_quality']['status'] == 'Completed' && $statuses['housing']['status'] == 'Completed' && $statuses['workforce']['status'] == 'Completed'  && $statuses['other_programs']['status'] == 'Completed'
											// 	&& $statuses['covid']['status'] == 'Completed' && $statuses['civic']['status'] == 'Completed' && $statuses['emergency_relief']['status'] == 'Completed' && $statuses['contact_data']['status'] == 'Completed'
											// 	&& $statuses['empowerment']['status'] == 'Completed' && $statuses['volunteer']['status'] == 'Completed'
											// ) { 
												?>
												<!-- <div class="col-md-12">
													<div class="form-group">
														<label for="field_parent_census" class="form-label">Parent census *</label>
														<select class="form-select" aria-label="field_parent_census" id="field_parent_census" name="field_parent_census">
															<option value="">- None -</option>
															<?php foreach ($parent_census as $parent) { ?>
																<option value="<?= $parent['report_id']; ?>" <?php if ($parent['report_id'] == $report_id) { ?>selected="selected" <?php } ?>>
																	<?= $parent['organization'] . " " . $parent['field_year'] . " census"; ?>
																</option>
															<?php } ?>
														</select>
													</div>
												</div> -->
											<?php } else { ?>
												<input type="hidden" value="<?= $report_id; ?>" name="field_parent_census" id="field_parent_census">
											<?php } ?>
										</div>
										<hr>
										<div class="mt-3">
											<div class="form-group t-c formclassbtn">
												<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
												<button class="btn btn-danger m-r-15 btn-rounded" type="button" data-table_name="contact_data" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
												<button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
											</div>
										</div>
									</div>
									<input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" id="hid_parent_census">
									<input type="hidden" value="<?= $content['report_data'][0]['pk_id']; ?>" name="pk_id" id="pk_id">
								</form>
							</div>
							<div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
								<h4 class="title-head"></h4>
								<div class="tabilCard inner NulCard">
									<div class="contact-table table-responsive">
										<table class="table table-striped">
											<tbody>
												<tr>
													<td colspan="3">A. Direct Contact (i.e. counseling, day care, intensive education programs and legal services) </td>
												</tr>
												<tr>
													<td></td>
													<td><span>Males</span></td>
													<td><span>Females</span></td>
												</tr>
												<tr>
													<td>White </td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_white_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_white_female']); ?></span></td>
												</tr>
												<tr>
													<td>Hispanic/Latino </td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_hispanic_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_hispanic_female']); ?></span></td>
												</tr>
												<tr>
													<td>Asian American </td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_asian_am_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_asian_am_female']); ?></span></td>
												</tr>
												<tr>
													<td>Native American </td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_native_am_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_native_am_female']); ?></span></td>
												</tr>
												<tr>
													<td>African American </td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_african_am_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_african_am_female']); ?></span></td>
												</tr>
												<tr>
													<td>Other </td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_other_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_other_female']); ?></span></td>
												</tr>
												<tr>
													<td>Total </td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_total_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_direct_total_female']); ?></span></td>
												</tr>
												<tr>
													<td colspan="3">B. Public Contact (i.e. workshops, presentations and training sessions) </td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped">
											<tbody>
												<tr>
													<td></td>
													<td><span>Males</span></td>
													<td><span>Female</span></td>
												</tr>
												<tr>
													<td>White </td>
													<td><span><?= number_format($content['report_data'][0]['field_public_white_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_public_white_female']); ?></span></td>
												</tr>
												<tr>
													<td>Hispanic/Latino </td>
													<td><span><?= number_format($content['report_data'][0]['field_public_hispanic_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_public_hispanic_female']); ?></span></td>
												</tr>
												<tr>
													<td>Asian American </td>
													<td><span><?= number_format($content['report_data'][0]['field_public_asian_am_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_public_asian_am_female']); ?></span></td>
												</tr>
												<tr>
													<td>Native American </td>
													<td><span><?= number_format($content['report_data'][0]['field_public_native_am_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_public_native_am_female']); ?></span></td>
												</tr>
												<tr>
													<td>African American </td>
													<td><span><?= number_format($content['report_data'][0]['field_public_african_am_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_public_african_am_female']); ?></span></td>
												</tr>
												<tr>
													<td>Other </td>
													<td><span><?= number_format($content['report_data'][0]['field_public_other_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_public_other_female']); ?></span></td>
												</tr>
												<tr>
													<td>Total </td>
													<td><span><?= number_format($content['report_data'][0]['field_public_total_male']); ?></span></td>
													<td><span><?= number_format($content['report_data'][0]['field_public_total_female']); ?></span></td>
												</tr>
												<tr>
													<td colspan="3">C. Indirect Contact (i.e. telephone hotlines, telephone referral services and literature distribution) </td>
												</tr>
												<tr>
													<td>Number Served</td>
													<td></td>
													<td><span><?php isset($content['report_data'][0]['field_indirect_contact_served']) ? print_r(number_format($content['report_data'][0]['field_indirect_contact_served'])) : print_r(''); ?></span></td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped">
											<tbody>
												<?php if ($this->session->role_id == 1) { ?>
													<tr>
														<td>Tab Status: </td>
														<td></td>
														<td><span><?= $content['report_data'][0]['status']; ?></span></td>
													</tr>
												<?php } ?>
												<tr style="visibility:hidden;">
													<td>Tab Status: </td>
													<td><input type="hidden" id="tab_stat" value="<?= $content['report_data'][0]['field_tab_status']; ?>"></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>