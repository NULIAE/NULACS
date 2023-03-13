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
<main>
    <div class="mainWrap">
      <div class="container">
        <!-- <div class="h2 tittle">Cumulative Entrepreneurship Report</div> -->
        <div class="h3 tittle" style="text-align:left">Cumulative Entrepreneurship Report</div>
            <div class="tabilCard NulCard">
              <div class="table-responsive" id="total">
                <table  class="table table1 tblpcpr4" id="tbl1">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>TOTAL PARTICIPANTS IN ENTREPRENEURSHIP PROGRAMS</th>
                      <th>NUMBER OF NEW BUSINESSES CREATED</th>
                      <th>TOTAL SALES OF BUSINESSES STARTED BY PARTICIPANTS IN ENTREPRENEURSHIP PROGRAMS (I.E. SMALL BUSINESS MATTERS)</th>
                      <th>VALUE OF SALES FOR ALL BUSINESSES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($report_all as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_reports/affiliate_entrepreneurship_query_report")."?year=".$data['year'];?>"><?= $data['year']; ?></a></td>
                      <td><?= number_format($data['total']); ?></td>
                      <td><?= number_format($data['business']); ?></td>
                      <td><?= "$".number_format($data['sales'], 2); ?></td>
                      <td><?= "$".number_format($data['valueall'], 2); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <td></td>
                      <td><b><?= number_format(array_sum(array_column($report_all, 'total'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report_all, 'business'))); ?></b></td>
                      <td><b><?= "$".number_format(array_sum(array_column($report_all, 'sales')),2); ?></b></td>
                      <td><b><?= "$".number_format(array_sum(array_column($report_all, 'valueall')), 2); ?></b></td>
                    </tr>
                  </tfoot>
                </table>          
              </div>
            </div>
        <br>    
        <div class="h3 tittle" style="text-align:left">NUL Entrepreneurship Centers</div>
        <div class="tabilCard NulCard">
          <div class="table-responsive" id="budget">
            <table  class="table table1 tblpcpr4" id="tbl2">
              <thead>
                <tr>
                <th>YEAR</th>
                <th>TOTAL PARTICIPANTS IN ENTREPRENEURSHIP PROGRAMS</th>
                <th>NUMBER OF NEW BUSINESSES CREATED</th>
                <th>TOTAL SALES OF BUSINESSES STARTED BY PARTICIPANTS IN ENTREPRENEURSHIP PROGRAMS (I.E. SMALL BUSINESS MATTERS)</th>
                <th>VALUE OF SALES FOR ALL BUSINESSES</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($report_aff as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_reports/entrepreneurship_centers_report")."?year=".$data['year'];?>"><?= $data['year']; ?></a></td>
                      <td><?= number_format($data['total']); ?></td>
                      <td><?= number_format($data['business']); ?></td>
                      <td><?= "$".number_format($data['sales'], 2); ?></td>
                      <td><?= "$".number_format($data['valueall'], 2); ?></td>
                    </tr>
                    <?php } ?>
              </tbody>
              <tfoot>                    
              <tr><td></td><td><b><?= number_format(array_sum(array_column($report_aff, 'total'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report_aff, 'business'))); ?></b></td>
                      <td><b><?= "$".number_format(array_sum(array_column($report_aff, 'sales')),2); ?></b></td>
                      <td><b><?= "$".number_format(array_sum(array_column($report_aff, 'valueall')),2); ?></b></td></tr>
              </tfoot>
            </table>          
          </div>
        </div>
        <br>
        <div class="h3 tittle" style="text-align:left">Affiliates without NUL Entrepreneurship Centers</div>
        <div class="tabilCard NulCard">
          <div class="table-responsive" id="numbers">
            <table  class="table table1 tblpcpr4" id="tbl3">
              <thead>
                <tr>
                <th>YEAR</th>
                <th>TOTAL PARTICIPANTS IN ENTREPRENEURSHIP PROGRAMS</th>
                <th>NUMBER OF NEW BUSINESSES CREATED</th>
                <th>TOTAL SALES OF BUSINESSES STARTED BY PARTICIPANTS IN ENTREPRENEURSHIP PROGRAMS (I.E. SMALL BUSINESS MATTERS)</th>
                <th>VALUE OF SALES FOR ALL BUSINESSES</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($report_aff_wo as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url("module/census_reports/entrepreneurship_centers_report_wnul")."?year=".$data['year'];?>"><?= $data['year']; ?></a></td>
                      <td><?= number_format($data['total']); ?></td>
                      <td><?= number_format($data['business']); ?></td>
                      <td><?= "$".number_format($data['sales'], 2); ?></td>
                      <td><?= "$".number_format($data['valueall'], 2); ?></td>
                    </tr>
                    <?php } ?>
              </tbody>
              <tfoot>
              <tr><td></td>
                      <td><b><?= number_format(array_sum(array_column($report_aff_wo, 'total'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report_aff_wo, 'business'))); ?></b></td>
                      <td><b><?= "$".number_format(array_sum(array_column($report_aff_wo, 'sales')),2); ?></b></td>
                      <td><b><?= "$".number_format(array_sum(array_column($report_aff_wo, 'valueall')),2); ?></b></td></tr>
              </tfoot>
            </table>          
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.tblpcpr4').DataTable({
        paging: false,
        searching: false,
        info: false
      });
    });
  </script>