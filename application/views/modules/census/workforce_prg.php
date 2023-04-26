<main>
	<div class="mainWrap">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="sideBar">
						<?= $left_tabs ?>
					</div>
				</div>
				<div class="col-md-18">
					<div class="card formCard">
						<div class="h3 tittleS ">
							<?= $tab_title ?>
						</div>
						<div class="h5 Subtittle text-primary"><b>Workforce Development Program Details</b></div>
						<?php if ($this->session->role_id != 1) {
							if ($statuses['workforce']['status'] != "Submitted" && $statuses['workforce']['status'] != "Reviewed Complete") { ?>
								<nav class="innerTab">
									<div class="nav nav-pills" id="nav-tab" role="tablist">
										<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
									</div>
                           			<?php if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 && $content['report_data'][0]['field_tab_status']  == 120) {?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="workforce_develop_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
								    <?php }else{?>
									<?php if ((count($programs) != 0) && $content['report_data'][0]['field_tab_status']  == 120) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="workforce_develop_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
									<?php } } ?>
									<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="workforce_develop_program" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
										</div>
									<?php } ?>
								</nav>
							<?php }
						} else if ($this->session->role_id == 1) { ?>
							<nav class="innerTab">
								<div class="nav nav-pills" id="nav-tab" role="tablist">
									<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
								</div>
                           		<?php if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 && $content['report_data'][0]['field_tab_status']  == 120) {?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="workforce_develop_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
									</div>
								<?php }else{?>
								<?php if ((count($programs) != 0) && $content['report_data'][0]['field_tab_status']  == 120) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="workforce_develop_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
									</div>
								<?php } } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="workforce_develop_program" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
									</div>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="workforce_develop_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="workforce_develop_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
							</nav>
						<?php }
						if (isset($_GET['msg'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Workforce Development Program data has been updated.</div>
						<?php } ?>
						<?php if (isset($_GET['tab_message'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
						<?php } ?>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
								<form id="edit-workforce" method="post" action="<?php echo base_url('module/forms_update/workforce_prg/update'); ?>">
									<div class="full_form">
									<div class="form-group t-c formclassbtn" style="text-align: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div>
										<div class="row g-4 align-items-end  ">
											<div class="col-md-12" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
												<div class="form-group">
													<label for="edit-title" class="form-label">Title <span>*</span></label>
													<input type="text" class="form-control" id="edit-title" value="Workforce Development Program Details" required readonly>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-do-you-offer-programs-of-t" class="form-label">Our affiliate offers programs of this type<span>*</span> </label>
													<br>
													<label class="radio">
														<input type="radio" id="edit-field-do-you-offer-programs-of-t-0" name="field_do_you_offer_programs_of_t" onclick="showDivifYes()" value="0" class="hide_fields" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0) echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-do-you-offer-programs-of-t-0"> No </label>
													</label>
													<label class="radio">
														<input type="radio" id="edit-field-do-you-offer-programs-of-t-1" name="field_do_you_offer_programs_of_t" onclick="showDivifYes()" value="1" class="hide_fields" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1) echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-do-you-offer-programs-of-t-1"> Yes </label>
													</label>
												</div>
											</div>

											<!-- <div class="col-24" id="hide_div_if_no"> -->
											<div class="col-24" id="hide_div_if_no">



												<div class="clearfix p-b-15" <?php if (($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 || count($programs) != 0)) {?> style="display:none"<?php }?>>
													<div class="messages error"> <i class="i i-warning"></i>&nbsp; &nbsp;You will require to enter information about at least one program to complete this tab on the next screen </div>
												</div>
												<div class="h5 Subtittle">Person Who Oversees Workforce Programs</div>
												<div class="row g-4 align-items-end  p-b-20">
													<div class="col-md-8">
														<div class="form-group">
															<label for="edit-field-work-overseer-name" class="form-label">Name </label>
															<input type="text" class="form-control" id="edit-field-work-overseer-name" name="field_work_overseer_name" placeholder="" value="<?= $content['report_data'][0]['field_work_overseer_name']; ?>">
														</div>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<label for="edit-field-work-overseer-email" class="form-label">Email </label>
															<input type="email" class="form-control" id="edit-field-work-overseer-email" name="field_work_overseer_email" placeholder="" value="<?= $content['report_data'][0]['field_work_overseer_email']; ?>">
														</div>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<label for="edit-field-program-work-total" class="form-label">Total Participants in Workforce Programs </label>
															<input type="text" class="form-control" id="edit-field-program-work-total" name="field_program_work_total" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_total']); ?>">
														</div>
													</div>
												</div>

												<div class="h5 Subtittle">Program Impacts</div>

												<div class="row g-4 align-items-end p-t-10  p-b-20">
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-counseling" class="form-label">Number of clients who received workforce development/job placement counseling from your affiliate last year? </label>
															<input type="text" class="form-control" id="edit-field-program-work-counseling" name="field_program_work_counseling" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_counseling']); ?>">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-participants" class="form-label">Number of participants in employment/workforce development programs (exclude welfare recipients)? </label>
															<input type="text" class="form-control" id="edit-field-program-work-participants" name="field_program_work_participants" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_participants']); ?>">
														</div>
													</div>
												</div>
												<div class="row g-4 align-items-end p-t-10  p-b-20">
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-placed" class="form-label">Number of participants placed in jobs</label>
															<input type="text" class="form-control" id="edit-field-program-work-placed" name="field_program_work_placed" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_placed']); ?>">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-retained" class="form-label">Number of placed participants who retained jobs for 90 days</label>
															<input type="text" class="form-control" id="edit-field-program-work-retained" name="field_program_work_retained" placeholder="" value="<?= $content['report_data'][0]['field_program_work_retained']; ?>">
														</div>
													</div>
												</div>
												<label for="edit-field-participants" class="form-label">Does your affiliate place participants into certified apprenticeships? : </label><br>
												<div class="row g-4 align-items-end p-b-20 ">
													<div class="col-md-12">
														<?php $participant_data = $content['all_participants']; ?>
														<?php
														$wf_parti = [];
														foreach ($participant_data as $key => $val) {
															$wf_parti[] = $val['field_participants_place'];
														}
														$participants_place = array("Construction", "Clean Energy", "Cyber-Security", "Automation", "Other");
														$i = 0;
														foreach ($participants_place as $key => $method) {
															if (in_array($method, $wf_parti)) {
																$checked = "checked";
															} else {
																$checked = "";
															}
														?>
															<?php if ($key % 2 == 0) { ?>
																<div class="form-group ">
																	<label class="checkbox <?php echo $checked; ?>">
																		<input type="checkbox" id="edit-field-participants-place-<?php echo $method; ?>" name="field_participants_place[]" value="<?php echo $method; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																		<label class="label" for="edit-field-participants-place-<?php echo $method; ?>"><?php echo $method; ?></label>
																	</label>
																</div>
															<?php } ?>
														<?php $i++;
														} ?>
													</div>
													<div class="col-md-12">
														<?php $participant_data = $content['all_participants']; ?>
														<?php
														$wf_parti = [];
														foreach ($participant_data as $key => $val) {
															$wf_parti[] = $val['field_participants_place'];
														}
														$participants_place = array("Construction", "Clean Energy", "Cyber-Security", "Automation", "Other");
														$i = 0;
														foreach ($participants_place as $key => $method) {
															if (in_array($method, $wf_parti)) {
																$checked = "checked";
															} else {
																$checked = "";
															}
														?>
															<?php if ($key % 2 == 1) { ?>
																<div class="form-group ">
																	<label class="checkbox <?php echo $checked; ?>">
																		<input type="checkbox" id="edit-field-participants-place-<?php echo $method; ?>" name="field_participants_place[]" value="<?php echo $method; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																		<label class="label" for="edit-field-participants-place-<?php echo $method; ?>"><?php echo $method; ?></label>
																	</label>
																</div>
															<?php } ?>
														<?php $i++;
														} ?>
													</div>
												</div>
												<label for="edit-field-participants" class="form-label">What are your industries of focus in job/career placement? : </label><br>
												<div class="row g-4 align-items-end p-b-20 ">
													<div class="col-md-12">
														<?php $industries_data = $content['all_industries']; ?>
														<?php
														$wf_ind = [];
														foreach ($industries_data as $key => $val) {
															$wf_ind[] = $val['field_industries_work'];
														}
														$industries_focus = array("Technology", "Skilled Trades", "Hospitality", "Construction", "Energy (traditional or clean)", "Manufacturing", "General Business", "Retail", "Other");
														$i = 0;
														foreach ($industries_focus as $key => $method) {
															if (in_array($method, $wf_ind)) {
																$checked = "checked";
															} else {
																$checked = "";
															}
														?>
															<?php if ($key % 2 == 0) { ?>
																<div class="form-group ">
																	<label class="checkbox <?php echo $checked; ?>">
																		<input type="checkbox" id="edit-field-industries-focus-<?php echo $method; ?>" name="field_industries_work[]" value="<?php echo $method; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																		<label class="label" for="edit-field-industries-focus-<?php echo $method; ?>"><?php echo $method; ?></label>
																	</label>
																</div>
															<?php } ?>
														<?php $i++;
														} ?>
													</div>
													<div class="col-md-12">
														<?php $industries_data = $content['all_industries']; ?>
														<?php
														$wf_ind = [];
														foreach ($industries_data as $key => $val) {
															$wf_ind[] = $val['field_industries_work'];
														}
														$industries_focus = array("Technology", "Skilled Trades", "Hospitality", "Construction", "Energy (traditional or clean)", "Manufacturing", "General Business", "Retail", "Other");
														$i = 0;
														foreach ($industries_focus as $key => $method) {
															if (in_array($method, $wf_ind)) {
																$checked = "checked";
															} else {
																$checked = "";
															}
														?>
															<?php if ($key % 2 == 1) { ?>
																<div class="form-group ">
																	<label class="checkbox <?php echo $checked; ?>">
																		<input type="checkbox" id="edit-field-industries-focus-<?php echo $method; ?>" name="field_industries_work[]" value="<?php echo $method; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																		<label class="label" for="edit-field-industries-focus-<?php echo $method; ?>"><?php echo $method; ?></label>
																	</label>
																</div>
															<?php } ?>
														<?php $i++;
														} ?>
													</div>
												</div>
												<div class="h5 Subtittle">Income of participants placed in jobs</div>
												<div class="row g-4 align-items-end p-t-10 p-b-20">
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-salary" class="form-label">Annual salary (if applicable)</label>
															<div class="row align-items-center">
																<div class="d-flex justify-content-center align-items-center">
																	<span>$</span> &nbsp;<input type="text" class="form-control" id="edit-field-program-work-salary" name="field_program_work_salary" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_salary'], 2); ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-hourly" class="form-label">or Hourly wage rate</label>
															<div class="row align-items-center">
																<div class="d-flex justify-content-center align-items-center">
																	<span>$</span> &nbsp; <input type="text" class="form-control " id="edit-field-program-work-hourly" name="field_program_work_hourly" value="<?= number_format($content['report_data'][0]['field_program_work_hourly'], 2); ?>">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row g-4 align-items-end p-t-10 p-b-20">
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-welfare" class="form-label">Number of welfare participants in federal/state funded programs: </label>
															<input type="text" class="form-control" id="edit-field-program-work-welfare" name="field_program_work_welfare" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_welfare']); ?>">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-welfare-place" class="form-label">Number of welfare program participants placed in jobs</label>
															<input type="text" class="form-control" id="edit-field-program-work-welfare-place" name="field_program_work_welfare_place" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_welfare_place']); ?>">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-financial-assist" class="form-label">What is the total amount of financial assistance provided to workforce participants: </label>
															<div class="row align-items-center">
																<div class="d-flex justify-content-center align-items-center">
																	<span>$</span> &nbsp;<input type="text" class="form-control" id="edit-field-financial-assist" name="field_program_financial_assist" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_financial_assist'],2); ?>">
																</div>
															</div>

														</div>
													</div>
												</div>
												<div class="row g-4 align-items-end p-t-10 p-b-20 ">
													<div class="col-md-12">
														<label for="edit-field-what-kinds-of-supports-and" class="form-label">Do you provide financial incentives or subsidize participant wages? </label><br>
														<?php $incentives_data = $content['all_incentives']; ?>
														<?php
														$wf_inc = [];
														foreach ($incentives_data as $key => $val) {
															$wf_inc[] = $val['field_financial_incentives'];
														}
														$financial_incentives = array("Wage subsidy", "learn and earn incentives", "financial supports to make work accessible (transportation assistance, uniform/equipment, fees/miscellaneous costs)");
														$i = 0;
														foreach ($financial_incentives as $key => $method) {
															if (in_array($method, $wf_inc)) {
																$checked = "checked";
															} else {
																$checked = "";
															}
														?>
															<div class="form-group ">
																<label class="checkbox <?php echo $checked; ?>">
																	<input type="checkbox" id="edit-field-financial-incentives-<?php echo $method; ?>" name="field_financial_incentives[]" value="<?php echo $method; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																	<label class="label" for="edit-field-financial-incentives-<?php echo $method; ?>"><?php echo $method; ?></label>
																</label>
															</div>
														<?php } ?>
														<?php $i++; ?>
													</div>
												</div>
												<div class="h5 Subtittle">Income of welfare recipient placed in jobs</div>
												<div class="row g-4 align-items-end p-t-10 p-b-20 ">
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-welfare-salar" class="form-label">Annual welfare salary (if applicable)</label>
															<div class="row align-items-center">
																<div class="d-flex justify-content-center align-items-center">
																	<span>$</span> &nbsp; <input type="text" class="form-control" id="edit-field-program-work-welfare-salar" name="field_program_work_welfare_salar" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_welfare_salar'], 2); ?>">
																</div>
															</div>
														</div>

													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-welfare-hour" class="form-label">or Hourly wage rate (welfare)</label>
															<div class="row align-items-center">
																<div class="d-flex justify-content-center align-items-center">
																	<span>$</span> &nbsp; <input type="text" class="form-control " id="edit-field-program-work-welfare-hour" name="field_program_work_welfare_hour" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_welfare_hour'], 2); ?>">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row g-4 align-items-end p-t-10 p-b-20 ">
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-total-partici" class="form-label">Total for number of participants in employment/workforce development programs and number of welfare participants in federal/stat </label>
															<input type="text" class="form-control" id="edit-field-program-work-total-partici" name="field_program_work_total_partici" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_total_partici']); ?>">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-credentials" class="form-label">Number of participants obtaining industry-recognized credentials</label>
															<input type="text" class="form-control" id="edit-field-program-work-credentials" name="field_program_work_credentials" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_work_credentials']); ?>">
														</div>
													</div>
												</div>


												<div class="h5 Subtittle">WIA/WIOA Services</div>
												<div class="row g-4 align-items-end p-t-10">

													<div class="col-md-8">
														<div class="form-group">
															<label for="edit-field-program-work-wia" class="form-label">Is affiliate engaged in WIA/WIOA services delivery?</label>
															<br>
															<label class="radio">
																<input type="radio" id="edit-field-program-work-wia-none" name="field_program_work_wia" value="2" <?php if ($content['report_data'][0]['field_program_work_wia_provider'] == 2) echo 'checked="checked"'; ?>>
																<label class="label p-r-10" for="edit-field-program-work-wia-none"> N/A </label>
															</label>

															<label class="radio">
																<input type="radio" id="edit-field-program-work-wia-0" name="field_program_work_wia" value="0" <?php if ($content['report_data'][0]['field_program_work_wia'] == 0 && $content['report_data'][0]['field_program_work_wia'] != '') echo 'checked="checked"'; ?>>
																<label class="label p-r-10" for="edit-field-program-work-wia-0"> No </label>
															</label>

															<label class="radio">
																<input type="radio" id="edit-field-program-work-wia-1" name="field_program_work_wia" value="1" <?php if ($content['report_data'][0]['field_program_work_wia'] == 1) echo 'checked="checked"'; ?>>
																<label class="label p-r-10" for="edit-field-program-work-wia-1"> Yes </label>
															</label>
														</div>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<label for="edit-field-program-work-wia-deliverer" class="form-label">Contracted WIA/WIOA service deliverer </label>
															<br>
															<label class="radio">
																<input type="radio" id="edit-field-program-work-wia-deliverer-none" name="field_program_work_wia_deliverer" value="2" <?php if ($content['report_data'][0]['field_program_work_wia_provider'] == 2) echo 'checked="checked"'; ?>>
																<label class="label p-r-10" for="edit-field-program-work-wia-deliverer-none">N/A</label>
															</label>

															<label class="radio">
																<input type="radio" id="edit-field-program-work-wia-deliverer-0" name="field_program_work_wia_deliverer" value="0" <?php if ($content['report_data'][0]['field_program_work_wia_deliverer'] == 0 && $content['report_data'][0]['field_program_work_wia_deliverer'] != '') echo 'checked="checked"'; ?>>
																<label class="label p-r-10" for="edit-field-program-work-wia-deliverer-0">No</label>
															</label>

															<label class="radio">
																<input type="radio" id="edit-field-program-work-wia-deliverer-1" name="field_program_work_wia_deliverer" value="1" <?php if ($content['report_data'][0]['field_program_work_wia_deliverer'] == 1) echo 'checked="checked"'; ?>>
																<label class="label p-r-10" for="edit-field-program-work-wia-deliverer-1">Yes</label>
															</label>
														</div>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<label for="edit-field-program-work-wia-provider" class="form-label">Eiligible WIA/WIOA training provider</label>
															<br>
															<label class="radio">
																<input type="radio" id="edit-field-program-work-wia-provider-none" name="field_program_work_wia_provider" value="2" <?php if ($content['report_data'][0]['field_program_work_wia_provider'] == 2) echo 'checked="checked"'; ?>>
																<label class="label p-r-10" for="edit-field-program-work-wia-provider-none">N/A</label>
															</label>

															<label class="radio">
																<input type="radio" id="edit-field-program-work-wia-provider-0" name="field_program_work_wia_provider" value="0" <?php if ($content['report_data'][0]['field_program_work_wia_provider'] == 0 && $content['report_data'][0]['field_program_work_wia_provider'] != '') echo 'checked="checked"'; ?>>
																<label class="label p-r-10" for="edit-field-program-work-wia-provider-0">No</label>
															</label>

															<label class="radio">
																<input type="radio" id="edit-field-program-work-wia-provider-1" name="field_program_work_wia_provider" value="1" <?php if ($content['report_data'][0]['field_program_work_wia_provider'] == 1) echo 'checked="checked"'; ?>>
																<label class="label p-r-10" for="edit-field-program-work-wia-provider-1">Yes</label>
															</label>
														</div>
													</div>
												</div>

											</div>


											<div class="row g-4 align-items-end">
												<?php if ($this->session->role_id == 1) { ?>
													<div class="col-md-12">
														<div class="form-group">
															<label for="parent" class="form-label">Parent census <span>*</span></label>
															<select class="form-select" aria-label="Affiliate" id="field_parent_census" name="field_parent_census">
																<option value="_none">- None -</option>
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
																<option value="_none">- None -</option>
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
											</div>
											<div <?php if ($this->session->role_id == 2) { ?>style="display: none;" <?php } ?>>
												<div class="row g-4 align-items-end" id="hide_div_div2">
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-sub-housing" class="form-label">Housing </label>
															<input type="text" class="form-control" id="edit-field-program-work-sub-housing" name="field_program_work_sub_housing" value="<?= number_format($content['report_data'][0]['field_program_work_sub_housing']); ?>" placeholder="">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-program-work-sub-health" class="form-label">Health Service </label>
															<input type="text" class="form-control" id="edit-field-program-work-sub-health" name="field_program_work_sub_health" value="<?= number_format($content['report_data'][0]['field_program_work_sub_health']); ?>" placeholder="">
														</div>
													</div>
													<!-- <div class="col-md-6">
														<div class="form-group">
															<label for="edit-field-program-work-sub-business" class="form-label">Entrepreneurial/Business Development </label>
															<input type="text" class="form-control w-200px" id="edit-field-program-work-sub-business" name="field_program_work_sub_business" value="<?= number_format($content['report_data'][0]['field_program_work_sub_business']); ?>" placeholder="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="edit-field-program-work-sub-workforce" class="form-label">Workforce Development </label>
															<input type="text" class="form-control w-200px" id="edit-field-program-work-sub-workforce" name="field_program_work_sub_workforce" value="<?= number_format($content['report_data'][0]['field_program_work_sub_workforce']); ?>" placeholder="">
														</div>
													</div> -->


													<!-- <div class="col-md-12">
														<label for="edit-field-program-work-subsidiary" class="form-label">Does your affiliate have a subsidary?</label>
														<br>
														<label class="radio">
															<input type="radio" id="edit-field-program-work-subsidiary-none" name="field_program_work_subsidiary" value="2" <?php if ($content['report_data'][0]['field_program_work_subsidiary'] == 2) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-subsidiary-none"> N/A </label>
														</label>
														<label class="radio">
															<input type="radio" id="edit-field-program-work-subsidiary-0" name="field_program_work_subsidiary" value="0" <?php if ($content['report_data'][0]['field_program_work_subsidiary'] == 0) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-subsidiary-0"> No </label>
														</label>

														<label class="radio">
															<input type="radio" id="edit-field-program-work-subsidiary-1" name="field_program_work_subsidiary" value="1" <?php if ($content['report_data'][0]['field_program_work_subsidiary'] == 1) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-subsidiary-1"> Yes </label>
														</label>
													</div>
													<div class="col-md-12">
														<label for="edit-field-program-work-sub-profit" class="form-label">Is the subsidary for profit?</label>
														<br>
														<label class="radio">
															<input type="radio" id="edit-field-program-work-sub-profit-none" name="field_program_work_sub_profit" value="2" <?php if ($content['report_data'][0]['field_program_work_sub_profit'] == 2) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-sub-profit-none"> N/A </label>
														</label>
														<label class="radio">
															<input type="radio" id="edit-field-program-work-sub-profit-0" name="field_program_work_sub_profit" value="0" <?php if ($content['report_data'][0]['field_program_work_sub_profit'] == 0) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-sub-profit-0"> No </label>
														</label>

														<label class="radio">
															<input type="radio" id="edit-field-program-work-sub-profit-1" name="field_program_work_sub_profit" value="1" <?php if ($content['report_data'][0]['field_program_work_sub_profit'] == 1) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-sub-profit-1"> Yes </label>
														</label>
													</div> -->

													<!-- <div class="col-md-12">
														<label for="edit-field-program-work-sub-ownership" class="form-label">Is the affiliate wholly owned/owned by a subsidary</label>
														<br>
														<label class="radio">
															<input type="radio" id="edit-field-program-work-sub-ownership-none" name="field_program_work_sub_ownership" value="2" <?php if ($content['report_data'][0]['field_program_work_sub_ownership'] == 2) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-sub-ownership-none">N/A</label>
														</label>
														<label class="radio">
															<input type="radio" id="edit-field-program-work-sub-ownership-0" name="field_program_work_sub_ownership" value="0" <?php if ($content['report_data'][0]['field_program_work_sub_ownership'] == 0) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-sub-ownership-0">Owned by subsidary</label>
														</label>

														<label class="radio">
															<input type="radio" id="edit-field-program-work-sub-ownership-1" name="field_program_work_sub_ownership" value="1" <?php if ($content['report_data'][0]['field_program_work_sub_ownership'] == 1) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-sub-ownership-1">Wholly owned</label>
														</label>
													</div>

													<div class="col-md-12">

														<label for="edit-field-program-work-aff-profit" class="form-label">Is the affiliate for profit or not for profit</label>
														<br>
														<label class="radio">
															<input type="radio" id="edit-field-program-work-aff-profit-none" name="field_program_work_aff_profit" value="2" <?php if ($content['report_data'][0]['field_program_work_aff_profit'] == 2) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-aff-profit-none"> N/A </label>
														</label>

														<label class="radio">
															<input type="radio" id="edit-field-program-work-aff-profit-0" name="field_program_work_aff_profit" value="0" <?php if ($content['report_data'][0]['field_program_work_aff_profit'] == 0) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-aff-profit-0"> Not for Profit </label>
														</label>

														<label class="radio">
															<input type="radio" id="edit-field-program-work-aff-profit-1" name="field_program_work_aff_profit" value="1" <?php if ($content['report_data'][0]['field_program_work_aff_profit'] == 1) echo 'checked="checked"'; ?>>
															<label class="label p-r-10" for="edit-field-program-work-aff-profit-1"> For Profit </label>
														</label>


													</div> -->


													<!-- <div class="form-group p-t-20">
														<label for="edit-field-legacy-work-sub-budget" class="form-label">Subsidary's annual budget last year</label>
														<div class="row align-items-center">
															<div class="col-1"><span>$</span></div>
															<div class="col-11 p-l-0">
																<input type="text" class="form-control" id="edit-field-legacy-work-sub-budget" name="field_legacy_work_sub_budget" placeholder="" value="<?= number_format($content['report_data'][0]['field_legacy_work_sub_budget'], 2); ?>">
															</div>
														</div>
													</div> -->
												</div>
											</div>








										</div>
										<hr>

										<div class="">
											<div class="form-group t-c formclassbtn">
												<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
												<button class="btn btn-danger m-r-15 btn-rounded" type="button" data-status_id="<?= $statuses['workforce']['status'];?>" data-table_name="workforce_develop_program" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
												<button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
											</div>
										</div>
									</div>
									<input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" id="hid_parent_census">
									<input type="hidden" value="<?= $content['report_data'][0]['pk_id']; ?>" name="pk_id" id="pk_id">
								</form>
							</div>
							<div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
								<div <?php if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0) { ?>style="display: none;" <?php } ?>>
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
												if ($statuses['workforce']['status'] != "Submitted" && $statuses['workforce']['status'] != "Reviewed Complete") { ?> <a class="btn btn-primary btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/workforce">+ Add A Program</a> <?php }
																																																																																					} else if ($this->session->role_id == 1) { ?> <a class="btn btn-accent btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/workforce">+ Add A Program</a> <?php } ?>
									<br>
									<br>
								</div>
								<div class="tabilCard inner NulCard">
									<div class="contact-table table-responsive">
										<table class="table table-striped">
											<tbody>
												<tr>
													<td> Our Affiliate offers programs of this type: </td>
													<td><span><?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1 && $content['report_data'][0]['field_do_you_offer_programs_of_t'] != '') {
																	echo "Yes";
																} else {
																	echo "No";
																}; ?></span></td>
												</tr>
												<tr>
													<td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">Person Who Oversees Workforce Programs </b></td>
												</tr>
												<tr>
													<td>Name: </td>
													<td> <span><?= $content['report_data'][0]['field_work_overseer_name']; ?></span></td>
												</tr>
												<tr>
													<td>Email: </td>
													<td><span><?= $content['report_data'][0]['field_work_overseer_email']; ?></span> </td>
												</tr>
												<tr>
													<td>Total Participants in Workforce Programs:</td>
													<td><span><?= number_format($content['report_data'][0]['field_program_work_total']); ?></span></td>
												</tr>
												<tr>
													<td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">Program Impacts </b></td>
												</tr>
												<tr>
													<td> Number of clients who received workforce development/job placement counseling from your affiliate last year?: </td>
													<td><span><?= number_format($content['report_data'][0]['field_program_work_counseling']); ?></span></td>
												</tr>
												<tr>
													<td>Number of participants in employment/workforce development programs (exclude welfare recipients)?: </td>
													<td><span><?= number_format($content['report_data'][0]['field_program_work_participants']); ?></span></td>
												</tr>
												<tr>
													<td>Number of participants placed in jobs: </td>
													<td><span><?= number_format($content['report_data'][0]['field_program_work_placed']); ?></span></td>
												</tr>
												<tr>
													<td>Number of placed participants who retained jobs for 90 days: </td>
													<td><span><?= $content['report_data'][0]['field_program_work_retained']; ?></span></td>
												</tr>
												<tr>
													<td>Does your affiliate place participants into certified apprenticeships? </td>
													<td><span>
															<?php $participant_data = $content['all_participants']; ?>
															<?php foreach ($participant_data as $key => $val) {
																echo $val['field_participants_place'] . "<br>";
															} ?>
														</span></td>
												</tr>
												<tr>
													<td>What are your industries of focus in job/career placement?</td>
													<td><span>
															<?php $industries_data = $content['all_industries']; ?>
															<?php foreach ($industries_data as $key => $val) {
																echo $val['field_industries_work'] . "<br>";
															} ?>
														</span></td>
												</tr>
												<tr>
													<td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">Income of participants placed in jobs</b></td>
												</tr>
												<tr>
													<td> Annual salary (if applicable): </td>
													<td> <span><?php if (!empty($content['report_data'][0]['field_program_work_salary'])) { ?>$<?= number_format($content['report_data'][0]['field_program_work_salary'], 2);
																																			} ?></span></td>
												</tr>
												<tr>
													<td>or Hourly wage rate: </td>
													<td> <span><?php if (!empty($content['report_data'][0]['field_program_work_hourly'])) { ?>$<?= number_format($content['report_data'][0]['field_program_work_hourly'], 2);
																																			} ?></span></td>
												</tr>
												<tr>
													<td>Number of welfare participants in federal/state funded programs: </td>
													<td><span><?= number_format($content['report_data'][0]['field_program_work_welfare']); ?></span></td>
												</tr>
												<tr>
													<td>Number of welfare program participants placed in jobs: </td>
													<td><span><?= number_format($content['report_data'][0]['field_program_work_welfare_place']); ?></span></td>
												</tr>
												<tr>
													<td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">Income of welfare recipient placed in jobs</b></td>
												</tr>
												<tr>
													<td>Annual welfare salary (if applicable): </td>
													<td><span><?php if (!empty($content['report_data'][0]['field_program_work_welfare_salar'])) { ?>$<?= number_format($content['report_data'][0]['field_program_work_welfare_salar'], 2);
																																					} ?></span> </td>
												</tr>
												<tr>
													<td> or Hourly wage rate (welfare): </td>
													<td> <span> <?php isset($content['report_data'][0]['field_program_work_welfare_hour']) ? print_r("$" . number_format($content['report_data'][0]['field_program_work_welfare_hour'], 2)) : print_r(''); ?></span></td>
												</tr>
												<tr>
													<td>Total for number of participants in employment/workforce development programs and number of welfare participants in federal/stat: </td>
													<td><span><?= number_format($content['report_data'][0]['field_program_work_total_partici']); ?></span></td>
												</tr>
												<tr>
													<td>Number of participants obtaining industry-recognized credentials: </td>
													<td><span><?= number_format($content['report_data'][0]['field_program_work_credentials']); ?></span></td>
												</tr>
												<tr>
													<td>What is the total amount of financial assistance provided to workforce participants: </td>
													<td><span><?= number_format($content['report_data'][0]['field_program_financial_assist'],2); ?></span></td>
												</tr>
												<tr>
													<td>Do you provide financial incentives or subsidize participant wages?</td>
													<td><span>
															<?php $incentives_data = $content['all_incentives']; ?>
															<?php foreach ($incentives_data as $key => $val) {
																echo $val['field_financial_incentives'] . "<br>";
															} ?>
														</span></td>
												</tr>
												<tr>
													<td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">WIA/WIOA Services</b></td>
												</tr>
												<tr>
													<td>Is affiliate engaged in WIA/WIOA services delivery?: </td>
													<td><span><?php if ($content['report_data'][0]['field_program_work_wia'] == 1 && $content['report_data'][0]['field_program_work_wia'] != '') {
																	echo "Yes";
																} else if ($content['report_data'][0]['field_program_work_wia'] == 0 && $content['report_data'][0]['field_program_work_wia'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_program_work_wia'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>
													<td>Contracted WIA/WIOA service deliverer: </td>
													<td><span><?php if ($content['report_data'][0]['field_program_work_wia_deliverer'] == 1 && $content['report_data'][0]['field_program_work_wia_deliverer'] != '') {
																	echo "Yes";
																} else if ($content['report_data'][0]['field_program_work_wia_deliverer'] == 0 && $content['report_data'][0]['field_program_work_wia_deliverer'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_program_work_wia_deliverer'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>
													<td>Eiligible WIA/WIOA training provider: </td>
													<td><span><?php if ($content['report_data'][0]['field_program_work_wia_provider'] == 1 && $content['report_data'][0]['field_program_work_wia_provider'] != '') {
																	echo "Yes";
																} else if ($content['report_data'][0]['field_program_work_wia_provider'] == 0 && $content['report_data'][0]['field_program_work_wia_provider'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_program_work_wia_provider'] == 2) {
																	echo "N/A";
																}; ?></span></td>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>