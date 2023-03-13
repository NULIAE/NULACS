
                <table  class="table table1 tblpcpr4" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>AFFILIATE</th>
                      <th>FULL TIME EMPLOYEE	</th>
                      <th>PART TIME EMPLOYEE</th>
                      <th>AVERAGE SALARY</th>
                    </tr>
                  </thead>
                  <?php if($report != []) { ?>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/employees"><?= $data['organization']; ?></a></td>
                      <td><?= $data['full_time']; ?></td>
                      <td><?= $data['part_time']; ?></td>
                      <td><?= ($data['average']>0)?'$'.$data['average']:''; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td></td>
                      <td><b><?= array_sum(array_column($report, 'full_time')); ?></b></td>
                      <td><b><?= array_sum(array_column($report, 'part_time')); ?></b></td>
                      <td><b><?php 
                      $a = array_filter(array_column($report, 'average'));
                      $avg = array_sum($a)/count($a);
                      print '$'.number_format($avg, 2, '.', '');
                      ?></b></td>                      
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url("module/census_reports/affiliate_employee_report/export")."?year=".$year."&affiliate=".$affiliate; ?>"><button>XLS</button></a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
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