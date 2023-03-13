<table class="table table1 tblpcpr4" id="tbl_aff_heal_qry_rpt">
  <thead>
    <tr>
      <th>Affiliate</th>
      <th>Year</th>
      <th>TOTAL PARTICIPANTS</th>
      <th># AT EDUCATION CLASSES/EVENTS/SEMINARS</th>
      <th># ENROLLED IN HEALTH INSURANCE</th>
      <th># ASSISTED WITH HEALTH INSURANCE</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($report as $data){ ?>
    <tr>
      <td>
        <a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/health_quality");?>"><?= $data['org']; ?></a>
      </td>
      <td>
        <?= $data['year']; ?>
      </td>
      <td>
        <?php if($data['tot'] != '') { ?><?= number_format($data['tot']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['cse'] != '') { ?><?= number_format($data['cse']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['enrol'] != '') { ?><?= number_format($data['enrol']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['assisted'] != '') { ?><?= number_format($data['assisted']); ?> <?php } ?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr class="total" style="font-weight:bold">
      <td></td>
      <td></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'tot'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'cse'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'enrol'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'assisted'))); ?>
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