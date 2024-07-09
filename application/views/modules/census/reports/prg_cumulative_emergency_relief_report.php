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
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<main>
    <div class="mainWrap">
      <div class="container">
        <div class="h2 tittle">Cumulative Emergency Relief Report</div>
        <!-- <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
            <div class="col-lg-5 col-md-5">
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
            <div class="col-lg-8 col-md-9">
              <div class="form-group formclassbtn">
                <button id="submit" class="btn btn-primary m-r-15 btn-rounded">APPLY</button>
                <button onclick="myFunction()" class="btn btn-danger btn-rounded">CANCEL</button>
              </div>
            </div>
          
          </div>
        </form>  
        </div> -->
        <div class="tabilCard NulCard">
          <div class="table-responsive" id="cum_work_dev_rep">
          <table  class="table table1 tblpcpr4" id="tbl_cum_work_dev_rep">
                  <thead>
                    <tr>
                      <th>Year</th>
                      <th>Education</th>
                      <th>Employment Empowerment</th>
                      <th>Health</th>
                      <th>Civic Engagement</th>
                      <th>Racial Justice</th>
                      <th>Total Served</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($report as $data){ ?>
                    <tr>
                      <?php $total_served = $data['edu'] + $data['empl'] + $data['health'] + $data['civic'] + $data['justice'];
                            $total_served_arr[] = $total_served;?>
                      <td><?= $data['year']; ?></td>
                      <td><?php if($data['edu'] != '') { ?><?= number_format($data['edu']); ?> <?php } ?></td>
                      <td><?php if($data['empl'] != '') { ?><?= number_format($data['empl']); ?> <?php } ?></td>
                      <td><?php if($data['health'] != '') { ?><?= number_format($data['health']); ?> <?php } ?></td>
                      <td><?php if($data['civic'] != '') { ?><?= number_format($data['civic']); ?> <?php } ?></td>
                      <td><?php if($data['justice'] != '') { ?><?= number_format($data['justice']); ?> <?php } ?></td>
                      <td><?php if($total_served != '') { ?><?= number_format($total_served); ?> <?php } ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'edu'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'empl'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'health'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'civic'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'justice'))); ?>
                        </b></td>
                        <td>
                            <b><?= number_format(array_sum($total_served_arr)); ?></b>
                        </td>
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