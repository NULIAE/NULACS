<style>
  #people_served p {
    height: 45px;
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
      <div class="h2 tittle">Census Program Area People Served Query Report</div>
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
                  <option value="<?=$i?>" <?php if($i==$year_selected) echo "selected" ; ?> >
                    <?=sprintf("%02d",$i)?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-lg-5 col-md-5">
              <div class="form-group">
                <label for="status">Program Area</label>
                <select class="form-select" aria-label="Program Area" name="program_area" id="program_area">
                  <option value="">-Any-</option>
                  <?php foreach($program_area as $id=>$area): ?>
                  <option value="<?= $id; ?>">
                    <?= $area; ?>
                  </option>
                  <?php endforeach;?>
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
                <button class="btn btn-danger btn-rounded">CANCEL</button>
              </div>
            </div>

          </div>
        </form>
      </div>

      <div class="tabilCard NulCard">
        <div class="table-responsive" id="people_served">
          <table class="table table1 tblpcpr5" id="tbl_people_served">
            <thead>
              <tr>
                <th>Year</th>
                <th>Affiliate</th>
                <th>Program Title</th>
                <th>Program Area</th>
                <th>Number of People Served Annually by this program</th>
                <th>Total Number of People Served Annually for all Programs for this Affiliate</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($report as $key => $data){ ?>
              <tr>
                <td>
                  <?= $data['field_year']; ?>
                </td>
                <td>
                  <?= $data['organization']; ?>
                </td>
                <td>
                  <?php $i = 0; foreach($data['pk_id'] as $id) { 
                    foreach($id as $pkid) {
                  ?>
                  <a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/".$pkid."/viewprogram");?>">
                    <?php
                      foreach($data['program_name'] as $prg){
                        print '<p>'.$prg[$i].'</p>';
                      }  
                    ?>
                  </a><?php $i++; }}?></td> 
                <td>
                  <?php foreach($data['program_area'] as $area){
                        foreach($area as $pr_area)       
                        print '<p>'.$pr_area.'</p>';
                      } ?>
                </td>
                <td>
                  <?php foreach($data['served'] as $ser){
                        foreach($ser as $served)
                        print '<p>'.number_format($served).'</p>';
                      } ?>
                </td>
                <td>
                  <?= number_format($data['total']); ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr class="total" style="font-weight:bold">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>
                    <?= array_sum(array_column($report, 'total')); ?>
                  </b></td>
              </tr>
              <tr>
                <td><a href="<?php echo base_url("
                    module/census_reports/program_area_people_served/export")."?year=".$year_selected."
                    &affiliate=&program_area="; ?>"><button>CSV</button></a></td>
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
  $(document).ready(function () {
    $('.tblpcpr5').DataTable({
      paging: false,
      searching: false,
      info: false
    });
  });
</script>