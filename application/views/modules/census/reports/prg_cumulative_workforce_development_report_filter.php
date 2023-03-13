<table class="table table1 tblpcpr4" id="tbl_cum_work_dev_rep">
  <thead>
    <tr>
      <th>Year</th>
      <th># CLIENTS WHO RECEIVED COUNSELING</th>
      <th>NUMBER OF PARTICIPANTS IN EMPLOYMENT/WORKFORCE DEVELOPMENT PROGRAMS (EXCLUDE WELFARE RECIPIENTS)?</th>
      <th>NUMBER OF PARTICIPANTS PLACED IN JOBS</th>
      <th>ANNUAL SALARY (IF APPLICABLE)</th>
      <th>OR HOURLY WAGE RATE</th>
      <th>NUMBER OF WELFARE PARTICIPANTS IN FEDERAL/STATE FUNDED PROGRAMS</th>
      <th>NUMBER OF WELFARE PROGRAM PARTICIPANTS PLACED IN JOBS</th>
      <th>ANNUAL WELFARE SALARY (IF APPLICABLE)</th>
      <th>OR HOURLY WAGE RATE (WELFARE)</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($report as $data){ ?>
      <tr>
        <td><a class="text-greenD" href="<?php echo base_url("module/census_reports/affiliate_workforce_query_report")."?year=".$data['year'];?>"><?= $data['year']; ?></a></td>
        <td><?= number_format($data['coun']); ?></td>
        <td><?= number_format($data['empl_wrk']); ?></td>
        <td><?= number_format($data['placed']); ?></td>
        <td><?= "$".number_format($data['annsal'], 2); ?></td>
        <td><?= "$".number_format($data['hour_rate'], 2); ?></td>
        <td><?= number_format($data['wel_prt']); ?></td>
        <td><?= number_format($data['wel_placed']); ?></td>
        <td><?= "$".number_format($data['annsal'], 2); ?></td>
        <td><?= "$".number_format($data['wel_hour'], 2); ?></td>
      </tr>
    <?php } ?>
  </tbody>
  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'coun'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'empl_wrk'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'placed'))); ?>
                        </b></td>
                      <td><b>$
                      <?php echo number_format(array_sum(array_filter(array_column($report, 'annsal')))/count(array_filter(array_column($report, 'annsal'))),2); ?>
                        </b></td>
                      <td><b>$
                      <?php echo number_format(array_sum(array_filter(array_column($report, 'hour_rate')))/count(array_filter(array_column($report, 'hour_rate'))),2); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'wel_prt'))); ?>
                        </b></td>
                      <td><b>
                        <?= number_format(array_sum(array_column($report, 'wel_placed'))); ?>
                        </b></td>
                      <td><b>$
                      <?php echo number_format(array_sum(array_filter(array_column($report, 'wel_sal')))/count(array_filter(array_column($report, 'wel_sal'))),2); ?>
                        </b></td>
                      <td><b>$
                      <?php echo number_format(array_sum(array_filter(array_column($report, 'wel_hour')))/count(array_filter(array_column($report, 'wel_hour'))),2); ?>
                        </b></td>
                    </tr>
                  </tfoot>
</table>
  <script>
    $(document).ready(function() {
      $('.tblpcpr4').DataTable({
        paging: false,
        searching: false,
        info: false
      });
    });
  </script>