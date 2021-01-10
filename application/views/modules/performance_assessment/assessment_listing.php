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
               
                  <?php foreach ($affiliate_details as $details){ 
                    if(!$assessment_listing_date['affiliate_id']){?>
                        <option>choose</option>
                  <?php  }?>
             
                    <option  value="<?=isset($details['affiliate_id'])?$details['affiliate_id']:''?>">
                      <?=isset($details['city'])?$details['city']:''?>, <?=isset($details['stateabbreviation'])?$details['stateabbreviation']:''?>
                    </option>
                  <?php } ?>
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
            <div class="tabil-box">
              <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">DOCUMENT NAME</th>
                    <th scope="col">ASSESSMENT PERIOD START</th>
                    <th scope="col">ASSESSMENT PERIOD END</th>
                    <th scope="col">SUBMITTED ON</th>
                    <th scope="col">START/EDIT ASSESSMENT </th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($assessment_listing as $listing){
                    $formatedDate = date('m-d-Y ', strtotime($listing['created_date']));?>
                   <tr>
                    <td scope="row"><?=isset($listing['self_assessment_id'])?$listing['self_assessment_id']:''?></td>
                    <td><a class="link" href="#"><?=isset($listing['document_name'])?$listing['document_name']:''?></a></td>
                    <td><?=isset($listing['assessment_start_year'])?$listing['assessment_start_year']:''?></td>
                    <td><?=isset($listing['assessment_end_year'])?$listing['assessment_end_year']:''?></td>
                    <td><?=isset($formatedDate)?$formatedDate:''?></td>
                    <td>
                      <?php foreach($get_assessement_answers_details as $datalisting ){
                        if($datalisting['self_assessment_id'] == $listing['self_assessment_id']){ ?>
                     <a class="link m-x-10" href="<?php echo base_url('module/assessment/assessment?sid='.$listing['self_assessment_id'].'&aid='.$listing['affiliate_id']); ?>"><i class="i i-create"></i></a>
                     
                     <?php }else{ ?>
                    
                     <a class="link  m-x-10" href="<?php echo base_url('module/assessment/assessment?sid='.$listing['self_assessment_id'].'&aid='.$listing['affiliate_id']); ?>"  >
                     <i class="i i-add"></i></a>
                   <?php  }  }
                   
                 if(empty($datalisting['self_assessment_id']) ){ ?>
                
                  <a class="link  m-x-10" href="<?php echo base_url('module/assessment/assessment?sid='.$listing['self_assessment_id'].'&aid='.$listing['affiliate_id']); ?>"  >
                  <i class="i i-add"></i></a>
                  
                <?php  } ?>
                    
                    </td>

                  </tr>
                 <?php } ?>



                </tbody>
              </table>

            </div>

          </div>
        </div>
      </div>

    </div>

  </main>
