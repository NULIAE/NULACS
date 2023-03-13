<main>
   <div class="mainWrap">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
              
                <div class="sideBar">
                <?=$left_tabs; ?> 
                </div>

            </div>


            <div class="col-md-18">
               <div class="card formCard">
                  <div class="h3 tittleS "><?= $tab_title; ?></div>
                  <div class="h5 Subtittle text-primary"><b>Contact Information</b></div>
                  <?php if($this->session->role_id==1){ ?>
                  <nav class="innerTab">
                     <div class="nav nav-pills" id="nav-tab" role="tablist">
                       <button type="button" id="nav-sync-tab" data-bs-toggle="tab"  class="btn btn-primary btnRound" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                      </div>
                  </nav>
                  <?php } ?>
                  <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade" id="nav-sync" role="tabpanel" >
                       
                        <div class="full_form">
                              
                              <div class="row g-4 align-items-end p-b-20">


                              <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="edit-field-date-established" class="form-label">Year Organization was Established</label>
                                      <input type="text" value="<?=$content['report_data'][0]['field_year']; ?>" class="form-control" id="edit-field-date-established" >
                                    </div>
                                  </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="edit-field-president-ceo-first-name" class="form-label">President/CEO First Name </label>
                          <input type="text" class="form-control" id="edit-field-president-ceo-first-name"   value="<?=$content['report_data'][0]['field_president_ceo_first_name']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="edit-field-president-ceo-middle-name" class="form-label">President/CEO Middle Name </label>
                          <input type="text" class="form-control" id="edit-field-president-ceo-middle-name"   value="<?=$content['report_data'][0]['field_president_ceo_middle_name']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="edit-field-president-ceo-last-name" class="form-label">President/CEO Last Name </label>
                          <input type="text" class="form-control" id="edit-field-president-ceo-last-name"  value="<?=$content['report_data'][0]['field_president_ceo_last_name']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="edit-field-number-of-years-as-ceo" class="form-label">Number of Years as CEO </label>
                          <input type="text" class="form-control" id="edit-field-number-of-years-as-ceo" value="<?=$content['report_data'][0]['field_number_of_years_as_ceo']; ?>">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="edit-field-number-of-years-of-service" class="form-label">Number of Years of Service in Movement </label>
                          <input type="text" class="form-control" id="edit-field-number-of-years-of-service" value="<?=$content['report_data'][0]['field_number_of_years_of_service']; ?>">
                        </div>
                      </div>

                    </div>
                    <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="edit-field-address-line-1" class="form-label">Address Line 1 </label>
                          <textarea class="form-control" id="edit-field-address-line-1" rows="3"><?=$content['report_data'][0]['field_address_line_1']; ?></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="edit-field-address-line-2" class="form-label">Address Line 2 </label>
                          <textarea class="form-control" id="edit-field-address-line-2" rows="3"><?=$content['report_data'][0]['field_address_line_2']; ?></textarea>
                        </div>
                      </div>

                    </div>
                    <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="edit-field-city" class="form-label">City </label>
                          <input type="text" class="form-control" id="edit-field-city"  value="<?=$content['report_data'][0]['field_city']; ?>">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="edit-field-state-province" class="form-label">State/Province </label>
                          <select class="form-select" id="edit-field-state-province">
                            <?php foreach ($state as $st){ ?>
                          <option value="<?=$st['state']; ?>" <?php if (strtolower($st['state']) == strtolower($content['report_data'][0]['field_state_province'])) echo "selected"; ?>> <?=$st['state']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="edit-field-zip-code" class="form-label">Zip Code </label>
                          <input type="text" class="form-control" id="edit-field-zip-code"  value="<?=$content['report_data'][0]['field_zip_code']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="edit-field-telephone" class="form-label">Telephone </label>
                          <input type="text" class="form-control" id="edit-field-telephone" value="<?=$content['report_data'][0]['field_telephone']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="edit-field-fax" class="form-label">Fax </label>
                          <input type="text" class="form-control" id="edit-field-fax"  value="<?=$content['report_data'][0]['field_fax']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="edit-field-cellular-number" class="form-label">Cellular Number </label>
                          <input type="text" class="form-control" id="edit-field-cellular-number"  value="<?=$content['report_data'][0]['field_cellular_number']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="edit-field-email-address" class="form-label">Email Address </label>
                          <input type="text" class="form-control" id="edit-field-email-address"  value="<?=$content['report_data'][0]['field_email_address']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row g-4 align-items-end p-b-20">
                      <div class="col-md-24">
                        <div class="form-group">
                          <label class="form-label">Photo</label>
                          <div class="photo">
                            <DIV id="dropzone">
                              <FORM class="dropzone needsclick" id="demo-upload" action="/upload">
                                <div class="dz-message needsclick">
                                  Drop files here or click to upload.<br>

                                </div>
                              </FORM>
                            </DIV>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                      
                    <hr>

                           <div class="">
                              <div class="form-group t-c formclassbtn">
                                 <button class="btn btn-primary m-r-15 btn-rounded">SAVE</button>
                                 <button class="btn btn-danger m-r-15 btn-rounded">DELETE</button>
                                 <button class="btn btn-accent m-r-15 btn-rounded" id="cancel">CANCEL</button>
                              </div>
                           </div>

                        </div>
                     </div>


                     <div class="tab-pane fade show active" id="nav-view" role="tabpanel">
                        <h4 class="title-head"></h4>
                        <div class="tabilCard inner NulCard ">
                           <div class="table-responsive">
                              <table class="table table-striped">
                                 <tbody>
                                    <tr>
                                       <td>Census Status:   </td>
                                       <td><span>Incomplete</span></td>
                                    </tr>
                                    <tr>
                                       <td>This information has been reviewed and certified as accurate. (Enter name of certifier.)::    </td>
                                       <td><span></span></td>
                                    </tr>
                                    <tr>
                                       <td>Year Organization was Established:    </td>
                                       <td><span>1969</span></td>
                                    </tr>
                                    <tr>
                                       <td>President/CEO First Name:   </td>
                                       <td><span>Curtis</span></td>
                                    </tr>
                                    <tr>
                                       <td>President/CEO Middle Name:    </td>
                                       <td><span></span></td>
                                    </tr>
                                    <tr>
                                       <td>President/CEO Last Name:    </td>
                                       <td><span>Taylor</span></td>
                                    </tr>
                                    <tr>
                                       <td>Number of Years as CEO:   </td>
                                       <td><span>5</span></td>
                                    </tr>
                                    <tr>
                                       <td>Number of Years of Service in Movement:   </td>
                                       <td><span>45</span></td>
                                    </tr>
                                    <tr>
                                       <td>Address Line 1:    </td>
                                       <td><span>923 Old Bainbridge Road</span></td>
                                    </tr>
                                    <tr>
                                       <td>Address Line 2:    </td>
                                       <td><span></span></td>
                                    </tr>
                                    <tr>
                                       <td>City:    </td>
                                       <td><span>Tallahassee</span></td>
                                    </tr>
                                    <tr>
                                       <td>State/Province:    </td>
                                       <td><span>Florida</span></td>
                                    </tr>
                                    <tr>
                                       <td>Zip Code:    </td>
                                       <td><span>32303</span></td>
                                    </tr>
                                    <tr>
                                       <td>Telephone:    </td>
                                       <td><span>8502513025</span></td>
                                    </tr>
                                    <tr>
                                       <td>Fax:    </td>
                                       <td><span></span></td>
                                    </tr>
                                    <tr>
                                       <td>Cellular Number:   </td>
                                       <td><span>8502513025</span></td>
                                    </tr>
                                    <tr>
                                       <td>Email Address:    </td>
                                       <td><span>ctaylor.tulceo@gmail.com </span></td>
                                    </tr>
                                    <tr>
                                       <td>Photo:    </td>
                                       <td><span></span></td>
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

<script src="<?php echo base_url('/resources/js/census/vendor/quill.js'); ?>"></script>
<script src="<?php echo base_url('/resources/js/census/vendor/dropzone.js'); ?>"></script>

<script>

    // var quill = new Quill('#editor', {
    //   modules: { toolbar: true },
    //   theme: 'snow'
    // });


    // var dropzone = new Dropzone('#demo-upload', {
    //   previewTemplate: document.querySelector('#preview-template').innerHTML,
    //   parallelUploads: 2,
    //   thumbnailHeight: 120,
    //   thumbnailWidth: 120,
    //   maxFilesize: 3,
    //   filesizeBase: 1000,
    //   thumbnail: function (file, dataUrl) {
    //     if (file.previewElement) {
    //       file.previewElement.classList.remove("dz-file-preview");
    //       var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
    //       for (var i = 0; i < images.length; i++) {
    //         var thumbnailElement = images[i];
    //         thumbnailElement.alt = file.name;
    //         thumbnailElement.src = dataUrl;
    //       }
    //       setTimeout(function () { file.previewElement.classList.add("dz-image-preview"); }, 1);
    //     }
    //   }

    // });


    // Now fake the file upload, since GitHub does not handle file uploads
    // and returns a 404

    var minSteps = 6,
      maxSteps = 60,
      timeBetweenSteps = 100,
      bytesPerStep = 100000;

    dropzone.uploadFiles = function (files) {
      var self = this;

      for (var i = 0; i < files.length; i++) {

        var file = files[i];
        totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

        for (var step = 0; step < totalSteps; step++) {
          var duration = timeBetweenSteps * (step + 1);
          setTimeout(function (file, totalSteps, step) {
            return function () {
              file.upload = {
                progress: 100 * (step + 1) / totalSteps,
                total: file.size,
                bytesSent: (step + 1) * file.size / totalSteps
              };

              self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
              if (file.upload.progress == 100) {
                file.status = Dropzone.SUCCESS;
                self.emit("success", file, 'success', null);
                self.emit("complete", file);
                self.processQueue();
                //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
              }
            };
          }(file, totalSteps, step), duration);
        }
      }
    }
  </script>

