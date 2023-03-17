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
        <div class="h2 tittle">NUL Census Affiliate Total Contacts</div>
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
          <div class="table-responsive" id="nul_cen_tot_con_break">
          <table  class="table table1 tblpcpr4 table1z" id="tbl_aff_wrk_qr_rep">
                  <thead>
                    <tr>
                      <th>Year</th>
                      <th>Affiliate</th>
                      <th>TOTAL INDIRECT CONTACTS</th>
                      <th>TOTAL PUBLIC CONTACTS</th>
                      <th>TOTAL DIRECT CONTACTS</th>
                      <th>TOTAL CONTACTS</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['year']; ?></td>
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/view");?>"><?= $data['org']; ?></a></td> 
                      <td><?= $data['indirect']; ?></td>
                      <td><?= $data['public']; ?></td>
                      <td><?= $data['direct']; ?></td>
                      <td><?= $data['net']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'indirect'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'public'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'direct'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'net'))); ?></b></td>
                    </tr>
                    <tr>
                    <td><a href="<?php echo base_url("module/census_reports/nul_census_total_contacts_breakdown/export")."?year=".$data['year']; ?>"><button>XLS</button></a></td>
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
