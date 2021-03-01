<main class="Meta-data emailTemplate">
    <div class="container">
       <div class="Wrapper">
            <div class="row justify-content-end date">
                Date: <span> &nbsp;<?php echo date('l F d, Y'); ?></span>
            </div>
            <div class="row document-mdata">
                <div class="head">
                    <h3><?php echo $name; ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-24">
                <form class="filter" id="filter-form" action="<?php echo base_url('module/notification/emails/preview/').$template_id; ?>">
					<div class="row mt-5 align-items-end">
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
            <div class="row ">
                <?php echo $preview; ?>
			</div>
						
       </div>
    </div>
  </main>