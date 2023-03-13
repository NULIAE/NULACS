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
        <div class="h2 tittle">Cumulative Entrepreneurship Report</div> 

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="total">
                <table  class="table table1" id="tbl1">
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
                    <?php foreach($total as $data){ ?>
                    <tr>
                      <td><?= $data['year']; ?></td>
                      <td><?= $data['total']; ?></td>
                      <td><?= $data['new_bus']; ?></td>
                      <td><?= $data['tot_sale']; ?></td>
                      <td><?= $data['sale_val']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>          
              </div>
            </div>

        <br>    
        <div class="h3 tittle">NUL Entrepreneurship Centers</div>       

        <div class="tabilCard NulCard">
          <div class="table-responsive" id="budget">
            <table  class="table table1" id="tbl2">
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
              <?php foreach($budget as $data){ ?>
                    <tr>
                      <td><?= $data['year']; ?></td>
                      <td><?= $data['total']; ?></td>
                      <td><?= $data['new_bus']; ?></td>
                      <td><?= $data['tot_sale']; ?></td>
                      <td><?= $data['sale_val']; ?></td>
                    </tr>
                    <?php } ?>
              </tbody>
            </table>          
          </div>
        </div>

        <br>
        <div class="h3 tittle" style="text-align:left">Affiliates without NUL Entrepreneurship Centers</div>
        

        <div class="tabilCard NulCard">
          <div class="table-responsive" id="numbers">
            <table  class="table table1" id="tbl3">
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
              <?php foreach($served as $data){ ?>
                    <tr>
                      <td><?= $data['year']; ?></td>
                      <td><?= $data['total']; ?></td>
                      <td><?= $data['new_bus']; ?></td>
                      <td><?= $data['tot_sale']; ?></td>
                      <td><?= $data['sale_val']; ?></td>
                    </tr>
                    <?php } ?>
              </tbody>
            </table>          
          </div>
        </div>

      </div>
    </div>

  </main>