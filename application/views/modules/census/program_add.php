<main>
   <div class="mainWrap">
      <div class="container">
         <div class="row">
            <div class="col-md-6">

                <div class="sideBar">
                <?=$left_tabs;?>
                </div>

            </div>


            <div class="col-md-18">
               <div class="card formCard">
                <div class="h3 tittleS "><?=$tab_title;?></div>
                <?php if ( $content['program_area']=='health_quality' ) $title_m = 'Health and Quality of Life Program Details';
                      elseif ( $content['program_area']=='housing' ) $title_m = 'Housing and Community Development';
                      elseif ( $content['program_area']=='education_program' ) $title_m = 'Education Program Details';
                      elseif ( $content['program_area']=='entrepreneurship_program' ) $title_m = 'Entrepreneurship and Business Development Program Details';
                      elseif ( $content['program_area']=='workforce' ) $title_m = 'Workforce Development Program Details';
                      elseif ( $content['program_area']=='other_programs' ) $title_m = 'Other Programs';
                      else $title_m = 'Programs';
                ?>
                <div class="h5 Subtittle text-primary"><b>Create <?= $title_m; ?></b></div>
                <form id="program-add" method="post" action="<?php echo base_url('module/forms_update/programs/update'); ?>" ><div class="form-group t-c formclassbtn" style="float: right;">
                              <button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                              <!-- <button class="btn btn-danger m-r-15 btn-rounded" type="button">DELETE</button> -->
                              <button class="btn btn-accent m-r-15 btn-rounded" onClick="history.go(-1);" type="button">CANCEL</button>
                              </div>
                              <br/><br/><br/><br/>
                        <b>Program Area: <?= $title_m; ?></b>

                        <div class="full_form">
                          <div class="row g-4 align-items-end p-b-20">
                              <div class="col-md-12">
                              <div class="form-group">
                                <label for="edit-title" class="form-label">Name of Program <span>*</span></label>
                                <input type="text" id="edit-title" name="title" value="" size="60" class="form-control required" required> </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
									<label for="edit-field-program-nul-funded" class="form-label">Is this program funded by NUL?<span>*</span> </label>
										<br>
										<label class="radio">
											<input type="radio" name="field_program_nul_funded" class="hide_fields" id="edit-field-program-nul-funded-0" value="0" onclick="HideDivifNo()" required>
											<label class="label p-r-10" for="edit-field-program-nul-funded-0">NO</label>
										</label>
										<label class="radio">
											<input type="radio" name="field_program_nul_funded" class="hide_fields" id="edit-field-program-nul-funded-1" value="1"  onclick="HideDivifNo()">
										<label class="label p-r-10" for="edit-field-program-nul-funded-1">YES</label>
									</label>
						    	</div>
                            </div>
                            <div id="hide_div_if_no">
                                <div class="col-md-24">
                                    <div class="form-group">
                                        <label for="edit-field-civic-engage-comp" class="form-label">Is there a civic engagement component to this program?<span>*</span> </label>
                                            <br>
                                            <label class="radio">
                                                <input type="radio" name="field_civic_engage_comp" class="hide_desc" id="edit-field-civic-engage-comp-0" value="0" onclick="HideDescifNo()" required>
                                                <label class="label p-r-10" for="edit-field-civic-engage-comp-0">NO</label>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="field_civic_engage_comp" class="hide_desc" id="edit-field-civic-engage-comp-1" value="1" onclick="HideDescifNo()">
                                            <label class="label p-r-10" for="edit-field-civic-engage-comp-1">YES</label>
                                        </label>
                                    </div>
                                </div>
                                <div id="hide_desc_if_no">
                                    <div class="col-md-24">
                                        <div class="form-group">
                                            <label for="edit-field-program-purpose" class="form-label"> If yes, please describe :</label>
                                            <textarea id="edit-field-program-purpose" rows="4" class="form-control " cols="106" name="field_program_purpose" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-end p-b-20">
                                    <div class="col-md-24">
                                        <!-- <div class="d-flex"> <a class="m-l-auto" href="">Show row weights</a> </div> -->
                                        <p>Funding Sources</p>
                                            <div class="messages error" id="no_funding_sources"> <i class="i i-warning"></i>&nbsp; &nbsp;No Funding Sources added yet. Select a Funding Source type and press a button below to add one. </div>
                                            <div id="funding_source"></div>

                                            <br>
                                            <script>
                                                    var get_funding_organizations = <?php echo json_encode($funding_organizations); ?>;
                                                    var get_funding_sectors = <?php echo json_encode($funding_sectors); ?>;
                                                    var get_funding_vehicles = <?php echo json_encode($funding_vehicles); ?>;
                                            </script>
                                            <button class="btn btn-primary m-r-15 btn-rounded program_add_fund_source" data-sourceid="1" onclick="addFundingSource(get_funding_organizations,get_funding_sectors,get_funding_vehicles,this.getAttribute('data-sourceid'));" type="button">+ Add Funding Source</button><br><br>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edit-field-program-types" class="form-label">Program Type</label>
                                        <select class="form-select" aria-label="edit-field-parent-census" id="edit-field-program-types" name="field_program_types">
                                            <option value="_none">- None -</option>
                                            <?php foreach ($program_type as $pt) {?>
                                            <option value="<?=$pt['id'];?>" > <?=$pt['name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

                                        <!-- <div class="d-flex"> <a class="m-l-auto" href="">Show row weights</a> </div> -->
                                <p>Services Provided</p>
                                <div class="messages error" id="no_services_added"> <i class="i i-warning"></i>&nbsp; &nbsp;No Services Provided added yet. Select a Service Provided type and press a button below to add one. </div>
                                <div id="program_services"></div>


                                <br>
                                                <script>
                                                    var services_provided = <?php echo json_encode($services_provided); ?>;
                                                </script>
                                                <button class="btn btn-primary m-r-15 btn-rounded program_add_program_service" data-serviceid="1" onclick="addProgramServices(services_provided,this.getAttribute('data-serviceid'));" type="button">+ Add Program Services</button><br><br>

                                <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-24">
                                        <div class="form-group">
                                            <label for="edit-field-program-purpose" class="form-label"> Purpose of Program</label>
                                            <textarea id="edit-field-program-purpose" rows="4" class="form-control" cols="106" name="field_program_purpose"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit-field-program-budget" class="form-label">Total Program Budget Funded</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                            <span>$</span> &nbsp;	<input type="text" class="form-control w-200px" id="edit-field-program-budget" name="field_program_budget" placeholder=""> </div>
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edit-field-program-served-total" class="form-label">Number of People Served Annually <span>*</span></label>
                                        <input type="text" id="edit-field-program-served-total" name="field_program_served_total" value="" size="60" class="form-control required" required> </div>
                                </div>
                                </div>
                                <div class="h6 tittle text-start ">Health Programs</div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="edit-field-program-percent-black" class="form-label">% Black/African American</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="text" class="form-control" id="edit-field-program-percent-black" name="field_program_percent_black" placeholder="">
                                                    &nbsp; &nbsp;<span>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="edit-field-program-percent-white" class="form-label">% White</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="text" class="form-control" id="edit-field-program-percent-white" name="field_program_percent_white" placeholder="">
                                                &nbsp; &nbsp;<span>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="edit-field-program-percent-asian" class="form-label">% Asian American</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="text" class="form-control" id="edit-field-program-percent-asian" name="field_program_percent_asian" placeholder="">
                                                &nbsp; &nbsp;<span>%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="edit-field-program-percent-native" class="form-label">% Native American</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="text" class="form-control"  id="edit-field-program-percent-native" name="field_program_percent_native" placeholder="">
                                                &nbsp; &nbsp;<span>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="edit-field-program-percent-immigrant" class="form-label">Immigrant Population %</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="text" class="form-control"  id="edit-field-program-percent-immigrant" name="field_program_percent_immigrant" placeholder="">
                                                &nbsp; &nbsp;<span>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="edit-field-program-percent-newcomer" class="form-label">Newcomer Population %</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="text" class="form-control" id="edit-field-program-percent-newcomer" name="field_program_percent_newcomer" placeholder="">
                                                &nbsp; &nbsp;<span>%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="h6 tittle text-start ">Ethnicity</div>
                                <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit-field-program-percent-hispanic" class="form-label">% Hispanic</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="text" class="form-control"  id="edit-field-program-percent-hispanic" name="field_program_percent_hispanic" placeholder="">
                                                &nbsp; &nbsp;<span>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit-field-program-percent-non-hispan" class="form-label">% Non-Hispanic</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="text" class="form-control" id="edit-field-program-percent-non-hispan" name="field_program_percent_non_hispan" placeholder="">
                                                &nbsp; &nbsp;<span>%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="h6 tittle text-start ">Gender</div>
                                <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit-field-program-percent-male" class="form-label">% Male</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="text" class="form-control"  id="edit-field-program-percent-male" name="field_program_percent_male" placeholder="">
                                                &nbsp; &nbsp;<span>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit-field-program-percent-female" class="form-label">% Female</label>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <input type="text" class="form-control"id="edit-field-program-percent-female" name="field_program_percent_female" placeholder="">
                                                &nbsp; &nbsp;<span>%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field_program_duration_type" class="form-label">Program Length Type </label>
                                        <br>
                                        <label class="radio">
                                            <input type="radio" name="field_program_duration_type" id="edit-field-program-duration-type-none">
                                            <label class="label p-r-10" for="edit-field-program-duration-type-none">N/A</label>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="field_program_duration_type" id="edit-field-program-duration-type-days" value="D">
                                            <label class="label p-r-10" for="edit-field-program-duration-type-days">Days</label>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="field_program_duration_type" id="edit-field-program-duration-type-weeks" value="W">
                                            <label class="label p-r-10" for="edit-field-program-duration-type-weeks">Weeks</label>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="field_program_duration_type" id="edit-field-program-duration-type-summer" value="S">
                                            <label class="label p-r-10" for="edit-field-program-duration-type-summer">Summer</label>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="field_program_duration_type" id="edit-field-program-duration-type-year" value="Y">
                                            <label class="label p-r-10" for="edit-field-program-duration-type-year">Year-round</label>
                                        </label>
                                    </div>
                                </div>
                                <div class="row g-4 align-items-end p-b-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit-field-program-duration-amount" class="form-label">Program Length Amount</label>
                                            <input type="text" id="edit-field-program-duration-amount" name="field_program_duration_amount" value="" size="60" class="form-control"> 
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit-field-program-target-age" class="form-label">Target age range</label>
                                            <input type="text" id="edit-field-program-target-age" name="field_program_target_age" value="" size="60" class="form-control"> 
                                        </div>
                                    </div>
                                </div>


                                <label for="edit-field-what-kinds-of-supports-and" class="form-label">Target Group(s) Served</label><br>
                                <div class="row g-4 align-items-end p-b-20 ">
                                    <?php $loop_val = 1; ?>
                                    <?php foreach ( $content['target_groups_served'] as $tgs ) { 
                                        if ( $loop_val%2 == 0 ) { ?>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label class="checkbox">
                                                    <input type="checkbox" id="edit-field-program-target-group-<?= $tgs['tid']; ?>" name="field_program_target_group[]"
                                                        value="<?= $tgs['tid']; ?>" class="form-checkbox">
                                                    <label class="option" for="edit-field-program-target-group-<?= $tgs['tid']; ?>"><?= $tgs['name']; ?></label>
                                                </label>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label class="checkbox">
                                                    <input type="checkbox" id="edit-field-program-target-group-<?= $tgs['tid']; ?>" name="field_program_target_group[]"
                                                        value="<?= $tgs['tid']; ?>" class="form-checkbox">
                                                    <label class="option" for="edit-field-program-target-group-<?= $tgs['tid']; ?>"><?= $tgs['name']; ?></label>
                                                </label>
                                            </div>
                                        </div>
                                    <?php } } ?>
                                </div>
                                <div class="row g-4 align-items-end p-b-20 " <?php if ( $this->session->role_id!=1 ) echo 'style="visibility:hidden;max-height:0;"';?>>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit-field-legacy-program-id" class="form-label">legacy program id</label>
                                            <input type="text"  id="edit-field-legacy-program-id" name="field_legacy_program_id" value="" size="60" class="form-control w-200px"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-4 align-items-end p-b-20" <?php if ( $this->session->role_id!=1 ) echo 'style="visibility:hidden;max-height:0;"';?>>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit-field-parent-census" class="form-label">Parent census *</label>
                                            <select class="form-select" aria-label="edit-field-parent-census" id="edit-field-parent-census" name="field_parent_census" >
                                                <option value="">- None -</option>
                                                <?php foreach ($parent_census as $parent) {?>
                                                <option value="<?=$parent['report_id'];?>" <?php if( $parent['report_id'] == $report_id ){ ?>selected="selected"<?php } ?> >
                                                    <?=$parent['organization'] . " " . $parent['field_year'] . " census";?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="edit-field-legacy-target-group" class="form-label">legacy target group</label>
                                            <input type="text"  id="edit-field-legacy-target-group" name="field_legacy_target_group" value="" size="60" class="form-control"> </div>
                                        </div>
                                    </div>

                                    <hr>
                                </div>
                            </div>



                           <div class="">
                              <div class="form-group t-c formclassbtn">
                              <button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                              <!-- <button class="btn btn-danger m-r-15 btn-rounded" type="button">DELETE</button> -->
                              <button class="btn btn-accent m-r-15 btn-rounded" onClick="history.go(-1);" type="button">CANCEL</button>
                              </div>
                           </div>

                           <input type="hidden" value="<?= $program_area_id; ?>" name="field_program_area_tid" id="field_program_area_tid">
                           <input type="hidden" value="<?= $program_area; ?>" name="field_program_area" id="field_program_area">

                           </form>
                        </div>
                </div>
            </div>
      </div>


</main>
