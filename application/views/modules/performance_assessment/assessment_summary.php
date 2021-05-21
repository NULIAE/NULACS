<?php
if(isset($_GET['uid']) && !empty($_GET['uid'])){
    $userId = '&uid='.$_GET['uid'];
}else{
    $userId='';
}
?>
<main class="user">
    <div class="container">
      <div class="Wrapper">
        <div class="row justify-content-end date">
          <div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m">Tuesday October 06,
              2020</span></div>
        </div>
        <div class=" document-mdata">

          <div class="mnHead">
            <h3><?php echo ($userId !== '') ? 'Self Assessment - ' : ''; ?>Rating Sheet</h3>
          </div>
        </div>
       <?php

            $c1s1_['1.1'] = 'Does the Affiliate’s Bylaws include all of the following items?';
            $c1s1_['1.2']= 'Does the board review the affiliate’s bylaws at least every three years, revise as necessary and file with the National Urban League?';
            $c1s1_['1.3']= 'The affiliate’s bylaws are adhered to in the conduct of the affiliate’s corporate business, and is consistent with the Articles of Incorporation, National Urban League policies, standards, and guidelines, as well as federal, state, and local laws';
            $c1s1_['1.4']= 'The bylaws reflect board rotation and term limits policies, board orientation/development, job descriptions and committee structure';
            $c1s1_['1.5']= 'The Articles of Incorporation are consistent with current state, federal, and local laws, and are reviewed at the same time as the affiliate bylaws are updated';
            $c1s1_['1.6']= 'The corporate minutes, reports, and other legal records are filed, signed and maintained as required by federal, state, and local statutes/ regulations, and uploaded to the Affiliated Data Management (ADM) as required by National Urban League guidelines, and by parliamentary authority';
            $c1s1_['1.7']= 'The affiliate uses an evaluation tool to evaluate the work of the board, individually and collectively';
         
            $c1s2_['2.1'] = 'Attach a copy of the most recent annual report made available to the public.';
            $c1s2_['2.2'] = 'Describe in writing, the procedure the affiliate has in place for allowing members of the general public to provide input to the affiliate.';
           
            $c1s3_['3.1'] = 'Does the affiliate’s Board of Directors recruit, select and employ the President/CEO and provide clearly written expectations and qualifications for the position?';
            $c1s3_['3.2'] = 'Does the membership of the board include expertise that would promote the proper operation of the affiliate and further the goals of its program?';
            $c1s3_['3.3'] = 'Does the board have a mandatory attendance policy?';
            $c1s3_['3.4'] = ' Is the Board of Director’s representative of the ethnic and cultural diversity of the community?';
            $c1s3_['3.5'] = 'If the affiliate has any related party transactions with board members, or between board members and members of their family, are these disclosed to the Board of Directors, and to the affiliate’s independent auditor? Is there a written record of the disclosure?';
            $c1s3_['3.6'] = 'Does the organization acknowledge and disclose to the board and auditor any pending or threatened lawsuits, claims, or assessments which may have an impact on the organization’s finances and/or operating effectiveness? Is this listed in the minutes?';
            $c1s3_['3.7'] = 'Has the Board of Directors adopted a clear, meaningful written mission statement which reflects the affiliate’s purpose, values and people served?';
            $c1s3_['3.8'] = 'Do the affiliate’s board and staff review the mission statement at least once every three years?';
            $c1s3_['3.9'] = ' Are the affiliate’s programs and services congruent with the affiliate’s mission and strategic plan?';
            $c1s3_['3.10'] = 'If the affiliate entered into a “fiscal agent” or “host organization” relationship with another organization, does the affiliate have a written agreement on file which defines the terms of the relationship with the other organization?';
            $c1s3_['3.11'] = 'Based on your By-Laws, how many times should the Affiliate Board meet per year? How many times did your board meet?';
            $c1s3_['3.12'] = 'Based on your By-Laws, what constitutes a quorum? How many board meetings did not have a quorum during the previous year?';
            $c1s3_['3.13'] = 'Does the affiliate have a policy where all contracts entered in to by the Affiliate are presented to the Board for review/approval?';
            $c1s3_['3.14'] = 'Does the Affiliate provide written agendas, as well as materials relating to significant decisions made in advance of board meetings?';
            $c1s3_['3.15'] = 'Do family members serve on the Board?';
            $c1s3_['3.16'] = 'What is the affiliate’s policy to prevent a conflict of interest?';

            $c1s4_['4.1'] = 'Does the affiliate have these current manuals in place: Personnel Manual, Accounting Manual, Policies and Procedures Manual, Volunteer Manual and Affiliate Resource Manual?';
            $c1s4_['4.2'] = 'Have all board members, volunteers and staff been made aware of the availability of the manuals? (See 4.1).';
            $c1s4_['4.3'] = 'Is the personnel manual regularly reviewed and updated to (1) describe recruitment, hiring, termination and standard work rules for all staff and (2) maintain compliance with changing government regulations including FLSA, EEOC, ADA, OSHA, FMLA and Affirmative Action Plan?';
            $c1s4_['4.4'] = 'The affiliate monitors legislative and regulatory actions that affect its corporate rights and responsibilities and takes appropriate action.';
            $c1s4_['4.5'] = 'The board of directors retains (either pro bono or fee-based) the services of independent legal counsel, who is available on an ongoing basis, but who does not hold elective or appointed office in the affiliate.';
            $c1s4_['4.6'] = 'Negotiating and entering into contracts in the name of, or on behalf of, the Urban League are conducted by individuals designated by the affiliate’s board of directors and identified in the policies and procedures manual established by the affiliate board of directors or bylaws.';

            $c1s5_['5.1'] = 'Does the affiliate have a clearly defined Strategic Plan with timelines for achieving affiliate goals and objectives?';
            $c1s5_['5.2'] = 'Did the affiliate involve board members, staff, service recipients, volunteers, key constituents and general members of the community to participate in the strategic planning process?';
            $c1s5_['5.3'] = 'Does the affiliate’s strategic plan identify changing community needs as well as the affiliate’s strengths, weaknesses, opportunities and threats?';
            $c1s5_['5.4'] = 'Does the strategic plan address the critical issues facing the Affiliate?';
            $c1s5_['5.5'] = 'Was the plan developed by researching the internal and external environment?';
            $c1s5_['5.6'] = 'Does the strategic plan set goals and measurable objectives that address the critical issues facing the community/affiliate?';
            $c1s5_['5.7'] = 'Does the strategic plan integrate all of the affiliate’s programs and services around a focused mission?';
            $c1s5_['5.8'] = 'Does the Strategic Plan prioritize the affiliate’s goals and include timelines for the accomplishment of the goals?';
            $c1s5_['5.9'] = 'Is the affiliate’s Strategic Plan communicated to all the affiliate’s stakeholders, including board members, staff, volunteers, service recipients and the general community?';
            $c1s5_['5.10'] = 'Does the affiliate’s strategic plan establish an evaluation process with performance indicators to measure the Affiliate’s progress toward achievement of goals and objectives?';
            $c1s5_['5.11'] = 'Has the affiliate’s management staff developed internal work plans that indicate how the affiliate’s staff and financial resources will be allocated to insure that the affiliate’s strategic goals are accomplished in a timely manner?';
            $c1s6_['6.1'] = 'Does the affiliate have a written policy on advocacy defining the process by which the affiliate determines positions on specific issues?';

            $c2s1_['1.1'] = 'Attach a copy of the affiliate’s personnel policies indicating the date they were last reviewed 2021-01-04, and last approved by the board of directors.';
            $c2s1_['1.2'] = 'Affiliate personnel policies for employed staff are reviewed every three (3) years and are consistent with federal, state, and local statutory requirements pertaining to employment, wages and hours, health and safety, and equal employment opportunity.';
            $c2s1_['1.3'] = 'With respect to volunteers, does the affiliate’s volunteer manual address initial assessment or screening, assignment to and training for appropriate work responsibilities, ongoing supervision and evaluation, and opportunities for advancement and have all volunteers been required to sign the volunteer application form.';
            $c2s1_['1.4'] = ' Does the affiliate have a written job description for each employee that clearly identifies roles and responsibilities, and is there a system in place for annual written evaluations of employees by their respective supervisors?';
            $c2s1_['1.5'] = 'Employed staff positions have been evaluated under a comparable pay-for-performance compensation system, and appropriate salary structures have been adopted and implemented, to ensure internal equity and external competitiveness.';
            $c2s1_['1.6'] = 'The affiliate’s performance management system incorporates career development for all employees, including employee orientation, supervisory coaching, and systematic access to information about local and National Urban League training opportunities';
            $c2s1_['1.7'] = 'The affiliate participates in medical, dental, life insurance, tax-deferred annuity, disability income, and retirement plans, or has an equivalent benefit program.';

            $c2s2_['2.1'] = ' The affiliate board of directors has taken action to develop and implement fund development strategies to meet long-range operating and capital income needs.';
            $c2s2_['2.2'] = ' For the last three (3) years, provide the total amount of revenues from fundraising and other development activities and the total amount of funds spent on conducting them.';
            $c2s2_['2.3'] = 'For the last three (3) years, provide revenue from all sources.';
            $c2s2_['2.4'] = 'For the last three (3) years, provide the affiliate’s total income for direct and indirect contributions generated by individuals, foundations, corporations.';
            $c2s2_['2.5'] = 'Members of the board of directors take active leadership in obtaining funds for the work of the affiliate through activities that include solicitation and identification of prospects.';
            $c2s2_['2.6'] = 'Verification Source or Comment(s): Board Corporate Contribution Summary';

            $c2s3_['3.1'] = 'What accounting software package does the affiliate use?';
            $c2s3_['3.2'] = ' Does the affiliate have systems in place to provide the appropriate information needed by staff and board to make sound financial decisions and to fulfill Internal Revenue Service requirements?';
            $c2s3_['3.3'] = ' Does the affiliate have systems in place to provide the appropriate information needed by staff and board to make sound financial decisions and to fulfill Internal Revenue Service requirements?';
            $c2s3_['3.4'] = ' For the last three (3) years, did the affiliate expend more than $500,000 ($750,000 (if applicable)) in federal funds? (This includes Federal funds received from a “pass through” entity as well) If so, did the affiliate obtain an OMB A-133 audit?';
            $c2s3_['3.5'] = 'For the last three (3) years, did the affiliate’s A-133 audits contain “notes or areas of concern noted by the auditors?';
            $c2s3_['3.6'] = 'Does the affiliate reconcile all cash accounts monthly?';
            $c2s3_['3.7'] = 'If the affiliate has billable contracts or other service income, are written procedures established for the periodic billing, follow-up, and collection of all accounts, and does it have the documentation that substantiates all billings.';
            $c2s3_['3.8'] = 'For the last three (3) years, according to the affiliate’s most recent audits, did the affiliate have a decrease in Total Net Assets greater than 33%?';
            $c2s3_['3.9'] = 'For the last three (3) years, did the affiliate have a positive fund balance?';
            $c2s3_['3.10'] = 'For the last three (3) years, according to the affiliate’s audits, do the affiliate’s Management and General Cost exceed 30%?';
            $c2s3_['3.11'] = 'For the last three (3) years, according to the affiliate’s audits, does the affiliate’s debt to asset exceed 50%?';
            $c2s3_['3.12'] = 'For the last three (3) years, according to the affiliate’s audits, do the affiliate’s current accounts receivables exceed 50% of the affiliate’s current assets?';
            $c2s3_['3.13'] = ' If required, IRS Form 990T (Unrelated Business Income) has been filed and a copy is available to the public.';
            $c2s3_['3.14'] = 'Are the affiliate’s government contracts, purchase of service agreements and grant agreements in writing and are reviewed by a staff member to monitor compliance with all stated conditions?';
            $c2s3_['3.15'] = 'Does the affiliate have a written policy related to investments?';
            $c2s3_['3.16'] = 'Has the affiliate established a written plan identifying actions to take in the event of a reduction or loss in funding?';
            $c2s3_['3.17'] = ' Does the Board of Directors review and approve the affiliate audit report and management letter, and with staff input and support institutes any necessary changes.';
            $c2s3_['3.18'] = 'Does the affiliate make training available for board and appropriate staff on relevant accounting and financial management topics?';

            $c2s4_['4.1'] = 'The affiliate has established written procedures that are followed and reviewed annually, for internal financial controls, including the selection of authorized signatures on affiliate bank accounts through resolutions, and the requirement for enforced bonding insurance for applicable staff and board members.';
            $c2s4_['4.2'] = 'The affiliate has established written procedures for the identification, review, tracking, and handling of all assets of the Urban League affiliate and its entities.';
            $c2s4_['4.3'] = 'Does the affiliate allow checks to be pre-signed?';
            $c2s4_['4.4'] = ' Does the affiliate prepare a Statement of Financial Position and a Statement of Activities on a monthly basis?';
            $c2s4_['4.5'] = 'Does the affiliate budget planning process include management personnel, the President/CEO and members of the Board?';
            $c2s4_['4.6'] = ' Does the affiliate disbursement policy require members of the board to approve above a certain amount? What is that amount?';
            $c2s4_['4.7'] = 'Are cancelled checks reviewed in a timely manner, not later than days following receipt?';
            $c2s4_['4.8'] = 'Is the payroll approved by a manager who is not responsible for its preparation?';
            $c2s4_['4.9'] = 'Are withholding and FICA taxes deposited on a timely basis and in accordance with federal, state, and local municipal laws, where applicable.';
            $c2s4_['4.10'] = 'Were all tax payments (includes FICA, and unemployment) made on time (by due date)?';
            $c2s4_['4.11'] = 'Are employees, board members and volunteers who handle affiliate funds and investments bonded to assure the safeguarding of assets?';
            $c2s4_['4.12'] = 'Does the affiliate have a written policy on the use of its corporate credit card, and a process for recovering unauthorized usage?';
            $c2s4_['4.13'] = 'Do the affiliate’s Accounting or Board Policy and Procedures Manual prohibit the use of bank issued debit cards?';
            $c2s4_['4.14'] = 'A written strategy for diversifying sources of income has been implemented.';
            $c2s4_['4.15'] = ' For the last three (3) years, did actual operating income equal or exceed actual operating expenses?';
            $c2s4_['4.16'] = ' The affiliate has or is in the active process of creating unrestricted cash reserves equal to at least a minimum of three months.';
            $c2s4_['4.17'] = 'The affiliate board of directors has established written policies for the use of affiliate operating reserves.';
            $c2s4_['4.18'] = 'The board of directors receives and reviews on a regular basis (at least quarterly) Statement of Financial Position and a Statement of Activities.';
            $c2s4_['4.19'] = ' An independent CPA or auditing firm is engaged annually by the affiliate to perform an audit of the affiliate’s financial statements and the board reviews the audit and any management letter accompanying the audit.';
            $c2s4_['4.20'] = 'All findings and recommendations provided by the auditor have been considered and there is a record of corrective actions taken.';

            $c2s5_['5.1'] = 'Affiliate dues are forwarded to the National Urban League in accordance with National Urban League policy, and is the affiliate current with payments?';
            $c2s5_['5.2'] = 'All members of the board of directors, employed staff, and operational volunteers, annually sign a conflict-of-interest, code of conduct and confidentiality statements';
            $c2s5_['5.3'] = 'The affiliate has a written risk management plan, reviewed annually, which includes a plan to protect and utilize affiliate assets. (E.g. crisis communication plan, D&O Insurance, property insurance, fiscal controls).';
            $c2s5_['5.4'] = ' The affiliate board has written policies for use of Urban League property by outside groups that minimize potential liability for the affiliate.';
            $c2s5_['5.5'] = ' The affiliate owns or leases sites and facilities needed to support services.';
            $c2s5_['5.6'] = ' The affiliate repairs, replaces, and maintains affiliate land, buildings, and equipment as needed and in accordance with a long-range property acquisition, maintenance and utilization plan.';
            $c2s5_['5.7'] = 'The affiliate has a capital budget funded to meet its long-range property needs.';
            $c2s5_['5.8'] = ' Duplicates of all vital documents (i.e., property documents, insurance papers, charter, state articles of incorporation, minutes, etc.), are complete, up-to-date and are kept in a c (fire-proof safe), or in a secure location away from the affiliate’s location.';


            $c2s6_['6.1'] = 'The affiliate board has established a restricted cash reserve to be held in perpetuity, with an income stream to support activities of the affiliate.';
            $c2s6_['6.2'] = ' The affiliate board of directors maintains control of all restricted funds.';
     
            $c2s7_['7.1'] = 'The board has adopted corporate goals and objectives that give direction to the total work of the affiliate.';
            $c2s7_['7.2'] = ' The staffing structure, as determined by the President/CEO, supports the corporate goals and a reporting system is in place that includes regular written management reports to the board of directors based on the achievement of integrated objectives.';
            $c2s7_['7.3'] = 'The board adopts the affiliate budget, inclusive of the operating and capital budgets, based on the integrated operating objectives and long-range strategies for property, fund development, membership, program, and finance management.';
            $c2s7_['7.4'] = 'The board has delegated the responsibility for operational management to the President/CEO.';

            $c2s8_['8.1'] = 'List at least three ways how the affiliate monitors changes in legal and regulatory requirements';
            $c2s8_['8.2'] = '2 Provide a copy of the affiliate’s document retention policy and schedule.';
            $c2s8_['8.3'] = 'Describe, in writing, how the affiliate internally reviews its compliance with existing legal, regulatory, financial and National Urban League requirements.';


            $c3s1_['1.1'] = 'PROFESSIONAL QUALITY OVERVIEW. The affiliate has a professional quality overview of programs. The overview includes at a minimum; the needs addressed through the program(s), description of the services, length of program, participation requirements and expected client outcomes. Content, delivery and format should be culturally relevant and where appropriate materials should be available in languages that reflect the population served.';
            $c3s1_['1.2'] = 'COMPREHENSIVE CLIENT INTAKE. The affiliate has a system for conducting a comprehensive client intake as appropriate. At a minimum, the Intake should include background information; identify client needs; and program interest. Specific intake information required by programmatic area should be included. All clients are assigned a unique identification number at Intake which is used to track and monitor participation and outcomes over the service and follow-up period. The use of an electronic client management system is preferred.';
            $c3s1_['1.3'] = ' CLIENT ACTION PLANS. The affiliate program(s) develops and monitors client action plans as appropriate. The action plan includes measurable goals and benchmarks and is developed in partnership with the client.';
            $c3s1_['1.4'] = 'SERVICE CONTRACTS. The affiliate program(s) requires client and provider to sign a service contract which outlines both client and program responsibilities.';
            $c3s1_['1.5'] = 'SKILLS AND APTITUDE ASSESSMENTS. The affiliate uses validated assessments to assess client skills and aptitude, where required.';
            $c3s1_['1.6'] = 'WRITTEN REFERRAL NETWORK. The affiliate has a written referral network for individuals and families seeking services NOT provided by the affiliate.';
            $c3s1_['1.7'] = 'CLIENT EVALUATION FORM. The affiliate provides clients with a user-friendly survey to evaluate services received.';

            $c3s2_['2.1'] = ' Statement of Clients Rights. The affiliate provides clients a written statement of their rights when seeking social services, including their right to file a grievance of the service provided.';
            $c3s2_['2.2'] = 'Grievance Procedures. A grievance process is in place and written procedures for filing a grievance are available to clients.';
            $c3s2_['2.3'] = 'Grievance Procedures. A grievance process is in place and written procedures for filing a grievance are available to clients.';

            $c3s3_['3.1'] = 'Client Management System. The affiliate has in place a client management system to collect and maintain client records. An electronic system is preferred. Paper and electronic files are maintained in either secure file cabinets or electronically in a secure data system.';
            $c3s3_['3.2'] = 'Maintaining Client Records. The affiliate has in place procedures for maintaining client records in an easily retrieval format for at least 3 years or in accordance with programmatic requirements.';
            $c3s3_['3.3'] = ' Destroying Records. The affiliate has written guidelines for destroying client records and when appropriate shreds client records to protect sensitive client information.';

            $c3s4_['4.1'] = ' Core Competencies. The affiliate has written core competences for program staff which are used in recruiting, interviewing and hiring. Core competencies should include strong knowledge in the service area as demonstrated by experience, educational level, and certification. Specific core competencies for programmatic areas should be incorporated in hiring procedures as appropriate.';
            $c3s4_['4.2'] = 'Educational Requirements. The affiliate has required educational levels for program staff. Bachelors’ degrees in appropriate areas are encouraged for staff working directly with clients.';
            $c3s4_['4.3'] = 'Continuing Education. The affiliate encourages staff to receive additional continuing education and provides relevant information and referrals.';
            $c3s4_['4.4'] = ' Recruitment. The affiliate posts available jobs externally and internally';
            $c3s4_['4.5'] = ' Orientation and Training. The affiliate provides new staff a programmatic orientation and training during the first 3 months of employment.';
            $c3s4_['4.6'] = 'Staff Evaluation. The affiliate has in place a staff evaluation system which includes an initial follow-up for beginning staff and subsequent yearly evaluations.';
            $c3s4_['4.7'] = ' Code of Ethics. The affiliate has a written code of ethics for staff. The code of ethics should include guidelines for professional behavior, conflict of interest, privacy and confidentiality, quality assurance and integrity.';

            $c3s5_['5.1'] = 'Access. The affiliate provides convenient, realistic, and broad accessibility to program services for target populations.';
            $c3s5_['5.2'] = 'Appropriate Space. The affiliate provides an attractive and age appropriate space for program activities. The affiliate programs meet all industry and regulatory standards for operating programs';
            $c3s5_['5.3'] = 'Equipment. The affiliate provides sufficient and up-to-date materials and equipment for program participants.';
            $c3s5_['5.4'] = ' Staff-Client Ratios. The affiliate program(s) meets industry and regulatory staff-client ratios for program, activity and age groups.';
            $c3s5_['5.5'] = 'Safety. The affiliate has in place protective measures for protecting staff and client safety while participating and leaving program activities.';
            $c3s5_['5.6'] = 'Accommodations for Disabilities. The affiliate has accommodations for disabled clients which meet industry and regulatory standards for disabled clients.';

            $c3s6_['6.1'] = ' Does the affiliate have a written policy on advocacy defining the process by which the affiliate determines positions on specific issues?';
            $c3s6_['6.2'] = 'Target Population. The affiliate program has identified a target population in their community and has developed a communication and marketing plan to reach this target group.';
            $c3s6_['6.3'] = ' Measurable Goals and Objectives. The affiliate program design includes measurable program goals and objectives.';
            $c3s6_['6.4'] = ' Program Curriculum. Program(s) has and uses a detailed program curriculum which includes defined program activities.';

            $c3s7_['7.1'] = 'Program Implementation Plan. Program(s) has a written implementation plan which includes activities, staffing, facilities, management plan and timeline for program implementation.';
            $c3s7_['7.2'] = 'Process Evaluation Plan. Has the program(s) met goals and delivered on key indicators identified by funder(s)?';

            $c3s8_['8.1'] = 'Evaluation Plan : The affiliate program(s) has a written evaluation plan for demonstrating program effectiveness.';
            $c3s8_['8.2'] = ' Performance Targets : The affiliate sets targets for program(s) performance on selected outputs, client outcomes and indicators.';
            $c3s8_['8.3'] = ' Performance Measures : The affiliate compares program(s) results on key performance measures to targets, as a minimum evaluation model for measuring program effectiveness and impact.';




          
            $def_icon ='';
            if(isset($this->session->role_id ) && $this->session->role_id == 3 || $this->session->role_id == 2){ 
                $def_icon = 'i i-remove_red_eye';
            }else{
                $def_icon = 'i i i-create';
            } 
       ?>
       <div class="mainTab2">
       <nav>
            <div class="nav" id="nav-tab" role="tablist">
                <a href="javascript:window.history.back();" class="nav-item nav-link" data-toggle="popover"data-placement="bottom" data-trigger="hover" data-content="Performance Assessment">
                <i class="i i-format_list_bulleted"></i></a>
                <a class="nav-item nav-link" id="nav-x1-tab" href="<?php echo base_url('module/assessment/assessment?tab=1&sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>"
                aria-controls="nav-x1" aria-selected="false"><i class="i i-org"></i> Organizational Soundness</a>
                <a class="nav-item nav-link" id="nav-x2-tab" href="<?php echo base_url('module/assessment/assessment?tab=2&sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>"
                aria-controls="nav-x2" aria-selected="false"><i class="i i-vitality"></i> Organizational Vitality</a>
                <a class="nav-item nav-link" id="nav-x3-tab" href="<?php echo base_url('module/assessment/assessment?tab=3&sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>"
                aria-controls="nav-x3" aria-selected="false"><i class="i i-mission"></i> Implementation of Mission</a>
                <a class="nav-item nav-link active" id="nav-x4-tab" aria-selected="true" href="#">
                <i class="i i-timer"></i> <?php echo ($userId !== '') ? 'Self Assessment - ' : ''; ?>Rating Sheet</a>
            </div>
        </nav>
        </div>
        <form class="m-y-20">
            <div class="row align-items-end">
                
               <?php   
                $overallrating =  (round((($criteriaRatingOne + $criteriaRatingTwo + $criteriaRatingThree) / 3),1,PHP_ROUND_HALF_ODD));            

               ?>
                <div class="col ">
                            <div class="p-b-0 ratingTop">
                                <span class="text-data1 w-240px f-black h4">PERFORMANCE SCORE </span>
                                <span class=" tag p-l-10 ">
                                    <div class="rating">
                                        <span class="star <?php if($overallrating >= 5){echo "active";}?> <?php if($overallrating >= 4.5){echo "half";}?>"></span>
                                        <span class="star <?php if($overallrating >= 4){echo "active";}?> <?php if($overallrating >= 3.5){echo "half";}?>"></span>
                                        <span class="star <?php if($overallrating >= 3){echo "active";}?> <?php if($overallrating >= 2.5){echo "half";}?>"></span>
                                        <span class="star <?php if($overallrating >= 2){echo "active";}?> <?php if($overallrating >= 1.5){echo "half";}?>"></span>
                                        <span class="star <?php if($overallrating >= 1){echo "active";}?> <?php if($overallrating >= 0.5){echo "half";}?>"></span>
                                    </div>
                                    <span class="btn btn-primary btn-lg m-x-10"> <?=isset( $overallrating)? $overallrating:'';?></span>
                                </span>
                            </div>
                        </div>
                <div class="col ">
                  <div class="t-r"><a  target="_blank" href="<?php echo base_url('module/assessment/assessment-pdf?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId); ?>"  class="btn btn-dark btn-rounded min w-100px">EXPORT</a> </div>
                </div>

             
              
            </div>

            

        </form>


        <div class="p-b-20">

        <div class="head rounded-5">
            <div class="row align-items-center">
                <div class="col-md-12 ">
            <h3 class="p-l-20">Criteria 1: Organizational Soundness</h3>
            </div>
                <div class="col-md-12">
                    <div class="t-r  p-r-10">
            <span class="h3 ib-m">Criteria 1 Overall Rating</span>
                <span class="btn btn-light m-x-10 ib-m"> <?=isset($criteriaRatingOne)?$criteriaRatingOne:'0'?></span>
                
            </div>
            </div>
        </div>
        </div>

        <div class="listing">
            <div class="leftChaild">

                <div class="inner">
                    <div class="head">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Administration and 
                                Governance   
                                <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x1&stid=os-1'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            
                            </h5></div>
                            <div class="col-10">

                                <?php if(isset($totalrating['criteriaOne']['c1_s1']['val']) && !empty($totalrating['criteriaOne']['c1_s1']['val'])){
                                    $standardOneRating = (round(($totalrating['criteriaOne']['c1_s1']['val'] / $totalrating['criteriaOne']['c1_s1']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                     <?=isset($standardOneRating)?$standardOneRating:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">

                    <?php foreach( $standard_rating_c1_s1 as $key=> $data){  ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c1s1_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                    <?php  }  ?>
                        
                    </div>
                </div>
                <div class="inner">
                    <div class="head dark">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Affiliate Policies and Procedures 
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x1&stid=os-4'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            
                            <?php if(isset($totalrating['criteriaOne']['c1_s4']['val']) && !empty($totalrating['criteriaOne']['c1_s4']['val'])){
                                    
                                    $standardFourRating = (round(($totalrating['criteriaOne']['c1_s4']['val'] / $totalrating['criteriaOne']['c1_s4']['count']),1,PHP_ROUND_HALF_ODD));
                            
                              }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10"> 
                                <?=isset($standardFourRating)?$standardFourRating:'0'?>
                                </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c1_s4 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c1s4_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                            <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                    <?php }?>

                    
                    </div>
                </div>
            </div>
            <div class="midChaild">
                <div class="inner">
                    <div class="head dark">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Annual Reports
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x1&stid=os-2'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaOne']['c1_s2']['val']) && !empty($totalrating['criteriaOne']['c1_s2']['val'])){
                                    $standardTwoRating = (round(($totalrating['criteriaOne']['c1_s2']['val'] / $totalrating['criteriaOne']['c1_s2']['count']),1,PHP_ROUND_HALF_ODD));
                               
                               }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($standardTwoRating)?$standardTwoRating:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c1_s2 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c1s2_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link"  data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                    <?php }?>
                      
                        
                    </div>
                </div>

                <div class="inner">
                    <div class="head">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Strategic Planning
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x1&stid=os-5'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>        
                        </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaOne']['c1_s5']['val']) && !empty($totalrating['criteriaOne']['c1_s5']['val'])){
                                   
                                    $standardFiveRating = (round(($totalrating['criteriaOne']['c1_s5']['val'] / $totalrating['criteriaOne']['c1_s5']['count']),1,PHP_ROUND_HALF_ODD));
                              
                              }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10"> 
                                <?=isset($standardFiveRating)?$standardFiveRating:'0'?>
                                </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c1_s5 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c1s5_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>

                      
                            <?php } ?>
                    </div>
                </div>

                <div class="inner">
                    <div class="head dark">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Public Affairs and Public Policy
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x1&stid=os-6'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaOne']['c1_s6']['val']) && !empty($totalrating['criteriaOne']['c1_s6']['val'])){
                                   
                                    $standardSixRating = (round(($totalrating['criteriaOne']['c1_s6']['val'] / $totalrating['criteriaOne']['c1_s6']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10"> 
                                <?=isset($standardSixRating)?$standardSixRating:'0'?>
                                </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c1_s6 as $key=> $data){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c1s6_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                    <?php } ?>
                        
                        
                    </div>
                </div>

            </div>
            <div class="rightChaild">
                <div class="inner">
                    <div class="head">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Board of Directors 
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x1&stid=os-3'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaOne']['c1_s3']['val']) && !empty($totalrating['criteriaOne']['c1_s3']['val'])){
                                   
                                    $standardThreeRating = (round(($totalrating['criteriaOne']['c1_s3']['val'] / $totalrating['criteriaOne']['c1_s3']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10"> 
                                <?=isset($standardThreeRating)?$standardThreeRating:'0'?>
                                </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c1_s3 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c1s3_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>

                    <?php } ?>
                        
                    </div>
                </div>
            </div>


        </div>
    </div>


    <div class="p-b-20">

        <div class="head dark rounded-5">
            <div class="row align-items-center">
                <div class="col-md-12 ">
            <h3 class="p-l-20">Criteria 2: Organizational Vitality</h3>
            </div>
                <div class="col-md-12">
                    <div class="t-r  p-r-10">
            <span class="h3 ib-m">Criteria 2 Overall Rating</span>
                <span class="btn btn-light m-x-10 ib-m"> <?=isset($criteriaRatingTwo)?$criteriaRatingTwo:'0'?></span>
                
            </div>
            </div>
        </div>
        </div>

        <div class="listing">
            <div class="leftChaild">

                <div class="inner">
                    <div class="head dark">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Personnel Policies
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x2&stid=qs-1'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaTwo']['c2_s1']['val']) && !empty($totalrating['criteriaTwo']['c2_s1']['val'])){
                                   
                                    $c2s1Ratings = (round(($totalrating['criteriaTwo']['c2_s1']['val'] / $totalrating['criteriaTwo']['c2_s1']['count']),1,PHP_ROUND_HALF_ODD));
                               
                               }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c2s1Ratings)?$c2s1Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c2_s1 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c2s1_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>

                            <?php } ?>
                    </div>
                </div>
                <div class="inner">
                    <div class="head ">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Internal Controls
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x2&stid=qs-4'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaTwo']['c2_s4']['val']) && !empty($totalrating['criteriaTwo']['c2_s4']['val'])){

                                        $c2s4Ratings = (round(($totalrating['criteriaTwo']['c2_s4']['val'] / $totalrating['criteriaTwo']['c2_s4']['count']),1,PHP_ROUND_HALF_ODD));
                               
                               }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c2s4Ratings)?$c2s4Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c2_s4 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c2s4_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>

                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="midChaild">
                <div class="inner">
                    <div class="head ">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Fundraising
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x2&stid=qs-2'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaTwo']['c2_s2']['val']) && !empty($totalrating['criteriaTwo']['c2_s2']['val'])){
                                    $c2s2Ratings = (round(($totalrating['criteriaTwo']['c2_s2']['val'] / $totalrating['criteriaTwo']['c2_s2']['count']),1,PHP_ROUND_HALF_ODD));
                              
                              }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c2s2Ratings)?$c2s2Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c2_s2 as $key=> $data){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c2s2_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                    <?php } ?>
                        
                    </div>
                </div>

                <div class="inner">
                    <div class="head dark">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Fiscal Policies and Procedures
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x2&stid=qs-5'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaTwo']['c2_s3']['val']) && !empty($totalrating['criteriaTwo']['c2_s3']['val'])){
                                    $c2s3Ratings = (round(($totalrating['criteriaTwo']['c2_s3']['val'] / $totalrating['criteriaTwo']['c2_s3']['count']),1,PHP_ROUND_HALF_ODD));

                              }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c2s3Ratings)?$c2s3Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c2_s3 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c2s3_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>

                            <?php } ?>
                        
                    </div>
                </div>
              
                <div class="inner">
                    <div class="head ">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Endowments
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x2&stid=qs-6'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaTwo']['c2_s6']['val']) && !empty($totalrating['criteriaTwo']['c2_s6']['val'])){
                                    $c2s6Ratings = (round(($totalrating['criteriaTwo']['c2_s6']['val'] / $totalrating['criteriaTwo']['c2_s6']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c2s6Ratings)?$c2s6Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                          <?php foreach( $standard_rating_c2_s6 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c2s6_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div> 
                            <?php } ?>
                     

                        
                        
                    </div>
                </div>
                <div class="inner">
                    <div class="head dark">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Corporate Goals
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x2&stid=qs-7'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaTwo']['c2_s7']['val']) && !empty($totalrating['criteriaTwo']['c2_s7']['val'])){
                                    $c2s7Ratings = (round(($totalrating['criteriaTwo']['c2_s7']['val'] / $totalrating['criteriaTwo']['c2_s7']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c2s7Ratings)?$c2s7Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c2_s7 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c2s7_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                    <?php } ?>
                        
                        
                    </div>
                </div>

            </div>
            <div class="rightChaild">
                <div class="inner">
                    <div class="head dark">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Fiscal/Financial Management 
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x2&stid=qs-3'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaTwo']['c2_s3']['val']) && !empty($totalrating['criteriaTwo']['c2_s3']['val'])){
                                    $c2s3Ratings = (round(($totalrating['criteriaTwo']['c2_s3']['val'] / $totalrating['criteriaTwo']['c2_s3']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c2s3Ratings)?$c2s3Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c2_s3 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c2s3_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                            <?php } ?>
                       
                    
                    </div>
                </div>

                <div class="inner">
                    <div class="head ">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Legal, Compliance and Accountability
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x2&stid=qs-8'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                                  </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaTwo']['c2_s8']['val']) && !empty($totalrating['criteriaTwo']['c2_s8']['val'])){
                                    $c2s8Ratings = (round(($totalrating['criteriaTwo']['c2_s8']['val'] / $totalrating['criteriaTwo']['c2_s8']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10"> 
                                <?=isset($c2s8Ratings)?$c2s8Ratings:'0'?>
                                </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c2_s8 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c2s8_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                            <?php } ?>
                        
                    </div>
                </div>

            </div>


        </div>
    </div>

    <div class="p-b-20">

        <div class="head rounded-5">
            <div class="row align-items-center">
                <div class="col-md-12 ">
            <h3 class="p-l-20">Criteria 3: Implementation of mission</h3>
            </div>
                <div class="col-md-12">
                    <div class="t-r  p-r-10">
            <span class="h3 ib-m">Criteria 3 Overall Rating</span>
                <span class="btn btn-light m-x-10 ib-m"><?=isset($criteriaRatingThree)?$criteriaRatingThree:'0'?></span>
                
            </div>
            </div>
        </div>
        </div>

        <div class="listing">
            <div class="leftChaild">

                <div class="inner">
                    <div class="head">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Operational Standards
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x3&stid=dt-1'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaThree']['c3_s1']['val']) && !empty($totalrating['criteriaThree']['c3_s1']['val'])){
                                    $c3s1Ratings = (round(($totalrating['criteriaThree']['c3_s1']['val'] / $totalrating['criteriaThree']['c3_s1']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c3s1Ratings)?$c3s1Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c3_s1 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c3s1_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                            <?php } ?>

                    </div>
                </div>
                <div class="inner">
                    <div class="head dark">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Operational Standards
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x3&stid=dt-4'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaThree']['c3_s4']['val']) && !empty($totalrating['criteriaThree']['c3_s4']['val'])){
                                    $c3s4Ratings = (round(($totalrating['criteriaThree']['c3_s4']['val'] / $totalrating['criteriaThree']['c3_s4']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10"> 
                                <?=isset($c3s4Ratings)?$c3s4Ratings:'0'?>
                                </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c3_s4 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c3s4_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                    <?php } ?>

                       
                    </div>
                </div>
            </div>
            <div class="midChaild">
                <div class="inner">
                    <div class="head dark">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Program Quality 
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x3&stid=dt-2'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaThree']['c3_s2']['val']) && !empty($totalrating['criteriaThree']['c3_s2']['val'])){
                                    $c3s2Ratings = (round(($totalrating['criteriaThree']['c3_s2']['val'] / $totalrating['criteriaThree']['c3_s2']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c3s2Ratings)?$c3s2Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c3_s2 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c3s2_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>

                            <?php } ?>
                        
                    </div>
                </div>

                <div class="inner">
                    <div class="head">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Operational Standards
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x3&stid=dt-5'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaThree']['c3_s5']['val']) && !empty($totalrating['criteriaThree']['c3_s5']['val'])){
                                    $c3s5Ratings = (round(($totalrating['criteriaThree']['c3_s5']['val'] / $totalrating['criteriaThree']['c3_s5']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c3s5Ratings)?$c3s5Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c3_s5 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c3s5_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                    <?php } ?>
  
                    </div>
                </div>

                <div class="inner">
                    <div class="head ">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Operational Standards
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x3&stid=dt-7'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaThree']['c3_s7']['val']) && !empty($totalrating['criteriaThree']['c3_s7']['val'])){
                                    $c3s7Ratings = (round(($totalrating['criteriaThree']['c3_s7']['val'] / $totalrating['criteriaThree']['c3_s7']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c3s7Ratings)?$c3s7Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c3_s7 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c3s7_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
            
                            <?php } ?>
                        
                    </div>
                </div>

            </div>
            <div class="rightChaild">
                <div class="inner">
                    <div class="head">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Program Quality
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x3&stid=dt-3'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                             </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaThree']['c3_s3']['val']) && !empty($totalrating['criteriaThree']['c3_s3']['val'])){
                                    $c3s3Ratings = (round(($totalrating['criteriaThree']['c3_s3']['val'] / $totalrating['criteriaThree']['c3_s3']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c3s3Ratings)?$c3s3Ratings:'0'?>

                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c3_s3 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c3s3_[$key]?>"><?=isset($key)?$key:''?></a>

                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>

                            <?php } ?>
                       
                       
                   
                    </div>
                </div>
                <div class="inner">
                    <div class="head dark">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Operational Standards 
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x3&stid=dt-6'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>
                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaThree']['c3_s6']['val']) && !empty($totalrating['criteriaThree']['c3_s6']['val'])){
                                    $c3s6Ratings = (round(($totalrating['criteriaThree']['c3_s6']['val'] / $totalrating['criteriaThree']['c3_s6']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c3s6Ratings)?$c3s6Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c3_s6 as $key=> $data ){ ?>
                      

                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c3s6_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>

                            <?php } ?>
                     
                     
                       
                   
                    </div>
                </div>
                <div class="inner">
                    <div class="head ">
                        <div class="row align-items-center">
                            <div class="col-14"><h5>Program Quality 
                            <a href="<?php echo base_url('module/assessment/assessment?sid='.$_GET['sid'].'&aid='.$_GET['aid'].$userId.'&tid=nav-x3&stid=dt-8'); ?>" class="btn">
                                <i class="<?=$def_icon?>"> </i></a>

                            </h5></div>
                            <div class="col-10">
                            <?php if(isset($totalrating['criteriaThree']['c3_s8']['val']) && !empty($totalrating['criteriaThree']['c3_s8']['val'])){
                                    $c3s8Ratings = (round(($totalrating['criteriaThree']['c3_s8']['val'] / $totalrating['criteriaThree']['c3_s8']['count']),1,PHP_ROUND_HALF_ODD));

                                }  ?>
                                <div class="t-r"> <span class="h5">Rating</span><span class="btn btn-light m-x-10">
                                <?=isset($c3s8Ratings)?$c3s8Ratings:'0'?>
                                    </span></div></div>
                        </div>
                    </div>
                    <div class="cdnWrap">
                    <?php foreach( $standard_rating_c3_s8 as $key=> $data ){ ?>
                        <div class="row f-row">
                        <div class="col-14"><div class="t-c">
                          
                            <a class="link"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="top"
                            data-trigger="hover"
                            data-content="<?=$c3s8_[$key]?>"><?=isset($key)?$key:''?></a>
                        </div></div>

                        <div class="col-10">
                                <div class="rIcon">
                                <?php if(isset($data['rating']) && !empty($data['rating'])){ 
                                    echo $data['rating'];
                                }else{ 
                                    echo "0";
                                } ?>
                                <?php if(isset($data['comment']) && $data['comment'] != ""){ ?>
                                <a class="link" data-container="body" data-toggle="popover" data-placement="top"
                                        data-trigger="hover"
                                        data-content="<?=$data['comment'];?>">
                                        <i class="i i i-chat-line"></i></a>
                                <?php } ?>
                                </div>
                            </div>
                            </div>

                            <?php } ?>
  
                    </div>
                </div>
            </div>


        </div>
    </div>


      </div>
    </div>
  </main>