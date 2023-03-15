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
						<div class="h5 Subtittle text-primary"><b>Emergency Relief Activities</b></div>
						<?php if ($this->session->role_id != 1) {

							if ($statuses['emergency_relief']['status'] != "Submitted" && $statuses['emergency_relief']['status'] != "Reviewed Complete") { ?>
								<nav class="innerTab">
									<div class="nav nav-pills" id="nav-tab" role="tablist">
										<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
									</div>
									<?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="emergency_relief" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
									<?php } ?>
									<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="emergency_relief" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
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
										<button type="button" id="emergency_relief" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="emergency_relief" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
									</div>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="emergency_relief" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="emergency_relief" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
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
								<form id="edit-emergency" method="post" action="<?php echo base_url('module/forms_update/emergency/update'); ?>">
									<div class="full_form">
									<div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
										<div class="row align-items-end" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-title" class="form-label">Title <span>*</span></label>
													<input type="text" class="form-control" id="edit-title" value="Emergency Relief Activities" required readonly>
												</div>
											</div>
										</div>
										<div class="col-24">
											<div class="tabilCard NulCard EmployeeCard">
												<div class="contact-table table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th colspan="6">ERA Table</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td colspan="6"> Please describe the programs provided to be displaced. </td>
															</tr>
															<tr class="interTitle">
																<th>Program Type</th>
																<th>Describe the Program(s)</th>
																<th>Funding Source: NUL</th>
																<th>Funding Source: Other</th>
																<th>Funding Source: U Way</th>
																<th>Number Served</th>
															</tr>
															<tr>
																<td>Education</td>
																<td>
																	<input type="text" value="<?= $content['report_data'][0]['field_relief_ed_desc']; ?>" id="field_relief_ed_desc" name="field_relief_ed_desc">
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_ed_fund_nul'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_ed_fund_nul" value="0" />
																			<input type="checkbox" name="field_relief_ed_fund_nul" id="field_relief_ed_fund_nul" <?php if ($content['report_data'][0]['field_relief_ed_fund_nul'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_ed_fund_uway'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_ed_fund_uway" value="0" />
																			<input type="checkbox" name="field_relief_ed_fund_uway" id="field_relief_ed_fund_uway" <?php if ($content['report_data'][0]['field_relief_ed_fund_uway'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_ed_fund_other'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_ed_fund_other" value="0" />
																			<input type="checkbox" name="field_relief_ed_fund_other" id="field_relief_ed_fund_other" <?php if ($content['report_data'][0]['field_relief_ed_fund_other'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<input type="text" value="<?= number_format($content['report_data'][0]['field_relief_ed_served']); ?>" id="field_relief_ed_served" name="field_relief_ed_served">
																</td>
															</tr>
															<tr>
																<td>Employment Empowerment</td>
																<td>
																	<input type="text" value="<?= $content['report_data'][0]['field_relief_employ_desc']; ?>" id="field_relief_employ_desc" name="field_relief_employ_desc">
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_employ_fund_nul'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_employ_fund_nul" value="0" />
																			<input type="checkbox" name="field_relief_employ_fund_nul" id="field_relief_employ_fund_nul" <?php if ($content['report_data'][0]['field_relief_employ_fund_nul'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_employ_fund_uway'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_employ_fund_uway" value="0" />
																			<input type="checkbox" name="field_relief_employ_fund_uway" id="field_relief_employ_fund_uway" <?php if ($content['report_data'][0]['field_relief_employ_fund_uway'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_employ_fund_other'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_employ_fund_other" value="0" />
																			<input type="checkbox" name="field_relief_employ_fund_other" id="field_relief_employ_fund_other" <?php if ($content['report_data'][0]['field_relief_employ_fund_other'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<input type="text" value="<?= number_format($content['report_data'][0]['field_relief_employ_served']); ?>" id="field_relief_employ_served" name="field_relief_employ_served">
																</td>
															</tr>
															<tr>
																<td>Health</td>
																<td>
																	<input type="text" value="<?= $content['report_data'][0]['field_relief_health_desc']; ?>" id="field_relief_health_desc" name="field_relief_health_desc">
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_health_fund_nul'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_health_fund_nul" value="0" />
																			<input type="checkbox" name="field_relief_health_fund_nul" id="field_relief_health_fund_nul" <?php if ($content['report_data'][0]['field_relief_health_fund_nul'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_health_fund_uway'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_health_fund_uway" value="0" />
																			<input type="checkbox" name="field_relief_health_fund_uway" id="field_relief_health_fund_uway" <?php if ($content['report_data'][0]['field_relief_health_fund_uway'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_health_fund_other'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_health_fund_other" value="0" />
																			<input type="checkbox" name="field_relief_health_fund_other" id="field_relief_health_fund_other" <?php if ($content['report_data'][0]['field_relief_health_fund_other'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<input type="text" value="<?= number_format($content['report_data'][0]['field_relief_health_served']); ?>" id="field_relief_health_served" name="field_relief_health_served">
																</td>
															</tr>
															<tr>
																<td>Civic Engagement</td>
																<td>
																	<input type="text" value="<?= $content['report_data'][0]['field_relief_civic_desc']; ?>" id="field_relief_civic_desc" name="field_relief_civic_desc">
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_civic_fund_nul'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_civic_fund_nul" value="0" />
																			<input type="checkbox" name="field_relief_civic_fund_nul" id="field_relief_civic_fund_nul" <?php if ($content['report_data'][0]['field_relief_civic_fund_nul'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_civic_fund_uway'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_civic_fund_uway" value="0" />
																			<input type="checkbox" name="field_relief_civic_fund_uway" id="field_relief_civic_fund_uway" <?php if ($content['report_data'][0]['field_relief_civic_fund_uway'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_civic_fund_other'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_civic_fund_other" value="0" />
																			<input type="checkbox" name="field_relief_civic_fund_other" id="field_relief_civic_fund_other" <?php if ($content['report_data'][0]['field_relief_civic_fund_other'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<input type="text" value="<?= number_format($content['report_data'][0]['field_relief_civic_served']); ?>" id="field_relief_civic_served" name="field_relief_civic_served">
																</td>
															</tr>
															<tr>
																<td>Racial Justice</td>
																<td>
																	<input type="text" value="<?= $content['report_data'][0]['field_relief_justice_desc']; ?>" id="field_relief_justice_desc" name="field_relief_justice_desc">
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_justice_fund_nul'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_justice_fund_nul" value="0" />
																			<input type="checkbox" name="field_relief_justice_fund_nul" id="field_relief_justice_fund_nul" <?php if ($content['report_data'][0]['field_relief_justice_fund_nul'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_justice_fund_uway'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_justice_fund_uway" value="0" />
																			<input type="checkbox" name="field_relief_justice_fund_uway" id="field_relief_justice_fund_uway" <?php if ($content['report_data'][0]['field_relief_justice_fund_uway'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<div class="form-group ">
																		<label class="checkbox <?php if ($content['report_data'][0]['field_relief_justice_fund_other'] == 1) { ?>checked<?php } ?>">
																			<input type="hidden" name="field_relief_justice_fund_other" value="0" />
																			<input type="checkbox" name="field_relief_justice_fund_other" id="field_relief_justice_fund_other" <?php if ($content['report_data'][0]['field_relief_justice_fund_other'] == 1) { ?>checked="checked" <?php } ?> value="1"> </label>
																	</div>
																</td>
																<td>
																	<input type="text" value="<?= number_format($content['report_data'][0]['field_relief_justice_served']); ?>" id="field_relief_justice_served" name="field_relief_justice_served">
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<br>
											<div class="form-group">
												<label for="field_relief_other_activities" class="form-label"> Are there any other activities the affiliate is engaged in that are not reflected above? If so, please describe below: </label>
												<textarea class="form-control" id="field_relief_other_activities" rows="3" name="field_relief_other_activities"><?= $content['report_data'][0]['field_relief_other_activities']; ?></textarea>
											</div>
										</div>

										<div class="row g-4 align-items-end p-b-20 p-t-10">
											<div class="col-md-8">
												<div class="form-group">
													<label for="field_relief_total_served" class="form-label">Total Served</label>
													<input type="text" class="form-control" id="field_relief_total_served" name="field_relief_total_served" value="<?= number_format($content['report_data'][0]['field_relief_total_served']); ?>">
												</div>
											</div>
											<div class="col-md-8" <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) { ?>style="display: none;" <?php } ?>>
												<div class="form-group">
													<label for="field_tab_status" class="form-label">Tab Status *</label>
													<?php //print_r($census_tab_statuses);
													?>
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
												<div class="col-md-8">
													<div class="form-group">
														<label for="field_parent_census" class="form-label">Parent census <span>*</span></label>
														<select class="form-select w-300px" aria-label="field_parent_census" id="field_parent_census" name="field_parent_census">
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
												<!-- <div class="col-md-8">
													<div class="form-group">
														<label for="field_parent_census" class="form-label">Parent census <span>*</span></label>
														<select class="form-select w-300px" aria-label="field_parent_census" id="field_parent_census" name="field_parent_census">
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
											<?php if ($this->session->role_id != 1) { ?><br>
												<div class="col-md-24" style="display:none">
													<div class="form-group">
														<label for="emer_first_question" class="form-label">If yes, when did you receive PPP Funding Cycle 1 funds?</label>
														<input type="date" class="form-control" id="emer_first_question" name="emer_first_question" value="<?= $content['report_data'][0]['emer_first_question']; ?>">
													</div>
												</div>
												<div class="col-md-24" style="display:none">
													<div class="form-group">
														<label for="emer_second_question" class="form-label">Did your affiliate apply for a PPP Funding Cycle 2 loan?</label><br>
														<label class="radio">
															<input type="radio" value="-1" id="emer_second_question-none" name="emer_second_question" <?php if ($content['report_data'][0]['emer_second_question'] == -1) echo 'checked="checked"'; ?>>
															<label class="label p-r-15" for="emer_second_question-none">N/A</label>
														</label><br>
														<label class="radio">
															<input type="radio" value="0" id="emer_second_question-none-0" name="emer_second_question" <?php if ($content['report_data'][0]['emer_second_question'] == 0 && $content['report_data'][0]['emer_second_question'] != '') echo 'checked="checked"'; ?>>
															<label class="label p-r-15" for="emer_second_question-none-0">NO</label>
														</label><br>
														<label class="radio">
															<input type="radio" value="1" id="emer_second_question-none-1" name="emer_second_question" <?php if ($content['report_data'][0]['emer_second_question'] == 1) echo 'checked="checked"'; ?>>
															<label class="label p-r-15" for="emer_second_question-none-1">YES</label>
														</label>
													</div>
												</div>
												<div class="col-md-24" style="display:none">
													<div class="form-group">
														<label for="emer_third_question" class="form-label">If yes, how much funding did you receive in PPP Cycle 2?</label>
														<input type="text" class="form-control" id="emer_third_question" name="emer_third_question" value="<?= $content['report_data'][0]['emer_third_question']; ?>">
													</div>
												</div>
												<div class="col-md-24" style="display:none ;">
													<div class="form-group">
														<label for="emer_fourth_question" class="form-label">What percentage of your programs and services were moved virtual or remote because of COVID-19?</label><br>
														<label class="radio">
															<input type="radio" value="-1" id="emer_fourth_question-none" name="emer_fourth_question" <?php if ($content['report_data'][0]['emer_fourth_question'] == -1) echo 'checked="checked"'; ?>>
															<label class="label p-r-15" for="emer_fourth_question-none">N/A</label>
														</label><br>
														<label class="radio">
															<input type="radio" value="0" id="emer_fourth_question-none-0" name="emer_fourth_question" <?php if ($content['report_data'][0]['emer_fourth_question'] == 0 && $content['report_data'][0]['emer_fourth_question'] != '') echo 'checked="checked"'; ?>>
															<label class="label p-r-15" for="emer_fourth_question-none-0">0%</label>
														</label><br>
														<label class="radio">
															<input type="radio" value="1" id="emer_fourth_question-none-1" name="emer_fourth_question" <?php if ($content['report_data'][0]['emer_fourth_question'] == 1) echo 'checked="checked"'; ?>>
															<label class="label p-r-15" for="emer_fourth_question-none-1">Less than 25%</label>
														</label><br>
														<label class="radio">
															<input type="radio" value="2" id="emer_fourth_question-none-2" name="emer_fourth_question" <?php if ($content['report_data'][0]['emer_fourth_question'] == 2) echo 'checked="checked"'; ?>>
															<label class="label p-r-15" for="emer_fourth_question-none-2">26% to 50%</label>
														</label><br>
														<label class="radio">
															<input type="radio" value="3" id="emer_fourth_question-none-3" name="emer_fourth_question" <?php if ($content['report_data'][0]['emer_fourth_question'] == 3) echo 'checked="checked"'; ?>>
															<label class="label p-r-15" for="emer_fourth_question-none-3">51% to 75%</label>
														</label><br>
														<label class="radio">
															<input type="radio" value="4" id="emer_fourth_question-none-4" name="emer_fourth_question" <?php if ($content['report_data'][0]['emer_fourth_question'] == 4) echo 'checked="checked"'; ?>>
															<label class="label p-r-15" for="emer_fourth_question-none-4">76% to 99%</label>
														</label><br>
														<label class="radio">
															<input type="radio" value="5" id="emer_fourth_question-none-5" name="emer_fourth_question" <?php if ($content['report_data'][0]['emer_fourth_question'] == 5) echo 'checked="checked"'; ?>>
															<label class="label p-r-15" for="emer_fourth_question-none-5">All</label>
														</label>
													</div>
												</div>
												<div class="col-md-24" style="display:none ;">
													<div class="form-group">
														<label for="emer_fifth_question" class="form-label">How many people did you assist with Covid related Services?</label>
														<input type="text" class="form-control" id="emer_fifth_question" name="emer_fifth_question" value="<?= $content['report_data'][0]['emer_fifth_question']; ?>">
													</div>
												</div>
											<?php } ?>
										</div>


										<?php if ($this->session->role_id == 1) { ?><div class="row g-4 align-items-end" style="display:none;">
												<div class="col-md-8">

													<div class="form-group">
														<label for="edit-field-legacy-relief-ed-impact" class="form-label">legacy relief ed impact: </label>
														<input type="text" class="form-control" id="edit-field-legacy-relief-ed-impact" name="field_legacy_relief_ed_impact" value="<?= $content['report_data'][0]['field_legacy_relief_ed_impact']; ?>">
													</div>

													<div class="form-group">
														<label for="edit-field-legacy-relief-employ-impac" class="form-label">legacy relief_employ_impact: </label>
														<input type="text" class="form-control" id="edit-field-legacy-relief-employ-impac" name="field_legacy_relief_employ_impac" value="<?= $content['report_data'][0]['field_legacy_relief_employ_impac']; ?>">
													</div>

												</div>
												<div class="col-md-8">

													<div class="form-group">
														<label for="edit-field-legacy-relief-health-impac" class="form-label">legacy relief_health_impact:</label>
														<input type="text" class="form-control" id="edit-field-legacy-relief-health-impac" name="field_legacy_relief_health_impac" value="<?= $content['report_data'][0]['field_legacy_relief_health_impac']; ?>">
													</div>

													<div class="form-group">
														<label for="edit-field-legacy-relief-civic-impact" class="form-label">legacy relief_civic_impact: </label>
														<input type="text" class="form-control" id="edit-field-legacy-relief-civic-impact" name="field_legacy_relief_civic_impact" value="<?= $content['report_data'][0]['field_legacy_relief_civic_impact']; ?>">
													</div>

												</div>
												<div class="col-md-8" style="display:none;">
													<div class="form-group">
														<label for="edit-field-legacy-relief-justice-impa" class="form-label">legacy relief_justice_impact: </label>
														<input type="text" class="form-control" id="edit-field-legacy-relief-justice-impa" name="field_legacy_relief_justice_impa" value="<?= $content['report_data'][0]['field_legacy_relief_justice_impa']; ?>">
													</div>
												</div>
											</div><?php } ?>
									</div>
									<hr>
									<div class="">
										<div class="form-group t-c formclassbtn">
											<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
											<button class="btn btn-danger m-r-15 btn-rounded" type="button" data-table_name="emergency_relief" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
											<button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
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
													<td colspan="6"><span>ERA Table</span></td>
												</tr>
												<tr>
													<td>Program Type</td>
													<td>Describe the Program(s)</td>
													<td>Funding Source: NUL</td>
													<td>Funding Source: Other</td>
													<td>Funding Source: U Way</td>
													<td>Number Served</td>
												</tr>
												<tr>
													<td>Education</td>
													<td><span> <?= $content['report_data'][0]['field_relief_ed_desc']; ?> </span></td>
													<td><span> <?php $field_relief_ed_fund_nul = $content['report_data'][0]['field_relief_ed_fund_nul'];
																if ($field_relief_ed_fund_nul == 1) {
																	echo "Yes";
																} elseif ($field_relief_ed_fund_nul == 0 && $field_relief_ed_fund_nul != '') {
																	echo "No";
																} else {
																	echo "";
																} ?> </span></td>
													<td><span> <?php $field_relief_ed_fund_uway = $content['report_data'][0]['field_relief_ed_fund_uway'];
																if ($field_relief_ed_fund_uway == 1) {
																	echo "Yes";
																} elseif ($field_relief_ed_fund_uway == 0 && $field_relief_ed_fund_uway != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?php $field_relief_ed_fund_other = $content['report_data'][0]['field_relief_ed_fund_other'];
																if ($field_relief_ed_fund_other == 1) {
																	echo "Yes";
																} elseif ($field_relief_ed_fund_other == 0 && $field_relief_ed_fund_other != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?= number_format($field_relief_ed_served = $content['report_data'][0]['field_relief_ed_served']); ?> </span></td>
												</tr>
												<tr>
													<td>Employment Empowerment</td>
													<td><span> <?= $content['report_data'][0]['field_relief_employ_desc']; ?> </span></td>
													<td><span> <?php $field_relief_employ_fund_nul = $content['report_data'][0]['field_relief_employ_fund_nul'];
																if ($field_relief_employ_fund_nul == 1) {
																	echo "Yes";
																} elseif ($field_relief_employ_fund_nul == 0 && $field_relief_employ_fund_nul != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?php $field_relief_employ_fund_uway = $content['report_data'][0]['field_relief_employ_fund_uway'];
																if ($field_relief_employ_fund_uway == 1) {
																	echo "Yes";
																} elseif ($field_relief_employ_fund_uway == 0 && $field_relief_employ_fund_uway != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?php $field_relief_employ_fund_other = $content['report_data'][0]['field_relief_employ_fund_other'];
																if ($field_relief_employ_fund_other == 1) {
																	echo "Yes";
																} elseif ($field_relief_employ_fund_other == 0 && $field_relief_employ_fund_other != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?= number_format($field_relief_employ_served = $content['report_data'][0]['field_relief_employ_served']); ?> </span></td>
												</tr>
												<tr>
													<td>Health </td>
													<td><span> <?= $content['report_data'][0]['field_relief_health_desc']; ?> </span></td>
													<td><span> <?php $field_relief_health_fund_nul = $content['report_data'][0]['field_relief_health_fund_nul'];
																if ($field_relief_health_fund_nul == 1) {
																	echo "Yes";
																} elseif ($field_relief_health_fund_nul == 0 && $field_relief_health_fund_nul != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?php $field_relief_health_fund_uway = $content['report_data'][0]['field_relief_health_fund_uway'];
																if ($field_relief_health_fund_uway == 1) {
																	echo "Yes";
																} elseif ($field_relief_health_fund_uway == 0 && $field_relief_health_fund_uway != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?php $field_relief_health_fund_other = $content['report_data'][0]['field_relief_health_fund_other'];
																if ($field_relief_health_fund_other == 1) {
																	echo "Yes";
																} elseif ($field_relief_health_fund_other == 0 && $field_relief_health_fund_other != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?= number_format($field_relief_health_served = $content['report_data'][0]['field_relief_health_served']); ?> </span></td>
												</tr>
												<tr>
													<td>Civic Engagement </td>
													<td><span> <?= $content['report_data'][0]['field_relief_civic_desc']; ?> </span></td>
													<td><span> <?php $field_relief_civic_fund_nul = $content['report_data'][0]['field_relief_civic_fund_nul'];
																if ($field_relief_civic_fund_nul == 1) {
																	echo "Yes";
																} elseif ($field_relief_civic_fund_nul == 0 && $field_relief_civic_fund_nul != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?php $field_relief_civic_fund_uway = $content['report_data'][0]['field_relief_civic_fund_uway'];
																if ($field_relief_civic_fund_uway == 1) {
																	echo "Yes";
																} elseif ($field_relief_civic_fund_uway == 0 && $field_relief_civic_fund_uway != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?php $field_relief_civic_fund_other = $content['report_data'][0]['field_relief_civic_fund_other'];
																if ($field_relief_civic_fund_other == 1) {
																	echo "Yes";
																} elseif ($field_relief_civic_fund_other == 0 && $field_relief_civic_fund_other != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?= number_format($field_relief_civic_served = $content['report_data'][0]['field_relief_civic_served']); ?> </span></td>
												</tr>
												<tr>
													<td>Racial Justice </td>
													<td><span> <?= $content['report_data'][0]['field_relief_justice_desc']; ?> </span></td>
													<td><span> <?php $field_relief_justice_fund_nul = $content['report_data'][0]['field_relief_justice_fund_nul'];
																if ($field_relief_justice_fund_nul == 1) {
																	echo "Yes";
																} elseif ($field_relief_justice_fund_nul == 0 && $field_relief_justice_fund_nul != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?php $field_relief_justice_fund_uway = $content['report_data'][0]['field_relief_justice_fund_uway'];
																if ($field_relief_justice_fund_uway == 1) {
																	echo "Yes";
																} elseif ($field_relief_justice_fund_uway == 0 && $field_relief_justice_fund_uway != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?php $field_relief_justice_fund_other = $content['report_data'][0]['field_relief_justice_fund_other'];
																if ($field_relief_justice_fund_other == 1) {
																	echo "Yes";
																} elseif ($field_relief_justice_fund_other == 0 && $field_relief_justice_fund_other != '') {
																	echo "No";
																} else {
																	echo "";
																}; ?> </span></td>
													<td><span> <?= number_format($content['report_data'][0]['field_relief_justice_served']); ?> </span></td>
												</tr>
												<tr>
													<td colspan="6">Are there any other activities the affiliate is engaged in that are not reflected above? If so, please describe below:
														<?= $content['report_data'][0]['field_relief_other_activities']; ?>
													</td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped">
											<tbody>
												<tr>
													<td>Total Served: </td>
													<td><?= number_format($content['report_data'][0]['field_relief_total_served']); ?></td>
												</tr>
												<?php if ($this->session->role_id != 1) { ?>
													<tr style="display:none">
														<td>If yes, when did you receive PPP Funding Cycle 1 funds?:</td>
														<td> <?= $content['report_data'][0]['emer_first_question']; ?></td>
													</tr>
													<tr style="display:none">
														<td>Did your affiliate apply for a PPP Funding Cycle 2 loan? : </td>
														<td><?php if ($content['report_data'][0]['emer_second_question'] == 1) echo 'Yes';
															elseif ($content['report_data'][0]['emer_second_question'] == 0 && $content['report_data'][0]['emer_second_question'] != '') echo 'No';
															else echo 'N/A'; ?>
														</td>
													</tr>
													<tr style="display:none">
														<td>If yes, how much funding did you receive in PPP Cycle 2? : </td>
														<td><?= $content['report_data'][0]['emer_third_question']; ?></td>
													</tr>
													<tr style="display: none;">
														<td>What percentage of your programs and services were moved virtual or remote because of COVID-19?: </td>
														<td><?php if ($content['report_data'][0]['emer_fourth_question'] == -1) echo 'N/A';
															elseif ($content['report_data'][0]['emer_fourth_question'] == 0) echo 'No';
															elseif ($content['report_data'][0]['emer_fourth_question'] == 1) echo 'Less than 25%';
															elseif ($content['report_data'][0]['emer_fourth_question'] == 2) echo 'Less than 26% to 50%';
															elseif ($content['report_data'][0]['emer_fourth_question'] == 3) echo '51% to 75%';
															elseif ($content['report_data'][0]['emer_fourth_question'] == 4) echo '76% to 99%';
															elseif ($content['report_data'][0]['emer_fourth_question'] == 5) echo 'All'; ?>
														</td>
													</tr>
													<tr style="display: none;">
														<td>How many people did you assist with Covid related Services: </td>
														<td><?= $content['report_data'][0]['emer_fifth_question']; ?></td>
													</tr>
												<?php } ?>
												<?php if ($this->session->role_id == 1) { ?>
													<tr>
														<td>Tab Status: </td>
														<td><?= $content['report_data'][0]['status']; ?></td>
													</tr>
													<tr>
														<td>Parent census: </td>
														<td>
															<?= $content['report_data'][0]['organization'] . " " . $content['report_data'][0]['field_year'] . " census"; ?>
														</td>
													</tr>
													<tr style="display:none;">
														<td>legacy relief ed impact: </td>
														<td><?= $content['report_data'][0]['field_legacy_relief_ed_impact']; ?></td>
													</tr>
													<tr style="display:none;">
														<td>legacy relief_employ_impact: </td>
														<td>
															<?= $content['report_data'][0]['field_legacy_relief_employ_impac']; ?>
														</td>
													</tr>
													<tr style="display:none;">
														<td>legacy relief_health_impact: </td>
														<td>
															<?= $content['report_data'][0]['field_legacy_relief_health_impac']; ?>
														</td>
													</tr>
													<tr style="display:none;">
														<td>legacy relief_civic_impact: </td>
														<td>
															<?= $content['report_data'][0]['field_legacy_relief_civic_impact']; ?>
														</td>
													</tr>
													<tr style="display:none;">
														<td>legacy relief_justice_impact: </td>
														<td>
															<?= $content['report_data'][0]['field_legacy_relief_justice_impa']; ?>
														</td>
													</tr>
													<!-- <tr>
													<td colspan="6">Did your affiliate apply for a PPP Funding Cycle 1 loan? :
														</?= $content['report_data'][0]['field_relief_other_activities'] ;?>
													</td>
												</tr> -->
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