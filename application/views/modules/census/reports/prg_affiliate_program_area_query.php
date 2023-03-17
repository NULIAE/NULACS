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
        <div class="h2 tittle">Census Affiliate Program Area Query Report</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
            <div class="col-lg-3 col-md-5">
              <div class="form-group">
                <label for="year">Year</label>
                <select class="form-select" aria-label="year" id="year" name="year">
                <?php 
                    $get = $this->input->get();
                    $yearAll = 0;
                    if($get){
                      $yearAll = 1; 
                    }
                    else{
                      $yearAll = date("Y");
                    } 
                ?>
                <option value="" <?php if($yearAll) echo "selected"; ?>>Any</option>
                  <?php 
                    for($i=2010;$i<=date("Y");$i++){
                  ?>
                  <option value="<?=$i?>" <?php if($i == $year_selected) echo "selected"; ?> > <?=sprintf("%02d",$i)?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-lg-5 col-md-5">
              <div class="form-group">
                <label for="status">Program Area</label>
                <select class="form-select" aria-label="Program Area" name="program_area" id="program_area">
                  <option value="">-Any-</option>
                  <?php foreach($program_area as $id=>$area): ?>
                    <option value="<?= $id; ?>" <?php if ( isset($_GET['program_area'])==$id ) echo 'selected="selected"'; ?>>
                      <?php echo $area; ?>
                    </option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-lg-5 col-md-5">
              <div class="form-group">
                <label for="status"> Affiliate</label>
                <select class="form-select" aria-label="Affiliate" name="affiliate" id="affiliate">
                  <option value="">-Any-</option>
                  <?php foreach($affiliate as $aff): ?>
                    <option value="<?php echo $aff['field_affiliate_select_value']; ?>">
                      <?php echo $aff['organization']; ?>
                    </option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-lg-6 col-md-5">
              <div class="form-group">
                <label for="status"> Name of Program</label>
                <input type="text" class="form-control" id="prg_name" name="prg_name">
              </div>
            </div>
            
            <div class="col-lg-3 col-md-5">
              <div class="form-group">
                <label for="status"> Funded by NUL?</label>
                <select class="form-select" aria-label="Funded by NUL?" name="nul" id="nul">
                  <option value="">-Any-</option>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
              </div>
            </div>            

            <div class="col-lg-8 col-md-9">
              <div class="form-group formclassbtn">
                <button id="submit" class="btn btn-primary m-r-15 btn-rounded">APPLY</button>
                <button onclick="myFunction()" class="btn btn-danger btn-rounded">CANCEL</button>
              </div>
            </div>
          
          </div>
        </form>  
        </div>

        <div class="tabilCard NulCard">
          <div class="table-responsive" id="program_area_query">
          </div>
        </div>

      </div>
    </div>

  </main>
  <script>	
  function myFunction() {
    event.preventDefault();
    document.getElementById("filter-form").reset();
    $("#submit").click();
  }
</script>