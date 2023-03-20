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
        <div class="h2 tittle">NUL Census Affiliate Total Contacts</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
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
              <div class="table-responsive" id="people_history">
                <table  class="table table1 tblpcpr5" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>AFFILIATE</th>
                      <th>TOTAL INDIRECT CONTACTS	</th>
                      <th>TOTAL PUBLIC CONTACTS	</th>
                      <th>TOTAL DIRECT CONTACTS</th>
                      <th>TOTAL CONTACTS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><a href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/contact_data"><?= $data['organization']; ?></a></td>
                      <td><?php if($data['indirect'] != '') { ?><?= number_format($data['indirect']); ?> <?php } ?></td>
                      <td><?php if($data['public'] != '') { ?><?= number_format($data['public']); ?> <?php } ?></td>
                      <td><?php if($data['direct'] != '') { ?><?= number_format($data['direct']); ?> <?php } ?></td>
                      <td><?php if($data['net'] != '') { ?><?= number_format($data['net']); ?> <?php } ?></td>
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
                      <td><a href="<?php echo base_url()?>/module/census_reports/affiliate_people_history/export"><button>XLS</button></a></td>
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
<script>	
  function myFunction() {
    event.preventDefault();
    document.getElementById("filter-form").reset();
    $("#submit").click();
  }
</script>

