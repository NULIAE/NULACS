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
                  <div class="h5 Subtittle text-primary"><b>Service Areas</b></div>

                  <?php
                  $new = 0;
                  if (!$content['report_data'])
                     $new = 1;
                  ?>
                  <?php if ($this->session->role_id != 1) {
                     if ($statuses['serviceareas']['status'] != "Submitted" && $statuses['serviceareas']['status'] != "Reviewed Complete") { ?>
                        <nav class="innerTab">
                           <div class="nav nav-pills" id="nav-tab" role="tablist">
                              <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                           </div>
                           <?php if($content['service_areas_main'][0]['field_tab_status']  == 120){ ?>
                           <div class="nav nav-pills" id="" role="tablist">
                              <button type="button" id="service_areas_main" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['service_areas_main'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
                           </div>
                           <?php } ?>
                           <?php if($content['service_areas_main'][0]['field_tab_status']  == 121){ ?>
                              <div class="nav nav-pills" id="" role="tablist">
                                 <button type="button" id="service_areas_main" data-bs-toggle="" class="r-100 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['service_areas_main'][0]['field_parent_census']?>,124)"><i class="i i-resubmit"></i></button>
                              </div>
                           <?php } ?>
                        </nav>
                     <?php }
                  } else if ($this->session->role_id == 1) { ?>
                     <nav class="innerTab">
                        <div class="nav nav-pills" id="nav-tab" role="tablist">
                        <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                        </div>
                        <?php if($content['service_areas_main'][0]['field_tab_status']  == 120){ ?>
                        <div class="nav nav-pills" id="" role="tablist">
                        <button type="button" id="service_areas_main" data-bs-toggle="" class="r-50 btn btn-primary btnRound markbtn" title="Mark as complete" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['service_areas_main'][0]['field_parent_census']?>,119)"><i class="i i-check"></i></button>
                        </div>
                        <?php } ?>
                        <?php if($content['service_areas_main'][0]['field_tab_status']  == 124){ ?>
                        <div class="nav nav-pills" id="" role="tablist">
                           <button type="button" id="service_areas_main" data-bs-toggle="" class="r-100 btn btn-primary btnRound" title="Mark reviewed" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['service_areas_main'][0]['field_parent_census']?>,123)"><i class="i i-reviewed"></i></button>
                        </div>
                        <div class="nav nav-pills" id="" role="tablist">
                           <button type="button" id="service_areas_main" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['service_areas_main'][0]['field_parent_census']?>,121)"><i class="i i-resubmit"></i></button>
                        </div>
                        <?php } ?>
								<?php if($content['service_areas_main'][0]['field_tab_status']  == 121){ ?>
									<div class="nav nav-pills" id="" role="tablist">
										<button type="button" id="service_areas_main" data-bs-toggle="" class="r-50 btn btn-primary btnRound resubmitbtn" title="Resubmit" data-bs-target="#nav-sync" onclick="tabstatus_change(this,<?php echo $content['service_areas_main'][0]['field_parent_census']?>,124)"><i class="i i-resubmit"></i></button>
									</div>
								<?php } ?>
                     </nav>
                  <?php }
                  if (isset($_GET['msg'])) { ?>
                     <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Sevice Areas has been updated.</div>
                  <?php } ?>
                  <?php if (isset($_GET['tab_message'])) { ?>
                     <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Tab status has been updated.</div>
                  <?php } ?>
                  <div class="tab-content" id="nav-tabContent">


                     <div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">

                        <form id="edit-servicearea" method="post" action="<?php echo base_url('module/forms_update/service_area/update'); ?>">
                           <div class="full_form">
                           <div class="form-group t-c formclassbtn" style="text-align: right;">
                           <button class="btn btn-primary m-r-15 btn-rounded" id="save_service_area" type="submit">SAVE</button>
                                 <button class="btn btn-accent m-r-15 btn-rounded" id="cancel1" type="button">CANCEL</button>
										</div>
                              <div class="d-flex justify-content-left align-items-center">

                              </div>
                              <div class="row g-4 align-items-end">

                                 <?php if ($this->session->role_id == 1) { ?>
                                    <div class="col-md-12 p-l-30">
                                       <div class="form-group">
                                          <label for="edit-title" class="form-label">Title <span>*</span></label>
                                          <input type="text" class="form-control" id="edit-title" value="Service Areas" required readonly="readonly">
                                       </div>
                                    </div>
                              </div>
                           <?php } ?>

                           <div class="col-24">
                              <div class="row  p-l-25">
                                 <div class="col-md-24">
                                    <?php if (count($content['report_data']) == 0) { ?>
                                       <div class="messages error" id="no_data_added"> <i class="i i-warning"></i>&nbsp; &nbsp;No Service Areas added yet. Select a Service Area type and press a button below to add one.</div>
                                       <?php } ?>
                                       
                                       <?php if (count($content['report_data']) > 0) {
                                          
                                          for ($i = 0; $i < count($content['report_data']); $i++) { ?>
                                          <div class="tabilCard NulCard EmployeeCard m-t-20" id="row<?= $report_data[$i]['pk_id']; ?>">
                                             <div class="contact-table table-responsive" id="table<?= $i+1; ?>">
                                                
                                                <div class="messages error d-none" id="percent-error<?= $i+1; ?>"> <i class="i i-warning"></i>&nbsp; &nbsp;Sum of composition percentage should be 100%.</div>
                                                
                                                <table class="table">
                                                   <thead>
                                                      <tr>
                                                         <th colspan="3">Service area</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      <tr>
                                                         <th class="p-t-25">City/Country</th>
                                                         <td><input type="text" class="form-control w-280px" id="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_city_county" name="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_city_county" value="<?= $report_data[$i]['field_service_area_city_county']; ?>" /></td>
                                                      </tr>
                                                      <tr>
                                                         <th class="p-t-25">Population</th>
                                                         <td><input type="text" class="form-control w-200px" id="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_population" name="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_population" value="<?= number_format($report_data[$i]['field_service_area_population']); ?>" /></td>
                                                      </tr>
                                                      <tr class="interTitle">
                                                         <th>Race/Ethincity</th>
                                                         <th>Composition %</th>
                                                      </tr>
                                                      <tr>
                                                         <th class="p-t-25">White</th>
                                                         <td>
                                                            <div class="row align-items-center">
                                                               <div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_white" name="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_white" value="<?= isset($report_data[$i]['field_service_area_white']) ? $report_data[$i]['field_service_area_white'] : ''; ?>" /> &nbsp;<span>%</span></div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <th class="p-t-25">Hispanic/Latino</th>
                                                         <td>
                                                            <div class="row align-items-center">
                                                               <div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_hispanic" name="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_hispanic" value="<?= isset($report_data[$i]['field_service_area_hispanic']) ? $report_data[$i]['field_service_area_hispanic'] : ''; ?>" /> &nbsp;<span>%</span></div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <th class="p-t-25">Asian American</th>
                                                         <td>
                                                            <div class="row align-items-center">
                                                               <div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_asian_am" name="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_asian_am" value="<?= isset($report_data[$i]['field_service_area_asian_am']) ? $report_data[$i]['field_service_area_asian_am'] : ''; ?>" /> &nbsp;<span>%</span></div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <th class="p-t-25">Native American</th>
                                                         <td>
                                                            <div class="row align-items-center">
                                                               <div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_native_am" name="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_native_am" value="<?= isset($report_data[$i]['field_service_area_native_am']) ? $report_data[$i]['field_service_area_native_am'] : ''; ?>" /> &nbsp;<span>%</span></div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <th class="p-t-25">African American</th>
                                                         <td>
                                                            <div class="row align-items-center">
                                                               <div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_african_am" name="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_african_am" value="<?= isset($report_data[$i]['field_service_area_african_am']) ? $report_data[$i]['field_service_area_african_am'] : ''; ?>" /> &nbsp;<span>%</span></div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <th class="p-t-25">Others</th>
                                                         <td>
                                                            <div class="row align-items-center">
                                                               <div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" name="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_other" name="area-<?= $report_data[$i]['pk_id']; ?>-field_service_area_other" value="<?= isset($report_data[$i]['field_service_area_other']) ? $report_data[$i]['field_service_area_other'] : ''; ?>" /> &nbsp;<span>%</span></div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                          <button type="button" class="btn btn-danger m-r-15 btn-rounded btn_remove m-t-20" id="<?= $report_data[$i]['pk_id']; ?>" onclick="removeServiceArea(<?= $report_data[$i]['pk_id']; ?>)">Remove</button>

                                    <?php }
                                    } ?>



                                    <div id="product"></div>

                                 </div>
                              </div>
                              <button type="button" class="btn btn-primary m-r-15 btn-rounded m-t-15 m-l-20 servicearea" id="<?php echo count($content['report_data']) ?>" onClick="addServicearea(this.id);">+ Add Service area</button><br><br>




                           </div>
                           </div>

                           <div class="row g-4 align-items-end">
                              <div class="col-md-12" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
                                 <div class="form-group">
                                    <label for="Status" class="form-label">Tab Status </label>
                                    <select class="form-select" id="Status" name="tab_status">
                                       <!-- <option value="">- None -</option> -->
                                       <?php foreach ($census_tab_statuses as $option) { 
                                          if($content['service_areas_main'][0]['field_tab_status']==0){ ?>
                                             <option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == 120) { ?>selected="selected" <?php } ?>>
                                             <?= $option['status']; ?>
                                           </option>
                                          <?php }else{ ?>
                                          <option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['service_areas_main'][0]['field_tab_status']) { ?>selected="selected" <?php } ?>>
                                             <?= $option['status']; ?>
                                          </option>
                                          <?php } ?>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                              <?php if ($this->session->role_id == 1) { ?>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="edit-field-parent-census" class="form-label">Parent census </label>
                                       <select class="form-select" aria-label="edit-field-parent-census" required id="edit-field-parent-census" name="parent_census">
                                          <option value="">- None -</option>
                                          <?php foreach ($parent_census as $parent) { ?>
                                             <option value="<?= $parent['report_id']; ?>" <?php if ($parent['report_id'] == $content['service_areas_main'][0]['field_parent_census']) { ?>selected="selected" <?php } ?>>
                                                <?= $parent['organization'] . " " . $parent['field_year'] . " census"; ?>
                                             </option>
                                          <?php } ?>
                                       </select>
                                       <input type="hidden" value="<?= $content['service_areas_main'][0]['field_parent_census']; ?>" id="hid_parent_census">
                                       <input type="hidden" value="<?= $content['service_areas_main'][0]['pk_id']; ?>" name="pk_id">
                                       <input type="hidden" id="tab_stat" value="<?= $content['service_areas_main'][0]['field_tab_status']; ?>">
                                    </div>
                                 </div>
                             <?php 
                           //  }elseif($this->session->role_id == 2 && $statuses['serviceareas']['status'] == 'Completed' && $statuses['community']['status'] == 'Completed' && $statuses['employees']['status'] == 'Completed'
                                   //       && $statuses['revenue']['status'] == 'Completed' && $statuses['expenditure']['status'] == 'Completed' && $statuses['education_program']['status'] == 'Completed' && $statuses['entrepreneurship_program']['status'] == 'Completed'
                                   //       && $statuses['health_quality']['status'] == 'Completed' && $statuses['housing']['status'] == 'Completed' && $statuses['workforce']['status'] == 'Completed'  && $statuses['other_programs']['status'] == 'Completed'
                                  //        && $statuses['covid']['status'] == 'Completed' && $statuses['civic']['status'] == 'Completed' && $statuses['emergency_relief']['status'] == 'Completed' && $statuses['contact_data']['status'] == 'Completed'
                                //          && $statuses['empowerment']['status'] == 'Completed' && $statuses['volunteer']['status'] == 'Completed'){
                                 ?>
                                 <!-- <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="edit-field-parent-census" class="form-label">Parent census </label>
                                       <select class="form-select" aria-label="edit-field-parent-census" required id="edit-field-parent-census" name="parent_census">
                                          <option value="">- None -</option>
                                          <?php foreach ($parent_census as $parent) { ?>
                                             <option value="<?= $parent['report_id']; ?>" <?php if ($parent['report_id'] == $content['service_areas_main'][0]['field_parent_census']) { ?>selected="selected" <?php } ?>>
                                                <?= $parent['organization'] . " " . $parent['field_year'] . " census"; ?>
                                             </option>
                                          <?php } ?>
                                       </select>
                                       <input type="hidden" value="<?= $content['service_areas_main'][0]['field_parent_census']; ?>" id="hid_parent_census">
                                       <input type="hidden" value="<?= $content['service_areas_main'][0]['pk_id']; ?>" name="pk_id">
                                       <input type="hidden" id="tab_stat" value="<?= $content['service_areas_main'][0]['field_tab_status']; ?>">
                                    </div>
                                 </div> -->
                              <?php }else{?> 
                                <input type="hidden" value="<?= $content['service_areas_main'][0]['field_parent_census']; ?>" name="parent_census" id="hid_parent_census">
                                       <input type="hidden" value="<?= $content['service_areas_main'][0]['field_parent_census']; ?>" id="hid_parent_census">
                                       <input type="hidden" value="<?= $content['service_areas_main'][0]['pk_id']; ?>" name="pk_id">
                                       <input type="hidden" id="tab_stat" value="<?= $content['service_areas_main'][0]['field_tab_status']; ?>">
                              <?php }?>
                           </div>

                           <hr>

                           <div class="">
                              <div class="form-group t-c formclassbtn">
                                 <button class="btn btn-primary m-r-15 btn-rounded" id="save_service_area" type="submit">SAVE</button>
                                 <button class="btn btn-danger m-r-15 btn-rounded" type="button" data-table_name="service_areas_main" id="delete_button" value="<?php echo $content['service_areas_main'][0]['field_parent_census']?>">DELETE</button>
                                 <button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
                              </div>
                           </div>

                     </div>
                  </div>
                  </form>

                  <div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">

                     <div class="tabilCard inner NulCard">
                        <div class="contact-table table-responsive">

                           <?php //print_r(count($content['report_data'])); print_r($content['report_data']);
                           ?>

                           <?php for ($i = 0; $i < count($content['report_data']); $i++) { ?>
                              <table class="table table-striped">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <h4 class="text-primary h5 fw-bold w-50">Service Area </h4>
                                       </td>
                                       <td><span></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">City/County </td>
                                       <td><span><?= $report_data[$i]['field_service_area_city_county']; ?> </span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">Population </td>
                                       <td><span><?= number_format($report_data[$i]['field_service_area_population']); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50"><b>Race/Ethnicity</b></td>
                                       <td><b>Composition %</b></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">White </td>
                                       <td><span><?= isset($report_data[$i]['field_service_area_white']) ? $report_data[$i]['field_service_area_white'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">Hispanic/Latino </td>
                                       <td><span><?= isset($report_data[$i]['field_service_area_hispanic']) ? $report_data[$i]['field_service_area_hispanic'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">Asian American </td>
                                       <td><span><?= isset($report_data[$i]['field_service_area_asian_am']) ? $report_data[$i]['field_service_area_asian_am'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">Native American </td>
                                       <td><span><?= isset($report_data[$i]['field_service_area_native_am']) ? $report_data[$i]['field_service_area_native_am'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">African American </td>
                                       <td><span><?= isset($report_data[$i]['field_service_area_african_am']) ? $report_data[$i]['field_service_area_african_am'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">Other </td>
                                       <td><span><?= isset($report_data[$i]['field_service_area_other']) ? $report_data[$i]['field_service_area_other'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr style="visibility:hidden;">
                                       <td>Tab Status: </td>
                                       <td></td>
                                    </tr>
                                 </tbody>
                              </table>

                           <?php } ?>

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
