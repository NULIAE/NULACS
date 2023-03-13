<table  class="table table1 tblpcpr5" id="tbl_people_served">
                  <thead>
                    <tr>
                      <th>Year</th>
                      <th>Affiliate</th>
                      <th>Program Title</th>
                      <th>Program Area</th>
                      <th>Number of People Served Annually by this program</th>
                      <th>Total Number of People Served Annually for all Programs for this Affiliate</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $key => $data){ ?>                      
                      <!-- <input type="hidden" value="<?php echo $data['org_id']; ?>">
                      <input type="hidden" value="<?php echo $data['area_id']; ?>"> -->

                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><?= $data['organization']; ?></td>
                      <td>
                        <?php $i = 0; foreach($data['pk_id'] as $id) { 
                          foreach($id as $pkid) {
                        ?>
                        <a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/".$pkid."/viewprogram");?>">
                          <?php
                            foreach($data['program_name'] as $prg){
                              print '<p>'.$prg[$i].'</p>';
                            }  
                          ?>
                        </a><?php $i++; }}?>
                      </td> 
                      <td><?php foreach($data['program_area'] as $area){
                        foreach($area as $pr_area)       
                        print '<p>'.$pr_area.'</p>';
                      } ?></td>
                      <td><?php foreach($data['served'] as $ser){
                        foreach($ser as $served)
                        print '<p>'.$served.'</p>';
                      } ?></td>
                      <td><?= $data['total']; ?></td>                      
                    </tr>
                    <?php } ?>

                  </tbody>
                  <tfooter>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b><?= array_sum(array_column($report, 'total')); ?></b></td>
                    </tr>                    
                    <tr>
                      <td><a href="<?php echo base_url("module/census_reports/program_area_people_served/export")."?year=".$year."&affiliate=".$org_id."&program_area=".$area_id; ?>"><button>CSV</button></a></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tfooter>
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