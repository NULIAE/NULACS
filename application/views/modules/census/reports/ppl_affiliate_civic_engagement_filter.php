<table class="table table1 tblpcpr5" id="table11">
  <thead>
    <tr>
      <th>YEAR</th>
      <th>AFFILIATE</th>
      <th>VOTER REGISTRATION</th>
      <th>COMMUNITY FORUMS</th>
      <th>RACIAL JUSTICE</th>
      <th>POLICE BRUTALITY</th>
      <th>ADVOCACY</th>
    </tr>
  </thead>
  <?php if(count($report) != 0){ ?>
  <tbody>
    <?php foreach($report as $data){ ?>
    <tr>
      <td>
        <?= $data['field_year']; ?>
      </td>
      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/civic">
          <?= $data['organization']; ?>
        </a></td>
      <td>
        <?php if($data['voter'] != '') { ?><?= number_format($data['voter']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['community'] != '') { ?><?= number_format($data['community']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['racial'] != '') { ?><?= number_format($data['racial']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['police'] != '') { ?><?= number_format($data['police']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['adv'] != '') { ?><?= number_format($data['adv']); ?> <?php } ?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr class="total" style="font-weight:bold">
      <td>Total SUM</td>
      <td></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'voter'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'community'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'racial'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'police'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'adv'))); ?>
        </b></td>
    </tr>
    <tr>
      <td><a href="<?php echo base_url("modules/census/census_reports/affiliate_civic_engagement/export")."?year=".$year."&affiliate=".$affiliate; ?>"><button>XLS</button></a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tfoot>
  <?php }?>
</table>
<script>
  $(document).ready(function() {
    $('.tblpcpr5').DataTable({
      paging: false,
      searching: false,
      info: false
    });
  });
  </script>