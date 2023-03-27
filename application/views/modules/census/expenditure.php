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
            <div class="h5 Subtittle text-primary"><b>Expenditures</b></div>

            <?php if ($content['report_data']) { ?>
              <?php if ($this->session->role_id != 1) {
                if ($statuses['expenditure']['status'] != "Submitted" && $statuses['expenditure']['status'] != "Reviewed Complete") {
              ?>
                  <nav class="innerTab">
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                      <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                    </div>
                    <?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
                      <div class="nav nav-pills" id="" role="tablist">
                        <button type="button" id="expenditures" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                      </div>
                    <?php } ?>
                    <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                      <div class="nav nav-pills" id="" role="tablist">
                        <button type="button" id="expenditures" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
                      </div>
                    <?php } ?>
                  </nav>
                <?php }
              } elseif ($this->session->role_id == 1) {
                ?>
                <nav class="innerTab">
                  <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                  </div>
                  <?php if ($content['report_data'][0]['field_tab_status']  == 120) { ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="expenditures" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                    </div>
                  <?php } ?>
                  <?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="expenditures" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
                    </div>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="expenditures" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
                    </div>
                  <?php } ?>
                  <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                    <div class="nav nav-pills" id="" role="tablist">
                      <button type="button" id="expenditures" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
                    </div>
                  <?php } ?>
                </nav>
              <?php }
              if (isset($_GET['msg'])) { ?>
                <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Expenditures has been updated.</div>
              <?php } ?>

              <?php if (isset($_GET['tab_message'])) { ?>
                <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
              <?php } ?>

              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
                  <form id="edit-expenditure" method="post" action="<?php echo base_url('module/forms_update/expenditure/update'); ?>">
                    <div class="full_form">
                    <div class="form-group t-c formclassbtn" style="text-align: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div>
                      <div class="row g-4 align-items-end p-b-20">
                        <?php if ($this->session->role_id == 1) { ?>

                          <div class="col-md-12">
                            <label for="edit-title" class="form-label">Title *</label>
                          </div>
                          <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                          &nbsp; &nbsp;  <input type="text" class="form-control" id="edit-title" aria-label="edit-title" value="Expenditures" required readonly>
                          </div>
                          </div>

                        <?php } ?>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">

                        <div class="col-md-12">

                          <label for="edit-field-total-expenditures" class="form-label">What was the total expenditure by your affiliate for expenses (include salaries, rent/mortgage, equipment, etc.)?</label>
                        </div>
                        <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control " id="edit-field-total-expenditures" name="field_total_expenditures" value="<?= number_format($content['report_data'][0]['field_total_expenditures'], 2); ?>">
                          </div>
                        </div>

                      </div>

                    </div>

                    <div class="row g-4 align-items-end p-b-20">

                      <div class="col-md-12">
                        <label for="edit-field-a-salaries-wages" class="form-label">A. Salaries/Wages</label>
                      </div>
                      <div class="col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                          <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-a-salaries-wages" name="field_a_salaries_wages" value="<?= number_format($content['report_data'][0]['field_a_salaries_wages'], 2); ?>">
                        </div>
                      </div>

                    </div>


                    <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-12">
                        <label for="edit-field-b-fringe-benefits" class="form-label">B. Fringe Benefits</label>
                      </div>
                      <div class="col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                          <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-b-fringe-benefits" name="field_b_fringe_benefits" value="<?= number_format($content['report_data'][0]['field_b_fringe_benefits'], 2); ?>">
                        </div>
                      </div>

                    </div>

                    <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-12">
                        <label for="edit-field-c-professional-fees" class="form-label">C. Professional/Contract/Consulting Fees</label>
                      </div>
                      <div class="col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                          <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-c-professional-fees" name="field_c_professional_fees" value="<?= number_format($content['report_data'][0]['field_c_professional_fees'], 2); ?>">
                        </div>
                      </div>

                    </div>


                    <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-12">
                        <label for="edit-field-d-travel" class="form-label">D. Travel</label>
                      </div>
                      <div class="col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                          <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-d-travel" name="field_d_travel" value="<?= number_format($content['report_data'][0]['field_d_travel'], 2); ?>">
                        </div>
                      </div>

                    </div>


                    <div class="row g-4 align-items-end p-b-20">

                    <div class="col-md-12">
                        <label for="edit-field-e-postage-freight" class="form-label">E. Postage/Freight</label>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                          <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-e-postage-freight" name="field_e_postage_freight" value="<?= number_format($content['report_data'][0]['field_e_postage_freight'], 2); ?>">
                        </div>
                    </div>
                    
                    </div>


                    <div class="row g-4 align-items-end p-b-20">
                    <div class="col-md-12">

                        <label for="edit-field-f-insurance" class="form-label">F. Insurance</label>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                          <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-f-insurance" name="field_f_insurance" value="<?= number_format($content['report_data'][0]['field_f_insurance'], 2); ?>">
                        </div>
                    </div>
                     
                    </div>


                    <div class="row g-4 align-items-end p-b-20">
                    <div class="col-md-12">
                        <label for="edit-field-g-interest-payments" class="form-label">G. Interest Payments</label>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                          <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-g-interest-payments" name="field_g_interest_payments" value="<?= number_format($content['report_data'][0]['field_g_interest_payments'], 2); ?>">
                        </div>
                    </div>
                     
                    </div>


                    <div class="row g-4 align-items-end p-b-20">
                    <div class="col-md-12">
                        <label for="edit-field-h-dues-subscription-regist" class="form-label">H. Dues/Subscription/Registration</label>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                          <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-h-dues-subscription-regist" name="field_h_dues_subscription_regist" value="<?= number_format($content['report_data'][0]['field_h_dues_subscription_regist'], 2); ?>">
                        </div>
                    </div>
                      
                    </div>


                    <div class="row g-4 align-items-end p-b-20">

                    <div class="col-md-12">
                      
                          <label for="edit-field-i-depreciation" class="form-label">I. Depreciation</label>
                    </div>
                    <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-i-depreciation" name="field_i_depreciation" value="<?= number_format($content['report_data'][0]['field_i_depreciation'], 2); ?>">
                          </div>
                    </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-12">
                          <label for="edit-field-j-taxes-including-property" class="form-label">J. Taxes (including property taxes)</label>
                      </div>
                      <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-j-taxes-including-property" name="field_j_taxes_including_property" value="<?= number_format($content['report_data'][0]['field_j_taxes_including_property'], 2); ?>">
                          </div>
                      </div>
                        
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-12">
                          <label for="edit-field-k-utilities" class="form-label">K. Utilities (telephone, gas, electric)</label>
                      </div>
                      <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-k-utilities" name="field_k_utilities" value="<?= number_format($content['report_data'][0]['field_k_utilities'], 2); ?>">
                          </div>
                      </div>
                       
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-12">
                          <label for="edit-field-l-equipment-space-rental" class="form-label">L. Equipment/space rental</label>
                      </div>
                      <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-l-equipment-space-rental" name="field_l_equipment_space_rental" value="<?= number_format($content['report_data'][0]['field_l_equipment_space_rental'], 2); ?>">
                          </div>
                      </div>
                        
                      </div>

                    <div class="row g-4 align-items-end p-b-20">
                     
                    <div class="col-md-12">
                          <label for="edit-field-m-goods-and-services" class="form-label">M. Goods and Services</label>
                    </div>
                    <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-m-goods-and-services" name="field_m_goods_and_services" value="<?= number_format($content['report_data'][0]['field_m_goods_and_services'], 2); ?>">
                          </div>
                    </div>
                     
                      </div>

                    <div class="row g-4 align-items-end p-b-20">
                    <div class="col-md-12">
                          <label for="edit-field-n-rent-mortgage-payments" class="form-label">N. Rent/mortgage payments</label>
                    </div>
                    <div class="col-md-12">

                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-n-rent-mortgage-payments" name="field_n_rent_mortgage_payments" value="<?= number_format($content['report_data'][0]['field_n_rent_mortgage_payments'], 2); ?>">
                          </div>
                    </div>
                        
                      </div>

                    <div class="row g-4 align-items-end p-b-20">
                    <div class="col-md-12">
                          <label for="edit-field-o-other" class="form-label">O. Other</label>
                    </div>
                    <div class="col-md-12">
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control input-value-calc" id="edit-field-o-other" name="field_o_other" value="<?= number_format($content['report_data'][0]['field_o_other'], 2); ?>">
                          </div>
                    </div>
                       
                      </div>


                    <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="edit-field-own-or-rent" class="form-label">Does the affiliate own or rent? </label>
                          <br>
                          <?php
                          $own_rent_arr = [];
                          foreach ($own_rent as $key => $val) {
                            //print_r($val['field_method_of_ad_marketing']);
                            $own_rent_arr[] = $val['field_own_or_rent'];
                          }
                          //Create checkboxes
                          $own_rent_possible_vals = array("Own", "Rent");
                          $i = 0;
                          foreach ($own_rent_possible_vals as $method) {
                            if (in_array($method, $own_rent_arr)) {
                              $checked = "checked";
                            } else {
                              $checked = "";
                            } ?>

                            <label class="checkbox <?php echo $checked; ?>">
                              <input type="checkbox" name="edit-field-own-or-rent-<?php echo $method; ?>" id="edit-field-own-or-rent-<?php echo $method; ?>" value="<?php echo $method; ?>" <?php if ($checked) { ?>checked="checked" <?php } ?>>
                              <label class="label p-r-10" for="edit-field-own-or-rent-<?php echo $method; ?>"><?php echo $method; ?></label>
  
                            </label>
                          <?php $i++;
                          } ?>

                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="edit-field-number-properties-owned" class="form-label">How many properties does the affiliate own? </label>
                          <input type="text" class="form-control" id="edit-field-number-properties-owned" name="field_number_properties_owned" value="<?= number_format($content['report_data'][0]['field_number_properties_owned']); ?>">
                        </div>
                      </div>

                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="edit-field-number-properties-rented" class="form-label">How many properties does the affiliate rent? </label>
                          <input type="text" class="form-control" id="edit-field-number-properties-rented" name="field_number_properties_rented" value="<?= number_format($content['report_data'][0]['field_number_properties_rented']); ?>">
                        </div>
                      </div>


                    </div>
                    <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="edit-field-market-value-of-property" class="form-label">If the affiliate owns its facilities, what is the current market value of the property?</label>
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control" id="edit-field-market-value-of-property" name="field_market_value_of_property" value="<?= number_format($content['report_data'][0]['field_market_value_of_property'], 2); ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="field_capital_budget" class="form-label">Does the affiliate have a capital budget? </label>
                          <br>
                          <label class="radio">
                            <input type="radio" value="2" name="field_capital_budget" id="field_capital_budget-none" <?php if ($content['report_data'][0]['field_capital_budget'] == '2') echo 'checked="checked"'; ?>>
                            <label class="label p-r-15" for="field_capital_budget-none">N/A</label>
                          </label>
                          <label class="radio">
                            <input type="radio" value="0" name="field_capital_budget" id="field_capital_budget-0" <?php if ($content['report_data'][0]['field_capital_budget'] == '0') echo 'checked="checked"'; ?>>
                            <label class="label p-r-15" for="field_capital_budget-0">NO</label>
                          </label>
                          <label class="radio">
                            <input type="radio" value="1" name="field_capital_budget" id="field_capital_budget-1" <?php if ($content['report_data'][0]['field_capital_budget'] == '1') echo 'checked="checked"'; ?>>
                            <label class="label p-r-15" for="field_capital_budget-1">YES</label>
                          </label>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="edit-field-capital-budget-amount" class="form-label">If so, how much?</label>
                          <div class="d-flex justify-content-center align-items-center">
                            <span>$</span> &nbsp; <input type="text" class="form-control" id="edit-field-capital-budget-amount" name="field_capital_budget_amount" value="<?= number_format($content['report_data'][0]['field_capital_budget_amount'], 2); ?>">
                          </div>
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
                            <label for="edit-field-parent-census" class="form-label">Parent census <span>*</span></label>
                            <select class="form-select" aria-label="edit-field-parent-census" id="edit-field-parent-census" name="field_parent_census">
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
                            <select class="form-select" aria-label="edit-field-parent-census" id="edit-field-parent-census" name="field_parent_census">
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
                        <input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" name="field_parent_census" id="edit-field-parent-census">
                      <?php } ?>
                    </div>


                    <hr>

                    <div class="">
                      <div class="form-group t-c formclassbtn">
                        <button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                        <button class="btn btn-danger m-r-15 btn-rounded" type="button" data-status_id="<?= $statuses['expenditure']['status'];?>" data-table_name="expenditures" data-pk_id="<?= $content['report_data'][0]['pk_id']; ?>" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
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
                          <td>What was the total expenditure by your affiliate for expenses (include salaries, rent/mortgage, equipment, etc.)?: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_total_expenditures'])) { ?>$<?= number_format($content['report_data'][0]['field_total_expenditures'], 2);
                                                                                                                  } ?></span></td>
                        </tr>
                        <tr>
                          <td>A. Salaries/Wages: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_a_salaries_wages'])) { ?>$<?= number_format($content['report_data'][0]['field_a_salaries_wages'], 2); ?> <?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>B. Fringe Benefits: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_b_fringe_benefits'])) { ?>$<?= number_format($content['report_data'][0]['field_b_fringe_benefits'], 2); ?> <?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>C. Professional/Contract/Consulting Fees: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_c_professional_fees'])) { ?>$<?= number_format($content['report_data'][0]['field_c_professional_fees'], 2); ?> <?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>D. Travel: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_d_travel'])) { ?>$<?= number_format($content['report_data'][0]['field_d_travel'], 2); ?><?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>E. Postage/Freight: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_e_postage_freight'])) { ?>$<?= number_format($content['report_data'][0]['field_e_postage_freight'], 2); ?><?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>F. Insurance: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_f_insurance'])) { ?>$<?= number_format($content['report_data'][0]['field_f_insurance'], 2); ?><?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>G. Interest Payments: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_g_interest_payments'])) { ?>$<?= number_format($content['report_data'][0]['field_g_interest_payments'], 2); ?><?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>H. Dues/Subscription/Registration: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_h_dues_subscription_regist'])) { ?>$<?= number_format($content['report_data'][0]['field_h_dues_subscription_regist'], 2); ?><?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>I. Depreciation: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_i_depreciation'])) { ?>$<?= number_format($content['report_data'][0]['field_i_depreciation'], 2); ?><?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>J. Taxes (including property taxes): </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_j_taxes_including_property'])) { ?>$<?= number_format($content['report_data'][0]['field_j_taxes_including_property'], 2);
                                                                                                                          } ?></span></td>
                        </tr>
                        <tr>
                          <td>K. Utilities (telephone, gas, electric): </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_k_utilities'])) { ?>$<?= number_format($content['report_data'][0]['field_k_utilities'], 2);
                                                                                                          } ?></span></td>
                        </tr>
                        <tr>
                          <td>L. Equipment/space rental: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_l_equipment_space_rental'])) { ?>$<?= number_format($content['report_data'][0]['field_l_equipment_space_rental'], 2); ?><?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>M. Goods and Services: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_m_goods_and_services'])) { ?>$<?= number_format($content['report_data'][0]['field_m_goods_and_services'], 2);
                                                                                                                    } ?></span></td>
                        </tr>
                        <tr>
                          <td>N. Rent/mortgage payments: </td>
                          <td><span><?php if (!empty($content['report_data'][0]['field_n_rent_mortgage_payments'])) { ?>$<?= number_format($content['report_data'][0]['field_n_rent_mortgage_payments'], 2); ?><?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>O. Other: </td>
                          <td><span><?php if (isset($content['report_data'][0]['field_o_other'])) { ?> $<?= number_format($content['report_data'][0]['field_o_other'], 2); ?> <?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>Does the affiliate own or rent?: </td>
                          <td><span>

                              <?php foreach ($own_rent as $key => $val) {
                                echo $val['field_own_or_rent'] . "<br>";
                              } ?>

                            </span></td>
                        </tr>
                        <tr>
                          <td>How many properties does the affiliate own?: </td>
                          <td><span><?= number_format($content['report_data'][0]['field_number_properties_owned']); ?></span></td>
                        </tr>
                        <tr>
                          <td>How many properties does the affiliate rent?: </td>
                          <?php if($content['report_data'][0]['field_number_properties_rented'] == "") {?>
                            <td><span><?= $content['report_data'][0]['field_number_properties_rented']; ?></span></td>
                          <?php }else{?>
                            <td><span><?= number_format($content['report_data'][0]['field_number_properties_rented']); ?></span></td>
                          <?php }?>
                        </tr>
                        <tr>
                          <td>If the affiliate owns its facilities, what is the current market value of the property?: </td>
                          <td><span><?php if (isset($content['report_data'][0]['field_market_value_of_property'])) { ?>$<?= number_format($content['report_data'][0]['field_market_value_of_property'], 2); ?> <?php } ?></span></td>
                        </tr>
                        <tr>
                          <td>Does the affiliate have a capital budget?: </td>
                          <td><span><?php if ($content['report_data'][0]['field_capital_budget'] == 1) {
                                      echo "Yes";
                                    } elseif ($content['report_data'][0]['field_capital_budget'] == 0 && $content['report_data'][0]['field_capital_budget'] != '') {
                                      echo "No";
                                    } elseif ($content['report_data'][0]['field_capital_budget'] == 2) {
                                      echo "N/A";
                                    } ?></span></td>
                        </tr>
                        <tr>
                          <td>If so, how much?: </td>
                          <td><span><?= number_format($content['report_data'][0]['field_capital_budget_amount'], 2); ?></span></td>
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