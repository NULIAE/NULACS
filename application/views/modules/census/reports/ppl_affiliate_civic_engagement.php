<main>
    <div class="mainWrap">

      <div class="container">
        <div class="h2 tittle">Census Affiliate Civic Engagement Query Report</div>
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
                  <option value="<?=$i?>" <?php if($i == $year_selected) echo "selected"; ?>> <?=sprintf("%02d",$i)?></option>
                  <?php } ?>
                </select>
              </div>
            </div>          
            <div class="col-lg-6 col-md-5">
              <div class="form-group">
                <label for="status"> Affiliate</label>
                <select class="form-select" aria-label="Affiliate" name="affiliate">
                  <option value="">All Affiliate</option>
                  <?php foreach($affiliate as $aff): ?>
                    <option value="<?php echo $aff['field_affiliate_select_value']; ?>">
                      <?php echo $aff['organization']; ?>
                    </option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
            <div class="col-lg-8 col-md-9">
              <div class="form-group">
                <button id="submit" class="btn btn-primary m-r-15 btn-rounded">APPLY</button>
                <button onclick="myFunction()" class="btn btn-danger btn-rounded">CANCEL</button>
              </div>
            </div>
          
          </div>
        </form>
          
        </div>

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="affiliate_civic">
                <table  class="table table1 tblpcpr5" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>AFFILIATE</th>
                      <th>VOTER REGISTRATION</th>
                      <th>COMMUNITY FORUMS</th>
                      <th>RACIAL JUSTICE</th>
                      <th>POLICE BRUTALITY</th>
                      <th>ADVOCACY</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/civic"><?= $data['organization']; ?></a></td>
                      <td><?php if($data['voter'] != '') { ?><?= number_format($data['voter']); ?> <?php } ?></td>
                      <td><?php if($data['community'] != '') { ?><?= number_format($data['community']); ?> <?php } ?></td>
                      <td><?php if($data['racial'] != '') { ?><?= number_format($data['racial']); ?> <?php } ?></td>
                      <td><?php if($data['police'] != '') { ?><?= number_format($data['police']); ?> <?php } ?></td>
                      <td><?php if($data['adv'] != '') { ?><?= number_format($data['adv']); ?> <?php } ?></td>
                    </tr>
                    <?php } ?>                    
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td>Total SUM</td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'voter'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'community'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'racial'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'police'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'adv'))); ?></b></td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url("modules/census/census_reports/affiliate_civic_engagement/export")."?year=".$year_selected; ?>"><button>XLS</button></a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
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

<script>	
  function myFunction() {
    event.preventDefault();
    document.getElementById("filter-form").reset();
    $("#submit").click();
  }
</script>