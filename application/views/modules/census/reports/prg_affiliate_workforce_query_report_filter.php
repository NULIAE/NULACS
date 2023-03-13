<table class="table table1 tblpcpr4" id="tbl_aff_wrk_qr_rep">
  <thead>
    <tr>
      <th>Year</th>
      <th>Affiliate</th>
      <th># clients who received counseling</th>
      <th>Number of participants in employment/workforce development programs (exclude welfare recipients)?</th>
      <th>Number of participants placed in jobs</th>
      <th>Annual salary (if applicable)</th>
      <th>or Hourly wage rate</th>
      <th>Number of welfare participants in federal/state funded programs</th>
      <th>Number of welfare program participants placed in jobs</th>
      <th>Annual welfare salary (if applicable)</th>
      <th>or Hourly wage rate (welfare)</th>
    </tr>
  </thead>
  <?php if($report != []) { ?>
  <tbody>
    <?php foreach($report as $data){ ?>
    <tr>
      <td>
        <?= $data['year']; ?>
      </td>
      <td>
        <a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/view");?>"><?= $data['org']; ?></a>
      </td>
      <td>
        <?php if($data['coun'] != '') { ?><?= number_format($data['coun']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['empl_wrk'] != '') { ?><?= number_format($data['empl_wrk']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['placed'] != '') { ?><?= number_format($data['placed']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['annsal'] != '') { ?><?= "$".number_format($data['annsal']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['hour_rate'] != '') { ?><?= "$".number_format($data['hour_rate'], 2); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['wel_prt'] != '') { ?><?= number_format($data['wel_prt']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['wel_placed'] != '') { ?><?= number_format($data['wel_placed']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['wel_sal'] != '') { ?><?= "$".number_format($data['wel_sal'], 2); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['wel_hour'] != '') { ?><?= "$".number_format($data['wel_hour'], 2); ?> <?php } ?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <td></td>
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
      <td><b><?php if(array_column($report, 'annsal') != [0]) {?>
          <?= "$".number_format(array_sum(array_filter(array_column($report, 'annsal')))/count(array_filter(array_column($report, 'annsal'))),2); ?>
          <?php } else{ ?>0.00<?php } ?>
        </b></td>
        <?php if ( count ( array_filter ( array_column ( $report, 'hour_rate' ) ) ) > 0 ) { ?>
      <td><b><?php if(array_column($report, 'hour_rate') != [0]) {?>
          <?= "$".number_format(array_sum(array_filter(array_column($report, 'hour_rate')))/count(array_filter(array_column($report, 'hour_rate'))),2);?>
          <?php } else{ ?>0.00<?php } ?>
        </b></td>
        <?php } else { ?>
          <td><b>0</b></td>
          <?php } ?>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'wel_prt'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'wel_placed'))); ?>
        </b></td>
      <td><b><?php if(array_column($report, 'wel_sal') != [0]) {?>
          <?= "$".number_format(array_sum(array_filter(array_column($report, 'wel_sal')))/count(array_filter(array_column($report, 'wel_sal'))),2);?>
          <?php } else{ ?>0.00<?php } ?>
        </b></td>
        <?php if ( count ( array_filter ( array_column ( $report, 'wel_hour' ) ) ) > 0 ) { ?>
      <td><b>
          <?= "$".number_format(array_sum(array_filter(array_column($report, 'wel_hour')))/count(array_filter(array_column($report, 'wel_hour'))),2);?>
        </b></td>
        <?php } else { ?>
          <td><b>0</b></td>
          <?php } ?>
    </tr>
    <tr>
    <td><a href="<?php echo base_url("module/census_reports/affiliate_workforce_query_report/export")."?year=".$data['year']."&org=".$data['org_id']; ?>"><button>XLS</button></a></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tfoot>
  <?php } ?>
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