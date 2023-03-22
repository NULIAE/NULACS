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
						<div class="h5 Subtittle text-primary"><b>Covid Impact</b></div>
						<?php if ($this->session->role_id != 1) {

							if ($statuses['covid']['status'] != "Submitted" && $statuses['covid']['status'] != "Reviewed Complete") { ?>
								<nav class="innerTab">
									<div class="nav nav-pills" id="nav-tab" role="tablist">
									<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
									</div>
									<?php if($content['report_data'][0]['field_tab_status']  == 120){ ?>
									<div class="nav nav-pills" id="" role="tablist">
									<button type="button" id="covid_impact" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
									</div>
									<?php } ?>
									<?php if($content['report_data'][0]['field_tab_status']  == 121){ ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="covid_impact" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,124)"><i class="i i-resubmit"></i></button>
										</div>
									<?php } ?>
								</nav>
							<?php }
						} elseif ($this->session->role_id == 1) { ?>
							<nav class="innerTab">
								<div class="nav nav-pills" id="nav-tab" role="tablist">
								<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
								</div>
								<?php if($content['report_data'][0]['field_tab_status']  == 120){ ?>
								<div class="nav nav-pills" id="" role="tablist">
								<button type="button" id="covid_impact" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
								</div>
								<?php } ?>
								<?php if($content['report_data'][0]['field_tab_status']  == 124){ ?>
									<div class="nav nav-pills" id="" role="tablist">
									<button type="button" id="covid_impact" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,123)"><i class="i i-reviewed"></i></button>
									</div>
									<div class="nav nav-pills" id="" role="tablist">
									<button type="button" id="covid_impact" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,121)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
								<?php if($content['report_data'][0]['field_tab_status']  == 121){ ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="covid_impact" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,124)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
							</nav>
						<?php }

						if (isset($_GET['msg'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Covid Impact data has been updated.</div>
						<?php } ?>
						<?php if (isset($_GET['tab_message'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
						<?php } ?>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
								<form id="edit-covid" method="post" action="<?php echo base_url('module/forms_update/covid/update'); ?>">
									<div class="full_form">	
									<div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
									<div class="row align-items-end">
											<div class="col-md-12"  <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
												<div class="form-group">
													<label for="edit-title" class="form-label">Title <span>*</span></label>
													<input type="text" class="form-control" id="edit-title" value="Covid-19 Impact" required>
												</div>
											</div>
										</div>
									<div class="h6 tittle text-start " <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>Education Programs</div>
									<div class="tabilCard NulCard EmployeeCard"  <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
											<div class="table-responsive">
												<table class="table">
													<tbody>
														<tr>
															<td>
																<div class="row g-4 align-items-center p-b-20">
																	<div class="col-md-12">
																		<div class="form-group">
																			<label for="edit-field-did-the-affiliate-launch-o" class="form-label"> Did the affiliate launch or expand any new programs to provide supports to children and youth under Covid-19? </label>
																			<br>
																			<label class="radio">
																				<input type="radio" value="2" id="edit-field-did-the-affiliate-launch-o-none" name="field_did_the_affiliate_launch_o" <?php if ($content['report_data'][0]['field_did_the_affiliate_launch_o'] == '2') echo 'checked="checked"'; ?>>
																				<label class="label p-r-10" for="edit-field-did-the-affiliate-launch-o-none"> N/A </label>
																			</label>
																			<label class="radio">
																				<input type="radio" value="0" id="edit-field-did-the-affiliate-launch-o-0" name="field_did_the_affiliate_launch_o" <?php if ($content['report_data'][0]['field_did_the_affiliate_launch_o'] == 0 && $content['report_data'][0]['field_did_the_affiliate_launch_o'] != '') echo 'checked="checked"'; ?>>
																				<label class="label p-r-10" for="edit-field-did-the-affiliate-launch-o-0"> No </label>
																			</label>
																			<label class="radio">
																				<input type="radio" value="1" id="edit-field-did-the-affiliate-launch-o-1" name="field_did_the_affiliate_launch_o" <?php if ($content['report_data'][0]['field_did_the_affiliate_launch_o'] == 1) echo 'checked="checked"'; ?>>
																				<label class="label p-r-10" for="edit-field-did-the-affiliate-launch-o-1"> Yes </label>
																			</label>
																		</div>
																	</div>
																
																	<div class="col-md-12">
																		<div class="form-group">
																			<label for="edit-field-how-many-additional-childr" class="form-label">How many additional children and youth were served under these new programs? </label>
																			<input type="text" class="form-control w-200px" id="edit-field-how-many-additional-childr" name="field_how_many_additional_childr" value="<?= number_format($content['report_data'][0]['field_how_many_additional_childr']); ?>"> 
																		</div>
																	</div>
																</div>
																<div class="inpgrp">
																	<div class="form-group">
																		<label for="edit-field-what-kinds-of-supports-and" class="form-label">What kinds of supports and services were offered under these new programs? Please check all that apply: </label><br>
																		<div class="row g-4  p-b-20 ">
																			<div class="col-md-12">
																				<?php 
																				$ad_market = [];
																				foreach ($covid_impact_data_services as $key => $val) {
																					$ad_market[] = $val['field_what_kinds_of_supports'];
																				}
																				$method_of_advertising = array("Youth Development", "STEM or STEAM (Science, Technology, Engineering, Arts/Agriculture and Math/Medicine)", "College Readiness", "Career Readiness", "Mentoring", "Counseling/Social Work", "Health and Wellness (Mental, physical, etc.)", "Athletics", "Academic Support/Homework Help/Tutoring/Accelerated Learning");
																				$i = 0;
																				foreach ($method_of_advertising as $key =>$method) { 
																					if (in_array($key + 1, $ad_market)) {
																						$checked = "checked";
																					  } else {
																						$checked = "";
																					  }?>
																					  <?php if ($key % 2 == 0) {?>
																							<div class="form-group ">
																								<label class="checkbox <?php echo $checked; ?>">
																									<input type="checkbox" id="edit-field-what-kinds-of-supports-and-1-<?php echo $method; ?>" name="field_what_kinds_of_supports[]"  value="<?php echo $key + 1; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																									<label class="label" for="edit-field-what-kinds-of-supports-and-1-<?php echo $method; ?>"><?php echo $method; ?></label>
																								</label>
																							</div>
																					  <?php }?>
																				<?php $i++; };?>
																			</div>
																			<div class="col-md-12">
																				<?php 
																				$ad_market = [];
																				foreach ($covid_impact_data_services as $key => $val) {
																					$ad_market[] = $val['field_what_kinds_of_supports'];
																				}
																				$method_of_advertising = array("Youth Development", "STEM or STEAM (Science, Technology, Engineering, Arts/Agriculture and Math/Medicine)", "College Readiness", "Career Readiness", "Mentoring", "Counseling/Social Work", "Health and Wellness (Mental, physical, etc.)", "Athletics", "Academic Support/Homework Help/Tutoring/Accelerated Learning");

																				$i = 0;
																				foreach ($method_of_advertising as $key =>$method) { 
																					if (in_array($key + 1, $ad_market)) {
																						$checked = "checked";
																					  } else {
																						$checked = "";
																					  }?>
																					  <?php if ($key % 2 == 1) {?>
																							<div class="form-group ">
																								<label class="checkbox <?php echo $checked; ?>">
																									<input type="checkbox" id="edit-field-what-kinds-of-supports-and-1-<?php echo $method; ?>" name="field_what_kinds_of_supports[]"  value="<?php echo $key + 1; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																									<label class="label" for="edit-field-what-kinds-of-supports-and-1-<?php echo $method; ?>"><?php echo $method; ?></label>
																								</label>
																							</div>
																					  <?php }?>
																				<?php $i++; };?>
																			</div>
																		</div>
																		
																	</div>
																</div>

																
															</div>
														</div>

														<div class="row  p-b-30 inpgrp ">
															<div class="col-md-8">
																<div class="form-group">
																		<label for="edit-field-how-many-children-or-youth" class="form-label p-b-15">How many children or youth did the affiliate serve in-person? </label>
																		<input type="text" class="form-control w-200px" id="edit-field-how-many-children-or-youth" name="field_how_many_children_or_youth" value="<?= number_format($content['report_data'][0]['field_how_many_children_or_youth']); ?>" >
																	</div>
																</div>
														
															<div class="col-md-8">
																<div class="form-group">
																		<label for="edit-field-how-many-child-or-youth" class="form-label">How many children or youth did the affiliate serve in a hybrid environment (in-person and virtual)? </label>
																		<input type="text" class="form-control w-200px"  id="edit-field-how-many-child-or-youth" name="field_how_many_child_or_youth" value="<?= number_format($content['report_data'][0]['field_how_many_child_or_youth']); ?>" >
																	</div>
																</div>
															
															<div class="col-md-8">
															<div class="form-group">
																		<label for="edit-field-how-many-ch" class="form-label">How many children or youth did the affiliate serve in a completely remote or virtual environment? </label>
																		<input type="text" class="form-control w-200px" id="edit-field-how-many-ch" name="field_how_many_ch" value="<?= number_format($content['report_data'][0]['field_how_many_ch']); ?>" > 
																	</div>
																</div>
															</div>
															<div class="inpgrp">
																<div class="form-group">
																	<label for="edit-field-were-there-any-disruptions" class="form-label">Were there any disruptions in local partnerships? If yes, please check all that apply </label>
																	<div class="row g-4 ">
																		<div class="col-md-12">																			
																			<?php 
																				$covid_impact_discruption_data = [];
																				foreach ($covid_impact_disruptions as $key => $val) {
																					$covid_impact_discruption_data[] = $val['field_were_there_any_disruptions'];
																				}
																				$disruptions = array("School-based partnerships- limited access to school buildings, students and families", "Out of school time partnerships- limited access to museums, parks, recreational facilities, etc.", "Advocacy and engagement partnerships", "Parent, Family and Caregiver supports and services", "Internships or Summer Youth Employment placements", "Social service partnerships", "Health partnerships that serve children, youth and families (community clinics)", "Disruptions resulted in no new partnerships established");
																				$i = 0;
																				foreach ($disruptions as $key => $disruption_data) { 
																					if (in_array($key + 1, $covid_impact_discruption_data)) {
																						$checked = "checked";
																					  } else {
																						$checked = "";
																					  }	
																					?>
																					<?php if ($key % 2 == 0) {?>
																						<div class="form-group ">
																							<label class="checkbox <?php echo $checked; ?>">
																								<input type="checkbox" id="edit-field-were-there-any-disruptions-<?php echo $disruption_data; ?>" name="field_were_there_any_disruptions[]"  value="<?php echo $key + 1; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																								<label class="label" for="edit-field-were-there-any-disruptions-<?php echo $disruption_data; ?>"><?php echo $disruption_data; ?></label>
																							</label>
																						</div>
																					<?php }?>
																				<?php $i++; };?>
																		</div>
																		<div class="col-md-12">																			
																			<?php 
																				$covid_impact_discruption_data = [];
																				foreach ($covid_impact_disruptions as $key => $val) {
																					$covid_impact_discruption_data[] = $val['field_were_there_any_disruptions'];
																				}
																				$disruptions = array("School-based partnerships- limited access to school buildings, students and families", "Out of school time partnerships- limited access to museums, parks, recreational facilities, etc.", "Advocacy and engagement partnerships", "Parent, Family and Caregiver supports and services", "Internships or Summer Youth Employment placements", "Social service partnerships", "Health partnerships that serve children, youth and families (community clinics)", "Disruptions resulted in no new partnerships established");
																				$i = 0;
																				foreach ($disruptions as $key => $disruption_data) { 
																					if (in_array($key + 1, $covid_impact_discruption_data)) {
																						$checked = "checked";
																					  } else {
																						$checked = "";
																					  }	
																					?>
																					<?php if ($key % 2 == 1) {?>
																						<div class="form-group ">
																							<label class="checkbox <?php echo $checked; ?>">
																								<input type="checkbox" id="edit-field-were-there-any-disruptions-<?php echo $disruption_data; ?>" name="field_were_there_any_disruptions[]"  value="<?php echo $key + 1; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																								<label class="label" for="edit-field-were-there-any-disruptions-<?php echo $disruption_data; ?>"><?php echo $disruption_data; ?></label>
																							</label>
																						</div>
																					<?php }?>
																				<?php $i++; };?>
																		</div>
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
										<div class="h6 tittle text-start " <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>Health Programs</div>
										<div class="tabilCard NulCard EmployeeCard" <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
											<div class="table-responsive">
												<table class="table">
													<tbody>
														<tr>
															<td>
																<div class="form-group ">
																	<label for="edit-field-what-health-programs-do-yo" class="form-label">What health programs do you currently offer to your clients? </label>
																	<div class="row g-4 ">
																		<div class="col-md-12">
																			<?php 
																			$health_progam_data = [];
																			foreach ($covid_impact_health_pgm as $key => $val) {
																				$health_progam_data[] = $val['field_what_health_programs'];
																			}
																			$health_programs = array("General Health Education", "Access to Care", "COVID 19 Vaccine Outreach, Education and Access", "Nutritional access (food pantry, SNAP/WIC)", "Physical Activity", "Mental Health resources");
																				foreach($health_programs as $key => $health_data){																				
																					if (in_array($key+1, $health_progam_data)) {
																						$checked = "checked";
																					  } else {
																						$checked = "";
																					  }
																			?>
																			<?php if ($key % 2 == 0) {?>
																				<div class="form-group ">
																					<label class="checkbox <?php echo $checked; ?>">
																						<input type="checkbox" id="edit-field-what-health-programs-<?php echo $health_data;?>" name="field_what_health_programs[]" value="<?php echo $key+1;?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																						<label class="label" for="edit-field-what-health-programs-<?php echo $health_data;?>"><?php echo $health_data;?></label>
																					</label>
																				</div>
																			<?php } }?>
																		</div>
																		<div class="col-md-12">
																			<?php 
																			$health_progam_data = [];
																			foreach ($covid_impact_health_pgm as $key => $val) {
																				$health_progam_data[] = $val['field_what_health_programs'];
																			}
																			$health_programs = array("General Health Education", "Access to Care", "COVID 19 Vaccine Outreach, Education and Access", "Nutritional access (food pantry, SNAP/WIC)", "Physical Activity", "Mental Health resources");
																				foreach($health_programs as $key => $health_data){																				
																					if (in_array($key+1, $health_progam_data)) {
																						$checked = "checked";
																					  } else {
																						$checked = "";
																					  }
																			?>
																			<?php if ($key % 2 == 1) {?>
																				<div class="form-group ">
																					<label class="checkbox <?php echo $checked; ?>">
																						<input type="checkbox" id="edit-field-what-health-programs-<?php echo $health_data;?>" name="field_what_health_programs[]" value="<?php echo $key+1;?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																						<label class="label" for="edit-field-what-health-programs-<?php echo $health_data;?>"><?php echo $health_data;?></label>
																					</label>
																				</div>
																			<?php } }?>
																		</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<br>
										<div class="h6 tittle text-start " <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>Workforce Programs</div>
										<div class="tabilCard NulCard EmployeeCard" <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
											<div class="table-responsive">
												<table class="table">
													<tbody>
														<tr>
															<td>
															<div class="row g-4 align-items-end  p-b-20">
																<div class="col-md-12">
																<label for="edit-field-were-your-programs-impacte" class="form-label">Were your programs impacted by COVID? </label>
																	<br>
																	<label class="radio">
																		<input type="radio" value="2" id="edit-field-were-your-programs-impacte-none" name="field_were_your_programs_impacte" <?php if ($content['report_data'][0]['field_were_your_programs_impacte'] == '2') echo 'checked="checked"'; ?>>
																		<label class="label p-r-10" for="edit-field-were-your-programs-impacte-none"> N/A </label>
																	</label>
																	<label class="radio">
																		<input type="radio" value="0" id="edit-field-were-your-programs-impacte-0" name="field_were_your_programs_impacte" <?php if ($content['report_data'][0]['field_were_your_programs_impacte'] == 0 && $content['report_data'][0]['field_were_your_programs_impacte'] != '') echo 'checked="checked"'; ?>>
																		<label class="label p-r-10" for="edit-field-were-your-programs-impacte-0"> No </label>	
																	</label>
																	<label class="radio">
																		<input type="radio" value="1" id="edit-field-were-your-programs-impacte-1" name="field_were_your_programs_impacte" <?php if ($content['report_data'][0]['field_were_your_programs_impacte'] == '1') echo 'checked="checked"'; ?>>
																		<label class="label p-r-10" for="edit-field-were-your-programs-impacte-1"> Yes </label>
																	</label>
																
																</div>
																<div class="col-md-12">
																<label for="edit-field-were-job-placement-perform" class="form-label">Were job placement performances negatively impacted by COVID? </label>
																	<br>
																	<label class="radio">
																		<input type="radio" value="2" id="edit-field-were-job-placement-perform-none" name="field_were_job_placement_perform" <?php if ($content['report_data'][0]['field_were_job_placement_perform'] == '2') echo 'checked="checked"'; ?>>
																		<label class="label p-r-10" for="edit-field-were-job-placement-perform-none"> N/A </label>
																	</label>
																	<label class="radio">
																		<input type="radio" value="0" id="edit-field-were-job-placement-perform-0" name="field_were_job_placement_perform" <?php if ($content['report_data'][0]['field_were_job_placement_perform'] == 0 && $content['report_data'][0]['field_were_job_placement_perform'] != '') echo 'checked="checked"'; ?>>
																		<label class="label p-r-10" for="edit-field-were-job-placement-perform-0"> No </label>
																	</label>
																	<label class="radio">
																		<input type="radio" value="1" id="edit-field-were-job-placement-perform-1" name="field_were_job_placement_perform" <?php if ($content['report_data'][0]['field_were_job_placement_perform'] == '1') echo 'checked="checked"'; ?>>
																		<label class="label p-r-10" for="edit-field-were-job-placement-perform-1"> Yes </label>
																	</label>
																</div>
															</div>
													
															<div class="form-group  p-t-10">
															<label for="edit-field-by-your-estimates-by-how-m" class="form-label">By your estimates, by how much (percentage)? </label>
																<div class="col-sm-12">
																	<input type="text" class="form-control" id="edit-field-by-your-estimates-by-how-m" name="field_by_your_estimates_by_how_m" field placeholder="" value="<?= $content['report_data'][0]['field_by_your_estimates_by_how_m']; ?>">
																</div>
															</div>	
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<br>
										<div class="h6 tittle text-start " <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>Entrepreneurship Programs</div>
										<div class="tabilCard NulCard EmployeeCard" <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
											<div class="table-responsive">
												<table class="table">
													<tbody>
														<tr>
															<td>
																<div class="inpgrp">
																	<label for="edit-field-1-were-covid-19-relief-ser" class="form-label"> Were COVID-19 relief services provided to entrepreneurs (technical assistance, coaching, assistance applying for loans/grants </label>
																	<br>
																	<label class="radio">
																		<input type="radio" value="2" id="edit-field-1-were-covid-19-relief-ser-none" name="field_1_were_covid_19_relief_ser" <?php if ($content['report_data'][0]['field_1_were_covid_19_relief_ser'] == '2') echo 'checked="checked"'; ?>>
																		<label class="label p-r-10" for="edit-field-1-were-covid-19-relief-ser-none"> N/A </label>
																	</label>
																	<label class="radio">
																		<input type="radio" value="0" id="edit-field-1-were-covid-19-relief-ser-0" name="field_1_were_covid_19_relief_ser" <?php if ($content['report_data'][0]['field_1_were_covid_19_relief_ser'] == 0 && $content['report_data'][0]['field_1_were_covid_19_relief_ser'] != '') echo 'checked="checked"'; ?>>
																		<label class="label p-r-10" for="edit-field-1-were-covid-19-relief-ser-0"> No </label>
																	</label>
																	<label class="radio">
																		<input type="radio" value="1" id="edit-field-1-were-covid-19-relief-ser-1" name="field_1_were_covid_19_relief_ser" <?php if ($content['report_data'][0]['field_1_were_covid_19_relief_ser'] == '1') echo 'checked="checked"'; ?>>
																		<label class="label p-r-10" for="edit-field-1-were-covid-19-relief-ser-1"> Yes </label>
																	</label>
																</div>
																<div class="row g-4 align-items-end  p-t-20">
																	<div class="col-md-12">
																		<div class="inpgrp">
																			<div class="form-group">
																				<label for="edit-field-2-number-of-entrepreneursh" class="form-label">Number of entrepreneurship clients that applied for COVID-relief funding (loans or grants). </label>
																				<div class="col-sm-12">
																					<input type="text" class="form-control" id="edit-field-2-number-of-entrepreneursh" name="field_2_number_of_entrepreneursh" placeholder="" value="<?= number_format($content['report_data'][0]['field_2_number_of_entrepreneursh']); ?>">
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="inpgrp">
																			<div class="form-group">
																				<label for="edit-field-percentage-of-entrepreneur" class="form-label">Percentage of entrepreneurship clients applying that received COVID-relief funding. </label>
																				<div class="col-sm-12">
																				<input type="text" class="form-control" id="edit-field-percentage-ofNumber of entrepreneurship clients that applied for COVID-relief funding (lo-entrepreneur" name="field_percentage_of_entrepreneur" placeholder="" value="<?= $content['report_data'][0]['field_percentage_of_entrepreneur']; ?>">

																				</div>
																			</div>
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
										<div class="h6 tittle text-start " <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>Advocacy</div>
										<div class="tabilCard NulCard EmployeeCard" <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
											<div class="table-responsive">
												<table class="table">
													<tbody>
														<tr>
															<td>
															<div class="row g-4 align-items-end  p-t-20">
																<div class="col-md-12">
																	<div class="form-group">
																		<label for="field__how_many_times_did_you_me" class="form-label">How many times did you meet (virtual, call, or in-person) with your United States House of Representatives member in 2021? </label>
																		<div class="col-sm-12">
																			<input type="text" class="form-control w-200px" id="field__how_many_times_did_you_me" name="field__how_many_times_did_you_me" placeholder="" value="<?= number_format($content['report_data'][0]['field__how_many_times_did_you_me']); ?>">
																		</div>
																	</div>
																</div>
																<div class="col-md-12">
																	<div class="form-group">
																		<label for="field_how_many_times_did_you_mee" class="form-label">How many times did you meet (virtual, call, or in-person) with your Senator in 2021? </label>
																		<div class="col-sm-12">
																			<input type="text" class="form-control w-200px" id="field_how_many_times_did_you_mee" name="field_how_many_times_did_you_mee" placeholder="" value="<?= number_format($content['report_data'][0]['field_how_many_times_did_you_mee']); ?>">
																		</div>
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
											<label for="edit-field-please-check-the-services" class="form-label">Please check the services that clients have requested in relation to COVID-19: (Check all that apply) </label>
												<div class="row">
													<div class="col-lg-12 col-md-24">
														<?php 
														$covid_impact_service_request = [];
														foreach ($covid_impact_service_req as $key => $val) {
															$covid_impact_service_request[] = $val['services_requested'];
														}
														$services_requested = array("Information about COVID related symptom", "Masks", "Medical assistance for a child/children", "Medical assistance for an adult", "Financial assistance for rent", "Financial assistance for mortgage",
																						   "Financial assistance for utilities", "Financial assistance for food", "Assistance for a person with a disability", "Medical referral to a clinic/physician/hospital", 
																						   "Mental Health Assistance (anxiety/stress/depression/trouble sleeping)", "Information on respiratory/ hygiene and other infection prevention techniques", "Vaccine Assistance", 
																						   "Job placement", "Access to Wi-Fi", "Bereavement Assistance");
															foreach($services_requested as $key => $service_req) {
															if (in_array($key + 1, $covid_impact_service_request)) {
																$checked = "checked";
															  } else {
																$checked = "";
															  }																			
														?>
														<?php if ($key % 2 == 0) {?>
														<div class="form-group ">
															<label class="checkbox <?php echo $checked;?>">
																<input type="checkbox" id="services_requested-<?php echo $service_req;?>" name="services_requested[]" value="<?php echo $key+"1";?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																<label class="label" for="services_requested-<?php echo $service_req;?>"><?php echo $service_req;?></label>
															</label>
														</div>
														<?php } }?>
													</div>		
													<div class="col-lg-12 col-md-24">
														<?php 
														$covid_impact_service_request = [];
														foreach ($covid_impact_service_req as $key => $val) {
															$covid_impact_service_request[] = $val['services_requested'];
														}
														$services_requested = array("Information about COVID related symptom", "Masks", "Medical assistance for a child/children", "Medical assistance for an adult", "Financial assistance for rent", "Financial assistance for mortgage",
																						   "Financial assistance for utilities", "Financial assistance for food", "Assistance for a person with a disability", "Medical referral to a clinic/physician/hospital", 
																						   "Mental Health Assistance (anxiety/stress/depression/trouble sleeping)", "Information on respiratory/ hygiene and other infection prevention techniques", "Vaccine Assistance", 
																						   "Job placement", "Access to Wi-Fi", "Bereavement Assistance");
															foreach($services_requested as $key => $service_req) {
															if (in_array($key + 1, $covid_impact_service_request)) {
																$checked = "checked";
															  } else {
																$checked = "";
															  }																			
														?>
														<?php if ($key % 2 == 1) {?>
														<div class="form-group ">
															<label class="checkbox <?php echo $checked;?>">
																<input type="checkbox" id="services_requested-<?php echo $service_req;?>" name="services_requested[]" value="<?php echo $key+"1";?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																<label class="label" for="services_requested-<?php echo $service_req;?>"><?php echo $service_req;?></label>
															</label>
														</div>
														<?php } }?>
													</div>													
												</div>
												<br>
												<label  for="edit-field-please-check-the-provided" class="form-label">Please check the services the affiliate has provided for clients in relation to COVID-19: (Check all that apply) </label>
												<div class="row">
													<div class="col-lg-12 col-md-24">
														<?php 
															$covid_impact_service_provided = [];
															foreach ($covid_impact_service_prov as $key => $val) {
																$covid_impact_service_provided[] = $val['services_provided'];
															}
															$services_provided = array("Information about COVID related symptom", "Masks", "Medical assistance for a child/children", "Medical assistance for an adult", "Financial assistance for rent", "Financial assistance for mortgage",
																							"Financial assistance for utilities", "Financial assistance for food", "Assistance for a person with a disability", "Medical referral to a clinic/physician/hospital", 
																							"Mental Health Assistance (anxiety/stress/depression/trouble sleeping)", "Information on respiratory/ hygiene and other infection prevention techniques", "Vaccine Assistance", 
																							"Job placement", "Access to Wi-Fi", "Bereavement");
															foreach($services_provided as $key => $service_prov){						   
																if (in_array($key + 1, $covid_impact_service_provided)) {
																	$checked = "checked";
																  } else {
																	$checked = "";
																  }				?>
																<?php if ($key % 2 == 0) {?>
																<div class="form-group ">
																	<label class="checkbox <?php echo $checked;?>">
																		<input type="checkbox" id="services_provided-<?php echo $service_prov;?>" name="services_provided[]" value="<?php echo $key+"1";?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																		<label class="label" for="services_provided-<?php echo $service_prov;?>"><?php echo $service_prov;?></label>
																	</label>
																</div>
														<?php } }?>			
													</div>	
													<div class="col-lg-12 col-md-24">
														<?php 
															$covid_impact_service_provided = [];
															foreach ($covid_impact_service_prov as $key => $val) {
																$covid_impact_service_provided[] = $val['services_provided'];
															}
															$services_provided = array("Information about COVID related symptom", "Masks", "Medical assistance for a child/children", "Medical assistance for an adult", "Financial assistance for rent", "Financial assistance for mortgage",
																							"Financial assistance for utilities", "Financial assistance for food", "Assistance for a person with a disability", "Medical referral to a clinic/physician/hospital", 
																							"Mental Health Assistance (anxiety/stress/depression/trouble sleeping)", "Information on respiratory/ hygiene and other infection prevention techniques", "Vaccine Assistance", 
																							"Job placement", "Access to Wi-Fi", "Bereavement");
															foreach($services_provided as $key => $service_prov){						   
																if (in_array($key + 1, $covid_impact_service_provided)) {
																	$checked = "checked";
																  } else {
																	$checked = "";
																  }				?>
																<?php if ($key % 2 == 1) {?>
																<div class="form-group ">
																	<label class="checkbox <?php echo $checked;?>">
																		<input type="checkbox" id="services_provided-<?php echo $service_prov;?>" name="services_provided[]" value="<?php echo $key+"1";?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																		<label class="label" for="services_provided-<?php echo $service_prov;?>"><?php echo $service_prov;?></label>
																	</label>
																</div>
														<?php } }?>			
													</div>															
													</div>
														<div class="row g-4 align-items-end p-t-20 p-b-20">
															<div class="col-md-12">
																<div class="inpgrp">
																	<div class="form-group">
																		<label for="edit-field-did-the-affiliate-receive" class="form-label"> Did the affiliate receive any coverage on the local news in relation to COVID-19 efforts? </label>
																		<br>	
																		<label class="radio">
																			<input type="radio" value="2" id="edit-field-did-the-affiliate-receive-none" name="field_did_the_affiliate_receive_" <?php if ($content['report_data'][0]['field_did_the_affiliate_receive_'] == '2') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-did-the-affiliate-receive-none"> N/A </label>
																		</label>
																		<label class="radio">
																			<input type="radio" value="0" id="edit-field-did-the-affiliate-receive-0" name="field_did_the_affiliate_receive_" <?php if ($content['report_data'][0]['field_did_the_affiliate_receive_'] == 0 && $content['report_data'][0]['field_did_the_affiliate_receive_'] != '') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-did-the-affiliate-receive-0"> No </label>
																		</label>
																		<label class="radio">
																			<input type="radio" value="1" id="edit-field-did-the-affiliate-receive-1" name="field_did_the_affiliate_receive_" <?php if ($content['report_data'][0]['field_did_the_affiliate_receive_'] == '1') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-did-the-affiliate-receive-1"> Yes </label>
																		</label>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="inpgrp">
																	<div class="form-group">
																		<label for="edit-field-did-the-affiliate-provide" class="form-label"> Did the affiliate receive any mentions on social media (Twitter, Facebook, Instagram, TikTok) in relation to COVID-19 efforts? </label>
																		<br>
																		<label class="radio">
																			<input type="radio" value="2" id="edit-field-did-the-affiliate-provide-none" name="field_did_the_affiliate_provide" <?php if ($content['report_data'][0]['field_did_the_affiliate_provide'] == '2') echo 'checked="checked"'; ?>>
																			<label class="label p-r-10" for="edit-field-did-the-affiliate-provide-none"> N/A </label>
																		</label>
																		<label class="radio">
																			<input type="radio" value="0" id="edit-field-did-the-affiliate-provide-0" name="field_did_the_affiliate_provide" <?php if ($content['report_data'][0]['field_did_the_affiliate_provide'] == 0 && $content['report_data'][0]['field_did_the_affiliate_provide'] != '') echo 'checked="checked"'; ?> >
																			<label class="label p-r-10" for="edit-field-did-the-affiliate-provide-0"> No </label>
																		</label>
																		<label class="radio">
																			<input type="radio" value="1" id="edit-field-did-the-affiliate-provide-1" name="field_did_the_affiliate_provide" <?php if ($content['report_data'][0]['field_did_the_affiliate_provide'] == '1') echo 'checked="checked"'; ?> >
																			<label class="label p-r-10" for="edit-field-did-the-affiliate-provide-1"> Yes </label>
																		</label>
																	</div>
																</div>
															</div>
														</div>


													</div>
												</div>

										<div class="row g-4 align-items-end p-b-20 p-t-10" <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) { ?>style="display: none;" <?php } ?>>
											<div class="col-md-8">
													<div class="form-group">
														<label for="field_tab_status" class="form-label">Tab Status *</label>
														<?php //print_r($census_tab_statuses);
														?>
														<select class="form-select" id="Status" name="field_tab_status">
															<!-- <option value="">- None -</option> -->
															<?php 
																if($this->session->role_id == '1') {
																foreach ($census_tab_statuses as $option) { 
																	if($content['report_data'][0]['field_tab_status']==0)
																	{ ?>
																		<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
																		<?= $option['status']; ?>
																		</option>
																	<?php }else
																	{ ?>
																		<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['report_data'][0]['field_tab_status']) { ?>selected="selected" <?php } ?>>
																		<?= $option['status']; ?>
																		</option>
																	<?php 
																	} ?>
																<?php 
																} 
															} elseif ($this->session->role_id == '2' || $this->session->role_id == '3') {
																foreach ($census_tab_statuses as $option) {
																if($option['status_id'] != '122' && $option['status_id'] != '123' && $option['status_id'] != '124') {
																if($content['report_data'][0]['field_tab_status']==0)
																{ ?>
																	<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
																	<?= $option['status']; ?>
																	</option>
																<?php }else
																{ ?>
																	<option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['report_data'][0]['field_tab_status']) { ?>selected="selected" <?php } ?>>
																	<?= $option['status']; ?>
																	</option>
																<?php 
																} 
																} }
															}?>
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
                                       					<input type="hidden" id="tab_stat" value="<?= $content['report_data'][0]['field_tab_status']; ?>">
													</div>
												</div>
											<?php 
											// }elseif($this->session->role_id == 2 && $statuses['serviceareas']['status'] == 'Completed' && $statuses['community']['status'] == 'Completed' && $statuses['employees']['status'] == 'Completed'
                                          	// 	&& $statuses['revenue']['status'] == 'Completed' && $statuses['expenditure']['status'] == 'Completed' && $statuses['education_program']['status'] == 'Completed' && $statuses['entrepreneurship_program']['status'] == 'Completed'
                                          	// 	&& $statuses['health_quality']['status'] == 'Completed' && $statuses['housing']['status'] == 'Completed' && $statuses['workforce']['status'] == 'Completed'  && $statuses['other_programs']['status'] == 'Completed'
                                          	// 	&& $statuses['covid']['status'] == 'Completed' && $statuses['civic']['status'] == 'Completed' && $statuses['emergency_relief']['status'] == 'Completed' && $statuses['contact_data']['status'] == 'Completed'
                                          	// 	&& $statuses['empowerment']['status'] == 'Completed' && $statuses['volunteer']['status'] == 'Completed'){
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
                      						<?php }else{?> 
                        						<input type="hidden" value="<?= $report_id; ?>" name="field_parent_census" id="field_parent_census">
                                       					<input type="hidden" id="tab_stat" value="<?= $content['report_data'][0]['field_tab_status']; ?>">
											<?php }?>
											<?php if ($this->session->role_id != 1) { ?><br>
												<div class="col-md-24">
													<div class="form-group">
														<label for="emer_first_question" class="form-label">If yes, when did you receive PPP Funding Cycle 1 funds?</label>
														<input type="date" class="form-control" id="emer_first_question" name="emer_first_question" value="<?= $content['report_data'][0]['emer_first_question']; ?>">
													</div>
												</div>
												<div class="col-md-24">
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
												<div class="col-md-24">
													<div class="form-group">
														<label for="emer_third_question" class="form-label">If yes, how much funding did you receive in PPP Cycle 2?</label>
														<input type="text" class="form-control" id="emer_third_question" name="emer_third_question" value="<?= $content['report_data'][0]['emer_third_question']; ?>">
													</div>
												</div>
												<div class="col-md-24">
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
												<div class="col-md-24">
													<div class="form-group">
														<label for="emer_fifth_question" class="form-label">How many people did you assist with Covid related Services?</label>
														<input type="text" class="form-control" id="emer_fifth_question" name="emer_fifth_question" value="<?= $content['report_data'][0]['emer_fifth_question']; ?>">
													</div>
												</div>
											<?php } ?>
										</div>

													
										<label for="travel" class="form-label" <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>How did you engage participants during local travel restrictions (lockdown)? </label>
										<br>
										<div class="row" <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
											<div class="col-lg-12 col-md-24">
												<?php 
													$covid_impact_participant = [];
													foreach ($covid_impact_participants as $key => $val) {
														$covid_impact_participant[] = $val['engage_participants'];
													}
													$participants = array("Phone", "Zoom or other Video Platform", "SMS", "Social Media");
													foreach ($participants as $key => $participant) {
														if (in_array($key + 1, $covid_impact_participant)) {
															$checked = "checked";
														  } else {
															$checked = "";
														  }	 
													?>
													<?php if ($key % 2 == 0) {?>
													<div class="form-group ">
														<label class="checkbox <?php echo $checked;?>">
															<input type="checkbox" id="engage_participants<?php echo $participant; ?>" name="engage_participants[]"  value="<?php echo $key + "1"; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
															<label class="label" for="engage_participants<?php echo $participant; ?>"><?php echo $participant; ?></label>
														</label>
													</div>	
												<?php } }?>			
											</div>
											<div class="col-lg-12 col-md-24">
												<?php 
													$covid_impact_participant = [];
													foreach ($covid_impact_participants as $key => $val) {
														$covid_impact_participant[] = $val['engage_participants'];
													}
													$participants = array("Phone", "Zoom or other Video Platform", "SMS", "Social Media");
													foreach ($participants as $key => $participant) {
														if (in_array($key + 1, $covid_impact_participant)) {
															$checked = "checked";
														  } else {
															$checked = "";
														  }	 
													?>
													<?php if ($key % 2 == 1) {?>
													<div class="form-group ">
														<label class="checkbox <?php echo $checked;?>">
															<input type="checkbox" id="engage_participants<?php echo $participant; ?>" name="engage_participants[]"  value="<?php echo $key + "1"; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
															<label class="label" for="engage_participants<?php echo $participant; ?>"><?php echo $participant; ?></label>
														</label>
													</div>	
												<?php } }?>			
											</div>
										</div>
									</div>
									<hr>
									<div class="">
										<div class="form-group t-c formclassbtn">
											<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
											<button class="btn btn-danger m-r-15 btn-rounded" type="button" data-table_name="covid_impact" data-pk_id="<?= $report_id; ?>" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
											<button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
										</div>
									</div>
									<input type="hidden" value="<?=$report_id; ?>" id="hid_parent_census">
									<input type="hidden" value="<?= $report_id; ?>" name="pk_id" id="pk_id">

								</form>
							</div>

							<div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
								<h4 class="title-head"></h4>
								<div class="tabilCard inner NulCard">
									<div class="contact-table table-responsive">
										<table class="table table-striped" >
											<tbody>
												<tr>
													<td colspan="2">2022 Urban League Census: COVID-19 Report II: </td>
												</tr>
											</tbody>
											<tbody <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
												<tr>
													<td colspan="2">Education Programs </td>
												</tr>
												<tr>
													<td>Did the affiliate launch or expand any new programs to provide supports to children and youth under COVID-19? : </td>
													<td><span><?php if (($content['report_data'][0]['field_did_the_affiliate_launch_o']) == 2) {
                                        				echo "N/A";
                                      					} elseif($content['report_data'][0]['field_did_the_affiliate_launch_o'] == 0 && $content['report_data'][0]['field_did_the_affiliate_launch_o']!='') {
                                        					echo "No";
                                      					} elseif(($content['report_data'][0]['field_did_the_affiliate_launch_o']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr>
													<td>How many additional children and youth were served under these new programs? : </td>
													<td><span><?= number_format($report_data[0]['field_how_many_additional_childr'])?></span></td>
												</tr>
												<tr>
													<td>What kinds of supports and services were offered under these new or expanded programs? Please check all that apply:: </td>
													<td><span>
															<?php foreach ($covid_impact_services as $key => $val) {
																	echo $val['value'] . "<br>";
															} ?>
														</span>
													</td>
												</tr>
												<tr>
													<td>How many children or youth did the affiliate serve in-person?: </td>
													<td><span><?= number_format($report_data[0]['field_how_many_children_or_youth'])?></span></td>
												</tr>
												<tr>
													<td>How many children or youth did the affiliate serve in a hybrid environment (in-person and virtual)?: </td>
													<td><span><?= number_format($report_data[0]['field_how_many_child_or_youth'])?></span></td>
												</tr>
												<tr>
													<td>How many children or youth did the affiliate serve in a completely remote or virtual environment?: </td>
													<td><span><?= number_format($report_data[0]['field_how_many_ch'])?></span></td>
												</tr>
												<tr>
													<td>Were there any disruptions in local partnerships? If yes, please check all that apply: </td>
													<td><span>
															<?php foreach ($covid_impact_disruptions as $key => $val) {
																	echo $val['value'] . "<br>";
															} ?>
														</span>
													</td>
												</tr>
												<tr>
													<td colspan="2">Health Programs </td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped" <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
											<tbody>
												<tr>
													<td>What health programs do you currently offer to your clients?: </td>
													<td><span>
															<?php foreach ($covid_impact_health_pgm as $key => $val) {
																	echo $val['value'] . "<br>";
															} ?>
														</span>
													</td>
												</tr>
												<tr>
													<td colspan="2">Workforce Programs </td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped" <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
											<tbody>
												<tr>
													<td>Were your programs impacted by COVID?: </td>
													<td><span><?php if (($content['report_data'][0]['field_were_your_programs_impacte']) == 2) {
                                        				echo "N/A";
                                      					} elseif($content['report_data'][0]['field_were_your_programs_impacte'] == 0 && $content['report_data'][0]['field_were_your_programs_impacte']!='') {
                                        					echo "No";
                                      					} elseif(($content['report_data'][0]['field_were_your_programs_impacte']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr>
													<td>How did you engage participants during local travel restrictions (lockdown)?: </td>
													<td>
														<span>
															<?php foreach ($covid_impact_participants as $key => $val) {
																	echo $val['value'] . "<br>";
															} ?>
														</span>
													</td>
												</tr>
												<tr>
													<td>Were job placement performances negatively impacted by COVID? : </td>
													<td><span><?php if (($content['report_data'][0]['field_were_job_placement_perform']) == 2) {
                                        				echo "N/A";
                                      					} elseif($content['report_data'][0]['field_were_job_placement_perform'] == 0 && $content['report_data'][0]['field_were_job_placement_perform']!='') {
                                        					echo "No";
                                      					} elseif(($content['report_data'][0]['field_were_job_placement_perform']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr>
													<td>By your estimates, by how much (percentage)?: </td>
													<td><span><?= $report_data[0]['field_by_your_estimates_by_how_m']?></span></td>
												</tr>
												<tr>
													<td colspan="2"> Entrepreneurship Programs </td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped" <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
											<tbody>
												<tr>
													<td>Were COVID-19 relief services provided to entrepreneurs (technical assistance, coaching, assistance applying for loans/grants: </td>
													<td><span><?php if (($content['report_data'][0]['field_1_were_covid_19_relief_ser']) == 2) {
                                        				echo "N/A";
                                      					} elseif($content['report_data'][0]['field_1_were_covid_19_relief_ser'] == 0 && $content['report_data'][0]['field_1_were_covid_19_relief_ser']!='') {
                                        					echo "No";
                                      					} elseif(($content['report_data'][0]['field_1_were_covid_19_relief_ser']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr>
													<td>Number of entrepreneurship clients that applied for COVID-relief funding (loans or grants).: </td>
													<td><span><?= number_format($report_data[0]['field_2_number_of_entrepreneursh'])?></span></td>
												</tr>
												<tr>
													<td>Percentage of entrepreneurship clients applying that received COVID-relief funding.: </td>
													<td><span><?= $report_data[0]['field_percentage_of_entrepreneur']?></span></td>
												</tr>
												<tr>
													<td colspan="2"> Advocacy </td>
												</tr>
											</tbody>
										</table>
										<table class="table table-striped" >
											<tbody>
												<tr <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
													<td>How many times did you meet (virtual, call, or in-person) with your United States House of Representatives member in 2021? : </td>
													<td><span><?= number_format($report_data[0]['field__how_many_times_did_you_me'])?></span></td>
												</tr>
												<tr <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
													<td>How many times did you meet (virtual, call, or in-person) with your Senator in 2021?: </td>
													<td><span><?= number_format($report_data[0]['field_how_many_times_did_you_mee'])?></span></td>
												</tr>
												<tr>
													<td>Please check the services that clients have requested in relation to COVID-19: (Check all that apply): </td>
													<td><span>
															<?php foreach ($covid_impact_service_req as $key => $val) {
																	echo $val['value'] . "<br>";
															} ?>
														</span>
													</td>
												</tr>
												<tr>
													<td>Please check the services the affiliate has provided for clients in relation to COVID-19: (Check all that apply) </td>
													<td><span>
															<?php foreach ($covid_impact_service_prov as $key => $val) {
																	echo $val['value'] . "<br>";
															} ?>
														</span>
													</td>
												</tr>
												<tr>
													<td>Did the affiliate receive any coverage on the local news in relation to COVID-19 efforts?: </td>
													<td><span><?php if (($content['report_data'][0]['field_did_the_affiliate_receive_']) == 2) {
                                        				echo "N/A";
                                      					} elseif($content['report_data'][0]['field_did_the_affiliate_receive_'] == 0 && $content['report_data'][0]['field_did_the_affiliate_receive_']!='') {
                                        					echo "No";
                                      					} elseif(($content['report_data'][0]['field_did_the_affiliate_receive_']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr>
													<td>Did the affiliate receive any mentions on social media (Twitter, Facebook, Instagram, TikTok) in relation to COVID-19 efforts?: </td>
													<td><span><?php if (($content['report_data'][0]['field_did_the_affiliate_provide']) == 2) {
                                        				echo "N/A";
                                      					} elseif($content['report_data'][0]['field_did_the_affiliate_provide'] == 0 && $content['report_data'][0]['field_did_the_affiliate_provide']!='') {
                                        					echo "No";
                                      					} elseif(($content['report_data'][0]['field_did_the_affiliate_provide']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) { ?>style="display:none" <?php } ?>>
													<td>Parent census: </td>
													<td><?= $report_data[0]['organization']?></td>
												</tr>
												<tr <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) { ?>style="display:none" <?php } ?>>
													<td>Tab Status: </td>
													<td><?= $report_data[0]['status']?></td>
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
<style>
	.tabilCard .table-responsive .table tbody tr td {
    padding: 15px;
    width: 60%;
}
</style>
