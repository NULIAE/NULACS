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
        if (strpos($_SERVER['REQUEST_URI'], "choose_affiliate_tb") !== false){
          $secondTbab = 1;
        }else{
          $secondTbab = 0;
        }
        ?>
        <div class="mainTabAll">
          <nav>
            <div class="nav" id="nav-tab" role="tablist">
              <a class="nav-item nav-link <?=$secondTbab==0?'active':''?>" id="nav-x1-tab" data-toggle="tab" href="#nav-x1" role="tab"
                aria-controls="nav-x1" aria-selected="true">All Affiliates</a>
              <a class="nav-item nav-link <?=$secondTbab==1?'active':''?>" id="nav-x2-tab" data-toggle="tab" href="#nav-x2" role="tab"
                aria-controls="nav-x2" aria-selected="false">Individual Affiliate</a>
            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade <?=$secondTbab==0?' active show':''?> " id="nav-x1" role="tabpanel" aria-labelledby="nav-x1-tab">

            <form  action="<?php echo base_url('module/filter/reports'); ?>">
                <div class="row m-y-20">
                  <div class="d-flex align-items-center ml-2">Quarter</div>
                  <div class="col-2 col-md-2 col-lg-2"><span class="sub">
                    
                      <select class="form-control selectp-r" name="choose_affiliate" data-type="selector">
                        <option value="">Choose Quarter</option>
                        <!-- <?php foreach($affiliates as $aff) { ?>
                            <option value="<?=$aff['affiliate_id']?>"><?=$aff['name']?></option>
                        <?php } ?> -->
                        <option <?php if(isset($_GET['choose_affiliate'])){
                          if($_GET['choose_affiliate'] == 1){
                            echo "selected";
                          }
                        } ?> value="1">Q1</option>
                        <option <?php if(isset($_GET['choose_affiliate'])){
                          if($_GET['choose_affiliate'] == 2){
                            echo "selected";
                          }
                        } ?> value="2">Q2</option>
                        <option <?php if(isset($_GET['choose_affiliate'])){
                          if($_GET['choose_affiliate'] == 3){
                            echo "selected";
                          }
                        } ?> value="3">Q3</option>
                        <option <?php if(isset($_GET['choose_affiliate'])){
                          if($_GET['choose_affiliate'] == 4){
                            echo "selected";
                          }
                        } ?> value="4">Q4</option>
                      </select>
    
                    </span></div>
                  <div class="col-6 col-md-6 col-lg-3">
                    <div class="yearPick">
                      <i class="i i-year-pick"></i>
                      <input class="yearpick form-control" value="<?php if(isset($_GET['choose_yr'])){
                          echo $_GET['choose_yr'];
                        } ?>" name="choose_yr"  type="text">
                    </div>
                  </div>
    
                  <div class="col-12  col-md-6 col-lg-3">
                  <input type="submit" class="btn btn-primary btn-rounded min w-100px" value="SEARCH">
                  </div>
                </div>
              </form>

              <div class="row">

                <div class="pane113 w-100">

                  <table class="table table1" id="#table11">
                    <thead>
                      <tr>
                        <th scope="col">Affiliates </th>
                        <th scope="col">Liquidity</th>
                        <th scope="col">Current Ratio</th>
                        <th scope="col">Current Debt Ratio</th>
                        <th scope="col">Change in Cash YTD</th>
                        <th scope="col">OE Program</th>
                        <th scope="col">OE Admin</th>
                        <th scope="col">OE Fundraising</th>
                        <th scope="col">Change in N/A</th>
                        <th scope="col">Days in Cash</th>
                        <th scope="col">Change in # of Grants TY YTD-LY YTD</th>
                        <th scope="col">Change in $ of Grants TY YTD -LY YTD</th>
                        <th scope="col">Net assets</th>
                        <th scope="col">Board Giving variance commitment - YTD</th>
                        <th scope="col">Operating Reserves</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($key_indicators as $ki){ $indicators = json_decode($ki['indicators'], true); ?>
                            <tr>
                              <td scope="row" class="t-l-c"><?=$ki['name']?></td>
                              <td><?=isset($indicators['liquidity']) ? $indicators['liquidity'] : 0; ?></td>
                              <td><?=isset($indicators['current_ratio']) ? $indicators['current_ratio'] : 0;?></td>
                              <td><?=isset($indicators['current_debt_ratio']) ? $indicators['current_debt_ratio'] : 0;?></td>
                              <td><?=isset($indicators['change_in_cash_ytd']) ? $indicators['change_in_cash_ytd'] : 0;?></td>
                              <td><?=isset($indicators['operating_efficiency_program_value']) ? $indicators['operating_efficiency_program_value'] : 0; ?></td>
                              <td><?=isset($indicators['operating_efficiency_admin_value']) ? $indicators['operating_efficiency_admin_value'] : 0; ?></td>
                              <td><?=isset($indicators['operating_efficiency_fundraising_value']) ? $indicators['operating_efficiency_fundraising_value'] : 0; ?></td>
                              <td><?=isset($indicators['change_in_net_assets_in_quarter']) ? $indicators['change_in_net_assets_in_quarter'] : 0; ?></td>
                              <td><?=isset($indicators['days_in_cash']) ? $indicators['days_in_cash'] : 0; ?></td>
                              <td><?=isset($indicators['change_in_grant_ty_ytd']) ? $indicators['change_in_grant_ty_ytd'] : 0; ?></td>
                              <td><?=isset($indicators['change_in_grant_ly_ytd']) ? $indicators['change_in_grant_ly_ytd'] : 0; ?></td>
                              <td><?=isset($indicators['change_in_net_assets_in_quarter']) ? $indicators['change_in_net_assets_in_quarter'] : 0; ?></td>
                              <td><?=isset($indicators['borad_giving']) ? $indicators['borad_giving'] : 0; ?></td>
                              <td><?=isset($indicators['operating_reserves_amount']) ? $indicators['operating_reserves_amount'] : 0; ?></td>
                            </tr>
                            <?php } ?>
                      
                     

                    </tbody>
                  </table>

                </div>

              </div>

              <!-- <div class="row mb-5">
                <div class="col-24 d-flex justify-content-center mb-3 secondSelection">
                  <select class="form-control selectp-r" data-type="selector">
                    <option>Akron, OH</option>
                    <option>Q 2</option>
                    <option>Q 3</option>
                  </select>
                </div>
              </div> -->

            </div>

            <div class="tab-pane fade active <?=$secondTbab==1?'show':''?>" id="nav-x2" role="tabpanel" aria-labelledby="nav-x2-tab">


              

              <div class="row m-y-20">
                <div class="col-4 col-md-4 col-lg-4 secondSelection">
                  <span class="sub">
                  <select onchange="window.location.href = '<?php echo base_url();?>/module/filter/reports?choose_affiliate_tb=' + this.value;" class="form-control selectp-r" data-type="selector">
                    <option>Choose Affiliate</option>
                    <?php foreach($affiliates as $aff) { ?>
                        <option <?php if(isset($_GET['choose_affiliate_tb'])){
                          if($_GET['choose_affiliate_tb'] == $aff['affiliate_id']){
                            echo "selected";
                          }
                        } ?>   value="<?=$aff['affiliate_id']?>"><?=$aff['name']?></option>
                    <?php } ?>
                  </select>
                  
                  </span>
                </div>

                <div class="col-12  col-md-6 col-lg-3">
                <!-- <a class="btn btn-primary btn-rounded min w-100px">SEARCH</a> -->
                </div>
              </div>
              <div class="affiliateQty">

                <div class="cdnWrap">
                  <div class="accordion" id="accordionExample">

                    <div class="pane1Qty">

                    <table class="table table-condensed table-striped">
                      <thead>
                          <tr>
                              <th scope="col">Affiliates </th>
                              <th scope="col">Liquidity</th>
                              <th scope="col">Current Ratio</th>
                              <th scope="col">Current Debt Ratio</th>
                              <th scope="col">Change in Cash YTD</th>
                              <th scope="col">OE Program</th>
                              <th scope="col">OE Admin</th>
                              <th scope="col">OE Fundraising</th>
                              <th scope="col">Change in N/A</th>
                              <th scope="col">Days in Cash</th>
                              <th scope="col">Change in # of Grants TY YTD-LY YTD</th>
                              <th scope="col">Change in $ of Grants TY YTD -LY YTD</th>
                              <th scope="col">Net assets</th>
                              <th scope="col">Board Giving variance commitment - YTD</th>
                              <th scope="col">Operating Reserves</th>
                          </tr>
                      </thead>

                      <tbody>
                      <?php if(isset($ind_affiliate_yr)){
                        foreach($ind_affiliate_yr as $key=> $iay){
                          ?>
                      <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle collapsed" aria-expanded="false">
                          <td scope="row" class="t-l-c yearToggle" id="tb1">
                          <?php echo $iay['year']; ?>   
                          <!-- <i class="i i-downarrow"></i> -->
                          </td>
                          <!-- <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td>5</td>
                          <td>2</td>
                          <td>2</td>
                          <td>6</td>
                          <td>3</td>
                          <td>2</td>
                          <td>5</td>
                          <td>9</td>
                          <td>6</td>
                          <td>12</td>
                          <td>13</td> -->
                      </tr>
                      <tr>
                          <td colspan="24" class="hiddenRow p-a-0">
                            <div class="accordian-body collapse" id="demo1" aria-expanded="false" style="height: 0px;">
                                <table class="table table-striped tablebgclr">
																<?php $arrayForChart= [
																	['Month'],
																	['Liquidity'],
																	['Current Ratio'],
																	['Current Debt Ratio'],
																	['Change in Cash YTD'],
																	['OE Program'],
																	['OE Admin'],
																	['OE Fundraising'],
																	['Change in N/A'],
																	['Days in Cash'],
																	['Change in # of Grants TY YTD-LY YTD'],
																	['Change in $ of Grants TY YTD -LY YTD'],
																	['Net assets'],
																	['Board Giving variance commitment - YTD'],
																	['Operating Reserves']
																];
																$index = 0;
																?>
                                <?php if(isset($ind_affiliate)){
                                  foreach($ind_affiliate as $ia){
																		$index++;
                                    if($iay['year'] == $ia['year']){
                                      $report = json_decode($ia['indicators'], true);
                                    ?>
                                    <tr>
                                        <td><?php $arrayForChart[0][$index] = "Q".$ia['quarter']; echo $arrayForChart[0][$index]; ?></td>
                                        <td><?php $arrayForChart[1][$index] = isset($report['liquidity']) ? (int)$report['liquidity'] : 0; echo $arrayForChart[1][$index]; ?></td>
                                        <td><?php $arrayForChart[2][$index] = isset($report['current_ratio']) ? (int)$report['current_ratio'] : 0; echo $arrayForChart[2][$index]; ?></td>
                                        <td><?php $arrayForChart[3][$index] = isset($report['current_debt_ratio']) ? (int)$report['current_debt_ratio'] : 0; echo $arrayForChart[3][$index]; ?></td>
                                        <td><?php $arrayForChart[4][$index] = isset($report['change_in_cash_ytd']) ? (int)$report['change_in_cash_ytd'] : 0; echo $arrayForChart[4][$index]; ?></td>
                                        <td><?php $arrayForChart[5][$index] = isset($report['operating_efficiency_program_value']) ? (int)$report['operating_efficiency_program_value'] : 0; echo $arrayForChart[5][$index]; ?></td>
                                        <td><?php $arrayForChart[6][$index] = isset($report['operating_efficiency_admin_value']) ? (int)$report['operating_efficiency_admin_value'] : 0; echo $arrayForChart[6][$index]; ?></td>
                                        <td><?php $arrayForChart[7][$index] = isset($report['operating_efficiency_fundraising_value']) ? (int)$report['operating_efficiency_fundraising_value'] : 0; echo $arrayForChart[7][$index]; ?></td>
                                        <td><?php $arrayForChart[8][$index] = isset($report['change_in_net_assets_in_quarter']) ? (int)$report['change_in_net_assets_in_quarter'] : 0; echo $arrayForChart[8][$index]; ?></td>
                                        <td><?php $arrayForChart[9][$index] = isset($report['days_in_cash']) ? (int)$report['days_in_cash'] : 0; echo $arrayForChart[9][$index]; ?></td>
                                        <td><?php $arrayForChart[10][$index] = isset($report['change_in_grant_ty_ytd']) ? (int)$report['change_in_grant_ty_ytd'] : 0; echo $arrayForChart[10][$index]; ?></td>
                                        <td><?php $arrayForChart[11][$index] = isset($report['change_in_grant_ly_ytd']) ? (int)$report['change_in_grant_ly_ytd'] : 0; echo $arrayForChart[11][$index]; ?></td>
                                        <td><?php $arrayForChart[12][$index] = isset($report['change_in_net_assets_in_quarter']) ? (int)$report['change_in_net_assets_in_quarter'] : 0; echo $arrayForChart[12][$index]; ?></td>
                                        <td><?php $arrayForChart[13][$index] = isset($report['borad_giving']) ? (int)$report['borad_giving'] : 0; echo $arrayForChart[13][$index]; ?></td>
                                        <td><?php $arrayForChart[14][$index] = isset($report['operating_reserves_amount']) ? (int)$report['operating_reserves_amount'] : 0; echo $arrayForChart[14][$index]; ?></td>
                                    </tr>
                                    <?php
                                  }}
                                } ?>
                                </table>
                            </div>
                          </td>
                      </tr>
                              <?php } } ?>
                      </tbody>
                      </table>
                    </div>

                  </div>

                </div>

              </div>
              
             
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <div id="chart_divnul" style="width: 1400px; height: 500px;" ></div>
              <br><br><br><br><br><br><br><br>


            </div>


          </div>
        </div>
      </div>

    </div>
    </div>

  </main>


  <script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        /* var data = google.visualization.arrayToDataTable([
          ['Month', 'Q1', 'Q2', 'Q3', 'Q4'],
          ['Liquidity',  165,      938,         522,             998],
          ['Current Ratio',  135,      1120,        599,             1268],
          ['Current Debt Ratio',  157,      1167,        587,             807],
          ['Change in Cash YTD',  139,      1110,        615,             968],
          ['OE Program',  136,      691,         629,             1026],
          ['OE Admin',  165,      938,         522,             998],
          ['OE Fundraising',  135,      1120,        599,             1268],
          ['Change in N/A',  157,      1167,        587,             807],
          ['Days in Cash',  139,      1110,        615,             968],
          ['Change in # of Grants TY YTD-LY YTD',  136,      691,         629,             1026],
          ['Change in $ of Grants TY YTD -LY YTD',  135,      1120,        599,             1268],
          ['Net assets',  157,      1167,        587,             807],
          ['Board Giving variance commitment - YTD',  139,      1110,        615,             968],
          ['Operating Reserves',  136,      691,         629,             1026]
				]); */
				
				var data = google.visualization.arrayToDataTable(<?php echo json_encode($arrayForChart, JSON_PRETTY_PRINT); ?>);

        var options = {
          title : 'KPI Reports',
          vAxis: {title: 'Values'},
          hAxis: {title: 'Labels'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_divnul'));
        chart.draw(data, options);
      }
  </script>

