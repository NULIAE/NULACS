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
                  <div class="h5 Subtittle text-primary"><b>Housing and Community Development</b></div>
                  <?php if ($this->session->role_id != 1) {
                     if ($statuses['housing']['status'] != "Submitted" && $statuses['housing']['status'] != "Reviewed Complete") { ?>
                        <nav class="innerTab">
                           <div class="nav nav-pills" id="nav-tab" role="tablist">
                              <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                           </div>
                           <?php if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 && $content['report_data'][0]['field_tab_status']  == 120) {?>
                              <div class="nav nav-pills" id="" role="tablist">
                                 <button type="button" id="housing_community_development" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                              </div>
                           <?php }else{?>
                           <?php if ((count($programs) != 0) && $content['report_data'][0]['field_tab_status']  == 120) { ?>
                              <div class="nav nav-pills" id="" role="tablist">
                                 <button type="button" id="housing_community_development" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                              </div>
                           <?php } } ?>
                           <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                              <div class="nav nav-pills" id="" role="tablist">
                                 <button type="button" id="housing_community_development" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
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
                              <button type="button" id="housing_community_development" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                           </div>
								<?php }else{?>
                        <?php if ((count($programs) != 0) && $content['report_data'][0]['field_tab_status']  == 120) { ?>
                           <div class="nav nav-pills" id="" role="tablist">
                              <button type="button" id="housing_community_development" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                           </div>
                        <?php } } ?>
                        <?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
                           <div class="nav nav-pills" id="" role="tablist">
                              <button type="button" id="housing_community_development" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
                           </div>
                           <div class="nav nav-pills" id="" role="tablist">
                              <button type="button" id="housing_community_development" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
                           </div>
                        <?php } ?>
                        <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                           <div class="nav nav-pills" id="" role="tablist">
                              <button type="button" id="housing_community_development" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
                           </div>
                        <?php } ?>
                     </nav>
                  <?php }
                  if (isset($_GET['msg'])) { ?>
                     <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Housing and Community Development Program data has been updated.</div>
                  <?php } ?>
                  <?php if (isset($_GET['tab_message'])) { ?>
                     <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
                  <?php } ?>
                  <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
                        <form id="edit-housing" method="post" action="<?php echo base_url('module/forms_update/housing_prg/update'); ?>">
                           <div class="full_form">
                           <div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
                              <div class="row g-4 align-items-end p-b-20 our-affiliate-housing-programs">
                                 <div class="col-md-12" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
                                    <div class="form-group">
                                       <label for="edit-title" class="form-label">Title *</label>
                                       <input type="text" class="form-control" id="edit-title" aria-label="edit-title" value="Housing and Community Development" required readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="field_do_you_offer_programs_of_t" class="form-label">Our Affiliate offers programs of this type *</label>
                                       <br>
                                       <label class="radio">
                                          <input type="radio" name="field_do_you_offer_programs_of_t" id="field_do_you_offer_programs_of_t-0" class="hide_fields" onclick="showDivifYes()" value="0" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0) echo 'checked="checked"'; ?>>
                                          <label class="label p-r-10" for="field_do_you_offer_programs_of_t-0">NO</label>
                                       </label>
                                       <label class="radio">
                                          <input type="radio" name="field_do_you_offer_programs_of_t" id="field_do_you_offer_programs_of_t-1" class="hide_fields" onclick="showDivifYes()" value="1" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1) echo 'checked="checked"'; ?>>
                                          <label class="label p-r-10" for="field_do_you_offer_programs_of_t-1">YES</label>
                                       </label>
                                    </div>
                                 </div>
                              </div>



                              <div id="hide_div_if_no">
                                 <div class="row g-4 align-items-end p-b-20">

                                    <div class="clearfix p-b-20" <?php if (($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 || count($programs) != 0)) {?> style="display:none"<?php }?>>
                                       <div class="messages error">
                                          <i class="i i-warning"></i>&nbsp; &nbsp;You will require to enter
                                          information about at least one program
                                          to complete this tab on the next screen
                                       </div>
                                    </div>

                                    <div class="col-md-12">
                                       <div class="h5 Subtittle">Person Who Oversees Housing Programs</div>

                                       <div class="form-group">
                                          <label for="edit-field-housing-overseer-name-und" class="form-label">Name </label>
                                          <input type="text" class="form-control" id="edit-field-housing-overseer-name-und" name="field_housing_overseer_name" aria-label="nyc" value="<?= $content['report_data'][0]['field_housing_overseer_name']; ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="edit-field-housing-overseer-email" class="form-label">Email </label>
                                          <input type="text" class="form-control" id="edit-field-housing-overseer-email" name="field_housing_overseer_email" aria-label="nys" value="<?= $content['report_data'][0]['field_housing_overseer_email']; ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-total-part" class="form-label">Total Participants in Housing Programs </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-total-part" name="field_program_housing_total_part" aria-label="certified" value="<?= number_format($content['report_data'][0]['field_program_housing_total_part']); ?>">
                                       </div>
                                    </div>
                                 </div>


                                 <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-24">
                                       <div class="h5 Subtittle">Program Impacts</div>
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-improved" class="form-label">Number of clients that decreased debt, increased savings, and/or increased credit score </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-improved" name="field_program_housing_improved" aria-label="certified" value="<?= number_format($content['report_data'][0]['field_program_housing_improved']); ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="edit-field-housing-counseling" class="form-label">How many clients express a preference for in-person housing counseling services? </label>
                                          <input type="text" class="form-control" id="edit-field-housing-counseling" name="field_house_counseling" aria-label="certified" value="<?= number_format($content['report_data'][0]['field_house_counseling']); ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="edit-field-homeless-assistance" class="form-label">Number of participants that was provided homeless assistance: </label>
                                          <input type="text" class="form-control" id="edit-field-homeless-assistance" name="field_program_homeless_assistance" aria-label="certified" value="<?= number_format($content['report_data'][0]['field_program_homeless_assistance']); ?>">
                                       </div>
                                    </div>
                                 </div>



                                 <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-8">
                                       <div class="h5 Subtittle">Home Purchased</div>
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-attended" class="form-label">How many participants attended or inquired about home ownership programs? </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-attended" name="field_program_housing_attended" aria-label="certified" value="<?= number_format($content['report_data'][0]['field_program_housing_attended']); ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-8">
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-purchased" class="form-label">Number of program participants who purchased a home </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-purchased" name="field_program_housing_purchased" aria-label="certified" value="<?= number_format($content['report_data'][0]['field_program_housing_purchased']); ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-8">
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-avg-price" class="form-label">Average price of homes purchased </label>
                                          <div class="d-flex justify-content-center align-items-center">
                                             <span>$</span> &nbsp; <input type="text" class="form-control" id="edit-field-program-housing-avg-price" name="field_program_housing_avg_price" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_housing_avg_price'], 2); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <label for="edit-field-program-housing-avg-price" class="form-label">What is the market average for maximum-priced homes that can be afforded for families and unrelated individuals, by Current Tenure? </label>
                                    <div class="row gx-4 align-items-end p-b-20">
                                       <div class="col-md-8">
                                          <div class="form-group">
                                             <label for="edit-field-program-housing-avg-price" class="form-label">Rental per month </label>
                                             <div class="d-flex justify-content-center align-items-center">
                                                <span>$</span> &nbsp; <input type="text" class="form-control" id="edit-field-rent-per-month" name="field_rent_per_month" placeholder="" value="<?= number_format($content['report_data'][0]['field_rent_per_month'], 2); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-8">
                                          <div class="form-group">
                                             <label for="edit-field-program-housing-avg-price" class="form-label">Ownership </label>
                                             <div class="d-flex justify-content-center align-items-center">
                                                <span>$</span> &nbsp; <input type="text" class="form-control" id="edit-field-ownership" name="field_ownership" placeholder="" value="<?= number_format($content['report_data'][0]['field_ownership'], 2); ?>">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>


                                 <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-12">
                                       <div class="h5 Subtittle">Fixed rate, or adjustable rate mortgage</div>
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-fixed" class="form-label">Percent of fixed rate mortgages </label>
                                          <div class="d-flex justify-content-start align-items-center">
                                             <input type="text" class="form-control w-300px" id="edit-field-program-housing-fixed" name="field_program_housing_fixed" placeholder="" value="<?= $content['report_data'][0]['field_program_housing_fixed']; ?>">
                                             &nbsp; &nbsp;<span>%</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-adjustable" class="form-label">Percent of adjustable rate mortgages </label>
                                          <div class="d-flex justify-content-start align-items-center">
                                             <input type="text" class="form-control w-300px" id="edit-field-program-housing-adjustable" name="field_program_housing_adjustable" placeholder="" value="<?= $content['report_data'][0]['field_program_housing_adjustable']; ?>">
                                             &nbsp;&nbsp; <span>%</span>
                                          </div>
                                       </div>
                                    </div>

                                 </div>


                                 <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-12">
                                       <div class="h5 Subtittle">Foreclosure Assistance</div>
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-not4closed" class="form-label">Number of foreclosures prevented </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-not4closed" name="field_program_housing_not4closed" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_housing_not4closed']); ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-month-late" class="form-label">How many months behind? </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-month-late" name="field_program_housing_month_late" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_housing_month_late']); ?>">
                                       </div>
                                    </div>
                                 </div>



                                 <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-alternate" class="form-label">How many people were turned to alternative housing after losing their house? </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-alternate" name="field_program_housing_alternate" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_housing_alternate']); ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-have-kids" class="form-label">How many people needing assistance have children under the age of 18 years of age? </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-have-kids" name="field_program_housing_have_kids" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_housing_have_kids']); ?>">
                                       </div>
                                    </div>
                                 </div>


                                 <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-13">
                                       <div class="h5 Subtittle">Community Development</div>

                                       <div class="form-group">
                                          <label for="edit-field-program-housing-projects" class="form-label">Number of housing and community development projects in the last year </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-projects" name="field_program_housing_projects" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_housing_projects']); ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-11">
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-value" class="form-label">Dollar value of these community development projects</label>
                                          <div class="d-flex justify-content-center align-items-center">
                                             <span>$</span> &nbsp; <input type="text" class="form-control" id="edit-field-program-housing-value" name="field_program_housing_value" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_housing_value'], 2); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-affordable" class="form-label">Number of units of affordable housing your affiliate has developed </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-affordable" name="field_program_housing_affordable" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_housing_affordable']); ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="edit-field-program-housing-facilities" class="form-label">Number of community facilities your affiliate has purchased and/or developed </label>
                                          <input type="text" class="form-control" id="edit-field-program-housing-facilities" name="field_program_housing_facilities" placeholder="" value="<?= number_format($content['report_data'][0]['field_program_housing_facilities']); ?>">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!--Div id close -->

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
                                 // } elseif (
                                 //    $this->session->role_id == 2 && $statuses['serviceareas']['status'] == 'Completed' && $statuses['community']['status'] == 'Completed' && $statuses['employees']['status'] == 'Completed'
                                 //    && $statuses['revenue']['status'] == 'Completed' && $statuses['expenditure']['status'] == 'Completed' && $statuses['education_program']['status'] == 'Completed' && $statuses['entrepreneurship_program']['status'] == 'Completed'
                                 //    && $statuses['health_quality']['status'] == 'Completed' && $statuses['housing']['status'] == 'Completed' && $statuses['workforce']['status'] == 'Completed'  && $statuses['other_programs']['status'] == 'Completed'
                                 //    && $statuses['covid']['status'] == 'Completed' && $statuses['civic']['status'] == 'Completed' && $statuses['emergency_relief']['status'] == 'Completed' && $statuses['contact_data']['status'] == 'Completed'
                                 //    && $statuses['empowerment']['status'] == 'Completed' && $statuses['volunteer']['status'] == 'Completed'
                                 // ) { 
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
                                 <?php } else { ?>
                                    <input type="hidden" value="<?= $report_id; ?>" name="field_parent_census" id="field_parent_census">
                                 <?php } ?>
                                 <div class="col-md-12" <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) { ?>style="display: none;" <?php } ?>>
                                    <div class="form-group">
                                       <label for="edit-field-tab-status" class="form-label">Tab Status *</label>

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

                              <div class="row g-4 align-items-end p-b-20" id="hide_div_div2">
                                 <div class="col-md-12" style="display:none;">
                                    <div class="form-group">
                                       <label for="edit-field-legacy-foreclosures-boolea" class="form-label">legacy foreclosures boolean </label>
                                       <br>
                                       <label class="radio">
                                          <input type="radio" value="2" id="edit-field-legacy-foreclosures-boolea-none" name="field_legacy_foreclosures_boolea" <?php if ($content['report_data'][0]['field_legacy_foreclosures_boolea'] == 2) echo 'checked="checked"'; ?>>
                                          <label class="label p-r-15" for="edit-field-legacy-foreclosures-boolea-none">N/A</label>
                                       </label>
                                       <label class="radio">
                                          <input type="radio" value="0" id="edit-field-legacy-foreclosures-boolea-none-0" name="field_legacy_foreclosures_boolea" <?php if ($content['report_data'][0]['field_legacy_foreclosures_boolea'] == 0) echo 'checked="checked"'; ?>>
                                          <label class="label p-r-15" for="edit-field-legacy-foreclosures-boolea-none-0">NO</label>
                                       </label>
                                       <label class="radio">
                                          <input type="radio" value="1" id="edit-field-legacy-foreclosures-boolea-none-1" name="field_legacy_foreclosures_boolea" <?php if ($content['report_data'][0]['field_legacy_foreclosures_boolea'] == 1) echo 'checked="checked"'; ?>>
                                          <label class="label p-r-15" for="edit-field-legacy-foreclosures-boolea-none-1" <?php if ($content['report_data'][0]['field_legacy_foreclosures_boolea'] == 1) echo 'checked="checked"'; ?>>YES</label>
                                       </label>
                                    </div>
                                 </div>
                                 <div class="col-md-12" style="display:none;">
                                    <div class="form-group">
                                       <label for="edit-field-legacy-months-behind" class="form-label">legacy months behind </label>
                                       <input type="text" class="form-control" id="edit-field-legacy-months-behind" name="field_legacy_months_behind" aria-label="certified" value="<?= $content['report_data'][0]['field_legacy_months_behind']; ?>">
                                    </div>
                                 </div>
                              </div>


                              <hr>

                              <div class="">
                                 <div class="form-group t-c formclassbtn">
                                    <button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                                    <button class="btn btn-danger m-r-15 btn-rounded" type="button" data-status_id="<?= $statuses['housing']['status'];?>" data-table_name="housing_community_development" data-pk_id="<?= $content['report_data'][0]['pk_id']; ?>" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
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
                              if ($statuses['housing']['status'] != "Submitted" && $statuses['housing']['status'] != "Reviewed Complete") { ?><a class="btn btn-primary btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/housing">+ Add A Program</a> <?php }
                                                                                                                                                                                                                                                                                                                           } else if ($this->session->role_id == 1) { ?> <a class="btn btn-accent btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/housing">+ Add A Program</a> <?php } ?>
                           <br><br>

                        </div>
                        <div class="tabilCard inner NulCard">
                           <div class="contact-table table-responsive">
                              <table class="table table-striped">
                                 <tbody>
                                    <tr>
                                       <td> Our Affiliate offers programs of this type: </td>
                                       <td><span><?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1) {
                                                      echo "Yes";
                                                   } else {
                                                      echo "No";
                                                   }; ?></span> </td>
                                    </tr>
                                    <tr>
                                       <td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">Person Who Oversees Housing Programs </b></td>
                                    </tr>
                                    <tr>
                                       <td>Name: </td>
                                       <td> <span><?= $content['report_data'][0]['field_housing_overseer_name']; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td>Email: </td>
                                       <td><span><?= $content['report_data'][0]['field_housing_overseer_email']; ?></span> </td>
                                    </tr>
                                    <tr>
                                       <td>Total Participants in Housing Programs:</td>
                                       <td><span><?= number_format($content['report_data'][0]['field_program_housing_total_part']); ?></span></td>
                                    </tr>

                                    <tr>
                                       <td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">Program Impacts </b></td>
                                    </tr>
                                    <tr>
                                       <td> Number of clients that decreased debt, increased savings, and/or increased credit score: </td>
                                       <td><span> <?= number_format($content['report_data'][0]['field_program_housing_improved']); ?></span></td>
                                    </tr>
                                    <?php if (!empty($content['report_data'][0]['field_house_counseling'])) {?>
                                    <tr>
                                       <td> How many clients express a preference for in-person housing counseling services? </td>
                                       <td><span> <?= number_format($content['report_data'][0]['field_house_counseling']); ?></span></td>
                                    </tr>
                                    <?php }?>
                                    <?php if (!empty($content['report_data'][0]['field_program_homeless_assistance'])) {?>
                                    <tr>
                                       <td>Number of participants that was provided homeless assistance: </td>
                                       <td><span> <?= number_format($content['report_data'][0]['field_program_homeless_assistance']); ?></span></td>
                                    </tr>
                                    <?php }?>
                                    <tr>
                                       <td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">Home Purchased</b></td>
                                    </tr>
                                    <tr>
                                       <td> How many participants attended or inquired about home ownership programs?: </td>
                                       <td> <span><?= number_format($content['report_data'][0]['field_program_housing_attended']); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td>Number of program participants who purchased a home: </td>
                                       <td> <span><?= number_format($content['report_data'][0]['field_program_housing_purchased']); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td>Average price of homes purchased: </td>
                                       <td><span><?php isset($content['report_data'][0]['field_program_housing_avg_price']) ? print_r("$" . number_format($content['report_data'][0]['field_program_housing_avg_price'], 2)) : print_r(''); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          What is the market average for maximum-priced homes that can be afforded for families and unrelated individuals, by Current Tenure?
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Rental per month: </td>
                                       <td><span><?php isset($content['report_data'][0]['field_program_housing_avg_price']) ? print_r("$" . number_format($content['report_data'][0]['field_rent_per_month'], 2)) : print_r(''); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td>Ownership: </td>
                                       <td><span><?php isset($content['report_data'][0]['field_program_housing_avg_price']) ? print_r("$" . number_format($content['report_data'][0]['field_ownership'], 2)) : print_r(''); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">Fixed rate, or adjustable rate mortgage</b></td>
                                    </tr>
                                    <tr>
                                       <td> Percent of fixed rate mortgages: </td>
                                       <td> <span><?php isset($content['report_data'][0]['field_program_housing_fixed']) ? print_r(number_format($content['report_data'][0]['field_program_housing_fixed'], 2) . "%") : print_r(''); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td>Percent of adjustable rate mortgages: </td>
                                       <td> <span><?php isset($content['report_data'][0]['field_program_housing_adjustable']) ? print_r(number_format($content['report_data'][0]['field_program_housing_adjustable'], 2) . "%") : print_r(''); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">Foreclosure Assistance</b></td>
                                    </tr>
                                    <tr>
                                       <td>Number of foreclosures prevented: </td>
                                       <td><span><?= number_format($content['report_data'][0]['field_program_housing_not4closed']); ?> </span></td>
                                    </tr>
                                    <tr>
                                       <td>How many months behind?: </td>
                                       <td><span><?= number_format($content['report_data'][0]['field_program_housing_month_late']); ?></span> </td>
                                    </tr>
                                    <tr>
                                       <td>How many people were turned to alternative housing after losing their house?: </td>
                                       <td><span><?= number_format($content['report_data'][0]['field_program_housing_alternate']); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td>How many people needing assistance have children under the age of 18 years of age?: </td>
                                       <td><span><?= number_format($content['report_data'][0]['field_program_housing_have_kids']); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td colspan="2" class="border-bottom-0"><b class="text-primary h5 fw-bold">Community Development </b></span> </td>
                                    </tr>
                                    <tr>
                                       <td>Number of housing and community development projects in the last year:</td>
                                       <td><span><?= number_format($content['report_data'][0]['field_program_housing_projects']); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td>Dollar value of these community development projects: </td>
                                       <td><span><?php isset($content['report_data'][0]['field_program_housing_value']) ? print_r("$" . number_format($content['report_data'][0]['field_program_housing_value'],2)) : print_r(''); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td>Number of units of affordable housing your affiliate has developed: </td>
                                       <td><span><?= number_format($content['report_data'][0]['field_program_housing_affordable']); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td>Number of community facilities your affiliate has purchased and/or developed: </td>
                                       <td><span><?= number_format($content['report_data'][0]['field_program_housing_facilities']); ?></span></td>
                                    </tr>
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