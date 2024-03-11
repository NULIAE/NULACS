              <!-- <div class="h4"><a href="view" class="text-primary">Contact Information</a></div> -->
              <ul class="nav flex-column">
              <li class="nav-item">
                  <!-- <a class="nav-link" href="view" id="view">Contact Information </a> -->
                  <a href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/view" id="view" class="nav-link m-t-20">Contact Information</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" id="serviceareas" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/serviceareas">Service Areas
                    <div class="subtext <?= $statuses['serviceareas']['class']; ?>"> <i class="<?= $statuses['serviceareas']['icon']; ?>"></i><?= $statuses['serviceareas']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="community" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/community">Community Relations
                    <div class="subtext <?= $statuses['community']['class']; ?>"> <i class="<?= $statuses['community']['icon']; ?>"></i><?= $statuses['community']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="employees" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/employees">Employees and Board Members
                    <div class="subtext <?= $statuses['employees']['class']; ?>"> <i class="<?= $statuses['employees']['icon']; ?>"></i><?= $statuses['employees']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  id="revenue" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/revenue">Revenue
                    <div class="subtext <?= $statuses['revenue']['class']; ?>"> <i class="<?= $statuses['revenue']['icon']; ?>"></i><?= $statuses['revenue']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  id="expenditure" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/expenditure">Expenditures
                    <div class="subtext <?= $statuses['expenditure']['class']; ?>"> <i class="<?= $statuses['expenditure']['icon']; ?>"></i><?= $statuses['expenditure']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="education_program" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/education_program">Education Program Details
                    <div class="subtext <?= $statuses['education_program']['class']; ?>"> <i class="<?= $statuses['education_program']['icon']; ?>"></i><?= $statuses['education_program']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="entrepreneurship_program" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/entrepreneurship_program">Entrepreneurship and Business
                    Development Program Details
                    <div class="subtext <?= $statuses['entrepreneurship_program']['class']; ?>"> <i class="<?= $statuses['entrepreneurship_program']['icon']; ?>"></i><?= $statuses['entrepreneurship_program']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="health_quality" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/health_quality">Health and Quality of Life Program
                    Details
                    <div class="subtext <?= $statuses['health_quality']['class']; ?>"> <i class="<?= $statuses['health_quality']['icon']; ?>"></i><?= $statuses['health_quality']['status']; ?></div>
                  </a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="housing" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/housing">Housing and Community
                    Development
                    <div class="subtext <?= $statuses['housing']['class']; ?>"> <i class="<?= $statuses['housing']['icon']; ?>"></i><?= $statuses['housing']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="workforce" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/workforce">Workforce Development Program
                    Details
                    <div class="subtext <?= $statuses['workforce']['class']; ?>"> <i class="<?= $statuses['workforce']['icon']; ?>"></i><?= $statuses['workforce']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="other_programs" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/other_programs">Other Programs
                    <div class="subtext <?= $statuses['other_programs']['class']; ?>"> <i class="<?= $statuses['other_programs']['icon']; ?>"></i><?= $statuses['other_programs']['status']; ?></div>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" id="covid" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/covid">Covid Impact
                    <div class="subtext <?= $statuses['covid']['class']; ?>"> <i class="<?= $statuses['covid']['icon']; ?>"></i><?= $statuses['covid']['status']; ?></div>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" id="mental_health" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/mental_health">Mental Health Questions
                    <div class="subtext <?= $statuses['mental_health']['class']; ?>"> <i class="<?= $statuses['mental_health']['icon']; ?>"></i><?= $statuses['mental_health']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="civic" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/civic">Civic Engagement
                    <div class="subtext <?= $statuses['civic']['class']; ?>"> <i class="<?= $statuses['civic']['icon']; ?>"></i><?= $statuses['civic']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="emergency_relief" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/emergency_relief">Emergency Relief Activities
                    <div class="subtext <?= $statuses['emergency_relief']['class']; ?>"> <i class="<?= $statuses['emergency_relief']['icon']; ?>"></i><?= $statuses['emergency_relief']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact_data" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/contact_data">Contact Data (Direct, Indirect &
                    Public)
                    <div class="subtext <?= $statuses['contact_data']['class']; ?>"> <i class="<?= $statuses['contact_data']['icon']; ?>"></i><?= $statuses['contact_data']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="empowerment" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/empowerment">Empowerment
                    <div class="subtext <?= $statuses['empowerment']['class']; ?>"> <i class="<?= $statuses['empowerment']['icon']; ?>"></i><?= $statuses['empowerment']['status']; ?></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="volunteer" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/volunteer">Volunteers/Members
                    <div class="subtext <?= $statuses['volunteer']['class']; ?>"> <i class="<?= $statuses['volunteer']['icon']; ?>"></i><?= $statuses['volunteer']['status']; ?></div>
                  </a>
                </li>
                <!-- <li class="nav-item p-b-15">
                  <a class="nav-link" id="covid" href="<?php echo base_url()?>module/census_report/<?php echo $this->uri->segment('3');?>/covid">COVID-19 Impact
                    <div class="subtext <?= $statuses['covid']['class']; ?>"> <i class="<?= $statuses['covid']['icon']; ?>"></i><?= $statuses['covid']['status']; ?></div>
                  </a>
                </li> -->
              </ul>
