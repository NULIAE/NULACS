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
						<div class="h5 Subtittle text-primary"><b>Mental Health Questions</b></div>
						<?php if ($this->session->role_id != 1) {

							if ($statuses['mental_health']['status'] != "Submitted" && $statuses['mental_health']['status'] != "Reviewed Complete") { ?>
								<nav class="innerTab">
									<div class="nav nav-pills" id="nav-tab" role="tablist">
									<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
									</div>
									<?php if($content['report_data'][0]['field_tab_status']  == 120){ ?>
									<div class="nav nav-pills" id="" role="tablist">
									<button type="button" id="mental_health" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
									</div>
									<?php } ?>
									<?php if($content['report_data'][0]['field_tab_status']  == 121){ ?>
										<div class="nav nav-pills" id="" role="tablist">
											<button type="button" id="mental_health" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,124)"><i class="i i-resubmit"></i></button>
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
								<button type="button" id="mental_health" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
								</div>
								<?php } ?>
								<?php if($content['report_data'][0]['field_tab_status']  == 124){ ?>
									<div class="nav nav-pills" id="" role="tablist">
									<button type="button" id="mental_health" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,123)"><i class="i i-reviewed"></i></button>
									</div>
									<div class="nav nav-pills" id="" role="tablist">
									<button type="button" id="mental_health" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,121)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
								<?php if($content['report_data'][0]['field_tab_status']  == 121){ ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="mental_health" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,124)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
							</nav>
						<?php }

						if (isset($_GET['msg'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Mental health questions data has been updated.</div>
						<?php } ?>
						<?php if (isset($_GET['tab_message'])) { ?>
							<div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
						<?php } ?>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
								<form id="edit-mental-health" method="post" action="<?php echo base_url('module/forms_update/mental_health/update'); ?>">
									<div class="full_form">	
									<div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
									<div class="row align-items-start">
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-receive-calls-or-visits-for-adult-over-18" class="form-label"> Did your affiliate receive calls or visits requesting assistance or referral because they were experiencing mental health issues? </label>
													<br>
													<div style="display: flex;justify-content: space-between;padding-right: 30px;"> 
													<label for="edit-field-receive-calls-or-visits-for-adult-over-18" class="form-label"> Adults over 18: </label>
													<div>
													<label class="radio">
														<input type="radio" value="0" id="edit-field-receive-calls-or-visits-for-adult-over-18-0" name="field_receive_calls_or_visits_for_adult_over_18" <?php if ($content['report_data'][0]['field_receive_calls_or_visits_for_adult_over_18'] == 0 && $content['report_data'][0]['field_receive_calls_or_visits_for_adult_over_18'] != '') echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-receive-calls-or-visits-for-adult-over-18-0"> No </label>
													</label>
													<label class="radio">
														<input type="radio" value="1" id="edit-field-receive-calls-or-visits-for-adult-over-18-1" name="field_receive_calls_or_visits_for_adult_over_18" <?php if ($content['report_data'][0]['field_receive_calls_or_visits_for_adult_over_18'] == 1) echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-receive-calls-or-visits-for-adult-over-18-1"> Yes </label>
													</label>
						</div>
						</div>
						<div style="display: flex;justify-content: space-between;padding-right: 30px;">
													<label for="edit-field-receive-calls-or-visits-for-children-under-18" class="form-label"> Children/adolescents under 18: </label>
													<div>
													<label class="radio">
														<input type="radio" value="0" id="edit-field-receive-calls-or-visits-for-children-under-18-0" name="field_receive_calls_or_visits_for_children_under_18" <?php if ($content['report_data'][0]['field_receive_calls_or_visits_for_children_under_18'] == 0 && $content['report_data'][0]['field_receive_calls_or_visits_for_children_under_18'] != '') echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-receive-calls-or-visits-for-children-under-18-0"> No </label>
													</label>
													<label class="radio">
														<input type="radio" value="1" id="edit-field-receive-calls-or-visits-for-children-under-18-1" name="field_receive_calls_or_visits_for_children_under_18" <?php if ($content['report_data'][0]['field_receive_calls_or_visits_for_children_under_18'] == 1) echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-receive-calls-or-visits-for-children-under-18-1"> Yes </label>
													</label>
													</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-staff-have-the-training-when-requesting" class="form-label"> Does your staff have the training, resources and expertise to provide referrals when community members are requesting help for their mental health? </label>
													<br>
													<label class="radio">
														<input type="radio" value="0" id="edit-field-staff-have-the-training-when-requesting-0" name="field_staff_have_the_training_when_requesting" <?php if ($content['report_data'][0]['field_staff_have_the_training_when_requesting'] == 0 && $content['report_data'][0]['field_staff_have_the_training_when_requesting'] != '') echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-staff-have-the-training-when-requesting-0"> No </label>
													</label>
													<label class="radio">
														<input type="radio" value="1" id="edit-field-staff-have-the-training-when-requesting-1" name="field_staff_have_the_training_when_requesting" <?php if ($content['report_data'][0]['field_staff_have_the_training_when_requesting'] == 1) echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-staff-have-the-training-when-requesting-1"> Yes </label>
													</label>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-staff-have-the-training-if-they-determine" class="form-label"> Does your staff have the training and resources to provide referrals if they determine that a community member may benefit from mental health referrals, even when the community member is not explicitly requesting this help, but are coming to the Urban League for another reason, such as job training or food assistance? </label>
													<br>
													<label class="radio">
														<input type="radio" value="0" id="edit-field-staff-have-the-training-if-they-determine-0" name="field_staff_have_the_training_if_they_determine" <?php if ($content['report_data'][0]['field_staff_have_the_training_if_they_determine'] == 0 && $content['report_data'][0]['field_staff_have_the_training_if_they_determine'] != '') echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-staff-have-the-training-if-they-determine-0"> No </label>
													</label>
													<label class="radio">
														<input type="radio" value="1" id="edit-field-staff-have-the-training-if-they-determine-1" name="field_staff_have_the_training_if_they_determine" <?php if ($content['report_data'][0]['field_staff_have_the_training_if_they_determine'] == 1) echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-staff-have-the-training-if-they-determine-1"> Yes </label>
													</label>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-affiliate-offer-any-specific-mental-health-services" class="form-label"> Does your Affiliate offer any specific mental health services in-house? </label>
													<br>
													<label class="radio">
														<input type="radio" value="0" id="edit-field-affiliate-offer-any-specific-mental-health-services-0" name="field_affiliate_offer_any_specific_mental_health_services" <?php if ($content['report_data'][0]['field_affiliate_offer_any_specific_mental_health_services'] == 0 && $content['report_data'][0]['field_affiliate_offer_any_specific_mental_health_services'] != '') echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-affiliate-offer-any-specific-mental-health-services-0"> No </label>
													</label>
													<label class="radio">
														<input type="radio" value="1" id="edit-field-affiliate-offer-any-specific-mental-health-services-1" name="field_affiliate_offer_any_specific_mental_health_services" <?php if ($content['report_data'][0]['field_affiliate_offer_any_specific_mental_health_services'] == 1) echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-affiliate-offer-any-specific-mental-health-services-1"> Yes </label>
													</label>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="edit-field-affiliate-plan-to-offer-any-mental-health-services" class="form-label"> Does your Affiliate plan to offer any mental health services in-house in the near future? </label>
													<br>
													<label class="radio">
														<input type="radio" value="0" id="edit-field-affiliate-plan-to-offer-any-mental-health-services-0" name="field_affiliate_plan_to_offer_any_mental_health_services" <?php if ($content['report_data'][0]['field_affiliate_plan_to_offer_any_mental_health_services'] == 0 && $content['report_data'][0]['field_affiliate_plan_to_offer_any_mental_health_services'] != '') echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-affiliate-plan-to-offer-any-mental-health-services-0"> No </label>
													</label>
													<label class="radio">
														<input type="radio" value="1" id="edit-field-affiliate-plan-to-offer-any-mental-health-services-1" name="field_affiliate_plan_to_offer_any_mental_health_services" <?php if ($content['report_data'][0]['field_affiliate_plan_to_offer_any_mental_health_services'] == 1) echo 'checked="checked"'; ?>>
														<label class="label p-r-10" for="edit-field-affiliate-plan-to-offer-any-mental-health-services-1"> Yes </label>
													</label>
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
											
                      						<?php }else{?> 
                        						<input type="hidden" value="<?= $report_id; ?>" name="field_parent_census" id="field_parent_census">
                                       					<input type="hidden" id="tab_stat" value="<?= $content['report_data'][0]['field_tab_status']; ?>">
											<?php }?>
										</div>
									</div>
									<hr>
									<div class="">
										<div class="form-group t-c formclassbtn">
											<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
											<button class="btn btn-danger m-r-15 btn-rounded" type="button" data-status_id="<?= $statuses['mental_health']['status'];?>" data-table_name="mental_health" data-pk_id="<?= $report_id; ?>" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
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
											<tbody <?php if ($this->session->role_id == 2) { ?>style="" <?php } ?>>
												<tr><td>Did your affiliate receive calls or visits requesting assistance or referral because they were experiencing mental health issues? </td><td></td></tr>
												<tr>
													<td>Adults over 18 :</td>
													<td><span><?php 
														if($content['report_data'][0]['field_receive_calls_or_visits_for_adult_over_18'] == 0 && $content['report_data'][0]['field_receive_calls_or_visits_for_adult_over_18']!='') {
                                        					echo "No";
                                      					} elseif(($content['report_data'][0]['field_receive_calls_or_visits_for_adult_over_18']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr>
													<td>Children/adolescents under 18 : </td>
													<td><span><?php 
														if($content['report_data'][0]['field_receive_calls_or_visits_for_children_under_18'] == 0 && $content['report_data'][0]['field_receive_calls_or_visits_for_children_under_18']!='') {
                                        					echo "No";
                                      					} elseif(($content['report_data'][0]['field_receive_calls_or_visits_for_children_under_18']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr>
													<td>Does your staff have the training, resources and expertise to provide referrals when community members are requesting help for their mental health?</td>
													<td><span><?php 
														if($content['report_data'][0]['field_staff_have_the_training_when_requesting'] == 0 && $content['report_data'][0]['field_staff_have_the_training_when_requesting']!='') {
															echo "No";
														} elseif(($content['report_data'][0]['field_staff_have_the_training_when_requesting']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr>
													<td>Does your staff have the training and resources to provide referrals if they determine that a community member may benefit from mental health referrals, even when the community member is not explicitly requesting this help, but are coming to the Urban League for another reason, such as job training or food assistance?</td>
													<td><span><?php 
														if($content['report_data'][0]['field_staff_have_the_training_if_they_determine'] == 0 && $content['report_data'][0]['field_staff_have_the_training_if_they_determine']!='') {
															echo "No";
														} elseif(($content['report_data'][0]['field_staff_have_the_training_if_they_determine']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr>
													<td>Does your Affiliate offer any specific mental health services in-house?</td>
													<td><span><?php 
														if($content['report_data'][0]['field_affiliate_offer_any_specific_mental_health_services'] == 0 && $content['report_data'][0]['field_affiliate_offer_any_specific_mental_health_services']!='') {
															echo "No";
														} elseif(($content['report_data'][0]['field_affiliate_offer_any_specific_mental_health_services']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
												</tr>
												<tr>
													<td>Does your Affiliate plan to offer any mental health services in-house in the near future?</td>
													<td><span><?php 
														if($content['report_data'][0]['field_affiliate_plan_to_offer_any_mental_health_services'] == 0 && $content['report_data'][0]['field_affiliate_plan_to_offer_any_mental_health_services']!='') {
															echo "No";
														} elseif(($content['report_data'][0]['field_affiliate_plan_to_offer_any_mental_health_services']) == 1)
														{
															echo "Yes";
														}?></span>
													</td>
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
	</div>
</main>
<style>
	.tabilCard .table-responsive .table tbody tr td {
    padding: 15px;
    width: 60%;
}
</style>
