<main>
   <div class="mainWrap">
      <div class="container">
         <div class="row">
         <div class="col-md-24">
               <div class="card formCard">
                  <div class="h3 tittle "><?php echo $tab_title ?></div>
                  <div class="h5 Subtittle text-primary"><b><?php echo $census_report->organization." ". $census_report->field_year?> Census</b></div>

                  
                  


                
                        <?php if($census_report){ ?>
                        <div class="full_form">
                             
                             
                        <!-- <h4>Service Areas</h4><br> -->
                                    
                                    <div class="row g-4 align-items-end">
                                        <div class="col-md-8">
                                        <div class="ceo-photo"><img src="https://data.iamempowered.com/sites/data.iamempowered.com/files/public/styles/medium/public/default_images/avatar.jpg?itok=H5HDUuEL" alt="CEO Image"></div>
                                        </div>
                                        <div class="col-md-16">
                                        <div>   <b> Date Established:</b> <?=  $census_report->field_date_established; ?></div>
                                        <div>    <b> President/CEO : </b> <?=  $census_report->field_president_ceo_first_name; ?> <?=  $census_report->field_president_ceo_middle_name; ?> <?=  $census_report->field_president_ceo_last_name; ?></div>
                                        <div>    <b> Years as CEO: </b> <?=  $census_report->field_number_of_years_as_ceo; ?></div>
                                        <div>   <b> Address :</b>  <?=  $census_report->field_address_line_1; ?> <?=  $census_report->field_address_line_2; ?><br>
                                        <?=  $census_report->field_city; ?><br>
                                        <?=  $census_report->field_state_province; ?><br>
                                        <?=  $census_report->field_zip_code; ?></div>
                                        <div>     <b>Telephone:</b>  <?=  $census_report->field_telephone; ?></div>
                                        <div>    <b> Fax:</b>  <?=  $census_report->field_fax; ?></div>
                                        <div>    <b>  Email Address:</b>  <?=  $census_report->field_email_address; ?></div>
                                        </div>
                                    </div>
                                   <div class="row">
                                        <?php if($census_report){ ?>
                                        <div class="col-md-24">
                                        <p class="p-t-20"><b>Number of Years of Service in Movement:</b> <?=  $census_report->field_number_of_years_of_service; ?></p>
                                        <?php } ?>
                                        <?php if($contact_data){ ?>
                                        <p class="p-t-20 p-b-20"><b>Total Number of People Served:</b> <?=  $contact_data->field_indirect_contact_served +
                                        $contact_data->field_direct_total_female +
                                        $contact_data->field_direct_total_male +
                                        $contact_data->field_public_total_female +
                                        $contact_data->field_public_total_male; ?></p>
                                        <?php } ?>
                                       
                                        <div class="h5 text-primary p-b-10"><b>PROGRAMS</b></div>
                                        <?php if(count($program_edu)>0){ ?>
                                        <div class="h6 p-t-20"><b>EDUCATION AND YOUTH DEVELOPMENT</b></div> 
                                        <br><br>
                                        <div class="tabilCard NulCard ">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <?php foreach($program_edu as $edu){ ?>
                                                        <tr>
                                                            <td class="p-t-25"><?= $edu['title']; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><br>
                                        <?php } ?>
                                        <?php if(count($program_entrepren)>0){ ?>
                                        <div class="h6 p-t-20"><b>ENTREPRENEURSHIP AND BUSINESS DEVELOPMENT</b></div> 
                                        <br><br>
                                        <div class="tabilCard NulCard ">
                                            <div class="table-responsive">
                                            <table class="table table-striped">
                                                    <tbody>
                                                        <?php foreach($program_entrepren as $entrepren){ ?>
                                                        <tr>
                                                            <td class="p-t-25"><?= $entrepren['title']; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><br>
                                        <?php } ?>
                                        <?php if(count($program_workforce)>0){ ?>
                                        <div class="h6 p-t-20"><b>WORKFORCE DEVELOPMENT</b></div> 
                                        <br><br>
                                        <div class="tabilCard NulCard ">
                                            <div class="table-responsive">
                                            <table class="table table-striped">
                                                    <tbody>
                                                        <?php foreach($program_workforce as $workforce){ ?>
                                                        <tr>
                                                            <td class="p-t-25"><?= $workforce['title']; ?></td>
                                                        </tr>
                                                        <?php } ?>                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php if(count($program_health)>0){ ?>
                                        <div class="h6 p-t-20"><b>HEALTH AND QUALITY OF LIFE</b></div> 
                                        <br><br>
                                        <div class="tabilCard NulCard ">
                                            <div class="table-responsive">
                                            <table class="table table-striped">
                                                    <tbody>
                                                        <?php foreach($program_health as $health){ ?>
                                                        <tr>
                                                            <td class="p-t-25"><?= $health['title']; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><br>
                                        <?php } ?>
                                        <?php if(count($program_housing)>0){ ?>
                                        <div class="h6 p-t-20"><b>HOUSING AND COMMUNITY DEVELOPMENT</b></div> 
                                        <br><br>
                                        <div class="tabilCard NulCard ">
                                            <div class="table-responsive">
                                            <table class="table table-striped">
                                                    <tbody>
                                                        <?php foreach($program_housing as $housing){ ?>
                                                        <tr>
                                                            <td class="p-t-25"><?= $housing['title']; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><br>
                                        <?php } ?>
                                        <br>
                                        <?php if($civic_data){ ?>
                                        <div class="row g-4 align-items-end p-b-20">
                        			    <div class="col-md-24">
                                        <div class="h5 text-primary p-b-10"><b>Civic Engagement</b></div>
                                        <div class="h6 p-b-10"><b> Voter Registration:</b> <?= ($civic_data->field_voter_registration == 1) ? "Yes" : (($civic_data->field_voter_registration == 0)  ? "No" : "N/A");  ?></div>
                                        <div class="h6 p-b-10"><b> Community Forums: </b><?= ($civic_data->field_community_forums == 1) ? "Yes" : (($civic_data->field_community_forums == 0)  ? "No" : "N/A"); ?></div>
                                         </div>
                                        </div>
                                        <?php } ?>
                                        
                                        <div class="row g-4 align-items-end p-b-20">
                        			    <div class="col-md-24">
                                        <div class="h5 text-primary p-b-10"><b>Civil Rights</b></div>
                                        <div class="h6 p-b-10"><b>Police Brutality: </b> <?= ($civic_data->field_police_brutality == 1) ? "Yes" : (($civic_data->field_police_brutality == 0)  ? "No" : "N/A");  ?></div>
                                        <div class="h6 p-b-10"><b>Advocacy Efforts: </b><?= ($civic_data->field_advocacy_efforts == 1) ? "Yes" : (($civic_data->field_advocacy_efforts == 0)  ? "No" : "N/A");  ?></div>
                                        <div class="h6 p-b-10"><b>Civil Rights & Justice Activities: </b><?= ($empowerment_data->field_empower_civil_rights == 1) ? "Yes" : (($empowerment_data->field_empower_civil_rights == 0)  ? "No" : "N/A");  ?></div>
                                        </div>
                                        </div>


                                        <div class="row g-4 align-items-end p-b-20">
                        			    <div class="col-md-24">
                                        <div class="h5 text-primary p-b-10"><b>Board Members</b></div>
                                        <div class="h6 p-b-10"><b>Total number of board members: </b><?= $employees_board_data->field_full_time_employees; ?></div>
                                        <div class="h6 p-b-10"><b>Full-time Employees: </b><?= $employees_board_data->field_full_time_employees; ?></div>
                                        <div class="h6 p-b-10"><b>Part-time Employees: </b><?= $employees_board_data->field_part_time_employees; ?></div>
                                         </div>
                                        </div>

                                        <div class="row g-4 align-items-end p-b-20">
                        			    <div class="col-md-24">
                                        <div class="h5 text-primary p-b-10"><b>Volunteers</b></div>
                                        <div class="h6 p-b-10"><b>Urban League Guild Membership: </b> <?= $volunteers_data->field_guild_members; ?></div>
                                        <div class="h6 p-b-10"><b>Urban League Young Professional Membership: </b><?= $volunteers_data->field_ypc_members; ?></div>
                                        <div class="h6 p-b-10"><b>Other Volunteer/Auxiliary Membership: </b><?= $volunteers_data->field_aux_members; ?></div>
                                         </div>
                                        </div>

                                        <div class="row g-4 align-items-end p-b-20">
                        			    <div class="col-md-24">
                                        <div class="h5 text-primary p-b-10"><b>Total Revenue</b></div>
                                        <div class="h6 p-b-10"><b>Total Revenue: </b><?= ($revenue_data->field_revenue_total_budget)?'$'.$revenue_data->field_revenue_total_budget:''; ?></div>
                                        <div class="h6 p-b-10"><b>Corporations: </b><?= ($revenue_data->field_revenue_corporations)?'$'.$revenue_data->field_revenue_corporations:''; ?></div>
                                        <div class="h6 p-b-10"><b>Foundations: </b><?= ($revenue_data->field_revenue_foundations)?'$'.$revenue_data->field_revenue_foundations:''; ?></div>
                                        <div class="h6 p-b-10"><b>Individual Memberships: </b><?= ($revenue_data->field_revenue_individual_members)?'$'.$revenue_data->field_revenue_individual_members:''; ?></div>
                                        <div class="h6 p-b-10"><b>Special Events: </b><?= ($revenue_data->field_revenue_special_events)?'$'.$revenue_data->field_revenue_special_events:''; ?></div>
                                        <div class="h6 p-b-10"><b>United Way: </b><?= ($revenue_data->field_revenue_united_way)?'$'.$revenue_data->field_revenue_united_way:''; ?></div>
                                        <div class="h6 p-b-10"><b>Federal: </b><?= ($revenue_data->field_revenue_federal)?'$'.$revenue_data->field_revenue_federal:''; ?></div>
                                        <div class="h6 p-b-10"><b>State/Local: </b><?= ($revenue_data->field_revenue_state_local)?'$'.$revenue_data->field_revenue_state_local:''; ?></div>
                                        <div class="h6 p-b-10"><b>Other: </b><?= ($revenue_data->field_revenue_other)?'$'.$revenue_data->field_revenue_other:''; ?></div>
                                        <div class="h6 p-b-10"><b>NUL: </b><?= ($revenue_data->field_revenue_nul)?'$'.$revenue_data->field_revenue_nul:''; ?></div>
                                        <div class="h6 p-b-10"><b>Endowment: </b><?= ($revenue_data->field_revenue_has_endowment)?'Yes':'No'; ?></div>
                                        <div class="h6 p-b-10"><b>Endowment: </b><?= ($revenue_data->field_revenue_endowment_amount)?'$'.$revenue_data->field_revenue_endowment_amount:''; ?></div>
                                        <div class="h6 p-b-10"><b>Investment Earnings: </b> <?= ($revenue_data->field_revenue_investment)?'$'.$revenue_data->field_revenue_investment:''; ?></div>
                                        <div class="h6 p-b-10"><b>Affiliate Social Entrepreneurship Ventures and/or Income Generating Activities: </b><?php ?></div>
                                         </div>
                                        </div>

                                        <div class="row g-4 align-items-end p-b-20">
                        			    <div class="col-md-24">
                                        <div class="h5 text-primary p-b-10"><b>Annual Expenditures</b></div>
                                        <div class="h6 p-b-10"><b>Affiliate Expenditures </b> $<?= ($expenditure_data->field_total_expenditures)?'$'.$expenditure_data->field_total_expenditures:''; ?></div>
                                        <div class="h6 p-b-10"><b>A. Salaries/Wages: </b><?= ($expenditure_data->field_a_salaries_wages)?'$'.$expenditure_data->field_a_salaries_wages:''; ?></div>
                                        <div class="h6 p-b-10"><b>B. Fringe Benefits: </b><?= ($expenditure_data->field_b_fringe_benefits)?'$'.$expenditure_data->field_b_fringe_benefits:''; ?></div>
                                        <div class="h6 p-b-10"><b>C. Professional/Contract/Consulting Fees: </b> <?= ($expenditure_data->field_c_professional_fees)?'$'.$expenditure_data->field_c_professional_fees:''; ?></div>
                                        <div class="h6 p-b-10"><b>D. Travel: </b><?= ($expenditure_data->field_d_travel)?'$'.$expenditure_data->field_d_travel:''; ?></div>
                                        <div class="h6 p-b-10"><b>E. Postage/Freight: </b><?= ($expenditure_data->field_e_postage_freight)?'$'.$expenditure_data->field_e_postage_freight:''; ?></div>
                                        <div class="h6 p-b-10"><b>F. Insurance: </b> <?= ($expenditure_data->field_f_insurance)?'$'.$expenditure_data->field_f_insurance:''; ?></div>
                                        <div class="h6 p-b-10"><b>G. Interest Payments: </b><?= ($expenditure_data->field_g_interest_payments)?'$'.$expenditure_data->field_g_interest_payments:''; ?></div>
                                        <div class="h6 p-b-10"><b>H. Dues/Subscription/Registration: </b><?= ($expenditure_data->field_h_dues_subscription_regist)?'$'.$expenditure_data->field_h_dues_subscription_regist:''; ?></div>
                                        <div class="h6 p-b-10"><b>I. Depreciation: </b> <?= ($expenditure_data->field_i_depreciation)?'$'.$expenditure_data->field_i_depreciation:''; ?></div>
                                        <div class="h6 p-b-10"><b>J. Taxes (including property taxes): </b><?= ($expenditure_data->field_j_taxes_including_property)?'$'.$expenditure_data->field_j_taxes_including_property:''; ?></div>
                                        <div class="h6 p-b-10"><b>K. Utilities (telephone, gas, electric): </b><?= ($expenditure_data->field_k_utilities)?'$'.$expenditure_data->field_k_utilities:''; ?></div>
                                        <div class="h6 p-b-10"><b>L. Equipment/space rental: </b> <?= ($expenditure_data->field_l_equipment_space_rental)?'$'.$expenditure_data->field_l_equipment_space_rental:''; ?></div>
                                        <div class="h6 p-b-10"><b>M. Goods and Services: </b><?= ($expenditure_data->field_m_goods_and_services)?'$'.$expenditure_data->field_m_goods_and_services:''; ?></div>
                                        <div class="h6 p-b-10"><b>N. Rent/mortgage payments: </b> <?= ($expenditure_data->field_n_rent_mortgage_payments)?'$'.$expenditure_data->field_n_rent_mortgage_payments:''; ?></div>
                                        <div class="h6 p-b-10"><b>O. Other: </b><?= ($expenditure_data->field_o_other)?'$'.$expenditure_data->field_o_other:''; ?></div>
                                        <div class="h6 p-b-10"><b>Rents Properties: </b>--</div>
                                        <div class="h6 p-b-10"><b>Satellite Offices : </b> --</div>
                                        <div class="h6 p-b-10"><b>Capital Budget: </b><?= ($expenditure_data->field_capital_budget)?'$'.$expenditure_data->field_capital_budget:''; ?></div>
                                        </div>
                                        </div>
                                     

                                        <div class="row g-4 align-items-end p-b-20">
                        			    <div class="col-md-24">
                                        <div class="h5 text-primary p-b-10"><b>Community Relations Activity</b></div>
                                        <div class="h6 p-b-10"><b>Does the affiliate produce an annual report? </b> <?= ($community_data->field_produces_annual_report)?'Yes':'No'; ?></div>
                                        <div class="h6 p-b-10"><b>Does the affiliate produce a monthly/quarterly newsletter?: </b> <?= ($community_data->field_newsletter)?'Yes':'No'; ?></div>
                                        <div class="h6 p-b-10"><b>Does affiliate produce a "State of Black (Affiliate Name)" Report?: </b><?= ($community_data->field_state_of_black_report)?'Yes':'No'; ?></div>
                                        <div class="h6 p-b-10"><b>Does the affiliate maintain a website?: </b> <?= ($community_data->field_maintains_website)?'Yes':'No'; ?></div>
                                        <div class="h6 p-b-10"><b>If so, what is your affiliate's website address?: </b><?= $community_data->field_affiliate_website_address; ?></div>
                                        <div class="h6 p-b-10"><b>Does affiliate have an advertising or marketing campaign?: </b><?= ($community_data->field_has_ad_marketing_campaign)?'Yes':'No'; ?></div>
                                        <div class="h6 p-b-10"><b>Does affiliate do a marketing kit and/or pamphlet?: </b> <?= ($community_data->field_marketing_kit_or_pamphlet)?'Yes':'No'; ?></div>
                                        <div class="h6 p-b-10"><b>Does affiliate produce a radio show?: </b><?= ($community_data->field_produces_a_radio_show)?'Yes':'No'; ?></div>
                                        <div class="h6 p-b-10"><b>Does affiliate produce a regular TV or cable show?: </b><?= ($community_data->field_produces_tv_or_cable_show)?'Yes':'No'; ?></div>
                                        </div>
                                        </div
                                        </div>
                                        </div>
                        <hr>
                        </div>
                        <?php } ?>

               </div>
            </div>
         </div>
      </div>
   </div>
</main>
