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
                                        <p class="p-t-20 p-b-20"><b>Total Number of People Served:</b> <?=  number_format($contact_data->field_indirect_contact_served +
                                        $contact_data->field_direct_total_female +
                                        $contact_data->field_direct_total_male +
                                        $contact_data->field_public_total_female +
                                        $contact_data->field_public_total_male); ?></p>
                                        <?php } ?>


                                        <?php for ($i = 0; $i < count($service_data); $i++) { ?>
                                        <div class="tabilCard inner NulCard">
                                            <div class="contact-table table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                        <td>
                                                            <h4 class="text-primary h5 fw-bold w-50">Service Area </h4>
                                                        </td>
                                                        <td><span></span></td>
                                                        </tr>
                                                        <tr>
                                                        <td class="w-20">City/County </td>
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
                                                        <tr style="visibility:hidden;">
                                                        <td>Tab Status: </td>
                                                        <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                        <?php } ?><br>
                                       
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
                                                            <?php $pk_id = $edu['pk_id'];?>
                                                            <td><a class="p-t-25" href="<?php echo base_url("module/census_report/$census_report->report_id/$pk_id/viewprogram"); ?>"><?= $edu['title']; ?></a></td>
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
                                                            <?php $pk_id = $entrepren['pk_id'];?>
                                                            <td><a class="p-t-25" href="<?php echo base_url("module/census_report/$census_report->report_id/$pk_id/viewprogram"); ?>"><?= $entrepren['title']; ?></a></td>
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
                                                            <?php $pk_id = $workforce['pk_id'];?>
                                                            <td><a class="p-t-25" href="<?php echo base_url("module/census_report/$census_report->report_id/$pk_id/viewprogram"); ?>"><?= $workforce['title']; ?></a></td>
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
                                                            <?php $pk_id = $health['pk_id'];?>
                                                            <td><a class="p-t-25" href="<?php echo base_url("module/census_report/$census_report->report_id/$pk_id/viewprogram"); ?>"><?= $health['title']; ?></a></td>
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
                                                            <?php $pk_id = $housing['pk_id'];?>
                                                            <td><a class="p-t-25" href="<?php echo base_url("module/census_report/$census_report->report_id/$pk_id/viewprogram"); ?>"><?= $housing['title']; ?></a></td>
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
                                        <div class="h6 p-b-10"><b>Total number of board members: </b><?= number_format($employees_board_data->field_full_time_employees); ?></div>
                                        <div class="h6 p-b-10"><b>Full-time Employees: </b><?= number_format($employees_board_data->field_full_time_employees); ?></div>
                                        <div class="h6 p-b-10"><b>Part-time Employees: </b><?= number_format($employees_board_data->field_part_time_employees); ?></div>
                                         </div>
                                        </div>

                                        <div class="row g-4 align-items-end p-b-20">
                        			    <div class="col-md-24">
                                        <div class="h5 text-primary p-b-10"><b>Volunteers</b></div>
                                        <div class="h6 p-b-10"><b>Urban League Guild Membership: </b> <?= number_format($volunteers_data->field_guild_members); ?></div>
                                        <div class="h6 p-b-10"><b>Urban League Young Professional Membership: </b><?= number_format($volunteers_data->field_ypc_members); ?></div>
                                        <div class="h6 p-b-10"><b>Other Volunteer/Auxiliary Membership: </b><?= number_format($volunteers_data->field_aux_members); ?></div>
                                         </div>
                                        </div>

                                        <div class="row g-4 align-items-end p-b-20">
                        			    <div class="col-md-24">
                                        <div class="h5 text-primary p-b-10"><b>Total Revenue</b></div>
                                        <div class="h6 p-b-10"><b>Total Revenue: </b><?= ($revenue_data->field_revenue_total_budget)?'$'.number_format($revenue_data->field_revenue_total_budget,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>Corporations: </b><?= ($revenue_data->field_revenue_corporations)?'$'.number_format($revenue_data->field_revenue_corporations,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>Foundations: </b><?= ($revenue_data->field_revenue_foundations)?'$'.number_format($revenue_data->field_revenue_foundations,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>Individual Memberships: </b><?= ($revenue_data->field_revenue_individual_members)?'$'.number_format($revenue_data->field_revenue_individual_members,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>Special Events: </b><?= ($revenue_data->field_revenue_special_events)?'$'.number_format($revenue_data->field_revenue_special_events,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>United Way: </b><?= ($revenue_data->field_revenue_united_way)?'$'.number_format($revenue_data->field_revenue_united_way,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>Federal: </b><?= ($revenue_data->field_revenue_federal)?'$'.number_format($revenue_data->field_revenue_federal,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>State/Local: </b><?= ($revenue_data->field_revenue_state_local)?'$'.number_format($revenue_data->field_revenue_state_local,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>Other: </b><?= ($revenue_data->field_revenue_other)?'$'.number_format($revenue_data->field_revenue_other,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>NUL: </b><?= ($revenue_data->field_revenue_nul)?'$'.number_format($revenue_data->field_revenue_nul,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>Endowment: </b><?= ($revenue_data->field_revenue_has_endowment)?'Yes':'No'; ?></div>
                                        <div class="h6 p-b-10"><b>Endowment: </b><?= ($revenue_data->field_revenue_endowment_amount)?'$'.number_format($revenue_data->field_revenue_endowment_amount,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>Investment Earnings: </b> <?= ($revenue_data->field_revenue_investment)?'$'.number_format($revenue_data->field_revenue_investment,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>Affiliate Social Entrepreneurship Ventures and/or Income Generating Activities: </b><?php ?></div>
                                         </div>
                                        </div>

                                        <div class="row g-4 align-items-end p-b-20">
                        			    <div class="col-md-24">
                                        <div class="h5 text-primary p-b-10"><b>Annual Expenditures</b></div>
                                        <div class="h6 p-b-10"><b>Affiliate Expenditures </b> $<?= ($expenditure_data->field_total_expenditures)?'$'.number_format($expenditure_data->field_total_expenditures,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>A. Salaries/Wages: </b><?= ($expenditure_data->field_a_salaries_wages)?'$'.number_format($expenditure_data->field_a_salaries_wages,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>B. Fringe Benefits: </b><?= ($expenditure_data->field_b_fringe_benefits)?'$'.number_format($expenditure_data->field_b_fringe_benefits,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>C. Professional/Contract/Consulting Fees: </b> <?= ($expenditure_data->field_c_professional_fees)?'$'.number_format($expenditure_data->field_c_professional_fees,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>D. Travel: </b><?= ($expenditure_data->field_d_travel)?'$'.number_format($expenditure_data->field_d_travel,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>E. Postage/Freight: </b><?= ($expenditure_data->field_e_postage_freight)?'$'.number_format($expenditure_data->field_e_postage_freight,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>F. Insurance: </b> <?= ($expenditure_data->field_f_insurance)?'$'.number_format($expenditure_data->field_f_insurance,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>G. Interest Payments: </b><?= ($expenditure_data->field_g_interest_payments)?'$'.number_format($expenditure_data->field_g_interest_payments,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>H. Dues/Subscription/Registration: </b><?= ($expenditure_data->field_h_dues_subscription_regist)?'$'.number_format($expenditure_data->field_h_dues_subscription_regist,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>I. Depreciation: </b> <?= ($expenditure_data->field_i_depreciation)?'$'.number_format($expenditure_data->field_i_depreciation,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>J. Taxes (including property taxes): </b><?= ($expenditure_data->field_j_taxes_including_property)?'$'.number_format($expenditure_data->field_j_taxes_including_property,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>K. Utilities (telephone, gas, electric): </b><?= ($expenditure_data->field_k_utilities)?'$'.number_format($expenditure_data->field_k_utilities,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>L. Equipment/space rental: </b> <?= ($expenditure_data->field_l_equipment_space_rental)?'$'.number_format($expenditure_data->field_l_equipment_space_rental,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>M. Goods and Services: </b><?= ($expenditure_data->field_m_goods_and_services)?'$'.number_format($expenditure_data->field_m_goods_and_services,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>N. Rent/mortgage payments: </b> <?= ($expenditure_data->field_n_rent_mortgage_payments)?'$'.number_format($expenditure_data->field_n_rent_mortgage_payments,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>O. Other: </b><?= ($expenditure_data->field_o_other)?'$'.number_format($expenditure_data->field_o_other,2):''; ?></div>
                                        <div class="h6 p-b-10"><b>Rents Properties: </b>--</div>
                                        <div class="h6 p-b-10"><b>Satellite Offices : </b> --</div>
                                        <div class="h6 p-b-10"><b>Capital Budget: </b><?= ($expenditure_data->field_capital_budget)?'$'.number_format($expenditure_data->field_capital_budget,2):''; ?></div>
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

                                        <div class="row">
                        			    <div class="col-md-24">
	                                        <a class="text-blackD" href="<?php echo base_url()?>module/affiliateindex">Return to Affiliate List</a>
                                        </div>
                                        </div
                        <hr>
                        </div>
                        <?php } ?>

               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<style>
    a.text-blackD {
  text-decoration: underline;
}
a.text-blackD {
    color: #000000;
}
</style>
