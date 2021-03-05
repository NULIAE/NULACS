<style>
button.remindBox, button.remindBox:focus{
    border:none !important;
    outline:none;
}
</style>
<main class="Meta-data emailTemplate">
    <div class="container">
       <div class="Wrapper">
            <div class="row justify-content-end date">
                Date: <span> &nbsp;<?php echo date('l F d, Y'); ?></span>
            </div>
            <div class="row document-mdata">
                <div class="head">
                    <h3><?php echo $template["name"]; ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-24">
                <form class="filter" id="filter-form" action="<?php echo base_url('module/notification/emails/preview/').$template["temp_id"]; ?>">
                    <div class="row mt-5 align-items-end">
					    <?php if($template["type"] == "monthly" || $template["type"] == "combined"): ?>
                        <div id="div-month-select" class="col-lg-4">
                            <?php
                            // set the month array
                            $monthArray = array(
                                "01" => "JAN", "02" => "FEB", "03" => "MAR", "04" => "APR", "05" => "MAY", "06" => "JUN", "07" => "JUL", "08" => "AUG","09" => "SEP", "10" => "OCT", "11" => "NOV", "12" => "DEC",
                            );
                            ?>
                            <label for="">Month</label>
                            <select name="month" data-placeholder="Month" data-type="selector">
                                <?php foreach($monthArray as $key => $value): ?>
                                <option value="<?php echo $key; ?>" <?php if($key == $month) echo "selected"; ?>><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php endif; ?>
                        <?php if($template["type"] == "quarterly" || $template["type"] == "combined"): ?>
                        <div class="col-lg-4">
                            <label for="">Quarter</label>
                            <select name="quarter" data-placeholder="Quarter" data-type="selector">
                                <option value="1" <?php if($quarter == 1) echo "selected"; ?>>January - March</option>
                                <option value="2" <?php if($quarter == 2) echo "selected"; ?>>April - June</option>
                                <option value="3" <?php if($quarter == 3) echo "selected"; ?>>July - September</option>
                                <option value="4" <?php if($quarter == 4) echo "selected"; ?>>October - December</option>
                            </select>
                        </div>
                        <?php endif; ?>
                        <div class="col-lg-4">
                            <?php $yearArray = range(date('Y'), 2000);?>
                            <label for="">Year</label>
                            <select name="year" data-placeholder="Year" data-type="selector">
                                <?php foreach($yearArray as $value): ?>
                                <option value="<?php echo $value; ?>" <?php if($value == $year) echo "selected"; ?>><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <?php $user = isset($_GET["user"]) ? $_GET["user"] : ""; ?>
                            <label for="">Target Audience</label>
                            <select name="user" data-placeholder="Users" data-type="selector">
                                <option value="">Both</option>
                                <?php foreach($roles as $row): ?>
                                <?php if($row['role_id'] == 1) continue; ?>
                                <option value="<?php echo $row['role_id']; ?>" <?php if($row['role_id'] == $user) echo "selected"; ?>><?php echo $row['role_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

						<div class="col-lg-5 col-md-5 col-12 ">
							<div class="t-l"><button type="submit" class="btn btn-primary btn-rounded min w-100px">PREVIEW</button></div>
						</div>
					</div>
				</form>
                </div>
            </div>
            <div class="row nulAccordian">
                <div class="col-24">
                    <div id="accordion" class="w-100">
                        <div class="card">
                            <div class="card-header nul-header" id="heading">
                                <h5 class="mb-0">
                                    <button class="btn btn-link btn-new" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse">
                                    <div class="accordianHead">User List
                                        <div class="f-right"><i class="i i-downarrow"></i></div>
                                    </div>
                                    </button>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th scope="col"><input type="checkbox" name="checkall" id="checkall" value="1" checked /></th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user): ?>
                                    <?php if($user["role_id"] == 2 && $user["is_adm_uploader"] == 0) continue; ?>
                                    <tr>
                                        <th scope="row"><input type="checkbox" name="usercheckbox[]" class="usercheckbox" value="<?php echo $user["user_id"]; ?>" checked /></th>
                                        <td><?php echo $user["fullname"]; ?></td>
                                        <td><?php echo $user["name"]; ?></td>
                                        <td><?php echo $user["user_title"]; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <?php echo $preview; ?>
			</div>
            <div id="message-box" class="alert alert-danger text-center p-2 d-none" role="alert"></div>
            <div class="row nul-reminders justify-content-center">
                <input type="hidden" name="template" value="<?php echo $template["temp_id"]; ?>" />
                <button class="col-lg-7 remindBox">
                  <i class="i i-monthly-reminder"></i>send reminder
                </button>
                <!-- <div class="col-lg-7 col-md-7 remindBox remindBox2">
                  <i class="i i-quarterly-reminder"></i>send quarterly reminder
                </div>
                <div class="col-lg-7 col-md-7 remindBox">
                  <i class="i i-yearly-reminder"></i>send yearly reminder
                </div> -->
            </div>
		
       </div>
    </div>
  </main>