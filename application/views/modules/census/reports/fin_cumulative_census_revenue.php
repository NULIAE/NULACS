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
        <div class="h2 tittle">Cumulative Census Revenue/Expenditure/Net Report (<?= $year_from; ?>-<?= $year_to;?>)</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
          
          </div>
        </form>
          
        </div>

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="censussummary">
                <table  class="table table1 tblpcpr5" id="table11">
                  <thead>
                    <tr>
                      <th>Census Year</th>
                      <th>TOTAL REVENUE</th>
                      <th>TOTAL EXPENDITURES</th>
                      <th>NET</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/affiliate_census_revenue?year=<?= $data['year']; ?>"><?= $data['year']; ?></a></td>
                      <td><?= number_format($data['revenue']); ?>.00</td>
                      <td><?= number_format($data['expenditures']); ?>.00</td>
                      <td><?= number_format($data['net']); ?>.00</td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>                      
                    <tr class="total" style="font-weight:bold">
                      <td>TOTAL SUM</td>
                      <td><?= number_format(array_sum(array_column($report, 'revenue'))); ?>.00</td>
                      <td><?= number_format(array_sum(array_column($report, 'expenditures'))); ?>.00</td>
                      <td><?= number_format(array_sum(array_column($report, 'net'))); ?>.00</td>                      
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url()?>/module/census_report/cumulative_census_revenue/export"><button>XLS</button></a></td>
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

