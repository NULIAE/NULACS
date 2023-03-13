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
        <div class="h2 tittle">Cumulative Employee Report</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
          
          </div>
        </form>
          
        </div>

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="employee">
                <table  class="table table1" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>FULL TIME EMPLOYEES</th>
                      <th>PART TIME EMPLOYEE</th>
                      <th>AVERAGE SALARY</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_reports/affiliate_employee_report?year=<?= $data['field_year']; ?>"><?= $data['field_year']; ?></a></td>
                      <td><?= number_format($data['full_time']); ?></td>
                      <td><?= number_format($data['part_time']); ?></td>
                      <td>$<?=  number_format($data['average'], 2, '.', ','); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'full_time'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'part_time'))); ?></b></td>
                      <td><b>$<?= number_format(array_sum(array_column($report, 'average')), 2, '.', ','); ?></b></td>                      
                    </tr>
                  </tfoot>
                </table>          
              </div>
            </div>

      </div>
    </div>

  </main>