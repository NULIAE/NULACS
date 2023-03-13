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
        <div class="h2 tittle">Cumulative People Served History Report</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
          
          </div>
        </form>
          
        </div>

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="people_history">
                <table  class="table table1 tblpcpr5" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>TOTAL INDIRECT CONTACTS	</th>
                      <th>TOTAL PUBLIC CONTACTS	</th>
                      <th>TOTAL DIRECT CONTACTS</th>
                      <th>TOTAL CONTACTS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_reports/nul_census_total_contacts_breakdown?year=<?= $data['field_year']; ?>"><?= $data['field_year']; ?></a></td>
                      <td><?= number_format($data['indirect']); ?></td>
                      <td><?= number_format($data['public']); ?></td>
                      <td><?= number_format($data['direct']); ?></td>
                      <td><?= number_format($data['net']); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'indirect'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'public'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'direct'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'net'))); ?></b></td>                      
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url()?>/module/census_reports/cumulative_people_history/export"><button>XLS</button></a></td>
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