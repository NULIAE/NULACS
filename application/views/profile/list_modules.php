<main class="landing">
	<div class="container">
		<div class="Wrapper">
			<div class="row justify-content-end date">
				<div class="col t-r"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
			</div>
		</div>
		
		<div class="listing">

			<ul class="row w-100">
			<?php if($this->session->role_id==1): ?>
				<li class="col-lg-8 col-md-12"><a href="<?php echo base_url('/module/user'); ?>" class="inner"><i class="i i-manage"></i><div class="h3">User Management</div></a></li>
				<li class="col-lg-8 col-md-12"><a href="<?php echo base_url('/module/notification/emails'); ?>" class="inner"><i class="i i-notification"></i><div class="h3">Notification center</div></a></li>
				<li class="col-lg-8 col-md-12"><a href="<?php echo base_url('/document/metadata'); ?>" class="inner"><i class="i i-meta"></i><div class="h3">Meta data</div></a></li>
				<li class="col-lg-8 col-md-12"><a href="<?php echo base_url('/module/settings'); ?>" class="inner"><i class="i i-settings"></i><div class="h3">Settings</div></a></li>
				<li class="col-lg-8 col-md-12"><a href="<?php echo base_url('/module/affiliate'); ?>" class="inner"><i class="i i-aff"></i><div class="h3">Affiliate</div></a></li>
				<li class="col-lg-8 col-md-12"><a href="<?php echo base_url('/module/documents/search'); ?>" class="inner"><i class="i i-doc-search"></i><div class="h3">Document Search</div></a></li>
				<li class="col-lg-8 col-md-12"><a href="<?php echo base_url('module/assessment/assessment-listing'); ?>" class="inner"><i class="i i-assessment"></i><div class="h3">Assessment</div></a></li>
				<li class="col-lg-8 col-md-12"><a href="<?php echo base_url('/module/reports');?>" class="inner"><i class="i i-doc-search"></i><div class="h3">Report</div></a></li>
			<?php elseif($this->session->role_id==3): ?>
				<li class="col-lg-8 col-md-12"><a href="<?php echo base_url('/module/affiliate/edit/').$this->session->affiliate_id; ?>" class="inner"><i class="i i-aff"></i><div class="h3">Affiliate</div></a></li>
				<li class="col-lg-8 col-md-12"><a href="<?php echo base_url('module/assessment/assessment-listing'); ?>" class="inner"><i class="i i-assessment"></i><div class="h3">Assessment</div></a></li>
			<?php endif; ?>
			</ul>
		</div>
	</div>
</main>
