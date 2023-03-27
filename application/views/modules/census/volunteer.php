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
						<div class="h5 Subtittle text-primary"><b> Volunteers/Members</b></div>
						<?php if ($this->session->role_id != 1) {
							if ($statuses['volunteer']['status'] != "Submitted" && $statuses['volunteer']['status'] != "Reviewed Complete") { ?>
								<nav class="innerTab">
									<div class="nav nav-pills" id="nav-tab" role="tablist">
										<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
									</div>
									<?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="volunteers_members" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
										</div>
									<?php } ?>
									<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="volunteers_members" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
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
										<button type="button" id="volunteers_members" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="volunteers_members" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
									</div>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="volunteers_members" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
								<?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="volunteers_members" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
							</nav>
						<?php }

						if (isset($_GET['msg'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Volunteer data has been updated.</div>
						<?php } ?>
						<?php if (isset($_GET['tab_message'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
						<?php } ?>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
								<form id="edit-volunteer" method="post" action="<?php echo base_url('module/forms_update/volunteer/update'); ?>">
									<div class="full_form">
									<div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
										<div class="row g-4 align-items-end p-b-20 our-affiliate-volunteer-programs">
											<?php if ($this->session->role_id == 1) { ?>
												<div class="col-md-12">
													<div class="form-group">
														<label for="edit-title" class="form-label">Title <span>*</span></label>
														<input type="text" class="form-control" id="edit-title" value="Volunteers/Members" required readonly>
													</div>
												</div>
											<?php } ?>
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-is-there-a-guild" class="form-label">Is there any Guild?</label><br>
													<label class="radio">
														<input type="radio" value="2" id="edit-field-is-there-a-guild-none" name="field_is_there_a_guild_" <?php if ($content['report_data'][0]['field_is_there_a_guild_'] == 2) echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-is-there-a-guild-none"> N/A </label>
													</label>
													<label class="radio">
														<input type="radio" value="0" id="edit-field-is-there-a-guild-0" name="field_is_there_a_guild_" <?php if ($content['report_data'][0]['field_is_there_a_guild_'] == 0 && $content['report_data'][0]['field_is_there_a_guild_'] != '') echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-is-there-a-guild-0"> No </label>
													</label>
													<label class="radio">
														<input type="radio" value="1" id="edit-field-is-there-a-guild-1" name="field_is_there_a_guild_" <?php if ($content['report_data'][0]['field_is_there_a_guild_'] == 1) echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-is-there-a-guild-1"> Yes </label>
													</label>
												</div>
											</div>
										</div>


										<div class="row g-4 align-items-end  p-b-10">
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-guild-members" class="form-label"># of Members in guild </label>
													<input type="text" class="form-control w-200px" id="edit-field-guild-members" value="<?= number_format($content['report_data'][0]['field_guild_members']); ?>" name="field_guild_members">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="field_guild_male" class="form-label"># of guild Males</label>
													<input class="form-control w-200px" id="field_guild_male" name="field_guild_male" value="<?= number_format($content['report_data'][0]['field_guild_male']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-guild-female" class="form-label"># of guild Females</label>
													<input type="text" class="form-control w-200px" id="edit-field-guild-female" name="field_guild_female" value="<?= number_format($content['report_data'][0]['field_guild_female']); ?>">
												</div>
											</div>
										</div>
										<div class="row g-4 align-items-end  p-b-10">
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-guild-white" class="form-label"># of guild White</label>
													<input type="text" class="form-control w-200px" id="edit-field-guild-white" name="field_guild_white" value="<?= number_format($content['report_data'][0]['field_guild_white']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-guild-hispanic-latino" class="form-label"># of guild Hispanic/Latino</label>
													<input type="text" class="form-control w-200px" id="edit-field-guild-hispanic-latino" name="field_guild_hispanic_latino" value="<?= number_format($content['report_data'][0]['field_guild_hispanic_latino']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-guild-asian-american" class="form-label"># of guild Asian American</label>
													<input type="text" class="form-control w-200px" id="edit-field-guild-asian-american" name="field_guild_asian_american" value="<?= number_format($content['report_data'][0]['field_guild_asian_american']); ?>">
												</div>

											</div>
										</div>
										<div class="row g-4 align-items-end  p-b-20">
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-guild-native-american" class="form-label"># of guild Native American</label>
													<input type="text" class="form-control w-200px" id="edit-field-guild-native-american" name="field_guild_native_american" value="<?= number_format($content['report_data'][0]['field_guild_native_american']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-guild-african-american" class="form-label"># of guild African American</label>
													<input type="text" class="form-control w-200px" id="edit-field-guild-african-american" name="field_guild_african_american" value="<?= number_format($content['report_data'][0]['field_guild_african_american']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-guild-other-heritage" class="form-label"># of guild Other Heritage</label>
													<input type="text" class="form-control w-200px" id="edit-field-guild-other-heritage" name="field_guild_other_heritage" value="<?= number_format($content['report_data'][0]['field_guild_other_heritage']); ?>">
												</div>

											</div>
										</div>
										<div class="tabilCard NulCard EmployeeCard">
											<div class="contact-table table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th>Age groupings: How many members in the following age groups ?</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<div class="row g-4 align-items-end p-b-20">
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-guild-16-20" class="form-label"># of guild age 16-20</label>
																			<input type="text" class="form-control w-200px" id="edit-field-guild-16-20" name="field_guild_16_20" value="<?= number_format($content['report_data'][0]['field_guild_16_20']); ?>">
																		</div>
																	</div>
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-guild-21-30" class="form-label"># of guild age 21-30</label>
																			<input type="text" class="form-control w-200px" id="edit-field-guild-21-30" name="field_guild_21_30" value="<?= number_format($content['report_data'][0]['field_guild_21_30']); ?>">
																		</div>

																	</div> 
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-guild-31-40" class="form-label"># of guild age 31-40</label>
																			<input type="text" class="form-control w-200px" id="edit-field-guild-31-40" name="field_guild_31_40" value="<?= number_format($content['report_data'][0]['field_guild_31_40']); ?>">
																		</div>
																	</div>
																</div>
																<div class="row g-4 align-items-end p-b-20">
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-guild-41-65" class="form-label"># of guild age 41-65</label>
																			<input type="text" class="form-control w-200px" id="edit-field-guild-41-65" name="field_guild_41_65" value="<?= number_format($content['report_data'][0]['field_guild_41_65']); ?>">
																		</div>

																	</div>
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-guild-66-81" class="form-label"># of guild age 66-81</label>
																			<input type="text" class="form-control w-200px" id="edit-field-guild-66-81" name="field_guild_66_81" value="<?= number_format($content['report_data'][0]['field_guild_66_81']); ?>">
																		</div>
																	</div>
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-guild-82-and-above" class="form-label"># of guild age 82 and above</label>
																			<input type="text" class="form-control w-200px" id="edit-field-guild-82-and-above" name="field_guild_82_and_above" value="<?= number_format($content['report_data'][0]['field_guild_82_and_above']); ?>">
																		</div>

																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<br>
										<div class="inpgrp">
											<div class="form-group">
												<label for="edit-field-is-there-a-ypc" class="form-label">Is there a Young Professionals Chapter? </label>
												<br>
												<label class="radio">
													<input type="radio" value="2" id="edit-field-is-there-a-ypc-none" name="field_is_there_a_ypc" <?php if ($content['report_data'][0]['field_is_there_a_ypc'] == 2) echo 'checked="checked"'; ?>>
													<label class="label p-r-10" for="edit-field-is-there-a-ypc-none"> N/A </label>
												</label>
												<label class="radio">
													<input type="radio" value="0" id="edit-field-is-there-a-ypc-0" name="field_is_there_a_ypc" <?php if ($content['report_data'][0]['field_is_there_a_ypc'] == 0 && $content['report_data'][0]['field_is_there_a_ypc'] != '') echo 'checked="checked"'; ?>>
													<label class="label p-r-10" for="edit-field-is-there-a-ypc-0"> No </label>
												</label>
												<label class="radio">
													<input type="radio" value="1" id="edit-field-is-there-a-ypc-1" name="field_is_there_a_ypc" <?php if ($content['report_data'][0]['field_is_there_a_ypc'] == 1) echo 'checked="checked"'; ?>>
													<label class="label p-r-10" for="edit-field-is-there-a-ypc-1"> Yes </label>
												</label>

											</div>
										</div>



										<div class="row g-4 align-items-end p-t-10 p-b-10">
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-ypc-members" class="form-label"># of Young Professionals Chapter Members</label>
													<input type="text" class="form-control" id="edit-field-ypc-members" name="field_ypc_members" value="<?= number_format($content['report_data'][0]['field_ypc_members']); ?>">
												</div>

											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-ypc-male" class="form-label"># of Young Professionals Chapter Males</label>
													<input type="text" class="form-control" id="edit-field-ypc-male" name="field_ypc_male" value="<?= number_format($content['report_data'][0]['field_ypc_male']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-ypc-female" class="form-label"># of Young Professionals Chapter Females</label>
													<input type="text" class="form-control" id="edit-field-ypc-female" name="field_ypc_female" value="<?= number_format($content['report_data'][0]['field_ypc_female']); ?>">
												</div>
											</div>
										</div>

										<div class="row g-4 align-items-end p-b-10">
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-ypc-white" class="form-label"># of Young Professionals Chapter Whites</label>
													<input type="text" class="form-control" id="edit-field-ypc-white" name="field_ypc_white" value="<?= number_format($content['report_data'][0]['field_ypc_white']); ?>">
												</div>

											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-ypc-hispanic-latino" class="form-label"># of Young Professionals Chapter Hispanic/Latino</label>
													<input type="text" class="form-control" id="edit-field-ypc-hispanic-latino" name="field_ypc_hispanic_latino" value="<?= number_format($content['report_data'][0]['field_ypc_hispanic_latino']); ?>">
												</div>

											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-ypc-asian-american" class="form-label"># of Young Professionals Chapter Asian American</label>
													<input type="text" class="form-control" id="edit-field-ypc-asian-american" name="field_ypc_asian_american" value="<?= number_format($content['report_data'][0]['field_ypc_asian_american']); ?>">
												</div>

											</div>
										</div>
										<div class="row g-4 align-items-end  p-b-20">
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-ypc-native-american" class="form-label"># of Young Professionals Chapter Native American</label>
													<input type="text" class="form-control" id="edit-field-ypc-native-american" name="field_ypc_native_american" value="<?= number_format($content['report_data'][0]['field_ypc_native_american']); ?>">
												</div>

											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-ypc-african-american" class="form-label"># of Young Professionals Chapter African American</label>
													<input type="text" class="form-control" id="edit-field-ypc-african-american" name="field_ypc_african_american" value="<?= number_format($content['report_data'][0]['field_ypc_african_american']); ?>">
												</div>

											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-ypc-other-heritage" class="form-label"># of Young Professionals Chapter Other Heritage</label>
													<input type="text" class="form-control" id="edit-field-ypc-other-heritage" name="field_ypc_other_heritage" value="<?= number_format($content['report_data'][0]['field_ypc_other_heritage']); ?>">
												</div>

											</div>
										</div>

										<div class="tabilCard NulCard EmployeeCard">
											<div class="contact-table table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th>Age groupings: How many members in the following age groups ?</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<div class="row g-4 align-items-end   p-b-10">
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-ypc-16-20" class="form-label"># of Young Professionals Chapter age 16-20</label>
																			<input type="text" class="form-control w-200px" id="edit-field-ypc-16-20" name="field_ypc_16_20" value="<?= number_format($content['report_data'][0]['field_ypc_16_20']); ?>">
																		</div>
																	</div>
																	<div class="col-md-8">
																		<div class="form-group">
																			<div class="form-group">
																				<label for="edit-field-ypc-21-30" class="form-label"># of Young Professionals Chapter age 21-30</label>
																				<input type="text" class="form-control w-200px" id="edit-field-ypc-21-30" name="field_ypc_21_30" value="<?= number_format($content['report_data'][0]['field_ypc_21_30']); ?>">
																			</div>
																		</div> 
																	</div> 
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-ypc-31-40" class="form-label"># of Young Professionals Chapter age 31-40</label>
																			<input type="text" class="form-control w-200px" id="edit-field-ypc-31-40" name="field_ypc_31_40" value="<?= number_format($content['report_data'][0]['field_ypc_31_40']); ?>">
																		</div>
																	</div>
																</div>
																<div class="row g-4 align-items-end p-b-10">
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-ypc-41-65" class="form-label"># of Young Professionals Chapter age 41-65</label>
																			<input type="text" class="form-control w-200px" id="edit-field-ypc-41-65" name="field_ypc_41_65" value="<?= number_format($content['report_data'][0]['field_ypc_41_65']); ?>">
																		</div>

																	</div>
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-ypc-66-81" class="form-label"># of Young Professionals Chapter age 66-81</label>
																			<input type="text" class="form-control w-200px" id="edit-field-ypc-66-81" name="field_ypc_66_81" value="<?= number_format($content['report_data'][0]['field_ypc_66_81']); ?>">
																		</div>
																	</div>
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-ypc-82-and-above" class="form-label"># of Young Professionals Chapter age 82 and above</label>
																			<input type="text" class="form-control w-200px" id="edit-field-ypc-82-and-above" name="field_ypc_82_and_above" value="<?= number_format($content['report_data'][0]['field_ypc_82_and_above']); ?>">
																		</div>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<br>
										<div class="inpgrp">
											<div class="form-group">
												<label for="edit-field-other-volunteer-aux-groups" class="form-label">Are there any other volunteer or member groups? </label>
												<br>
												<label class="radio">
													<input type="radio" value="2" id="edit-field-other-volunteer-aux-groups-none" name="field_other_volunteer_aux_groups" <?php if ($content['report_data'][0]['field_other_volunteer_aux_groups'] == 2) echo 'checked="checked"'; ?>>
													<label class="label p-r-10" for="edit-field-other-volunteer-aux-groups-none"> N/A </label>
												</label>
												<label class="radio">
													<input type="radio" value="0" id="edit-field-other-volunteer-aux-groups-0" name="field_other_volunteer_aux_groups" <?php if ($content['report_data'][0]['field_other_volunteer_aux_groups'] == 0 && $content['report_data'][0]['field_other_volunteer_aux_groups'] != '') echo 'checked="checked"'; ?>>
													<label class="label p-r-10" for="edit-field-other-volunteer-aux-groups-0"> No </label>
												</label>
												<label class="radio">
													<input type="radio" value="1" id="edit-field-other-volunteer-aux-groups-1" name="field_other_volunteer_aux_groups" <?php if ($content['report_data'][0]['field_other_volunteer_aux_groups'] == 1) echo 'checked="checked"'; ?>>
													<label class="label p-r-10" for="edit-field-other-volunteer-aux-groups-1"> Yes </label>
												</label>
											</div>
										</div>

										<div class="row g-4 align-items-end p-t-10 p-b-20">
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-aux-members" class="form-label"># of Group Members</label>
													<input type="text" class="form-control w-200px" id="edit-field-aux-members" name="field_aux_members" value="<?= number_format($content['report_data'][0]['field_aux_members']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-aux-male" class="form-label"># of Member Group Males</label>
													<input type="text" class="form-control w-200px" id="edit-field-aux-male" name="field_aux_male" value="<?= number_format($content['report_data'][0]['field_aux_male']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-aux-female" class="form-label"># of Member Group Females</label>
													<input type="text" class="form-control w-200px" id="edit-field-aux-female" name="field_aux_female" value="<?= number_format($content['report_data'][0]['field_aux_female']); ?>">
												</div>
											</div>
										</div>
										<div class="row g-4 align-items-end p-b-10">
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-aux-white" class="form-label"># of Member Group Whites</label>
													<input type="text" class="form-control w-200px" id="edit-field-aux-white" name="field_aux_white" value="<?= number_format($content['report_data'][0]['field_aux_white']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-aux-hispanic-latino" class="form-label"># of Member Group Hispanic/Latino</label>
													<input type="text" class="form-control w-200px" id="edit-field-aux-hispanic-latino" name="field_aux_hispanic_latino" value="<?= number_format($content['report_data'][0]['field_aux_hispanic_latino']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-aux-asian-american" class="form-label"># of Member Group Asian American</label>
													<input type="text" class="form-control w-200px" id="edit-field-aux-asian-american" name="field_aux_asian_american" value="<?= number_format($content['report_data'][0]['field_aux_asian_american']); ?>">
												</div>
											</div>
										</div>
										<div class="row g-4 align-items-end p-b-10">
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-aux-native-american" class="form-label"># of Member Group Native American</label>
													<input type="text" class="form-control w-200px" id="edit-field-aux-native-american" name="field_aux_native_american" value="<?= number_format($content['report_data'][0]['field_aux_native_american']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-aux-african-american" class="form-label"># of Member Group African American</label>
													<input type="text" class="form-control w-200px" id="edit-field-aux-african-american" name="field_aux_african_american" value="<?= number_format($content['report_data'][0]['field_aux_african_american']); ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="edit-field-aux-other-heritage" class="form-label"># of Member Group Other Heritage</label>
													<input type="text" class="form-control w-200px" id="edit-field-aux-other-heritage" name="field_aux_other_heritage" value="<?= number_format($content['report_data'][0]['field_aux_other_heritage']); ?>">
												</div>

											</div>
										</div>
										<div class="tabilCard NulCard EmployeeCard">
											<div class="contact-table table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th>Age groupings: How many members in the following age groups ?</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<div class="row g-4 align-items-end p-t-10 p-b-20">
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-aux-16-20" class="form-label"># of Member Group age 16-20</label>
																			<input type="text" class="form-control w-200px" id="edit-field-aux-16-20" name="field_aux_16_20" value="<?= number_format($content['report_data'][0]['field_aux_16_20']); ?>">
																		</div>
																	</div>
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-aux-21-30" class="form-label"># of Member Group age 21-30</label>
																			<input type="text" class="form-control w-200px" id="edit-field-aux-21-30" name="field_aux_21_30" value="<?= number_format($content['report_data'][0]['field_aux_21_30']); ?>">
																		</div>
																	</div> 
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-aux-31-40" class="form-label"># of Member Group age 31-40</label>
																			<input type="text" class="form-control w-200px" id="edit-field-aux-31-40" name="field_aux_31_40" value="<?= number_format($content['report_data'][0]['field_aux_31_40']); ?>">
																		</div>
																	</div>
																</div>
																<div class="row g-4 align-items-end   p-b-10">
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-aux-41-65" class="form-label"># of Member Group age 41-65</label>
																			<input type="text" class="form-control w-200px" id="edit-field-aux-41-65" name="field_aux_41_65" value="<?= number_format($content['report_data'][0]['field_aux_41_65']); ?>">
																		</div>
																	</div>
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-aux-66-81" class="form-label"># of Member Group age 66-81</label>
																			<input type="text" class="form-control w-200px" id="edit-field-aux-66-81" name="field_aux_66_81" value="<?= number_format($content['report_data'][0]['field_aux_66_81']); ?>">
																		</div>
																	</div>
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="edit-field-aux-82-and-above" class="form-label"># of Member Group age 82 and above</label>
																			<input type="text" class="form-control w-200px" id="edit-field-aux-82-and-above" name="field_aux_82_and_above" value="<?= number_format($content['report_data'][0]['field_aux_82_and_above']); ?>">
																		</div>

																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<br>

										<div class="inpgrp">
											<div class="form-group">
												<label for="edit-field-volunteer-total" class="form-label">What is the total number of volunteers for your
													affiliate?
												</label>
												<input type="text" class="form-control w-200px" id="edit-field-volunteer-total" name="field_volunteer_total" value="<?= number_format($content['report_data'][0]['field_volunteer_total']); ?>">
											</div>
										</div>
										<div class="row g-4 align-items-end">
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
											<?php if ($this->session->role_id == 1) { ?>
												<div class="col-md-12">
													<div class="form-group">
														<label for="field_parent_census" class="form-label">Parent census <span>*</span></label>
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
														<label for="field_parent_census" class="form-label">Parent census <span>*</span></label>
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
										<div class="">
											<div class="form-group t-c formclassbtn">
												<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
												<button class="btn btn-danger m-r-15 btn-rounded" type="button" data-status_id="<?= $statuses['volunteer']['status'];?>" data-table_name="volunteers_members" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
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
													<td colspan="2"><span class="text-primary">Guild </span></td>
												</tr>
												<tr>
													<td><span>Is there a Guild?: </span></td>
													<td><span><?php if ($content['report_data'][0]['field_is_there_a_guild_'] == 1) {
																	echo "Yes";
																} elseif ($content['report_data'][0]['field_is_there_a_guild_'] == 0 && $content['report_data'][0]['field_is_there_a_guild_'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_is_there_a_guild_'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>
													<td><span># of Members in guild: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_guild_members']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Guild Males: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_guild_male']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Guild Females: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_guild_female']); ?></span></td>
												</tr>
												<tr>
													<td colspan="2">AGE GROUPINGS: How many members in the following age groups? </td>
												</tr>
												<tr>
													<td><span># of Guild age 16-20: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_guild_16_20']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Guild age 21-30: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_guild_21_30']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Guild age 31-40: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_guild_31_40']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Guild age 41-65: <s /pan></td>
													<td><span><?= number_format($content['report_data'][0]['field_guild_41_65']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Guild age 66-81: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_guild_66_81']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Guild age 82 and above: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_guild_82_and_above']); ?></span></td>
												</tr>
												<tr>
													<td colspan="2"><span class="text-primary">Young Professionals Chapter </span> </td>
												</tr>
												<tr>
													<td><span>Is there a Young Professionals Chapter?: </span></td>
													<td><span><?php if ($content['report_data'][0]['field_is_there_a_ypc'] == 1) {
																	echo "Yes";
																} elseif ($content['report_data'][0]['field_is_there_a_ypc'] == 0 && $content['report_data'][0]['field_is_there_a_ypc'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_is_there_a_ypc'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>
													<td><span># of Young Professionals Chapter Members: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_ypc_members']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Young Professionals Chapter Males: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_ypc_male']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Young Professionals Chapter Females: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_ypc_female']); ?></span></td>
												</tr>
												<tr>
													<td colspan="2">AGE GROUPINGS: How many members in the following age groups? </td>
												</tr>
												<tr>
													<td><span># of Young Professionals Chapter age 16-20: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_ypc_16_20']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Young Professionals Chapter age 21-30: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_ypc_21_30']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Young Professionals Chapter age 31-40: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_ypc_31_40']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Young Professionals Chapter age 41-65: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_ypc_41_65']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Young Professionals Chapter age 66-81: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_ypc_66_81']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Young Professionals Chapter age 82 and above: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_ypc_82_and_above']); ?></span></td>
												</tr>
												<!-- <tr>
                            <td >Number Served</td>
                              <td ></td>
                            </tr> -->
											</tbody>
										</table>
										<table class="table table-striped">
											<tbody>
												<tr>
													<td colspan="2"><span class="text-primary">Volunteer or Auxiliary Groups </span></td>
												</tr>
												<tr>
													<td><span>Are there any other volunteer or member groups?: </span></td>
													<td><span><?php if ($content['report_data'][0]['field_other_volunteer_aux_groups'] == 1) {
																	echo "Yes";
																} elseif ($content['report_data'][0]['field_other_volunteer_aux_groups'] == 0 && $content['report_data'][0]['field_other_volunteer_aux_groups'] != '') {
																	echo "No";
																} elseif ($content['report_data'][0]['field_other_volunteer_aux_groups'] == 2) {
																	echo "N/A";
																}; ?></span></td>
												</tr>
												<tr>
													<td><span># of Group Members: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_aux_members']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Member Group Males: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_aux_male']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Member Group Females: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_aux_female']); ?></span></td>
												</tr>
												<tr>
													<td colspan="2">AGE GROUPINGS: How many members in the following age groups? </td>
												</tr>
												<tr>
													<td><span># of Member Group age 16-20: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_aux_16_20']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Member Group age 21-30: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_aux_21_30']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Member Group age 31-40: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_aux_31_40']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Member Group age 41-65: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_aux_41_65']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Member Group age 66-81: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_aux_66_81']); ?></span></td>
												</tr>
												<tr>
													<td><span># of Member Group age 82 and above: </span></td>
													<td><span><?= number_format($content['report_data'][0]['field_aux_82_and_above']); ?></span></td>
												</tr>
												<tr>
													<td>What is the total number of volunteers for your affiliate?: </td>
													<td><span><?= number_format($content['report_data'][0]['field_volunteer_total']); ?></span></td>
												</tr>
												<?php if ($this->session->role_id == 1) { ?>
													<tr>
														<td># of Young Professionals Chapter Native American: </td>
														<td><span><?= number_format($content['report_data'][0]['field_ypc_native_american']); ?></span></td>
													</tr>
													<tr>
														<td># of Member Group African American: </td>
														<td><span><?= number_format($content['report_data'][0]['field_aux_african_american']); ?></span></td>
													</tr>
													<tr>
														<td># of Guild Native American: </td>
														<td><span><?= number_format($content['report_data'][0]['field_guild_native_american']); ?></span></td>
													</tr>
													<tr>
														<td># of Guild African American: </td>
														<td><span><?= number_format($content['report_data'][0]['field_guild_african_american']); ?></span></td>
													</tr>
													<tr>
														<td># of Member Group Other Heritage: </td>
														<td><span><?= number_format($content['report_data'][0]['field_aux_other_heritage']); ?></span></td>
													</tr>
													<tr>
														<td># of Young Professionals Chapter African American: </td>
														<td><span><?= number_format($content['report_data'][0]['field_ypc_african_american']); ?></span></td>
													</tr>
													<tr>
														<td># of Young Professionals Chapter Other Heritage: </td>
														<td><span><?= number_format($content['report_data'][0]['field_ypc_other_heritage']); ?></span></td>
													</tr>
													<tr>
														<td># of Guild Other Heritage: </td>
														<td><span><?= number_format($content['report_data'][0]['field_guild_other_heritage']); ?></span></td>
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