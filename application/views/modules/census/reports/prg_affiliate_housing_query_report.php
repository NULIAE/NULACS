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
        <div class="h2 tittle">Census Affiliate Housing Query Report</div>
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
          <div class="table-responsive" id="aff_housing_qry_rpt">
          <table  class="table table1 tblpcpr4" id="tbl_housing_qry_rpt">
                  <thead>
                    <tr>
                      <th>Affiliate</th>
                      <th>Year</th>
                      <th>TOTAL PARTICIPANTS</th>
                      <th>ATTEND OR INQUIRY HOME OWNERSHIP</th>
                      <th>PURCHASED A HOME</th>
                      <th>AVERAGE PRICE OF HOMES PURCHASED</th>
                      <th>FORECLOSURES PREVENTED</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/housing");?>"><?= $data['org']; ?></a></td>
                      <td><?= $data['year']; ?></td>                
                      <td><?php if($data['tot'] != '') { ?><?= number_format($data['tot']); ?> <?php } ?></td>
                      <td><?php if($data['att'] != '') { ?><?= number_format($data['att']); ?> <?php } ?></td>
                      <td><?php if($data['purchase'] != '') { ?><?= number_format($data['purchase']); ?> <?php } ?></td>
                      <td><?php if($data['avgprice'] != '') { ?><?= "$".number_format($data['avgprice'], 2); ?> <?php } ?></td>
                      <td><?php if($data['closed'] != '') { ?><?= number_format($data['closed']); ?> <?php } ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'tot'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'att'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'purchase'))); ?>
                        </b></td>
                      <td><b>$
                        <?= number_format(array_sum(array_filter(array_column($report, 'avgprice')))/count(array_filter(array_column($report, 'avgprice'))),2); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'closed'))); ?>
                        </b></td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url("module/census_reports/affiliate_housing_query_report/export"); ?>"><button>XLS</button></a></td>
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