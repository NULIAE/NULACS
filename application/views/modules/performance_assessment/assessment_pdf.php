
<?php
if(isset($_GET['sid']) && isset($_GET['aid']) && !empty($_GET['sid']) && !empty($_GET['aid']) ){ ?>

    <!-- <button onclick="javascript:demoFromHTML();">PDF</button> -->
    <div id="customers">
    

  <main class="performanceAssess">
    <div class="container">
      <div class="Wrapper">
        <div class="row justify-content-end date">
          <div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m">Tuesday October 06,
              2020</span></div>
        </div>
        <div class=" document-mdata">

          <div class="mnHead">
            <h3>AFFILIATE Performance Assessment -   <?=isset($affiliate_details[0]['city'])?$affiliate_details[0]['city']:''?>, <?=isset($affiliate_details[0]['stateabbreviation'])?$affiliate_details[0]['stateabbreviation']:''?></h3>
          </div>
        </div>
        <div class="mainTab2">
        
           <div class="tab-content" id="nav-tabContent">
              <input type="hidden" value="<?=isset($_GET['sid'])?$_GET['sid']:''?>" id="self_assessment_id">
              <input type="hidden" value="<?=isset($_GET['aid'])?$_GET['aid']:''?>" id="affiliate_id">

   <div class="tab-pane fade show active" id="nav-x1" role="tabpanel" aria-labelledby="nav-x1-tab">

            <!-- criteria 1 standard 1 -->
         
              <div class="wrapouterContents active" id="wpContent1">
          
                 <div class="criteria">
                      <div class="headOuter">
                          <div class="head">
                          <h3 class="ib-m">Criteria 1: Organizational Soundness </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid']); ?>">
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
                              <h3>Administration and Governance  </h3>
                          </div>
                      </div>
          
                      <div class="criteriaBottom">
                        <h5>Standard 1</h5>
                        <p>Affiliates should prepare, and make available annually to the public, information about the affiliate`s mission, program activities, and basic audited financial data. The report 
                          should also identify the names of the affiliate`s board of directors and management staff.</p>
                        <h4>INDICATORS OF EFFECTIVENESS</h4>
          
                        <div id="accordion">

                       
                          <input type="hidden" id="criteriaOneStandardOneId" value=" <?=isset($criteria_one_standard_one->cid)?$criteria_one_standard_one->cid:'' ?>">
<div class="card">

    <div class="card-header" id="headingOne">
    
     <div class="settingWrap">
     <div class="addToggleclass">
    
     <h5 class="mb-0">1.1 Does the Affiliate`s Bylaws include all of the following items?</h5>
     <a class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne" aria-expanded="flase" aria-controls="collapseOne">
     <i class="i i i-chat-line"></i>
     </a>
    
     </div>
     </div>
    
    </div>
    
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
     <div class="card-body">
    
     <div class="msgBoxtoggle">
     <div class="col-lg-24 col-md-20 form-group">
     <input type="text" class="form-control" id="c1_s1_1_1_comment_1" value=""
     name="c1_s1_1_comment_1" placeholder="comment">
     </div>
     </div>
    
     </div>
    </div>
    
    <ul class="Listitems">
    
     <li>
     <span>A minimum requirement of at least 5 Board members?</span>
    
     <div>
     <label class="checkbox switch bool c1_s1_1_1_checkbox_1" for="c1_s1_1_1_checkbox_1">
     <input type="checkbox" id="c1_s1_1_1_checkbox_1" name="c1_s1_1_checkbox_1">
     </label>
     </div>
    
     </li> 
    
     <li>
     <span>Requirement of a quorum to transact business?</span>
    
     <div>
     <label class="checkbox switch bool c1_s1_1_1_checkbox_2" for="c1_s1_1_1_checkbox_2">
     <input type="checkbox" id="c1_s1_1_1_checkbox_2" name="c1_s1_1_1_checkbox_2">
     </label>
     </div>
    
     </li> 
    
     <li>
     <span>How and when notices for Board meetings are decided?</span>
    
     <div>
     <label class="checkbox switch bool c1_s1_1_1_checkbox_3" for="c1_s1_1_1_checkbox_3">
     <input type="checkbox" id="c1_s1_1_1_checkbox_3" name="c1_s1_1_1_checkbox_3">
     </label>
     </div>
    
     </li> 
    
     <li>
     <span>How members are elected/appointed to the Board?</span>
    
     <div>
     <label class="checkbox switch bool c1_s1_1_1_checkbox_4" for="c1_s1_1_1_checkbox_4">
     <input type="checkbox" id="c1_s1_1_1_checkbox_4" name="c1_s1_1_1_checkbox_4">
     </label>
     </div>
    
     </li> 
    
     <li>
     <span>What the terms of office are for Board members?</span>
    
     <div>
     <label class="checkbox switch bool c1_s1_1_1_checkbox_5" for="c1_s1_1_1_checkbox_5">
     <input type="checkbox" id="c1_s1_1_1_checkbox_5" name="c1_s1_1_1_checkbox_5">
     </label>
     </div>
    
     </li> 
    
     <li>
     <span>How Board members can be removed from the Board?</span>
    
     <div>
     <label class="checkbox switch bool c1_s1_1_1_checkbox_6" for="c1_s1_1_1_checkbox_6">
     <input type="checkbox" id="c1_s1_1_1_checkbox_6" name="c1_s1_1_1_checkbox_6">
     </label>
     </div>
    
     </li> 
    
     <li>
     <span>How urgent matters will be handled in between board meetings?</span>
    
     <div>
     <label class="checkbox switch bool c1_s1_1_1_checkbox_7" for="c1_s1_1_1_checkbox_7">
     <input type="checkbox" id="c1_s1_1_1_checkbox_7" name="c1_s1_1_1_checkbox_7">
     </label>
     </div>
    
     </li> 
     
    </ul>
    
    <div class="settingWrap2">
    
     <div class="addToggleclass2">
     <h5 class="mb-0 mr-2">Verification Source or Comment(s): Attach a copy of the affiliate`s current bylaws; indicate page numbers for the following:</h5>
     <a onclick="c1s1_1_href();" id="c1s1_1_href"> <i class="i i-upld-icn"></i></a>
     </div>
     
    </div>
    
    <ul class="Listitems">
    
     <li>
     <span>Term limits for board members</span>
    
     <div>
     Page - <input type="text" id="c1_s1_1_1_val_1" placeholder="00">
     </div>
    
     </li> 
    
     <li>
     <span>Attendance for board members</span>
    
     <div>
     <div>
     Page - <input type="text" id="c1_s1_1_1_val_2" placeholder="00">
     </div>
     </div>
    
     </li> 
    
     <li>
     <span>Participation for board members</span>
    
     <div>
     <div>
     Page - <input type="text" id="c1_s1_1_1_val_3" placeholder="00">
     </div>
     </div>
    
     </li> 
    
     <li>
     <span>Consequences for noncompliance with board policies</span>
    
     <div>
     <div>
     Page - <input type="text" id="c1_s1_1_1_val_4" placeholder="00">
     </div>
     </div>
    
     </li> 
    
    </ul>
    
    <div class="col d-flex justify-content-end align-items-center">
     <div class="rating-1">Rating</div>
     <input type="text" onblur="checkrating(this)" placeholder="" class="border-red" id="c1_s1_1_1_rating_1"  >
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingTwo">
     
     <div class="settingWrap">
     <div class="addToggleclass">
    
     <h5 class="mb-0">1.2 Does the board review the affiliate`s bylaws at least every three years, revise as necessary and file with the National Urban League? </h5>
     <a class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
     <i class="i i i-chat-line"></i>
     </a>
    
     </div>
     </div>
    
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
     <div class="card-body">
    
     <div class="msgBoxtoggle">
     <div class="col-lg-24 col-md-20 form-group">
     <input type="text" class="form-control" id="c1_s1_1_2_comment_1" placeholder="comment">
     </div>
     </div>
     
     </div>
    </div>
    
    <div class="contentDate my-3">
    
     <label class="checkbox switch bool c1_s1_1_2_checkbox_1" for="c1_s1_1_2_checkbox_1">
     <input type="checkbox" id="c1_s1_1_2_checkbox_1" name="pa-2">
     </label>
    
    </div>
    
    <div class="contentDate">
     <div class="col-16 d-flex align-items-center">
    
     <span>Verification Source or Comment(s): Review Date: </span>
     <div class="yearPick mr-2" >
     <i class="i i-year-pick"></i>
     <input class="datepick form-control" id="c1_s1_1_2_date_1" placeholder="2019" type="text">
     </div>
     <span>Approved</span>
     <div class="yearPick mr-2" >
     <i class="i i-year-pick"></i>
     <input class="datepick form-control" placeholder="2019" id="c1_s1_1_2_date_2" type="text">
     </div>
    
     </div>
     <div class="col col-5 d-flex justify-content-end align-items-center">
     <div class="rating-1">Rating</div>
     <input type="text" onblur="checkrating(this)" placeholder="" class="border-red" id="c1_s1_1_2_rating_1">
     </div>
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingThree-t1">
     
     <div class="settingWrap">
     <div class="addToggleclass">
    
     <h5 class="mb-0">1.3 The affiliate`s bylaws are adhered to in the conduct of the affiliate`s corporate business, and is consistent with the Articles of 
     Incorporation, National Urban League policies, standards, and guidelines, as well as federal, state, and local laws </h5>
     <a class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseThree-t1" aria-expanded="false" aria-controls="collapseThree-t1">
     <i class="i i i-chat-line"></i>
     </a>
    
     </div>
     </div>
    
    </div>
    <div id="collapseThree-t1" class="collapse" aria-labelledby="headingThree-t1" data-parent="#accordion">
     <div class="card-body">
    
     <div class="msgBoxtoggle">
     <div class="col-lg-24 col-md-20 form-group">
     <input type="text" class="form-control" id="c1_s1_1_3_comment_1" placeholder="comment">
     </div>
     </div>
    
     </div>
    </div>
    
    <div class="contentDate">
     <div class="col-16 d-flex align-items-center">
     <label class="checkbox switch bool c1_s1_1_3_checkbox_1" for="c1_s1_1_3_checkbox_1">
     <input type="checkbox" id="c1_s1_1_3_checkbox_1" name="paa-2">
     </label>
     </div>
     <div class="col col-5 d-flex justify-content-end align-items-center">
     <div class="rating-1">Rating</div>
     <input type="text" onblur="checkrating(this)" placeholder="" class="border-red" id="c1_s1_1_3_rating_1" >
     </div>
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingFour">
     
     <div class="settingWrap">
     <div class="addToggleclass">
    
     <h5 class="mb-0">1.4 The bylaws reflect board rotation and term limits policies, board orientation/development, job descriptions and committee structure </h5>
     <a class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
     <i class="i i i-chat-line"></i>
     </a>
    
     </div>
     </div>
    
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
     <div class="card-body">
    
     <div class="msgBoxtoggle">
     <div class="col-lg-24 col-md-20 form-group">
     <input type="text" class="form-control" id="c1_s1_1_4_comment_1" placeholder="comment">
     </div>
     </div>
    
     </div>
    </div>
    
    <div class="contentDate">
     <div class="col-16 d-flex align-items-center">
     <label class="checkbox switch bool c1_s1_1_4_checkbox_1" for="c1_s1_1_4_checkbox_1">
     <input type="checkbox" id="c1_s1_1_4_checkbox_1" name="c1_s1_1_4_checkbox_1">
     </label>
     </div>
     <div class="col col-5 d-flex justify-content-end align-items-center">
     <div class="rating-1">Rating</div>
     <input type="text" onblur="checkrating(this)" placeholder="" class="border-red" id="c1_s1_1_4_rating_1">
     </div>
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingFive">
     
     <div class="settingWrap">
     <div class="addToggleclass">
    
     <h5 class="mb-0">1.5 The Articles of Incorporation are consistent with current state, federal, and local laws, and are reviewed at the same time as the affiliate 
     bylaws are updated. </h5>
     <a class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
     <i class="i i i-chat-line"></i>
     </a>
    
     </div>
     </div>
    
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
     <div class="card-body">
    
     <div class="msgBoxtoggle">
     <div class="col-lg-24 col-md-20 form-group">
     <input type="text" class="form-control" id="c1_s1_1_5_comment_1" placeholder="comment">
     </div>
     </div>
     
     </div>
    </div>
    
    <div class="contentDate">
     <div class="col-16 d-flex align-items-center">
     <label class="checkbox switch bool c1_s1_1_5_checkbox_1" for="c1_s1_1_5_checkbox_1">
     <input type="checkbox" id="c1_s1_1_5_checkbox_1" name="pa-222">
     </label>
     </div>
    </div>
    
    <div class="contentDate">
     <div class="col-16 d-flex align-items-center">
    
     <span>Verification Source or Comment(s): Current Affiliate Articles of Incorporation; Date of Board Review: </span>
     <div class="yearPick mr-2" >
     <i class="i i-year-pick"></i>
     <input class="datepick form-control" id="c1_s1_1_5_date_1" placeholder="2019" type="text">
     </div>
     </div>
     <div class="col col-5 d-flex justify-content-end align-items-center">
     <div class="rating-1">Rating</div>
     <input type="text" onblur="checkrating(this)" placeholder="" class="border-red" id="c1_s1_1_5_rating_1">
     </div>
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingSix">
     
     <div class="settingWrap">
     <div class="addToggleclass">
    
     <h5 class="mb-0">1.6 The corporate minutes, reports, and other legal records are filed, signed and maintained as required by federal, state, and local statutes/
     regulations, and uploaded to the Affiliated Data Management (ADM) as required by National Urban League guidelines, and by parliamentary 
     authority. </h5>
     <a class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
     <i class="i i i-chat-line"></i>
     </a>
    
     </div>
     </div>
    
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
     <div class="card-body">
    
     <div class="msgBoxtoggle">
     <div class="col-lg-24 col-md-20 form-group">
     <input type="text" class="form-control" id="c1_s1_1_6_comment_1" placeholder="comment">
     </div>
     </div>
    
     </div>
    </div>
    
    <div class="contentDate">
     <div class="col-16 d-flex align-items-center">
     <label class="checkbox switch bool c1_s1_1_6_checkbox_1" for="c1_s1_1_6_checkbox_1">
     <input type="checkbox" id="c1_s1_1_6_checkbox_1" name="aau-2">
     </label>
     </div>
    </div>
    
    <div class="contentDate">
     <div class="col-20 d-flex align-items-center">
     <span>Verification Source or Comment(s): Affiliate Current Bylaws and Articles of Incorporation; Urban League guidelines; federal, state, and 
     local guidelines; date(s) on which articles of incorporation have been reviewed by legal counsel, board minutes, and annual meeting minutes</span>
     </div>
     <div class="col col-3 d-flex justify-content-end align-items-center">
     <div class="rating-1">Rating</div>
     <input type="text" onblur="checkrating(this)" placeholder="" class="border-red" id="c1_s1_1_6_rating_1" >
     </div>
     </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingSeven">
     
     <div class="settingWrap">
     <div class="addToggleclass">
    
     <h5 class="mb-0">1.7 The affiliate uses an evaluation tool to evaluate the work of the board, individually and collectively. </h5>
     <a class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
     <i class="i i i-chat-line"></i>
     </a>
    
     </div>
     </div>
    
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
     <div class="card-body">
    
     <div class="msgBoxtoggle">
     <div class="col-lg-24 col-md-20 form-group">
     <input type="text" class="form-control" id="c1_s1_1_7_comment_1" placeholder="comment">
     </div>
     </div>
     
     </div>
    </div>
    
    <div class="contentDate">
     <div class="col-16 d-flex align-items-center">
     <label class="checkbox switch bool c1_s1_1_7_checkbox_1" for="c1_s1_1_7_checkbox_1">
     <input type="checkbox" id="c1_s1_1_7_checkbox_1" name="c1_s1_1_7_checkbox_1">
     </label>
     </div>
    </div>
    
    <div class="contentDate">
     <div class="d-flex align-items-center">
     <span>Verification Source or Comment(s): Describe in writing the process the board uses to evaluate its own performance. Please provide any 
     Questionnaires, forms, surveys, which may illustrate your board evaluation procedure. When did the board last evaluate its own performance? </span>
     </div>
    </div>
    
    <div class="contentDate">
     <div class="col-16 d-flex align-items-center">
     <div class="yearPick mr-2" >
     <i class="i i-year-pick"></i>
     <input class="datepick form-control" id="c1_s1_1_7_date_1" placeholder="2019" type="text">
     </div>
     </div>
     <div class="col col-5 d-flex justify-content-end align-items-center">
     <div class="rating-1">Rating</div>
     <input type="text" onblur="checkrating(this)" placeholder="" class="border-red"id="c1_s1_1_7_rating_1" >
     </div>
    </div>
    
    </div> 
                         <!-- </?=isset($criteria_one_standard_one->question)?$criteria_one_standard_one->question:'' ?> -->
  
                        
                        </div>
          
                     
          
                    </div>
                     
                    
          
                  </div>
          
              </div>
           
            <!-- end criteria 1 standard 1 -->
             
            <!-- criteria 1 standard 2 -->


          <div class="wrapouterContents" id="wpContent2">
        

    <div class="criteriaBottom">
        <h5>Standard 2</h5>
        <p>Affiliates should prepare, and make available annually to the public, information about the affiliate`s mission, program activities, and basic audited financial data. The report 
          should also identify the names of the affiliate`s board of directors and management staff.</p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>

        <div id="accordion_c1_s2">
        <input type="hidden" id="criteriaOneStandardTwoId" value=" <?=isset($criteria_one_standard_two->cid)?$criteria_one_standard_two->cid:'' ?>">

          <!-- </?=isset($criteria_one_standard_two->question)?$criteria_one_standard_two->question:'' ?> -->
          <div class="card">
    <div class="card-header" id="heading111">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">2.1 Attach a copy of the most recent annual report made available to the public. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse111" aria-expanded="false" aria-controls="collapse111">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div id="collapse111" class="collapse" aria-labelledby="heading111" data-parent="#accordion_c1_s2">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s2_2_1_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <div class="col-3">
        <a onclick="c1s2_1_href();" id="c1s2_1_href"> <i class="i i-upld-icn"></i></a>

    </div>
   
    <div class="col col-5 d-flex justify-content-end align-items-center">
        <div class="rating-1">Rating - <span id="c1_s2_2_1_rating_1"></span></div>
    </div>
   
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="heading222">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">2.2 Describe in writing, the procedure the affiliate has in place for allowing members of the general public to provide input to the affiliate. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse222" aria-expanded="true" aria-controls="collapse222">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapse222" class="collapse" aria-labelledby="heading222" data-parent="#accordion_c1_s2">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s2_2_2_comment_1" placeholder="comment">
    </div>
    </div>
  
    </div>
    </div>
    <div class="contentDate my-3">
   
        <div class="col-3">
            <!-- <a onclick="c1s2_1_href();" id="c1s2_1_href"> <i class="i i-upld-icn"></i></a> -->
    
        </div>
       
        <div class="col col-5 d-flex justify-content-end align-items-center">
        <div class="rating-1">Rating - <span id="c1_s2_2_2_rating_1"></span></div>
        
        </div>
       
        </div>
    </div>
        </div>

        <div class="my-3">

     

        </div>

    </div>
  
  </div>



</div>

 <!--end criteria 1 standard 2 -->

 <!-- criteria 1 standard 3 -->
 <div class="wrapouterContents" id="wpContent3">
    
    
       <div class="criteria">
    
       
    
        <div class="criteriaBottom">
            <h5>Standard 3</h5>
            <p>The affiliate`s Board of Directors nominating/development committees annually assesses the board`s needs, recruits qualified individuals within the affiliate`s community for 
              election by the membership body.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>
    
            <div id="accordion_c1_s3">
        <input type="hidden" id="criteriaOneStandardThreeId" value=" <?=isset($criteria_one_standard_three->cid)?$criteria_one_standard_three->cid:'' ?>">
             
    
          <!-- </?=isset($criteria_one_standard_three->question)?$criteria_one_standard_three->question:'' ?> -->
          <div class="card">
    <div class="card-header" id="headingOnes">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.1 Does the affiliate`s Board of Directors recruit, select and employ the President/CEO and provide clearly written
    expectations and qualifications for the position?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOnes" aria-expanded="false" aria-controls="collapseOnes">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOnes" class="collapse" aria-labelledby="headingOnes" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_1_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_1_checkbox_1" for="c1_s3_3_1_checkbox_1">
    <input type="checkbox" id="c1_s3_3_1_checkbox_1" name="c1_s3_3_1_checkbox_1">
    </label>
   
    </div>
   
    <div class="col contentDate d-flex align-items-center">
   
    <div class="col-24 d-flex align-items-center">
    <span>Verification Source or Comment(s): (1) Indicate date (year) current CEO was hired </span>
    <div class="yearPick mr-2" >
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" placeholder="2019" id="c1_s3_3_1_date_1" type="text">
    </div>
    <span> Date of Last Performance Review</span>
    <div class="yearPick mr-2" >
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" placeholder="2019" id="c1_s3_3_1_date_2" type="text">
    </div>
    </div>
   
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_1_rating_1">
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="headingTwoss">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.2 Does the membership of the board include expertise that would promote the proper operation of the affiliate and further the goals of its program?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTwoss" aria-expanded="false" aria-controls="collapseTwoss">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseTwoss" class="collapse" aria-labelledby="headingTwoss" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_2_comment_1" placeholder="comment">
    </div>
    </div>
    
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_2_checkbox_1" for="c1_s3_3_2_checkbox_1">
    <input type="checkbox" id="c1_s3_3_2_checkbox_1" name="c1_s3_3_2_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate By-Laws, </span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_2_val_1" placeholder="00">
    </div>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" id="c1_s3_3_2_rating_1" class="border-red" >
    </div>
   
    </div>
   
    <div class="settingWrap2">
    
    <div class="addToggleclass2">
    <h5 class="mb-0 mr-2">
    Verification Source or Comment(s): Attach a list of current board members with the following information for each member: name, principal 
    employer, occupation, special skills, and the date each board member`s term expires. Clearly mark the board officers and any employees who 
    serve on the board
    </h5>
    <a onclick="c1s3_2_href();" id="c1s3_2_href"> <i class="i i-upld-icn"></i></a>

    </div>
    
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="headingTwos">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.3 Does the board have a mandatory attendance policy?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTwos" aria-expanded="false" aria-controls="collapseTwos">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseTwos" class="collapse" aria-labelledby="headingTwos" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_3_comment_1" placeholder="comment">
    </div>
    </div>
    
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_3_checkbox_1" for="c1_s3_3_3_checkbox_1">
    <input type="checkbox" id="c1_s3_3_3_checkbox_1" name="c1_s3_3_3_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate By-Laws, </span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_3_val_1" placeholder="00">
    </div>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_3_rating_1">
    </div>
   
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="headingThrees">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.4 Is the Board of Director`s representative of the ethnic and cultural diversity of the community?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseThrees" aria-expanded="false" aria-controls="collapseThrees">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseThrees" class="collapse" aria-labelledby="headingThrees" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_4_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_4_checkbox_1" for="c1_s3_3_4_checkbox_1">
    <input type="checkbox" id="c1_s3_3_4_checkbox_1" name="c1_s3_3_4_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate By-Laws, </span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_4_val_1" placeholder="00">
    </div>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_4_rating_1">
    </div>
   
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="headingFours">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.5 If the affiliate has any related party transactions with board members, or between board members and members of their family, 
    are these disclosed to the Board of Directors, and to the affiliate`s independent auditor? Is there a written record of the disclosure?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFours" aria-expanded="false" aria-controls="collapseFours">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseFours" class="collapse" aria-labelledby="headingFours" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_5_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_5_check_1" for="c1_s3_3_5_check_1">
    <input type="checkbox" id="c1_s3_3_5_check_1" name="c1_s3_3_5_check_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Conflict of Interest/Code of Conduct Signed Statements </span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_5_val_1" placeholder="00">
    </div>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_5_rating_1">
    </div>
   
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="headingFives">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.6 Does the organization acknowledge and disclose to the board and auditor any pending or threatened lawsuits, claims, or 
    assessments which may have an impact on the organization`s finances and/or operating effectiveness? Is this listed in the minutes?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFives" aria-expanded="false" aria-controls="collapseFives">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseFives" class="collapse" aria-labelledby="headingFives" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_6_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_6_checkbox_1" for="c1_s3_3_6_checkbox_1">
    <input type="checkbox" id="c1_s3_3_6_checkbox_1" name="c1_s3_3_6_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate board minutes</span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_6_val_1" placeholder="00">
    </div>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_6_rating_1">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingSixs">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.7 Has the Board of Directors adopted a clear, meaningful written mission statement which reflects the affiliate`s purpose, values and people served?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSixs" aria-expanded="false" aria-controls="collapseSixs">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseSixs" class="collapse" aria-labelledby="headingSixs" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_7_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_7_checkbox_1" for="c1_s3_3_7_checkbox_1">
    <input type="checkbox" id="c1_s3_3_7_checkbox_1" name="c1_s3_3_7_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate Mission Statement; By-Laws,</span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_7_val_1" placeholder="00">
    </div>
    </div>
   
    <div class="d-flex align-items-center">
    <span> and Articles of Incorporation,</span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_7_val_2" placeholder="00">
    </div>
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_7_rating_1">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingSevens">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.8 Do the affiliate`s board and staff review the mission statement at least once every three years?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSevens" aria-expanded="false" aria-controls="collapseSevens">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseSevens" class="collapse" aria-labelledby="headingSevens" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_8_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_8_checkbox_1" for="c1_s3_3_8_checkbox_1">
    <input type="checkbox" id="c1_s3_3_8_checkbox_1" name="c1_s3_3_8_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate board minutes, </span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_8_val_1" placeholder="00">
    </div>
    </div>
   
    <div class="d-flex align-items-center">
    <span> date of last review,</span>
    
    <div class="yearPick mr-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c1_s3_3_8_date_1" placeholder="2019" type="text">
    </div>
   
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_8_rating_1" >
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingEights">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.9 Are the affiliate`s programs and services congruent with the affiliate`s mission and strategic plan?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseEights" aria-expanded="false" aria-controls="collapseEights">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseEights" class="collapse" aria-labelledby="headingEights" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_9_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_9_checkbox_1" for="c1_s3_3_9_checkbox_1">
    <input type="checkbox" id="c1_s3_3_9_checkbox_1" name="c1_s3_3_9_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): List of Programs to include funder, funding amount, contractual period</span>
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_9_rating_1">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingNines">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.10 If the affiliate entered into a `fiscal agent` or `host organization` relationship with another organization, does the affiliate have a 
    written agreement on file which defines the terms of the relationship with the other organization?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseNines" aria-expanded="false" aria-controls="collapseNines">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseNines" class="collapse" aria-labelledby="headingNines" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_10_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="d-flex align-items-center my-3">
   
    <div class="col-3 textIn2">
    <label class="checkbox switch bool c1_s3_3_10_checkbox_1" for="c1_s3_3_10_checkbox_1">
    <input type="checkbox" id="c1_s3_3_10_checkbox_1" name="c1_s3_3_10_checkbox_1">
    </label>
    </div>
   
    <div class="col-3 textIn2">
    N/A <input type="text" id="c1_s3_3_10_val_1">
    </div>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Copy of written agreement and board minutes that approved the relationship</span>
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_10_rating_1">
    </div>
   
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="headingTens">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.11 Based on your By-Laws, how many times should the Affiliate Board meet per year? How many times did your board meet?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTens" aria-expanded="false" aria-controls="collapseTens">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseTens" class="collapse" aria-labelledby="headingTens" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_11_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="d-flex align-items-center my-3">
   
    <div class="col-3 textIn2">
    # <input type="text" id="c1_s3_3_11_val_1">
    </div>
   
    <div class="col-3 textIn2">
    # <input type="text" id="c1_s3_3_11_val_2">
    </div>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate Board Meeting Minutes with Names of Persons in Attendance, By-Laws </span>
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_11_rating_1">
    </div>
   
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="headingElevens">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.12 Based on your By-Laws, what constitutes a quorum? How many board meetings did not have a quorum during the previous year?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseElevens" aria-expanded="false" aria-controls="collapseElevens">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseElevens" class="collapse" aria-labelledby="headingElevens" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_12_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="d-flex align-items-center my-3">
   
    <div class="col-3 textIn2">
    # <input type="text" id="c1_s3_3_12_val_1">
    </div>
   
    <div class="col-4 d-flex align-items-center">
    <span class="mr-2">Date</span> <div class="yearPick mr-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c1_s3_3_12_date_1" placeholder="2019" type="text">
    </div>
    </div>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate board minutes </span>
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_12_rating_1">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="heading12">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.13 Does the affiliate have a policy where all contracts entered in to by the Affiliate are presented to the Board for review/approval? </h5>
    <button class="btn btn-link nul-btn-acc collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_13_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="d-flex align-items-center my-3">
   
    <div class="col-3 textIn2">
    <label class="checkbox switch bool c1_s3_3_13_checkbox_1" for="c1_s3_3_13_checkbox_1">
    <input type="checkbox" id="c1_s3_3_13_checkbox_1" name="c1_s3_3_13_checkbox_1">
    </label>
    </div>
   
    <div class="col-3 textIn2">
    N/A <input type="text" id="c1_s3_3_13_val_1">
    </div>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate board minutes,</span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_13_val_2" placeholder="00">
    </div>
    </div>
   
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_13_rating_1">
    </div>
   
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="heading13">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.14 Does the Affiliate provide written agendas, as well as materials relating to significant decisions made in advance of board meetings? </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_14_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="d-flex align-items-center my-3">
   
    <div class="col-3 textIn2">
    <label class="checkbox switch bool c1_s3_3_14_checkbox_1" for="c1_s3_3_14_checkbox_1">
    <input type="checkbox" id="c1_s3_3_14_checkbox_1" name="c1_s3_3_14_checkbox_1">
    </label>
    </div>
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate board agendas indicating date and page of board minutes reflecting the following:
    </span>
    </div>
    </div>
    </div>
   
    <div class="row">
        <div class="col-md-24">
          
           <table class="table table-borderless innTBL">
           <thead>
           <tr>
           <th scope="col">Year</th>
           <th scope="col">Date Budget</th>
           <th scope="col">Date Audit</th>
           <th scope="col">Date 990</th>
           </tr>
           </thead>
           <tbody>
            <tr>
            <td><input id="c1_s3_3_14_val_1" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_2" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_3" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_4" type="text" class="form-control"></td>
            </tr>
            <tr>
            <td><input id="c1_s3_3_14_val_5" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_6" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_7" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_8" type="text" class="form-control"></td>
            </tr>
            <tr>
            <td><input id="c1_s3_3_14_val_9" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_10" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_11" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_12" type="text" class="form-control"></td>
            </tr>
            <tr>
            <td><input id="c1_s3_3_14_val_13" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_14" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_15" type="text" class="form-control"></td>
            <td><input id="c1_s3_3_14_val_16" type="text" class="form-control"></td>
            </tr>
            </tbody>
           </table>
          
           </div>
           </div>
   
    <ul class="Listitems">
   
    <li>
    <span class="d-flex align-items-center">Board`s resolution indicating that the affiliate will perform a Performance Assessment
    <div class="yearPick mr-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c1_s3_3_14_date_1" placeholder="2019" type="text">
    </div>
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_14_val_17" placeholder="00">
    </div>
    </span>
    </li> 
   
    <li>
    <span class="d-flex align-items-center">Board`s most recent evaluation of the President/CEO
    <div class="yearPick mr-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c1_s3_3_14_date_2" placeholder="2019" type="text">
    </div>
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_14_val_18" placeholder="00">
    </div>
    </span>
    </li> 
   
    <li>
    <span class="d-flex align-items-center">Board`s most recent approval of the President/CEO`s salary
    <div class="yearPick mr-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c1_s3_3_14_date_3" placeholder="2019" type="text">
    </div>
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_14_val_19" placeholder="00">
    </div>
    </span>
    </li> 
   
    <li>
    <span class="d-flex align-items-center">Who is responsible for the board minutes?
    <div class="yearPick mr-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c1_s3_3_14_date_4" placeholder="2019" type="text">
    </div>
    <div class="textIn">
    Page - <input type="text" id="c1_s3_3_14_date_5" placeholder="00">
    </div>
    </span>
    </li> 
   
    <li>
    <span>Where are the board minutes kept?</span>
   
    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_14_rating_1">
    </div>
   
    </li> 
   
    </ul>
   
    </div>
    <div class="card">
    <div class="card-header" id="heading14">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.15 Do family members serve on the Board?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_15_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_15_checkbox_1" for="c1_s3_3_15_checkbox_1">
    <input type="checkbox" id="c1_s3_3_15_checkbox_1" name="c1_s3_3_15_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): If yes, please explain </span>
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c1_s3_3_15_rating_1">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="heading15">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.16 What is the affiliate`s policy to prevent a conflict of interest?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#accordion_c1_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s3_3_16_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s3_3_16_checkbox_1" for="c1_s3_3_16_checkbox_1">
    <input type="checkbox" id="c1_s3_3_16_checkbox_1" name="c1_s3_3_16_checkbox_1">
    </label>
   
    </div>
    <div class="settingWrap2">
    
    <div class="addToggleclass2">
    <h5 class="mb-0 mr-2">Verification Source or Comment(s): Attach a copy of the affiliate`s conflict of interest policy which covers board, staff and volunteers that 
    identifies conduct or transactions that raise concerns; outline procedures for disclosure of actual and potential conflicts and provides for 
    transactions reviewed by uninvolved members of the board.</h5>
    <a onclick="c1s3_16_href();" id="c1s3_16_href"> <i class="i i-upld-icn"></i></a>

    </div>
    <div class="my-3 d-flex justify-content-between">
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" id="c1_s3_3_16_rating_1" class="border-red">
    </div>
    
    </div>
    </div>
    </div>a
            </div>
            <div class="my-3">
       

</div>
        </div>
      
      </div>
    

    
    </div>


  <!--end criteria 1 standard 3 -->



  <!-- criteria 1 standard 4 -->


  <div class="wrapouterContents" id="wpContent4">
        
        <div class="criteria">
    
          <div class="headOuter">
              <div class="head">
                  <h3 class="ib-m">Criteria 1: Organizational Soundness </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid']); ?>">
                        <i class="i i-timer"></i>
                      </a>
              </div>
          </div>
    
          
    
        </div>
    
     <div class="criteria">
    
   
    
      <div class="criteriaBottom">
          <h5>Standard 4</h5>
          <p>The affiliate fulfills its corporate obligations as required by local, state, and federal government and the National Urban League.</p>
          <h4>INDICATORS OF EFFECTIVENESS</h4>
    
          <div id="accordion_c1_s4">
        <input type="hidden" id="criteriaOneStandardFourId" value=" <?=isset($criteria_one_standard_four->cid)?$criteria_one_standard_four->cid:'' ?>">

            <!-- </?=isset($criteria_one_standard_four->question)?$criteria_one_standard_four->question:'' ?> -->
            <div class="card">
    <div class="card-header" id="headingO">

    <div class="settingWrap">
    <div class="addToggleclass">

    <h5 class="mb-0">4.1 Does the affiliate have these current manuals in place: Personnel Manual, Accounting Manual, Policies and Procedures Manual, 
    Volunteer Manual and Affiliate Resource Manual?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseO" aria-expanded="false" aria-controls="collapseO">
    <i class="i i i-chat-line"></i>
    </button>

    </div>
    </div>

    </div>

    <div id="collapseO" class="collapse" aria-labelledby="headingO" data-parent="#accordion_c1_s4">
    <div class="card-body">

    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s4_4_1_comment_1" placeholder="comment">
    </div>
    </div>

    </div>
    </div>

    <div class="contentDate my-3">

    <label class="checkbox switch bool c1_s4_4_1_checkbox_1" for="c1_s4_4_1_checkbox_1">
    <input type="checkbox" id="c1_s4_4_1_checkbox_1" name="c1_s4_4_1_checkbox_1">
    </label>

    </div>

    <div class="col contentDate d-flex align-items-center">

    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Affiliate Policies and Procedures manual; accounting manual; affiliate resource manual; volunteer 
    manual; personnel manual </span>
    </div>

    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c1_s4_4_1_rating_1">
    </div>

    </div>

    </div>
    <div class="card">
    <div class="card-header" id="headingTwo-2">
    
    <div class="settingWrap">
    <div class="addToggleclass">

    <h5 class="mb-0">4.2 Have all board members, volunteers and staff been made aware of the availability of the manuals? (See 4.1).</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTwo-2" aria-expanded="false" aria-controls="collapseTwo-2">
    <i class="i i i-chat-line"></i>
    </button>

    </div>
    </div>

    </div>
    <div id="collapseTwo-2" class="collapse" aria-labelledby="headingTwo-2" data-parent="#accordion_c1_s4">
    <div class="card-body">

    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s4_4_2_comment_1" placeholder="comment">
    </div>
    </div>

    </div>
    </div>

    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="contentDate my-3">

    <label class="checkbox switch bool c1_s4_4_2_checkbox_1" for="c1_s4_4_2_checkbox_1">
    <input type="checkbox" id="c1_s4_4_2_checkbox_1" name="c1_s4_4_2_checkbox_1">
    </label>

    </div>

    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c1_s4_4_2_rating_1">
    </div>

    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingThree-t2">

    <div class="settingWrap">
    <div class="addToggleclass">

    <h5 class="mb-0">4.3 Is the personnel manual regularly reviewed and updated to (1) describe recruitment, hiring, termination and standard work rules for all staff 
    and (2) maintain compliance with changing government regulations including FLSA, EEOC, ADA, OSHA, FMLA and Affirmative Action Plan?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseThree-t2" aria-expanded="false" aria-controls="collapseThree-t2">
    <i class="i i i-chat-line"></i>
    </button>

    </div>
    </div>

    </div>

    <div id="collapseThree-t2" class="collapse" aria-labelledby="headingThree-t2" data-parent="#accordion_c1_s4">
    <div class="card-body">

    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s4_4_3_comment_1" placeholder="comment">
    </div>
    </div>

    </div>
    </div>

    <div class="contentDate my-3">

    <label class="checkbox switch bool c1_s4_4_3_checkbox_1" for="c1_s4_4_3_checkbox_1">
    <input type="checkbox" id="c1_s4_4_3_checkbox_1" name="c1_s4_4_3_checkbox_1">
    </label>

    </div>

    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Copy of ADM Printout </span>
    </div>

    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c1_s4_4_3_rating_1">
    </div>

    </div>

    </div>
    <div class="card">
    <div class="card-header" id="headingFour-f1">

    <div class="settingWrap">
    <div class="addToggleclass">

    <h5 class="mb-0">4.4 The affiliate monitors legislative and regulatory actions that affect its corporate rights and responsibilities and takes appropriate action.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFour-f1" aria-expanded="false" aria-controls="collapseFour-f1">
    <i class="i i i-chat-line"></i>
    </button>

    </div>
    </div>

    </div>

    <div id="collapseFour-f1" class="collapse" aria-labelledby="headingFour-f1" data-parent="#accordion_c1_s4">
    <div class="card-body">

    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s4_4_4_comment_1" placeholder="comment">
    </div>
    </div>

    </div>
    </div>
    <div class="contentDate my-3">

    <label class="checkbox switch bool c1_s4_4_4_checkbox_1" for="c1_s4_4_4_checkbox_1">
    <input type="checkbox" id="c1_s4_4_4_checkbox_1" name="c1_s4_4_4_checkbox_1">
    </label>

    </div>

    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Board minutes; President/CEO`s reports Orientation and Training Agendas. </span>
    </div>

    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c1_s4_4_4_rating_1">
    </div>

    </div>

    </div>
    <div class="card">
    <div class="card-header" id="headingFive-f1">
    
    <div class="settingWrap">
    <div class="addToggleclass">

    <h5 class="mb-0">4.5 The board of directors retains (either pro bono or fee-based) the services of independent legal counsel, who is available on an ongoing 
    basis, but who does not hold elective or appointed office in the affiliate.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFive-f1" aria-expanded="false" aria-controls="collapseFive-f1">
    <i class="i i i-chat-line"></i>
    </button>

    </div>
    </div>

    </div>
    <div id="collapseFive-f1" class="collapse" aria-labelledby="headingFive-f1" data-parent="#accordion_c1_s4">
    <div class="card-body">

    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s4_4_5_comment_1" placeholder="comment">
    </div>
    </div>

    </div>
    </div>

    <div class="contentDate my-3">

    <label class="checkbox switch bool c1_s4_4_5_checkbox_1" for="c1_s4_4_5_checkbox_1">
    <input type="checkbox" id="c1_s4_4_5_checkbox_1" name="c1_s4_4_5_checkbox_1">
    </label>

    </div>

    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Copy of letter or written agreement for legal services; board minutes,</span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s4_4_5_val_1" placeholder="00">
    </div>
    </div>

    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c1_s4_4_5_rating_1">
    </div>

    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingSix-f11">
    
    <div class="settingWrap">
    <div class="addToggleclass">

    <h5 class="mb-0">4.6 Negotiating and entering into contracts in the name of, or on behalf of, the Urban League are conducted by individuals designated by the
    affiliate`s board of directors and identified in the policies and procedures manual established by the affiliate board of directors or bylaws.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSix-f11" aria-expanded="false" aria-controls="collapseSix-f11">
    <i class="i i i-chat-line"></i>
    </button>

    </div>
    </div>

    </div>
    <div id="collapseSix-f11" class="collapse" aria-labelledby="headingSix-f11" data-parent="#accordion_c1_s4">
    <div class="card-body">

    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s4_4_6_comment_1" placeholder="comment">
    </div>
    </div>

    </div>
    </div>

    <div class="contentDate my-3">

    <label class="checkbox switch bool c1_s4_4_6_checkbox_1" for="c1_s4_4_6_checkbox_1">
    <input type="checkbox" id="c1_s4_4_6_checkbox_1" name="c1_s4_4_6_checkbox_1">
    </label>

    </div>

    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Bylaws,</span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s4_4_6_val_1" placeholder="00">
    </div>
    </div>

    <div class="d-flex align-items-center">
    <span> ; board minutes,</span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s4_4_6_val_2" placeholder="00">
    </div>
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c1_s4_4_6_rating_1">
    </div>

    </div>
    
    </div>
          
           
          </div>
    
          <div class="my-3 d-flex">
    
         
    
          </div>
    
      </div>
    
    </div>
    

    
      </div>




  <!--end criteria 1 standard 4 -->


  <!-------------------------- Standard 5 ----------------->
<div class="wrapouterContents" id="wpContent5">
        
  <div class="criteria">

      <div class="headOuter">
          <div class="head">
              <h3 class="ib-m">Criteria 1: Organizational Soundness </h3>
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid']); ?>">
                        <i class="i i-timer"></i>
                      </a>
          </div>
      </div>

     

      <div class="criteria">


        <div class="criteriaBottom">
            <h5>Standard 5</h5>
            <p>The Board and Management should always have a plan for the affiliate`s ongoing operation with the stated goals and objectives to effectively accomplish the mission.  
              The affiliate should have a current strategic plan in effect periodically measuring its progress against goals and objectives and revising the plan as needed.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>

            <div id="accordion_c1_s5">
            <input type="hidden" id="criteriaOneStandardFiveId" value=" <?=isset($criteria_one_standard_five->cid)?$criteria_one_standard_five->cid:'' ?>">

              <!-- </?=isset($criteria_one_standard_five->question)?$criteria_one_standard_five->question:'' ?> -->
              <div class="card">
    <div class="card-header" id="headingOn">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.1 Does the affiliate have a clearly defined Strategic Plan with timelines for achieving affiliate goals and objectives?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOn" aria-expanded="false" aria-controls="collapseOn">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOn" class="collapse" aria-labelledby="headingOn" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_1_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_1_checkbox_1" for="c1_s5_5_1_checkbox_1">
    <input type="checkbox" id="c1_s5_5_1_checkbox_1" name="c1_s5_5_1_checkbox_1">
    </label>
   
    </div>
   
    <div class="col contentDate d-flex align-items-center">
   
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Current strategic plan: Dated</span>
    <div class="yearPick mr-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c1_s5_5_1_date_1" placeholder="2019" type="text">
    </div>
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c1_s5_5_1_rating_1">
    </div>
   
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="headingTwo-22">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.2 Did the affiliate involve board members, staff, service recipients, volunteers, key constituents and general members of the community to 
    participate in the strategic planning process?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTwo-22" aria-expanded="false" aria-controls="collapseTwo-22">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseTwo-22" class="collapse" aria-labelledby="headingTwo-22" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_2_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_2_checkbox_1" for="c1_s5_5_2_checkbox_1">
    <input type="checkbox" id="c1_s5_5_2_checkbox_1" name="c1_s5_5_2_checkbox_1">
    </label>
   
    </div>
    
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): List of participants in Strategic Planning by Title. </span>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)"  id="c1_s5_5_2_rating_1" class="border-red">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingThree">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.3 Does the affiliate`s strategic plan identify changing community needs as well as the affiliate`s strengths, weaknesses, opportunities and threats?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_3_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_3_checkbox_1" for="c1_s5_5_3_checkbox_1">
    <input type="checkbox" id="c1_s5_5_3_checkbox_1" name="c1_s5_5_3_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Strategic Plan, </span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s5_5_3_checkbox_1" placeholder="00">
    </div>
    <span>; Needs Assessment</span>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)"  class="border-red" id="c1_s5_5_3_rating_1">
    </div>
   
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="headingFour-f2">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.4 Does the strategic plan address the critical issues facing the Affiliate?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFour-f2" aria-expanded="false" aria-controls="collapseFour-f2">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseFour-f2" class="collapse" aria-labelledby="headingFour-f2" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_4_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_4_checkbox_1" for="c1_s5_5_4_checkbox_1">
    <input type="checkbox" id="c1_s5_5_4_checkbox_1" name="c1_s5_5_4_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Critical Issues,</span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s5_5_4_val_1" placeholder="00">
    </div>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)"  id="c1_s5_5_4_rating_1" class="border-red">
    </div>
   
    </div>
   
    </div>
    <div class="card">
    <div class="card-header" id="headingFive-f2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.5 Was the plan developed by researching the internal and external environment?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFive-f2" aria-expanded="false" aria-controls="collapseFive-f2">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseFive-f2" class="collapse" aria-labelledby="headingFive-f2" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_5_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_5_checkbox_1" for="c1_s5_5_5_checkbox_1">
    <input type="checkbox" id="c1_s5_5_5_checkbox_1" name="c1_s5_5_5_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Affiliate/community needs assessment /report,</span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s5_5_5_val_1" placeholder="00">
    </div>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c1_s5_5_5_rating_1">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingSix-f12">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.6 Does the strategic plan set goals and measurable objectives that address the critical issues facing the community/affiliate?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSix-f12" aria-expanded="false" aria-controls="collapseSix-f12">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseSix-f12" class="collapse" aria-labelledby="headingSix-f12" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_6_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_6_checkbox_1" for="c1_s5_5_6_checkbox_1">
    <input type="checkbox" id="c1_s5_5_6_checkbox_1" name="c1_s5_5_6_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Goals and Objectives, </span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s5_5_6_val_1" placeholder="00">
    </div>
    </div>
   
    <div class="d-flex align-items-center">
    <span> ; Needs Assessment</span>
    
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)"  id="c1_s5_5_6_rating_1" class="border-red">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingSeven-se1">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.7 Does the strategic plan integrate all of the affiliate`s programs and services around a focused mission?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSeven-se1" aria-expanded="false" aria-controls="collapseSeven-se1">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseSeven-se1" class="collapse" aria-labelledby="headingSeven-se1" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_7_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_7_checkbox_1" for="pk-7">
    <input type="checkbox" id="c1_s5_5_7_checkbox_1" name="c1_s5_5_7_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Mission Statement, </span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s5_5_7_val_1" placeholder="00">
    </div>
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)"  class="border-red" id="c1_s5_5_7_rating_1">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingEight">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.8 Does the Strategic Plan prioritize the affiliate`s goals and include timelines for the accomplishment of the goals?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_8_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_8_checkbox_1" for="c1_s5_5_8_checkbox_1">
    <input type="checkbox" id="c1_s5_5_8_checkbox_1" name="c1_s5_5_8_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Timelines, </span>
    
    <div class="textIn">
    Page - <input type="text" placeholder="00" id="c1_s5_5_8_val_1">
    </div>
   
    <span>; Mission Statement; List of Programs</span>
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)"  class="border-red" id="c1_s5_5_8_rating_1">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingNine">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.9 Is the affiliate`s Strategic Plan communicated to all the affiliate`s stakeholders, including board members, staff, volunteers, service 
    recipients and the general community?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_9_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_9_checkbox_1" for="c1_s5_5_9_checkbox_1">
    <input type="checkbox" id="c1_s5_5_9_checkbox_1" name="c1_s5_5_9_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Describe, in writing, how this is accomplished </span>
    
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)"  class="border-red" id="c1_s5_5_9_rating_1">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="headingTen">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.10 Does the affiliate`s strategic plan establish an evaluation process with performance indicators to measure the Affiliate`s progress 
    toward achievement of goals and objectives?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_10_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_10_checkbox_1" for="c1_s5_5_10_checkbox_1">
    <input type="checkbox" id="c1_s5_5_10_checkbox_1" name="c1_s5_5_10_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Evaluation/performance indicators, </span>
    
    <div class="textIn">
    Page - <input type="text" id="c1_s5_5_10_val_1" placeholder="00">
    </div>
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)"  class="border-red" id="c1_s5_5_10_rating_1">
    </div>
   
    </div>
    
    </div>
    <div class="card">
    <div class="card-header" id="heading11">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">5.11 Has the affiliate`s management staff developed internal work plans that indicate how the affiliate`s staff and financial resources will 
    be allocated to insure that the affiliate`s strategic goals are accomplished in a timely manner?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion_c1_s5">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s5_5_11_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c1_s5_5_11_checkbox_1" for="c1_s5_5_11_checkbox_1">
    <input type="checkbox" id="c1_s5_5_11_checkbox_1" name="c1_s5_5_11_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Program work plans and current affiliate budget </span>
    
    </div>
    </div>
    
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)"  class="border-red" id="c1_s5_5_11_rating_1">
    </div>
   
    </div>
    
    </div>


            </div>

            <div class="my-3 d-flex">

            

            </div>

        </div>
      
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
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid']); ?>">
                        <i class="i i-timer"></i>
                      </a>
          </div>
      </div>

    

      <div class="criteria">

   

        <div class="criteriaBottom">
            <h5>Standard 6</h5>
            <p>The Board and Management should always have a plan for the affiliate`s ongoing operation with the stated goals and objectives to effectively accomplish the mission.  
              The affiliate should have a current strategic plan in effect periodically measuring its progress against goals and objectives and revising the plan as needed.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>

            <div id="accordion_c1_s6">
            <input type="hidden" id="criteriaOneStandardSixId" value=" <?=isset($criteria_one_standard_six->cid)?$criteria_one_standard_six->cid:'' ?>">

              <!-- </?=isset($criteria_one_standard_six->question)?$criteria_one_standard_six->question:'' ?> -->
              <div class="card">
    <div class="card-header" id="headingOne-1">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">6.1 Does the affiliate have a written policy on advocacy defining the process by which the affiliate determines positions on specific issues?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-1" aria-expanded="false" aria-controls="collapseOne-1">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOne-1" class="collapse" aria-labelledby="headingOne-1" data-parent="#accordion_c1_s6">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c1_s6_6_1_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate d-flex align-items-center">
   
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Attach the board approved advocacy policy.</span>
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c1_s6_6_1_rating_1">
    </div>
   
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



 </div>

</div>
<!-------------------------- Standard 6 end ----------------->
     
  </div>






<div class="tab-pane fade" id="nav-x2" role="tabpanel" aria-labelledby="nav-x2-tab" style="display: contents!important;">




  <!-- criteria 2 standard 1 -->

<div class="wrapouterContents" id="wpContent-x1">
                    
    <div class="criteria">


        <div  class="d-block">
        <div class="headOuter">
            <div class="head">
              
                      <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid']); ?>">
                        <i class="i i-timer"></i>
                      </a>
            </div>
        </div>
        <h3 class="ib-m">Criteria 2: Organizational Vitality </h3>
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
              <p>The affiliate`s relationship to its employees and volunteers is fundamental to its ability to achieve its mission.  Volunteers occupy a special place in the organization, serving 
                in governance, administrative and programmatic capacities.  An organization`s human resource policies should address both paid employees and volunteers, and should be 
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
            <div class="card">
    <div class="card-header" id="heading-q1">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">
    <div class="ib-m">
    
    1.1 Attach a copy of the affiliate`s personnel policies indicating the date they were last reviewed 
    </div>
    <div class="ib-m">
    <div class="yearPick mr-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" placeholder="YY-MM-DD" id="c2_s1_1_1_date_1" type="text">
    </div> </div>, and last approved by the board 
    of directors. <div class="ib-m">
    <div class="yearPick mr-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" placeholder="YY-MM-DD" id="c2_s1_1_1_date_2" type="text">
    </div> </div> </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-q1" aria-expanded="false" aria-controls="collapse-q1">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    
    <div class="card-body">
    <div id="collapse-q1" class="collapse " aria-labelledby="heading-q1" data-parent="#accordion_c2_s1">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s1_1_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="contentDate my-3">
   
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Board minutes, Page - <input type="text" id="c2_s1_1_1_val_1" class="smlInp" placeholder="00">
    </div>
    </div>
   
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red"  id="c2_s1_1_1_rating_1">
    </div>
   
    </div>
   
    </div>
   
   </div>
   
   <div class="card">
    <div class="card-header" id="heading-q2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.2 Affiliate personnel policies for employed staff are reviewed every three (3) years and are consistent with federal, state, and local statutory 
    requirements pertaining to employment, wages and hours, health and safety, and equal employment opportunity.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-q2" aria-expanded="true" aria-controls="collapse-q2">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div class="card-body">
    <div id="collapse-q2" class="collapse" aria-labelledby="heading-q2" data-parent="#accordion_c2_s1">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s1_1_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s1_1_2_checkbox_1" for="c2_s1_1_2_checkbox_1">
    <input type="checkbox" id="c2_s1_1_2_checkbox_1" name="c2_s1_1_2_checkbox_1">
    </label>
    </div>
   
    <div class="f-medium p-y-20">Verification Source or Comment(s): Indicate pages in personnel policies that address the following:</div>
   
    <div class="row no-gutters innWrow">
    <div class="col-md-6"> <div class="f-medium m-x-5">
    Working conditions, Page - <input type="text" id="c2_s1_1_2_val_1" class="smlInp" placeholder="00">
    </div></div>
    <div class="col-md-6"> <div class="f-medium m-x-5">
    Employee benefits, Page - <input type="text" id="c2_s1_1_2_val_2" class="smlInp" placeholder="00">
    </div></div>
    <div class="col-md-6"> <div class="f-medium m-x-5">
    Vacation Page - <input type="text" id="c2_s1_1_2_val_3" class="smlInp" placeholder="00">
    </div></div>
    <div class="col-md-6"> <div class="f-medium m-x-5">
    Sick leave Page - <input type="text" id="c2_s1_1_2_val_4" class="smlInp" placeholder="00">
    </div></div>
    </div>
    <div class="row no-gutters innWrow">
    <div class="col-md-6"> <div class="f-medium m-x-5">
    Employee evaluation Page - <input type="text" id="c2_s1_1_2_val_5" class="smlInp" placeholder="00">
    </div></div>
    <div class="col-md-6"> <div class="f-medium m-x-5">
    Grievance procedures Page - <input type="text" id="c2_s1_1_2_val_6" class="smlInp" placeholder="00">
    </div></div>
    <div class="col-md-10 col-20"> <div class="f-medium m-x-5">
    confidentiality of employee, client and Page -
    affiliate records and information 
    </div></div>
    <div class="col-md-2 col-4"><div class="f-medium m-x-5"><input type="text" id="c2_s1_1_2_val_7" class="smlInp" placeholder="00"></div>
    </div></div>
   
    <div class="row no-gutters innWrow">
    <div class="col-md-6"> <div class="f-medium m-x-5">
    and growth and development Page - <input type="text" id="c2_s1_1_2_val_8" class="smlInp" placeholder="00">
    </div></div>
    </div>
    </div>
    </div>
    <div class="contentDate my-3">
   
    
   
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s1_1_2_rating_1">
    </div>
   
    </div>
   
    </div>
   
    
    </div>
   
   <div class="card">
    <div class="card-header" id="heading-q3">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.3 With respect to volunteers, does the affiliate`s volunteer manual address initial assessment or screening, assignment to and training for 
    appropriate work responsibilities, ongoing supervision and evaluation, and opportunities for advancement and have all volunteers been 
    required to sign the volunteer application form.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-q3" aria-expanded="false" aria-controls="collapse-q3">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div class="card-body">
    <div id="collapse-q3" class="collapse" aria-labelledby="heading-q3" data-parent="#accordion_c2_s1">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s1_1_3_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s1_1_3_checkbox_1" for="c2_s1_1_3_checkbox_1">
    <input type="checkbox" id="c2_s1_1_3_checkbox_1" name="c2_s1_1_3_checkbox_1">
    </label>
    </div>
   
    <div class="f-medium p-y-20">Verification Source or Comment(s): Attach a copy of the volunteer manual; indicate pages in volunteer manual that address the following:</div>
   
    <div class="row no-gutters innWrow">
    
    <div class="col-md-10"> 
    <div class="row no-gutters">
    <div class="col-20"> <div class="f-medium m-x-5">
    Initial assessment and screening Page - 
    </div> </div>
    <div class="col-4"> <div class="f-medium m-x-5">
    <input type="text" class="smlInp" id="c2_s1_1_3_val_1" placeholder="00">
    </div></div>
   
    </div>
    
    </div>
    
    <div class="col-md-10"> 
    <div class="row no-gutters">
    <div class="col-20"> <div class="f-medium m-x-5">
    assignment to and training for Page - <br>
    appropriate work responsibility
    </div> </div>
    <div class="col-4"> <div class="f-medium m-x-5">
    <input type="text" class="smlInp" id="c2_s1_1_3_val_2" placeholder="00">
    </div></div>
   
    </div>
    
    </div>
    
    
    </div>
    
    <div class="row no-gutters innWrow">
    
    <div class="col-md-10"> 
    <div class="row no-gutters">
    <div class="col-20"> <div class="f-medium m-x-5">
        ongoing supervision and evaluation Page - 
    </div> </div>
    <div class="col-4"> <div class="f-medium m-x-5">
    <input type="text" class="smlInp" id="c2_s1_1_3_val_3" placeholder="00">
    </div></div>
   
    </div>
    
    </div>
    
    <div class="col-md-10"> 
    <div class="row no-gutters">
    <div class="col-20"> <div class="f-medium m-x-5">
    opportunities for advancement Page - 
    
    </div> </div>
    <div class="col-4"> <div class="f-medium m-x-5">
    <input type="text" class="smlInp" id="c2_s1_1_3_val_4" placeholder="00">
    </div></div>
   
    </div>
    
    </div>
    
    
    </div>
    
   
    
    </div>
    </div>
    <div class="contentDate my-3">
   
    
   
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s1_1_3_rating_1">
    </div>
   
    </div>
   
    </div>
   
    </div>
   
   
   <div class="card">
    <div class="card-header" id="heading-q4">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.4 Does the affiliate have a written job description for each employee that clearly identifies roles and responsibilities, and is there a system in 
    place for annual written evaluations of employees by their respective supervisors? </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-q4" aria-expanded="false" aria-controls="collapse-q4">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    
    <div class="card-body">
    <div id="collapse-q4" class="collapse" aria-labelledby="heading-q4" data-parent="#accordion_c2_s1">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s1_1_4_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s1_1_4_checkbox_1" for="c2_s1_1_4_checkbox_1">
    <input type="checkbox" id="c2_s1_1_4_checkbox_1" name="c2_s1_1_4_checkbox_1">
    </label>
    </div>
   
    
   
    
    </div>
    </div>
    <div class="contentDate mb-3">
   
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Current job descriptions and sample evaluation form</div>
    </div>
   
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s1_1_4_rating_1">
    </div>
   
    </div>
   
    </div>
   
    </div>
    
   
   <div class="card">
    <div class="card-header" id="heading-q5">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.5 Employed staff positions have been evaluated under a comparable pay-for-performance compensation system, and appropriate salary structures 
    have been adopted and implemented, to ensure internal equity and external competitiveness.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-q5" aria-expanded="false" aria-controls="collapse-q5">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    
    <div class="card-body">
    <div id="collapse-q5" class="collapse" aria-labelledby="heading-q5" data-parent="#accordion_c2_s1">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s1_1_5_comment_1" placeholder="comment">
    </div>
    
    </div></div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s1_1_5_checkbox_1" for="c2_s1_1_5_checkbox_1">
    <input type="checkbox" id="c2_s1_1_5_checkbox_1" name="c2_s1_1_5_checkbox_1">
    </label>
    </div>
   
    
   
    
    </div>
    </div>
    <div class="contentDate mb-3">
   
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Describe, in writing, the affiliate salary structure and compensation system used</div>
    </div>
   
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s1_1_5_rating_1">
    </div>
   
    </div>
   
    </div>
   
    
    </div>
   
   <div class="card">
    <div class="card-header" id="heading-q6">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.6 The affiliate`s performance management system incorporates career development for all employees, including employee orientation, supervisory 
    coaching, and systematic access to information about local and National Urban League training opportunities.
    </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-q6" aria-expanded="false" aria-controls="collapse-q6">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    
    <div class="card-body">
    <div id="collapse-q6" class="collapse" aria-labelledby="heading-q6" data-parent="#accordion_c2_s1">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s1_1_6_comment_1" placeholder="comment">
    </div>
    
    </div></div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s1_1_6_checkbox_1" for="c2_s1_1_6_checkbox_1">
    <input type="checkbox" id="c2_s1_1_6_checkbox_1" name="c2_s1_1_6_checkbox_1">
    </label>
    </div>
   
    
   
    
    </div>
    </div>
    <div class="contentDate mb-3">
   
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Policies and procedures related to staff development; records of staff participation in local and national 
    learning opportunities; internal training curriculum.</div>
    </div>
   
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s1_1_6_rating_1" >
    </div>
   
    </div>
   
    
   
    </div>
    </div>
   
   
   <div class="card">
    <div class="card-header" id="heading-q7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.7 The affiliate participates in medical, dental, life insurance, tax-deferred annuity, disability income, and retirement plans, or has an equivalent 
    benefit program. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-q7" aria-expanded="true" aria-controls="collapse-q7">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div class="card-body">
    <div id="collapse-q7" class="collapse" aria-labelledby="heading-q7" data-parent="#accordion_c2_s1">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s1_1_7_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s1_1_7_checkbox_1" for="c2_s1_1_7_checkbox_1">
    <input type="checkbox" id="c2_s1_1_7_checkbox_1" name="c2_s1_1_7_checkbox_1">
    </label>
    </div>
   
    
   
    
    </div>
    </div>
   
    <div class="contentDate mb-3">
   
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Summary description of affiliate benefit program.</div>
    </div>
   
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s1_1_7_rating_1">
    </div>
   
    </div>
    
              <!-- </?=isset($criteria_two_standard_one->question)?$criteria_two_standard_one->question:'' ?> -->
              <div class="my-3">

              

                </div>
                </div>
                </div>
 
                </div>

               


          </div>
        </div>




   </div>
  </div>
  <!--end criteria 2 standard 1 -->


  <!--criteria 2 standard 2 -->

  <div class="wrapouterContents" id="wpContent-x2">
                    
    <div class="criteria">
             


      <div class="d-lock">

</div>

      <div class="d-lock">

        <div class="headOuter">
            <div class="head">
                <h3>Human Resources</h3>
            </div>
        </div>

       </div>

      <div class="d-lock">

        <div class="headOuter">
            <div class="head">
                <h3>Fundraising</h3>
            </div>
        </div>

        <div class="criteriaBottom">

          <h5>Standard 2</h5>
            <p>Fundraising provides an important source of financial support for the work of the affiliate.  An affiliate`s fundraising program should be maintained on a foundation of 
              truthfulness and responsible stewardship.  Its fundraising policies should be consistent with its mission, compatible with its organizational capacity, and respectful of the 
              interests of donors and prospective donors. Fundraising costs should be reasonable over time.  Over a three (3) year period, an affiliate should realize revenue from 
              fundraising and other development activities that are at least three times the amount spent on conducting them.  Affiliates whose ratio is less that 3:1 should demonstrate 
              that they are making steady progress toward achieving this goal, or should be able to justify why a 3:1 ratio is not appropriate for this affiliate.</p>
        
              <h4>INDICATORS OF EFFECTIVENESS</h4>


              <div id="accordion_c2_s2">
              <input type="hidden" id="criteriaTwoStandardTwoId" value=" <?=isset($criteria_two_standard_two->cid)?$criteria_two_standard_two->cid:'' ?>">
              <div class="card">
    <div class="card-header" id="heading-u1">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">
    <div class="ib-m">
    
    2.1 The affiliate board of directors has taken action to develop and implement fund development strategies to meet long-range operating and 
    capital income needs. 
    </div>
    </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-u1" aria-expanded="false" aria-controls="collapse-u1">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    
    <div class="card-body">
    <div id="collapse-u1" class="collapse " aria-labelledby="heading-u1" data-parent="#accordion_c2_s2">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s2_2_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="contentDate my-3">
   
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Board minutes; written fund development strategies with timetable; long-range financial projections 
    </div>
    </div>
   
    <div class="col col-3 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s2_2_1_rating_1">
    </div>
   
    </div>
   
    </div>
   
   </div>
   
   <div class="card">
    <div class="card-header" id="heading-u2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">2.2 For the last three (3) years, provide the total amount of revenues from fundraising and other development activities and the total amount of 
    funds spent on conducting them.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-u2" aria-expanded="true" aria-controls="collapse-u2">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div class="card-body">
    <div id="collapse-u2" class="collapse" aria-labelledby="heading-u2" data-parent="#accordion_c2_s2">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s2_2_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s2_2_2_checkbox_1" for="c2_s2_2_2_checkbox_1">
    <input type="checkbox" id="c2_s2_2_2_checkbox_1" name="c2_s2_2_2_checkbox_1">
    </label>
    </div>
   
    <div class="f-medium p-y-20">Verification Source or Comment(s): Affiliate Financial Audits (Please support this standard with the G/L)</div>
   
    <div class="row">
    <div class="col-md-15">
    <table class="table table-borderless innTBL">
    <thead>
    <tr>
    <th>Year (Period)</th>
    <th>Total Raised</th>
    <th>Total Spent</th>
    <th>Net</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="text" id="c2_s2_2_2_val_1" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_2_val_2" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_2_val_3" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_2_val_4" class="form-control"></td>
    </tr>
    <tr>
    <td><input type="text" id="c2_s2_2_2_val_5" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_2_val_6" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_2_val_7" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_2_val_8" class="form-control"></td>
    </tr>
    <tr>
    <td><input type="text" id="c2_s2_2_2_val_9" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_2_val_10" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_2_val_11" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_2_val_12" class="form-control"></td>
    </tr>
    
    </tbody>
    </table>
    </div></div>
    
    </div>
    </div>
    <div class="contentDate mb-3">
   
    
   
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)"" id="c2_s2_2_2_rating_1" class="border-red">
    </div>
   
    </div>
   
    </div>
   
    
    </div>
   
   <div class="card">
    <div class="card-header" id="heading-u3">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">2.3 For the last three (3) years, provide revenue from all sources.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-u3" aria-expanded="false" aria-controls="collapse-u3">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div class="card-body">
    <div id="collapse-u3" class="collapse" aria-labelledby="heading-u3" data-parent="#accordion_c2_s2">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s2_2_3_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s2_2_3_checkbox_1" for="c2_s2_2_3_checkbox_1">
    <input type="checkbox" id="c2_s2_2_3_checkbox_1" name="c2_s2_2_3_checkbox_1">
    </label>
    </div>
   
    <div class="f-medium p-y-20">Verification Source or Comment(s)- Affiliate Financial Audits - (Total public support and revenue) </div>
   
    <div class="row">
    <div class="col-md-8">
    <table class="table table-borderless innTBL">
    <thead>
    <tr>
    <th>Year (Period)</th>
    <th>Total Revenue</th>
    
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="text" id="c2_s2_2_3_val_1" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_3_val_2" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s2_2_3_val_3" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_3_val_4"class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s2_2_3_val_5" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_3_val_6" class="form-control"></td>
    
    </tr>
    
    </tbody>
    </table>
    </div></div>
    
   
    
    </div>
    </div>
    <div class="contentDate mb-3">
   
    
   
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" id="c2_s2_2_3_rating_1" class="border-red">
    </div>
   
    </div>
   
    </div>
   
    </div>
   
   
   <div class="card">
    <div class="card-header" id="heading-u4">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">2.4 For the last three (3) years, provide the affiliate`s total income for direct and indirect contributions generated by individuals, foundations, 
    corporations. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-u4" aria-expanded="false" aria-controls="collapse-u4">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    
    <div class="card-body">
    <div id="collapse-u4" class="collapse" aria-labelledby="heading-u4" data-parent="#accordion_c2_s2">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s2_2_4_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s2_2_4_checkbox_1" for="c2_s2_2_4_checkbox_1">
    <input type="checkbox" id="c2_s2_2_4_checkbox_1" name="c2_s2_2_4_checkbox_1">
    </label>
    </div>
   
   
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate Financial Audits </div>
   
   
    <div class="row">
    <div class="col-md-8">
    <table class="table table-borderless innTBL">
    <thead>
    <tr>
    <th>Year (Period)</th>
    <th>Total Contributions</th>
    
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="text" id="c2_s2_2_4_val_1" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_4_val_2" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s2_2_4_val_3" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_4_val_4" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s2_2_4_val_5" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_4_val_6" class="form-control"></td>
    
    </tr>
    
    </tbody>
    </table>
    </div></div>
    </div>
    </div>
    <div class="contentDate mb-3">
   
    
   
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s2_2_4_rating_1">
    </div>
   
    </div>
   
    </div>
   
    </div>
    
   
   <div class="card">
    <div class="card-header" id="heading-u5">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">2.5 Members of the board of directors take active leadership in obtaining funds for the work of the affiliate through activities that include solicitation 
    and identification of prospects. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-u5" aria-expanded="false" aria-controls="collapse-u5">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    
    <div class="card-body">
    <div id="collapse-u5" class="collapse" aria-labelledby="heading-u5" data-parent="#accordion_c2_s2">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s2_2_5_comment_1" placeholder="comment">
    </div>
    
    </div></div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s2_2_5_checkbox_1" for="c2_s2_2_5_checkbox_1">
    <input type="checkbox" id="c2_s2_2_5_checkbox_1" name="c2_s2_2_5_checkbox_1">
    </label>
    </div>
   
    
   
    
    </div>
    </div>
    <div class="contentDate mb-3">
   
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Board Corporate Contribution Summary</div>
    </div>
   
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s2_2_5_rating_1">
    </div>
   
    </div>
   
    </div>
   
    
    </div>
   
   
   
   
   <div class="card">
    <div class="card-header" id="heading-u7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">2.6 Verification Source or Comment(s): Board Corporate Contribution Summary</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-u7" aria-expanded="true" aria-controls="collapse-u7">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div class="card-body">
    <div id="collapse-u7" class="collapse" aria-labelledby="heading-u7" data-parent="#accordion_c2_s2">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s2_2_6_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20">
    
    <div>
    <label class="checkbox switch bool c2_s2_2_6_checkbox_1" for="c2_s2_2_6_checkbox_1">
    <input type="checkbox" id="c2_s2_2_6_checkbox_1" name="c2_s2_2_6_checkbox_1">
    </label>
    </div>
   
    <div class="f-medium p-t-20">Verification Source or Comment(s): Individual Board Member Personal Contribution Summary</div>
    <div class="row">
    <div class="col-md-14">
    <table class="table table-borderless innTBL">
    <thead>
    <tr>
    <th>Year (Period)</th>
    <th>Board Member Personal Contribution
   
    </th>
    
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="text" id="c2_s2_2_6_val_1" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_6_val_2" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s2_2_6_val_3" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_6_val_4" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s2_2_6_val_5" class="form-control"></td>
    <td><input type="text" id="c2_s2_2_6_val_6" class="form-control"></td>
    
    </tr>
    
    </tbody>
    </table>
    </div></div>
    
    </div>
    </div>
   
    <div class="contentDate mb-3">
   
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Summary description of affiliate benefit program.</div>
    </div>
   
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s2_2_6_rating_1">
    </div>
   
    </div>
    
            <!-- </?=isset($criteria_two_standard_two->question)?$criteria_two_standard_two->question:'' ?> -->
               
            <div class="my-3">

         

            </div>
            </div>
            </div>
              </div>

            </div></div>


     

   </div>

  </div>

   <!--end criteria 2 standard 2 -->
   <!--criteria 2 standard 3 -->

   <div class="wrapouterContents" id="wpContent-x3">
                    
                    <div class="criteria">
                
                      <div class="d-block">
                
                       
                
                        </div>
                
                      <div class="d-block">
                
                        <div class="headOuter">
                            <div class="head">
                                <h3>Human Resources</h3>
                            </div>
                        </div>
                
                      </div>
                
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
              <div class="card">
    <div class="card-header" id="heading-y1">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">
    <div class="ib-m">
    
    3.1 What accounting software package does the affiliate use?
    </div>
    </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y1" aria-expanded="false" aria-controls="collapse-y1">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y1" class="collapse " aria-labelledby="heading-y1" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    This software last updated/revised?
    
    <div class="ib-m">
    <div class="yearPick mx-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c2_s3_3_1_date_1" placeholder="YY-MM-DD" type="text">
    </div> </div> 
    
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_1_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.2 Does the affiliate have systems in place to provide the appropriate information needed by staff and board to make sound financial decisions 
    and to fulfill Internal Revenue Service requirements?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y2" aria-expanded="true" aria-controls="collapse-y2">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-y2" class="collapse" aria-labelledby="heading-y2" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_2_checkbox_1" for="c2_s3_3_2_checkbox_1">
    <input type="checkbox" id="c2_s3_3_2_checkbox_1" name="c2_s3_3_2_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Affiliate Accounting Manual, Date
    
    <div class="ib-m">
    <div class="yearPick mx-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c2_s3_3_2_date_1" placeholder="YY-MM-DD" type="text">
    </div> </div> 
    
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_2_rating_1" >
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y3">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.3 Does the mail policy forbid opening the mail by the same person who deposits checks?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y3" aria-expanded="false" aria-controls="collapse-y3">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-y3" class="collapse" aria-labelledby="heading-y3" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_3_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_3_checkbox_1" for="c2_s3_3_3_checkbox_1">
    <input type="checkbox" id="c2_s3_3_3_checkbox_1" name="c2_s3_3_3_checkbox_1">
    </label>
    </div>
    
    </div>
    </div>
    <div class="contentDate my-3">
    <div class="col-20 d-flex ">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s) Mail policy; Internal Control Document</div>
    </div>
    
    
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_3_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-y4">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.4 For the last three (3) years, did the affiliate expend more than $500,000 ($750,000 (if applicable)) in federal funds? (This includes Federal funds 
    received from a `pass through` entity as well) If so, did the affiliate obtain an OMB A-133 audit?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y4" aria-expanded="false" aria-controls="collapse-y4">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y4" class="collapse" aria-labelledby="heading-y4" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_4_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_4_checkbox_1" for="c2_s3_3_4_checkbox_1">
    <input type="checkbox" id="c2_s3_3_4_checkbox_1" name="c2_s3_3_4_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="col-lg-4 col-md-4 form-group">
    <div class="ib-m">N/A</div>
    <div class="ib-m"> <input type="text" id="c2_s3_3_4_val_1" class="form-control naInp"></div>
    
    </div>
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate A-133 Audits</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_4_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-y5">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.5 For the last three (3) years, did the affiliate`s A-133 audits contain `notes or areas of concern noted by the auditors?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y5" aria-expanded="false" aria-controls="collapse-y5">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y5" class="collapse" aria-labelledby="heading-y5" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_5_comment_1" placeholder="comment">
    </div>
    
    </div></div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_5_checkbox_1" for="c2_s3_3_5_checkbox_1">
    <input type="checkbox" id="c2_s3_3_5_checkbox_1" name="c2_s3_3_5_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="col-lg-20 col-md-20 ">
    <div class="ib-m">N/A</div>
    <div class="ib-m"> <input type="text" id="c2_s3_3_5_val_1" class="form-control naInp"></div>
    
    </div>
    </div>
    
    <div class="f-medium p-a-10"> If yes, has the affiliate taken steps to address these concerns?</div>
    
    <div class="p-x-10">
    <label class="checkbox switch bool c2_s3_3_5_checkbox_2" for="c2_s3_3_5_checkbox_2">
    <input type="checkbox" id="c2_s3_3_5_checkbox_2" name="c2_s3_3_5_checkbox_2">
    </label>
    </div>
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate A-133 Audits; Copy of management response to A-133 notes or areas of concern</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_5_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    
    
    
    <div class="card">
    <div class="card-header" id="heading-y6">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.6 Does the affiliate reconcile all cash accounts monthly?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y6" aria-expanded="false" aria-controls="collapse-y6">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y6" class="collapse" aria-labelledby="heading-y6" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_6_comment_1" placeholder="comment">
    </div>
    
    </div></div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_6_checkbox_1" for="c2_s3_3_6_checkbox_1">
    <input type="checkbox" id="c2_s3_3_6_checkbox_1" name="c2_s3_3_6_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Last six (6) months bank account(s) reconciliations</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_6_rating_1" >
    </div>
    
    </div>
    
    
    
    </div>
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y8">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.7 If the affiliate has billable contracts or other service income, are written procedures established for the periodic billing, follow-up, and collection 
    of all accounts, and does it have the documentation that substantiates all billings.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y8" aria-expanded="false" aria-controls="collapse-y8">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y8" class="collapse" aria-labelledby="heading-y8" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_7_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_7_checkbox_1" for="c2_s3_3_7_checkbox_1">
    <input type="checkbox" id="c2_s3_3_7_checkbox_1" name="c2_s3_3_7_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="col-lg-4 col-md-4 form-group">
    <div class="ib-m">N/A</div>
    <div class="ib-m"> <input type="text" id="c2_s3_3_7_val_1" class="form-control naInp"></div>
    
    </div>
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Contracts and copy of payment request from funder</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_7_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-y9">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.8 For the last three (3) years, according to the affiliate`s most recent audits, did the affiliate have a decrease in Total Net Assets greater than 33%? </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y9" aria-expanded="false" aria-controls="collapse-y9">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y9" class="collapse" aria-labelledby="heading-y9" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_8_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_8_checkbox_1" for="c2_s3_3_8_checkbox_1">
    <input type="checkbox" id="c2_s3_3_8_checkbox_1" name="c2_s3_3_8_checkbox_1">
    </label>
    </div>
    
    
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate Audits, and if greater than 33%, please explain the circumstances </div>
    
    
    <div class="row">
    <div class="col-md-12">
    <table class="table table-borderless innTBL">
    <thead>
    <tr>
    <th>Year (Period)</th>
    <th>U/R Net Assets</th>
    <th>Change</th>
    
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="text" id="c2_s3_3_8_val_1" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_8_val_2" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_8_val_3" class="form-control"></td>
    </tr>
    <tr>
    <td><input type="text" id="c2_s3_3_8_val_4" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_8_val_5" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_8_val_6" class="form-control"></td>
    </tr>
    <tr>
    <td><input type="text" id="c2_s3_3_8_val_7" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_8_val_8" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_8_val_9" class="form-control"></td>
    </tr>
    
    </tbody>
    </table>
    </div></div>
    </div>
    </div>
    <div class="contentDate mb-3">
    
    
    
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_8_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y10">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.9 For the last three (3) years, did the affiliate have a positive fund balance? </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y10" aria-expanded="false" aria-controls="collapse-y10">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y10" class="collapse" aria-labelledby="heading-y10" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_9_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_9_checkbox_1" for="c2_s3_3_9_checkbox_1">
    <input type="checkbox" id="c2_s3_3_9_checkbox_1" name="c2_s3_3_9_checkbox_1">
    </label>
    </div>
    
    
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate Audits; if not please explain</div>
    
    
    <div class="row">
    <div class="col-md-8">
    <table class="table table-borderless innTBL">
    <thead>
    <tr>
    <th>Year (Period)</th>
    <th>Fund Balance</th>
    
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="text" id="c2_s3_3_9_val_1" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_9_val_2" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s3_3_9_val_3" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_9_val_4" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s3_3_9_val_5" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_9_val_6" class="form-control"></td>
    
    </tr>
    
    </tbody>
    </table>
    </div></div>
    </div>
    </div>
    <div class="contentDate mb-3">
    
    
    
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_9_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y11">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.10 For the last three (3) years, according to the affiliate`s audits, do the affiliate`s Management and General Cost exceed 30%?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y11" aria-expanded="false" aria-controls="collapse-y11">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y11" class="collapse" aria-labelledby="heading-y11" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_10_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_10_checkbox_1" for="c2_s3_3_10_checkbox_1">
    <input type="checkbox" id="c2_s3_3_10_checkbox_1" name="c2_s3_3_10_checkbox_1">
    </label>
    </div>
    
    
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate Audits</div>
    
    
    <div class="row">
    <div class="col-md-18">
    <table class="table table-borderless innTBL">
    <thead>
    <tr>
    <th>Year (Period)</th>
    <th>Mgmt. & Gen.</th>
    <th>Total Exp.</th>
    <th>Percent</th>
    
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="text" id="c2_s3_3_10_val_1" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_10_val_2" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_10_val_3" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_10_val_4" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s3_3_10_val_5" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_10_val_6" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_10_val_7" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_10_val_8" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s3_3_10_val_9" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_10_val_10" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_10_val_11" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_10_val_12" class="form-control"></td>
    
    </tr>
    
    </tbody>
    </table>
    </div></div>
    </div>
    </div>
    <div class="contentDate mb-3">
    
    
    
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_10_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-y12">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.11 For the last three (3) years, according to the affiliate`s audits, does the affiliate`s debt to asset exceed 50%?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y12" aria-expanded="false" aria-controls="collapse-y12">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y12" class="collapse" aria-labelledby="heading-y12" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_11_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_11_checkbox_1" for="c2_s3_3_11_checkbox_1">
    <input type="checkbox" id="c2_s3_3_11_checkbox_1" name="c2_s3_3_11_checkbox_1">
    </label>
    </div>
    
    
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate Audits</div>
    
    
    <div class="row">
    <div class="col-md-18">
    <table class="table table-borderless innTBL">
    <thead>
    <tr>
    <th>Year (Period)</th>
    <th>Total Debt</th>
    <th>Total Assets</th>
    <th>Percent</th>
    
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="text" id="c2_s3_3_11_val_1" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_11_val_2" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_11_val_3" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_11_val_4" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s3_3_11_val_5" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_11_val_6" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_11_val_7" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_11_val_8" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s3_3_11_val_9" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_11_val_10" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_11_val_11" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_11_val_12" class="form-control"></td>
    
    </tr>
    
    </tbody>
    </table>
    </div></div>
    </div>
    </div>
    <div class="contentDate mb-3">
    
    
    
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_11_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-y13">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.12 For the last three (3) years, according to the affiliate`s audits, do the affiliate`s current accounts receivables exceed 50% of the affiliate`s 
    current assets?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y13" aria-expanded="false" aria-controls="collapse-y13">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y13" class="collapse" aria-labelledby="heading-y13" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_12_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_12_checkbox_1" for="c2_s3_3_12_checkbox_1">
    <input type="checkbox" id="c2_s3_3_12_checkbox_1" name="c2_s3_3_12_checkbox_1">
    </label>
    </div>
    
    
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate Audits</div>
    
    
    <div class="row">
    <div class="col-md-18">
    <table class="table table-borderless innTBL">
    <thead>
    <tr>
    <th>Year (Period)</th>
    <th>Accts Rec</th>
    <th>Current Assets</th>
    <th>Percent</th>
    
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="text" id="c2_s3_3_12_val_1" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_12_val_2" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_12_val_3" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_12_val_4" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s3_3_12_val_5" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_12_val_6" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_12_val_7" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_12_val_8" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s3_3_12_val_9" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_12_val_10" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_12_val_11" class="form-control"></td>
    <td><input type="text" id="c2_s3_3_12_val_12" class="form-control"></td>
    
    </tr>
    
    </tbody>
    </table>
    </div></div>
    </div>
    </div>
    <div class="contentDate mb-3">
    
    
    
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_12_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y14">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.13 If required, IRS Form 990T (Unrelated Business Income) has been filed and a copy is available to the public.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y14" aria-expanded="false" aria-controls="collapse-y14">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y14" class="collapse" aria-labelledby="heading-y14" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_13_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_13_checkbox_1" for="c2_s3_3_13_checkbox_1">
    <input type="checkbox" id="c2_s3_3_13_checkbox_1" name="c2_s3_3_13_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="col-lg-4 col-md-4 ">
    <div class="ib-m">N/A</div>
    <div class="ib-m"> <input type="text" id="c2_s3_3_13_val_1" class="form-control naInp"></div>
    
    </div>
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Copy of Form 990T</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_13_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y15">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.14 Are the affiliate`s government contracts, purchase of service agreements and grant agreements in writing and are reviewed by a staff member 
    to monitor compliance with all stated conditions?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y15" aria-expanded="false" aria-controls="collapse-y15">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y15" class="collapse" aria-labelledby="heading-y15" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_14_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_14_checkbox_1" for="c2_s3_3_14_checkbox_1">
    <input type="checkbox" id="c2_s3_3_14_checkbox_1" name="c2_s3_3_14_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="col-lg-4 col-md-4 ">
    <div class="ib-m">N/A</div>
    <div class="ib-m"> <input type="text" id="c2_s3_3_14_val_1" class="form-control naInp"></div>
    
    </div>
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Contracts, Service and/or Grant Agreements</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_14_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y16">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.15 Does the affiliate have a written policy related to investments?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y16" aria-expanded="false" aria-controls="collapse-y16">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y16" class="collapse" aria-labelledby="heading-y16" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_15_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_15_checkbox_1" for="c2_s3_3_15_checkbox_1">
    <input type="checkbox" id="c2_s3_3_15_checkbox_1" name="c2_s3_3_15_checkbox_1">
    </label>
    </div>
    </div>
    
    
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Copy of Investment Policy</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_15_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y17">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.16 Has the affiliate established a written plan identifying actions to take in the event of a reduction or loss in funding?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y17" aria-expanded="false" aria-controls="collapse-y17">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y17" class="collapse" aria-labelledby="heading-y17" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_16_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_16_checkbox_1" for="c2_s3_3_16_checkbox_1">
    <input type="checkbox" id="c2_s3_3_16_checkbox_1" name="c2_s3_3_16_checkbox_1">
    </label>
    </div>
    </div>
    
    
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Provide a copy of the Affiliate Fund Diversification strategy</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_16_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y18">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.17 Does the Board of Directors review and approve the affiliate audit report and management letter, and with staff input and support institutes any 
    necessary changes.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y18" aria-expanded="false" aria-controls="collapse-y18">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-y18" class="collapse" aria-labelledby="heading-y18" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_17_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_17_checkbox_1" for="c2_s3_3_17_checkbox_1">
    <input type="checkbox" id="c2_s3_3_17_checkbox_1" name="c2_s3_3_17_checkbox_1">
    </label>
    </div>
    </div>
    
    
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-20">
    <div class="f-medium p-t-20"><div class="f-medium m-x-15">
    Verification Source or Comment(s): Board Minutes,Page - <input type="text" class="smlInp" id="c2_s3_3_17_val_1" placeholder="00"> of approval; copy of written changes/responses
    </div></div>
    </div>
    
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_17_rating_1" >
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-y7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">3.18 Does the affiliate make training available for board and appropriate staff on relevant accounting and financial management topics? </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-y7" aria-expanded="true" aria-controls="collapse-y7">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-y7" class="collapse" aria-labelledby="heading-y7" data-parent="#accordion_c2_s3">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s3_3_18_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s3_3_18_checkbox_1" for="c2_s3_3_18_checkbox_1">
    <input type="checkbox" id="c2_s3_3_18_checkbox_1" name="c2_s3_3_18_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Board and staff training roster/curriculum</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type= "text" onblur="checkrating(this)" class="border-red" id="c2_s3_3_18_rating_1" >
    </div>
    
    </div>
    
                            <!-- </?=isset($criteria_two_standard_three->question)?$criteria_two_standard_three->question:'' ?> -->
                            
                            <div class="my-3">
      
                             
                  
                          </div>
                          </div>
                        </div>
                           
                          </div>
                          </div></div>
                
                    
                
                   </div>
                
   </div>




   <!--end criteria 2 standard 3 -->


   <!--criteria 2 standard 4 -->
   <div class="wrapouterContents" id="wpContent-x4">
                    
    <div class="criteria">

      <div class="d-block">

  

       
      </div>
      <div class="d-block">

        <div class="headOuter">
            <div class="head">
                <h3>Human Resources</h3>
            </div>
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
            <p>Internal controls is the process established by the affiliate`s board of directors, management and other personnel that is designed to provide reasonable assurance that the 
              affiliate will efficiently and effectively achieve its objectives, reliably report finances, and comply with applicable laws and regulations.
              </p>
              <h4>INDICATORS OF EFFECTIVENESS</h4>


              <div id="accordion_c2_s4">
             
              <input type="hidden" id="criteriaTwoStandardFourId" value=" <?=isset($criteria_two_standard_four->cid)?$criteria_two_standard_four->cid:'' ?>">
               
              <div class="card">
    <div class="card-header" id="heading-g1">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">
    <div class="ib-m">
    4.1 The affiliate has established written procedures that are followed and reviewed annually, for internal financial controls, including the selection of 
    authorized signatures on affiliate bank accounts through resolutions, and the requirement for enforced bonding insurance for applicable staff and 
    board members. 
    </div>
    </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g1" aria-expanded="false" aria-controls="collapse-g1">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g1" class="collapse " aria-labelledby="heading-g1" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_1_checkbox_1" for="c2_s4_4_1_checkbox_1">
    <input type="checkbox" id="c2_s4_4_1_checkbox_1" name="c2_s4_4_1_checkbox_1">
    </label>
    </div>
    
    </div>
    </div>
    
    <div class="contentDate my-3">
    
    <div class="col-20">
    <div class="f-medium p-t-20"><div class="f-medium m-x-15">
    Verification Source or Comment(s): Written procedure for Internal Financial Controls; board approval in the minutes,Page - 
    <input type="text" class="smlInp" id="c2_s4_4_1_val_1" placeholder="00"> ; names and position of check signers
    </div></div>
    </div>
    
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_1_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-g2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.2 The affiliate has established written procedures for the identification, review, tracking, and handling of all assets of the Urban League affiliate 
    and its entities. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g2" aria-expanded="true" aria-controls="collapse-g2">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-g2" class="collapse" aria-labelledby="heading-g2" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_2_checkbox_1" for="c2_s4_4_2_checkbox_1">
    <input type="checkbox" id="c2_s4_4_2_checkbox_1" name="c2_s4_4_2_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Written procedures for asset management; fixed-asset register (inventory of land, building, and equipment) 
    
    
    
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_2_rating_1" placeholder="">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    
    <div class="card">
    <div class="card-header" id="heading-g3">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.3 Does the affiliate allow checks to be pre-signed?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g3" aria-expanded="false" aria-controls="collapse-g3">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-g3" class="collapse" aria-labelledby="heading-g3" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_3_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_3_checkbox_1" for="c2_s4_4_3_checkbox_1">
    <input type="checkbox" id="c2_s4_4_3_checkbox_1" name="c2_s4_4_3_checkbox_1">
    </label>
    </div>
    
    </div>
    </div>
    <div class="contentDate my-3">
    <div class="col-20 d-flex ">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Copy of policy</div>
    </div>
    
    
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_3_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-g4">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.4 Does the affiliate prepare a Statement of Financial Position and a Statement of Activities on a monthly basis?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g4" aria-expanded="false" aria-controls="collapse-g4">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g4" class="collapse" aria-labelledby="heading-g4" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_4_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-24 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_4_checkbox_1" for="c2_s4_4_4_checkbox_1">
    <input type="checkbox" id="c2_s4_4_4_checkbox_1" name="c2_s4_4_4_checkbox_1">
    </label>
    </div>
    </div>
    
    
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Monthly Board Financial Packet</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_4_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-g5">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.5 Does the affiliate budget planning process include management personnel, the President/CEO and members of the Board?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g5" aria-expanded="false" aria-controls="collapse-g5">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g5" class="collapse" aria-labelledby="heading-g5" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_5_comment_1" placeholder="comment">
    </div>
    
    </div></div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-24 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_5_checkbox_1" for="c2_s4_4_5_checkbox_1">
    <input type="checkbox" id="c2_s4_4_5_checkbox_1" name="c2_s4_4_5_checkbox_1">
    </label>
    </div>
    </div>
    
    
    </div>
    
    <div class="f-medium p-a-10"> Verification Source or Comment(s): Copy of the board approved current budget; and an outline of the budgeting process; Date approved <div class="ib-m">
    <div class="yearPick mr-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c2_s4_4_5_date_1" placeholder="YY-MM-DD" type="text">
    </div> </div></div>
    
    
    </div>
    <div class="contentDate mb-3">
    
    
    
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_5_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-g6">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.6 Does the affiliate disbursement policy require members of the board to approve above a certain amount? What is that amount?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g6" aria-expanded="false" aria-controls="collapse-g6">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g6" class="collapse" aria-labelledby="heading-g6" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_6_comment_1" placeholder="comment">
    </div>
    
    </div></div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_6_checkbox_1" for="c2_s4_4_6_checkbox_1">
    <input type="checkbox" id="c2_s4_4_6_checkbox_1" name="c2_s4_4_6_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Policy statement and amount $ 
    <input type="text" id="c2_s4_4_6_val_1" class="lineInput"> ; board minutes,Page - 
    <input type="text" id="c2_s4_4_6_val_2" class="smlInp" placeholder="00"></div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_6_rating_1" placeholder="">
    </div>
    
    </div>
    
    
    
    </div>
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-g7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.7 Are cancelled checks reviewed in a timely manner, not later than
    <input type="text" id="c2_s4_4_7_val_1" class="smlInp" placeholder="00"> days following receipt?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g7" aria-expanded="false" aria-controls="collapse-g7">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g7" class="collapse" aria-labelledby="heading-g7" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_7_comment_1" placeholder="comment">
    </div>
    
    </div></div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_7_checkbox_1" for="c2_s4_4_7_checkbox_1">
    <input type="checkbox" id="c2_s4_4_7_checkbox_1" name="c2_s4_4_7_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Explain, in writing, the review process</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" id="c2_s4_4_7_rating_1" class="border-red" placeholder="">
    </div>
    
    </div>
    
    
    
    </div>
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-g8">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.8 Is the payroll approved by a manager who is not responsible for its preparation?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g8" aria-expanded="false" aria-controls="collapse-g8">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g8" class="collapse" aria-labelledby="heading-g8" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_8_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-24 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_8_checkbox_1" for="c2_s4_4_8_checkbox_1">
    <input type="checkbox" id="c2_s4_4_8_checkbox_1" name="c2_s4_4_8_checkbox_1">
    </label>
    </div>
    </div>
    
    
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Payroll Register and written procedures</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_8_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-g9">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.9 Are withholding and FICA taxes deposited on a timely basis and in accordance with federal, state, and local municipal laws, where applicable. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g9" aria-expanded="false" aria-controls="collapse-g9">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g9" class="collapse" aria-labelledby="heading-g9" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_9_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_9_checkbox_1" for="c2_s4_4_9_checkbox_1">
    <input type="checkbox" id="c2_s4_4_9_checkbox_1" name="c2_s4_4_9_checkbox_1">
    </label>
    </div>
    
    
    
    
    
    
    </div>
    </div>
    <div class="contentDate mb-3">
    <div class="col-20">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Form 941 for the last four (4) quarters and appropriate backup </div>
    </div>
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_9_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-g10">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.10 Were all tax payments (includes FICA, and unemployment) made on time (by due date)? </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g10" aria-expanded="false" aria-controls="collapse-g10">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g10" class="collapse" aria-labelledby="heading-g10" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_10_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_10_checkbox_1" for="c2_s4_4_10_checkbox_1">
    <input type="checkbox" id="c2_s4_4_10_checkbox_1" name="c2_s4_4_10_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="col-lg-4 col-md-4 ">
    <div class="ib-m">N/A</div>
    <div class="ib-m"> <input type="text" id="c2_s4_4_10_val_1" class="form-control naInp"></div>
    
    </div>
    
    
    </div>
    
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div class="f-medium p-t-20">If not, were interest and penalties assessed against the Affiliate? Penalty- $
    <input type="text" id="c2_s4_4_10_val_2" class="lineInput"> Interest - $
    <input type="text" id="c2_s4_4_10_val_3" class="lineInput"></div>
    <div class="f-medium p-t-20">If interest and penalties were assessed, were these costs allocated to any public funding source?
    <input type="text" id="c2_s4_4_10_val_4" class="naInp max w-180px"> </div>
    
    
    
    </div>
    </div>
    <div class="contentDate mb-3">
    <div class="col-20">
    <div class="f-bold"> Verification Source or Comment(s): Internal Revenue Service correspondence and any other appropriate documentation</div>
    </div>
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_10_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-g15">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.11 Are employees, board members and volunteers who handle affiliate funds and investments bonded to assure the safeguarding of assets?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g15" aria-expanded="false" aria-controls="collapse-g15">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g15" class="collapse" aria-labelledby="heading-g15" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_11_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-24 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_11_checkbox_1" for="c2_s4_4_11_checkbox_1">
    <input type="checkbox" id="c2_s4_4_11_checkbox_1" name="c2_s4_4_11_checkbox_1">
    </label>
    </div>
    </div>
    
    
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Copy of Bonding Insurance</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_11_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-g16">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.12 Does the affiliate have a written policy on the use of its corporate credit card, and a process for recovering unauthorized usage?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g16" aria-expanded="false" aria-controls="collapse-g16">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g16" class="collapse" aria-labelledby="heading-g16" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_12_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_12_checkbox_1" for="c2_s4_4_12_checkbox_1">
    <input type="checkbox" id="c2_s4_4_12_checkbox_1" name="c2_s4_4_12_checkbox_1">
    </label>
    </div>
    </div>
    
    
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate written policy/process</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_12_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-g17">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.13 Do the affiliate`s Accounting or Board Policy and Procedures Manual prohibit the use of bank issued debit cards?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g17" aria-expanded="false" aria-controls="collapse-g17">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g17" class="collapse" aria-labelledby="heading-g17" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_13_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_13_checkbox_1" for="c2_s4_4_13_checkbox_1">
    <input type="checkbox" id="c2_s4_4_13_checkbox_1" name="c2_s4_4_13_checkbox_1">
    </label>
    </div>
    </div>
    
    
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate written policy and source</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_13_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-g11">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.14 A written strategy for diversifying sources of income has been implemented. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g11" aria-expanded="false" aria-controls="collapse-g11">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g11" class="collapse" aria-labelledby="heading-g11" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_14_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_14_checkbox_1" for="c2_s4_4_14_checkbox_1">
    <input type="checkbox" id="c2_s4_4_14_checkbox_1" name="c2_s4_4_14_checkbox_1">
    </label>
    </div>
    
    
    
    
    
    
    </div>
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-20">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Long-range Financial Strategies; Fund Diversification Plan; Board minutes, Page - 
    <input type="text" id="c2_s4_4_14_val_1" class="smlInp" placeholder="00"></div>
    </div>
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_14_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-g12">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.15 For the last three (3) years, did actual operating income equal or exceed actual operating expenses? </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g12" aria-expanded="false" aria-controls="collapse-g12">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g12" class="collapse" aria-labelledby="heading-g12" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_15_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_15_checkbox_1" for="c2_s4_4_15_checkbox_1">
    <input type="checkbox" id="c2_s4_4_15_checkbox_1" name="c2_s4_4_15_checkbox_1">
    </label>
    </div>
    
    
    <div class="f-medium p-t-20">Verification Source or Comment(s): Affiliate Audits</div>
    
    
    <div class="row">
    <div class="col-md-18">
    <table class="table table-borderless innTBL">
    <thead>
    <tr>
    <th>Year (Period)</th>
    <th>Income</th>
    <th>Expenses</th>
    <th>Net</th>
    
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><input type="text" id="c2_s4_4_15_val_1" class="form-control"></td>
    <td><input type="text" id="c2_s4_4_15_val_2" class="form-control"></td>
    <td><input type="text" id="c2_s4_4_15_val_3" class="form-control"></td>
    <td><input type="text" id="c2_s4_4_15_val_4" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s4_4_15_val_5" class="form-control"></td>
    <td><input type="text" id="c2_s4_4_15_val_6" class="form-control"></td>
    <td><input type="text" id="c2_s4_4_15_val_7" class="form-control"></td>
    <td><input type="text" id="c2_s4_4_15_val_8" class="form-control"></td>
    
    </tr>
    <tr>
    <td><input type="text" id="c2_s4_4_15_val_9" class="form-control"></td>
    <td><input type="text" id="c2_s4_4_15_val_10" class="form-control"></td>
    <td><input type="text" id="c2_s4_4_15_val_11" class="form-control"></td>
    <td><input type="text" id="c2_s4_4_15_val_12" class="form-control"></td>
    
    </tr>
    
    </tbody>
    </table>
    </div></div>
    </div>
    </div>
    <div class="contentDate mb-3">
    
    
    
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_15_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-g13">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.16 The affiliate has or is in the active process of creating unrestricted cash reserves equal to at least a minimum of three months.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g13" aria-expanded="false" aria-controls="collapse-g13">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g13" class="collapse" aria-labelledby="heading-g13" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_16_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_16_checkbox_1" for="c2_s4_4_16_checkbox_1">
    <input type="checkbox" id="c2_s4_4_16_checkbox_1" name="c2_s4_4_16_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="col-lg-4 col-md-4 ">
    <div class="ib-m">N/A</div>
    <div class="ib-m"> <input type="text" id="c2_s4_4_16_val_1" class="form-control naInp"></div>
    
    </div> </div>
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-24 ">
    <div class="f-medium p-t-20">Reserves on hand: $<input type="text" id="c2_s4_4_16_val_2" class="lineInput"> </div>
    <div class="f-medium p-t-20">Verification Source or Comment(s): Reserves Source(s); monthly expenses
    <input type="text" id="c2_s4_4_16_val_3"class="naInp max w-180px"> </div>
    </div></div>
    
    <div class="contentDate mb-3">
    
    <div class="col-20"> <div class="f-medium p-t-20">Verification Source or Comment(s): Reserves Source(s); monthly expenses</div></div>
    
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_16_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-g14">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.17 The affiliate board of directors has established written policies for the use of affiliate operating reserves.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g14" aria-expanded="false" aria-controls="collapse-g14">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g14" class="collapse" aria-labelledby="heading-g14" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_17_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_17_checkbox_1" for="c2_s4_4_17_checkbox_1">
    <input type="checkbox" id="c2_s4_4_17_checkbox_1" name="c2_s4_4_17_checkbox_1">
    </label>
    </div>
    </div>
    
    
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Approved Affiliate Operating Reserves Policy; board minutes, Page -
    <input type="text" class="smlInp" id="c2_s4_4_17_val_1" placeholder="00"></div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_17_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    
    <div class="card">
    <div class="card-header" id="heading-g18">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.18 The board of directors receives and reviews on a regular basis (at least quarterly) Statement of Financial Position and a Statement of Activities.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g18" aria-expanded="false" aria-controls="collapse-g18">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-g18" class="collapse" aria-labelledby="heading-g18" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_18_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-4 col-md-4 ">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_18_checkbox_1" for="c2_s4_4_18_checkbox_1">
    <input type="checkbox" id="c2_s4_4_18_checkbox_1" name="c2_s4_4_18_checkbox_1">
    </label>
    </div>
    </div>
    
    
    
    
    </div>
    <div class="contentDate mb-3">
    
    <div class="col-20">
    <div class="f-medium p-t-20"><div class="f-medium m-x-15">
    Verification Source or Comment(s): Copy of monthly financial packets to board
    </div></div>
    </div>
    
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_18_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    
    <div class="card">
    <div class="card-header" id="heading-g19">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.19 An independent CPA or auditing firm is engaged annually by the affiliate to perform an audit of the affiliate`s financial statements and the board 
    reviews the audit and any management letter accompanying the audit.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g19" aria-expanded="true" aria-controls="collapse-g19">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-g19" class="collapse" aria-labelledby="heading-g19" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_19_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_19_checkbox_1" for="c2_s4_4_19_checkbox_1">
    <input type="checkbox" id="c2_s4_4_19_checkbox_1" name="c2_s4_4_19_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Name of Auditors and date of board approval <div class="ib-m">
    <div class="yearPick mx-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" placeholder="YY-MM-DD" id="c2_s4_4_19_date_1" type="text">
    </div> </div></div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_19_rating_1" placeholder="">
    </div>
    
    </div>
    
    </div>
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-g20">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">4.20 All findings and recommendations provided by the auditor have been considered and there is a record of corrective actions taken. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-g20" aria-expanded="true" aria-controls="collapse-g20">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-g20" class="collapse" aria-labelledby="heading-g20" data-parent="#accordion_c2_s4">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s4_4_20_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s4_4_20_checkbox_1" for="c2_s4_4_20_checkbox_1">
    <input type="checkbox" id="c2_s4_4_20_checkbox_1" name="c2_s4_4_20_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    
    <div class="contentDate mb-3">
    
    <div class="col-18">
    <div class="f-medium p-t-20">Verification Source or Comment(s): Copy of the corrective action response(s)</div>
    </div>
    
    <div class="col col-6 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s4_4_20_rating_1" placeholder="">
    </div>
    
    </div>
    
            <!-- </?=isset($criteria_two_standard_four->question)?$criteria_two_standard_four->question:'' ?> -->
  
</div>
</div>
              </div>


        </div>
      </div>


   </div>

  </div>
   <!--end criteria 2 standard 4 -->



   <!--end criteria 2 standard 5 -->
  
   <div class="wrapouterContents" id="wpContent-x5">
                    
    <div class="criteria">
  
  
          <div class="d-block">
     
  
      
      </div>
  
          <div class="d-block">
        <div class="headOuter">
            <div class="head">
                <h3>Human Resources</h3>
            </div>
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
            <p>Financial policies and financial planning should be closely integrated into the affiliate`s daily activities to be able to assess the financial feasibility of the programs and 
              services provided</p>
              <h4>INDICATORS OF EFFECTIVENESS</h4>
  
  
              <div id="accordion_c2_s5">
              <input type="hidden" id="criteriaTwoStandardFiveId" value=" <?=isset($criteria_two_standard_five->cid)?$criteria_two_standard_five->cid:'' ?>">
          
              <div class="card">
    <div class="card-header" id="heading-j1">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">
    <div class="ib-m">
    5.1 Affiliate dues are forwarded to the National Urban League in accordance with National Urban League policy, and is the affiliate current with 
    payments? 
    </div>
    </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j1" aria-expanded="false" aria-controls="collapse-j1">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-j1" class="collapse " aria-labelledby="heading-j1" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_1_checkbox_1" for="c2_s5_5_1_checkbox_1">
    <input type="checkbox" id="c2_s5_5_1_checkbox_1" name="c2_s5_5_1_checkbox_1">
    </label>
    </div>
    
    </div>
    </div>
    
    <div class="contentDate my-3">
    
    <div class="col-20">
    <div class="f-medium p-t-20"><div class="f-medium m-x-15">
    Verification Source or Comment(s): Affiliate dues deposit and transmittal records
    </div></div>
    </div>
    
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_1_rating_1">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.2 All members of the board of directors, employed staff, and operational volunteers, annually sign a conflict-of-interest, code of conduct and 
    confidentiality statements </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j2" aria-expanded="true" aria-controls="collapse-j2">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j2" class="collapse" aria-labelledby="heading-j2" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_2_checkbox_1" for="c2_s5_5_2_checkbox_1">
    <input type="checkbox" id="c2_s5_5_2_checkbox_1" name="c2_s5_5_2_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Copies of signed statements
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_2_rating_1">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-j3">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.3 The affiliate has a written risk management plan, reviewed annually, which includes a plan to protect and utilize affiliate assets. 
    (E.g. crisis communication plan, D&O Insurance, property insurance, fiscal controls). </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j3" aria-expanded="true" aria-controls="collapse-j3">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j3" class="collapse" aria-labelledby="heading-j3" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_3_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_3_checkbox_1" for="c2_s5_5_3_checkbox_1">
    <input type="checkbox" id="c2_s5_5_3_checkbox_1" name="c2_s5_5_3_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Written Risk Management Plan; agency insurance summary
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_3_rating_1">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-j4">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.4 The affiliate board has written policies for use of Urban League property by outside groups that minimize potential liability for the affiliate. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j4" aria-expanded="true" aria-controls="collapse-j4">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j4" class="collapse" aria-labelledby="heading-j4" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_4_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_4_checkbox_1" for="c2_s5_5_4_checkbox_1">
    <input type="checkbox" id="c2_s5_5_4_checkbox_1" name="c2_s5_5_4_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Written Policies and Procedures for property use
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" id="c2_s5_5_4_rating_1" class="border-red">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j5">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.5 The affiliate owns or leases sites and facilities needed to support services. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j5" aria-expanded="true" aria-controls="collapse-j5">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j5" class="collapse" aria-labelledby="heading-j5" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_5_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_5_checkbox_1" for="c2_s5_5_5_checkbox_1">
    <input type="checkbox" id="c2_s5_5_5_checkbox_1" name="c2_s5_5_5_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Deeds and leases and/or agreements for all affiliate sites
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_5_rating_1">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j6">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.6 The affiliate repairs, replaces, and maintains affiliate land, buildings, and equipment as needed and in accordance with a long-range property 
    acquisition, maintenance and utilization plan. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j6" aria-expanded="true" aria-controls="collapse-j6">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j6" class="collapse" aria-labelledby="heading-j6" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_6_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_6_checkbox_1" for="c2_s5_5_6_checkbox_1">
    <input type="checkbox" id="c2_s5_5_6_checkbox_1" name="c2_s5_5_6_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Long-range property acquisition, maintenance and utilization plan
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_6_rating_1">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.7 The affiliate has a capital budget funded to meet its long-range property needs. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j7" aria-expanded="true" aria-controls="collapse-j7">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j7" class="collapse" aria-labelledby="heading-j7" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_7_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_7_checkbox_1" for="c2_s5_5_7_checkbox_1">
    <input type="checkbox" id="c2_s5_5_7_checkbox_1" name="c2_s5_5_7_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Copy of capital budget; long-range strategies for property; and fund development (capital campaign) 
    strategies.
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_7_rating_1">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j8">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.8 Duplicates of all vital documents (i.e., property documents, insurance papers, charter, state articles of incorporation, minutes, etc.), 
    are complete, up-to-date and are kept in a c (fire-proof safe), or in a secure location away from the affiliate`s location. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j8" aria-expanded="true" aria-controls="collapse-j8">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j8" class="collapse" aria-labelledby="heading-j8" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_8_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_8_checkbox_1" for="c2_s5_5_8_checkbox_1">
    <input type="checkbox" id="c2_s5_5_8_checkbox_1" name="c2_s5_5_8_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Copy of written procedures related to location and retrieval of documents.
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_8_rating_1">
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j1">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">
    <div class="ib-m">
    5.1 Affiliate dues are forwarded to the National Urban League in accordance with National Urban League policy, and is the affiliate current with 
    payments? 
    </div>
    </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j1" aria-expanded="false" aria-controls="collapse-j1">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    
    <div class="card-body">
    <div id="collapse-j1" class="collapse " aria-labelledby="heading-j1" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 ">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_1_checkbox_1" for="c2_s5_5_1_checkbox_1">
    <input type="checkbox" id="c2_s5_5_1_checkbox_1" name="c2_s5_5_1_checkbox_1">
    </label>
    </div>
    
    </div>
    </div>
    
    <div class="contentDate my-3">
    
    <div class="col-20">
    <div class="f-medium p-t-20"><div class="f-medium m-x-15">
    Verification Source or Comment(s): Affiliate dues deposit and transmittal records
    </div></div>
    </div>
    
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_1_rating_1">
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.2 All members of the board of directors, employed staff, and operational volunteers, annually sign a conflict-of-interest, code of conduct and 
    confidentiality statements </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j2" aria-expanded="true" aria-controls="collapse-j2">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j2" class="collapse" aria-labelledby="heading-j2" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_2_checkbox_1" for="c2_s5_5_2_checkbox_1">
    <input type="checkbox" id="c2_s5_5_2_checkbox_1" name="c2_s5_5_2_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Copies of signed statements
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_2_rating_1">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-j3">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.3 The affiliate has a written risk management plan, reviewed annually, which includes a plan to protect and utilize affiliate assets. 
    (E.g. crisis communication plan, D&O Insurance, property insurance, fiscal controls). </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j3" aria-expanded="true" aria-controls="collapse-j3">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j3" class="collapse" aria-labelledby="heading-j3" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_3_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_3_checkbox_1" for="c2_s5_5_3_checkbox_1">
    <input type="checkbox" id="c2_s5_5_3_checkbox_1" name="c2_s5_5_3_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Written Risk Management Plan; agency insurance summary
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_3_rating_1">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-j4">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.4 The affiliate board has written policies for use of Urban League property by outside groups that minimize potential liability for the affiliate. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j4" aria-expanded="true" aria-controls="collapse-j4">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j4" class="collapse" aria-labelledby="heading-j4" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_4_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_4_checkbox_1" for="c2_s5_5_4_checkbox_1">
    <input type="checkbox" id="c2_s5_5_4_checkbox_1" name="c2_s5_5_4_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Written Policies and Procedures for property use
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" id="c2_s5_5_4_rating_1" class="border-red">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j5">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.5 The affiliate owns or leases sites and facilities needed to support services. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j5" aria-expanded="true" aria-controls="collapse-j5">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j5" class="collapse" aria-labelledby="heading-j5" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_5_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_5_checkbox_1" for="c2_s5_5_5_checkbox_1">
    <input type="checkbox" id="c2_s5_5_5_checkbox_1" name="c2_s5_5_5_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Deeds and leases and/or agreements for all affiliate sites
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_5_rating_1">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j6">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.6 The affiliate repairs, replaces, and maintains affiliate land, buildings, and equipment as needed and in accordance with a long-range property 
    acquisition, maintenance and utilization plan. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j6" aria-expanded="true" aria-controls="collapse-j6">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j6" class="collapse" aria-labelledby="heading-j6" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_6_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_6_checkbox_1" for="c2_s5_5_6_checkbox_1">
    <input type="checkbox" id="c2_s5_5_6_checkbox_1" name="c2_s5_5_6_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Long-range property acquisition, maintenance and utilization plan
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_6_rating_1">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.7 The affiliate has a capital budget funded to meet its long-range property needs. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j7" aria-expanded="true" aria-controls="collapse-j7">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j7" class="collapse" aria-labelledby="heading-j7" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_7_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_7_checkbox_1" for="c2_s5_5_7_checkbox_1">
    <input type="checkbox" id="c2_s5_5_7_checkbox_1" name="c2_s5_5_7_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Copy of capital budget; long-range strategies for property; and fund development (capital campaign) 
    strategies.
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_7_rating_1">
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-j8">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">5.8 Duplicates of all vital documents (i.e., property documents, insurance papers, charter, state articles of incorporation, minutes, etc.), 
    are complete, up-to-date and are kept in a c (fire-proof safe), or in a secure location away from the affiliate`s location. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-j8" aria-expanded="true" aria-controls="collapse-j8">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-j8" class="collapse" aria-labelledby="heading-j8" data-parent="#accordion_c2_s5">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s5_5_8_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s5_5_8_checkbox_1" for="c2_s5_5_8_checkbox_1">
    <input type="checkbox" id="c2_s5_5_8_checkbox_1" name="c2_s5_5_8_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Copy of written procedures related to location and retrieval of documents.
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s5_5_8_rating_1">
    </div>
    
    </div>
    
   
                <!-- </?=isset($criteria_two_standard_five->question)?$criteria_two_standard_five->question:'' ?> -->
                
                <div class="my-3">
  
            <!-- <div class="p-b-0 ratingBottom">
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
            </div> -->

          </div>
          </div>


          </div>
      </div>
    
    
    </div></div>
  
    
  
   </div>
  
  </div>
   <!--end criteria 2 standard 5 -->



   <!--end criteria 2 standard 6-->
   <div class="wrapouterContents" id="wpContent-x6">
                    
    <div class="criteria">
  
      <div class="d-block">
  
       
  
      
  
      </div>
  
      <div class="d-block">
  
        <div class="headOuter">
            <div class="head">
                <h3>Human Resources</h3>
            </div>
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
              
                <div class="card">
    <div class="card-header" id="heading-jr7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">6.1 The affiliate board has established a restricted cash reserve to be held in perpetuity, with an income stream to support activities of the affiliate. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-jr7" aria-expanded="true" aria-controls="collapse-jr7">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-jr7" class="collapse" aria-labelledby="heading-jr7" data-parent="#accordion_c2_s6">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s6_6_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s6_6_1_checkbox_1" for="c2_s6_6_1_checkbox_1">
    <input type="checkbox" id="c2_s6_6_1_checkbox_1" name="c2_s6_6_1_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium p-x-15">Verification Source or Comment(s): Board minutes, 
    <input type="text" class="smlInp" id="c2_s6_6_1_val_1" placeholder="00"> ; copy of trust agreement or other documents; affiliate audit</div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c2_s6_6_1_rating_1" >
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    <div class="card">
    <div class="card-header" id="heading-jr8">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">6.2 The affiliate board of directors maintains control of all restricted funds.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-jr8" aria-expanded="true" aria-controls="collapse-jr8">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-jr8" class="collapse" aria-labelledby="heading-jr8" data-parent="#accordion_c2_s6">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s6_6_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s6_6_2_checkbox_1" for="c2_s6_6_2_checkbox_1">
    <input type="checkbox" id="c2_s6_6_2_checkbox_1" name="c2_s6_6_2_checkbox_1">
    </label>
    </div>
    
    
    
    
    </div>
    </div>
    <div class="contentDate my-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Affiliate board minutes, 
    <input type="text" class="smlInp" id="c2_s6_6_2_val_1" placeholder="00"> ; bylaws, Page -
    <input type="text" class="smlInp" id="c2_s6_6_2_val_2" placeholder="00">
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c2_s6_6_2_rating_1" >
    </div>
    
    </div>
    
    
              <!-- </?=isset($criteria_two_standard_six->question)?$criteria_two_standard_six->question:'' ?> -->
               
              <div class="my-3">
  
         
  
          </div>
        </div>
  
     
    </div>
        </div>
  
  
  
  </div></div>  
  
     
  
   </div>
  
  </div>
   <!--end criteria 2 standard 6 -->



   <!--end criteria 2 standard 7 -->

   <div class="wrapouterContents" id="wpContent-x7">
                    
    <div class="criteria">
  
  
        <div class="d-block">
       
  
     
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
            <div class="card">
    <div class="card-header" id="heading-ur7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">7.1 The board has adopted corporate goals and objectives that give direction to the total work of the affiliate. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ur7" aria-expanded="true" aria-controls="collapse-ur7">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div class="card-body">
    <div id="collapse-ur7" class="collapse" aria-labelledby="heading-ur7" data-parent="#accordion_c2_s7">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s7_7_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s7_7_1_checkbox_1" for="c2_s7_7_1_checkbox_1">
    <input type="checkbox" id="c2_s7_7_1_checkbox_1" name="c2_s7_7_1_checkbox_1">
    </label>
    </div>
   
    
   
    
    </div>
    </div>
    <div class="contentDate my-3">
   
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Strategic Plan: Date 
    
    <div class="ib-m">
    <div class="yearPick mx-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c2_s7_7_1_date_1" placeholder="YY-MM-DD" type="text">
    </div> </div>
    </div>
    </div>
   
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s7_7_1_rating_1" >
    </div>
   
    </div>
   
   
    </div>
   
    
    </div>
   
   <div class="card">
    <div class="card-header" id="heading-ur2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">7.2 The staffing structure, as determined by the President/CEO, supports the corporate goals and a reporting system is in place that includes regular 
    written management reports to the board of directors based on the achievement of integrated objectives. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ur2" aria-expanded="true" aria-controls="collapse-ur2">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div class="card-body">
    <div id="collapse-ur2" class="collapse" aria-labelledby="heading-ur2" data-parent="#accordion_c2_s7">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s7_7_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s7_7_2_checkbox_1" for="c2_s7_7_2_checkbox_1">
    <input type="checkbox" id="c2_s7_7_2_checkbox_1" name="c2_s7_7_2_checkbox_1">
    </label>
    </div>
   
    
   
    
    </div>
    </div>
    <div class="contentDate my-3">
   
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): President/CEO`s reports; organizational chart
    
    
    </div>
    </div>
   
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s7_7_2_rating_1" >
    </div>
   
    </div>
   
   
    </div>
   
    
    </div>
   
    <div class="card">
    <div class="card-header" id="heading-ur4">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">7.3 The board adopts the affiliate budget, inclusive of the operating and capital budgets, based on the integrated operating objectives and long-range 
    strategies for property, fund development, membership, program, and finance management.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ur4" aria-expanded="true" aria-controls="collapse-ur4">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div class="card-body">
    <div id="collapse-ur4" class="collapse" aria-labelledby="heading-ur4" data-parent="#accordion_c2_s7">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s7_7_3_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s7_7_3_checkbox_1" for="c2_s7_7_3_checkbox_1">
    <input type="checkbox" id="c2_s7_7_3_checkbox_1" name="c2_s7_7_3_checkbox_1">
    </label>
    </div>
   
    
   
    
    </div>
    </div>
    <div class="contentDate my-3">
   
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Board approval, Date
    
    <div class="ib-m">
    <div class="yearPick mx-2">
    <i class="i i-year-pick"></i>
    <input class="datepick form-control" id="c2_s7_7_3_date_1" placeholder="YY-MM-DD" type="text">
    </div> </div>
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s7_7_3_rating_1" >
    </div>
    
    </div>
    
   
    </div>
   
    
    </div>
   
   
   <div class="card">
    <div class="card-header" id="heading-ur8">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">7.4 The board has delegated the responsibility for operational management to the President/CEO. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ur8" aria-expanded="true" aria-controls="collapse-ur8">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    
    <div class="card-body">
    <div id="collapse-ur8" class="collapse" aria-labelledby="heading-ur8" data-parent="#accordion_c2_s7">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s7_7_4_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div>
    <label class="checkbox switch bool c2_s7_7_4_checkbox_1" for="c2_s7_7_4_checkbox_1">
    <input type="checkbox" id="c2_s7_7_4_checkbox_1" name="c2_s7_7_4_checkbox_1">
    </label>
    </div>
   
    
   
    
    </div>
    </div>
    <div class="contentDate my-3">
   
    <div class="col">
    <div class="f-medium m-x-15">
    Verification Source or Comment(s): Bylaws,<input type="text" id="c2_s7_7_4_val_1" class="smlInp" placeholder="00"> President/CEO`s position description
    </div>
    </div>
   
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text" onblur="checkrating(this)" class="border-red" id="c2_s7_7_4_rating_1" >
    </div>
   
    </div>
   
   
              <!-- </?=isset($criteria_two_standard_seven->question)?$criteria_two_standard_seven->question:'' ?> -->
              <div class="my-3">
  
         

          </div>
          </div>


</div>
            
     
    </div>
          </div>
      </div>
  
      
  
   </div>
  
  </div>

   <!--end criteria 2 standard 7 -->




   <!--end criteria 2 standard 8 -->
   <div class="wrapouterContents" id="wpContent-x8">
                    
    <div class="criteria">
  
      <div class="d-block">
  
  
  
    
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
              <div class="card">
    <div class="card-header" id="heading-ug7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.1 List at least three ways how the affiliate monitors changes in legal and regulatory requirements</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ug7" aria-expanded="true" aria-controls="collapse-ug7">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-ug7" class="collapse" aria-labelledby="heading-ug7" data-parent="#accordion_c2_s8">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s8_8_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div class="p-y-5">
    1 
    <label class="checkbox c2_s8_8_1_checkbox_1" for="c2_s8_8_1_checkbox_1">
    <input type="checkbox" id="c2_s8_8_1_checkbox_1" name="c2_s8_8_1_checkbox_1">
    </label>
    </div>
    
    <div class="p-y-5">
    2 
    <label class="checkbox c2_s8_8_1_checkbox_2" for="c2_s8_8_1_checkbox_2">
    <input type="checkbox" id="c2_s8_8_1_checkbox_2" name="c2_s8_8_1_checkbox_2">
    </label>
    </div>
    
    <div class="p-y-5">
    3 
    <label class="checkbox c2_s8_8_1_checkbox_3" for="c2_s8_8_1_checkbox_3">
    <input type="checkbox" id="c2_s8_8_1_checkbox_3" name="c2_s8_8_1_checkbox_3">
    </label>
    </div>
    
    
    
    </div>
    </div>
    <div class="contentDate mb-3">
    
    
    
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c2_s8_8_1_rating_1" >
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    
    <div class="card">
    <div class="card-header" id="heading-ug2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.2 Provide a copy of the affiliate`s document retention policy and schedule.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ug2" aria-expanded="true" aria-controls="collapse-ug2">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-ug2" class="collapse" aria-labelledby="heading-ug2" data-parent="#accordion_c2_s8">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s8_8_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="contentDate mb-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
        <a onclick="c2s8_2_href();" id="c2s8_2_href"> <i class="i i-upld-icn"></i></a>

    
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c2_s8_8_2_rating_1" >
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    
    <div class="card">
    <div class="card-header" id="heading-ug8">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.3 Describe, in writing, how the affiliate internally reviews its compliance with existing legal, regulatory, financial and National Urban League 
    requirements. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ug8" aria-expanded="true" aria-controls="collapse-ug8">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-ug8" class="collapse" aria-labelledby="heading-ug8" data-parent="#accordion_c2_s8">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s8_8_3_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-ug7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.1 List at least three ways how the affiliate monitors changes in legal and regulatory requirements</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ug7" aria-expanded="true" aria-controls="collapse-ug7">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-ug7" class="collapse" aria-labelledby="heading-ug7" data-parent="#accordion_c2_s8">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s8_8_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div class="p-y-5">
    1 
    <label class="checkbox c2_s8_8_1_checkbox_1" for="c2_s8_8_1_checkbox_1">
    <input type="checkbox" id="c2_s8_8_1_checkbox_1" name="c2_s8_8_1_checkbox_1">
    </label>
    </div>
    
    <div class="p-y-5">
    2 
    <label class="checkbox c2_s8_8_1_checkbox_2" for="c2_s8_8_1_checkbox_2">
    <input type="checkbox" id="c2_s8_8_1_checkbox_2" name="c2_s8_8_1_checkbox_2">
    </label>
    </div>
    
    <div class="p-y-5">
    3 
    <label class="checkbox c2_s8_8_1_checkbox_3" for="c2_s8_8_1_checkbox_3">
    <input type="checkbox" id="c2_s8_8_1_checkbox_3" name="c2_s8_8_1_checkbox_3">
    </label>
    </div>
    
    
    
    </div>
    </div>
    <div class="contentDate mb-3">
    
    
    
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c2_s8_8_1_rating_1" >
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    
    <div class="card">
    <div class="card-header" id="heading-ug2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.2 Provide a copy of the affiliate`s document retention policy and schedule.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ug2" aria-expanded="true" aria-controls="collapse-ug2">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-ug2" class="collapse" aria-labelledby="heading-ug2" data-parent="#accordion_c2_s8">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s8_8_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="contentDate mb-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
        <a onclick="c2s8_2_href();" id="c2s8_2_href"> <i class="i i-upld-icn"></i></a>

    
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c2_s8_8_2_rating_1" >
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    
    <div class="card">
    <div class="card-header" id="heading-ug8">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.3 Describe, in writing, how the affiliate internally reviews its compliance with existing legal, regulatory, financial and National Urban League 
    requirements. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ug8" aria-expanded="true" aria-controls="collapse-ug8">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-ug8" class="collapse" aria-labelledby="heading-ug8" data-parent="#accordion_c2_s8">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s8_8_3_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    
    <div class="card">
    <div class="card-header" id="heading-ug7">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.1 List at least three ways how the affiliate monitors changes in legal and regulatory requirements</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ug7" aria-expanded="true" aria-controls="collapse-ug7">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-ug7" class="collapse" aria-labelledby="heading-ug7" data-parent="#accordion_c2_s8">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s8_8_1_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    
    <div class="p-y-5">
    1 
    <label class="checkbox c2_s8_8_1_checkbox_1" for="c2_s8_8_1_checkbox_1">
    <input type="checkbox" id="c2_s8_8_1_checkbox_1" name="c2_s8_8_1_checkbox_1">
    </label>
    </div>
    
    <div class="p-y-5">
    2 
    <label class="checkbox c2_s8_8_1_checkbox_2" for="c2_s8_8_1_checkbox_2">
    <input type="checkbox" id="c2_s8_8_1_checkbox_2" name="c2_s8_8_1_checkbox_2">
    </label>
    </div>
    
    <div class="p-y-5">
    3 
    <label class="checkbox c2_s8_8_1_checkbox_3" for="c2_s8_8_1_checkbox_3">
    <input type="checkbox" id="c2_s8_8_1_checkbox_3" name="c2_s8_8_1_checkbox_3">
    </label>
    </div>
    
    
    
    </div>
    </div>
    <div class="contentDate mb-3">
    
    
    
    <div class="col col-24 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c2_s8_8_1_rating_1" >
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    
    <div class="card">
    <div class="card-header" id="heading-ug2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.2 Provide a copy of the affiliate`s document retention policy and schedule.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ug2" aria-expanded="true" aria-controls="collapse-ug2">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-ug2" class="collapse" aria-labelledby="heading-ug2" data-parent="#accordion_c2_s8">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s8_8_2_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    <div class="contentDate mb-3">
    
    <div class="col">
    <div class="f-medium m-x-15">
        <a onclick="c2s8_2_href();" id="c2s8_2_href"> <i class="i i-upld-icn"></i></a>

    
    </div>
    </div>
    
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c2_s8_8_2_rating_1" >
    </div>
    
    </div>
    
    
    </div>
    
    
    </div>
    
    
    
    <div class="card">
    <div class="card-header" id="heading-ug8">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.3 Describe, in writing, how the affiliate internally reviews its compliance with existing legal, regulatory, financial and National Urban League 
    requirements. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-ug8" aria-expanded="true" aria-controls="collapse-ug8">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div class="card-body">
    <div id="collapse-ug8" class="collapse" aria-labelledby="heading-ug8" data-parent="#accordion_c2_s8">
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c2_s8_8_3_comment_1" placeholder="comment">
    </div>
    
    </div> </div>
    
    
    
                <!-- </?=isset($criteria_two_standard_eight->question)?$criteria_two_standard_eight->question:'' ?> -->
                <div class="contentDate my-3">
  
  <div class="col">
    <div class="f-medium m-x-15">

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
  
       
  
   </div>
  
  </div>
   <!--end criteria 2 standard 8 -->






  </div>




  <div class="tab-pane fade" id="nav-x3" role="tabpanel" aria-labelledby="nav-x3-tab" style="display: contents!important;">

   

<!-- criteria 3 standard 1 -->


<div class="wrapouterContents active" id="wpContent-dt-1">

  <div class="criteria">
       <div class="headOuter">
           <div class="head">
             
               <h3 class="ib-m">Criteria 3: Implementation of Mission  </h3>
                <a class="iconLink ib-m" href="<?php echo base_url('module/assessment/assessment-summary?sid='.$_GET['sid'].'&aid='.$_GET['aid']); ?>">
                <i class="i i-timer"></i>
                </a>
           </div>
       </div>
       <h3 >Criteria 3: Implementation of Mission  </h3>
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

         <div class="card">
    <div class="card-header" id="headingOne-11">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.1 PROFESSIONAL QUALITY OVERVIEW. The affiliate has a professional quality overview of programs. The overview includes at a minimum; the 
    needs addressed through the program(s), description of the services, length of program, participation requirements and expected client 
    outcomes. Content, delivery and format should be culturally relevant and where appropriate materials should be available in languages that 
    reflect the population served. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-11" aria-expanded="flase" aria-controls="collapseOne-11">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOne-11" class="collapse" aria-labelledby="headingOne-11" data-parent="#accordion_c3_s1">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s1_1_1_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
    <label class="checkbox switch bool c3_s1_1_1_checkbox_1" for="c3_s1_1_1_checkbox_1">
    <input type="checkbox" id="c3_s1_1_1_checkbox_1" name="c3_s1_1_1_checkbox_1">
    </label>
    </div>
   
    <div class="contentDate">
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of current program overview(s) to include contract dates, contract funder, contract number 
    and contract amount</span>
    </div>
    <div class="col col-3 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s1_1_1_rating_1" >
    </div>
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingTw">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.2 COMPREHENSIVE CLIENT INTAKE. The affiliate has a system for conducting a comprehensive client intake as appropriate. At a minimum, 
    the Intake should include background information; identify client needs; and program interest. Specific intake information required by 
    programmatic area should be included. All clients are assigned a unique identification number at Intake which is used to track and monitor 
    participation and outcomes over the service and follow-up period. The use of an electronic client management system is preferred. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTw" aria-expanded="false" aria-controls="collapseTw">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseTw" class="collapse" aria-labelledby="headingTw" data-parent="#accordion_c3_s1">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s1_1_2_comment_1" placeholder="comment">
    </div>
    </div>
    
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s1_1_2_checkbox_1" for="c3_s1_1_2_checkbox_1">
    <input type="checkbox" id="c3_s1_1_2_checkbox_1" name="c3_s1_1_2_checkbox_1">
    </label>
   
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
   
    <span>Verification Source or Comment(s): Copy of current program intake form(s) </span>
    
    </div>
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s1_1_2_rating_1" >
    </div>
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingThree-t3">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.3 CLIENT ACTION PLANS. The affiliate program(s) develops and monitors client action plans as appropriate. The action plan includes measurable 
    goals and benchmarks and is developed in partnership with the client. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseThree-t3" aria-expanded="false" aria-controls="collapseThree-t3">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseThree-t3" class="collapse" aria-labelledby="headingThree-t3" data-parent="#accordion_c3_s1">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s1_1_3_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s1_1_3_checkbox_1" for="c3_s1_1_3_checkbox_1">
    <input type="checkbox" id="c3_s1_1_3_checkbox_1" name="c3_s1_1_3_checkbox_1">
    </label>
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
   
    <span>Verification Source or Comment(s): Copy of Client Action Plans </span>
    
    </div>
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s1_1_3_rating_1" >
    </div>
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingFour-f3">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.4 SERVICE CONTRACTS. The affiliate program(s) requires client and provider to sign a service contract which outlines both client and program 
    responsibilities.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFour-f3" aria-expanded="false" aria-controls="collapseFour-f3">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseFour-f3" class="collapse" aria-labelledby="headingFour-f3" data-parent="#accordion_c3_s1">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s1_1_4_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s1_1_4_checkbox_1" for="c3_s1_1_4_checkbox_1">
    <input type="checkbox" id="c3_s1_1_4_checkbox_1" name="c3_s1_1_4_checkbox_1">
    </label>
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
   
    <span>Verification Source or Comment(s): Copy of Client Action Plans </span>
    
    </div>
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s1_1_4_rating_1" >
    </div>
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingFive-f3">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.5 SKILLS AND APTITUDE ASSESSMENTS. The affiliate uses validated assessments to assess client skills and aptitude, where required.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFive-f3" aria-expanded="false" aria-controls="collapseFive-f3">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseFive-f3" class="collapse" aria-labelledby="headingFive-f3" data-parent="#accordion_c3_s1">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s1_1_5_comment_1" placeholder="comment">
    </div>
    </div>
    
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s1_1_5_checkbox_1" for="c3_s1_1_5_checkbox_1">
    <input type="checkbox" id="c3_s1_1_5_checkbox_1" name="c3_s1_1_5_checkbox_1">
    </label>
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of assessments by program(s)</span>
    </div>
    <div class="col col-5 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s1_1_5_rating_1" >
    </div>
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingSix-f13">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.6 WRITTEN REFERRAL NETWORK. The affiliate has a written referral network for individuals and families seeking services NOT provided by the affiliate.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSix-f13" aria-expanded="false" aria-controls="collapseSix-f13">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseSix-f13" class="collapse" aria-labelledby="headingSix-f13" data-parent="#accordion_c3_s1">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s1_1_6_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s1_1_6_checkbox_1" for="c3_s1_1_6_checkbox_1">
    <input type="checkbox" id="c3_s1_1_6_checkbox_1" name="c3_s1_1_6_checkbox_1">
    </label>
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of referral network(s) and service contacts</span>
    </div>
    <div class="col col-3 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s1_1_6_rating_1" >
    </div>
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingSeven-se2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">1.7 CLIENT EVALUATION FORM. The affiliate provides clients with a user-friendly survey to evaluate services received. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSeven-se2" aria-expanded="false" aria-controls="collapseSeven-se2">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseSeven-se2" class="collapse" aria-labelledby="headingSeven-se2" data-parent="#accordion_c3_s1">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s1_1_7_comment_1" placeholder="comment">
    </div>
    </div>
    
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s1_1_7_checkbox_1" for="c3_s1_1_7_checkbox_1">
    <input type="checkbox" id="c3_s1_1_7_checkbox_1" name="c3_s1_1_7_checkbox_1">
    </label>
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of survey instrument(s)</span>
    </div>
    <div class="col col-4 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s1_1_7_rating_1" >
    </div>
   </div>
   
   </div>
          <!-- </?=isset($criteria_three_standard_one->question)?$criteria_three_standard_one->question:'' ?> -->
   
         </div>

         <div class="my-3">

       

         </div>

     </div>
    

   </div>

</div>

<!-- end criteria 3 standard 1 -->

<!-- criteria 3 standard 2 -->
<div class="wrapouterContents" id="wpContent-dt-2">
       
  <div class="criteria">


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
     
          <!-- </?=isset($criteria_three_standard_two->question)?$criteria_three_standard_two->question:'' ?> -->
          <div class="card">
    <div class="card-header" id="heading1111">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">2.1 Statement of Clients Rights. The affiliate provides clients a written statement of their rights when seeking social services, including their right 
    to file a grievance of the service provided. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse1111" aria-expanded="false" aria-controls="collapse1111">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapse1111" class="collapse" aria-labelledby="heading1111" data-parent="#accordion_c3_s2">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s2_2_1_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
    <label class="checkbox switch bool c3_s2_2_1_checkbox_1" for="c3_s2_2_1_checkbox_1">
    <input type="checkbox" id="c3_s2_2_1_checkbox_1" name="c3_s2_2_1_checkbox_1">
    </label>
    </div>
   
    <div class="contentDate">
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of Statement of Client`s Rights </span>
    </div>
    <div class="col col-3 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s2_2_1_rating_1" >
    </div>
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="heading2222">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">2.2 Grievance Procedures. A grievance process is in place and written procedures for filing a grievance are available to clients. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse2222" aria-expanded="true" aria-controls="collapse2222">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapse2222" class="collapse" aria-labelledby="heading2222" data-parent="#accordion_c3_s2">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s2_2_2_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
    <label class="checkbox switch bool c3_s2_2_2_checkbox_1" for="c3_s2_2_2_checkbox_1">
    <input type="checkbox" id="c3_s2_2_2_checkbox_1" name="c3_s2_2_2_checkbox_1">
    </label>
    </div>
   
    <div class="contentDate">
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of Grievance Procedure </span>
    </div>
    <div class="col col-3 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s2_2_2_rating_1" >
    </div>
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="heading-su-1">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">2.3 Protect Client Confidentiality. The affiliate has in place procedures for collecting and sharing confidential and personal information. The affiliate 
    provides private areas for collecting confidential information. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapse-su-1" aria-expanded="true" aria-controls="collapse-su-1">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapse-su-1" class="collapse" aria-labelledby="heading-su-1" data-parent="#accordion_c3_s2">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s2_2_3_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
    <label class="checkbox switch bool c3_s2_2_3_checkbox_1" for="c3_s2_2_3_checkbox_1">
    <input type="checkbox" id="c3_s2_2_3_checkbox_1" name="c3_s2_2_3_checkbox_1">
    </label>
   </div>
   
   <div class="contentDate">
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of Client Confidentiality Statement</span>
    </div>
    <div class="col col-3 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s2_2_3_rating_1">
    </div>
   </div>
   
   </div>
       
      </div>

      <div class="my-3">

        

      </div>

  </div>

</div>



</div>
<!-- end criteria 3 standard 2 -->

<!---- criteria 3 standard 3 -->

<div class="wrapouterContents" id="wpContent-dt-3">
       
  <div class="criteria">

   


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

      <div class="card">
    <div class="card-header" id="headingOness">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.1 Client Management System. The affiliate has in place a client management system to collect and maintain client records. An electronic system is 
    preferred. Paper and electronic files are maintained in either secure file cabinets or electronically in a secure data system. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOness" aria-expanded="false" aria-controls="collapseOness">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOness" class="collapse" aria-labelledby="headingOness" data-parent="#accordion_c3_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s3_3_1_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s3_3_1_checkbox_1" for="c3_s3_3_1_checkbox_1">
    <input type="checkbox" id="c3_s3_3_1_checkbox_1" name="c3_s3_3_1_checkbox_1">
    </label>
   
    </div>
   
    <div class="col contentDate d-flex align-items-center">
   
    <div class="d-flex align-items-center">
    <span>Verification Source or Comment(s): Description of Client Management System</span>
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s3_3_1_rating_1" >
    </div>
   
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingTwosss">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.2 Maintaining Client Records. The affiliate has in place procedures for maintaining client records in an easily retrieval format for at least 3 years or in 
    accordance with programmatic requirements. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTwosss" aria-expanded="false" aria-controls="collapseTwosss">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseTwosss" class="collapse" aria-labelledby="headingTwosss" data-parent="#accordion_c3_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s3_3_2_comment_1" placeholder="comment">
    </div>
    </div>
    
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s3_3_2_checkbox_1" for="c3_s3_3_2_checkbox_1">
    <input type="checkbox" id="c3_s3_3_2_checkbox_1" name="c3_s3_3_2_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Copy of affiliate Retention Policy </span>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s3_3_2_rating_1" >
    </div>
   
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingTwos-2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">3.3 Destroying Records. The affiliate has written guidelines for destroying client records and when appropriate shreds client records to protect 
    sensitive client information.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTwos-2" aria-expanded="false" aria-controls="collapseTwos-2">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseTwos-2" class="collapse" aria-labelledby="headingTwos-2" data-parent="#accordion_c3_s3">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s3_3_3_comment_1" placeholder="comment">
    </div>
    </div>
    
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s3_3_3_checkbox_1" for="c3_s3_3_3_checkbox_1">
    <input type="checkbox" id="c3_s3_3_3_checkbox_1" name="c3_s3_3_3_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Copy of affiliate Retention Policy </span>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s3_3_3_rating_1">
    </div>
   
    </div>
   
   </div>
          <!-- </?=isset($criteria_three_standard_three->question)?$criteria_three_standard_three->question:'' ?> -->
    
      </div>

      <div class="my-3 d-flex justify-content-start">

       
      </div>
  </div>

</div>




</div>
<!-- end criteria 3 standard 3 -->


<!-- criteria 3 standard 4 -->

<div class="wrapouterContents" id="wpContent-dt-4">
       
  <div class="criteria">

    

   

  </div>

<div class="criteria">



<div class="criteriaBottom">
    <h5>Standard 4</h5>
    <p>The affiliate recruits, hires and trains qualified program staff for quality direct? services.</p>
    <h4>INDICATORS OF EFFECTIVENESS</h4>

    <div id="accordion_c3_s4">
    <input type="hidden" id="criteriaThreeStandardFourId" value=" <?=isset($criteria_three_standard_four->cid)?$criteria_three_standard_four->cid:'' ?>">
    <div class="card">
    <div class="card-header" id="headingOne-111">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">4.1 Core Competencies. The affiliate has written core competences for program staff which are used in recruiting, interviewing and hiring. 
    Core competencies should include strong knowledge in the service area as demonstrated by experience, educational level, and certification. 
    Specific core competencies for programmatic areas should be incorporated in hiring procedures as appropriate. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-111" aria-expanded="false" aria-controls="collapseOne-111">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOne-111" class="collapse" aria-labelledby="headingOne-111" data-parent="#accordion_c3_s4">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s4_4_1_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s4_4_1_checkbox_1" for="c3_s4_4_1_checkbox_1">
    <input type="checkbox" id="c3_s4_4_1_checkbox_1" name="c3_s4_4_1_checkbox_1">
    </label>
   
    </div>
   
    <div class="col contentDate d-flex align-items-center">
   
    <div class="d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of staff core competencies and job descriptions </span>
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s4_4_1_rating_1">
    </div>
   
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingTwo-222">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">4.2 Educational Requirements. The affiliate has required educational levels for program staff. Bachelors degrees in appropriate areas are encouraged 
    for staff working directly with clients.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseTwo-222" aria-expanded="false" aria-controls="collapseTwo-222">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseTwo-222" class="collapse" aria-labelledby="headingTwo-222" data-parent="#accordion_c3_s4">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s4_4_2_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s4_4_2_checkbox_1" for="c3_s4_4_2_checkbox_1">
    <input type="checkbox" id="c3_s4_4_2_checkbox_1" name="c3_s4_4_2_checkbox_1">
    </label>
   
    </div>
   
    <div class="contentDate">
    <div class="d-flex align-items-center">
    <span>Verification Source or Comment(s): Job descriptions</span>
    </div>
    <div class="col col-3 d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s4_4_2_rating_1">
    </div>
    </div>
   
    </div>
    
   </div>
   <div class="card">
    <div class="card-header" id="headingThree-t4">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">4.3 Continuing Education. The affiliate encourages staff to receive additional continuing education and provides relevant information and referrals. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseThree-t4" aria-expanded="false" aria-controls="collapseThree-t4">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseThree-t4" class="collapse" aria-labelledby="headingThree-t4" data-parent="#accordion_c3_s4">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s4_4_3_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s4_4_3_checkbox_1" for="c3_s4_4_3_checkbox_1">
    <input type="checkbox" id="c3_s4_4_3_checkbox_1" name="c3_s4_4_3_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Copy of affiliate continuing education policy and log of continuing education for staff</span>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s4_4_3_rating_1">
    </div>
   
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingFour-f4">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">4.4 Recruitment. The affiliate posts available jobs externally and internally</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFour-f4" aria-expanded="false" aria-controls="collapseFour-f4">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseFour-f4" class="collapse" aria-labelledby="headingFour-f4" data-parent="#accordion_c3_s4">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s4_4_4_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s4_4_4_checkbox_1" for="c3_s4_4_4_checkbox_1">
    <input type="checkbox" id="c3_s4_4_4_checkbox_1" name="c3_s4_4_4_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Copy of job announcements, internal and external</span>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s4_4_4_rating_1">
    </div>
   
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingSeven-se3">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">4.5 Orientation and Training. The affiliate provides new staff a programmatic orientation and training during the first 3 months of employment. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSeven-se3" aria-expanded="false" aria-controls="collapseSeven-se3">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseSeven-se3" class="collapse" aria-labelledby="headingSeven-se3" data-parent="#accordion_c3_s4">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s4_4_5_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s4_4_5_checkbox_1" for="c3_s4_4_5_checkbox_1">
    <input type="checkbox" id="c3_s4_4_5_checkbox_1" name="c3_s4_4_5_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Orientation and Training Agendas</span>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s4_4_5_rating_1">
    </div>
   
    </div>
   
   </div>
   <div class="card">
    <div class="card-header" id="headingFive-f4">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">4.6 Staff Evaluation. The affiliate has in place a staff evaluation system which includes an initial follow-up for beginning staff and subsequent yearly 
    evaluations.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFive-f4" aria-expanded="false" aria-controls="collapseFive-f4">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseFive-f4" class="collapse" aria-labelledby="headingFive-f4" data-parent="#accordion_c3_s4">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s4_4_6_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s4_4_6_checkbox_1" for="c3_s4_4_6_checkbox_1">
    <input type="checkbox" id="c3_s4_4_6_checkbox_1" name="c3_s4_4_6_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Copy of affiliate performance management policy and performance evaluation form</span>
    </div>
   
    <div class="col d-flex align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s4_4_6_rating_1">
    </div>
   
    </div>
    
   </div>
   <div class="card">
    <div class="card-header" id="headingSix-f14">
    
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">4.7 Code of Ethics. The affiliate has a written code of ethics for staff. The code of ethics should include guidelines for professional behavior, conflict of 
    interest, privacy and confidentiality, quality assurance and integrity.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSix-f14" aria-expanded="false" aria-controls="collapseSix-f14">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
    <div id="collapseSix-f14" class="collapse" aria-labelledby="headingSix-f14" data-parent="#accordion_c3_s4">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s4_4_7_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate my-3">
   
    <label class="checkbox switch bool c3_s4_4_7_checkbox_1" for="c3_s4_4_7_checkbox_1">
    <input type="checkbox" id="c3_s4_4_7_checkbox_1" name="c3_s4_4_7_checkbox_1">
    </label>
   
    </div>
   
    <div class="col-24 d-flex justify-content-between align-items-center">
    <div class="d-flex">
    <div class="d-flex align-items-center contentDate">
    <span>Verification Source or Comment(s): Copy of Code of Ethics Policy</span>
    </div>
    </div>
    <div class="col d-flex">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s4_4_7_rating_1">
    </div>
    </div>
    
   </div>
      <!-- </?=isset($criteria_three_standard_four->question)?$criteria_three_standard_four->question:'' ?> -->
     
    </div>

    <div class="my-3 d-flex">

     

    </div>

</div>

</div>




</div>
<!-- end criteria 3 standard 4 -->



<!-- criteria 3 standard 5 -->
<div class="wrapouterContents" id="wpContent-dt-5">
       
  <div class="criteria">

     


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
           
    <div class="card">
    <div class="card-header" id="headingOne-s">
  
      <div class="settingWrap">
        <div class="addToggleclass">
  
             <h5 class="mb-0">5.1 Access. The affiliate provides convenient, realistic, and broad accessibility to program services for target populations.</h5>
              <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-s" aria-expanded="false" aria-controls="collapseOne-s">
                <i class="i i i-chat-line"></i>
              </button>
  
        </div>
      </div>
  
    </div>
  
    <div id="collapseOne-s" class="collapse" aria-labelledby="headingOne-s" data-parent="#accordion_c3_s5">
      <div class="card-body">
  
        <div class="msgBoxtoggle">
          <div class="col-lg-24 col-md-20 form-group">
              <input type="text" class="form-control" id="c3_s5_5_1_comment_1"  placeholder="comment">
          </div>
        </div>
  
      </div>
    </div>
    
    <div class="contentDate my-3">
  
      <label class="checkbox switch bool c3_s5_5_1_checkbox_1" for="c3_s5_5_1_checkbox_1">
        <input type="checkbox" id="c3_s5_5_1_checkbox_1" name="c3_s5_5_1_checkbox_1">
      </label>
  
    </div>
  
    <div class="col contentDate d-flex align-items-center">
  
      <div class="d-flex align-items-center">
        <span>Verification Source or Comment(s): Copy of program schedule(s)</span>
      </div>
  
      <div class="col d-flex justify-content-end align-items-center">
        <div class="rating-1">Rating</div>
        <input type="text"   onblur="checkrating(this)" class="border-red" id="c3_s5_5_1_rating_1" >
      </div>
  
    </div>
  
  </div>
  <div class="card">
    <div class="card-header" id="headingT">
     
      <div class="settingWrap">
        <div class="addToggleclass">
  
             <h5 class="mb-0">5.2 Appropriate Space. The affiliate provides an attractive and age appropriate space for program activities. The affiliate programs meet all industry 
               and regulatory standards for operating programs.</h5>
              <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseT" aria-expanded="false" aria-controls="collapseT">
                <i class="i i i-chat-line"></i>
              </button>
  
        </div>
      </div>
  
    </div>
    <div id="collapseT" class="collapse" aria-labelledby="headingT" data-parent="#accordion_c3_s5">
      <div class="card-body">
  
        <div class="msgBoxtoggle">
          <div class="col-lg-24 col-md-20 form-group">
              <input type="text" class="form-control" id="c3_s5_5_2_comment_1"  placeholder="comment">
          </div>
        </div>
  
      </div>
    </div>
    
    <div class="col-24 d-flex justify-content-between align-items-center">
          
      <div class="contentDate my-3">
  
        <label class="checkbox switch bool c3_s5_5_2_checkbox_1" for="c3_s5_5_2_checkbox_1">
          <input type="checkbox" id="c3_s5_5_2_checkbox_1" name="c3_s5_5_2_checkbox_1">
        </label>
  
      </div>
      
    </div>
  
    <div class="col-24 d-flex justify-content-between align-items-center">
      
      <div class="d-flex align-items-center contentDate">
        <span>Verification Source or Comment(s): Walk through of facilities </span>
      </div>
  
      <div class="col d-flex  align-items-center">
        <div class="rating-1">Rating</div>
        <input type="text"   onblur="checkrating(this)" class="border-red" id="c3_s5_5_2_rating_1" >
      </div>
  
    </div>
    
  </div>
  <div class="card">
    <div class="card-header" id="headingThree-t5">
  
      <div class="settingWrap">
        <div class="addToggleclass">
  
             <h5 class="mb-0">5.3 Equipment. The affiliate provides sufficient and up-to-date materials and equipment for program participants. </h5>
              <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseThree-t5" aria-expanded="false" aria-controls="collapseThree-t5">
                <i class="i i i-chat-line"></i>
              </button>
  
        </div>
      </div>
  
    </div>
  
    <div id="collapseThree-t5" class="collapse" aria-labelledby="headingThree-t5" data-parent="#accordion_c3_s5">
      <div class="card-body">
  
      <div class="msgBoxtoggle">
        <div class="col-lg-24 col-md-20 form-group">
            <input type="text" class="form-control" id="c3_s5_5_3_comment_1"  placeholder="comment">
        </div>
      </div>
  
      </div>
    </div>
  
    <div class="contentDate my-3">
  
      <label class="checkbox switch bool c3_s5_5_3_checkbox_1" for="c3_s5_5_3_checkbox_1">
        <input type="checkbox" id="c3_s5_5_3_checkbox_1" name="c3_s5_5_3_checkbox_1">
      </label>
  
    </div>
  
    <div class="col-24 d-flex justify-content-between align-items-center">
      
      <div class="d-flex align-items-center contentDate">
        <span>Verification Source or Comment(s):  Strategic Plan, </span>
      
        <div class="textIn">
          Page - <input type="text" id="c3_s5_5_3_val_1" placeholder="00">
        </div>
        <span>; Needs Assessment</span>
      </div>
  
      <div class="col d-flex  align-items-center">
        <div class="rating-1">Rating</div>
        <input type="text"   onblur="checkrating(this)" class="border-red" id="c3_s5_5_3_rating_1" >
      </div>
  
    </div>
  
  </div>
  <div class="card">
    <div class="card-header" id="headingFour-f5">
  
      <div class="settingWrap">
        <div class="addToggleclass">
  
             <h5 class="mb-0">5.4 Staff-Client Ratios. The affiliate program(s) meets industry and regulatory staff-client ratios for program, activity and age groups. </h5>
              <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFour-f5" aria-expanded="false" aria-controls="collapseFour-f5">
                <i class="i i i-chat-line"></i>
              </button>
  
        </div>
      </div>
  
    </div>
  
    <div id="collapseFour-f5" class="collapse" aria-labelledby="headingFour-f5" data-parent="#accordion_c3_s5">
      <div class="card-body">
  
        <div class="msgBoxtoggle">
          <div class="col-lg-24 col-md-20 form-group">
              <input type="text" class="form-control" id="c3_s5_5_4_comment_1"  placeholder="comment">
          </div>
        </div>
  
      </div>
    </div>
  
    <div class="contentDate my-3">
  
      <label class="checkbox switch bool c3_s5_5_4_checkbox_1" for="c3_s5_5_4_checkbox_1">
        <input type="checkbox" id="c3_s5_5_4_checkbox_1" name="c3_s5_5_4_checkbox_1">
      </label>
  
    </div>
  
    <div class="col-24 d-flex justify-content-between align-items-center">
      
      <div class="d-flex align-items-center contentDate">
        <span>Verification Source or Comment(s): Copy of affiliate contracts; staff-client ratio by program</span>
      </div>
  
      <div class="col d-flex  align-items-center">
        <div class="rating-1">Rating</div>
        <input type="text"   onblur="checkrating(this)" class="border-red" id="c3_s5_5_4_rating_1" >
      </div>
  
    </div>
  
  </div>
  <div class="card">
    <div class="card-header" id="headingFive-f5">
     
      <div class="settingWrap">
        <div class="addToggleclass">
  
             <h5 class="mb-0">5.5 Safety. The affiliate has in place protective measures for protecting staff and client safety while participating and leaving program activities.</h5>
              <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseFive-f5" aria-expanded="false" aria-controls="collapseFive-f5">
                <i class="i i i-chat-line"></i>
              </button>
  
        </div>
      </div>
  
    </div>
    <div id="collapseFive-f5" class="collapse" aria-labelledby="headingFive-f5" data-parent="#accordion_c3_s5">
      <div class="card-body">
  
        <div class="msgBoxtoggle">
          <div class="col-lg-24 col-md-20 form-group">
              <input type="text" class="form-control" id="c3_s5_5_5_comment_1"  placeholder="comment">
          </div>
        </div>
  
      </div>
    </div>
  
    <div class="contentDate my-3">
  
      <label class="checkbox switch bool c3_s5_5_5_checkbox_1" for="c3_s5_5_5_checkbox_1">
        <input type="checkbox" id="c3_s5_5_5_checkbox_1" name="c3_s5_5_5_checkbox_1">
      </label>
  
    </div>
  
    <div class="col-24 d-flex justify-content-between align-items-center">
      
      <div class="d-flex align-items-center contentDate">
        <span>Verification Source or Comment(s): Copy of affiliate policy and procedures for client and staff safety  </span>
      </div>
  
      <div class="col d-flex  align-items-center">
        <div class="rating-1">Rating</div>
        <input type="text"   onblur="checkrating(this)" class="border-red" id="c3_s5_5_5_rating_1">
      </div>
  
    </div>
    
  </div>
  <div class="card">
    <div class="card-header" id="headingSix-f15">
     
      <div class="settingWrap">
        <div class="addToggleclass">
  
             <h5 class="mb-0">5.6 Accommodations for Disabilities. The affiliate has accommodations for disabled clients which meet industry and regulatory standards for 
               disabled clients.</h5>
              <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseSix-f15" aria-expanded="false" aria-controls="collapseSix-f15">
                <i class="i i i-chat-line"></i>
              </button>
  
        </div>
      </div>
  
    </div>
    <div id="collapseSix-f15" class="collapse" aria-labelledby="headingSix-f15" data-parent="#accordion_c3_s5">
      <div class="card-body">
  
        <div class="msgBoxtoggle">
          <div class="col-lg-24 col-md-20 form-group">
              <input type="text" class="form-control" id="c3_s5_5_6_comment_1"  placeholder="comment">
          </div>
        </div>
  
      </div>
    </div>
  
    <div class="contentDate my-3">
  
      <label class="checkbox switch bool c3_s5_5_6_checkbox_1" for="c3_s5_5_6_checkbox_1">
        <input type="checkbox" id="c3_s5_5_6_checkbox_1" name="c3_s5_5_6_checkbox_1">
      </label>
  
    </div>
  
    <div class="col-24 d-flex justify-content-between align-items-center">
      
      <div class="d-flex">
        <div class="d-flex align-items-center contentDate">
          <span>Verification Source or Comment(s): Copy of affiliate ADA policy statement; Walk through of facilities</span>
        </div>
  
        <div class="d-flex align-items-center">
          <span> ; Needs	Assessment</span>
        
        </div>
      </div>
      
      <div class="col d-flex  align-items-center">
        <div class="rating-1">Rating</div>
        <input type="text"   onblur="checkrating(this)" id="c3_s5_5_6_rating_1" class="border-red" >
      </div>
  
    </div>
    
  </div>
        <!-- </?=isset($criteria_three_standard_five->question)?$criteria_three_standard_five->question:'' ?> -->
             
            </div>

            <div class="my-3 d-flex">

            

            </div>

        </div>
      
      </div>

  

 </div>

</div>
<!-- end criteria 3 standard 5 -->



<!--  criteria 3 standard 6-->
<div class="wrapouterContents" id="wpContent-dt-6">
       
  <div class="criteria">

  

    

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
    <div class="card">
    <div class="card-header" id="headingOne-s1">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">6.1 Does the affiliate have a written policy on advocacy defining the process by which the affiliate determines positions on specific issues?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-s1" aria-expanded="false" aria-controls="collapseOne-s1">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOne-s1" class="collapse" aria-labelledby="headingOne-s1" data-parent="#accordion_c3_s6">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s6_6_1_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s6_6_1_checkbox_1" for="c3_s6_6_1_checkbox_1">
    <input type="checkbox" id="c3_s6_6_1_checkbox_1" name="c3_s6_6_1_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="contentDate d-flex align-items-center">
   
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of Professional Quality Overview</span>
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s6_6_1_rating_1" >
    </div>
   
    </div>
   
   </div> 
   <div class="card">
    <div class="card-header" id="headingOne-v1">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">6.2 Target Population. The affiliate program has identified a target population in their community and has developed a communication and 
    marketing plan to reach this target group. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-v1" aria-expanded="false" aria-controls="collapseOne-v1">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOne-v1" class="collapse" aria-labelledby="headingOne-v1" data-parent="#accordion_c3_s6">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s6_6_2_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s6_6_2_checkbox_1" for="c3_s6_6_2_checkbox_1">
    <input type="checkbox" id="c3_s6_6_2_checkbox_1" name="c3_s6_6_2_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="contentDate d-flex align-items-center">
   
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of Communication and Marketing Plan</span>
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s6_6_2_rating_1" >
    </div>
   
    </div>
   </div> 
   <div class="card">
    <div class="card-header" id="headingOne-sv1">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">6.3 Measurable Goals and Objectives. The affiliate program design includes measurable program goals and objectives. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-sv1" aria-expanded="false" aria-controls="collapseOne-sv1">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOne-sv1" class="collapse" aria-labelledby="headingOne-sv1" data-parent="#accordion_c3_s6">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s6_6_3_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s6_6_3_checkbox_1" for="c3_s6_6_3_checkbox_1">
    <input type="checkbox" id="c3_s6_6_3_checkbox_1" name="c3_s6_6_3_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="contentDate d-flex align-items-center">
   
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of Professional Quality Overview</span>
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s6_6_3_rating_1" >
    </div>
   
    </div>
   </div>
   <div class="card">
    <div class="card-header" id="headingOne-sv4">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">6.4 Program Curriculum. Program(s) has and uses a detailed program curriculum which includes defined program activities. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-sv4" aria-expanded="false" aria-controls="collapseOne-sv4">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOne-sv4" class="collapse" aria-labelledby="headingOne-sv4" data-parent="#accordion_c3_s6">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s6_6_4_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
   
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s6_6_4_checkbox_1" for="c3_s6_6_4_checkbox_1">
    <input type="checkbox" id="c3_s6_6_4_checkbox_1" name="c3_s6_6_4_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="contentDate d-flex align-items-center">
   
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of Professional Quality Overview</span>
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s6_6_4_rating_1" >
    </div>
   
    </div>
   </div> 
            <!-- </?=isset($criteria_three_standard_six->question)?$criteria_three_standard_six->question:'' ?>                           -->
            </div>

          

        </div>
      
      </div>

    

 </div>

</div>
<!-- end criteria 3 standard 6 -->

<!-- criteria 3 standard 7 -->
<div class="wrapouterContents" id="wpContent-dt-7">
       
  <div class="criteria">

     
     
      <div class="criteria">

        

        <div class="criteriaBottom">
            <h5>Standard 7</h5>
            <p>Program effectiveness is assessed on an ongoing manner and an action plan for continuous improvement is developed.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>

            <div id="accordion_c3_s7">
              <input type="hidden" id="criteriaThreeStandardSevenId" value=" <?=isset($criteria_three_standard_seven->cid)?$criteria_three_standard_seven->cid:'' ?>">
              <div class="card">
    <div class="card-header" id="headingOne-sb2">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">7.1 Program Implementation Plan. Program(s) has a written implementation plan which includes activities, staffing, facilities, management plan
    and timeline for program implementation.</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-sb2" aria-expanded="false" aria-controls="collapseOne-sb2">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOne-sb2" class="collapse" aria-labelledby="headingOne-sb2" data-parent="#accordion_c3_s7">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s7_7_1_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s7_7_1_checkbox_1" for="c3_s7_7_1_checkbox_1">
    <input type="checkbox" id="c3_s7_7_1_checkbox_1" name="c3_s7_7_1_checkbox_1">
    </label>
    </div>
    </div>
   
    <div class="contentDate d-flex align-items-center">
   
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Latest program report submitted to funder, Program Contract.</span>
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s7_7_1_rating_1" >
    </div>
   
    </div>
   
   </div> 
   <div class="card">
    <div class="card-header" id="headingOne-s3">
   
    <div class="settingWrap">
    <div class="addToggleclass">
   
    <h5 class="mb-0">7.2 Process Evaluation Plan. Has the program(s) met goals and delivered on key indicators identified by funder(s)?</h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-s3" aria-expanded="false" aria-controls="collapseOne-s3">
    <i class="i i i-chat-line"></i>
    </button>
   
    </div>
    </div>
   
    </div>
   
    <div id="collapseOne-s3" class="collapse" aria-labelledby="headingOne-s3" data-parent="#accordion_c3_s7">
    <div class="card-body">
   
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s7_7_2_comment_1" placeholder="comment">
    </div>
    </div>
   
    </div>
    </div>
    
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s7_7_2_checkbox_1" for="c3_s7_7_2_checkbox_1">
    <input type="checkbox" id="c3_s7_7_2_checkbox_1" name="c3_s7_7_2_checkbox_1">
    </label>
    </div>
    </div>
   
    <div class="contentDate d-flex align-items-center">
   
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of process evaluation plan by program(s)</span>
    </div>
   
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s7_7_2_rating_1">
    </div>
   
    </div>
   
   </div> 
             <!-- </?=isset($criteria_three_standard_seven->question)?$criteria_three_standard_seven->question:'' ?> -->
                                         
            </div>

        

        </div>
      
      </div>

  

 </div>

 </div>
<!-- end criteria 3 standard 7 -->

<!-- criteria 3 standard 8 -->
<div class="wrapouterContents" id="wpContent-dt-8">
       
  <div class="criteria">

    

     

      <div class="criteria">

     

        <div class="criteriaBottom">
            <h5>Standard 8</h5>
            <p>The affiliate program has and implements an evaluation plan for describing client outcomes and assessing program effectiveness.</p>
            <h4>INDICATORS OF EFFECTIVENESS</h4>

            <div id="accordion_c3_s8">
            <input type="hidden" id="criteriaThreeStandardEightId" value=" <?=isset($criteria_three_standard_eight->cid)?$criteria_three_standard_eight->cid:'' ?>">

         <!-- </?=isset($criteria_three_standard_eight->question)?$criteria_three_standard_eight->question:'' ?> -->
         <div class="card">
    <div class="card-header" id="headingOne-L1">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.1 Evaluation Plan : The affiliate program(s) has a written evaluation plan for demonstrating program effectiveness. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-L1" aria-expanded="false" aria-controls="collapseOne-L1">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div id="collapseOne-L1" class="collapse" aria-labelledby="headingOne-L1" data-parent="#accordion_c3_s8">
    <div class="card-body">
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s8_8_1_comment_1" placeholder="comment">
    </div>
    </div>
    
    </div>
    </div>
    
    <div class="contentDate">
    <div class="d-flex align-items-center">
    <label class="checkbox switch bool c3_s8_8_1_checkbox_1" for="c3_s8_8_1_checkbox_1">
    <input type="checkbox" id="c3_s8_8_1_checkbox_1" name="c3_s8_8_1_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="contentDate d-flex align-items-center">
    
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s) : Copy of written evaluation plan by program(s), Program Design and Outcomes</span>
    </div>
    
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s8_8_1_rating_1">
    </div>
    
    </div>
    </div> 
    <div class="card">
    <div class="card-header" id="headingOne-L2">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.2 Performance Targets : The affiliate sets targets for program(s) performance on selected outputs, client outcomes and indicators. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-L2" aria-expanded="false" aria-controls="collapseOne-L2">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div id="collapseOne-L2" class="collapse" aria-labelledby="headingOne-L2" data-parent="#accordion_c3_s8">
    <div class="card-body">
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s8_8_2_comment_1" placeholder="comment">
    </div>
    </div>
    
    </div>
    </div>
    
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s8_8_2_checkbox_1" for="c3_s8_8_2_checkbox_1">
    <input type="checkbox" id="c3_s8_8_2_checkbox_1" name="c3_s8_8_2_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="contentDate d-flex align-items-center">
    
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Copy of key outputs, client outcomes, indicators and programmatic targets and funder(s) reports.</span>
    </div>
    
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s8_8_2_rating_1" >
    </div>
    
    </div>
    </div> 
    <div class="card">
    <div class="card-header" id="headingOne-L3">
    
    <div class="settingWrap">
    <div class="addToggleclass">
    
    <h5 class="mb-0">8.3 Performance Measures : The affiliate compares program(s) results on key performance measures to targets, as a minimum evaluation model for 
    measuring program effectiveness and impact. </h5>
    <button class="btn btn-link nul-btn-acc" data-toggle="collapse" data-target="#collapseOne-L3" aria-expanded="false" aria-controls="collapseOne-L3">
    <i class="i i i-chat-line"></i>
    </button>
    
    </div>
    </div>
    
    </div>
    
    <div id="collapseOne-L3" class="collapse" aria-labelledby="headingOne-L3" data-parent="#accordion_c3_s8">
    <div class="card-body">
    
    <div class="msgBoxtoggle">
    <div class="col-lg-24 col-md-20 form-group">
    <input type="text" class="form-control" id="c3_s8_8_3_comment_1" placeholder="comment">
    </div>
    </div>
    
    </div>
    </div>
    
    <div class="contentDate">
    <div class="col-16 d-flex align-items-center">
    <label class="checkbox switch bool c3_s8_8_3_checkbox_1" for="c3_s8_8_3_checkbox_1">
    <input type="checkbox" id="c3_s8_8_3_checkbox_1" name="c3_s8_8_3_checkbox_1">
    </label>
    </div>
    </div>
    
    <div class="contentDate d-flex align-items-center">
    
    <div class="col-20 d-flex align-items-center">
    <span>Verification Source or Comment(s): Targets for program(s) outputs and key client outcomes and funder(s) reports </span>
    </div>
    
    <div class="col d-flex justify-content-end align-items-center">
    <div class="rating-1">Rating</div>
    <input type="text"  onblur="checkrating(this)" class="border-red" id="c3_s8_8_3_rating_1" >
    </div>
    
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
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>