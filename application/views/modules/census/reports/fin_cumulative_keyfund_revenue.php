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
        <div class="h2 tittle">Cumulative Key Funding Revenue Report</div>

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="censussummary">
                <table  class="table table1 tblpcpr5" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>FEDERAL</th>
                      <th>STATE/LOCAL</th>
                      <th>NUL</th>
                      <th>UNITED WAY</th>
                      <th>TOTAL REVENE</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report_data as $data) { ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/affiliate_keyfund_query?year=<?= $data['field_year']; ?>"><?= $data['field_year']; ?></a></td>
                      <td>$<?= number_format($data['field_revenue_federal']); ?>.00</td>
                      <td>$<?= number_format($data['field_revenue_state_local']); ?>.00</td>
                      <td>$<?= number_format($data['field_revenue_nul']); ?>.00</td>
                      <td>$<?= number_format($data['field_revenue_united_way']); ?>.00</td>
                      <td>$<?= number_format($data['field_revenue_total_budget']); ?>.00</td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>                      
                    <tr class="total_bottom">
                      <td></td>
                      <td><b>$<?= number_format(array_sum(array_column($report_data, 'field_revenue_federal'))); ?>.00</b></td>
                      <td><b>$<?= number_format(array_sum(array_column($report_data, 'field_revenue_state_local'))); ?>.00</b></td>
                      <td><b>$<?= number_format(array_sum(array_column($report_data, 'field_revenue_nul'))); ?>.00</b></td>
                      <td><b>$<?= number_format(array_sum(array_column($report_data, 'field_revenue_united_way'))); ?>.00</b></td>                      
                      <td><b>$<?= number_format(array_sum(array_column($report_data, 'field_revenue_total_budget'))); ?>.00</b></td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url()?>/module/census_report/cumulative_keyfund_revenue/export"><button>XLS</button></a></td>
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

