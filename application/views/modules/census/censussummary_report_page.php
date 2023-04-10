<table  class="table table1" id="table11">
                  <thead>
                    <tr>
                      <th colspan="2">Report: Census Summary <?= $filters['field_year']; ?> <?= $affiliate->organization; ?></th>
                    </tr>
                  </thead>
                  <tbody id="table-body">
                  <?php if(count($revenue)>0){?>
                  <tr>  
                    <td class="section_head"><b>Revenue</b></td>
                    <td></td>
                  </tr>
                  <tr>  
                    <td class="left">What is the total budget of your affiliate?:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_total_budget'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">NUL:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_nul'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Corporations:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_corporations'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Foundations:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_foundations'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Individual Memberships:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_individual_members'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Special Events:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_special_events'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">United Way:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_united_way'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Federal:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_federal'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">State/Local:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_state_local'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Other:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_other'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">How much investment earnings (money market account, endowment)?:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_investment'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Does the affiliate have an endowment?:</td>
                    <td class="right"><?= number_format($revenue[0]['field_revenue_has_endowment'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">If so, what is the present amount?:</td>
                    <td class="right">$<?= number_format($revenue[0]['field_revenue_endowment_amount'],2); ?></td>
                  </tr>
                  <?php }?>
                  <?php if(count($expenditures)>0){?>
                  <tr>  
                    <td class="section_head"><b>Expenditures</b></td>
                    <td></td>
                  </tr>
                  <tr>  
                    <td class="left">What was the total expenditure by your affiliate for expenses (include salaries, rent/mortgage, equipment, etc.)?:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_total_expenditures'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">A. Salaries/Wages:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_a_salaries_wages'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">B. Fringe Benefits:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_b_fringe_benefits'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">C. Professional/Contract/Consulting Fees:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_c_professional_fees'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">D. Travel:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_d_travel'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">E. Postage/Freight:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_e_postage_freight'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">F. Insurance:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_f_insurance'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">G. Interest Payments:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_g_interest_payments'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">H. Dues/Subscription/Registration:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_h_dues_subscription_regist'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">I. Depreciation:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_i_depreciation'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">J. Taxes (including property taxes):</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_j_taxes_including_property'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">K. Utilities (telephone, gas, electric):</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_k_utilities'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">L. Equipment/space rental:</td>
                    <td class="right">$<?=number_format($expenditures[0]['field_l_equipment_space_rental'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">M. Goods and Services:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_m_goods_and_services'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">N. Rent/mortgage payments:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_n_rent_mortgage_payments'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">O. Other:</td>
                    <td class="right">$<?= number_format($expenditures[0]['field_o_other'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">How many properties does the affiliate own?:</td>
                    <td class="right"><?= number_format($expenditures[0]['field_number_properties_owned']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">How many properties does the affiliate rent?:</td>
                    <td class="right"><?= number_format($expenditures[0]['field_number_properties_rented']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">If the affiliate owns its facilities, what is the current market value of the property?: </td>
                    <td class="right"><?= "$".number_format($expenditures[0]['field_market_value_of_property'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">If so, how much?: </td>
                    <td class="right"><?= "$".number_format($expenditures[0]['field_capital_budget_amount'],2); ?></td>
                  </tr>
                  <?php }?>
                  <?php if(count($education)>0){?>
                  <tr>  
                    <td class="section_head"><b>Education Programs</b></td>
                    <td></td>
                  </tr>
                  <tr>  
                    <td class="left">Total Participants in Education Programs:</td>
                    <td class="right"><?= number_format($education[0]['field_program_ed_total_participa']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Total Foster Care placements/recommendations for services:</td>
                    <td class="right"><?= number_format($education[0]['field_program_ed_foster_total']); ?></td>
                  </tr>
                  <?php }?>
                  <?php if(count($entrepreneurship)>0){?>
                  <tr>  
                    <td class="section_head"><b>Entrepreneurship and Business Development Programs</b></td>
                    <td></td>
                  </tr>
                  <tr>  
                    <td class="left">Total Participants in Entrepreneurship Programs:</td>
                    <td class="right"><?= number_format($entrepreneurship[0]['field_program_entpr_total_partic']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of new businesses created:</td>
                    <td class="right"><?= number_format($entrepreneurship[0]['field_program_entpr_new']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Total sales of businesses started by participants in entrepreneurship programs (i.e. Small Business Matters):</td>
                    <td class="right"><?= "$".number_format($entrepreneurship[0]['field_program_entpr_sales'],2); ?></td>
                  </tr>
                  <?php }?>
                  <?php if(count($health)>0){?>
                  <tr>  
                    <td class="section_head"><b>Health and Quality of Life Programs</b></td>
                    <td></td>
                  </tr>
                  <tr>  
                    <td class="left">Total Participants in Health Programs:</td>
                    <td class="right"><?= number_format($health[0]['field_program_health_total_parti']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Average number of participants at Education Classes/Events/Seminars:</td>
                    <td class="right"><?= number_format($health[0]['field_program_health_participant']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of individuals assisted with using their health insurance by Community Health Worker or Navigator:</td>
                    <td class="right"><?= number_format($health[0]['field_program_health_assisted']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of individuals enrolled in health insurance by Community Health Worker or Navigator:</td>
                    <td class="right"><?= number_format($health[0]['field_program_health_enrolled']); ?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($housing)>0){?>
                  <tr>  
                    <td class="section_head"><b>Housing and Community Development Programs</b></td>
                    <td></td>
                  </tr>
                  <tr>  
                    <td class="left">Total Participants in Housing Programs:</td>
                    <td class="right"><?= number_format($housing[0]['field_program_housing_total_part']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">How many participants attended or inquired about home ownership programs?:</td>
                    <td class="right"><?= number_format($housing[0]['field_program_housing_attended']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of program participants who purchased a home:</td>
                    <td class="right"><?= number_format($housing[0]['field_program_housing_purchased']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Average price of homes purchased:</td>
                    <td class="right">$<?= number_format($housing[0]['field_program_housing_avg_price'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of foreclosures prevented:</td>
                    <td class="right"><?= number_format($housing[0]['field_program_housing_not4closed']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">How many people were turned to alternative housing after losing their house?:</td>
                    <td class="right"><?= number_format($housing[0]['field_program_housing_alternate']); ?></td>
                  </tr>
                  <tr>
                    <td class="left">How many people needing assistance have children under the age of 18 years of age?:</td>
                    <td class="right"><?= number_format($housing[0]['field_program_housing_have_kids']); ?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($workforce)>0){?>
                  <tr>  
                    <td class="section_head"><b>Workforce Development Programs</b></td>
                    <td></td>
                  </tr>
                  <tr>  
                    <td class="left">Total Participants in Workforce Programs:</td>
                    <td class="right"><?php if($workforce[0]['field_program_work_total'] != 0) {?><?= number_format($workforce[0]['field_program_work_total']); ?><?php }?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of clients who received workforce development/job placement counseling from your affiliate last year?:</td>
                    <td class="right"><?= number_format($workforce[0]['field_program_work_counseling']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of participants in employment/workforce development programs (exclude welfare recipients)?:</td>
                    <td class="right"><?= number_format($workforce[0]['field_program_work_participants']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of participants placed in jobs:</td>
                    <td class="right"><?= number_format($workforce[0]['field_program_work_placed']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of placed participants who retained jobs for 90 days:</td>
                    <td class="right"><?= number_format($workforce[0]['field_program_work_retained']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Annual salary (if applicable):</td>
                    <td class="right">$<?= number_format($workforce[0]['field_program_work_salary'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Hourly wage rate:</td>
                    <td class="right">$<?= number_format($workforce[0]['field_program_work_hourly'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of welfare participants in federal/state funded programs:</td>
                    <td class="right"><?= number_format($workforce[0]['field_program_work_welfare']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Number of welfare program participants placed in jobs:</td>
                    <td class="right"><?= number_format($workforce[0]['field_program_work_welfare_place']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Annual welfare salary (if applicable):</td>
                    <td class="right">$<?= number_format($workforce[0]['field_program_work_welfare_salar'],2); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Hourly wage rate (welfare):</td>
                    <td class="right">$<?= number_format($workforce[0]['field_program_work_welfare_hour'],2); ?></td>
                  </tr>                          
                  <?php } ?>
                  <?php if(count($civic)>0){?>
                  <tr>  
                    <td class="section_head"><b>Civic Engagement</b></td>
                    <td></td>
                  </tr>  
                  <tr>  
                    <td class="left">Voter Registration - Total Number Served or Registered::</td>
                    <td class="right"><?= number_format($civic[0]['field_voter_societal_impact']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Community Forums Total Served:</td>
                    <td class="right"><?= number_format($civic[0]['field_forums_societal_impact']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Civil Rights & Racial Justice Total Served:</td>
                    <td class="right"><?= number_format($civic[0]['field_crja_societal_impact']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Police Brutality Total Served:	</td>
                    <td class="right"><?= number_format($civic[0]['field_police_societal_impact']); ?></td>
                  </tr>
                  <tr>  
                    <td class="left">Advocacy Total Served:	</td>
                    <td class="right"><?= number_format($civic[0]['field_advocacy_societal_impact']); ?></td>
                  </tr>  
                  <tr>  
                    <td class="section_head"><b>Emergency Relief Activities</b></td>
                    <td></td>
                  </tr>                   
                  <?php } ?>
                  <tr>  
                    <td class="left">Total Served:</td>
                    <td class="right"><?= number_format($emergency[0]['field_relief_total_served']); ?></td>
                  </tr>                     
                  </tbody>
                </table>

