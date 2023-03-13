<main>
  <div class="mainWrap">
    <div class="container">
        <div class="form">
            <div class="col-24">
                <div class="tabilCard inner NulCard">
                    <div class="contact-table table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="h3 Subtittle">
                                          <?= $tab_title; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php if($report_data != []) { ?>
                                <tr>
                                    <td class="w-50">Census Status: </td>
                                    <td><span><?= $report_data[0]['status'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">This information has been reviewed and certified as
                                        accurate. (Enter name of certifier.):: </td>
                                    <td><span><?= $report_data[0]['field_survey_name_of_certifier'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Year Organization was Established: </td>
                                    <td><span><?= $report_data[0]['field_date_established'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">President/CEO First Name: </td>
                                    <td><span><?= $report_data[0]['field_president_ceo_first_name'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">President/CEO Middle Name: </td>
                                    <td><span><?= $report_data[0]['field_president_ceo_middle_name'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">President/CEO Last Name: </td>
                                    <td><span><?= $report_data[0]['field_president_ceo_last_name'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of Years as CEO: </td>
                                    <td><span><?= $report_data[0]['field_number_of_years_as_ceo'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of Years of Service in Movement: </td>
                                    <td><span><?= $report_data[0]['field_number_of_years_of_service'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Address Line 1: </td>
                                    <td><span><?= $report_data[0]['field_address_line_1'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Address Line 2:</td>
                                    <td><span><?= $report_data[0]['field_address_line_2'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">City: </td>
                                    <td><span><?= $report_data[0]['field_city'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">State/Province: </td>
                                    <td><span><?= $report_data[0]['field_state_province'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Zip Code: </td>
                                    <td><span><?= $report_data[0]['field_zip_code'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Telephone: </td>
                                    <td><span><?= $report_data[0]['field_telephone'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Fax: </td>
                                    <td><span><?= $report_data[0]['field_fax'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Cellular Number: </td>
                                    <td><span><?= $report_data[0]['field_cellular_number'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Email Address: </td>
                                    <td><span><?= $report_data[0]['field_email_address'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50 form-label">Photo:</td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>Legacy Comments Contact info: </td>
                                    <td><span><?php echo $report_data[0]['field_legacy_comments_contact']; ?></span></td>
                                </tr>
                                <?php } ?>
                                <tr></tr>
                                <?php if($service_data != []) { ?>
                                <!-- Service Area -->
                                <?php for ($i = 0; $i < count($content['service_data']); $i++) { ?>
                                    <tr>
                                       <td>
                                          <h4 class="text-primary h5 fw-bold w-50">Service Area </h4>
                                       </td>
                                       <td><span></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">City/County </td>
                                       <td><span><?= $service_data[$i]['field_service_area_city_county']; ?> </span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">Population </td>
                                       <td><span><?= number_format($service_data[$i]['field_service_area_population']); ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50"><b>Race/Ethnicity</b></td>
                                       <td><b>Composition %</b></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">White </td>
                                       <td><span><?= isset($service_data[$i]['field_service_area_white']) ? $service_data[$i]['field_service_area_white'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">Hispanic/Latino </td>
                                       <td><span><?= isset($service_data[$i]['field_service_area_hispanic']) ? $service_data[$i]['field_service_area_hispanic'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">Asian American </td>
                                       <td><span><?= isset($service_data[$i]['field_service_area_asian_am']) ? $service_data[$i]['field_service_area_asian_am'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">Native American </td>
                                       <td><span><?= isset($service_data[$i]['field_service_area_native_am']) ? $service_data[$i]['field_service_area_native_am'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">African American </td>
                                       <td><span><?= isset($service_data[$i]['field_service_area_african_am']) ? $service_data[$i]['field_service_area_african_am'] . '%' : ''; ?></span></td>
                                    </tr>
                                    <tr>
                                       <td class="w-50">Other </td>
                                       <td><span><?= isset($service_data[$i]['field_service_area_other']) ? $service_data[$i]['field_service_area_other'] . '%' : ''; ?></span></td>
                                    </tr>
                                <?php } }?>
                                <!-- Community Relations -->
                                <?php if($content['community_data'] != []) { ?>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Community Relations</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate produce an annual report?: </td>
                                    <td><span><?php if (($content['community_data'][0]['field_produces_annual_report']) == 1) {
                                                echo "Yes";
                                            } elseif($content['community_data'][0]['field_produces_annual_report'] == 0 && $content['community_data'][0]['field_produces_annual_report']!='') {
                                                echo "No";
                                            } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate produce a monthly/quarterly newsletter?: </td>
                                    <td><span><?php if ($content['community_data'][0]['field_newsletter'] == 1) {
                                                echo "Yes";
                                            } elseif($content['community_data'][0]['field_newsletter'] == 0 && $content['community_data'][0]['field_newsletter'] !='') {
                                                echo "No";
                                            }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does affiliate produce a "State of Black (Affiliate Name)" Report?: </td>
                                    <td><span><?php if ($content['community_data'][0]['field_state_of_black_report'] == 1) {
                                                echo "Yes";
                                            } elseif($content['community_data'][0]['field_state_of_black_report'] ==0 && $content['community_data'][0]['field_state_of_black_report']!='') {
                                                echo "No";
                                            }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate maintain a website?: </td>
                                    <td><span><?php if ($content['community_data'][0]['field_maintains_website'] == 1) {
                                                echo "Yes";
                                            } elseif($content['community_data'][0]['field_maintains_website']==0 && $content['community_data'][0]['field_maintains_website']!='') {
                                                echo "No";
                                            }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">If so, what is your affiliate's website address?: </td>
                                    <td><span><?= $content['community_data'][0]['field_affiliate_website_address']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many hits does your website receive monthly?: </td>
                                    <td><span> <?php if (!empty($content['community_data'][0]['field_monthly_website_hits'])) { ?> <?= number_format($content['community_data'][0]['field_monthly_website_hits']); ?>  <?php } ?> </span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Is website linked to NUL website?: </td>
                                    <td><span><?php if ($content['community_data'][0]['field_is_website_linked_to_nul'] == 1) {
                                                echo "Yes";
                                            } elseif($content['community_data'][0]['field_is_website_linked_to_nul']==0 && $content['community_data'][0]['field_is_website_linked_to_nul']!='') {
                                                echo "No";
                                            }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does affiliate produce a regular TV or cable show?: </td>
                                    <td><span><?php if ($content['community_data'][0]['field_produces_tv_or_cable_show'] == 1) {
                                                echo "Yes";
                                            } elseif($content['community_data'][0]['field_produces_tv_or_cable_show']==0 && $content['community_data'][0]['field_produces_tv_or_cable_show']!='') {
                                                echo "No";
                                            };?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does affiliate produce a radio show?: </td>
                                    <td><span><?php if ($content['community_data'][0]['field_produces_a_radio_show'] == 1) {
                                                echo "Yes";
                                            } elseif($content['community_data'][0]['field_produces_a_radio_show']==0 && $content['community_data'][0]['field_produces_a_radio_show']!='') {
                                                echo "No";
                                            }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does affiliate have an advertising or marketing campaign?: </td>
                                    <td><span><?php if ($content['community_data'][0]['field_has_ad_marketing_campaign'] == 1) {
                                                echo "Yes";
                                            } elseif($content['community_data'][0]['field_has_ad_marketing_campaign']==0 && $content['community_data'][0]['field_has_ad_marketing_campaign']!='') {
                                                echo "No";
                                            }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">What is the method of advertising or marketing?: </td>
                                    <td><span>
                                        <?php foreach ($community_relation_method_ad_market as $key => $val) {
                                        echo $val['field_method_of_ad_marketing'] . "<br>";
                                        } ?>
                                    </span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does affiliate do a marketing kit and/or pamphlet?: </td>
                                    <td><span><?php if ($content['community_data'][0]['field_marketing_kit_or_pamphlet'] == 1) {
                                                echo "Yes";
                                            } elseif($content['community_data'][0]['field_marketing_kit_or_pamphlet']==0 && $content['community_data'][0]['field_marketing_kit_or_pamphlet']!='') {
                                                echo "No";
                                            }; ?></span></td>
                                </tr>
                                <tr></tr>
                                <?php } ?>
                                <!-- Employees and Board Members -->
                                <?php if($content['employee_data'] != []) { ?>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Employees and Board
                                                Members</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many full time employees do you have in your office?: </td>
                                    <td><span><?= $content['employee_data'][0]['field_full_time_employees']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many part time employees do you have in your office?: </td>
                                    <td><span><?= $content['employee_data'][0]['field_part_time_employees']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">What is the average salary for employees?: </td>
                                    <td><span><?php isset($content['employee_data'][0]['field_average_employee_salary']) ? print_r("$" . number_format($content['employee_data'][0]['field_average_employee_salary'], 2)) : print_r(''); ?></span></td>

                                </tr>
                                <tr>
                                    <td class="w-50">Does your affiliate provide health benefits to its employees?: </td>
                                    <td><span><?php if ($content['employee_data'][0]['field_employee_health_beneits'] == 1) {
                                                echo "Yes";
                                            } elseif ($content['employee_data'][0]['field_employee_health_beneits'] == 0 && $content['employee_data'][0]['field_employee_health_beneits'] != '') {
                                                echo "No";
                                            }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does your affiliate provide life insurance to its employees?: </td>
                                    <td><span><?php if ($content['employee_data'][0]['field_employee_life_insurance'] == 1) {
                                                echo "Yes";
                                            } elseif ($content['employee_data'][0]['field_employee_life_insurance'] == 0 && $content['employee_data'][0]['field_employee_life_insurance'] != '') {
                                                echo "No";
                                            } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does your affiliate have satellite offices?: </td>
                                    <td><span><?php if ($content['employee_data'][0]['field_satellite_offices'] == 1) {
                                                echo "Yes";
                                            } elseif ($content['employee_data'][0]['field_satellite_offices'] == 0 && $content['employee_data'][0]['field_satellite_offices'] != '') {
                                                echo "No";
                                            } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">If so, how many satellite offices does your affiliate have?: </td>
                                    <td><span><?php echo $content['employee_data'][0]['field_number_of_satellite_office']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Board Help: </td>
                                    <td><span></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="" colspan="4">What is the racial/gender
                                        composition of
                                        your board?
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="text-center w-300px h5 fw-bold">Race</td>
                                    <td class="text-center h5 fw-bold" style="align: center">Male</td>
                                    <td class="text-center h5 fw-bold">Female</td>
                                    <td class="text-center h5 fw-bold">Total</td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">White </td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_white_males']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_white_females']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_white_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Hispanic/Latino </td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_hispanic_males']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_hispanic_females']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_hispanic_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Asian American </td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_asian_am_males']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_asian_am_females']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_asian_am_total']; ?></span></td>
                                </tr>

                                <tr>
                                    <td class="text-center w-300px">Native American </td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_native_am_males']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_native_am_females']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_native_am_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">African American </td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_african_am_males']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_african_am_females']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_african_am_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Other</td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_other_males']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_other_females']; ?></span></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_other_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Total</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><span><?= $content['employee_data'][0]['field_board_member_grand_total']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                        <!-- Revenue -->
                        <table class="table table-striped">
                            <tbody>
                                <tr></tr>
                                <?php if($content['revenue_data'] != []) { ?>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Revenue</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Corporations: </td>
                                    <td><span><?php if (!empty($content['revenue_data'][0]['field_revenue_corporations'])) { ?>$<?= number_format($content['revenue_data'][0]['field_revenue_corporations']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Foundations: </td>
                                    <td><span><?php if (!empty($content['revenue_data'][0]['field_revenue_foundations'])) { ?> $<?= number_format($content['revenue_data'][0]['field_revenue_foundations']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Individual Memberships: </td>
                                    <td><span><?php if (!empty($content['revenue_data'][0]['field_revenue_individual_members'])) { ?> $<?= number_format($content['revenue_data'][0]['field_revenue_individual_members']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Special Events: </td>
                                    <td><span><?php if (!empty($content['revenue_data'][0]['field_revenue_special_events'])) { ?> $<?= number_format($content['revenue_data'][0]['field_revenue_special_events']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">United Way: </td>
                                    <td><span><?php if (isset($content['revenue_data'][0]['field_revenue_united_way'])) { ?> $<?= number_format($content['revenue_data'][0]['field_revenue_united_way']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Federal: </td>
                                    <td><span>$<?= number_format($content['revenue_data'][0]['field_revenue_federal']); ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">State/Local: </td>
                                    <td><span> <?php if (!empty($content['revenue_data'][0]['field_revenue_state_local'])) { ?> $<?= number_format($content['revenue_data'][0]['field_revenue_state_local']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">NUL: </td>
                                    <td><span>$<?= number_format($content['revenue_data'][0]['field_revenue_nul']); ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Purpose of NUL Funding: </td>
                                    <td><span><?= $content['revenue_data'][0]['field_revenue_purpose_of_funding']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Other: </td>
                                    <td><span>$<?= number_format($content['revenue_data'][0]['field_revenue_other']); ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">How much investment earnings (money market account,
                                        endowment)?:</td>
                                    <td><span><?php if (isset($content['revenue_data'][0]['field_revenue_investment'])) { ?>$<?= number_format($content['revenue_data'][0]['field_revenue_investment']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate have an endowment?: </td>
                                    <td><span><?php if ($content['revenue_data'][0]['field_revenue_has_endowment'] == 1) {
                                        echo "Yes";
                                      } elseif($content['revenue_data'][0]['field_revenue_has_endowment']==0 && $content['revenue_data'][0]['field_revenue_has_endowment']!='') {
                                        echo "No";
                                      }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">If so, what is the present amount?: </td>
                                    <td><span><?php if (!empty($content['revenue_data'][0]['field_revenue_endowment_amount'])) { ?> $<?= number_format($content['revenue_data'][0]['field_revenue_endowment_amount']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total revenue for your affiliate:: </td>
                                    <td><span><?php if (!empty($content['revenue_data'][0]['field_revenue_total_budget'])) { ?>$<?= number_format($content['revenue_data'][0]['field_revenue_total_budget']); ?> <?php } ?></span></td>
                                </tr>
                                <?php if ($this->session->role_id == 1) { ?>
                                    <tr>
                                        <td class="w-50">Legacy budgetNULFunding: </td>
                                        <td><span><?= $content['revenue_data'][0]['field_legacy_budgetnulfunding']; ?></span></td>
                                    </tr>
                                <?php } }?>
                                <!-- Expenditures -->
                                <?php if($content['expenditure_data'] != []) { ?>
                                <tr>
                                    <td class="w-50">What was the total expenditure by your affiliate for
                                        expenses (include salaries, rent/mortgage, equipment, etc.)?: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_total_expenditures'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_total_expenditures']); } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">A. Salaries/Wages: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_a_salaries_wages'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_a_salaries_wages']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">B. Fringe Benefits: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_b_fringe_benefits'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_b_fringe_benefits']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">C. Professional/Contract/Consulting Fees: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_c_professional_fees'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_c_professional_fees']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">D. Travel:</td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_d_travel'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_d_travel']); ?><?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">E. Postage/Freight: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_e_postage_freight'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_e_postage_freight']); ?><?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">F. Insurance: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_f_insurance'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_f_insurance']); ?><?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">G. Interest Payments: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_g_interest_payments'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_g_interest_payments']); ?><?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">H. Dues/Subscription/Registration: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_h_dues_subscription_regist'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_h_dues_subscription_regist']); ?><?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">I. Depreciation: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_i_depreciation'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_i_depreciation']); ?><?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">J. Taxes (including property taxes): </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_j_taxes_including_property'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_j_taxes_including_property']); } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">K. Utilities (telephone, gas, electric): </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_k_utilities'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_k_utilities']); } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">L. Equipment/space rental:
                                    </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_l_equipment_space_rental'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_l_equipment_space_rental']); ?><?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">M. Goods and Services: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_m_goods_and_services'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_m_goods_and_services']); } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">N. Rent/mortgage payments: </td>
                                    <td><span><?php if (!empty($content['expenditure_data'][0]['field_n_rent_mortgage_payments'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_n_rent_mortgage_payments']); ?><?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">O. Other: </td>
                                    <td><span><?php if (isset($content['expenditure_data'][0]['field_o_other'])) { ?> $<?= number_format($content['expenditure_data'][0]['field_o_other']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate own or rent?:
                                    </td>
                                    <td><span><?php foreach ($own_rent as $key => $val) {
                                  echo $val['field_own_or_rent'] . "<br>";
                                } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many properties does the affiliate own?: </td>
                                    <td><span><?= $content['expenditure_data'][0]['field_number_properties_owned']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many properties does the affiliate rent?: </td>
                                    <td><span><?= $content['expenditure_data'][0]['field_number_properties_rented']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">If the affiliate owns its facilities, what is the
                                        current market value of the property?: </td>
                                    <td><span><?php if (isset($content['expenditure_data'][0]['field_market_value_of_property'])) { ?>$<?= number_format($content['expenditure_data'][0]['field_market_value_of_property']); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate have a capital budget?: </td>
                                    <td><span><?php if ($content['expenditure_data'][0]['field_capital_budget'] == 1) {
                                        echo "Yes";
                                      } elseif($content['expenditure_data'][0]['field_capital_budget']==0 && $content['expenditure_data'][0]['field_capital_budget']!='') {
                                        echo "No";
                                      } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">If so, how much?:
                                    </td>
                                    <td><span><?= $content['expenditure_data'][0]['field_capital_budget_amount']; ?></span></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr></tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <br>
                                                        <div class="h5 Subtittle text-primary"><b>Education
                                                                Program
                                                                Details Programs</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center w-300px w-50 h5 fw-bold">Program Title </td>
                                                    <td class="text-center w-300px h5 fw-bold">Number of People Served Annually
                                                    </td>
                                                    <td class="text-center w-300px h5 fw-bold">Total Program Budget Funded </td>
                                                </tr>
                                                <?php
                                                    foreach ($programs as $pro) {
                                                        $report_id = $pro['field_parent_census'];
                                                        $pk_id = $pro['pk_id'];
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><a class="text-primary" href="<?php echo base_url("module/census_report/$report_id/$pk_id/viewprogram"); ?>"><?= $pro['title']; ?></a></td>
                                                            <td class="text-center"><span><?= $pro['field_program_served_total']; ?> </span> </td>
                                                            <td class="text-center"><span>$<?= number_format($pro['field_program_budget'], 2); ?></span> </td>
                                                        </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <tbody>
                                <?php if($content['education_prg_data'] != []) { ?>

                                <tr>
                                    <td class="w-50">Our Affiliate offers programs of this type: </td>
                                    <td><span><?php if ($content['education_prg_data'][0]['field_do_you_offer_programs_of_t'] == 1) {
																		echo "Yes";
																	} elseif ($content['education_prg_data'][0]['field_do_you_offer_programs_of_t'] == 0) {
																		echo "No";
																	}; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Person Who Oversees
                                                Education Programs</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Name: </td>
                                    <td><span> <?= $content['education_prg_data'][0]['field_ed_overseer_name']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Email: </td>
                                    <td><span><?= $content['education_prg_data'][0]['field_ed_overseer_email']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total Participants in Education Programs: </td>
                                    <td><span><?= $content['education_prg_data'][0]['field_program_ed_total_participa']; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Homeless Youth</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Do you serve homeless youth (birth -18 years old)?:
                                    </td>
                                    <td><span><?php if ($content['education_prg_data'][0]['field_program_ed_homeless_youth'] == 1 && $content['education_prg_data'][0]['field_program_ed_homeless_youth'] != '') {
																		echo "Yes";
																	} elseif ($content['education_prg_data'][0]['field_program_ed_homeless_youth'] == 0 && $content['education_prg_data'][0]['field_program_ed_homeless_youth'] != '') {
																		echo "No";
																	} else {
																		echo $content['education_prg_data'][0]['field_program_ed_homeless_youth'];
																	} ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Do you provide any services funded by Title 1 dollars?:
                                    </td>
                                    <td><span><?php if ($content['education_prg_data'][0]['field_program_ed_title1'] == 1 && $content['education_prg_data'][0]['field_program_ed_title1'] != '') {
																		echo "Yes";
																	} elseif ($content['education_prg_data'][0]['field_program_ed_title1'] == 0 && $content['education_prg_data'][0]['field_program_ed_title1'] != '') {
																		echo "No";
																	} else {
																		echo $content['education_prg_data'][0]['field_program_ed_title1'];
																	} ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Do you provide any services or operate programs in
                                        school buildings?: </td>
                                    <td><span><?php if ($content['education_prg_data'][0]['field_program_ed_school_building'] == 1 && $content['education_prg_data'][0]['field_program_ed_school_building'] != '') {
																		echo "Yes";
                                            } elseif ($content['education_prg_data'][0]['field_program_ed_school_building'] == 0 && $content['education_prg_data'][0]['field_program_ed_school_building'] != '') {
                                                echo "No";
                                            } else {
                                                echo $content['education_prg_data'][0]['field_program_ed_school_building'];
                                            } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">During the school day?: </td>
                                    <td><span><?php if ($content['education_prg_data'][0]['field_program_ed_school_day'] == 1 && $content['education_prg_data'][0]['field_program_ed_school_day'] != '') {
                                                echo "Yes";
                                            } elseif ($content['education_prg_data'][0]['field_program_ed_school_day'] == 0 && $content['education_prg_data'][0]['field_program_ed_school_day'] != '') {
                                                echo "No";
                                            } else {
                                                echo $content['education_prg_data'][0]['field_program_ed_school_day'];
                                            } ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Mentoring</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Do you provide any mentoring programs for children and
                                        youth (1st - 12th grade)?:</td>
                                    <td><span><?php if ($content['education_prg_data'][0]['field_program_ed_mentoring'] == 1 && $content['education_prg_data'][0]['field_program_ed_mentoring'] != '') {
                                                echo "Yes";
                                            } elseif ($content['education_prg_data'][0]['field_program_ed_mentoring'] == 0 && $content['education_prg_data'][0]['field_program_ed_mentoring'] != '') {
                                                echo "No";
                                            } else {
                                                echo $content['education_prg_data'][0]['field_program_ed_mentoring'];
                                            } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many mentors do you recruit and retain annually?:
                                    </td>
                                    <td><span><?= $content['education_prg_data'][0]['field_program_ed_mentors_annual']; ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Scholarship</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">What is the overall value of the scholarships provided
                                        annually?: </td>
                                    <td><span><?php if (isset($content['education_prg_data'][0]['field_program_ed_scholar_total'])) { ?>$<?= number_format($content['education_prg_data'][0]['field_program_ed_scholar_total'], 2);
                                        } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">What is the average value of the individual
                                        scholarships provided annually?: </td>
                                    <td><span><?php if (isset($content['education_prg_data'][0]['field_program_ed_scholar_avg'])) { ?>$<?= number_format($content['education_prg_data'][0]['field_program_ed_scholar_avg'], 2);
                                        } ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Charter Schools</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate operate a charter school?: </td>
                                    <td><span><?php
                                        $field_program_ed_charter_school = $content['education_prg_data'][0]['field_program_ed_charter_school'];
                                        if (($field_program_ed_charter_school) == 1 && $field_program_ed_charter_school != '') {
                                            echo "Yes";
                                        } elseif (($content['education_prg_data'][0]['field_program_ed_charter_school']) == 0 && $field_program_ed_charter_school != '') {
                                            echo "No";
                                        } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate operate a charter school management
                                        organization?:</td>
                                    <td><span>
                                        <?php
                                        $field_program_ed_charter_mngmt = $content['education_prg_data'][0]['field_program_ed_charter_mngmt'];
                                        if ($field_program_ed_charter_mngmt == 1 && $field_program_ed_charter_mngmt != '') {
                                            echo "Yes";
                                        } elseif (($content['education_prg_data'][0]['field_program_ed_charter_mngmt']) == 0 && $field_program_ed_charter_mngmt != '') {
                                            echo "No";
                                        } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate or CEO sit on a charter authorizing
                                        board?: </td>
                                    <td><span> <?php if ($content['education_prg_data'][0]['field_program_ed_charter_board'] == 1 && $content['education_prg_data'][0]['field_program_ed_charter_board'] != '') {
                                                echo "Yes";
                                            } elseif (($content['education_prg_data'][0]['field_program_ed_charter_board'] == 0 && $content['education_prg_data'][0]['field_program_ed_charter_board'] != '')) {
                                                echo "No";
                                            } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate provide any contracted services to a
                                        charter school, charter network or charter authorizing board?: </td>
                                    <td><span><?php if ($content['education_prg_data'][0]['field_program_ed_charter_service'] == 1 && $content['education_prg_data'][0]['field_program_ed_charter_service'] != '') {
                                            echo "Yes";
                                        } elseif ($content['education_prg_data'][0]['field_program_ed_charter_service'] == 0 && $content['education_prg_data'][0]['field_program_ed_charter_service'] != '') {
                                            echo "No";
                                        } ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Advocacy</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does the affiliate provide any Education advocacy in
                                        your community?: </td>
                                    <td><span><?php if ($content['education_prg_data'][0]['field_program_ed_advocacy'] == 1 && $content['education_prg_data'][0]['field_program_ed_advocacy'] != '') {
                                            echo "Yes";
                                        } elseif ($content['education_prg_data'][0]['field_program_ed_advocacy'] == 0 && $content['education_prg_data'][0]['field_program_ed_advocacy'] != '') {
                                            echo "No";
                                        } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">If so, who are your closest partners?: </td>
                                    <td><span><?= $content['education_prg_data'][0]['field_program_ed_adv_partners']; ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Education Programs (Middle
                                                School, High School)</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Program Model: </td>
                                    <td><span><?= $content['education_prg_data'][0]['field_program_ed_model']; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Program Impacts</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of participants promoted to the next grade:
                                    </td>
                                    <td><span><?= $content['education_prg_data'][0]['field_program_ed_promoted']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Percentage of participants who graduated from High
                                        School:
                                    </td>
                                    <td><span><?php if (isset($content['education_prg_data'][0]['field_program_ed_graduated'])) { ?><?= $content['education_prg_data'][0]['field_program_ed_graduated'] . '%';} ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Percentage of participants who submitted college
                                        application(s): </td>
                                    <td><span><?php if (isset($content['education_prg_data'][0]['field_program_ed_college_app'])) { ?><?= $content['education_prg_data'][0]['field_program_ed_college_app'] . '%';} ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Foster Care</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Do you provide Foster care services for children?:
                                    </td>
                                    <td><span> <?php if ($content['education_prg_data'][0]['field_program_ed_foster'] == 1 && $content['education_prg_data'][0]['field_program_ed_foster'] != '') {
                                            echo "Yes";
                                        } elseif ($content['education_prg_data'][0]['field_program_ed_foster'] == 0 && $content['education_prg_data'][0]['field_program_ed_foster'] != '') {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">If so, how many placements/recommendations for services
                                        do you make per year?:
                                    </td>
                                    <td><span><?= $content['education_prg_data'][0]['field_program_ed_foster_total']; ?></span></td>
                                </tr>
                                <?php }?>
                                <?php if(count($view_prg_data) > 0){ ?>
                                <tr>
                                    <td class="w-50">Program Area: </td>
                                    <td><span><?= $view_prg_data[0]['programarea']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Purpose of Program: </td>
                                    <td><span><?= $report_data[0]['field_program_purpose'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total Program Budget Funded: </td>
                                    <td><span><?= isset($report_data[0]['field_program_budget'])?"$".number_format($report_data[0]['field_program_budget'],2):$report_data[0]['field_program_budget']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of People Served Annually:
                                    </td>
                                    <td><span><?= $report_data[0]['field_program_served_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Is this program funded by NUL?: </td>
                                    <td><span><?php if($report_data[0]['field_program_nul_funded']==1 && $report_data[0]['field_program_nul_funded']!=''){echo "Yes";}elseif($report_data[0]['field_program_nul_funded']==0 && $report_data[0]['field_program_nul_funded']!=''){ echo "No";} else{ echo $report_data[0]['field_program_nul_funded'];}?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Demographics</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Black/African American: </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_black'])?$report_data[0]['field_program_percent_black']."%":$report_data[0]['field_program_percent_black'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">% White:
                                    </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_white'])?$report_data[0]['field_program_percent_white']."%":$report_data[0]['field_program_percent_white'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Asian American: </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_asian'])?$report_data[0]['field_program_percent_asian']."%":$report_data[0]['field_program_percent_asian'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Native American:
                                    </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_native'])?$report_data[0]['field_program_percent_native']."%":$report_data[0]['field_program_percent_native'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Immigrant Population %: </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_immigrant'])?$report_data[0]['field_program_percent_immigrant']."%":$report_data[0]['field_program_percent_immigrant'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Newcomer Population %:
                                    </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_newcomer'])?$report_data[0]['field_program_percent_newcomer']."%":$report_data[0]['field_program_percent_newcomer'] ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Ethnicity</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Hispanic: </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_hispanic'])?$report_data[0]['field_program_percent_hispanic']."%":$report_data[0]['field_program_percent_hispanic'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Non-Hispanic:
                                    </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_non_hispan'])?$report_data[0]['field_program_percent_non_hispan']."%":$report_data[0]['field_program_percent_non_hispan'] ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Gender</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Male: </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_male'])?$report_data[0]['field_program_percent_male']."%":$report_data[0]['field_program_percent_male'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Female:
                                    </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_female'])?$report_data[0]['field_program_percent_female']."%":$report_data[0]['field_program_percent_female'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Program Type: </td>
                                    <td><span><?= isset($report_data[0]['program_type_name'])?$report_data[0]['program_type_name']:$report_data[0]['program_type_name'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Program Length Type:
                                    </td>
                                    <td><span><?php if($report_data[0]['field_program_duration_type']=='D') echo "Days";elseif($report_data[0]['field_program_duration_type']=='W') echo "Weeks";elseif($report_data[0]['field_program_duration_type']=='S') echo "Summer";elseif($report_data[0]['field_program_duration_type']=='Y') echo "Year-round";else echo "N/A"; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Program Length Amount:
                                    </td>
                                    <td><span><?= $report_data[0]['field_program_duration_amount'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Target age range:
                                    </td>
                                    <td><span><?= $report_data[0]['field_program_target_age'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Target Group(s) Served: </td>
                                    <td><span><?php
                                        $i=0; 
                                        if(count($tgs) > 0 ) {
                                            foreach($tgs as $tg){
                                                if($i==count($tgs)-1) $sep = ''; else $sep = ', ';
                                                if(isset($tg['name'])) echo $tg['name'].''.$sep;
                                                $i++;
                                            } 
                                        } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">legacy program id:
                                    </td>
                                    <td><span><?= $report_data[0]['field_legacy_program_id'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">legacy target group:
                                    </td>
                                    <td><span><?= $report_data[0]['field_legacy_target_group'] ?></span></td>
                                </tr>
                                <?php } ?>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr></tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <br>
                                                        <div class="h3 Subtittle">
                                                            Entrepreneurship and Business Development Program Details
                                                            Programs
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center w-300px h5 fw-bold">Program Title </td>
                                                    <td class="text-center w-300px h5 fw-bold">Number of People Served Annually
                                                    </td>
                                                    <td class="text-center w-300px h5 fw-bold">Total Program Budget Funded </td>
                                                </tr>
                                                <?php
                                                    foreach ($entreprenuer_programs as $epro) {
                                                        $entreprenuer_report_id = $epro['field_parent_census'];
                                                        $pk_id = $epro['pk_id'];
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><a class="text-primary" href="<?php echo base_url("module/census_report/$entreprenuer_report_id/$pk_id/viewprogram"); ?>"><?= $epro['title']; ?></a></td>
                                                            <td class="text-center"><span><?= $epro['field_program_served_total']; ?> </span> </td>
                                                            <td class="text-center"><span>$<?= number_format($epro['field_program_budget'], 2); ?></span> </td>
                                                        </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                
                                <?php if($content['entrepreneurship_data'] != []) { ?>
                                <tr>
                                    <td class="w-50">Our Affiliate offers programs of this type:
                                    </td>
                                    <td><span><?php if ($content['entrepreneurship_data'][0]['field_do_you_offer_programs_of_t'] == 1) {
                                            echo "Yes";
                                        } else {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Person Who Oversees
                                                Entrepreneurship Programs</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Name:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_entpr_overseer_name']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Email:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_ed_overseer_email']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total Participants in Entrepreneurship Programs:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_program_entpr_total_partic']; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>How many staff are engaged
                                                in these entrepreneurship activities?</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Affiliate:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_program_entpr_staff_aff']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Entrepreneurship:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_program_entpr_staff_entpr']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Other (i.e. consultants):
                                    </td>
                                    <td><span> <?= $content['entrepreneurship_data'][0]['field_program_entpr_staff_other']; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Program Impacts</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of new businesses created:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_program_entpr_new']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of new jobs created (from new or expanded
                                        existing businesses)
                                    </td>
                                    <td><span></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Full Time:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_program_entpr_jobs_ft']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Part time:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_program_entpr_jobs_pt']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of certifications obtained (i.e. MBE, WMBE,
                                        etc.):
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_program_entpr_certs']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Dollar amount of new financing or contracts acquired by
                                        new:
                                    </td>
                                    <td><span><?php if (isset($content['entrepreneurship_data'][0]['field_program_entpr_new_dollars'])) { ?> $<?= number_format($content['entrepreneurship_data'][0]['field_program_entpr_new_dollars'], 2); ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total sales of businesses started by participants in
                                        entrepreneurship programs (i.e. Small Business Matters):
                                    </td>
                                    <td><span><?php if (isset($content['entrepreneurship_data'][0]['field_program_entpr_sales'])) { ?> $<?= $content['entrepreneurship_data'][0]['field_program_entpr_sales']; ?> <?php } ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Business Stage</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">0-2 years:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_program_entpr_stage_0_2']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">3-5 years:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_program_entpr_stage_3_5']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">5-10 years:
                                    </td>
                                    <td><span><?= $content['entrepreneurship_data'][0]['field_program_entpr_stage_5_10']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Value of sales for all businesses:
                                    </td>
                                    <td><span><?php if (isset($content['entrepreneurship_data'][0]['field_program_entpr_total_sales'])) { ?> $<?= $content['entrepreneurship_data'][0]['field_program_entpr_total_sales'];
																																					} ?></span></td>
                                </tr>
                                <tr></tr>
                                <?php } 
                                if($content['health_prg_data'] != []) {
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <div class="h3 Subtittle">
                                            Health and Quality of Life Program Details
                                            Programs
                                        </div>
                                    </td>
                                </tr><?php } ?>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <tbody>
                                <?php if($content['health_prg_data'] != []) { ?>
                                <tr>
                                    <td class="w-50">Our Affiliate offers programs of this type: </td>
                                    <td><span><?php if ($content['health_prg_data'][0]['field_do_you_offer_programs_of_t'] == 1) {
                                        echo "Yes";
                                    } else {
                                        echo "No";
                                    }; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Person Who Oversees Health
                                                Programs</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Name:
                                    </td>
                                    <td><span><?= $content['health_prg_data'][0]['field_health_overseer_name']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Email:
                                    </td>
                                    <td><span><?= $content['health_prg_data'][0]['field_health_overseer_email']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total Participants in Health Programs: </td>
                                    <td><span><?= $content['health_prg_data'][0]['field_program_health_total_parti']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Does your current staffing include Community Health
                                        Workers?:
                                    </td>
                                    <td><span><?php if ($content['health_prg_data'][0]['field_program_health_chw'] == 1 && $content['health_prg_data'][0]['field_program_health_chw'] != '') {
                                    echo "Yes";
                                  } else if ($content['health_prg_data'][0]['field_program_health_chw'] == 0 && $content['health_prg_data'][0]['field_program_health_chw'] != '') {
                                    echo "No";
                                  }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Do you provide any Health advocacy in your community?:
                                    </td>
                                    <td><span><?php if ($content['health_prg_data'][0]['field_program_health_advocacy'] == 1 && $content['health_prg_data'][0]['field_program_health_advocacy'] != '') {
                                    echo "Yes";
                                  } else if ($content['health_prg_data'][0]['field_program_health_advocacy'] == 0 && $content['health_prg_data'][0]['field_program_health_advocacy'] != '') {
                                    echo "No";
                                  }; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><br>
                                        <div class="h5 Subtittle text-primary"><b>Program Impacts</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Average number of participants at Education
                                        Classes/Events/Seminars:
                                    </td>
                                    <td><span><?= $content['health_prg_data'][0]['field_program_health_participant']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of individuals enrolled in health insurance by
                                        Community Health Worker or Navigator:
                                    </td>
                                    <td><span><?= $content['health_prg_data'][0]['field_program_health_enrolled']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of individuals assisted with using their health insurance by Community Health Worker or Navigator:
                                    </td>
                                    <td><span><?= $content['health_prg_data'][0]['field_program_health_assisted']; ?></span></td>
                                </tr>
                                <?php } 
                                if($content['housing_prg_data'] != []) { 
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <div class="h3 Subtittle">
                                            Housing and Community Development
                                            Programs
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <tbody>
                                <?php if($content['housing_prg_data'] != []) { ?>
                                <tr>
                                    <td class="w-50">Our Affiliate offers programs of this type:
                                    </td>
                                    <td><span><?php if ($content['housing_prg_data'][0]['field_do_you_offer_programs_of_t'] == 1) {
                                            echo "Yes";
                                        } else {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Person Who Oversees
                                                Housing Programs</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Name:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_housing_overseer_name']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Email:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_housing_overseer_email']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total Participants in Housing Programs:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_total_part']; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Program Impacts</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of clients that decreased debt, increased
                                        savings, and/or increased credit score:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_improved']; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Home Purchased</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many participants attended or inquired about home
                                        ownership programs?:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_attended']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of program participants who purchased a home:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_purchased']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Average price of homes purchased:
                                    </td>
                                    <td><span><?php isset($content['housing_prg_data'][0]['field_program_housing_avg_price']) ? print_r("$" . number_format($content['housing_prg_data'][0]['field_program_housing_avg_price'], 2)) : print_r(''); ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Fixed rate, or adjustable
                                                rate mortgage</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Percent of fixed rate mortgages:
                                    </td>
                                    <td><span><?php isset($content['housing_prg_data'][0]['field_program_housing_fixed']) ? print_r(number_format($content['housing_prg_data'][0]['field_program_housing_fixed'], 2) . "%") : print_r(''); ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Percent of adjustable rate mortgages:
                                    </td>
                                    <td><span><?php isset($content['housing_prg_data'][0]['field_program_housing_adjustable']) ? print_r(number_format($content['housing_prg_data'][0]['field_program_housing_adjustable'], 2) . "%") : print_r(''); ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Foreclosure Assistance</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td class="w-50">Number of foreclosures prevented:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_not4closed']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many months behind?:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_month_late']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many people were turned to alternative housing
                                        after losing their house?:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_alternate']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many people needing assistance have children under
                                        the age of 18 years of age?:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_have_kids']; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Community Development</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of housing and community development projects in
                                        the last year:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_projects']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Dollar value of these community development projects:
                                    </td>
                                    <td><span><?php isset($content['housing_prg_data'][0]['field_program_housing_value']) ? print_r("$" . $content['housing_prg_data'][0]['field_program_housing_value']) : print_r(''); ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of units of affordable housing your affiliate
                                        has developed:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_affordable']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of community facilities your affiliate has
                                        purchased and/or developed:
                                    </td>
                                    <td><span><?= $content['housing_prg_data'][0]['field_program_housing_facilities']; ?></span></td>
                                </tr>
                                <tr></tr>
                                <?php } 
                                if($content['workforce_data'] != []) { 
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <div class="h3 Subtittle">
                                            Workforce Development Program Details
                                            Programs
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center w-300px h5 fw-bold">Program Title </td>
                                                    <td class="text-center w-300px h5 fw-bold">Number of People Served Annually
                                                    </td>
                                                    <td class="text-center w-300px h5 fw-bold">Total Program Budget Funded </td>
                                                </tr>
                                                <?php
                                                    foreach ($workforce_programs as $wpro) {
                                                        $workforce_report_id = $wpro['field_parent_census'];
                                                        $pk_id = $wpro['pk_id'];
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><a class="text-primary" href="<?php echo base_url("module/census_report/$workforce_report_id/$pk_id/viewprogram"); ?>"><?= $wpro['title']; ?></a></td>
                                                            <td class="text-center"><span><?= $wpro['field_program_served_total']; ?> </span> </td>
                                                            <td class="text-center"><span>$<?= number_format($wpro['field_program_budget'], 2); ?></span> </td>
                                                        </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <tbody>
                                <?php if($content['workforce_data'] != []) { ?>
                                <tr>
                                    <td class="w-50">Our Affiliate offers programs of this type:
                                    </td>
                                    <td><span><?php if ($content['workforce_data'][0]['field_do_you_offer_programs_of_t'] == 1 && $content['workforce_data'][0]['field_do_you_offer_programs_of_t'] != '') {
																	echo "Yes";
																} else {
																	echo "No";
																}; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Person Who Oversees
                                                Workforce Programs</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Name:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_work_overseer_name']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Email:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_work_overseer_email']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total Participants in Workforce Programs:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_program_work_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Program Impacts</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of clients who received workforce
                                        development/job placement counseling from your affiliate last year?:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_program_work_counseling']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of participants in employment/workforce
                                        development programs (exclude welfare recipients)?:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_program_work_participants']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of participants placed in jobs:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_program_work_placed']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of placed participants who retained jobs for 90
                                        days:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_program_work_retained']; ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Income of participants
                                                placed in jobs</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Annual salary (if applicable):
                                    </td>
                                    <td><span><?php if (!empty($content['workforce_data'][0]['field_program_work_salary'])) { ?>$<?= number_format($content['workforce_data'][0]['field_program_work_salary'], 2);
																																			} ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">or Hourly wage rate:
                                    </td>
                                    <td><span><?php if (!empty($content['workforce_data'][0]['field_program_work_hourly'])) { ?>$<?= $content['workforce_data'][0]['field_program_work_hourly'];
																																			} ?></span></td>
                                </tr>

                                <tr>
                                    <td class="w-50">Number of welfare participants in federal/state funded
                                        programs:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_program_work_welfare']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of welfare program participants placed in jobs:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_program_work_welfare_place']; ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Income of welfare
                                                recipient placed in jobs</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Annual welfare salary (if applicable):
                                    </td>
                                    <td><span><?php if (!empty($content['workforce_data'][0]['field_program_work_welfare_salar'])) { ?>$<?= $content['workforce_data'][0]['field_program_work_welfare_salar'];
																																					} ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">or Hourly wage rate (welfare):
                                    </td>
                                    <td><span><?php isset($content['workforce_data'][0]['field_program_work_welfare_hour']) ? print_r("$" . number_format($content['workforce_data'][0]['field_program_work_welfare_hour'], 2)) : print_r(''); ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total for number of participants in
                                        employment/workforce development programs and number of welfare
                                        participants in federal/stat:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_program_work_total_partici']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of participants obtaining industry-recognized
                                        credentials:
                                    </td>
                                    <td><span><?= $content['workforce_data'][0]['field_program_work_credentials']; ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>WIA/WIOA Services</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Is affiliate engaged in WIA/WIOA services delivery?:
                                    </td>
                                    <td><span><?php if ($content['workforce_data'][0]['field_program_work_wia'] == 1 && $content['workforce_data'][0]['field_program_work_wia'] != '') {
																	echo "Yes";
																} else if ($content['workforce_data'][0]['field_program_work_wia'] == 0 && $content['workforce_data'][0]['field_program_work_wia'] != '') {
																	echo "No";
																}; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Contracted WIA/WIOA service deliverer:
                                    </td>
                                    <td><span><?php if ($content['workforce_data'][0]['field_program_work_wia_deliverer'] == 1 && $content['workforce_data'][0]['field_program_work_wia_deliverer'] != '') {
																	echo "Yes";
																} else if ($content['workforce_data'][0]['field_program_work_wia_deliverer'] == 0 && $content['workforce_data'][0]['field_program_work_wia_deliverer'] != '') {
																	echo "No";
																}; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Eiligible WIA/WIOA training provider:
                                    </td>
                                    <td><span><?php if ($content['workforce_data'][0]['field_program_work_wia_provider'] == 1 && $content['workforce_data'][0]['field_program_work_wia_provider'] != '') {
																	echo "Yes";
																} else if ($content['workforce_data'][0]['field_program_work_wia_provider'] == 0 && $content['workforce_data'][0]['field_program_work_wia_provider'] != '') {
																	echo "No";
																}; ?></span></td>
                                </tr>
                                <?php } if(count($view_prg_data) > 0){ ?>
                                <tr>
                                    <td class="w-50">Program Area:
                                    </td>
                                    <td><span>Workforce Development </span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Purpose of Program: </td>
                                    <td><span><?= $report_data[0]['field_program_purpose'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total Program Budget Funded: </td>
                                    <td><span><?= isset($report_data[0]['field_program_budget'])?"$".number_format($report_data[0]['field_program_budget'],2):$report_data[0]['field_program_budget']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Number of People Served Annually:
                                    </td>
                                    <td><span><?= $report_data[0]['field_program_served_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Is this program funded by NUL?: </td>
                                    <td><span><?php if($report_data[0]['field_program_nul_funded']==1 && $report_data[0]['field_program_nul_funded']!=''){echo "Yes";}elseif($report_data[0]['field_program_nul_funded']==0 && $report_data[0]['field_program_nul_funded']!=''){ echo "No";} else{ echo $report_data[0]['field_program_nul_funded'];}?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Demographics</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Black/African American: </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_black'])?$report_data[0]['field_program_percent_black']."%":$report_data[0]['field_program_percent_black'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">% White:
                                    </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_white'])?$report_data[0]['field_program_percent_white']."%":$report_data[0]['field_program_percent_white'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Asian American: </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_asian'])?$report_data[0]['field_program_percent_asian']."%":$report_data[0]['field_program_percent_asian'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Native American:
                                    </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_native'])?$report_data[0]['field_program_percent_native']."%":$report_data[0]['field_program_percent_native'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Immigrant Population %: </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_immigrant'])?$report_data[0]['field_program_percent_immigrant']."%":$report_data[0]['field_program_percent_immigrant'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Newcomer Population %:
                                    </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_newcomer'])?$report_data[0]['field_program_percent_newcomer']."%":$report_data[0]['field_program_percent_newcomer'] ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Ethnicity</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Hispanic: </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_hispanic'])?$report_data[0]['field_program_percent_hispanic']."%":$report_data[0]['field_program_percent_hispanic'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Non-Hispanic:
                                    </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_non_hispan'])?$report_data[0]['field_program_percent_non_hispan']."%":$report_data[0]['field_program_percent_non_hispan'] ?></span></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Gender</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Male: </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_male'])?$report_data[0]['field_program_percent_male']."%":$report_data[0]['field_program_percent_male'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">% Female:
                                    </td>
                                    <td><span><?= isset($report_data[0]['field_program_percent_female'])?$report_data[0]['field_program_percent_female']."%":$report_data[0]['field_program_percent_female'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Program Type: </td>
                                    <td><span><?= isset($report_data[0]['program_type_name'])?$report_data[0]['program_type_name']:$report_data[0]['program_type_name'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Program Length Type:
                                    </td>
                                    <td><span><?php if($report_data[0]['field_program_duration_type']=='D') echo "Days";elseif($report_data[0]['field_program_duration_type']=='W') echo "Weeks";elseif($report_data[0]['field_program_duration_type']=='S') echo "Summer";elseif($report_data[0]['field_program_duration_type']=='Y') echo "Year-round";else echo "N/A"; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Program Length Amount:
                                    </td>
                                    <td><span><?= $report_data[0]['field_program_duration_amount'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Target age range:
                                    </td>
                                    <td><span><?= $report_data[0]['field_program_target_age'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Target Group(s) Served: </td>
                                    <td><span><?php
                                        $i=0; 
                                        if(count($tgs) > 0 ) {
                                            foreach($tgs as $tg){
                                                if($i==count($tgs)-1) $sep = ''; else $sep = ', ';
                                                if(isset($tg['name'])) echo $tg['name'].''.$sep;
                                                $i++;
                                            } 
                                        } ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">legacy program id:
                                    </td>
                                    <td><span><?= $report_data[0]['field_legacy_program_id'] ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">legacy target group:
                                    </td>
                                    <td><span><?= $report_data[0]['field_legacy_target_group'] ?></span></td>
                                </tr>
                                <tr></tr>
                                <?php } 
                                if($content['other_prg_data'] != []) { 
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <div class="h3 Subtittle">
                                            Other Programs
                                            Programs
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <tbody>
                                <?php if($content['other_prg_data'] != []) { ?>
                                <tr>
                                    <td class="w-50">Our Affiliate offers programs of this type:
                                    </td>
                                    <td><span><?php if ($content['other_prg_data'][0]['field_do_you_offer_programs_of_t'] == 1) {
                                                      echo "Yes";
                                                   } else {
                                                      echo "No";
                                                   }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total Participants in Other Programs:
                                    </td>
                                    <td><span><?= $content['other_prg_data'][0]['field_program_other_total_partic']; ?></span></td>
                                </tr>
                                <tr></tr>
                                <?php }
                                if($content['civic_data'] != []) { 
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <div class="h3 Subtittle">
                                            Civic Engagement
                                        </div>
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Civic Engagement</b>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <thead>
                                <tr>
                                    <th colspan="2" class="h5 fw-bold">Voter Registration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-50">Did your affiliate assist in voter registration?:
                                    </td>
                                    <td><span><?php if ($content['civic_data'][0]['field_voter_registration'] == 1) {
                                            echo "Yes";
                                        } elseif ($content['civic_data'][0]['field_voter_registration'] == 0 && $content['civic_data'][0]['field_voter_registration'] != '') {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Did your affiliate provide assistance in getting voters
                                        to the polls? :
                                    </td>
                                    <td><span><?php if ($content['civic_data'][0]['field_did_your_affiliate_provide'] == 1 && $content['civic_data'][0]['field_did_your_affiliate_provide'] != '') {
                                            echo "Yes";
                                        } else if ($content['civic_data'][0]['field_did_your_affiliate_provide'] == 0 && $content['civic_data'][0]['field_did_your_affiliate_provide'] != '') {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total Served:
                                    </td>
                                    <td><span><?= $content['civic_data'][0]['field_voter_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Please Describe:
                                    </td>
                                    <td><span><?= $content['civic_data'][0]['field_please_describe_vt']; ?></span></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="text-center w-300px h5 fw-bold">Race</td>
                                    <td class="text-center h5 fw-bold">Male</td>
                                    <td class="text-center h5 fw-bold">Female</td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">White </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_white_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_white_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Hispanic/Latino </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_hispanic_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_hispanic_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Asian American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_asian_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_asian_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Native American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_native_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_native_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">African American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_african_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_african_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Other </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_other_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_other_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Total</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_voter_societal_impact']; ?></span></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <thead>
                                <tr>
                                    <th colspan="2" class="h5 fw-bold">Community Forums</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-50">Did your affiliate hold Community Forums?:
                                    </td>
                                    <td><span><?php if ($content['civic_data'][0]['field_community_forums'] == 1) {
                                            echo "Yes";
                                        } elseif ($content['civic_data'][0]['field_community_forums'] == 0 && $content['civic_data'][0]['field_community_forums'] != '') {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Community Forums Total Served:
                                    </td>
                                    <td><span><?= $content['civic_data'][0]['field_forums_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Please describe:
                                    </td>
                                    <td><span><?= $content['civic_data'][0]['field_forums_description']; ?></span></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="text-center w-300px h5 fw-bold">Race</td>
                                    <td class="text-center h5 fw-bold">Male</td>
                                    <td class="text-center h5 fw-bold">Female</td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">White </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_white_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_white_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Hispanic/Latino </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_hispanic_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_hispanic_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Asian American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_asian_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_asian_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Native American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_native_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_native_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">African American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_african_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_african_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Other </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_other_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_other_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Total</td>
                                    <td class="text-center"><span></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_forums_societal_impact']; ?></span></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <thead>
                                <tr>
                                    <th colspan="2" class="h5 fw-bold">Civil Rights and Racial Justice
                                        Activities</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-50">Did your affiliate engage in Civil Rights and Justice
                                        Activities?:
                                    </td>
                                    <td><span><?php if ($content['civic_data'][0]['field_crja'] == 1 && $content['civic_data'][0]['field_crja'] != '') {
                                            echo "Yes";
                                        } elseif ($content['civic_data'][0]['field_crja'] == 0 && $content['civic_data'][0]['field_crja'] != '') {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Racial Justice Total Served:
                                    </td>
                                    <td><span><?= $content['civic_data'][0]['field_crja_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Please Describe :
                                    </td>
                                    <td><span><?= $content['civic_data'][0]['field_please_describe_crja']; ?></span></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="text-center w-300px h5 fw-bold">Race</td>
                                    <td class="text-center h5 fw-bold">Male</td>
                                    <td class="text-center h5 fw-bold">Female</td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">White </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_white_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_white_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Hispanic/Latino </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_hispanic_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_hispanic_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Asian American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_asian_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_asian_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Native American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_native_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_native_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">African American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_african_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_african_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Other </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_other_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_other_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Total</td>
                                    <td class="text-center"><span></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_crja_societal_impact']; ?></span></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <thead>
                                <tr>
                                    <th colspan="2" class="h5 fw-bold">Police Brutality</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-50">Did your affiliate participate in activism related to
                                        Police Brutality?:
                                    </td>
                                    <td><span><?php if ($content['civic_data'][0]['field_police_brutality'] == 1) {
																	echo "Yes";
                                        } elseif ($content['civic_data'][0]['field_police_brutality'] == 0 && $content['civic_data'][0]['field_police_brutality'] != '') {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Police Brutality Total Served:
                                    </td>
                                    <td><span><?= $content['civic_data'][0]['field_police_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Please Describe :
                                    </td>
                                    <td><span><?= $content['civic_data'][0]['field_please_describe_pb']; ?></span></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="text-center w-300px h5 fw-bold">Race</td>
                                    <td class="text-center h5 fw-bold">Male</td>
                                    <td class="text-center h5 fw-bold">Female</td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">White </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_white_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_white_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Hispanic/Latino </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_hispanic_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_hispanic_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Asian American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_asian_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_asian_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Native American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_native_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_native_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">African American </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_african_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_african_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Other </td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_other_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_other_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Total</td>
                                    <td class="text-center"><span></span></td>
                                    <td class="text-center"><span><?= $content['civic_data'][0]['field_police_societal_impact']; ?></span></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <thead>
                                <tr>
                                    <th colspan="2" class="h5 fw-bold">Advocacy Efforts</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-50">Does the affiliate assist in Advocacy Efforts?:
                                    </td>
                                    <td><span><?php if ($content['civic_data'][0]['field_advocacy_efforts'] == 1) {
                                            echo "Yes";
                                        } elseif ($content['civic_data'][0]['field_advocacy_efforts'] == 0 && $content['civic_data'][0]['field_advocacy_efforts'] != '') {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Advocacy Total Served:
                                    </td>
                                    <td><span><?= $content['civic_data'][0]['field_advocacy_total']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Please Describe:
                                    </td>
                                    <td><span><?= $content['civic_data'][0]['field_advoacy_research']; ?></span>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="text-center w-300px h5 fw-bold">Race</td>
                                    <td class="text-center h5 fw-bold">Male</td>
                                    <td class="text-center h5 fw-bold">Female</td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">White </td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_white_male']; ?></span></td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_white_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Hispanic/Latino </td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_hispanic_male']; ?></span></td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_hispanic_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Asian American </td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_asian_am_male']; ?></span></td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_asian_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Native American </td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_native_am_male']; ?></span></td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_native_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">African American </td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_african_am_male']; ?></span></td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_african_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Other </td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_other_male']; ?></span></td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_other_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Total</td>
                                    <td class="text-center"><span></span></td>
									<td class="text-center"><span><?= $content['civic_data'][0]['field_advocacy_societal_impact']; ?></span></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <table class="table table-striped">
                            <?php if($content['civic_data'] != []) { ?>
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td colspan="">
                                        Research (Please Describe):
                                    </td>
                                    <td>&nbsp;<?= $content['civic_data'][0]['field_advocacy_description']; ?></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <?php if($content['emergency_data'] != []) { ?>
                        <table class="table table-striped">
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <div class="h3 Subtittle">
                                            Emergency Relief Activities
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="6">
                                        ERA Table
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="text-center h5 fw-bold">Program Type</td>
                                    <td class="text-center h5 fw-bold">Describe the Program(s)</td>
                                    <td class="text-center h5 fw-bold">Funding Source: NUL</td>
                                    <td class="text-center h5 fw-bold">Funding Source: Other</td>
                                    <td class="text-center h5 fw-bold">Funding Source: U Way</td>
                                    <td class="text-center h5 fw-bold">Number Served</td>
                                </tr>
                                <tr>
                                    <td class="text-center h5 fw-bold">Education</td>
                                    <td class="text-center"><span> <?= $content['emergency_data'][0]['field_relief_ed_desc']; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_ed_fund_nul = $content['emergency_data'][0]['field_relief_ed_fund_nul'];
                                                if ($field_relief_ed_fund_nul == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_ed_fund_nul == 0 && $field_relief_ed_fund_nul != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                } ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_ed_fund_other = $content['emergency_data'][0]['field_relief_ed_fund_other'];
                                                if ($field_relief_ed_fund_other == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_ed_fund_other == 0 && $field_relief_ed_fund_other != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_ed_fund_uway = $content['emergency_data'][0]['field_relief_ed_fund_uway'];
                                                if ($field_relief_ed_fund_uway == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_ed_fund_uway == 0 && $field_relief_ed_fund_uway != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?= $field_relief_ed_served = $content['emergency_data'][0]['field_relief_ed_served']; ?> </span></td>
                                </tr>
                                <tr>
                                    <td class="text-center h5 fw-bold">Employment Empowerment</td>
                                    <td class="text-center"><span> <?= $content['emergency_data'][0]['field_relief_employ_desc']; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_employ_fund_nul = $content['emergency_data'][0]['field_relief_employ_fund_nul'];
                                                if ($field_relief_employ_fund_nul == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_employ_fund_nul == 0 && $field_relief_employ_fund_nul != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_employ_fund_uway = $content['emergency_data'][0]['field_relief_employ_fund_uway'];
                                                if ($field_relief_employ_fund_uway == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_employ_fund_uway == 0 && $field_relief_employ_fund_uway != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_employ_fund_other = $content['emergency_data'][0]['field_relief_employ_fund_other'];
                                                if ($field_relief_employ_fund_other == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_employ_fund_other == 0 && $field_relief_employ_fund_other != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?= $field_relief_employ_served = $content['emergency_data'][0]['field_relief_employ_served']; ?> </span></td>
                                </tr>
                                <tr>
                                    <td class="text-center h5 fw-bold">Health</td>
                                    <td class="text-center"><span> <?= $content['emergency_data'][0]['field_relief_health_desc']; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_health_fund_nul = $content['emergency_data'][0]['field_relief_health_fund_nul'];
                                                if ($field_relief_health_fund_nul == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_health_fund_nul == 0 && $field_relief_health_fund_nul != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_health_fund_other = $content['emergency_data'][0]['field_relief_health_fund_other'];
                                                if ($field_relief_health_fund_other == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_health_fund_other == 0 && $field_relief_health_fund_other != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_health_fund_uway = $content['emergency_data'][0]['field_relief_health_fund_uway'];
                                                if ($field_relief_health_fund_uway == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_health_fund_uway == 0 && $field_relief_health_fund_uway != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?= $field_relief_health_served = $content['emergency_data'][0]['field_relief_health_served']; ?> </span></td>
                                </tr>
                                <tr>
                                    <td class="text-center h5 fw-bold">Civic Engagement</td>
                                    <td class="text-center"><span> <?= $content['emergency_data'][0]['field_relief_civic_desc']; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_civic_fund_nul = $content['emergency_data'][0]['field_relief_civic_fund_nul'];
                                                if ($field_relief_civic_fund_nul == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_civic_fund_nul == 0 && $field_relief_civic_fund_nul != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_civic_fund_other = $content['emergency_data'][0]['field_relief_civic_fund_other'];
                                                if ($field_relief_civic_fund_other == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_civic_fund_other == 0 && $field_relief_civic_fund_other != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_civic_fund_uway = $content['emergency_data'][0]['field_relief_civic_fund_uway'];
                                                if ($field_relief_civic_fund_uway == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_civic_fund_uway == 0 && $field_relief_civic_fund_uway != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?= $field_relief_civic_served = $content['emergency_data'][0]['field_relief_civic_served']; ?> </span></td>
                                </tr>
                                <tr>
                                    <td class="text-center h5 fw-bold">Racial Justice</td>
                                    <td class="text-center"><span> <?= $content['emergency_data'][0]['field_relief_justice_desc']; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_justice_fund_nul = $content['emergency_data'][0]['field_relief_justice_fund_nul'];
                                                if ($field_relief_justice_fund_nul == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_justice_fund_nul == 0 && $field_relief_justice_fund_nul != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_justice_fund_uway = $content['emergency_data'][0]['field_relief_justice_fund_uway'];
                                                if ($field_relief_justice_fund_uway == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_justice_fund_uway == 0 && $field_relief_justice_fund_uway != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?php $field_relief_justice_fund_other = $content['emergency_data'][0]['field_relief_justice_fund_other'];
                                                if ($field_relief_justice_fund_other == 1) {
                                                    echo "Yes";
                                                } elseif ($field_relief_justice_fund_other == 0 && $field_relief_justice_fund_other != '') {
                                                    echo "No";
                                                } else {
                                                    echo "";
                                                }; ?> </span></td>
                                    <td class="text-center"><span> <?= $content['emergency_data'][0]['field_relief_justice_served']; ?> </span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="w-50">Are there any other activities the affiliate is engaged
                                        in that are not reflected above? If so, please describe below:
                                        <?= $content['emergency_data'][0]['field_relief_other_activities']; ?>
                                    </td>
                                    <td><span></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Total Served:
                                    </td>
                                    <td><span><?= $content['emergency_data'][0]['field_relief_total_served']; ?></span></td>
                                </tr>
                                <?php if ($this->session->role_id != 1) { ?>
                                <tr>
                                    <td class="w-50">If yes, when did you receive PPP Funding Cycle 1
                                        funds?:
                                    </td>
                                    <td><span><?= $content['emergency_data'][0]['emer_first_question']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Did your affiliate apply for a PPP Funding Cycle 2
                                        loan? :
                                    </td>
                                    <td><span><?php if ($content['emergency_data'][0]['emer_second_question'] == 1) echo 'Yes';
                                        elseif ($content['emergency_data'][0]['emer_second_question'] == 0 && $content['emergency_data'][0]['emer_second_question'] != '') echo 'No';
                                        else echo 'N/A'; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">If yes, how much funding did you receive in PPP Cycle
                                        2?
                                    </td>
                                    <td><span><?= $content['emergency_data'][0]['emer_third_question']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">What percentage of your programs and services were
                                        moved virtual or remote because of COVID-19?:
                                    </td>
                                    <td><span><?php if ($content['emergency_data'][0]['emer_fourth_question'] == -1) echo 'N/A';
                                        elseif ($content['emergency_data'][0]['emer_fourth_question'] == 0) echo 'No';
                                        elseif ($content['emergency_data'][0]['emer_fourth_question'] == 1) echo 'Less than 25%';
                                        elseif ($content['emergency_data'][0]['emer_fourth_question'] == 2) echo 'Less than 26% to 50%';
                                        elseif ($content['emergency_data'][0]['emer_fourth_question'] == 3) echo '51% to 75%';
                                        elseif ($content['emergency_data'][0]['emer_fourth_question'] == 4) echo '76% to 99%';
                                        elseif ($content['emergency_data'][0]['emer_fourth_question'] == 5) echo 'All'; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">How many people did you assist with Covid related
                                        Services:
                                    </td>
                                    <td><span><?= $content['emergency_data'][0]['emer_fifth_question']; ?></span></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } 
                        if($content['contact_data'] != []) { 
                        ?>
                        <table class="table table-striped">
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <div class="h3 Subtittle">
                                            Contact Data (Direct, Indirect & Public)
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="3">
                                        A. Direct Contact (i.e. counseling, day care, intensive education
                                        programs and legal services)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="text-center w-300px h5 fw-bold"></td>
                                    <td class="text-center h5 fw-bold">Male</td>
                                    <td class="text-center h5 fw-bold">Female</td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">White </td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_white_male']; ?></span></td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_white_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Hispanic/Latino </td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_hispanic_male']; ?></span></td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_hispanic_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Asian American </td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_asian_am_male']; ?></span></td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_asian_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Native American </td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_native_am_male']; ?></span></td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_native_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">African American </td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_african_am_male']; ?></span></td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_african_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Other </td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_other_male']; ?></span></td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_other_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Total</td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_total_male']; ?></span></td>
									<td class="text-center"><span><?= $content['contact_data'][0]['field_direct_total_female']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="3">
                                        B. Public Contact (i.e. workshops, presentations and training
                                        sessions)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="text-center w-300px h5 fw-bold"></td>
                                    <td class="text-center h5 fw-bold">Male</td>
                                    <td class="text-center h5 fw-bold">Female</td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">White </td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_white_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_white_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Hispanic/Latino </td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_hispanic_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_hispanic_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Asian American </td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_asian_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_asian_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Native American </td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_native_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_native_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">African American </td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_african_am_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_african_am_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Other </td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_other_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_other_female']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center w-300px">Total </td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_total_male']; ?></span></td>
                                    <td class="text-center"><span><?= $content['contact_data'][0]['field_public_total_female']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="3">
                                        C. Indirect Contact (i.e. telephone hotlines, telephone referral
                                        services and literature distribution)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-50 h5 fw-bold">Number Served</td>
                                    <td><span><?php isset($content['contact_data'][0]['field_indirect_contact_served']) ? print_r(number_format($content['contact_data'][0]['field_indirect_contact_served'])) : print_r(''); ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php } if($content['empowerment_data'] != []) { ?>
                        <table class="table table-striped">
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <div class="h3 Subtittle">
                                            Empowerment
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="w-50">Health:
                                    </td>
                                    <td><span><?= isset($content['empowerment_data'][0]['field_empower_health']) ? $content['empowerment_data'][0]['field_empower_health'] . '%' : ''; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Economic Empowerment:
                                    </td>
                                    <td><span><?= isset($content['empowerment_data'][0]['field_empower_economic']) ? $content['empowerment_data'][0]['field_empower_economic'] . '%' : ''; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Education:
                                    </td>
                                    <td><span><?= isset($content['empowerment_data'][0]['field_empower_education']) ? $content['empowerment_data'][0]['field_empower_education'] . '%' : ''; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Civic Engagement:
                                    </td>
                                    <td><span><?= isset($content['empowerment_data'][0]['field_empower_civic_engagement']) ? $content['empowerment_data'][0]['field_empower_civic_engagement'] . '%' : ''; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Civil Rights:
                                    </td>
                                    <td><span><?= isset($content['empowerment_data'][0]['field_empower_civil_rights']) ? $content['empowerment_data'][0]['field_empower_civil_rights'] . '%' : ''; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Other:
                                    </td>
                                    <td><span><?= isset($content['empowerment_data'][0]['field_empower_other']) ? $content['empowerment_data'][0]['field_empower_other'] . '%' : ''; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50">Other description:

                                    </td>
                                    <td><span><?= $content['empowerment_data'][0]['field_empower_other_description']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php } if($content['volunteer_data'] != []) { ?>
                        <table class="table table-striped">
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="h3 Subtittle">
                                            Volunteers/Members
                                        </div>
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Guild</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Is there a Guild?:
                                    </td>
                                    <td><span><?php if ($content['volunteer_data'][0]['field_is_there_a_guild_'] == 1) {
                                            echo "Yes";
                                        } elseif ($content['volunteer_data'][0]['field_is_there_a_guild_'] == 0 && $content['volunteer_data'][0]['field_is_there_a_guild_'] != '') {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Members in guild:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_guild_members']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Guild Males:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_guild_male']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Guild Females:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_guild_female']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">AGE GROUPINGS: How many members in the following age
                                        groups? </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-50"># of Guild age 16-20:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_guild_16_20']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Guild age 21-30:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_guild_21_30']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Guild age 31-40:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_guild_31_40']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Guild age 41-65:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_guild_41_65']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Guild age 66-81:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_guild_66_81']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Guild age 82 and above:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_guild_82_and_above']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Young Professionals
                                                Chapter</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Is there a Young Professionals Chapter?:
                                    </td>
                                    <td><span><?php if ($content['volunteer_data'][0]['field_is_there_a_ypc'] == 1) {
                                            echo "Yes";
                                        } elseif ($content['volunteer_data'][0]['field_is_there_a_ypc'] == 0 && $content['volunteer_data'][0]['field_is_there_a_ypc'] != '') {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Young Professionals Chapter Members:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_ypc_members']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Young Professionals Chapter Males:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_ypc_male']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Young Professionals Chapter Females:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_ypc_female']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">AGE GROUPINGS: How many members in the following age
                                        groups?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-50"># of Young Professionals Chapter age 16-20:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_ypc_16_20']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Young Professionals Chapter age 21-30:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_ypc_21_30']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Young Professionals Chapter age 31-40:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_ypc_31_40']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Young Professionals Chapter age 41-65:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_ypc_41_65']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Young Professionals Chapter age 66-81:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_ypc_66_81']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Young Professionals Chapter age 82 and above:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_ypc_82_and_above']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <div class="h5 Subtittle text-primary"><b>Volunteer or Auxiliary
                                                Groups</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-50">Are there any other volunteer or member groups?:
                                    </td>
                                    <td><span><?php if ($content['volunteer_data'][0]['field_other_volunteer_aux_groups'] == 1) {
                                            echo "Yes";
                                        } elseif ($content['volunteer_data'][0]['field_other_volunteer_aux_groups'] == 0 && $content['volunteer_data'][0]['field_other_volunteer_aux_groups'] != '') {
                                            echo "No";
                                        }; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Group Members:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_aux_members']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Member Group Males:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_aux_male']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Member Group Females
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_aux_female']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">AGE GROUPINGS: How many members in the following age
                                        groups?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-50"># of Member Group age 16-20:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_aux_16_20']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Member Group age 21-30:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_aux_21_30']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Member Group age 31-40:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_aux_31_40']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Member Group age 41-65:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_aux_41_65']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Member Group age 66-81:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_aux_66_81']; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="w-50"># of Member Group age 82 and above:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_aux_82_and_above']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="w-50">What is the total number of volunteers for your
                                        affiliate?:
                                    </td>
                                    <td><span><?= $content['volunteer_data'][0]['field_volunteer_total']; ?></span></td>
                                </tr>
                                <?php if ($this->session->role_id == 1) { ?>
                                    <tr>
                                        <td class="w-50"># of Young Professionals Chapter Native American: </td>
                                        <td><span><?= $content['volunteer_data'][0]['field_ypc_native_american']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"># of Member Group African American: </td>
                                        <td><span><?= $content['volunteer_data'][0]['field_aux_african_american']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"># of Guild Native American: </td>
                                        <td><span><?= $content['volunteer_data'][0]['field_guild_native_american']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"># of Guild African American: </td>
                                        <td><span><?= $content['volunteer_data'][0]['field_guild_african_american']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"># of Member Group Other Heritage: </td>
                                        <td><span><?= $content['volunteer_data'][0]['field_aux_other_heritage']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"># of Young Professionals Chapter African American: </td>
                                        <td><span><?= $content['volunteer_data'][0]['field_ypc_african_american']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"># of Young Professionals Chapter Other Heritage: </td>
                                        <td><span><?= $content['volunteer_data'][0]['field_ypc_other_heritage']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"># of Guild Other Heritage: </td>
                                        <td><span><?= $content['volunteer_data'][0]['field_guild_other_heritage']; ?></span></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
  </div>
</main>

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