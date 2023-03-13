  <main>
    <div class="mainWrap">

      <div class="container">
        <div class="h2 tittle">Cumulative Health Report</div>
        <div class="h3 tittle" style="text-align:left">Total Programs</div>
        

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="edu">
                <table  class="table table1" id="tbl1">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>TOTAL PARTICIPANTS</th>
                      <th># AT EDUCATION CLASSES/EVENTS/SEMINARS</th>
                      <th># ENROLLED IN HEALTH INSURANCE</th>
                      <th># ASSISTED WITH HEALTH INSURANCE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><?= $data['total']; ?></td>
                      <td><?= $data['class']; ?></td>
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