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
            <div class="h5 Subtittle text-primary"><b>Health and Quality of Life Program Details</b></div>
            <?php if ($this->session->role_id != 1) {
              if ($statuses['health_quality']['status'] != "Submitted" && $statuses['health_quality']['status'] != "Reviewed Complete") { ?>
                <nav class="innerTab">
                  <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                  </div>
								  <?php if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 && $content['report_data'][0]['field_tab_status']  == 120) {?>
                    <div class="nav nav-pills" id="" role="tablist">
                    <button type="button" id="health_quality_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
                  </div>
									<?php }else{?>
                  <?php if((count($programs) != 0) && $content['report_data'][0]['field_tab_status']  == 120){ ?>
                  <div class="nav nav-pills" id="" role="tablist">
                    <button type="button" id="health_quality_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
                  </div>
                  <?php } }?>
                  <?php if($content['report_data'][0]['field_tab_status']  == 121){ ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="health_quality_program" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,124)"><i class="i i-resubmit"></i></button>
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
                  <button type="button" id="health_quality_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
                </div>
								<?php }else{?>
                <?php if((count($programs) != 0) && $content['report_data'][0]['field_tab_status']  == 120){ ?>
                <div class="nav nav-pills" id="" role="tablist">
                  <button type="button" id="health_quality_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
                </div>
                <?php } }?>
								<?php if($content['report_data'][0]['field_tab_status']  == 124){ ?>
									<div class="nav nav-pills" id="" role="tablist">
									<button type="button" id="health_quality_program" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,123)"><i class="i i-reviewed"></i></button>
									</div>
									<div class="nav nav-pills" id="" role="tablist">
									<button type="button" id="health_quality_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,121)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
								<?php if($content['report_data'][0]['field_tab_status']  == 121){ ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="health_quality_program" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,124)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
              </nav>
            <?php }
            if (isset($_GET['msg'])) { ?>
              <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Health and Quality of Life Program data has been updated.</div>
            <?php } ?>
            <?php if (isset($_GET['tab_message'])) { ?>
              <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
            <?php } ?>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade " id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
                <form id="edit-health" method="post" action="<?php echo base_url('module/forms_update/health_quality_prg/update'); ?>">
                  <div class="full_form">
                  <div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
                    <div class="row g-4 align-items-end p-b-20 our-affiliate-health-programs">
                      <?php if ($this->session->role_id == 1) { ?><div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-title" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="edit-title" aria-label="edit-title" value="Health and Quality of Life Program Details" required readonly>
                          </div>
                        </div><?php } ?>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="edit-field-do-you-offer-programs-of-t" class="form-label">Our Affiliate offers programs of this type *</label>
                          <br>
                          <label class="radio">
                            <input type="radio" name="field_do_you_offer_programs_of_t" class="hide_fields" onclick="showDivifYes()" value="0" id="edit-field-do-you-offer-programs-of-t-0" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0) echo 'checked="checked"'; ?>>
                            <label class="label  p-r-10" for="edit-field-do-you-offer-programs-of-t-0">NO</label>
                          </label>
                          <label class="radio">
                            <input type="radio" name="field_do_you_offer_programs_of_t" class="hide_fields" onclick="showDivifYes()" value="1" id="edit-field-do-you-offer-programs-of-t-1" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1) echo 'checked="checked"'; ?>>
                            <label class="label  p-r-10" for="edit-field-do-you-offer-programs-of-t-1">YES</label>
                          </label>
                        </div>
                      </div>
                    </div>

                    <div id="hide_div_if_no">
                      <div class="clearfix" <?php if (($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 || count($programs) != 0)) {?> style="display:none"<?php }?>>
                        <div class="messages error">
                          <i class="i i-warning"></i>&nbsp; &nbsp;You will require to enter
                          information about at least one program
                          to complete this tab on the next screen
                        </div>
                      </div>
                      <br>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <div class="h5 Subtittle">Person Who Oversees Educational Program</div>

                          <div class="form-group">
                            <label for="edit-field-health-overseer-name" class="form-label">Name </label>
                            <input type="text" class="form-control" id="edit-field-health-overseer-name" name="field_health_overseer_name" aria-label="name" value="<?= $content['report_data'][0]['field_health_overseer_name']; ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-health-overseer-email" class="form-label">Email </label>
                            <input type="text" class="form-control" id="edit-field-health-overseer-email" name="field_health_overseer_email" aria-label="email" value="<?= $content['report_data'][0]['field_health_overseer_email']; ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-program-health-total-parti" class="form-label">Total Participants in Health Programs </label>
                            <input type="text" class="form-control" id="edit-field-program-health-total-parti" name="field_program_health_total_parti" aria-label="certified" value="<?= number_format($content['report_data'][0]['field_program_health_total_parti']); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-program-health-chw" class="form-label">Does your current staffing include Community Health Workers? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" name="field_program_health_chw" id="edit-field-program-health-chw-none" value="2" <?php if ($content['report_data'][0]['field_program_health_chw'] == 2) echo 'checked="checked"'; ?>>
                              <label class="label  p-r-10" for="edit-field-program-health-chw-none"> N/A </label>
                            </label>
                            <label class="radio">
                              <input type="radio" name="field_program_health_chw" id="edit-field-program-health-chw-0" value="0" <?php if ($content['report_data'][0]['field_program_health_chw'] == 0 && $content['report_data'][0]['field_program_health_chw'] != '') echo 'checked="checked"'; ?>>
                              <label class="label  p-r-10" for="edit-field-program-health-chw-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" name="field_program_health_chw" id="edit-field-program-health-chw-1" value="1" <?php if ($content['report_data'][0]['field_program_health_chw'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label  p-r-10" for="edit-field-program-health-chw-1">YES</label>
                            </label>
                          </div>
                        </div>


                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-program-health-advocacy" class="form-label">Do you provide any Health advocacy in your community? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" name="field_program_health_advocacy" id="edit-field-program-health-advocacy-none" value="2" <?php if ($content['report_data'][0]['field_program_health_advocacy'] == 2) echo 'checked="checked"'; ?>>
                              <label class="label  p-r-10" for="edit-field-program-health-advocacy-none"> N/A </label>
                            </label>
                            <label class="radio">
                              <input type="radio" name="field_program_health_advocacy" id="edit-field-program-health-advocacy-0" value="0" <?php if ($content['report_data'][0]['field_program_health_advocacy'] == 0 && $content['report_data'][0]['field_program_health_advocacy'] != '') echo 'checked="checked"'; ?>>
                              <label class="label  p-r-10" for="edit-field-program-health-advocacy-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" name="field_program_health_advocacy" id="edit-field-program-health-advocacy-1" value="1" <?php if ($content['report_data'][0]['field_program_health_advocacy'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label  p-r-10" for="edit-field-program-health-advocacy-1">YES</label>
                            </label>
                          </div>
                        </div>
                      </div>



                      <div class="row g-4 align-items-end p-b-20">

                        <div class="col-md-12">
                          <div class="h5 Subtittle">Program Impacts</div>
                          <div class="form-group">
                            <label for="edit-field-program-health-participant" class="form-label">Average number of participants at Health Education and outreach </label>
                            <input type="text" class="form-control" id="edit-field-program-health-participant" name="field_program_health_participant" aria-label="edit-field-program-health-participant" value="<?= number_format($content['report_data'][0]['field_program_health_participant']); ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-program-health-assisted" class="form-label">Number of individuals with social determinants of health issues that are Community Health Worker or Navigator </label>
                            <input type="text" class="form-control" id="edit-field-program-health-assisted" name="field_program_health_assisted" aria-label="certified" value="<?= number_format($content['report_data'][0]['field_program_health_assisted']); ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
												<label for="edit-field-what-kinds-of-supports-and" class="form-label">What health programs do you currently offer to your clients? </label><br>
												<div class="row g-4 align-items-end p-b-20 ">
													<div class="col-md-12">
																				<?php 
																				$ad_market = [];
																				foreach ($all_health_pgm as $key => $val) {
																					$ad_market[] = $val['field_health_programs'];
																				}
																				$health_pgm_list = array("General Health Education", "Access to Care (i.e., Insurance or Patient Navigation)", "COVID 19 Vaccine Outreach, Education and Access", "Job Placement", "Housing assistance", "Nutritional access (food pantry, SNAP/WIC)", "Physical Activity", "Mental Health resources");
																				$i = 0;
																				foreach ($health_pgm_list as $key =>$method) { 
																					if (in_array($method, $ad_market)) {
																						$checked = "checked";
																					  } else {
																						$checked = "";
																					  }?>
																					  <?php if ($key % 2 == 0) {?>
																							<div class="form-group ">
																								<label class="checkbox <?php echo $checked; ?>">
																									<input type="checkbox" id="edit-field-health-programs-<?php echo $method; ?>" name="field_health_programs[]"  value="<?php echo $method; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																									<label class="label" for="edit-field-health-programs-<?php echo $method; ?>"><?php echo $method; ?></label>
																								</label>
																							</div>
																					  <?php }?>
																				<?php $i++; };?>
													</div>
													<div class="col-md-12">
																				<?php 
																				$ad_market = [];
																				foreach ($all_health_pgm as $key => $val) {
																					$ad_market[] = $val['field_health_programs'];
																				}
																				$health_pgm_list = array("General Health Education", "Access to Care (i.e., Insurance or Patient Navigation)", "COVID 19 Vaccine Outreach, Education and Access", "Job Placement", "Housing assistance", "Nutritional access (food pantry, SNAP/WIC)", "Physical Activity", "Mental Health resources");
																				$i = 0;
																				foreach ($health_pgm_list as $key =>$method) { 
																					if (in_array($method, $ad_market)) {
																						$checked = "checked";
																					  } else {
																						$checked = "";
																					  }?>
																					  <?php if ($key % 2 == 1) {?>
																							<div class="form-group ">
																								<label class="checkbox <?php echo $checked; ?>">
																									<input type="checkbox" id="edit-field-what-kinds-of-supports-and-1-<?php echo $method; ?>" name="field_health_programs[]"  value="<?php echo $method; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
																									<label class="label" for="edit-field-what-kinds-of-supports-and-1-<?php echo $method; ?>"><?php echo $method; ?></label>
																								</label>
																							</div>
																					  <?php }?>
																				<?php $i++; };?>
													</div>
												</div>																		
											</div>

                    </div> <!-- show/hide close-->

                    <div class="row g-4 align-items-end p-b-20">
                      <?php if ($this->session->role_id == 1) { ?>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-parent-census" class="form-label">Parent census *</label>
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
                      // }elseif($this->session->role_id == 2 && $statuses['serviceareas']['status'] == 'Completed' && $statuses['community']['status'] == 'Completed' && $statuses['employees']['status'] == 'Completed'
                      //  && $statuses['revenue']['status'] == 'Completed' && $statuses['expenditure']['status'] == 'Completed' && $statuses['education_program']['status'] == 'Completed' && $statuses['entrepreneurship_program']['status'] == 'Completed'
                      //  && $statuses['health_quality']['status'] == 'Completed' && $statuses['housing']['status'] == 'Completed' && $statuses['workforce']['status'] == 'Completed'  && $statuses['other_programs']['status'] == 'Completed'
                      //  && $statuses['covid']['status'] == 'Completed' && $statuses['civic']['status'] == 'Completed' && $statuses['emergency_relief']['status'] == 'Completed' && $statuses['contact_data']['status'] == 'Completed'
                      //  && $statuses['empowerment']['status'] == 'Completed' && $statuses['volunteer']['status'] == 'Completed'){
                        ?>
                        <!-- <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-parent-census" class="form-label">Parent census *</label>
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
                      <?php }else{?> 
                        <input type="hidden" value="<?= $report_id; ?>" name="field_parent_census" id="field_parent_census">
                      <?php }?>

                        <div class="col-md-12" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
                          <div class="form-group">
                            <label for="status" class="form-label">Tab Status *</label>
                            <select class="form-select" id="field_tab_status" name="field_tab_status">
                              <!-- <option value="">- None -</option> -->
                              <?php foreach ($census_tab_statuses as $option) {
                                if ($content['report_data'][0]['field_tab_status'] == 0) { ?>
                                  <option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
                                    <?= $option['status']; ?>
                                  </option>
                                <?php } else { ?>
                                  <option value="<?= $option['status_id']; ?>" <?php if(count($programs) == 0){ ?><?php if($option['status_id'] != 120){ ?>disabled="true" <?php } if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?><?php } else{?>  <?php if ($option['status_id'] == $content['report_data'][0]['field_tab_status']) { ?>selected="selected" <?php }} ?>><?= $option['status']; ?></option>
                                <?php } ?>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                      </div>




                    <hr>

                    <div class="">
                      <div class="form-group t-c formclassbtn">
                        <button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                        <button class="btn btn-danger m-r-15 btn-rounded" type="button" data-status_id="<?= $statuses['health_quality']['status'];?>" data-table_name="health_quality_program" data-pk_id="<?= $content['report_data'][0]['pk_id']; ?>" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
                        <button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
                      </div>
                    </div>
                    <input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" id="hid_parent_census">
                    <input type="hidden" value="<?= $content['report_data'][0]['pk_id']; ?>" name="pk_id" id="pk_id">
                </form>
              </div>

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
                  if ($statuses['health_quality']['status'] != "Submitted" && $statuses['health_quality']['status'] != "Reviewed Complete") { ?> <a class="btn btn-primary btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/health_quality">+ Add A Program</a><?php }
                                                                                                                                                                                                                                                                                                                                                                            } else if ($this->session->role_id == 1) { ?> <a class="btn btn-accent btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/health_quality">+ Add A Program</a> <?php echo "<br><br>";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          } ?>
              </div>

              <div class="tabilCard inner  NulCard">
                <div class="contact-table table-responsive">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>Our Affiliate offers programs of this type: </td>
                        <td><span><?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1) {
                                    echo "Yes";
                                  } else {
                                    echo "No";
                                  }; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-bottom-0">
                          <div class="prg_head text-primary h5 fw-bold">Person Who Oversees Health Programs</div>
                        </td>
                      </tr>
                      <tr>
                        <td>Name: </td>
                        <td><span><?= $content['report_data'][0]['field_health_overseer_name']; ?></span></td>
                      </tr>
                      <tr>
                        <td> Email: </td>
                        <td><span><?= $content['report_data'][0]['field_health_overseer_email']; ?></span></td>
                      </tr>
                      <tr>
                        <td class="viewcol1 fw_bold">Total Participants in Health Programs: </td>
                        <td><span><?= number_format($content['report_data'][0]['field_program_health_total_parti']); ?></span></td>
                      </tr>
                      <tr>
                        <td class="viewcol1 fw_bold">Does your current staffing include Community Health Workers?: </td>
                        <td><span><?php if ($content['report_data'][0]['field_program_health_chw'] == 1 && $content['report_data'][0]['field_program_health_chw'] != '') {
                                    echo "Yes";
                                  } else if ($content['report_data'][0]['field_program_health_chw'] == 0 && $content['report_data'][0]['field_program_health_chw'] != '') {
                                    echo "No";
                                  }elseif($content['report_data'][0]['field_program_health_chw'] == 2){
                                    echo "N/A";
                                  }; ?></span></td>
                      </tr>
                      <tr>
                        <td class="viewcol1 fw_bold">Do you provide any Health advocacy in your community?: </td>
                        <td><span><?php if ($content['report_data'][0]['field_program_health_advocacy'] == 1 && $content['report_data'][0]['field_program_health_advocacy'] != '') {
                                    echo "Yes";
                                  } else if ($content['report_data'][0]['field_program_health_advocacy'] == 0 && $content['report_data'][0]['field_program_health_advocacy'] != '') {
                                    echo "No";
                                  }elseif($content['report_data'][0]['field_program_health_advocacy'] == 2){
                                    echo "N/A";
                                  }; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-bottom-0">
                          <div class="prg_head text-primary h5 fw-bold">Program Impacts</div>
                        </td>
                      </tr>
                      <tr>
                        <td>Average number of participants at Health Education and outreach: </td>
                        <td><span><?= number_format($content['report_data'][0]['field_program_health_participant']); ?></span></td>
                      </tr>

                      
                      <tr>
                        <td>Number of individuals with social determinants of health issues that are Community Health Worker or Navigator: </td>
                        <td><span><?= number_format($content['report_data'][0]['field_program_health_assisted']); ?></span></td>
                      </tr>
                      <tr>
                        <td>What health programs do you currently offer to your clients?</td>
                        <td><span>
							    <?php foreach ($all_health_pgm as $key => $val) {
									echo $val['field_health_programs'] . "<br>";
								} ?>
						   </span></td>
                      </tr>
                      <?php if ($this->session->role_id == 1) { ?>
                        <tr>
                          <td class="viewcol1">Parent census:</td>
                          <td><span><?= $content['report_data'][0]['organization'] . " " . $content['report_data'][0]['field_year'] . " census"; ?></span></td>
                        </tr>
                        <tr>
                          <td class="viewcol1">Tab Status: </td>
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
