<main>
   <div class="mainWrap">
      <div class="container">
         <div class="row">
         <div class="col-md-24">
               <div class="card formCard">
                  <div class="h3 tittle "><?= $data->organization; ?></div>      
                 <div class="full_form">
                    <div class="row">
                        <div class="col-md-24">
                            <div class="h5 Subtittle text-primary"><b>Census for My Affiliate</b></div>
                            <ul>
                            <li><a href="<?php echo base_url(); ?>module/census_affiliate?affiliate=<?= $data->field_affiliate_select_value; ?>">All census for <?= $data->organization; ?></a></li>
                            <?php if($census_report){ ?>
                            <li><a href="<?php echo base_url(); ?>module/census_report/<?= $census_report->report_id; ?>/view">This Years census for <?= $data->organization; ?></a></li>
                            <?php }else{ ?> 
                              <li><a href="<?php echo base_url(); ?>module/census_report/create?affiliate=<?= $data->field_affiliate_select_value; ?>">This Years census for <?= $data->organization; ?></a></li>  
                            <?php } ?>
                           </ul>

                            </div>
                        </div>
                    </div>     
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
