<style>

#people_served p{
  height:45px;
}

</style>
<main>
    <div class="mainWrap">

      <div class="container">
        <div class="h2 tittle">Entrepreneurship Not Centers Report</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
            <div class="col-lg-5 col-md-5">
            <div class="form-group">
                <label for="year">Year</label>
                <select class="form-select" aria-label="year" id="year" name="year">
                  <?php 
                    for($i=2010;$i<=date("Y");$i++){
                  ?>
                  <option value="<?=$i?>" <?php if($i == $year_selected) echo "selected"; ?> > <?=sprintf("%02d",$i)?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-lg-8 col-md-9">
              <div class="form-group formclassbtn">
                <button id="submit" class="btn btn-primary m-r-15 btn-rounded">APPLY</button>
                <button class="btn btn-danger btn-rounded">CANCEL</button>
              </div>
            </div>
          
          </div>
        </form>  
        </div>

        <div class="tabilCard NulCard">
          <div class="table-responsive" id="aff_enter_qry_rep">
          <table  class="table table1 tblpcpr4" id="tbl_aff_enter_qry_rep">
                  <thead>
                    <tr>
                      <th>Year</th>
                      <th>Affiliate</th>
                      <th>TOTAL PARTICIPANTS IN ENTREPRENEURSHIP PROGRAMS</th>
                      <th>NUMBER OF NEW BUSINESSES CREATED</th>
                      <th>TOTAL SALES OF BUSINESSES STARTED BY PARTICIPANTS IN ENTREPRENEURSHIP PROGRAMS (I.E. SMALL BUSINESS MATTERS)</th>
                      <th>VALUE OF SALES FOR ALL BUSINESSES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($report as $data){ ?>
                    <tr>
                      <td><?= $data['year']; ?></td>
                      <td><a href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/view"><?= $data['org']; ?></a></td> 
                      <td><?php if($data['tot'] != '') { ?><?= number_format($data['tot']); ?> <?php } ?></td>    
                      <td><?php if($data['new'] != '') { ?><?= number_format($data['new']); ?> <?php } ?></td>    
                      <td><?php if($data['totsale'] != '') { ?><?= "$".number_format($data['totsale']); ?> <?php } ?></td>    
                      <td><?php if($data['valofsale'] != '') { ?><?= "$".number_format($data['valofsale']); ?> <?php } ?></td>    
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'tot'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'new'))); ?></b></td>
                      <td><b><?= "$".number_format(array_sum(array_column($report, 'totsale')), 2); ?></b></td>
                      <td><b><?= "$".number_format(array_sum(array_column($report, 'valofsale')), 2); ?></b></td>
                    </tr>
                  </tfoot>
                </table>            
          </div>
        </div>

      </div>
    </div>

  </main>

  <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.tblpcpr4').DataTable({
        paging: false,
        searching: false,
        info: false
      });
    });
  </script>