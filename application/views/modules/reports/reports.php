<?php
$quarterArray = array(
	'1' => 'JAN - MAR '.$year,
	'2' => 'APR - JUN '.$year,
	'3' => 'JUL - SEP '.$year,
	'4' => 'OCT - DEC '.$year,
);
?>
<style>
.all-affiliates .mainTabAll .tab-content .pane113 table thead tr th{
transform: rotate(-60deg);
-webkit-transform: rotate(-60deg);
-moz-transform: rotate(-60deg);
-ms-transform: rotate(-60deg);
-o-transform: rotate(-60deg);
padding:35px 11px !important;
line-height:16px !important;
vertical-align: middle;
font-size: 10px!important;
}

.SumoSelect{
  width:100% !important;
}
.pane113 table tbody tr td{
  border:1px solid #ccc !important;
}
</style>
<main class="all-affiliates">
    <div class="container">
      <div class="Wrapper">

        <div class="row justify-content-end date">
          <div class="col t-r"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m font-weight-normal">Tuesday
              October 06, 2020</span></div>
        </div>

        <div class=" document-mdata">

          <div class="mnHead">
            <h3>KPI Reports</h3>
          </div>
        </div>
        <?php
        if (strpos($_SERVER['REQUEST_URI'], "affiliate") !== false){
          $secondTbab = 1;
        }else{
          $secondTbab = 0;
        }
        ?>
        <div class="mainTabAll">
          <?php if($this->session->role_id==1): ?>
          <nav>
            <div class="nav" id="nav-tab" role="tablist">
              <a class="nav-item nav-link <?=$secondTbab==0?'active':''?>" id="nav-x1-tab" data-toggle="tab" href="#nav-x1" role="tab"
                aria-controls="nav-x1" aria-selected="true">All Affiliates</a>
              <a class="nav-item nav-link <?=$secondTbab==1?'active':''?>" id="nav-x2-tab" data-toggle="tab" href="#nav-x2" role="tab"
                aria-controls="nav-x2" aria-selected="false">Individual Affiliate</a>
            </div>
          </nav>
          <?php endif; ?>

          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade <?=$secondTbab==0?' active show':''?> " id="nav-x1" role="tabpanel" aria-labelledby="nav-x1-tab">
              <div class="row align-items-center mt-3">
                <div class="col-xl-12 col-lg-8 mt-3">
                <div class="h5 f-bold"><?php echo $quarterArray[$quarter]; ?></div>
                </div>
                <div class="col-xl-12 col-lg-16">
                  <form  action="<?php echo base_url('module/filter/reports'); ?>">
                    <div class="row">
                      <div class="col-12 col-md-12 col-lg-8 mt-3 secondSelection"><span class="sub">
                          <select class="form-control" name="quarter" data-type="selector">
                            <option value="">Choose Quarter</option>
                            <option value="1" <?php if($quarter == 1) echo "selected"; ?>>Q1</option>
                            <option value="2" <?php if($quarter == 2) echo "selected"; ?>>Q2</option>
                            <option value="3" <?php if($quarter == 3) echo "selected"; ?>>Q3</option>
                            <option value="4" <?php if($quarter == 4) echo "selected"; ?>>Q4</option>
                          </select>
        
                        </span></div>
                      <div class="col-12 col-md-12 col-lg-5 t-r mt-3">
                        <div class="yearPick">
                          <i class="i i-year-pick"></i>
                          <input class="yearpick form-control" value="<?php echo $year;?>" name="choose_yr"  type="text">
                        </div>
                      </div>
        
                      <div class="col-12  col-md-12 col-lg-5 t-l mt-3 pl-3">
                      <input type="submit" class="btn btn-primary btn-rounded min w-100px" value="SEARCH">
                      </div>
                      <div class="col-12  col-md-12 col-lg-4 t-l mt-3">
                      <a href="<?php echo base_url("module/reports/export")."?quarter=$quarter&year=$year"; ?>" class="btn btn-primary btn-rounded min w-100px">EXPORT</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">

                <div class="pane113 w-100">

                  <table class="table table1 table-bordered" id="#table11">
                    <thead>
                      <tr>
                        <th scope="col">Affiliates </th>
                        <th scope="col">Liquidity</th>
                        <th scope="col">Current Ratio</th>
                        <th scope="col">Current Debt Ratio</th>
                        <th scope="col">Change in Cash- Operations</th>
                        <th scope="col">Change in Cash- Financing</th>
                        <th scope="col">Change in Cash- Investing</th>
                        <th scope="col">OE Program</th>
                        <th scope="col">OE Admin</th>
                        <th scope="col">OE Fundraising</th>
                        <th scope="col">Change in N/A without restrictions</th>
                        <th scope="col">Days in Cash</th>
                        <th scope="col"># of Grants TY YTD-LY YTD</th>
                        <th scope="col">$ of Grants TY YTD -LY YTD</th>
                        <th scope="col">Positive Net assets</th>
                        <th scope="col">Board Giving variance commitment - YTD</th>
                        <th scope="col">Operating Reserves</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($key_indicators as $ki): ?>
                        <?php $indicators = json_decode($ki['indicators'], true); ?>
                        <tr>
                          <td scope="row" class="t-l-c"><a class="d-block" href="<?php echo base_url('module/filter/reports')."?affiliate=".$ki['affiliate_id']."&choose_yr=".$year; ?>"><?=$ki['name']?></a></td>
                          <td>
                          <?php if(isset($indicators['liquidity']) && $indicators['liquidity'] != NULL){
                            if($indicators['liquidity'] < 0)
                              echo '<span class="text-danger">($'.number_format(abs($indicators['liquidity']), 0, '.', ',').')</span>';
                            else
                              echo "$".number_format($indicators['liquidity'], 0, '.', ',');
                          } else {
                            echo "$0";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['current_ratio']) && $indicators['current_ratio'] != NULL){
                            if($indicators['current_ratio'] < 0)
                              echo '<span class="text-danger">('.number_format(abs($indicators['current_ratio']), 2).')</span>';
                            else
                              echo number_format($indicators['current_ratio'], 2);
                          } else {
                            echo "0";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['current_debt_ratio']) && $indicators['current_debt_ratio'] != NULL){
                            if($indicators['current_debt_ratio'] < 0)
                              echo '<span class="text-danger">('.number_format(abs($indicators['current_debt_ratio']), 2).')</span>';
                            else
                              echo number_format($indicators['current_debt_ratio'], 2);
                          } else {
                            echo "0";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['from_operations']) && $indicators['from_operations'] != NULL){
                            if($indicators['from_operations'] < 0)
                              echo '<span class="text-danger">($'.number_format(abs($indicators['from_operations']), 0, '.', ',').')</span>';
                            else
                              echo "$".number_format($indicators['from_operations'], 0, '.', ',');
                          } else {
                            echo "$0";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['from_financing']) && $indicators['from_financing'] != NULL){
                            if($indicators['from_financing'] < 0)
                              echo '<span class="text-danger">($'.number_format(abs($indicators['from_financing']), 0, '.', ',').')</span>';
                            else
                              echo "$".number_format($indicators['from_financing'], 0, '.', ',');
                          } else {
                            echo "$0";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['from_investing']) && $indicators['from_investing'] != NULL){
                            if($indicators['from_investing'] < 0)
                              echo '<span class="text-danger">($'.number_format(abs($indicators['from_investing']), 0, '.', ',').')</span>';
                            else
                              echo "$".number_format($indicators['from_investing'], 0, '.', ',');
                          } else {
                            echo "$0";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['operating_efficiency_program_value']) && $indicators['operating_efficiency_program_value'] != NULL){
                            if($indicators['operating_efficiency_program_value'] < 0)
                              echo '<span class="text-danger">('.abs($indicators['operating_efficiency_program_value']).'%)</span>';
                            else
                              echo $indicators['operating_efficiency_program_value']."%";
                          } else {
                            echo "0%";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['operating_efficiency_admin_value']) && $indicators['operating_efficiency_admin_value'] != NULL){
                            if($indicators['operating_efficiency_admin_value'] < 0)
                              echo '<span class="text-danger">('.abs($indicators['operating_efficiency_admin_value']).'%)</span>';
                            else
                              echo $indicators['operating_efficiency_admin_value']."%";
                          } else {
                            echo "0%";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['operating_efficiency_fundraising_value']) && $indicators['operating_efficiency_fundraising_value'] != NULL){
                            if($indicators['operating_efficiency_fundraising_value'] < 0)
                              echo '<span class="text-danger">('.abs($indicators['operating_efficiency_fundraising_value']).'%)</span>';
                            else
                              echo $indicators['operating_efficiency_fundraising_value']."%";
                          } else {
                            echo "0%";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['change_in_net_assets_in_quarter']) && $indicators['change_in_net_assets_in_quarter'] != NULL){
                            if($indicators['change_in_net_assets_in_quarter'] < 0)
                              echo '<span class="text-danger">($'.number_format(abs($indicators['change_in_net_assets_in_quarter']), 0, '.', ',').')</span>';
                            else
                              echo "$".number_format($indicators['change_in_net_assets_in_quarter'], 0, '.', ',');
                          } else {
                            echo "$0";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['days_in_cash']) && $indicators['days_in_cash'] != NULL){
                            if($indicators['days_in_cash'] < 0)
                              echo '<span class="text-danger">('.number_format(abs($indicators['days_in_cash']), 2).')</span>';
                            else
                              echo number_format($indicators['days_in_cash'], 2);
                          } else {
                            echo "0";
                          } ?>
                          </td>
                          <td><?="TY".($indicators['change_in_grant_ty_ytd'] != NULL ? $indicators['change_in_grant_ty_ytd'] : 0).":LY".($indicators['change_in_grant_ly_ytd'] != NULL ? $indicators['change_in_grant_ly_ytd'] : 0); ?></td>
                          <td><?=($indicators['change_in_grant_ty_ytd_value'] != NULL ? $indicators['change_in_grant_ty_ytd_value'] : 0).":".($indicators['change_in_grant_ly_ytd_value'] != NULL ? $indicators['change_in_grant_ly_ytd_value'] : 0); ?></td>
                          <td><?=isset($indicators['is_net_assets_positive']) ? $indicators['is_net_assets_positive'] : "N"; ?></td>
                          <td>
                          <?php if(isset($indicators['borad_giving']) && $indicators['borad_giving'] != NULL){
                            if($indicators['borad_giving'] < 0)
                              echo '<span class="text-danger">('.abs($indicators['borad_giving']).'%)</span>';
                            else
                              echo $indicators['borad_giving']."%";
                          } else {
                            echo "0%";
                          } ?>
                          </td>
                          <td>
                          <?php if(isset($indicators['operating_reserves_percentage']) && $indicators['operating_reserves_percentage'] != NULL){
                            if($indicators['operating_reserves_percentage'] < 0)
                              echo '<span class="text-danger">('.number_format(abs($indicators['operating_reserves_percentage']), 2).')</span>';
                            else
                              echo number_format($indicators['operating_reserves_percentage'], 2);
                          } else {
                            echo "0";
                          } ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>

            </div>

            <div class="tab-pane fade active <?=$secondTbab==1?'show':''?>" id="nav-x2" role="tabpanel" aria-labelledby="nav-x2-tab">
              <?php if($this->session->role_id==1): ?>
              <form action="">
              <div class="row mt-5">
                <div class="col-4 col-md-4 col-lg-3 secondSelection">
                  <span class="sub">
                  <select name="affiliate" onchange="window.location.href = '<?php echo base_url();?>/module/filter/reports?affiliate=' + this.value;" class="form-control selectp-r" data-type="selector">
                    <option>Choose Affiliate</option>
                    <?php foreach($affiliates as $aff): ?>
                        <option value="<?=$aff['affiliate_id']?>" <?php if($affiliate == $aff['affiliate_id']) echo "selected";?>><?=$aff['name']?></option>
                    <?php endforeach; ?>
                  </select>
                  
                  </span>
                </div>
                <div class="col-1 col-md-1 col-lg-1 ml-auto align-self-center"><strong>From</strong></div>
                <div class="col-2 col-md-2 col-lg-2">
                  <?php $from_quarter = isset($_GET['from_quarter'])? $_GET['from_quarter'] : ''; ?>
                  <span class="sub">
                    <select name="from_quarter" class="form-control selectp-r">
                      <option value="">Quarter</option>
                      <option value="1" <?php if($from_quarter == 1) echo "selected"; ?>>Q 1</option>
                      <option value="2" <?php if($from_quarter == 2) echo "selected"; ?>>Q 2</option>
                      <option value="3" <?php if($from_quarter == 3) echo "selected"; ?>>Q 3</option>
                      <option value="4" <?php if($from_quarter == 4) echo "selected"; ?>>Q 4</option>
                    </select>
                  </span>
                </div>
								<div class="col-2 col-md-2 col-lg-2">
                  <?php $from_year = isset($_GET['from_year'])? $_GET['from_year'] : ''; ?>
									<div class="yearPick">
										<i class="i i-year-pick"></i>
										<input class="yearpick form-control" name="from_year" type="text" value="<?= $from_year; ?>" />
									</div>
								</div>
                <div class="col-1 col-md-1 col-lg-1 text-center align-self-center"><strong>To</strong></div>
                <div class="col-2 col-md-2 col-lg-2">
                  <?php $to_quarter = isset($_GET['to_quarter'])? $_GET['to_quarter'] : ''; ?>
                  <span class="sub">
                    <select name="to_quarter" class="form-control selectp-r">
                      <option value="">Quarter</option>
                      <option value="1" <?php if($to_quarter == 1) echo "selected"; ?>>Q 1</option>
                      <option value="2" <?php if($to_quarter == 2) echo "selected"; ?>>Q 2</option>
                      <option value="3" <?php if($to_quarter == 3) echo "selected"; ?>>Q 3</option>
                      <option value="4" <?php if($to_quarter == 4) echo "selected"; ?>>Q 4</option>
                    </select>
                  </span>
                </div>
								<div class="col-2 col-md-2 col-lg-2">
                  <?php $to_year = isset($_GET['to_year'])? $_GET['to_year'] : ''; ?>
									<div class="yearPick">
										<i class="i i-year-pick"></i>
										<input class="yearpick form-control" name="to_year" type="text" value="<?= $to_year; ?>" />
									</div>
								</div>
								<div class="col-3 col-md-3 col-lg-3 t-c">
									<button class="btn btn-primary btn-rounded min w-100px" type="submit">SEARCH</button>
								</div>
              </div>
              </form>
              <?php endif; ?>
              <div class="row">
                <div class="pane113 w-100">
                  <table class="table table1 table-condensed table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Quarter</th>
                            <th scope="col">Liquidity</th>
                            <th scope="col">Current Ratio</th>
                            <th scope="col">Current Debt Ratio</th>
                            <th scope="col">CIC- Operations</th>
                            <th scope="col">CIC- Financing</th>
                            <th scope="col">CIC- Investing</th>
                            <th scope="col">OE Program</th>
                            <th scope="col">OE Admin</th>
                            <th scope="col">OE Fundraising</th>
                            <th scope="col">Change in N/A without restrictions</th>
                            <th scope="col">Days in Cash</th>
                            <th scope="col"># of Grants TY YTD-LY YTD</th>
                            <th scope="col">$ of Grants TY YTD -LY YTD</th>
                            <th scope="col">Positive Net assets</th>
                            <th scope="col">Board Giving variance commitment - YTD</th>
                            <th scope="col">Operating Reserves</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php $arrayForChart= [
                        ['Month'],
                        ['Liquidity'],
                        ['Current Ratio'],
                        ['Current Debt Ratio'],
                        ['Change in Cash- Operations'],
                        ['Change in Cash- Financing'],
                        ['Change in Cash- Investing'],
                        ['OE Program'],
                        ['OE Admin'],
                        ['OE Fundraising'],
                        ['Change in N/A without restrictions'],
                        ['Days in Cash'],
                        ['# of Grants TY YTD'],
                        ['# of Grants LY YTD'],
                        ['$ of Grants TY YTD'],
                        ['$ of Grants LY YTD'],
                        ['Board Giving variance commitment - YTD'],
                        ['Operating Reserves']
                      ];
                      $index = 0;
                      ?>
                      <?php if(isset($ind_affiliate)): ?>
                        <?php foreach($ind_affiliate as $ia): ?>
                          <?php $report = json_decode($ia['indicators'], true); ?>
                          <?php $index++; ?>
                          <tr>
                              <td class="t-l"><?php $arrayForChart[0][$index] = $ia['year']." Q".$ia['quarter']; ?><a class="pl-0 text-center" href="<?php echo base_url('module/affiliate/status/details/').$affiliate.'?tab=3&key_quarter='.$ia['quarter'].'&key_year='.$ia['year']; ?>" target="_blank"><?php echo $arrayForChart[0][$index]; ?></a></td>
                              <td class="t-l">
                              <?php 
                              $arrayForChart[1][$index] = isset($report['liquidity']) ? (int)$report['liquidity'] : 0; 
                              if($arrayForChart[1][$index] < 0)
                                echo '<span class="text-danger">($'.number_format(abs($arrayForChart[1][$index]), 0, '.', ',').')</span>';
                              else
                                echo "$".number_format($arrayForChart[1][$index], 0, '.', ',');
                              ?>
                              </td>
                              <td class="t-l">
                              <?php 
                              $arrayForChart[2][$index] = isset($report['current_ratio']) ? (int)$report['current_ratio'] : 0;
                              if($arrayForChart[2][$index] < 0)
                                echo '<span class="text-danger">('.number_format(abs($arrayForChart[2][$index]), 2).')</span>';
                              else
                                echo number_format($arrayForChart[2][$index], 2); 
                              ?>
                              </td>
                              <td class="t-l">
                              <?php 
                              $arrayForChart[3][$index] = isset($report['current_debt_ratio']) ? (int)$report['current_debt_ratio'] : 0;
                              if($arrayForChart[3][$index] < 0)
                                echo '<span class="text-danger">('.number_format(abs($arrayForChart[3][$index]), 2).')</span>';
                              else
                                echo number_format($arrayForChart[3][$index], 2);
                              ?>
                              </td>
                              <td class="t-l">
                              <?php
                              $arrayForChart[4][$index] = isset($report['from_operations']) ? (int)$report['from_operations'] : 0;
                              if($arrayForChart[4][$index] < 0)
                                echo '<span class="text-danger">($'.number_format(abs($arrayForChart[4][$index]), 0, '.', ',').')</span>';
                              else
                                echo "$".number_format($arrayForChart[4][$index], 0, '.', ',');
                              ?>
                              </td>
                              <td class="t-l">
                              <?php
                              $arrayForChart[5][$index] = isset($report['from_financing']) ? (int)$report['from_financing'] : 0;
                              if($arrayForChart[5][$index] < 0)
                                echo '<span class="text-danger">($'.number_format(abs($arrayForChart[5][$index]), 0, '.', ',').')</span>';
                              else
                                echo "$".number_format($arrayForChart[5][$index], 0, '.', ',');
                              ?>
                              </td>
                              <td class="t-l">
                              <?php
                              $arrayForChart[6][$index] = isset($report['from_investing']) ? (int)$report['from_investing'] : 0;
                              if($arrayForChart[6][$index] < 0)
                                echo '<span class="text-danger">($'.number_format(abs($arrayForChart[6][$index]), 0, '.', ',').')</span>';
                              else
                                echo "$".number_format($arrayForChart[6][$index], 0, '.', ',');
                              ?>
                              </td>
                              <td class="t-l">
                              <?php
                              $arrayForChart[7][$index] = isset($report['operating_efficiency_program_value']) ? (int)$report['operating_efficiency_program_value'] : 0;
                              if($arrayForChart[7][$index] < 0)
                                echo '<span class="text-danger">('.abs($arrayForChart[7][$index]).'%)</span>';
                              else
                                echo $arrayForChart[7][$index]."%";
                              ?>
                              </td>
                              <td class="t-l">
                              <?php
                              $arrayForChart[8][$index] = isset($report['operating_efficiency_admin_value']) ? (int)$report['operating_efficiency_admin_value'] : 0;
                              if($arrayForChart[8][$index] < 0)
                                echo '<span class="text-danger">('.abs($arrayForChart[8][$index]).'%)</span>';
                              else
                                echo $arrayForChart[8][$index]."%";
                              ?>
                              </td>
                              <td class="t-l">
                              <?php
                              $arrayForChart[9][$index] = isset($report['operating_efficiency_fundraising_value']) ? (int)$report['operating_efficiency_fundraising_value'] : 0;
                              if($arrayForChart[9][$index] < 0)
                                echo '<span class="text-danger">('.abs($arrayForChart[9][$index]).'%)</span>';
                              else
                                echo $arrayForChart[9][$index]."%";
                              ?>
                              </td>
                              <td class="t-l">
                              <?php
                              $arrayForChart[10][$index] = isset($report['change_in_net_assets_in_quarter']) ? (int)$report['change_in_net_assets_in_quarter'] : 0;
                              if($arrayForChart[10][$index] < 0)
                                echo '<span class="text-danger">($'.number_format(abs($arrayForChart[10][$index]), 0, '.', ',').')</span>';
                              else
                                echo "$".number_format($arrayForChart[10][$index], 0, '.', ','); 
                              ?>
                              </td>
                              <td class="t-l">
                              <?php
                              $arrayForChart[11][$index] = isset($report['days_in_cash']) ? (int)$report['days_in_cash'] : 0;
                              if($arrayForChart[11][$index] < 0)
                                echo '<span class="text-danger">($'.number_format(abs($arrayForChart[11][$index]), 2).')</span>';
                              else
                                echo number_format($arrayForChart[11][$index], 2);
                              ?>
                              </td>
                              <?php $arrayForChart[12][$index] = isset($report['change_in_grant_ty_ytd']) ? (int)$report['change_in_grant_ty_ytd'] : 0; ?>
                              <?php $arrayForChart[13][$index] = isset($report['change_in_grant_ly_ytd']) ? (int)$report['change_in_grant_ly_ytd'] : 0; ?>
                              <td class="t-l"><?php echo "TY".$arrayForChart[12][$index].":LY".$arrayForChart[13][$index]; ?></td>
                              <?php $arrayForChart[14][$index] = isset($report['change_in_grant_ty_ytd_value']) ? (int)$report['change_in_grant_ty_ytd_value'] : 0; ?>
                              <?php $arrayForChart[15][$index] = isset($report['change_in_grant_ly_ytd_value']) ? (int)$report['change_in_grant_ly_ytd_value'] : 0; ?>
                              <td class="t-l"><?php echo $arrayForChart[14][$index].":".$arrayForChart[15][$index]; ?></td>
                              <td class="t-l"><?php echo isset($report['is_net_assets_positive']) ? $report['is_net_assets_positive'] : "N"; ?></td>
                              <td class="t-l">
                              <?php
                              $arrayForChart[16][$index] = isset($report['borad_giving']) ? (int)$report['borad_giving'] : 0;
                              if($arrayForChart[16][$index] < 0)
                                echo '<span class="text-danger">('.abs($arrayForChart[16][$index]).'%)</span>';
                              else
                                echo $arrayForChart[16][$index]."%";
                              ?>
                              </td>
                              <td class="t-l">
                              <?php
                              $arrayForChart[17][$index] = isset($report['operating_reserves_percentage']) ? (int)$report['operating_reserves_percentage'] : 0;
                              if($arrayForChart[17][$index] < 0)
                                echo '<span class="text-danger">('.number_format(abs($arrayForChart[17][$index]), 2).'%)</span>';
                              else
                                echo number_format($arrayForChart[17][$index], 2)."%";
                              ?>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>

              </div>
              
              <?php if($affiliate != ""): ?>
              <div class="row mt-5 m-y-20" id="page_scroll">
                <div class="col-4 col-md-4 col-lg-4 secondSelection mt-5 mb-3">
                  <span class="sub">
                  <select onchange="window.location.href = '<?php echo base_url();?>/module/filter/reports?affiliate=<?php echo $affiliate; ?>&group=' + this.value;" class="form-control selectp-r" data-type="selector">
                    <option value="group1" <?php if($group == "group1") echo "selected"; ?>>Liquidity Group</option>
                    <option value="group2" <?php if($group == "group2") echo "selected"; ?>>Ratio Group</option>
                    <option value="group3" <?php if($group == "group3") echo "selected"; ?>>Operating Efficiency Group</option>
                  </select>
                  
                  </span>
                </div>
                <div class="col-24">  
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                  <div id="chart_divnul" class="p-5 bg-white"></div>
                </div>
              </div>
              <?php endif; ?>

            </div>


          </div>
        </div>
      </div>

    </div>
    </div>

  </main>

  <?php if($affiliate != ""): ?>
  <script>
    google.charts.load('current', {'packages':['line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      $('html, body').animate({
        scrollTop: $("#page_scroll").offset().top
    }, 2000);
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Quarter');
      <?php foreach($graph_data["columns"] as $column): ?>
      <?php echo 'data.addColumn("number", "'.$column.'");'; ?>
      <?php endforeach; ?>

      data.addRows(<?php echo json_encode($graph_data["rows"], JSON_PRETTY_PRINT); ?>);

      var options = {
        /* chart: {
          title: 'Box Office Earnings in First Two Weeks of Opening',
          subtitle: 'in millions of dollars (USD)'
        }, */
        width: "100%",
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('chart_divnul'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
  <?php endif; ?>