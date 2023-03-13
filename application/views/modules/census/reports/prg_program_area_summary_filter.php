                <table  class="table table1 tblpcpr4" id="tbl_area">
                  <thead>
                    <tr>
                      <th>PROGRAM AREA</th>
                      <th>NUMBER OF PROGRAMS</th>
                      <th>NUMBER OF PEOPLE SERVED	</th>
                      <th>TOTAL PROGRAM BUDGEreportT FUNDED</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>modules/census/census_reports/affiliate_program_area_query?year=<?= $data['year']; ?>&program_area=<?= $data['program_id'];?>"><?= $data['area']; ?></a></td>
                      <td><?= number_format($data['programs']); ?></td>
                      <td><?= number_format($data['served']); ?></td>
                      <td>$<?= number_format($data['budget'], 2); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'programs'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'served'))); ?></b></td>
                      <td><b>$<?= number_format(array_sum(array_column($report, 'budget')), 2); ?></b></td>  
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