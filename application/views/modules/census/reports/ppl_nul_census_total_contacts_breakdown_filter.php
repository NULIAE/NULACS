<table class="table table1 tblpcpr4 table1z">
  <thead>
    <tr>
      <th>YEAR</th>
      <th>AFFILIATE</th>
      <th>TOTAL INDIRECT CONTACTS</th>
      <th>TOTAL PUBLIC CONTACTS</th>
      <th>TOTAL DIRECT CONTACTS</th>
      <th>TOTAL CONTACTS</th>
    </tr>
  </thead>
  <?php if($report != []) { ?>
  <tbody>
    <?php foreach($report as $data){ ?>
    <tr>
      <td><?= $data['year']; ?></td>
      <td><a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/view");?>"><?= $data['org']; ?></a></td> 
      <td><?= $data['indirect']; ?></td>
      <td><?= $data['public']; ?></td>
      <td><?= $data['direct']; ?></td>
      <td><?= $data['net']; ?></td>
      
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr class="total" style="font-weight:bold">
      <td></td>
      <td></td>
      <td><b><?= number_format(array_sum(array_column($report, 'indirect'))); ?></b></td>
      <td><b><?= number_format(array_sum(array_column($report, 'public'))); ?></b></td>
      <td><b><?= number_format(array_sum(array_column($report, 'direct'))); ?></b></td>
      <td><b><?= number_format(array_sum(array_column($report, 'net'))); ?></b></td>
    </tr>
    <tr>
      <td><a href="<?php echo base_url("module/census_reports/nul_census_total_contacts_breakdown/export")."?year=".$data['year']."&affiliate=".$data['af_id']; ?>"><button>XLS</button></a></td>
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
      $('.tblpcpr4').DataTable({
        paging: false,
        searching: false,
        info: false
      });
    });
  </script>
