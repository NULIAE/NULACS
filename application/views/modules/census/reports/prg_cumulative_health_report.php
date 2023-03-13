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
        <div class="h2 tittle">Cumulative Health Report</div>
        <!-- <div class="h3 tittle" style="text-align:left">Total Programs</div> -->
            <div class="tabilCard NulCard">
              <div class="table-responsive" id="edu">
                <table  class="table table1 tblpcpr4" id="tbl1">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>TOTAL PARTICIPANTS</th>
                      <th># AT EDUCATION CLASSES/EVENTS/SEMINARS</th>
                      <th># ENROLLED IN HEALTH INSURANCE</th>
                      <th># ASSISTED WITH HEALTH INSURANCE</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_reports/affiliate_health_query_report")."?year=".$data['year'];?>"><?= $data['year']; ?></a></td>
                      <td><?= number_format($data['total']); ?></td>
                      <td><?= number_format($data['edu_cls_evnt_smnr']); ?></td>
                      <td><?= number_format($data['enrolled']); ?></td>
                      <td><?= number_format($data['assisted']); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'total'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'edu_cls_evnt_smnr'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'enrolled'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'assisted'))); ?></b></td>
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