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
            <div class="h3 tittleS " style="    display: flex;
    justify-content: space-around;
    align-items: center;
}"><?= $tab_title; ?><a class="nav-link" title="Census" href="<?php echo base_url('module/census_report/contactinfo/'.$content['report_data'][0]['report_id']); ?>"><img src="<?php echo base_url('/resources/images/download.svg');?>" class="img-doen" alt="Logo" style="width: 50%;"></a>
                </div>
            <div class="h5 Subtittle text-primary"><b>Contact Information</b></div>

            <?php if ($content['report_data']) { ?>
              <?php if ($this->session->role_id != 1) {
                if ($report_data[0]['status'] != "Submitted" && $report_data[0]['status'] != "Reviewed Complete") { ?>
                  <nav class="innerTab">
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                      <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                    </div>
                  </nav>
                <?php }
              } else if ($this->session->role_id == 1) { ?>
                <nav class="innerTab">
                  <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound editbtn" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
                  </div>
                  <?php if($reviewed_status == 1) { ?>
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                      <button type="button" id="" data-bs-toggle="" class="r-50 btn btn-primary btnRound" title="Mark reviewed complete" data-bs-target="#nav-sync" onclick="reviewed_complete(<?php echo $content['report_data'][0]['report_id']?>)"><i class="i i-reviewed-complete"></i></button>
                    </div>
                  <?php } ?>
                </nav>
              <?php }
              if (isset($_GET['msg'])) { ?>
                <div class="messages error" id="update_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Census <em><?= $tab_title; ?></em> has been updated.</div>
              <?php } ?>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade" id="nav-sync" role="tabpanel">
                  <form id="edit-contact" method="post" action="<?php echo base_url('module/forms_update/contactinfo/update'); ?>">

                    <div class="full_form">
                      <div class="row g-4 align-items-end p-b-20">
                        <?php if ($this->session->role_id == 1) { ?>
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="edit-title" class="form-label">Title *</label>
                              <input type="text" class="form-control" id="edit-title" name="title" value="<?php echo $content['report_data'][0]['organization'] . " " . $content['report_data'][0]['field_year'] . " Census" ?>" required readonly="readonly">
                            </div>
                          </div>
                        <?php } ?>
                        <div class="col-md-8" <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) { ?>style="display: none;" <?php } ?>>
                          <div class="form-group">
                            <label for="edit-field-census-status" class="form-label">Census Status * </label>
                            <select class="form-select" id="edit-field-census-status" name="edit-field-census-status" required>
                              <?php foreach ($content['report_statuses'] as $option) { ?>
                                <option value="<?= $option['status_id']; ?>" <?php if ($option['status_id'] == $content['report_data'][0]['field_census_status']) { ?>selected="selected" <?php } ?>><?= $option['status']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                             <label for="edit-field-date-established" class="form-label">Year Organization was Established</label>
                             <input type="text" value="<?= $content['report_data'][0]['field_date_established']; ?>" class="form-control" id="edit-field-date-established" name="edit-field-date-established">
                          </div>
                       </div>
                      </div>
                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="edit-field-president-ceo-first-name" class="form-label">President/CEO First Name </label>
                            <input type="text" class="form-control" id="edit-field-president-ceo-first-name" name="edit-field-president-ceo-first-name" value="<?= $content['report_data'][0]['field_president_ceo_first_name']; ?>">
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="edit-field-president-ceo-middle-name" class="form-label">President/CEO Middle Name </label>
                            <input type="text" class="form-control" id="edit-field-president-ceo-middle-name" name="edit-field-president-ceo-middle-name" value="<?= $content['report_data'][0]['field_president_ceo_middle_name']; ?>">
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="edit-field-president-ceo-last-name" class="form-label">President/CEO Last Name </label>
                            <input type="text" class="form-control" id="edit-field-president-ceo-last-name" name="edit-field-president-ceo-last-name" value="<?= $content['report_data'][0]['field_president_ceo_last_name']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-number-of-years-as-ceo" class="form-label">Number of Years as CEO </label>
                            <input type="text" class="form-control" id="edit-field-number-of-years-as-ceo" name="edit-field-number-of-years-as-ceo" value="<?= $content['report_data'][0]['field_number_of_years_as_ceo']; ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-number-of-years-of-service" class="form-label">Number of Years of Service in Movement </label>
                            <input type="text" class="form-control" id="edit-field-number-of-years-of-service" name="edit-field-number-of-years-of-service" value="<?= $content['report_data'][0]['field_number_of_years_of_service']; ?>">
                          </div>
                        </div>

                      </div>
                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-address-line-1" class="form-label">Address Line 1 </label>
                            <textarea class="form-control" id="edit-field-address-line-1" name="edit-field-address-line-1" rows="3"><?= $content['report_data'][0]['field_address_line_1']; ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-address-line-2" class="form-label">Address Line 2 </label>
                            <textarea class="form-control" id="edit-field-address-line-2" name="edit-field-address-line-2" rows="3"><?= $content['report_data'][0]['field_address_line_2']; ?></textarea>
                          </div>
                        </div>

                      </div>
                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="edit-field-city" class="form-label">City </label>
                            <input type="text" class="form-control" id="edit-field-city" name="edit-field-city" value="<?= $content['report_data'][0]['field_city']; ?>">
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="edit-field-state-province" class="form-label">State/Province </label>
                            <select class="form-select" id="edit-field-state-province" name="edit-field-state-province">
                              <?php foreach ($state as $st) { ?>
                                <option value="<?= $st['state']; ?>" <?php if (strtolower($st['state']) == strtolower($content['report_data'][0]['field_state_province'])) echo "selected"; ?>> <?= $st['state']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="edit-field-zip-code" class="form-label">Zip Code </label>
                            <input type="text" class="form-control" id="edit-field-zip-code" name="edit-field-zip-code" value="<?= $content['report_data'][0]['field_zip_code']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="edit-field-telephone" class="form-label">Telephone </label>
                            <input type="text" class="form-control" id="edit-field-telephone" name="edit-field-telephone" value="<?= phone_number_format($content['report_data'][0]['field_telephone']); ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="edit-field-fax" class="form-label">Fax </label>
                            <input type="text" class="form-control" id="edit-field-fax" name="edit-field-fax" value="<?= phone_number_format($content['report_data'][0]['field_fax']); ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="edit-field-cellular-number" class="form-label">Cellular Number </label>
                            <input type="text" class="form-control" id="edit-field-cellular-number" name="edit-field-cellular-number" value="<?= phone_number_format($content['report_data'][0]['field_cellular_number']); ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="edit-field-email-address" class="form-label">Email Address </label>
                            <input type="text" class="form-control" id="edit-field-email-address" name="edit-field-email-address" value="<?= $content['report_data'][0]['field_email_address']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-24">
                          <div class="form-group">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" id="photo" />
                              <?php if(isset($report_data[0]['field_photo_title'])){ ?><span><img src="<?php echo base_url('/resources/images/profile/'.$report_data[0]['field_photo_title']);?>" style="width: 50vh;"?></span><?php } ?>
                          </div>
                        </div>
                      </div>
<?php if(($content['all_tab_status'][0]) == "119" && ($content['all_tab_status'][1]) == "119" && ($content['all_tab_status'][3]) == "119" && ($content['all_tab_status'][4]) == "119" && ($content['all_tab_status'][5]) == "119" && ($content['all_tab_status'][6]) == "119" && ($content['all_tab_status'][7]) == "119"
                            && ($content['all_tab_status'][8]) == "119" && ($content['all_tab_status'][10]) == "119" && ($content['all_tab_status'][11]) == "119" && ($content['all_tab_status'][12]) == "119" && ($content['all_tab_status'][14]) == "119" && ($content['all_tab_status'][15]) == "119"
                            && ($content['all_tab_status'][16]) == "119" && ($content['all_tab_status'][2]) == "119" && ($content['all_tab_status'][9]) == "119" && ($content['all_tab_status'][13]) == "119") {
                      ?>
                      <div class="row g-4 align-items-end p-b-20" <?php if ($this->session->role_id == 2) { ?>style="display: none;" <?php } ?>>
                        <div class="col-md-24">
                          <div class="form-group">
                            <label for="edit-field-survey-name-of-certifier" class="form-label">This information has been reviewed and certified as accurate. (Enter name of certifier.): </label>
                            <input type="text" class="form-control" id="edit-field-survey-name-of-certifier" name="edit-field-survey-name-of-certifier" value="<?php echo $content['report_data'][0]['field_survey_name_of_certifier']; ?>">
                          </div>
                        </div>
                      </div>
                      <?php }?>
                      <div class="row g-4 align-items-end p-b-20">
                        <div class="col-md-12" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
                          <div class="form-group">
                            <label for="edit-field-affiliate-select" class="form-label">Affiliate select *</label>
                            <select class="form-select" id="edit-field-affiliate-select" name="edit-field-affiliate-select" required>
                              <option value="">- None -</option>
                              <?php foreach ($affiliate as $aff) : ?>
                                <option value="<?php echo $aff['field_affiliate_select_value']; ?>" <?php if ($aff['field_affiliate_select_value'] == $content['report_data'][0]['field_affiliate_select']) { ?>selected="selected" <?php } ?>>
                                  <?php echo $aff['organization']; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20" <?php if ($this->session->role_id != 1) { ?>style="display: none;" <?php } ?>>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="edit-field-year" class="form-label">Year *</label>
                            <select class="form-select" id="edit-field-year" name="edit-field-year" required >
                              <?php for ($i = 2010; $i < 2028; $i++) {
                                $year = $content['report_data'][0]['field_year']; ?>
                                <option value="<?= $i ?>" <?php if ($i == $year) echo "selected"; ?>> <?= sprintf("%02d", $i) ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <?php if ($this->session->role_id == 1) { ?>
                          <div class="col-md-24">
                            <div class="form-group">
                              <label for="edit-field-legacy-census-id" class="form-label">Legacy Census ID</label>
                              <input type="text" class="form-control" id="edit-field-legacy-census-id" name="edit-field-legacy-census-id" value="<?= $content['report_data'][0]['field_legacy_census_id']; ?>">
                            </div>
                          </div>
                        <?php } ?>
                      </div>

                      <div class="row g-4 align-items-end p-b-20">
                        <?php if ($this->session->role_id == 1) { ?>
                          <div class="col-md-24">
                            <div class="form-group">
                              <label for="edit-field-legacy-comments-contact" class="form-label">Legacy Comments Contact info </label>
                              <textarea class="form-control" id="edit-field-legacy-comments-contact" name="edit-field-legacy-comments-contact" rows="3"><?= $content['report_data'][0]['field_legacy_comments_contact']; ?></textarea>
                            </div>
                          </div>
                        <?php } ?>
                      </div>

                      <hr>


                      <input type="hidden" name="report_id" value="<?= $this->uri->segment('3'); ?>">
                      <div class="">
                        <div class="form-group t-c formclassbtn">
                          <button class="btn btn-primary m-r-15 btn-rounded" type="submit" id="save_btn">SAVE</button>
                          <button class="btn btn-danger m-r-15 btn-rounded d-none" type="button" id="delete_btn" value="<?php echo $content['report_data'][0]['report_id']?>">DELETE</button>
                          <button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button">CANCEL</button>
                        </div>
                      </div>

                    </div>
                  </div>
                  </form>

                  <div class="tab-pane fade show active" id="nav-view" role="tabpanel">
                    <h4 class="title-head"></h4>
                    <div class="tabilCard inner NulCard ">
                      <div class="contact-table table-responsive">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <td>Census Status: </td>
                              <td><span><?= $report_data[0]['status']; ?></span></td>
                            </tr>
                            <tr>
                              <td>This information has been reviewed and certified as accurate. (Enter name of certifier.):: </td>
                              <td><span><?php echo $report_data[0]['field_survey_name_of_certifier'];  ?></span></td>
                            </tr>
                            <tr>
                              <td>Year Organization was Established: </td>
                              <td><span><?= $report_data[0]['field_date_established']; ?></span></td>
                            </tr>
                            <tr>
                              <td>President/CEO First Name: </td>
                              <td><span><?= $report_data[0]['field_president_ceo_first_name']; ?></span></td>
                            </tr>
                            <tr>
                              <td>President/CEO Middle Name: </td>
                              <td><span><?= $report_data[0]['field_president_ceo_middle_name']; ?></span></td>
                            </tr>
                            <tr>
                              <td>President/CEO Last Name: </td>
                              <td><span><?= $report_data[0]['field_president_ceo_last_name']; ?></span></td>
                            </tr>
                            <tr>
                              <td>Number of Years as CEO: </td>
                              <td><span><?= $report_data[0]['field_number_of_years_as_ceo']; ?></span></td>
                            </tr>
                            <tr>
                              <td>Number of Years of Service in Movement: </td>
                              <td><span><?= $report_data[0]['field_number_of_years_of_service']; ?></span></td>
                            </tr>
                            <tr>
                              <td>Address Line 1: </td>
                              <td><span><?= $report_data[0]['field_address_line_1']; ?></span></td>
                            </tr>
                            <tr>
                              <td>Address Line 2: </td>
                              <td><span><?= $report_data[0]['field_address_line_2']; ?></span></td>
                            </tr>
                            <tr>
                              <td>City: </td>
                              <td><span><?= $report_data[0]['field_city']; ?></span></td>
                            </tr>
                            <tr>
                              <td>State/Province: </td>
                              <td><span><?= $report_data[0]['field_state_province']; ?></span></td>
                            </tr>
                            <tr>
                              <td>Zip Code: </td>
                              <td><span><?= $report_data[0]['field_zip_code']; ?></span></td>
                            </tr>
                            <tr>
                              <td>Telephone: </td>
                              <td><span><?= phone_number_format($report_data[0]['field_telephone']); ?></span></td>
                            </tr>
                            <tr>
                              <td>Fax: </td>
                              <td><span><?= phone_number_format($report_data[0]['field_fax']); ?></span></td>
                            </tr>
                            <tr>
                              <td>Cellular Number: </td>
                              <td><span><?= phone_number_format($report_data[0]['field_cellular_number']); ?></span></td>
                            </tr>
                            <tr>
                              <td>Email Address: </td>
                              <td><span><?= $report_data[0]['field_email_address']; ?> </span></td>
                            </tr>
                            <tr>
                              <td>Photo: </td>
                               <td>
                                <span>
                                  <img src="<?php echo base_url('/resources/images/profile/'.$report_data[0]['field_photo_title']);?>" style="width: 50vh;"?>
                                </span></td>
                            </tr>
                            <?php if ($this->session->role_id == 1) { ?>
                              <tr>
                                <td>Legacy Comments Contact info: </td>
                                <td><span><?= $report_data[0]['field_legacy_comments_contact']; ?></span></td>
                              </tr>
                            <?php } ?>
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

<?php

function phone_number_format($number) {
  // Allow only Digits, remove all other characters.
  $number = preg_replace("/[^\d]/","",$number);
 
  // get number length.
  $length = strlen($number);
 
 // if number = 10
 if($length == 10) {
  $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
 }
  
  return $number;

}
?>

<script src="<?php echo base_url('/resources/js/census/vendor/quill.js'); ?>"></script>
<script src="<?php echo base_url('/resources/js/census/vendor/dropzone.js'); ?>"></script>

<script>
  // page.loader(true);
  // $(function () {
  //   setTimeout(function () {
  //     page.loader(false);
  //   }, 1000);
  // $("form").submit(function (event) {
  //   if (
  //     $.trim($("input#userID").val()) !== "" &&
  //     $.trim($("input#password").val()) !== ""
  //   ) {
  //     return;
  //   }
  //   loader(true);
  //   setTimeout(function () {
  //     loader(false);
  //     $('#dialog').NitroDialog({
  //       action: "open",
  //       backdrop: true,
  //       message: '<h4 class="bold m-b-15"><i class="i i-warning text-warning m-r-10"></i>Sign In</h4><p>Please enter valid credentials</p>',
  //       buttons: [
  //         {
  //           label: 'OK',
  //           class: "btn-info btn-link",
  //           action: function () {
  //             $('#dialog').NitroDialog({ action: "close" });
  //           }
  //         }
  //       ]
  //     });
  //   }, 1000);
  //   event.preventDefault();
  // });
  //});

  // var quill = new Quill('#editor', {
  //   modules: { toolbar: true },
  //   theme: 'snow'
  // });

  var dropzone = '';
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

  dropzone.uploadFiles = function(files) {
    var self = this;

    for (var i = 0; i < files.length; i++) {

      var file = files[i];
      totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

      for (var step = 0; step < totalSteps; step++) {
        var duration = timeBetweenSteps * (step + 1);
        setTimeout(function(file, totalSteps, step) {
          return function() {
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
