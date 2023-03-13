  <main>
    <div class="mainWrap">

      <div class="container">
        <div class="h2 tittle">Cumulative Housing Report</div>
        

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="edu">
                <table  class="table table1" id="tbl1">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>ATTEND OR INQUIRY HOME OWNERSHIP	</th>
                      <th>PURCHASED A HOME</th>
                      <th>AVERAGE PRICE OF HOMES PURCHASED</th>
                      <th>FORECLOSURES PREVENTED</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><?= $data['attend']; ?></td>
                      <td><?= $data['purchase']; ?></td>
                      <td><?= $data['enroll']; ?></td>
                      <td><?= $data['assist']; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td></td>
                      <td><b><?= array_sum(array_column($report, 'total')); ?></b></td>
                      <td><b><?= array_sum(array_column($report, 'class')); ?></b></td>
                      <td><b><?= array_sum(array_column($report, 'enroll')); ?></b></td>
                      <td><b><?= array_sum(array_column($report, 'assist')); ?></b></td>
                    </tr>

                  </tbody>
                </table>          
              </div>
            </div>




        


      </div>
    </div>

  </main>