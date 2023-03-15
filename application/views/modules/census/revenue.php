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
            <div class="h5 Subtittle text-primary"><b>Revenue</b></div>

            <?php if (count($content['report_data']) > 0) { ?>
              <?php if ($this->session->role_id != 1) {
                if ($statuses['revenue']['status'] != "Submitted" && $statuses['revenue']['status'] != "Reviewed Complete") {
              ?>
                  <nav class="innerTab">
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                      <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                    </div>
                    <?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
                      <div class="nav nav-pills" id="" role="tablist">
                        <button type="button" id="revenue" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                      </div>
                    <?php } ?>
                    <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                      <div class="nav nav-pills" id="" role="tablist">
                        <button type="button" id="revenue" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
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
                      <button type="button" id="revenue" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                    </div>
                  <?php } ?>
                  <?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="revenue" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
                    </div>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="revenue" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
                    </div>
                  <?php } ?>
                  <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="revenue" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
                    </div>
                  <?php } ?>
                </nav>
              <?php }
              if (isset($_GET['msg'])) { ?>
                <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Revenue data has been updated.</div>
              <?php } ?>

              <?php if (isset($_GET['tab_message'])) { ?>
                <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
              <?php } ?>

              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
                  <form id="edit-revenue" method="post" action="<?php echo base_url('module/forms_update/revenue/update'); ?>">
                    <div class="full_form">
                      
                      <div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div>
                       
                      <br/>
                      <br/><br/>
                      <br/>
                      <div class="row g-4 align-items-end p-b-20">
                        <?php if ($this->session->role_id == 1) { ?>
                          <div class="col-md-12">
                            <label for="edit-title" class="form-label">Title *</label>
                          </div>
                          <div class="col-md-12">
                            <div class="d-flex justify-content-center align-items-center">
                              &nbsp;&nbsp;&nbsp; <input type="text" class="form-control" id="edit-title" aria-label="edit-title" value="Revenue" required readonly>
                            </div>
                          </div>
                        <?php } ?>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <label for="edit-field-revenue-investment" class="form-label">How much investment earnings (money market account, endowment)?</label>
                        </div>
                        <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control  edit-field-revenue-input" id="edit-field-revenue-investment" name="field_revenue_investment" value="<?= number_format($content['report_data'][0]['field_revenue_investment'], 2); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <label for="edit-field-revenue-corporations" class="form-label">Corporations</label>
                        </div>
                        <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control edit-field-revenue-input" id="edit-field-revenue-corporations" name="field_revenue_corporations" value="<?= number_format($content['report_data'][0]['field_revenue_corporations'], 2); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <label for="edit-field-revenue-foundations" class="form-label">Foundations</label>
                        </div>
                        <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control edit-field-revenue-input" id="edit-field-revenue-foundations" name="field_revenue_foundations" value="<?= number_format($content['report_data'][0]['field_revenue_foundations'], 2); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <label for="edit-field-revenue-individual-members" class="form-label">Individual Memberships</label>
                        </div>
                        <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control edit-field-revenue-input" id="edit-field-revenue-individual-members" name="field_revenue_individual_members" value="<?= number_format($content['report_data'][0]['field_revenue_individual_members'], 2); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <label for="edit-field-revenue-special-events" class="form-label">Special Events</label>
                        </div>
                        <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control edit-field-revenue-input" id="edit-field-revenue-special-events" name="field_revenue_special_events" value="<?= number_format($content['report_data'][0]['field_revenue_special_events'], 2); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <label for="edit-field-revenue-united-way" class="form-label">United Way</label>
                        </div>
                        <div class="col-md-12">

                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control edit-field-revenue-input" id="edit-field-revenue-united-way" name="field_revenue_united_way" value="<?= number_format($content['report_data'][0]['field_revenue_united_way'], 2); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <label for="edit-field-revenue-federal" class="form-label">Federal</label>
                        </div>
                        <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control edit-field-revenue-input" id="edit-field-revenue-federal" name="field_revenue_federal" value="<?= number_format($content['report_data'][0]['field_revenue_federal'], 2); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <label for="edit-field-revenue-state-local" class="form-label">State/Local</label>
                        </div>
                        <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control edit-field-revenue-input" id="edit-field-revenue-state-local" name="field_revenue_state_local" value="<?= number_format($content['report_data'][0]['field_revenue_state_local'], 2); ?>">
                          </div>
                        </div>

                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <label for="edit-field-revenue-nul" class="form-label">NUL</label>
                        </div>
                        <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control edit-field-revenue-input" id="edit-field-revenue-nul" name="field_revenue_nul" value="<?= number_format($content['report_data'][0]['field_revenue_nul'], 2); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-24">
                          <div class="form-group">
                            <label for=edit-field-revenue-purpose-of-funding class="form-label"> Purpose of NUL Funding </label>
                            <textarea id="edit-field-revenue-purpose-of-funding" rows="4" class="form-control" cols="106" name="field_revenue_purpose_of_funding"><?= $content['report_data'][0]['field_revenue_purpose_of_funding']; ?></textarea>
                          </div>
                        </div>
                      </div>

                      <p>Affiliate Social Entrepreneurship Ventures and/or Income Generating Activities </p>
                      <?php if (count($content['venture']) == 0) { ?>
                        <div class="messages error" id="no_data_added"> <i class="i i-warning"></i>&nbsp; &nbsp;No Ventures added yet. Select a venture type and press a button below to add one.</div>
                      <?php } ?>

                      <?php if (count($content['venture']) > 0) {

                        for ($i = 0; $i < count($content['venture']); $i++) { ?>

                          <div class="tabilCard NulCard EmployeeCard m-t-15" id="row<?= $content['venture'][$i]['venture_id']; ?>">
                            <div class="contact-table table-responsive p-b-15">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th colspan="4">Venture type: Ventures </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th>Venture Type</th>
                                    <th>Amount Earned</th>
                                    <th>Amount Budgeted</th>
                                  </tr>
                                  <tr>
                                    <td>
                                      <!-- <input type="text" class="form-control w-500px" id="ventureid-<?= $content['venture'][$i]['venture_id']; ?>-field_budget_venture_type" name="ventureid-<?= $content['venture'][$i]['venture_id']; ?>-field_budget_venture_type" value="<?= $content['venture'][$i]['name']; ?>"></td> -->
                                      <select class="form-select w-500px select2" aria-label="edit-field-venture-type" id="ventureid-<?= $content['venture'][$i]['venture_id']; ?>-field_budget_venture_type" name="ventureid-<?= $content['venture'][$i]['venture_id']; ?>-field_budget_venture_type">
                                        <option value="">- None -</option>
                                        <?php foreach ($venture_type as $type) { ?>
                                          <option value="<?= $type['id']; ?>" <?php if ($type['id'] == $content['venture'][$i]['id']) { ?>selected="selected" <?php } ?>>
                                            <?= $type['name']; ?>
                                          </option>
                                        <?php } ?>
                                      </select>

                                    <td>
                                      <div class="row align-items-center">
                                        <div class="col-1"><span>$</span></div>
                                        <div class="col-11"><input type="text" class="AmountEarnedforCalculate form-control w-200px" id="ventureid-<?= $content['venture'][$i]['venture_id']; ?>-field_budget_venture_earned" name="ventureid-<?= $content['venture'][$i]['venture_id']; ?>-field_budget_venture_earned" value="<?= $content['venture'][$i]['field_budget_venture_earned']; ?>"> </div>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="row align-items-center">
                                        <div class="col-1"><span>$</span></div>
                                        <div class="col-11"><input type="text" class="form-control w-200px" id="ventureid-<?= $content['venture'][$i]['venture_id']; ?>-field_budget_venture_budgeted" name="ventureid-<?= $content['venture'][$i]['venture_id']; ?>-field_budget_venture_budgeted" value="<?= $content['venture'][$i]['field_budget_venture_budgeted']; ?>"> </div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <button class="btn btn-danger btn-rounded m-r-15 m-t-15 m-l-15 btn_remove" id="<?= $content['venture'][$i]['venture_id']; ?>" onclick="removeVentureType(<?= $content['venture'][$i]['venture_id']; ?>)">Remove</button>
                            </div>
                          </div>

                      <?php }
                      } ?>



                      <div id="venture_type">
                      </div>

                      <script>
                        var venture_type = <?php echo json_encode($venture_type); ?>;
                      </script>

                      <br>
                      <button class="btn btn-primary btn-rounded m-r-15 venture" id="delventure<?php echo count($content['venture']) ?>" onClick="addVenturetype(this.id.replace ( /[^\d.]/g, '' ),venture_type);" type="button">+ Add Ventures</button>
                      <br><br>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-revenue-other" class="form-label">Other</label>
                            <div class="d-flex justify-content-center align-items-center">
                              <span>$</span> &nbsp; <input type="text" class="otherTottal form-control" id="edit-field-revenue-other" name="field_revenue_other" value="<?= $content['report_data'][0]['field_revenue_other']; ?>" readonly="readonly">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-revenue-total-budget" class="form-label">Total revenue for your affiliate:</label>
                            <div class="d-flex justify-content-center align-items-center">
                              <span>$</span> &nbsp; <input type="text" class="form-control total_output" id="edit-field-revenue-total-budget" name="field_revenue_total_budget" value="<?= $content['report_data'][0]['field_revenue_total_budget']; ?>" readonly="readonly">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="field_revenue_has_endowment" class="form-label">Does the affiliate have an endowment? </label>
                            <br>
                            <label class="radio">
                              <input type="radio" value="2" name="field_revenue_has_endowment" id="field_revenue_has_endowment-none" <?php if ($content['report_data'][0]['field_revenue_has_endowment'] == '2') echo 'checked="checked"'; ?>>
                              <label class="label  p-r-10" for="field_revenue_has_endowment-none">N/A</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="0" name="field_revenue_has_endowment" id="field_revenue_has_endowment-0" <?php if ($content['report_data'][0]['field_revenue_has_endowment'] == 0 && $content['report_data'][0]['field_revenue_has_endowment'] != '') echo 'checked="checked"'; ?>>
                              <label class="label  p-r-10" for="field_revenue_has_endowment-0">NO</label>
                            </label>
                            <label class="radio">
                              <input type="radio" value="1" name="field_revenue_has_endowment" id="field_revenue_has_endowment-1" <?php if ($content['report_data'][0]['field_revenue_has_endowment'] == 1) echo 'checked="checked"'; ?>>
                              <label class="label  p-r-10" for="field_revenue_has_endowment-1">YES</label>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-12">

                          <div class="form-group">
                            <label for="edit-field-revenue-endowment-amount" class="form-label">If so, what is the present amount?</label>
                            <div class="d-flex justify-content-center align-items-center">
                              <span>$</span> &nbsp; <input type="text" class="form-control " id="edit-field-revenue-endowment-amount" name="field_revenue_endowment_amount" value="<?= $content['report_data'][0]['field_revenue_endowment_amount']; ?>">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end">

                        <div class="col-md-8" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
                          <div class="form-group">
                            <label for="Status" class="form-label">Tab Status <span>*</span></label>
                            <select class="form-select" id="Status" name="field_tab_status">
                              <!-- <option value="">- None -</option> -->
                              <?php foreach ($census_tab_statuses as $option) {
                                if ($content['report_data'][0]['field_tab_status'] == 0) { ?>
                                  <option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
                                    <?= $option['status']; ?>
                                  </option>
                                <?php } else { ?>
                                  <option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['report_data'][0]['field_tab_status']) { ?>selected="selected" <?php } ?>>
                                    <?= $option['status']; ?>
                                  </option>
                                <?php } ?>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <?php if ($this->session->role_id == 1) { ?>
                          <div class="col-md-8">
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
                        //  } elseif (
                        //   $this->session->role_id == 2 && $statuses['serviceareas']['status'] == 'Completed' && $statuses['community']['status'] == 'Completed' && $statuses['employees']['status'] == 'Completed'
                        //   && $statuses['revenue']['status'] == 'Completed' && $statuses['expenditure']['status'] == 'Completed' && $statuses['education_program']['status'] == 'Completed' && $statuses['entrepreneurship_program']['status'] == 'Completed'
                        //   && $statuses['health_quality']['status'] == 'Completed' && $statuses['housing']['status'] == 'Completed' && $statuses['workforce']['status'] == 'Completed'  && $statuses['other_programs']['status'] == 'Completed'
                        //   && $statuses['covid']['status'] == 'Completed' && $statuses['civic']['status'] == 'Completed' && $statuses['emergency_relief']['status'] == 'Completed' && $statuses['contact_data']['status'] == 'Completed'
                        //   && $statuses['empowerment']['status'] == 'Completed' && $statuses['volunteer']['status'] == 'Completed'
                        // ) { 
                          ?>
                          <!-- <div class="col-md-8">
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

                        <?php if ($this->session->role_id == 1) { ?>
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="edit-field-legacy-budgetnulfunding" class="form-label">Legacy budgetNULFunding </label>
                              <input type="text" class="form-control" id="edit-field-legacy-budgetnulfunding" aria-label="edit-field-legacy-budgetnulfunding" name="field_legacy_budgetnulfunding" value="<?= number_format($content['report_data'][0]['field_legacy_budgetnulfunding']); ?>">
                            </div>
                          </div>
                        <?php } ?>

                      </div>

                      <hr>

                      <div class="">
                        <div class="form-group t-c">
                          <button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                          <button class="btn btn-danger m-r-15 btn-rounded" type="button" data-table_name="revenue" data-pk_id="<?= $content['report_data'][0]['pk_id']; ?>" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
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
                            <td>How much investment earnings (money market account, endowment)?: </td>
                            <td><span> <?php if (isset($content['report_data'][0]['field_revenue_investment'])) { ?>$<?= number_format($content['report_data'][0]['field_revenue_investment'], 2); ?> <?php } ?></span></td>
                          </tr>
                          <tr>
                            <td>Corporations: </td>
                            <td><span> <?php if (!empty($content['report_data'][0]['field_revenue_corporations'])) { ?>$<?= number_format($content['report_data'][0]['field_revenue_corporations'], 2); ?> <?php } ?></span></td>
                          </tr>
                          <tr>
                            <td>Foundations: </td>
                            <td><span> <?php if (!empty($content['report_data'][0]['field_revenue_foundations'])) { ?> $<?= number_format($content['report_data'][0]['field_revenue_foundations'], 2); ?> <?php } ?></span></td>
                          </tr>
                          <tr>
                            <td>Individual Memberships: </td>
                            <td><span> <?php if (!empty($content['report_data'][0]['field_revenue_individual_members'])) { ?> $<?= number_format($content['report_data'][0]['field_revenue_individual_members'], 2); ?> <?php } ?></span></td>
                          </tr>
                          <tr>
                            <td>Special Events: </td>
                            <td><span> $<?= number_format($content['report_data'][0]['field_revenue_special_events'], 2); ?> </span></td>
                          </tr>
                          <tr>
                            <td>United Way: </td>
                            <td><span> <?php if (isset($content['report_data'][0]['field_revenue_united_way'])) { ?> $<?= number_format($content['report_data'][0]['field_revenue_united_way'], 2); ?> <?php } ?></span></td>
                          </tr>
                          <tr>
                            <td>Federal: </td>
                            <td><span> $<?= number_format($content['report_data'][0]['field_revenue_federal'], 2); ?> </span></td>
                          </tr>
                          <tr>
                            <td>State/Local: </td>
                            <td><span> <?php if (!empty($content['report_data'][0]['field_revenue_state_local'])) { ?> $<?= number_format($content['report_data'][0]['field_revenue_state_local'], 2); ?> <?php } ?></span></td>
                          </tr>
                          <tr>
                            <td>NUL: </td>
                            <td><span> $<?= number_format($content['report_data'][0]['field_revenue_nul'], 2); ?> </span></td>
                          </tr>
                          <tr>
                            <td>Purpose of NUL Funding: </td>
                            <td><span><?= $content['report_data'][0]['field_revenue_purpose_of_funding']; ?></span></td>
                          </tr>
                          <tr>
                            <td>Other: </td>
                            <td><span> $<?= number_format($content['report_data'][0]['field_revenue_other'], 2); ?></span></td>
                          </tr>
                        </tbody>
                      </table>


                      <table class="table table-striped">
                        <tbody>
                          <?php if (count($content['venture']) > 0) { ?>
                            <tr>
                              <td>
                                <h4>Venture Type </h4>
                              </td>
                              <td>
                                <h4>Amount Earned </h4>
                              </td>
                              <td>
                                <h4>Amount Budgeted</h4>
                              </td>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($content['venture']); $i++) { ?>

                              <tr>
                                <td><?= $content['venture'][$i]['name']; ?> </td>
                                <td><span> $<?= number_format($content['venture'][$i]['field_budget_venture_earned'], 2); ?> </span></td>
                                <td><span> $<?= number_format($content['venture'][$i]['field_budget_venture_budgeted'], 2); ?></span></td>
                              </tr>
                          <?php
                            }
                          }
                          ?>

                          <tr>
                            <td>Does the affiliate have an endowment?: </td>
                            <td></td>
                            <td><span><?php if ($content['report_data'][0]['field_revenue_has_endowment'] == 1) {
                                        echo "Yes";
                                      } elseif ($content['report_data'][0]['field_revenue_has_endowment'] == 0 && $content['report_data'][0]['field_revenue_has_endowment'] != '') {
                                        echo "No";
                                      } elseif ($content['report_data'][0]['field_revenue_has_endowment'] == 2) {
                                        echo "N/A";
                                      }; ?></span></td>
                          </tr>
                          <tr>
                            <td>If so, what is the present amount?: </td>
                            <td></td>
                            <td><span><?php if (!empty($content['report_data'][0]['field_revenue_endowment_amount'])) { ?> $<?= number_format($content['report_data'][0]['field_revenue_endowment_amount'], 2); ?> <?php } ?></span></td>
                          </tr>
                          <tr>
                            <td>Total revenue for your affiliate:: </td>
                            <td></td>
                            <td><span><?php if (!empty($content['report_data'][0]['field_revenue_total_budget'])) { ?>$<?= number_format($content['report_data'][0]['field_revenue_total_budget'], 2); ?> <?php } ?></span></td>
                          </tr>
                          <?php if ($this->session->role_id == 1) { ?>
                            <tr>
                              <td>Legacy budgetNULFunding: </td>
                              <td></td>
                              <td><span><?= number_format($content['report_data'][0]['field_legacy_budgetnulfunding'], 2); ?></span></td>
                            </tr>
                          <?php } ?>
                          <tr style="visibility:hidden;">
                            <td> Test </td>
                            <td></td>
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