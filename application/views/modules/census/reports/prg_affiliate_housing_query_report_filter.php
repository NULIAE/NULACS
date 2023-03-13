<table class="table table1 tblpcpr4" id="tbl_housing_qry_rpt">
  <thead>
    <tr>
      <th>Affiliate</th>
      <th>Year</th>
      <th>TOTAL PARTICIPANTS</th>
      <th>ATTEND OR INQUIRY HOME OWNERSHIP</th>
      <th>PURCHASED A HOME</th>
      <th>AVERAGE PRICE OF HOMES PURCHASED</th>
      <th>FORECLOSURES PREVENTED</th>
    </tr>
  </thead>
  <?php if($report != []) { ?>
  <tbody>
    <?php foreach($report as $data){ ?>
    <tr>
      <td>
        <a class="text-greenD" href="<?php echo base_url("module/census_report/".$data['report_id']."/housing");?>"><?= $data['org']; ?></a>
      </td>
      <td>
        <?= $data['year']; ?>
      </td>
      <td>
        <?= $data['tot']; ?>
      </td>
      <td>
        <?= $data['att']; ?>
      </td>
      <td>
        <?= $data['purchase']; ?>
      </td>
      <td>
        <?php if($data['avgprice'] != '') { ?><?= "$".number_format($data['avgprice'], 2); ?> <?php } ?>
      </td>
      <td>
        <?= $data['closed']; ?>
      </td>
    </tr>
    <?php } ?>
    
  </tbody>
  <tfoot>
  <tr class="total" style="font-weight:bold">
      <td></td>
      <td></td>
      <td><b>
          <?= array_sum(array_column($report, 'tot')); ?>
        </b></td>
      <td><b>
          <?= array_sum(array_column($report, 'att')); ?>
        </b></td>
      <td><b>
          <?= array_sum(array_column($report, 'purchase')); ?>
        </b></td>
      <td><b>$<?php if(array_column($report, 'avgprice') != [0]) {?>
          <?= round(array_sum(array_filter(array_column($report, 'avgprice')))/count(array_filter(array_column($report, 'avgprice'))),2); ?>
          <?php } else{ ?>0.00<?php } ?>
        </b></td>
      <td><b>
          <?= array_sum(array_column($report, 'closed')); ?>
        </b></td>
    </tr>
    <tr>
      <td><a href="<?php echo base_url("module/census_reports/affiliate_housing_query_report/export")."?year=".$data['year']."&org=".$data['org_id']; ?>"><button>XLS</button></a></td>
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