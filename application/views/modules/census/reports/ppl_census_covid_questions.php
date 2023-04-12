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
                      <th>AFFILIATE</th>
                      <th>APPLIED PPP 1</th>
                      <th>$ RECEIVE PPP 1</th>
                      <th>WHEN PPP 1</th>
                      <th>APPLIED PPP 2</th>
                      <th>$ RECEIVE PPP 2</th>
                      <th>WHEN PPP 2</th>
                      <th>% MOVED VIRTUAL</th>
                      <th># PARTICIPANTS LAID OFF</th>
                      <th>RECEIVE REQUESTS FOR</th>
                      <th>WORK REMOTELY</th>
                      <th>HOW?</th>
                      <th>DO ANY OF THE FOLLOWING</th>
                      <th># OF PEOPLE SERVED</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><?= $data['affiliate']; ?></td>
                      <td><?php if($data['field__did_your_affiliate_apply__value'] == 1) {?>Yes<?php }?></td>
                      <td><?php if($data['field_if_yes_how_much_funding_di_value'] != '') {?><?= number_format($data['field_if_yes_how_much_funding_di_value'],2); ?><?php }?></td>
                      <td><?= $data['field__if_yes_when_did_you_recei_value']; ?></td>
                      <td><?php if($data['field_did_your_affiliate_apply_f_value'] == 1) {?>Yes<?php }?></td>
                      <td><?php if($data['field_if_yes_how_much_ppp2_value'] != '') {?><?= number_format($data['field_if_yes_how_much_ppp2_value'],2); ?><?php }?></td>
                      <td><?= $data['field_if_yes_when_ppp2_value']; ?></td>
                      <td><?= $data['percentage']; ?></td>
                      <td><?php if($data['field_how_many_of_your_workforce_value'] != '') {?><?= number_format($data['field_how_many_of_your_workforce_value']); ?><?php }?></td>
                      <td>
                        <?php 
                          $sql = "SELECT ecs.name FROM emergency_covid_services_value ecsv LEFT JOIN emergency_covid_services ecs ON ecs.id = ecsv.field_did_your_affiliate_receive WHERE emergency_relief_id = " . $data['report_id']." ORDER BY ecs.id ASC";
                          $query = $this->db->query($sql);
                          if ($query->num_rows() > 0) {
                            $last = end($query->result()); // get the last element
                            foreach ($query->result() as $row) {
                              if ($row === $last) { // check if this is the last element
                                print_r($row->name); // print without comma
                              } else {
                                print_r($row->name.", "); // print with comma
                              }
                            }
                          } ?>
                      </td>
                      <td><?php if($data['field_did_your_affiliate_staff_w_value'] == 1) {?>Yes<?php }?></td>
                      <td>
                      <?php 
                          $sql = "SELECT ecs.name FROM emergency_covid_assistance_value ecsv LEFT JOIN emergency_covid_assistance ecs ON ecs.id = ecsv.field_if_your_staff_worked_remot WHERE emergency_relief_id = " . $data['report_id']." ORDER BY ecs.id ASC";
                          $query = $this->db->query($sql);
                          if ($query->num_rows() > 0) {
                            $last = end($query->result()); // get the last element
                            foreach ($query->result() as $row) {
                              if ($row === $last) { // check if this is the last element
                                print_r($row->name); // print without comma
                              } else {
                                print_r($row->name.", "); // print with comma
                              }
                            }
                          } ?>
                      </td>
                      <td>
                      <?php 
                          $sql = "SELECT ecs.name FROM emergency_covid_activities_value ecsv LEFT JOIN emergency_covid_activities ecs ON ecs.id = ecsv.field_during_the_pandemic_did_yo WHERE emergency_relief_id = " . $data['report_id']." ORDER BY ecs.id ASC";
                          $query = $this->db->query($sql);
                          if ($query->num_rows() > 0) {
                            $last = end($query->result()); // get the last element
                            foreach ($query->result() as $row) {
                              if ($row === $last) { // check if this is the last element
                                print_r($row->name); // print without comma
                              } else {
                                print_r($row->name.", "); // print with comma
                              }
                            }
                          } ?>
                      </td>
                      <td><?php if($data['field__how_many_people_did_you_a_value'] != '') {?><?= number_format($data['field__how_many_people_did_you_a_value']); ?><?php }?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>          
              </div>
            </div>
      </div>
    </div>
  </main>
  <style>
    .container {
      max-width: 1565px;
    }
    .table {
      width: max-content;
    }
    td {
      width: 150px;
    }
  </style>