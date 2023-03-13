
                <table  class="table table1 tblpcpr4" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th></th>
                      <th>GUILD</th>
                      <th>YOUNG PROFESSIONALS</th>
                      <th>OTHER MEMBERS</th>
                    </tr>
                  </thead>
                  <?php if($report != []) { ?>
                  <thead class="ttoatal1">
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'guild'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'young'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'other'))); ?></b></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/volunteer"><?= $data['organization']; ?></a></td>
                      <td><?= number_format($data['guild']); ?></td>
                      <td><?= number_format($data['young']); ?></td>
                      <td><?= number_format($data['other']); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'guild'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'young'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'other'))); ?></b></td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url("module/census_reports/affiliate_member_volunteer/export")."?year=".$year."&affiliate=".$affiliate; ?>"><button>XLS</button></a></td>
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
      
