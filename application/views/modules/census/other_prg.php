<main>
   <div class="mainWrap">
      <div class="container">
         <div class="row">
            <div class="col-md-6">

               <div class="sideBar">
                  <?= $left_tabs; ?>
               </div>

            </div>

            <?php //var_dump($content); die; 
            ?>
            <div class="col-md-18">
               <div class="card formCard">
                  <div class="h3 tittleS "><?= $tab_title; ?></div>
                  <div class="h5 Subtittle text-primary"><b>Other Programs</b></div>
                  <?php if ($this->session->role_id != 1) {
                     if ($statuses['other_programs']['status'] != "Submitted" && $statuses['other_programs']['status'] != "Reviewed Complete") { ?>
                        <nav class="innerTab">
                           <div class="nav nav-pills" id="nav-tab" role="tablist">
                              <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                           </div>
								   <?php if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 && $content['report_data'][0]['field_tab_status']  == 120) {?>
                              <div class="nav nav-pills" id="" role="tablist">
                                 <button type="button" id="other_programs" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                              </div>
								   <?php }else{?>
                           <?php if ((count($programs) != 0) &&$content['report_data'][0]['field_tab_status']  == 120) { ?>
                              <div class="nav nav-pills" id="" role="tablist">
                                 <button type="button" id="other_programs" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                              </div>
                           <?php } } ?>
                           <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                              <div class="nav nav-pills" id="" role="tablist">
                                 <button type="button" id="other_programs" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
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
                           <button type="button" id="other_programs" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
                        </div>
								<?php }else{?>
                        <?php if ((count($programs) != 0) &&$content['report_data'][0]['field_tab_status']  == 120) { ?>
                           <div class="nav nav-pills" id="" role="tablist">
                              <button type="button" id="other_programs" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,119)"><i class="i i-check"></i></button>
                           </div>
                        <?php } }?>
                        <?php if ($content['report_data'][0]['field_tab_status']  == 124) { ?>
                           <div class="nav nav-pills" id="" role="tablist">
                              <button type="button" id="other_programs" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,123)"><i class="i i-reviewed"></i></button>
                           </div>
                           <div class="nav nav-pills" id="" role="tablist">
                              <button type="button" id="other_programs" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,121)"><i class="i i-resubmit"></i></button>
                           </div>
                        <?php } ?>
                        <?php if ($content['report_data'][0]['field_tab_status']  == 121) { ?>
                           <div class="nav nav-pills" id="" role="tablist">
                              <button type="button" id="other_programs" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['report_data'][0]['field_parent_census'] ?>,124)"><i class="i i-resubmit"></i></button>
                           </div>
                        <?php } ?>
                     </nav>
                  <?php }
                  if (isset($_GET['msg'])) { ?>
                     <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Other Program data has been updated.</div>
                  <?php } ?>
                  <?php if (isset($_GET['tab_message'])) { ?>
                     <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
                  <?php } ?>
                  <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
                        <form id="edit-other" method="post" action="<?php echo base_url('module/forms_update/other_prg/update'); ?>">
                           <div class="full_form">
                           <div class="form-group t-c formclassbtn" style="float: right;">
													<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
													<button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div><br/><br/><br/>
                              <div class="row g-4 align-items-end p-b-20">
                                 <div class="col-md-12" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
                                    <div class="form-group">
                                       <label for="edit-title" class="form-label">Title *</label>
                                       <input type="text" class="form-control" id="edit-title" value="Other Programs" required readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="edit-field-do-you-offer-programs-of-t" class="form-label">Our Affiliate offers programs of this type *</label>
                                       <br>
                                       <label class="radio">
                                          <input type="radio" name="field_do_you_offer_programs_of_t" id="field_do_you_offer_programs_of_t-1" class="hide_fields" onclick="showDivifYes()" value="0" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0) { ?>checked="checked" <?php } ?>>
                                          <label class="label p-r-10" for="field_do_you_offer_programs_of_t-1">No</label>
                                       </label>
                                       <label class="radio">
                                          <input type="radio" name="field_do_you_offer_programs_of_t" id="field_do_you_offer_programs_of_t-0" class="hide_fields" onclick="showDivifYes()" value="1" <?php if ($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1) { ?>checked="checked" <?php } ?>>
                                          <label class="label p-r-10" for="field_do_you_offer_programs_of_t-0">Yes</label>
                                       </label>
                                    </div>
                                 </div>
                              </div>


                              <?php //if($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 1){ 
                              ?>
                              <div class="row align-items-end p-b-20" id="hide_div_if_no">
                                 <div class="clearfix p-b-15"  <?php if (($content['report_data'][0]['field_do_you_offer_programs_of_t'] == 0 || count($programs) != 0)) {?> style="display:none"<?php }?>>
                                    <div class="messages error"> <i class="i i-warning"></i>&nbsp; &nbsp;You will require to enter information about at least one program to complete this tab on the next screen </div>
                                 </div>


                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="edit-field-program-other-total-partic" class="form-label">Total Participants in Other Programs</label>
                                       <input type="text" class="form-control" id="edit-field-program-other-total-partic" name="field_program_other_total_partic" value="<?= number_format($content['report_data'][0]['field_program_other_total_partic']) ?>">
                                    </div>
                                 </div>
                              </div>
                              <?php //}
                              ?>

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


                              <hr>

                              <div class="">
                                 <div class="form-group t-c formclassbtn">
                                    <button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                                    <button class="btn btn-danger m-r-15 btn-rounded" type="button" data-table_name="other_programs" id="delete_button" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
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
                           <?php if (count($programs) == 0 ) { ?>
                              <div class="messages error" id="no_data_added"> <i class="i i-warning"></i>&nbsp; &nbsp;At least one program must be entered to complete this tab </div>
                           <?php } else if (count($programs) != 0) { ?>
                              <div class="tabilCard inner NulCard">
                                 <div class="contact-table table-responsive">
                                    <table class="table table-striped">
                                       <tbody>
                                          <tr>
                                             <td> Program Title </td>
                                             <td>Number of People Served Annually </td>
                                             <td class="viewcol3">Total Program Budget Funded </td>

                                          </tr>
                                          <?php
                                          foreach ($programs as $pro) {
                                             $report_id = $pro['field_parent_census'];
                                             $pk_id = $pro['pk_id']; ?>
                                             <tr>
                                                <td class="text-primary"><a class="text-primary" href="<?php echo base_url("module/census_report/$report_id/$pk_id/viewprogram"); ?>"><?= $pro['title']; ?></a></td>
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
                              if ($statuses['other_programs']['status'] != "Submitted" && $statuses['other_programs']['status'] != "Reviewed Complete") { ?><a class="btn btn-primary btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/other_programs">+ Add A Program</a><?php }
                                                                                                                                                                                                                                                                                                                                                } else if ($this->session->role_id == 1) { ?> <a class="btn btn-accent btn-rounded m-r-15" href="<?php echo base_url(); ?>module/census_report/<?php echo $this->uri->segment('3'); ?>/add_program/other_programs">+ Add A Program</a> <?php echo "<br><br>";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?>
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
                                    <tr>
                                       <td>Total Participants in Other Programs: </td>
                                       <td><span><?= number_format($content['report_data'][0]['field_program_other_total_partic']); ?></span></td>
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