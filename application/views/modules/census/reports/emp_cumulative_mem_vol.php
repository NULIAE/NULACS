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
        <div class="h2 tittle">Cumulative Members and Volunteers Report</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
          
          </div>
        </form>
          
        </div>

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="mem_vol">
                <table  class="table table1 tblpcpr4" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>GUILD</th>
                      <th>YOUNG PROFESSIONALS</th>
                      <th>OTHER MEMBERS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_reports/affiliate_member_volunteer?year=<?= $data['field_year']; ?>"><?= $data['field_year']; ?></a></td>
                      <td><?= number_format($data['guild']); ?></td>
                      <td><?= number_format($data['young']); ?></td>
                      <td><?= number_format($data['other']); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'guild'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'young'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'other'))); ?></b></td>                      
                    </tr>
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