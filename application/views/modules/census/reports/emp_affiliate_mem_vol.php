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
        <div class="h2 tittle">Census Affiliate Members and Volunteers Query Report</div>
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
              <div class="form-group formclassbtn">
                <button id="submit" class="btn btn-primary m-r-15 btn-rounded">APPLY</button>
                <button onclick="myFunction()" class="btn btn-danger btn-rounded">CANCEL</button>
              </div>
            </div>
          
          </div>
        </form>
          
        </div>

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="member_volunteer">
                <table  class="table table1 tblpcpr4" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th></th>
                      <th>GUILD</th>
                      <th>YOUNG PROFESSIONALS</th>
                      <th>OTHER MEMBERS</th>
                    </tr>
                  </thead>
                  <thead class="ttoatal1">
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'guild'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'young'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'other'))); ?></b></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/volunteer"><?= $data['organization']; ?></a></td>
                      <td><?= number_format($data['guild']); ?></td>
                      <td><?= number_format($data['young']); ?></td>
                      <td><?= number_format($data['other']); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'guild'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'young'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'other'))); ?></b></td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url("module/census_reports/affiliate_member_volunteer/export")."?year=".$data['field_year']."&affiliate=".$data['organization']; ?>"><button>XLS</button></a></td>
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
  
  
<script id="template" type="x-tmpl-mustache">
{{#affiliates}}
<tr>
	<td scope="row" class="t-l-c">{{city}}</td>
	<td>{{state}}</td>
	<td><a href="#">{{organization}}</a></td>
</tr>
{{/affiliates}}

{{^affiliates}}
<tr>
	<td  colspan="4" style="text-align: center; vertical-align: middle;">No affiliates found!</td>
</tr>
{{/affiliates}}
</script>
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
