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
        <div class="h2 tittle">Annual Census Publication Report</div>
        <div class="filter">
        <form id="filter-form" action="<?php echo base_url('module/census_affiliate/filter'); ?>">
          <div class="row align-items-end">
          
            <div class="col-lg-3 col-md-5">
              <div class="form-group">
                <label for="year">State</label>


                <select class="form-select" aria-label="State" name="state">
                <option value="">- Any -</option>
                <?php foreach($state as $st): ?>
                  <option value="<?php echo $st['state']; ?>"> <?php echo $st['state']; ?></option>
                  <?php endforeach;?>
                </select>


               
              </div>
            </div>
            <div class="col-lg-6 col-md-5">
              <div class="form-group">
                <label for="status"> Census Year </label>
                <select class="form-select" aria-label="year" id="year" name="year">
                  <?php 
                    for($i=2010;$i<2028;$i++){
                    $year = date("Y"); 
                  ?>
                  <option value="<?=$i?>" <?php if($i == $year) echo "selected"; ?>> <?=sprintf("%02d",$i)?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-lg-8 col-md-9">
              <div class="form-group">
                <!-- <button class="btn btn-primary m-r-15 btn-rounded">APPLY</button> -->
                <button id="submitbtn" class="btn btn-primary m-r-15 btn-rounded">APPLY</button>
                <button onclick="myFunction()" class="btn btn-danger btn-rounded">CANCEL</button>
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
                      <th>City</th>
                      <th>State</th>
                      <th>Affiliate</th>
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
	<td scope="row" class="t-l-c">{{city}}</td>
	<td>{{state}}</td>
	<td><a class="text-greenD" href="<?php echo base_url()?>module/affiliateindex/organization/{{affiliate_id}}/{{field_year}}">{{organization}}</a></td>
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

