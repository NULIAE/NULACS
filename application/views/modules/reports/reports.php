<main class="all-affiliates">
    <div class="container">
       <div class="Wrapper">
        
        <div class="row justify-content-end date">
            <div class="col t-r"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m font-weight-normal">Tuesday October 06, 2020</span></div>
        </div>

        <div class=" document-mdata">

          <div class="mnHead">
            <h3>KPI Reports</h3>
          </div>
        </div>
        
    
         <div class="mainTabAll">
            <nav>
              <div class="nav" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-x1-tab" data-toggle="tab" href="#nav-x1" role="tab"
                  aria-controls="nav-x1" aria-selected="true">All Affiliates</a>
                <a class="nav-item nav-link" id="nav-x2-tab" data-toggle="tab" href="#nav-x2" role="tab"
                  aria-controls="nav-x2" aria-selected="false">Individual Affiliate</a>
              </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-x1" role="tabpanel" aria-labelledby="nav-x1-tab">
              <form  action="<?php echo base_url('module/filter/reports'); ?>">
                <div class="row m-y-20">
                  <div class="d-flex align-items-center ml-2">Quarter</div>
                  <div class="col-2 col-md-2 col-lg-2"><span class="sub">
                    
                      <select class="form-control selectp-r" name="choose_affiliate" data-type="selector">
                        <option>Choose Affiliate</option>
                        <?php foreach($affiliates as $aff) { ?>
                            <option value="<?=$aff['affiliate_id']?>"><?=$aff['name']?></option>
                        <?php } ?>
                      </select>
    
                    </span></div>
                  <div class="col-6 col-md-6 col-lg-3">
                    <div class="yearPick">
                      <i class="i i-year-pick"></i>
                      <input class="yearpick form-control" name="choose_yr" placeholder="2019" type="text">
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
                              <th scope="col">Change in # of  Grants TY YTD-LY YTD</th>
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
                              <td><?=$indicators['liquidity']?></td>
                              <td><?=$indicators['current_ratio']?></td>
                              <td><?=$indicators['current_debt_ratio']?></td>
                              <td><?=$indicators['current_debt_ratio']?></td>
                              <td><?=$indicators['operating_efficiency_program_value']?></td>
                              <td><?=$indicators['operating_efficiency_admin_value']?></td>
                              <td><?=$indicators['operating_efficiency_fundraising_value']?></td>
                              <td><?=$indicators['change_in_net_assets_in_quarter']?></td>
                              <td><?=$indicators['days_in_cash']?></td>
                              <td><?=$indicators['change_in_grant_ty_ytd']?></td>
                              <td><?=$indicators['change_in_grant_ly_ytd']?></td>
                              <td>6</td>
                              <td><?=$indicators['borad_giving']?></td>
                              <td><?=$indicators['operating_reserves_amount']?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                        
                </div>
                
              </div> 

              <div class="row mb-5">
              
                <div class="col-24 d-flex justify-content-center mb-3 secondSelection">
                  <select onchange="window.location.href = '<?php echo base_url();?>/module/filter/reports?choose_affiliate=' + this.value;" class="form-control selectp-r" data-type="selector">
                    <option>Choose Affiliate</option>
                    <?php foreach($affiliates as $aff) { ?>
                        <option  value="<?=$aff['affiliate_id']?>"><?=$aff['name']?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-24 ">
                 

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <div id="chart_div" ></div>
                    <script>
                          google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawVisualization);

                        function drawVisualization() {
                                // Some raw data (not necessarily accurate)
                                var data = google.visualization.arrayToDataTable([
                                ['Month', 'Report'],
                                <?php if(isset($kpi_report)){
                                foreach($kpi_report as $kp_r){ $indicators = json_decode($kp_r['indicators'], true); ?>
                                ['Liquidity', <?=$indicators['liquidity']?>],
                                ['Current Ratio', <?=$indicators['current_ratio']?>],
                                ['Current Debt Ratio', <?=$indicators['current_debt_ratio']?>],
                                ['Change in Cash YTD', <?=$indicators['current_debt_ratio']?>],
                                ['OE Program', <?=$indicators['operating_efficiency_program_value']?>],
                                ['OE Admin', <?=$indicators['operating_efficiency_admin_value']?>],
                                ['OE Fundraising', <?=$indicators['operating_efficiency_fundraising_value']?>],
                                ['Change in N/A', <?=$indicators['change_in_net_assets_in_quarter']?>],
                                ['Days in Cash', <?=$indicators['days_in_cash']?>],
                                ['Change in # of  Grants TY YTD-LY YTD', <?=$indicators['change_in_grant_ty_ytd']?>],
                                ['Change in $ of Grants TY YTD -LY YTD', <?=$indicators['change_in_grant_ly_ytd']?>],
                                ['Net assets', 10],
                                ['Board Giving variance commitment - YTD', <?=$indicators['borad_giving']?>],
                                ['Operating Reserves', <?=$indicators['operating_reserves_amount']?>]
                                <?php }
                                } ?>
                            ]);
                           
                            var options = {
                            title : 'KPL Report',
                            vAxis: {title: 'Report'},
                            hAxis: {title: 'Variables' , titleTextStyle: {color: 'red'}},
                            colors: ['#17a2b8'],
                            seriesType: 'bars',
                            series: {5: {type: 'line'}}
                            };

                            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                            chart.draw(data, options);
                        }
                    </script>



                    


                </div>
              </div>

              </div>
  
              <div class="tab-pane fade" id="nav-x2" role="tabpanel" aria-labelledby="nav-x2-tab">
  
                <div class="row m-y-20">
                  <div class="col-4 col-md-4 col-lg-4 secondSelection">
                    <span class="sub">
                      <select class="form-control selectp-r" data-type="selector">
                      <option>Choose Affiliate</option>
                        <?php foreach($affiliates as $aff) { ?>
                            <option value="<?=$aff['affiliate_id']?>"><?=$aff['name']?></option>
                        <?php } ?>
                      </select>
    
                    </span>
                  </div>
    
                  <div class="col-12  col-md-6 col-lg-3"><a class="btn btn-primary btn-rounded min w-100px">SEARCH</a>
                  </div>
                </div>

                <div class="affiliateQty">

                  <div class="cdnWrap">
                    <div class="accordion" id="accordionExample">

                              <div class="row pane1Qty">

                                <table class="table table1" id="#tableQty">
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
                                      <th scope="col">Change in # of  Grants TY YTD-LY YTD</th>
                                      <th scope="col">Change in $ of Grants TY YTD -LY YTD</th>
                                      <th scope="col">Net assets</th>
                                      <th scope="col">Board Giving variance commitment - YTD</th>
                                      <th scope="col">Operating Reserves</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                <tr>
                                  <td scope="row" class="t-l-c" id="tb1">
                                    2020
                                    </td>
                                  <td>1</td>
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
                                  <td>13</td>
                                </tr>
                                <tr id="tbo1" class="tbBg">
                                  <td>Q1</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo2" class="tbBg">
                                  <td>Q2</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo3" class="tbBg">
                                  <td>Q3</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo4" class="tbBg">
                                  <td>Q4</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr>
                                  <td scope="row" class="t-l-c" id="tb2">
                                    2019
                                    </td>
                                  <td>1</td>
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
                                  <td>13</td>
                                </tr>
                                <tr id="tbo11" class="tbBg">
                                  <td>Q1</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo12" class="tbBg">
                                  <td>Q2</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo13" class="tbBg">
                                  <td>Q3</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo14" class="tbBg">
                                  <td>Q4</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr>
                                  <td scope="row" class="t-l-c" id="tb3">
                                    2018
                                    </td>
                                  <td>1</td>
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
                                  <td>13</td>
                                </tr>
                                <tr id="tbo1k" class="tbBg">
                                  <td>Q1</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo2k" class="tbBg">
                                  <td>Q2</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo3k" class="tbBg">
                                  <td>Q3</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo4k" class="tbBg">
                                  <td>Q4</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr>
                                  <td scope="row" class="t-l-c" id="tb4">
                                    2017
                                    </td>
                                  <td>1</td>
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
                                  <td>13</td>
                                </tr>
                                <tr id="tbo7k" class="tbBg">
                                  <td>1</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo8k" class="tbBg">
                                  <td>1</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo9k" class="tbBg">
                                  <td>1</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>
                                <tr id="tbo6k" class="tbBg">
                                  <td>1</td>
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
                                  <td>13</td>
                                  <td>13</td>
                                </tr>

                                  </tbody>
                                </table>
                             </div>
                         
                      </div>
                  
                    </div>
                  
                </div>

                  <div class="row mb-5">
                    <div class="col-24 d-flex justify-content-center mb-3 secondSelection">
                      <select class="form-control selectp-r" data-type="selector">
                      <option>Choose Affiliate</option>
                        <?php foreach($affiliates as $aff) { ?>
                            <option value="<?=$aff['affiliate_id']?>"><?=$aff['name']?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-24 mb-3 " >
                      <!-- <div id="chartContainer2" style="height: 450px; width: 100%;"></div> -->
                      <div id="chart_div1" style="height: 450px; width: 100%;"></div>
                    <script>
                          google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawVisualization);

                        function drawVisualization() {
                                // Some raw data (not necessarily accurate)
                                var data = google.visualization.arrayToDataTable([
                                ['Month', 'Report'],
                                <?php if(isset($kpi_report)){
                                foreach($kpi_report as $kp_r){ $indicators = json_decode($kp_r['indicators'], true); ?>
                                ['Liquidity', <?=$indicators['liquidity']?>],
                                ['Current Ratio', <?=$indicators['current_ratio']?>],
                                ['Current Debt Ratio', <?=$indicators['current_debt_ratio']?>],
                                ['Change in Cash YTD', <?=$indicators['current_debt_ratio']?>],
                                ['OE Program', <?=$indicators['operating_efficiency_program_value']?>],
                                ['OE Admin', <?=$indicators['operating_efficiency_admin_value']?>],
                                ['OE Fundraising', <?=$indicators['operating_efficiency_fundraising_value']?>],
                                ['Change in N/A', <?=$indicators['change_in_net_assets_in_quarter']?>],
                                ['Days in Cash', <?=$indicators['days_in_cash']?>],
                                ['Change in # of  Grants TY YTD-LY YTD', <?=$indicators['change_in_grant_ty_ytd']?>],
                                ['Change in $ of Grants TY YTD -LY YTD', <?=$indicators['change_in_grant_ly_ytd']?>],
                                ['Net assets', 10],
                                ['Board Giving variance commitment - YTD', <?=$indicators['borad_giving']?>],
                                ['Operating Reserves', <?=$indicators['operating_reserves_amount']?>]
                                <?php }
                                } ?>
                            ]);
                           
                            var options = {
                            title : 'KPL Report',
                            vAxis: {title: 'Report'},
                            hAxis: {title: 'Variables' , titleTextStyle: {color: 'red'}},
                            colors: ['#17a2b8'],
                            seriesType: 'bars',
                            series: {5: {type: 'line'}}
                            };

                            var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
                            chart.draw(data, options);
                        }
                    </script>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
  
        </div>
    </div>
    
  </main>


  