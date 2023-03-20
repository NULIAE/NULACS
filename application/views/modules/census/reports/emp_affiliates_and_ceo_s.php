<main>
    <div class="mainWrap">
      <div class="container">
        <div class="h2 tittle">Affiliates and CEO's</div>
        <!-- <div class="h3 tittle" style="text-align:left">Total Programs</div> -->
            <div class="tabilCard NulCard">
              <div class="table-responsive" id="edu">
                <table  class="table table1" id="tbl1">
                  <thead>
                    <tr>
                      <th></th>
                      <th>AFFILIATE</th>
                      <th>CEO</th>
                      <th>Email Address</th>
                      <th>City</th>
                      <th>State/Province</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $counter = 1; foreach($report as $data){ ?>
                    <tr>
                      <td><?= $counter?></td>
                      <td><?= $data['organization']; ?></td>
                      <td><?= $data['prefix']." ".$data['last_name'].", ".$data['first_name']; ?></td>
                      <td><?= $data['user_email_address_1']; ?></td>
                      <td><?= $data['city']; ?></td>
                      <td><?= $data['state']; ?></td>
                    </tr>
                    <?php $counter++; } ?>
                  </tbody>
                </table>          
              </div>
            </div>
      </div>
    </div>
  </main>