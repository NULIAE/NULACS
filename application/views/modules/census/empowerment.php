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
						<div class="h5 Subtittle text-primary"><b>Empowerment</b></div>
						<?php if ($this->session->role_id != 1) {
							if ($statuses['empowerment']['status'] != "Submitted" && $statuses['empowerment']['status'] != "Reviewed Complete") { ?>
								<nav class="innerTab">
									<div class="nav nav-pills" id="nav-tab" role="tablist">
										<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
									</div>
									<?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="empowerment" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
									<?php } ?>
									<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="empowerment" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
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
										<button type="button" id="empowerment" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="empowerment" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
									</div>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="empowerment" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="empowerment" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
							</nav>
						<?php }

						if (isset($_GET['msg'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Empowerment data has been updated.</div>
						<?php } ?>
						<?php if (isset($_GET['tab_message'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
						<?php } ?>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade " id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
								<form id="edit-empowerment" method="post" action="<?php echo base_url('module/forms_update/empowerment/update'); ?>">
									<div class="full_form">
									<div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
									<?php if ($this->session->role_id == 1) { ?>
											<div class="row align-items-end">
												<div class="col-md-12">
													<div class="form-group">
														<label for="edit-title" class="form-label">Title <span>*</span></label>
														<input type="text" class="form-control" id="edit-title" value="Empowerment" required readonly>
													</div>
												</div>
											</div><?php } ?>
										<div class="col-24">

											<div class="row g-4 align-items-end p-t-10 p-b-20 our-affiliate-empowerment-programs">
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-empower-economic" class="form-label">Economic Empowerment </label>
														<div class="d-flex justify-content-start align-items-center">
															<input type="text" class="form-control " id="edit-field-empower-economic" name="field_empower_economic" value="<?= number_format($content['report_data'][0]['field_empower_economic'],2); ?>"> &nbsp; <span>%</span>
														</div>
													</div>

													<div class="form-group">
														<label for="edit-field-empower-health" class="form-label">Health </label>
														<div class="d-flex justify-content-start align-items-center">
															<input type="text" class="form-control" id="edit-field-empower-health" name="field_empower_health" value="<?= number_format($content['report_data'][0]['field_empower_health'],2); ?>"> &nbsp; <span>%</span>
														</div>
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-empower-education" class="form-label">Education</label>
														<div class="d-flex justify-content-start align-items-center">
															<input type="text" class="form-control" id="edit-field-empower-education" name="field_empower_education" value="<?= number_format($content['report_data'][0]['field_empower_education'],2); ?>"> &nbsp; <span>%</span>
														</div>
													</div>
													<div class="form-group">
														<label for="edit-field-empower-civic-engagement" class="form-label">Civic Engagement</label>
														<div class="d-flex justify-content-start align-items-center">
															<input type="text" class="form-control" id="edit-field-empower-civic-engagement" name="field_empower_civic_engagement" value="<?= number_format($content['report_data'][0]['field_empower_civic_engagement'],2); ?>"> &nbsp; <span>%</span>
														</div>
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="edit-field-empower-civil-rights" class="form-label">Civil Rights</label>
														<div class="d-flex justify-content-start align-items-center">
															<input type="text" class="form-control" id="edit-field-empower-civil-rights" name="field_empower_civil_rights" value="<?= number_format($content['report_data'][0]['field_empower_civil_rights'],2); ?>"> &nbsp; <span>%</span>
														</div>
													</div>

													<div class="form-group">
														<label for="edit-field-empower-other" class="form-label">Other</label>
														<div class="d-flex justify-content-start align-items-center">
															<input type="text" class="form-control " id="edit-field-empower-other" name="field_empower_other" value="<?= number_format($content['report_data'][0]['field_empower_other'],2); ?>"> &nbsp; <span>%</span>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-empower-other-description" class="form-label">Other description</label>
													<input type="text" class="form-control" id="edit-field-empower-other-description" name="field_empower_other_description" value="<?= $content['report_data'][0]['field_empower_other_description']; ?>">
												</div>
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
												<?php } ?>
											</div>
										</div>
										<hr>
										<div class="">
											<div class="form-group t-c formclassbtn">
												<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
												<button class="btn btn-danger m-r-15 btn-rounded" type="button" data-status_id="<?= $statuses['empowerment']['status'];?>" data-table_name="empowerment" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
												<button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
											</div>
										</div>
									</div>
									<input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" id="hid_parent_census">
									<input type="hidden" value="<?= $content['report_data'][0]['pk_id']; ?>" name="pk_id" id="pk_id">
									<!--full form -->
								</form>
							</div>
							<!-- tab-pane fade-->
							<div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
								<!-- <h4 class="title-head">Programs</h4>
                          <div class="tabilCard inner NulCard">
                           <div class="table-responsive">
                              <table class="table table-striped">
                                 <tbody>
                                    <tr>
                                       <td><b> Program Title </b>   </td>
                                       <td><b>Number of People Served Annually </b> </td>
                                       <td><b>Total Program Budget Funded</b>  </td>
                                    </tr>
                                    <tr>
                                       <td>ACA NAVIGATOR PROGRAM </td>
                                       <td><span>1,200 </span> </td>
                                       <td><span>$400,000.00</span> </td>

                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                         </div>
                        <br>
                        <a class="btn btn-accent btn-rounded m-r-15" >+ Add A Program</a>
                        <br><br> -->
								<div class="tabilCard inner  NulCard">
									<div class="contact-table table-responsive">
										<table class="table table-striped">
											<tbody>
												<tr>
													<td>Economic Empowerment: </td>
													<td><span><?= isset($content['report_data'][0]['field_empower_economic']) ? number_format($content['report_data'][0]['field_empower_economic'],2) . '%' : ''; ?></span></td>
												</tr>
												<tr>
													<td>Education: </td>
													<td><span><?= isset($content['report_data'][0]['field_empower_education']) ? number_format($content['report_data'][0]['field_empower_education'],2) . '%' : ''; ?></span></td>
												</tr>
												<tr>
													<td>Civil Rights: </td>
													<td><span><?= isset($content['report_data'][0]['field_empower_civil_rights']) ? number_format($content['report_data'][0]['field_empower_civil_rights'],2) . '%' : ''; ?></span></td>
												</tr>
												<tr>
													<td>Health: </td>
													<td><span><?= isset($content['report_data'][0]['field_empower_health']) ? number_format($content['report_data'][0]['field_empower_health'],2) . '%' : ''; ?></span></td>
												</tr>
												<tr>
													<td>Civic Engagement: </td>
													<td><span><?= isset($content['report_data'][0]['field_empower_civic_engagement']) ? number_format($content['report_data'][0]['field_empower_civic_engagement'],2) . '%' : ''; ?></span></td>
												</tr>
												<tr>
													<td>Other: </td>
													<td><span><?= isset($content['report_data'][0]['field_empower_other']) ? number_format($content['report_data'][0]['field_empower_other'],2) . '%' : ''; ?></span></td>
												</tr>
												<tr>
													<td>Other description: </td>
													<td><span><?= $content['report_data'][0]['field_empower_other_description']; ?></span></td>
												</tr>
												<?php if ($this->session->role_id == 1) { ?>
													<tr>
														<td>Tab Status: </td>
														<td><span><?= $content['report_data'][0]['status']; ?></span></td>
													</tr>
													<tr>
														<td>Parent census: </td>
														<td><span><?= $content['report_data'][0]['organization'] . " " . $content['report_data'][0]['field_year'] . " census"; ?></span></td>
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
							<!-- tab-pane -->
						</div>
						<!--tab-content-->
					</div>
					<!--card formCard -->
				</div>
				<!-- col-md-18-->
			</div>
			<!--row -->
		</div>
		<!--container-->
	</div>
	<!-- mainWrap -->
</main>