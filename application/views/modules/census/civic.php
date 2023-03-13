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
						<div class="h5 Subtittle text-primary"><b>Civic Engagement</b></div>
						<?php if ($this->session->role_id != 1) {
							if ($statuses['civic']['status'] != "Submitted" && $statuses['civic']['status'] != "Reviewed Complete") { ?>
								<nav class="innerTab">
									<div class="nav nav-pills" id="nav-tab" role="tablist">
										<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
									</div>
									<?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="civic_engagement" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
									<?php } ?>
									<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="civic_engagement" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
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
										<button type="button" id="civic_engagement" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="civic_engagement" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
									</div>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="civic_engagement" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="civic_engagement" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
							</nav>
						<?php }

						if (isset($_GET['msg'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Civic data has been updated.</div>
						<?php } ?>
						<?php if (isset($_GET['tab_message'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
						<?php } ?>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
								<form id="edit-civic" method="post" action="<?php echo base_url('module/forms_update/civic/update'); ?>">
									<div class="full_form">
									<div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
										<div class="row align-items-end" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-title" class="form-label">Title <span>*</span></label>
													<input type="text" class="form-control" id="edit-title" value="Civic Engagement" required>
												</div>
											</div>
										</div>
										<div class="col-24">
											<div class="h5 Subtittle m-t-15 m-b-15">Civic Engagement</div>
											<div class="tabilCard NulCard EmployeeCard">
												<div class="contact-table table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th>Voter registration </th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<div class="row g-3 p-y-20 ">
																		<div class="col-md-8">
																			<div class="form-group">
																				<label for="edit-field-voter-registration" class="form-label">Do your affiliate assist in your voter registration?</label>
																				<br>
																				<label class="radio">
																					<input type="radio" value="2" id="edit-field-voter-registration-na" name="field_voter_registration" <?php if ($content['report_data'][0]['field_voter_registration'] == 2) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-voter-registration-na"> N/A </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="0" id="edit-field-voter-registration-0" name="field_voter_registration" <?php if ($content['report_data'][0]['field_voter_registration'] == 0 && $content['report_data'][0]['field_voter_registration'] != '') echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-voter-registration-0"> No </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="1" id="edit-field-voter-registration-1" name="field_voter_registration" <?php if ($content['report_data'][0]['field_voter_registration'] == 1) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-voter-registration-1"> Yes </label>
																				</label>

																			</div>
																		</div>
																		<div class="col-md-8">
																			<div class="form-group">
																				<label for="edit-field-did-your-affiliate-provide" class="form-label">Do your affiliate provide assistance in getting voters to the polls? </label>
																				<br>
																				<label class="radio">
																					<input type="radio" value="2" id="edit-field-did-your-affiliate-provide-none" name="field_did_your_affiliate_provide" <?php if ($content['report_data'][0]['field_did_your_affiliate_provide'] == 2) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-did-your-affiliate-provide-none"> N/A </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="0" id="edit-field-did-your-affiliate-provide-0" name="field_did_your_affiliate_provide" <?php if ($content['report_data'][0]['field_did_your_affiliate_provide'] == 0 && $content['report_data'][0]['field_did_your_affiliate_provide'] != '') echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-did-your-affiliate-provide-0"> No </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="1" id="edit-field-did-your-affiliate-provide-1" name="field_did_your_affiliate_provide" <?php if ($content['report_data'][0]['field_did_your_affiliate_provide'] == 1) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-did-your-affiliate-provide-1"> Yes </label>
																				</label>
																			</div>
																		</div>
																		<div class="col-md-8">
																			<div class="form-group">
																				<label for="edit-field-voter-total" class="form-label">Total served</label>
																				<input type="text" class="form-control" id="edit-field-voter-total" name="field_voter_total" value="<?= number_format($content['report_data'][0]['field_voter_total']); ?>">
																				<br>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-24">
																		<div class="form-group">
																			<label for="edit-field-please-describe-vt" class="form-label">Please describe</label>
																			<textarea id="edit-field-please-describe-vt" name="field_please_describe_vt" class="form-control" rows="4"><?= $content['report_data'][0]['field_please_describe_vt']; ?></textarea>
																			<br>
																			<br>
																		</div>
																	</div>
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
																<th colspan="3">Race </th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th>Race</th>
																<th>Male</th>
																<th>Female</th>
															</tr>
															<tr>
																<td>White</td>
																<td>
																	<input type="text" value="<?= number_format($content['report_data'][0]['field_voter_white_male']); ?>" id="field_voter_white_male" name="field_voter_white_male" onkeyup="civic_voter_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_white_female']); ?>" id="field_voter_white_female" name="field_voter_white_female" onkeyup="civic_voter_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Hispanic/Latino</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_hispanic_male']); ?>" id="field_voter_hispanic_male" name="field_voter_hispanic_male" onkeyup="civic_voter_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_hispanic_female']); ?>" id="field_voter_hispanic_female" name="field_voter_hispanic_female" onkeyup="civic_voter_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Asian American</td>
																<td>
																	<input type="text" value="<?= ($content['report_data'][0]['field_voter_asian_am_male']); ?>" id="field_voter_asian_am_male" name="field_voter_asian_am_male" onkeyup="civic_voter_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_asian_am_female']); ?>" id="field_voter_asian_am_female" name="field_voter_asian_am_female" onkeyup="civic_voter_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Native American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_native_am_male']); ?>" id="field_voter_native_am_male" name="field_voter_native_am_male" onkeyup="civic_voter_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_native_am_female']); ?>" id="field_voter_native_am_female" name="field_voter_native_am_female" onkeyup="civic_voter_calc(this)">
																</td>
															</tr>
															<tr>
																<td>African American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_african_am_male']); ?>" id="field_voter_african_am_male" name="field_voter_african_am_male" onkeyup="civic_voter_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_african_am_female']); ?>" id="field_voter_african_am_female" name="field_voter_african_am_female" onkeyup="civic_voter_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Other</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_other_male']); ?>" id="field_voter_other_male" name="field_voter_other_male" onkeyup="civic_voter_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_other_female']); ?>" id="field_voter_other_female" name="field_voter_other_female" onkeyup="civic_voter_calc(this)">
																</td>
															</tr>
															<tr>
																<td><b>Total Number Served or Registered (Male and Female)</b></td>
																<td></td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_voter_societal_impact']); ?>" id="field_voter_societal_impact" name="field_voter_societal_impact" readonly>
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
																<th>Community Forums </th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<div class="row g-4 p-y-20 ">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label for="edit-field-community-forums" class="form-label">Did your affiliate hold community forums ?</label>
																				<br>
																				<label class="radio">
																					<input type="radio" value="2" id="edit-field-community-forums-na" name="field_community_forums" <?php if ($content['report_data'][0]['field_community_forums'] == 2) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-community-forums-na"> N/A </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="0" id="edit-field-community-forums-0" name="field_community_forums" <?php if ($content['report_data'][0]['field_community_forums'] == 0 && $content['report_data'][0]['field_community_forums'] != '') echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-community-forums-0"> No </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="1" id="edit-field-community-forums-1" name="field_community_forums" <?php if ($content['report_data'][0]['field_community_forums'] == 1) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-community-forums-1"> Yes </label>
																				</label>


																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="form-group">
																				<label for="edit-field-forums-total" class="form-label">Community forums Total served</label>
																				<input type="text" class="form-control " id="edit-field-forums-total" name="field_forums_total" value="<?= number_format($content['report_data'][0]['field_forums_total']); ?>">
																				<br>
																			</div>
																		</div>
																	</div>
																	<div class="inpgrp">
																		<div class="form-group">
																			<label for="edit-field-forums-description" class="form-label">Please describe</label>
																			<textarea id="edit-field-forums-description" name="field_forums_description" class="form-control" rows="4"></textarea>
																			<br>
																			<br>
																		</div>
																	</div>
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
																<th colspan="3">Race </th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th>Race</th>
																<th>Male</th>
																<th>Female</th>
															</tr>
															<tr>
																<td>White</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_white_male']); ?>" id="field_forums_white_male" name="field_forums_white_male" onkeyup="civic_forum_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_white_female']); ?>" id="field_forums_white_female" name="field_forums_white_female" onkeyup="civic_forum_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Hispanic/Latino</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_hispanic_male']); ?>" id="field_forums_hispanic_male" name="field_forums_hispanic_male" onkeyup="civic_forum_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_hispanic_female']); ?>" id="field_forums_hispanic_female" name="field_forums_hispanic_female" onkeyup="civic_forum_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Asian American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_asian_am_male']); ?>" id="field_forums_asian_am_male" name="field_forums_asian_am_male" onkeyup="civic_forum_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_asian_am_female']); ?>" id="field_forums_asian_am_female" name="field_forums_asian_am_female" onkeyup="civic_forum_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Native American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_native_am_male']); ?>" id="field_forums_native_am_male" name="field_forums_native_am_male" onkeyup="civic_forum_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_native_am_female']); ?>" id="field_forums_native_am_female" name="field_forums_native_am_female" onkeyup="civic_forum_calc(this)">
																</td>
															</tr>
															<tr>
																<td>African American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_african_am_male']); ?>" id="field_forums_african_am_male" name="field_forums_african_am_male" onkeyup="civic_forum_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_african_am_female']); ?>" id="field_forums_african_am_female" name="field_forums_african_am_female" onkeyup="civic_forum_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Other</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_other_male']); ?>" id="field_forums_other_male" name="field_forums_other_male" onkeyup="civic_forum_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_other_female']); ?>" id="field_forums_other_female" name="field_forums_other_female" onkeyup="civic_forum_calc(this)">
																</td>
															</tr>
															<tr>
																<td><b>Total Number Served or Registered (Male and Female)</b></td>
																<td></td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_forums_societal_impact']); ?>" id="field_forums_societal_impact" name="field_forums_societal_impact" readonly>

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
																<th>Civil Rights and Racial Justice Activities</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<div class="row g-4 p-y-20 ">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label for="edit-field-crja" class="form-label">Did your affiliate engage in civil rights and racial justice activities</label>
																				<br>
																				<label class="radio">
																					<input type="radio" value="2" id="edit-field-crja-none" name="field_crja" <?php if ($content['report_data'][0]['field_crja'] == 2) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-crja-none"> N/A </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="0" id="edit-field-crja-0" name="field_crja" <?php if ($content['report_data'][0]['field_crja'] == 0 && $content['report_data'][0]['field_crja'] != '') echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-crja-0"> No </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="1" id="edit-field-crja-1" name="field_crja" <?php if ($content['report_data'][0]['field_crja'] == 1) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-crja-1"> Yes </label>
																				</label>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="form-group">
																				<label for="edit-field-crja-total" class="form-label">Racial Justice Total served</label>
																				<input type="text" class="form-control" id="edit-field-crja-total" name="field_crja_total" value="<?= number_format($content['report_data'][0]['field_crja_total']); ?>">
																				<br>
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<label for="edit-field-please-describe-crja" class="form-label">Please describe</label>
																		<textarea id="edit-field-please-describe-crja" name="field_please_describe_crja" class="form-control" rows="4"><?= $content['report_data'][0]['field_please_describe_crja']; ?></textarea>
																		<br>
																		<br>

																	</div>
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
																<th colspan="3">Race </th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th>Race</th>
																<th>Male</th>
																<th>Female</th>
															</tr>
															<tr>
																<td>White</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_white_male']); ?>" id="field_crja_white_male" name="field_crja_white_male" onkeyup="civic_crja_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_white_female']); ?>" id="field_crja_white_female" name="field_crja_white_female" onkeyup="civic_crja_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Hispanic/Latino</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_hispanic_male']); ?>" id="field_crja_hispanic_male" name="field_crja_hispanic_male" onkeyup="civic_crja_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_hispanic_female']); ?>" id="field_crja_hispanic_female" name="field_crja_hispanic_female" onkeyup="civic_crja_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Asian American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_asian_am_male']); ?>" id="field_crja_asian_am_male" name="field_crja_asian_am_male" onkeyup="civic_crja_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_asian_am_female']); ?>" id="field_crja_asian_am_female" name="field_crja_asian_am_female" onkeyup="civic_crja_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Native American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_native_am_male']); ?>" id="field_crja_native_am_male" name="field_crja_native_am_male" onkeyup="civic_crja_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_native_am_female']); ?>" id="field_crja_native_am_female" name="field_crja_native_am_female" onkeyup="civic_crja_calc(this)">
																</td>
															</tr>
															<tr>
																<td>African American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_african_am_male']); ?>" id="field_crja_african_am_male" name="field_crja_african_am_male" onkeyup="civic_crja_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_african_am_female']); ?>" id="field_crja_african_am_female" name="field_crja_african_am_female" onkeyup="civic_crja_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Other</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_other_male']); ?>" id="field_crja_other_male" name="field_crja_other_male" onkeyup="civic_crja_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_other_female']); ?>" id="field_crja_other_female" name="field_crja_other_female" onkeyup="civic_crja_calc(this)">
																</td>
															</tr>
															<tr>
																<td><b>Total Number Served or Registered (Male and Female)</b></td>
																<td></td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_crja_societal_impact']); ?>" id="field_crja_societal_impact" name="field_crja_societal_impact" readonly>
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
																<th>Police Brutality </th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>

																	<div class="row g-4 p-y-20 ">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label for="edit-field-police-brutality" class="form-label">Did your affiliate participated in activism related in police brutality</label>
																				<br>
																				<label class="radio">
																					<input type="radio" value="2" id="edit-field-police-brutality-na" name="field_police_brutality" <?php if ($content['report_data'][0]['field_police_brutality'] == 2) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-police-brutality-na"> N/A </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="0" id="edit-field-police-brutality-0" name="field_police_brutality" <?php if ($content['report_data'][0]['field_police_brutality'] == 0 && $content['report_data'][0]['field_police_brutality'] != '') echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-police-brutality-0"> No </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="1" id="edit-field-police-brutality-1" name="field_police_brutality" <?php if ($content['report_data'][0]['field_police_brutality'] == 1) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-police-brutality-1"> Yes </label>
																				</label>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="form-group">
																				<label for="edit-field-police-total" class="form-label">Police Brutality Total served</label>
																				<input type="text" class="form-control" id="edit-field-police-total" name="field_police_total" value="<?= number_format($content['report_data'][0]['field_police_total']); ?>">
																				<br>
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<label for="edit-field-please-describe-pb" class="form-label">Please describe</label>
																		<textarea id="edit-field-please-describe-pb" name="field_please_describe_pb" class="form-control" rows="4"><?= $content['report_data'][0]['field_please_describe_pb']; ?></textarea>
																		<br>
																		<br>

																	</div>
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
																<th colspan="3">Race </th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th>Race</th>
																<th>Male</th>
																<th>Female</th>
															</tr>
															<tr>
																<td>White</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_white_male']); ?>" id="field_police_white_male" name="field_police_white_male" onkeyup="civic_police_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_white_female']); ?>" id="field_police_white_female" name="field_police_white_female" onkeyup="civic_police_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Hispanic/Latino</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_hispanic_male']); ?>" id="field_police_hispanic_male" name="field_police_hispanic_male" onkeyup="civic_police_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_hispanic_female']); ?>" id="field_police_hispanic_female" name="field_police_hispanic_female" onkeyup="civic_police_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Asian American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_asian_am_male']); ?>" id="field_police_asian_am_male" name="field_police_asian_am_male" onkeyup="civic_police_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_asian_am_female']); ?>" id="field_police_asian_am_female" name="field_police_asian_am_female" onkeyup="civic_police_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Native American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_native_am_male']); ?>" id="field_police_native_am_male" name="field_police_native_am_male" onkeyup="civic_police_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_native_am_female']); ?>" id="field_police_native_am_female" name="field_police_native_am_female" onkeyup="civic_police_calc(this)">
																</td>
															</tr>
															<tr>
																<td>African American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_african_am_male']); ?>" id="field_police_african_am_male" name="field_police_african_am_male" onkeyup="civic_police_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_african_am_female']); ?>" id="field_police_african_am_female" name="field_police_african_am_female" onkeyup="civic_police_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Other</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_other_male']); ?>" id="field_police_other_male" name="field_police_other_male" onkeyup="civic_police_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_other_female']); ?>" id="field_police_other_female" name="field_police_other_female" onkeyup="civic_police_calc(this)">
																</td>
															</tr>
															<tr>
																<td><b>Total Number Served or Registered (Male and Female)</b></td>
																<td></td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_police_societal_impact']); ?>" readonly id="field_police_societal_impact" name="field_police_societal_impact">
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
																<th>Advocacy </th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<div class="row g-4 p-y-20 ">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label for="edit-field-advocacy-efforts" class="form-label">Do your affiliate assist in Advocacy efforts?</label>
																				<br>
																				<label class="radio">
																					<input type="radio" value="2" id="edit-field-advocacy-efforts-na" name="field_advocacy_efforts" <?php if ($content['report_data'][0]['field_advocacy_efforts'] == 2) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-advocacy-efforts-na"> N/A </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="0" id="edit-field-advocacy-efforts-0" name="field_advocacy_efforts" <?php if ($content['report_data'][0]['field_advocacy_efforts'] == 0 && $content['report_data'][0]['field_advocacy_efforts'] != '') echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-advocacy-efforts-0"> No </label>
																				</label>
																				<label class="radio">
																					<input type="radio" value="1" id="edit-field-advocacy-efforts-1" name="field_advocacy_efforts" <?php if ($content['report_data'][0]['field_advocacy_efforts'] == 1) echo 'checked="checked"'; ?>>
																					<label class="label p-r-10" for="edit-field-advocacy-efforts-1"> Yes </label>
																				</label>

																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="form-group">
																				<label for="edit-field-advocacy-total" class="form-label">Advocacy Total served</label>
																				<input type="text" class="form-control" id="edit-field-advocacy-total" name="field_advocacy_total" value="<?= number_format($content['report_data'][0]['field_advocacy_total']); ?>">
																				<br>
																			</div>
																		</div>
																	</div>
																	<div class="inpgrp">
																		<div class="form-group">
																			<label for="edit-field-advoacy-research" class="form-label">Please describe</label>
																			<textarea id="edit-field-advoacy-research" name="field_advoacy_research" class="form-control" rows="4"></textarea>
																			<br>
																			<br>
																		</div>
																	</div>
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
																<th colspan="3">What is racial/gender composition on board? </th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th>Race</th>
																<th>Male</th>
																<th>Female</th>
															</tr>
															<tr>
																<td>White</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_white_male']); ?>" id="field_advocacy_white_male" name="field_advocacy_white_male" onkeyup="civic_advocacy_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_white_female']); ?>" id="field_advocacy_white_female" name="field_advocacy_white_female" onkeyup="civic_advocacy_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Hispanic/Latino</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_hispanic_male']); ?>" id="field_advocacy_hispanic_male" name="field_advocacy_hispanic_male" onkeyup="civic_advocacy_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_hispanic_female']); ?>" id="field_advocacy_hispanic_female" name="field_advocacy_hispanic_female" onkeyup="civic_advocacy_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Asian American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_asian_am_male']); ?>" id="field_advocacy_asian_am_male" name="field_advocacy_asian_am_male" onkeyup="civic_advocacy_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_asian_am_female']); ?>" id="field_advocacy_asian_am_female" name="field_advocacy_asian_am_female" onkeyup="civic_advocacy_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Native American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_native_am_male']); ?>" id="field_advocacy_native_am_male" name="field_advocacy_native_am_male" onkeyup="civic_advocacy_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_native_am_female']); ?>" id="field_advocacy_native_am_female" name="field_advocacy_native_am_female" onkeyup="civic_advocacy_calc(this)">
																</td>
															</tr>
															<tr>
																<td>African American</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_african_am_male']); ?>" id="field_advocacy_african_am_male" name="field_advocacy_african_am_male" onkeyup="civic_advocacy_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_african_am_female']); ?>" id="field_advocacy_african_am_female" name="field_advocacy_african_am_female" onkeyup="civic_advocacy_calc(this)">
																</td>
															</tr>
															<tr>
																<td>Other</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_other_male']); ?>" id="field_advocacy_other_male" name="field_advocacy_other_male" onkeyup="civic_advocacy_calc(this)">
																</td>
																<td>
																	<input type="text" value="<?=  number_format($content['report_data'][0]['field_advocacy_other_female']); ?>" id="field_advocacy_other_female" name="field_advocacy_other_female" onkeyup="civic_advocacy_calc(this)">
																</td>
															</tr>
															<tr>
																<td><b>Total Number Served or Registered (Male and Female)</b></td>
																<td></td>
																<td>
																	<input type="text" readonly value="<?=  number_format($content['report_data'][0]['field_advocacy_societal_impact']); ?>" id="field_advocacy_societal_impact" name="field_advocacy_societal_impact">
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<br>
											<div class="inpgrp">

												<div class="form-group">
													<label for="edit-field-advocacy-description" class="form-label">Research ( Please describe )</label>
													<textarea id="edit-field-advocacy-description" class="form-control" rows="4" name="field_advocacy_description"></textarea>
													<br>
												</div>
											</div>
											<div class="row g-4 align-items-end">
												<?php if ($this->session->role_id == 1) { ?>
													<div class="col-md-12">
														<div class="form-group">
															<label for="edit-field-parent-census" class="form-label">Parent census *</label>
															<select class="form-select" aria-label="edit-field-parent-census" id="edit-field-parent-census">
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
															<label for="edit-field-parent-census" class="form-label">Parent census *</label>
															<select class="form-select" aria-label="edit-field-parent-census" id="edit-field-parent-census">
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
												<div class="col-md-12" <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) { ?>style="display: none;" <?php } ?>>
													<div class="form-group">
														<label for="status" class="form-label">Tab Status *</label>
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
											</div>

											<div class="form-group p-b-20">
												<label for="edit-field-community-organizations" class="form-label p-t-20">Community Organizations </label>
												<br>
												<label class="radio">
													<input type="radio" value="2" id="edit-field-community-organizations-na" name="field_community_organizations" <?php if ($content['report_data'][0]['field_community_organizations'] == 2) echo 'checked="checked"'; ?>>
													<label class="label p-r-10" for="edit-field-community-organizations-na"> N/A </label>
												</label>
												<label class="radio">
													<input type="radio" value="0" id="edit-field-community-organizations-0" name="field_community_organizations" <?php if ($content['report_data'][0]['field_community_organizations'] == 0 && $content['report_data'][0]['field_community_organizations'] != '') echo 'checked="checked"'; ?>>
													<label class="label p-r-10" for="edit-field-community-organizations-0"> No </label>
												</label>
												<label class="radio">
													<input type="radio" value="1" id="edit-field-community-organizations-1" name="field_community_organizations" <?php if ($content['report_data'][0]['field_community_organizations'] == 1) echo 'checked="checked"'; ?>>
													<label class="label p-r-10" for="edit-field-community-organizations-1"> Yes </label>
												</label>
											</div>


											<div class="row g-4 align-items-end  p-t-10">
												<div class="col-md-6">
													<div class="form-group">
														<label for="edit-field-comm-org-total" class="form-label">Communty Organizations Total Served</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-total" name="field_comm_org_total" value="<?= number_format($content['report_data'][0]['field_comm_org_total']); ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="edit-field-comm-org-white-male" class="form-label">Community Organization White Males</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-white-male" name="field_comm_org_white_male" value="<?= number_format($content['report_data'][0]['field_comm_org_white_male']); ?>">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="edit-field-comm-org-white-female" class="form-label">Community Organization White Females</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-white-female" name="field_comm_org_white_female" value="<?= number_format($content['report_data'][0]['field_comm_org_white_female']); ?>">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="edit-field-comm-org-african-am-male" class="form-label">Community Organization African American Males</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-african-am-male" name="field_comm_org_african_am_male" value="<?= number_format($content['report_data'][0]['field_comm_org_african_am_female']); ?>">
													</div>

												</div>
											</div>

											<div class="row g-4 align-items-end">
												<div class="col-md-6">
													<div class="form-group">
														<label for="edit-field-comm-org-african-am-female" class="form-label">Community Organization African American Females</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-african-am-female" name="field_comm_org_african_am_female" value="<?= number_format($content['report_data'][0]['field_comm_org_african_am_female']); ?>">
													</div>

												</div>
												<div class="col-md-6" style="display: none;">
													<div class="form-group">
														<label for="edit-field-comm-org-asian-am-male" class="form-label">comm_org_asian_am_male</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-asian-am-male" name="field_comm_org_asian_am_male" value="<?= number_format($content['report_data'][0]['field_comm_org_asian_am_male']); ?>">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="edit-field-comm-org-hispanic-male" class="form-label">Community Organization Hispanic/Latino Males</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-hispanic-male" name="field_comm_org_hispanic_male" value="<?= number_format($content['report_data'][0]['field_comm_org_hispanic_male']); ?>">
													</div>

												</div>
												<div class="col-md-6" style="display: none;">
													<div class="form-group">
														<label for="edit-field-comm-org-asian-am-female" class="form-label">comm_org_asian_am_female</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-asian-am-female" name="field_comm_org_asian_am_female" value="<?= number_format($content['report_data'][0]['field_comm_org_asian_am_female']); ?>">
													</div>

												</div>
											</div>
											<div class="row g-4 align-items-end">
												<div class="col-md-6">
													<div class="form-group">
														<label for="edit-field-comm-org-hispanic-female" class="form-label">Community Organization Hispanic/Latino Females</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-hispanic-female" name="field_comm_org_hispanic_female" value="<?= number_format($content['report_data'][0]['field_comm_org_hispanic_female']); ?>">
													</div>

												</div>
												<div class="col-md-6" style="display: none;">
													<div class="form-group">
														<label for="edit-field-comm-org-native-am-male" class="form-label">comm_org_native_am_male</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-native-am-male" name="field_comm_org_native_am_male" value="<?= number_format($content['report_data'][0]['field_comm_org_native_am_male']); ?>">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="edit-field-comm-org-other-male" class="form-label">Community Organization Other Males</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-other-male" name="field_comm_org_other_male" value="<?= number_format($content['report_data'][0]['field_comm_org_other_male']); ?>">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="edit-field-comm-org-other-female" class="form-label">Community Organization Other Females</label>
														<input type="text" class="form-control w-200px" id="edit-field-comm-org-other-female" name="field_comm_org_other_female" value="<?= number_format($content['report_data'][0]['field_comm_org_other_female']); ?>">
													</div>

												</div>
											</div>
											<div class="row g-4 align-items-end" style="display: none;">
												<div class="col-md-12">
													<div class="form-group">
														<label for="edit-field-comm-org-native-am-female" class="form-label">comm_org_native_am_female</label>
														<input type="text" class="form-control" id="edit-field-comm-org-native-am-female" name="field_comm_org_native_am_female" value="<?= number_format($content['report_data'][0]['field_comm_org_native_am_male']); ?>">
													</div>

												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="edit-field-comm-org-societal-impact" class="form-label">Community Organization Societal Impact</label>
														<input type="text" class="form-control" id="edit-field-comm-org-societal-impact" name="field_comm_org_societal_impact" value="<?= number_format($content['report_data'][0]['field_comm_org_societal_impact']); ?>">
													</div>

												</div>
											</div>

										</div>
										<hr>
										<div class="">
											<div class="form-group t-c formclassbtn">
												<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
												<button class="btn btn-danger m-r-15 btn-rounded" type="button" data-table_name="civic_engagement" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
												<button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
											</div>
										</div>
										<input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" id="hid_parent_census">
										<input type="hidden" value="<?= $content['report_data'][0]['pk_id']; ?>" name="pk_id" id="pk_id">
									</div>
								</form>
							</div>
							<div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
								<h4 class="title-head"></h4>
								<div class="tabilCard inner NulCard">
									<div class="contact-table table-responsive">
										<table class="table table-striped">
											<tbody>
												<tr>
													<td colspan="3"><span>Voter Registration</span> </td>
												</tr>
												<tr>
													<td class="w-50">Did your affiliate assist in voter registration?: </td>
													<td><span><?php if ($content['report_data'][0]['field_voter_registration'] == 1) {
																	echo "Yes";
																} elseif ($content['report_data'][0]['field_voter_registration'] == 0 && $content['report_data'][0]['field_voter_registration'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_voter_registration'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>

													<td class="w-50">Did your affiliate provide assistance in getting voters to the polls? : </td>
													<td><span><?php if ($content['report_data'][0]['field_did_your_affiliate_provide'] == 1 && $content['report_data'][0]['field_did_your_affiliate_provide'] != '') {
																	echo "Yes";
																} else if ($content['report_data'][0]['field_did_your_affiliate_provide'] == 0 && $content['report_data'][0]['field_did_your_affiliate_provide'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_did_your_affiliate_provide'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Total Served: </td>
													<td><span><?= number_format($content['report_data'][0]['field_voter_total']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Please Describe: </td>
													<td><span><?= $content['report_data'][0]['field_please_describe_vt']; ?></span></td>
												</tr>

											</tbody>

										</table>
										<table class="table table-striped">
											<tbody>
												<tr></tr>
												<tr>
													<td class="w-50 h5 fw-bold">Race</td>

													<td class="h5 fw-bold">Male</td>
													<td class="h5 fw-bold">Female</td>
												</tr>
												<tr>
													<td class="w-50">White </td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_white_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_white_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Hispanic/Latino </td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_hispanic_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_hispanic_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Asian American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_asian_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_asian_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Native American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_native_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_native_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">African American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_african_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_african_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Other </td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_other_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_other_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50"><b>Total Number Served or Registered (Male and Female)</b></td>
													<td></td>
													<td><span><?=  number_format($content['report_data'][0]['field_voter_societal_impact']); ?></span></td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped">
											<tbody>
												<tr></tr>
												<tr>
													<td colspan="3"><span>Community Forums</span></td>
												</tr>
												<tr>
													<td class="w-50">Did your affiliate hold Community Forums?: </td>
													<td><span><?php if ($content['report_data'][0]['field_community_forums'] == 1) {
																	echo "Yes";
																} elseif ($content['report_data'][0]['field_community_forums'] == 0 && $content['report_data'][0]['field_community_forums'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_community_forums'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Community Forums Total Served: </td>
													<td><span><?= number_format($content['report_data'][0]['field_forums_total']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Please Describe: </td>
													<td><span><?= $content['report_data'][0]['field_forums_description']; ?></span></td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped">
											<tbody>
												<tr></tr>
												<tr>
													<td class="w-50 h5 fw-bold">Race</td>
													<td class="h5 fw-bold">Male</td>
													<td class="h5 fw-bold">Female</td>
												</tr>
												<tr>
													<td class="w-50">White </td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_white_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_white_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Hispanic/Latino </td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_hispanic_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_hispanic_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Asian American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_asian_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_asian_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Native American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_native_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_native_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">African American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_african_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_african_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Other </td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_other_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_other_female']); ?></span></td>
												</tr>
												<tr>
													<td><b>Total Number Served or Registered (Male and Female)</b></td>
													<td></td>
													<td><span><?=  number_format($content['report_data'][0]['field_forums_societal_impact']); ?></span></td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped">
											<tbody>
												<tr></tr>
												<tr>
													<td colspan="3"> <span>Civil Rights and Racial Justice Activities</span></td>
												</tr>
												<tr>
													<td class="w-50">Did your affiliate engage in Civil Rights and Justice Activities?: </td>
													<td><span><?php if ($content['report_data'][0]['field_crja'] == 1 && $content['report_data'][0]['field_crja'] != '') {
																	echo "Yes";
																} elseif ($content['report_data'][0]['field_crja'] == 0 && $content['report_data'][0]['field_crja'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_crja'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Racial Justice Total Served: </td>
													<td><span><?= number_format($content['report_data'][0]['field_crja_total']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Please Describe: </td>
													<td><span><?= $content['report_data'][0]['field_please_describe_crja']; ?></span></td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped">
											<tbody>
												<tr></tr>
												<tr>
													<td class="w-50 h5 fw-bold">Race</td>
													<td class="h5 fw-bold">Male</td>
													<td class="h5 fw-bold">Female</td>
												</tr>
												<tr>
													<td class="w-50">White </td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_white_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_white_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Hispanic/Latino </td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_hispanic_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_hispanic_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Asian American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_asian_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_asian_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Native American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_native_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_native_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">African American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_african_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_african_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Other </td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_other_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_other_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50"><b>Total Number Served or Registered (Male and Female)</b> </td>
													<td></td>
													<td><span><?=  number_format($content['report_data'][0]['field_crja_societal_impact']); ?></span></td>
												</tr>
											</tbody>
										</table>

										<table class="table table-striped">
											<tbody>
												<tr></tr>
												<tr>
													<td colspan="3"><span>Police Brutality</span></td>
												</tr>
												<tr>
													<td class="w-50">Did your affiliate participate in activism related to Police Brutality?: </td>
													<td><span><?php if ($content['report_data'][0]['field_police_brutality'] == 1) {
																	echo "Yes";
																} elseif ($content['report_data'][0]['field_police_brutality'] == 0 && $content['report_data'][0]['field_police_brutality'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_police_brutality'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Police Brutality Total Served: </td>
													<td><span><?= number_format($content['report_data'][0]['field_police_total']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Please Describe: </td>
													<td><span><?= $content['report_data'][0]['field_please_describe_pb']; ?></span></td>
												</tr>
											</tbody>
										</table>


										<table class="table table-striped">
											<tbody>
												<tr></tr>
												<tr>
													<td class="w-50 h5 fw-bold">Race</td>
													<td class="h5 fw-bold">Male</td>
													<td class="h5 fw-bold">Female</td>
												</tr>
												<tr>
													<td class="w-50">White </td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_white_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_white_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Hispanic/Latino </td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_hispanic_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_hispanic_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Asian American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_asian_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_asian_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Native American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_native_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_native_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">African American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_african_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_african_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Other </td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_other_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_other_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50"><b>Total Number Served or Registered (Male and Female)</b> </td>
													<td></td>
													<td><span><?=  number_format($content['report_data'][0]['field_police_societal_impact']); ?></span></td>
												</tr>
											</tbody>
										</table>

										<table class="table table-striped">
											<tbody>
												<tr></tr>
												<tr>
													<td colspan="3"><span>Advocacy Efforts</span></td>
												</tr>
												<tr>
													<td class="w-50">Does the affiliate assist in Advocacy Efforts?: </td>
													<td><span><?php if ($content['report_data'][0]['field_advocacy_efforts'] == 1) {
																	echo "Yes";
																} elseif ($content['report_data'][0]['field_advocacy_efforts'] == 0 && $content['report_data'][0]['field_advocacy_efforts'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_advocacy_efforts'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Advocacy Total Served: </td>
													<td><span><?= number_format($content['report_data'][0]['field_advocacy_total']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Please Describe: </td>
													<td><span><?= $content['report_data'][0]['field_advoacy_research']; ?></span></td>
												</tr>
											</tbody>
										</table>

										<table class="table table-striped">
											<tbody>
												<tr></tr>
												<tr>
													<td class="w-50 h5 fw-bold">Race</td>
													<td class="h5 fw-bold">Male</td>
													<td class="h5 fw-bold">Female</td>
												</tr>
												<tr>
													<td class="w-50">White </td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_white_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_white_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Hispanic/Latino </td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_hispanic_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_hispanic_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Asian American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_asian_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_asian_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Native American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_native_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_native_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">African American </td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_african_am_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_african_am_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50">Other </td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_other_male']); ?></span></td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_other_female']); ?></span></td>
												</tr>
												<tr>
													<td class="w-50"> <b>Total Number Served or Registered (Male and Female)</b></td>
													<td></td>
													<td><span><?=  number_format($content['report_data'][0]['field_advocacy_societal_impact']); ?></span></td>
												</tr>
											</tbody>
										</table>

										<table class="table table-striped">
											<tbody>
												<tr>
													<td class="w-50">Research (Please Describe): </td>
													<td><span><?= $content['report_data'][0]['field_advocacy_description']; ?></span></td>
												</tr>
												<?php if ($this->session->role_id == 1) { ?>
													<tr>
														<td>legacy_voter duplicate tot:</td>
														<td><?= $content['report_data'][0]['field_legacy_comm_org_dup_tot']; ?></td>
													</tr>
													<tr>
														<td>legacy comm org dup tot:
														</td>
														<td>
															<?= $content['report_data'][0]['field_legacy_comm_org_dup_tot']; ?>
														</td>
													</tr>
													<tr>
														<td>legacy_forums_dup_tot: </td>
														<td><?= $content['report_data'][0]['field_legacy_forums_dup_tot']; ?></td>
													</tr>
													<tr>
														<td>legacy_crja_dup_tot: </td>
														<td><?= $content['report_data'][0]['field_legacy_crja_dup_tot']; ?></td>
													</tr>
													<tr>
														<td>legacy_police_dup_tot: </td>
														<td><?= $content['report_data'][0]['field_legacy_police_dup_tot']; ?></td>
													</tr>
													<tr>
														<td>legacy_advocacy_dup_tot: </td>
														<td><?= $content['report_data'][0]['field_legacy_advocacy_dup_tot']; ?>
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
					</div>
				</div>
			</div>
		</div>
	</div>
</main>