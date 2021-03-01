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
                <div class="col-24 my-3">
              <a  href="<?php echo base_url('module/notification/emails/add'); ?>" class="btn btn-primary m-l-auto btn-rounded btn-action btn-fix"><i class="i i-add"></i></a>
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
										<div class="row m-0">
                      <div class="col-12">
                        <label class="title"></label>
                        <div class="title2"><input type="text" name="name" data-control="material" id="name<?php echo $template['name']; ?>" class="form-control form-nul" placeholder="Title" value="<?php echo $template['name']; ?>" required></div>
                      </div>
                      <div class="col-12">
                        <div>
                        <label class="title w-100">Mail Template Type</label>
                          <select name="type" data-placeholder="Type" data-type="selector" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="monthly" <?php if($template['type'] == "monthly") echo "selected"; ?>>Monthly</option>
                            <option value="quarterly" <?php if($template['type'] == "quarterly") echo "selected"; ?>>Quarterly</option>
                            <option value="yearly" <?php if($template['type'] == "yearly") echo "selected"; ?>>Yearly</option>
                            <option value="combined" <?php if($template['type'] == "combined") echo "selected"; ?>>Combined</option>
                          </select>
                        </div>
                      </div>
										</div>
                    <div class="row my-3">
                        <div class="col-24">
                            <label class="title"></label>
                            <div class="title2"><input type="text" name="subject" data-control="material" class="form-control form-nul" placeholder="Subject" value="<?php echo $template['subject']; ?>" required></div>
                        </div>
                    </div>
										<div class="row my-5">
                        <div class="col-24">
                        <label class="title w-100">Mail Template Content</label>
										    <textarea name="content" class="ckeditor" id="content<?php echo $template['temp_id']; ?>" cols="30" rows="10" required><?php echo $template['html_code']; ?></textarea>
                      </div>
                    </div>
										<div class="row justify-content-end m-t-30">
										<a href="<?php echo base_url('module/notification/emails/preview/').$template['temp_id']; ?>" class="btn btn-dark btn-rounded px-4 mr-3" style="line-height:30px;">PREVIEW</a>
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
