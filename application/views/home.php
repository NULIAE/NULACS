<style>
.btn-round-ib{
  background-color: #fff;
}
.btn-round-ib.active{
  box-shadow : 0 0 0px 0.2rem #a10707 !important;
} 
</style>
<main class="exeDashboard">
    <div class="container">
       <div class="Wrapper">
        
        <div class="row justify-content-end date">
						<div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> 
						<span class="ib-m font-weight-normal"><?php echo date('l F d, Y'); ?></span></div>
         </div>
         <div style="display: none;" class="chartBody2"></div>
         <div class="row justify-content-between">
             <div class="col-lg-11">
                <div class="row headOuter">
                    <div class="head">
                        <h3>Affiliate Compliance</h3>
                    </div>
                </div>
                <div class="row chartBody">
                    <div id="myChart2" style="width: 600px; height: 410px;"></div>
                    <!-- <canvas id="myChart2" width="300" height="200"></canvas> -->
                </div>
             </div>
             <div class="col-lg-11">
                <div class="row headOuter">
                    <div class="head">
                        <h3>Performance score</h3>
                    </div>
                </div>
                <div class="row chartBody">
                    <div id="myChart" style="width: 600px; height: 410px;"></div>
                </div>
            </div>
         </div>

         <div class="row justify-content-between mt-3 py-3">
                <div class="col-sm-18 p-0">
                  <div class="textIcons">
                    <a class="btn btn-round-ib ml-0 btnSort" data-status="Indeterminate" data-rel="tooltip" data-placement="bottom" title="Indeterminate"><i class="i i-Indeterminate inter"></i><span class="sr-only">Indeterminate</span></a>
                    <a class="btn btn-round-ib btnSort" data-status="i-compliant" data-rel="tooltip" data-placement="bottom" title="Compliance"><i class="i i-compliant cmplt"></i><span class="sr-only">Compliance</span></a>
                    <a class="btn btn-round-ib btnSort" data-status="Non-Compliant" data-rel="tooltip" data-placement="bottom" title="Non Compliance"><i class="i i-non-compliant n-cmplt"></i><span class="sr-only">Non Compliance</span></a>
                    <a class="btn btn-round-ib btnSort" data-status="Waiting" data-rel="tooltip" data-placement="bottom" title="Waiting"><i class="i i-waiting wait"></i><span class="sr-only">Waiting</span></a>
                    
                 </div>
              </div>
              <div class="col-sm-4">
								<form id="search-form" action="<?php echo base_url('home/filter_affiliates');?>"></form>
                    <div class="search-box d-none d-sm-block">
                      <label class="sr-only" for="input-search">Search</label>
                      <input type="text" placeholder="Search" class="form-control input" id="input-search" name="search" value="" />
                      <div class="btn2" data-rel="tooltip" data-placement="bottom" title="Search">
                        <i class="i i-search" aria-hidden="true"></i>
                      </div>
                    </div>
                    <!-- <div class="search-box d-block d-sm-none m-b-20">
                   <input type="text" placeholder="Search" class="form-control input mob" id="input-search" name="search" >
                 </div> -->
								</form>
              </div>
         </div>

         <div class="row">

          <div class="pane112 w-100 pt-0">
           <?php // set the month array
						$quarterArray = array(
              '1' => 'JAN - MAR',
              '2' => 'APR - JUN',
              '3' => 'JUL - SEP',
              '4' => 'OCT - DEC',
            );?>
            <table class="table table1" id="table11">
              <thead>
                <tr>
                  <th scope="col" class="text-left">AFFILIATE NAME</th>
                  <!-- <th scope="col">Contact Name</th> -->
                  <th scope="col" data-orderable="false">Quarter</th>
                  <th scope="col">Year</th>
                  <th scope="col" data-orderable="false">Compliance Status</th>
                  <th scope="col">Performance Score</th>
                  <th scope="col" class="pl-0">last Site Visit</th>
                </tr>
              </thead>
              <tbody id="table-body">
								<?php if(!empty($affiliates)):?>
									<?php foreach($affiliates as $row): ?>
									<tr>
									<td scope="row" class="t-l-c"><a href="<?php echo base_url('module/affiliate/status/details/'.$row["affiliate_id"]); ?>"><?php echo $row['city'].', '.$row['state']; ?></a></td>
									<!-- <td>Ms. A BCD</td> -->
									<td><?php if(isset($row['compliance_status'])) echo $quarterArray[$row['compliance_status']['quarter']]; ?></td>
									<td><?php if(isset($row['compliance_status'])) echo $row['compliance_status']['year']; ?></td>
                  <?php if(isset($row['compliance_status'])): ?>
									  <td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="<?php echo $row['compliance_status']['status_name']; ?>"><?php echo $row['compliance_status']['icon']; ?></div></td>
                  <?php else: ?>
                    <td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Indeterminate"><i class="i i-Indeterminate inter"></i></div></td>
									<?php endif; ?>
                  <td class="f-b"></td>
									<td><?php echo isset($row['last_login']) ? date("m-d-Y | H:i", strtotime($row['last_login'])) : ""; ?></td>
									</tr>
									<?php endforeach; ?>
								<?php else: ?>
								<tr>
									<td scope="row" class="text-center" colspan="6"> No data found!</td>
								</tr>
								<?php endif;?>
              
              </tbody>
          </table>
            
          </div>

            <!-- <div class="row justify-content-end w-100 pt-3 pb-5 m-0">
               
                <a href="<?php echo base_url('module/affiliate/status');?>" class="btn btn-primary btn-rounded btn-action-lg" data-rel="tooltip" data-placement="bottom" title="All Affiliates">
								<i class="i i-right"></i><span class="sr-only">All Affiliates</span>
								</a> 
              
            </div> -->

         </div>

        </div>
    </div>
    
</main>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawDonutChart);
  google.charts.setOnLoadCallback(drawBarChart);
  function drawDonutChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', '# of Votes'],
      ['Complaint - Stable 60 ',     60],
      ['Probation-Unstable 10',      10],
      ['Non-Complaint - Watchlist 20',  20],
      ['Crisis List - Merger - Disaffiliation 10', 10]
    ]);

    var options = {
      pieHole: 0.4,
      colors: ['#60c76e','#4eb8f7', '#eae870', '#f0594d'],
      legend:{position: 'top', maxLines: 3}
    };

    var chart = new google.visualization.PieChart(document.getElementById('myChart2'));
    chart.draw(data, options);
  }
  
  function drawBarChart() {
      var data = google.visualization.arrayToDataTable([
        ["", "Votes", { role: "style" } ],
        ["60-100", 50, "#60c76e"],
        ["40-60", 10, "#4eb8f7"],
        ["20-40", 30, "#eae870"],
        ["0-20", 10, "#f0594d"]
      ]);

      var options = {
        title: "# of Votes",
        orientation: 'horizontal',
        legend: { position: "none" },
        animation:{
          duration: 1000,
          easing: 'out',
          startup: true
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById("myChart"));
      chart.draw(data, options);
  }
</script>
<script id="template" type="x-tmpl-mustache">
{{#affiliates}}
<tr>
	<td scope="row" class="t-l-c"><a href="{{link}}">{{city}},{{state}}</a></td>
	<td>{{currentQuarter}}</td>
	<td>{{currentYear}}</td>
	<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="{{statusName}}">{{{statusIcon}}}</div></td>
	<td></td>
	<td>{{lastLogin}}</td>
</tr>
{{/affiliates}}
{{^affiliates}}
<tr>
	<td scope="row" colspan="6">No affiliates found!</td>
</tr>
{{/affiliates}}
</script>
