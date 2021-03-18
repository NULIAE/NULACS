<main class="document-search"> 
    <div class="container">
      <div class="Wrapper">
        <div class="row justify-content-end date">
          <div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m">Tuesday October 06,
              2020</span></div>
        </div>


        <div class="row headOuter">
          <div class="head">
            <h3 class="t-c">Performance Assessment</h3>
          </div>
        </div>
        <div class="b-a-1 row p-y-20 bg-light">
          <div class="col-24">
          <form action="<?php echo base_url('module/assessment/assessment-listing'); ?>" method="post"> 
            <div class="foot fend">
              <div class="ib-m p-t-15">
                <select data-control="material" data-type="selector" name="affiliate_id">         
                 <?php  if(isset($affiliate_details) && !empty($affiliate_details)){?>
                  <?php 	if(isset($this->session->role_id ) && $this->session->role_id != 3 ){ ?> 
                      <option>Choose Affiliate</option>
                  <?php  } ?>
                   <?php foreach ($affiliate_details as $details){ 
                     if($details['affiliate_id'] == $assessment_listing_date['affiliate_id']){ ?>
                     
                     <option selected='selected' value="<?=isset($details['affiliate_id'])?$details['affiliate_id']:''?>">
                     <?=isset($details['city'])?$details['city']:''?>, <?=isset($details['stateabbreviation'])?$details['stateabbreviation']:''?>
                   </option>
                 <?php    }else{
                     ?>
                   
                   <option  value="<?=isset($details['affiliate_id'])?$details['affiliate_id']:''?>">
                     <?=isset($details['city'])?$details['city']:''?>, <?=isset($details['stateabbreviation'])?$details['stateabbreviation']:''?>
                   </option>
                 <?php } }
                 }?>
                </select>
              </div>
              <label for="docx-pick">Assessment Year: Period covered from</label>
              <div class="yearPick ib-m">
                <i class="i i-year-pick"></i>
                <input class="yearpick form-control" placeholder="" value="<?=isset($assessment_listing_date['performance_assessment_from'])?$assessment_listing_date['performance_assessment_from']:''?>" type="text" name="performance_assessment_from" id="performance_assessment_from"
                  aria-labelledby="docx-pick">
              </div>
              <label for="docx-pick1">To</label>

              <div class="yearPick ib-m">
                <i class="i i-year-pick"></i>
                <input class="yearpick form-control" placeholder="" value="<?=isset($assessment_listing_date['performance_assessment_to'])?$assessment_listing_date['performance_assessment_to']:''?>" type="text" name="performance_assessment_to" id="performance_assessment_to"
                  aria-labelledby="docx-pick">
              </div>

              <button type="submit" class="btn btn-primary  min w-120px mr-2" href="javascript:;">SEARCH</a>
            </div>
                  </form>

                  <?php $def_icon ='';
                  if(isset($this->session->role_id ) && $this->session->role_id == 3 || $this->session->role_id == 2 ){ 
                      $def_icon = 'i i-remove_red_eye';
                  }else{
                      $def_icon = 'i i i-create';
                  } 
                  ?>
            <div class="tabil-box">
              <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">AFFILIATE NAME</th>
                    <th scope="col">FINAL ASSESSMENT </th>
                    <th scope="col">ASSESSMENT PERIOD START</th>
                    <th scope="col">ASSESSMENT PERIOD END</th>
                    <th scope="col">LAST EDITED</th>
                    <th scope="col">SELF ASSESSMENT</th>
                  

                  </tr>
                </thead>
                <?php
                ?>
                <tbody>
                  <?php 
                  $i=1;
                  foreach($assessment_listing as $listing){
                    // $formatedDate = date('m-d-Y H:i:s', strtotime($listing['last_update']));?>
                   <tr>
                    <td scope="row"><?=$i?></td>
                    <td> <?=isset($listing['city'])?$listing['city']:''?>, <?=isset($listing['stateabbreviation'])?$listing['stateabbreviation']:''?></td>
                    <td>
                      <?php
                         if($listing['flag'] == 0 ){ ?>
                          <a class="link  m-x-10" href="<?php echo base_url('module/assessment/assessment?sid='.$listing['sid'].'&aid='.$listing['affiliate_id']); ?>"  >
                          <i class="i i-add"></i></a>
                  
                      <?php  }else{ ?>
                        <a class="link m-x-10" href="<?php echo base_url('module/assessment/assessment?sid='.$listing['sid'].'&aid='.$listing['affiliate_id']); ?>"><i class="<?=$def_icon?>"></i></a>
                          <a class="iconLink ib-m" style="color:black;" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$listing['sid'].'&aid='.$listing['affiliate_id']); ?>">
                              <i class="i i-timer"></i>
                            </a>
                      <?php } 
                      
                 if(!empty($listing['formstatus']) && $listing['formstatus'] =='yes' ){ ?>
                
                <a class="checkLink  m-x-10" href="javascript:;"><i class="i i-check"></i></a>
                  
                <?php  }
                ?>
                    
                    </td>
                    <td><?=isset($listing['assessment_start_year'])?$listing['assessment_start_year']:''?></td>
                    <td><?=isset($listing['assessment_end_year'])?$listing['assessment_end_year']:''?></td>
                    <td><?=isset($listing['last_update'])?$listing['last_update']:''?></td>
                    <td> <a class="link  m-x-10" href="<?php echo base_url('module/assessment/assessment?sid='.$listing['sid'].'&aid='.$listing['affiliate_id'].'&uid='.$listing['user_id_check']); ?>"  >
                            Self Assessment</a></td>
                  

                  </tr>
                 <?php
                
                $i++;} ?>



                </tbody>
              </table>

            </div>

          </div>
        </div>
      </div>

    </div>

  </main>
