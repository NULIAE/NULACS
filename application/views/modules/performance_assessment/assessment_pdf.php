<html>

<head>
  <title>Performance Assessment</title>
</head>

<body style="font-size: 18px;">
  <div style="width: 1240px; box-sizing: border-box;">
    <?php
      foreach ($criteria_answers_view as $criteria) {
         if ($criteria_one_standard_one->cid == $criteria['question_id']) {
            $s1_criteria_one_a = json_decode($criteria['answers']);
         }
         if ($criteria_one_standard_two->cid == $criteria['question_id']) {
            $s2_criteria_one_a = json_decode($criteria['answers']);
         }
         if ($criteria_one_standard_three->cid == $criteria['question_id']) {
            $s3_criteria_one_a = json_decode($criteria['answers']);
         }
         if ($criteria_one_standard_four->cid == $criteria['question_id']) {
            $s4_criteria_one_a = json_decode($criteria['answers']);
         }
         if ($criteria_one_standard_five->cid == $criteria['question_id']) {
            $s5_criteria_one_a = json_decode($criteria['answers']);
         }
         if ($criteria_one_standard_six->cid == $criteria['question_id']) {
            $s6_criteria_one_a = json_decode($criteria['answers']);
         }

         if ($criteria_two_standard_one->cid == $criteria['question_id']) {
            $s1_criteria_two_a = json_decode($criteria['answers']);
         }
         if ($criteria_two_standard_two->cid == $criteria['question_id']) {
            $s2_criteria_two_a = json_decode($criteria['answers']);
         }
         if ($criteria_two_standard_three->cid == $criteria['question_id']) {
            $s3_criteria_two_a = json_decode($criteria['answers']);
         }
         if ($criteria_two_standard_four->cid == $criteria['question_id']) {
            $s4_criteria_two_a = json_decode($criteria['answers']);
         }
         if ($criteria_two_standard_five->cid == $criteria['question_id']) {
            $s5_criteria_two_a = json_decode($criteria['answers']);
         }
         if ($criteria_two_standard_six->cid == $criteria['question_id']) {
            $s6_criteria_two_a = json_decode($criteria['answers']);
         }
         if ($criteria_two_standard_seven->cid == $criteria['question_id']) {
            $s7_criteria_two_a = json_decode($criteria['answers']);
         }
         if ($criteria_two_standard_eight->cid == $criteria['question_id']) {
            $s8_criteria_two_a = json_decode($criteria['answers']);
         }

         if ($criteria_three_standard_one->cid == $criteria['question_id']) {
            $s1_criteria_three_a = json_decode($criteria['answers']);
         }
         if ($criteria_three_standard_two->cid == $criteria['question_id']) {
            $s2_criteria_three_a = json_decode($criteria['answers']);
         }
         if ($criteria_three_standard_three->cid == $criteria['question_id']) {
            $s3_criteria_three_a = json_decode($criteria['answers']);
         }
         if ($criteria_three_standard_four->cid == $criteria['question_id']) {
            $s4_criteria_three_a = json_decode($criteria['answers']);
         }
         if ($criteria_three_standard_five->cid == $criteria['question_id']) {
            $s5_criteria_three_a = json_decode($criteria['answers']);
         }
         if ($criteria_three_standard_six->cid == $criteria['question_id']) {
            $s6_criteria_three_a = json_decode($criteria['answers']);
         }
         if ($criteria_three_standard_seven->cid == $criteria['question_id']) {
            $s7_criteria_three_a = json_decode($criteria['answers']);
         }
         if ($criteria_three_standard_eight->cid == $criteria['question_id']) {
            $s8_criteria_three_a = json_decode($criteria['answers']);
         }
      }


      ?>
    <div>
      <div
        style="width: 100%;text-align: center;padding: 5px 30px;text-transform: uppercase;">
        <h3><?= $title; ?></h3>
      </div>
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Criteria 1: Organizational Soundness </h3>
      </div>
      <div
        style="padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <p>Affiliates are governed by an elected volunteer board of directors that should consist of individuals who are
          committed to the mission of the organization. An effective affiliate board determines the mission of the
          organization, establishes management practices, policies and procedures, assures that adequate human resources
          (volunteer and paid staff) and financial resources are available, and actively monitors the organizations
          financial and programmatic performance.</p>
      </div>
    </div>
    <div>
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Administration and Governance </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 1</h5>
        <p>Affiliates should prepare, and make available annually to the public, information about the affiliate’s
          mission, program activities, and basic audited financial data. The report should also identify the names of
          the affiliate’s board of directors and management staff.
        </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.1 Does the Affiliate’s Bylaws include all of the following items?</h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_one_a->c1_s1_1_1_comment_1) ? $s1_criteria_one_a->c1_s1_1_1_comment_1 : '' ?>
        </p>
        <ul style="list-style: circle;">
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">A minimum requirement of at
            least 5 Board
            members? <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_checkbox_1) ? ucwords($s1_criteria_one_a->c1_s1_1_1_checkbox_1) : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">Requirement of a quorum to
            transact business?
            <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_checkbox_2) ? ucwords($s1_criteria_one_a->c1_s1_1_1_checkbox_2) : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">How and when notices for Board
            meetings are decided?
            <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_checkbox_3) ? ucwords($s1_criteria_one_a->c1_s1_1_1_checkbox_3) : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">How members are
            elected/appointed to the Board?
            <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_checkbox_4) ? ucwords($s1_criteria_one_a->c1_s1_1_1_checkbox_4) : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">
            What the terms of office are for Board members?
            <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_checkbox_5) ? ucwords($s1_criteria_one_a->c1_s1_1_1_checkbox_5) : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">
            How Board members can be removed from the Board?
            <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_checkbox_6) ? ucwords($s1_criteria_one_a->c1_s1_1_1_checkbox_6) : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">
            How urgent matters will be handled in between board meetings?
            <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_checkbox_7) ? ucwords($s1_criteria_one_a->c1_s1_1_1_checkbox_7) : '' ?>
            </span>
          </li>
          <h5>VERIFICATION SOURCE OR COMMENT(S): ATTACH A COPY OF THE AFFILIATE’S CURRENT BYLAWS; INDICATE PAGE NUMBERS
            FOR THE FOLLOWING:
          </h5>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">
            Term limits for board members
            <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_val_1) ? $s1_criteria_one_a->c1_s1_1_1_val_1 : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">
            Attendance for board members
            <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_val_2) ? $s1_criteria_one_a->c1_s1_1_1_val_2 : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">
            Participation for board members
            <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_val_3) ? $s1_criteria_one_a->c1_s1_1_1_val_3 : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">
            Consequences for noncompliance with board policies
            <br>
            <span>
              <?= isset($s1_criteria_one_a->c1_s1_1_1_val_4) ? $s1_criteria_one_a->c1_s1_1_1_val_4 : '' ?>
            </span>
          </li>
        </ul>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_one_a->c1_s1_1_1_rating_1) ? $s1_criteria_one_a->c1_s1_1_1_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.2 Does the board review the affiliate’s bylaws at least every three years, revise as necessary and file
            with the National Urban League?</h5>
        </div>
        <span>
          <?= isset($s1_criteria_one_a->c1_s1_1_2_checkbox_1) ? ucwords($s1_criteria_one_a->c1_s1_1_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_one_a->c1_s1_1_2_comment_1) ? $s1_criteria_one_a->c1_s1_1_2_comment_1 : '' ?>
        </p>
        <h5> Verification Source or Comment(s):
          Review Date:
          <?= isset($s1_criteria_one_a->c1_s1_1_2_date_1) ? $s1_criteria_one_a->c1_s1_1_2_date_1 : '' ?> Approved
          <?= isset($s1_criteria_one_a->c1_s1_1_2_date_2) ? $s1_criteria_one_a->c1_s1_1_2_date_2 : '' ?>
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_one_a->c1_s1_1_2_rating_1) ? $s1_criteria_one_a->c1_s1_1_2_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.3 The affiliate’s bylaws are adhered to in the conduct of the affiliate’s corporate business, and is
            consistent with the Articles of Incorporation, National Urban League policies, standards, and guidelines, as
            well as federal, state, and local laws
          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_one_a->c1_s1_1_3_checkbox_1) ? ucwords($s1_criteria_one_a->c1_s1_1_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_one_a->c1_s1_1_3_comment_1) ? $s1_criteria_one_a->c1_s1_1_3_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_one_a->c1_s1_1_3_rating_1) ? $s1_criteria_one_a->c1_s1_1_3_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.4 The bylaws reflect board rotation and term limits policies, board orientation/development, job
            descriptions and committee structure
          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_one_a->c1_s1_1_4_checkbox_1) ? ucwords($s1_criteria_one_a->c1_s1_1_4_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_one_a->c1_s1_1_4_comment_1) ? $s1_criteria_one_a->c1_s1_1_4_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_one_a->c1_s1_1_4_rating_1) ? $s1_criteria_one_a->c1_s1_1_4_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.5 The Articles of Incorporation are consistent with current state, federal, and local laws, and are
            reviewed at the same time as the affiliate bylaws are updated.
          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_one_a->c1_s1_1_5_checkbox_1) ? ucwords($s1_criteria_one_a->c1_s1_1_5_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_one_a->c1_s1_1_5_comment_1) ? $s1_criteria_one_a->c1_s1_1_5_comment_1 : '' ?>
        </p>
        <h5>Verification Source or Comment(s): Current Affiliate Articles of Incorporation; Date of Board Review:
          <?= isset($s1_criteria_one_a->c1_s1_1_5_date_1) ? $s1_criteria_one_a->c1_s1_1_5_date_1 : '' ?>
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_one_a->c1_s1_1_5_rating_1) ? $s1_criteria_one_a->c1_s1_1_5_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.6 The corporate minutes, reports, and other legal records are filed, signed and maintained as required
            by federal, state, and local statutes/ regulations, and uploaded to the Affiliated Data Management (ADM) as
            required by National Urban League guidelines, and by parliamentary authority.
          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_one_a->c1_s1_1_6_checkbox_1) ? ucwords($s1_criteria_one_a->c1_s1_1_6_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_one_a->c1_s1_1_6_comment_1) ? $s1_criteria_one_a->c1_s1_1_6_comment_1 : '' ?>
        </p>
        <h5>Verification Source or Comment(s): Affiliate Current Bylaws and Articles of Incorporation; Urban League
          guidelines; federal, state, and local guidelines; date(s) on which articles of incorporation have been
          reviewed by legal counsel, board minutes, and annual meeting minutes</h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_one_a->c1_s1_1_6_rating_1) ? $s1_criteria_one_a->c1_s1_1_6_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.7 The affiliate uses an evaluation tool to evaluate the work of the board, individually and
            collectively.
          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_one_a->c1_s1_1_7_checkbox_1) ? ucwords($s1_criteria_one_a->c1_s1_1_7_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_one_a->c1_s1_1_7_comment_1) ? $s1_criteria_one_a->c1_s1_1_7_comment_1 : '' ?>
        </p>
        <h5>Verification Source or Comment(s): Describe in writing the process the board uses to evaluate its own
          performance. Please provide any Questionnaires, forms, surveys, which may illustrate your board evaluation
          procedure. When did the board last evaluate its own performance?
          <?= isset($s1_criteria_one_a->c1_s1_1_7_date_1) ? $s1_criteria_one_a->c1_s1_1_7_date_1 : '' ?>
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_one_a->c1_s1_1_7_rating_1) ? $s1_criteria_one_a->c1_s1_1_7_rating_1 : '' ?>
        </h4>
        <?php
            $rating_c1s1 = $totalrating['criteriaOne']['c1_s1'];

            $tRatings1c1 =  (round((($rating_c1s1['val']) / $rating_c1s1['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings1c1) ? $tRatings1c1 : '' ?>/5
        </h3>
      </div>
      <!-- c1s1 end -->
      <!-- c1s2 start -->
      <div
        style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Annual Reports </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 2</h5>
        <p>Affiliates should prepare, and make available annually to the public, information about the affiliate’s
          mission, program activities, and basic audited financial data. The report should also identify the names of
          the affiliate’s board of directors and management staff. </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>2.1 Attach a copy of the most recent annual report made available to the public.</h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_one_a->c1_s2_2_1_comment_1) ? $s2_criteria_one_a->c1_s2_2_1_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_one_a->c1_s2_2_1_rating_1) ? $s2_criteria_one_a->c1_s2_2_1_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>2.2 Describe in writing, the procedure the affiliate has in place for allowing members of the general
            public to provide input to the affiliate.</h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_one_a->c1_s2_2_2_comment_1) ? $s2_criteria_one_a->c1_s2_2_2_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_one_a->c1_s2_2_2_rating_1) ? $s2_criteria_one_a->c1_s2_2_2_rating_1 : '' ?>
        </h4>
        <?php
            $rating_c1s2 = $totalrating['criteriaOne']['c1_s2'];

            $tRatings2c1 =  (round((($rating_c1s2['val']) / $rating_c1s2['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings2c1) ? $tRatings2c1 : '' ?>/5
        </h3>
      </div>
      <!-- c1s2 end -->
      <!-- c1s3 start -->
      <div
        style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Board of Directors </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 3</h5>
        <p>The affiliate’s Board of Directors nominating/development committees annually assesses the board’s needs,
          recruits qualified individuals within the affiliate’s community for election by the membership body.</p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.1 Does the affiliate’s Board of Directors recruit, select and employ the President/CEO and provide
            clearly written expectations and qualifications for the position?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_1_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_1_comment_1) ? $s3_criteria_one_a->c1_s3_3_1_comment_1 : '' ?>
        </p>
        Verification Source or Comment(s): (1) Indicate date (year) current CEO was hired <b>
          <?= isset($s3_criteria_one_a->c1_s3_3_1_date_1) ? $s3_criteria_one_a->c1_s3_3_1_date_1 : '' ?>
        </b> Date of Last Performance Review
        <b>
          <?= isset($s3_criteria_one_a->c1_s3_3_1_date_2) ? $s3_criteria_one_a->c1_s3_3_1_date_2 : '' ?>
        </b>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_1_rating_1) ? $s3_criteria_one_a->c1_s3_3_1_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.2 Does the membership of the board include expertise that would promote the proper operation of the
            affiliate and further the goals of its program?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_2_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_2_comment_1) ? $s3_criteria_one_a->c1_s3_3_2_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_2_rating_1) ? $s3_criteria_one_a->c1_s3_3_2_rating_1 : '' ?>
        </h4>
        <h5>Verification Source or Comment(s): Affiliate By-Laws, Page -
          <?= isset($s3_criteria_one_a->c1_s3_3_2_val_1) ? $s3_criteria_one_a->c1_s3_3_2_val_1 : '' ?>
        </h5>
        <h5> VERIFICATION SOURCE OR COMMENT(S): ATTACH A LIST OF CURRENT BOARD MEMBERS WITH THE FOLLOWING INFORMATION
          FOR EACH MEMBER: NAME, PRINCIPAL EMPLOYER, OCCUPATION, SPECIAL SKILLS, AND THE DATE EACH BOARD MEMBER’S TERM
          EXPIRES. CLEARLY MARK THE BOARD OFFICERS AND ANY EMPLOYEES WHO SERVE ON THE BOARD </h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.3 Does the board have a mandatory attendance policy?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_3_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_3_comment_1) ? $s3_criteria_one_a->c1_s3_3_3_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_3_rating_1) ? $s3_criteria_one_a->c1_s3_3_3_rating_1 : '' ?>
        </h4>
        <h5>Verification Source or Comment(s): Affiliate By-Laws, Page -
          <?= isset($s3_criteria_one_a->c1_s3_3_3_val_1) ? $s3_criteria_one_a->c1_s3_3_3_val_1 : '' ?>
        </h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.4 Is the Board of Director’s representative of the ethnic and cultural diversity of the community?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_4_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_4_checkbox_1 ): '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_4_comment_1) ? $s3_criteria_one_a->c1_s3_3_4_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_4_rating_1) ? $s3_criteria_one_a->c1_s3_3_4_rating_1 : '' ?>
        </h4>
        <h5>Verification Source or Comment(s): Affiliate By-Laws, Page -
          <?= isset($s3_criteria_one_a->c1_s3_3_4_val_1) ? $s3_criteria_one_a->c1_s3_3_4_val_1 : '' ?>
        </h5>
        <br><br>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.5 If the affiliate has any related party transactions with board members, or between board members and
            members of their family, are these disclosed to the Board of Directors, and to the affiliate’s independent
            auditor? Is there a written record of the disclosure?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_5_check_1) ? $s3_criteria_one_a->c1_s3_3_5_check_1 : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_5_comment_1) ? $s3_criteria_one_a->c1_s3_3_5_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_5_rating_1) ? $s3_criteria_one_a->c1_s3_3_5_rating_1 : '' ?>
        </h4>
        <h5>Verification Source or Comment(s): Conflict of Interest/Code of Conduct Signed Statements
          Page -
          <?= isset($s3_criteria_one_a->c1_s3_3_5_val_1) ? $s3_criteria_one_a->c1_s3_3_5_val_1 : '' ?>
        </h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.6 Does the organization acknowledge and disclose to the board and auditor any pending or threatened
            lawsuits, claims, or assessments which may have an impact on the organization’s finances and/or operating
            effectiveness? Is this listed in the minutes?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_6_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_6_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_6_comment_1) ? $s3_criteria_one_a->c1_s3_3_6_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_6_rating_1) ? $s3_criteria_one_a->c1_s3_3_6_rating_1 : '' ?>
        </h4>
        <h5>Verification Source or Comment(s): Affiliate board minutes
          Page -
          <?= isset($s3_criteria_one_a->c1_s3_3_6_val_1) ? $s3_criteria_one_a->c1_s3_3_6_val_1 : '' ?>
        </h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.7 Has the Board of Directors adopted a clear, meaningful written mission statement which reflects the
            affiliate’s purpose, values and people served?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_7_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_7_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_7_comment_1) ? $s3_criteria_one_a->c1_s3_3_7_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_7_rating_1) ? $s3_criteria_one_a->c1_s3_3_7_rating_1 : '' ?>
        </h4>
        <h5>Verification Source or Comment(s): Affiliate Mission Statement By-Laws, Page -
          <?= isset($s3_criteria_one_a->c1_s3_3_7_val_1) ? $s3_criteria_one_a->c1_s3_3_7_val_1 : '' ?>
          and Articles of Incorporation, Page -
          <?= isset($s3_criteria_one_a->c1_s3_3_7_val_2) ? $s3_criteria_one_a->c1_s3_3_7_val_2 : '' ?>
        </h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.8 Do the affiliate’s board and staff review the mission statement at least once every three years?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_8_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_8_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_8_comment_1) ? $s3_criteria_one_a->c1_s3_3_8_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_8_rating_1) ? $s3_criteria_one_a->c1_s3_3_8_rating_1 : '' ?>
        </h4>
        <h5>Verification Source or Comment(s): Affiliate board minutes, Page -
          <?= isset($s3_criteria_one_a->c1_s3_3_8_val_1) ? $s3_criteria_one_a->c1_s3_3_8_val_1 : '' ?>
          date of last review,
          <?= isset($s3_criteria_one_a->c1_s3_3_8_date_1) ? $s3_criteria_one_a->c1_s3_3_8_date_1 : '' ?>
        </h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.9 Are the affiliate’s programs and services congruent with the affiliate’s mission and strategic plan?
          </h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_9_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_9_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_9_comment_1) ? $s3_criteria_one_a->c1_s3_3_9_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_9_rating_1) ? $s3_criteria_one_a->c1_s3_3_9_rating_1 : '' ?>
        </h4>
        <h5>Verification Source or Comment(s): List of Programs to include funder, funding amount, contractual period
        </h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.10 If the affiliate entered into a “fiscal agent” or “host organization” relationship with another
            organization, does the affiliate have a written agreement on file which defines the terms of the
            relationship with the other organization?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_10_checkbox_1) ? $s3_criteria_one_a->c1_s3_3_10_checkbox_1 : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_10_comment_1) ? $s3_criteria_one_a->c1_s3_3_10_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_10_rating_1) ? $s3_criteria_one_a->c1_s3_3_10_rating_1 : '' ?>
        </h4>
        <h5>N/A
          <?= isset($s3_criteria_one_a->c1_s3_3_10_val_1) ? $s3_criteria_one_a->c1_s3_3_10_val_1 : '' ?>
        </h5>
        <h5>Verification Source or Comment(s): Copy of written agreement and board minutes that approved the
          relationship</h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.11 Based on your By-Laws, how many times should the Affiliate Board meet per year? How many times did
            your board meet?</h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_11_comment_1) ? $s3_criteria_one_a->c1_s3_3_11_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_11_rating_1) ? $s3_criteria_one_a->c1_s3_3_11_rating_1 : '' ?>
        </h4>
        <h5># -
          <?= isset($s3_criteria_one_a->c1_s3_3_11_val_1) ? $s3_criteria_one_a->c1_s3_3_11_val_1 : '' ?>
        </h5>
        <h5># -
          <?= isset($s3_criteria_one_a->c1_s3_3_11_val_2) ? $s3_criteria_one_a->c1_s3_3_11_val_2 : '' ?>
        </h5>
        <h5>Verification Source or Comment(s): Copy of written agreement and board minutes that approved the
          relationship</h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.12 Based on your By-Laws, what constitutes a quorum? How many board meetings did not have a quorum
            during the previous year?</h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_12_comment_1) ? $s3_criteria_one_a->c1_s3_3_12_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_12_rating_1) ? $s3_criteria_one_a->c1_s3_3_12_rating_1 : '' ?>
        </h4>
        <h5># -
          <?= isset($s3_criteria_one_a->c1_s3_3_12_val_1) ? $s3_criteria_one_a->c1_s3_3_12_val_1 : '' ?>
        </h5>
        <h5>Date
          <?= isset($s3_criteria_one_a->c1_s3_3_12_date_1) ? $s3_criteria_one_a->c1_s3_3_12_date_1 : '' ?>
        </h5>
        <h5>Verification Source or Comment(s): Affiliate board minutes</h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.13 Does the affiliate have a policy where all contracts entered in to by the Affiliate are presented to
            the Board for review/approval?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_13_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_13_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_13_comment_1) ? $s3_criteria_one_a->c1_s3_3_13_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_13_rating_1) ? $s3_criteria_one_a->c1_s3_3_13_rating_1 : '' ?>
        </h4>
        <h5>N/A -
          <?= isset($s3_criteria_one_a->c1_s3_3_13_val_1) ? $s3_criteria_one_a->c1_s3_3_13_val_1 : '' ?>
        </h5>
        <h5>Verification Source or Comment(s): Affiliate board minutes,Page -
          <?= isset($s3_criteria_one_a->c1_s3_3_13_val_2) ? $s3_criteria_one_a->c1_s3_3_13_val_2 : '' ?>
        </h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.13 Does the affiliate have a policy where all contracts entered in to by the Affiliate are presented to
            the Board for review/approval?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_13_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_13_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_13_comment_1) ? $s3_criteria_one_a->c1_s3_3_13_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_13_rating_1) ? $s3_criteria_one_a->c1_s3_3_13_rating_1 : '' ?>
        </h4>
        <h5>N/A -
          <?= isset($s3_criteria_one_a->c1_s3_3_13_val_1) ? $s3_criteria_one_a->c1_s3_3_13_val_1 : '' ?>
        </h5>
        <h5>Verification Source or Comment(s): Affiliate board minutes,Page -
          <?= isset($s3_criteria_one_a->c1_s3_3_13_val_2) ? $s3_criteria_one_a->c1_s3_3_13_val_2 : '' ?>
        </h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.14 Does the Affiliate provide written agendas, as well as materials relating to significant decisions
            made in advance of board meetings?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_14_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_14_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_14_comment_1) ? $s3_criteria_one_a->c1_s3_3_14_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_14_rating_1) ? $s3_criteria_one_a->c1_s3_3_14_rating_1 : '' ?>
        </h4>
        <p style="font-weight: 600;">Verification Source or Comment(s): Affiliate board agendas indicating date and page
          of board minutes reflecting the following:</p>
        <table style="width: 100%; text-align: left;">
          <thead>
            <tr>
              <th style="text-align: left;">Year</th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Date Budget </th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Date Audit</th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Date 990</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_1) ? $s3_criteria_one_a->c1_s3_3_14_val_1 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_2) ? $s3_criteria_one_a->c1_s3_3_14_val_2 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_3) ? $s3_criteria_one_a->c1_s3_3_14_val_3 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_4) ? $s3_criteria_one_a->c1_s3_3_14_val_4 : '' ?>
              </td>
            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_5) ? $s3_criteria_one_a->c1_s3_3_14_val_5 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_6) ? $s3_criteria_one_a->c1_s3_3_14_val_6 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_7) ? $s3_criteria_one_a->c1_s3_3_14_val_7 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_8) ? $s3_criteria_one_a->c1_s3_3_14_val_8 : '' ?>
              </td>
            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_9) ? $s3_criteria_one_a->c1_s3_3_14_val_9 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_10) ? $s3_criteria_one_a->c1_s3_3_14_val_10 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_11) ? $s3_criteria_one_a->c1_s3_3_14_val_11 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_12) ? $s3_criteria_one_a->c1_s3_3_14_val_12 : '' ?>
              </td>
            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_13) ? $s3_criteria_one_a->c1_s3_3_14_val_13 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_14) ? $s3_criteria_one_a->c1_s3_3_14_val_14 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_15) ? $s3_criteria_one_a->c1_s3_3_14_val_15 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">
              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">
                <?= isset($s3_criteria_one_a->c1_s3_3_14_val_16) ? $s3_criteria_one_a->c1_s3_3_14_val_16 : '' ?>
              </td>
            </tr>
          </tbody>
        </table>
        <ul style="list-style: circle;">
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">Board’s resolution indicating
            that the affiliate will perform a Performance Assessment
            <span>
              <?= isset($s3_criteria_one_a->c1_s3_3_14_date_1) ? $s3_criteria_one_a->c1_s3_3_14_date_1 : '' ?> page -
              <?= isset($s3_criteria_one_a->c1_s3_3_14_val_17) ? $s3_criteria_one_a->c1_s3_3_14_val_17 : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">Board’s most recent evaluation
            of the President/CEO
            <span>
              <?= isset($s3_criteria_one_a->c1_s3_3_14_date_2) ? $s3_criteria_one_a->c1_s3_3_14_date_2 : '' ?> page -
              <?= isset($s3_criteria_one_a->c1_s3_3_14_val_18) ? $s3_criteria_one_a->c1_s3_3_14_val_18 : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">Board’s most recent approval
            of the President/CEO’s salary
            <span>
              <?= isset($s3_criteria_one_a->c1_s3_3_14_date_3) ? $s3_criteria_one_a->c1_s3_3_14_date_3 : '' ?> page -
              <?= isset($s3_criteria_one_a->c1_s3_3_14_val_19) ? $s3_criteria_one_a->c1_s3_3_14_val_19 : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">Who is responsible for the
            board minutes?
            <span>
              <?= isset($s3_criteria_one_a->c1_s3_3_14_date_4) ? $s3_criteria_one_a->c1_s3_3_14_date_4 : '' ?> page -
              <?= isset($s3_criteria_one_a->c1_s3_3_14_date_5) ? $s3_criteria_one_a->c1_s3_3_14_date_5 : '' ?>
            </span>
          </li>
          <li style="border-bottom: 1px solid #ccc; line-height: 24px; padding: 5px 0px;">Where are the board minutes
            kept?
          </li>
        </ul>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.15 Do family members serve on the Board?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_15_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_15_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_15_comment_1) ? $s3_criteria_one_a->c1_s3_3_15_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_15_rating_1) ? $s3_criteria_one_a->c1_s3_3_15_rating_1 : '' ?>
        </h4>
        <h5>Verification Source or Comment(s): If yes, please explain </h5>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.15 Do family members serve on the Board?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_one_a->c1_s3_3_16_checkbox_1) ? ucwords($s3_criteria_one_a->c1_s3_3_16_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_one_a->c1_s3_3_16_comment_1) ? $s3_criteria_one_a->c1_s3_3_16_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_one_a->c1_s3_3_16_rating_1) ? $s3_criteria_one_a->c1_s3_3_16_rating_1 : '' ?>
        </h4>
        <h5>VERIFICATION SOURCE OR COMMENT(S): ATTACH A COPY OF THE AFFILIATE’S CONFLICT OF INTEREST POLICY WHICH COVERS
          BOARD, STAFF AND VOLUNTEERS THAT IDENTIFIES CONDUCT OR TRANSACTIONS THAT RAISE CONCERNS; OUTLINE PROCEDURES
          FOR DISCLOSURE OF ACTUAL AND POTENTIAL CONFLICTS AND PROVIDES FOR TRANSACTIONS REVIEWED BY UNINVOLVED MEMBERS
          OF THE BOARD. </h5>
        <?php
            $rating_c1s3 = $totalrating['criteriaOne']['c1_s3'];

            $tRatings3c1 =  (round((($rating_c1s3['val']) / $rating_c1s3['count']), 1, PHP_ROUND_HALF_ODD));

            ?>
        <h3>Calculation -
          <?= isset($tRatings3c1) ? $tRatings3c1 : '' ?>/5
        </h3>
      </div>
      <!-- c1s3 end -->
      <!-- c1s4 start -->
      <div
        style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Affiliate Policies and Procedures </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 4</h5>
        <p>The affiliate fulfills its corporate obligations as required by local, state, and federal government and the
          National Urban League.</p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.1 Does the affiliate have these current manuals in place: Personnel Manual, Accounting Manual, Policies
            and Procedures Manual, Volunteer Manual and Affiliate Resource Manual?</h5>
        </div>
        <span>
          <?= isset($s4_criteria_one_a->c1_s4_4_1_checkbox_1) ? ucwords($s4_criteria_one_a->c1_s4_4_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_one_a->c1_s4_4_1_comment_1) ? $s4_criteria_one_a->c1_s4_4_1_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_one_a->c1_s4_4_1_rating_1) ? $s4_criteria_one_a->c1_s4_4_1_rating_1 : '' ?>
        </h4>
        <p>Verification Source or Comment(s): Affiliate Policies and Procedures manual; accounting manual; affiliate
          resource manual; volunteer manual; personnel manual</p>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.2 Have all board members, volunteers and staff been made aware of the availability of the manuals? (See
            4.1).</h5>
        </div>
        <span>
          <?= isset($s4_criteria_one_a->c1_s4_4_2_checkbox_1) ? ucwords($s4_criteria_one_a->c1_s4_4_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_one_a->c1_s4_4_2_comment_1) ? $s4_criteria_one_a->c1_s4_4_2_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_one_a->c1_s4_4_2_rating_1) ? $s4_criteria_one_a->c1_s4_4_2_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.3 Is the personnel manual regularly reviewed and updated to (1) describe recruitment, hiring,
            termination and standard work rules for all staff and (2) maintain compliance with changing government
            regulations including FLSA, EEOC, ADA, OSHA, FMLA and Affirmative Action Plan?</h5>
        </div>
        <span>
          <?= isset($s4_criteria_one_a->c1_s4_4_3_checkbox_1) ? ucwords($s4_criteria_one_a->c1_s4_4_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_one_a->c1_s4_4_3_comment_1) ? $s4_criteria_one_a->c1_s4_4_3_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of ADM Printout</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_one_a->c1_s4_4_3_rating_1) ? $s4_criteria_one_a->c1_s4_4_3_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.4 The affiliate monitors legislative and regulatory actions that affect its corporate rights and
            responsibilities and takes appropriate action.</h5>
        </div>
        <span>
          <?= isset($s4_criteria_one_a->c1_s4_4_4_checkbox_1) ? ucwords($s4_criteria_one_a->c1_s4_4_4_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_one_a->c1_s4_4_4_comment_1) ? $s4_criteria_one_a->c1_s4_4_4_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Board minutes; President/CEO’s reports Orientation and Training Agendas.
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_one_a->c1_s4_4_4_rating_1) ? $s4_criteria_one_a->c1_s4_4_4_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.5 The board of directors retains (either pro bono or fee-based) the services of independent legal
            counsel, who is available on an ongoing basis, but who does not hold elective or appointed office in the
            affiliate.</h5>
        </div>
        <span>
          <?= isset($s4_criteria_one_a->c1_s4_4_5_checkbox_1) ? ucwords($s4_criteria_one_a->c1_s4_4_5_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_one_a->c1_s4_4_5_comment_1) ? $s4_criteria_one_a->c1_s4_4_5_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of letter or written agreement for legal services; board minutes,
          Page-
          <?= isset($s4_criteria_one_a->c1_s4_4_5_val_1) ? $s4_criteria_one_a->c1_s4_4_5_val_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_one_a->c1_s4_4_5_rating_1) ? $s4_criteria_one_a->c1_s4_4_5_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.6 Negotiating and entering into contracts in the name of, or on behalf of, the Urban League are
            conducted by individuals designated by the affiliate’s board of directors and identified in the policies and
            procedures manual established by the affiliate board of directors or bylaws.</h5>
        </div>
        <span>
          <?= isset($s4_criteria_one_a->c1_s4_4_6_checkbox_1) ? ucwords($s4_criteria_one_a->c1_s4_4_6_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_one_a->c1_s4_4_6_comment_1) ? $s4_criteria_one_a->c1_s4_4_6_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Bylaws, Page -
          <?= isset($s4_criteria_one_a->c1_s4_4_6_val_1) ? $s4_criteria_one_a->c1_s4_4_6_val_1 : '' ?>
          board minutes, Page -
          <?= isset($s4_criteria_one_a->c1_s4_4_6_val_2) ? $s4_criteria_one_a->c1_s4_4_6_val_2 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_one_a->c1_s4_4_6_rating_1) ? $s4_criteria_one_a->c1_s4_4_6_rating_1 : '' ?>
        </h4>
        <?php
            $rating_c1s4 = $totalrating['criteriaOne']['c1_s4'];

            $tRatings4c1 =  (round((($rating_c1s4['val']) / $rating_c1s4['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings4c1) ? $tRatings4c1 : '' ?>/5
        </h3>
      </div>
      <!-- c1s4 end -->
      <!-- c1s5 start -->
      <div
        style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Strategic Planning</h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 5</h5>
        <p>The Board and Management should always have a plan for the affiliate’s ongoing operation with the stated
          goals and objectives to effectively accomplish the mission. The affiliate should have a current strategic plan
          in effect periodically measuring its progress against goals and objectives and revising the plan as needed.
        </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.1 Does the affiliate have a clearly defined Strategic Plan with timelines for achieving affiliate goals
            and objectives?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_1_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_1_comment_1) ? $s5_criteria_one_a->c1_s5_5_1_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_1_rating_1) ? $s5_criteria_one_a->c1_s5_5_1_rating_1 : '' ?>
        </h4>
        <p>Verification Source or Comment(s): Current strategic plan: Dated
          <?= isset($s5_criteria_one_a->c1_s5_5_1_date_1) ? $s5_criteria_one_a->c1_s5_5_1_date_1 : '' ?>
        </p>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.2 Did the affiliate involve board members, staff, service recipients, volunteers, key constituents and
            general members of the community to participate in the strategic planning process?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_2_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_2_comment_1) ? $s5_criteria_one_a->c1_s5_5_2_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_2_rating_1) ? $s5_criteria_one_a->c1_s5_5_2_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.3 Does the affiliate’s strategic plan identify changing community needs as well as the affiliate’s
            strengths, weaknesses, opportunities and threats?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_3_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_3_comment_1) ? $s5_criteria_one_a->c1_s5_5_3_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Strategic Plan,Page -
          <?= isset($s5_criteria_one_a->c1_s4_4_3_rating_) ? $s5_criteria_one_a->c1_s4_4_3_rating_ : '' ?> Needs
          Assessment
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_3_rating_1) ? $s5_criteria_one_a->c1_s5_5_3_rating_1 : '' ?>
        </h4>



        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.4 Does the strategic plan address the critical issues facing the Affiliate?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_4_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_4_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_4_comment_1) ? $s5_criteria_one_a->c1_s5_5_4_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Critical Issues,Page -
          <?= isset($s5_criteria_one_a->c1_s5_5_4_val_1) ? $s5_criteria_one_a->c1_s5_5_4_val_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_4_rating_1) ? $s5_criteria_one_a->c1_s5_5_4_rating_1 : '' ?>
        </h4>



        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.5 Was the plan developed by researching the internal and external environment?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_5_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_5_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_5_comment_1) ? $s5_criteria_one_a->c1_s5_5_5_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Affiliate/community needs assessment /report, Page -
          <?= isset($s5_criteria_one_a->c1_s5_5_5_val_1) ? $s5_criteria_one_a->c1_s5_5_5_val_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_5_rating_1) ? $s5_criteria_one_a->c1_s5_5_5_rating_1 : '' ?>
        </h4>



        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.6 Does the strategic plan set goals and measurable objectives that address the critical issues facing
            the community/affiliate?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_6_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_6_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_6_comment_1) ? $s5_criteria_one_a->c1_s5_5_6_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Goals and Objectives, Page -
          <?= isset($s5_criteria_one_a->c1_s5_5_6_val_1) ? $s5_criteria_one_a->c1_s5_5_6_val_1 : '' ?>
          Needs Assessment
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_6_rating_1) ? $s5_criteria_one_a->c1_s5_5_6_rating_1 : '' ?>
        </h4>





        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.7 Does the strategic plan integrate all of the affiliate’s programs and services around a focused
            mission?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_7_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_7_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_7_comment_1) ? $s5_criteria_one_a->c1_s5_5_7_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Mission Statement,Page -
          <?= isset($s5_criteria_one_a->c1_s5_5_7_val_1) ? $s5_criteria_one_a->c1_s5_5_7_val_1 : '' ?>

        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_7_rating_1) ? $s5_criteria_one_a->c1_s5_5_7_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.8 Does the Strategic Plan prioritize the affiliate’s goals and include timelines for the accomplishment
            of the goals?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_8_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_8_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_8_comment_1) ? $s5_criteria_one_a->c1_s5_5_8_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Timelines,Page -
          <?= isset($s5_criteria_one_a->c1_s5_5_8_val_1) ? $s5_criteria_one_a->c1_s5_5_8_val_1 : '' ?> Mission
          Statement; List of Programs Rating
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_8_rating_1) ? $s5_criteria_one_a->c1_s5_5_8_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.9 Is the affiliate’s Strategic Plan communicated to all the affiliate’s stakeholders, including board
            members, staff, volunteers, service recipients and the general community?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_9_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_9_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_9_comment_1) ? $s5_criteria_one_a->c1_s5_5_9_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Describe, in writing, how this is accomplished
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_9_rating_1) ? $s5_criteria_one_a->c1_s5_5_9_rating_1 : '' ?>
        </h4>



        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.10 Does the affiliate’s strategic plan establish an evaluation process with performance indicators to
            measure the Affiliate’s progress toward achievement of goals and objectives?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_10_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_10_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_10_comment_1) ? $s5_criteria_one_a->c1_s5_5_10_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Evaluation/performance indicators,Page -
          <?= isset($s5_criteria_one_a->c1_s5_5_10_rating_1) ? $s5_criteria_one_a->c1_s5_5_10_rating_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_10_rating_1) ? $s5_criteria_one_a->c1_s5_5_10_rating_1 : '' ?>
        </h4>



        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.11 Has the affiliate’s management staff developed internal work plans that indicate how the affiliate’s
            staff and financial resources will be allocated to insure that the affiliate’s strategic goals are
            accomplished in a timely manner?</h5>
        </div>
        <span>
          <?= isset($s5_criteria_one_a->c1_s5_5_11_checkbox_1) ? ucwords($s5_criteria_one_a->c1_s5_5_11_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_one_a->c1_s5_5_11_comment_1) ? $s5_criteria_one_a->c1_s5_5_11_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Program work plans and current affiliate budget
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_one_a->c1_s5_5_11_rating_1) ? $s5_criteria_one_a->c1_s5_5_11_rating_1 : '' ?>
        </h4>



        <?php
            $rating_c1s5 = $totalrating['criteriaOne']['c1_s4'];

            $tRatings5c1 =  (round((($rating_c1s5['val']) / $rating_c1s5['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings5c1) ? $tRatings5c1 : '' ?>/5
        </h3>
      </div>
      <!-- c1s5 end -->

      <!-- c1s6 start -->
      <div
        style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Public Affairs and Public Policy </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 6</h5>
        <p>The Board and Management should always have a plan for the affiliate’s ongoing operation with the stated
          goals and objectives to effectively accomplish the mission. The affiliate should have a current strategic plan
          in effect periodically measuring its progress against goals and objectives and revising the plan as needed.
        </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>6.1 Does the affiliate have a written policy on advocacy defining the process by which the affiliate
            determines positions on specific issues?</h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s6_criteria_one_a->c1_s6_6_1_comment_1) ? $s6_criteria_one_a->c1_s6_6_1_comment_1 : '' ?>
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s6_criteria_one_a->c1_s6_6_1_rating_1) ? $s6_criteria_one_a->c1_s6_6_1_rating_1 : '' ?>
        </h4>

        <p>Verification Source or Comment(s): Attach the board approved advocacy policy.</p>
        <?php
            $rating_c1s6 = $totalrating['criteriaOne']['c1_s6'];
            $tRatings6c1 =  (round((($rating_c1s6['val']) / $rating_c1s6['count']), 1, PHP_ROUND_HALF_ODD));
            $totalC1Rating =  (round((($tRatings1c1 + $tRatings2c1 + $tRatings3c1 + $tRatings4c1 + $tRatings5c1 + $tRatings6c1) / 6), 1, PHP_ROUND_HALF_ODD));

            ?>
        <h3>Calculation -
          <?= isset($tRatings6c1) ? $tRatings6c1 : '' ?>/5
        </h3>
        <h3>Criteria 1 overall rating -
          <?= isset($totalC1Rating) ? $totalC1Rating : '' ?>/5
        </h3>
      </div>
      <!-- c1s6 end -->
    </div>
    <!-- criteria 1 end -->
    <div style='page-break-after:always;'></div>

    <!-- criteria 2 start -->
    <div>
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>CRITERIA 2: ORGANIZATIONAL VITALITY </h3>
      </div>
      <div
        style="padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <p>An effective Urban League affiliate has sufficient resources and assumes responsibility for managing
          them, in order to ensure the continuation and expansion of the Urban League in the affiliate
          community.

        </p>
      </div>
    </div>

    <div>
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>HUMAN RESOURCES </h3>
      </div>
      <div
        style="padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <p>The affiliate’s relationship to its employees and volunteers is fundamental to its ability to achieve
          its mission. Volunteers occupy a special place in the organization, serving in governance,
          administrative and programmatic capacities. An organization’s human resource policies should address
          both paid employees and volunteers, and should be fair, establish clear expectations, and provide
          for meaningful and effective performance evaluation.

        </p>
      </div>
    </div>

    <div>
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>PERSONNEL POLICIES </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 1</h5>
        <p>An affiliate should have written personnel policies and procedures, approved by the board of
          directors, governing the work and actions of all employees and volunteers of the organization. In
          addition to covering basic elements of the employment relationship (working conditions, employee
          benefits, vacation and sick leave), the policies should address employee evaluation, supervision,
          hiring and firing, grievance procedures, employee growth and development, confidentiality of
          employees, and client and organization records information.
        </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.1 Attach a copy of the affiliate’s personnel policies indicating the date they were last
            reviewed
            <?= isset($s1_criteria_two_a->c2_s1_1_1_date_1) ? $s1_criteria_two_a->c2_s1_1_1_date_1 : '' ?>
            , and last approved by the board of directors.
            <?= isset($s1_criteria_two_a->c2_s1_1_1_date_2) ? $s1_criteria_two_a->c2_s1_1_1_date_2 : '' ?>
          </h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_two_a->c2_s1_1_1_comment_1) ? $s1_criteria_two_a->c2_s1_1_1_comment_1 : '' ?>
        </p>

        <h4>Verification Source or Comment(s): Board minutes, Page - <span
            style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
            <?= isset($s1_criteria_two_a->c2_s1_1_1_val_1) ? $s1_criteria_two_a->c2_s1_1_1_val_1 : '' ?>
          </span> </h4>

        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s1_1_7_rating_1) ? $s2_criteria_two_a->c2_s1_1_7_rating_1 : '' ?>
          <?= isset($s1_criteria_two_a->c2_s1_1_1_rating_1) ? $s1_criteria_two_a->c2_s1_1_1_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.2 Affiliate personnel policies for employed staff are reviewed every three (3) years and are
            consistent with federal, state, and local statutory requirements pertaining to employment, wages
            and hours, health and safety, and equal employment opportunity.
          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_two_a->c2_s1_1_2_checkbox_1) ? ucwords($s1_criteria_two_a->c2_s1_1_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_two_a->c2_s1_1_2_comment_1) ? $s1_criteria_two_a->c2_s1_1_2_comment_1 : '' ?>

        </p>
        <h5>
          Verification Source or Comment(s): Indicate pages in personnel policies that address the following:
        </h5>

        <table style="text-align: right;">
          <tr>
            <td style="height: 40px;">Working conditions, Page - <span
                style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_2_val_1) ? $s1_criteria_two_a->c2_s1_1_2_val_1 : '' ?>
              </span> </td>
            <td style="height: 40px;">Employee benefits, Page - <span
                style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_2_val_2) ? $s1_criteria_two_a->c2_s1_1_2_val_2 : '' ?>
              </span> </td>
            <td style="height: 40px;">Vacation Page - <span
                style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_2_val_3) ? $s1_criteria_two_a->c2_s1_1_2_val_3 : '' ?>
              </span> </td>
            <td style="height: 40px;">Sick leave Page - <span
                style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_2_val_4) ? $s1_criteria_two_a->c2_s1_1_2_val_4 : '' ?>
              </span> </td>
          </tr>
          <tr>
            <td style="height: 40px;">Employee evaluation Page - <span
                style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_2_val_5) ? $s1_criteria_two_a->c2_s1_1_2_val_5 : '' ?>
              </span> </td>
            <td style="height: 40px;">Grievance procedures Page - <span
                style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_2_val_6) ? $s1_criteria_two_a->c2_s1_1_2_val_6 : '' ?>
              </span> </td>
            <td style="height: 40px;" colspan="2">confidentiality of employee, client and Page - affiliate
              records and information
              - <span style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_2_val_7) ? $s1_criteria_two_a->c2_s1_1_2_val_7 : '' ?>
              </span> </td>

          </tr>
          <tr>
            <td style="height: 40px;">and growth and development Page - <span
                style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_2_val_8) ? $s1_criteria_two_a->c2_s1_1_2_val_8 : '' ?>
              </span> </td>

          </tr>
        </table>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s1_1_7_rating_1) ? $s2_criteria_two_a->c2_s1_1_7_rating_1 : '' ?>
          <?= isset($s1_criteria_two_a->c2_s1_1_2_rating_1) ? $s1_criteria_two_a->c2_s1_1_2_rating_1 : '' ?>

        </h4>
        <div style='page-break-after:always;'></div>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.3 With respect to volunteers, does the affiliate’s volunteer manual address initial assessment
            or screening, assignment to and training for appropriate work responsibilities, ongoing
            supervision and evaluation, and opportunities for advancement and have all volunteers been
            required to sign the volunteer application form.

          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_two_a->c2_s1_1_3_checkbox_1) ? ucwords($s1_criteria_two_a->c2_s1_1_3_checkbox_1) : '' ?>

        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_two_a->c2_s1_1_3_comment_1) ? $s1_criteria_two_a->c2_s1_1_3_comment_1 : '' ?>

        </p>
        <h5>
          Verification Source or Comment(s): Attach a copy of the volunteer manual; indicate pages in
          volunteer manual that address the following:
        </h5>
        <table style="text-align: right; width: 80%;">
          <tr>
            <td style="height: 40px;">Initial assessment and screening Page - <span
                style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_3_val_1) ? $s1_criteria_two_a->c2_s1_1_3_val_1 : '' ?>
              </span> </td>
            <td style="height: 40px;">assignment to and training for Page - <span
                style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_3_val_2) ? $s1_criteria_two_a->c2_s1_1_3_val_2 : '' ?>
              </span>
              appropriate work responsibility

            </td>

          </tr>
          <tr>
            <td style="height: 40px;">appropriate work responsibility Page -
              <span style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_3_val_3) ? $s1_criteria_two_a->c2_s1_1_3_val_3 : '' ?>
              </span>
            </td>
            <td style="height: 40px;">opportunities for advancement Page -
              <span style="border:1px solid #ccc; padding:5px; border-radius: 3px;">
                <?= isset($s1_criteria_two_a->c2_s1_1_3_val_4) ? $s1_criteria_two_a->c2_s1_1_3_val_4 : '' ?>
              </span>
            </td>


          </tr>

        </table>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_two_a->c2_s1_1_3_rating_1) ? $s1_criteria_two_a->c2_s1_1_3_rating_1 : '' ?>


        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.4 Does the affiliate have a written job description for each employee that clearly identifies
            roles and responsibilities, and is there a system in place for annual written evaluations of
            employees by their respective supervisors?
          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_two_a->c2_s1_1_4_checkbox_1) ? ucwords($s1_criteria_two_a->c2_s1_1_4_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_two_a->c2_s1_1_4_comment_1) ? $s1_criteria_two_a->c2_s1_1_4_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Current job descriptions and sample evaluation form
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s1_1_7_rating_1) ? $s2_criteria_two_a->c2_s1_1_7_rating_1 : '' ?>
          <?= isset($s1_criteria_two_a->c2_s1_1_4_rating_1) ? $s1_criteria_two_a->c2_s1_1_4_rating_1 : '' ?>

        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.5 The Articles of Incorporation are consistent with current state, federal, and local laws,
            and are reviewed at the same time as the affiliate bylaws are updated.
          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_two_a->c2_s1_1_5_checkbox_1) ? ucwords($s1_criteria_two_a->c2_s1_1_5_checkbox_1) : '' ?>

        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_two_a->c2_s1_1_5_comment_1) ? $s1_criteria_two_a->c2_s1_1_5_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Current Affiliate Articles of Incorporation; Date of Board
          Review:
          <!-- <span>DD:MM:YYYY</span> -->

        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s1_1_7_rating_1) ? $s2_criteria_two_a->c2_s1_1_7_rating_1 : '' ?>
          <?= isset($s1_criteria_two_a->c2_s1_1_5_rating_1) ? $s1_criteria_two_a->c2_s1_1_5_rating_1 : '' ?>

        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.6 The affiliate’s performance management system incorporates career development for all
            employees, including employee orientation, supervisory coaching, and systematic access to
            information about local and National Urban League training opportunities.
          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_two_a->c2_s1_1_6_checkbox_1) ? ucwords($s1_criteria_two_a->c2_s1_1_6_checkbox_1) : '' ?>

        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_two_a->c2_s1_1_6_comment_1) ? $s1_criteria_two_a->c2_s1_1_6_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Policies and procedures related to staff development; records of
          staff participation in local and national learning opportunities; internal training curriculum.</h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s1_1_7_rating_1) ? $s2_criteria_two_a->c2_s1_1_7_rating_1 : '' ?>
          <?= isset($s1_criteria_two_a->c2_s1_1_6_rating_1) ? $s1_criteria_two_a->c2_s1_1_6_rating_1 : '' ?>

        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.7 The affiliate participates in medical, dental, life insurance, tax-deferred annuity,
            disability income, and retirement plans, or has an equivalent benefit program.

          </h5>
        </div>
        <span>
          <?= isset($s1_criteria_two_a->c2_s1_1_7_checkbox_1) ? ucwords($s1_criteria_two_a->c2_s1_1_7_checkbox_1) : '' ?>

        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_two_a->c2_s1_1_7_comment_1) ? $s1_criteria_two_a->c2_s1_1_7_comment_1 : '' ?>

        </p>
        <h5>
          Verification Source or Comment(s): Summary description of affiliate benefit program.

        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s1_1_7_rating_1) ? $s2_criteria_two_a->c2_s1_1_7_rating_1 : '' ?>
          <?= isset($s1_criteria_two_a->c2_s1_1_7_rating_1) ? $s1_criteria_two_a->c2_s1_1_7_rating_1 : '' ?>

        </h4>
        <?php
            $rating_c2s1 = $totalrating['criteriaTwo']['c2_s1'];

            $tRatings1c2 =  (round(($rating_c2s1['val'] / $rating_c2s1['count']), 1, PHP_ROUND_HALF_ODD));


            ?>
        <h3>Calculation -
          <?= isset($tRatings1c2) ? $tRatings1c2 : '' ?>/5
        </h3>
      </div>
      <!-- c2s1 end -->






      <!-- c2s2 start -->
      <div
        style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>FUNDRAISING </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 2</h5>
        <p>Fundraising provides an important source of financial support for the work of the affiliate. An
          affiliate’s fundraising program should be maintained on a foundation of truthfulness and responsible
          stewardship. Its fundraising policies should be consistent with its mission, compatible with its
          organizational capacity, and respectful of the interests of donors and prospective donors.
          Fundraising costs should be reasonable over time. Over a three (3) year period, an affiliate should
          realize revenue from fundraising and other development activities that are at least three times the
          amount spent on conducting them. Affiliates whose ratio is less that 3:1 should demonstrate that
          they are making steady progress toward achieving this goal, or should be able to justify why a 3:1
          ratio is not appropriate for this affiliate. </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>2.1 The affiliate board of directors has taken action to develop and implement fund development
            strategies to meet long-range operating and capital income needs.</h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_two_a->c2_s2_2_1_comment_1) ? $s2_criteria_two_a->c2_s2_2_1_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Board minutes; written fund development strategies with
          timetable; long-range financial projections</h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s2_2_1_rating_1) ? $s2_criteria_two_a->c2_s2_2_1_rating_1 : '' ?>

        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>2.2 For the last three (3) years, provide the total amount of revenues from fundraising and
            other development activities and the total amount of funds spent on conducting them</h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_two_a->c2_s2_2_2_comment_1) ? $s2_criteria_two_a->c2_s2_2_2_comment_1 : '' ?>

        </p>

        <span>
          <?= isset($s2_criteria_two_a->c2_s2_2_2_checkbox_1) ? ucwords($s2_criteria_two_a->c2_s2_2_2_checkbox_1) : '' ?>
        </span>
        <h5>Verification Source or Comment(s): Affiliate Financial Audits (Please support this standard with the
          G/L)
        </h5>

        <table style="width: 100%; text-align: left;">
          <thead>
            <tr>
              <th style="text-align: left;">Year (Period) </th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Total Raised </th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Total Spent </th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Net</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_1) ? $s2_criteria_two_a->c2_s2_2_2_val_1 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_2) ? $s2_criteria_two_a->c2_s2_2_2_val_2 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_3) ? $s2_criteria_two_a->c2_s2_2_2_val_3 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_4) ? $s2_criteria_two_a->c2_s2_2_2_val_4 : '' ?>
              </td>
            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_5) ? $s2_criteria_two_a->c2_s2_2_2_val_5 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_6) ? $s2_criteria_two_a->c2_s2_2_2_val_6 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_7) ? $s2_criteria_two_a->c2_s2_2_2_val_7 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_8) ? $s2_criteria_two_a->c2_s2_2_2_val_8 : '' ?>
              </td>
            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_9) ? $s2_criteria_two_a->c2_s2_2_2_val_9 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_10) ? $s2_criteria_two_a->c2_s2_2_2_val_10 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_11) ? $s2_criteria_two_a->c2_s2_2_2_val_11 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_2_val_12) ? $s2_criteria_two_a->c2_s2_2_2_val_12 : '' ?>
              </td>
            </tr>



          </tbody>
        </table>


        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s2_2_2_rating_1) ? $s2_criteria_two_a->c2_s2_2_2_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>2.3 For the last three (3) years, provide revenue from all sources.
          </h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_two_a->c2_s2_2_3_comment_1) ? $s2_criteria_two_a->c2_s2_2_3_comment_1 : '' ?>

        </p>

        <span>
          <?= isset($s2_criteria_two_a->c2_s2_2_3_checkbox_1) ? ucwords($s2_criteria_two_a->c2_s2_2_3_checkbox_1) : '' ?>
        </span>
        <h5>Verification Source or Comment(s): Affiliate Financial Audits – (Total public support and revenue)
        </h5>

        <table style="width: 50%; text-align: left;">
          <thead>
            <tr>
              <th style="text-align: left;">Year (Period) </th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Total Revenue </th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_3_val_1) ? $s2_criteria_two_a->c2_s2_2_3_val_1 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_3_val_2) ? $s2_criteria_two_a->c2_s2_2_3_val_2 : '' ?>
              </td>

            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_3_val_3) ? $s2_criteria_two_a->c2_s2_2_3_val_3 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_3_val_4) ? $s2_criteria_two_a->c2_s2_2_3_val_4 : '' ?>
              </td>

            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_3_val_5) ? $s2_criteria_two_a->c2_s2_2_3_val_5 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_3_val_6) ? $s2_criteria_two_a->c2_s2_2_3_val_6 : '' ?>
              </td>

            </tr>




          </tbody>
        </table>


        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s2_2_3_rating_1) ? $s2_criteria_two_a->c2_s2_2_3_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>2.4 For the last three (3) years, provide the affiliate’s total income for direct and indirect
            contributions generated by individuals, foundations, corporations.

          </h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_two_a->c2_s2_2_4_comment_1) ? $s2_criteria_two_a->c2_s2_2_4_comment_1 : '' ?>

        </p>

        <span>
          <?= isset($s2_criteria_two_a->c2_s2_2_4_checkbox_1) ? ucwords($s2_criteria_two_a->c2_s2_2_4_checkbox_1) : '' ?>
        </span>
        <h5>Verification Source or Comment(s): Affiliate Financial Audits

        </h5>

        <table style="width: 50%; text-align: left;">
          <thead>
            <tr>
              <th style="text-align: left;">Year (Period) </th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Total Contributions </th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_4_val_1) ? $s2_criteria_two_a->c2_s2_2_4_val_1 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_4_val_2) ? $s2_criteria_two_a->c2_s2_2_4_val_2 : '' ?>
              </td>

            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_4_val_3) ? $s2_criteria_two_a->c2_s2_2_4_val_3 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_4_val_4) ? $s2_criteria_two_a->c2_s2_2_4_val_4 : '' ?>
              </td>

            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_4_val_5) ? $s2_criteria_two_a->c2_s2_2_4_val_5 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_4_val_6) ? $s2_criteria_two_a->c2_s2_2_4_val_6 : '' ?>
              </td>

            </tr>




          </tbody>
        </table>


        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s2_2_4_rating_1) ? $s2_criteria_two_a->c2_s2_2_4_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>2.5 Members of the board of directors take active leadership in obtaining funds for the work of
            the affiliate through activities that include solicitation and identification of prospects.

          </h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_two_a->c2_s2_2_5_comment_1) ? $s2_criteria_two_a->c2_s2_2_5_comment_1 : '' ?>

        </p>

        <span>
          <?= isset($s2_criteria_two_a->c2_s2_2_5_checkbox_1) ? ucwords($s2_criteria_two_a->c2_s2_2_5_checkbox_1) : '' ?>
        </span>
        <h5>Verification Source or Comment(s): Board Corporate Contribution Summary
        </h5>




        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s2_2_5_rating_1) ? $s2_criteria_two_a->c2_s2_2_5_rating_1 : '' ?>
        </h4>




        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5> 2.6 Verification Source or Comment(s): Board Corporate Contribution Summary


          </h5>
        </div>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_two_a->c2_s2_2_6_comment_1) ? $s2_criteria_two_a->c2_s2_2_6_comment_1 : '' ?>

        </p>

        <span>
          <?= isset($s2_criteria_two_a->c2_s2_2_6_checkbox_1) ? ucwords($s2_criteria_two_a->c2_s2_2_6_checkbox_1) : '' ?>
        </span>
        <h5>Verification Source or Comment(s): Individual Board Member Personal Contribution Summary</h5>

        <table style="width: 50%; text-align: left;">
          <thead>
            <tr>
              <th style="text-align: left;">Year (Period) </th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Board Member Personal Contribution
              </th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_6_val_1) ? $s2_criteria_two_a->c2_s2_2_6_val_1 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_6_val_2) ? $s2_criteria_two_a->c2_s2_2_6_val_2 : '' ?>
              </td>

            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_6_val_3) ? $s2_criteria_two_a->c2_s2_2_6_val_3 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_6_val_4) ? $s2_criteria_two_a->c2_s2_2_6_val_4 : '' ?>
              </td>

            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_6_val_5) ? $s2_criteria_two_a->c2_s2_2_6_val_5 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s2_criteria_two_a->c2_s2_2_6_val_6) ? $s2_criteria_two_a->c2_s2_2_6_val_6 : '' ?>
              </td>

            </tr>




          </tbody>
        </table>

        <h5>Verification Source or Comment(s): Summary description of affiliate benefit program.
        </h5>


        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_two_a->c2_s2_2_6_rating_1) ? $s2_criteria_two_a->c2_s2_2_6_rating_1 : '' ?>
        </h4>




        <?php
            $rating_c2s2 = $totalrating['criteriaTwo']['c2_s2'];

            $tRatings2c2 =  (round(($rating_c2s2['val'] / $rating_c2s2['count']), 1, PHP_ROUND_HALF_ODD));

            ?>
        <h3>Calculation -
          <?= isset($tRatings2c2) ? $tRatings2c2 : '' ?>/5
        </h3>
      </div>
      <!-- c2s2 end -->






      <!-- c1s3 start -->
      <div style='page-break-after:always;'></div>
      <div
        style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>FISCAL/FINANCIAL MANAGEMENT </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 3</h5>
        <p>The affiliate operates in the context of a well-managed and effectively administered organization and
          are supported by a solid fiscal management system.
        </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.1 What accounting software package does the affiliate use?
          </h5>
        </div>

        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_two_a->c2_s3_3_1_comment_1) ? $s3_criteria_two_a->c2_s3_3_1_comment_1 : '' ?>

        </p>
        <h5>This software last updated/revised? <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_1_date_1) ? $s3_criteria_two_a->c2_s3_3_1_date_1 : '' ?>
          </span> </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_two_a->c2_s3_3_1_rating_1) ? $s3_criteria_two_a->c2_s3_3_1_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.2 Does the affiliate have systems in place to provide the appropriate information needed by
            staff and board to make sound financial decisions and to fulfill Internal Revenue Service
            requirements?</h5>
        </div>
        <span>
          <?= isset($s3_criteria_two_a->c2_s3_3_2_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_two_a->c2_s3_3_2_comment_1) ? $s3_criteria_two_a->c2_s3_3_2_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Affiliate Accounting Manual, Date <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_2_date_1) ? $s3_criteria_two_a->c2_s3_3_2_date_1 : '' ?>
          </span>
          <div style='page-break-after:always;'></div>

        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_two_a->c2_s3_3_2_rating_1) ? $s3_criteria_two_a->c2_s3_3_2_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.3 Does the mail policy forbid opening the mail by the same person who deposits checks?
          </h5>
        </div>
        <span>
          <?= isset($s3_criteria_two_a->c2_s3_3_3_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_two_a->c2_s3_3_3_comment_1) ? $s3_criteria_two_a->c2_s3_3_3_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s) Mail policy; Internal Control Document

        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_two_a->c2_s3_3_3_rating_1) ? $s3_criteria_two_a->c2_s3_3_3_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.4 For the last three (3) years, did the affiliate expend more than $500,000 ($750,000 (if
            applicable)) in federal funds? (This includes Federal funds received from a “pass through”
            entity as well) If so, did the affiliate obtain an OMB A-133 audit?
          </h5>
        </div>
        <span>
          <?= isset($s3_criteria_two_a->c2_s3_3_4_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_4_checkbox_1) : '' ?>
        </span>
        <span>
          N/A <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_4_val_1) ? $s3_criteria_two_a->c2_s3_3_4_val_1 : '' ?>
          </span>
        </span>

        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_two_a->c2_s3_3_4_comment_1) ? $s3_criteria_two_a->c2_s3_3_4_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Affiliate A-133 Audits
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_two_a->c2_s3_3_4_rating_1) ? $s3_criteria_two_a->c2_s3_3_4_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.5 For the last three (3) years, did the affiliate’s A-133 audits contain “notes or areas of
            concern noted by the auditors?
          </h5>
        </div>
        <span>
          <?= isset($s3_criteria_two_a->c2_s3_3_5_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_5_checkbox_1) : '' ?>
        </span>
        <span>
          N/A <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_5_val_1) ? $s3_criteria_two_a->c2_s3_3_5_val_1 : '' ?>
          </span>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_two_a->c2_s3_3_5_comment_1) ? $s3_criteria_two_a->c2_s3_3_5_comment_1 : '' ?>

        </p>
        <h5>If yes, has the affiliate taken steps to address these concerns?
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_5_checkbox_2) ? ucwords($s3_criteria_two_a->c2_s3_3_5_checkbox_2) : '' ?>
          </span>
        </h5>
        <h5>Verification Source or Comment(s): Affiliate A-133 Audits; Copy of management response to A-133
          notes or areas of concern
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_two_a->c2_s3_3_5_rating_1) ? $s3_criteria_two_a->c2_s3_3_5_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.6 Does the affiliate reconcile all cash accounts monthly?
          </h5>
        </div>
        <span>
          <?= isset($s3_criteria_two_a->c2_s3_3_6_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_6_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_two_a->c2_s3_3_6_comment_1) ? $s3_criteria_two_a->c2_s3_3_6_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Last six (6) months bank account(s) reconciliations

        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_two_a->c2_s3_3_6_rating_1) ? $s3_criteria_two_a->c2_s3_3_6_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.7 If the affiliate has billable contracts or other service income, are written procedures
            established for the periodic billing, follow-up, and collection of all accounts, and does it
            have the documentation that substantiates all billings.
          </h5>
        </div>
        <span>
          <?= isset($s3_criteria_two_a->c2_s3_3_7_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_7_checkbox_1) : '' ?>
        </span>

        <span>N/A <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_7_val_1) ? $s3_criteria_two_a->c2_s3_3_7_val_1 : '' ?>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_7_comment_1) ? $s3_criteria_two_a->c2_s3_3_7_comment_1 : '' ?>

          </p>
          <h5>Verification Source or Comment(s): Contracts and copy of payment request from funder

          </h5>

          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_7_rating_1) ? $s3_criteria_two_a->c2_s3_3_7_rating_1 : '' ?>
          </h4>
          <div style='page-break-after:always;'></div>
          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.8 For the last three (3) years, according to the affiliate’s most recent audits, did the
              affiliate have a decrease in Total Net Assets greater than 33%?
            </h5>
          </div>
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_8_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_8_checkbox_1) : '' ?>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_8_comment_1) ? $s3_criteria_two_a->c2_s3_3_8_comment_1 : '' ?>

          </p>

          <h5>Verification Source or Comment(s): Affiliate Audits, and if greater than 33%, please explain the
            circumstances

          </h5>

          <table style="width: 80%; text-align: left;">
            <thead>
              <tr>
                <th style="text-align: left;">Year (Period) </th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">U/R Net Assets </th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Change </th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_8_val_1) ? $s3_criteria_two_a->c2_s3_3_8_val_1 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_8_val_2) ? $s3_criteria_two_a->c2_s3_3_8_val_2 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_8_val_3) ? $s3_criteria_two_a->c2_s3_3_8_val_3 : '' ?>
                </td>

              </tr>

              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_8_val_4) ? $s3_criteria_two_a->c2_s3_3_8_val_4 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_8_val_5) ? $s3_criteria_two_a->c2_s3_3_8_val_5 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_8_val_6) ? $s3_criteria_two_a->c2_s3_3_8_val_6 : '' ?>
                </td>

              </tr>

              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_8_val_7) ? $s3_criteria_two_a->c2_s3_3_8_val_7 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_8_val_8) ? $s3_criteria_two_a->c2_s3_3_8_val_8 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_8_val_9) ? $s3_criteria_two_a->c2_s3_3_8_val_9 : '' ?>
                </td>

              </tr>


            </tbody>
          </table>

          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_8_rating_1) ? $s3_criteria_two_a->c2_s3_3_8_rating_1 : '' ?>
          </h4>



          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.9 For the last three (3) years, did the affiliate have a positive fund balance?
            </h5>
          </div>
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_9_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_9_checkbox_1) : '' ?>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_9_comment_1) ? $s3_criteria_two_a->c2_s3_3_9_comment_1 : '' ?>


          </p>

          <h5>Verification Source or Comment(s): Affiliate Audits; if not please explain
          </h5>

          <table style="width: 80%; text-align: left;">
            <thead>
              <tr>
                <th style="text-align: left;">Year (Period) </th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Fund Balance </th>


              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_9_val_1) ? $s3_criteria_two_a->c2_s3_3_9_val_1 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_9_val_2) ? $s3_criteria_two_a->c2_s3_3_9_val_2 : '' ?>
                </td>


              </tr>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_9_val_3) ? $s3_criteria_two_a->c2_s3_3_9_val_3 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_9_val_4) ? $s3_criteria_two_a->c2_s3_3_9_val_4 : '' ?>
                </td>


              </tr>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_9_val_5) ? $s3_criteria_two_a->c2_s3_3_9_val_5 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_9_val_6) ? $s3_criteria_two_a->c2_s3_3_9_val_6 : '' ?>
                </td>


              </tr>





            </tbody>
          </table>

          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_9_rating_1) ? $s3_criteria_two_a->c2_s3_3_9_rating_1 : '' ?>
          </h4>

          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.10 For the last three (3) years, according to the affiliate’s audits, do the affiliate’s
              Management and General Cost exceed 30%?
            </h5>
          </div>
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_10_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_10_checkbox_1) : '' ?>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_10_comment_1) ? $s3_criteria_two_a->c2_s3_3_10_comment_1 : '' ?>

          </p>


          <h5>Verification Source or Comment(s): Affiliate Audits
          </h5>

          <table style="width: 100%; text-align: left;">
            <thead>
              <tr>
                <th style="text-align: left;">Year (Period) </th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Mgmt. & Gen. </th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Total Exp.</th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Percent</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_1) ? $s3_criteria_two_a->c2_s3_3_10_val_1 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_2) ? $s3_criteria_two_a->c2_s3_3_10_val_2 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_3) ? $s3_criteria_two_a->c2_s3_3_10_val_3 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_4) ? $s3_criteria_two_a->c2_s3_3_10_val_4 : '' ?>
                </td>
              </tr>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_5) ? $s3_criteria_two_a->c2_s3_3_10_val_5 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_6) ? $s3_criteria_two_a->c2_s3_3_10_val_6 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_7) ? $s3_criteria_two_a->c2_s3_3_10_val_7 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_8) ? $s3_criteria_two_a->c2_s3_3_10_val_8 : '' ?>
                </td>
              </tr>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_9) ? $s3_criteria_two_a->c2_s3_3_10_val_9 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_10) ? $s3_criteria_two_a->c2_s3_3_10_val_10 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_11) ? $s3_criteria_two_a->c2_s3_3_10_val_11 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_10_val_12) ? $s3_criteria_two_a->c2_s3_3_10_val_12 : '' ?>
                </td>
              </tr>



            </tbody>
          </table>


          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_10_rating_1) ? $s3_criteria_two_a->c2_s3_3_10_rating_1 : '' ?>
          </h4>

          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.11 For the last three (3) years, according to the affiliate’s audits, does the affiliate’s
              debt to asset exceed 50%?
            </h5>
          </div>

          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_11_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_11_checkbox_1) : '' ?>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_11_comment_1) ? $s3_criteria_two_a->c2_s3_3_11_comment_1 : '' ?>

          </p>

          <h5>Verification Source or Comment(s): Affiliate Audits
          </h5>


          <table style="width: 100%; text-align: left;">
            <thead>
              <tr>
                <th style="text-align: left;">Year (Period) </th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Total Debt</th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Total Assets </th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Percent</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_1) ? $s3_criteria_two_a->c2_s3_3_11_val_1 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_2) ? $s3_criteria_two_a->c2_s3_3_11_val_2 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_3) ? $s3_criteria_two_a->c2_s3_3_11_val_3 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_4) ? $s3_criteria_two_a->c2_s3_3_11_val_4 : '' ?>
                </td>
              </tr>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_5) ? $s3_criteria_two_a->c2_s3_3_11_val_5 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_6) ? $s3_criteria_two_a->c2_s3_3_11_val_6 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_7) ? $s3_criteria_two_a->c2_s3_3_11_val_7 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_8) ? $s3_criteria_two_a->c2_s3_3_11_val_8 : '' ?>
                </td>
              </tr>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_9) ? $s3_criteria_two_a->c2_s3_3_11_val_9 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_10) ? $s3_criteria_two_a->c2_s3_3_11_val_10 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_11) ? $s3_criteria_two_a->c2_s3_3_11_val_11 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_11_val_12) ? $s3_criteria_two_a->c2_s3_3_11_val_12 : '' ?>
                </td>
              </tr>



            </tbody>
          </table>


          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_11_rating_1) ? $s3_criteria_two_a->c2_s3_3_11_rating_1 : '' ?>
          </h4>





          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.12 For the last three (3) years, according to the affiliate’s audits, do the affiliate’s
              current accounts receivables exceed 50% of the affiliate’s current assets?
            </h5>
          </div>
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_12_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_12_checkbox_1) : '' ?>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_12_comment_1) ? $s3_criteria_two_a->c2_s3_3_12_comment_1 : '' ?>



          </p>

          <table style="width: 100%; text-align: left;">
            <thead>
              <tr>
                <th style="text-align: left;">Year (Period) </th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Accts Rec </th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Current Assets </th>
                <th style="text-align: left;"></th>
                <th style="text-align: left;">Percent</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_1) ? $s3_criteria_two_a->c2_s3_3_12_val_1 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_2) ? $s3_criteria_two_a->c2_s3_3_12_val_2 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_3) ? $s3_criteria_two_a->c2_s3_3_12_val_3 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_4) ? $s3_criteria_two_a->c2_s3_3_12_val_4 : '' ?>
                </td>
              </tr>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_5) ? $s3_criteria_two_a->c2_s3_3_12_val_5 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_6) ? $s3_criteria_two_a->c2_s3_3_12_val_6 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_7) ? $s3_criteria_two_a->c2_s3_3_12_val_7 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_8) ? $s3_criteria_two_a->c2_s3_3_12_val_8 : '' ?>
                </td>
              </tr>
              <tr>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_9) ? $s3_criteria_two_a->c2_s3_3_12_val_9 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_10) ? $s3_criteria_two_a->c2_s3_3_12_val_10 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_11) ? $s3_criteria_two_a->c2_s3_3_12_val_11 : '' ?>
                </td>
                <td style="width:150px; padding: 7px;">


                </td>
                <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                  <?= isset($s3_criteria_two_a->c2_s3_3_12_val_12) ? $s3_criteria_two_a->c2_s3_3_12_val_12 : '' ?>
                </td>
              </tr>



            </tbody>
          </table>
          <h5>Verification Source or Comment(s): Affiliate Audits </h5>


          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_12_rating_1) ? $s3_criteria_two_a->c2_s3_3_12_rating_1 : '' ?>

          </h4>





          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.13 If required, IRS Form 990T (Unrelated Business Income) has been filed and a copy is
              available to the public.
            </h5>
          </div>
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_13_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_13_checkbox_1) : '' ?>
          </span>
          <span>
            N/A <span>
              <?= isset($s3_criteria_two_a->c2_s3_3_13_val_1) ? $s3_criteria_two_a->c2_s3_3_13_val_1 : '' ?>
            </span>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_13_comment_1) ? $s3_criteria_two_a->c2_s3_3_13_comment_1 : '' ?>

          </p>
          <h5>Verification Source or Comment(s): Copy of Form 990T
          </h5>
          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_13_rating_1) ? $s3_criteria_two_a->c2_s3_3_13_rating_1 : '' ?>
          </h4>




          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.14 Are the affiliate’s government contracts, purchase of service agreements and grant
              agreements in writing and are reviewed by a staff member to monitor compliance with all
              stated conditions?
            </h5>
          </div>
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_14_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_14_checkbox_1) : '' ?>
          </span>
          <span>
            N/A <span>
              <?= isset($s3_criteria_two_a->c2_s3_3_14_val_1) ? $s3_criteria_two_a->c2_s3_3_14_val_1 : '' ?>
            </span>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_14_comment_1) ? $s3_criteria_two_a->c2_s3_3_14_comment_1 : '' ?>

          </p>
          <h5>Verification Source or Comment(s): Contracts, Service and/or Grant Agreements

          </h5>
          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_14_rating_1) ? $s3_criteria_two_a->c2_s3_3_14_rating_1 : '' ?>
          </h4>


          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.15 Does the affiliate have a written policy related to investments?
            </h5>
          </div>
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_15_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_15_checkbox_1) : '' ?>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_15_comment_1) ? $s3_criteria_two_a->c2_s3_3_15_comment_1 : '' ?>



          </p>

          <h5>Verification Source or Comment(s): Copy of Investment Policy
          </h5>
          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_15_rating_1) ? $s3_criteria_two_a->c2_s3_3_15_rating_1 : '' ?>
          </h4>




          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.16 Has the affiliate established a written plan identifying actions to take in the event
              of a reduction or loss in funding?
            </h5>
          </div>
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_16_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_16_checkbox_1) : '' ?>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_16_comment_1) ? $s3_criteria_two_a->c2_s3_3_16_comment_1 : '' ?>



          </p>

          <h5>Verification Source or Comment(s): Provide a copy of the Affiliate Fund Diversification strategy
          </h5>
          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_16_rating_1) ? $s3_criteria_two_a->c2_s3_3_16_rating_1 : '' ?>
          </h4>

          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.17 Does the Board of Directors review and approve the affiliate audit report and
              management letter, and with staff input and support institutes any necessary changes.

            </h5>
          </div>
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_17_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_17_checkbox_1) : '' ?>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_17_comment_1) ? $s3_criteria_two_a->c2_s3_3_17_comment_1 : '' ?>



          </p>

          <h5>Verification Source or Comment(s): Board Minutes,Page -
            <span style="border:1px solid #ccc; padding: 5px; border-radius: 5px;">
              <?= isset($s3_criteria_two_a->c2_s3_3_17_val_1) ? $s3_criteria_two_a->c2_s3_3_17_val_1 : '' ?>
            </span>
            of approval; copy of written changes/responses
          </h5>
          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_17_rating_1) ? $s3_criteria_two_a->c2_s3_3_17_rating_1 : '' ?>
          </h4>

          <div
            style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
            <h5>3.18 Does the affiliate make training available for board and appropriate staff on relevant
              accounting and financial management topics?

            </h5>
          </div>
          <span>
            <?= isset($s3_criteria_two_a->c2_s3_3_18_checkbox_1) ? ucwords($s3_criteria_two_a->c2_s3_3_18_checkbox_1) : '' ?>
          </span>
          <p>comments:</p>
          <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
            <?= isset($s3_criteria_two_a->c2_s3_3_18_comment_1) ? $s3_criteria_two_a->c2_s3_3_18_comment_1 : '' ?>



          </p>

          <h5>Verification Source or Comment(s): Board and staff training roster/curriculum

          </h5>
          <h4 style="text-align: right;">Rating:
            <?= isset($s3_criteria_two_a->c2_s3_3_18_rating_1) ? $s3_criteria_two_a->c2_s3_3_18_rating_1 : '' ?>
          </h4>


          <?php
               $rating_c2s3 = $totalrating['criteriaTwo']['c2_s3'];

               $tRatings3c2 = $rating_c2s3['val'] / $rating_c2s3['count'];
               $tRatings3c2 =  (round(($rating_c2s3['val'] / $rating_c2s3['count']), 1, PHP_ROUND_HALF_ODD));

               ?>
          <h3>Calculation -
            <?= isset($tRatings3c2) ? $tRatings3c2 : '' ?>/5
          </h3>
      </div>
      <!-- c3s3 end -->

      <!-- c3s4  start-->

      <div
        style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>INTERNAL CONTROLS</h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 4</h5>
        <p>Internal controls is the process established by the affiliate’s board of directors, management and
          other personnel that is designed to provide reasonable assurance that the affiliate will efficiently
          and effectively achieve its objectives, reliably report finances, and comply with applicable laws
          and regulations.


        </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.1 The affiliate has established written procedures that are followed and reviewed annually,
            for internal financial controls, including the selection of authorized signatures on affiliate
            bank accounts through resolutions, and the requirement for enforced bonding insurance for
            applicable staff and board members.

          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_1_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_1_comment_1) ? $s4_criteria_two_a->c2_s4_4_1_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Written procedure for Internal Financial Controls; board approval
          in the minutes,Page -
          <span style="padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
            <?= isset($s4_criteria_two_a->c2_s4_4_1_val_1) ? $s4_criteria_two_a->c2_s4_4_1_val_1 : '' ?>
          </span>
          ; names and position of check signers
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_1_rating_1) ? $s4_criteria_two_a->c2_s4_4_1_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.2 The affiliate has established written procedures for the identification, review, tracking,
            and handling of all assets of the Urban League affiliate and its entities.
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_2_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_2_comment_1) ? $s4_criteria_two_a->c2_s4_4_2_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Written procedures for asset management; fixed-asset register
          (inventory of land, building, and equipment)

        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_2_rating_1) ? $s4_criteria_two_a->c2_s4_4_2_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.3 Does the affiliate allow checks to be pre-signed?
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_3_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_3_comment_1) ? $s4_criteria_two_a->c2_s4_4_3_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Copy of policy
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_3_rating_1) ? $s4_criteria_two_a->c2_s4_4_3_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.4 Does the affiliate prepare a Statement of Financial Position and a Statement of Activities
            on a monthly basis?
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_4_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_4_checkbox_1) : '' ?>
        </span>


        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_4_comment_1) ? $s4_criteria_two_a->c2_s4_4_4_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Monthly Board Financial Packet
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_4_rating_1) ? $s4_criteria_two_a->c2_s4_4_4_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.5 Does the affiliate budget planning process include management personnel, the President/CEO
            and members of the Board?
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_5_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_5_checkbox_1) : '' ?>
        </span>

        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_5_comment_1) ? $s4_criteria_two_a->c2_s4_4_5_comment_1 : '' ?>

        </p>
        <!-- <h5>If yes, has the affiliate taken steps to address these concerns?
                    <span> </?=isset($s4_criteria_two_a->c2_s1_1_7_rating_1)?$s4_criteria_two_a->c2_s1_1_7_rating_1:''?></span>
                </h5> -->
        <h5>Verification Source or Comment(s): Copy of the board approved current budget; and an outline of the
          budgeting process; Date approved <span>
            <?= isset($s4_criteria_two_a->c2_s4_4_5_date_1) ? $s4_criteria_two_a->c2_s4_4_5_date_1 : '' ?>
          </span>
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_5_rating_1) ? $s4_criteria_two_a->c2_s4_4_5_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.6 Does the affiliate disbursement policy require members of the board to approve above a
            certain amount? What is that amount? </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_6_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_6_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_6_comment_1) ? $s4_criteria_two_a->c2_s4_4_6_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Policy statement and amount $ <span>
            <?= isset($s4_criteria_two_a->c2_s4_4_6_val_1) ? $s4_criteria_two_a->c2_s4_4_6_val_1 : '' ?>
          </span>
          ; board minutes,Page -
          <span style="padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
            <?= isset($s4_criteria_two_a->c2_s4_4_6_val_2) ? $s4_criteria_two_a->c2_s4_4_6_val_2 : '' ?>
          </span>
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_6_rating_1) ? $s4_criteria_two_a->c2_s4_4_6_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.7 Are cancelled checks reviewed in a timely manner, not later than
            <span style="padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
              <?= isset($s4_criteria_two_a->c2_s4_4_7_val_1) ? $s4_criteria_two_a->c2_s4_4_7_val_1 : '' ?>
            </span>
            days following receipt?

          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_7_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_7_checkbox_1) : '' ?>
        </span>


        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_7_comment_1) ? $s4_criteria_two_a->c2_s4_4_7_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Explain, in writing, the review process
        </h5>

        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_7_rating_1) ? $s4_criteria_two_a->c2_s4_4_7_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.8 Is the payroll approved by a manager who is not responsible for its preparation?
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_8_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_8_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_8_comment_1) ? $s4_criteria_two_a->c2_s4_4_8_comment_1 : '' ?>

        </p>

        <h5>Verification Source or Comment(s): Payroll Register and written procedures
        </h5>


        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_8_rating_1) ? $s4_criteria_two_a->c2_s4_4_8_rating_1 : '' ?>
        </h4>



        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.9 Are withholding and FICA taxes deposited on a timely basis and in accordance with federal,
            state, and local municipal laws, where applicable.
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_9_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_9_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_9_comment_1) ? $s4_criteria_two_a->c2_s4_4_9_comment_1 : '' ?>


        </p>

        <h5>Verification Source or Comment(s): Form 941 for the last four (4) quarters and appropriate backup
        </h5>


        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_9_rating_1) ? $s4_criteria_two_a->c2_s4_4_9_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.10 Were all tax payments (includes FICA, and unemployment) made on time (by due date)?
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_10_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_10_checkbox_1) : '' ?>
        </span> <span>N/A :
          <?= isset($s4_criteria_two_a->c2_s4_4_10_val_1) ? $s4_criteria_two_a->c2_s4_4_10_val_1 : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_10_comment_1) ? $s4_criteria_two_a->c2_s4_4_10_comment_1 : '' ?>

        </p>


        <h5>If not, were interest and penalties assessed against the Affiliate? Penalty- $ <span>
            <?= isset($s4_criteria_two_a->c2_s4_4_10_val_2) ? $s4_criteria_two_a->c2_s4_4_10_val_2 : '' ?>
          </span>
          Interest - $ <span>
            <?= isset($s4_criteria_two_a->c2_s4_4_10_val_3) ? $s4_criteria_two_a->c2_s4_4_10_val_3 : '' ?>
          </span></h5>

        <h5>If interest and penalties were assessed, were these costs allocated to any public funding
          source?<span>
            <?= isset($s4_criteria_two_a->c2_s4_4_10_val_4) ? $s4_criteria_two_a->c2_s4_4_10_val_4 : '' ?>
          </span></h5>
        <h5>Verification Source or Comment(s): Internal Revenue Service correspondence and any other appropriate
          documentation
        </h5>


        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_10_rating_1) ? $s4_criteria_two_a->c2_s4_4_10_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.11 Are employees, board members and volunteers who handle affiliate funds and investments
            bonded to assure the safeguarding of assets?
          </h5>
        </div>

        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_11_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_11_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_11_comment_1) ? $s4_criteria_two_a->c2_s4_4_11_comment_1 : '' ?>

        </p>

        <h5>Verification Source or Comment(s): Copy of Bonding Insurance
        </h5>



        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_11_rating_1) ? $s4_criteria_two_a->c2_s4_4_11_rating_1 : '' ?>
        </h4>





        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.12 Does the affiliate have a written policy on the use of its corporate credit card, and a
            process for recovering unauthorized usage?
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_12_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_12_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_12_comment_1) ? $s4_criteria_two_a->c2_s4_4_12_comment_1 : '' ?>



        </p>
        <h5>Verification Source or Comment(s): Affiliate written policy/process
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_12_rating_1) ? $s4_criteria_two_a->c2_s4_4_12_rating_1 : '' ?>

        </h4>





        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.13 Do the affiliate’s Accounting or Board Policy and Procedures Manual prohibit the use of
            bank issued debit cards?
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_13_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_13_checkbox_1) : '' ?>
        </span>

        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_13_comment_1) ? $s4_criteria_two_a->c2_s4_4_13_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Affiliate written policy and source
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_13_rating_1) ? $s4_criteria_two_a->c2_s4_4_13_rating_1 : '' ?>
        </h4>



        <div style='page-break-after:always;'></div>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.14 A written strategy for diversifying sources of income has been implemented.
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_14_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_14_checkbox_1) : '' ?>
        </span>

        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_14_comment_1) ? $s4_criteria_two_a->c2_s4_4_14_comment_1 : '' ?>

        </p>
        <h5>Verification Source or Comment(s): Long-range Financial Strategies; Fund Diversification Plan; Board
          minutes, Page -
          <span style="padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
            <?= isset($s4_criteria_two_a->c2_s4_4_14_val_1) ? $s4_criteria_two_a->c2_s4_4_14_val_1 : '' ?>
          </span>

        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_14_rating_1) ? $s4_criteria_two_a->c2_s4_4_14_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.15 For the last three (3) years, did actual operating income equal or exceed actual operating
            expenses?
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_15_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_15_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_15_comment_1) ? $s4_criteria_two_a->c2_s4_4_15_comment_1 : '' ?>



        </p>

        <h5>Verification Source or Comment(s): Affiliate Audits
        </h5>
        <table style="width: 100%; text-align: left;">
          <thead>
            <tr>
              <th style="text-align: left;">Year (Period) </th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Income</th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Expenses</th>
              <th style="text-align: left;"></th>
              <th style="text-align: left;">Net</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_1) ? $s4_criteria_two_a->c2_s4_4_15_val_1 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_2) ? $s4_criteria_two_a->c2_s4_4_15_val_2 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_3) ? $s4_criteria_two_a->c2_s4_4_15_val_3 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_4) ? $s4_criteria_two_a->c2_s4_4_15_val_4 : '' ?>
              </td>
            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_5) ? $s4_criteria_two_a->c2_s4_4_15_val_5 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_6) ? $s4_criteria_two_a->c2_s4_4_15_val_6 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_7) ? $s4_criteria_two_a->c2_s4_4_15_val_7 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_8) ? $s4_criteria_two_a->c2_s4_4_15_val_8 : '' ?>
              </td>
            </tr>
            <tr>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_9) ? $s4_criteria_two_a->c2_s4_4_15_val_9 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_10) ? $s4_criteria_two_a->c2_s4_4_15_val_10 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_11) ? $s4_criteria_two_a->c2_s4_4_15_val_11 : '' ?>
              </td>
              <td style="width:150px; padding: 7px;">


              </td>
              <td style="width:150px; padding: 7px; border: 1px solid #ccc;  border-radius: 5px;">

                <?= isset($s4_criteria_two_a->c2_s4_4_15_val_12) ? $s4_criteria_two_a->c2_s4_4_15_val_12 : '' ?>
              </td>
            </tr>



          </tbody>
        </table>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_15_rating_1) ? $s4_criteria_two_a->c2_s4_4_15_rating_1 : '' ?>
        </h4>




        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.16 The affiliate has or is in the active process of creating unrestricted cash reserves equal
            to at least a minimum of three months.
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_16_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_16_checkbox_1) : '' ?>
        </span>
        <span>N/A :
          <?= isset($s4_criteria_two_a->c2_s4_4_16_val_1) ? $s4_criteria_two_a->c2_s4_4_16_val_1 : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_16_comment_1) ? $s4_criteria_two_a->c2_s4_4_16_comment_1 : '' ?>



        </p>

        <h5>Reserves on hand: $ <span>
            <?= isset($s4_criteria_two_a->c2_s4_4_16_val_2) ? $s4_criteria_two_a->c2_s4_4_16_val_2 : '' ?>
          </span></h5>
        <h5>Verification Source or Comment(s): Reserves Source(s); monthly expenses <span>
            <?= isset($s4_criteria_two_a->c2_s4_4_16_val_3) ? $s4_criteria_two_a->c2_s4_4_16_val_3 : '' ?>
          </span></h5>
        <h5>Verification Source or Comment(s): Reserves Source(s); monthly expenses </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_16_rating_1) ? $s4_criteria_two_a->c2_s4_4_16_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.17 The affiliate board of directors has established written policies for the use of affiliate
            operating reserves.
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_17_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_17_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_17_comment_1) ? $s4_criteria_two_a->c2_s4_4_17_comment_1 : '' ?>



        </p>

        <h5>Verification Source or Comment(s): Approved Affiliate Operating Reserves Policy; board minutes, Page
          -
          <span style="border:1px solid #ccc; padding: 5px; border-radius: 5px;">
            <?= isset($s4_criteria_two_a->c2_s4_4_17_val_1) ? $s4_criteria_two_a->c2_s4_4_17_val_1 : '' ?>
          </span>

        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_17_rating_1) ? $s4_criteria_two_a->c2_s4_4_17_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.18 The board of directors receives and reviews on a regular basis (at least quarterly)
            Statement of Financial Position and a Statement of Activities.
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_18_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_18_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_18_comment_1) ? $s4_criteria_two_a->c2_s4_4_18_comment_1 : '' ?>



        </p>

        <h5>Verification Source or Comment(s): Copy of monthly financial packets to board
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_18_rating_1) ? $s4_criteria_two_a->c2_s4_4_18_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.19 An independent CPA or auditing firm is engaged annually by the affiliate to perform an
            audit of the affiliate’s financial statements and the board reviews the audit and any management
            letter accompanying the audit.
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_19_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_19_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_19_comment_1) ? $s4_criteria_two_a->c2_s4_4_19_comment_1 : '' ?>



        </p>

        <h5>Verification Source or Comment(s): Name of Auditors and date of board approval
          <span>
            <?= isset($s4_criteria_two_a->c2_s4_4_19_date_1) ? $s4_criteria_two_a->c2_s4_4_19_date_1 : '' ?>
          </span>
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_19_rating_1) ? $s4_criteria_two_a->c2_s4_4_19_rating_1 : '' ?>
        </h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.20 All findings and recommendations provided by the auditor have been considered and there is
            a record of corrective actions taken.
          </h5>
        </div>
        <span>
          <?= isset($s4_criteria_two_a->c2_s4_4_20_checkbox_1) ? ucwords($s4_criteria_two_a->c2_s4_4_20_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_two_a->c2_s4_4_20_comment_1) ? $s4_criteria_two_a->c2_s4_4_20_comment_1 : '' ?>



        </p>

        <h5>Verification Source or Comment(s): Copy of the corrective action response(s)
        </h5>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_two_a->c2_s4_4_20_rating_1) ? $s4_criteria_two_a->c2_s4_4_20_rating_1 : '' ?>
        </h4>


        <?php
            $rating_c2s4 = $totalrating['criteriaTwo']['c2_s4'];

            $tRatings4c2 =  (round(($rating_c2s4['val'] / $rating_c2s4['count']), 1, PHP_ROUND_HALF_ODD));

            ?>
        <h3>Calculation -
          <?= isset($tRatings4c2) ? $tRatings4c2 : '' ?>/5
        </h3>
      </div>
    </div>

    <!-- c2s4 end -->


    <!-- c2s5  start-->
    <div style='page-break-after:always;'></div>
    <div
      style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
      <h3>INTERNAL CONTROLS</h3>
    </div>
    <div
      style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
      <h5>Standard 5</h5>
      <p>Financial policies and financial planning should be closely integrated into the affiliate’s daily
        activities to be able to assess the financial feasibility of the programs and services provided

      </p>
      <h4>INDICATORS OF EFFECTIVENESS</h4>
      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>5.1 Affiliate dues are forwarded to the National Urban League in accordance with National Urban
          League policy, and is the affiliate current with payments?
        </h5>
      </div>
      <span>
        <?= isset($s5_criteria_two_a->c2_s5_5_1_checkbox_1) ? ucwords($s5_criteria_two_a->c2_s5_5_1_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s5_criteria_two_a->c2_s5_5_1_comment_1) ? $s5_criteria_two_a->c2_s5_5_1_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Affiliate dues deposit and transmittal records
      </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s5_criteria_two_a->c2_s5_5_1_rating_1) ? $s5_criteria_two_a->c2_s5_5_1_rating_1 : '' ?>
      </h4>
      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>5.2 All members of the board of directors, employed staff, and operational volunteers, annually
          sign a conflict-of-interest, code of conduct and confidentiality statements

        </h5>
      </div>
      <span>
        <?= isset($s5_criteria_two_a->c2_s5_5_2_checkbox_1) ? ucwords($s5_criteria_two_a->c2_s5_5_2_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s5_criteria_two_a->c2_s5_5_2_comment_1) ? $s5_criteria_two_a->c2_s5_5_2_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Copies of signed statements

      </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s5_criteria_two_a->c2_s5_5_2_rating_1) ? $s5_criteria_two_a->c2_s5_5_2_rating_1 : '' ?>
      </h4>


      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>5.3 The affiliate has a written risk management plan, reviewed annually, which includes a plan
          to protect and utilize affiliate assets. (E.g. crisis communication plan, D&O Insurance,
          property insurance, fiscal controls).
        </h5>
      </div>
      <span>
        <?= isset($s5_criteria_two_a->c2_s5_5_3_checkbox_1) ? ucwords($s5_criteria_two_a->c2_s5_5_3_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s5_criteria_two_a->c2_s5_5_3_comment_1) ? $s5_criteria_two_a->c2_s5_5_3_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Written Risk Management Plan; agency insurance summary
      </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s5_criteria_two_a->c2_s5_5_3_rating_1) ? $s5_criteria_two_a->c2_s5_5_3_rating_1 : '' ?>
      </h4>

      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>5.4 The affiliate board has written policies for use of Urban League property by outside groups
          that minimize potential liability for the affiliate.
        </h5>
      </div>
      <span>
        <?= isset($s5_criteria_two_a->c2_s5_5_4_checkbox_1) ? ucwords($s5_criteria_two_a->c2_s5_5_4_checkbox_1) : '' ?>
      </span>


      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s5_criteria_two_a->c2_s5_5_4_comment_1) ? $s5_criteria_two_a->c2_s5_5_4_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Written Policies and Procedures for property use </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s5_criteria_two_a->c2_s5_5_4_rating_1) ? $s5_criteria_two_a->c2_s5_5_4_rating_1 : '' ?>
      </h4>


      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>5.5 The affiliate owns or leases sites and facilities needed to support services.
        </h5>
      </div>
      <span>
        <?= isset($s5_criteria_two_a->c2_s5_5_5_checkbox_1) ? ucwords($s5_criteria_two_a->c2_s5_5_5_checkbox_1) : '' ?>
      </span>

      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s5_criteria_two_a->c2_s5_5_5_comment_1) ? $s5_criteria_two_a->c2_s5_5_5_comment_1 : '' ?>
      </p>

      <h5>Verification Source or Comment(s): Deeds and leases and/or agreements for all affiliate sites </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s5_criteria_two_a->c2_s5_5_5_rating_1) ? $s5_criteria_two_a->c2_s5_5_5_rating_1 : '' ?>
      </h4>


      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>5.6 The affiliate repairs, replaces, and maintains affiliate land, buildings, and equipment as
          needed and in accordance with a long-range property acquisition, maintenance and utilization
          plan.
        </h5>
      </div>
      <span>
        <?= isset($s5_criteria_two_a->c2_s5_5_6_checkbox_1) ? ucwords($s5_criteria_two_a->c2_s5_5_6_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s5_criteria_two_a->c2_s5_5_6_comment_1) ? $s5_criteria_two_a->c2_s5_5_6_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Long-range property acquisition, maintenance and utilization plan
      </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s5_criteria_two_a->c2_s5_5_6_rating_1) ? $s5_criteria_two_a->c2_s5_5_6_rating_1 : '' ?>
      </h4>


      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>5.7 The affiliate has a capital budget funded to meet its long-range property needs.
        </h5>
      </div>
      <span>
        <?= isset($s5_criteria_two_a->c2_s5_5_7_checkbox_1) ? ucwords($s5_criteria_two_a->c2_s5_5_7_checkbox_1) : '' ?>
      </span>


      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s5_criteria_two_a->c2_s5_5_7_comment_1) ? $s5_criteria_two_a->c2_s5_5_7_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Copy of capital budget; long-range strategies for property; and
        fund development (capital campaign) strategies.
      </h5>

      <h4 style="text-align: right;">Rating:
        <?= isset($s5_criteria_two_a->c2_s5_5_7_rating_1) ? $s5_criteria_two_a->c2_s5_5_7_rating_1 : '' ?>
      </h4>

      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>5.8 Duplicates of all vital documents (i.e., property documents, insurance papers, charter,
          state articles of incorporation, minutes, etc.), are complete, up-to-date and are kept in a c
          (fire-proof safe), or in a secure location away from the affiliate’s location.
        </h5>
      </div>
      <span>
        <?= isset($s5_criteria_two_a->c2_s5_5_8_checkbox_1) ? ucwords($s5_criteria_two_a->c2_s5_5_8_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s5_criteria_two_a->c2_s5_5_8_comment_1) ? $s5_criteria_two_a->c2_s5_5_8_comment_1 : '' ?>
      </p>

      <h5>Verification Source or Comment(s): Copy of written procedures related to location and retrieval of
        documents.
      </h5>


      <h4 style="text-align: right;">Rating:
        <?= isset($s5_criteria_two_a->c2_s5_5_8_rating_1) ? $s5_criteria_two_a->c2_s5_5_8_rating_1 : '' ?>
      </h4>


      <?php
         $rating_c2s5 = $totalrating['criteriaTwo']['c2_s5'];

         $tRatings5c2 =  (round(($rating_c2s5['val'] / $rating_c2s5['count']), 1, PHP_ROUND_HALF_ODD));
         ?>
      <h3>Calculation -
        <?= isset($tRatings5c2) ? $tRatings5c2 : '' ?>/5
      </h3>
    </div>

    <!-- c2s5 end -->

    <!-- c1s6 start-->

    <div
      style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
      <h3>ENDOWMENTS</h3>
    </div>
    <div
      style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
      <h5>Standard 6</h5>
      <p>The affiliate board has made financial provisions to provide for the perpetuation of the Urban League
        within its service area.
      </p>
      <h4>INDICATORS OF EFFECTIVENESS</h4>
      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>6.1 The affiliate board has established a restricted cash reserve to be held in perpetuity, with
          an income stream to support activities of the affiliate.
        </h5>
      </div>
      <span>
        <?= isset($s6_criteria_two_a->c2_s6_6_1_checkbox_1) ? ucwords($s6_criteria_two_a->c2_s6_6_1_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s6_criteria_two_a->c2_s6_6_1_comment_1) ? $s6_criteria_two_a->c2_s6_6_1_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Board minutes,
        <span style="padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
          <?= isset($s6_criteria_two_a->c2_s6_6_1_val_1) ? $s6_criteria_two_a->c2_s6_6_1_val_1 : '' ?>
        </span> ; copy of trust
        agreement or other documents; affiliate audit
      </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s6_criteria_two_a->c2_s6_6_1_rating_1) ? $s6_criteria_two_a->c2_s6_6_1_rating_1 : '' ?>
      </h4>
      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>6.2 The affiliate board of directors maintains control of all restricted funds.
        </h5>
      </div>
      <span>
        <?= isset($s6_criteria_two_a->c2_s6_6_2_checkbox_1) ? ucwords($s6_criteria_two_a->c2_s6_6_2_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s6_criteria_two_a->c2_s6_6_2_comment_1) ? $s6_criteria_two_a->c2_s6_6_2_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Affiliate board minutes,
        <span style="padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
          <?= isset($s6_criteria_two_a->c2_s6_6_2_val_1) ? $s6_criteria_two_a->c2_s6_6_2_val_1 : '' ?>
        </span>
        ; bylaws, Page -
        <span style="padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
          <?= isset($s6_criteria_two_a->c2_s6_6_2_val_2) ? $s6_criteria_two_a->c2_s6_6_2_val_2 : '' ?>
        </span>
      </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s6_criteria_two_a->c2_s6_6_2_rating_1) ? $s6_criteria_two_a->c2_s6_6_2_rating_1 : '' ?>
      </h4>




      <?php
         $rating_c2s6 = $totalrating['criteriaTwo']['c2_s6'];

         $tRatings6c2 =  (round(($rating_c2s6['val'] / $rating_c2s6['count']), 1, PHP_ROUND_HALF_ODD));

         ?>
      <h3>Calculation -
        <?= isset($tRatings6c2) ? $tRatings6c2 : '' ?>/5
      </h3>
    </div>


    <!-- c1s6 end -->

    <!-- c1s7 start-->

    <div
      style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
      <h3>CORPORATE GOALS </h3>
    </div>
    <div
      style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
      <h5>Standard 7</h5>
      <p>The affiliate utilizes a planning system to maximize the effective and responsible development and
        use of resources.
      </p>
      <h4>INDICATORS OF EFFECTIVENESS</h4>
      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>7.1 The board has adopted corporate goals and objectives that give direction to the total work
          of the affiliate.
        </h5>
      </div>
      <span>
        <?= isset($s7_criteria_two_a->c2_s7_7_1_checkbox_1) ? ucwords($s7_criteria_two_a->c2_s7_7_1_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s7_criteria_two_a->c2_s7_7_1_comment_1) ? $s7_criteria_two_a->c2_s7_7_1_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Strategic Plan: Date <span>
          <?= isset($s7_criteria_two_a->c2_s7_7_1_date_1) ? $s7_criteria_two_a->c2_s7_7_1_date_1 : '' ?>
        </span></h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s7_criteria_two_a->c2_s7_7_1_rating_1) ? $s7_criteria_two_a->c2_s7_7_1_rating_1 : '' ?>
      </h4>
      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>7.2 The staffing structure, as determined by the President/CEO, supports the corporate goals and
          a reporting system is in place that includes regular written management reports to the board of
          directors based on the achievement of integrated objectives.
        </h5>
      </div>
      <span>
        <?= isset($s7_criteria_two_a->c2_s7_7_2_checkbox_1) ? ucwords($s7_criteria_two_a->c2_s7_7_2_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s7_criteria_two_a->c2_s7_7_2_comment_1) ? $s7_criteria_two_a->c2_s7_7_2_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): President/CEO’s reports; organizational chart
      </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s7_criteria_two_a->c2_s7_7_2_rating_1) ? $s7_criteria_two_a->c2_s7_7_2_rating_1 : '' ?>
      </h4>

      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>7.3 The board adopts the affiliate budget, inclusive of the operating and capital budgets, based
          on the integrated operating objectives and long-range strategies for property, fund development,
          membership, program, and finance management.
        </h5>
      </div>
      <span>
        <?= isset($s7_criteria_two_a->c2_s7_7_3_checkbox_1) ? ucwords($s7_criteria_two_a->c2_s7_7_3_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s7_criteria_two_a->c2_s7_7_3_comment_1) ? $s7_criteria_two_a->c2_s7_7_3_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Board approval, Date <span>
          <?= isset($s7_criteria_two_a->c2_s7_7_3_date_1) ? $s7_criteria_two_a->c2_s7_7_3_date_1 : '' ?>
        </span> </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s7_criteria_two_a->c2_s7_7_3_rating_1) ? $s7_criteria_two_a->c2_s7_7_3_rating_1 : '' ?>
      </h4>
      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>7.4 The board has delegated the responsibility for operational management to the President/CEO.

        </h5>
      </div>
      <span>
        <?= isset($s7_criteria_two_a->c2_s7_7_4_checkbox_1) ? ucwords($s7_criteria_two_a->c2_s7_7_4_checkbox_1) : '' ?>
      </span>
      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s7_criteria_two_a->c2_s7_7_4_comment_1) ? $s7_criteria_two_a->c2_s7_7_4_comment_1 : '' ?>
      </p>
      <h5>Verification Source or Comment(s): Bylaws,
        <span style="padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
          <?= isset($s7_criteria_two_a->c2_s7_7_4_val_1) ? $s7_criteria_two_a->c2_s7_7_4_val_1 : '' ?>
        </span>
        President/CEO’s position description
      </h5>
      <h4 style="text-align: right;">Rating:
        <?= isset($s7_criteria_two_a->c2_s7_7_4_rating_1) ? $s7_criteria_two_a->c2_s7_7_4_rating_1 : '' ?>
      </h4>




      <?php
         $rating_c2s7 = $totalrating['criteriaTwo']['c2_s7'];

         $tRatings7c2 =  (round(($rating_c2s7['val'] / $rating_c2s7['count']), 1, PHP_ROUND_HALF_ODD));

         ?>
      <h3>Calculation -
        <?= isset($tRatings7c2) ? $tRatings7c2 : '' ?>/5
      </h3>
    </div>

    <!-- c1s7 end -->

    <!-- c1s8 start-->

    <div
      style="width: 100%;text-align: left; margin-top:50px; padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
      <h3>LEGAL, COMPLIANCE AND ACCOUNTABILITY </h3>
    </div>
    <div
      style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
      <h5>Standard 8</h5>
      <p>Affiliates must be aware of and comply with all applicable federal, state and local laws. This may
        include, but is not limited to, the following activities: complying with laws and regulations
        related to fundraising, licensing, financial accountability, document retention and destruction,
        human resources, lobbying and political advocacy, and taxation.

      </p>
      <h4>INDICATORS OF EFFECTIVENESS</h4>
      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>8.1 List at least three ways how the affiliate monitors changes in legal and regulatory
          requirements

        </h5>
      </div>
      <span>
        <?= isset($s8_criteria_two_a->c2_s8_8_1_checkbox_1) ? ucwords($s8_criteria_two_a->c2_s8_8_1_checkbox_1) : '' ?>
      </span>
      <span>
        <?= isset($s8_criteria_two_a->c2_s8_8_1_checkbox_2) ? ucwords($s8_criteria_two_a->c2_s8_8_1_checkbox_2) : '' ?>
      </span>
      <span>
        <?= isset($s8_criteria_two_a->c2_s8_8_1_checkbox_3) ? ucwords($s8_criteria_two_a->c2_s8_8_1_checkbox_3) : '' ?>
      </span>

      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s8_criteria_two_a->c2_s8_8_1_comment_1) ? $s8_criteria_two_a->c2_s8_8_1_comment_1 : '' ?>
      </p>

      <h4 style="text-align: right;">Rating:
        <?= isset($s8_criteria_two_a->c2_s8_8_1_rating_1) ? $s8_criteria_two_a->c2_s8_8_1_rating_1 : '' ?>
      </h4>
      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>8.2 Provide a copy of the affiliate’s document retention policy and schedule.
        </h5>
      </div>

      <span>Link</span>

      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s8_criteria_two_a->c2_s8_8_2_comment_1) ? $s8_criteria_two_a->c2_s8_8_2_comment_1 : '' ?>
      </p>

      <h4 style="text-align: right;">Rating:
        <?= isset($s8_criteria_two_a->c2_s8_8_2_rating_1) ? $s8_criteria_two_a->c2_s8_8_2_rating_1 : '' ?>
      </h4>

      <div
        style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
        <h5>8.3 Describe, in writing, how the affiliate internally reviews its compliance with existing
          legal, regulatory, financial and National Urban League requirements.

        </h5>
      </div>

      <p>comments:</p>
      <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
        <?= isset($s8_criteria_two_a->c2_s8_8_3_comment_1) ? $s8_criteria_two_a->c2_s8_8_3_comment_1 : '' ?>
      </p>
      <h4 style="text-align: right;">Rating:
        <?= isset($s8_criteria_two_a->c2_s8_8_3_rating_1) ? $s8_criteria_two_a->c2_s8_8_3_rating_1 : '' ?>
      </h4>
      <?php
         $rating_c2s8 = $totalrating['criteriaTwo']['c2_s8'];
         $tRatings8c2 =  (round((($rating_c2s8['val']) / $rating_c2s8['count']), 1, PHP_ROUND_HALF_ODD));
         $totalC2Rating =  (round((($tRatings1c2 + $tRatings2c2 + $tRatings3c2 + $tRatings4c2 + $tRatings5c2 + $tRatings6c2 + $tRatings7c2 + $tRatings8c2) / 8), 1, PHP_ROUND_HALF_ODD));

         ?>
      <h3>Calculation -
        <?= isset($tRatings8c2) ? $tRatings8c2 : '' ?>/5
      </h3>
      <h3>Criteria 2 overall rating -
        <?= isset($totalC2Rating) ? $totalC2Rating : '' ?>/5
      </h3>



    </div>




    <!-- critera 2 end -->









    <!-- criteria 3 start -->
    <div style='page-break-after:always;'></div>


    <div>
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Criteria 3: Implementation of Mission </h3>
      </div>
      <div
        style="padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <p>An effective affiliate provides high-quality client-focused direct service programs which demonstrate
          improved client outcomes in key areas.</p>
      </div>
    </div>
    <div>

      <!-- c3s1 start -->
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Operational Standards </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 1</h5>
        <p>The affiliate has and uses procedures for ensuring clients receive professional services that address their
          individual needs.
        </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.1 PROFESSIONAL QUALITY OVERVIEW. The affiliate has a professional quality overview of programs. The
            overview includes at a minimum; the needs addressed through the program(s), description of the services,
            length of program, participation requirements and expected client outcomes. Content, delivery and format
            should be culturally relevant and where appropriate materials should be available in languages that reflect
            the population served.</h5>
        </div>
        <span>
          <?= isset($s1_criteria_three_a->c3_s1_1_1_checkbox_1) ? ucwords($s1_criteria_three_a->c3_s1_1_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_three_a->c3_s1_1_1_comment_1) ? $s1_criteria_three_a->c3_s1_1_1_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of current program overview(s) to include contract dates, contract
          funder, contract number and contract amount </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_three_a->c3_s1_1_1_rating_1) ? $s1_criteria_three_a->c3_s1_1_1_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.2 COMPREHENSIVE CLIENT INTAKE. The affiliate has a system for conducting a comprehensive client intake
            as appropriate. At a minimum, the Intake should include background information; identify client needs; and
            program interest. Specific intake information required by programmatic area should be included. All clients
            are assigned a unique identification number at Intake which is used to track and monitor participation and
            outcomes over the service and follow-up period. The use of an electronic client management system is
            preferred.</h5>
        </div>
        <span>
          <?= isset($s1_criteria_three_a->c3_s1_1_2_checkbox_1) ? ucwords($s1_criteria_three_a->c3_s1_1_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_three_a->c3_s1_1_2_comment_1) ? $s1_criteria_three_a->c3_s1_1_2_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of current program intake form(s) </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_three_a->c3_s1_1_2_rating_1) ? $s1_criteria_three_a->c3_s1_1_2_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.3 CLIENT ACTION PLANS. The affiliate program(s) develops and monitors client action plans as
            appropriate. The action plan includes measurable goals and benchmarks and is developed in partnership with
            the client.</h5>
        </div>
        <span>
          <?= isset($s1_criteria_three_a->c3_s1_1_3_checkbox_1) ? ucwords($s1_criteria_three_a->c3_s1_1_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_three_a->c3_s1_1_3_comment_1) ? $s1_criteria_three_a->c3_s1_1_3_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of Client Action Plans</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_three_a->c3_s1_1_3_rating_1) ? $s1_criteria_three_a->c3_s1_1_3_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.4 SERVICE CONTRACTS. The affiliate program(s) requires client and provider to sign a service contract
            which outlines both client and program responsibilities.</h5>
        </div>
        <span>
          <?= isset($s1_criteria_three_a->c3_s1_1_4_checkbox_1) ? ucwords($s1_criteria_three_a->c3_s1_1_4_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_three_a->c3_s1_1_4_comment_1) ? $s1_criteria_three_a->c3_s1_1_4_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of Client Action Plans </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_three_a->c3_s1_1_4_rating_1) ? $s1_criteria_three_a->c3_s1_1_4_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.5 SKILLS AND APTITUDE ASSESSMENTS. The affiliate uses validated assessments to assess client skills and
            aptitude, where required.</h5>
        </div>
        <span>
          <?= isset($s1_criteria_three_a->c3_s1_1_5_checkbox_1) ? ucwords($s1_criteria_three_a->c3_s1_1_5_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_three_a->c3_s1_1_5_comment_1) ? $s1_criteria_three_a->c3_s1_1_5_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of assessments by program(s) </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_three_a->c3_s1_1_5_rating_1) ? $s1_criteria_three_a->c3_s1_1_5_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.6 WRITTEN REFERRAL NETWORK. The affiliate has a written referral network for individuals and families
            seeking services NOT provided by the affiliate.</h5>
        </div>
        <span>
          <?= isset($s1_criteria_three_a->c3_s1_1_6_checkbox_1) ? ucwords($s1_criteria_three_a->c3_s1_1_6_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_three_a->c3_s1_1_6_comment_1) ? $s1_criteria_three_a->c3_s1_1_6_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of referral network(s) and service contacts</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_three_a->c3_s1_1_6_rating_1) ? $s1_criteria_three_a->c3_s1_1_6_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>1.7 CLIENT EVALUATION FORM. The affiliate provides clients with a user-friendly survey to evaluate
            services received.</h5>
        </div>
        <span>
          <?= isset($s1_criteria_three_a->c3_s1_1_7_checkbox_1) ? ucwords($s1_criteria_three_a->c3_s1_1_7_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s1_criteria_three_a->c3_s1_1_7_comment_1) ? $s1_criteria_three_a->c3_s1_1_7_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of survey instrument(s) </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s1_criteria_three_a->c3_s1_1_7_rating_1) ? $s1_criteria_three_a->c3_s1_1_7_rating_1 : '' ?>
        </h4>


        <?php
            $rating_c3s1 = $totalrating['criteriaThree']['c3_s1'];

            $tRatings1c3 =  (round((($rating_c3s1['val']) / $rating_c3s1['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings1c3) ? $tRatings1c3 : '' ?>/5
        </h3>
      </div>



      <!-- c3s1 end -->



      <!-- c3s2 start -->
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Program Quality </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 2</h5>
        <p>The affiliate has procedures to protect the rights, dignity and privacy of clients participating in programs.
        </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>2.1 Statement of Clients Rights. The affiliate provides clients a written statement of their rights when
            seeking social services, including their right to file a grievance of the service provided.</h5>
        </div>
        <span>
          <?= isset($s2_criteria_three_a->c3_s2_2_1_checkbox_1) ? ucwords($s2_criteria_three_a->c3_s2_2_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_three_a->c3_s2_2_1_comment_1) ? $s2_criteria_three_a->c3_s2_2_1_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of Statement of Client’s Rights</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_three_a->c3_s2_2_1_rating_1) ? $s2_criteria_three_a->c3_s2_2_1_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>2.2 Grievance Procedures. A grievance process is in place and written procedures for filing a grievance
            are available to clients.</h5>
        </div>
        <span>
          <?= isset($s2_criteria_three_a->c3_s2_2_2_checkbox_1) ? ucwords($s2_criteria_three_a->c3_s2_2_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_three_a->c3_s2_2_2_comment_1) ? $s2_criteria_three_a->c3_s2_2_2_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of Grievance Procedure </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_three_a->c3_s2_2_2_rating_1) ? $s2_criteria_three_a->c3_s2_2_2_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>2.3 Protect Client Confidentiality. The affiliate has in place procedures for collecting and sharing
            confidential and personal information. The affiliate provides private areas for collecting confidential
            information.</h5>
        </div>
        <span>
          <?= isset($s2_criteria_three_a->c3_s2_2_3_checkbox_1) ? ucwords($s2_criteria_three_a->c3_s2_2_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s2_criteria_three_a->c3_s2_2_3_comment_1) ? $s2_criteria_three_a->c3_s2_2_3_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of Client Confidentiality Statement</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s2_criteria_three_a->c3_s2_2_3_rating_1) ? $s2_criteria_three_a->c3_s2_2_3_rating_1 : '' ?>
        </h4>

        <?php
            $rating_c3s2 = $totalrating['criteriaThree']['c3_s2'];

            $tRatings2c3 =  (round((($rating_c3s2['val']) / $rating_c3s2['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings2c3) ? $tRatings2c3 : '' ?>/5
        </h3>
      </div>


      <!-- c3s2 end -->



      <!-- c3s3 start -->
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Program Quality </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 3</h5>
        <p>The affiliate has in place a record keeping system that supports client services, program evaluation and
          protects client confidentiality and privacy. </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.1 Client Management System. The affiliate has in place a client management system to collect and
            maintain client records. An electronic system is preferred. Paper and electronic files are maintained in
            either secure file cabinets or electronically in a secure data system.</h5>
        </div>
        <span>
          <?= isset($s3_criteria_three_a->c3_s2_2_1_checkbox_1) ? ucwords($s3_criteria_three_a->c3_s2_2_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_three_a->c3_s3_3_1_comment_1) ? $s3_criteria_three_a->c3_s3_3_1_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Description of Client Management System</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_three_a->c3_s3_3_1_rating_1) ? $s3_criteria_three_a->c3_s3_3_1_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.2 Maintaining Client Records. The affiliate has in place procedures for maintaining client records in an
            easily retrieval format for at least 3 years or in accordance with programmatic requirements.</h5>
        </div>
        <span>
          <?= isset($s3_criteria_three_a->c3_s3_3_2_checkbox_1) ? ucwords($s3_criteria_three_a->c3_s3_3_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_three_a->c3_s3_3_2_comment_1) ? $s3_criteria_three_a->c3_s3_3_2_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of affiliate Retention Policy</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_three_a->c3_s3_3_2_rating_1) ? $s3_criteria_three_a->c3_s3_3_2_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>3.3 Destroying Records. The affiliate has written guidelines for destroying client records and when
            appropriate shreds client records to protect sensitive client information.</h5>
        </div>
        <span>
          <?= isset($s3_criteria_three_a->c3_s3_3_3_checkbox_1) ? ucwords($s3_criteria_three_a->c3_s3_3_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s3_criteria_three_a->c3_s3_3_3_comment_1) ? $s3_criteria_three_a->c3_s3_3_3_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of affiliate Retention Policy Rating</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s3_criteria_three_a->c3_s3_3_3_rating_1) ? $s3_criteria_three_a->c3_s3_3_3_rating_1 : '' ?>
        </h4>

        <?php
            $rating_c3s3 = $totalrating['criteriaThree']['c3_s3'];

            $tRatings3c3 =  (round((($rating_c3s3['val']) / $rating_c3s3['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings3c3) ? $tRatings3c3 : '' ?>/5
        </h3>
      </div>


      <!-- c3s3 end -->


      <!-- c3s4 start -->
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Program Quality </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 4</h5>
        <p>The affiliate recruits, hires and trains qualified program staff for quality direct? services. </p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.1 Core Competencies. The affiliate has written core competences for program staff which are used in
            recruiting, interviewing and hiring. Core competencies should include strong knowledge in the service area
            as demonstrated by experience, educational level, and certification. Specific core competencies for
            programmatic areas should be incorporated in hiring procedures as appropriate.</h5>
        </div>
        <span>
          <?= isset($s4_criteria_three_a->c3_s4_4_1_checkbox_1) ? ucwords($s4_criteria_three_a->c3_s4_4_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_three_a->c3_s4_4_1_comment_1) ? $s4_criteria_three_a->c3_s4_4_1_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of staff core competencies and job descriptions</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_three_a->c3_s4_4_1_rating_1) ? $s4_criteria_three_a->c3_s4_4_1_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.2 Educational Requirements. The affiliate has required educational levels for program staff. Bachelors’
            degrees in appropriate areas are encouraged for staff working directly with clients.</h5>
        </div>
        <span>
          <?= isset($s4_criteria_three_a->c3_s4_4_2_checkbox_1) ? ucwords($s4_criteria_three_a->c3_s4_4_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_three_a->c3_s4_4_2_comment_1) ? $s4_criteria_three_a->c3_s4_4_2_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Job descriptions</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_three_a->c3_s4_4_2_rating_1) ? $s4_criteria_three_a->c3_s4_4_2_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.3 Continuing Education. The affiliate encourages staff to receive additional continuing education and
            provides relevant information and referrals.</h5>
        </div>
        <span>
          <?= isset($s4_criteria_three_a->c3_s4_4_3_checkbox_1) ? ucwords($s4_criteria_three_a->c3_s4_4_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_three_a->c3_s4_4_3_comment_1) ? $s4_criteria_three_a->c3_s4_4_3_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of affiliate continuing education policy and log of continuing
          education for staff</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_three_a->c3_s4_4_3_rating_1) ? $s4_criteria_three_a->c3_s4_4_3_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.4 Recruitment. The affiliate posts available jobs externally and internally</h5>
        </div>
        <span>
          <?= isset($s4_criteria_three_a->c3_s4_4_4_checkbox_1) ? ucwords($s4_criteria_three_a->c3_s4_4_4_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_three_a->c3_s4_4_4_comment_1) ? $s4_criteria_three_a->c3_s4_4_4_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of job announcements, internal and external</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_three_a->c3_s4_4_4_rating_1) ? $s4_criteria_three_a->c3_s4_4_4_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.5 Orientation and Training. The affiliate provides new staff a programmatic orientation and training
            during the first 3 months of employment.</h5>
        </div>
        <span>
          <?= isset($s4_criteria_three_a->c3_s4_4_5_checkbox_1) ? ucwords($s4_criteria_three_a->c3_s4_4_5_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_three_a->c3_s4_4_5_comment_1) ? $s4_criteria_three_a->c3_s4_4_5_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Orientation and Training Agendas</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_three_a->c3_s4_4_5_rating_1) ? $s4_criteria_three_a->c3_s4_4_5_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.6 Staff Evaluation. The affiliate has in place a staff evaluation system which includes an initial
            follow-up for beginning staff and subsequent yearly evaluations.</h5>
        </div>
        <span>
          <?= isset($s4_criteria_three_a->c3_s4_4_6_checkbox_1) ? ucwords($s4_criteria_three_a->c3_s4_4_6_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_three_a->c3_s4_4_6_comment_1) ? $s4_criteria_three_a->c3_s4_4_6_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of affiliate performance management policy and performance evaluation
          form</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_three_a->c3_s4_4_6_rating_1) ? $s4_criteria_three_a->c3_s4_4_6_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>4.7 Code of Ethics. The affiliate has a written code of ethics for staff. The code of ethics should
            include guidelines for professional behavior, conflict of interest, privacy and confidentiality, quality
            assurance and integrity.</h5>
        </div>
        <span>
          <?= isset($s4_criteria_three_a->c3_s4_4_7_checkbox_1) ? ucwords($s4_criteria_three_a->c3_s4_4_7_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s4_criteria_three_a->c3_s4_4_7_comment_1) ? $s4_criteria_three_a->c3_s4_4_7_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of Code of Ethics Policy</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s4_criteria_three_a->c3_s4_4_7_rating_1) ? $s4_criteria_three_a->c3_s4_4_7_rating_1 : '' ?>
        </h4>

        <?php
            $rating_c3s4 = $totalrating['criteriaThree']['c3_s4'];

            $tRatings4c3 =  (round((($rating_c3s4['val']) / $rating_c3s4['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings4c3) ? $tRatings4c3 : '' ?>/5
        </h3>
      </div>


      <!-- c3s4 end -->

      <!-- c3s5 start -->
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Program Quality </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 5</h5>
        <p>Program facilities are safe, appropriate for activities, clean and conducive to reaching service goals.</p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.1 Access. The affiliate provides convenient, realistic, and broad accessibility to program services for
            target populations.</h5>
        </div>
        <span>
          <?= isset($s5_criteria_three_a->c3_s5_5_1_checkbox_1) ? ucwords($s5_criteria_three_a->c3_s5_5_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_three_a->c3_s5_5_1_comment_1) ? $s5_criteria_three_a->c3_s5_5_1_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of program schedule(s)</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_three_a->c3_s5_5_1_rating_1) ? $s5_criteria_three_a->c3_s5_5_1_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.2 Appropriate Space. The affiliate provides an attractive and age appropriate space for program
            activities. The affiliate programs meet all industry and regulatory standards for operating programs.</h5>
        </div>
        <span>
          <?= isset($s5_criteria_three_a->c3_s5_5_2_checkbox_1) ? ucwords($s5_criteria_three_a->c3_s5_5_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_three_a->c3_s5_5_2_comment_1) ? $s5_criteria_three_a->c3_s5_5_2_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Walk through of facilities</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_three_a->c3_s5_5_2_rating_1) ? $s5_criteria_three_a->c3_s5_5_2_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.3 Equipment. The affiliate provides sufficient and up-to-date materials and equipment for program
            participants.</h5>
        </div>
        <span>
          <?= isset($s5_criteria_three_a->c3_s5_5_3_checkbox_1) ? ucwords($s5_criteria_three_a->c3_s5_5_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_three_a->c3_s5_5_3_comment_1) ? $s5_criteria_three_a->c3_s5_5_3_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Strategic Plan,Page -
          <?= isset($s5_criteria_three_a->c3_s5_5_3_val_1) ? $s5_criteria_three_a->c3_s5_5_3_val_1 : '' ?> Needs
          Assessment
        </p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_three_a->c3_s5_5_3_rating_1) ? $s5_criteria_three_a->c3_s5_5_3_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.4 Staff-Client Ratios. The affiliate program(s) meets industry and regulatory staff-client ratios for
            program, activity and age groups.</h5>
        </div>
        <span>
          <?= isset($s5_criteria_three_a->c3_s5_5_4_checkbox_1) ? ucwords($s5_criteria_three_a->c3_s5_5_4_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_three_a->c3_s5_5_4_comment_1) ? $s5_criteria_three_a->c3_s5_5_4_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of affiliate contracts; staff-client ratio by program</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_three_a->c3_s5_5_4_rating_1) ? $s5_criteria_three_a->c3_s5_5_4_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.5 Safety. The affiliate has in place protective measures for protecting staff and client safety while
            participating and leaving program activities.</h5>
        </div>
        <span>
          <?= isset($s5_criteria_three_a->c3_s5_5_5_checkbox_1) ? ucwords($s5_criteria_three_a->c3_s5_5_5_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_three_a->c3_s5_5_5_comment_1) ? $s5_criteria_three_a->c3_s5_5_5_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of affiliate policy and procedures for client and staff safety</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_three_a->c3_s5_5_5_rating_1) ? $s5_criteria_three_a->c3_s5_5_5_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>5.6 Accommodations for Disabilities. The affiliate has accommodations for disabled clients which meet
            industry and regulatory standards for disabled clients.</h5>
        </div>
        <span>
          <?= isset($s5_criteria_three_a->c3_s5_5_6_checkbox_1) ? ucwords($s5_criteria_three_a->c3_s5_5_6_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s5_criteria_three_a->c3_s5_5_6_comment_1) ? $s5_criteria_three_a->c3_s5_5_6_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of affiliate ADA policy statement; Walk through of facilities Needs
          Assessment</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s5_criteria_three_a->c3_s5_5_6_rating_1) ? $s5_criteria_three_a->c3_s5_5_6_rating_1 : '' ?>
        </h4>




        <?php
            $rating_c3s5 = $totalrating['criteriaThree']['c3_s5'];

            $tRatings5c3 =  (round((($rating_c3s5['val']) / $rating_c3s5['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings5c3) ? $tRatings5c3 : '' ?>/5
        </h3>
      </div>


      <!-- c3s5 end -->



      <!-- c3s6 start -->
      <div style='page-break-after:always;'></div>
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Program Quality </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 6</h5>
        <p>Program effectiveness is assessed on an ongoing manner and an action plan for continuous improvement is
          developed.</p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>6.1 Does the affiliate have a written policy on advocacy defining the process by which the affiliate
            determines positions on specific issues?</h5>
        </div>
        <span>
          <?= isset($s6_criteria_three_a->c3_s6_6_1_checkbox_1) ? ucwords($s6_criteria_three_a->c3_s6_6_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s6_criteria_three_a->c3_s6_6_1_comment_1) ? $s6_criteria_three_a->c3_s6_6_1_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of Professional Quality Overview</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s6_criteria_three_a->c3_s6_6_1_rating_1) ? $s6_criteria_three_a->c3_s6_6_1_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>6.2 Target Population. The affiliate program has identified a target population in their community and has
            developed a communication and marketing plan to reach this target group.</h5>
        </div>
        <span>
          <?= isset($s6_criteria_three_a->c3_s6_6_2_checkbox_1) ? ucwords($s6_criteria_three_a->c3_s6_6_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s6_criteria_three_a->c3_s6_6_2_comment_1) ? $s6_criteria_three_a->c3_s6_6_2_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of Communication and Marketing Plan</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s6_criteria_three_a->c3_s6_6_2_rating_1) ? $s6_criteria_three_a->c3_s6_6_2_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>6.3 Measurable Goals and Objectives. The affiliate program design includes measurable program goals and
            objectives.</h5>
        </div>
        <span>
          <?= isset($s6_criteria_three_a->c3_s6_6_3_checkbox_1) ? ucwords($s6_criteria_three_a->c3_s6_6_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s6_criteria_three_a->c3_s6_6_3_comment_1) ? $s6_criteria_three_a->c3_s6_6_3_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of Professional Quality Overview</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s6_criteria_three_a->c3_s6_6_3_rating_1) ? $s6_criteria_three_a->c3_s6_6_3_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>6.4 Program Curriculum. Program(s) has and uses a detailed program curriculum which includes defined
            program activities.</h5>
        </div>
        <span>
          <?= isset($s6_criteria_three_a->c3_s6_6_4_checkbox_1) ? ucwords($s6_criteria_three_a->c3_s6_6_4_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s6_criteria_three_a->c3_s6_6_4_comment_1) ? $s6_criteria_three_a->c3_s6_6_4_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of Professional Quality Overview</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s6_criteria_three_a->c3_s6_6_4_rating_1) ? $s6_criteria_three_a->c3_s6_6_4_rating_1 : '' ?>
        </h4>

        <?php
            $rating_c3s6 = $totalrating['criteriaThree']['c3_s6'];

            $tRatings6c3 =  (round((($rating_c3s6['val']) / $rating_c3s6['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings6c3) ? $tRatings6c3 : '' ?>/5
        </h3>
      </div>


      <!-- c3s6 end -->

      <!-- c3s7 start -->
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Program Quality </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 7</h5>
        <p>Program effectiveness is assessed on an ongoing manner and an action plan for continuous improvement is
          developed.</p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>7.1 Program Implementation Plan. Program(s) has a written implementation plan which includes activities,
            staffing, facilities, management plan and timeline for program implementation.</h5>
        </div>
        <span>
          <?= isset($s7_criteria_three_a->c3_s7_7_1_checkbox_1) ? ucwords($s7_criteria_three_a->c3_s7_7_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s7_criteria_three_a->c3_s7_7_1_comment_1) ? $s7_criteria_three_a->c3_s7_7_1_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Latest program report submitted to funder, Program Contract.</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s7_criteria_three_a->c3_s7_7_1_rating_1) ? $s7_criteria_three_a->c3_s7_7_1_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>7.2 Process Evaluation Plan. Has the program(s) met goals and delivered on key indicators identified by
            funder(s)?</h5>
        </div>
        <span>
          <?= isset($s7_criteria_three_a->c3_s7_7_2_checkbox_1) ? ucwords($s7_criteria_three_a->c3_s7_7_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s7_criteria_three_a->c3_s7_7_2_comment_1) ? $s7_criteria_three_a->c3_s7_7_2_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of process evaluation plan by program(s)</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s7_criteria_three_a->c3_s7_7_2_rating_1) ? $s7_criteria_three_a->c3_s7_7_2_rating_1 : '' ?>
        </h4>

        <?php
            $rating_c3s7 = $totalrating['criteriaThree']['c3_s7'];

            $tRatings7c3 =  (round((($rating_c3s7['val']) / $rating_c3s7['count']), 1, PHP_ROUND_HALF_ODD));
            ?>
        <h3>Calculation -
          <?= isset($tRatings7c3) ? $tRatings7c3 : '' ?>/5
        </h3>
      </div>


      <!-- c3s7 end -->

      <!-- c3s8 start -->
      <div style='page-break-after:always;'></div>
      <div
        style="width: 100%;text-align: left;padding: 5px 30px;background-color: #A10707;color: #fff;text-transform: uppercase;border-radius: 8px 8px 0px 0px;  box-sizing: border-box;">
        <h3>Program Quality </h3>
      </div>
      <div
        style=" padding: 20px 30px;background-color: #fff;margin-bottom: 30px;border-radius: 0px 0px 8px 8px; border: 1px solid #ccc; ">
        <h5>Standard 8</h5>
        <p>The affiliate program has and implements an evaluation plan for describing client outcomes and assessing
          program effectiveness.</p>
        <h4>INDICATORS OF EFFECTIVENESS</h4>
        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>8.1 Evaluation Plan : The affiliate program(s) has a written evaluation plan for demonstrating program
            effectiveness.</h5>
        </div>
        <span>
          <?= isset($s8_criteria_three_a->c3_s8_8_1_checkbox_1) ? ucwords($s8_criteria_three_a->c3_s8_8_1_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s8_criteria_three_a->c3_s8_8_1_comment_1) ? $s8_criteria_three_a->c3_s8_8_1_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s) : Copy of written evaluation plan by program(s), Program Design and
          Outcomes</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s8_criteria_three_a->c3_s8_8_1_rating_1) ? $s8_criteria_three_a->c3_s8_8_1_rating_1 : '' ?>
        </h4>


        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>8.2 Performance Targets : The affiliate sets targets for program(s) performance on selected outputs,
            client outcomes and indicators.</h5>
        </div>
        <span>
          <?= isset($s8_criteria_three_a->c3_s8_8_2_checkbox_1) ? ucwords($s8_criteria_three_a->c3_s8_8_2_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s8_criteria_three_a->c3_s8_8_2_comment_1) ? $s8_criteria_three_a->c3_s8_8_2_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Copy of key outputs, client outcomes, indicators and programmatic targets
          and funder(s) reports.</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s8_criteria_three_a->c3_s8_8_2_rating_1) ? $s8_criteria_three_a->c3_s8_8_2_rating_1 : '' ?>
        </h4>

        <div
          style="border-radius: 10px;padding: 5px 10px;margin-top: 20px;background-color: #F7F4EF; margin-bottom: 15px;">
          <h5>8.3 Performance Measures : The affiliate compares program(s) results on key performance measures to
            targets, as a minimum evaluation model for measuring program effectiveness and impact.</h5>
        </div>
        <span>
          <?= isset($s8_criteria_three_a->c3_s8_8_3_checkbox_1) ? ucwords($s8_criteria_three_a->c3_s8_8_3_checkbox_1) : '' ?>
        </span>
        <p>comments:</p>
        <p style="border:1px solid #ccc; padding:10px; border-radius: 10px;">
          <?= isset($s8_criteria_three_a->c3_s8_8_3_comment_1) ? $s8_criteria_three_a->c3_s8_8_3_comment_1 : '' ?>
        </p>
        <p>Verification Source or Comment(s): Targets for program(s) outputs and key client outcomes and funder(s)
          reports</p>
        <h4 style="text-align: right;">Rating:
          <?= isset($s8_criteria_three_a->c3_s8_8_3_rating_1) ? $s8_criteria_three_a->c3_s8_8_3_rating_1 : '' ?>
        </h4>

        <?php
            $rating_c3s8 = $totalrating['criteriaThree']['c3_s8'];

            $tRatings8c3 =  (round((($rating_c3s8['val']) / $rating_c3s8['count']), 1, PHP_ROUND_HALF_ODD));
            $totalC3Rating =  (round((($tRatings1c3 + $tRatings2c3 + $tRatings3c3 + $tRatings4c3 + $tRatings5c3 + $tRatings6c3 + $tRatings7c3 + $tRatings8c3) / 8), 1, PHP_ROUND_HALF_ODD));

            ?>
        <h3>Calculation -
          <?= isset($tRatings8c3) ? $tRatings8c3 : '' ?>/5
        </h3>
        <h3>Criteria 3 overall rating -
          <?= isset($totalC3Rating) ? $totalC3Rating : '' ?>/5
        </h3>
      </div>


      <!-- c3s7 end -->

    </div>
    <!-- criteria 3 end -->


  </div>
</body>

</html>