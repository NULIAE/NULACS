
<?php
if(isset($_GET['sid']) && isset($_GET['aid']) && !empty($_GET['sid']) && !empty($_GET['aid']) ){ 
if(isset($this->session->role_id ) && $this->session->role_id == 3 || $this->session->role_id == 2 ){  
  if(isset($_GET['uid']) && !empty($_GET['uid'])){ ?>


<?php  }else{ ?>
    <input type="hidden" value="<?=$this->session->role_id?>" id="role_id_def">
    <style>
    .checkbox {
      pointer-events: none;
    } 
    .display-none{
      display: none!important;
    }
<?php } } ?>
</style>

<?php 
 if(isset($_GET['uid']) && !empty($_GET['uid'])){
 $userId = '&uid='.$_GET['uid'];
}else{
  $userId='';
}





// $string = $userId;
//   $key = "MAL_979805"; //key to encrypt and decrypts.
//   $result = '';
//   $test = "";
//    for($i=0; $i<strlen($string); $i++) {
//      $char = substr($string, $i, 1);
//      $keychar = substr($key, ($i % strlen($key))-1, 1);
//      $char = chr(ord($char)+ord($keychar));

//      $test[$char]= ord($char)+ord($keychar);
//      $result.=$char;
//    }

//     print_r(urlencode(base64_encode($result)));


// function decrypt_url($string) {
//     $key = "MAL_979805"; //key to encrypt and decrypts.
//     $result = '';
//     $string = base64_decode(urldecode($string));
//    for($i=0; $i<strlen($string); $i++) {
//      $char = substr($string, $i, 1);
//      $keychar = substr($key, ($i % strlen($key))-1, 1);
//      $char = chr(ord($char)-ord($keychar));
//      $result.=$char;
//    }
//    return $result;
// }


foreach($form_data  as $formVal){
  if($formVal['qId'] == $criteria_one_standard_one->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc1s1= "formactive"; }}
  if($formVal['qId'] == $criteria_one_standard_two->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc1s2= "formactive"; }}
  if($formVal['qId'] == $criteria_one_standard_three->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc1s3= "formactive"; }}
  if($formVal['qId'] == $criteria_one_standard_four->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc1s4= "formactive"; }}
  if($formVal['qId'] == $criteria_one_standard_five->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc1s5= "formactive"; }}
  if($formVal['qId'] == $criteria_one_standard_six->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc1s6= "formactive"; }}

  if($formVal['qId'] == $criteria_two_standard_one->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc2s1= "formactive"; }}
  if($formVal['qId'] == $criteria_two_standard_two->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc2s2= "formactive"; }}
  if($formVal['qId'] == $criteria_two_standard_three->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc2s3= "formactive"; }}
  if($formVal['qId'] == $criteria_two_standard_four->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc2s4= "formactive"; }}
  if($formVal['qId'] == $criteria_two_standard_five->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc2s5= "formactive"; }}
  if($formVal['qId'] == $criteria_two_standard_six->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc2s6= "formactive"; }}
  if($formVal['qId'] == $criteria_two_standard_seven->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc2s7= "formactive"; }}
  if($formVal['qId'] == $criteria_two_standard_eight->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc2s8= "formactive"; }}

  if($formVal['qId'] == $criteria_three_standard_one->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc3s1= "formactive"; }}
  if($formVal['qId'] == $criteria_three_standard_two->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc3s2= "formactive"; }}
  if($formVal['qId'] == $criteria_three_standard_three->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc3s3= "formactive"; }}
  if($formVal['qId'] == $criteria_three_standard_four->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc3s4= "formactive"; }}
  if($formVal['qId'] == $criteria_three_standard_five->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc3s5= "formactive"; }}
  if($formVal['qId'] == $criteria_three_standard_six->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc3s6= "formactive"; }}
  if($formVal['qId'] == $criteria_three_standard_seven->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc3s7= "formactive"; }}
  if($formVal['qId'] == $criteria_three_standard_eight->cid){if($formVal['totalcount'] == $formVal['count']){ $bgc3s8= "formactive"; }} 
}

foreach($criteria_answers_view as $answers){
  if($answers['question_id'] == $criteria_one_standard_one->cid){?><input type="hidden" value="<?=isset($answers['year'])?$answers['year']:''?>" id="c1s1_1_href"><?php }
  if($answers['question_id'] == $criteria_one_standard_two->cid){?><input type="hidden" value="<?=isset($answers['year'])?$answers['year']:''?>" id="c1s2_1_href"><?php }
  if($answers['question_id'] == $criteria_one_standard_three->cid){?><input type="hidden" value="<?=isset($answers['year'])?$answers['year']:''?>" id="c1s3_2_href"><?php }
  if($answers['question_id'] == $criteria_one_standard_three->cid){?><input type="hidden" value="<?=isset($answers['year'])?$answers['year']:''?>" id="c1s3_16_href"><?php }
  if($answers['question_id'] == $criteria_two_standard_eight->cid){?><input type="hidden" value="<?=isset($answers['year'])?$answers['year']:''?>" id="c2s8_2_href"><?php }



}

$selectedTab = 1;
if(isset($_GET['tab']) && $_GET['tab'] != '')
  $selectedTab = $_GET['tab'];
?>
<style>
  .mainTab2 .tab-content .wrapouterContents .criteria .criteriaBottom .textIn2 input{
    max-width: 100px !important;
  }
</style>

  <main class="performanceAssess">
    <div class="container">
      <div class="Wrapper">
        <div class="row justify-content-end date">
          <div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m">Tuesday October 06,
              2020</span></div>
        </div>
        <div class=" document-mdata">

          <div class="mnHead">
            <h3><a href="javascript:window.history.back();" class="text-white"><?= ($userId == '')? "AFFILIATE Performance Assessment" : "Affiliate Self-Assessment";?> (<?=isset($affiliate_details[0]['assessment_start_year'])?$affiliate_details[0]['assessment_start_year']:''?> - <?=isset($affiliate_details[0]['assessment_end_year'])?$affiliate_details[0]['assessment_end_year']:''?>) -  
             <?=isset($affiliate_details[0]['city'])?$affiliate_details[0]['city']:''?>, <?=isset($affiliate_details[0]['stateabbreviation'])?$affiliate_details[0]['stateabbreviation']:''?>
             </a>
            </h3>
          </div>
        </div>
        <div class="mainTab2">
          <nav>
            <div class="nav" id="nav-tab" role="tablist">
              <a class="nav-item nav-link <?= $selectedTab == 1 ? 'active' : ''; ?>" id="nav-x1-tab" data-toggle="tab" href="#nav-x1" role="tab"
                aria-controls="nav-x1" aria-selected="<?= $selectedTab == 1 ? 'true' : 'false'; ?>"><i class="i i-org"></i> Organizational Soundness</a>
              <a class="nav-item nav-link <?= $selectedTab == 2 ? 'active' : ''; ?>" id="nav-x2-tab" data-toggle="tab" href="#nav-x2" role="tab"
                aria-controls="nav-x2" aria-selected="<?= $selectedTab == 1 ? 'true' : 'false'; ?>"><i class="i i-vitality"></i> Organizational Vitality</a>
              <a class="nav-item nav-link <?= $selectedTab == 3 ? 'active' : ''; ?>" id="nav-x3-tab" data-toggle="tab" href="#nav-x3" role="tab"
                aria-controls="nav-x3" aria-selected="<?= $selectedTab == 1 ? 'true' : 'false'; ?>"><i class="i i-mission"></i> Implementation of Mission</a>
              <a class="nav-item nav-link" id="nav-x4-tab" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
              <i class="i i-timer"></i> <?php echo ($userId !== '') ? 'Self Assessment - ' : ''; ?>Rating Sheet</a>
            </div>
          </nav>
           <div class="tab-content" id="nav-tabContent">
              <input type="hidden" value="<?=isset($_GET['sid'])?$_GET['sid']:''?>" id="self_assessment_id">
              <input type="hidden" value="<?=isset($_GET['aid'])?$_GET['aid']:''?>" id="affiliate_id">
              <input type="hidden" value="<?=isset($_GET['uid'])?$_GET['uid']:''?>" id="user_id">

   <div class="tab-pane fade <?= $selectedTab == 1 ? 'show active' : ''; ?>" id="nav-x1" role="tabpanel" aria-labelledby="nav-x1-tab">

              <div class="row wrapouterIcons">
                  <div class="col-4 colCenter" >
                      <a class="active <?=isset($bgc1s1)?$bgc1s1:''?>"  id="os-1" title="Administration and Governance ">
                          <i class="i i-governance"></i>
                      </a>
                      <span class="min w-180px">Administration and Governance </span>
                  </div>
                 <div class="col-4 colCenter">
                      <a class="<?=isset($bgc1s2)?$bgc1s2:''?>" id="os-2" title="Annual Reports">
                          <i class="i i-docs-l"></i>
                      </a>
                      <span class="min w-180px">Annual <br>Reports </span>
                 </div>
                  <div class="col-4 colCenter">
                      <a class="<?=isset($bgc1s3)?$bgc1s3:''?>" id="os-3" title="Board of Directors">
                          <i class="i i-b-o-d"></i>
                      </a>
                      <span class="min w-180px">Board of <br> Directors </span>
                  </div>
                  <div class="col-4 colCenter">
                      <a class="<?=isset($bgc1s4)?$bgc1s4:''?>" id="os-4" title="Affiliate Policies and Procedures">
                          <i class="i i-affiliate-p-p"></i>
                      </a>
                      <span class="min w-180px">Affiliate Policies and<br> Procedures </span>
                  </div>
                  <div class="col-4 colCenter">
                      <a class="<?=isset($bgc1s5)?$bgc1s5:''?>" id="os-5" title="Strategic Planning ">
                          <i class="i i-strategic"></i>
                      </a>
                      <span class="min w-180px">Strategic <br> Planning </span>
                  </div>
                  <div class="col-4 colCenter">
                      <a class="<?=isset($bgc1s6)?$bgc1s6:''?>" id="os-6" title="Public Affairs  and Public Policy">
                          <i class="i i-policy"></i>
                      </a>
                      <span class="min w-180px">Public Affairs <br> and Public Policy </span>
                  </div>
              </div>
            <!-- criteria 1 standard 1 -->
         
              <div class="wrapouterContents active" id="wpContent1">
          
                 <div class="criteria">
                      <div class="headOuter">
                          <div class="head">
                          <h3 class="ib-m">Criteria 1: Organizational Soundness </h3>
                          </div>
                      </div>
                      <div class="criteriaBottom">
                          <p>Affiliates are governed by an elected volunteer board of directors that should consist of individuals who are committed to the mission of the organization.  An effective 
                              affiliate board determines the mission of the organization, establishes management practices, policies and procedures, assures that adequate human resources (volunteer 
                              and paid staff) and financial resources are available, and actively monitors the organizations financial and programmatic performance.  </p>
                      </div>
                 </div>
          
                 <div class="criteria">
          
                      <div class="headOuter">
                          <div class="head">
                              <h3>Administration and Governance  </h3>
                          </div>
                      </div>
          
                      <div class="criteriaBottom">
                        <h5>Standard 1</h5>
                        <p>Affiliates should prepare, and make available annually to the public, information about the affiliate’s mission, program activities, and basic audited financial data. The report 
                          should also identify the names of the affiliate’s board of directors and management staff.</p>
                        <h4>INDICATORS OF EFFECTIVENESS</h4>
          
                        <div id="accordion">

                       
                          <input type="hidden" id="criteriaOneStandardOneId" value=" <?=isset($criteria_one_standard_one->cid)?$criteria_one_standard_one->cid:'' ?>">
                         <?=isset($criteria_one_standard_one->question)?$criteria_one_standard_one->question:'' ?>
                        
                        </div>
          
                        <div class="my-3">
          
                          <div class="p-b-0 ratingBottom">
                            <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
                            <span class=" tag ">
                                <div class="rating">
                                    <span class="star c1_s1_five"></span>
                                    <span class="star c1_s1_four"></span>
                                    <span class="star c1_s1_three"></span>
                                    <span class="star c1_s1_two"></span>
                                    <span class="star c1_s1_one"></span>
                                </div> 
                                <span id="c1_s1"></span>/5
                            </span>
                          </div>
          
                        </div>
          
                    </div>
                     
                      <div class="d-flex justify-content-end display-none">
                        <button class="btn btn-dark btn-rounded min w-100px mr-2"  onclick="c_one_s_one(); savebtn();" type="submit">Save</button>
                        <button class="btn btn-primary btn-rounded min w-100px" onclick="c_one_s_one();" id="saveContinue" type="submit">SAVE AND CONTINUE</button>
                      </div>
          
                  </div>
          
              </div>
           
            <!-- end criteria 1 standard 1 -->
             
            <!-- criteria 1 standard 2 -->


          <div class="wrapouterContents" id="wpContent2">
        
    <div class="criteria">

        <div class="headOuter">
            <div class="head">
            <h3 class="ib-m">Criteria 1: Organizational Soundness </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
            </div>
        </div>

        <div class="criteriaBottom">
            <p>Affiliates are governed by an elected volunteer board of directors that should consist of individuals who are committed to the mission of the organization.  An effective 
                affiliate board determines the mission of the organization, establishes management practices, policies and procedures, assures that adequate human resources (volunteer 
                and paid staff) and financial resources are available, and actively monitors the organizations financial and programmatic performance.  </p>
        </div>

   </div>

   <div class="criteria">

    <div class="headOuter">
        <div class="head">
            <h3>Annual Reports </h3>
        </div>
    </div>

    <div class="criteriaBottom">
        <h5>Standard 2</h5>
        <p>Affiliates should prepare, and make available annually to the public, information about the affiliate’s mission, program activities, and basic audited financial data. The report 
          should also identify the names of the affiliate’s board of directors and management staff.</p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>

        <div id="accordion_c1_s2">
        <input type="hidden" id="criteriaOneStandardTwoId" value=" <?=isset($criteria_one_standard_two->cid)?$criteria_one_standard_two->cid:'' ?>">

          <?=isset($criteria_one_standard_two->question)?$criteria_one_standard_two->question:'' ?>
        </div>

        <div class="my-3">

          <div class="p-b-0 ratingBottom">
            <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
            <span class=" tag ">
                <div class="rating">
                    <span class="star c1_s2_five"></span>
                    <span class="star c1_s2_four"></span>
                    <span class="star c1_s2_three"></span>
                    <span class="star c1_s2_two"></span>
                    <span class="star c1_s2_one"></span>
                </div> 
                <span id="c1_s2"></span>/5
            </span>
          </div>

        </div>

    </div>
  
  </div>

  <div class="d-flex justify-content-end display-none">

  <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_one_s_two(); savebtn();" type="submit">Save</button>
 <button class="btn btn-primary btn-rounded min w-100px" onclick="c_one_s_two();" id="saveContinue2" type="submit">SAVE AND CONTINUE</button>


  </div>

</div>

 <!--end criteria 1 standard 2 -->

 <!-- criteria 1 standard 3 -->
 <div class="wrapouterContents" id="wpContent3">
        
        <div class="criteria">
    
            <div class="headOuter">
                <div class="head">
                    <h3 class="ib-m">Criteria 1: Organizational Soundness </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
                </div>
            </div>
    
            <div class="criteriaBottom">
                <p>Affiliates are governed by an elected volunteer board of directors that should consist of individuals who are committed to the mission of the organization.  An effective 
                    affiliate board determines the mission of the organization, establishes management practices, policies and procedures, assures that adequate human resources (volunteer 
                    and paid staff) and financial resources are available, and actively monitors the organizations financial and programmatic performance.  </p>
            </div>
    
       </div>
    
       <div class="criteria">
    
        <div class="headOuter">
            <div class="head">
                <h3>Board of Directors </h3>
            </div>
        </div>
    
        <div class="criteriaBottom">
            <h5>Standard 3</h5>
            <p>The affiliate’s Board of Directors nominating/development committees annually assesses the board’s needs, recruits qualified individuals within the affiliate’s community for 
              election by the membership body.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>
    
            <div id="accordion_c1_s3">
        <input type="hidden" id="criteriaOneStandardThreeId" value=" <?=isset($criteria_one_standard_three->cid)?$criteria_one_standard_three->cid:'' ?>">
             
    
          <?=isset($criteria_one_standard_three->question)?$criteria_one_standard_three->question:'' ?>
            </div>
            <div class="my-3">
          <div class="p-b-0 ratingBottom">
            <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
            <span class=" tag ">
                <div class="rating">
                    <span class="star c1_s3_five"></span>
                    <span class="star c1_s3_four"></span>
                    <span class="star c1_s3_three"></span>
                    <span class="star c1_s3_two"></span>
                    <span class="star c1_s3_one"></span>
                </div> 
                <span id="c1_s3"></span>/5
            </span>
          </div>

</div>
        </div>
      
      </div>
    
    
       <div class="d-flex justify-content-end display-none">
       <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_one_s_three(); savebtn();" type="submit">Save</button>
       <button class="btn btn-primary btn-rounded min w-100px" onclick="c_one_s_three();" id="saveContinue3" type="submit">SAVE AND CONTINUE</button>

      </div>
    
    </div>


  <!--end criteria 1 standard 3 -->



  <!-- criteria 1 standard 4 -->


  <div class="wrapouterContents" id="wpContent4">
        
        <div class="criteria">
    
          <div class="headOuter">
              <div class="head">
                  <h3 class="ib-m">Criteria 1: Organizational Soundness </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
              </div>
          </div>
    
          <div class="criteriaBottom">
              <p>Affiliates are governed by an elected volunteer board of directors that should consist of individuals who are committed to the mission of the organization.  An effective 
                  affiliate board determines the mission of the organization, establishes management practices, policies and procedures, assures that adequate human resources (volunteer 
                  and paid staff) and financial resources are available, and actively monitors the organizations financial and programmatic performance.  </p>
          </div>
    
        </div>
    
     <div class="criteria">
    
      <div class="headOuter">
          <div class="head">
              <h3>Affiliate Policies and Procedures </h3>
          </div>
      </div>
    
      <div class="criteriaBottom">
          <h5>Standard 4</h5>
          <p>The affiliate fulfills its corporate obligations as required by local, state, and federal government and the National Urban League.</p>
          <h4>INDICATORS OF EFFECTIVENESS</h4>
    
          <div id="accordion_c1_s4">
        <input type="hidden" id="criteriaOneStandardFourId" value=" <?=isset($criteria_one_standard_four->cid)?$criteria_one_standard_four->cid:'' ?>">

            <?=isset($criteria_one_standard_four->question)?$criteria_one_standard_four->question:'' ?>
          
           
          </div>
    
          <div class="my-3 d-flex">
    
            <div class="p-b-0 ratingBottom">
              <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
              <span class=" tag ">
                <div class="rating">
                    <span class="star c1_s4_five"></span>
                    <span class="star c1_s4_four"></span>
                    <span class="star c1_s4_three"></span>
                    <span class="star c1_s4_two"></span>
                    <span class="star c1_s4_one"></span>
                </div> 
                <span id="c1_s4"></span>/5
            </span>
            </div>
    
          </div>
    
      </div>
    
    </div>
    
    
     <div class="d-flex justify-content-end display-none">
     <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_one_s_four(); savebtn();" type="submit">Save</button>
      <button class="btn btn-primary btn-rounded min w-100px" onclick="c_one_s_four();" id="saveContinue4" type="submit">SAVE AND CONTINUE</button>

    </div>
    
      </div>




  <!--end criteria 1 standard 4 -->


  <!-------------------------- Standard 5 ----------------->
<div class="wrapouterContents" id="wpContent5">
        
  <div class="criteria">

      <div class="headOuter">
          <div class="head">
              <h3 class="ib-m">Criteria 1: Organizational Soundness </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
          </div>
      </div>

      <div class="criteriaBottom">
          <p>Affiliates are governed by an elected volunteer board of directors that should consist of individuals who are committed to the mission of the organization.  An effective 
              affiliate board determines the mission of the organization, establishes management practices, policies and procedures, assures that adequate human resources (volunteer 
              and paid staff) and financial resources are available, and actively monitors the organizations financial and programmatic performance.  </p>
      </div>

      <div class="criteria">

        <div class="headOuter">
            <div class="head">
                <h3>Strategic Planning</h3>
            </div>
        </div>

        <div class="criteriaBottom">
            <h5>Standard 5</h5>
            <p>The Board and Management should always have a plan for the affiliate’s ongoing operation with the stated goals and objectives to effectively accomplish the mission.  
              The affiliate should have a current strategic plan in effect periodically measuring its progress against goals and objectives and revising the plan as needed.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>

            <div id="accordion_c1_s5">
            <input type="hidden" id="criteriaOneStandardFiveId" value=" <?=isset($criteria_one_standard_five->cid)?$criteria_one_standard_five->cid:'' ?>">

              <?=isset($criteria_one_standard_five->question)?$criteria_one_standard_five->question:'' ?>


            </div>

            <div class="my-3 d-flex">

              <div class="p-b-0 ratingBottom">
                <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
                <span class=" tag ">
                <div class="rating">
                    <span class="star c1_s5_five"></span>
                    <span class="star c1_s5_four"></span>
                    <span class="star c1_s5_three"></span>
                    <span class="star c1_s5_two"></span>
                    <span class="star c1_s5_one"></span>
                </div> 
                <span id="c1_s5"></span>/5
            </span>
              </div>

            </div>

        </div>
      
      </div>

      <div class="d-flex justify-content-end display-none">
       
      <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_one_s_five(); savebtn();" type="submit">Save</button>
      <button class="btn btn-primary btn-rounded min w-100px" onclick="c_one_s_five();" id="saveContinue5" type="submit">SAVE AND CONTINUE</button>

      </div>

 </div>

</div>
<!-------------------------- Standard 5 end ----------------->

<!-------------------------- Standard 6----------------->
<div class="wrapouterContents" id="wpContent6">
        
  <div class="criteria">

      <div class="headOuter">
          <div class="head">
              <h3 class="ib-m">Criteria 1: Organizational Soundness </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
          </div>
      </div>

      <div class="criteriaBottom">
          <p>Affiliates are governed by an elected volunteer board of directors that should consist of individuals who are committed to the mission of the organization.  An effective 
              affiliate board determines the mission of the organization, establishes management practices, policies and procedures, assures that adequate human resources (volunteer 
              and paid staff) and financial resources are available, and actively monitors the organizations financial and programmatic performance.  </p>
      </div>

      <div class="criteria">

        <div class="headOuter">
            <div class="head">
                <h3>Public Affairs and Public Policy </h3>
            </div>
        </div>

        <div class="criteriaBottom">
            <h5>Standard 6</h5>
            <p>The Board and Management should always have a plan for the affiliate’s ongoing operation with the stated goals and objectives to effectively accomplish the mission.  
              The affiliate should have a current strategic plan in effect periodically measuring its progress against goals and objectives and revising the plan as needed.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>

            <div id="accordion_c1_s6">
            <input type="hidden" id="criteriaOneStandardSixId" value=" <?=isset($criteria_one_standard_six->cid)?$criteria_one_standard_six->cid:'' ?>">

              <?=isset($criteria_one_standard_six->question)?$criteria_one_standard_six->question:'' ?>
               
            <div class="col p-b-0 ratingBottom">
              <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
              <span class=" tag ">
                <div class="rating">
                    <span class="star c1_s6_five"></span>
                    <span class="star c1_s6_four"></span>
                    <span class="star c1_s6_three"></span>
                    <span class="star c1_s6_two"></span>
                    <span class="star c1_s6_one"></span>
                </div> 
                <span id="c1_s6"></span>/5
                
            </span>
            </div>

          </div>                             
            </div>

            <div class="my-3 d-flex">

              <div class="col p-b-0 ratingBottom">
              <span class="text-data1 w-240px font-weight-bold">Criteria 1 overall rating -  </span>
                <span class=" tag ">
                <div class="rating">
                    <span class="star c1_five"></span>
                    <span class="star c1_four"></span>
                    <span class="star c1_three"></span>
                    <span class="star c1_two"></span>
                    <span class="star c1_one"></span>
                </div> 
                <span id="total_rating_c1"></span>/5
                
            </span>
              </div>

            </div>

        </div>
      
      </div>

      <div class="d-flex justify-content-end display-none">
      <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_one_s_six(); savebtn();" type="submit">Save</button>
      <button class="btn btn-primary btn-rounded min w-100px" onclick="c_one_s_six();" id="saveContinue6" type="submit">SAVE AND CONTINUE</button>
      
    
    </div>

 </div>

</div>
<!-------------------------- Standard 6 end ----------------->
     
  </div>






<div class="tab-pane fade <?= $selectedTab == 2 ? 'show active' : ''; ?>" id="nav-x2" role="tabpanel" aria-labelledby="nav-x2-tab">

<div class="row wrapouterIcons">
  <div class="col-3 colCenter">
      <a class="active <?=isset($bgc2s1)?$bgc2s1:''?>" id="qs-1" title="Personnel Policies" >
          <i class="i i-p-policies"></i>
      </a>
      <span class="min w-180px">Personnel <br> Policies </span>
  </div>
 <div class="col-3 colCenter">
      <a class="<?=isset($bgc2s2)?$bgc2s2:''?>" id="qs-2" title="Fundraising">
          <i class="i i-fundraising"></i>
      </a>
      <span class="min w-180px">Fundraising</span>
 </div>
  <div class="col-3 colCenter">
      <a class="<?=isset($bgc2s3)?$bgc2s3:''?>" id="qs-3" title="Fiscal/Financial Management">
          <i class="i i-financial-man"></i>
      </a>
      <span class="min w-180px">Fiscal/Financial <br> Management</span>
  </div>
  <div class="col-3 colCenter">
      <a class="<?=isset($bgc2s4)?$bgc2s4:''?>" id="qs-4"  title="Internal Controls">
          <i class="i i-internal-cntrl"></i>
      </a>
      <span class="min w-180px">Internal <br> Controls </span>
  </div>
  <div class="col-3 colCenter">
      <a class="<?=isset($bgc2s5)?$bgc2s5:''?>" id="qs-5" title="Fiscal Policies and Procedures">
          <i class="i i-fiscal-policies"></i>
      </a>
      <span class="min w-180px">Fiscal Policies <br>and Procedures </span>
  </div>
  <div class="col-3 colCenter">
      <a class="<?=isset($bgc2s6)?$bgc2s6:''?>" id="qs-6" title="Endowments">
          <i class="i i-endowments"></i>
      </a>
      <span class="min w-180px">Endowments</span>
  </div>
  <div class="col-3 colCenter">
      <a class="<?=isset($bgc2s7)?$bgc2s7:''?>" id="qs-7" title="Corporate Goals">
          <i class="i i-corporate-gol"></i>
      </a>
      <span class="min w-180px">Corporate <br> Goals </span>
  </div>
  <div class="col-3 colCenter">
      <a class="<?=isset($bgc2s8)?$bgc2s8:''?>" id="qs-8" title="Legal, Compliance  and Accountability">
          <i class="i i-legal-compliance"></i>
      </a>
      <span class="min w-180px">Legal, Compliance  and Accountability</span>
  </div>
</div>


  <!-- criteria 2 standard 1 -->

<div class="wrapouterContents" id="wpContent-x1">
                    
    <div class="criteria">


        <div  class="d-block">
        <div class="headOuter">
            <div class="head">
                <h3 class="ib-m">Criteria 2: Organizational Vitality </h3>
            </div>
        </div>

        <div class="criteriaBottom">
            <p>An effective Urban League affiliate has sufficient resources and assumes responsibility for managing them, in order to ensure the continuation and expansion of the Urban 
              League in the affiliate community. </p>
        </div></div>


        <div class="d-block">
          <div class="headOuter">
              <div class="head">
                  <h3>Personnel Policies</h3>
              </div>
          </div>

          <div class="criteriaBottom">
              <p>The affiliate’s relationship to its employees and volunteers is fundamental to its ability to achieve its mission.  Volunteers occupy a special place in the organization, serving 
                in governance, administrative and programmatic capacities.  An organization’s human resource policies should address both paid employees and volunteers, and should be 
                fair, establish clear expectations, and provide for meaningful and effective performance evaluation. </p>
          </div></div>


        <div class="d-block">
          <div class="headOuter">
              <div class="head">
                  <h3>Personnel Policies</h3>
              </div>
          </div>

          <div class="criteriaBottom">
            <h5>Standard 1</h5>

              <p>An affiliate should have written personnel policies and procedures, approved by the board of directors, governing the work and actions of all employees and volunteers of 
                the organization.  In addition to covering basic elements of the employment relationship  (working conditions, employee benefits, vacation and sick leave), the policies 
                should address employee evaluation, supervision, hiring and firing, grievance procedures, employee growth and development, confidentiality of employees, and client and 
                organization records information. </p>
                <h4>Indicators of Effectiveness</h4>


                <div id="accordion_c2_s1">
            <input type="hidden" id="criteriaTwoStandardOneId" value=" <?=isset($criteria_two_standard_one->cid)?$criteria_two_standard_one->cid:'' ?>">

              <?=isset($criteria_two_standard_one->question)?$criteria_two_standard_one->question:'' ?>
              <div class="my-3">

                <div class="p-b-0 ratingBottom">
                  <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
                  <span class=" tag ">
                <div class="rating">
                    <span class="star c2_s1_five"></span>
                    <span class="star c2_s1_four"></span>
                    <span class="star c2_s1_three"></span>
                    <span class="star c2_s1_two"></span>
                    <span class="star c2_s1_one"></span>
                </div> 
                <span id="c2_s1"></span>/5
                
             </span>
                </div>

                </div>
                </div>
                </div>
 
                </div>

               


          </div>
        </div>


        <div class="d-flex justify-content-end display-none">
      <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_two_s_one(); savebtn();" type="submit">Save</button>
      <button class="btn btn-primary btn-rounded min w-100px" onclick="c_two_s_one();" id="saveContinue-x1" type="submit">SAVE AND CONTINUE</button>

        </div>

   </div>
  </div>
  <!--end criteria 2 standard 1 -->


  <!--criteria 2 standard 2 -->

  <div class="wrapouterContents" id="wpContent-x2">
                    
    <div class="criteria">
             


      <div class="d-lock">

        <div class="headOuter">
            <div class="head">
                <h3 class="ib-m">Criteria 2: Organizational Vitality </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
            </div>
        </div>

        <div class="criteriaBottom">
            <p>An effective Urban League affiliate has sufficient resources and assumes responsibility for managing them, in order to ensure the continuation and expansion of the Urban 
              League in the affiliate community.</p>
        </div></div>

      <div class="d-lock">

        <div class="headOuter">
            <div class="head">
                <h3>Human Resources</h3>
            </div>
        </div>

        <div class="criteriaBottom">
            <p>The affiliate’s relationship to its employees and volunteers is fundamental to its ability to achieve its mission.  Volunteers occupy a special place in the organization, serving 
              in governance, administrative and programmatic capacities.  An organization’s human resource policies should address both paid employees and volunteers, and should be 
              fair, establish clear expectations, and provide for meaningful and effective performance evaluation.</p>
        </div></div>

      <div class="d-lock">

        <div class="headOuter">
            <div class="head">
                <h3>Fundraising</h3>
            </div>
        </div>

        <div class="criteriaBottom">

          <h5>Standard 2</h5>
            <p>Fundraising provides an important source of financial support for the work of the affiliate.  An affiliate’s fundraising program should be maintained on a foundation of 
              truthfulness and responsible stewardship.  Its fundraising policies should be consistent with its mission, compatible with its organizational capacity, and respectful of the 
              interests of donors and prospective donors. Fundraising costs should be reasonable over time.  Over a three (3) year period, an affiliate should realize revenue from 
              fundraising and other development activities that are at least three times the amount spent on conducting them.  Affiliates whose ratio is less that 3:1 should demonstrate 
              that they are making steady progress toward achieving this goal, or should be able to justify why a 3:1 ratio is not appropriate for this affiliate.</p>
        
              <h4>INDICATORS OF EFFECTIVENESS</h4>


              <div id="accordion_c2_s2">
              <input type="hidden" id="criteriaTwoStandardTwoId" value=" <?=isset($criteria_two_standard_two->cid)?$criteria_two_standard_two->cid:'' ?>">
            
            <?=isset($criteria_two_standard_two->question)?$criteria_two_standard_two->question:'' ?>
               
            <div class="my-3">

            <div class="p-b-0 ratingBottom">
              <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
              <span class=" tag ">
                <div class="rating">
                    <span class="star c2_s2_five"></span>
                    <span class="star c2_s2_four"></span>
                    <span class="star c2_s2_three"></span>
                    <span class="star c2_s2_two"></span>
                    <span class="star c2_s2_one"></span>
                </div> 
                <span id="c2_s2"></span>/5
              </span>
            </div>

            </div>
            </div>
            </div>
              </div>

            </div></div>


        <div class="d-flex justify-content-end display-none">
        <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_two_s_two(); savebtn();" type="submit">Save</button>
       <button class="btn btn-primary btn-rounded min w-100px" onclick="c_two_s_two();" id="saveContinue-x2" type="submit">SAVE AND CONTINUE</button>
        </div>

   </div>

  </div>

   <!--end criteria 2 standard 2 -->
   <!--criteria 2 standard 3 -->

   <div class="wrapouterContents" id="wpContent-x3">
                    
                    <div class="criteria">
                
                      <div class="d-block">
                
                        <div class="headOuter">
                            <div class="head">
                                <h3 class="ib-m">Criteria 2: Organizational Vitality </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
                            </div>
                        </div>
                
                        <div class="criteriaBottom">
                            <p>An effective Urban League affiliate has sufficient resources and assumes responsibility for managing them, in order to ensure the continuation and expansion of the Urban 
                              League in the affiliate community.</p>
                        </div></div>
                
                      <div class="d-block">
                
                        <div class="headOuter">
                            <div class="head">
                                <h3>Human Resources</h3>
                            </div>
                        </div>
                
                        <div class="criteriaBottom">
                            <p>The affiliate’s relationship to its employees and volunteers is fundamental to its ability to achieve its mission.  Volunteers occupy a special place in the organization, serving 
                              in governance, administrative and programmatic capacities.  An organization’s human resource policies should address both paid employees and volunteers, and should be 
                              fair, establish clear expectations, and provide for meaningful and effective performance evaluation.</p>
                        </div></div>
                
                      <div class="d-block">
                
                        <div class="headOuter">
                            <div class="head">
                                <h3>Fiscal/Financial Management</h3>
                            </div>
                        </div>
                
                        <div class="criteriaBottom">
                          <h5>Standard 3</h5>
                            <p>The affiliate operates in the context of a well-managed and effectively administered organization and are supported by a solid fiscal management system.</p>
                          <h4>INDICATORS OF EFFECTIVENESS</h4>
                
                
                          <div id="accordion_c2_s3">
              <input type="hidden" id="criteriaTwoStandardThreeId" value=" <?=isset($criteria_two_standard_three->cid)?$criteria_two_standard_three->cid:'' ?>">

                            <?=isset($criteria_two_standard_three->question)?$criteria_two_standard_three->question:'' ?>
                            
                            <div class="my-3">
      
                              <div class="p-b-0 ratingBottom">
                              <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
                              <span class=" tag ">
                               <div class="rating">
                                <span class="star c2_s3_five"></span>
                                <span class="star c2_s3_four"></span>
                                <span class="star c2_s3_three"></span>
                                <span class="star c2_s3_two"></span>
                                <span class="star c2_s3_one"></span>
                          </div> 
                          <span id="c2_s3"></span>/5
                        </span>
                              </div>
                  
                          </div>
                          </div>
                        </div>
                           
                          </div>
                          </div></div>
                
                        <div class="d-flex justify-content-end display-none">
                        <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_two_s_three(); savebtn();" type="submit">Save</button>
                        <button class="btn btn-primary btn-rounded min w-100px" onclick="c_two_s_three();" id="saveContinue-x3" type="submit">SAVE AND CONTINUE</button>
                         
                        </div>
                
                   </div>
                
   </div>




   <!--end criteria 2 standard 3 -->


   <!--criteria 2 standard 4 -->
   <div class="wrapouterContents" id="wpContent-x4">
                    
    <div class="criteria">

      <div class="d-block">

        <div class="headOuter">
            <div class="head">
            <h3 class="ib-m">Criteria 2: Organizational Vitality </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
            </div>
        </div>

        <div class="criteriaBottom">
            <p>An effective Urban League affiliate has sufficient resources and assumes responsibility for managing them, in order to ensure the continuation and expansion of the Urban 
              League in the affiliate community. </p>
        </div>
      </div>
      <div class="d-block">

        <div class="headOuter">
            <div class="head">
                <h3>Human Resources</h3>
            </div>
        </div>

        <div class="criteriaBottom">
            <p>The affiliate’s relationship to its employees and volunteers is fundamental to its ability to achieve its mission.  Volunteers occupy a special place in the organization, serving 
              in governance, administrative and programmatic capacities.  An organization’s human resource policies should address both paid employees and volunteers, and should be 
              fair, establish clear expectations, and provide for meaningful and effective performance evaluation. </p>
        </div>
      </div>

      <div class="d-block">

        <div class="headOuter">
            <div class="head">
                <h3>Internal Controls</h3>
            </div>
        </div>

        <div class="criteriaBottom">

          <h5>Standard 4</h5>
            <p>Internal controls is the process established by the affiliate’s board of directors, management and other personnel that is designed to provide reasonable assurance that the 
              affiliate will efficiently and effectively achieve its objectives, reliably report finances, and comply with applicable laws and regulations.
              </p>
              <h4>INDICATORS OF EFFECTIVENESS</h4>


              <div id="accordion_c2_s4">
             
              <input type="hidden" id="criteriaTwoStandardFourId" value=" <?=isset($criteria_two_standard_four->cid)?$criteria_two_standard_four->cid:'' ?>">
               
            <?=isset($criteria_two_standard_four->question)?$criteria_two_standard_four->question:'' ?>
            <div class="my-3">
  
                <div class="p-b-0 ratingBottom">
                  <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
                  <span class=" tag ">
                    <div class="rating">
                    <span class="star c2_s4_five"></span>
                    <span class="star c2_s4_four"></span>
                    <span class="star c2_s4_three"></span>
                    <span class="star c2_s4_two"></span>
                    <span class="star c2_s4_one"></span>
              </div> 
              <span id="c2_s4"></span>/5
              </span>
                </div>

</div>
</div>
</div>
              </div>


        </div>
      </div>

        <div class="d-flex justify-content-end display-none">
        <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_two_s_four(); savebtn();" type="submit">Save</button>
        <button class="btn btn-primary btn-rounded min w-100px" onclick="c_two_s_four();" id="saveContinue-x4" type="submit">SAVE AND CONTINUE</button>
                         
         
        </div>

   </div>

  </div>
   <!--end criteria 2 standard 4 -->



   <!--end criteria 2 standard 5 -->
  
   <div class="wrapouterContents" id="wpContent-x5">
                    
    <div class="criteria">
  
  
          <div class="d-block">
        <div class="headOuter">
            <div class="head">
                <h3 class="ib-m">Criteria 2: Organizational Vitality </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
            </div>
        </div>
  
        <div class="criteriaBottom">
            <p>An effective Urban League affiliate has sufficient resources and assumes responsibility for managing them, in order to ensure the continuation and expansion of the Urban 
              League in the affiliate community. </p>
        </div>
      </div>
  
          <div class="d-block">
        <div class="headOuter">
            <div class="head">
                <h3>Human Resources</h3>
            </div>
        </div>
  
        <div class="criteriaBottom">
            <p>The affiliate’s relationship to its employees and volunteers is fundamental to its ability to achieve its mission.  Volunteers occupy a special place in the organization, serving 
              in governance, administrative and programmatic capacities.  An organization’s human resource policies should address both paid employees and volunteers, and should be 
              fair, establish clear expectations, and provide for meaningful and effective performance evaluation.</p>
        </div>
      </div>
  
          <div class="d-block">
        <div class="headOuter">
            <div class="head">
                <h3>Internal Controls</h3>
            </div>
        </div>
  
        <div class="criteriaBottom">
          <h5>Standard 5</h5>
            <p>Financial policies and financial planning should be closely integrated into the affiliate’s daily activities to be able to assess the financial feasibility of the programs and 
              services provided</p>
              <h4>INDICATORS OF EFFECTIVENESS</h4>
  
  
              <div id="accordion_c2_s5">
              <input type="hidden" id="criteriaTwoStandardFiveId" value=" <?=isset($criteria_two_standard_five->cid)?$criteria_two_standard_five->cid:'' ?>">
          
                <?=isset($criteria_two_standard_five->question)?$criteria_two_standard_five->question:'' ?>
                
                <div class="my-3">
  
            <div class="p-b-0 ratingBottom">
              <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
              <span class=" tag ">
                    <div class="rating">
                    <span class="star c2_s5_five"></span>
                    <span class="star c2_s5_four"></span>
                    <span class="star c2_s5_three"></span>
                    <span class="star c2_s5_two"></span>
                    <span class="star c2_s5_one"></span>
              </div> 
              <span id="c2_s5"></span>/5
              </span>
            </div>

          </div>
          </div>


          </div>
      </div>
    
    
    </div></div>
  
        <div class="d-flex justify-content-end display-none">
         <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_two_s_five(); savebtn();" type="submit">Save</button>
        <button class="btn btn-primary btn-rounded min w-100px" onclick="c_two_s_five();" id="saveContinue-x5" type="submit">SAVE AND CONTINUE</button>
       
        </div>
  
   </div>
  
  </div>
   <!--end criteria 2 standard 5 -->



   <!--end criteria 2 standard 6-->
   <div class="wrapouterContents" id="wpContent-x6">
                    
    <div class="criteria">
  
      <div class="d-block">
  
        <div class="headOuter">
            <div class="head">
                <h3 class="ib-m">Criteria 2: Organizational Vitality </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
            </div>
        </div>
  
        <div class="criteriaBottom">
            <p>An effective Urban League affiliate has sufficient resources and assumes responsibility for managing them, in order to ensure the continuation and expansion of the Urban 
              League in the affiliate community.</p>
        </div>
  
      </div>
  
      <div class="d-block">
  
        <div class="headOuter">
            <div class="head">
                <h3>Human Resources</h3>
            </div>
        </div>
  
        <div class="criteriaBottom">
            <p>The affiliate’s relationship to its employees and volunteers is fundamental to its ability to achieve its mission.  Volunteers occupy a special place in the organization, serving 
              in governance, administrative and programmatic capacities.  An organization’s human resource policies should address both paid employees and volunteers, and should be 
              fair, establish clear expectations, and provide for meaningful and effective performance evaluation.</p>
        </div>
  
      </div>
        
        <div class="d-block">
          <div class="headOuter">
              <div class="head">
                  <h3>Endowments</h3>
              </div>
          </div>
  
          <div class="criteriaBottom">
            <h5>Standard 6</h5>
              <p>The affiliate board has made financial provisions to provide for the perpetuation of the Urban League within its service area.</p>
                <h4>INDICATORS OF EFFECTIVENESS</h4>
  
  
                <div id="accordion_c2_s6">
                <input type="hidden" id="criteriaTwoStandardSixId" value=" <?=isset($criteria_two_standard_six->cid)?$criteria_two_standard_six->cid:'' ?>">
              
  
              <?=isset($criteria_two_standard_six->question)?$criteria_two_standard_six->question:'' ?>
               
              <div class="my-3">
  
            <div class="p-b-0 ratingBottom">
              <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
              <span class=" tag ">
                    <div class="rating">
                    <span class="star c2_s6_five"></span>
                    <span class="star c2_s6_four"></span>
                    <span class="star c2_s6_three"></span>
                    <span class="star c2_s6_two"></span>
                    <span class="star c2_s6_one"></span>
              </div> 
              <span id="c2_s6"></span>/5
              </span>
            </div>
  
          </div>
        </div>
  
     
    </div>
        </div>
  
  
  
  </div></div>  
  
        <div class="d-flex justify-content-end display-none">

        <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_two_s_six(); savebtn();" type="submit">Save</button>
        <button class="btn btn-primary btn-rounded min w-100px" onclick="c_two_s_six();" id="saveContinue-x6" type="submit">SAVE AND CONTINUE</button>
         
        </div>
  
   </div>
  
  </div>
   <!--end criteria 2 standard 6 -->



   <!--end criteria 2 standard 7 -->

   <div class="wrapouterContents" id="wpContent-x7">
                    
    <div class="criteria">
  
  
        <div class="d-block">
        <div class="headOuter">
            <div class="head">
            <h3 class="ib-m">Criteria 2: Organizational Vitality </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                        <i class="i i-timer"></i>
                      </a>
            </div>
        </div>
  
        <div class="criteriaBottom">
            <p>An effective Urban League affiliate has sufficient resources and assumes responsibility for managing them, in order to ensure the continuation and expansion of the Urban 
              League in the affiliate community. </p>
        </div>
      </div>
  
        <div class="d-block">
        <div class="headOuter">
            <div class="head">
                <h3>Human Resources</h3>
            </div>
        </div>
  
        <div class="criteriaBottom">
            <p>The affiliate’s relationship to its employees and volunteers is fundamental to its ability to achieve its mission.  Volunteers occupy a special place in the organization, serving 
              in governance, administrative and programmatic capacities.  An organization’s human resource policies should address both paid employees and volunteers, and should be 
              fair, establish clear expectations, and provide for meaningful and effective performance evaluation.</p>
        </div>
      </div>
  
        <div class="d-block">
        <div class="headOuter">
            <div class="head">
                <h3>Corporate Goals</h3>
            </div>
        </div>
  
        <div class="criteriaBottom">
          <h5>Standard 7</h5>
            <p>The affiliate utilizes a planning system to maximize the effective and responsible development and use of resources.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>
  
  
            <div id="accordion_c2_s7">
            <input type="hidden" id="criteriaTwoStandardSevenId" value=" <?=isset($criteria_two_standard_seven->cid)?$criteria_two_standard_seven->cid:'' ?>">
              
              <?=isset($criteria_two_standard_seven->question)?$criteria_two_standard_seven->question:'' ?>
              <div class="my-3">
  
            <div class="p-b-0 ratingBottom">
              <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
              <span class=" tag ">
                    <div class="rating">
                    <span class="star c2_s7_five"></span>
                    <span class="star c2_s7_four"></span>
                    <span class="star c2_s7_three"></span>
                    <span class="star c2_s7_two"></span>
                    <span class="star c2_s7_one"></span>
                        </div> 
                        <span id="c2_s7"></span>/5
                        </span>
            </div>

          </div>
          </div>


</div>
            
     
    </div>
          </div>
      </div>
  
        <div class="d-flex justify-content-end display-none">
        <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_two_s_seven(); savebtn();" type="submit">Save</button>
        <button class="btn btn-primary btn-rounded min w-100px" onclick="c_two_s_seven();" id="saveContinue-x7" type="submit">SAVE AND CONTINUE</button>
         
        </div>
  
   </div>
  
  </div>

   <!--end criteria 2 standard 7 -->




   <!--end criteria 2 standard 8 -->
   <div class="wrapouterContents" id="wpContent-x8">
                    
    <div class="criteria">
  
      <div class="d-block">
  
        <div class="headOuter">
            <div class="head">
               
            <h3 class="ib-m">Criteria 2: Organizational Vitality </h3>
                <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                <i class="i i-timer"></i>
                </a>
            </div>
        </div>
  
        <div class="criteriaBottom">
            <p>An effective Urban League affiliate has sufficient resources and assumes responsibility for managing them, in order to ensure the continuation and expansion of the Urban 
              League in the affiliate community.</p>
        </div>
      </div>
  
  
      <div class="d-block">
  
        <div class="headOuter">
            <div class="head">
                <h3>Human Resources</h3>
            </div>
        </div>
  
        <div class="criteriaBottom">
            <p>The affiliate’s relationship to its employees and volunteers is fundamental to its ability to achieve its mission.  Volunteers occupy a special place in the organization, serving 
              in governance, administrative and programmatic capacities.  An organization’s human resource policies should address both paid employees and volunteers, and should be 
              fair, establish clear expectations, and provide for meaningful and effective performance evaluation.</p>
        </div>
      </div>
  
      <div class="d-block">
  
        <div class="headOuter">
            <div class="head">
                <h3>Legal, Compliance and Accountability</h3>
            </div>
        </div>
  
        <div class="criteriaBottom">
          <h5>Standard 8</h5>
            <p>Affiliates must be aware of and comply with all applicable federal, state and local laws.  This may include, but is not limited to, the following activities:  complying with laws 
              and regulations related to fundraising, licensing, financial accountability, document retention and destruction, human resources, lobbying and political advocacy, 
              and taxation.</p>
              <h4>INDICATORS OF EFFECTIVENESS</h4>
  
              <div id="accordion_c2_s8">
              
              <input type="hidden" id="criteriaTwoStandardEightId" value=" <?=isset($criteria_two_standard_eight->cid)?$criteria_two_standard_eight->cid:'' ?>">
  
                <?=isset($criteria_two_standard_eight->question)?$criteria_two_standard_eight->question:'' ?>
                <div class="contentDate my-3">
  
  <div class="col">
    <div class="f-medium m-x-15">
      <div class="p-b-0 ratingBottom">
        <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
        <span class=" tag ">
                    <div class="rating">
                    <span class="star c2_s8_five"></span>
                    <span class="star c2_s8_four"></span>
                    <span class="star c2_s8_three"></span>
                    <span class="star c2_s8_two"></span>
                    <span class="star c2_s8_one"></span>
                        </div> 
                        <span id="c2_s8"></span>/5
                        </span>
      </div>
    </div>
  </div>

  <div class="col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" class="border-red" id="c2_s8_8_3_rating_1" placeholder="4.4">
  </div>

</div>

<div class="my-3">

  <div class="p-l-25 ratingBottom">
    <span class="text-data1 w-240px font-weight-bold">Criteria 2 overall rating -  </span>
    <span class=" tag f-bold">
                <div class="rating">
                    <span class="star c2_five"></span>
                    <span class="star c2_four"></span>
                    <span class="star c2_three"></span>
                    <span class="star c2_two"></span>
                    <span class="star c2_one"></span>
                </div> 
                <span id="total_rating_c2"></span>/5
                
            </span>
  </div>

</div>
</div>


</div>
              
              </div>
  
        </div>
      </div>
  
        <div class="d-flex justify-content-end display-none">
          <a  class="btn btn-dark btn-rounded min w-100px mr-2"  onclick="c_two_s_eight();">SAVE</a>
        </div>
  
   </div>
  
  </div>
   <!--end criteria 2 standard 8 -->






  </div>




  <div class="tab-pane fade <?= $selectedTab == 3 ? 'show active' : ''; ?>" id="nav-x3" role="tabpanel" aria-labelledby="nav-x3-tab">

    <div class="row wrapouterIcons">
      <div class="col-3 colCenter">
          <a class="active <?=isset($bgc3s1)?$bgc3s1:''?>" id="dt-1" title="Operational Standards" >
              <i class="i i-operational-standards"></i>
          </a>
          <span class="min w-180px">Operational Standards </span>
      </div>
     <div class="col-3 colCenter">
          <a class="<?=isset($bgc3s2)?$bgc3s2:''?>" id="dt-2" title="Program Quality">
              <i class="i i-program-quality"></i>
          </a>
          <span class="min w-180px">Program Quality</span>
     </div>
      <div class="col-3 colCenter">
          <a class="<?=isset($bgc3s3)?$bgc3s3:''?>" id="dt-3" title="Program Quality">
              <i class="i i-program-quality"></i>
          </a>
          <span class="min w-180px">Program Quality</span>
      </div>
      <div class="col-3 colCenter">
          <a class="<?=isset($bgc3s4)?$bgc3s4:''?>" id="dt-4"  title="Operational Standards">
              <i class="i i-operational-standards"></i>
          </a>
          <span class="min w-180px">Operational Standards </span>
      </div>
      <div class="col-3 colCenter">
          <a class="<?=isset($bgc3s5)?$bgc3s5:''?>" id="dt-5" title="Operational Standards">
              <i class="i i-operational-standards"></i>
          </a>
          <span class="min w-180px">Operational Standards </span>
      </div>
      <div class="col-3 colCenter">
          <a class="<?=isset($bgc3s6)?$bgc3s6:''?>" id="dt-6" title="Operational Standards">
              <i class="i i-operational-standards"></i>
          </a>
          <span class="min w-180px">Operational Standards</span>
      </div>
      <div class="col-3 colCenter">
          <a class="<?=isset($bgc3s7)?$bgc3s7:''?>" id="dt-7" title="Operational Standards">
              <i class="i i-operational-standards"></i>
          </a>
          <span class="min w-180px">Operational Standards</span>
      </div>
      <div class="col-3 colCenter">
          <a class="<?=isset($bgc3s8)?$bgc3s8:''?>" id="dt-8" title="Program Quality">
              <i class="i i-program-quality"></i>
          </a>
          <span class="min w-180px">Program Quality</span>
      </div>
    </div>

<!-- criteria 3 standard 1 -->


<div class="wrapouterContents active" id="wpContent-dt-1">

  <div class="criteria">
       <div class="headOuter">
           <div class="head">
             
               <h3 class="ib-m">Criteria 3: Implementation of Mission  </h3>
           </div>
       </div>
       <div class="criteriaBottom">
           <p>An effective affiliate provides high-quality client-focused direct service programs which demonstrate improved client outcomes in key areas. </p>
       </div>
  </div>

  <div class="criteria">

       <div class="headOuter">
           <div class="head">
               <h3>Operational Standards </h3>
           </div>
       </div>

       <div class="criteriaBottom">
         <h5>Standard 1</h5>
         <p>The affiliate has and uses procedures for ensuring clients receive professional services that address their individual needs.</p>
         <h4>INDICATORS OF EFFECTIVENESS</h4>

         <div id="accordion_c3_s1">
         <input type="hidden" id="criteriaThreeStandardOneId" value=" <?=isset($criteria_three_standard_one->cid)?$criteria_three_standard_one->cid:'' ?>">

          <?=isset($criteria_three_standard_one->question)?$criteria_three_standard_one->question:'' ?>
   
         </div>

         <div class="my-3">

           <div class="p-b-0 ratingBottom">
             <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
             <span class=" tag ">
                    <div class="rating">
                    <span class="star c3_s1_five"></span>
                    <span class="star c3_s1_four"></span>
                    <span class="star c3_s1_three"></span>
                    <span class="star c3_s1_two"></span>
                    <span class="star c3_s1_one"></span>
                        </div> 
                        <span id="c3_s1"></span>/5
                        </span>
           </div>

         </div>

     </div>
      
       <div class="d-flex justify-content-end display-none">

       <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_three_s_one(); savebtn();" type="submit">Save</button>
       <button class="btn btn-primary btn-rounded min w-100px" onclick="c_three_s_one();" id="saveContinue-s1" type="submit">SAVE AND CONTINUE</button>
         
       </div>

   </div>

</div>

<!-- end criteria 3 standard 1 -->

<!-- criteria 3 standard 2 -->
<div class="wrapouterContents" id="wpContent-dt-2">
       
  <div class="criteria">

      <div class="headOuter">
          <div class="head">
          <h3 class="ib-m">Criteria 3: Implementation of Mission  </h3>
                <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                <i class="i i-timer"></i>
                </a>
          </div>
      </div>

      <div class="criteriaBottom">
          <p>An effective affiliate provides high-quality client-focused direct service programs which demonstrate improved client outcomes in key areas.  </p>
      </div>

 </div>

 <div class="criteria">

  <div class="headOuter">
      <div class="head">
          <h3>Program Quality </h3>
      </div>
  </div>

  <div class="criteriaBottom">
      <h5>Standard 2</h5>
      <p>The affiliate has procedures to protect the rights, dignity and privacy of clients participating in programs.</p>
      <h4>INDICATORS OF EFFECTIVENESS</h4>

      <div id="accordion_c3_s2">
      <input type="hidden" id="criteriaThreeStandardTwoId" value=" <?=isset($criteria_three_standard_two->cid)?$criteria_three_standard_two->cid:'' ?>">
     
          <?=isset($criteria_three_standard_two->question)?$criteria_three_standard_two->question:'' ?>
       
      </div>

      <div class="my-3">

        <div class="p-b-0 ratingBottom">
          <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
          <span class=" tag ">
                    <div class="rating">
                    <span class="star c3_s2_five"></span>
                    <span class="star c3_s2_four"></span>
                    <span class="star c3_s2_three"></span>
                    <span class="star c3_s2_two"></span>
                    <span class="star c3_s2_one"></span>
                        </div> 
            <span id="c3_s2"></span>/5
            </span>
        </div>

      </div>

  </div>

</div>

<div class="d-flex justify-content-end display-none">
<button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_three_s_two(); savebtn();" type="submit">Save</button>
<button class="btn btn-primary btn-rounded min w-100px" onclick="c_three_s_two();" id="saveContinue-s2" type="submit">SAVE AND CONTINUE</button>
       
</div>

</div>
<!-- end criteria 3 standard 2 -->

<!---- criteria 3 standard 3 -->

<div class="wrapouterContents" id="wpContent-dt-3">
       
  <div class="criteria">

      <div class="headOuter">
          <div class="head">
          <h3 class="ib-m">Criteria 3: Implementation of Mission  </h3>
                <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                <i class="i i-timer"></i>
                </a>
          </div>
      </div>

      <div class="criteriaBottom">
          <p>An effective affiliate provides high-quality client-focused direct service programs which demonstrate improved client outcomes in key areas. </p>
      </div>

 </div>

 <div class="criteria">

  <div class="headOuter">
      <div class="head">
          <h3>Program Quality </h3>
      </div>
  </div>

  <div class="criteriaBottom">
      <h5>Standard 3</h5>
      <p>The affiliate has in place a record keeping system that supports client services, program evaluation and protects client confidentiality and privacy.</p>
      <h4>INDICATORS OF EFFECTIVENESS</h4>

      <div id="accordion_c3_s3">
      <input type="hidden" id="criteriaThreeStandardThreeId" value=" <?=isset($criteria_three_standard_three->cid)?$criteria_three_standard_three->cid:'' ?>">

          <?=isset($criteria_three_standard_three->question)?$criteria_three_standard_three->question:'' ?>
    
      </div>

      <div class="my-3 d-flex justify-content-start">

        <div class="p-b-0 ratingBottom">
          <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
          <span class=" tag ">
                    <div class="rating">
                    <span class="star c3_s3_five"></span>
                    <span class="star c3_s3_four"></span>
                    <span class="star c3_s3_three"></span>
                    <span class="star c3_s3_two"></span>
                    <span class="star c3_s3_one"></span>
                        </div> 
            <span id="c3_s3"></span>/5
            </span>
        </div>
      </div>
  </div>

</div>


 <div class="d-flex justify-content-end display-none">
 <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_three_s_three(); savebtn();" type="submit">Save</button>
<button class="btn btn-primary btn-rounded min w-100px" onclick="c_three_s_three();" id="saveContinue-s3" type="submit">SAVE AND CONTINUE</button>
  
</div>

</div>
<!-- end criteria 3 standard 3 -->


<!-- criteria 3 standard 4 -->

<div class="wrapouterContents" id="wpContent-dt-4">
       
  <div class="criteria">

    <div class="headOuter">
        <div class="head">
        <h3 class="ib-m">Criteria 3: Implementation of Mission  </h3>
                <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                <i class="i i-timer"></i>
                </a>
        </div>
    </div>

    <div class="criteriaBottom">
        <p>An effective affiliate provides high-quality client-focused direct service programs which demonstrate improved client outcomes in key areas.  </p>
    </div>

  </div>

<div class="criteria">

<div class="headOuter">
    <div class="head">
        <h3>Operational Standards</h3>
    </div>
</div>

<div class="criteriaBottom">
    <h5>Standard 4</h5>
    <p>The affiliate recruits, hires and trains qualified program staff for quality direct? services.</p>
    <h4>INDICATORS OF EFFECTIVENESS</h4>

    <div id="accordion_c3_s4">
    <input type="hidden" id="criteriaThreeStandardFourId" value=" <?=isset($criteria_three_standard_four->cid)?$criteria_three_standard_four->cid:'' ?>">

      <?=isset($criteria_three_standard_four->question)?$criteria_three_standard_four->question:'' ?>
     
    </div>

    <div class="my-3 d-flex">

      <div class="p-b-0 ratingBottom">
        <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
        <span class=" tag ">
                    <div class="rating">
                    <span class="star c3_s4_five"></span>
                    <span class="star c3_s4_four"></span>
                    <span class="star c3_s4_three"></span>
                    <span class="star c3_s4_two"></span>
                    <span class="star c3_s4_one"></span>
                        </div> 
            <span id="c3_s4"></span>/5
            </span>
      </div>

    </div>

</div>

</div>


<div class="d-flex justify-content-end display-none">

<button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_three_s_four(); savebtn();" type="submit">Save</button>
<button class="btn btn-primary btn-rounded min w-100px" onclick="c_three_s_four();" id="saveContinue-s4" type="submit">SAVE AND CONTINUE</button>
</div>

</div>
<!-- end criteria 3 standard 4 -->



<!-- criteria 3 standard 5 -->
<div class="wrapouterContents" id="wpContent-dt-5">
       
  <div class="criteria">

      <div class="headOuter">
          <div class="head">
          <h3 class="ib-m">Criteria 3: Implementation of Mission  </h3>
                <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                <i class="i i-timer"></i>
                </a>
          </div>
      </div>

      <div class="criteriaBottom">
          <p>An effective affiliate provides high-quality client-focused direct service programs which demonstrate improved client outcomes in key areas.   </p>
      </div>

      <div class="criteria">

        <div class="headOuter">
            <div class="head">
                <h3>Operational Standards</h3>
            </div>
        </div>

        <div class="criteriaBottom">
            <h5>Standard 5</h5>
            <p>Program facilities are safe, appropriate for activities, clean and conducive to 	reaching service goals.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>

            <div id="accordion_c3_s5">
    <input type="hidden" id="criteriaThreeStandardFiveId" value=" <?=isset($criteria_three_standard_five->cid)?$criteria_three_standard_five->cid:'' ?>">
           
        <?=isset($criteria_three_standard_five->question)?$criteria_three_standard_five->question:'' ?>
             
            </div>

            <div class="my-3 d-flex">

              <div class="p-b-0 ratingBottom">
                <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
                <span class=" tag ">
                    <div class="rating">
                    <span class="star c3_s5_five"></span>
                    <span class="star c3_s5_four"></span>
                    <span class="star c3_s5_three"></span>
                    <span class="star c3_s5_two"></span>
                    <span class="star c3_s5_one"></span>
                        </div> 
            <span id="c3_s5"></span>/5
            </span>
              </div>

            </div>

        </div>
      
      </div>

      <div class="d-flex justify-content-end display-none">
      <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_three_s_five(); savebtn();" type="submit">Save</button>
      <button class="btn btn-primary btn-rounded min w-100px" onclick="c_three_s_five();" id="saveContinue-s5" type="submit">SAVE AND CONTINUE</button>
      </div>

 </div>

</div>
<!-- end criteria 3 standard 5 -->



<!--  criteria 3 standard 6-->
<div class="wrapouterContents" id="wpContent-dt-6">
       
  <div class="criteria">

      <div class="headOuter">
          <div class="head">
          <h3 class="ib-m">Criteria 3: Implementation of Mission  </h3>
                <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                <i class="i i-timer"></i>
                </a>
          </div>
      </div>

      <div class="criteriaBottom">
          <p>An effective affiliate provides high-quality client-focused direct service programs which demonstrate improved client outcomes in key areas. </p>
      </div>

      <div class="criteria">

        <div class="headOuter">
            <div class="head">
                <h3>Operational Standards</h3>
            </div>
        </div>

        <div class="criteriaBottom">
            <h5>Standard 6</h5>
            <p>Program effectiveness is assessed on an ongoing manner and an action plan for continuous improvement is developed.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>

            <div id="accordion_c3_s6">
    <input type="hidden" id="criteriaThreeStandardSixId" value=" <?=isset($criteria_three_standard_six->cid)?$criteria_three_standard_six->cid:'' ?>">

            <?=isset($criteria_three_standard_six->question)?$criteria_three_standard_six->question:'' ?>                          
            </div>

            <div class="col p-b-0 ratingBottom">
             <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
             <span class=" tag ">
                    <div class="rating">
                    <span class="star c3_s6_five"></span>
                    <span class="star c3_s6_four"></span>
                    <span class="star c3_s6_three"></span>
                    <span class="star c3_s6_two"></span>
                    <span class="star c3_s6_one"></span>
                        </div> 
            <span id="c3_s6"></span>/5
            </span>
           </div>

        </div>
      
      </div>

      <div class="d-flex justify-content-end display-none">
      <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_three_s_six(); savebtn();" type="submit">Save</button>
      <button class="btn btn-primary btn-rounded min w-100px" onclick="c_three_s_six();" id="saveContinue-s6" type="submit">SAVE AND CONTINUE</button>

      </div>

 </div>

</div>
<!-- end criteria 3 standard 6 -->

<!-- criteria 3 standard 7 -->
<div class="wrapouterContents" id="wpContent-dt-7">
       
  <div class="criteria">

      <div class="headOuter">
          <div class="head">
          <h3 class="ib-m">Criteria 3: Implementation of Mission  </h3>
                <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                <i class="i i-timer"></i>
                </a>
          </div>
      </div>
      <div class="criteriaBottom">
          <p>An effective affiliate provides high-quality client-focused direct service programs which demonstrate improved client outcomes in key areas.   </p>
      </div>
      <div class="criteria">

        <div class="headOuter">
            <div class="head">
                <h3>Operational Standards </h3>
            </div>
        </div>

        <div class="criteriaBottom">
            <h5>Standard 7</h5>
            <p>Program effectiveness is assessed on an ongoing manner and an action plan for continuous improvement is developed.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>

            <div id="accordion_c3_s7">
              <input type="hidden" id="criteriaThreeStandardSevenId" value=" <?=isset($criteria_three_standard_seven->cid)?$criteria_three_standard_seven->cid:'' ?>">

             <?=isset($criteria_three_standard_seven->question)?$criteria_three_standard_seven->question:'' ?>
                                         
            </div>

            <div class="my-3 d-flex">

              <div class="col p-b-0 ratingBottom">
                <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
                <span class=" tag ">
                    <div class="rating">
                    <span class="star c3_s7_five"></span>
                    <span class="star c3_s7_four"></span>
                    <span class="star c3_s7_three"></span>
                    <span class="star c3_s7_two"></span>
                    <span class="star c3_s7_one"></span>
                        </div> 
            <span id="c3_s7"></span>/5
            </span>
              </div>

            </div>

        </div>
      
      </div>

      <div class="d-flex justify-content-end display-none">
      <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_three_s_seven(); savebtn();" type="submit">Save</button>
      <button class="btn btn-primary btn-rounded min w-100px" onclick="c_three_s_seven();" id="saveContinue-s7" type="submit">SAVE AND CONTINUE</button>

      </div>

 </div>

 </div>
<!-- end criteria 3 standard 7 -->

<!-- criteria 3 standard 8 -->
<div class="wrapouterContents" id="wpContent-dt-8">
       
  <div class="criteria">

      <div class="headOuter">
          <div class="head">
          <h3 class="ib-m">Criteria 3: Implementation of Mission  </h3>
                <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>">
                <i class="i i-timer"></i>
                </a>
          </div>
      </div>

      <div class="criteriaBottom">
          <p>An effective affiliate provides high-quality client-focused direct service programs which demonstrate improved client outcomes in key areas.  </p>
      </div>

      <div class="criteria">

        <div class="headOuter">
            <div class="head">
                <h3>Program Quality </h3>
            </div>
        </div>

        <div class="criteriaBottom">
            <h5>Standard 8</h5>
            <p>The affiliate program has and implements an evaluation plan for describing client outcomes and assessing program effectiveness.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>

            <div id="accordion_c3_s8">
            <input type="hidden" id="criteriaThreeStandardEightId" value=" <?=isset($criteria_three_standard_eight->cid)?$criteria_three_standard_eight->cid:'' ?>">

         <?=isset($criteria_three_standard_eight->question)?$criteria_three_standard_eight->question:'' ?>
         <div class="col p-b-0 ratingBottom">
      <span class="text-data1 w-240px font-weight-bold">Calculation -  </span>
      <span class=" tag ">
                    <div class="rating">
                    <span class="star c3_s8_five"></span>
                    <span class="star c3_s8_four"></span>
                    <span class="star c3_s8_three"></span>
                    <span class="star c3_s8_two"></span>
                    <span class="star c3_s8_one"></span>
                        </div> 
            <span id="c3_s8"></span>/5
            </span>
    </div>
  
  </div>                       
            </div>

            <div class="my-3 d-flex">

              <div class="col p-b-0 ratingBottom">
                <span class="text-data1 w-240px font-weight-bold">Criteria 3 overall rating -  </span>
                <span class=" tag f-bold">
                <div class="rating">
                    <span class="star c3_five"></span>
                    <span class="star c3_four"></span>
                    <span class="star c3_three"></span>
                    <span class="star c3_two"></span>
                    <span class="star c3_one"></span>
                </div> 
                <span id="total_rating_c3"></span>/5
                
            </span>
              </div>

            </div>

        </div>
      
      </div>

      <div class="d-flex justify-content-end display-none">
      <!-- <button class="btn btn-dark btn-rounded min w-100px mr-2" onclick="c_three_s_eight();" type="submit">Save</button> -->
      <button class="btn btn-primary btn-rounded min w-100px" onclick="c_three_s_eight();" id="saveContinue-s8" type="submit">SAVE</button>

      </div>

 </div>

</div>
<!-- end criteria 3 standard 8 -->



  </div>



        

           

        </div>

      </div>
    </div>
  </main>
<?php 
}else{
  $url = base_url('module/assessment/assessment-listing');
  header('Location: ' . $url."?error_:_invaild_assessemnt_id_and_affiliate_id");
}
?>