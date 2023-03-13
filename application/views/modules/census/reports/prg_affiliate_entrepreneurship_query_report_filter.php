<table class="table table1 tblpcpr4" id="table11">
  <thead>
    <tr>
      <th>Year</th>
      <th>Affiliate</th>
      <th>TOTAL PARTICIPANTS IN ENTREPRENEURSHIP PROGRAMS</th>
      <th>NUMBER OF NEW BUSINESSES CREATED</th>
      <th>TOTAL SALES OF BUSINESSES STARTED BY PARTICIPANTS IN ENTREPRENEURSHIP PROGRAMS (I.E. SMALL BUSINESS MATTERS)
      </th>
      <th>VALUE OF SALES FOR ALL BUSINESSES</th>
    </tr>
  </thead>
  <?php if($report != []) { ?>
  <tbody>
    <?php foreach($report as $data){ ?>
    <tr>
      <td>
        <?= $data['year']; ?>
      </td>
      <td>
      <a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/entrepreneurship_program");?>"><?= $data['org']; ?></a>
      </td>
      <td>
        <?php if($data['tot'] != '') { ?><?= number_format($data['tot']); ?> <?php } ?>
      </td> 
      <td>
        <?php if($data['new'] != '') { ?><?= number_format($data['new']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['totsale'] != '') { ?><?= "$".number_format($data['totsale']); ?> <?php } ?>
      </td>
      <td>
        <?php if($data['valofsale'] != '') { ?><?= "$".number_format($data['valofsale']); ?> <?php } ?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <td></td>
      <td></td>
      <td><b>
          <?= array_sum(array_column($report, 'tot')); ?>
        </b></td>
      <td><b>
          <?= array_sum(array_column($report, 'new')); ?>
        </b></td>
      <td><b>
          <?= "$".array_sum(array_column($report, 'totsale')); ?>
        </b></td>
      <td><b>
          <?= "$".array_sum(array_column($report, 'valofsale')); ?>
        </b></td>
    </tr>
    <tr>
      <td><a href="<?php echo base_url("module/census_reports/affiliate_entrepreneurship_query_report/export")."?year=".$data['year']."&org="; ?>"><button>XLS</button></a></td>
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