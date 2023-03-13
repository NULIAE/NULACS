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
        <div class="h2 tittle">Cumulative Education Report</div>
        <div class="h3 tittle" style="text-align:left">Total Programs</div>
        

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="edu">
                <table  class="table table1 tblpcpr4" id="tbl1">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>TOTAL PARTICIPANTS</th>
                      <th># PROMOTED TO NEXT GRADE</th>
                      <th>% GRADUATED FROM HIGH SCHOOL</th>
                      <th>% SUBMITTED COLLEGE APPLICATION(S)</th>
                      <th>OVERALL VALUE OF THE SCHOLARSHIPS</th>
                      <th>AVERAGE VALUE OF SCHOLARSHIPS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_reports/affiliate_education_query_report")."?year=".$data['field_year'];?>"><?= $data['field_year']; ?></a></td>
                      <td><?= number_format($data['total']); ?></td>
                      <td><?= number_format($data['promoted']); ?></td>
                      <td><?php
                      // print $data['graduated'];                
                      $per = round(($data['graduated']));
                      echo $per."%" ; ?></td>
                      <td><?php $per = round(($data['college']));
                        echo $per."%" ; ?></td>
                      <td>$<?= number_format($data['scholar_tot'], 2); ?></td>
                      <td>$<?= number_format($data['scholar_avg'], 2); ?></td>
                    </tr>
                    <?php } ?>

                  </tbody>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td><b><?= array_sum(array_column($report, 'total')); ?></b></td>
                      <td><b><?= array_sum(array_column($report, 'promoted')); ?></b></td>
                      <td><b><?= round(array_sum(array_column($report, 'graduated'))/count(array_column($report, 'graduated'))); ?>%</b></td>
                      <td><b><?= round(array_sum(array_column($report, 'college'))/count(array_column($report, 'college'))); ?>%</b></td>
                      <td><b>$<?= number_format(array_sum(array_column($report, 'scholar_tot')),2); ?></b></td>
                      <td><b>$<?= number_format(array_sum(array_column($report, 'scholar_avg')),2); ?></b></td>
                    </tr>
                  <tfoot>
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