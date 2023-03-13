<main>
   <div class="mainWrap">
      <div class="container">
         <div class="row">
         <form enctype="multipart/form-data" action="<?php echo base_url('module/census_report/savenew'); ?>" id="new_report" method="post" >
         <div class="col-md-24">
               <div class="card formCard">
                  <div class="h3 tittle "><?= $prefill_data->organization; ?><?= date("Y"); ?> Census</div>      
                 <div class="full_form">
                 <div class="row g-4 align-items-end p-b-15">
                            
                        
                            <div class="col-md-8">
                              <div class="form-group">
                              <label for="edit-organization-established" class="form-label">Your organization was established </label>
                              <input type="text"  class="form-control" id="edit-organization-established" name="edit-organization-established" aria-label="edit-organization-established" value="<?= $prefill_data->field_date_established; ?>">
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="edit-ceo-first-name" class="form-label">President/ CEO First name</label>
                                <input type="text"  class="form-control" id="edit-ceo-first-name" name="edit-ceo-first-name" aria-label="edit-ceo-first-name" value="<?= $prefill_data->field_president_ceo_first_name; ?>">
                              </div>
                            </div>

                            <div class="col-md-8">
                            <div class="form-group">
                                <label for="edit-ceo-middle-name" class="form-label">President/ CEO Middle name</label>
                                <input type="text"  class="form-control" id="edit-ceo-middle-name" name="edit-ceo-middle-name" aria-label="edit-ceo-first-name" value="<?= $prefill_data->field_president_ceo_middle_name; ?>">
                              </div>
                              </div>
                        </div>
                        <div class="row g-4 align-items-end p-b-15">
                        <div class="col-md-8">
                              <div class="form-group">
                                <label for="edit-ceo-last-name" class="form-label">President/ CEO Last name</label>
                                <input type="text"  class="form-control" id="edit-ceo-last-name" name="edit-ceo-last-name" aria-label="edit-ceo-last-name" value="<?= $prefill_data->field_president_ceo_last_name; ?>">
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="edit-years-as-ceo" class="form-label">Number of Years as CEO</label>
                                <input type="text"  class="form-control " id="edit-years-as-ceo" name="edit-years-as-ceo" aria-label="edit-years-as-ceo" value="<?= $prefill_data->field_number_of_years_as_ceo; ?>">
                              </div>
                            </div>

                            <div class="col-md-8">
                            <div class="form-group">
                                <label for="edit-service-in-movement" class="form-label">Number of Years of Service in Movement</label>
                                <input type="text"  class="form-control " id="edit-service-in-movement" name="edit-service-in-movement" aria-label="edit-service-in-movement" value="<?= $prefill_data->field_number_of_years_of_service; ?>">
                              </div>
                              </div>
                        </div>
                        <div class="row g-4 align-items-end p-b-15">
                        <div class="col-md-8">
                              <div class="form-group">
                                <label for="edit-address-line-1" class="form-label">Address Line 1</label>
                                <input type="text"  class="form-control" id="edit-address-line-1" name="edit-address-line-1" aria-label="edit-address-line-1" value="<?= $prefill_data->field_address_line_1; ?>">
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="edit-address-line-2" class="form-label">Address Line 2</label>
                                <input type="text"  class="form-control " id="edit-address-line-2" name="edit-address-line-2" aria-label="edit-address-line-2" value="<?= $prefill_data->field_address_line_2; ?>">
                              </div>
                            </div>

                            <div class="col-md-8">
                            <div class="form-group">
                                <label for="edit-city" class="form-label">City</label>
                                <input type="text"  class="form-control " id="edit-city" name="edit-city" aria-label="edit-city" value="<?= $prefill_data->field_city; ?>">
                              </div>
                              </div>
                        </div>
                        <?php $state_province = strtoupper($prefill_data->field_state_province); ?>
                        <div class="row g-4 align-items-end">
                          <div class="col-md-12">
                            <div class="form-group">
                            <label for="state class="form-label">State/Province <span>*</span></label>
                              <select class="form-select" id="edit-state-province" name="edit-state-province">
                              <option value="">- None -</option>
                              <?php foreach($state as $st): ?>
                                <option value="<?php echo $st['state']; ?>"  <?php if ($st['state'] == $state_province) { ?>selected="selected" <?php } ?>> 
                                  <?php echo $st['state']; ?>
                                </option>
                                <!-- <option value="<?php echo $aff['field_affiliate_select_value']; ?>" <?php if ($aff['field_affiliate_select_value'] == $content['report_data'][0]['field_affiliate_select']) { ?>selected="selected" <?php } ?>>
                                  <?php echo $aff['organization']; ?>
                                </option> -->
                                <?php endforeach;?>                            
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                <label for="edit-zip-code" class="form-label">Zip Code</label>
                                <input type="text"  class="form-control" id="edit-zip-code" name="edit-zip-code" aria-label="edit-zip-code" value="<?= $prefill_data->field_zip_code; ?>">
                              </div>
                            </div>
                        </div>
                        <div class="row g-4 align-items-end p-b-15">

                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="edit-telephone" class="form-label">Telephone</label>
                                <input type="text"  class="form-control" id="edit-telephone" name="edit-telephone" aria-label="edit-telephone" value="<?= $prefill_data->field_telephone; ?>">
                              </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="edit-fax" class="form-label">Fax</label>
                                <input type="text"  class="form-control " id="edit-fax" name="edit-fax" aria-label="edit-fax" value="<?= $prefill_data->field_fax; ?>">
                              </div>
                              </div>
                        </div>
                        <div class="row g-4 align-items-end p-b-15">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="edit-cellular-number" class="form-label">Cellular Number</label>
                                <input type="text"  class="form-control " id="edit-cellular-number" name="edit-cellular-number" aria-label="edit-cellular-number" value="<?= $prefill_data->field_cellular_number; ?>">
                              </div>
                              </div>
                          
                              <div class="col-md-12">
                            <div class="form-group">
                                <label for="edit-cellular-number" class="form-label">Email Address</label>
                                <input type="email"  class="form-control " id="edit-email-address" name="edit-email-address" aria-label="edit-email-address" value="<?= $prefill_data->field_email_address; ?>">
                              </div>
                              </div>
                              </div>

                         <div class="row g-4 align-items-end p-b-15">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Photo</label>
                                    <input type="file" name="photo" id="photo" />                      
                                </div>
                            </div>
                            <?php if($this->session->role_id != 2){?>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="edit-field-certifier" class="form-label">This information has been reviewed and certified as accurate(Enter name of the certifier):</label>
                                <input type="text"  class="form-control" id="edit-field-certifier" name="edit-field-certifier" >
                              </div>
                            </div>
                            
                          <?php }?>
                        </div>

                        <br>
                        <hr>
                           <div class="">
                              <div class="form-group t-c formclassbtn">
                                 <button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                                 <!-- <button class="btn btn-danger m-r-15 btn-rounded" type="button">DELETE</button> -->
                                 <button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button" onclick="history.back()">CANCEL</button>
                              </div>
                           </div>
                           <input type="hidden" name="affiliate" value="<?= $affiliate['affiliate']; ?>">
                        </div>
                     </div>
                    </div>     
               </div>
            </div>
         </div>
         </form>
      </div>
   </div>
</main>

