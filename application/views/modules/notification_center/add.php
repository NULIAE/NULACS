<style>
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
                    <h3>New Email Template</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-24">
                <form class="form-add" action="<?php echo base_url('module/notification/emails/save'); ?>" method="post">
					<div class="row my-3">
                      <div class="col-12">
                        <label class="title"></label>
                        <div class="title2"><input type="text" name="name" data-control="material" class="form-control form-nul" placeholder="Title" value="" required></div>
                      </div>
                      <div class="col-12">
                        <div>
                        <label class="title w-100">Mail Template Type</label>
                          <select name="type" data-placeholder="Type" data-type="selector" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly">Yearly</option>
                            <option value="combined">Combined</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-24">
                            <label class="title"></label>
                            <div class="title2"><input type="text" name="subject" data-control="material" class="form-control form-nul" placeholder="Subject" value="" required></div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-24">
                            <label class="title w-100">Mail Template Content</label>
                            <textarea name="content" class="ckeditor" id="content" cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="row justify-content-end m-t-30">
                    <button type="submit" class="btn btn-primary btn-rounded px-4 mr-3">SUBMIT</button>
                    <a href="<?php echo base_url('module/notification/emails/'); ?>" class="btn btn-dark btn-rounded px-4 mr-3" style="line-height:30px;">CANCEL</a>
                    </div>
                </form>
                </div>
            </div>
						
       </div>
    </div>
  </main>
