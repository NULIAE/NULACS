<main>
    <div class="mainWrap">
      <div class="container">
        <div class="h2 tittle">Census COVID Questions</div>
        <!-- <div class="h3 tittle" style="text-align:left">Total Programs</div> -->
            <div class="tabilCard NulCard">
              <div class="table-responsive" id="edu">
                <table  class="table table1" id="tbl1">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>$ RECEIVED PPP 1</th>
                      <th>$ RECEIVE PPP 2</th>
                      <th># OF PEOPLE SERVED</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></a></td>
                      <td><?= number_format($data['field_if_yes_how_much_funding_di_value'],2); ?></td>
                      <td><?= number_format($data['field_if_yes_how_much_ppp2_value'],2); ?></td>
                      <td><?= number_format($data['field__how_many_people_did_you_a_value']); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>          
              </div>
            </div>
      </div>
    </div>
  </main>