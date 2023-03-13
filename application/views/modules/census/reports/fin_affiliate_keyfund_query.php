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
        <div class="h2 tittle">Affiliate Key Funding Revenue Query Report(2011-2019) </div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
          
            <div class="col-lg-3 col-md-5">
              <div class="form-group">
                <label for="year">Year</label>
                <select class="form-select" aria-label="year" id="year" name="year">
                  <?php 
                    for($i=2010;$i<=date("Y");$i++){
                  ?>
                  <option value="<?=$i?>" <?php if($i == $year_selected) echo "selected"; ?>> <?=sprintf("%02d",$i)?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-md-5">
              <div class="form-group">
                <label for="status"> Affiliate</label>
                <select class="form-select" aria-label="Affiliate" name="affiliate">
                  <option value="">All Affiliate</option>
                  <?php foreach($affiliate as $aff): ?>
                    <option value="<?php echo $aff['field_affiliate_select_value']; ?>" <?php if($aff['field_affiliate_select_value'] == $affiliate_selected) echo "selected"; ?>> 
                      <?php echo $aff['organization']; ?>
                    </option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
            <div class="col-lg-8 col-md-9">
              <div class="form-group formclassbtn">
                <button class="btn btn-primary m-r-15 btn-rounded">APPLY</button>
                <a href="<?php echo base_url();?>module/census_report/affiliate_keyfund_query"><button class="btn btn-danger btn-rounded">CANCEL</button></a>
              </div>
            </div>
          
          </div>
        </form>
          
        </div>

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="censussummary">
                <table  class="table table1 tblpcpr5" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>AFFILIATE</th>
                      <th>FEDERAL</th>
                      <th>STATE/LOCAL</th>
                      <th>NUL</th>
                      <th>UNITED WAY</th>
                      <th>TOTAL REVENUE</th>
                      <th>% NUL FUNDED</th>                      
                    </tr>
                  </thead>
                  <?php if(count($report_data) != 0){ ?>
                  <tbody>
                    <?php foreach($report_data as $data) { ?>
                    <tr>
                      <td><?= $data['field_year']; ?></td>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>module/census_report/<?= $data['report_id']; ?>/revenue"><?= $data['organization']; ?></a></td>
                      <td><?php if($data['field_revenue_federal'] != '') { ?><?="$". number_format($data['field_revenue_federal'], 2); ?> <?php } ?></td>
                      <td><?php if($data['field_revenue_state_local'] != '') { ?><?="$". number_format($data['field_revenue_state_local'], 2); ?> <?php } ?></td>
                      <td><?php if($data['field_revenue_nul'] != '') { ?><?="$". number_format($data['field_revenue_nul'], 2); ?> <?php } ?></td>
                      <td><?php if($data['field_revenue_united_way'] != '') { ?><?="$". number_format($data['field_revenue_united_way'], 2); ?> <?php } ?></td>
                      <td><?php if($data['field_revenue_total_budget'] != '') { ?><?="$". number_format($data['field_revenue_total_budget'], 2); ?> <?php } ?></td>
                      <td><?php if($data['field_revenue_total_budget'] != 0) {?>
                        <?= sprintf('%0.2f',($data['field_revenue_nul']*100)/$data['field_revenue_total_budget']);?>%
          <?php } else{ ?>0.00<?php } ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>                        
                    <tr class="total_bottom">
                      <td><b>Total SUM</b></td>
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report_data, 'field_revenue_federal'))); ?>.00</b></td>
                      <td><b><?= number_format(array_sum(array_column($report_data, 'field_revenue_state_local'))); ?>.00</b></td>
                      <td><b><?= number_format(array_sum(array_column($report_data, 'field_revenue_nul'))); ?>.00</b></td>
                      <td><b><?= number_format(array_sum(array_column($report_data, 'field_revenue_united_way'))); ?>.00</b></td>
                      <td><b><?= number_format(array_sum(array_column($report_data, 'field_revenue_total_budget'))); ?>.00</b></td>
                      <td></td>                                          
                    </tr>
                    <tr>
                      <td><a href="<?php echo base_url("module/census_report/affiliate_keyfund_query/export")."?year=".$data['field_year']."&affiliate=".$organization; ?>"><button>XLS</button></a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </tfoot>
                  <?php }?>
                </table>          

              </div>
            </div>

      </div>
    </div>

  </main>
  
  
<script id="template" type="x-tmpl-mustache">
{{#affiliates}}
<tr>
	<td scope="row" class="t-l-c">{{city}}</td>
	<td>{{state}}</td>
	<td><a href="#">{{organization}}</a></td>
</tr>
{{/affiliates}}

{{^affiliates}}
<tr>
	<td  colspan="4" style="text-align: center; vertical-align: middle;">No affiliates found!</td>
</tr>
{{/affiliates}}
</script>

