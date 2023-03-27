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
						<div class="h3 tittleS ">
							<?= $tab_title; ?>
						</div>
						<div class="h5 Subtittle text-primary"><b>Entrepreneurship and Business Development Program Details</b></div>
						<?php if ($this->session->role_id != 1) {
							if ($statuses['entrepreneurship_program']['status'] != "Submitted" && $statuses['entrepreneurship_program']['status'] != "Reviewed Complete") { ?>
								<nav class="innerTab">
									<div class="nav nav-pills" id="nav-tab" role="tablist">
										<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
									</div>
									<?php if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0  && $content['report_data'][0]['field_tab_status']  == 120) {?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="entrepreneurship_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
									<?php }else{?>
									<?php if ((count($programs) != 0) && $content['report_data'][0]['field_tab_status']  == 120) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="entrepreneurship_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
									<?php } }?>
									<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="entrepreneurship_program" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
										</div>
									<?php } ?>
								</nav>
							<?php }
						} else if ($this->session->role_id == 1) { ?>
							<nav class="innerTab">
								<div class="nav nav-pills" id="nav-tab" role="tablist">
									<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
								</div>
								<?php if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0  && $content['report_data'][0]['field_tab_status']  == 120) {?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="entrepreneurship_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
									</div>
								<?php }else{?>
								<?php if ((count($programs) != 0) && $content['report_data'][0]['field_tab_status']  == 120) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="entrepreneurship_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
									</div>
								<?php } }?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="entrepreneurship_program" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
									</div>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="entrepreneurship_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="entrepreneurship_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
							</nav>
						<?php }
						if (isset($_GET['msg'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Entrepreneurship Program data has been updated.</div>
						<?php } ?>
						<?php if (isset($_GET['tab_message'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
						<?php } ?>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
								<form id="edit-entrepreneurship-prg" method="post" action="<?php echo base_url('module/forms_update/entrepreneurship_prg/update'); ?>">
									<div class="full_form">
									<div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
										<div class="row g-4 align-items-end p-b-20 our-affiliate-enterpren-programs">
											<div class="col-md-12" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
												<div class="form-group">
													<label for="edit-title" class="form-label">Title <span>*</span></label>
													<input type="text" class="form-control" id="edit-title" value="Entrepreneurship and Business Development Program Details" required readonly>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-do-you-offer-programs-of-t" class="form-label">Our affiliate offers programs of this type<span>*</span> </label>
													<br>
													<label class="radio">
														<input type="radio" id="edit_field_do_you_offer_programs_of_t_0" name="field_do_you_offer_programs_of_t" value="0" class="hide_fields" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0) { ?> checked="checked" <?php } ?> onclick="showDivifYes()">
														<label class="label p-r-10" for="edit_field_do_you_offer_programs_of_t_0"> No </label>
													</label>
													<label class="radio">
														<input type="radio" id="edit_field_do_you_offer_programs_of_t_1" name="field_do_you_offer_programs_of_t" value="1" class="hide_fields" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1) { ?> checked="checked" <?php } ?> onclick="showDivifYes()">
														<label class="label p-r-10" for="edit_field_do_you_offer_programs_of_t_1"> Yes </label>
													</label>
												</div>
											</div>
										</div>

										<div class="col-24" id="hide_div_if_no">
											<div class="clearfix"  <?php if (($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 || count($programs) != 0)) {?> style="display:none"<?php }?>>
												<div class="messages error"> <i class="i i-warning"></i>&nbsp; &nbsp;You will require to enter information about at least one program to complete this tab on the next screen </div>
											</div>
											<div class="h5 Subtittle m-t-20">Person Who Oversees Educational Program</div>
											<div class="row g-4 align-items-end p-b-20 ">
												<div class="col-md-8">
													<div class="form-group ">
														<label for="edit-field-entpr-overseer-name" class="form-label">Name </label>
														<input type="text" class="form-control" id="edit-field-entpr-overseer-name" name="field_entpr_overseer_name" value="<?= $content['report_data'][0]['field_entpr_overseer_name']; ?>">
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-entpr-overseer-email" class="form-label">Email </label>
														<input type="email" class="form-control" id="edit-field-entpr-overseer-email" name="field_ed_overseer_email" value="<?= $content['report_data'][0]['field_ed_overseer_email']; ?>">
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-program-entpr-total-partic" class="form-label">Total Participants in Entrepreneurship Program </label>
														<input type="text" class="form-control" id="edit-field-program-entpr-total-partic" name="field_program_entpr_total_partic" value="<?= number_format($content['report_data'][0]['field_program_entpr_total_partic']); ?>">
													</div>
												</div>
											</div>
											<div class="h5 Subtittle">How many staffs are engaged in entrepreneurship activities?</div>
											<div class="row g-4 align-items-end p-b-20 p-t-10 ">
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-program-entpr-staff-aff" class="form-label">Affiliate </label>
														<input type="text" class="form-control" id="edit-field-program-entpr-staff-aff" name="field_program_entpr_staff_aff" value="<?= number_format($content['report_data'][0]['field_program_entpr_staff_aff']); ?>">
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-program-entpr-staff-entpr" class="form-label">Entrepreneurship </label>
														<input type="text" class="form-control" id="edit-field-program-entpr-staff-entpr" name="field_program_entpr_staff_entpr" value="<?= number_format($content['report_data'][0]['field_program_entpr_staff_entpr']); ?>">
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-program-entpr-staff-other" class="form-label">Others ( i.e consultants ) </label>
														<input type="text" class="form-control" id="edit-field-program-entpr-staff-other" name="field_program_entpr_staff_other" value="<?= number_format($content['report_data'][0]['field_program_entpr_staff_other']); ?>">
													</div>
												</div>
											</div>

											<div class="h5 Subtittle">Program Impacts</div>
											<div class="inpgrp">
												<div class="col-md-12">
													<div class="form-group">
														<label for="edit-field-program-entpr-new" class="form-label">Number of new businesses created </label>
														<input type="text" class="form-control w-200px" id="edit-field-program-entpr-new" name="field_program_entpr_new" value="<?= number_format($content['report_data'][0]['field_program_entpr_new']); ?>">
													</div>
												</div>
											</div>
											<div class="h6 Subtittle">Number of new jobs created(from new or expanded existing businesses)</div>


											<div class="row g-4 align-items-end p-b-20">
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-program-entpr-jobs-ft" class="form-label">Full Time</label>
														<input type="text" class="form-control " id="edit-field-program-entpr-jobs-ft" name="field_program_entpr_jobs_ft" value="<?= number_format($content['report_data'][0]['field_program_entpr_jobs_ft']); ?>">
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-program-entpr-jobs-pt" class="form-label">Part Time</label>
														<input type="text" class="form-control " id="edit-field-program-entpr-jobs-pt" name="field_program_entpr_jobs_pt" value="<?= number_format($content['report_data'][0]['field_program_entpr_jobs_pt']); ?>">
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-program-entpr-certs" class="form-label">Number of certifications obtained( ie, MBE, WMBE etc )</label>
														<input type="text" class="form-control " id="edit-field-program-entpr-certs" name="field_program_entpr_certs" value="<?= number_format($content['report_data'][0]['field_program_entpr_certs']); ?>">
													</div>
												</div>
											</div>
											<div class="row g-4 p-b-20">
												<div class="col-md-12">
													<div class="form-group">
														<label for="edit-field-program-entpr-new-dollars" class="form-label">Dollar amount of new financing or contracts acquired by new businesses</label>
														<div class="row align-items-end">
															<div class="col-1"><span>$</span></div>
															<div class="col-11">
																<input type="text" class="form-control w-200px" id="edit-field-program-entpr-new-dollars" name="field_program_entpr_new_dollars" value="<?= number_format($content['report_data'][0]['field_program_entpr_new_dollars'], 2); ?>">
															</div>
														</div>
														<br>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="edit-field-program-entpr-sales" class="form-label">Total sales of business started by participants in entrepreneurship progarm ( ie. Small Business Matters )</label>
														<div class="row align-items-end">
															<div class="col-1"><span>$</span></div>
															<div class="col-11">
																<input type="text" class="form-control w-200px" id="edit-field-program-entpr-sales" name="field_program_entpr_sales" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_entpr_sales'], 2); ?>">
															</div>
														</div>
													</div>
												</div>
											</div>

											<?php if (count($content['buisiness']) > 0) { ?>
												<p>List the type of business and value of sale for each business:</p>
												<?php for ($i = 0; $i < count($content['buisiness']); $i++) { ?>
													<?php $buttonid = $i + 1; ?>
													<div class="tabilCard NulCard EmployeeCard m-t-15" id="row<?= $buttonid; ?>">
														<div class="contact-table table-responsive p-b-15">
															<table class="table">
																<thead>
																	<tr>
																		<th colspan="4">BUSINESS TABLE </th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<th class="p-l-15">Business Type</th>
																		<th class="p-l-15">Sales</th>
																		<th class="p-l-15">Served</th>
																	</tr>
																	<tr>
																		<td>
																			<select class="form-select w-500px" aria-label="edit-field-buisiness-type" id="new-<?= $buttonid; ?>-service_buisiness" name="new-<?= $buttonid; ?>-service_buisiness">
																				<option value="">- None -</option>
																				<?php foreach ($type_of_business as $type) { ?>
																					<option value="<?= $type['id']; ?>" <?php if ($type['id'] == $content['buisiness'][$i]['id']) { ?>selected="selected" <?php } ?>>
																						<?= $type['name']; ?>
																					</option>
																				<?php } ?>
																			</select>

																		<td>
																			<div class="row align-items-center">
																				<div class="col-1"><span>$</span></div>
																				<div class="col-11"><input type="text" class="form-control w-200px entrepreneurship_prg_sale_total" id="new-<?= $buttonid; ?>-service_sales" name="new-<?= $buttonid; ?>-service_sales" value="<?= $content['buisiness'][$i]['field_business_sales_value']; ?>"> </div>
																			</div>
																		</td>
																		<td>
																			<div class="row align-items-center">
																				<div class="col-12"><input type="text" class="form-control w-200px" id="new-<?= $buttonid; ?>-service_served" name="new-<?= $buttonid; ?>-service_served" value="<?= $content['buisiness'][$i]['field_business_served_value']; ?>"> </div>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
															<button class="btn btn-danger btn-rounded m-r-15 m-t-15 m-l-15" id="<?= $buttonid; ?>" onclick="removeBuisinessType(<?= $buttonid; ?>)">Remove</button>
														</div>
													</div>

												<?php }
											} else { ?>

												<div class="messages error" id="no_data_added"> <i class="i i-warning"></i>&nbsp; &nbsp;No Businesses added yet. Select a Business type and press the button below to add one. </div>
											<?php $buttonid = 0;
											} ?>
											<div id="business_type"></div>

											<br>
											<script>
												var type_of_business = <?php echo json_encode($type_of_business); ?>;
											</script>
											<button type="button" class="btn btn-primary m-r-15 btn-rounded buisiness" data-sourceid="<?= $buttonid; ?>" onClick="addBusinesstype(this.getAttribute('data-sourceid'),type_of_business);">+ Add Business</button>
											<br>
											<br>
											<div class="inpgrp">
												<div class="form-group">
													<label for="edit-field-program-entpr-total-sales" class="form-label">Value of sales of all business</label>
													<div class="row align-items-center">
														<div class="col-1"><span>$</span></div>
														<div class="col-11">
															<input type="text" class="form-control w-200px entrepreneurship_prg_sale_add_total" id="edit-field-program-entpr-total-sales" name="field_program_entpr_total_sales" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_entpr_total_sales'], 2); ?>">
														</div>
													</div>
													<br>
												</div>
											</div>
											<div class="h5 Subtittle">Business Stage</div>
											<div class="row g-4 align-items-end p-b-20 ">
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-program-entpr-stage-0-2" class="form-label">0-2 years</label>
														<input type="text" class="form-control" id="edit-field-program-entpr-stage-0-2" name="field_program_entpr_stage_0_2" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_entpr_stage_0_2']); ?>">
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-program-entpr-stage-3-5" class="form-label">3-5 years</label>
														<input type="text" class="form-control" id="edit-field-program-entpr-stage-3-5" name="field_program_entpr_stage_3_5" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_entpr_stage_3_5']); ?>">
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-program-entpr-stage-5-10" class="form-label">5-10 years</label>
														<input type="text" class="form-control" id="edit-field-program-entpr-stage-5-10" name="field_program_entpr_stage_5_10" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_entpr_stage_5_10']); ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="row g-4 align-items-end p-b-20 ">
											<?php if ($this->session->role_id == 1) { ?>
												<div class="col-md-12">
													<div class="form-group">
														<label for="parent" class="form-label">Parent census <span>*</span></label>
														<select class="form-select" aria-label="Affiliate" id="field_parent_census" name="field_parent_census">
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
														<label for="parent" class="form-label">Parent census <span>*</span></label>
														<select class="form-select" aria-label="Affiliate" id="field_parent_census" name="field_parent_census">
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
											<div class="col-md-12" <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) { ?>style="display: none;" <?php } ?>>
												<div class="form-group">
													<label for="Status" class="form-label">Tab Status <span>*</span></label>
													<select class="form-select" id="field_tab_status" name="field_tab_status">
														<!-- <option value="">- None -</option> -->
														<?php
														if ($this->session->role_id == '1') {
															foreach ($census_tab_statuses as $option) {
																if ($content['report_data'][0]['field_tab_status'] == 0) {
														?>
																	<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
																		<?= $option['status']; ?>
																	</option>
																<?php
																} else {
																?>
																	<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['report_data'][0]['field_tab_status']) { ?>selected="selected" <?php } ?> <?php if (count($programs) == 0) { ?> <?php if ($option['status_id'] != 120) { ?>disabled="true" <?php }
																																																																																	if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?> <?php } ?>>
																		<?= $option['status']; ?>
																	</option>
																<?php
																}
																?>
																<?php
															}
														} elseif ($this->session->role_id == '2' || $this->session->role_id == '3') {
															foreach ($census_tab_statuses as $option) {
																if ($option['status_id'] != '122' && $option['status_id'] != '123' && $option['status_id'] != '124') {
																	if ($content['report_data'][0]['field_tab_status'] == 0) {
																?>
																		<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
																			<?= $option['status']; ?>
																		</option>
																	<?php
																	} else {
																	?>
																		<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['report_data'][0]['field_tab_status']) { ?>selected="selected" <?php } ?> <?php if (count($programs) == 0) { ?> <?php if ($option['status_id'] != 120) { ?>disabled="true" <?php }
																																																																																		if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?> <?php } ?>>
																			<?= $option['status']; ?>
																		</option>
																<?php
																	}
																}
																?>
														<?php
															}
														}
														?>
													</select>
												</div>
											</div>
										</div>

										<div class="row g-4 align-items-end" id="hide_div_div2" style="visibility: hidden;"> <!--  excluded class  p-b-20  -->
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-legacy-business-sales-tot" class="form-label">legacy_business_sale tot</label>
													<input type="text" class="form-control" id="edit-field-legacy-business-sales-tot" name="field_legacy_business_sales_tot" placeholder="" value="<?= $content['report_data'][0]['field_legacy_business_sales_tot']; ?>">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-ennumofparticipantsbusdev" class="form-label">enNumOfParticipantsBusDev</label>
													<input type="text" class="form-control" id="edit-field-ennumofparticipantsbusdev" name="field_ennumofparticipantsbusdev" placeholder="" value="<?= $content['report_data'][0]['field_ennumofparticipantsbusdev']; ?>">
												</div>
											</div>
										</div>
									</div>


									<hr>
									<div class="">
										<div class="form-group t-c formclassbtn">
											<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
											<button class="btn btn-danger m-r-15 btn-rounded" type="button" id="delete_button" data-status_id="<?= $statuses['entrepreneurship_program']['status'];?>" data-table_name="entrepreneurship_program" data-pk_id="<?= $content['report_data'][0]['pk_id']; ?>" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
											<button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
										</div>
									</div>
									<input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" id="hid_parent_census">
									<input type="hidden" value="<?= $content['report_data'][0]['pk_id']; ?>" name="pk_id" id="pk_id">
								</form>
							</div>

							<div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
								<div <?php if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0) { ?>style="display: none;" <?php } ?>>
									<h4 class="title-head"></h4>
									<h4 class="title-head">Programs</h4>
									<?php if (count($programs) == 0) { ?>
										<div class="messages error" id="no_data_added"> <i class="i i-warning"></i>&nbsp; &nbsp;At least one program must be entered to complete this tab </div>
									<?php } else if (count($programs) != 0) { ?>
										<div class="tabilCard inner NulCard">
											<div class="contact-table table-responsive">
												<table class="table table-striped">
													<tbody>
														<tr>
															<td><b> Program Title </b> </td>
															<td><b>Number of People Served Annually </b> </td>
															<td><b>Total Program Budget Funded</b> </td>
														</tr>
														<?php
														foreach ($programs as $pro) {
															$report_id = $pro['field_parent_census'];
															$pk_id = $pro['pk_id'];
														?>
															<tr>
																<td><a class="text-primary" href="<?php echo base_url("module/census_report/$report_id/$pk_id/viewprogram"); ?>"><?= $pro['title']; ?></a></td>
																<td><span><?= number_format($pro['field_program_served_total']); ?> </span> </td>
																<td><span>$<?= number_format($pro['field_program_budget'], 2); ?></span> </td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									<?php } ?>
									<br> <?php if ($this->session->role_id != 1) {
												if ($statuses['entrepreneurship_program']['status'] != "Submitted" && $statuses['entrepreneurship_program']['status'] != "Reviewed Complete") { ?> <a class="btn btn-primary btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/entrepreneurship_program">+ Add A Program</a><?php }
																																																																																																} else if ($this->session->role_id == 1) { ?> <a class="btn btn-accent btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/entrepreneurship_program">+ Add A Program</a> <?php echo "<br><br>";
																																																																																																																																																												} ?>
								</div>
								<div class="tabilCard inner NulCard">
									<div class="contact-table table-responsive">
										<table class="table table-striped">
											<tbody>
												<tr>
													<td>Our Affiliate offers programs of this type: </td>
													<td>
														<span> <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1) {
																	echo "Yes";
																} else {
																	echo "No";
																}; ?> </span>
													</td>
												</tr>
												<tr>
													<td colspan="2" class="none_border">
														<div class="prg_head text-primary h5 fw-bold">Person Who Oversees Entrepreneurship Programs</div>
													</td>
												</tr>
												<tr>
													<td>Name: </td>
													<td>
														<span> <?= $content['report_data'][0]['field_entpr_overseer_name']; ?></span>
													</td>
												</tr>
												<tr>
													<td>Email: </td>
													<td>
														<span> <?= $content['report_data'][0]['field_ed_overseer_email']; ?></span>
													</td>
												</tr>
												<tr>
													<td>Total Participants in Entrepreneurship Programs: </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_total_partic']); ?></span>
													</td>
												</tr>
												<tr>
													<td colspan="2" class="none_border">
														<div class="prg_head text-primary h5 fw-bold">How many staff are engaged in these entrepreneurship activities?</div>
													</td>
												</tr>
												<tr>
													<td>Affiliate: </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_staff_aff']); ?></span>
													</td>
												</tr>
												<tr>
													<td>Entrepreneurship: </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_staff_entpr']); ?></span>
													</td>
												</tr>
												<tr>
													<td>Other (i.e. consultants): </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_staff_other']); ?></span>
													</td>
												</tr>
												<tr>
													<td colspan="2" class="none_border">
														<div class="prg_head text-primary h5 fw-bold">Program Impacts</div>
													</td>
												</tr>
												<tr>
													<td>Number of new businesses created: </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_new']); ?></span>
													</td>
												</tr>
												<tr>
													<td colspan="2" class="none_border">
														<div class="fw_bold">Number of new jobs created (from new or expanded existing businesses)</div>
													</td>
												</tr>
												<tr>
													<td>Full Time: </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_jobs_ft']); ?></span>
													</td>
												</tr>
												<tr>
													<td>Part time: </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_jobs_pt']); ?></span>
													</td>
												</tr>
												<tr>
													<td>Number of certifications obtained (i.e. MBE, WMBE, etc.): </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_certs']); ?></span>
													</td>
												</tr>
												<tr>
													<td>Dollar amount of new financing or contracts acquired by new businesses: </td>
													<td>
														<span> <?php if (isset($content['report_data'][0]['field_program_entpr_new_dollars'])) { ?> $<?= number_format($content['report_data'][0]['field_program_entpr_new_dollars'], 2); ?> <?php } ?></span>
													</td>
												</tr>
												<tr>
													<td>Total sales of businesses started by participants in entrepreneurship programs (i.e. Small Business Matters): </td>
													<td>
														<span> <?php if (isset($content['report_data'][0]['field_program_entpr_sales'])) { ?> $<?= number_format($content['report_data'][0]['field_program_entpr_sales'], 2); ?> <?php } ?></span>
													</td>
												</tr>
											</tbody>
										</table>
										<?php if (count($content['buisiness']) > 0) { ?>
											<table class="table table-striped">
												<tbody>
													<tr>
														<td>
															<h4>Business Type </h4>
														</td>
														<td>
															<h4>Sales </h4>
														</td>
														<td>
															<h4>Served </h4>
														</td>
													</tr>
													<?php
													for ($i = 0; $i < count($content['buisiness']); $i++) {
													?>
														<tr>
															<td><?= $content['buisiness'][$i]['name']; ?> </td>
															<td><span> $<?= number_format($content['buisiness'][$i]['field_business_sales_value'], 2); ?> </span></td>
															<td><span><?= number_format($content['buisiness'][$i]['field_business_served_value']); ?></span></td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										<?php }?>
										<table class="table table-striped">
											<tbody>
												<tr>
													<td colspan="2" class="none_border">
														<div class="prg_head text-primary h5 fw-bold">Business Stage</div>
													</td>
												</tr>
												<tr>
													<td>0-2 years: </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_stage_0_2']); ?></span>
													</td>
												</tr>
												<tr>
													<td>3-5 years: </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_stage_3_5']); ?></span>
													</td>
												</tr>
												<tr>
													<td>5-10 years: </td>
													<td>
														<span> <?= number_format($content['report_data'][0]['field_program_entpr_stage_5_10']); ?> </span>
													</td>
												</tr>
												<tr>
													<td class="viewcol1 fw_bold">Value of sales for all businesses:</td>
													<td>
														<span> <?php if (isset($content['report_data'][0]['field_program_entpr_total_sales'])) { ?> $<?= number_format($content['report_data'][0]['field_program_entpr_total_sales'], 2);
																																					} ?> </span>
													</td>
												</tr>
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