<style>

#people_served p{
  height:45px;
}
table.dataTable thead .sorting::after,
table.dataTable thead .sorting_asc::after {
    display:none;
}

table.dataTable thead .sorting_desc::after {
    display:none;
}

table.dataTable thead .sorting {
   background-image: url(https://datatables.net/media/images/sort_both.png);
   background-repeat: no-repeat;
   background-position: center right;
}

table.dataTable thead .sorting_asc {
   background-image: url(https://datatables.net/media/images/sort_asc.png);
   background-repeat: no-repeat;
   background-position: center right;
}

table.dataTable thead .sorting_desc {
   background-image: url(https://datatables.net/media/images/sort_desc.png);
   background-repeat: no-repeat;
   background-position: center right;
}

</style>
<main>
    <div class="mainWrap">

      <div class="container">
        <div class="h2 tittle">Census Affiliate Workforce Query Report</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
            <div class="col-lg-3 col-md-5">
            <div class="form-group">
                <label for="year">Year</label>
                <select class="form-select" aria-label="year" id="year" name="year">
                <?php 
                    $get = $this->input->get();
                    $yearAll = 0;
                    if($get){
                      $yearAll = 1; 
                    }
                    else{
                      $yearAll = date("Y");
                    } 
                ?>
                <option value="" <?php if($yearAll) echo "selected"; ?>>Any</option>
                  <?php 
                    for($i=2010;$i<=date("Y");$i++){
                  ?>
                  <option value="<?=$i?>" <?php if($i == $year_selected) echo "selected"; ?> > <?=sprintf("%02d",$i)?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-lg-5 col-md-5">
            <div class="form-group">
                <label for="status"> Affiliate</label>
                <select class="form-select" aria-label="Affiliate" name="affiliate" id="affiliate">
                  <option value="">-Any-</option>
                   <?php foreach($affiliate as $aff): ?>
                    <option value="<?php echo $aff['field_affiliate_select_value']; ?>">
                      <?php echo $aff['organization']; ?>
                    </option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-lg-8 col-md-9">
              <div class="form-group formclassbtn">
                <button id="submit" class="btn btn-primary m-r-15 btn-rounded">APPLY</button>
                <button onclick="myFunction()" class="btn btn-danger btn-rounded">CANCEL</button>
              </div>
            </div>
          
          </div>
        </form>  
        </div>

        <div class="tabilCard NulCard">
          <div class="table-responsive" id="aff_wrk_qr_rep">
          <table  class="table table1 tblpcpr4" id="tbl_aff_wrk_qr_rep">
                  <thead>
                    <tr>
                      <th>Year</th>
                      <th>Affiliate</th>
                      <th># clients who received counseling</th>
                      <th>Number of participants in employment/workforce development programs (exclude welfare recipients)?</th>
                      <th>Number of participants placed in jobs</th>
                      <th>Annual salary (if applicable)</th>
                      <th>or Hourly wage rate</th>
                      <th>Number of welfare participants in federal/state funded programs</th>
                      <th>Number of welfare program participants placed in jobs</th>
                      <th>Annual welfare salary (if applicable)</th>
                      <th>or Hourly wage rate (welfare)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['year']; ?></td>
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/view");?>"><?= $data['org']; ?></a></td>                      
                      <td><?php if($data['coun'] != '') { ?><?= number_format($data['coun']); ?> <?php } ?></td>                     
                      <td><?php if($data['empl_wrk'] != '') { ?><?= number_format($data['empl_wrk']); ?> <?php } ?></td>                     
                      <td><?php if($data['placed'] != '') { ?><?= number_format($data['placed']); ?> <?php } ?></td>                   
                      <td><?php if($data['annsal'] != '') { ?><?= "$".number_format($data['annsal']); ?> <?php } ?></td>                
                      <td><?php if($data['hour_rate'] != '') { ?><?= "$".number_format($data['hour_rate'], 2); ?> <?php } ?></td>                   
                      <td><?php if($data['wel_prt'] != '') { ?><?= number_format($data['wel_prt']); ?> <?php } ?></td>                                      
                      <td><?php if($data['wel_placed'] != '') { ?><?= number_format($data['wel_placed']); ?> <?php } ?></td>                          
                      <td><?php if($data['wel_sal'] != '') { ?><?= "$".number_format($data['wel_sal'], 2); ?> <?php } ?></td>                            
                      <td><?php if($data['wel_hour'] != '') { ?><?= "$".number_format($data['wel_hour'], 2); ?> <?php } ?></td>    
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'coun'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'empl_wrk'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'placed'))); ?></b></td>
                      <td><b>$<?= number_format(array_sum(array_filter(array_column($report, 'annsal')))/count(array_filter(array_column($report, 'annsal'))),2);?></b></td>
                      <?php if ( count ( array_filter ( array_column ( $report, 'hour_rate' ) ) ) != 0 ) { ?>
                      <td><b>$<?= number_format(array_sum(array_filter(array_column($report, 'hour_rate')))/count(array_filter(array_column($report, 'hour_rate'))),2);?></b></td>
                      <?php } else { ?> 
                      <td><b>0</b></td>
                      <?php } ?>
                      <td><b><?= number_format(array_sum(array_column($report, 'wel_prt'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'wel_placed'))); ?></b></td>
                      <td><b>$<?= number_format(array_sum(array_filter(array_column($report, 'wel_sal')))/count(array_filter(array_column($report, 'wel_sal'))),2);?></b></td>
                      <td><b>$<?= number_format(array_sum(array_filter(array_column($report, 'wel_hour')))/count(array_filter(array_column($report, 'wel_hour'))),2);?></b></td>
                    </tr>
                    <tr>
                    <td><a href="<?php echo base_url("module/census_reports/affiliate_workforce_query_report/export")."?year=".$data['year']."&org=".$data['org_id']; ?>"><button>XLS</button></a></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  </tfoot>
                </table>            
          </div>
        </div>

      </div>
    </div>

  </main>


  <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.tblpcpr4').DataTable({
        paging: false,
        searching: false,
        info: false
      });
    });
  </script>

<script>	
  function myFunction() {
    event.preventDefault();
    document.getElementById("filter-form").reset();
    $("#submit").click();
  }
</script>