<table class="table table1 tblpcpr4" id="tbl_aff_edu_qry_fltr">
  <thead>
    <tr>
      <th>Affiliate</th>
      <th>Year</th>
      <th>Total Participants</th>
      <th># Promoted to next grade</th>
      <th>% Graduated from high school</th>
      <th>% Submitted college application(s)</th>
      <th>Overall value of the scholarships</th>
      <th>Average value of scholarships</th>
    </tr>
  </thead>
  <?php if($report != []) { ?>
  <tbody>
    <?php foreach($report as $data){ ?>
    <tr>
      <td>
      <a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/education_program");?>"><?= $data['org']; ?></a>
      </td>
      <td>
        <?= $data['year']; ?>
      </td>
      <td>
        <?php if($data['total'] != '') { ?><?= number_format($data['total']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['promo'] != '') { ?><?= number_format($data['promo']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['grad'] != '') { ?><?= number_format($data['grad'])."%"; ?> <?php } ?></td> 
      </td>
      <td>
        <?php if($data['clapp'] != '') { ?><?= number_format($data['clapp'])."%"; ?> <?php } ?>
      </td>
      <td>
        <?php if($data['scholar'] != '') { ?><?= "$".number_format($data['scholar'], 2); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['avg'] != '') { ?><?= "$".number_format($data['avg'], 2); ?> <?php } ?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr class="total" style="font-weight:bold">
      <td></td>
      <td></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'total'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'promo'))); ?>
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'grad'))); ?>%
        </b></td>
      <td><b>
          <?= number_format(array_sum(array_column($report, 'clapp'))); ?>%
        </b></td>
      <td><b>$
          <?= number_format(array_sum(array_column($report, 'scholar')),2); ?>
        </b></td>
      <td><b><?php if($data['avg'] != '') { ?>
          <?php echo "$".number_format(array_sum(array_filter(array_column($report, 'avg')))/count(array_filter(array_column($report, 'avg'))),2); ?><?php } ?>
        </b></td>
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