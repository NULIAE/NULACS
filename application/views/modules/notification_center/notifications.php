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
                        <div class="search-box">
                                <input type="text" placeholder="Search" class="input">
                                <div class="btn2">
                                  <i class="i i-search" aria-hidden="true"></i>
                                </div>
                             </div>
                             <?php if(isset($user_notifications) && !empty($user_notifications)){
                                 foreach( $user_notifications as $notification){ 
                                   $formatedDate = date('d M, Y | H:i', strtotime($notification['created']));

                                     if($notification['created_by'] == 1){?>
                             
                    <div class="msgPosition">
                        <div class="msg">
                            <div class="dp">AD</div>
                            <div class="msgBox">
                                <div class="textMsg"><i><?=isset($notification['notification'])?$notification['notification']:''?></i></div>
                                <div class="Details">
                                    <span>Admin</span>
                                    <date>&nbsp; <?=isset($formatedDate)?$formatedDate:'' ?> </date>
                                </div>
                            </div>
                        </div>
                    </div>
                                     <?php }else{ ?>
                    <div class="replyPosition">
                        <div class="msg-reply">
                            <div class="msgBox2">
                                <div class="textMsg2"><i><?=isset($notification['notification'])?$notification['notification']:''?></i></div>
                                <div class="Details2">
                                    <span><?=isset($notification['first_name'])?$notification['first_name']:''?> </span>
                                    <date>&nbsp; <?=isset($formatedDate)? $formatedDate:'' ?></date>
                                </div>
                            </div>
                            <div class="dp2"><?=isset($notification['stateabbreviation'])?$notification['stateabbreviation']:''?></div>
                        </div>
                    </div>
                                     <?php } } } ?>
                </div>
            </div>
      
       </div>
    </div>
  </main>
