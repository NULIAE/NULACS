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
            <div class="h5 Subtittle text-primary"><b>Community Relations</b></div>
            <?php if ($content['report_data']) { ?>
              <?php if ($this->session->role_id != 1) {
                if ($statuses['community']['status'] != "Submitted" && $statuses['community']['status'] != "Reviewed Complete") {
              ?>
                  <nav class="innerTab">
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                      <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                    </div>
                    <?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
                      <div class="nav nav-pills" id="" role="tablist">
                        <button type="button" id="community_relations" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                      </div>
                    <?php } ?>
                    <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                      <div class="nav nav-pills" id="" role="tablist">
                        <button type="button" id="community_relations" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
                      </div>
                    <?php } ?>
                  </nav>
                <?php }
              } else if ($this->session->role_id == 1) {
                ?>
                <nav class="innerTab">
                  <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                  </div>
                  <?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="community_relations" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                    </div>
                  <?php } ?>
                  <?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="community_relations" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
                    </div>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="community_relations" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
                    </div>
                  <?php } ?>
                  <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="community_relations" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
                    </div>
                  <?php } ?>
                </nav>
              <?php }
              if (isset($_GET['msg'])) { ?>
                <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Community Relations has been updated.</div>
              <?php } ?>

              <?php if (isset($_GET['tab_message'])) { ?>
                <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
              <?php } ?>

              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade " id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
                  <form id="edit-community" method="post" action="<?php echo base_url('module/forms_update/community/update'); ?>">
                    <div class="full_form">
                    <div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div>
                    <br/><br/><br/>
                      <div class="row g-4 align-items-end p-b-20 ">
                        <div class="col-md-12" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
                          <div class="form-group">
                            <label for="edit-title" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="edit-title" aria-label="edit-title" value="Community Relations" required readonly="readonly">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_produces_annual_report" class="form-label">Does the affiliate produce an annual report?</label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_produces_annual_report" id="field_produces_annual_report-none" <?php if ($content['report_data'][0]['field_produces_annual_report'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_produces_annual_report-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_produces_annual_report" id="field_produces_annual_report-0" <?php if ($content['report_data'][0]['field_produces_annual_report'] == 0 && $content['report_data'][0]['field_produces_annual_report'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_produces_annual_report-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_produces_annual_report" id="field_produces_annual_report-1" <?php if ($content['report_data'][0]['field_produces_annual_report'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_produces_annual_report-1">YES</label>
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end inpgrp">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_newsletter" class="form-label">Does the affiliate produce a monthly/quarterly newsletter? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_newsletter" id="field_newsletter-none" <?php if ($content['report_data'][0]['field_newsletter'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_newsletter-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_newsletter" id="field_newsletter-0" <?php if ($content['report_data'][0]['field_newsletter'] == 0 && $content['report_data'][0]['field_newsletter'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_newsletter-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_newsletter" id="field_newsletter-1" <?php if ($content['report_data'][0]['field_newsletter'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_newsletter-1">YES</label>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_state_of_black_report" class="form-label">Does affiliate produce a "State of Black (Affiliate Name)" Report?</label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_state_of_black_report" id="field_state_of_black_report-none" <?php if ($content['report_data'][0]['field_state_of_black_report'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_state_of_black_report-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_state_of_black_report" id="field_state_of_black_report-0" <?php if ($content['report_data'][0]['field_state_of_black_report'] == 0 && $content['report_data'][0]['field_state_of_black_report'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_state_of_black_report-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_state_of_black_report" id="field_state_of_black_report-1" <?php if ($content['report_data'][0]['field_state_of_black_report'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_state_of_black_report-1">YES</label>
                            </label>
                          </div>
                        </div>

                      </div>

                      <div class="row g-4 align-items-end inpgrp">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_maintains_website" class="form-label">Does the affiliate maintain a website? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_maintains_website" id="field_maintains_website-none" <?php if ($content['report_data'][0]['field_maintains_website'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_maintains_website-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_maintains_website" id="field_maintains_website-0" <?php if ($content['report_data'][0]['field_maintains_website'] == 0 && $content['report_data'][0]['field_maintains_website'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_maintains_website-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_maintains_website" id="field_maintains_website-1" <?php if ($content['report_data'][0]['field_maintains_website'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_maintains_website-1">YES</label>
                            </label>
                          </div>
                        </div>


                      </div>


                      <div class="row g-4 align-items-end inpgrp">

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-affiliate-website-address" class="form-label">If so, what is your affiliate's website address?</label>
                            <input type="text" class="form-control " id="edit-field-affiliate-website-address" name="field_affiliate_website_address" value="<?= $content['report_data'][0]['field_affiliate_website_address'] ?>">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-monthly-website-hits" class="form-label">How many hits does your website receive monthly?</label>
                            <input type="text" class="form-control" id="edit-field-monthly-website-hits" name="field_monthly_website_hits" value="<?= number_format($content['report_data'][0]['field_monthly_website_hits']) ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row g-4 align-items-end inpgrp">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_is_website_linked_to_nul" class="form-label">Is website linked to NUL website? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_is_website_linked_to_nul" id="field_is_website_linked_to_nul-none" <?php if ($content['report_data'][0]['field_is_website_linked_to_nul'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_is_website_linked_to_nul-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_is_website_linked_to_nul" id="field_is_website_linked_to_nul-0" <?php if ($content['report_data'][0]['field_is_website_linked_to_nul'] == 0 && $content['report_data'][0]['field_is_website_linked_to_nul'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_is_website_linked_to_nul-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_is_website_linked_to_nul" id="field_is_website_linked_to_nul-1" <?php if ($content['report_data'][0]['field_is_website_linked_to_nul'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_is_website_linked_to_nul-1">YES</label>
                            </label>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_produces_tv_or_cable_show" class="form-label">Does affiliate produce a regular TV or cable show? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_produces_tv_or_cable_show" id="field_produces_tv_or_cable_show-none" <?php if ($content['report_data'][0]['field_produces_tv_or_cable_show'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_produces_tv_or_cable_show-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_produces_tv_or_cable_show" id="field_produces_tv_or_cable_show-0" <?php if ($content['report_data'][0]['field_produces_tv_or_cable_show'] == 0 && $content['report_data'][0]['field_produces_tv_or_cable_show'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_produces_tv_or_cable_show-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_produces_tv_or_cable_show" id="field_produces_tv_or_cable_show-1" <?php if ($content['report_data'][0]['field_produces_tv_or_cable_show'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_produces_tv_or_cable_show-1">YES</label>
                            </label>
                          </div>
                        </div>


                      </div>

                      <div class="row g-4 align-items-end inpgrp">

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_produces_a_radio_show" class="form-label">Does affiliate produce a radio show? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_produces_a_radio_show" id="field_produces_a_radio_show-none" <?php if ($content['report_data'][0]['field_produces_a_radio_show'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_produces_a_radio_show-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_produces_a_radio_show" id="field_produces_a_radio_show-0" <?php if ($content['report_data'][0]['field_produces_a_radio_show'] == 0 && $content['report_data'][0]['field_produces_a_radio_show'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_produces_a_radio_show-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_produces_a_radio_show" id="field_produces_a_radio_show-1" <?php if ($content['report_data'][0]['field_produces_a_radio_show'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_produces_a_radio_show-1">YES</label>
                            </label>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_has_ad_marketing_campaign" class="form-label">Does affiliate have an advertising or marketing campaign? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_has_ad_marketing_campaign" id="field_has_ad_marketing_campaign-none" <?php if ($content['report_data'][0]['field_has_ad_marketing_campaign'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_has_ad_marketing_campaign-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_has_ad_marketing_campaign" id="field_has_ad_marketing_campaign-0" <?php if ($content['report_data'][0]['field_has_ad_marketing_campaign'] == 0 && $content['report_data'][0]['field_has_ad_marketing_campaign'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_has_ad_marketing_campaign-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_has_ad_marketing_campaign" id="field_has_ad_marketing_campaign-1" <?php if ($content['report_data'][0]['field_has_ad_marketing_campaign'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_has_ad_marketing_campaign-1">YES</label>
                            </label>
                          </div>
                        </div>



                      </div>


                      <div class="row g-4 align-items-end inpgrp">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_method_of_ad_marketing" class="form-label">What is the method of advertising or marketing? </label>
                            <br>
                            <?php
                            $ad_market = [];
                            foreach ($community_relation_method_ad_market as $key => $val) {
                              //print_r($val['field_method_of_ad_marketing']);
                              $ad_market[] = $val['field_method_of_ad_marketing'];
                            }
                            //Create checkboxes
                            $method_of_advertising = array("TV", "Radio", "Print", "Other");
                            $i = 0;
                            foreach ($method_of_advertising as $method) {
                              if (in_array($method, $ad_market)) {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>

                              <label class="checkbox <?php echo $checked; ?>">
                                <input type="checkbox" name="field_method_of_ad_marketing-<?php echo $method; ?>" id="field_method_of_ad_marketing-<?php echo $method; ?>" value="<?php echo $method; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
                                <label class="label p-r-10" for="field_method_of_ad_marketing-<?php echo $method; ?>"><?php echo $method; ?></label>
                              </label>
                            <?php $i++;
                            } ?>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_marketing_kit_or_pamphlet" class="form-label">Does affiliate do a marketing kit and/or pamphlet? </label>

                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_marketing_kit_or_pamphlet" id="field_marketing_kit_or_pamphlet-none" <?php if ($content['report_data'][0]['field_marketing_kit_or_pamphlet'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_marketing_kit_or_pamphlet-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_marketing_kit_or_pamphlet" id="field_marketing_kit_or_pamphlet-0" <?php if ($content['report_data'][0]['field_marketing_kit_or_pamphlet'] == '0') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_marketing_kit_or_pamphlet-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_marketing_kit_or_pamphlet" id="field_marketing_kit_or_pamphlet-1" <?php if ($content['report_data'][0]['field_marketing_kit_or_pamphlet'] == '1') echo 'checked="checked"'; ?>>
                              <label class="label p-r-10" for="field_marketing_kit_or_pamphlet-1">YES</label>
                            </label>
                          </div>
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
                              <select class="form-select" aria-label="field_parent_census" id="field_parent_census" name="field_parent_census" required>
                                <!-- <option value="">- None -</option> -->
                                <?php foreach ($parent_census as $parent) { ?>
                                  <option value="<?= $parent['report_id']; ?>" <?php if ($parent['report_id'] == $content['report_data'][0]['field_parent_census']) { ?>selected="selected" <?php } ?>>
                                    <?= $parent['organization'] . " " . $parent['field_year'] . " census"; ?>
                                  </option>
                                <?php } ?>
                              </select>
                              <input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" id="hid_parent_census">
                            </div>
                          </div>
                        <?php 
                        // } elseif (
                        //   $this->session->role_id == 2 && $statuses['serviceareas']['status'] == 'Completed' && $statuses['community']['status'] == 'Completed' && $statuses['employees']['status'] == 'Completed'
                        //   && $statuses['revenue']['status'] == 'Completed' && $statuses['expenditure']['status'] == 'Completed' && $statuses['education_program']['status'] == 'Completed' && $statuses['entrepreneurship_program']['status'] == 'Completed'
                        //   && $statuses['health_quality']['status'] == 'Completed' && $statuses['housing']['status'] == 'Completed' && $statuses['workforce']['status'] == 'Completed'  && $statuses['other_programs']['status'] == 'Completed'
                        //   && $statuses['covid']['status'] == 'Completed' && $statuses['civic']['status'] == 'Completed' && $statuses['emergency_relief']['status'] == 'Completed' && $statuses['contact_data']['status'] == 'Completed'
                        //   && $statuses['empowerment']['status'] == 'Completed' && $statuses['volunteer']['status'] == 'Completed'
                        // ) { 
                          ?>
                          <!-- <div class="col-md-12">
                            <div class="form-group">
                              <label for="field_parent_census" class="form-label">Parent census <span>*</span></label>
                              <select class="form-select" aria-label="field_parent_census" id="field_parent_census" name="field_parent_census" required>
                                 <option value="">- None -</option> 
                                <?php foreach ($parent_census as $parent) { ?>
                                  <option value="<?= $parent['report_id']; ?>" <?php if ($parent['report_id'] == $content['report_data'][0]['field_parent_census']) { ?>selected="selected" <?php } ?>>
                                    <?= $parent['organization'] . " " . $parent['field_year'] . " census"; ?>
                                  </option>
                                <?php } ?>
                              </select>
                              <input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" id="hid_parent_census">
                            </div>
                          </div> -->
                        <?php } else { ?>
                          <input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" name="field_parent_census" id="hid_parent_census">
                        <?php } ?>
                      </div>
                      <hr>

                      <div class="">
                        <div class="form-group t-c formclassbtn">
                          <button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                          <button class="btn btn-danger m-r-15 btn-rounded" type="button" data-status_id="<?= $statuses['community']['status'];?>" data-table_name="community_relations" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
                          <button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
                        </div>
                      </div>
                      <input type="hidden" value="<?= $content['report_data'][0]['pk_id']; ?>" name="pk_id" id="pk_id">

                    </div>
                  </form>
                </div>

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
                            <td>Does the affiliate produce an annual report?: </td>
                            <td><span><?php if (($content['report_data'][0]['field_produces_annual_report']) == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_produces_annual_report'] == 0 && $content['report_data'][0]['field_produces_annual_report'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_produces_annual_report'] == 2) {
                                        echo "N/A";
                                      } ?></span></td>
                          </tr>
                          <tr>
                            <td>Does the affiliate produce a monthly/quarterly newsletter?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_newsletter'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_newsletter'] == 0 && $content['report_data'][0]['field_newsletter'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_newsletter'] == 2) {
                                        echo "N/A";
                                      } ?></span></td>
                          </tr>
                          <tr>
                            <td>Does affiliate produce a "State of Black (Affiliate Name)" Report?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_state_of_black_report'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_state_of_black_report'] == 0 && $content['report_data'][0]['field_state_of_black_report'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_state_of_black_report'] == 2) {
                                        echo "N/A";
                                      } ?></span></td>
                          </tr>
                          <tr>
                            <td>Does the affiliate maintain a website?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_maintains_website'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_maintains_website'] == 0 && $content['report_data'][0]['field_maintains_website'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_maintains_website'] == 2) {
                                        echo "N/A";
                                      }; ?></span></td>
                          </tr>
                          <tr>
                            <td>If so, what is your affiliate's website address?: </td>
                            <td><span><?= $content['report_data'][0]['field_affiliate_website_address']; ?></span></td>
                          </tr>
                          <tr>
                            <td>How many hits does your website receive monthly?: </td>
                            <td><span> <?php if (!empty($content['report_data'][0]['field_monthly_website_hits'])) { ?> <?= number_format($content['report_data'][0]['field_monthly_website_hits']); ?> <?php } ?> </span></td>
                          </tr>
                          <tr>
                            <td>Is website linked to NUL website?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_is_website_linked_to_nul'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_is_website_linked_to_nul'] == 0 && $content['report_data'][0]['field_is_website_linked_to_nul'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_is_website_linked_to_nul'] == 2) {
                                        echo "N/A";
                                      }; ?></span></td>
                          </tr>
                          <tr>
                            <td>Does affiliate produce a regular TV or cable show?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_produces_tv_or_cable_show'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_produces_tv_or_cable_show'] == 0 && $content['report_data'][0]['field_produces_tv_or_cable_show'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_produces_tv_or_cable_show'] == 2) {
                                        echo "N/A";
                                      }; ?></span></td>
                          </tr>
                          <tr>
                            <td>Does affiliate produce a radio show?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_produces_a_radio_show'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_produces_a_radio_show'] == 0 && $content['report_data'][0]['field_produces_a_radio_show'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_produces_a_radio_show'] == 2) {
                                        echo "N/A";
                                      }; ?></span></td>
                          </tr>
                          <tr>
                            <td>Does affiliate have an advertising or marketing campaign?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_has_ad_marketing_campaign'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_has_ad_marketing_campaign'] == 0 && $content['report_data'][0]['field_has_ad_marketing_campaign'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_has_ad_marketing_campaign'] == 2) {
                                        echo "N/A";
                                      }; ?></span></td>
                          </tr>
                          <tr>
                            <td>What is the method of advertising or marketing?: </td>
                            <td><span>
                                <?php foreach ($community_relation_method_ad_market as $key => $val) {
                                  echo $val['field_method_of_ad_marketing'] . "<br>";
                                } ?>
                              </span></td>
                          </tr>
                          <tr>
                            <td>Does affiliate do a marketing kit and/or pamphlet?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_marketing_kit_or_pamphlet'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_marketing_kit_or_pamphlet'] == 0 && $content['report_data'][0]['field_marketing_kit_or_pamphlet'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_marketing_kit_or_pamphlet'] == 2) {
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