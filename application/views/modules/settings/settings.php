<main class="settings">
	<div class="container">
		<div class="Wrapper">
			<div class="row justify-content-end date">
				Date: <span> &nbsp;<?php echo date('l F d, Y'); ?></span>
			</div>
			<div class="row document-mdata">
				<div class="head">
					<h3>Email SETTINGS</h3>
				</div>
			</div>
			<div class="row nul-settings">
				<form id="update-form" class="w-100" method="post" action="<?php echo base_url('module/settings/update'); ?>">
					<div class="settingWrap">
						<div class="col-lg-5 col-md-8 col-sm-24 mb-2">
							<label for="smtpHost">SMTP Host</label>
							<input type="text" name="smtp_host" id="smtpHost" class="form-control" value="<?php echo $settings['smtp_host'] ?>" required />
						</div>
						<div class="col-lg-5 col-md-8 col-sm-24">
							<label for="smtpPort">SMTP Port</label>
							<input type="text" name="smtp_port" id="smtpPort" class="form-control" value="<?php echo $settings['smtp_port'] ?>" required />
						</div>
						<div class="col-lg-5 col-md-8 col-sm-24">
							<label for="smtpUser">SMTP Username</label>
							<input type="text" name="smtp_user" id="smtpUser" class="form-control" value="<?php echo $settings['smtp_user'] ?>" required />
						</div>
						<div class="col-lg-5 col-md-5 col-sm-24">
							<label for="smtpPassword">SMTP Password</label>
							<input type="password" name="smtp_pass"  id="smtpPassword" class="form-control" value="<?php echo $settings['smtp_pass'] ?>" required />
						</div>
					</div>
					<button class="btn submit-btn" type="submit">Submit</button>
				</form>
			</div>

			<div class="row document-mdata mt-5">
				<div class="head">
					<h3>schedulers</h3>
				</div>
			</div>

			<div class="row nul-settings">
				<form class="w-100" method="post" action="<?php echo base_url('module/settings/update'); ?>">
					<div class="settingWrap">
						<div class="col-lg-7 col-md-7 col-sm-24 mb-3">
							<label>MONTHLY Reminder NOTIFICATION (IN DAYS)</label>
							<input type="number" name="monthly_duration" class="form-control" value="<?php echo $settings['monthly_duration'] ?>" required />
						</div>
						<div class="col-lg-7 col-md-7 col-sm-24 mb-3">
							<label>Quarterly Reminder NOTIFICATION (IN DAYS)</label>
							<input type="number" name="quarterly_duration" class="form-control" value="<?php echo $settings['quarterly_duration'] ?>" required />
						</div>
						<div class="col-lg-7 col-md-7 col-sm-24 mb-3">
							<label>Yearly Reminder NOTIFICATION (IN DAYS)</label>
							<input type="number" name="yearly_duration" class="form-control" value="<?php echo $settings['yearly_duration'] ?>" required />
						</div>

						<div class="col-lg-7 col-md-7 col-sm-24 mb-3">
								<label>Monthly Overdue Notification (In Days) </label>
								<input type="number" name="monthly_overdue" class="form-control" value="<?php echo $settings['monthly_overdue'] ?>" required>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-24 mb-3">
							<label>Quarterly Overdue Notification (In Days) </label>
							<input type="number" name="quarterly_overdue" class="form-control" value="<?php echo $settings['quarterly_overdue'] ?>" required>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-24 mb-3">
							<label>Yearly Overdue Notification (In Days) </label>
							<input type="number" name="yearly_overdue" class="form-control" value="<?php echo $settings['yearly_overdue'] ?>" required>
						</div>
					</div>

					<button class="btn submit-btn" type="submit">
							Submit
					</button>

				</form>
			</div>
		</div>
	</div>
</main>
