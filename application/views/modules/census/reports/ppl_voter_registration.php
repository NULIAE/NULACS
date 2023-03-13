<style>

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
        <div class="h2 tittle">Census Affiliate Voter Registration Report</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">

          <div class="col-lg-3 col-md-5">
              <div class="form-group">
                <label for="year">Year</label>
                <select class="form-select" aria-label="year" id="year" name="year">
                  <?php 
                    for($i=2010;$i<=date("Y");$i++){
                  ?>
                  <option value="<?=$i?>" <?php if($i == $year_selected) echo "selected"; ?>> <?=sprintf("%02d",$i)?></option>
                  <?php } ?>
                </select>
              </div>
            </div>          
            <div class="col-lg-6 col-md-5">
              <div class="form-group">
                <label for="status"> Affiliate</label>
                <select class="form-select" aria-label="Affiliate" name="affiliate" id="affiliate">
                  <option value="">-All Affiliate-</option>
                  <?php foreach($affiliate as $aff): ?>
                    <option value="<?php echo $aff['field_affiliate_select_value']; ?>">
                      <?php echo $aff['organization']; ?>
                    </option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-md-5">
              <div class="form-group">
                <label for="status">State</label>
                <select class="form-select" aria-label="State" name="state" id="state">
                  <option value="">-Any-</option>
                  <?php foreach($states as $state): ?>
                    <option value="<?php echo $state['stateid']; ?>">
                      <?php echo $state['state']; ?>
                    </option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>            
            <div class="col-lg-8 col-md-9">
              <div class="form-group formclassbtn">
                <button id="submit" class="btn btn-primary m-r-15 btn-rounded">APPLY</button>
                <button class="btn btn-danger btn-rounded">CANCEL</button>
              </div>
            </div>
          
          </div>
        </form>
          
        </div>

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="voter_reg">
                <table  class="table table1 tblpcpr5" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>CITY</th>
                      <th>STATE</th>
                      <th>AFFILIATE</th>
                      <th>TOTAL REGISTERED</th>
                      <th>VOTER REGISTRATION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><?= $data['city']; ?></td>
                      <td><?= $data['state']; ?></td>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/civic"><?= $data['organization']; ?></a></td>
                      <td><?php if($data['voter'] != '') { ?><?= number_format($data['voter']); ?> <?php } ?></td>
                      <td><?= $data['voter_reg']; ?></td>
                    </tr>
                    <?php } ?>                    
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td>Total SUM</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'voter'))); ?></b></td>
                      <td></b></td>
                    </tr>
                  </tfoot>
                </table>          
              </div>
            </div>

      </div>
    </div>

  </main>
  <script>
    $(document).ready(function() {
      $('.tblpcpr5').DataTable({
        paging: false,
        searching: false,
        info: false
      });
    });
  </script>