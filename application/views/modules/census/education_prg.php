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
						<div class="h5 Subtittle text-primary"><b>Education Program Details</b></div>

						<?php if ($content['report_data']) { ?>
							<?php if ($this->session->role_id != 1) {
								if ($statuses['education_program']['status'] != "Submitted"  && $statuses['education_program']['status'] != "Reviewed Complete") { ?>
									<nav class="innerTab">
										
									
										<div class="nav nav-pills" id="nav-tab" role="tablist">
											<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
										</div>
										<?php if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0  && $content['report_data'][0]['field_tab_status']  == 120) {?>
											<div class="nav nav-pills" id="" role="tablist">
												<button type="button" id="education_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
											</div>
										<?php }else{?>
										<?php if ((count($programs) != 0) && $content['report_data'][0]['field_tab_status']  == 120) { ?>
											<div class="nav nav-pills" id="" role="tablist">
												<button type="button" id="education_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
											</div>
										<?php } }?>
										<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
											<div class="nav nav-pills" id="" role="tablist">
												<button type="button" id="education_program" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
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
											<button type="button" id="education_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
									<?php }else{?>
									<?php if ((count($programs) != 0) && $content['report_data'][0]['field_tab_status']  == 120) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="education_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
									<?php } } ?>
									<?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="education_program" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
										</div>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="education_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
										</div>
									<?php } ?>
									<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="education_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
										</div>
									<?php } ?>
								</nav>
							<?php }
							if (isset($_GET['msg'])) { ?>
								<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Education Program data has been updated.</div>
							<?php } ?>
							<?php if (isset($_GET['tab_message'])) { ?>
								<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
							<?php } ?>
							
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
									<form id="edit-edu-prg" method="post" action="<?php echo base_url('module/forms_update/education_prg/update'); ?>">
										<div class="full_form">
										<div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div>
										<br/><br/><br/>
											<div class="row g-4 align-items-end p-b-20 our-affiliate-edducation-programs">
												<div class="col-md-12" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
													<div class="form-group">
														<label for="edit-title" class="form-label">Title <span>*</span></label>
														<input type="text" class="form-control" id="edit-title" value="Education Program Details" required readonly>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="edit-field-do-you-offer-programs-of-t" class="form-label">Our affiliate offers programs of this type<span>*</span> </label>
														<br>
														<label class="radio">
															<input type="radio" name="field_do_you_offer_programs_of_t" id="edit-field-do-you-offer-programs-of-t-0" class="hide_fields" onclick="showDivifYes()" value="0" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0) { ?>checked="checked" <?php } ?>>
															<label class="label p-r-10" for="edit-field-do-you-offer-programs-of-t-0">NO</label>
														</label>
														<label class="radio">
															<input type="radio" name="field_do_you_offer_programs_of_t" id="edit-field-do-you-offer-programs-of-t-1" class="hide_fields" onclick="showDivifYes()" value="1" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1) { ?>checked="checked" <?php } ?>>
															<label class="label p-r-10" for="edit-field-do-you-offer-programs-of-t-1">YES</label>
														</label>
													</div>
												</div>
											</div>


											<div class="row align-items-end" id="hide_div_if_no">

												<div class="col-24">
													
													<div class="clearfix p-b-15" <?php if (($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 || count($programs) != 0)) {?> style="display:none"<?php }?>>
														<div class="messages error"> <i class="i i-warning"></i>&nbsp; &nbsp;You will require to enter information about at least one program to complete this tab on the next screen </div>
													</div>
													<div class="h5 Subtittle">Person Who Oversees Educational Program</div>

													<div class="row g-4 align-items-end p-t-20 p-b-20">
														<div class="col-md-8">
															<div class="form-group">
																<label for="edit-field-ed-overseer-name" class="form-label">Name </label>
																<input type="text" class="form-control" id="edit-field-ed-overseer-name" name="field_ed_overseer_name" value="<?= $content['report_data'][0]['field_ed_overseer_name']; ?>">
															</div>
														</div>
														<div class="col-md-8">
															<div class="form-group">
																<label for="edit-field-ed-overseer-email" class="form-label">Email </label>
																<input type="email" class="form-control" id="edit-field-ed-overseer-email" name="field_ed_overseer_email" value="<?= $content['report_data'][0]['field_ed_overseer_email']; ?>">
															</div>
														</div>

														<div class="col-md-8">
															<div class="form-group">
																<label for="edit-field-program-ed-total-participa" class="form-label">Total Participants in Program </label>
																<input type="text" class="form-control" id="edit-field-program-ed-total-participa" name="field_program_ed_total_participa" value="<?= number_format($content['report_data'][0]['field_program_ed_total_participa']); ?>">
															</div>
														</div>


													</div>


													<div class="h5 Subtittle">Homeless Youth</div>
													<div class="row">
														<div class="col-lg-12 col-md-24">
															<div class="inpgrp p-b-20">
																<div class="form-group">
																	<label for="edit-field-program-ed-homeless-youth" class="form-label">Do you serve homeless youth ( birth- 18 years old ) ?</label>
																	<div class="form-group ">
																		<label class="radio p-r-10">
																			<input type="radio" id="edit-field-program-ed-homeless-youth-none" name="field_program_ed_homeless_youth" value="2" <?php if ($content['report_data'][0]['field_program_ed_homeless_youth'] == 2) echo 'checked="checked"'; ?>>
																			<label class="label" for="edit-field-program-ed-homeless-youth-none"> N/A </label>
																		</label>
																		<label class="radio p-r-10">
																			<input type="radio" id="edit-field-program-ed-homeless-youth-no" name="field_program_ed_homeless_youth" value="0" <?php if ($content['report_data'][0]['field_program_ed_homeless_youth'] == 0 && $content['report_data'][0]['field_program_ed_homeless_youth'] != '') { ?>checked="checked" <?php } ?>>
																			<label class="label" for="edit-field-program-ed-homeless-youth-no"> No </label>
																		</label>
																		<label class="radio p-r-10">
																			<input type="radio" id="edit-field-program-ed-homeless-youth-yes" name="field_program_ed_homeless_youth" value="1" <?php if ($content['report_data'][0]['field_program_ed_homeless_youth'] == 1) { ?>checked="checked" <?php } ?>>
																			<label class="label" for="edit-field-program-ed-homeless-youth-yes"> Yes </label>
																		</label>
																	</div>
																</div>
															</div>
															<div class="inpgrp p-b-20">
																<div class="form-group">
																	<label for="edit-field-program-ed-title1" class="form-label"> Do you provide any services funded by by Title 1 dollars? </label>
																	<div class="form-group ">
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-title1-none" name="field_program_ed_title1"  value="2" <?php if ($content['report_data'][0]['field_program_ed_title1'] == '2') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-title1-none"> N/A </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-title1-no" name="field_program_ed_title1" value="0" <?php if ($content['report_data'][0]['field_program_ed_title1'] == 0 && $content['report_data'][0]['field_program_ed_title1'] != '') { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-title1-no"> No </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-title1-yes" name="field_program_ed_title1" value="1" <?php if ($content['report_data'][0]['field_program_ed_title1'] == 1) { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-title1-yes"> Yes </label>
																		</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-12 col-md-24">
															<div class="inpgrp">
																<div class="form-group">
																	<label for="edit-field-program-ed-school-building" class="form-label">Do you provide any services or operate programs in schooling buildings?</label>
																	<div class="form-group ">
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-school-building-none" name="field_program_ed_school_building" value="2" <?php if ($content['report_data'][0]['field_program_ed_school_building'] == '2') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-school-building-none"> N/A </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-school-building-no" name="field_program_ed_school_building" value="0" <?php if ($content['report_data'][0]['field_program_ed_school_building'] == 0 && $content['report_data'][0]['field_program_ed_school_building'] != '') { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-school-building-no"> No </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-school-building-yes" name="field_program_ed_school_building" value="1" <?php if ($content['report_data'][0]['field_program_ed_school_building'] == 1) { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-school-building-yes"> Yes </label>
																		</label>
																	</div>
																</div>
															</div>
															<div class="inpgrp">
																<div class="form-group">
																	<label for="edit-field-program-ed-school-day" class="form-label">During school day?</label>
																	<div class="form-group ">
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-school-day-none" name="field_program_ed_school_day" value="2" <?php if ($content['report_data'][0]['field_program_ed_school_day'] == '2') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-school-day-none"> N/A </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-school-day-no" name="field_program_ed_school_day" value="0" <?php if ($content['report_data'][0]['field_program_ed_school_day'] == 0 && $content['report_data'][0]['field_program_ed_school_day'] != '') { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-school-day-no"> No </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-school-day-yes" name="field_program_ed_school_day" value="1" <?php if ($content['report_data'][0]['field_program_ed_school_day'] == 1) { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-school-day-yes"> Yes </label>
																		</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="h5 Subtittle">Mentoring</div>
													<div class="inpgrp  p-b-10">
														<div class="form-group">
															<label for="edit-field-program-ed-mentoring" class="form-label">Do you provide any mentoring programs for children and youth (1st - 12th grade)</label>
															<div class="form-group ">
																<label class="radio">
																	<input type="radio" id="edit-field-program-ed-mentoring-none" name="field_program_ed_mentoring" value="2" <?php if ($content['report_data'][0]['field_program_ed_mentoring'] == '2') echo 'checked="checked"'; ?>>
																	<label class="label p-r-10" for="edit-field-program-ed-mentoring-none"> N/A </label>
																</label>
																<label class="radio">
																	<input type="radio" id="edit-field-program-ed-mentoring-no" name="field_program_ed_mentoring" value="0" <?php if ($content['report_data'][0]['field_program_ed_mentoring'] == 0 && $content['report_data'][0]['field_program_ed_mentoring'] != '') { ?>checked="checked" <?php } ?>>
																	<label class="label p-r-10" for="edit-field-program-ed-mentoring-no"> No </label>
																</label>
																<label class="radio">
																	<input type="radio" id="edit-field-program-ed-mentoring-yes" name="field_program_ed_mentoring" value="1" <?php if ($content['report_data'][0]['field_program_ed_mentoring'] == 1) { ?>checked="checked" <?php } ?>>
																	<label class="label p-r-10" for="edit-field-program-ed-mentoring-yes"> Yes </label>
																</label>
															</div>
														</div>

													</div>
													<div class="inpgrp  p-b-10">
														<div class="form-group">
															<label for="edit-field-program-ed-mentors-annual" class="form-label">How many mentors do you recruit and retain anually? </label>
															<input type="text" class="form-control w-200px" id="edit-field-program-ed-mentors-annual" name="field_program_ed_mentors_annual" value="<?= number_format($content['report_data'][0]['field_program_ed_mentors_annual']); ?>">
														</div>
													</div>
													<div class="h5 Subtittle">Scholarship</div>


													<div class="row g-4 align-items-end p-b-20">
														<div class="col-md-12">
															<div class="form-group">
																<label for="edit-field-program-ed-scholar-total" class="form-label">What is the overall value of the scholarships provided annually?</label>
																<div class="d-flex justify-content-center align-items-center">
																	<span>$</span> &nbsp; <input type="text" class="form-control" id="edit-field-program-ed-scholar-total" name="field_program_ed_scholar_total" value="<?= number_format($content['report_data'][0]['field_program_ed_scholar_total'], 2); ?>">
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label for="edit-field-program-ed-scholar-avg" class="form-label">What is the average value of the individual scholarships provided annually?</label>
																<div class="d-flex justify-content-center align-items-center">
																	<span>$</span> &nbsp; <input type="text" class="form-control" id="edit-field-program-ed-scholar-avg" name="field_program_ed_scholar_avg" value="<?= number_format($content['report_data'][0]['field_program_ed_scholar_avg'], 2); ?>">
																</div>
															</div>
														</div>
													</div>

													<div class="h5 Subtittle">Charter Schools</div>
													<div class="row">
														<div class="col-lg-12 col-md-24">
															<div class="inpgrp p-b-10">
																<div class="form-group">
																	<label for="edit-field-program-ed-charter-school" class="form-label">Does the affiliate operate a charter school?</label>
																	<div class="form-group ">
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-school-none" name="field_program_ed_charter_school" value="2" <?php if ($content['report_data'][0]['field_program_ed_charter_school'] == '2') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-school-none"> N/A </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-school-no" name="field_program_ed_charter_school" value="0" <?php if ($content['report_data'][0]['field_program_ed_charter_school'] == 0 && $content['report_data'][0]['field_program_ed_charter_school'] != '') { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-school-no"> No </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-school-yes" name="field_program_ed_charter_school" value="1" <?php if ($content['report_data'][0]['field_program_ed_charter_school'] == 1) { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-school-yes"> Yes </label>
																		</label>
																	</div>
																</div>
															</div>
															<div class="inpgrp p-b-10">
																<div class="form-group">
																	<label for="edit-field-program-ed-charter-mngmt" class="form-label">Does the affiliate operate a charter school management organisation?</label>
																	<div class="form-group ">
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-mngmt-none" name="field_program_ed_charter_mngmt" value="2" <?php if ($content['report_data'][0]['field_program_ed_charter_mngmt'] == '2') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-mngmt-none"> N/A </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-mngmt-no" name="field_program_ed_charter_mngmt" value="0" <?php if ($content['report_data'][0]['field_program_ed_charter_mngmt'] == 0 && $content['report_data'][0]['field_program_ed_charter_mngmt'] != '') { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-mngmt-no"> No </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-mngmt-yes" name="field_program_ed_charter_mngmt" value="1" <?php if ($content['report_data'][0]['field_program_ed_charter_mngmt'] == 1) { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-mngmt-yes"> Yes </label>
																		</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-12 col-md-24">
															<div class="inpgrp p-b-10">
																<div class="form-group">
																	<label for="edit-field-program-ed-charter-board" class="form-label">Does the affiliate or CEO sit on charter organisation board?</label>
																	<div class="form-group ">
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-board-none" name="field_program_ed_charter_board" value="2" <?php if ($content['report_data'][0]['field_program_ed_charter_board'] == '2') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-board-none"> N/A </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-board-no" name="field_program_ed_charter_board" value="0" <?php if ($content['report_data'][0]['field_program_ed_charter_board'] == 0 && $content['report_data'][0]['field_program_ed_charter_board'] != '') { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-board-no"> No </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-board-yes" name="field_program_ed_charter_board" value="1" <?php if ($content['report_data'][0]['field_program_ed_charter_board'] == 1) { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-board-yes"> Yes </label>
																		</label>
																	</div>
																</div>
															</div>
															<div class="inpgrp p-b-10">
																<div class="form-group">
																	<label for="edit-field-program-ed-charter-service" class="form-label">Does the affiliate provide any contracted service to a charter school, charter network or charter authorizing board? </label>
																	<div class="form-group ">
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-service-none" name="field_program_ed_charter_service" value="2" <?php if ($content['report_data'][0]['field_program_ed_charter_service'] == '2') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-service-none"> N/A </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-service-no" name="field_program_ed_charter_service" value="0" <?php if ($content['report_data'][0]['field_program_ed_charter_service'] == 0 && $content['report_data'][0]['field_program_ed_charter_service'] != '') { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-service-no"> No </label>
																		</label>
																		<label class="radio">
																			<input type="radio" id="edit-field-program-ed-charter-service-yes" name="field_program_ed_charter_service" value="1" <?php if ($content['report_data'][0]['field_program_ed_charter_service'] == 1) { ?>checked="checked" <?php } ?>>
																			<label class="label p-r-10" for="edit-field-program-ed-charter-service-yes"> Yes </label>
																		</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="h5 Subtittle">Advocacy</div>
													<div class="inpgrp p-b-10">
														<div class="form-group">
															<label for="edit-field-program-ed-advocacy" class="form-label">Does the affiliate provide any educational advocacy in your community? </label>
															<div class="form-group ">
																<label class="radio">
																	<input type="radio" id="edit-field-program-ed-advocacy-none" name="field_program_ed_advocacy" value="2" <?php if ($content['report_data'][0]['field_program_ed_advocacy'] == '2') echo 'checked="checked"'; ?>>
																	<label class="label p-r-10" for="edit-field-program-ed-advocacy-none"> N/A </label>
																</label>
																<label class="radio">
																	<input type="radio" id="edit-field-program-ed-advocacy-no" name="field_program_ed_advocacy" value="0" <?php if ($content['report_data'][0]['field_program_ed_advocacy'] == 0 && $content['report_data'][0]['field_program_ed_advocacy'] != '') { ?>checked="checked" <?php } ?>>
																	<label class="label p-r-10" for="edit-field-program-ed-advocacy-no"> No </label>
																</label>
																<label class="radio">
																	<input type="radio" id="edit-field-program-ed-advocacy-yes" name="field_program_ed_advocacy" value="1" <?php if ($content['report_data'][0]['field_program_ed_advocacy'] == 1) { ?>checked="checked" <?php } ?>>
																	<label class="label p-r-10" for="edit-field-program-ed-advocacy-yes"> Yes </label>
																</label>
															</div>
														</div>
													</div>
													<div class="inpgrp p-b-10">
														<div class="form-group">
															<label for="edit-field-program-ed-adv-partners" class="form-label">If so, who are your closest partners? </label>
															<div class="col-md-12">
																<input type="text" class="form-control" id="edit-field-program-ed-adv-partners" name="field_program_ed_adv_partners" value="<?= $content['report_data'][0]['field_program_ed_adv_partners'] ?>">
															</div>
														</div>
													</div>
													<div class="h5 Subtittle">Education Programs( Middle school,High school )</div>
													<div class="inpgrp  p-b-10">
														<div class="form-group">
															<label for="field_program_ed_model" class="form-label">Program Model</label>
															<select class="form-select w-200px" aria-label="Model" id="field_program_ed_model" name="field_program_ed_model">
																<option value="">- None - </option>
																<option value="School Based Model (SBM)" <?php if ($content['report_data'][0]['field_program_ed_model'] == "School Based Model (SBM)") { ?>selected="selected" <?php } ?>>School Based Model (SBM)</option>
																<option value="Out of School Time Model (OST)" <?php if ($content['report_data'][0]['field_program_ed_model'] == "Out of School Time Model (OST)") { ?>selected="selected" <?php } ?>>Out of School Time Model (OST)</option>
																<option value="Hybrid (combines OST and SBM)" <?php if ($content['report_data'][0]['field_program_ed_model'] == "Hybrid (combines OST and SBM)") { ?>selected="selected" <?php } ?>>Hybrid (combines OST and SBM)</option>
															</select>
														</div>
													</div>
													<div class="h5 Subtittle">Foster care</div>
													<div class="inpgrp ">
														<div class="form-group">
															<label for="edit-field-program-ed-foster" class="form-label">Do you provide foster care service for children?</label>
															<div class="form-group ">
																<label class="radio">
																	<input type="radio" id="edit-field-program-ed-foster-none" name="field_program_ed_foster" value="2" <?php if ($content['report_data'][0]['field_program_ed_foster'] == '2') echo 'checked="checked"'; ?>>
																	<label class="label p-r-10" for="edit-field-program-ed-foster-none"> N/A </label>
																</label>
																<label class="radio">
																	<input type="radio" id="edit-field-program-ed-foster-no" name="field_program_ed_foster" value="0" <?php if ($content['report_data'][0]['field_program_ed_foster'] == 0 && $content['report_data'][0]['field_program_ed_foster'] != '') { ?>checked="checked" <?php } ?>>
																	<label class="label p-r-10" for="edit-field-program-ed-foster-no"> No </label>
																</label>
																<label class="radio">
																	<input type="radio" id="edit-field-program-ed-foster-yes" name="field_program_ed_foster" value="1" <?php if ($content['report_data'][0]['field_program_ed_foster'] == 1) { ?>checked="checked" <?php } ?>>
																	<label class="label p-r-10" for="edit-field-program-ed-foster-yes"> Yes </label>
																</label>
															</div>
														</div>
													</div>
													<div class="inpgrp p-b-10">
														<div class="form-group">
															<label for="edit-field-program-ed-foster-total" class="form-label">If so, how many placements/recommendation for services do you make per year? </label>
															<input type="text" class="form-control w-200px" id="edit-field-program-ed-foster-total" name="field_program_ed_foster_total" value="<?= number_format($content['report_data'][0]['field_program_ed_foster_total']) ?>">
														</div>
													</div>
													<div class="h5 Subtittle">Program Impacts</div>




													<div class="row g-4 align-items-end p-b-20">
														<div class="col-md-8">
															<div class="form-group">
																<label for="edit-field-program-ed-promoted" class="form-label">Number of participants promoted to the next grade </label>
																<input type="text" class="form-control " id="edit-field-program-ed-promoted" name="field_program_ed_promoted" value="<?= number_format($content['report_data'][0]['field_program_ed_promoted']) ?>">
															</div>
														</div>
														<div class="col-md-8">
															<div class="form-group">
																<label for="edit-field-program-ed-graduated" class="form-label">Percentage of participants who graduated from high school</label>
																<div class="d-flex justify-content-start align-items-center">
																	<input type="text" class="form-control " id="edit-field-program-ed-graduated" name="field_program_ed_graduated" value="<?= $content['report_data'][0]['field_program_ed_graduated'] ?>">
																	&nbsp;&nbsp; <span>%</span>
																</div>

															</div>
														</div>
														<div class="col-md-8">
															<div class="form-group">
																<label for="edit-field-program-ed-college-app" class="form-label">Percentage of participants who submitted college application(s)</label>
																<div class="d-flex justify-content-start align-items-center">
																	<input type="text" class="form-control " id="edit-field-program-ed-college-app" name="field_program_ed_college_app" value="<?= $content['report_data'][0]['field_program_ed_college_app'] ?>">
																	&nbsp;&nbsp; <span>%</span>
																</div>

															</div>
														</div>


													</div>

												</div>
											</div>

											<div class="row g-4 align-items-end">
												<?php if ($this->session->role_id == 1) { ?>
													<div class="col-md-12">
														<div class="form-group">
															<label for="field_parent_census" class="form-label">Parent census *</label>
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
												//  } elseif (
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
											</div>
											<hr>											
											<div class="">
												<div class="form-group t-c formclassbtn">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-danger m-r-15 btn-rounded" type="button" data-table_name="education_program" data-status_id="<?= $statuses['education_program']['status'];?>" data-pk_id="<?= $content['report_data'][0]['pk_id']; ?>" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
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
										<br>
										<?php if ($this->session->role_id != 1) {
											if ($statuses['education_program']['status'] != "Submitted" && $statuses['education_program']['status'] != "Reviewed Complete") { ?> <a class="btn btn-primary btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/education_program">+ Add A Program</a><?php }
																																																																																										} else if ($this->session->role_id == 1) { ?> <a class="btn btn-accent btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/education_program">+ Add A Program</a> <?php echo "<br><br>";
																																																																																																																																																											} ?>
									</div>

									<div class="tabilCard inner NulCard">
										<div class="contact-table table-responsive">
											<table class="table table-striped">
												<tbody>
													<tr>
														<td>Our Affiliate offers programs of this type: </td>
														<td>
															<span><?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1) {
																		echo "Yes";
																	} elseif ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0) {
																		echo "No";
																	}; ?></span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="none_border">
															<div class="prg_head text-primary h5 fw-bold">Person Who Oversees Education Programs</div>
														</td>
													</tr>
													<tr>
														<td>Name: </td>
														<td>
															<span><?= $content['report_data'][0]['field_ed_overseer_name']; ?></span>
														</td>
													</tr>
													<tr>
														<td>Email: </td>
														<td>
															<span><?= $content['report_data'][0]['field_ed_overseer_email']; ?></span>
														</td>
													</tr>
													<tr>
														<td>Total Participants in Education Programs: </td>
														<td>
															<span> <?= number_format($content['report_data'][0]['field_program_ed_total_participa']); ?></span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="none_border">
															<div class="prg_head text-primary h5 fw-bold">Homeless Youth</div>
														</td>
													</tr>
													<tr>
														<td>Do you serve homeless youth (birth -18 years old)?: </td>
														<td>
															<span> <?php if ($content['report_data'][0]['field_program_ed_homeless_youth'] == 1 && $content['report_data'][0]['field_program_ed_homeless_youth'] != '') {
																		echo "Yes";
																	} elseif ($content['report_data'][0]['field_program_ed_homeless_youth'] == 0 && $content['report_data'][0]['field_program_ed_homeless_youth'] != '') {
																		echo "No";
																	} elseif($content['report_data'][0]['field_program_ed_homeless_youth'] == 2 && $content['report_data'][0]['field_program_ed_homeless_youth'] != '') {
																		echo "N/A";
																	} ?></span>
														</td>
													</tr>
													<tr>
														<td>Do you provide any services funded by Title 1 dollars?: </td>
														<td>
															<span> <?php if ($content['report_data'][0]['field_program_ed_title1'] == 1 && $content['report_data'][0]['field_program_ed_title1'] != '') {
																		echo "Yes";
																	} elseif ($content['report_data'][0]['field_program_ed_title1'] == 0 && $content['report_data'][0]['field_program_ed_title1'] != '') {
																		echo "No";
																	} elseif($content['report_data'][0]['field_program_ed_title1'] == 2 && $content['report_data'][0]['field_program_ed_title1'] != '') {
																		echo "N/A";
																	} ?></span>
														</td>
													</tr>
													<tr>
														<td>Do you provide any services or operate programs in school buildings?: </td>
														<td>
															<span> <?php if ($content['report_data'][0]['field_program_ed_school_building'] == 1 && $content['report_data'][0]['field_program_ed_school_building'] != '') {
																		echo "Yes";
																	} elseif ($content['report_data'][0]['field_program_ed_school_building'] == 0 && $content['report_data'][0]['field_program_ed_school_building'] != '') {
																		echo "No";
																	} elseif($content['report_data'][0]['field_program_ed_school_building'] == 2 && $content['report_data'][0]['field_program_ed_school_building'] != '') {
																		echo "N/A";
																	} ?></span>
														</td>
													</tr>
													<tr>
														<td>During the school day?: </td>
														<td>
															<span> <?php if ($content['report_data'][0]['field_program_ed_school_day'] == 1 && $content['report_data'][0]['field_program_ed_school_day'] != '') {
																		echo "Yes";
																	} elseif ($content['report_data'][0]['field_program_ed_school_day'] == 0 && $content['report_data'][0]['field_program_ed_school_day'] != '') {
																		echo "No";
																	} elseif($content['report_data'][0]['field_program_ed_school_building'] == 2 && $content['report_data'][0]['field_program_ed_school_building'] != '') {
																		echo "N/A";
																	} ?></span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="none_border">
															<div class="prg_head text-primary h5 fw-bold">Mentoring</div>
														</td>
													</tr>
													<tr>
														<td>Do you provide any mentoring programs for children and youth (1st - 12th grade)?: </td>
														<td>
															<span> <?php if ($content['report_data'][0]['field_program_ed_mentoring'] == 1 && $content['report_data'][0]['field_program_ed_mentoring'] != '') {
																		echo "Yes";
																	} elseif ($content['report_data'][0]['field_program_ed_mentoring'] == 0 && $content['report_data'][0]['field_program_ed_mentoring'] != '') {
																		echo "No";
																	} elseif($content['report_data'][0]['field_program_ed_mentoring'] == 2 && $content['report_data'][0]['field_program_ed_mentoring'] != '') {
																		echo "N/A";
																	} ?></span>
														</td>
													</tr>
													<tr>
														<td>How many mentors do you recruit and retain annually?: </td>
														<td>
															<span> <?= number_format($content['report_data'][0]['field_program_ed_mentors_annual']); ?></span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="none_border">
															<div class="prg_head text-primary h5 fw-bold">Scholarship</div>
														</td>
													</tr>
													<tr>
														<td>What is the overall value of the scholarships provided annually?: </td>
														<td>
															<span> <?php if (isset($content['report_data'][0]['field_program_ed_scholar_total'])) { ?>$<?= number_format($content['report_data'][0]['field_program_ed_scholar_total'], 2);
																																					} ?></span>
														</td>
													</tr>
													<tr>
														<td>What is the average value of the individual scholarships provided annually?: </td>
														<td>
															<span> <?php if (isset($content['report_data'][0]['field_program_ed_scholar_avg'])) { ?>$<?= number_format($content['report_data'][0]['field_program_ed_scholar_avg'], 2);
																																					} ?></span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="none_border">
															<div class="prg_head text-primary h5 fw-bold">Charter Schools</div>
														</td>
													</tr>
													<tr>
														<td>Does the affiliate operate a charter school?: </td>
														<td>
															<span>
																<?php
																$field_program_ed_charter_school = $content['report_data'][0]['field_program_ed_charter_school'];
																if (($field_program_ed_charter_school) == 1 && $field_program_ed_charter_school != '') {
																	echo "Yes";
																} elseif (($content['report_data'][0]['field_program_ed_charter_school']) == 0 && $field_program_ed_charter_school != '') {
																	echo "No";
																} elseif($content['report_data'][0]['field_program_ed_charter_school'] == 2 && $content['report_data'][0]['field_program_ed_charter_school'] != '') {
																	echo "N/A";
																} ?></span>
														</td>
													</tr>
													<tr>
														<td>Does the affiliate operate a charter school management organization?: </td>
														<td>
															<span>
																<?php
																$field_program_ed_charter_mngmt = $content['report_data'][0]['field_program_ed_charter_mngmt'];
																if ($field_program_ed_charter_mngmt == 1 && $field_program_ed_charter_mngmt != '') {
																	echo "Yes";
																} elseif (($content['report_data'][0]['field_program_ed_charter_mngmt']) == 0 && $field_program_ed_charter_mngmt != '') {
																	echo "No";
																} elseif($content['report_data'][0]['field_program_ed_charter_mngmt'] == 2 && $content['report_data'][0]['field_program_ed_charter_mngmt'] != '') {
																	echo "N/A";
																} ?></span>
														</td>
													</tr>
													<tr>
														<td>Does the affiliate or CEO sit on a charter authorizing board?: </td>
														<td>
															<span> <?php if ($content['report_data'][0]['field_program_ed_charter_board'] == 1 && $content['report_data'][0]['field_program_ed_charter_board'] != '') {
																		echo "Yes";
																	} elseif (($content['report_data'][0]['field_program_ed_charter_board'] == 0 && $content['report_data'][0]['field_program_ed_charter_board'] != '')) {
																		echo "No";
																	} elseif($content['report_data'][0]['field_program_ed_charter_board'] == 2 && $content['report_data'][0]['field_program_ed_charter_board'] != '') {
																		echo "N/A";
																	} ?></span>
														</td>
													</tr>
													<tr>
														<td>Does the affiliate provide any contracted services to a charter school, charter network or charter authorizing board?: </td>
														<td>
															<span> <?php if ($content['report_data'][0]['field_program_ed_charter_service'] == 1 && $content['report_data'][0]['field_program_ed_charter_service'] != '') {
																		echo "Yes";
																	} elseif ($content['report_data'][0]['field_program_ed_charter_service'] == 0 && $content['report_data'][0]['field_program_ed_charter_service'] != '') {
																		echo "No";
																	} elseif($content['report_data'][0]['field_program_ed_charter_service'] == 2 && $content['report_data'][0]['field_program_ed_charter_service'] != '') {
																		echo "N/A";
																	} ?></span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="none_border">
															<div class="prg_head text-primary h5 fw-bold">Advocacy</div>
														</td>
													</tr>
													<tr>
														<td>Does the affiliate provide any Education advocacy in your community?:</td>
														<td>
															<span><?php if ($content['report_data'][0]['field_program_ed_advocacy'] == 1 && $content['report_data'][0]['field_program_ed_advocacy'] != '') {
																		echo "Yes";
																	} elseif ($content['report_data'][0]['field_program_ed_advocacy'] == 0 && $content['report_data'][0]['field_program_ed_advocacy'] != '') {
																		echo "No";
																	} elseif($content['report_data'][0]['field_program_ed_advocacy'] == 2 && $content['report_data'][0]['field_program_ed_advocacy'] != '') {
																		echo "N/A";
																	} ?></span>
														</td>
													</tr>
													<tr>
														<td>If so, who are your closest partners?: </td>
														<td>
															<span> <?= $content['report_data'][0]['field_program_ed_adv_partners']; ?></span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="none_border">
															<div class="prg_head text-primary h5 fw-bold">Education Programs (Middle School, High School)</div>
														</td>
													</tr>
													<tr>
														<td>Program Model: </td>
														<td>
															<span> <?= $content['report_data'][0]['field_program_ed_model']; ?></span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="none_border">
															<div class="prg_head text-primary h5 fw-bold">Program Impacts</div>
														</td>
													</tr>
													<tr>
														<td>Number of participants promoted to the next grade: </td>
														<td>
															<span> <?= number_format($content['report_data'][0]['field_program_ed_promoted']); ?></span>
														</td>
													</tr>
													<tr>
														<td>Percentage of participants who graduated from High School: </td>
														<td>
															<span> <?php if (isset($content['report_data'][0]['field_program_ed_graduated'])) { ?><?= $content['report_data'][0]['field_program_ed_graduated'] . '%';
																																				} ?> </span>
														</td>
													</tr>
													<tr>
														<td>Percentage of participants who submitted college application(s): </td>
														<td>
															<span> <?php if (isset($content['report_data'][0]['field_program_ed_college_app'])) { ?><?= $content['report_data'][0]['field_program_ed_college_app'] . '%';
																																				} ?> </span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="none_border">
															<div class="prg_head text-primary h5 fw-bold">Foster Care</div>
														</td>
													</tr>
													<tr>
														<td>Do you provide Foster care services for children?: </td>
														<td>
															<span> <?php if ($content['report_data'][0]['field_program_ed_foster'] == 1 && $content['report_data'][0]['field_program_ed_foster'] != '') {
																		echo "Yes";
																	} elseif ($content['report_data'][0]['field_program_ed_foster'] == 0 && $content['report_data'][0]['field_program_ed_foster'] != '') {
																		echo "No";
																	} elseif($content['report_data'][0]['field_program_ed_foster'] == 2 && $content['report_data'][0]['field_program_ed_foster'] != '') {
																		echo "N/A";
																	}; ?> </span>
														</td>
													</tr>
													<tr>
														<td>If so, how many placements/recommendations for services do you make per year?: </td>
														<td>
															<span> <?= number_format($content['report_data'][0]['field_program_ed_foster_total']); ?> </span>
														</td>
													</tr>
													<?php if ($this->session->role_id == 1) { ?>
														<tr>
															<td class="viewcol1">Parent census: </td>
															<td>
																<span> <?= $content['report_data'][0]['organization'] . " " . $content['report_data'][0]['field_year'] . " census"; ?> </span>
															</td>
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
						<?php } else { ?>
							<div class="tab-content p-t-30" id="nav-tabContent">
								<p class="text-center text-danger h5">No records found</p>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>