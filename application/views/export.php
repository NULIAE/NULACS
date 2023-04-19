<?php  

session_start();

// Get the $report_data variable from the session
$report_data = $_SESSION['report_data'];
foreach($report_data as $key => $value){
    ?>
 
    <div><b><h3><?= strtoupper($report_data[$key]['organization']);?></h3></b></div>
    
  <div style="border:19px;padding:10px;">
    <table style="width: 100%; margin: -3px;background-color :#919993;">
      <tbody >
        <tr  style="width: 100%;">
          <td  style=" text-align: center; padding: 0px 0px 0;   ">
            <?php if($report_data[$key]['field_photo_title']){ ?>
              <?php $image_path = "http://10.168.10.25/nul-adm-application/resources/images/profile/" . $report_data[$key]['field_photo_title'];?>
              <div><img src="<?= $image_path;?>" class="f-img" alt="footer logo" width="200" height="220"></div>   
            <?php }elseif($report_data[$key]['field_photo_title'] == ""){?> 
              <div><img src="http://10.168.10.25/nul-adm-application/resources/images/person-icon.png" class="f-img" alt="footer logo"  width="200" height="220"></div>  
            <?php }?>       
          </td>
          <td   style="border: 1px solid #919993;; border-bottom: 1px; border-collapse: collapse; padding:10px;  ">
            <p>Date Established: <span><?= $report_data[$key]['field_date_established']; ?></span></p>
            <p>President/CEO: <span><?= $report_data[$key]['field_president_ceo_first_name']." ".$report_data[$key]['field_president_ceo_middle_name']." ".$report_data[$key]['field_president_ceo_last_name']; ?></span><p>
            <p>Years as CEO: <span><?= $report_data[$key]['field_number_of_years_as_ceo']; ?></span></p>
            <p>Address: <span><?= $report_data[$key]['field_address_line_1']; ?></span></p>
            <p>Telephone: <span><?= $report_data[$key]['field_telephone']; ?></span></p>
            <p>Fax: <span><?= $report_data[$key]['field_fax']; ?></span></p>
            <p>Website: <span><?= $report_data[$key]['field_affiliate_website_address']; ?></span></p>
            <p>Email: <span><?= $report_data[$key]['field_email_address']; ?></span></p>
          </td>
        </tr>
        
        <tr style=" ">
          <td colspan="2" style="border: 1px solid #919993;; border-bottom: 1px; border-collapse: collapse; padding:10px;  padding-bottom: 60px; width:100%;">
            <p ><b>Years of Service in Urban League: </b><span><?= $report_data[$key]['field_number_of_years_of_service']; ?></span></p>
            <?php
            if(!empty($report_data[$key]['sam_pk_id'])){
            ?>
            <?php 
              $sql = "SELECT * FROM service_areas WHERE fk_service_area_id = " . $report_data[$key]['sam_pk_id'] . " AND `is_deleted` = 0";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                  ?>
                  
                  <p>Service Areas: <?= $row->field_service_area_city_county; ?> Country</p>
	                <p>Population:  <?= $row->field_service_area_population; ?> </p>
	                <p style=" width:100%;">(White <?= $row->field_service_area_white; ?>% , African American <?= $row->field_service_area_african_am; ?>% , Hispanic/Latino American <?= $row->field_service_area_hispanic; ?>% , Asian American <?= $row->field_service_area_asian_am; ?>%, Native American <?= $row->field_service_area_native_am; ?>% , Other <?= $row->field_service_area_other; ?>% ) </p>
                  <?php
                  }
                }else{ ?>
                    <p style=" width:100%;"></p>
                  <?php 
              } 
            }?>
             
          </td>
       
        </tr>
      </tbody>
    </table>
</div>
    <br>
    <div><b><?= strtoupper($report_data[$key]['organization']);?> PROGRAMS</b></div>
    <?php
    $pgm_title = explode(',',$report_data[$key]['program_titles']);
    $pgm_area_id = explode(',',$report_data[$key]['program_areas']);
    $pgm_result = array();
    for ($j = 0; $j < count($pgm_title); $j++) {
      $pgm_result[] = $pgm_title[$j] . ' = ' . $pgm_area_id[$j];
    }
    ?>
    <div><b>1.	Education: </b></div>
    <?php
    foreach($pgm_result as $l => $value){
        if(strpos($pgm_result[$l], '494')) { 
            ?>
            <ul>
                <li><?= str_replace("= 494"," ", $pgm_result[$l]);?></li>
            </ul>
            <?php
        }		
    }
    ?>
    <div><b>2.	Economic Empowerment: </b></div>
    <?php
    foreach($pgm_result as $m => $value){
        ?><ul>
        <?php
        if(strpos($pgm_result[$m], '495')) { 
            ?>
                <li><?= str_replace("= 495"," ", $pgm_result[$m]);?></li>
            <?php
        }?>
        <?php
        if(strpos($pgm_result[$m], '499')) { 
            ?>
                <li><?= str_replace("= 499"," ", $pgm_result[$m]);?></li>
            <?php
        }?>
        <?php
        if(strpos($pgm_result[$m], '497')) { 
            ?>
                <li><?= str_replace("= 497"," ", $pgm_result[$m]);?></li>
            <?php
        }?>
        </ul><?php		
    }
    ?>
    <div><b>3.	Health & Quality of Life: </b></div>
    <?php
    foreach($pgm_result as $n => $value){
        ?><ul>
        <?php
        if(strpos($pgm_result[$n], '496')) { 
            ?>
                <li><?= str_replace("= 496"," ", $pgm_result[$n]);?></li>
            <?php
        }?>
        </ul><?php		
    }
    ?>
   
  
    
    <div><b>4.	Civic Engagement: </b></div>
    <?php 
        if($report_data[$key]['field_voter_registration'] == "1"){?>
			<ul><li> Voter Registration</li></ul><?php }
    ?>
     <?php 
        if($report_data[$key]['field_community_forums'] == "1"){?>
			<ul><li> Community Forums</li></ul><?php }
    ?>
    <div><b>5.	Civil Rights & Racial Justice Activities: </b></div>
    
    <?php 
       if($report_data[$key]['field_crja'] == "1"){?>
     <ul><li> Civil Rights and Racial Justice Activities</li></ul><?php }
    ?>
    <?php 
      if($report_data[$key]['field_police_brutality'] == "1"){?>
      <ul><li> Police Brutality</li></ul><?php }
    ?>
    <?php 
     if($report_data[$key]['field_advocacy_efforts'] == "1"){?>
      <ul><li> Advocacy</li></ul><?php }
    ?>
    <div><b>6.	Other Programs: </b></div>
    <?php
    foreach($pgm_result as $p => $value){
        ?><ul>
        <?php
        if(strpos($pgm_result[$p], '498')) { 
            ?>
                <li><?= str_replace("= 498"," ", $pgm_result[$p]);?></li>
            <?php
        }?>
        </ul><?php		
    }
    ?>
    <div><b>7.	Board Members/Volunteers: </b></div>
    <?php
        $vol_emp_data = $report_data[$key]['field_board_member_grand_total'];
        if($vol_emp_data != ""){?>
			<ul><li>Board Members Currently Serving : <?= $vol_emp_data;?></li></ul><?php
		}else{ ?><ul><li>Board Members Currently Serving : N/A</li></ul>  <?php }
    ?>
    <?php 
        $vol_guild_data = $report_data[$key]['field_guild_members'];
        if($vol_guild_data != ""){?>
			<ul><li>Urban League Guild Membership : <?= $vol_guild_data;?></li></ul><?php
		}else{ ?><ul><li>Urban League Guild Membership : N/A</li></ul>  <?php }
    ?>
    <?php 
        $vol_young_data = $report_data[$key]['field_ypc_members'];
        if($vol_young_data != ""){?>
			<ul><li>Urban League Young Professionals Membership : <?= $vol_young_data;?></li></ul><?php
		}else{ ?><ul><li>Urban League Young Professionals Membership : N/A</li></ul>  <?php }
    ?>
    <?php 
        $vol_oth_data = $report_data[$key]['field_aux_members'];
        if($vol_oth_data != ""){?>
			<ul><li>Other Volunteer/Auxiliary Membership : <?= $vol_oth_data;?></li></ul><?php
		}else{ ?><ul><li>Other Volunteer/Auxiliary Membership : N/A</li></ul> <?php }
    ?>
    <div><b>8.	Operational Statistics: </b></div><br>
    <div style="margin-left: 35px;"><b>	Total Budget: <?= "$".number_format($report_data[$key]['field_revenue_total_budget']);?></b></div>
    <ul><li>Budget Derived from the following sources in <?= $report_data[$key]['field_year']?></li></ul>
    <p style="margin-left: 70px;">- Corporations : <?= "$".number_format($report_data[$key]['field_revenue_corporations'],2);?></p>
    <p style="margin-left: 70px;">- Foundations : <?= "$".number_format($report_data[$key]['field_revenue_foundations'],2);?></p>
    <p style="margin-left: 70px;">- Individual Membership : <?= "$".number_format($report_data[$key]['field_revenue_individual_members'],2);?></p>
    <p style="margin-left: 70px;">- Special Events : <?= "$".number_format($report_data[$key]['field_revenue_special_events'],2);?></p>
    <p style="margin-left: 70px;">- United Way : <?= "$".number_format($report_data[$key]['field_revenue_united_way'],2);?></p>
    <p style="margin-left: 70px;">- Federal : <?= "$".number_format($report_data[$key]['field_revenue_federal']),2;?></p>
    <p style="margin-left: 70px;">- State/Local : <?= "$".number_format($report_data[$key]['field_revenue_state_local'],2);?></p>
    <p style="margin-left: 70px;">- Other : <?= "$".number_format($report_data[$key]['field_revenue_other'],2);?></p>
    <p style="margin-left: 70px;">- NUL : <?= "$".number_format($report_data[$key]['field_revenue_nul'],2);?></p>
    <ul>
      <li>Endowment: <?= "$".number_format($report_data[$key]['field_revenue_endowment_amount'],2);?></li>
      <li>Investment Earnings : <?= "$".number_format($report_data[$key]['field_revenue_investment'],2);?></li>
      <li>Employees :  Full-time:  <?= $report_data[$key]['field_full_time_employees'];?>      Part-time:  <?= $report_data[$key]['field_part_time_employees'];?></li>
    </ul>
    <div><b>9.	Annual Expenditures: </b></div>
    <ul>
        <li><b>Affiliate Expenditures : <?= "$".number_format($report_data[$key]['field_total_expenditures'],2);?></b></li>
        <li>Salaries/Wages : <?= "$".number_format($report_data[$key]['field_a_salaries_wages'],2);?></li>
        <li>Fringe Benefits : <?= "$".number_format($report_data[$key]['field_b_fringe_benefits'],2);?></li>
        <li>Professional/Contract/Consulting Fees : <?= "$".number_format($report_data[$key]['field_c_professional_fees'],2);?></li>
        <li>Travel : <?= "$".number_format($report_data[$key]['field_d_travel'],2);?></li>
        <li>Postage/Freight : <?= "$".number_format($report_data[$key]['field_e_postage_freight'],2);?></li>
        <li>Insurance : <?= "$".number_format($report_data[$key]['field_f_insurance'],2);?></li>
        <li>Interest Payments : <?= "$".number_format($report_data[$key]['field_g_interest_payments'],2);?></li>
        <li>Dues/Subscription/Registration : <?= "$".number_format($report_data[$key]['field_h_dues_subscription_regist'],2);?></li>
        <li>Depreciation : <?= "$".number_format($report_data[$key]['field_i_depreciation'],2);?></li>
        <li>Taxes (Including Property Taxes) : <?= "$".number_format($report_data[$key]['field_j_taxes_including_property'],2);?></li>
        <li>Utilities (Telephone, Gas, Electric) : <?= "$".number_format($report_data[$key]['field_k_utilities'],2);?></li>
        <li>Equipment/Space Rental : <?= "$".number_format($report_data[$key]['field_l_equipment_space_rental'],2);?></li>
        <li>Goods and Services : <?= "$".number_format($report_data[$key]['field_m_goods_and_services'],2);?></li>
        <li>Rent/Mortgage Payments : <?= "$".number_format($report_data[$key]['field_n_rent_mortgage_payments'],2);?></li>
        <li>Other : <?= "$".number_format($report_data[$key]['field_o_other'],2);?></li>
        <li>Value of Property : <?= "$".number_format($report_data[$key]['field_number_properties_rented'],2);?></li>
        <li>Capital Budget : <?= "$".number_format($report_data[$key]['field_capital_budget_amount'],2);?></li>
    </ul>
    <div><b>10.	Community Relations Activities: </b></div>
    <ul >
        <?php if($report_data[$key]['field_produces_annual_report'] == 1){?>
          <li>Annual Report </li>
        <?php }?>
        <li>Website : <?= $report_data[$key]['field_affiliate_website_address']; ?></li>
        <?php if($report_data[$key]['field_is_website_linked_to_nul'] == 1){?>
          <li>Linked to National Urban League Website : www.nul.org </li>
        <?php }?>
        <?php if($report_data[$key]['field_has_ad_marketing_campaign'] == 1){?>
          <li>Advertising/Marketing Campaign </li>
        <?php }?>
        <?php 
          if($report_data[$key]['report_id'] != ""){
            $sql ="SELECT * FROM community_relation_method_ad_market WHERE community_relation_id = ".$report_data[$key]['report_id'];
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
              foreach ($query->result() as $row) {
              ?>
                
              <?php
              }
            }
          }
              
        ?>
        <li>Methods of Advertising:</li>
        <?php if($report_data[$key]['field_marketing_kit_or_pamphlet'] == 1){?>
          <li>Marketing Kit and/or Pamphlet</li>
        <?php }?>
    </ul>
    <br style="page-break-before: always">
    <?php
}
?>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica, sans-serif;
      line-height: 19px;
    }
  </style>