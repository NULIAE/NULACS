<main class="exeDashboard ">
    <div class="container">
      <div class="Wrapper">
        <div class="row justify-content-end date">
          <div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?=date("l  F d, Y")?></span></div>
        </div>
        <div class="row justify-content-between">
          <div class="col-lg-11">
             <div class="row headOuter">
                 <div class="head">
                 <h3><?php echo $affiliate['organization'].' - '.$affiliate['city'].', '.$affiliate['stateabbreviation']; ?></h3>
                 </div>
             </div>
             <div class="row chartBody sub-form">  <div class="col-24">
               <div class="row">
                 <div class="col-md-12 form-group">

                  <label for="b-chair">Board Chair</label>
                  <input type="text" class="form-control" id="b-chair" aria-describedby="b-chair" placeholder="Board Chair" readonly>
                 </div>
                 <div class="col-md-12 form-group">
                  <label for="t-expiration">Term Expiration</label>
                  <input type="text" class="form-control" id="t-expiration" aria-describedby="t-expiration" placeholder="Term Expiration" readonly>
                 </div></div>
               <div class="row">
                 <div class="col-md-12 form-group">
                  <label for="adm">ADM Uploader</label>
                  <input type="text" class="form-control" id="adm" aria-describedby="adm" placeholder="ADM Uploader" readonly>
                 </div>
                 <div class="col-md-12 form-group">
                  <label for="b-chair">Last site visit </label>
                  <?php 
                  if($user_data->last_login && !empty($user_data->last_login)){
                     $formatedDateLastV = date('m-d-Y H:i:s', strtotime($user_data->last_login));
                  }
                  ?>
                  <input type="text" class="form-control" id="l-visit"  value="<?=isset($formatedDateLastV )?$formatedDateLastV :''?>"aria-describedby="l-visit " placeholder="Last site visit " readonly>
                 </div></div>
               <div class="row">
                 <div class="col-md-12 form-group">
                  <label for="ccs">Current Compliance Status</label>
                  <input type="text" class="form-control" id="ccs" aria-describedby="ccs" placeholder="Current Compliance Status" readonly>
                 </div>
                 <div class="col-md-12 form-group">
                  <label for="p-score">Performance Score</label>
                  <input type="text" class="form-control" id="p-score" aria-describedby="p-score" placeholder="Performance Score" readonly>
                 </div></div>
               <div class="row">
                
                 <div class="col-md-12 form-group">
                  <label >Report Available</label>
                  <div class="mt-1">
                    <label class="checkbox switch bool mb-0" for="px-15">
                      <input id="px-15" type="checkbox" name="px-15" readonly>
                    </label>
                  </div>
                 </div></div>

                </div>
             </div>
          </div>
          <div class="col-lg-11">
             <div class="row headOuter">
                 <div class="head">
                     <h3>Notification</h3>
                 </div>
             </div>
             <div class="row chartBody2">
                 
                 <div class="row w-100">
                     <div class="chatBoxNul">
                     <?php if (isset($user_notifications) && !empty($user_notifications)) {
                      foreach ($user_notifications as $notification) {
                          $formatedDate = date('d M, Y | H:i', strtotime($notification['created']));
                          if ($notification['created_by'] != $this->session->user_id) { ?>
                         <div class="msgPosition">
                             <div class="msg">
                                 <div class="dp"><?php echo strtoupper($notification['first_name'][0].$notification['last_name'][0]); ?></div>
                                 <div class="msgBox">
                                     <div class="textMsg"><?=isset($notification['notification']) ? $notification['notification'] : '' ?></div>
                                     <div class="Details">
                                         <span><?php echo $notification['first_name'].' '.$notification['last_name']; ?></span>
                                         <date>&nbsp; <?=isset($formatedDate) ? $formatedDate : '' ?></date>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <?php
                          } else { ?>
                         <div class="replyPosition">
                             <div class="msg-reply">
                                 <div class="msgBox2">
                                     <div class="textMsg2"><?=isset($notification['notification']) ? $notification['notification'] : '' ?></div>
                                     <div class="Details2">
                                         <span><?php echo $notification['first_name'].' '.$notification['last_name']; ?></span>
                                         <date>&nbsp; <?=isset($formatedDate) ? $formatedDate : '' ?></date>
                                     </div>
                                 </div>
                                 <div class="dp2"><?php echo strtoupper($notification['first_name'][0].$notification['last_name'][0]); ?></div>
                             </div>
                         </div>
                         <?php
                            }
                        }
                    } ?>
                     </div>
                 </div>
             </div>
         </div>
      </div>
      <div class="mr-auto t-r mt-5">
									<span></span>
                  <div class="year btn btn-secondary  btn-rounded btn-action-sm" id="btn-year-pick" data-rel="tooltip" data-placement="top" title="Year" style="position:relative;margin-right: 10px;" >
                    <i class="i i-date-o"></i>
                  </div>
                  <div class="month btn btn-secondary  btn-rounded btn-action-sm" id="btn-month-pick" data-rel="tooltip" data-placement="top" title="Month" style="position:relative;margin-right: 10px;">
                    <i class="i i-month-31"></i>
                  </div><a href="javascript:;"
									class="btn btn-primary btn-rounded btn-action-sm" id="btn-filter-date" style="margin-right: 35px;" data-rel="tooltip" data-placement="top" title="Search"><i class="i i-right"></i></a>
									<form id="filter-date" class="d-none" action="">
                  <input type="hidden" id="yearpicker" name="year" value="<?php echo isset($_GET['year']) ? $_GET['year'] : date('Y'); ?>" />
									<input type="hidden" id="monthpicker" name="month" value="<?php echo isset($_GET['month']) ? $_GET['month'] : date('m'); ?>" />
                  </form>
              
                  <a  href="<?php echo base_url('module/affiliate/status/details/'.$this->session->affiliate_id.''); ?>" class="btn btn-primary m-l-auto btn-rounded btn-action" data-rel="tooltip" data-placement="top" title="Add"><i class="i i-add"></i></a>
                </div>


               

                

      <!-- <div class="row align-items-center py-3">     
           <div class="col-sm-4"> -->
             
                 <!-- <div class="search-box">
                   <input type="text" placeholder="Search" class="form-control input" name="text22" id="text22">
                   <div class="btn2">
                     <i class="i i-search" aria-hidden="true"></i>
                   </div>
                 </div> -->
           <!-- </div> 
      </div>  -->
       
        <div class="mainTab">
          <div class="tab-pane " >
            <nav id="selected">
              <div class="nav " id="tab-inner-w" role="tablist">
                <a class="nav-item nav-link active" onclick="openTab('monthly')" id="nav-w1-tab" data-toggle="tab" href="#nav-w1" role="tab"
                  aria-controls="nav-w1" aria-selected="true"><i class="i i-month-o"></i> View Monthly Status</a>
                <a class="nav-item nav-link" onclick="openTab('quarterly')" id="nav-w2-tab" data-toggle="tab" href="#nav-w2" role="tab"
                  aria-controls="nav-w2" aria-selected="false"><i class="i i-quater"></i> View Quarterly Status</a>
                <a class="nav-item nav-link" onclick="openTab('yearly')" id="nav-w3-tab" data-toggle="tab" href="#nav-w3" role="tab"
                  aria-controls="nav-w3" aria-selected="false"><i class="i i-date-o"></i> View Yearly Status</a>
              </div>
            </nav>
            <div class="v-tabWrap">
            <div class="tab-content" id="nav-tabContent-nner-w">
              <div class="tab-pane fade show active" id="nav-w1" role="tabpanel" aria-labelledby="nav-w1-tab">

               
                        <div class="table-responsive affiliate-status">
                        <table class="table table-striped  table-borderless">
                        <thead>
                          <tr>
                            <th>MONTH</th>
                            <?php if(isset($_GET['month']) && isset($_GET['year'])){ ?>
                                <td><?= date('M-Y', strtotime('-1 months', strtotime($_GET['year'].'-'.$_GET['month'].'-01'))); ?></td>
                                <td><?= date('M-Y', strtotime('-2 months', strtotime($_GET['year'].'-'.$_GET['month'].'-01'))); ?></td>
                                <td><?= date('M-Y', strtotime('-3 months', strtotime($_GET['year'].'-'.$_GET['month'].'-01'))); ?></td>
                                <td><?= date('M-Y', strtotime('-4 months', strtotime($_GET['year'].'-'.$_GET['month'].'-01'))); ?></td>
                            <?php }else{?>
                                <td><?=date("M-Y", strtotime("-1 Months")); ?></td>
                                <td><?=date("M-Y", strtotime("-2 Months")); ?></td>
                                <td><?=date("M-Y", strtotime("-3 Months")); ?></td>
                                <td><?=date("M-Y", strtotime("-4 Months")); ?></td>
                        <?php  } ?>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>Compliance Status</th>

                            <?php foreach($get_monthly_compliance['status'] as $status){ ?>
                                <td><div class="icon-rounded" data-rel="tooltip" data-placement="top" title="<?=isset($status[0]['name']) ? $status[0]['name'] :'Indeterminate'?>"><?=isset($status[0]) ? $status[0]['icon'] : '<i class="i i-Indeterminate inter"></i>' ?></div></td>
                             <?php }?>
                           </tr>
                                <?php foreach ($document_listing as $listing) {?>
                          <tr>
                            <th> <?=isset($listing['document_name']) ? $listing['document_name'] : '' ?></th>
                                <?php foreach ($listing['status'] as $data) {

                               
                                  if ($data) { ?>
                                   <td><div class="icon-rounded" data-rel="tooltip" data-placement="top" title="<?=isset($data[0]['name']) ? $data[0]['name'] :'Submission Pending'?>"><?=isset($data[0]['icon']) ? $data[0]['icon'] : '<i class="i i-document-status d-status"></i>' ?></div></td>

                                   <?php } else { ?>
                                      <td><div class="icon-rounded" title="Submission Pending"><i class="i i-document-status d-status"></i></div></td>
                                <?php } 
                                    }
                                   } ?>
                                </tr>
                                </tbody>
                                </table>
                                </div>
                                </div>

              <div class="tab-pane fade" id="nav-w2" role="tabpanel" aria-labelledby="nav-w2-tab">
                <div class="table-responsive affiliate-status">
                  <table class="table table-striped  table-borderless">
                  <thead>
                    <tr>
                      <th>Quarter</th>
                      <td>Q1</td>
                      <td>Q2</td>
                      <td>Q3</td>
                      <td>Q4</td>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th>Compliance Status</th>
                    <?php  foreach($get_quarterly_compliance_status['status'] as $status){ ?>
                        <td><div class="icon-rounded" data-rel="tooltip" data-placement="top" title="<?=isset($status[0]['name']) ? $status[0]['name'] :'Indeterminate'?>"><?=isset($status[0]) ? $status[0]['icon'] : '<i class="i i-Indeterminate inter"></i>' ?></div></td>
                    <?php }?>
                    </tr>
                    <?php foreach ($quarterly_document_listing as $listing) { ?>
                    <tr>
                      <?php  if($listing){?>
                     <th> <?=isset($listing['document_name']) ? $listing['document_name'] : '' ?></th>
                     <?php foreach ($listing['status'] as $status){ 
                        if($status){ ?>
                         <td><div class="icon-rounded" data-rel="tooltip" data-placement="top" title="<?=isset($status[0]['name']) ? $status[0]['name'] :'Submission Pending'?>"><?=isset($status[0]['icon']) ? $status[0]['icon'] : '<i class="i i-document-status d-status"></i>' ?></div></td>
                    <?php }else{?>
                        <td><div class="icon-rounded" data-rel="tooltip" data-placement="top" title="Submission Pending"><i class="i i-document-status d-status"></i></i></div></td>
                   <?php } }
                    } } ?>
                    </tr>
                  </tbody>
                </table>
              </div>

              </div>
              <div class="tab-pane fade" id="nav-w3" role="tabpanel" aria-labelledby="nav-w3-tab">
                <div class="table-responsive affiliate-status">
                  <table class="table table-striped  table-borderless">
                  <thead>
                    <tr>
                      <th>Year</th>
                      <?php if(isset($_GET['year'])){ ?>
                        
                        <td><?=date('Y', strtotime('-1 year', strtotime($_GET['year'].'-01-01')))?></td>
                        <td><?=date('Y', strtotime('-2 year', strtotime($_GET['year'].'-01-01')))?></td>
                        <td><?=date('Y', strtotime('-3 year', strtotime($_GET['year'].'-01-01')))?></td>
                        <td><?=date('Y', strtotime('-4 year', strtotime($_GET['year'].'-01-01')))?></td>
                      <?php }else{ ?>
                        <td><?=date("Y",strtotime("-1 years"))?></td>
                        <td><?=date("Y",strtotime("-2 years"))?></td>
                        <td><?=date("Y",strtotime("-3 years"))?></td>
                        <td><?=date("Y",strtotime("-4 years"))?></td>
                   <?php  } ?>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th>Compliance Status</th>
                    <?php  foreach($get_yearly_compliance_status['status'] as $status){ ?>
                        <td><div class="icon-rounded" data-rel="tooltip" data-placement="top" title="<?=isset($status[0]['name']) ? $status[0]['name'] :'Indeterminate'?>"><?=isset($status[0]) ? $status[0]['icon'] : '<i class="i i-Indeterminate inter"></i>' ?></div></td>
                    <?php }?>
                  </tr>
                    <?php foreach ($yearly_document_listing as $listing) { ?>
                      <tr>
                      <?php if($listing){?>
                     <th> <?=isset($listing['document_name']) ? $listing['document_name'] : '' ?></th>
                     <?php foreach ($listing['status'] as $status){ 
                        if($status){ ?>
                        <td><div class="icon-rounded" data-rel="tooltip" data-placement="top" title="<?=isset($status[0]['name']) ? $status[0]['name'] :'Submission Pending'?>"><?=isset($status[0]['icon']) ? $status[0]['icon'] : '<i class="i i-document-status d-status"></i>' ?></div></td>
                     <?php }else{?>
                      <td><div class="icon-rounded" data-rel="tooltip" data-placement="top" title="Submission Pending"><i class="i i-document-status d-status"></i></div></td>
                   <?php } }
                  } } ?>
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
  </main>
