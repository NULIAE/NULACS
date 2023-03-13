  <main>
    <div class="mainWrap">

      <div class="container">
        <!-- <div class="messages error" id="delete_msg"> <i class="i i-success"></i>&nbsp; &nbsp;Record Deleated</div> -->
        <div class="h2 tittle">ANNUAL AFFILIATE CENSUS REPORTS</div>
        <div class="filter">
        <form id="filter-form" action="<?php echo base_url('module/census_affiliate/filter'); ?>">
          <div class="row align-items-end">
          
            <div class="col-lg-3 col-md-5">
              <div class="form-group">
                <label for="year">Year</label>

                <select class="form-select" aria-label="year" id="year" name="year">
                <?php 
                    $get = $this->input->get();
                    //print_r($get);
                    $yearAll = 0;
                    if($get){
                      $yearAll = 1; 
                    }
                    else{
                      $yearAll = date("Y");
                    } 
                ?>
                <option value="" <?php if($yearAll) echo "selected"; ?>>All</option>
                  <?php

                    for($i=2010;$i<2028;$i++){
                     
                  ?>
                  <option value="<?=$i?>" <?php if($i == $yearAll) echo "selected"; ?>> <?=sprintf("%02d",$i)?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-md-5">
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-select" aria-label="Status" name="status">
                  <option value="" selected="selected">- All -</option>
                  <option value="125">Complete</option>
                  <option value="126">Incomplete</option>
                  <option value="127">Reviewed Complete</option>
                  <option value="128">Submitted</option>
                </select>
              </div>
            </div>
            <?php if($this->session->role_id == 1){?>
            <div class="col-lg-6 col-md-5">
              <div class="form-group">
                <label for="affiliate">Affiliate</label>
                <select class="form-select" aria-label="Affiliate" name="affiliate">
                  <option value="">All Affiliate</option>
                  <?php foreach($affiliate as $aff): ?>
                    <option value="<?php echo $aff['field_affiliate_select_value']; ?>">
                      <?php echo $aff['organization']; ?>
                    </option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
            <?php }else{
              
              if($get){?>
              <input type="hidden" name="affiliate" value="<?= $get['affiliate']; ?>">
            <?php
              }
            }?>
            <div class="col-lg-8 col-md-9">
              <div class="form-group formclassbtn">
                <!-- <button class="btn btn-primary m-r-15 btn-rounded">APPLY</button> -->
                <button id="submitbtn" class="btn btn-primary m-r-15 btn-rounded">APPLY</button>
                <button onclick="myFunction()" class="btn btn-danger m-r-15 btn-rounded">CANCEL</button>
                <button id="exportbtn" class="btn btn-info btn-rounded">EXPORT</button>
              </div>
            </div>
          
          </div>
        </form>
          
        </div>

            <div class="tabilCard NulCard">
              <div class="table-responsive">
                <table  class="table table1" id="table11">
                  <thead>
                    <tr>
                      <th>Affiliate</th>
                      <th>Year</th>
                      <th>Links to Census</th>
                      <th>Census Status</th>
                    </tr>
                  </thead>
                  <tbody id="table-body">

                  </tbody>
                </table>
                      
              </div>

            </div>

            <div class="paging">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                <nav id="page-links"></nav>
                </ul>
              </nav>
            </div>


      </div>
    </div>

  </main>
  
  
<script id="template" type="x-tmpl-mustache">
{{#affiliates}}
<tr>
	<td scope="row" class="t-l-c">{{organization}}</td>
	<td>{{field_year}}</td>
	<td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/{{report_id}}/view">Census Report</a><br><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/{{report_id}}/printform">Print Full Census</a></td>
	<td>{{status}}</td>
</tr>
{{/affiliates}}

{{^affiliates}}
<tr>
	<td  colspan="4" style="text-align: center; vertical-align: middle;">No affiliates found!</td>
</tr>
{{/affiliates}}
</script>
<script>	
  function myFunction() {
    event.preventDefault();
    document.getElementById("filter-form").reset();
    $("#submitbtn").click();
  }
</script>

