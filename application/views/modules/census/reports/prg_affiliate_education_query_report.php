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
        <div class="h2 tittle">Census Affiliate Education Query Report</div>
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
          <div class="table-responsive" id="aff_edu_qry_report">
          <table  class="table table1 tblpcpr4" id="tbl_people_served">
                  <thead>
                    <tr>
                      <th>Affiliate</th>
                      <th>Year</th>
                      <th>Total Participants</th>
                      <th># Promoted to next grade</th>
                      <th>% Graduated from high school</th>
                      <th>% Submitted college application(s)</th>
                      <th>Overall value of the scholarships</th>
                      <th>Average value of scholarships</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/education_program");?>"><?= $data['org']; ?></a></td>
                      <td><?= $data['year']; ?></td>
                      <td><?php if($data['total'] != '') { ?><?= number_format($data['total']); ?> <?php } ?></td>
                      <td><?php if($data['promo'] != '') { ?><?= number_format($data['promo']); ?> <?php } ?></td> 
                      <td><?php if($data['grad'] != '') { ?><?= number_format($data['grad'])."%"; ?> <?php } ?></td> 
                      <td><?php if($data['clapp'] != '') { ?><?= number_format($data['clapp'])."%"; ?> <?php } ?></td> 
                      <td><?php if($data['scholar'] != '') { ?><?= "$".number_format($data['scholar'], 2); ?> <?php } ?></td> 
                      <td><?php if($data['avg'] != '') { ?><?= "$".number_format($data['avg'], 2); ?> <?php } ?></td> 
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
      <td></td>
      <td></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'total'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'promo'))); ?>
        </b></td>
       <td><b>
          <?= number_format(array_sum(array_column($report, 'grad'))/count(array_filter(array_column($report, 'grad')))); ?>%
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'clapp'))/count(array_filter(array_column($report, 'clapp')))); ?>%
        </b></td>
      <td><b>$
          <?= number_format(array_sum(array_column($report, 'scholar')),2); ?>
        </b></td>
      <td><b>$
          <?php echo number_format(array_sum(array_filter(array_column($report, 'avg')))/count(array_filter(array_column($report, 'avg'))),2); ?>
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
