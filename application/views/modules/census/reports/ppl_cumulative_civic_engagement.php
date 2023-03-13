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
        <div class="h2 tittle">Cumulative Civic Engagement Report</div>
        <div class="filter">
        <form id="filter-form" action="#">
          <div class="row align-items-end">
          
          </div>
        </form>
          
        </div>

            <div class="tabilCard NulCard">
              <div class="table-responsive" id="civic_engagement">
                <table  class="table table1" id="table11">
                  <thead>
                    <tr>
                      <th>YEAR</th>
                      <th>VOTER REGISTRATION</th>
                      <th>COMMUNITY FORUMS</th>
                      <th>RACIAL JUSTICE</th>
                      <th>POLICE BRUTALITY</th>
                      <th>ADVOCACY</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $data){ ?>
                    <tr>
                      <td><a class="text-greenD" href="<?php echo base_url(); ?>modules/census/census_reports/affiliate_civic_engagement_query?year=<?= $data['field_year']; ?>"><?= $data['field_year']; ?></a></td>
                      <td><?php if($data['voter'] != '') { ?><?= number_format($data['voter']); ?> <?php } ?></td>
                      <td><?php if($data['community'] != '') { ?><?= number_format($data['community']); ?> <?php } ?></td>
                      <td><?php if($data['racial'] != '') { ?><?= number_format($data['racial']); ?> <?php } ?></td>
                      <td><?php if($data['police'] != '') { ?><?= number_format($data['police']); ?> <?php } ?></td>
                      <td><?php if($data['adv'] != '') { ?><?= number_format($data['adv']); ?> <?php } ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>                      
                    <tr class="total" style="font-weight:bold">
                      <td></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'voter'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'community'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'racial'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'police'))); ?></b></td>
                      <td><b><?= number_format(array_sum(array_column($report, 'adv'))); ?></b></td>                      
                    </tr>
                  </tfoot>
                </table>          
              </div>
            </div>

      </div>
    </div>

  </main>