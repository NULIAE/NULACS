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
        <div class="h2 tittle">Cumulative Workforce Development Report</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
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
          <div class="table-responsive" id="cum_work_dev_rep">
          <table  class="table table1 tblpcpr4" id="tbl_cum_work_dev_rep">
                  <thead>
                    <tr>
                      <th>Year</th>
                      <th># CLIENTS WHO RECEIVED COUNSELING</th>
                      <th>NUMBER OF PARTICIPANTS IN EMPLOYMENT/WORKFORCE DEVELOPMENT PROGRAMS (EXCLUDE WELFARE RECIPIENTS)?</th>
                      <th>NUMBER OF PARTICIPANTS PLACED IN JOBS</th>
                      <th>ANNUAL SALARY (IF APPLICABLE)</th>
                      <th>OR HOURLY WAGE RATE</th>
                      <th>NUMBER OF WELFARE PARTICIPANTS IN FEDERAL/STATE FUNDED PROGRAMS</th>
                      <th>NUMBER OF WELFARE PROGRAM PARTICIPANTS PLACED IN JOBS</th>
                      <th>ANNUAL WELFARE SALARY (IF APPLICABLE)</th>
                      <th>OR HOURLY WAGE RATE (WELFARE)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_reports/affiliate_workforce_query_report")."?year=".$data['year'];?>"><?= $data['year']; ?></a></td>
                      <td><?php if($data['coun'] != '') { ?><?= number_format($data['coun']); ?> <?php } ?></td>
                      <td><?php if($data['empl_wrk'] != '') { ?><?= number_format($data['empl_wrk']); ?> <?php } ?></td>
                      <td><?php if($data['placed'] != '') { ?><?= number_format($data['placed']); ?> <?php } ?></td>
                      <td><?php if($data['annsal'] != '') { ?><?= "$".number_format($data['annsal'], 2); ?> <?php } ?></td>
                      <td><?php if($data['hour_rate'] != '') { ?><?= "$".number_format($data['hour_rate'], 2); ?> <?php } ?></td>
                      <td><?php if($data['wel_prt'] != '') { ?><?= number_format($data['wel_prt']); ?> <?php } ?></td>
                      <td><?php if($data['wel_placed'] != '') { ?><?= number_format($data['wel_placed']); ?> <?php } ?></td>
                      <td><?php if($data['wel_sal'] != '') { ?><?= "$".number_format($data['annsal'], 2); ?> <?php } ?></td>
                      <td><?php if($data['wel_hour'] != '') { ?><?= "$".number_format($data['wel_hour'], 2); ?> <?php } ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'coun'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'empl_wrk'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'placed'))); ?>
                        </b></td>
                      <td><b>$
                      <?php echo number_format(array_sum(array_filter(array_column($report, 'annsal')))/count(array_filter(array_column($report, 'annsal'))),2); ?>
                        </b></td>
                      <td><b>$
                      <?php echo number_format(array_sum(array_filter(array_column($report, 'hour_rate')))/count(array_filter(array_column($report, 'hour_rate'))),2); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'wel_prt'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'wel_placed'))); ?>
                        </b></td>
                      <td><b>$
                      <?php echo number_format(array_sum(array_filter(array_column($report, 'wel_sal')))/count(array_filter(array_column($report, 'wel_sal'))),2); ?>
                        </b></td>
                      <td><b>$
                      <?php echo number_format(array_sum(array_filter(array_column($report, 'wel_hour')))/count(array_filter(array_column($report, 'wel_hour'))),2); ?>
                        </b></td>
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