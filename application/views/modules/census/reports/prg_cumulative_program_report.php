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
        <div class="h2 tittle">NUL Census Cumulative Program Reports by year</div>
        <div class="h3 tittle" style="text-align:left">Total Programs</div>
        

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="total">
                <table class="table table1 tblpcpr1" id="tbl1">
                  <thead>
                    <tr>
                      <th>Year</th>
                      <th>Workforce</th>
                      <th>Education</th>
                      <th>Entrepreneurship</th>
                      <th>Housing</th>
                      <th>Health</th>
                      <th>Other</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($total as $data){ ?>
                    <tr>
                      <td><?= $data['year']; ?></td>
                      <td><?= number_format($data['program_workforce']); ?></td>
                      <td><?= number_format($data['program_edu']); ?></td>
                      <td><?= number_format($data['program_entrepren']); ?></td>
                      <td><?= number_format($data['program_housing']); ?></td>
                      <td><?= number_format($data['program_health']); ?></td>
                      <td><?= number_format($data['program_oth']); ?></td>
                      <td><?= number_format($data['total']); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>          
              </div>
            </div>

        <br>    
        <div class="h3 tittle" style="text-align:left">Total Program Budgets</div>
        

        <div class="tabilCard NulCard">
          <div class="table-responsive" id="budget">
            <table  class="table table1 tblpcpr2" id="tbl2">
              <thead>
                <tr>
                  <th>Year</th>
                  <th>Workforce</th>
                  <th>Education</th>
                  <th>Entrepreneurship</th>
                  <th>Housing</th>
                  <th>Health</th>
                  <th>Other</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($budget as $data){ ?>
                    <tr>
                      <td><?= $data['year']; ?></td>
                      <td><?= number_format($data['program_workforce']); ?></td>
                      <td><?= number_format($data['program_edu']); ?></td>
                      <td><?= number_format($data['program_entrepren']); ?></td>
                      <td><?= number_format($data['program_housing']); ?></td>
                      <td><?= number_format($data['program_health']); ?></td>
                      <td><?= number_format($data['program_oth']); ?></td>
                      <td><?= number_format($data['total']); ?></td>
                    </tr>
                    <?php } ?>
              </tbody>
            </table>          
          </div>
        </div>

        <br>
        <div class="h3 tittle" style="text-align:left">Total Numbers Served</div>
        

        <div class="tabilCard NulCard">
          <div class="table-responsive" id="numbers">
            <table  class="table table1 tblpcpr3" id="tbl3">
              <thead>
                <tr>
                  <th>Year</th>
                  <th>Workforce</th>
                  <th>Education</th>
                  <th>Entrepreneurship</th>
                  <th>Housing</th>
                  <th>Health</th>
                  <th>Other</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($served as $data){ ?>
                    <tr>
                      <td><?= $data['year']; ?></td>
                      <td><?= number_format($data['program_workforce']); ?></td>
                      <td><?= number_format($data['program_edu']); ?></td>
                      <td><?= number_format($data['program_entrepren']); ?></td>
                      <td><?= number_format($data['program_housing']); ?></td>
                      <td><?= number_format($data['program_health']); ?></td>
                      <td><?= number_format($data['program_oth']); ?></td>
                      <td><?= number_format($data['total']); ?></td>
                    </tr>
                    <?php } ?>
              </tbody>
            </table>          
          </div>
        </div>

      </div>
    </div>

  </main>