<main class="Meta-data notification">
    <div class="container">
       <div class="Wrapper">
        <div class="row justify-content-end date">
          <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span>
        </div>
            <div class="row document-mdata">
                <div class="head">
                    <h3>Notification</h3>
                </div>
            </div>

            <div class="row">
                <div class="chatBox">
                            <div class="search-box flex">
                    <?php if(($this->input->get('search') != NULL) && !empty($user_notifications)){ ?>
                    <div class="flex justify-content-start align-items-center">
                        <h4 class="mt-2 mr-2"><strong>Found <?= count($user_notifications); ?> Notification(s)</strong></h4>
                        <a href="<?= base_url('module/notification/all'); ?>" class="btn btn-primary mt-2 text-uppercase">View All</a>
                    </div>
                    <?php } ?>
                                <form action="" method="get">
                                <input type="text" name="search" placeholder="Search" class="input">
                                <div class="btn2">
                                  <i class="i i-search" aria-hidden="true"></i>
                                </div>
                                </form>
                             </div>
                             <?php if(isset($user_notifications) && !empty($user_notifications)){
                                 foreach( $user_notifications as $notification){ 
                                   $formatedDate = date('d M, Y | H:i', strtotime($notification['created']));

                                     if($notification['created_by'] != $this->session->user_id){?>
                             
                    <div class="msgPosition">
                        <div class="msg">
                            <div class="dp"><?php echo strtoupper($notification['first_name'][0].$notification['last_name'][0]); ?></div>
                            <div class="msgBox">
                                <a href="<?= $notification['link']; ?>" class="text-dark"><div class="textMsg"><i><?=isset($notification['notification'])?$notification['notification']:''?></i></div></a>
                                <div class="Details">
                                    <span><?php echo $notification['first_name'].' '.$notification['last_name']; ?></span>
                                    <date>&nbsp; <?=isset($formatedDate)?$formatedDate:'' ?> </date>
                                </div>
                            </div>
                        </div>
                    </div>
                                     <?php }else{ ?>
                    <div class="replyPosition">
                        <div class="msg-reply">
                            <div class="msgBox2">
                                <a href="<?= $notification['link']; ?>" class="text-dark"><div class="textMsg2"><i><?=isset($notification['notification'])?$notification['notification']:''?></i></div></a>
                                <div class="Details2">
                                    <span><?php echo $notification['first_name'].' '.$notification['last_name']; ?></span>
                                    <date>&nbsp; <?=isset($formatedDate)? $formatedDate:'' ?></date>
                                </div>
                            </div>
                            <div class="dp2"><?php echo strtoupper($notification['first_name'][0].$notification['last_name'][0]); ?></div>
                        </div>
                    </div>
                    <?php } } } else { ?>
                    <div class="text-center">
                       <p class="alert alert-warning p-3">Nothing found based on keyword "<b><?= $this->input->get('search'); ?></b>"</p> 
                       <a href="<?= base_url('module/notification/all'); ?>" class="btn btn-primary mt-2 text-uppercase">View All</a>
                       </div>
                    <?php } ?>
                </div>
            </div>
      
       </div>
    </div>
  </main>
