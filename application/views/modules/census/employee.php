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
            <div class="h5 Subtittle text-primary"><b>Employees and Board Members</b></div>

            <?php if (count($content['report_data']) > 0) { ?>
              <?php if ($this->session->role_id != 1) {
                if ($statuses['employees']['status'] != "Submitted" && $statuses['employees']['status'] != "Reviewed Complete") {
              ?>
                  <nav class="innerTab">
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                      <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                    </div>
                    <?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
                      <div class="nav nav-pills" id="" role="tablist">
                        <button type="button" id="employees_board_members" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                      </div>
                    <?php } ?>
                    <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                      <div class="nav nav-pills" id="" role="tablist">
                        <button type="button" id="employees_board_members" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
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
                      <button type="button" id="employees_board_members" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                    </div>
                  <?php } ?>
                  <?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="employees_board_members" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
                    </div>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="employees_board_members" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
                    </div>
                  <?php } ?>
                  <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="employees_board_members" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
                    </div>
                  <?php } ?>
                </nav>
              <?php }
              if (isset($_GET['msg'])) { ?>
                <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Employees and Board Members has been updated.</div>
              <?php } ?>

              <?php if (isset($_GET['tab_message'])) { ?>
                <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
              <?php } ?>


              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
                  <form id="edit-employee" method="post" action="<?php echo base_url('module/forms_update/employees/update'); ?>">
                    <div class="full_form">
                    <div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
                      <div class="row g-4 align-items-end p-b-20">
                        <?php if ($this->session->role_id == 1) { ?>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="edit-title" class="form-label">Title *</label>
                              <input type="text" class="form-control" id="edit-title" aria-label="edit-title" value="Employees and Board Members" required readonly>
                            </div>
                          </div>
                        <?php } ?>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-full-time-employees" class="form-label">How many full time employees do you have in your office? </label>
                            <input type="text" class="form-control" id="edit-field-full-time-employees" aria-label="edit-field-full-time-employees" name="field_full_time_employees" value="<?= number_format($content['report_data'][0]['field_full_time_employees']); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-part-time-employees" class="form-label">How many part time employees do you have in your office? </label>
                            <input type="text" class="form-control" id="edit-field-part-time-employees" aria-label="edit-field-part-time-employees" name="field_part_time_employees" value="<?= number_format($content['report_data'][0]['field_part_time_employees']); ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-average-employee-salary" class="form-label">What is the average salary for employees?</label>
                            <div class="d-flex justify-content-start align-items-center">
                              <span>$</span> &nbsp; <input type="text" class="form-control w-200px" id="edit-field-average-employee-salary" name="field_average_employee_salary" value="<?= number_format($content['report_data'][0]['field_average_employee_salary'], 2); ?>">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_employee_health_beneits" class="form-label">Does your affiliate provide health benefits to its employees? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_employee_health_beneits" id="field_employee_health_beneits-none" <?php if ($content['report_data'][0]['field_employee_health_beneits'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label  p-r-10 " for="field_employee_health_beneits-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_employee_health_beneits" id="field_employee_health_beneits-0" <?php if ($content['report_data'][0]['field_employee_health_beneits'] == 0 && $content['report_data'][0]['field_employee_health_beneits'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-15" for="field_employee_health_beneits-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_employee_health_beneits" id="field_employee_health_beneits-1" <?php if ($content['report_data'][0]['field_employee_health_beneits'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-15" for="field_employee_health_beneits-1">YES</label>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_employee_life_insurance" class="form-label">Does your affiliate provide life insurance to its employees? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_employee_life_insurance" id="edit-field-employee-life-insurance-none" <?php if ($content['report_data'][0]['field_employee_life_insurance'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-15" for="edit-field-employee-life-insurance-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_employee_life_insurance" id="edit-field-employee-life-insurance-0" <?php if ($content['report_data'][0]['field_employee_life_insurance'] == 0 && $content['report_data'][0]['field_employee_life_insurance'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-15" for="edit-field-employee-life-insurance-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_employee_life_insurance" id="edit-field-employee-life-insurance-1" <?php if ($content['report_data'][0]['field_employee_life_insurance'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-15" for="edit-field-employee-life-insurance-1">YES</label>
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_satellite_offices" class="form-label">Does your affiliate have satellite offices? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_satellite_offices" id="edit-field-satellite-offices-none" <?php if ($content['report_data'][0]['field_satellite_offices'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label p-r-15" for="edit-field-satellite-offices-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_satellite_offices" id="edit-field-satellite-offices-0" <?php if ($content['report_data'][0]['field_satellite_offices'] == 0 && $content['report_data'][0]['field_satellite_offices'] != '') echo 'checked="checked"'; ?>>
                              <label class="label p-r-15" for="edit-field-satellite-offices-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_satellite_offices" id="edit-field-satellite-offices-1" <?php if ($content['report_data'][0]['field_satellite_offices'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label p-r-15" for="edit-field-satellite-offices-1">YES</label>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-number-of-satellite-offic" class="form-label">If so, how many satellite offices does your affiliate have? </label>
                            <input type="text" class="form-control" id="edit-field-number-of-satellite-offic" name="field_number_of_satellite_office" value="<?php echo number_format($content['report_data'][0]['field_number_of_satellite_office']); ?> ">
                          </div>
                        </div>
                      </div>

                      <br>
                      <p>Please indicate number of each gender and total below:</p>

                      <div class="tabilCard NulCard EmployeeCard">
                        <div class="contact-table table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th colspan="4">What is racial/gender composition on board? </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th>Race</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Total</th>
                              </tr>
                              <tr>
                                <td>White</td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_white_males']); ?>" id="field_board_white_males" name="field_board_white_males" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_white_females']); ?>" id="field_board_white_females" name="field_board_white_females" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_white_total']); ?>" id="field_board_white_total" name="field_board_white_total" readonly onkeyup="employee_calc()"> </td>
                              </tr>
                              <tr>
                                <td>Hispanic/Latino</td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_hispanic_males']); ?>" id="field_board_hispanic_males" name="field_board_hispanic_males" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_hispanic_females']); ?>" id="field_board_hispanic_females" name="field_board_hispanic_females" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_hispanic_total']); ?>" id="field_board_hispanic_total" name="field_board_hispanic_total" readonly onkeyup="employee_calc()"></td>
                              </tr>
                              <tr>
                                <td>Asian American</td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_asian_am_males']); ?>" id="field_board_asian_am_males" name="field_board_asian_am_males" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_asian_am_females']); ?>" id="field_board_asian_am_females" name="field_board_asian_am_females" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_asian_am_total']); ?>" id="field_board_asian_am_total" name="field_board_asian_am_total" readonly onkeyup="employee_calc()"></td>
                              </tr>
                              <tr>
                                <td>Native American</td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_native_am_males']); ?>" id="field_board_native_am_males" name="field_board_native_am_males" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_native_am_females']); ?>" id="field_board_native_am_females" name="field_board_native_am_females" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_native_am_total']); ?>" id="field_board_native_am_total" name="field_board_native_am_total" readonly onkeyup="employee_calc()"></td>
                              </tr>
                              <tr>
                                <td>African American</td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_african_am_males']); ?>" id="field_board_african_am_males" name="field_board_african_am_males" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_african_am_females']); ?>" id="field_board_african_am_females" name="field_board_african_am_females" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_african_am_total']); ?>" id="field_board_african_am_total" name="field_board_african_am_total" readonly onkeyup="employee_calc()"></td>
                              </tr>
                              <tr>
                                <td>Other</td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_other_males']); ?>" id="field_board_other_males" name="field_board_other_males" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_other_females']); ?>" id="field_board_other_females" name="field_board_other_females" onkeyup="employee_calc()"></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_other_total']); ?>" id="field_board_other_total" name="field_board_other_total" readonly onkeyup="employee_calc()"></td>
                              </tr>
                              <tr>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td><input type="text" value="<?= number_format($content['report_data'][0]['field_board_member_grand_total']); ?>" readonly id="field_board_member_grand_total" name="field_board_member_grand_total" onkeyup="employee_calc()"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <br>

                      <div class="row g-4 align-items-end">
                        <?php //if($this->session->role_id != 2){ 
                        ?>
                        <div class="col-md-12" <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) { ?>style="display: none;" <?php } ?>>
                          <div class="form-group">
                            <label for="Status" class="form-label">Tab Status <span>*</span></label>
                            <select class="form-select" id="Status" name="field_tab_status">
                              <!-- <option value="">- None -</option> -->
                              <?php
                              if ($this->session->role_id == '1') {
                                foreach ($census_tab_statuses as $option) {
                                  if ($content['report_data'][0]['field_tab_status'] == 0) {
                              ?>
                                    <option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
                                      <?= $option['status']; ?>
                                    </option>
                                  <?php
                                  } else {
                                  ?>
                                    <option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['report_data'][0]['field_tab_status']) { ?>selected="selected" <?php } ?> <?php if (count($programs) == 0) { ?> <?php if ($option['status_id'] != 120) { ?> <?php }
                                                                                                                                                                                                                                                                                      if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?> <?php } ?>>
                                      <?= $option['status']; ?>
                                    </option>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                }
                              } elseif ($this->session->role_id == '2' || $this->session->role_id == '3') {
                                foreach ($census_tab_statuses as $option) {
                                  if ($option['status_id'] != '122' && $option['status_id'] != '123' && $option['status_id'] != '124') {
                                    if ($content['report_data'][0]['field_tab_status'] == 0) {
                                  ?>
                                      <option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
                                        <?= $option['status']; ?>
                                      </option>
                                    <?php
                                    } else {
                                    ?>
                                      <option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['report_data'][0]['field_tab_status']) { ?>selected="selected" <?php } ?> <?php if (count($programs) == 0) { ?> <?php if ($option['status_id'] != 120) { ?>disabled="true" <?php }
                                                                                                                                                                                                                                                                                                        if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?> <?php } ?>>
                                        <?= $option['status']; ?>
                                      </option>
                                  <?php
                                    }
                                  }
                                  ?>
                              <?php
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <?php //} 
                        ?>
                        <?php if ($this->session->role_id == 1) { ?>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="edit-field-parent-census" class="form-label">Parent census <span>*</span></label>
                              <select class="form-select" aria-label="edit-field-parent-census" id="edit-field-parent-census" name="field_parent_census" required>
                                <option value="">- None -</option>
                                <?php foreach ($parent_census as $parent) { ?>
                                  <option value="<?= $parent['report_id']; ?>" <?php if ($parent['report_id'] == $content['report_data'][0]['field_parent_census']) { ?>selected="selected" <?php } ?>>
                                    <?= $parent['organization'] . " " . $parent['field_year'] . " census"; ?>
                                  </option>
                                <?php } ?>
                              </select>
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
                              <label for="edit-field-parent-census" class="form-label">Parent census <span>*</span></label>
                              <select class="form-select" aria-label="edit-field-parent-census" id="edit-field-parent-census" name="field_parent_census" required>
                                <option value="">- None -</option>
                                <?php foreach ($parent_census as $parent) { ?>
                                  <option value="<?= $parent['report_id']; ?>" <?php if ($parent['report_id'] == $content['report_data'][0]['field_parent_census']) { ?>selected="selected" <?php } ?>>
                                    <?= $parent['organization'] . " " . $parent['field_year'] . " census"; ?>
                                  </option>
                                <?php } ?>
                              </select>
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
                          <button class="btn btn-danger m-r-15 btn-rounded" type="button" data-table_name="employees_board_members" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
                          <button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
                        </div>
                      </div>
                      <input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" id="hid_parent_census">
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
                            <td>How many full time employees do you have in your office?: </td>
                            <td><span><?= number_format($content['report_data'][0]['field_full_time_employees']); ?></span></td>
                          </tr>
                          <tr>
                            <td>How many part time employees do you have in your office?: </td>
                            <td><span><?= number_format($content['report_data'][0]['field_part_time_employees']); ?></span></td>
                          </tr>
                          <tr>
                            <td>What is the average salary for employees?: </td>
                            <!-- <td><span>$<?= $content['report_data'][0]['field_average_employee_salary']; ?></span></td> -->
                            <td><span><?php isset($content['report_data'][0]['field_average_employee_salary']) ? print_r("$" . number_format($content['report_data'][0]['field_average_employee_salary'], 2)) : print_r(''); ?></span></td>

                          </tr>
                          <tr>
                            <td>Does your affiliate provide health benefits to its employees?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_employee_health_beneits'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_employee_health_beneits'] == 0 && $content['report_data'][0]['field_employee_health_beneits'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_employee_health_beneits'] == 2) {
                                        echo "N/A";
                                      }; ?></span></td>
                          </tr>
                          <tr>
                            <td>Does your affiliate provide life insurance to its employees?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_employee_life_insurance'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_employee_life_insurance'] == 0 && $content['report_data'][0]['field_employee_life_insurance'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_employee_health_beneits'] == 2) {
                                        echo "N/A";
                                      } ?></span></td>
                          </tr>
                          <tr>
                            <td>Does your affiliate have satellite offices?: </td>
                            <td><span><?php if ($content['report_data'][0]['field_satellite_offices'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_satellite_offices'] == 0 && $content['report_data'][0]['field_satellite_offices'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_employee_health_beneits'] == 2) {
                                        echo "N/A";
                                      } ?></span></td>
                          </tr>
                          <tr>
                            <td>If so, how many satellite offices does your affiliate have?: </td>
                            <td><span><?php echo number_format($content['report_data'][0]['field_number_of_satellite_office']); ?></span></td>
                          </tr>
                          <!-- <tr>
                            <td>Board Help: </td>
                            <td><span></span></td>
                          </tr> -->
                        </tbody>
                      </table>


                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <td>
                              <h4>What is the racial/gender composition of your board? </h4>
                            </td>
                            <td><span></span></td>
                            <td><span></span></td>
                            <td><span></span></td>
                          </tr>
                          <tr>
                            <td>Race </td>
                            <td><span>Male </span></td>
                            <td><span>Female</span></td>
                            <td><span>Total</span></td>
                          </tr>
                          <tr>
                            <td>White </td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_white_males']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_white_females']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_white_total']); ?></span></td>
                          </tr>
                          <tr>
                            <td>Hispanic/Latino </td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_hispanic_males']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_hispanic_females']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_hispanic_total']); ?></span></td>
                          </tr>
                          <tr>
                            <td>Asian American </td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_asian_am_males']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_asian_am_females']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_asian_am_total']); ?></span></td>
                          </tr>

                          <tr>
                            <td>Native American </td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_native_am_males']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_native_am_females']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_native_am_total']); ?></span></td>
                          </tr>
                          <tr>
                            <td>African American </td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_african_am_males']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_african_am_females']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_african_am_total']); ?></span></td>
                          </tr>
                          <tr>
                            <td>Other</td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_other_males']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_other_females']); ?></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_other_total']); ?></span></td>
                          </tr>
                          <tr>
                            <td>Total </td>
                            <td>
                              <span< /span>
                            </td>
                            <td><span></span></td>
                            <td><span><?= number_format($content['report_data'][0]['field_board_member_grand_total']); ?></span></td>
                          </tr>
                          <?php if ($this->session->role_id == 1) { ?>
                            <tr>
                              <td>Tab Status: </td>
                              <td colspan="3"><span><?= $content['report_data'][0]['status']; ?></span></td>
                            </tr>
                            <tr>
                              <td>Parent census: </td>
                              <td colspan="3"><span><?= $content['report_data'][0]['organization'] . " " . $content['report_data'][0]['field_year'] . " census"; ?></span></td>
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