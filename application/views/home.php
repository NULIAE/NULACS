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
                <div class="row chartBody p-0">
                    <div id="myChart2" style="width: 700px; height: 410px;"></div>
                    <!-- <canvas id="myChart2" width="300" height="200"></canvas> -->
                </div>
             </div>
             <div class="col-lg-11">
                <div class="row headOuter">
                    <div class="head">
                        <h3>Performance score</h3>
                    </div>
                </div>
                <div class="row chartBody p-0">
                    <div id="myChart" style="width: 700px; height: 410px;"></div>
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
            );
            $score_count = array(
              'poor' => 0,
              'below_avg' => 0,
              'average' => 0,
              'strong' => 0,
              'outstanding' => 0
            );
            $compliance_count = array(
              'compliant' => 0,
              'non_compliant' => 0,
              'waiting' => 0,
              'indeterminate' => 0
            );
            ?>
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
                    <?php 
                      $compliance_status = $row['compliance_status']['status_name'];
                      if($compliance_status == "Compliant") 
                        $compliance_count['compliant']++;
                      elseif($compliance_status == "Non-Compliant")
                        $compliance_count['non_compliant']++;
                      elseif($compliance_status == "Waiting")
                        $compliance_count['waiting']++; 
                      else
                        $compliance_count['indeterminate']++; 
                    ?>
									  <td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="<?php echo $compliance_status; ?>"><?php echo $row['compliance_status']['icon']; ?></div></td>
                  <?php else: ?>
                    <?php $compliance_count['indeterminate']++; ?>
                    <td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Indeterminate"><i class="i i-Indeterminate inter"></i></div></td>
									<?php endif; ?>
                  <td class="f-b"><?php echo $row['performance_score']; ?></td>
									<td><?php echo isset($row['last_login']) ? date("m-d-Y | H:i", strtotime($row['last_login'])) : ""; ?></td>
									</tr>
                    <?php if($row['performance_score'] != NULL){
                      if($row['performance_score'] <= 1.99)
                        $score_count['poor']++;
                      elseif($row['performance_score'] <= 2.99)
                        $score_count['below_avg']++;
                      elseif($row['performance_score'] <= 3.74)
                        $score_count['average']++;
                      elseif($row['performance_score'] <= 4.99)
                        $score_count['strong']++;
                      else
                        $score_count['outstanding']++;
                    }?>
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
      ['Compliance Status', 'Total'],
      ['Complaint - Stable', <?= $compliance_count['compliant']; ?>],
      ['Probation-Unstable', <?= $compliance_count['non_compliant']; ?>],
      ['Non-Complaint - Watchlist', <?= $compliance_count['waiting']; ?>],
      ['Crisis List - Merger - Disaffiliation', <?= $compliance_count['indeterminate']; ?>]
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
        ["Label", "Score", { role: "style" }],
        ["0 - 1.99 Poor", <?= $score_count['poor']; ?>, "#f0594d"],
        ["2 - 2.99 Below Average", <?= $score_count['below_avg']; ?>, "#fe9248"],
        ["3 - 3.74 Average", <?= $score_count['average']; ?>, "#eae870"],
        ["3.75 - 4.99 Strong", <?= $score_count['strong']; ?>, "#4eb8f7"],
        ["5 - 5.00 Outstanding", <?= $score_count['outstanding']; ?>, "#60c76e"]
      ]);

      var options = {
        orientation: 'horizontal',
        legend: { position: "none" },
        animation:{
          duration: 1000,
          easing: 'out',
          startup: true
        },
        vAxis: {
            title: 'Performance Score',
            ticks: [0, 1, 2, 3, 4, 5]
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
