<style>
.form-nul{
	border-bottom: 1px solid;
}
.error {
    margin: 0;
    color: #B92D00;
}</style>
<main class="Meta-data emailTemplate">
    <div class="container">
       <div class="Wrapper">
            <div class="row justify-content-end date">
                Date: <span> &nbsp;<?php echo date('l F d, Y'); ?></span>
            </div>
            <div class="row document-mdata">
                <div class="head">
                    <h3>email template</h3>
                </div>
            </div>
            <div class="row nulAccordian">
                    <div id="accordion" class="w-100">
						<?php $flag = 0; ?>
						<?php foreach($templates as $template): ?>
                            <div class="card">
                              <div class="card-header nul-header" id="heading<?php echo $template['temp_id']; ?>">
                                <h5 class="mb-0">
                                  <button class="btn btn-link btn-new" data-toggle="collapse" data-target="#collapse<?php echo $template['temp_id']; ?>" aria-expanded="<?php echo $flag===0?"true":"false"; ?>" aria-controls="collapse<?php echo $template['temp_id']; ?>">
                                    <div class="accordianHead"><?php echo $template['name']; ?>
                                      <div class="f-right"><i class="i i-downarrow"></i></div>
                                    </div>
                                  </button>
                                </h5>
                              </div>
                          
                              <div id="collapse<?php echo $template['temp_id']; ?>" class="collapse <?php if($flag===0) echo "show"; ?>" aria-labelledby="heading<?php echo $template['temp_id']; ?>" data-parent="#accordion">
                                <div class="card-body">
									<form class="form-edit" action="<?php echo base_url('module/notification/emails/update/'.$template['temp_id']); ?>" method="post">
										<div class="row flex-column m-0">
											<label class="title">Title</label>
											<div class="title2"><input type="text" name="name" data-control="material" id="name<?php echo $template['name']; ?>" class="form-control form-nul" placeholder="<?php echo $template['name']; ?>" value="<?php echo $template['name']; ?>" required></div>
										</div>
										<div>
										<textarea name="content" class="ckeditor" id="content<?php echo $template['temp_id']; ?>" cols="30" rows="10" required><?php echo $template['html_code']; ?></textarea>
										</div>
										<div class="row justify-content-end m-t-30">
										<button type="submit" class="sign-in-btn">EDIT</button>
										</div>
                                    </form>
                                </div>
                              </div>
							</div>
							<?php $flag = 1; ?>
						<?php endforeach; ?>
                    </div>
						</div>
						
						<div class="row document-mdata">
              <div class="head">
                  <h3>reminders</h3>
              </div>
            </div>

            <div class="row nul-reminders">
                <div class="col-lg-7 col-md-7 remindBox">
                  <i class="i i-monthly-reminder"></i>send Monthly reminder
                </div>
                <div class="col-lg-7 col-md-7 remindBox remindBox2">
                  <i class="i i-quarterly-reminder"></i>send quarterly reminder
                </div>
                <div class="col-lg-7 col-md-7 remindBox">
                  <i class="i i-yearly-reminder"></i>send yearly reminder
                </div>
            </div>

       </div>
    </div>
  </main>
