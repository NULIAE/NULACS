  <main>
    <div class="container">
      <div class="row">
        <div class=" col-lg-16 col-md-16">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <h4 class="title-head">CENSUS REPORTS</h4>
              <div class="card nul-card">
                <ul class="nulList list-group list-group-flush">

                  <?php 
                    foreach ($titles as $value)
                    {
                      if($value['category'] == 'census_report' ){?>
                      <li class="list-group-item"><a class="text-primary" href="<?php echo base_url().$value['link'];?>"> <?php echo $value['title']?></a> </li>
                     <?php }
                    }
                  ?>
                </ul>
              </div>
              <h4 class="title-head">FINANCIALS</h4>
              <div class="card nul-card">
                <ul class="nulList list-group list-group-flush">
                <?php 
                    foreach ($titles as $value)
                    {
                      if($value['category'] == 'financials' ){?>
                      <li class="list-group-item"><a class="text-primary" href="<?php echo base_url().$value['link'];?>"><?php echo $value['title']?></a></li>
                     <?php }
                    }
                  ?>
                </ul>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <h4 class="title-head">PEOPLE SERVED</h4>
              <div class="card nulS-Height nul-card">
                <ul class="nulList list-group list-group-flush">
                <?php 
                    foreach ($titles as $value)
                    {
                      if($value['category'] == 'people_served' ){?>
                      <li class="list-group-item"><a class="text-primary" href="<?php echo base_url().$value['link'];?>"><?php echo $value['title']?></a></li>
                     <?php }
                    }
                  ?>
                </ul>
              </div>
            </div>
            <div class="col-md-24 col-sm-12">
              <h4 class="title-head">EMPLOYEES AND VOLUNTEERS</h4>
              <div class="card nul-card">
                <ul class="nulList list-group list-group-flush">

                <?php 
                    foreach ($titles as $value)
                    {
                      if($value['category'] == 'employees_volunteers' ){?>
                      <li class="list-group-item"><a class="text-primary" href="<?php echo base_url().$value['link'];?>"><?php echo $value['title']?></a></li>
                     <?php }
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <h4 class="title-head">PROGRAMS</h4>
          <div class="card nulL-Height nul-card">
            <ul class="nulList list-group list-group-flush">

                  <?php 
                    foreach ($titles as $value)
                    {
                      if($value['category'] == 'programs' ){?>
                      <li class="list-group-item"><a class="text-primary" href="<?php echo base_url().$value['link'];?>"><?php echo $value['title']?></a></li>
                     <?php }
                    }
                  ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>


  