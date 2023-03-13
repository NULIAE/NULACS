                <table  class="table table1 tblpcpr5" id="tbl_area">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>PROGRAM AREA</th>
                      <th>AFFILIATE</th>
                      <th>NAME OF PROGRAM</th>
                      <th>NUMBER OF PEOPLE SERVED	ANNUALLY</th>
                      <th>TOTAL PROGRAM BUDGET FUNDED</th>
                      <th>NUL FUNDED</th>
                    </tr>
                  </thead>
                  <?php if($report != []) { ?>
                    <thead class="ttoatal">
                    <tr class="ttoatal total" style="font-weight:bold">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b><?= array_sum(array_column($report, 'served')); ?></b></td>
                      <td><b>$<?= array_sum(array_column($report, 'budget')); ?></b></td>
                      <td></td>  
                    </tr>
                    </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                      <input type="hidden" value="<?php echo $data['org_id']; ?>">
                      <input type="hidden" value="<?php echo $data['nul_val']; ?>">
                      <input type="hidden" value="<?php echo $data['area_id']; ?>">
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><?= $data['program_area']; ?></td>
                      <td><?= $data['organization']; ?></td>
                      <!-- module/census_report/$report_id/$pk_id/viewprogram -->
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/".$data['pk_id']."/viewprogram");?>"><?= $data['program_name']; ?></a></td>
                      <td><?php if($data['served'] != '') { ?><?= number_format($data['served'], 2); ?> <?php } ?></td>
                      <td><?php if($data['budget'] != '') { ?><?= "$".number_format($data['budget'], 2); ?> <?php } ?></td>
                      <td><?= $data['nul']; ?></td>                      
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b><?= array_sum(array_column($report, 'served')); ?></b></td>
                      <td><b>$<?= array_sum(array_column($report, 'budget')); ?></b></td>
                      <td></td>  
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url("module/census_reports/affiliate_program_area_query/export")."?year=".$data['field_year']."&affiliate=".$org_id."&nul=".$nul_val."&prg_name=".$program_name."&program_area=".$area_id; ?>"><button>XLS</button></a></td>
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
                    $('.tblpcpr5').DataTable({
                      paging: false,
                      searching: false,
                      info: false
                    });
                  });
                </script>       