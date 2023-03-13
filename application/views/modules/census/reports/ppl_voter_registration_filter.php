                <table  class="table table1 tblpcpr5" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>CITY</th>
                      <th>STATE</th>
                      <th>AFFILIATE</th>
                      <th>TOTAL REGISTERED</th>
                      <th>VOTER REGISTRATION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><?= $data['city']; ?></td>
                      <td><?= $data['state']; ?></td>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/civic"><?= $data['organization']; ?></a></td>
                      <td><?php if($data['voter'] != '') { ?><?= number_format($data['voter']); ?> <?php } ?></td>
                      <td><?= $data['voter_reg']; ?></td>
                    </tr>
                    <?php } ?>
                    <tr class="total" style="font-weight:bold">
                      <td>Total SUM</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'voter'))); ?></b></td>
                      <td></b></td>
                    </tr>
                  </tbody>
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