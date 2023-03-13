
                <style>

table.dataTable thead .sorting::after,
table.dataTable thead .sorting_asc::after {
    display:none;
}

table.dataTable thead .sorting_desc::after {
    display:none;
}

table.dataTable thead .sorting {
   background-image: url(https://datatables.net/media/images/sort_both.png);
   background-repeat: no-repeat;
   background-position: center right;
}

table.dataTable thead .sorting_asc {
   background-image: url(https://datatables.net/media/images/sort_asc.png);
   background-repeat: no-repeat;
   background-position: center right;
}

table.dataTable thead .sorting_desc {
   background-image: url(https://datatables.net/media/images/sort_desc.png);
   background-repeat: no-repeat;
   background-position: center right;
}

</style>

                <table  class="table table1 tblpcpr5" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>AFFILIATE</th>
                      <th>TOTAL INDIRECT CONTACTS	</th>
                      <th>TOTAL PUBLIC CONTACTS	</th>
                      <th>TOTAL DIRECT CONTACTS</th>
                      <th>TOTAL CONTACTS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><a href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/contact_data"><?= $data['organization']; ?></a></td>
                      <td><?php if($data['indirect'] != '') { ?><?= number_format($data['indirect']); ?> <?php } ?></td>
                      <td><?php if($data['public'] != '') { ?><?= number_format($data['public']); ?> <?php } ?></td>
                      <td><?php if($data['direct'] != '') { ?><?= number_format($data['direct']); ?> <?php } ?></td>
                      <td><?php if($data['net'] != '') { ?><?= number_format($data['net']); ?> <?php } ?></td>
                    </tr>
                    <?php } ?>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'indirect'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'public'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'direct'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'net'))); ?></b></td>                      
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url("module/census_reports/affiliate_people_history/export")."?affiliate=".$data['org_id']; ?>"><button>XLS</button></a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
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